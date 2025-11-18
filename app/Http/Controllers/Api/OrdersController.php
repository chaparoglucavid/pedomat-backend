<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EquipmentPedStock;
use App\Models\Equipments;
use App\Models\Orders;
use App\Models\PedCategories;
use App\Services\BarcodeService;
use App\Services\PaymentService;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{

    public function orders()
    {
        $user = Auth::user();

        $orders = $user->orders()->with(['order_details.ped_category', 'equipment'])->get();

        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }
    public function store(Request $request, PaymentService $paymentService, BarcodeService $barcodeService)
    {
        $validated = $request->validate([
            'device' => 'required|integer|exists:equipments,id',
            'orderItems' => 'required|array|min:1',
            'orderItems.*.categoryId' => 'required|integer|exists:ped_categories,id',
            'orderItems.*.quantity' => 'required|integer|min:1',
            'paymentMethod' => 'required|string|in:balance,card',
            'totalAmount' => 'required|numeric|min:0.01',
        ]);

        DB::beginTransaction();

        try {
            $equipment = Equipments::findOrFail($validated['device']);

            $user = Auth::user();
            if (!$user) {
                $logs[] = ['error' => 'User not authenticated'];
                throw new \Exception('User not authenticated');
            }

            $totalAmount = $validated['totalAmount'];
            $paymentMethod = $validated['paymentMethod'];
            $orderItems = $validated['orderItems'];

            // Payment
            $logs[] = ['info' => 'Payment process started', 'method' => $paymentMethod, 'totalAmount' => $totalAmount];
            if ($paymentMethod === 'balance') {
                $paymentService->viaBalance($user, $totalAmount);
            } else {
                $paymentService->viaCard($user, $totalAmount);
            }

            // Prepare order items
            $orderQtySum = 0;
            $preparedItems = [];

            foreach ($orderItems as $index => $item) {
                $category = PedCategories::find($item['categoryId']);
                if (!$category) {
                    throw new \Exception("PedCategory tapilmadi: {$item['categoryId']}");
                }

                $quantity = $item['quantity'];
                $lineAmount = $category->unit_price * $quantity;
                $orderQtySum += $quantity;

                $preparedItems[] = [
                    'ped_category_id' => $category->id,
                    'qty' => $quantity,
                    'unit_price' => $category->unit_price,
                    'total_price' => $lineAmount,
                    'ped_status' => 'reserved'
                ];

                $stock = EquipmentPedStock::where('ped_category_id', $category->id)
                    ->where('equipment_id', $equipment->id)
                    ->first();

                if (!$stock) {
                    throw new \Exception("Cihazda {$category->name} kateqoriyaya aid ped yoxdur.");
                }

                if ($stock->qty_available < $quantity) {
                    $logs[] = [
                        'error' => 'EquipmentPedStock kifayet etmir',
                        'equipment_id' => $equipment->id,
                        'category_id' => $category->id,
                        'available' => $stock->qty_available,
                        'required' => $quantity
                    ];
                    throw new \Exception("Cihazda {$category->name} kateqoriyaya aid kifayət qədər ped yoxdur.");
                }

                $stock->decrement('qty_available', $quantity);
            }

            // Create order
            $order = Orders::create([
                'user_id' => $user->id,
                'equipment_id' => $equipment->id,
                'order_qty_sum' => $orderQtySum,
                'order_amount_sum' => $totalAmount,
                'payment_method' => $paymentMethod,
                'payment_status' => 'completed',
                'barcode_status' => 'not_used',
                'barcode_expiry_time' => Carbon::now('Asia/Baku')->addHours(2),
                'order_status' => 'pending'
            ]);

            $order->order_details()->createMany($preparedItems);
            DB::commit();



            return response()->json([
                'success' => true,
                'message' => 'Sifariş müvəffəqiyyətlə qeyd edildi!',
                'order' => $order->load('order_details'),
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            $logs[] = ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()];

            return response()->json([
                'success' => false,
                'message' => 'Failed to place the order.',
            ], 500);
        }
    }

    public function cancel(Request $request, PaymentService $paymentService)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $orderId = $request->input('orderId');
            $order = Orders::with('order_details')->find($orderId);

            if (!$order) {
                return response()->json([
                    'success' => false,
                    'message' => 'Axtardığınız məlumat üzrə sifariş tapılmadı.',
                ], 404);
            }

            if ($order->order_status !== 'pending') {
                return response()->json([
                    'success' => false,
                    'message' => 'Bu sifarişi ləğv etmək mümkün deyil.',
                ], 400);
            }

            if ($order->payment_method === 'balance' && $order->payment_status === 'completed') {
                $paymentService->refundToBalance($user, $order->order_amount_sum);
            }

            $order->order_status = 'refunded';
            $order->order_details()->update(['ped_status' => 'returned']);
            $order->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => $order->order_number. ' nömrəli sifariş müvəffəqiyyətlə ləğv edildi və ödənilən məbləğ balansınıza geri qaytarıldı.',
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Sifariş ləğv edilərkən xəta baş verdi.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

}
