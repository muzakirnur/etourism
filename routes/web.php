<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HotelController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Http\Controllers\User\WisataController;
use App\Http\Controllers\UserController;

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

Route::redirect('/', 'login');

Route::get('contact', function(){
    return view('pages.user.contact.index');
})->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('home', [UserUserController::class, 'index'])->name('index');
    Route::get('wisata', [WisataController::class, 'index'])->name('user.wisata.index');
    Route::get('wisata/{id}', [WisataController::class, 'show'])->name('user.wisata.show');
    Route::get('hotel', [HotelController::class, 'index'])->name('hotel.user.index');
    Route::get('hotel/{id}', [HotelController::class, 'show'])->name('hotel.user.show');

    Route::middleware('admin')->prefix('admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('user', [UserController::class, 'index'])->name('user.index');

        /* Route for Wisata */
        Route::get('wisata', function(){
            return view('pages.dashboard.wisata.index');
        })->name('wisata.index');
        Route::get('wisata/create', function(){
            return view('pages.dashboard.wisata.create');
        })->name('wisata.create');

        /* Route for Hotel */
        Route::get('hotel', function(){
            return view('pages.dashboard.hotel.index');
        })->name('hotel.index');
        Route::get('hotel/create', function(){
            return view('pages.dashboard.hotel.create');
        })->name('hotel.create');
    });
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});