<!-- resources/views/layouts/form.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Form Surat')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50">

    <!-- Navbar -->
    <nav class="bg-blue-700 px-6 py-3 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-10 h-10 object-contain">
            <span class="text-white font-semibold text-lg">Kelurahan Ambarketawang</span>
        </div>
        <a href="{{ url('/dashboard') }}" class="text-white font-medium hover:underline">
            Dashboard
        </a>
    </nav>

    <!-- Tombol Kembali -->
    <div class="p-4">
        <a href="{{ url('/dashboard') }}" 
           class="inline-flex items-center bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            KEMBALI
        </a>
    </div>

    <!-- Konten Halaman -->
    <div class="max-w-3xl mx-auto my-10 bg-white rounded-2xl shadow-md p-10 border-t-4 border-blue-700">
        @yield('content')
    </div>

</body>
</html>
