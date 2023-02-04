<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/home', [FrontController::class, 'home'])->name('home')->middleware('roles:customer');

Route::middleware('roles:admin')->prefix('admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('show-back-orders');
    Route::post('/orders', [OrderController::class, 'updateOrder'])->name('update-back-order');

    Route::get('/hotels', [HotelController::class, 'showHotels'])->name('show-back-hotels');
    Route::get('/hotels/add', [HotelController::class, 'addHotel'])->name('add-back-hotel');
    Route::post('/hotels/store', [HotelController::class, 'storeHotel'])->name('store-back-hotel');
    Route::get('/hotels/edit', [HotelController::class, 'editHotel'])->name('edit-back-hotel');
    Route::post('/hotels/update', [HotelController::class, 'updateHotel'])->name('update-back-hotel');
    Route::post('/hotels/delete', [HotelController::class, 'deleteHotel'])->name('delete-back-hotel');

    Route::get('/countries', [CountryController::class, 'showCountries'])->name('show-back-countries');
    Route::get('/countries/add', [CountryController::class, 'addCountry'])->name('add-back-country');
    Route::post('/countries/store', [CountryController::class, 'storeCountry'])->name('store-back-country');
    Route::get('/countries/edit', [CountryController::class, 'editCountry'])->name('edit-back-country');
    Route::post('/countries/update', [CountryController::class, 'updateCountry'])->name('update-back-country');
    Route::post('/countries/delete', [CountryController::class, 'deleteCountry'])->name('delete-back-country');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
