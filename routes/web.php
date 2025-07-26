<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
     return view('auth.login');
});

Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/product', [ProductController::class,'index'])->name('product.list');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::put('/product/{id}', [ProductController::class,'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class,'destroy'])->name('product.destroy');

Route::fallback(function () {
    return view('error');
});