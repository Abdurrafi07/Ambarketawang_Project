@extends('layouts.form')

@section('title', 'Surat Keterangan Pernikahan')

@section('content')

<!-- === KOP SURAT === -->
<div class="text-center mb-6">
  <div class="text-sm text-gray-700 leading-tight">
    <p>KALURAHAN : AMBARKETAWANG</p>
    <p>KAPANEWON : GAMPING</p>
    <p>KABUPATEN/KOTA : SLEMAN</p>
  </div>
  <h1 class="text-xl font-bold mt-4 uppercase">Surat Keterangan Pernikahan</h1>
  <p class="text-gray-700">Nomor: ............................................................</p>
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

  <!-- === DATA PEMOHON === -->
  <div class="bg-gray-50 rounded-xl p-8 mb-8">
    <p class="font-semibold mb-6 text-gray-800">
      Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa:
    </p>

    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
        <input type="text" name="nama_pemohon" value="{{ $penduduk->nama ?? '' }}" placeholder="Masukkan nama lengkap" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
        <input type="number" name="nik_pemohon" value="{{ $penduduk->nik ?? '' }}" placeholder="Masukkan NIK" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin_pemohon" value="{{ $penduduk->jenis_kelamin ?? '' }}" placeholder="Laki-laki / Perempuan" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat & Tanggal Lahir</label>
        <input type="text" name="tempat_tanggal_lahir_pemohon" value="{{ isset($penduduk) ? $penduduk->tempat_lahir . ', ' . \Carbon\Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y') : '' }}" placeholder="Contoh: Sleman, 1 Januari 2000" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Kewarganegaraan</label>
        <input type="text" name="kewarganegaraan_pemohon" value="{{ $penduduk->kewarganegaraan ?? '' }}" placeholder="Masukkan kewarganegaraan" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
        <input type="text" name="agama_pemohon" value="{{ $penduduk->agama ?? '' }}" placeholder="Masukkan agama" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
        <input type="text" name="pekerjaan_pemohon" value="{{ $penduduk->pekerjaan ?? '' }}" placeholder="Masukkan pekerjaan" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Terakhir</label>
        <input type="text" name="pendidikan_pemohon" value="{{ $penduduk->pendidikan ?? '' }}" placeholder="Masukkan pendidikan terakhir" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat_pemohon" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan alamat lengkap" required>{{ $penduduk->alamat->alamat_lengkap ?? '' }}</textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Status Perkawinan</label>
        <input type="text" name="status_perkawinan_pemohon" value="{{ $penduduk->status_perkawinan ?? '' }}" placeholder="Belum Kawin / Duda / Janda" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Istri/Suami Terdahulu</label>
        <input type="text" name="nama_pasangan_terdahulu" placeholder="Isi jika ada" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
      </div>
    </div>
  </div>

  <!-- === DATA ORANG TUA PRIA === -->
  <div class="bg-gray-50 rounded-xl p-8 mb-8">
    <p class="font-semibold mb-6 text-gray-800">Adalah benar anak dari perkawinan seorang pria:</p>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama_ayah" placeholder="Masukkan nama lengkap" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
        <input type="number" name="nik_ayah" placeholder="Masukkan NIK" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat & Tanggal Lahir</label>
        <input type="text" name="tempat_tanggal_lahir_ayah" placeholder="Contoh: Sleman, 2 Februari 1970" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
        <input type="text" name="agama_ayah" placeholder="Masukkan agama" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
        <input type="text" name="pekerjaan_ayah" placeholder="Masukkan pekerjaan" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat_ayah" placeholder="Masukkan alamat lengkap" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
      </div>
    </div>
  </div>

  <!-- === DATA IBU === -->
  <div class="bg-gray-50 rounded-xl p-8 mb-8">
    <p class="font-semibold mb-6 text-gray-800">Dengan seorang wanita:</p>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
        <input type="text" name="nama_ibu" placeholder="Masukkan nama lengkap" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
        <input type="number" name="nik_ibu" placeholder="Masukkan NIK" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat & Tanggal Lahir</label>
        <input type="text" name="tempat_tanggal_lahir_ibu" placeholder="Contoh: Sleman, 5 Mei 1975" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
        <input type="text" name="agama_ibu" placeholder="Masukkan agama" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
        <input type="text" name="pekerjaan_ibu" placeholder="Masukkan pekerjaan" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
        <textarea name="alamat_ibu" placeholder="Masukkan alamat lengkap" class="w-full h-12 border border-gray-300 rounded-lg shadow-sm px-3 py-2 resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
      </div>
    </div>

    <p class="mt-6 text-sm text-gray-700 leading-relaxed">
      Demikianlah, Surat Pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
    </p>
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

