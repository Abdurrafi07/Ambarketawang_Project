@extends('layouts.form')

@section('title', 'Surat Keterangan Kelahiran')

@section('content')

<!-- KOP SURAT -->
<div class="text-center mb-6">
  <div class="text-sm text-gray-700 leading-tight">
    <p>KALURAHAN : AMBARKETAWANG</p>
    <p>KAPANEWON : GAMPING</p>
    <p>KABUPATEN/KOTA : SLEMAN</p>
  </div>
  <h1 class="text-xl font-bold mt-4 uppercase">Surat Keterangan Kelahiran</h1>
  <p class="text-gray-700">Nomor : </p>
  <div class="border-b border-gray-300 my-4"></div>
</div>

<form action="{{ route('surat.preview', ['jenis' => $jenis]) }}" method="POST" class="space-y-6">
  @csrf
  <input type="hidden" name="jenis" value="{{ $jenis }}">

  <!-- NOMOR SURAT -->
  <div class="bg-gray-50 rounded-xl p-4 mb-6">
      <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat</label>
      <input type="text" name="nomor_surat" id="nomor_surat" class="w-full border border-gray-300 rounded-md p-2" placeholder="Contoh: 052/AMB/VI/2025">
  </div>

  <!-- DATA KEPALA KELUARGA -->
  <div class="bg-gray-50 rounded-xl p-8">
    <h2 class="font-semibold text-gray-800 mb-6 uppercase">Data Kepala Keluarga</h2>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
        <input id="nama_kepala_keluarga" name="nama_kepala_keluarga" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Nomor Kartu Keluarga</label>
        <input id="no_kk" name="no_kk" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>
    </div>
  </div>

<!-- DATA ANAK -->
<div class="bg-gray-50 rounded-xl p-8">
  <h2 class="font-semibold text-gray-800 mb-6 uppercase">Data Anak</h2>
  <div class="space-y-4">

    <div>
      <label for="nik_anak" class="block text-sm font-medium text-gray-700">NIK</label>
      <input id="nik_anak" name="nik_anak" type="text"
             class="w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
      <label for="nama_anak" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
      <input id="nama_anak" name="nama_anak" type="text"
             class="w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
      <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
      <select id="jenis_kelamin" name="jenis_kelamin"
              class="w-full border border-gray-300 rounded-md p-2">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>

    <div>
      <label for="anak_ke" class="block text-sm font-medium text-gray-700">Anak ke</label>
      <input id="anak_ke" name="anak_ke" type="number"
             class="w-full border border-gray-300 rounded-md p-2">
    </div>

    <div>
      <label for="tempat_dilahirkan" class="block text-sm font-medium text-gray-700">Tempat Dilahirkan</label>
      <select id="tempat_dilahirkan" name="tempat_dilahirkan"
              class="w-full border border-gray-300 rounded-md p-2">
        <option value="">Pilih Tempat</option>
        <option value="Rumah Sakit">Rumah Sakit</option>
        <option value="Puskesmas">Puskesmas</option>
        <option value="Rumah">Rumah</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>

    <div>
      <label for="tempat_kelahiran" class="block text-sm font-medium text-gray-700">Tempat Kelahiran</label>
      <input id="tempat_kelahiran" name="tempat_kelahiran" type="text"
             class="w-full border border-gray-300 rounded-md p-2"
             placeholder="Contoh: RS Panti Rapih, Yogyakarta">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
      <div>
        <label for="tgl_anak" class="block text-sm font-medium text-gray-700">Hari dan Tanggal Lahir</label>
        <input id="tgl_anak" name="tgl_anak" type="date"
               class="w-full border border-gray-300 rounded-md p-2"
               max="{{ date('Y-m-d') }}">
      </div>
      <div>
        <label for="umur_anak" class="block text-sm font-medium text-gray-700">Umur</label>
        <div class="flex items-center">
          <input id="umur_anak" name="umur_anak" type="number" readonly
                 class="border border-gray-300 rounded-md p-2 w-24 bg-gray-100">
          <span class="ml-2">tahun</span>
        </div>
      </div>
    </div>

    <div>
      <label for="pukul" class="block text-sm font-medium text-gray-700">Pukul</label>
      <input id="pukul" name="pukul" type="time"
             class="w-full border border-gray-300 rounded-md p-2"
             max="{{ date('H:i') }}">
    </div>

    <div>
      <label for="jenis_kelahiran" class="block text-sm font-medium text-gray-700">Jenis Kelahiran</label>
      <select id="jenis_kelahiran" name="jenis_kelahiran"
              class="w-full border border-gray-300 rounded-md p-2">
        <option value="">Pilih Jenis</option>
        <option value="Tunggal">Tunggal</option>
        <option value="Kembar 2">Kembar 2</option>
        <option value="Kembar 3">Kembar 3</option>
      </select>
    </div>

    <div>
      <label for="penolong_kelahiran" class="block text-sm font-medium text-gray-700">Penolong Kelahiran</label>
      <select id="penolong_kelahiran" name="penolong_kelahiran"
              class="w-full border border-gray-300 rounded-md p-2">
        <option value="">Pilih Penolong</option>
        <option value="Dokter">Dokter</option>
        <option value="Bidan">Bidan</option>
        <option value="Perawat">Perawat</option>
      </select>
    </div>

    <div>
      <label for="berat_bayi" class="block text-sm font-medium text-gray-700">Berat Bayi (kg)</label>
      <input id="berat_bayi" name="berat_bayi" type="number" step="0.01"
             class="w-full border border-gray-300 rounded-md p-2"
             placeholder="Contoh: 3.2">
    </div>

    <div>
      <label for="panjang_bayi" class="block text-sm font-medium text-gray-700">Panjang Bayi (cm)</label>
      <input id="panjang_bayi" name="panjang_bayi" type="number" step="0.1"
             class="w-full border border-gray-300 rounded-md p-2"
             placeholder="Contoh: 48">
    </div>

  </div>
