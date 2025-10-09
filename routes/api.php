<?php

use App\Http\Controllers\Admin\EquipmentsController;
use App\Http\Resources\EquipmentsResource;
use App\Models\Equipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('equipments', function (){
    return response()->json(EquipmentsResource::collection(Equipments::all()));
});