<script>
document.addEventListener('DOMContentLoaded', function() {

  // ==== FUNGSI AMBIL DATA DARI API ====
  async function fetchPenduduk(nik) {
    const res = await fetch(`/api/pernikahan/penduduk/${nik}`);
    if (!res.ok) throw new Error('Data tidak ditemukan');
    return await res.json();
  }

  // ==== PEMOHON ====
  const nikPemohon = document.querySelector('input[name="nik_pemohon"]');
  if (nikPemohon) {
    nikPemohon.addEventListener('change', async function() {
      const nik = this.value.trim();
      if (!nik) return;
      try {
        const data = await fetchPenduduk(nik);
        const form = this.closest('form');
        form.querySelector('input[name="nama_pemohon"]').value = data.nama || '';
        form.querySelector('input[name="jenis_kelamin_pemohon"]').value = data.jenis_kelamin || '';
        form.querySelector('input[name="tempat_tanggal_lahir_pemohon"]').value = data.tempat_tanggal_lahir || '';
        form.querySelector('input[name="kewarganegaraan_pemohon"]').value = data.kewarganegaraan || '';
        form.querySelector('input[name="agama_pemohon"]').value = data.agama || '';
        form.querySelector('input[name="pekerjaan_pemohon"]').value = data.pekerjaan || '';
        form.querySelector('input[name="pendidikan_pemohon"]').value = data.pendidikan || '';
        form.querySelector('textarea[name="alamat_pemohon"]').value = data.alamat || '';
        form.querySelector('input[name="status_perkawinan_pemohon"]').value = data.status_perkawinan || '';
      } catch (err) {
        alert(err.message);
      }
    });
  }

  // ==== ORANG TUA PRIA ====
  const nikAyah = document.querySelector('input[name="nik_ayah"]');
  if (nikAyah) {
    nikAyah.addEventListener('change', async function() {
      const nik = this.value.trim();
      if (!nik) return;
      try {
        const data = await fetchPenduduk(nik);
        const form = this.closest('form');
        form.querySelector('input[name="nama_ayah"]').value = data.nama || '';
        form.querySelector('input[name="tempat_tanggal_lahir_ayah"]').value = data.tempat_tanggal_lahir || '';
        form.querySelector('input[name="agama_ayah"]').value = data.agama || '';
        form.querySelector('input[name="pekerjaan_ayah"]').value = data.pekerjaan || '';
        form.querySelector('textarea[name="alamat_ayah"]').value = data.alamat || '';
      } catch (err) {
        alert(err.message);
      }
    });
  }

  // ==== IBU ====
  const nikIbu = document.querySelector('input[name="nik_ibu"]');
  if (nikIbu) {
    nikIbu.addEventListener('change', async function() {
      const nik = this.value.trim();
      if (!nik) return;
      try {
        const data = await fetchPenduduk(nik);
        const form = this.closest('form');
        form.querySelector('input[name="nama_ibu"]').value = data.nama || '';
        form.querySelector('input[name="tempat_tanggal_lahir_ibu"]').value = data.tempat_tanggal_lahir || '';
        form.querySelector('input[name="agama_ibu"]').value = data.agama || '';
        form.querySelector('input[name="pekerjaan_ibu"]').value = data.pekerjaan || '';
        form.querySelector('textarea[name="alamat_ibu"]').value = data.alamat || '';
      } catch (err) {
        alert(err.message);
      }
    });
  }

});

</script>

@endsection