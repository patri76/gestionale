<x-layout>
    @section('title', 'Nuova iscrizione')

    <div class="container-fluid bg-info text-white py-3 rounded">
      <h2 class="mb-3">Studente - Nuova Iscrizione</h2>

      <form method="POST" action="{{ route('iscrizioni.store') }}">
        @csrf

        <div class="row">
          {{-- Colonna sinistra --}}
          <div class="col-md-4">
            <h5>Studente</h5>

            <div class="mb-2">
              <label>Nome</label>
              <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Cognome</label>
              <input type="text" name="cognome" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Data di nascita</label>
              <input type="date" name="data_nascita" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Sesso</label>
              <select name="sesso" class="form-control">
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
                <option value="Altro">Altro</option>
              </select>
            </div>

            <div class="mb-2">
              <label>Nazionalità</label>
              <input type="text" name="nazione" class="form-control">
            </div>

            <div class="mb-2">
              <label>Occupazione</label>
              <select name="occupazione" class="form-control">
                <option>Studente</option>
                <option>Lavoratore</option>
                <option>Altro</option>
              </select>
            </div>

            <div class="mb-2">
              <label>Livello studente</label>
              <input type="text" name="livello" class="form-control">
            </div>

            <hr>

            <h5>Consensi</h5>
            @foreach (['datapolicy', 'newsletter', 'liberatoria_foto', 'permesso_uscita', 'consenso_genitori', 'esenzione_attivita'] as $consenso)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $consenso }}" value="1">
                <label class="form-check-label">{{ ucfirst(str_replace('_', ' ', $consenso)) }}</label>
              </div>
            @endforeach

            <hr>

            <h5>Dati anagrafici</h5>
            <div class="mb-2"><label>Indirizzo</label><input type="text" name="indirizzo" class="form-control"></div>
            <div class="mb-2"><label>Civico</label><input type="text" name="civico" class="form-control"></div>
            <div class="mb-2"><label>CAP</label><input type="text" name="cap" class="form-control"></div>
            <div class="mb-2"><label>Città</label><input type="text" name="citta" class="form-control"></div>
            <div class="mb-2"><label>Cod. naz.</label><input type="text" name="codice_nazionale" class="form-control"></div>

            <hr>

            <h5>Contatti</h5>
            <div class="mb-2"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="mb-2"><label>Telefono</label><input type="text" name="telefono" class="form-control" required></div>
            <div class="mb-2"><label>Cellulare</label><input type="text" name="cellulare" class="form-control"></div>

            <div class="mb-3">
              <label>Note studente</label>
              <textarea name="note" class="form-control" rows="3"></textarea>
            </div>
          </div>

          {{-- Colonna destra --}}
          <div class="col-md-8">
            <h5>Panoramica</h5>
            <div class="alert alert-secondary">In creazione</div>

            <h5>Alloggio</h5>
            <div class="alert alert-info">Nessuna prenotazione alloggi</div>

            <h5>Pagamenti</h5>
            <div class="alert alert-info">Nessun pagamento programmato</div>

            <h5>Lezioni</h5>
            <div class="alert alert-info">Nessuna lezione programmata</div>
          </div>
        </div>

        <div class="mt-4">
          <button type="submit" class="btn btn-light shadow-sm">Salva Iscrizione</button>
        </div>
      </form>
    </div>
  </x-layout>

