<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studente extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        // Dati anagrafici
        'nome',
        'cognome',
        'data_nascita',
        'sesso',
        'nazionalita',
        'occupazione',

        // Contatti
        'email',
        'telefono',
        'cellulare',

        // Passaporto
        'numero_passaporto',
        'data_rilascio_passaporto',

        // Indirizzi
        'indirizzo_italia',
        'indirizzo_estero',
        'civico',
        'cap',
        'citta',
        'codice_nazionale',

        // Codice fiscale e consensi
        'codice_fiscale',
        'consenso_privacy',
        'consenso_marketing',
        'datapolicy',
        'newsletter',
        'liberatoria_foto',
        'permesso_uscita',
        'consenso_genitori',
        'esenzione_attivita',

        // Note
        'note',

        // Didattica
        'classe_id',
        'livello',
        'orario',
    ];

    /**
     * Ogni studente appartiene a una classe (gruppo o privata).
     */
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