</div>


  <!-- DATA IBU KANDUNG -->
  <div class="bg-gray-50 rounded-xl p-8">
    <h2 class="font-semibold text-gray-800 mb-6 uppercase">Data Ibu Kandung</h2>
    <div class="space-y-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">NIK</label>
        <input id="nik_ibu" name="nik_ibu" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input id="nama_ibu" name="nama_ibu" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
        <div>
          <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
          <input id="tgl_ibu" name="tgl_ibu" type="date" class="w-full border border-gray-300 rounded-md p-2 w-24 bg-gray-100" readonly>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Umur</label>
          <div class="flex items-center">
            <input id="umur_ibu" name="umur_ibu" type="number" readonly class="border border-gray-300 rounded-md p-2 w-24 bg-gray-100">
            <span class="ml-2">tahun</span>
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
        <input id="pekerjaan_ibu" name="pekerjaan_ibu" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea id="alamat_ibu" name="alamat_ibu" class="w-full border border-gray-300 rounded-md p-2" rows="3"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
        <input id="kewarganegaraan_ibu" name="kewarganegaraan_ibu" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Kebangsaan</label>
        <input id="kebangsaan_ibu" name="kebangsaan_ibu" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

    </div>
  </div>


  <!-- DATA AYAH KANDUNG -->
  <div class="bg-gray-50 rounded-xl p-8">
    <h2 class="font-semibold text-gray-800 mb-6 uppercase">Data Ayah Kandung</h2>
    <div class="space-y-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">NIK</label>
        <input id="nik_ayah" name="nik_ayah" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input id="nama_ayah" name="nama_ayah" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
        <div>
          <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
          <input id="tgl_ayah" name="tgl_ayah" type="date" class="w-full border border-gray-300 rounded-md p-2 w-24 bg-gray-100" readonly>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Umur</label>
          <div class="flex items-center">
            <input id="umur_ayah" name="umur_ayah" type="number" readonly class="border border-gray-300 rounded-md p-2 w-24 bg-gray-100">
            <span class="ml-2">tahun</span>
          </div>
        </div>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
        <input id="pekerjaan_ayah" name="pekerjaan_ayah" type="text" class="w-full border border-gray-300 rounded-md p-2">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea id="alamat_ayah" name="alamat_ayah" class="w-full border border-gray-300 rounded-md p-2" rows="3"></textarea>
      </div>

    </div>
  </div>


  <!-- DATA SAKSI -->
  <div class="bg-gray-50 rounded-xl p-8">
    <h2 class="font-semibold text-gray-800 mb-6 uppercase">Data Saksi</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

      <!-- Saksi 1 -->
      <div class="space-y-4">
        <label class="block font-medium text-gray-700">Saksi 1</label>

        <div>
          <label class="block text-sm font-medium text-gray-700">NIK</label>
          <input id="nik_saksi1" name="nik_saksi1" type="text" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input id="nama_saksi1" name="nama_saksi1" type="text" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Umur</label>
          <div class="flex items-center">
            <input id="umur_saksi1" name="umur_saksi1" type="number" readonly class="border border-gray-300 rounded-md p-2 w-24 bg-gray-100">
            <span class="ml-2">tahun</span>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Alamat</label>
          <textarea id="alamat_saksi1" name="alamat_saksi1" class="w-full border border-gray-300 rounded-md p-2" rows="3"></textarea>
        </div>
      </div>

      <!-- Saksi 2 -->
      <div class="space-y-4">
        <label class="block font-medium text-gray-700">Saksi 2</label>

        <div>
          <label class="block text-sm font-medium text-gray-700">NIK</label>
          <input id="nik_saksi2" name="nik_saksi2" type="text" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input id="nama_saksi2" name="nama_saksi2" type="text" class="w-full border border-gray-300 rounded-md p-2">
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Umur</label>
          <div class="flex items-center">
            <input id="umur_saksi2" name="umur_saksi2" type="number" readonly class="border border-gray-300 rounded-md p-2 w-24 bg-gray-100">
            <span class="ml-2">tahun</span>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Alamat</label>
          <textarea id="alamat_saksi2" name="alamat_saksi2" class="w-full border border-gray-300 rounded-md p-2" rows="3"></textarea>
        </div>
      </div>

    </div>
  </div>

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


