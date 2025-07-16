<x-layout-dashboard>
    <div class="container mx-auto px-4 py-6">

        {{-- 🔴 Bottone Logout in alto a destra --}}
        <div class="flex justify-end mb-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Logout
                </button>
            </form>
        </div>

        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard Direzione</h1>

        {{-- Statistiche principali --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="text-sm text-gray-500 uppercase mb-1">Classi attive</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $numClassiAttive }}</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="text-sm text-gray-500 uppercase mb-1">Studenti ore 09:00</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $studentiPerOrario['09:00'] }}</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="text-sm text-gray-500 uppercase mb-1">Studenti ore 11:00</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $studentiPerOrario['11:00'] }}</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="text-sm text-gray-500 uppercase mb-1">Studenti ore 19:00</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $studentiPerOrario['19:00'] }}</p>
            </div>
            <div class="bg-white p-4 rounded-2xl shadow">
                <h2 class="text-sm text-gray-500 uppercase mb-1">Studenti privati</h2>
                <p class="text-2xl font-bold text-blue-600">{{ $studentiPrivati }}</p>
            </div>
        </div>

        {{-- Grafici principali --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            {{-- Grafico a barre per livelli --}}
            <x-chart.bar
                :labels="$labelsLivelli"
                :data="$dataLivelli"
                title="Distribuzione per Livello"
            />

            {{-- Grafico a torta per nazionalità --}}
            <x-chart.pie
                :labels="$labelsNazionalita"
                :data="$dataNazionalita"
                title="Distribuzione per Nazionalità"
            />
        </div>

        {{-- Classi attive per mese/orario + studenti --}}
        <div class="mt-12">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Classi attive per mese e orario</h2>

            <div class="overflow-x-auto bg-white shadow rounded-2xl">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left font-bold text-gray-600">Periodo</th>
                            <th class="px-4 py-2 text-left font-bold text-gray-600">Orario</th>
                            <th class="px-4 py-2 text-left font-bold text-gray-600">Classi</th>
                            <th class="px-4 py-2 text-left font-bold text-gray-600">Studenti totali</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($classiAttivePerMeseOrario as $gruppo)
                            @php
                                $idsClassi = \App\Models\Classe::where('periodo', $gruppo->periodo)
                                    ->where('orario', $gruppo->orario)
                                    ->where('attiva', true)
                                    ->pluck('id');
                                $totaleStudenti = $idsClassi->sum(fn($id) => $studentiPerClasse[$id] ?? 0);
                            @endphp
                            <tr>
                                <td class="px-4 py-2">{{ $gruppo->periodo }}</td>
                                <td class="px-4 py-2">{{ $gruppo->orario ?? 'Privata' }}</td>
                                <td class="px-4 py-2">{{ $gruppo->totale }}</td>
                                <td class="px-4 py-2">{{ $totaleStudenti }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- 🔵 TABELLA INTERATTIVA LIVEWIRE --}}
        <div class="mt-12">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Classi dettagliate con filtri</h2>
            <livewire:classi-dashboard />
        </div>

    </div>
</x-layout-dashboard>
