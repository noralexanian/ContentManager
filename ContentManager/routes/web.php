<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'home']);
Route::resource('articles', ArticleController::class);
// Route::resource('articles', ArticleController::class)->except(['create', 'edit']);

// Route::get('/articles/create', [ArticleController::class, 'create']);
// Route::post('/articles', [ArticleController::class, 'store']);
// Route::get('/articles/{slug}', [ArticleController::class, 'show']);
// Route::get('/articles/{slug}/edit', [ArticleController::class, 'edit']);
// Route::put('/articles/{slug}', [ArticleController::class, 'update']);
// Route::delete('/articles/{slug}', [ArticleController::class, 'destroy']);
