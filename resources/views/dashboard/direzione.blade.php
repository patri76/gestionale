<x-layout>
    @section('title', 'Dashboard Direzione')

    <style>
        .dashboard-container {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #008CBA;
            color: white;
            text-align: center;
            padding: 40px 20px;
        }
        h1 {
            font-weight: 300;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }
        .btn-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 25px;
            width: 100%;
            max-width: 800px;
        }
        .btn-dashboard {
            background-color: white;
            color: #008CBA;
            border-radius: 30px;
            padding: 20px 0;
            font-weight: bold;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }
        .btn-dashboard:hover {
            background-color: #005f8c;
            color: white;
        }
    </style>

    <div class="dashboard-container">
        <h1>Dashboard Direzione</h1>

        <div class="btn-grid">
            <a href="{{ route('direzione.studenti') }}" class="btn-dashboard">Studenti</a>
            <a href="{{ route('direzione.corsi') }}" class="btn-dashboard">Corsi</a>
            <a href="{{ route('direzione.certificati') }}" class="btn-dashboard">Certificati</a>
            <a href="{{ route('direzione.insegnanti') }}" class="btn-dashboard">Insegnanti</a>
            <a href="{{ route('direzione.registri') }}" class="btn-dashboard">Registri</a>
            <a href="{{ route('direzione.statistiche') }}" class="btn-dashboard">Statistiche</a>
            <a href="{{ route('direzione.certificati-liberi') }}" class="btn-dashboard">Certificati Liberi</a>
        </div>
    </div>
</x-layout>

