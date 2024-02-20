<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
Route::get('/create',[App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class,'showDetail'])->name('show');
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class,'showEdit'])->name('edit');
Route::get('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::post('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/destroy{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/destroy{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
Route::POST('/regist', [ArticleController::class, 'regist'])->name('regist');




