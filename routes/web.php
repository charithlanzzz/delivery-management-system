<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryRequestController;

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
    return view('home');
})->name('home');

Route::prefix('delivery-requests')->group(function () {
    Route::get('/', [DeliveryRequestController::class, 'index'])->name('delivery.requests.index'); 
    Route::get('/create', [DeliveryRequestController::class, 'create'])->name('delivery.requests.create'); 
    Route::post('/', [DeliveryRequestController::class, 'store'])->name('delivery.requests.store'); 
    Route::post('/{id}/cancel', [DeliveryRequestController::class, 'cancel'])->name('delivery.requests.cancel');
});
