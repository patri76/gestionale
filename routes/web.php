<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirezioneController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    // ✅ Dashboard collegata al controller
    Route::get('/dashboard-direzione', [DirezioneController::class, 'index'])->name('dashboard.direzione');

    // Altre dashboard (viste statiche)
    Route::get('/dashboard-insegnante', fn() => view('dashboard.insegnante'))->name('dashboard.insegnante');
    Route::get('/dashboard-studente', fn() => view('dashboard.studente'))->name('dashboard.studente');

    // Sezioni direzione
    Route::get('/direzione/studenti', fn() => 'Pagina Studenti')->name('direzione.studenti');
    Route::get('/direzione/corsi', fn() => 'Pagina Corsi')->name('direzione.corsi');
    Route::get('/direzione/certificati', fn() => 'Pagina Certificati')->name('direzione.certificati');
    Route::get('/direzione/insegnanti', fn() => 'Pagina Insegnanti')->name('direzione.insegnanti');
    Route::get('/direzione/registri', fn() => 'Pagina Registri')->name('direzione.registri');
    Route::get('/direzione/statistiche', fn() => 'Pagina Statistiche')->name('direzione.statistiche');
    Route::get('/direzione/certificati-liberi', fn() => 'Pagina Certificati Liberi')->name('direzione.certificati-liberi');
});
