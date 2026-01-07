<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alamat;

class AlamatSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 20; $i++) {
            $data[] = [
                'nama_jalan' => 'Jalan Merpati No. ' . rand(1, 100),
                'rt' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'kelurahan' => 'Kelurahan ' . $i,
                'kecamatan' => 'Kecamatan ' . $i,
                'kota' => 'Kota Contoh',
                'provinsi' => 'Provinsi Contoh',
                'kode_pos' => rand(11111, 99999),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Alamat::insert($data);
    }
}
