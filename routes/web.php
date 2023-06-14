<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

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

Route::get('/product', function () {
    return view('product');
});


//////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard',[ProductController::class,'index'])->name('dataitem');
Route::get('/dashboard/detailitem/{id}', [ProductController::class, 'detail']);
// Route::get('/dashboard/add',[ProductController::class,'add']);
// Route::post('/dataitem/insert',[ProductController::class,'insert']);
// Route::get('/dataitem/edit/{id}',[ProductController::class,'edit']);
// Route::post('/dataitem/update/{id}',[ProductController::class,'update']);
// Route::get('/dataitem/delete/{id}',[ProductController::class,'delete']);
//////////////////////////////////////////////////////////////////////////////////////////////
