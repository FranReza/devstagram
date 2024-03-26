<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta', [RegisterController::class, 'index']);

Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/muro', [PostController::class, 'index'])->name('posts.index');
