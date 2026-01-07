<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat Kematian - {{ $data['nama'] ?? '' }}</title>
<style>
/* RESET */
* { margin:0; padding:0; box-sizing:border-box; }

/* BODY */
body {
    font-family: 'Times New Roman', Times, serif;
    font-size: 9.5pt;          /* lebih kecil */
    line-height: 1.2;
    width: 100%;
    padding: 10mm 10mm;         /* minimal, supaya tidak terpotong */
    color: #000;
}

/* KOP SURAT */
.kop { text-align:center; margin-bottom:5px; }
.kop h2, .kop h3 { font-weight:bold; margin:1px 0; }
hr { border:1px solid #000; margin:3px 0 5px 0; }

/* TITLE */
.title { text-align:center; margin-bottom:5px; }
.title h3 { font-weight:bold; text-decoration:underline; margin-bottom:2px; }
.title p { margin-bottom:3px; }

/* CONTENT */
.content { text-align:justify; margin-bottom:4px; }
.section { margin-bottom:4px; }
.section p { margin:1px 0; }
.section .label { display:inline-block; width:140px; font-weight:bold; vertical-align:top; }

/* SIGNATURE */
.signature { text-align:right; max-width:180mm; margin-top:12px; }
.signature .space { margin-top:40px; margin-bottom:3px; }

/* PREVENT PAGE BREAK INSIDE */
.section, .signature { page-break-inside: avoid; }

/* OPTIONAL: scaling print */
@media print {
    body { zoom: 0.95; }
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
<h3>SURAT KETERANGAN KEMATIAN</h3>
<p>Nomor : {{ $data['nomor_surat'] ?? '---' }}</p>
</div>

<!-- INTRO -->
<div class="content">
<p>Yang bertanda tangan di bawah ini Lurah Ambarketawang, Kecamatan Gamping, Kabupaten Sleman, menerangkan dengan sebenarnya bahwa:</p>
</div>

<!-- DATA KK -->
<div class="section">
<p><span class="label">Nama Kepala Keluarga:</span> {{ $data['nama_kepala_keluarga'] ?? '-' }}</p>
<p><span class="label">Nomor KK:</span> {{ $data['no_kk'] ?? '-' }}</p>
</div>

<!-- DATA JENAZAH -->
<div class="section">
<p><strong>Data Jenazah:</strong></p>
<p><span class="label">Nama:</span> {{ $data['nama'] ?? '-' }}</p>
<p><span class="label">NIK:</span> {{ $data['nik_jenazah'] ?? '-' }}</p>
<p><span class="label">Jenis Kelamin:</span> {{ $data['jenis_kelamin'] ?? '-' }}</p>
<p><span class="label">Tempat/Tgl Lahir:</span> {{ $data['tempat_lahir'] ?? '-' }}, 
@if(isset($data['tanggal_lahir']))
{{ \Carbon\Carbon::parse($data['tanggal_lahir'])->translatedFormat('d F Y') }}
@else - @endif
</p>
<p><span class="label">Agama:</span> {{ $data['agama'] ?? '-' }}</p>
<p><span class="label">Pekerjaan:</span> {{ $data['pekerjaan'] ?? '-' }}</p>
<p><span class="label">Alamat:</span> {{ $data['alamat'] ?? '-' }}</p>
<p><span class="label">Anak ke:</span> {{ $data['anak_ke'] ?? '-' }}</p>
<p><span class="label">Tanggal Kematian:</span> @if(isset($data['tanggal_kematian'])) {{ \Carbon\Carbon::parse($data['tanggal_kematian'])->translatedFormat('d F Y') }} @else - @endif</p>
<p><span class="label">Jam:</span> {{ $data['pukul'] ?? '-' }}</p>
<p><span class="label">Sebab:</span> {{ $data['sebab'] ?? '-' }}</p>
<p><span class="label">Tempat Kematian:</span> {{ $data['tempat_kematian'] ?? '-' }}</p>
<p><span class="label">Yang Menerangkan:</span> {{ $data['yang_menerangkan'] ?? '-' }}</p>
</div>

<!-- ORANG TUA / PELAPOR / SAKSI -->
@foreach (['Ayah'=>'ayah','Ibu'=>'ibu','Pelapor'=>'pelapor','Saksi I'=>'saksi1','Saksi II'=>'saksi2'] as $role => $prefix)
<div class="section">
<p><strong>Data {{ $role }}:</strong></p>
<p><span class="label">Nama:</span> {{ $data["nama_{$prefix}"] ?? '-' }}</p>
<p><span class="label">NIK:</span> {{ $data["nik_{$prefix}"] ?? '-' }}</p>
<p><span class="label">Tanggal Lahir:</span> @if(isset($data["tgl_{$prefix}"])) {{ \Carbon\Carbon::parse($data["tgl_{$prefix}"])->translatedFormat('d F Y') }} @else - @endif</p>
<p><span class="label">Pekerjaan:</span> {{ $data["pekerjaan_{$prefix}"] ?? '-' }}</p>
<p><span class="label">Alamat:</span> {{ $data["alamat_{$prefix}"] ?? '-' }}</p>
</div>
@endforeach

<!-- PENUTUP -->
<div class="content">
<p>Demikian surat keterangan kematian ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
</div>

<!-- TANDA TANGAN -->
<div class="signature">
<p>Ambarketawang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
<p><strong>Lurah Ambarketawang</strong></p>
<div class="space"><strong>( {{ $lurah->nama ?? '_________________' }} )</strong></div>
<p>NIP. {{ $lurah->nip ?? '-' }}</p>
</div>

</body>
</html>
