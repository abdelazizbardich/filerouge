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
    Route::post('/login', [App\Http\Controllers\userController::class,'login']);

    Route::get('/', [App\Http\Controllers\userController::class,'get']);
    Route::get('/{id}', [App\Http\Controllers\userController::class,'find']);

    Route::delete('/{id}', [App\Http\Controllers\userController::class,'delete']);
    Route::post('/{id}', [App\Http\Controllers\userController::class,'update']);
});

Route::prefix('/product')->group(function () {
    Route::get('/', [App\Http\Controllers\productController::class,'get']);
    Route::get('/inslide', [App\Http\Controllers\productController::class,'getSlide']);
    Route::get('/{id}', [App\Http\Controllers\productController::class,'find']);
    Route::get('/catergoy/{id}/{limit}/{pid}', [App\Http\Controllers\productController::class,'getByCategroy']);
    Route::post('/', [App\Http\Controllers\productController::class,'create']);
    Route::post('/{id}', [App\Http\Controllers\productController::class,'update']);
    Route::delete('/{id}', [App\Http\Controllers\productController::class,'delete']);
});

Route::prefix('category')->group(function () {
    Route::post('/',[App\Http\Controllers\categoryController::class,'create']);
    Route::get('/{id}',[App\Http\Controllers\categoryController::class,'find']);
    Route::get('/',[App\Http\Controllers\categoryController::class,'get']);
    Route::delete('/{id}',[App\Http\Controllers\categoryController::class,'delete']);
    Route::post('/{id}',[App\Http\Controllers\categoryController::class,'update']);
});


Route::post('/cart/checkout', [App\Http\Controllers\CartController::class,'checkout']);

Route::post('/contact', [App\Http\Controllers\siteController::class,'contact']);

Route::get('/token', [App\Http\Controllers\userController::class,'getToken'] );
