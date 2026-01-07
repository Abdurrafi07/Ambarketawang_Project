@extends('layouts.app-auth')

@section('title', 'Reset Password | Kelurahan Ambarketawang')

@section('content')
<div class="bg-white shadow-2xl rounded-2xl w-full max-w-3xl flex flex-col md:flex-row overflow-hidden">
    
    <!-- Bagian Kiri -->
    <div class="w-full md:w-1/2 bg-blue-700 text-white flex flex-col justify-center items-center p-8">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Kelurahan" class="w-24 mb-4">
        <h2 class="text-2xl font-semibold mb-2">Panel Admin Kelurahan</h2>
        <p class="text-center text-sm opacity-90">Silakan atur ulang kata sandi akun Anda.</p>
    </div>

    <!-- Bagian Kanan -->
    <div class="w-full md:w-1/2 p-8">
        <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Reset Password</h3>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600 text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}" class="space-y-5">
            @csrf

            <!-- Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="admin@kelurahan.go.id">
            </div>

            <!-- Password Baru -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi Baru</label>
                <input id="password" name="password" type="password" required autocomplete="new-password"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="••••••••">
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                    class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Reset Password
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">© 2025 Kelurahan Ambarketawang</p>
    </div>
</div>
@endsection
