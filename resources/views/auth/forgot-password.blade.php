@extends('layouts.auth')

@section('title', 'Lupa Kata Sandi - Kelurahan')

@section('content')
<div class="bg-white shadow-2xl rounded-2xl w-full max-w-3xl flex flex-col md:flex-row overflow-hidden">
  
  <!-- Bagian Kiri -->
  <div class="w-full md:w-1/2 bg-blue-700 text-white flex flex-col justify-center items-center p-8">
    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-24 mb-4">
    <h2 class="text-2xl font-semibold mb-2">Panel Admin Kelurahan</h2>
    <p class="text-center text-sm opacity-90">Lupa kata sandi? Tenang, kami akan bantu atur ulang.</p>
  </div>

  <!-- Bagian Kanan -->
  <div class="w-full md:w-1/2 p-8">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Lupa Kata Sandi</h3>

    {{-- Pesan sukses --}}
    @if (session('status'))
      <div class="mb-4 text-green-600 text-sm font-medium text-center">
        {{ session('status') }}
      </div>
    @endif

    {{-- Pesan error --}}
    @if ($errors->any())
      <div class="mb-4 text-red-600 text-sm font-medium text-center">
        {{ $errors->first() }}
      </div>
    @endif

    <p class="text-sm text-gray-600 mb-6 text-center">
      Masukkan email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda.
    </p>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
          class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="admin@kelurahan.go.id">
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
        Kirim Tautan Reset Sandi
      </button>
    </form>

    <div class="text-center mt-6">
      <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
        Kembali ke halaman login
      </a>
    </div>

    <p class="text-center text-gray-500 text-sm mt-6">© 2025 Kelurahan</p>
  </div>

</div>
@endsection
