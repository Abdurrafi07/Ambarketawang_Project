@extends('layouts.form')

@section('title', 'Surat Keterangan Kematian')

@section('content')

<style>
/* ==== STYLING NORMAL (DI LAYAR) ==== */
.print-area {
    max-width: 210mm;
    margin: 0 auto;
    background: white;
    padding: 20px;
}

.kop-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    gap: 15px;
}

.kop-logo {
    width: 80px;
    height: auto;
}

.kop-teks {
    text-align: center;
    line-height: 1.4;
}

.kop-jawa {
    font-size: 11pt;
    margin: 2px 0;
}

hr {
    border: none;
    border-top: 3px solid black;
    margin: 10px 0;
}

.title {
    text-align: center;
    font-size: 16pt;
    font-weight: bold;
    margin: 15px 0 5px 0;
    text-decoration: underline;
}

.nomor-surat {
    text-align: center;
    margin: 0 0 20px 0;
}

.section {
    margin-bottom: 20px;
}

.section h2 {
    font-size: 12pt;
    font-weight: bold;
    margin-bottom: 10px;
    text-decoration: underline;
}

.section p {
    margin: 5px 0;
    line-height: 1.6;
}

.label {
    display: inline-block;
    min-width: 180px;
    font-weight: 500;
}

.ttd-section {
    margin-top: 40px;
    display: flex;
    justify-content: flex-end;
}

.ttd-kanan {
    text-align: center;
    min-width: 250px;
}

.ttd-space {
    height: 60px;
}

/* ==== PRINT MODE ==== */
@media print {
    /* Reset semua margin dan padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        margin: 0 !important;
        padding: 0 !important;
        background: white !important;
        width: 210mm;
        height: 297mm;
    }

    /* Sembunyikan elemen yang tidak perlu dicetak */
    .no-print,
    header, 
    footer, 
    nav, 
    .navbar, 
    .sidebar,
    button,
    form[action*="download"],
    a.bg-gray-200,
    .btn {
        display: none !important;
    }

    /* Set ukuran halaman A4 */
    @page {
        size: A4 portrait;
        margin: 15mm 20mm;
    }

    /* Container utama */
    .print-area {
        width: 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
        box-shadow: none !important;
        background: white !important;
    }

    /* Typography untuk print */
    body {
        font-size: 10pt !important;
        line-height: 1.4 !important;
        color: black !important;
        font-family: 'Times New Roman', serif !important;
    }

    /* Kop Surat */
    .kop-container {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin-bottom: 8px !important;
        gap: 12px !important;
    }

    .kop-logo {
        width: 70px !important;
        height: auto !important;
        flex-shrink: 0 !important;
    }

    .kop-teks {
        text-align: center !important;
        line-height: 1.3 !important;
    }

    .kop-teks div {
        margin: 1px 0 !important;
        font-size: 11pt !important;
    }

    .kop-teks div b {
        font-weight: bold !important;
    }

    .kop-jawa {
        font-size: 10pt !important;
        margin: 2px 0 !important;
    }

    /* Garis pemisah */
    hr {
        border: none !important;
        border-top: 3px solid black !important;
        margin: 8px 0 !important;
        page-break-after: avoid !important;
    }

    /* Title */
    .title {
        text-align: center !important;
        font-size: 14pt !important;
        font-weight: bold !important;
        margin: 10px 0 5px 0 !important;
        text-decoration: underline !important;
    }

    .nomor-surat {
        text-align: center !important;
        font-size: 10pt !important;
        margin: 0 0 15px 0 !important;
    }

    /* Section */
    .section {
        margin-bottom: 12px !important;
        page-break-inside: avoid !important;
    }

    .section h2 {
        font-size: 11pt !important;
        font-weight: bold !important;
        margin-bottom: 6px !important;
        text-decoration: underline !important;
    }

    .section p {
        margin: 3px 0 !important;
        line-height: 1.4 !important;
        font-size: 10pt !important;
    }

    .label {
        display: inline-block !important;
        min-width: 160px !important;
        font-weight: 500 !important;
    }

    /* Tanda tangan */
    .ttd-section {
        margin-top: 20px !important;
        display: flex !important;
        justify-content: flex-end !important;
        page-break-inside: avoid !important;
    }

    .ttd-kanan {
        text-align: center !important;
        min-width: 200px !important;
    }

    .ttd-kanan p {
        margin: 3px 0 !important;
        font-size: 10pt !important;
    }

    .ttd-space {
        height: 45px !important;
    }

    /* Bold text */
    b, strong {
        font-weight: bold !important;
    }

    /* Underline */
    u {
        text-decoration: underline !important;
    }

    /* Prevent orphans and widows */
    p {
        orphans: 3 !important;
        widows: 3 !important;
    }

    /* Force content to fit */
    .print-area {
        page-break-inside: auto !important;
    }
}
</style>

