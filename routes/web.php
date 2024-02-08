<?php

use App\Http\Controllers\TroliController;
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

Route::get('/', [TroliController::class, 'index']);
Route::post('/apply-promo', [TroliController::class, 'applyPromo']);
Route::get('/increase-quantity/{id}', [TroliController::class, 'increaseQuantity']);
Route::get('/decrease-quantity/{id}', [TroliController::class, 'decreaseQuantity']);
Route::get('/delete-item/{id}', [TroliController::class, 'deleteItem']);
