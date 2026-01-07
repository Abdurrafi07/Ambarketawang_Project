{{-- resources/views/layouts/app-auth.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Halaman Auth')</title>

  {{-- Tailwind CSS --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Favicon / Logo --}}
  <link rel="icon" href="{{ asset('images/IDLogo.png') }}" type="image/png">

  {{-- Tambahan CSS jika perlu --}}
  @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">
  {{-- Konten halaman (isi login/register, dll) --}}
  @yield('content')

  @stack('scripts')
</body>
</html>
