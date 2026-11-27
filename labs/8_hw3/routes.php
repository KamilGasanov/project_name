<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CommentController::class, 'articles'])->name('home');
Route::get('/articles/{article}', [CommentController::class, 'index'])->name('articles.show');
Route::resource('articles.comments', CommentController::class)
    ->only(['store', 'edit', 'update', 'destroy'])
    ->scoped(['comment' => 'id']);

require base_path('labs/3_main/info-routes.php');
