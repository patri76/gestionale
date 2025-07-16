<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classe;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClassiDashboard extends Component
{
    public $mese, $settimana, $orario, $codice, $livello, $insegnante, $studentiMin, $studentiMax;

    public function render()
    {
        $classi = Classe::with(['insegnante', 'studenti'])
            ->where('attiva', true)
            ->where('tipo', 'gruppo')
            ->when($this->mese, fn($q) => $q->whereMonth('inizio', Carbon::parse("1 {$this->mese}")->month))
            ->when($this->settimana, fn($q) => $q->whereBetween('inizio', [
                Carbon::now()->startOfWeek()->addWeeks($this->settimana - 1),
                Carbon::now()->startOfWeek()->addWeeks($this->settimana)->subDay()
            ]))
            ->when($this->orario, fn($q) => $q->where('orario', $this->orario))
            ->when($this->livello, fn($q) => $q->where('livello', $this->livello))
            ->get()
            ->map(function ($classe) {
                $codice = strtoupper($classe->codice_corso ?? '');
                $fascia = strtoupper($classe->orario);
                $livello = $classe->livello ?? 'X';
                $nome = strtoupper(Str::before($classe->insegnante->nome ?? '??', ' '));
                return [
                    'mese' => Carbon::parse($classe->inizio)->translatedFormat('F'),
                    'orario' => match ($fascia) {
                        'A' => '09:00',
                        'B' => '11:00',
                        'C' => '19:00',
                        default => '??',
                    },
                    'codice' => "$codice{$fascia}{$livello}{$nome}",
                    'studenti' => $classe->studenti->count()
                ];
            })->filter(function ($classe) {
                if ($this->codice && !Str::contains($classe['codice'], strtoupper($this->codice))) return false;
                if ($this->insegnante && !Str::contains($classe['codice'], strtoupper($this->insegnante))) return false;
                if ($this->studentiMin && $classe['studenti'] < $this->studentiMin) return false;
                if ($this->studentiMax && $classe['studenti'] > $this->studentiMax) return false;
                return true;
            });

        return view('livewire.classi-dashboard', ['classi' => $classi]);
    }
}
