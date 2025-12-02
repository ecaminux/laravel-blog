<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::resource('posts', App\Http\Controllers\PostController::class);
