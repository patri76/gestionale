<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classe;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classe::create([
            'nome' => 'GM40A',
            'periodo' => 'giugno 2025',
            'attiva' => true,
        ]);

        Classe::create([
            'nome' => 'GM40B',
            'periodo' => 'giugno 2025',
            'attiva' => true,
        ]);

        Classe::create([
            'nome' => 'SG30LM',
            'periodo' => 'luglio 2025',
            'attiva' => false,
        ]);
    }
}
