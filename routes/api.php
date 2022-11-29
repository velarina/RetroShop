<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VoucherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products', [ProductController::class, 'update']);
Route::delete('/products', [ProductController::class, 'destroy']);

Route::get('/voucher', [VoucherController::class, 'index']);
Route::get('/voucher/{id}', [VoucherController::class, 'show']);
Route::post('/voucher', [VoucherController::class, 'store']);
Route::put('/voucher', [VoucherController::class, 'update']);
Route::delete('/voucher', [VoucherController::class, 'destroy']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category', [CategoryController::class, 'update']);
Route::delete('/category', [CategoryController::class, 'destroy']);

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/{id}', [TransactionController::class, 'show']);
Route::post('/transaction', [TransactionController::class, 'store']);
Route::put('/transaction', [TransactionController::class, 'update']);
Route::delete('/transaction', [TransactionController::class, 'destroy']);
