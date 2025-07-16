<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studente extends Model
{
    use HasFactory;

    protected $table = 'students'; // 👈 Indica il nome corretto della tabella

    protected $fillable = [
        'nome',
        'cognome',
        'data_nascita',
        'nazionalita',
        'email',
        'telefono',
        'numero_passaporto',
        'data_rilascio_passaporto',
        'indirizzo_italia',
        'indirizzo_estero',
        'codice_fiscale',
        'consenso_privacy',
        'consenso_marketing',
        'classe_id',
    ];
}
