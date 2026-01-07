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
            $data[] = [
                'no_kk' => 'KK' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'kepala_keluarga' => 'Kepala Keluarga ' . $i,
                'alamat_id' => $alamatIds[array_rand($alamatIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        KartuKeluarga::insert($data);
    }
}
