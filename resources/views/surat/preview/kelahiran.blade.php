@extends('layouts.form')

@section('title', 'Preview Surat Keterangan Kelahiran')

@section('content')

<style>
/* ==== STYLING NORMAL (DI LAYAR) ==== */
.print-area {
    max-width: 210mm;
    margin: 0 auto;
    background: white;
    padding: 20px;
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
    a.bg-gray-200 {
        display: none !important;
    }

    /* Set ukuran halaman A4 */
    @page {
        size: A4 portrait;
        margin: 12mm 15mm;
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

    /* Reset background dan border */
    .bg-white, 
    .border, 
    .rounded-xl,
    .shadow {
        background: white !important;
        border: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 !important;
    }

    /* Typography untuk print */
    body {
        font-size: 9pt !important;
        line-height: 1.3 !important;
        color: black !important;
        font-family: 'Times New Roman', serif !important;
    }

    /* Header surat */
    .text-center h1 {
        font-size: 13pt !important;
        font-weight: bold !important;
        margin: 6px 0 !important;
    }

    .text-center p {
        font-size: 9pt !important;
        margin: 1px 0 !important;
    }

    .text-sm {
        font-size: 9pt !important;
        line-height: 1.3 !important;
    }

    /* Border pemisah */
    .border-b-2 {
        border-bottom: 2px solid black !important;
        margin: 8px 0 !important;
    }

    /* Spacing antar section */
    .space-y-6 > * {
        margin-bottom: 8px !important;
    }

    .bg-white.rounded-xl {
        margin-bottom: 10px !important;
        padding: 0 !important;
    }

    /* Headers section */
    h3 {
        font-size: 10pt !important;
        font-weight: bold !important;
        margin-bottom: 5px !important;
    }

    h4 {
        font-size: 9pt !important;
        font-weight: bold !important;
        margin-bottom: 4px !important;
    }

    /* Tabel data */
    table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 3px 0 !important;
    }

    table tr td {
        padding: 1px 0 !important;
        vertical-align: top !important;
        font-size: 9pt !important;
        line-height: 1.25 !important;
    }

    table tr td:first-child {
        width: 35% !important;
    }

    table tr td:nth-child(2) {
        width: 3% !important;
    }

    /* Paragraph */
    p.font-semibold {
        font-size: 9pt !important;
        margin: 5px 0 !important;
        font-weight: bold !important;
    }

    p.leading-relaxed {
        font-size: 9pt !important;
        margin: 6px 0 !important;
        line-height: 1.3 !important;
    }

    /* Grid untuk saksi */
    .grid {
        display: table !important;
        width: 100% !important;
    }

    .grid-cols-2 {
        display: table !important;
        width: 100% !important;
    }

    .grid-cols-2 > div {
        display: table-cell !important;
        width: 50% !important;
        vertical-align: top !important;
        padding: 0 8px !important;
    }

    .grid-cols-2 > div:first-child {
        padding-left: 0 !important;
    }

    .grid-cols-2 > div:last-child {
        padding-right: 0 !important;
    }

    .gap-8 {
        gap: 0 !important;
    }

    /* Tanda tangan */
    .mt-12 {
        margin-top: 15px !important;
    }

    .h-20 {
        height: 40px !important;
    }

    .ttd-kanan-bawah {
        text-align: right !important;
        float: right !important;
        width: 200px !important;
    }

    .relative {
        position: relative !important;
        clear: both !important;
    }

    /* Margin adjustments */
    .mb-1 {
        margin-bottom: 2px !important;
    }

    .mb-3 {
        margin-bottom: 4px !important;
    }

    .mb-4 {
        margin-bottom: 5px !important;
    }

    .mb-6 {
        margin-bottom: 6px !important;
    }

    .mt-1 {
        margin-top: 2px !important;
    }

    .mt-4 {
        margin-top: 5px !important;
    }

    .mt-8 {
        margin-top: 8px !important;
    }

    .my-4 {
        margin: 5px 0 !important;
    }

    /* Text alignment */
    .text-center {
        text-align: center !important;
    }

    .justify-end {
        text-align: right !important;
    }

    /* Inline block */
    .inline-block {
        display: inline-block !important;
    }

    /* Border untuk tanda tangan */
    .border-t {
        border-top: 1px solid black !important;
    }

    .border-gray-800 {
        border-color: black !important;
    }

    /* Padding untuk tanda tangan */
    .px-8 {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }

    .px-12 {
        padding-left: 25px !important;
        padding-right: 25px !important;
    }

    .pt-1 {
        padding-top: 2px !important;
    }

    /* Force satu halaman atau maksimal 2 halaman */
    .print-area {
        page-break-inside: auto !important;
    }

    .bg-white.rounded-xl {
        page-break-inside: avoid !important;
    }

    /* Leading tight untuk kop surat */
    .leading-tight {
        line-height: 1.2 !important;
    }
}
</style>

