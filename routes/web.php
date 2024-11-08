<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileTweetsController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::resource('tweets', TweetController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('tweets', [TweetController::class, 'index'])->middleware(['auth', 'verified'])->name('tweets');
Route::get('/tweets/{id}', [TweetController::class, 'show'])->name('tweets.show');


Route::resource('profilePage', ProfileTweetsController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('explore', ExploreController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('tweets/{tweet}/comment', [CommentController::class, 'store'])->name('tweets.comments.store');
Route::get('/comment/{tweet}', [CommentController::class, 'index']);
Route::get('tweets/comment/{tweet}', [CommentController::class, 'index']);

Route::get('explore/search', [ExploreController::class, 'search'])->name('explore.search');

require __DIR__ . '/auth.php';
