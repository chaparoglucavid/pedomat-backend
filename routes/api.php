<?php

use App\Http\Controllers\Api\EquipmentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('equipments', [EquipmentsController::class, 'index']);
Route::get('equipment-details/{id}', [EquipmentsController::class, 'details']);