{{-- SCRIPT AUTOFILL + HITUNG UMUR + VALIDASI FORM --}}
<script>
/* ==========================
   Fungsi Hitung Umur
========================== */
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

function setupUmur(idTgl, idUmur) {
  const tgl = document.getElementById(idTgl);
  const umur = document.getElementById(idUmur);
  if (!tgl || !umur) return;
  tgl.addEventListener('change', () => umur.value = hitungUmur(tgl.value));
}

// Inisialisasi auto-calculate umur
setupUmur('tgl_anak', 'umur_anak');
setupUmur('tgl_ibu', 'umur_ibu');
setupUmur('tgl_ayah', 'umur_ayah');

/* ==========================
   Autofill Data Berdasarkan NIK
========================== */
async function autoFillData(nikInputId, fieldMap) {
  const input = document.getElementById(nikInputId);
  if (!input) return;

  input.addEventListener('change', async function () {
    const nik = this.value.trim();
    if (!nik) return;

    try {
      const res = await fetch(`/kelahiran/cari/${nik}`);
      if (!res.ok) throw new Error('Data tidak ditemukan');
      const data = await res.json();

      // Isi field sesuai mapping
      for (const [fieldId, key] of Object.entries(fieldMap)) {
        const el = document.getElementById(fieldId);
        if (el) el.value = data[key] ?? data.kartu_keluarga?.[key] ?? '';
      }

      // Autofill tanggal lahir + hitung umur
      const tglInput = document.getElementById(fieldMap.tgl ?? `tgl_${nikInputId.split('_')[1]}`);
      if (tglInput && data.tanggal_lahir) {
        tglInput.value = data.tanggal_lahir;
        tglInput.dispatchEvent(new Event('change'));
      }

      // Autofill data kepala keluarga jika ada
      if (data.kartu_keluarga) {
        const kk = data.kartu_keluarga;
        const noKkEl = document.getElementById('no_kk');
        const namaKKEl = document.getElementById('nama_kepala_keluarga');
        if (noKkEl) noKkEl.value = kk.no_kk ?? '';
        if (namaKKEl) namaKKEl.value = kk.nama_kepala_keluarga ?? kk.kepala_keluarga ?? kk.nama ?? '';
      }

    } catch (err) {
      alert(err.message);
    }
  });
}

