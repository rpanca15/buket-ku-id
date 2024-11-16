<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogArtificialController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderStatusController;

// Halaman beranda dan produk, bisa diakses oleh semua pengguna (guest dan user)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Route untuk halaman cart
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index'); // View cart
    Route::post('/add', [CartController::class, 'add'])->name('add'); // Add item to cart
    Route::post('/remove', [CartController::class, 'remove'])->name('remove'); // Remove item from cart
    Route::post('/update', [CartController::class, 'update'])->name('update'); // Update item quantity
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout'); // Proceed to checkout
});

// Route untuk menampilkan halaman katalog
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// Route untuk menampilkan halaman order status
Route::get('/order-status', [OrderStatusController::class, 'index'])->name('order_status');
// Route untuk menampilkan halaman order status
Route::get('/catalog-artificial', [CatalogArtificialController::class, 'index'])->name('catalog_artificial.index');

// Rute untuk login dan register hanya untuk guest (belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Rute untuk logout hanya untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Rute untuk user terautentikasi yang bisa membuat order
Route::group(['middleware' => ['role:user']], function() {
    // Order hanya bisa diakses oleh user yang sudah login
    Route::resource('/orders', OrderController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

});

// Rute untuk admin dengan akses penuh
Route::group(['middleware' => ['role:admin']], function() {
    // Dashboard untuk admin
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    // Rute untuk mengelola produk
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

    // Rute untuk mengelola kategori produk
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

    // Rute untuk mengelola pesanan (order) admin
    Route::resource('/admin/orders', OrderController::class)
        ->names([
            'index' => 'orders.index',
            'create' => 'orders.create',
            'store' => 'orders.store',
            'show' => 'orders.show',
            'edit' => 'orders.edit',
            'update' => 'orders.update',
            'destroy' => 'orders.destroy',
        ]);
});
