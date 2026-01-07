@extends('layouts.form')

@section('title', 'Surat Keterangan Kematian')

@section('content')

<div class="text-center mb-8">
  <h2 class="text-lg font-bold text-gray-800 underline underline-offset-4 decoration-gray-800">
    Surat Keterangan Kematian
  </h2>
  <p class="mt-2 text-gray-700 font-medium">
    Nomor: ............................................................
  </p>
</div>

<form action="{{ route('surat.preview', ['jenis' => $jenis]) }}" method="POST" class="space-y-6">
  @csrf
  <input type="hidden" name="jenis" value="kematian">

  <!-- NOMOR SURAT -->
  <div class="bg-gray-50 rounded-xl p-4 mb-6">
      <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat</label>
      <input type="text" name="nomor_surat" id="nomor_surat" class="w-full border border-gray-300 rounded-md p-2" placeholder="Contoh: 052/AKM/VI/2025">
  </div>

  {{-- ==================== Data Kartu Keluarga ==================== --}}
  <div class="bg-gray-50 rounded-xl p-5 border">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Data Kartu Keluarga</h3>

    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kepala Keluarga</label>
    <input type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga"
      class="w-full border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
      readonly>

    <label class="block text-sm font-medium text-gray-700 mt-4 mb-2">Nomor Kartu Keluarga</label>
    <input type="text" name="no_kk" id="no_kk"
      class="w-full border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
      readonly>
  </div>

  {{-- ==================== Data Jenazah ==================== --}}
  <div class="bg-blue-50 border rounded-xl p-6">
    <h3 class="text-center text-blue-800 font-semibold mb-5 text-lg">Data Jenazah</h3>
    <div class="space-y-4">

      <label class="block text-sm font-medium text-gray-700">NIK Jenazah</label>
      <input type="number" name="nik_jenazah" id="nik_jenazah" placeholder="NIK Jenazah"
        class="w-full border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">

      <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
      <input type="text" name="nama" id="nama" placeholder="Nama Lengkap"
        class="w-full border-gray-300 rounded-xl py-3 px-4 bg-gray-100" readonly>

      <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
      <select name="jenis_kelamin" id="jenis_kelamin"
        class="w-full border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>

      <label class="block text-sm font-medium text-gray-700">Tanggal Lahir & Umur</label>
      <div class="flex items-center space-x-3">
        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
          class="flex-1 border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <div class="flex items-center space-x-1">
          <span class="text-gray-700 font-medium">Umur</span>
          <input type="text" id="umur_tanggal_lahir" readonly
            class="w-16 text-center border-gray-300 rounded-xl py-3 px-2 bg-gray-100 text-gray-700 font-medium">
          <span class="text-gray-700 font-medium">tahun</span>
        </div>
      </div>

      <label class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Agama</label>
      <input type="text" name="agama" id="agama" placeholder="Agama"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
      <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Alamat</label>
      <textarea name="alamat" id="alamat" placeholder="Alamat"
        class="w-full border-gray-300 rounded-xl py-3 px-4 resize-none"></textarea>

      <label class="block text-sm font-medium text-gray-700">Anak Ke-</label>
      <input type="number" name="anak_ke" id="anak_ke" placeholder="Anak Ke-"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Tanggal Kematian</label>
      <input type="date" name="tanggal_kematian" id="tanggal_kematian"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Pukul</label>
      <input type="time" name="pukul" id="pukul"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Sebab Kematian</label>
      <input type="text" name="sebab" id="sebab" placeholder="Sebab Kematian"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Tempat Kematian</label>
      <input type="text" name="tempat_kematian" id="tempat_kematian" placeholder="Tempat Kematian"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Yang Menerangkan</label>
      <input type="text" name="yang_menerangkan" id="yang_menerangkan" placeholder="Yang Menerangkan"
        class="w-full border-gray-300 rounded-xl py-3 px-4">
    </div>
  </div>

  {{-- ==================== Ayah, Ibu, Pelapor, Saksi ==================== --}}
  @foreach ([
      ['title' => 'Ayah', 'prefix' => 'ayah'],
      ['title' => 'Ibu', 'prefix' => 'ibu'],
      ['title' => 'Pelapor', 'prefix' => 'pelapor'],
      ['title' => 'Saksi 1', 'prefix' => 'saksi1'],
      ['title' => 'Saksi 2', 'prefix' => 'saksi2'],
  ] as $data)
  <div class="bg-blue-50 border rounded-xl p-6">
    <h3 class="text-center text-blue-800 font-semibold mb-5 text-lg">{{ $data['title'] }}</h3>
    <div class="space-y-4">

      <label class="block text-sm font-medium text-gray-700">NIK {{ $data['title'] }}</label>
      <input type="number" id="nik_{{ $data['prefix'] }}" name="nik_{{ $data['prefix'] }}" placeholder="NIK"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Nama Lengkap {{ $data['title'] }}</label>
      <input type="text" id="nama_{{ $data['prefix'] }}" name="nama_{{ $data['prefix'] }}" placeholder="Nama Lengkap"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Tanggal Lahir & Umur</label>
      <div class="flex items-center space-x-3">
        <input type="date" id="tgl_{{ $data['prefix'] }}" name="tgl_{{ $data['prefix'] }}"
          class="flex-1 border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <div class="flex items-center space-x-1">
          <span class="text-gray-700 font-medium">Umur</span>
          <input type="text" id="umur_tgl_{{ $data['prefix'] }}" readonly
            class="w-16 text-center border-gray-300 rounded-xl py-3 px-2 bg-gray-100 text-gray-700 font-medium">
          <span class="text-gray-700 font-medium">tahun</span>
        </div>
      </div>

      <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
      <input type="text" id="pekerjaan_{{ $data['prefix'] }}" name="pekerjaan_{{ $data['prefix'] }}" placeholder="Pekerjaan"
        class="w-full border-gray-300 rounded-xl py-3 px-4">

      <label class="block text-sm font-medium text-gray-700">Alamat</label>
      <textarea id="alamat_{{ $data['prefix'] }}" name="alamat_{{ $data['prefix'] }}" placeholder="Alamat"
        class="w-full border-gray-300 rounded-xl py-3 px-4 resize-none"></textarea>
    </div>
  </div>
  @endforeach

  {{-- ==================== Tombol Aksi ==================== --}}
    <div class="text-center mt-8 space-x-4">
        <a href="{{ url('/dashboard') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition inline-block">
            Batal
        </a>

        <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-800 transition">
            Preview Surat
        </button>
    </div>
