<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class KematianController extends Controller
{

    public function form()
    {
        return view('surat.kematian', [
            'jenis' => 'kematian'
        ]);
    }

    public function cariPenduduk($nik)
    {
        $data = Penduduk::with(['kartuKeluarga', 'alamat'])->where('nik', $nik)->first();

        if (!$data) {
            return response()->json(['message' => 'Data penduduk tidak ditemukan'], 404);
        }

        // Gabungkan alamat lengkap (jika ada relasi alamat)
        $alamatLengkap = null;
        if ($data->alamat) {
            $a = $data->alamat;
            $alamatLengkap = trim("{$a->nama_jalan} RT {$a->rt}/RW {$a->rw}, Kel. {$a->kelurahan}, Kec. {$a->kecamatan}, {$a->kota}, {$a->provinsi}, {$a->kode_pos}");
        }

        // Ambil nama kepala keluarga jika ada relasi kartuKeluarga
        $namaKepalaKeluarga = $data->kartuKeluarga->nama_kepala_keluarga ?? null;

        // Kirim data JSON lengkap
        return response()->json([
            'nik' => $data->nik,
            'no_kk' => $data->no_kk,
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tempat_lahir' => $data->tempat_lahir,
            'tanggal_lahir' => $data->tanggal_lahir,
            'agama' => $data->agama,
            'pekerjaan' => $data->pekerjaan,
            'alamat' => $alamatLengkap,
            'kartu_keluarga' => $data->kartuKeluarga,
            'nama_kepala_keluarga' => $namaKepalaKeluarga, // 🔥 tambahan penting
        ]);
    }
}
