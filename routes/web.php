<?php

use App\Http\Controllers\Admin\{
    DashboardController,
    EquipmentsController,
    UsersController,
    ForumController,
    PedCategoriesController,
    PaymentHistoriesController,
    OrdersController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('equipments', EquipmentsController::class);
Route::resource('ped-categories', PedCategoriesController::class);
Route::resource('users', UsersController::class);
Route::resource('orders', OrdersController::class);
Route::resource('payment-histories', PaymentHistoriesController::class);
Route::resource('forums', ForumController::class);


