@extends('layouts.app')

@section('title', 'Dashboard Direzione')

@section('content')
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
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
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
    </div>

    {{-- Grafici --}}
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

</div>
@endsection
