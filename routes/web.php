<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-direzione', fn() => view('dashboard.direzione'));
    Route::get('/dashboard-insegnante', fn() => view('dashboard.insegnante'));
    Route::get('/dashboard-studente', fn() => view('dashboard.studente'));
});
