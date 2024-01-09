<?php

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('list.product');
Route::get('/orders', [App\Http\Controllers\Backend\OrderanController::class, 'index'])->name('orders.index');
Route::delete('/orders/{id}', [App\Http\Controllers\Backend\OrderanController::class, 'destroy'])->name('orders.destroy');
Route::get('/productdet/{id}', [App\Http\Controllers\CartController::class, 'index'])->name('productdet');
Route::post('/checkout/{id}', [App\Http\Controllers\CartController::class, 'store'])->name('checkout');

Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::delete('/checkout/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('checkout.delete');



Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {

    // dashboard 
    Route::get('', [App\Http\Controllers\Backend\IndexController::class, 'index'])->name('dashboard');

    // route product
    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    // route booking
    Route::resource('booking', App\Http\Controllers\Backend\BookingController::class);

    // route orders
    Route::get('orderan', [App\Http\Controllers\Backend\OrderanController::class, 'index'])->name('orderan.index');

    // route booking
    Route::get('booking', [App\Http\Controllers\Backend\BookingController::class, 'index'])->name('booking.index');

    // route reviews
    Route::get('review', [App\Http\Controllers\Backend\ReviewController::class, 'index'])->name('review.index');
});

Route::prefix('user')->middleware('role:user')->group(function () {

    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
    Route::get('booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
    Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
    Route::get('contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::get('checkout', [App\Http\Controllers\CartController::class, 'index'])->name('checkout');
    Route::get('aboutus', [App\Http\Controllers\AboutController::class, 'index'])->name('aboutus');
    Route::get('servicedetails', [App\Http\Controllers\ServiceController::class, 'index'])->name('servicedetails');

});

Auth::routes();