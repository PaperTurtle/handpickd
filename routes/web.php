<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

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

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Authenticated User Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::post('/cart', [CheckoutController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{cartItem}', [CheckoutController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart', [CheckoutController::class, 'viewCart'])->name('cart.view');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

Route::delete('/cart/{cartItem}', [CheckoutController::class, 'remove'])->name('cart.remove');
Route::get('/checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');
Route::patch('/dashboard/transactions/{transaction}/mark-as-sent', [DashboardController::class, 'markAsSent'])
    ->middleware('auth')
    ->name('dashboard.markAsSent');
// Auth Routes (requires authentication)
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Management Routes
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}/images/{productImage}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');
});

// Authentication Routes (handled by Laravel Breeze, Jetstream, etc.)
require __DIR__ . '/auth.php';
