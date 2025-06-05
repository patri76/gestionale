<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studente;

class IscrizioneController extends Controller
{
    public function create()
    {
        return view('iscrizioni.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_nascita' => 'required|date',
            'sesso' => 'nullable|string',
            'nazione' => 'nullable|string',
            'email' => 'required|email',
            'telefono' => 'required|string|max:30',
            // Aggiungi le altre validazioni se necessario
        ]);

        $studente = new Studente();
        $studente->fill($validated);
        $studente->save();

        return redirect()->route('iscrizioni.create')->with('success', 'Iscrizione salvata con successo!');
    }
}
