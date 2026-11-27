<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'lab3::home')->name('home');

require __DIR__.'/info-routes.php';
