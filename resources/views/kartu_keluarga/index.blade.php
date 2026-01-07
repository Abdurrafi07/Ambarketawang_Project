@extends('layouts.app')

@section('title', 'Data Kartu Keluarga')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4 text-primary">📜 Daftar Kartu Keluarga</h2>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No. KK</th>
                        <th>Kepala Keluarga</th>
                        <th>Alamat</th>
                        <th>Jumlah Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarKK as $kk)
                    <tr>
                        <td>{{ $kk->no_kk }}</td>
                        <td>{{ $kk->kepala_keluarga }}</td>
                        <td>{{ $kk->alamat }}, RT {{ $kk->rt }}/RW {{ $kk->rw }}, {{ $kk->kelurahan }}</td>
                        <td>{{ $kk->penduduk_count }}</td>
                        <td>
                            <a href="{{ route('kk.show', $kk->no_kk) }}" class="btn btn-sm btn-primary">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $daftarKK->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
