<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/terms', function () {
    return view('terms');
});
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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