<div class="print-area">
    <!-- KOP SURAT -->
    <div class="text-center mb-6">
        <div class="text-sm text-gray-700 leading-tight">
            <p>KALURAHAN : AMBARKETAWANG</p>
            <p>KAPANEWON : GAMPING</p>
            <p>KABUPATEN/KOTA : SLEMAN</p>
        </div>
        <h1 class="text-xl font-bold mt-4 uppercase">Surat Keterangan Kelahiran</h1>
        <p class="text-gray-700">
            Nomor : {{ $data['nomor_surat'] ?? '---' }}
        </p>
        <div class="border-b-2 border-gray-800 my-4"></div>
    </div>

    <!-- CONTENT PREVIEW -->
    <div class="space-y-6">

        <!-- PEMBUKAAN -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <p class="text-sm leading-relaxed text-gray-700">
                Yang bertanda tangan di bawah ini Kepala Kalurahan Ambarketawang, Kapanewon Gamping, Kabupaten Sleman, 
                Daerah Istimewa Yogyakarta menerangkan bahwa:
            </p>
        </div>

        <!-- DATA KEPALA KELUARGA -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4 uppercase text-sm">Data Kepala Keluarga</h3>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">Nama Kepala Keluarga</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_kepala_keluarga'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Nomor Kartu Keluarga</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['no_kk'] ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- DATA ANAK -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4 uppercase text-sm">Data Anak yang Dilahirkan</h3>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">NIK</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_anak'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Nama Lengkap</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_anak'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Jenis Kelamin</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['jenis_kelamin'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Anak ke</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['anak_ke'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tempat Dilahirkan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['tempat_dilahirkan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tempat Kelahiran</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['tempat_kelahiran'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Hari dan Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">
                        @if(!empty($data['tgl_anak']))
                            {{ \Carbon\Carbon::parse($data['tgl_anak'])->translatedFormat('l, d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Umur</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['umur_anak']) ? $data['umur_anak'] . ' tahun' : '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Pukul</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['pukul']) ? $data['pukul'] . ' WIB' : '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Jenis Kelahiran</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['jenis_kelahiran'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Penolong Kelahiran</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['penolong_kelahiran'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Berat Bayi</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['berat_bayi']) ? $data['berat_bayi'] . ' kg' : '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Panjang Bayi</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['panjang_bayi']) ? $data['panjang_bayi'] . ' cm' : '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- DATA IBU KANDUNG -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4 uppercase text-sm">Data Ibu Kandung</h3>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">NIK</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Nama Lengkap</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">
                        @if(!empty($data['tgl_ibu']))
                            {{ \Carbon\Carbon::parse($data['tgl_ibu'])->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Umur</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['umur_ibu']) ? $data['umur_ibu'] . ' tahun' : '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Pekerjaan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['pekerjaan_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Alamat</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['alamat_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Kewarganegaraan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['kewarganegaraan_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Kebangsaan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['kebangsaan_ibu'] ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- DATA AYAH KANDUNG -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4 uppercase text-sm">Data Ayah Kandung</h3>
            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">NIK</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Nama Lengkap</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">
                        @if(!empty($data['tgl_ayah']))
                            {{ \Carbon\Carbon::parse($data['tgl_ayah'])->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Umur</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ !empty($data['umur_ayah']) ? $data['umur_ayah'] . ' tahun' : '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Pekerjaan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['pekerjaan_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Alamat</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['alamat_ayah'] ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <!-- DATA SAKSI -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <h3 class="font-semibold text-gray-800 mb-4 uppercase text-sm">Data Saksi</h3>
            
            <div class="grid grid-cols-2 gap-8">
                <!-- SAKSI 1 -->
                <div>
                    <h4 class="font-medium text-gray-700 mb-3">Saksi 1</h4>
                    <table class="w-full text-sm">
                        <tr>
                            <td class="py-2 w-1/3 align-top">NIK</td>
                            <td class="py-2 w-8 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['nik_saksi1'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Nama</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['nama_saksi1'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Umur</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ !empty($data['umur_saksi1']) ? $data['umur_saksi1'] . ' tahun' : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Alamat</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['alamat_saksi1'] ?? '-' }}</td>
                        </tr>
                    </table>
                </div>

                <!-- SAKSI 2 -->
                <div>
                    <h4 class="font-medium text-gray-700 mb-3">Saksi 2</h4>
                    <table class="w-full text-sm">
                        <tr>
                            <td class="py-2 w-1/3 align-top">NIK</td>
                            <td class="py-2 w-8 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['nik_saksi2'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Nama</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['nama_saksi2'] ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Umur</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ !empty($data['umur_saksi2']) ? $data['umur_saksi2'] . ' tahun' : '-' }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 align-top">Alamat</td>
                            <td class="py-2 align-top">:</td>
                            <td class="py-2 font-medium">{{ $data['alamat_saksi2'] ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- PENUTUP -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <p class="text-sm leading-relaxed text-gray-700">
                Demikian surat keterangan kelahiran ini dibuat dengan sebenarnya berdasarkan keterangan pelapor 
                dan untuk dapat dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- TANDA TANGAN -->
        <div class="relative mt-12">
            <!-- TTD Kepala Kalurahan -->
            <div class="ttd-kanan-bawah">
                <p class="text-sm">
                    Ambarketawang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                </p>

                <p class="text-sm font-semibold mt-1">
                    Kepala Kalurahan Ambarketawang
                </p>

                <div class="h-20 my-4"></div>

                <p class="text-sm font-bold border-t border-gray-800 inline-block px-12 pt-1">
                    _______________________
                </p>
            </div>
        </div>
    </div>

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
</div>

@endsection