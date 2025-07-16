<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Studente;
use App\Models\Classe;

class StudenteSeeder extends Seeder
{
    public function run(): void
    {
        $livelli = ['A1', 'A2', 'B1', 'B2', 'C1'];
        $orari = ['09:00', '11:00', '19:00'];
        $nazionalita = ['USA', 'Giappone', 'Francia', 'Germania', 'Spagna'];
        $sessi = ['M', 'F', 'Altro'];
        $occupazioni = ['Studente', 'Lavoratore', 'Altro'];

        $classi = Classe::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            Studente::create([
                'nome' => 'Studente' . $i,
                'cognome' => 'Demo' . $i,
                'email' => "studente$i@example.com",
                'telefono' => '34012345' . rand(10, 99),
                'cellulare' => '349' . rand(1000000, 9999999),
                'data_nascita' => now()->subYears(rand(18, 40))->subDays(rand(0, 365)),
                'nazionalita' => $nazionalita[array_rand($nazionalita)],
                'sesso' => $sessi[array_rand($sessi)],
                'occupazione' => $occupazioni[array_rand($occupazioni)],
                'codice_fiscale' => strtoupper(substr(md5($i), 0, 16)),
                'indirizzo_italia' => 'Via Roma ' . $i,
                'indirizzo_estero' => 'Foreign Street ' . $i,
                'civico' => (string)rand(1, 100),
                'cap' => '201' . rand(10, 99),
                'citta' => 'Milano',
                'codice_nazionale' => 'IT' . rand(1000, 9999),
                'numero_passaporto' => 'P' . rand(100000, 999999),
                'data_rilascio_passaporto' => now()->subYears(rand(1, 10)),
                'consenso_privacy' => rand(0, 1),
                'consenso_marketing' => rand(0, 1),
                'datapolicy' => rand(0, 1),
                'newsletter' => rand(0, 1),
                'liberatoria_foto' => rand(0, 1),
                'permesso_uscita' => rand(0, 1),
                'consenso_genitori' => rand(0, 1),
                'esenzione_attivita' => rand(0, 1),
                'livello' => $livelli[array_rand($livelli)],
                'orario' => $orari[array_rand($orari)],
                'classe_id' => $classi[array_rand($classi)],
                'note' => 'Note generiche per studente ' . $i,
            ]);
        }
    }
}
