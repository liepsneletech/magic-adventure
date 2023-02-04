<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
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
    Route::get('/orders', [BackController::class, 'showOrders'])->name('show-back-orders');
    Route::get('/hotels', [BackController::class, 'showHotels'])->name('show-back-hotels');
    Route::get('/countries', [BackController::class, 'showCountries'])->name('show-back-countries');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
