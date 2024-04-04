<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\WarehouseProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.login');
});


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/providers', ProviderController::class);
    Route::resource('/warehouses', WarehouseController::class);
    Route::resource('/warehouses-products', WarehouseProductController::class);
    Route::get('/select-warehouse', [WarehouseProductController::class, 'selectWarehouses'])->name('warehouses-products.select-warehouse');
    Route::get('/validate-warehouse/{id}', [WarehouseProductController::class, 'validateWarehouse'])->name('warehouses-products.validate-warehouse');

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::post('auth', [LoginController::class, 'authenticate'])->name('auth');