<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('3_main')->name('lab3.')->group(base_path('labs/3_main/routes.php'));

Route::prefix('4_preview')->name('lab4.')->group(base_path('labs/4_preview/routes.php'));

Route::prefix('5_reg')->name('lab5.')->group(base_path('labs/5_reg/routes.php'));

Route::prefix('6_articles')->name('lab6.')->group(base_path('labs/6_articles/routes.php'));

Route::prefix('7_crud')->name('lab7.')->group(base_path('labs/7_crud/routes.php'));

Route::prefix('8_hw3')->name('lab8.')->group(base_path('labs/8_hw3/routes.php'));
