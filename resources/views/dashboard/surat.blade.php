@extends('layouts.app')

@section('title', 'Pilih Jenis Surat')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Pilih Jenis Surat</h1>

    <div class="row">
        @foreach ($jenisSurat as $surat)
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $surat['nama'] }}</h5>
                    <a href="{{ route('surat.form', $surat['kode']) }}" class="btn btn-primary mt-2">
                        Buat Surat
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
