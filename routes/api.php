<?php

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

Route::prefix('/user')->group(function () {
    Route::post('/signup', [App\Http\Controllers\userController::class,'create']);
});

Route::prefix('/product')->group(function () {
    Route::get('/{id}', [App\Http\Controllers\productController::class,'find']);
    Route::post('/add', [App\Http\Controllers\productController::class,'create']);
});

Route::prefix('category')->group(function () {
    Route::post('/add',[App\Http\Controllers\categoryController::class,'create']);
});
