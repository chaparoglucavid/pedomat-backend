<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\UserBalanceController;


Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-profile', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->get('/user-transaction-history', [UserController::class, 'getUserTransactionHistory']);
Route::middleware('auth:sanctum')->post('/top-up-balance', [UserBalanceController::class, 'topUpBalance']);
Route::middleware('auth:sanctum')->get('/orders', [OrdersController::class, 'orders']);
Route::middleware('auth:sanctum')->post('/orders/store', [OrdersController::class, 'store']);
Route::middleware('auth:sanctum')->post('/cancel-order', [OrdersController::class, 'cancel']);

Route::get('equipments', [EquipmentsController::class, 'index']);
Route::get('equipment-details/{id}', [EquipmentsController::class, 'details']);
