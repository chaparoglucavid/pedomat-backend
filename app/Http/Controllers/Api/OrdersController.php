<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $orderItems = $request->items;
        $device = $request->equipment;
        $placedOrder = [];

        $order = Orders::create([
            'user_id'=>$user->id,
            'equipment_id'=>$device,
            'order_number' => 'ORD-'.time(),
            'order_qty_sum' => $orderItems->quantity->sum,
            'order_amount_sum' =>,
            'invoice',
            'payment_method',
            'payment_status',
            'barcode',
            'barcode_status'
        ])

    }
}
