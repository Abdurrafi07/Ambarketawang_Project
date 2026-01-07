<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat Domisili - {{ $data['namaInput'] ?? '' }}</title>
<style>
    * { margin:0; padding:0; box-sizing:border-box; }

    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 11pt;
        line-height: 1.4;
        color: #000;
        padding: 20mm;
    }

    .kop-surat { text-align:center; margin-bottom:10px; }
    .kop-surat h2 { font-size:15pt; font-weight:bold; margin-bottom:2px; text-transform:uppercase; }
    .kop-surat h3 { font-size:13pt; font-weight:bold; margin-bottom:2px; text-transform:uppercase; }
    .garis { border-bottom:2px solid #000; margin-top:5px; margin-bottom:10px; }

    .title-section { text-align:center; margin-bottom:15px; }
    .title-section h3 { font-weight:bold; text-decoration:underline; font-size:12pt; margin-bottom:3px; }
    .title-section p { font-size:11pt; }

    .content-text { text-align:justify; margin-bottom:10px; }
    .section { margin-bottom:10px; }
    .label { display:inline-block; width:150px; font-weight:bold; vertical-align:top; }
    .value { display:inline-block; width:calc(100% - 150px); }

    table { width:100%; border-collapse: collapse; margin-top:5px; font-size:10pt; }
    table th, table td { border:1px solid #000; padding:3px; text-align:left; }
    table th { background-color:#e0e7ff; text-align:center; }

    .signature { text-align:right; margin-top:20px; }
    .signature .space { margin-top:40px; }

    .section, .signature { page-break-inside: avoid; }

    @media print { body { zoom:0.95; } }
</style>
</head>
<body>

<!-- KOP SURAT -->
<div class="kop-surat">
<h2>PEMERINTAH KABUPATEN {{ strtoupper($data['kota'] ?? '...............') }}</h2>
<h3>KECAMATAN {{ strtoupper($data['kecamatan'] ?? '................') }}</h3>
<h3>DESA / KELURAHAN {{ strtoupper($data['desa'] ?? '..................') }}</h3>
<div class="garis"></div>
</div>

<!-- JUDUL SURAT -->
<div class="title-section">
<h3>SURAT KETERANGAN DOMISILI</h3>
<p>Nomor: {{ $data['nomor_surat'] ?? '---' }}</p>
</div>

<!-- PENGANTAR -->
<p class="content-text">
Yang bertanda tangan di bawah ini Kepala Desa/Lurah {{ $data['desa'] ?? '..................' }}, 
Kecamatan {{ $data['kecamatan'] ?? '..................' }}, 
Kabupaten {{ $data['kota'] ?? '..................' }}, menerangkan dengan sebenarnya bahwa:
</p>

<!-- DATA PEMOHON -->
<div class="section">
<p><span class="label">Nama</span><span class="value">: {{ $data['namaInput'] ?? '-' }}</span></p>
<p><span class="label">NIK</span><span class="value">: {{ $data['nikInput'] ?? '-' }}</span></p>
<p><span class="label">Tempat/Tgl Lahir</span><span class="value">: {{ $data['tempatInput'] ?? '-' }}, 
@if(isset($data['tanggalInput']) && $data['tanggalInput']) {{ \Carbon\Carbon::parse($data['tanggalInput'])->translatedFormat('d F Y') }} @else - @endif
</span></p>
<p><span class="label">Jenis Kelamin</span><span class="value">: {{ isset($data['genderInput']) && $data['genderInput']=='L' ? 'Laki-laki' : 'Perempuan' }}</span></p>
<p><span class="label">Agama</span><span class="value">: {{ $data['agamaInput'] ?? '-' }}</span></p>
<p><span class="label">Pekerjaan</span><span class="value">: {{ $data['pekerjaanInput'] ?? '-' }}</span></p>
<p><span class="label">Kewarganegaraan</span><span class="value">: {{ $data['wargaInput'] ?? 'Indonesia' }}</span></p>
</div>

<!-- ALAMAT DOMISILI -->
<div class="section">
<p class="content-text">Adalah benar bahwa orang tersebut di atas bertempat tinggal / berdomisili di alamat berikut:</p>
<p><span class="label">RT/RW</span><span class="value">: {{ $data['rt'] ?? '-' }} / {{ $data['rw'] ?? '-' }}</span></p>
<p><span class="label">Dusun/Dukuh/Kampung</span><span class="value">: {{ $data['dusun'] ?? '-' }}</span></p>
<p><span class="label">Desa/Kelurahan</span><span class="value">: {{ $data['desa'] ?? '-' }}</span></p>
<p><span class="label">Kecamatan</span><span class="value">: {{ $data['kecamatan'] ?? '-' }}</span></p>
<p><span class="label">Kabupaten/Kota</span><span class="value">: {{ $data['kota'] ?? '-' }}</span></p>
<p><span class="label">Provinsi</span><span class="value">: {{ $data['provinsi'] ?? '-' }}</span></p>
<p><span class="label">Kode Pos</span><span class="value">: {{ $data['kode_pos'] ?? '-' }}</span></p>
</div>

<!-- ANGGOTA KELUARGA -->
<div class="section">
<h3>Anggota Keluarga yang Domisili</h3>
<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>SHDK</th>
        </tr>
    </thead>
    <tbody>
        @php
            $anggotaList = [];
            if(isset($data['anggota'])) {
                if(is_string($data['anggota'])) {
                    $anggotaList = json_decode($data['anggota'], true) ?? [];
                } else {
                    $anggotaList = $data['anggota'];
                }
            }
            $totalRows = max(count($anggotaList), 7);
        @endphp

        @for($i=0; $i<$totalRows; $i++)
            @php $anggota = $anggotaList[$i] ?? null; @endphp
            <tr>
                <td style="text-align:center;">{{ $i+1 }}</td>
                <td>{{ $anggota['nik'] ?? '-' }}</td>
                <td>{{ $anggota['nama'] ?? '-' }}</td>
                <td>
                    @if(isset($anggota['tgl_lahir']) && $anggota['tgl_lahir'])
                        {{ \Carbon\Carbon::parse($anggota['tgl_lahir'])->translatedFormat('d F Y') }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $anggota['shdk'] ?? '-' }}</td>
            </tr>
        @endfor
    </tbody>
</table>
</div>

<!-- PENUTUP -->
<div class="section">
<p class="content-text">
Demikian surat keterangan domisili ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
</p>
</div>

<!-- TANDA TANGAN -->
<div class="signature">
<p>{{ $data['desa'] ?? '..................' }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
<p><strong>Kepala Desa / Lurah</strong></p>
<div class="space"><strong>(_______________________)</strong></div>
</div>

</body>
</html>
