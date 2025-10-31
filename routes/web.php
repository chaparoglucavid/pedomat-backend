<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{
    DashboardController,
    EquipmentsController,
    UsersController,
    ForumController,
    PedCategoriesController,
    TransactionHistoriesController,
    OrdersController
};
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('equipments', EquipmentsController::class);
    Route::resource('ped-categories', PedCategoriesController::class);
    Route::resource('users', UsersController::class);
    Route::resource('orders', OrdersController::class);
    Route::resource('transaction-histories', TransactionHistoriesController::class);
    Route::resource('forums', ForumController::class);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});





