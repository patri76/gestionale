<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classe;
use App\Models\User;

class ClasseSeeder extends Seeder
{
    public function run(): void
    {
        // Ottieni gli ID degli insegnanti dalla colonna 'name'
        $insegnanti = User::whereIn('name', [
            'Roberto', 'Alessandro', 'Barbara', 'Cristina', 'Elisabetta',
            'Matteo', 'Marco', 'Giacomo', 'Grazia', 'Giuseppina',
            'Giovanna', 'Simone', 'Fabio', 'Samantha', 'Beatrice'
        ])->get()->pluck('id', 'name');

        // Classi di gruppo
        Classe::create([
            'nome' => 'GM40A',
            'codice_corso' => 'GM40',
            'livello' => 'A1',
            'orario' => 'A',
            'inizio' => '2025-06-03',
            'fine' => '2025-06-28',
            'periodo' => 'giugno 2025',
            'attiva' => true,
            'tipo' => 'gruppo',
            'insegnante_id' => $insegnanti['Roberto'] ?? null
        ]);

        Classe::create([
            'nome' => 'GM40B',
            'codice_corso' => 'GM40',
            'livello' => 'B1',
            'orario' => 'B',
            'inizio' => '2025-06-03',
            'fine' => '2025-06-28',
            'periodo' => 'giugno 2025',
            'attiva' => true,
            'tipo' => 'gruppo',
            'insegnante_id' => $insegnanti['Barbara'] ?? null
        ]);

        Classe::create([
            'nome' => 'GS30C',
            'codice_corso' => 'GS30',
            'livello' => 'C1',
            'orario' => 'C',
            'inizio' => '2025-07-01',
            'fine' => '2025-09-06',
            'periodo' => 'luglio 2025',
            'attiva' => false,
            'tipo' => 'gruppo',
            'insegnante_id' => $insegnanti['Cristina'] ?? null
        ]);

        // Classi private (senza orario)
        Classe::create([
            'nome' => 'PRIV-A2-1',
            'codice_corso' => 'PRIV',
            'livello' => 'A2',
            'orario' => null,
            'inizio' => '2025-06-10',
            'fine' => '2025-07-10',
            'periodo' => 'giugno 2025',
            'attiva' => true,
            'tipo' => 'privata',
            'insegnante_id' => $insegnanti['Marco'] ?? null
        ]);

        Classe::create([
            'nome' => 'PRIV-B2-1',
            'codice_corso' => 'PRIV',
            'livello' => 'B2',
            'orario' => null,
            'inizio' => '2025-07-15',
            'fine' => '2025-08-15',
            'periodo' => 'luglio 2025',
            'attiva' => true,
            'tipo' => 'privata',
            'insegnante_id' => $insegnanti['Giovanna'] ?? null
        ]);
    }
}
