<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'Portal Majestic - Kelurahan Ambarketawang')</title>
  <link rel="icon" href="{{ asset('images/IDLogo.png') }}" type="image/png">

  {{-- Font Google --}}
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  {{-- Tempat CSS custom tiap halaman --}}
  @yield('styles')
</head>
<body>
  {{-- Tempat isi halaman --}}
  @yield('content')

  {{-- Tempat script JS tiap halaman --}}
  @yield('scripts')
</body>
</html>
