<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studente;

class StudenteSeeder extends Seeder
{
    public function run(): void
    {
        $livelli = ['A1', 'A2', 'B1', 'B2', 'C1'];
        $orari = ['09:00', '11:00', '19:00'];
        $nazionalita = ['USA', 'Giappone', 'Francia', 'Germania', 'Spagna'];

        for ($i = 1; $i <= 50; $i++) {
            Studente::create([
                'nome' => 'Studente' . $i,
                'cognome' => 'Demo' . $i,
                'email' => "studente$i@example.com",
                'telefono' => '34012345' . rand(10, 99),
                'data_nascita' => now()->subYears(rand(18, 40)),
                'nazionalita' => $nazionalita[array_rand($nazionalita)],
                'orario' => $orari[array_rand($orari)],
                'livello' => $livelli[array_rand($livelli)],
            ]);
        }
    }
}
