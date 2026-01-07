<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Alamat;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendudukExport;
use App\Imports\PendudukImport;

class PendudukController extends Controller
{

public function index(Request $request)
{
    $search = trim($request->search);
    $isSearch = $search !== '';

    $query = Penduduk::with('alamat');

    if ($isSearch) {
        $query->where(function ($q) use ($search) {
            $q->where('nik', 'like', "%{$search}%")
              ->orWhere('nama', 'like', "%{$search}%")
              ->orWhere('no_kk', 'like', "%{$search}%");
        });
    }

    $penduduk = $query->orderBy('nama')->paginate(10);

    if ($request->ajax()) {
        return view('penduduk.partials.table', compact('penduduk'));
    }

    return view('penduduk.index', compact('penduduk'));
}

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nik' => [
                    'required',
                    'digits:16',
                    'unique:penduduk,nik'
                ],

                'no_kk' => [
                    'required',
                    'digits:16'
                ],

                'kepala_keluarga' => 'nullable|string|max:100',

                'nama_jalan' => 'required|string|max:150',
                'rt' => 'required|string|max:5',
                'rw' => 'required|string|max:5',
                'kelurahan' => 'required|string|max:50',
                'kecamatan' => 'required|string|max:50',
                'kota' => 'required|string|max:50',
                'provinsi' => 'required|string|max:50',
                'kode_pos' => 'nullable|string|max:10',

                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pendidikan' => 'required',
                'pekerjaan' => 'required',
                'hubungan_dalam_keluarga' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'golongan_darah' => 'nullable',
                'kewarganegaraan' => 'required',
            ],
            [
                'required' => ':attribute wajib diisi.',
                'string'   => ':attribute harus berupa teks.',
                'max'      => ':attribute maksimal :max karakter.',
                'date'     => ':attribute harus berupa tanggal yang valid.',
                'unique'   => ':attribute sudah terdaftar.',
            ],
            [
                'nik' => 'NIK',
                'no_kk' => 'Nomor KK',
                'kepala_keluarga' => 'Kepala Keluarga',

                'nama_jalan' => 'Nama Jalan',
                'rt' => 'RT',
                'rw' => 'RW',
                'kelurahan' => 'Kelurahan',
                'kecamatan' => 'Kecamatan',
                'kota' => 'Kota',
                'provinsi' => 'Provinsi',
                'kode_pos' => 'Kode Pos',

                'nama' => 'Nama Lengkap',
                'tempat_lahir' => 'Tempat Lahir',
                'tanggal_lahir' => 'Tanggal Lahir',
                'jenis_kelamin' => 'Jenis Kelamin',
                'agama' => 'Agama',
                'status_perkawinan' => 'Status Perkawinan',
                'pendidikan' => 'Pendidikan',
                'pekerjaan' => 'Pekerjaan',
                'hubungan_dalam_keluarga' => 'Hubungan Dalam Keluarga',
                'nama_ayah' => 'Nama Ayah',
                'nama_ibu' => 'Nama Ibu',
                'golongan_darah' => 'Golongan Darah',
                'kewarganegaraan' => 'Kewarganegaraan',
            ]
        );


        // ----------- ALAMAT BUAT BARU -----------
        $alamat = Alamat::create([
            'nama_jalan' => $request->nama_jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        // ----------- CEK KK ADA ATAU BUAT BARU -----------
        $kk = KartuKeluarga::firstOrCreate(
            ['no_kk' => $request->no_kk],
            [
                'kepala_keluarga' => $request->kepala_keluarga ?? $request->nama,
                'alamat_id' => $alamat->id
            ]
        );

        // ----------- SIMPAN DATA PENDUDUK -----------
        Penduduk::create([
            'nik' => $request->nik,
            'no_kk' => $kk->no_kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'golongan_darah' => $request->golongan_darah,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat_id' => $alamat->id,
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($nik)
    {
        $penduduk = Penduduk::with(['alamat', 'kartuKeluarga'])->findOrFail($nik);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $nik)
    {
        $penduduk = Penduduk::findOrFail($nik);

        $validated = $request->validate([
            'no_kk' => [
                'required',
                'digits:16'
            ],

            'kepala_keluarga' => 'nullable|string|max:100',

            'nama_jalan' => 'required|string|max:150',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
            'kelurahan' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kota' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kode_pos' => 'nullable|string|max:10',

            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'hubungan_dalam_keluarga' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ]);

        // ----------- UPDATE ALAMAT -----------
        $penduduk->alamat->update([
            'nama_jalan' => $request->nama_jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        // ----------- UPDATE OR CREATE KK -----------
        $kk = KartuKeluarga::firstOrCreate(
            ['no_kk' => $request->no_kk],
            [
                'kepala_keluarga' => $request->kepala_keluarga ?? $request->nama,
                'alamat_id' => $penduduk->alamat_id
            ]
        );

        $penduduk->update([
            'no_kk' => $request->no_kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'golongan_darah' => $request->golongan_darah,
            'kewarganegaraan' => $request->kewarganegaraan,
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nik)
    {
        $penduduk = Penduduk::findOrFail($nik);
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data berhasil dihapus');
    }

        public function export()
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new PendudukImport, $request->file('file'));

        return back()->with('success', 'Data penduduk berhasil diimport');
    }
}


// class PendudukController extends Controller
// {
//     public function index(Request $request)
//     {
//         $search = $request->get('search');

//         $query = DB::table('penduduk')
//             ->join('kk', 'penduduk.no_kk', '=', 'kk.no_kk')
//             ->leftJoin('alamat', 'penduduk.alamat_id', '=', 'alamat.id')
//             ->select(
//                 'penduduk.*',
//                 'kk.dusun',
//                 'kk.rw',
//                 'kk.rt',
//                 DB::raw("
//                     CONCAT_WS(', ',
//                         alamat.nama_jalan,
//                         CONCAT('RT ', alamat.rt),
//                         CONCAT('RW ', alamat.rw),
//                         alamat.kelurahan,
//                         alamat.kecamatan,
//                         alamat.kota,
//                         alamat.provinsi,
//                         alamat.kode_pos
//                     ) as alamat_lengkap
//                 ")
//             );

//         if ($search) {
//             $query->where(function ($q) use ($search) {
//                 $q->where('penduduk.nik', 'like', "%{$search}%")
//                   ->orWhere('penduduk.no_kk', 'like', "%{$search}%")
//                   ->orWhere('penduduk.nama', 'like', "%{$search}%")
//                   ->orWhere('alamat.nama_jalan', 'like', "%{$search}%")
//                   ->orWhere('alamat.kelurahan', 'like', "%{$search}%")
//                   ->orWhere('alamat.kecamatan', 'like', "%{$search}%");
//             });
//         }

//         $penduduk = $query->orderBy('penduduk.nama')->paginate(15);

//         return view('penduduk.index', compact('penduduk', 'search'));
//     }
// }
