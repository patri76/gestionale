<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestionale')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #0094c6;
            color: white;
            min-height: 100vh;
        }
        a {
            color: #fff;
        }
        .card-custom {
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .card-custom label,
        .card-custom input,
        .card-custom select {
            color: black;
        }
        .card-custom input::placeholder {
            color: #666;
        }
        .btn-green {
            background-color: #198754;
            color: white;
        }
        .btn-green:hover {
            background-color: #146c43;
        }
    </style>
</head>
<body>

    {{-- Navbar personalizzata --}}
    <nav class="navbar px-4 py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div>
                <a href="/" class="navbar-brand text-white fw-bold d-flex align-items-center">
                    @php use Illuminate\Support\Facades\Route; @endphp
                    @if (Route::currentRouteName() === 'home')
                        <img src="{{ asset('img/ilcentro_logo-1.jpg') }}" alt="Logo Il Centro" style="height: 40px;" class="me-2">
                    @endif
                    Il Centro
                </a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="me-3">Login</a>
                <a href="{{ route('register') }}">Registrati</a>
            </div>
        </div>
    </nav>

    {{-- Contenuto dinamico --}}
    <main class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 80px);">
        {{ $slot }}
    </main>

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Chart.js per i grafici --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
