<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentsResource;
use App\Models\Equipments;
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

        $equipment->load('equipment_ped_stock.ped_category');
        return response()->json($equipment, 200);
    }
}
