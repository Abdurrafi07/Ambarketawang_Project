@extends('layouts.form')

@section('content')
<div class="container max-w-3xl mx-auto">

    <h3 class="text-2xl font-semibold mb-6">Edit Data Penduduk</h3>

    <form action="{{ route('penduduk.update', $penduduk->nik) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        @include('penduduk.form')

        <!-- <div class="text-center pt-4">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow">
                Simpan Perubahan
            </button>
        </div> -->
    </form>

</div>
@endsection
