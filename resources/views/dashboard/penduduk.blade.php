@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="container mt-4">

    <h1 class="mb-4">Daftar Penduduk</h1>

    {{-- IMPORT & EXPORT --}}
    <div class="mb-3 d-flex gap-2">
        {{-- IMPORT --}}
        <form action="{{ route('penduduk.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input 
                type="file" 
                name="file" 
                accept=".xls,.xlsx"
                required
                class="form-control form-control-sm mb-1"
            >
            <button type="submit" class="btn btn-success btn-sm">
                Import Excel
            </button>
        </form>

        {{-- EXPORT --}}
        <a href="{{ route('penduduk.export') }}" class="btn btn-primary btn-sm align-self-end">
            Export Excel
        </a>
    </div>

    {{-- TABLE --}}
    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Pekerjaan</th>
                <th>No. KK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $p)
            <tr>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->status_perkawinan }}</td>
                <td>{{ $p->pekerjaan }}</td>
                <td>{{ $p->no_kk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $penduduk->links() }}
    </div>

</div>
@endsection
