<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;

class PendudukApiController extends Controller
{
public function show($nik)
{
    $penduduk = Penduduk::with(['kartuKeluarga.alamat'])->where('nik', $nik)->first();

    if (!$penduduk) {
        return response()->json(['message' => 'Penduduk tidak ditemukan'], 404);
    }

    // Gabungkan alamat menjadi satu string
    $alamat = null;
    if ($penduduk->kartuKeluarga && $penduduk->kartuKeluarga->alamat) {
        $alamat = implode(', ', array_filter([
            $penduduk->kartuKeluarga->alamat->dusun ?? null,
            $penduduk->kartuKeluarga->alamat->desa ?? null,
            $penduduk->kartuKeluarga->alamat->kecamatan ?? null,
            $penduduk->kartuKeluarga->alamat->kabupaten ?? null,
        ]));
    }

    $penduduk->alamat_lengkap = $alamat;

    return response()->json($penduduk);
}

}
