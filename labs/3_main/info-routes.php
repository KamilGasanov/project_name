<?php

use Illuminate\Support\Facades\Route;

Route::view('/about', 'lab3::about')->name('about');

Route::get('/contacts', function () {
    $contacts = [
        ['label' => 'Электронная почта', 'value' => 'info@example.org'],
        ['label' => 'Часы для связи', 'value' => 'Пн–Пт, 09:00–18:00'],
    ];

    return view('lab3::contacts', ['contacts' => $contacts]);
})->name('contacts');