// Mapping autofill untuk setiap NIK
autoFillData('nik_ibu', {
  nama_ibu: 'nama',
  tgl_ibu: 'tanggal_lahir',
  pekerjaan_ibu: 'pekerjaan',
  alamat_ibu: 'alamat',
  kewarganegaraan_ibu: 'kewarganegaraan',
  kebangsaan_ibu: 'kebangsaan'
});

autoFillData('nik_ayah', {
  nama_ayah: 'nama',
  tgl_ayah: 'tanggal_lahir',
  pekerjaan_ayah: 'pekerjaan',
  alamat_ayah: 'alamat'
});

autoFillData('nik_saksi1', {
  nama_saksi1: 'nama',
  alamat_saksi1: 'alamat'
});

autoFillData('nik_saksi2', {
  nama_saksi2: 'nama',
  alamat_saksi2: 'alamat'
});

// Auto-fill umur saksi dari tanggal lahir
['saksi1', 'saksi2'].forEach(saksi => {
  const nikInput = document.getElementById(`nik_${saksi}`);
  if (!nikInput) return;

  nikInput.addEventListener('change', async function() {
    const nik = this.value.trim();
    if (!nik) return;

    try {
      const res = await fetch(`/kelahiran/cari/${nik}`);
      if (!res.ok) return;
      const data = await res.json();

      if (data.tanggal_lahir) {
        const umurEl = document.getElementById(`umur_${saksi}`);
        if (umurEl) umurEl.value = hitungUmur(data.tanggal_lahir);
      }
    } catch (err) {
      // Silent fail untuk saksi
    }
  });
});

/* ==========================
   Validasi Form Sebelum Submit
========================== */
document.querySelector('form').addEventListener('submit', function(e) {

  // FIELD WAJIB (SEMUA KECUALI SAKSI)
  const requiredFields = [
    // Nomor Surat
    'nomor_surat',

    // Kepala Keluarga
    'nama_kepala_keluarga',
    'no_kk',

    // Data Anak
    'nik_anak',
    'nama_anak',
    'jenis_kelamin',
    'anak_ke',
    'tempat_dilahirkan',
    'tempat_kelahiran',
    'tgl_anak',
    'pukul',
    'jenis_kelahiran',
    'penolong_kelahiran',
    'berat_bayi',
    'panjang_bayi',

    // Data Ibu
    'nik_ibu',
    'nama_ibu',
    'tgl_ibu',
    'pekerjaan_ibu',
    'alamat_ibu',
    'kewarganegaraan_ibu',
    'kebangsaan_ibu',

    // Data Ayah
    'nik_ayah',
    'nama_ayah',
    'tgl_ayah',
    'pekerjaan_ayah',
    'alamat_ayah'
  ];

  let errors = [];

  requiredFields.forEach(id => {
    const el = document.getElementById(id);
    if (!el) return;

    let empty = false;

    if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
      empty = el.value.trim() === '';
    } else if (el.tagName === 'SELECT') {
      empty = el.value === '';
    }

    if (empty) {
      const labelEl = document.querySelector(`label[for="${id}"]`);
      const label = labelEl ? labelEl.innerText : id;

      errors.push(`⚠️ ${label} harus diisi`);

      el.classList.add('border-red-500', 'ring-1', 'ring-red-300');
    } else {
      el.classList.remove('border-red-500', 'ring-1', 'ring-red-300');
    }
  });

  if (errors.length > 0) {
    e.preventDefault();
    alert(errors.join('\n'));
  }
});
</script>
@endsection