<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/terms', function () {
    return view('terms');
});

Route::post('/idea', [IdeaController::class, 'insert'])->name('idea.insertIdea');

Route::post('/idea', [IdeaController::class, 'insert'])->name('idea.insertIdea');

Route::delete('/idea/{id}', [IdeaController::class, 'delete'])->name('idea.deleteIdea');

Route::get('idea/{idea}', [IdeaController::class, 'show'])->name('idea.showIdea');
Route::get('idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.editIdea');
Route::put('idea/{idea}', [IdeaController::class, 'update'])->name('idea.updateIdea');


Route::post('idea/{idea}/comments', [CommentController::class, 'insert'])->name('idea.comment.insertComment');

