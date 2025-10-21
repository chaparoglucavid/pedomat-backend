<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-profile', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->get('/user-transaction-history', [UserController::class, 'getUserTransactionHistory']);

Route::get('equipments', [EquipmentsController::class, 'index']);
Route::get('equipment-details/{id}', [EquipmentsController::class, 'details']);
