<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function(){
    return view('pages.user.index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::middleware('admin')->prefix('admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('wisata', function(){
            return view('pages.dashboard.wisata.index');
        })->name('wisata.index');
        Route::get('wisata/create', function(){
            return view('pages.dashboard.wisata.create');
        })->name('wisata.create');
        Route::get('hotel', function(){
            return view('pages.dashboard.hotel.index');
        })->name('hotel.index');
    });
    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});