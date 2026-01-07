<?php

namespace App\Imports;

use App\Models\Penduduk;
use App\Models\Alamat;
use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendudukImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // 1️⃣ Ambil / buat alamat default
        $alamat = Alamat::firstOrCreate([
            'nama_jalan' => '-',
            'rt' => '000',
            'rw' => '000',
            'kelurahan' => '-',
            'kecamatan' => '-',
            'kota' => '-',
            'provinsi' => '-',
        ]);

        // 2️⃣ Ambil / buat KK
        $kk = KartuKeluarga::firstOrCreate(
            ['no_kk' => $row['no_kk']],
            [
                'kepala_keluarga' => $row['nama'],
                'alamat_id' => $alamat->id,
            ]
        );

        // 3️⃣ Update jika NIK sudah ada
        return Penduduk::updateOrCreate(
            ['nik' => $row['nik']],
            [
                'no_kk' => $kk->no_kk,
                'nama' => $row['nama'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'agama' => $row['agama'],
                'status_perkawinan' => $row['status_perkawinan'],
                'pendidikan' => $row['pendidikan'],
                'pekerjaan' => $row['pekerjaan'],
                'kewarganegaraan' => $row['kewarganegaraan'] ?? 'WNI',

                // 🔥 FIELD WAJIB
                'hubungan_dalam_keluarga' => $row['hubungan_dalam_keluarga'] ?? 'Famili Lain',
                'nama_ayah' => $row['nama_ayah'] ?? '-',
                'nama_ibu' => $row['nama_ibu'] ?? '-',
                'alamat_id' => $alamat->id,
            ]
        );
    }
}
