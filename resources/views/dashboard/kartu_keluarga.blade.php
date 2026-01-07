@extends('layouts.app')

@section('title', 'Data Kartu Keluarga')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Kartu Keluarga</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>No. KK</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>RT/RW</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Kota</th>
                <th>Jumlah Anggota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kk as $item)
            <tr>
                <td>{{ $item->no_kk }}</td>
                <td>{{ $item->kepala_keluarga }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->rt }}/{{ $item->rw }}</td>
                <td>{{ $item->kelurahan }}</td>
                <td>{{ $item->kecamatan }}</td>
                <td>{{ $item->kota }}</td>
                <td>{{ $item->penduduk_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $kk->links() }}
    </div>
</div>
@endsection
