<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\ProfileController;

// Halaman beranda dan produk, bisa diakses oleh semua pengguna (guest dan user)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('hom');
Route::get('/catalogs/{categoryName}/{slug}', [CatalogController::class, 'show'])->name('product.show');

// Route untuk menampilkan halaman katalog
Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
Route::get('/catalogs/artificial', [CatalogController::class, 'artificial'])->name('catalogs.artificial');
Route::get('/catalogs/graduation', [CatalogController::class, 'graduation'])->name('catalogs.graduation');
Route::get('/catalogs/snack', [CatalogController::class, 'snack'])->name('catalogs.snack');

// Rute untuk login dan register hanya untuk guest (belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Route untuk reset password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetToken'])->name('forgot.password.send');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');
Route::get('/reset-password/{email}/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');

// Route untuk halaman cart
Route::prefix('carts')->name('cart.')->middleware('auth')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index'); // View cart
    Route::post('/add/{id}', [CartController::class, 'add'])->name('add'); // Add item to cart
    Route::post('/remove/{id}', [CartController::class, 'remove'])->name('remove'); // Remove item from cart
    Route::post('/update/{id}', [CartController::class, 'update'])->name('update'); // Update item quantity
});

// Route untuk halaman order
Route::prefix('orders')->name('order.')->middleware('auth')->group(function () {
    Route::get('/', [UserOrderController::class, 'index'])->name('index'); // View cart
    Route::post('/checkout', [UserOrderController::class, 'store'])->name('checkout'); // Proceed to checkout
    Route::get('/payment/{orderId}', [UserOrderController::class, 'showPayment'])->name('payment'); // View payment page
    Route::post('/payment/{orderId}', [UserOrderController::class, 'processPayment'])->name('processPayment'); // Process payment
});

// Route untuk halaman profile
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index'); // View cart
    Route::post('/update/{id}', [ProfileController::class, 'updateProfile'])->name('update'); // Proceed to checkout
    Route::post('/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('update-password'); // Proceed to checkout
});

// Rute untuk logout hanya untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Rute untuk admin dengan akses penuh
Route::group(['middleware' => ['role:admin']], function () {
    // Dashboard untuk admin
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('updateStatus');

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

    // Rute untuk mengelola pesanan (order) admin
    Route::resource('/admin/users', UserController::class)
        ->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'show' => 'users.show',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);
});
