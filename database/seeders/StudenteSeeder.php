<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studente;
use App\Models\Classe;

class StudenteSeeder extends Seeder
{
    public function run(): void
    {
        // Rimuove solo gli studenti di test con email "studenteX@example.com"
        Studente::where('email', 'like', 'studente%@example.com')->delete();

        $livelli = ['A1', 'A2', 'B1', 'B2', 'C1'];
        $nazionalita = ['USA', 'Giappone', 'Francia', 'Germania', 'Spagna'];
        $classi = Classe::all();

        foreach (range(1, 60) as $i) {
            $classe = $classi->random();
            Studente::create([
                'nome' => "Studente$i",
                'cognome' => "Demo$i",
                'email' => "studente$i@example.com",
                'telefono' => '34012345' . rand(10, 99),
                'data_nascita' => now()->subYears(rand(18, 40)),
                'nazionalita' => $nazionalita[array_rand($nazionalita)],
                'orario' => $classe->orario,
                'livello' => $livelli[array_rand($livelli)],
                'classe_id' => $classe->id,
            ]);
        }
    }
}