<div class="print-area">
    <!-- KOP SURAT -->
    <div class="kop-container">
        <img src="{{ asset('images/logo.png') }}" class="kop-logo" alt="Logo Sleman" />

        <div class="kop-teks">
            <div><b>PEMERINTAH KABUPATEN SLEMAN</b></div>
            <div><b>KAPANEWON GAMPING</b></div>
            <div><b>PEMERINTAH KALURAHAN AMBARKETAWANG</b></div>
            <div class="kop-jawa">ꦥꦼꦩꦺꦫꦶꦤ꧀ꦛ ꦏꦭꦸꦫꦃꦲꦤ꧀ ꦄꦩ꧀ꦧꦂꦏꦼꦠꦮꦁ</div>
            <div style="font-size: 7pt; margin-top: 1px">
                Jl. Wates Km 5, Ambarketawang, Gamping, Sleman, 55294<br>
                Telp. (0274) 797496 — Website: ambarketawangsid.slemankab.go.id
            </div>
        </div>
    </div>

    <hr>

    <h1 class="title">SURAT KETERANGAN KEMATIAN</h1>
    <p class="nomor-surat">Nomor : {{ $data['nomor_surat'] ?? '---' }}</p>

    {{-- ================================ --}}
    {{-- BAGIAN: DATA KK --}}
    {{-- ================================ --}}
    <div class="section">
        <p><span class="label">Nama Kepala Keluarga:</span> {{ $data['nama_kepala_keluarga'] }}</p>
        <p><span class="label">Nomor Kepala Keluarga:</span> {{ $data['no_kk'] }}</p>
    </div>

    {{-- ================================ --}}
    {{-- BAGIAN: DATA JENAZAH --}}
    {{-- ================================ --}}
    <div class="section">
        <h2>Data Jenazah</h2>

        <p><span class="label">Nama:</span> {{ $data['nama'] }}</p>
        <p><span class="label">NIK:</span> {{ $data['nik_jenazah'] }}</p>
        <p><span class="label">Jenis Kelamin:</span> {{ $data['jenis_kelamin'] }}</p>

        <p><span class="label">Tempat, Tanggal Lahir:</span>
            {{ $data['tempat_lahir'] }},
            {{ \Carbon\Carbon::parse($data['tanggal_lahir'])->translatedFormat('d F Y') }}
        </p>

        <p><span class="label">Agama:</span> {{ $data['agama'] }}</p>
        <p><span class="label">Pekerjaan:</span> {{ $data['pekerjaan'] }}</p>
        <p><span class="label">Alamat:</span> {{ $data['alamat'] }}</p>
        <p><span class="label">Anak ke:</span> {{ $data['anak_ke'] }}</p>

        <p><span class="label">Tanggal Kematian:</span>
            {{ \Carbon\Carbon::parse($data['tanggal_kematian'])->translatedFormat('d F Y') }}
        </p>

        <p><span class="label">Jam:</span> {{ $data['pukul'] }}</p>
        <p><span class="label">Sebab:</span> {{ $data['sebab'] }}</p>
        <p><span class="label">Tempat Kematian:</span> {{ $data['tempat_kematian'] }}</p>
        <p><span class="label">Yang Menerangkan:</span> {{ $data['yang_menerangkan'] }}</p>
    </div>

    {{-- ================================ --}}
    {{-- AYAH, IBU, PELAPOR, SAKSI1, SAKSI2 --}}
    {{-- ================================ --}}
    @foreach ([
        ['title' => 'Data Ayah', 'prefix' => 'ayah'],
        ['title' => 'Data Ibu', 'prefix' => 'ibu'],
        ['title' => 'Data Pelapor', 'prefix' => 'pelapor'],
        ['title' => 'Data Saksi I', 'prefix' => 'saksi1'],
        ['title' => 'Data Saksi II', 'prefix' => 'saksi2'],
    ] as $p)

    <div class="section">
        <h2>{{ $p['title'] }}</h2>

        <p><span class="label">Nama:</span> {{ $data["nama_{$p['prefix']}"] }}</p>
        <p><span class="label">NIK:</span> {{ $data["nik_{$p['prefix']}"] }}</p>

        <p><span class="label">Tanggal Lahir:</span>
            {{ \Carbon\Carbon::parse($data["tgl_{$p['prefix']}"])->translatedFormat('d F Y') }}
        </p>

        <p><span class="label">Pekerjaan:</span> {{ $data["pekerjaan_{$p['prefix']}"] }}</p>
        <p><span class="label">Alamat:</span> {{ $data["alamat_{$p['prefix']}"] }}</p>
    </div>

    @endforeach

    {{-- ================================ --}}
    {{-- BAGIAN TTD --}}
    {{-- ================================ --}}
    <div class="ttd-section">
        <div class="ttd-kanan">
            <p>Ambarketawang,
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </p>

            <p><b>Lurah Ambarketawang</b></p>

            <div class="ttd-space"></div>

            <p><b><u>{{ $lurah->nama ?? '(Nama Lurah)' }}</u></b></p>
            <p>NIP. {{ $lurah->nip ?? '-' }}</p>
        </div>
    </div>

    <!-- TOMBOL AKSI -->
<!-- TOMBOL AKSI -->
<div class="text-center mt-6 no-print">
    <form action="{{ route('surat.print', ['jenis' => $jenis]) }}" method="POST" target="_blank" class="inline-block">
        @csrf
        @foreach($data as $key => $value)
            @if(is_array($value))
                <input type="hidden" name="{{ $key }}" value="{{ json_encode($value) }}">
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach

        <button type="submit"
                class="bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-800 transition">
            🖨️ Print / PDF
        </button>
    </form>
</div>

@endsection