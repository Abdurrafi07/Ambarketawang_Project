<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class KelahiranController extends Controller
{
    /**
     * Tampilkan form surat keterangan kelahiran.
     */
    public function form()
    {
        return view('surat.kelahiran', [
            'jenis' => 'kelahiran'
        ]);
    }

    /**
     * Cari data penduduk berdasarkan NIK.
     */
    public function cariPenduduk($nik)
    {
        $data = Penduduk::with(['kartuKeluarga', 'alamat'])->where('nik', $nik)->first();

        if (!$data) {
            return response()->json(['message' => 'Data penduduk tidak ditemukan'], 404);
        }

        // Gabungkan alamat lengkap dari relasi alamat (jika ada)
        $alamatLengkap = null;
        if ($data->alamat) {
            $a = $data->alamat;
            $alamatLengkap = trim("{$a->nama_jalan} RT {$a->rt}/RW {$a->rw}, Kel. {$a->kelurahan}, Kec. {$a->kecamatan}, {$a->kota}, {$a->provinsi}, {$a->kode_pos}");
        }

        // Ambil nama kepala keluarga dari relasi kartuKeluarga (jika ada)
        $namaKepalaKeluarga = $data->kartuKeluarga->nama_kepala_keluarga ?? null;

        // Kembalikan data lengkap dalam bentuk JSON
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
            'kewarganegaraan' => $data->kewarganegaraan,
            'kebangsaan' => $data->kebangsaan ?? 'Indonesia',
            'nama_kepala_keluarga' => $namaKepalaKeluarga,
            'kartu_keluarga' => $data->kartuKeluarga,
        ]);
    }
    
    /**
     * Preview surat kelahiran - langsung pass semua data form
     */
    public function preview(Request $request)
    {
        // Ambil semua data dari request (termasuk yang kosong)
        $data = $request->all();
        
        // Return ke view dengan unpacking data langsung
        return view("surat.preview.kelahiran", $data);
    }
}