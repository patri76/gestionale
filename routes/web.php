<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

// ✅ Homepage con logo e pulsanti
Route::get('/', function () {
    return view('welcome'); // oppure 'home', se usi un'altra view
})->name('home');

// ✅ Attiva manualmente le view Fortify
Fortify::loginView(fn () => view('auth.login'));
Fortify::registerView(fn () => view('auth.register'));

// ✅ Route delle dashboard protette
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard-direzione', fn () => view('dashboard.direzione'));
    Route::get('/dashboard-insegnante', fn () => view('dashboard.insegnante'));
    Route::get('/dashboard-studente', fn () => view('dashboard.studente'));
});
