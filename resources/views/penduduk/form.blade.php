<!-- ========================= -->
<!--    DATA PENDUDUK (CARD)   -->
<!-- ========================= -->

@if ($errors->any())
    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-6">
        <strong class="font-bold">Oops!</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded-2xl shadow-sm border space-y-6">

    <h3 class="text-xl font-bold text-gray-800 pb-2 border-b">Data Penduduk</h3>

    <!-- REUSABLE CLASS -->
    @php 
        $field = "w-full bg-blue-50 border border-blue-200 rounded-xl py-3 px-4 
                  focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition";
    @endphp

    <!-- === Fields === -->
    <div class="space-y-6">

        <!-- NIK -->
        <!-- <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
            <input type="text" name="nik" class="{{ $field }}"
                value="{{ old('nik', $penduduk->nik ?? '') }}"
                {{ isset($penduduk) ? 'readonly' : '' }}>
        </div> -->

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
            <input type="text" name="nik"
                class="{{ $field }} @error('nik') border-red-500 bg-red-50 @enderror"
                value="{{ old('nik', $penduduk->nik ?? '') }}"
                {{ isset($penduduk) ? 'readonly' : '' }}>

            @error('nik')
                <p class="text-sm text-red-600 mt-2">
                    ⚠️ {{ $message }}
                </p>
            @enderror
        </div>

        <!-- No KK -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">No KK</label>
            <input type="text" name="no_kk" class="{{ $field }}"
                value="{{ old('no_kk', $penduduk->no_kk ?? '') }}">
            <small class="text-gray-500">Jika belum ada akan dibuat otomatis.</small>
        </div>

        <!-- Nama -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" name="nama" class="{{ $field }}"
                value="{{ old('nama', $penduduk->nama ?? '') }}">
        </div>

        <!-- Tempat & Tanggal Lahir -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="{{ $field }}"
                value="{{ old('tempat_lahir', $penduduk->tempat_lahir ?? '') }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="{{ $field }}"
                value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir ?? '') }}">
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="{{ $field }}">
                <option value="Laki-laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <!-- Agama -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
            <input type="text" name="agama" class="{{ $field }}"
                value="{{ old('agama', $penduduk->agama ?? '') }}">
        </div>

        <!-- Status Perkawinan -->
        <div>
            @php $status = ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati']; @endphp
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status Perkawinan</label>
            <select name="status_perkawinan" class="{{ $field }}">
                @foreach($status as $s)
                    <option value="{{ $s }}" {{ old('status_perkawinan', $penduduk->status_perkawinan ?? '') == $s ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pendidikan -->
        <div>
            @php $pendidikanList = ['Tidak/Belum Sekolah','SD','SMP','SMA/SMK','Diploma','Sarjana','Pascasarjana']; @endphp
            <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan</label>
            <select name="pendidikan" class="{{ $field }}">
                @foreach($pendidikanList as $p)
                    <option value="{{ $p }}" {{ old('pendidikan', $penduduk->pendidikan ?? '') == $p ? 'selected' : '' }}>
                        {{ $p }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pekerjaan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="{{ $field }}"
                value="{{ old('pekerjaan', $penduduk->pekerjaan ?? '') }}">
        </div>

        <!-- Hubungan -->
        <div>
            @php $hubungan = ['Kepala Keluarga','Istri','Anak','Cucu','Orang Tua','Mertua','Famili Lain']; @endphp
            <label class="block text-sm font-semibold text-gray-700 mb-2">Hubungan dalam Keluarga</label>
            <select name="hubungan_dalam_keluarga" class="{{ $field }}">
                @foreach($hubungan as $h)
                    <option value="{{ $h }}" {{ old('hubungan_dalam_keluarga', $penduduk->hubungan_dalam_keluarga ?? '') == $h ? 'selected' : '' }}>
                        {{ $h }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Orang Tua -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ayah</label>
            <input type="text" name="nama_ayah" class="{{ $field }}"
                value="{{ old('nama_ayah', $penduduk->nama_ayah ?? '') }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Ibu</label>
            <input type="text" name="nama_ibu" class="{{ $field }}"
                value="{{ old('nama_ibu', $penduduk->nama_ibu ?? '') }}">
        </div>

        <!-- Goldar -->
        <div>
            @php $goldar = ['A','B','AB','O','-']; @endphp
            <label class="block text-sm font-semibold text-gray-700 mb-2">Golongan Darah</label>
            <select name="golongan_darah" class="{{ $field }}">
                @foreach($goldar as $g)
                    <option value="{{ $g }}" {{ old('golongan_darah', $penduduk->golongan_darah ?? '') == $g ? 'selected' : '' }}>
                        {{ $g }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kewarganegaraan -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kewarganegaraan</label>
            <input type="text" name="kewarganegaraan" class="{{ $field }}"
                value="{{ old('kewarganegaraan', $penduduk->kewarganegaraan ?? 'WNI') }}">
        </div>

    </div>
</div>


<!-- ========================= -->
<!--         ALAMAT (CARD)     -->
<!-- ========================= -->
<div class="bg-white p-6 rounded-2xl shadow-sm border mt-10 space-y-6">

    <h3 class="text-xl font-bold text-gray-800 pb-2 border-b">Alamat</h3>

    @php $alamat = $penduduk->alamat ?? null; @endphp

    <div class="space-y-6">

        @php $alamatField = $field; @endphp

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Padukuhan</label>
            <input type="text" name="nama_jalan" class="{{ $alamatField }}"
                value="{{ old('nama_jalan', $alamat->nama_jalan ?? '') }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">RT</label>
            <input type="text" name="rt" class="{{ $alamatField }}"
                value="{{ old('rt', $alamat->rt ?? '') }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">RW</label>
            <input type="text" name="rw" class="{{ $alamatField }}"
                value="{{ old('rw', $alamat->rw ?? '') }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kelurahan</label>
            <input type="text" name="kelurahan" class="{{ $alamatField }}"
                value="{{ old('kelurahan', $alamat->kelurahan ?? $defaultAlamat['kelurahan']) }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kecamatan</label>
            <input type="text" name="kecamatan" class="{{ $alamatField }}"
                value="{{ old('kecamatan', $alamat->kecamatan ?? $defaultAlamat['kecamatan']) }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kabupaten</label>
            <input type="text" name="kota" class="{{ $alamatField }}"
                value="{{ old('kota', $alamat->kota ?? $defaultAlamat['kota']) }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Provinsi</label>
            <input type="text" name="provinsi" class="{{ $alamatField }}"
                value="{{ old('provinsi', $alamat->provinsi ?? $defaultAlamat['provinsi']) }}">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Pos</label>
            <input type="text" name="kode_pos" class="{{ $alamatField }}"
                value="{{ old('kode_pos', $alamat->kode_pos ?? $defaultAlamat['kode_pos']) }}">
        </div>

    </div>
</div>

<!-- ========================= -->
<!--         BUTTON            -->
<!-- ========================= -->
<div class="flex justify-center mt-10">
    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-10 rounded-xl shadow">
        Simpan Data
    </button>
</div>
