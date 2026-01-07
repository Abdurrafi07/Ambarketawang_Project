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
        $query = Penduduk::with('alamat');

        if ($search !== '') {
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

    public function show($nik)
    {
        $penduduk = Penduduk::with(['alamat', 'kartuKeluarga'])->findOrFail($nik);
        return view('penduduk.show', compact('penduduk'));
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required','digits:16','unique:penduduk,nik'],
            'no_kk' => ['required','digits:16'],
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
        ]);

        // Simpan alamat
        $alamat = Alamat::create($request->only([
            'nama_jalan','rt','rw','kelurahan','kecamatan','kota','provinsi','kode_pos'
        ]));

        // Pastikan KK ada
        $kk = KartuKeluarga::withTrashed()->firstOrCreate(
            ['no_kk' => $request->no_kk],
            [
                'kepala_keluarga' => $request->kepala_keluarga ?? $request->nama,
                'alamat_id' => $alamat->id
            ]
        );

        // Simpan penduduk
        Penduduk::create([
            'nik' => $request->nik,
            'no_kk' => $kk->no_kk,
            'alamat_id' => $alamat->id,
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

        return redirect()->route('penduduk.index')->with('success','Data berhasil ditambahkan');
    }

    public function edit($nik)
    {
        $penduduk = Penduduk::with(['alamat','kartuKeluarga'])->findOrFail($nik);
        return view('penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $nik)
    {
        $penduduk = Penduduk::findOrFail($nik);

        $validated = $request->validate([
            'no_kk' => ['required','digits:16'],
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

        // Update alamat
        $penduduk->alamat->update($request->only([
            'nama_jalan','rt','rw','kelurahan','kecamatan','kota','provinsi','kode_pos'
        ]));

        // Update atau buat KK
        $kk = KartuKeluarga::withTrashed()->firstOrCreate(
            ['no_kk' => $request->no_kk],
            [
                'kepala_keluarga' => $request->kepala_keluarga ?? $request->nama,
                'alamat_id' => $penduduk->alamat_id
            ]
        );

        // Update penduduk termasuk no_kk
        $penduduk->update([
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
        ]);

        return redirect()->route('penduduk.index')->with('success','Data berhasil diperbarui');
    }


    // SOFT DELETE
    public function destroy($nik)
    {
        $penduduk = Penduduk::findOrFail($nik);

        if ($penduduk->trashed()) {
            return redirect()->route('penduduk.index')->with('info', 'Data sudah ada di sampah');
        }

        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Data berhasil dipindahkan ke sampah');
    }

    // LIST DATA YANG DI SOFT DELETE
    public function trash()
    {
        $penduduk = Penduduk::onlyTrashed()->paginate(10);
        return view('penduduk.trash', compact('penduduk'));
    }

    // RESTORE DATA
    public function restore($nik)
    {
        $penduduk = Penduduk::withTrashed()->findOrFail($nik);
        $penduduk->restore();

        return redirect()->route('penduduk.trash')->with('success', 'Data berhasil dikembalikan');
    }

    // HAPUS PERMANEN
    public function forceDelete($nik)
    {
        $penduduk = Penduduk::withTrashed()->findOrFail($nik);
        $penduduk->forceDelete();

        return redirect()->route('penduduk.trash')->with('success', 'Data berhasil dihapus permanen');
    }

    // EXPORT DATA
    public function export()
    {
        return Excel::download(new PendudukExport, 'penduduk.xlsx');
    }

    // IMPORT DATA
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new PendudukImport, $request->file('file'));

        return back()->with('success', 'Data penduduk berhasil diimport');
    }
}
