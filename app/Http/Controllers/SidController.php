<?php

namespace App\Http\Controllers;

use App\Models\Sid;
use Illuminate\Http\Request;

class SidController extends Controller
{
    /**
     * Tampilkan data SID
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $sid = Sid::when($search, function ($query, $search) {
                $query->where('nik', 'like', "%{$search}%")
                      ->orWhere('nama', 'like', "%{$search}%")
                      ->orWhere('no_kk', 'like', "%{$search}%");
            })
            ->orderBy('nama')
            ->paginate(10);

        return view('sid.index', compact('sid', 'search'));
    }

    /**
     * Form tambah data
     */
    public function create()
    {
        return view('sid.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:sid,nik',
            'no_kk' => 'required|digits:16',
            'no_rk' => 'nullable|string|max:20',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'dusun' => 'nullable|string|max:100',
            'rw' => 'required|string|max:5',
            'rt' => 'required|string|max:5',
            'pendidikan' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:50',
            'status_kawin' => 'nullable|string|max:20',
        ]);

        Sid::create($validated);

        return redirect()
            ->route('sid.index')
            ->with('success', 'Data penduduk berhasil ditambahkan');
    }

    /**
     * Form edit
     */
    public function edit(Sid $sid)
    {
        return view('sid.edit', compact('sid'));
    }

    /**
     * Update data
     */
    public function update(Request $request, Sid $sid)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:sid,nik,' . $sid->id,
            'no_kk' => 'required|digits:16',
            'no_rk' => 'nullable|string|max:20',
            'nama' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'dusun' => 'nullable|string|max:100',
            'rw' => 'required|string|max:5',
            'rt' => 'required|string|max:5',
            'pendidikan' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:50',
            'status_kawin' => 'nullable|string|max:20',
        ]);

        $sid->update($validated);

        return redirect()
            ->route('sid.index')
            ->with('success', 'Data penduduk berhasil diperbarui');
    }

    /**
     * Hapus data
     */
    public function destroy(Sid $sid)
    {
        $sid->delete();

        return redirect()
            ->route('sid.index')
            ->with('success', 'Data penduduk berhasil dihapus');
    }
}
