<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Kelurahan Dashboard')</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

  {{-- ✅ Navbar Global --}}
  <nav class="bg-blue-700 text-white px-6 py-3 flex justify-between items-center shadow-md">
      <div class="flex items-center space-x-3">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-12 h-12 object-contain">
          <h1 class="text-xl font-semibold tracking-wide">Kelurahan</h1>
      </div>

      <div class="flex items-center space-x-6">
          <a href="{{ route('dashboard') }}" 
            class="text-sm font-medium px-3 py-1 rounded-md hover:bg-blue-600 transition
            {{ request()->routeIs('dashboard') ? 'bg-blue-800' : '' }}">
            Dashboard
          </a>

          <span class="text-sm opacity-90">
              Halo, {{ Auth::user()->name ?? 'Admin' }}
          </span>

          <form action="{{ route('logout') }}" method="POST" class="inline">
              @csrf
              <button 
                type="submit" 
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm transition">
                  Logout
              </button>
          </form>
      </div>
  </nav>

  {{-- ✅ Konten Halaman --}}
  <main class="flex-grow p-10 flex flex-col items-center">
    @yield('content')
  </main>

  {{-- ✅ Footer --}}
  <footer class="bg-white text-center text-gray-500 text-sm py-3 shadow-inner mt-auto">
    © 2025 Kelurahan — Sistem Informasi Kelurahan
  </footer>

  {{-- 🔥 WAJIB ADA: SCRIPT STACK --}}
  @stack('scripts')

</body>
</html>
