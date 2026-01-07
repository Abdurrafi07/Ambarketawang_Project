<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat Keterangan Pernikahan - {{ $data['nama_pemohon'] ?? '' }}</title>
<style>
/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* PAGE A4 */
@page {
    size: A4;
    margin: 20mm;
}

/* BODY */
body {
    font-family: "Times New Roman", Times, serif;
    font-size: 10pt;
    line-height: 1.45;
    color: #000;
    /* JARAK DALAM HALAMAN */
    padding: 15mm;    
}

/* KOP SURAT */
.kop {
    text-align: center;
    margin-bottom: 6px;
}
.kop h2,
.kop h3 {
    font-weight: bold;
    margin: 1px 0;
}
hr {
    border: 1px solid #000;
    margin: 4px 0 6px 0;
}

/* TITLE */
.title {
    text-align: center;
    margin-bottom: 10px;
}
.title h3 {
    font-weight: bold;
    text-decoration: underline;
    margin-bottom: 3px;
}
.title p {
    margin-bottom: 4px;
}

/* CONTENT */
.content {
    text-align: justify;
    margin-bottom: 8px;
}
.content p {
    margin: 4px 0;
}

/* SECTION DATA */
.section {
    margin-bottom: 8px;
    page-break-inside: avoid;
}

/* BARIS DATA (LABEL + VALUE) */
.section p {
    display: flex;
    align-items: flex-start;
    margin: 3px 0;
}

/* LABEL */
.section .label {
    width: 155px;
    flex-shrink: 0;
    font-weight: bold;
}

/* VALUE → otomatis turun jika panjang */
.section p span:last-child,
.section p {
    word-break: break-word;
    white-space: normal;
}

/* SIGNATURE */
.signature {
    margin-top: 30px;
    text-align: right;
    page-break-inside: avoid;
}
.signature .space {
    margin-top: 100px;
    margin-bottom: 4px;
}
</style>
</head>
<body>

<!-- KOP SURAT -->
<div class="kop">
    <h2>PEMERINTAH KABUPATEN SLEMAN</h2>
    <h3>KAPANEWON GAMPING</h3>
    <h3>DESA / KALURAHAN AMBARKETAWANG</h3>
    <hr>
</div>

<!-- TITLE -->
<div class="title">
    <h3>SURAT KETERANGAN PERNIKAHAN</h3>
    <p>Nomor : {{ $data['nomor_surat'] ?? '---' }}</p>
</div>

<!-- INTRO -->
<div class="content">
    <p>
        Yang bertanda tangan di bawah ini Kepala Kalurahan Ambarketawang, Kecamatan Gamping, Kabupaten Sleman,
        menerangkan dengan sebenarnya bahwa:
    </p>
</div>

<!-- DATA PEMOHON -->
<div class="section">
    <p><span class="label">Nama:</span> {{ $data['nama_pemohon'] ?? '-' }}</p>
    <p><span class="label">NIK:</span> {{ $data['nik_pemohon'] ?? '-' }}</p>
    <p><span class="label">Jenis Kelamin:</span> {{ $data['jenis_kelamin_pemohon'] ?? '-' }}</p>
    <p><span class="label">Tempat / Tanggal Lahir:</span> {{ $data['tempat_tanggal_lahir_pemohon'] ?? '-' }}</p>
    <p><span class="label">Kewarganegaraan:</span> {{ $data['kewarganegaraan_pemohon'] ?? '-' }}</p>
    <p><span class="label">Agama:</span> {{ $data['agama_pemohon'] ?? '-' }}</p>
    <p><span class="label">Pekerjaan:</span> {{ $data['pekerjaan_pemohon'] ?? '-' }}</p>
    <p><span class="label">Pendidikan:</span> {{ $data['pendidikan_pemohon'] ?? '-' }}</p>
    <p><span class="label">Alamat:</span> {{ $data['alamat_pemohon'] ?? '-' }}</p>
    <p><span class="label">Status Perkawinan:</span> {{ $data['status_perkawinan_pemohon'] ?? '-' }}</p>
    @if(!empty($data['nama_pasangan_terdahulu']))
    <p><span class="label">Nama Pasangan Terdahulu:</span> {{ $data['nama_pasangan_terdahulu'] }}</p>
    @endif
</div>

<!-- DATA Pria -->
<div class="section">
    <p>Adalah benar anak dari perkawinan seorang pria:</p>
    <p><span class="label">Nama Lengkap:</span> {{ $data['nama_ayah'] ?? '-' }}</p>
    <p><span class="label">NIK:</span> {{ $data['nik_ayah'] ?? '-' }}</p>
    <p><span class="label">Tempat / Tanggal Lahir:</span> {{ $data['tempat_tanggal_lahir_ayah'] ?? '-' }}</p>
    <p><span class="label">Agama:</span> {{ $data['agama_ayah'] ?? '-' }}</p>
    <p><span class="label">Pekerjaan:</span> {{ $data['pekerjaan_ayah'] ?? '-' }}</p>
    <p><span class="label">Alamat:</span> {{ $data['alamat_ayah'] ?? '-' }}</p>
</div>

<!-- DATA Wanita -->
<div class="section">
    <p>Dengan seorang wanita:</p>
    <p><strong>Data Ibu:</strong></p>
    <p><span class="label">Nama Lengkap:</span> {{ $data['nama_ibu'] ?? '-' }}</p>
    <p><span class="label">NIK:</span> {{ $data['nik_ibu'] ?? '-' }}</p>
    <p><span class="label">Tempat / Tanggal Lahir:</span> {{ $data['tempat_tanggal_lahir_ibu'] ?? '-' }}</p>
    <p><span class="label">Agama:</span> {{ $data['agama_ibu'] ?? '-' }}</p>
    <p><span class="label">Pekerjaan:</span> {{ $data['pekerjaan_ibu'] ?? '-' }}</p>
    <p><span class="label">Alamat:</span> {{ $data['alamat_ibu'] ?? '-' }}</p>
</div>

<!-- PENUTUP -->
<div class="content">
    <p>Demikian surat keterangan pernikahan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
</div>

<!-- TANDA TANGAN -->
<div class="signature">
    <p>Ambarketawang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p><strong>Kepala Kalurahan Ambarketawang</strong></p>
    <div class="space"><strong>( {{ $kepala->nama ?? '_________________' }} )</strong></div>
    <p>NIP. {{ $kepala->nip ?? '-' }}</p>
</div>

</body>
</html>
