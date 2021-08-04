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
    return view('welcome');
});
Route::prefix('admin')->group(function (){
    Route::get('/',[\App\Http\Controllers\BookController::class,'index'])->name('book.list');
    Route::get('/create',[\App\Http\Controllers\BookController::class,'create'])->name('book.create');
    Route::post('/create',[\App\Http\Controllers\BookController::class,'store'])->name('book.store');
    Route::get('/delete/{id}',[\App\Http\Controllers\BookController::class,'destroy'])->name('book.destroy');
});
