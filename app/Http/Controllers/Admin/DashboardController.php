<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EquipmentPedStock;
use App\Models\Equipments;
use App\Models\Forum;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\PedCategories;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $total_users = User::isUser()->count();
        $oneWeekAgo = Carbon::now()->subWeek();
        $newUsersLastWeek = User::isUser()->where('created_at', '>=', $oneWeekAgo)->count();
        $percentage = $total_users > 0 ? number_format(($newUsersLastWeek / $total_users) * 100, 2) : 0;

        $total_equipments = Equipments::count();
        $total_active_equipments = Equipments::IsActive()->count();
        $total_deactive_equipments = Equipments::IsDeactive()->count();
        $total_under_repair_equipments = Equipments::IsUnderRepair()->count();

        $total_ped_categories = PedCategories::count();
        $total_ped_count = EquipmentPedStock::sum('qty_available');

        $total_orders_amount = OrderDetails::sum('total_price');
        $total_pending_amount = OrderDetails::with('order', function ($query) {
            $query->where('barcode_status','not_used');
        })->sum('total_price');
        $total_used_orders_amount = OrderDetails::with('order', function ($query) {
            $query->where('barcode_status','used');
        })->sum('total_price');

        $last7Days = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $total = OrderDetails::whereDate('created_at', $date)->sum('total_price');
            $last7Days->push([
                'date' => $date,
                'total' => $total,
            ]);
        }

        $categories = $last7Days->pluck('date')->toArray();
        $data = $last7Days->pluck('total')->toArray();

        $pedCategories = PedCategories::pluck('category_name', 'id');
        $series = [];

        foreach ($pedCategories as $id => $name) {
            $seriesData = [];
            foreach ($categories as $date) {
                $qty = OrderDetails::where('ped_category_id', $id)
                    ->whereDate('created_at', $date)
                    ->sum('qty');
                $seriesData[] = $qty;
            }
            $series[] = [
                'name' => $name,
                'data' => $seriesData
            ];
        }

        $last_orders = Orders::with(['user', 'equipment', 'order_details'])->take(5)->get();

        $equipments = Equipments::with('equipment_ped_stock')->get();

        $forums = Forum::withCount('forum_comments')->get();

        return view('admin-dashboard.dashboard', compact(
            'total_users',
            'percentage',
            'total_equipments',
            'total_active_equipments',
            'total_deactive_equipments',
            'total_under_repair_equipments',
            'total_ped_categories',
            'total_ped_count',
            'total_orders_amount',
            'total_pending_amount',
            'total_used_orders_amount',
            'categories',
            'data',
            'last_orders',
            'series',
            'equipments',
            'forums'
        ));
    }
}
