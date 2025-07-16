<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Studente;
use Carbon\Carbon;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'codice_corso',
        'livello',
        'orario',
        'inizio',
        'fine',
        'periodo',
        'attiva',
        'tipo',
        'insegnante_id'
    ];

    /**
     * Relazione con l'insegnante (User)
     */
    public function insegnante()
    {
        return $this->belongsTo(User::class, 'insegnante_id');
    }

    /**
     * Relazione con gli studenti
     */
    public function studenti()
    {
        return $this->hasMany(Studente::class, 'classe_id');
    }

    /**
     * Accessor per ottenere il nome dell’insegnante
     */
    public function getNomeInsegnanteAttribute()
    {
        return $this->insegnante ? $this->insegnante->nome : '??';
    }

    /**
     * Accessor per ottenere il numero di studenti nella classe
     */
    public function getNumeroStudentiAttribute()
    {
        return $this->studenti()->count();
    }
}
