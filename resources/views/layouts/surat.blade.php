<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Surat Resmi')</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Javanese&display=swap" rel="stylesheet">
  
  <style>
    @page {
      size: A4;
      margin: 1.3cm;
    }

    @media print {
      .controls {
        display: none;
      }
      body {
        margin: 0;
        padding: 0;
        font-size: 9pt;
        line-height: 1.1;
        transform: scale(0.97);
        transform-origin: top left;
      }
      .section {
        page-break-inside: avoid;
      }
    }

    body {
      font-family: "Times New Roman", serif;
      padding: 10px 35px;
      max-width: 794px;
      margin: auto;
      background: white;
      color: black;
      font-size: 9pt;
      line-height: 1.1;
    }

    .kop-container {
      position: relative;
      text-align: center;
      margin-bottom: 4px;
    }

    .kop-logo {
      position: absolute;
      top: 0;
      left: 0;
      width: 60px;
    }

    .kop-teks div {
      line-height: 1.05;
      font-size: 10pt;
      margin: 0;
    }

    .kop-jawa {
      font-family: 'Noto Sans Javanese', sans-serif !important;
      font-size: 10pt;
    }

    hr {
      border: 1px solid black;
      margin: 4px 0 6px 0;
    }

    h1.title {
      text-align: center;
      text-decoration: underline;
      font-size: 11pt;
      margin: 0;
    }

    .nomor-surat {
      text-align: center;
      font-size: 9pt;
      margin: 0 0 4px 0;
    }

    .section {
      margin-top: 0.4rem;
    }

    .section h2 {
      font-size: 9pt;
      font-weight: bold;
      margin: 0.3rem 0 0.1rem;
      text-transform: uppercase;
      border-bottom: 1px solid #ccc;
      padding-bottom: 1px;
    }

    .label {
      display: inline-block;
      width: 130px;
      font-weight: bold;
      vertical-align: top;
    }

    .section p {
      margin: 1px 0;
    }

    .ttd-section {
      margin-top: 1rem;
      width: 100%;
      clear: both;
    }

    .ttd-kanan {
      width: 45%;
      text-align: center;
      float: right;
    }

    .ttd-kanan p {
      margin: 2px 0;
    }

    .ttd-space {
      height: 45px;
    }
  </style>

  @stack('styles')
</head>
<body>
  @yield('content')
</body>
</html>
