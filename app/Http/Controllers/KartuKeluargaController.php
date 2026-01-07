<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    // Menampilkan daftar seluruh KK
    public function index()
    {
        $daftarKK = KartuKeluarga::withCount('penduduk')->paginate(10);
        return view('kartu_keluarga.index', compact('daftarKK'));
    }

    // Menampilkan detail 1 KK beserta anggotanya
    public function show($no_kk)
    {
        $kk = KartuKeluarga::with('penduduk')->findOrFail($no_kk);
        return view('kartu_keluarga.show', compact('kk'));
    }
}
