<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestionale Il Centro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #008CBA;
            font-family: 'Segoe UI', sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .logo {
            width: 180px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 300;
            margin-bottom: 30px;
        }

        .btn-group {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-login {
            background-color: white;
            color: #008CBA;
            border: none;
        }

        .btn-login:hover {
            background-color: #e0e0e0;
        }

        .btn-register {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-register:hover {
            background-color: white;
            color: #008CBA;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            animation: fadeout 0.5s ease-in-out 4s forwards;
        }

        @keyframes fadeout {
            to {
                opacity: 0;
                transform: translateY(-10px);
                display: none;
            }
        }
    </style>
</head>
<body>
    <img src="{{ asset('images/ilcentro_logo-1.jpg') }}" alt="Logo Il Centro" class="logo">

    {{-- ✅ Messaggio di successo dopo la registrazione --}}
    @if(session('success'))
        <div class="alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <h1>Benvenuto nel gestionale della nostra scuola di Italiano</h1>

    <div class="btn-group">
        <a href="{{ route('login') }}" class="btn btn-login">Accedi</a>
        <a href="{{ route('register') }}" class="btn btn-register">Registrati</a>
    </div>
</body>
</html>
