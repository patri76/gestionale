<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studente;

class StudentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $fasce = ['09:00', '11:00', '19:00'];
        $livelli = ['A1', 'A2', 'B1', 'B2', 'C1'];
        $nazionalita = ['Italiana', 'Francese', 'Tedesca', 'Giapponese', 'Statunitense', 'Brasiliana'];

        for ($i = 1; $i <= 60; $i++) {
            Studente::create([
                'nome' => 'Studente' . $i,
                'cognome' => 'Cognome' . $i,
                'data_nascita' => now()->subYears(rand(18, 50)),
                'nazionalita' => $nazionalita[array_rand($nazionalita)],
                'email' => "studente{$i}@mail.com",
                'telefono' => '12345678' . rand(10, 99),
                'numero_passaporto' => 'P' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'data_rilascio_passaporto' => now()->subYears(rand(1, 10)),
                'indirizzo_italia' => 'Via Italia ' . $i,
                'indirizzo_estero' => 'Estero ' . $i,
                'codice_fiscale' => 'ABCDEF' . rand(10, 99) . 'H01H501Z',
                'consenso_privacy' => true,
                'consenso_marketing' => $i % 2 === 0,
                'classe_id' => null, // puoi aggiungere classi più avanti
                'livello' => $livelli[array_rand($livelli)],
                'orario' => $fasce[array_rand($fasce)],
            ]);
        }
    }
}
