@extends('layouts.form')

@section('title', 'Preview Surat Keterangan Pernikahan')

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
    button:not(.print-area button),
    a.bg-gray-200,
    form[action*="download"] {
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
        font-size: 11pt !important;
        line-height: 1.4 !important;
        color: black !important;
        font-family: 'Times New Roman', serif !important;
    }

    /* Header surat */
    .text-center h1 {
        font-size: 14pt !important;
        font-weight: bold !important;
        margin: 8px 0 !important;
    }

    .text-center p {
        font-size: 10pt !important;
        margin: 2px 0 !important;
    }

    .text-sm {
        font-size: 10pt !important;
    }

    /* Border pemisah */
    .border-b-2 {
        border-bottom: 2px solid black !important;
        margin: 10px 0 !important;
    }

    /* Spacing antar section */
    .space-y-6 > * {
        margin-bottom: 12px !important;
    }

    .bg-white.rounded-xl {
        margin-bottom: 15px !important;
        padding: 8px 0 !important;
    }

    /* Tabel data */
    table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 5px 0 !important;
    }

    table tr td {
        padding: 2px 0 !important;
        vertical-align: top !important;
        font-size: 10pt !important;
        line-height: 1.3 !important;
    }

    table tr td:first-child {
        width: 35% !important;
    }

    table tr td:nth-child(2) {
        width: 3% !important;
    }

    /* Paragraph */
    p.font-semibold {
        font-size: 10pt !important;
        margin: 8px 0 !important;
        font-weight: bold !important;
    }

    p.leading-relaxed {
        font-size: 10pt !important;
        margin: 10px 0 !important;
        line-height: 1.4 !important;
    }

    /* Tanda tangan */
    .mt-12 {
        margin-top: 20px !important;
    }

    .justify-end {
        text-align: right !important;
    }

    .text-center {
        text-align: center !important;
    }

    .h-20 {
        height: 50px !important;
    }

    /* Hapus margin berlebihan */
    .mb-6 {
        margin-bottom: 8px !important;
    }

    .mt-8 {
        margin-top: 12px !important;
    }

    .my-4 {
        margin: 8px 0 !important;
    }

    /* Force satu halaman */
    .print-area {
        page-break-inside: avoid !important;
    }

    .bg-white.rounded-xl {
        page-break-inside: avoid !important;
    }
}
</style>

<div class="print-area">
    <!-- === KOP SURAT === -->
    <div class="text-center mb-6">
        <div class="text-sm text-gray-700 leading-tight">
            <p>KALURAHAN : AMBARKETAWANG</p>
            <p>KAPANEWON : GAMPING</p>
            <p>KABUPATEN/KOTA : SLEMAN</p>
        </div>
        <h1 class="text-xl font-bold mt-4 uppercase">Surat Keterangan Pernikahan</h1>
        <p class="text-gray-700">Nomor : {{ $data['nomor_surat'] ?? '---' }}</p>
        <div class="border-b-2 border-gray-800 my-4"></div>
    </div>

    <!-- === CONTENT PREVIEW === -->
    <div class="space-y-6">
        
        <!-- DATA PEMOHON -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <p class="font-semibold mb-6 text-gray-800">
                Yang bertanda tangan di bawah ini menerangkan dengan sesungguhnya bahwa:
            </p>

            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">Nama</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">NIK</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Jenis Kelamin</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['jenis_kelamin_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tempat & Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['tempat_tanggal_lahir_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Kewarganegaraan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['kewarganegaraan_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Agama</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['agama_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Pekerjaan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['pekerjaan_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Pendidikan Terakhir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['pendidikan_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Alamat</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['alamat_pemohon'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Status Perkawinan</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['status_perkawinan_pemohon'] ?? '-' }}</td>
                </tr>
                @if(!empty($data['nama_pasangan_terdahulu']))
                <tr>
                    <td class="py-2 align-top">Nama Istri/Suami Terdahulu</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_pasangan_terdahulu'] }}</td>
                </tr>
                @endif
            </table>
        </div>

        <!-- DATA AYAH -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <p class="font-semibold mb-6 text-gray-800">
                Adalah benar anak dari perkawinan seorang pria:
            </p>

            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">Nama Lengkap</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">NIK</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tempat & Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['tempat_tanggal_lahir_ayah'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Agama</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['agama_ayah'] ?? '-' }}</td>
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

        <!-- DATA IBU -->
        <div class="bg-white rounded-xl p-8 border border-gray-200">
            <p class="font-semibold mb-6 text-gray-800">
                Dengan seorang wanita:
            </p>

            <table class="w-full text-sm">
                <tr>
                    <td class="py-2 w-1/3 align-top">Nama Lengkap</td>
                    <td class="py-2 w-8 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nama_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">NIK</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['nik_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Tempat & Tanggal Lahir</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['tempat_tanggal_lahir_ibu'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top">Agama</td>
                    <td class="py-2 align-top">:</td>
                    <td class="py-2 font-medium">{{ $data['agama_ibu'] ?? '-' }}</td>
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
            </table>

            <p class="mt-8 text-sm text-gray-700 leading-relaxed">
                Demikianlah, Surat Pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
            </p>
        </div>

        <!-- TANDA TANGAN -->
        <div class="mt-12">
            <div class="flex justify-end">
                <div class="text-center">
                    <p class="text-sm">Ambarketawang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <p class="text-sm font-semibold mt-1">Kepala Kalurahan Ambarketawang</p>
                    <div class="h-20 my-4"></div>
                    <p class="text-sm font-bold border-t border-gray-800 inline-block px-12 pt-1">
                        _______________________
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- === TOMBOL AKSI === -->
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