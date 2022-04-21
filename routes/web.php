<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingsController;

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


//  Public
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/queue', [BookingsController::class, 'queue'])->name('queue');

Route::get('/booking', [BookingsController::class, 'booking'])->name('booking');

Route::get('/booking_status/{input}/{username_hash}', [BookingsController::class, 'booking_status'])->name('booking_status');

Route::post('/booking_search', [BookingsController::class, 'booking_search']);

Route::post('/new_booking', [BookingsController::class, 'new_booking'])->name('new_booking');



//  Admin
Auth::routes();

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/logs', [AdminController::class, 'logs'])->name('logs');
Route::get('/manage_locations/{new}', [AdminController::class, 'logs'])->name('manage_locations');

