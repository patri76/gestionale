<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studente;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $fasce = ['09:00', '11:00', '19:00'];

        for ($i = 1; $i <= 15; $i++) {
            Studente::create([
                'nome' => 'Studente' . $i,
                'cognome' => 'Cognome' . $i,
                'data_nascita' => '1990-01-01',
                'nazionalita' => 'Italiana',
                'email' => "studente{$i}@mail.com",
                'telefono' => '1234567890',
                'numero_passaporto' => 'P' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'data_rilascio_passaporto' => now()->subYears(5),
                'indirizzo_italia' => 'Via Roma 1, Milano',
                'indirizzo_estero' => '123 Main St, New York',
                'codice_fiscale' => 'ABCDEF90H01H501Z',
                'consenso_privacy' => true,
                'consenso_marketing' => $i % 2 === 0,
                'classe_id' => null,
                'livello' => 'A2',
                'orario' => $fasce[array_rand($fasce)],
            ]);
        }
    }
}
