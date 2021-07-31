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
    // Route::get('/', [App\Http\Controllers\dashboard\productController::class,'index']);
    Route::prefix('/product')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\productController::class,'index']);
        Route::get('/category/{id}', [App\Http\Controllers\dashboard\productController::class,'getByCategory']);
        Route::get('/add', [App\Http\Controllers\dashboard\productController::class,'add']);
        Route::post('/add', [App\Http\Controllers\dashboard\productController::class,'store']);
        Route::get('/edit', function () {return view("dashboard.product.edit");});
    });

    Route::prefix('/categories')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\categoryController::class,'index']);
        Route::get('/add', function(){return view('dashboard.category.add');});
        Route::post('/add', [App\Http\Controllers\dashboard\categoryController::class,'store']);
        Route::get('/delete/{id}', [App\Http\Controllers\dashboard\categoryController::class,'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\dashboard\categoryController::class,'getUpdate']);
        Route::post('/update/{id}', [App\Http\Controllers\dashboard\categoryController::class,'update']);
    });

    Route::prefix('/material')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\materialController::class,'index']);
        Route::get('/add', function(){return view('dashboard.material.add');});
        Route::post('/add', [App\Http\Controllers\dashboard\materialController::class,'store']);
        Route::get('/delete/{id}', [App\Http\Controllers\dashboard\materialController::class,'delete']);
        Route::get('/edit/{id}', [App\Http\Controllers\dashboard\materialController::class,'getUpdate']);
        Route::post('/update/{id}', [App\Http\Controllers\dashboard\materialController::class,'update']);
    });
});
Route::get('/{any}', function ($any) {return view('index');})->where('any', '.*');
