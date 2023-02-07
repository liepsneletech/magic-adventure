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

Route::middleware('roles:admin')->prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin-orders-index');
    Route::get('/orders/{order}', [OrderController::class, 'edit'])->name('admin-orders-edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('admin-orders-update');

    Route::get('/offers', [OfferController::class, 'index'])->name('admin-offers-index');
    Route::get('/offers/add', [OfferController::class, 'create'])->name('admin-offers-create');
    Route::post('/offers/add', [OfferController::class, 'store'])->name('admin-offers-store');
    Route::get('/offers/edit/{offer}', [OfferController::class, 'index'])->name('admin-offers-edit');
    Route::put('/offers/edit/{offer}', [OfferController::class, 'index'])->name('admin-offers-update');
    Route::delete('/offers/delete/{offer}', [OfferController::class, 'delete'])->name('admin-offers-delete');

    Route::get('/hotels', [HotelController::class, 'index'])->name('admin-hotels-index');
    Route::get('/hotels/add', [HotelController::class, 'create'])->name('admin-hotels-create');
    Route::post('/hotels/add', [HotelController::class, 'store'])->name('admin-hotels-store');
    Route::get('/hotels/edit/{hotel}', [HotelController::class, 'edit'])->name('admin-hotels-edit');
    Route::put('/hotels/edit/{hotel}', [HotelController::class, 'update'])->name('admin-hotels-update');
    Route::delete('/hotels/delete/{hotel}', [HotelController::class, 'delete'])->name('admin-hotels-delete');

    Route::get('/countries', [CountryController::class, 'index'])->name('admin-countries-index');
    Route::get('/countries/add', [CountryController::class, 'create'])->name('admin-countries-create');
    Route::post('/countries/add', [CountryController::class, 'store'])->name('admin-countries-store');
    Route::get('/countries/edit/{country}', [CountryController::class, 'edit'])->name('admin-countries-edit');
    Route::put('/countries/edit/{country}', [CountryController::class, 'update'])->name('admin-countries-update');
    Route::delete('/countries/delete/{country}', [CountryController::class, 'delete'])->name('admin-countries-delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
