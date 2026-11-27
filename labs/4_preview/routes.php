<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/galery/{article}', [MainController::class, 'galery'])
    ->whereNumber('article')
    ->name('galery');

require base_path('labs/3_main/info-routes.php');
