@extends('layouts.form')

@section('title', 'Surat Keterangan Domisili')

@section('content')

<form id="domisiliForm" action="{{ route('surat.preview', ['jenis' => $jenis]) }}" method="POST" class="space-y-6">
    @csrf
    
    <!-- Header -->
    <section class="border-b-2 border-blue-600 pb-4 mb-6 text-center">
        <h1 class="text-2xl font-bold uppercase tracking-wide text-blue-700">Formulir Surat Keterangan Domisili</h1>
        <p class="text-sm mt-1 text-gray-700">No : .........................................................</p>

        <!-- NOMOR SURAT -->
        <div class="bg-gray-50 rounded-xl p-4 mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat</label>
            <input type="text" name="nomor_surat" id="nomor_surat" class="input-field" placeholder="Contoh: 052/AMB/VI/2025">
        </div>
    </section>

    <!-- Lokasi -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div>
            <label class="block text-sm font-semibold mb-1 text-black">Provinsi</label>
            <input type="text" name="provinsi" class="input-field" value="Daerah Istimewa Yogyakarta">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1 text-black">Kabupaten/Kota</label>
            <input type="text" name="kota" class="input-field" value="Kabupaten Sleman">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1 text-black">Kecamatan</label>
            <input type="text" name="kecamatan" class="input-field" value="Gamping">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1 text-black">Desa/Kelurahan</label>
            <input type="text" name="desa" class="input-field" value="Ambarketawang">
        </div>
        <div class="col-span-1 md:col-span-2 lg:col-span-4">
            <label class="block text-sm font-semibold mb-1 text-black">Dusun/Dukuh/Kampung</label>
            <input type="text" name="dusun" class="input-field" value="Patukan">
        </div>
    </section>

    <!-- Data Kepala Keluarga -->
    <section class="mb-8">
        <h2 class="font-bold text-lg mb-4 text-center text-blue-700">DATA KEPALA KELUARGA</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Nomor Kartu Keluarga</label>
                <input type="text" name="no_kk" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Nama Kepala Keluarga</label>
                <input type="text" name="nama_kk" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">RT</label>
                <input type="text" name="rt" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">RW</label>
                <input type="text" name="rw" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Kode Pos</label>
                <input type="text" name="kode_pos" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Telepon</label>
                <input type="text" name="telepon" class="input-field">
            </div>
        </div>
    </section>

    <!-- Data Domisili -->
    <section class="mb-8">
        <h2 class="font-bold text-lg mb-4 text-center text-blue-700">DATA DOMISILI</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">NIK Pemohon</label>
                <input type="text" name="nikInput" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Nama Lengkap</label>
                <input type="text" name="namaInput" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Tempat Lahir</label>
                <input type="text" name="tempatInput" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Tanggal Lahir</label>
                <input type="date" name="tanggalInput" class="input-field" max="{{ date('Y-m-d') }}">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Jenis Kelamin</label>
                <select name="genderInput" class="input-field">
                    <option value="">Pilih</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Agama</label>
                <select name="agamaInput" class="input-field">
                    <option value="">Pilih</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Pekerjaan</label>
                <input type="text" name="pekerjaanInput" class="input-field">
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1 text-black">Kewarganegaraan</label>
                <input type="text" name="wargaInput" class="input-field" value="Indonesia">
            </div>
        </div>
    </section>

    <!-- Data Anggota Keluarga (opsional) -->
    <section class="mb-8">
        <h2 class="font-bold text-lg mb-4 text-center text-blue-700">ANGGOTA KELUARGA YANG DOMISILI (Opsional)</h2>
        <div class="overflow-x-auto">
            <table class="w-full border text-sm">
                <thead class="bg-blue-100 text-blue-700">
                    <tr>
                        <th class="border px-3 py-2">No.</th>
                        <th class="border px-3 py-2">NIK</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">Tanggal Lahir</th>
                        <th class="border px-3 py-2">SHDK</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 7; $i++)
                    <tr>
                        <td class="border px-3 py-2 text-center text-blue-700 font-semibold">{{ $i + 1 }}</td>
                        <td class="border px-3 py-2">
                            <input type="text" name="anggota[{{ $i }}][nik]" class="w-full border-none outline-none text-black px-2 py-1">
                        </td>
                        <td class="border px-3 py-2">
                            <input type="text" name="anggota[{{ $i }}][nama]" class="w-full border-none outline-none text-black px-2 py-1">
                        </td>
                        <td class="border px-3 py-2">
                            <input type="date" name="anggota[{{ $i }}][tgl_lahir]" class="w-full border-none outline-none text-black px-2 py-1" max="{{ date('Y-m-d') }}">
                        </td>
                        <td class="border px-3 py-2">
                            <input type="text" name="anggota[{{ $i }}][shdk]" class="w-full border-none outline-none text-black px-2 py-1" placeholder="Contoh: Anak">
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </section>

    <!-- Tombol -->
    <div class="text-center mt-8 space-x-4">
        <a href="{{ url('/dashboard') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition inline-block">
            Batal
        </a>

        <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-800 transition">
            Preview Surat
        </button>
    </div>
</form>

<style>
.input-field {
    border: 1px solid #93c5fd;
    border-radius: 0.5rem;
    padding: 0.5rem 0.75rem;
    width: 100%;
    color: black;
}

.input-field:focus {
    outline: none;
    ring: 2px;
    ring-color: #3b82f6;
    border-color: #3b82f6;
}
</style>

<script>
document.getElementById('domisiliForm').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('.input-field, select');
    let errors = [];

    requiredFields.forEach(field => {
        // Skip table anggota keluarga
        if (field.name.startsWith('anggota')) return;

        if (!field.value.trim()) {
            let label = field.closest('div').querySelector('label')?.innerText || field.name;
            errors.push(label + ' harus diisi.');
        }
    });

    if (errors.length) {
        e.preventDefault();
        alert(errors.join('\n'));
        return false;
    }
});
</script>

@endsection
