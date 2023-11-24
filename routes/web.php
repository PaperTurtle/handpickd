<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Registration of web routes for the application. These routes are loaded
| by the RouteServiceProvider within a group that contains the "web" middleware group.
| Create something great!
|
*/

// ========= Public Routes =========
// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');
// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::middleware('auth')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
});
Route::get('/products/{product}', [ProductController::class, 'show'])->where('product', '[0-9]+')->name('products.show');

// FAQ routes
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// ========= Authentication Required Routes =========
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cart routes
    Route::post('/cart', [CheckoutController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{cartItem}', [CheckoutController::class, 'removeFromCart'])->name('cart.remove');

    // Checkout process
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/success', function () {
        return view('checkout.success');
    })->name('checkout.success');

    // Dashboard transaction management
    Route::patch('/dashboard/transactions/{transaction}/mark-as-sent', [DashboardController::class, 'markAsSent'])
        ->name('dashboard.markAsSent');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product management
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}/images/{productImage}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');

    // Review routes
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');

    // Update cart item
    Route::patch('/cart/update/{itemId}', [CheckoutController::class, 'updateCart']);
});

// ========= Authentication Routes (Laravel Breeze) =========
require __DIR__ . '/auth.php';
