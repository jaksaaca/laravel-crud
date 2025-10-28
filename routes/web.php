<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [BookController::class, 'index'])->name('book.index');
Route::post('/', [BookController::class, 'store'])->name('book.store');