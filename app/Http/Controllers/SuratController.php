<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class SuratController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function form($jenis)
    {
        $allowed = ['kematian', 'kelahiran', 'pernikahan', 'domisili'];

        if (!in_array($jenis, $allowed)) {
            abort(404, 'Jenis surat tidak ditemukan.');
        }

        return view("surat.$jenis", compact('jenis'));
    }

    // public function preview(Request $request)
    // {
    //     // 🔹 Ambil semua input
    //     $input = $request->all();

    //     // 🔹 Susun data menjadi struktur yang sesuai untuk preview
    //     $data = [
    //         'jenazah' => [
    //             'nik' => $input['nik_jenazah'] ?? '',
    //             'nama' => $input['nama'] ?? '',
    //             'jenis_kelamin' => $input['jenis_kelamin'] ?? '',
    //             'tempat_lahir' => $input['tempat_lahir'] ?? '',
    //             'tanggal_lahir' => $input['tanggal_lahir'] ?? '',
    //             'agama' => $input['agama'] ?? '',
    //             'pekerjaan' => $input['pekerjaan'] ?? '',
    //             'alamat' => $input['alamat'] ?? '',
    //         ],
    //         'ayah' => [
    //             'nik' => $input['nik_ayah'] ?? '',
    //             'nama' => $input['nama_ayah'] ?? '',
    //             'tanggal_lahir' => $input['tgl_ayah'] ?? '',
    //             'pekerjaan' => $input['pekerjaan_ayah'] ?? '',
    //             'alamat' => $input['alamat_ayah'] ?? '',
    //         ],
    //         'ibu' => [
    //             'nik' => $input['nik_ibu'] ?? '',
    //             'nama' => $input['nama_ibu'] ?? '',
    //             'tanggal_lahir' => $input['tgl_ibu'] ?? '',
    //             'pekerjaan' => $input['pekerjaan_ibu'] ?? '',
    //             'alamat' => $input['alamat_ibu'] ?? '',
    //         ],
    //         'pelapor' => [
    //             'nik' => $input['nik_pelapor'] ?? '',
    //             'nama' => $input['nama_pelapor'] ?? '',
    //             'tanggal_lahir' => $input['tgl_pelapor'] ?? '',
    //             'pekerjaan' => $input['pekerjaan_pelapor'] ?? '',
    //             'alamat' => $input['alamat_pelapor'] ?? '',
    //         ],
    //         'saksi1' => [
    //             'nik' => $input['nik_saksi1'] ?? '',
    //             'nama' => $input['nama_saksi1'] ?? '',
    //             'tanggal_lahir' => $input['tgl_saksi1'] ?? '',
    //             'pekerjaan' => $input['pekerjaan_saksi1'] ?? '',
    //             'alamat' => $input['alamat_saksi1'] ?? '',
    //         ],
    //         'saksi2' => [
    //             'nik' => $input['nik_saksi2'] ?? '',
    //             'nama' => $input['nama_saksi2'] ?? '',
    //             'tanggal_lahir' => $input['tgl_saksi2'] ?? '',
    //             'pekerjaan' => $input['pekerjaan_saksi2'] ?? '',
    //             'alamat' => $input['alamat_saksi2'] ?? '',
    //         ],
    //         'tanggal_kematian' => $input['tanggal_kematian'] ?? '',
    //         'pukul' => $input['pukul'] ?? '',
    //         'sebab' => $input['sebab'] ?? '',
    //         'tempat_kematian' => $input['tempat_kematian'] ?? '',
    //         'yang_menerangkan' => $input['yang_menerangkan'] ?? '',
    //     ];

    //     // 🔹 Kirim data ke tampilan preview
    //     return view('surat.preview', compact('data'));
    // }

public function preview(Request $request)
{
    $jenis = $request->jenis; // ambil dari input hidden form

    $allowed = ['kematian', 'kelahiran', 'pernikahan', 'domisili'];
    if (!in_array($jenis, $allowed)) {
        abort(404, 'Jenis surat tidak ditemukan.');
    }

    $data = $request->all();

    return view("surat.preview.$jenis", compact('data', 'jenis'));
}

public function print($jenis, Request $request)
{
    $data = $request->all();

    // decode json anggota jika dikirim json string
    if(isset($data['anggota']) && is_string($data['anggota'])){
        $data['anggota'] = json_decode($data['anggota'], true);
    }

    // pastikan minimal array
    if(!isset($data['anggota']) || !is_array($data['anggota'])){
        $data['anggota'] = [];
    }

    $pdf = \PDF::loadView("surat.pdf.$jenis", compact('data'))
        ->setPaper('A4', 'portrait');

    return $pdf->stream("surat-{$jenis}.pdf");
}

}
