@extends('layouts.app')

@section('title', 'Dashboard Admin - Kelurahan')

@section('content')
  <!-- Judul Dashboard -->
  <section class="text-center mb-10">
    <h2 class="text-4xl font-bold text-gray-800">Dashboard</h2>
    <p class="text-gray-500 mt-2">Pilih jenis surat yang ingin Anda buat</p>
  </section>

  <!-- Grid Menu Surat -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @php
        $suratList = [
            ['kode' => 'domisili', 'nama' => 'Surat Domisili', 'desc' => 'Ajukan surat domisili untuk warga yang berdomisili di wilayah kelurahan.'],
            ['kode' => 'pernikahan', 'nama' => 'Surat Pernikahan', 'desc' => 'Input dan verifikasi data surat pernikahan warga.'],
            ['kode' => 'kelahiran', 'nama' => 'Akte Kelahiran', 'desc' => 'Input data kelahiran warga kelurahan.'],
            ['kode' => 'kematian', 'nama' => 'Surat Kematian', 'desc' => 'Catat laporan kematian warga secara resmi.'],
            ['kode' => 'kelola data penduduk', 'nama' => 'Kelola data penduduk', 'desc' => 'Mengelola data penduduk di kelurahan.'],
        ];

        $routeNames = [
            'kematian' => 'dashboard.surat.kematian',
            'kelahiran' => 'dashboard.surat.kelahiran',
            'domisili' => 'dashboard.surat.domisili',
            'pernikahan' => 'dashboard.surat.pernikahan',
            'kelola data penduduk' => 'dashboard.surat.update',
        ];
    @endphp

    @foreach ($suratList as $surat)
      <a href="{{ route($routeNames[$surat['kode']]) }}"
         class="bg-white border-t-4 border-blue-600 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-1 hover:border-blue-700 transition transform p-6 w-64 text-center">
        <h3 class="text-lg font-semibold text-blue-700 mb-2">{{ $surat['nama'] }}</h3>
        <p class="text-sm text-gray-500">{{ $surat['desc'] }}</p>
      </a>
    @endforeach
  </div>
@endsection
