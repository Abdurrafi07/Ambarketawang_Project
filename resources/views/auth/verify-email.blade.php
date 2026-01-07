@extends('layouts.app-auth')

@section('title', 'Verifikasi Email')

@section('content')
<div class="bg-white shadow-2xl rounded-2xl w-full max-w-3xl flex flex-col md:flex-row overflow-hidden">
  
  <!-- Bagian Kiri -->
  <div class="w-full md:w-1/2 bg-blue-700 text-white flex flex-col justify-center items-center p-8">
    <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-24 mb-4">
    <h2 class="text-2xl font-semibold mb-2">Panel Admin Kelurahan</h2>
    <p class="text-center text-sm opacity-90">Konfirmasi alamat email Anda sebelum melanjutkan ke dashboard.</p>
  </div>

  <!-- Bagian Kanan -->
  <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Verifikasi Email</h3>

    <div class="mb-4 text-sm text-gray-600 text-center">
        Terima kasih telah mendaftar!  
        Sebelum mulai, silakan verifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 text-center">
            Tautan verifikasi baru telah dikirim ke email yang Anda daftarkan.
        </div>
    @endif

    <div class="mt-6 space-y-4">
        <form method="POST" action="{{ route('verification.send') }}" class="flex justify-center">
            @csrf
            <button type="submit"
              class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
              Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
            @csrf
            <button type="submit"
              class="text-sm text-gray-600 hover:text-gray-900 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              Keluar
            </button>
        </form>
    </div>

    <p class="text-center text-gray-500 text-sm mt-6">© 2025 Kelurahan Ambarketawang</p>
  </div>

</div>
@endsection
