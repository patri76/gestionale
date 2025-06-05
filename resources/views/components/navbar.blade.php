<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Menu</a>

      {{-- Toggle mobile --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- Menu voci e logout --}}
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Studenti</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="gestioneDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Gestione
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="gestioneDropdown">
              <li><a class="dropdown-item" href="#">Classi</a></li>
              <li><a class="dropdown-item" href="#">Registri</a></li>
              <li><a class="dropdown-item" href="#">Certificati Insegnanti</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Statistiche</a>
          </li>
        </ul>

        {{-- Bottone Logout --}}
        <form method="POST" action="{{ route('logout') }}" class="d-flex">
          @csrf
          <button type="submit" class="btn btn-outline-light btn-sm">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
      </div>
    </div>
  </nav>
