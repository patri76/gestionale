<x-layout>
    @section('title', 'Login')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card-custom w-100" style="max-width: 500px;">
            <h2 class="text-center mb-4">Accedi al tuo account</h2>

            <x-form-errors />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required autofocus>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-green">Accedi</button>
                </div>
            </form>

            <p class="text-center mt-3">
                Non hai un account?
                <a href="{{ route('register') }}">Registrati</a>
            </p>
        </div>
    </div>
</x-layout>
