<div class="container py-4">

    {{-- 🔍 FILTRI --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <input type="text" wire:model.debounce.500ms="mese" placeholder="Filtro per mese (es. giugno)" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="number" wire:model="settimana" placeholder="Settimana n°" class="form-control" />
        </div>
        <div class="col-md-3">
            <select wire:model="orario" class="form-select">
                <option value="">Tutti gli orari</option>
                <option value="A">09:00</option>
                <option value="B">11:00</option>
                <option value="C">19:00</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="text" wire:model.debounce.500ms="codice" placeholder="Codice (es. GM40)" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="text" wire:model.debounce.500ms="livello" placeholder="Livello (es. 1)" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="text" wire:model.debounce.500ms="insegnante" placeholder="Insegnante (es. Matteo)" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="number" wire:model="studentiMin" placeholder="Studenti min" class="form-control" />
        </div>
        <div class="col-md-3">
            <input type="number" wire:model="studentiMax" placeholder="Studenti max" class="form-control" />
        </div>
    </div>

    {{-- 📊 TABELLA RISULTATI --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Codice Classe</th>
                    <th>Orario</th>
                    <th>Studenti</th>
                    <th>Mese</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classi as $classe)
                    <tr>
                        <td>{{ $classe['codice'] }}</td>
                        <td>{{ $classe['orario'] }}</td>
                        <td>{{ $classe['studenti'] }}</td>
                        <td>{{ $classe['mese'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Nessuna classe trovata con questi filtri.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
