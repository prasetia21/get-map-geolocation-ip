<?php

use App\Http\Controllers\GeoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('displaylocation', [UserController::class, 'index']);


Route::controller(GeoController::class)->group(function () {
    Route::get('/radius', 'index')->name('radius');
    Route::post('/store', 'storeLocation')->name('store.location');
});