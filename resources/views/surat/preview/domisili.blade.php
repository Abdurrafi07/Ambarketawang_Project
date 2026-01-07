@extends('layouts.form')

@section('title', 'Preview Surat Domisili')

@section('content')

<style>
    /* Reset default margins */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Print Styles */
    @media print {
        @page {
            size: A4 portrait;
            margin: 15mm 20mm 15mm 20mm;
        }
        
        html, body {
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 0;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
        
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        
        .no-print {
            display: none !important;
        }
        
        .preview-container {
            box-shadow: none !important;
            margin: 0 !important;
            padding: 0 !important;
            max-width: 100% !important;
            width: 100%;
        }
        
        .page-break {
            page-break-before: always;
        }
        
        /* Prevent page breaks inside important elements */
        .kop-surat, table.detail, .signature-section {
            page-break-inside: avoid;
        }
        
        /* Ensure table borders print correctly */
        table {
            border-collapse: collapse;
        }
        
        table.bordered, 
        table.bordered th, 
        table.bordered td {
            border: 1px solid #000 !important;
        }
    }

    /* Screen Styles */
    @media screen {
        body {
            background-color: #f3f4f6;
            padding: 20px;
        }
        
        .preview-container {
            background: white;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 210mm;
            min-height: 297mm;
        }
    }

    /* Common Styles */
    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
        line-height: 1.5;
        color: #000;
    }

    .kop-surat {
        text-align: center;
        margin-bottom: 20px;
        line-height: 1.4;
    }
    
    .kop-surat h2 {
        margin: 0;
        font-weight: bold;
        font-size: 14pt;
    }
    
    .kop-surat h3 {
        margin: 2px 0;
        font-weight: bold;
        font-size: 13pt;
    }
    
    .kop-surat p {
        font-size: 11pt;
        margin-top: 5px;
    }
    
    .garis {
        border-bottom: 3px solid #000;
        margin-top: 8px;
        margin-bottom: 15px;
    }
    
    .title-section {
        text-align: center;
        margin-bottom: 15px;
    }
    
    .title-section h3 {
        font-size: 13pt;
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 5px;
    }
    
    .title-section p {
        font-size: 11pt;
    }
    
    .content-text {
        text-align: justify;
        margin-bottom: 12px;
        font-size: 12pt;
    }
    
    table.detail {
        width: 100%;
        margin: 15px 0;
        font-size: 12pt;
    }
    
    table.detail td {
        padding: 3px 0;
        vertical-align: top;
    }
    
    table.detail td:first-child {
        width: 180px;
    }
    
    table.bordered {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0;
        font-size: 11pt;
    }
    
    table.bordered th {
        background-color: #e5e7eb;
        padding: 8px;
        text-align: center;
        font-weight: bold;
        border: 1px solid #000;
    }
    
    table.bordered td {
        padding: 6px 8px;
        border: 1px solid #000;
    }
    
    .signature-section {
        margin-top: 30px;
        text-align: right;
        padding-right: 40px;
    }
    
    .signature-section p {
        margin-bottom: 5px;
    }
    
    .signature-space {
        margin-top: 60px;
        margin-bottom: 5px;
    }
    
    /* Button Styles */
    .button-container {
        text-align: center;
        margin-top: 40px;
        padding: 20px;
    }
    
    .btn {
        display: inline-block;
        padding: 12px 24px;
        margin: 0 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-back {
        background-color: #d1d5db;
        color: #1f2937;
    }
    
    .btn-back:hover {
        background-color: #9ca3af;
    }
    
    .btn-print {
        background-color: #1d4ed8;
        color: white;
    }
    
    .btn-print:hover {
        background-color: #1e40af;
    }
    
    .btn-save {
        background-color: #059669;
        color: white;
    }
    
    .btn-save:hover {
        background-color: #047857;
    }
</style>

<div class="preview-container">

    <!-- KOP SURAT -->
    <div class="kop-surat">
        <h2>PEMERINTAH KABUPATEN {{ strtoupper($data['kota'] ?? '...............') }}</h2>
        <h3>KECAMATAN {{ strtoupper($data['kecamatan'] ?? '.........................') }}</h3>
        <h3>DESA / KELURAHAN {{ strtoupper($data['desa'] ?? '..................') }}</h3>
        <p>Alamat: {{ $data['alamat'] ?? '........................................' }}</p>
        <div class="garis"></div>
    </div>

    <!-- TITLE -->
    <div class="title-section">
        <h3>SURAT KETERANGAN DOMISILI</h3>
        <p>Nomor : {{ $data['nomor_surat'] ?? '---' }}</p>
    </div>

    <!-- INTRO TEXT -->
    <p class="content-text">
        Yang bertanda tangan di bawah ini Kepala Desa/Lurah {{ $data['desa'] ?? '..................' }}, 
        Kecamatan {{ $data['kecamatan'] ?? '..................' }}, 
        Kabupaten {{ $data['kota'] ?? '..................' }}, menerangkan dengan sebenarnya bahwa:
    </p>

    <!-- DATA PEMOHON -->
    <table class="detail">
        <tr>
            <td>Nama</td>
            <td>: <strong>{{ $data['namaInput'] ?? '-' }}</strong></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $data['nikInput'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tempat/Tgl Lahir</td>
            <td>: {{ $data['tempatInput'] ?? '-' }}, 
                @if(isset($data['tanggalInput']))
                    {{ \Carbon\Carbon::parse($data['tanggalInput'])->translatedFormat('d F Y') }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ isset($data['genderInput']) && $data['genderInput'] == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ $data['agamaInput'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $data['pekerjaanInput'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>: {{ $data['wargaInput'] ?? 'Indonesia' }}</td>
        </tr>
    </table>

    <!-- DOMICILE TEXT -->
    <p class="content-text">
        Adalah benar bahwa orang tersebut di atas bertempat tinggal / berdomisili di alamat berikut:
    </p>

    <!-- ALAMAT DOMISILI -->
    <table class="detail">
        <tr>
            <td>RT/RW</td>
            <td>: {{ $data['rt'] ?? '-' }} / {{ $data['rw'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Dusun/Dukuh/Kampung</td>
            <td>: {{ $data['dusun'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan</td>
            <td>: {{ $data['desa'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kecamatan</td>
            <td>: {{ $data['kecamatan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kabupaten/Kota</td>
            <td>: {{ $data['kota'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Provinsi</td>
            <td>: {{ $data['provinsi'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Kode Pos</td>
            <td>: {{ $data['kode_pos'] ?? '-' }}</td>
        </tr>
    </table>

    <!-- ANGGOTA KELUARGA -->
    @if(isset($data['anggota']) && count(array_filter($data['anggota'], function($a) { return !empty($a['nama']); })) > 0)
    <p style="margin: 15px 0; font-weight: bold;">Anggota Keluarga yang Ikut Berdomisili:</p>
    <table class="bordered">
        <thead>
            <tr>
                <th style="width: 40px;">No.</th>
                <th style="width: 120px;">NIK</th>
                <th>Nama</th>
                <th style="width: 110px;">Tanggal Lahir</th>
                <th style="width: 100px;">SHDK</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data['anggota'] as $anggota)
                @if(!empty($anggota['nama']))
                <tr>
                    <td style="text-align: center;">{{ $no++ }}</td>
                    <td>{{ $anggota['nik'] ?? '-' }}</td>
                    <td>{{ $anggota['nama'] }}</td>
                    <td>
                        @if(!empty($anggota['tgl_lahir']))
                            {{ \Carbon\Carbon::parse($anggota['tgl_lahir'])->translatedFormat('d F Y') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $anggota['shdk'] ?? '-' }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    @endif

    <!-- CLOSING TEXT -->
    <p class="content-text" style="margin-top: 15px;">
        Demikian surat keterangan domisili ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <!-- TANDA TANGAN -->
    <div class="signature-section">
        <p>{{ $data['desa'] ?? '..................' }}, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p style="font-weight: bold; margin-top: 5px;">Kepala Desa / Lurah</p>
        
        <div class="signature-space">
            <strong>(_______________________)</strong>
        </div>
    </div>

    <!-- BUTTONS -->
<div class="button-container no-print">
    <form action="{{ route('surat.print', ['jenis' => $jenis]) }}" method="POST" target="_blank">
        @csrf
@foreach($data as $key => $value)
    @if(is_array($value))
        <input type="hidden" name="{{ $key }}" value="{{ json_encode($value) }}">
    @else
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endif
@endforeach

        <button type="submit" class="btn btn-print">🖨️ Print / PDF</button>
    </form>
</div>


</div>

<script>
function confirmSave() {
    if (confirm('Apakah Anda yakin ingin menyimpan surat ini ke database?')) {
        alert('Surat berhasil disimpan!');
        window.location.href = "{{ url('/dashboard') }}";
    }
}

// Optional: Auto-adjust print preview
window.onbeforeprint = function() {
    document.body.style.margin = '0';
};

window.onafterprint = function() {
    document.body.style.margin = '';
};
</script>

@endsection