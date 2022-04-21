<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\BookingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/car_booking_get', [BookingsController::class, 'car_booking_get']);
Route::get('/car_booking_update_current/{id}', [BookingsController::class, 'car_booking_update_current']);
Route::get('/car_booking_update_finished/{id}', [BookingsController::class, 'car_booking_update_finished']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
