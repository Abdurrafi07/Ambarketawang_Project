@extends('layouts.form')

@section('title', 'Surat Keterangan Domisili')

@section('content')

<form id="domisiliForm" action="{{ route('surat.preview', ['jenis' => $jenis]) }}" method="POST" class="space-y-6">
@csrf

{{-- ================= HEADER ================= --}}
<section class="border-b-2 border-blue-600 pb-4 text-center">
    <h1 class="text-2xl font-bold uppercase text-blue-700">
        Formulir Surat Keterangan Domisili
    </h1>
    <p class="text-sm text-gray-700 mt-1">
        No: ....................................................
    </p>

    <div class="bg-gray-50 rounded-xl p-4 mt-4">
        <label class="label">Nomor Surat</label>
        <input type="text" name="nomor_surat" class="input-field required">
        <small class="error-text"></small>
    </div>
</section>

{{-- ================= LOKASI ================= --}}
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
@foreach ([
    'provinsi' => 'Provinsi',
    'kota' => 'Kabupaten/Kota',
    'kecamatan' => 'Kecamatan',
    'desa' => 'Desa/Kelurahan'
] as $name => $label)
    <div>
        <label class="label">{{ $label }}</label>
        <input type="text" name="{{ $name }}" class="input-field required">
        <small class="error-text"></small>
    </div>
@endforeach

<div class="md:col-span-2 lg:col-span-4">
    <label class="label">Dusun/Dukuh</label>
    <input type="text" name="dusun" class="input-field required">
    <small class="error-text"></small>
</div>
</section>

{{-- ================= KEPALA KELUARGA ================= --}}
<section>
<h2 class="title">DATA KEPALA KELUARGA</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="label">Nomor Kartu Keluarga</label>
        <input type="text" name="no_kk" class="input-field nik-field required"
               maxlength="16" inputmode="numeric">
        <small class="error-text"></small>
    </div>

    <div>
        <label class="label">Nama Kepala Keluarga</label>
        <input type="text" name="nama_kk" class="input-field required">
        <small class="error-text"></small>
    </div>

    @foreach(['rt'=>'RT','rw'=>'RW','kode_pos'=>'Kode Pos','telepon'=>'Telepon'] as $n=>$l)
    <div>
        <label class="label">{{ $l }}</label>
        <input type="text" name="{{ $n }}" class="input-field required">
        <small class="error-text"></small>
    </div>
    @endforeach
</div>
</section>

{{-- ================= PEMOHON ================= --}}
<section>
<h2 class="title">DATA DOMISILI</h2>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="label">NIK Pemohon</label>
        <input type="text" name="nikInput"
               class="input-field nik-field required"
               maxlength="16" inputmode="numeric">
        <small class="error-text"></small>
    </div>

@foreach([
    'namaInput'=>'Nama Lengkap',
    'tempatInput'=>'Tempat Lahir'
] as $n=>$l)
    <div>
        <label class="label">{{ $l }}</label>
        <input type="text" name="{{ $n }}" class="input-field required">
        <small class="error-text"></small>
    </div>
@endforeach

<div>
    <label class="label">Tanggal Lahir</label>
    <input type="date" name="tanggalInput" class="input-field required">
    <small class="error-text"></small>
</div>

<div>
    <label class="label">Jenis Kelamin</label>
    <select name="genderInput" class="input-field required">
        <option value="">Pilih</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
    <small class="error-text"></small>
</div>

<div>
    <label class="label">Agama</label>
    <select name="agamaInput" class="input-field required">
        <option value="">Pilih</option>
        <option>Islam</option>
        <option>Kristen</option>
        <option>Katolik</option>
        <option>Hindu</option>
        <option>Buddha</option>
        <option>Konghucu</option>
    </select>
    <small class="error-text"></small>
</div>

<div>
    <label class="label">Pekerjaan</label>
    <input type="text" name="pekerjaanInput" class="input-field required">
    <small class="error-text"></small>
</div>

