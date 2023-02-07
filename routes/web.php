<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('roles:customer');

Route::middleware('roles:admin')->prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('show-back-orders');
    Route::put('/orders', [OrderController::class, 'updateOrder'])->name('update-back-order');

    Route::get('/products', [ProductController::class, 'showProducts'])->name('show-back-products');

    Route::get('/hotels', [HotelController::class, 'indexHotel'])->name('show-back-hotels');
    Route::get('/hotels/add', [HotelController::class, 'createHotel'])->name('create-back-hotel');
    Route::post('/hotels/add', [HotelController::class, 'storeHotel'])->name('store-back-hotel');
    Route::get('/hotels/edit/{hotel}', [HotelController::class, 'editHotel'])->name('edit-back-hotel');
    Route::put('/hotels/edit/{hotel}', [HotelController::class, 'updateHotel'])->name('update-back-hotel');
    Route::delete('/hotels/delete/{hotel}', [HotelController::class, 'deleteHotel'])->name('delete-back-hotel');

    Route::get('/countries', [CountryController::class, 'indexCountry'])->name('show-back-countries');
    Route::get('/countries/add', [CountryController::class, 'createCountry'])->name('create-back-country');
    Route::post('/countries/add', [CountryController::class, 'storeCountry'])->name('store-back-country');
    Route::get('/countries/edit/{country}', [CountryController::class, 'editCountry'])->name('edit-back-country');
    Route::put('/countries/edit/{country}', [CountryController::class, 'updateCountry'])->name('update-back-country');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'deleteCountry'])->name('delete-back-country');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
