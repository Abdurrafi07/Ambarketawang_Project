<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Kelurahan Ambarketawang</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="/dashboard" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('penduduk.index') }}" class="nav-link">Data Warga</a></li>
        <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
