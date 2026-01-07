<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class PernikahanController extends Controller
{
    /**
     * Tampilkan halaman form surat keterangan pernikahan.
     */
    public function form()
    {
        return view('surat.pernikahan', [
            'jenis' => 'pernikahan'
        ]);
    }

    /**
     * Ambil data penduduk berdasarkan NIK untuk autofill form pernikahan.
     */
    public function cariPenduduk($nik)
    {
        $data = Penduduk::with(['kartuKeluarga', 'alamat'])->where('nik', $nik)->first();

        if (!$data) {
            return response()->json(['message' => 'Data penduduk tidak ditemukan'], 404);
        }

        // Gabungkan alamat lengkap
        $alamatLengkap = null;
        if ($data->alamat) {
            $a = $data->alamat;
            $alamatLengkap = trim("{$a->nama_jalan} RT {$a->rt}/RW {$a->rw}, Kel. {$a->kelurahan}, Kec. {$a->kecamatan}, {$a->kota}, {$a->provinsi}, {$a->kode_pos}");
        }

        // Format tanggal lahir
        $tglLahir = \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y');

        return response()->json([
            'nik' => $data->nik,
            'no_kk' => $data->no_kk,
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jenis_kelamin,
            'tempat_tanggal_lahir' => "{$data->tempat_lahir}, {$tglLahir}",
            'kewarganegaraan' => $data->kewarganegaraan,
            'agama' => $data->agama,
            'pekerjaan' => $data->pekerjaan,
            'pendidikan' => $data->pendidikan,
            'status_perkawinan' => $data->status_perkawinan,
            'alamat' => $alamatLengkap,
            'nama_ayah' => $data->nama_ayah,
            'nama_ibu' => $data->nama_ibu,
            'kartu_keluarga' => $data->kartuKeluarga,
        ]);
    }
}
