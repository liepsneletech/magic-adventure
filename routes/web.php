<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('roles:customer');
Route::get('/offers', [FrontController::class, 'offers'])->name('offers')->middleware('roles:guest|customer');
Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
Route::post('/cart', [FrontController::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [FrontController::class, 'makeOrder'])->name('make-order');

Route::get('/offers/cats/{country}', [FrontController::class, 'showCatOffers'])->name('show-cats-offers');
Route::post('/add-to-cart', [FrontController::class, 'addToCart'])->name('add-to-cart')->middleware('roles:customer');

Route::middleware('roles:admin')->prefix('admin')->name('admin-')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders-index');
    Route::get('/orders/{order}', [OrderController::class, 'edit'])->name('orders-edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders-update');
    Route::delete('/orders/{order}', [OrderController::class, 'delete'])->name('orders-delete');

    Route::get('/offers', [OfferController::class, 'index'])->name('offers-index');
    Route::get('/offers/add', [OfferController::class, 'create'])->name('offers-create');
    Route::post('/offers/add', [OfferController::class, 'store'])->name('offers-store');
    Route::get('/offers/add/{country}', [OfferController::class, 'showCountryHotels'])->name('offers-country-hotels');
    Route::get('/offers/edit/{offer}', [OfferController::class, 'edit'])->name('offers-edit');
    Route::put('/offers/edit/{offer}', [OfferController::class, 'update'])->name('offers-update');
    Route::delete('/offers/delete/{offer}', [OfferController::class, 'delete'])->name('offers-delete');

    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels-index');
    Route::get('/hotels/add', [HotelController::class, 'create'])->name('hotels-create');
    Route::post('/hotels/add', [HotelController::class, 'store'])->name('hotels-store');
    Route::get('/hotels/edit/{hotel}', [HotelController::class, 'edit'])->name('hotels-edit');
    Route::put('/hotels/edit/{hotel}', [HotelController::class, 'update'])->name('hotels-update');
    Route::delete('/hotels/delete/{hotel}', [HotelController::class, 'delete'])->name('hotels-delete');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries-index');
    Route::get('/countries/add', [CountryController::class, 'create'])->name('countries-create');
    Route::post('/countries/add', [CountryController::class, 'store'])->name('countries-store');
    Route::get('/countries/edit/{country}', [CountryController::class, 'edit'])->name('countries-edit');
    Route::put('/countries/edit/{country}', [CountryController::class, 'update'])->name('countries-update');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'delete'])->name('countries-delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