</form>

{{-- ==================== SCRIPT ==================== --}}
<script>
// =========================
// Fungsi Hitung Umur
// =========================
function hitungUmur(tanggal) {
    if (!tanggal) return '';
    const tgl = new Date(tanggal);
    const now = new Date();
    let umur = now.getFullYear() - tgl.getFullYear();
    const bulan = now.getMonth() - tgl.getMonth();
    const hari = now.getDate() - tgl.getDate();
    if (bulan < 0 || (bulan === 0 && hari < 0)) umur--;
    return umur >= 0 ? umur : '';
}

function setupUmur(tanggalId, umurId) {
    const inputTgl = document.getElementById(tanggalId);
    const inputUmur = document.getElementById(umurId);
    if (!inputTgl || !inputUmur) return;
    inputTgl.addEventListener('change', () => inputUmur.value = hitungUmur(inputTgl.value));
}

// Setup umur otomatis
setupUmur('tanggal_lahir', 'umur_tanggal_lahir');
['ayah','ibu','pelapor','saksi1','saksi2'].forEach(prefix => {
    setupUmur(`tgl_${prefix}`, `umur_tgl_${prefix}`);
});

// =========================
// Batasi tanggal kematian
// =========================
const tglKematian = document.getElementById('tanggal_kematian');
const tglLahir = document.getElementById('tanggal_lahir');
if (tglKematian) {
    const today = new Date().toISOString().split('T')[0];
    tglKematian.max = today;

    tglKematian.addEventListener('change', function() {
        if (!tglLahir.value) return;
        const lahir = new Date(tglLahir.value);
        const kematian = new Date(this.value);

        if (kematian < lahir) {
            alert('⚠️ Tanggal kematian tidak boleh sebelum tanggal lahir!');
            this.value = '';
        } else if (kematian > new Date()) {
            alert('⚠️ Tanggal kematian tidak boleh lebih dari hari ini!');
            this.value = today;
        }
    });
}

