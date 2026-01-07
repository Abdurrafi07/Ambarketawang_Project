@extends('layouts.auth')

@section('title', 'Login Admin Kelurahan')

@section('content')
<div class="bg-white shadow-2xl rounded-2xl w-full max-w-3xl flex flex-col md:flex-row overflow-hidden">
  
  <!-- Bagian Kiri -->
  <div class="w-full md:w-1/2 bg-blue-700 text-white flex flex-col justify-center items-center p-8">
    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-24 mb-4">
    <h2 class="text-2xl font-semibold mb-2">Panel Admin Kelurahan</h2>
    <p class="text-center text-sm opacity-90">Masuk ke dashboard admin untuk mengelola data warga.</p>
  </div>

  <!-- Bagian Kanan -->
  <div class="w-full md:w-1/2 p-8">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Login Admin</h3>

    {{-- Notifikasi Status / Error --}}
    @if (session('status'))
      <div class="mb-4 text-green-600 text-sm font-medium">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
      <div class="mb-4 text-red-600 text-sm font-medium">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
          class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="admin@kelurahan.go.id">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
        <input id="password" name="password" type="password" required autocomplete="current-password"
          class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          placeholder="••••••••">
      </div>

      <!-- <div class="flex justify-between items-center">
        <label class="inline-flex items-center">
          <input id="remember_me" type="checkbox" name="remember" class="form-checkbox text-blue-600">
          <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
        </label>

        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Lupa sandi?</a>
        @endif
      </div> -->

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
        Masuk
      </button>
    </form>

    <p class="text-center text-gray-500 text-sm mt-6">© 2025 Kelurahan</p>
  </div>

</div>
@endsection
