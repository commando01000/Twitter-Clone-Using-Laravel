<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikesController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'idea'], function () {
    // ideas routes
    Route::post('/', [IdeaController::class, 'insert'])->name('idea.insertIdea');
    Route::delete('/{idea}', [IdeaController::class, 'delete'])->name('idea.deleteIdea')->middleware('auth');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('idea.showIdea');
    Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.editIdea')->middleware('auth');
    Route::put('/{idea}', [IdeaController::class, 'update'])->name('idea.updateIdea')->middleware('auth');
    // comments routes
    Route::post('/{idea}/comments', [CommentController::class, 'insert'])->name('idea.comment.insertComment')->middleware('auth');
});
//authentication routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'insert'])->name('registerInsert');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// resources
Route::resource('users', userController::class)->only(['update', 'show', 'edit'])->middleware('auth');

//profile routes
Route::get('/profile', [userController::class, 'profile'])->name('profile')->middleware('auth');

//follow routes
Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow')->middleware('auth');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow')->middleware('auth');

//like routes
Route::post('/ideas/{idea}/like', [IdeaLikesController::class, 'like'])->name('idea.like')->middleware('auth');
Route::post('/users/{idea}/unlike', [IdeaLikesController::class, 'unlike'])->name('idea.unlike')->middleware('auth');
