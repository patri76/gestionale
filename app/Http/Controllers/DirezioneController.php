<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Studente;
use Illuminate\Support\Facades\DB;

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

        $numClassiAttive = $classi->count();

        // Conteggio studenti per fascia oraria
        $studentiPerOrario = [
            '09:00' => Studente::where('orario', '09:00')->whereNotNull('classe_id')->count(),
            '11:00' => Studente::where('orario', '11:00')->whereNotNull('classe_id')->count(),
            '19:00' => Studente::where('orario', '19:00')->whereNotNull('classe_id')->count(),
        ];

        // Studenti privati (senza classe associata)
        $studentiPrivati = Studente::whereNull('classe_id')->count();

        // Grafico: distribuzione per livello
        $studentiPerLivello = Studente::selectRaw('livello, count(*) as totale')
            ->groupBy('livello')
            ->pluck('totale', 'livello');

        $labelsLivelli = $studentiPerLivello->keys();
        $dataLivelli = $studentiPerLivello->values();

        // Grafico: distribuzione per nazionalità
        $studentiPerNazionalita = Studente::selectRaw('nazionalita, count(*) as totale')
            ->groupBy('nazionalita')
            ->pluck('totale', 'nazionalita');

        $labelsNazionalita = $studentiPerNazionalita->keys();
        $dataNazionalita = $studentiPerNazionalita->values();

        // Percentuali per torta nazionalità
        $totaleStudenti = $studentiPerNazionalita->sum();
        $percentualiNazionalita = $studentiPerNazionalita->map(function ($valore) use ($totaleStudenti) {
            return round(($valore / $totaleStudenti) * 100, 1);
        });

        // Classi attive per mese e orario (per grafico)
        $classiAttivePerMeseOrario = Classe::selectRaw('periodo, orario, count(*) as totale')
            ->where('attiva', true)
            ->groupBy('periodo', 'orario')
            ->get();

        // Conteggio studenti per ogni classe
        $studentiPerClasse = Studente::select('classe_id', DB::raw('count(*) as totale'))
            ->groupBy('classe_id')
            ->pluck('totale', 'classe_id');

        return view('dashboard.direzione', compact(
            'classi',
            'periodo',
            'numClassiAttive',
            'studentiPerOrario',
            'studentiPrivati',
            'labelsLivelli',
            'dataLivelli',
            'labelsNazionalita',
            'dataNazionalita',
            'percentualiNazionalita',
            'classiAttivePerMeseOrario',
            'studentiPerClasse'
        ));
    }
}
