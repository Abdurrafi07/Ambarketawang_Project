@extends('layouts.app')

@section('title', 'Data Penduduk')

@section('content')
<div class="w-full max-w-7xl mx-auto">

    {{-- SEARCH + HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        {{-- Search --}}
        <div class="w-full md:w-1/3">
            <input 
                type="text"
                id="search"
                class="w-full px-4 py-2 border rounded-lg shadow-sm
                       focus:outline-none focus:ring-2 focus:ring-blue-500
                       focus:border-blue-500 text-sm"
                placeholder="🔍 Cari NIK / Nama / No KK"
            >
        </div>

        {{-- Import --}}
        <form action="{{ route('penduduk.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".xls,.xlsx" required class="block text-sm">
            <button type="submit"
                class="mt-2 bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                Import Excel
            </button>
        </form>

        {{-- Export --}}
        <a href="{{ route('penduduk.export') }}"
           class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded text-sm">
            Export Excel
        </a>

        {{-- Trash --}}
        <a href="{{ route('penduduk.trash') }}"
           class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-sm">
            🗑️ Trash
        </a>

        {{-- Title + Button Tambah --}}
        <div class="flex items-center gap-4">
            <h3 class="text-2xl font-bold text-gray-700">Data Penduduk</h3>
            <a href="{{ route('penduduk.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                + Tambah Penduduk
            </a>
        </div>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABEL --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden border">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-3">NIK</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">No KK</th>
                        <th class="px-4 py-3">Alamat Lengkap</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                {{-- ⬇️ SATU-SATUNYA TBODY --}}
                <tbody id="penduduk-table">
                    @include('penduduk.partials.table', ['penduduk' => $penduduk])
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6" id="pagination">
        {{ $penduduk->links('pagination::tailwind') }}
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const tableBody  = document.getElementById('penduduk-table');
    const pagination = document.getElementById('pagination');

    let debounceTimer;

    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            const keyword = this.value.trim();

            fetch(`{{ route('penduduk.index') }}?search=${encodeURIComponent(keyword)}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(html => {
                tableBody.innerHTML = html;

                if (pagination) {
                    pagination.style.display = keyword ? 'none' : 'block';
                }
            });
        }, 300);
    });
});
</script>
@endpush