<div>
    <label class="label">Kewarganegaraan</label>
    <input type="text" name="wargaInput" class="input-field required" value="Indonesia">
    <small class="error-text"></small>
</div>
</div>
</section>

{{-- ================= ANGGOTA ================= --}}
<section>
<h2 class="title">ANGGOTA KELUARGA</h2>

<table class="w-full border text-sm">
<thead class="bg-blue-100">
<tr>
    <th class="border">No</th>
    <th class="border">NIK</th>
    <th class="border">Nama</th>
    <th class="border">Tanggal Lahir</th>
    <th class="border">SHDK</th>
</tr>
</thead>

<tbody>
@for($i=0;$i<7;$i++)
<tr class="anggota-row">
    <td class="border text-center">{{ $i+1 }}</td>

    <td class="border">
        <input type="text"
               name="anggota[{{ $i }}][nik]"
               class="nik-field w-full px-2 py-1"
               maxlength="16" inputmode="numeric">
        <small class="error-text"></small>
    </td>

    <td class="border">
        <input type="text"
               name="anggota[{{ $i }}][nama]"
               class="w-full px-2 py-1">
        <small class="error-text"></small>
    </td>

    <td class="border">
        <input type="date"
               name="anggota[{{ $i }}][tgl_lahir]"
               class="w-full px-2 py-1">
        <small class="error-text"></small>
    </td>

    <td class="border">
        <input type="text"
               name="anggota[{{ $i }}][shdk]"
               class="w-full px-2 py-1">
        <small class="error-text"></small>
    </td>
</tr>
@endfor
</tbody>
</table>
</section>

<div class="text-center mt-6">
<button type="submit" class="btn-submit">Preview Surat</button>
</div>

</form>

{{-- ================= STYLE ================= --}}
<style>
.label{font-weight:600;font-size:14px}
.title{text-align:center;font-size:18px;font-weight:bold;color:#1d4ed8;margin:20px 0}
.input-field{border:1px solid #93c5fd;border-radius:8px;padding:8px;width:100%}
.input-error{border-color:#dc2626!important}
.error-text{color:#dc2626;font-size:12px;margin-top:4px}
.btn-submit{background:#1d4ed8;color:white;padding:10px 24px;border-radius:8px}
</style>

{{-- ================= SCRIPT ================= --}}
<script>
/* ================= NIK hanya angka ================= */
document.addEventListener('input', e => {
    if (e.target.classList.contains('nik-field')) {
        e.target.value = e.target.value.replace(/\D/g, '').slice(0, 16);
    }
});

/* ================= SUBMIT VALIDATION ================= */
document.getElementById('domisiliForm').addEventListener('submit', function (e) {
    let valid = true;

    // reset error
    document.querySelectorAll('.error-text').forEach(el => el.innerText = '');
    document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

    /* ========= 1. VALIDASI FIELD WAJIB ========= */
    document.querySelectorAll('.required').forEach(field => {
        if (!field.value.trim()) {
            showError(field, 'Wajib diisi');
            valid = false;
        }

        // validasi NIK & KK wajib 16 digit
        if (field.classList.contains('nik-field')) {
            if (field.value.trim().length !== 16) {
                showError(field, 'Harus 16 digit angka');
                valid = false;
            }
        }
    });

    /* ========= 2. VALIDASI TABEL ANGGOTA ========= */
    document.querySelectorAll('.anggota-row').forEach(row => {
        const inputs = row.querySelectorAll('input');
        const filled = [...inputs].some(i => i.value.trim() !== '');

        if (filled) {
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    showError(input, 'Wajib diisi');
                    valid = false;
                }
            });

            const nik = row.querySelector('.nik-field');
            if (nik && nik.value.trim().length !== 16) {
                showError(nik, 'NIK harus 16 digit');
                valid = false;
            }
        }
    });

    if (!valid) {
        e.preventDefault();
    }
});

function showError(input, message) {
    input.classList.add('input-error');
    const error = input.parentElement.querySelector('.error-text');
    if (error) error.innerText = message;
}
</script>
@endsection
