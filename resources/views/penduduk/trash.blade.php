@extends('layouts.form')

@section('title', 'Trash Penduduk')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Trash Penduduk</h1>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">NIK</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">No KK</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">Jenis Kelamin</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($penduduk as $p)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 font-semibold">{{ $p->nik }}</td>
                    <td class="px-4 py-3">{{ $p->nama }}</td>
                    <td class="px-4 py-3">{{ $p->no_kk }}</td>

                    <td class="px-4 py-3 leading-tight">
                        @if($p->alamat)
                            {{ $p->alamat->nama_jalan }} RT {{ $p->alamat->rt }}/RW {{ $p->alamat->rw }}<br>
                            Kel. {{ $p->alamat->kelurahan }}, Kec. {{ $p->alamat->kecamatan }}<br>
                            {{ $p->alamat->kota }} - {{ $p->alamat->provinsi }}
                        @else
                            <span class="text-gray-400 italic">Alamat tidak tersedia</span>
                        @endif
                    </td>

                    <td class="px-4 py-3">{{ $p->jenis_kelamin ?? '-' }}</td>

                    <td class="px-4 py-3 text-center space-x-2">
                        <!-- Tombol Restore -->
                        <a href="{{ route('penduduk.restore', $p->nik) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded text-xs">
                            Restore
                        </a>

                        <!-- Tombol Hapus Permanen -->
                        <form action="{{ route('penduduk.forceDelete', $p->nik) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                                Hapus Permanen
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-8 text-gray-500 italic">
                        Tidak ada data di trash
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $penduduk->links() }}
    </div>
</div>
@endsection
