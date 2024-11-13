<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController; // Import the CartController
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Auth\RegisterController; // Correct import for RegisterController
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\CatalogArtificialController;
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

// Route untuk halaman utama (user)
Route::get('/', function () {
    return view('home');
})->name('home');

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

// Show registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Handle registration request
Route::post('/register', [RegisterController::class, 'register'])->name('register');

route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

// Route untuk menampilkan halaman order status
Route::get('/order-status', [OrderStatusController::class, 'index'])->name('order_status.index');
// Route untuk menampilkan halaman order status
Route::get('/catalog-artificial', [CatalogArtificialController::class, 'index'])->name('catalog_artificial.index');