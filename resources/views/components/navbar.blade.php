<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/ilcentro_logo-1.jpg') }}" alt="Logo Il Centro" height="50" class="me-2">
            <strong>Il Centro</strong>
        </a>

        <div class="ms-auto">
            <a href="{{ route('login') }}" class="me-3 text-white text-decoration-none">Login</a>
            <a href="{{ route('register') }}" class="text-white text-decoration-none">Registrati</a>
        </div>
    </div>
</nav>