// =========================
// Autofill Data
// =========================
function autoFillData(nikInputId, fieldMap) {
    const nikInput = document.getElementById(nikInputId);
    if (!nikInput) return;

    nikInput.addEventListener('change', function() {
        const nik = this.value.trim();
        if (!nik) return;

        fetch(`/api/penduduk/${nik}`)
            .then(res => {
                if (!res.ok) throw new Error('Data tidak ditemukan');
                return res.json();
            })
            .then(data => {
                for (const [fieldId, value] of Object.entries(fieldMap)) {
                    const el = document.getElementById(fieldId);
                    if (el) el.value = data[value] ?? data.kartu_keluarga?.[value] ?? '';
                }

                // hitung umur otomatis
                const tglKey = Object.keys(fieldMap).find(k => k.includes('tgl') || k.includes('tanggal_lahir'));
                if (tglKey && document.getElementById(tglKey)) {
                    const umurInput = document.getElementById('umur_' + tglKey);
                    if (umurInput && data.tanggal_lahir) {
                        umurInput.value = hitungUmur(data.tanggal_lahir);
                    }
                }

                // isi jenis kelamin
                const jk = document.getElementById('jenis_kelamin');
                if (jk && data.jenis_kelamin) {
                    let val = data.jenis_kelamin.trim().toUpperCase();
                    jk.value = val.startsWith('L') ? 'L' : val.startsWith('P') ? 'P' : '';
                }

                // nama kepala keluarga & no_kk
                const kk = data.kartu_keluarga ?? {};
                document.getElementById('nama_kepala_keluarga').value =
                    data.nama_kepala_keluarga ?? kk.nama_kepala_keluarga ?? kk.kepala_keluarga ?? kk.nama_kepala ?? '';
                document.getElementById('no_kk').value = data.no_kk ?? kk.no_kk ?? '';
            })
            .catch(err => alert('⚠️ ' + err.message + '. Silakan isi manual.'));
    });
}

// Setup autofill
autoFillData('nik_jenazah', {
    nama: 'nama',
    tempat_lahir: 'tempat_lahir',
    tanggal_lahir: 'tanggal_lahir',
    agama: 'agama',
    pekerjaan: 'pekerjaan',
    alamat: 'alamat'
});

['ayah','ibu','pelapor','saksi1','saksi2'].forEach(prefix => {
    autoFillData(`nik_${prefix}`, {
        [`nama_${prefix}`]: 'nama',
        [`tgl_${prefix}`]: 'tanggal_lahir',
        [`pekerjaan_${prefix}`]: 'pekerjaan',
        [`alamat_${prefix}`]: 'alamat'
    });
});

// =========================
// Validasi Form Sebelum Submit
// =========================
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = [
        'nomor_surat',
        'nik_jenazah',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'pekerjaan',
        'alamat',
        'anak_ke',
        'tanggal_kematian',
        'pukul',
        'sebab',
        'tempat_kematian',
        'yang_menerangkan',
        'nik_ayah',
        'nama_ayah',
        'tgl_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nik_ibu',
        'nama_ibu',
        'tgl_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'nik_pelapor',
        'nama_pelapor',
        'tgl_pelapor',
        'pekerjaan_pelapor',
        'alamat_pelapor',
        'nik_saksi1',
        'nama_saksi1',
        'tgl_saksi1',
        'pekerjaan_saksi1',
        'alamat_saksi1',
        // saksi2 tidak wajib
    ];

    let errors = [];

    requiredFields.forEach(id => {
        const el = document.getElementById(id);
        if (!el) return;

        let isEmpty = false;

        if (el.tagName === 'INPUT') {
            const type = el.type.toLowerCase();
            if (type === 'text' || type === 'time' || type === 'date') {
                isEmpty = el.value.trim() === '';
            } else if (type === 'number') {
                isEmpty = el.value === '' || el.value === null;
            }
        } else if (el.tagName === 'SELECT') {
            isEmpty = el.value === '';
        } else if (el.tagName === 'TEXTAREA') {
            isEmpty = el.value.trim() === '';
        }

        if (isEmpty) {
            // Ambil label yang sesuai dengan input via atribut for
            const labelEl = document.querySelector(`label[for="${id}"]`);
            const label = labelEl ? labelEl.innerText : id;

            if (!errors.includes(label)) { // Cegah duplikasi
                errors.push(`${label} harus diisi`);
            }
            el.classList.add('border-red-500', 'ring-red-200');
        } else {
            el.classList.remove('border-red-500', 'ring-red-200');
        }
    });

    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\n'));
        return false;
    }
});
</script>
@endsection
