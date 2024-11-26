<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileTweetsController;
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

Route::resource('profilePage', ProfileTweetsController::class)
    ->only(['index', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('explore', ExploreController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profileEdit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profileEdit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profileEdit', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::patch('/profile/imageBioUpdate', [ProfileController::class, 'imageBioUpdate'])->name('profile.imageBioUpdate');

Route::post('tweets/{tweet}/comment', [CommentController::class, 'store'])->name('tweets.comments.store');
Route::get('/comment/{tweet}', [CommentController::class, 'index']);
Route::get('tweets/comment/{tweet}', [CommentController::class, 'index']);

Route::get('explore/search', [ExploreController::class, 'search'])->name('explore.search');

require __DIR__ . '/auth.php';
