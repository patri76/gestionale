<x-layout>
    @section('title', 'Registrazione')

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card-custom w-100" style="max-width: 500px;">
            <h2 class="text-center mb-4">Crea un nuovo account</h2>

            <x-form-errors />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>

                <!-- Ruolo -->
                <div class="mb-3">
                    <label for="role" class="form-label">Ruolo</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="studente" {{ old('role') == 'studente' ? 'selected' : '' }}>Studente</option>
                        <option value="insegnante" {{ old('role') == 'insegnante' ? 'selected' : '' }}>Insegnante</option>
                        <option value="direzione" {{ old('role') == 'direzione' ? 'selected' : '' }}>Direzione</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <!-- Conferma password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Conferma password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-green">Registrati</button>
                </div>
            </form>

            <p class="text-center mt-3">
                Hai già un account?
                <a href="{{ route('login') }}">Accedi</a>
            </p>
        </div>
    </div>
</x-layout>
