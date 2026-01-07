<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KartuKeluarga;
use App\Models\Alamat;

class KartuKeluargaSeeder extends Seeder
{
    public function run(): void
    {
        $alamatIds = Alamat::pluck('id')->toArray();
        $data = [];

        for ($i = 1; $i <= 20; $i++) {
            // Buat no_kk 16 digit full angka
            // Format: 202601 + counter 000001 dst + random 2 digit -> total 16 digit
            $counter = str_pad($i, 6, '0', STR_PAD_LEFT); // 6 digit
            $random = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT); // 2 digit
            $no_kk = '320650' . $counter . $random; // total 16 digit

            $data[] = [
                'no_kk' => $no_kk,
                'kepala_keluarga' => 'Kepala Keluarga ' . $i,
                'alamat_id' => $alamatIds[array_rand($alamatIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        KartuKeluarga::insert($data);
    }
}
