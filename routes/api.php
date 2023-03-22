<?php

use App\Http\Controllers\OrderController;
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


Route::match(['get', 'post'],'/midresponse', [OrderController::class, 'midtrans_response'])->name('order.midresponse');
Route::match(['get', 'post'],'/finresponse', [OrderController::class, 'finishedpayment'])->name('order.finish');
Route::match(['get', 'post'],'/unfinresponse', [OrderController::class, 'unfinishedpayment'])->name('order.unfinish');
Route::match(['get', 'post'],'/errfinresponse', [OrderController::class, 'errfinishedpayment'])->name('order.errfinish');
