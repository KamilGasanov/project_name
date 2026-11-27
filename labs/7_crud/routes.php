<?php

use App\Http\Controllers\ArticleCrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleCrudController::class, 'index'])->name('home');
Route::resource('articles', ArticleCrudController::class)->except('index');

require base_path('labs/3_main/info-routes.php');
