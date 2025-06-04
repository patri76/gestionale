<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Studente;

class DirezioneController extends Controller
{
    public function index(Request $request)
    {
        $periodo = $request->input('periodo');

        // Recupera classi attive filtrate per periodo (se selezionato)
        $classi = Classe::query()
            ->when($periodo, fn($q) => $q->where('periodo', $periodo))
            ->where('attiva', true)
            ->get();

        // Conteggio delle classi attive
        $numClassiAttive = Classe::where('attiva', true)->count();

        // Conteggio studenti per fascia oraria
        $studentiPerOrario = [
            '09:00' => Studente::where('orario', '09:00')->count(),
            '11:00' => Studente::where('orario', '11:00')->count(),
            '19:00' => Studente::where('orario', '19:00')->count(),
        ];

        // Dati per il grafico a barre: distribuzione per livello
        $studentiPerLivello = Studente::selectRaw('livello, count(*) as totale')
            ->groupBy('livello')
            ->pluck('totale', 'livello');

        $labelsLivelli = $studentiPerLivello->keys();
        $dataLivelli = $studentiPerLivello->values();

        // Dati per il grafico a torta: distribuzione per nazionalità
        $studentiPerNazionalita = Studente::selectRaw('nazionalita, count(*) as totale')
            ->groupBy('nazionalita')
            ->pluck('totale', 'nazionalita');

        $labelsNazionalita = $studentiPerNazionalita->keys();
        $dataNazionalita = $studentiPerNazionalita->values();

        // Passaggio dati alla vista
        return view('dashboard.direzione', compact(
            'classi',
            'periodo',
            'numClassiAttive',
            'studentiPerOrario',
            'labelsLivelli',
            'dataLivelli',
            'labelsNazionalita',
            'dataNazionalita'
        ));
    }
}
