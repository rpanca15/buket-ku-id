<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Route untuk halaman admin dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Route untuk resource product (CRUD)
Route::resource('/admin/products', ProductController::class)
    ->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);

Route::resource('/admin/categories', CategoryController::class)
    ->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
// Route untuk resource orders
// Route::resource('/admin/orders', OrderController::class)
//     ->names([
//         'index' => 'orders.index',
//         'create' => 'orders.create',
//         'store' => 'orders.store',
//         'show' => 'orders.show',
//         'edit' => 'orders.edit',
//         'update' => 'orders.update',
//         'destroy' => 'orders.destroy',
//     ]);

// Route untuk halaman utama (user)
Route::get('/', function () {
    return view('welcome');
})->name('home');
