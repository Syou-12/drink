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
Route::get('/create',[App\Http\Controllers\DrinkController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\DrinkController::class, 'store'])->name('store');
Route::get('/drink/{id}', 'App\Http\Controllers\DrinkController@showDetail')->name('show');
Route::get('/drink/edit/{id}', 'App\Http\Controllers\DrinkController@showEdit')->name('edit');
Route::get('/update/{id}', [App\Http\Controllers\DrinkController::class, 'update'])->name('drink.update');
Route::post('/update/{id}', [App\Http\Controllers\DrinkController::class, 'update'])->name('drink.update');
Route::get('/destroy{drink}', [App\Http\Controllers\DrinkController::class, 'destroy'])->name('drink.destroy');
Route::get('/destroy{id}', [App\Http\Controllers\DrinkController::class, 'destroy'])->name('drink.delete');




