<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Alamat;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKK = KartuKeluarga::count();
        $totalPenduduk = Penduduk::count();

        return view('dashboard.index', compact('totalKK', 'totalPenduduk'));
    }

    public function formKematian()
    {
        return view('surat.kematian', [
            'jenis' => 'kematian'
        ]);
    }

    public function formKelahiran()
    {
        return view('surat.kelahiran', [
            'jenis' => 'kelahiran'
        ]);
    }

    public function formDomisili()
    {
        return view('surat.domisili', [
            'jenis' => 'domisili'
        ]);
    }

    public function formPernikahan()
    {
        return view('surat.pernikahan', [
            'jenis' => 'pernikahan'
        ]);
    }

    public function formUpdate()
{
    $penduduk = Penduduk::with(['alamat', 'kartuKeluarga'])->paginate(10);

    return view('surat.update', compact('penduduk'));
}


    public function kartuKeluarga()
    {
        $kk = KartuKeluarga::withCount('penduduk')->paginate(10);
        return view('dashboard.kartu_keluarga', compact('kk'));
    }

    public function penduduk()
    {
        $penduduk = Penduduk::with('kartuKeluarga')->paginate(10);
        return view('dashboard.penduduk', compact('penduduk'));
    }
    

    // public function cariPenduduk($nik)
    // {
    //     $data = Penduduk::with(['kartuKeluarga', 'alamat'])->where('nik', $nik)->first();

    //     if (!$data) {
    //         return response()->json(['message' => 'Data penduduk tidak ditemukan'], 404);
    //     }

    //     // Gabungkan alamat lengkap jadi satu string biar mudah dibaca di form
    //     $alamatLengkap = null;
    //     if ($data->alamat) {
    //         $a = $data->alamat;
    //         $alamatLengkap = trim("{$a->nama_jalan} RT {$a->rt}/RW {$a->rw}, Kel. {$a->kelurahan}, Kec. {$a->kecamatan}, {$a->kota}, {$a->provinsi}, {$a->kode_pos}");
    //     }

    //     // Tambahkan properti alamat_lengkap ke JSON
    //     return response()->json([
    //         'nik' => $data->nik,
    //         'no_kk' => $data->no_kk,
    //         'nama' => $data->nama,
    //         'jenis_kelamin' => $data->jenis_kelamin,
    //         'tempat_lahir' => $data->tempat_lahir,
    //         'tanggal_lahir' => $data->tanggal_lahir,
    //         'agama' => $data->agama,
    //         'pekerjaan' => $data->pekerjaan,
    //         'alamat' => $alamatLengkap,
    //         'kartu_keluarga' => $data->kartuKeluarga,
    //     ]);
    // }
}
