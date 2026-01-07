@forelse ($penduduk as $p)
<tr class="border-b hover:bg-gray-50">
    <td class="px-4 py-3 font-semibold">{{ $p->nik }}</td>
    <td class="px-4 py-3">{{ $p->nama }}</td>
    <td class="px-4 py-3">{{ $p->no_kk }}</td>

    <td class="px-4 py-3 leading-tight">
        {{ $p->alamat->nama_jalan }}
        RT {{ $p->alamat->rt }}/RW {{ $p->alamat->rw }} <br>
        Kel. {{ $p->alamat->kelurahan }}, Kec. {{ $p->alamat->kecamatan }} <br>
        {{ $p->alamat->kota }} - {{ $p->alamat->provinsi }}
    </td>

    <td class="px-4 py-3">{{ $p->jenis_kelamin }}</td>

    <td class="px-4 py-3 text-center space-x-2">
        <a href="{{ route('penduduk.edit', $p->nik) }}"
           class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
            Edit
        </a>

        <form action="{{ route('penduduk.destroy', $p->nik) }}"
              method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                Hapus
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center py-8 text-gray-500 italic">
        Data tidak ditemukan
    </td>
</tr>
@endforelse
