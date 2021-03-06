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

Route::get('/login', [App\Http\Controllers\dashboard\loginController::class,'index'])->name('login');
Route::post('/login', [App\Http\Controllers\dashboard\loginController::class,'login']);
Route::get('/logout', [App\Http\Controllers\dashboard\loginController::class,'logout']);


Route::prefix('/dashboard')->middleware(['adminAuth'])->group(function () {
    Route::get('/', [App\Http\Controllers\dashboard\homeController::class,'index']);
    Route::prefix('/product')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\productController::class,'index']);
        Route::get('/category/{id}', [App\Http\Controllers\dashboard\productController::class,'getByCategory']);
        Route::get('/add', [App\Http\Controllers\dashboard\productController::class,'add']);
        Route::post('/add', [App\Http\Controllers\dashboard\productController::class,'store']);
        Route::get('/edit/{id}',[App\Http\Controllers\dashboard\productController::class,'edit']);
        Route::post('/edit/{id}',[App\Http\Controllers\dashboard\productController::class,'update']);
        Route::get('/delete/{id}',[App\Http\Controllers\dashboard\productController::class,'destroy']);
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

    Route::prefix('/order')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\orderController::class,'index']);
        Route::get('/delete/{id}', [App\Http\Controllers\dashboard\orderController::class,'delete']);
        Route::get('/finished/{id}', [App\Http\Controllers\dashboard\orderController::class,'setFinished']);
        Route::get('/approve/{id}', [App\Http\Controllers\dashboard\orderController::class,'approve']);
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', [App\Http\Controllers\dashboard\userController::class,'index']);
        Route::get('/profile', [App\Http\Controllers\dashboard\userController::class,'profile']);
        Route::get('/suspend/{id}', [App\Http\Controllers\dashboard\userController::class,'suspend']);
        Route::get('/activate/{id}', [App\Http\Controllers\dashboard\userController::class,'activate']);
        Route::post('/profile/update', [App\Http\Controllers\dashboard\userController::class,'updateProfile']);
    });
});

Route::get('/{any}', function ($any) {return view('index');})->where('any', '.*');
