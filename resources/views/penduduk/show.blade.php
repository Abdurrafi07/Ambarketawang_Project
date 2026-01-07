@extends('layouts.form')

@section('title', 'Detail Penduduk')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Detail Penduduk</h2>

    <div class="mb-6">
        <h3 class="font-semibold">Data Pribadi</h3>
        <p><strong>NIK:</strong> {{ $penduduk->nik }}</p>
        <p><strong>Nama:</strong> {{ $penduduk->nama }}</p>
        <p><strong>Tempat, Tanggal Lahir:</strong> {{ $penduduk->tempat_lahir }}, {{ $penduduk->tanggal_lahir }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $penduduk->jenis_kelamin }}</p>
        <p><strong>Agama:</strong> {{ $penduduk->agama }}</p>
        <p><strong>Status Perkawinan:</strong> {{ $penduduk->status_perkawinan }}</p>
        <p><strong>Pendidikan:</strong> {{ $penduduk->pendidikan }}</p>
        <p><strong>Pekerjaan:</strong> {{ $penduduk->pekerjaan }}</p>
        <p><strong>Hubungan dalam Keluarga:</strong> {{ $penduduk->hubungan_dalam_keluarga }}</p>
        <p><strong>Nama Ayah:</strong> {{ $penduduk->nama_ayah }}</p>
        <p><strong>Nama Ibu:</strong> {{ $penduduk->nama_ibu }}</p>
        <p><strong>Golongan Darah:</strong> {{ $penduduk->golongan_darah ?? '-' }}</p>
        <p><strong>Kewarganegaraan:</strong> {{ $penduduk->kewarganegaraan }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-semibold">Alamat</h3>
        <p>{{ $penduduk->alamat->nama_jalan }}, RT {{ $penduduk->alamat->rt }}/RW {{ $penduduk->alamat->rw }}</p>
        <p>{{ $penduduk->alamat->kelurahan }}, {{ $penduduk->alamat->kecamatan }}</p>
        <p>{{ $penduduk->alamat->kota }}, {{ $penduduk->alamat->provinsi }} {{ $penduduk->alamat->kode_pos ?? '' }}</p>
    </div>

    <div class="mb-6">
        <h3 class="font-semibold">Kartu Keluarga</h3>
        <p><strong>No. KK:</strong> {{ $penduduk->kartuKeluarga->no_kk }}</p>
        <p><strong>Kepala Keluarga:</strong> {{ $penduduk->kartuKeluarga->kepala_keluarga }}</p>
    </div>

    <a href="{{ route('penduduk.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Kembali</a>
</div>
@endsection
