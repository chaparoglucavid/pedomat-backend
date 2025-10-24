<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;


Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-profile', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->get('/user-transaction-history', [UserController::class, 'getUserTransactionHistory']);
Route::middleware('auth:sanctum')->get('/orders', [OrdersController::class, 'orders']);
Route::middleware('auth:sanctum')->post('/orders/store', [OrdersController::class, 'store']);

Route::get('equipments', [EquipmentsController::class, 'index']);
Route::get('equipment-details/{id}', [EquipmentsController::class, 'details']);
