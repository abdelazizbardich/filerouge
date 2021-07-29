<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('index');
});
Route::prefix('/dashboard')->group(function () {
    Route::prefix('product')->group(function () {
        Route::get('/', function () {return view("dashboard.product.all");});
        Route::get('/add', function () {return view("dashboard.product.add");});
        Route::get('/edit', function () {return view("dashboard.product.edit");});
    });
});
Route::get('/{any}', function ($any) {return view('index');})->where('any', '.*');
