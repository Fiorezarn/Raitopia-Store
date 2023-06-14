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
Route::get('/dashboard',[ProductController::class,'index'])->name('dashboard');
Route::get('/dashboard/detailitem/{id}', [ProductController::class, 'detail']);
Route::get('/dashboard/add',[ProductController::class,'add']);
Route::post('/dashboard/insert',[ProductController::class,'insert']);
Route::get('/dashboard/edit/{id}',[ProductController::class,'edit']);
Route::post('/dashboard/update/{id}',[ProductController::class,'update']);
Route::get('/dashboard/delete/{id}',[ProductController::class,'delete']);
//////////////////////////////////////////////////////////////////////////////////////////////
