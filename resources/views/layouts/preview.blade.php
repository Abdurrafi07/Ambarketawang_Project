<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
        width: 100%;
        background: #1d4ed8;
        padding: 14px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 3px 12px rgba(0,0,0,.15);
        position: sticky;
        top: 0;
        z-index: 100;
        }

        .btn-back {
        background: white;
        color: #1d4ed8;
        padding: 8px 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        transition: .3s;
        box-shadow: 0 2px 6px rgba(0,0,0,.15);
        }
        .btn-back:hover { background: #f1f5f9; }


        .container { max-width: 210mm; margin: 40px auto; padding: 0 20px; }


        .surat-container {
        width: 210mm;
        background: white;
        padding: 12mm;
        box-shadow: 0 10px 40px rgba(0,0,0,.15);
        margin-bottom: 30px;
        }

        .judul-surat h1 { font-size: 14px; font-weight: 700; }

        .section-title {
            background: #e3f2fd;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: 700;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        table { width: 100%; border-collapse: collapse; }
        table td { padding: 2px 8px; font-size: 9px; }
        table td:first-child { width: 160px; font-weight: 600; }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .saksi { background: #fafafa; padding: 6px; border-radius: 4px; }

        /* BUTTON GROUP */
        .btn-group {
        display: flex;
        justify-content: center;
        gap: 20px;
        padding-bottom: 40px;
        }


        .btn-print, .btn-cancel {
        padding: 10px 32px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0,0,0,.15);
        transition: .2s;
        }


        .btn-print {
        background: #1d4ed8;
        color: white;
        }
        .btn-print:hover { background: #2563eb; }


        .btn-cancel {
        background: #e5e7eb;
        color: #374151;
        }
        .btn-cancel:hover { background: #d1d5db; }

        @media print {
            .header, .btn-group { display: none; }
            body { background: white; }
            @page { size: A4; margin: 0; }
        }
    </style>
</head>

<body>
<div class="navbar">
<div class="nav-left">
<button class="btn-back" onclick="window.history.back()">← Kembali</button>
</div>
<div class="nav-center">Dokumen Cetak</div>
<div class="nav-right"></div>
</div>


<div class="container">
<div class="surat-container">
@yield('content')
</div>


<div class="btn-group">
<button class="btn-cancel" onclick="window.history.back()">Batal</button>
<button class="btn-print" onclick="window.print()">Cetak</button>
</div>
</div>
</body>
</html>
