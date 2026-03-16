<?php

use App\Http\Controllers\Api\EquipmentsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\UserBalanceController;
use App\Http\Controllers\Api\BrandController as ApiBrandController;
use App\Http\Controllers\Api\PedCategoryController as ApiPedCategoryController;
use App\Http\Controllers\Api\ForumController as ApiForumController;
use App\Http\Controllers\Api\TransactionHistoryController as ApiTransactionHistoryController;


use App\Http\Controllers\Api\StoryController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\UserPackageController;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegistrationController::class, 'register']);
Route::get('/cors-config', function () {
    return response()->json(config('cors'));
});

Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/update-profile', [UserController::class, 'updateProfile']);
Route::middleware('auth:sanctum')->get('/user-transaction-history', [UserController::class, 'getUserTransactionHistory']);
Route::middleware('auth:sanctum')->post('/top-up-balance', [UserBalanceController::class, 'topUpBalance']);
Route::middleware('auth:sanctum')->post('/users/{id}/top-up-balance', [UserBalanceController::class, 'topUpBalance'])->where('id', '[0-9]+');
Route::middleware('auth:sanctum')->get('/orders', [OrdersController::class, 'orders']);
Route::middleware('auth:sanctum')->post('/orders/store', [OrdersController::class, 'store']);
Route::middleware('auth:sanctum')->post('/cancel-order', [OrdersController::class, 'cancel']);

Route::get('equipments', [EquipmentsController::class, 'index']);
Route::get('equipment-details/{id}', [EquipmentsController::class, 'details']);
Route::middleware('auth:sanctum')->put('equipments/{id}', [EquipmentsController::class, 'update']);
Route::middleware('auth:sanctum')->post('equipments/{id}/stocks', [EquipmentsController::class, 'addStock']);

// Brands API
Route::get('brands', [ApiBrandController::class, 'index']);
Route::get('brands/{id}', [ApiBrandController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('brands', [ApiBrandController::class, 'store']);
    Route::put('brands/{id}', [ApiBrandController::class, 'update']);
    Route::delete('brands/{id}', [ApiBrandController::class, 'destroy']);

    // Ped categories write routes
    Route::post('ped-categories', [ApiPedCategoryController::class, 'store']);
    Route::put('ped-categories/{id}', [ApiPedCategoryController::class, 'update']);
    Route::delete('ped-categories/{id}', [ApiPedCategoryController::class, 'destroy']);
});

// Ped categories public
Route::get('ped-categories', [ApiPedCategoryController::class, 'index']);
Route::get('ped-categories/{id}', [ApiPedCategoryController::class, 'show']);


// Forums
Route::get('forums', [ApiForumController::class, 'index']);
Route::get('forums/{id}', [ApiForumController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('forums', [ApiForumController::class, 'store']);
    Route::put('forums/{id}', [ApiForumController::class, 'update']);
    Route::delete('forums/{id}', [ApiForumController::class, 'destroy']);
    Route::post('forums/{id}/comments', [ApiForumController::class, 'comment']);
});

// Transaction histories
Route::get('transaction-histories', [ApiTransactionHistoryController::class, 'index']);
Route::get('transaction-histories/{id}', [ApiTransactionHistoryController::class, 'show']);


// User endpoints
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'me']);
Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']); // consider admin-only
Route::middleware('auth:sanctum')->get('/users/{id}', [UserController::class, 'show']); // consider admin-only
Route::middleware('auth:sanctum')->put('/users/{id}', [UserController::class, 'update']);
Route::middleware('auth:sanctum')->put('/users/{id}/status', [UserController::class, 'updateStatus']);

// Stories
Route::get('stories', [StoryController::class, 'index']);
Route::get('stories/{id}', [StoryController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('stories', [StoryController::class, 'store']);
    Route::post('stories/{id}', [StoryController::class, 'update']); // Use POST for multipart/form-data updates in Laravel
    Route::delete('stories/{id}', [StoryController::class, 'destroy']);
});

// Banners
Route::get('banners', [BannerController::class, 'index']);
Route::get('banners/{id}', [BannerController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('banners', [BannerController::class, 'store']);
    Route::post('banners/{id}', [BannerController::class, 'update']); // Use POST for multipart/form-data updates
    Route::delete('banners/{id}', [BannerController::class, 'destroy']);
});

// Packages
Route::get('packages', [PackageController::class, 'index']);
Route::get('packages/{id}', [PackageController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('packages', [PackageController::class, 'store']);
    Route::post('packages/{id}', [PackageController::class, 'update']);
    Route::delete('packages/{id}', [PackageController::class, 'destroy']);
});

// User packages
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user-packages', [UserPackageController::class, 'index']);
    Route::get('user-packages/active', [UserPackageController::class, 'active']);
    Route::post('user-packages/subscribe', [UserPackageController::class, 'subscribe']);
    Route::post('user-packages/cancel', [UserPackageController::class, 'cancel']);
    // Admin manage user packages
    Route::get('users/{id}/packages', [UserPackageController::class, 'listByUser']);
    Route::get('users/{id}/packages/active', [UserPackageController::class, 'activeByUser']);
    Route::post('users/{id}/packages/subscribe', [UserPackageController::class, 'subscribeByUser']);
    Route::post('users/{id}/packages/cancel', [UserPackageController::class, 'cancelByUser']);
});
