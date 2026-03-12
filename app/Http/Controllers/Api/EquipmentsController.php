<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentsResource;
use App\Models\Equipments;
use App\Models\EquipmentPedStock;
use App\Models\PedCategories;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function index()
    {
        $equipments = EquipmentsResource::collection(Equipments::all());
        return response()->json($equipments, 200);
    }

    public function details($id)
    {
        $equipment = Equipments::find($id);
        if (!$equipment)
        {
            return response()->json('Cihaz tapılmadı', 404);
        }

        $equipment->load('equipment_ped_stock.ped_category.brand', 'orders');
        return response()->json($equipment, 200);
    }

    public function update($id, Request $request)
    {
        try{
            $equipment = Equipments::find($id);
        if (!$equipment) {
            return response()->json(['message' => 'Cihaz tapılmadı'], 404);
        }

        $statusInput = $request->input('equipment_status');
        if (!$statusInput) {
            return response()->json(['message' => 'Status dəyəri tələb olunur'], 422);
        }
        $allowed = ['active', 'deactive', 'under_repair', 'maintenance', 'offline', 'broken'];
        if (!in_array($statusInput, $allowed, true)) {
            return response()->json(['message' => 'Status dəyəri düzgün deyil'], 422);
        }
        $equipment->equipment_status = $statusInput;

        if ($request->has('equipment_name')) {
            $equipment->equipment_name = (string) $request->input('equipment_name');
        }
        if ($request->has('current_address')) {
            $equipment->current_address = (string) $request->input('current_address');
        }
        $equipment->save();

        return response()->json(new EquipmentsResource($equipment), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Cihaz güncəllənmədi', 'error' => $e->getMessage()], 500);
        }
    }

    public function addStock($id, Request $request)
    {
        $equipment = Equipments::find($id);
        if (!$equipment) {
            return response()->json(['message' => 'Cihaz tapılmadı'], 404);
        }
        $validated = $request->validate([
            'ped_category_id' => 'required|exists:ped_categories,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $pedCategory = PedCategories::find($validated['ped_category_id']);
        if (!$pedCategory || $pedCategory->status !== 'active') {
            return response()->json(['message' => 'Kateqoriya aktiv deyil'], 422);
        }

        $stock = EquipmentPedStock::where('equipment_id', $equipment->id)
            ->where('ped_category_id', $validated['ped_category_id'])
            ->first();

        if ($stock) {
            $stock->qty_available = (int)$stock->qty_available + (int)$validated['quantity'];
            $stock->save();
        } else {
            $stock = EquipmentPedStock::create([
                'equipment_id' => $equipment->id,
                'ped_category_id' => $validated['ped_category_id'],
                'qty_available' => (int)$validated['quantity'],
            ]);
        }

        $equipment->load('equipment_ped_stock.ped_category.brand');
        return response()->json(['success' => true, 'equipment' => $equipment, 'stock' => $stock], 200);
    }
}
