<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Checkout and FAQ routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// ========= Authentication Required Routes =========
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Cart routes
    Route::post('/cart', [CheckoutController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{cartItem}', [CheckoutController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart', [CheckoutController::class, 'viewCart'])->name('cart.view');

    // Checkout process
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
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}/images/{productImage}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');

    // Review routes
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::patch('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');

    // Update cart item
    Route::patch('/cart/update/{itemId}', [CheckoutController::class, 'updateCart']);

    // Email Verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/dashboard');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

// ========= Authentication Routes (Laravel Breeze, Jetstream, etc.) =========
require __DIR__ . '/auth.php';
