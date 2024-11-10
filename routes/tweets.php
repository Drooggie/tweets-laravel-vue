<?php

use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Route;

Route::resource('tweets', TweetController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('tweets', [TweetController::class, 'index'])->middleware(['auth', 'verified'])->name('tweets');
Route::get('/tweets/{id}', [TweetController::class, 'show'])->name('tweets.show');
