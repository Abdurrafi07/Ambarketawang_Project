@extends('layouts.app')

@section('title', 'Detail Kartu Keluarga')

@section('content')
<div class="container mt-4">
    <a href="{{ route('kk.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <h3 class="fw-bold text-primary mb-3">🧾 Kartu Keluarga</h3>

    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-body">
            <h5 class="fw-semibold mb-3">Informasi Keluarga</h5>
            <div class="row g-3">
                <div class="col-md-6"><strong>No KK:</strong> {{ $kk->no_kk }}</div>
                <div class="col-md-6"><strong>Kepala Keluarga:</strong> {{ $kk->kepala_keluarga }}</div>
                <div class="col-md-6"><strong>Alamat:</strong> {{ $kk->alamat }}</div>
                <div class="col-md-6"><strong>RT/RW:</strong> {{ $kk->rt }}/{{ $kk->rw }}</div>
                <div class="col-md-6"><strong>Kelurahan:</strong> {{ $kk->kelurahan }}</div>
                <div class="col-md-6"><strong>Kecamatan:</strong> {{ $kk->kecamatan }}</div>
                <div class="col-md-6"><strong>Kota:</strong> {{ $kk->kota }}</div>
                <div class="col-md-6"><strong>Provinsi:</strong> {{ $kk->provinsi }}</div>
                <div class="col-md-6"><strong>Kode Pos:</strong> {{ $kk->kode_pos }}</div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h5 class="fw-semibold mb-3">👨‍👩‍👧‍👦 Anggota Keluarga</h5>
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Hubungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kk->penduduk as $p)
                    <tr>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $p->jenis_kelamin }}</td>
                        <td>{{ $p->agama }}</td>
                        <td>{{ $p->pekerjaan }}</td>
                        <td>{{ $p->hubungan_dalam_keluarga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
