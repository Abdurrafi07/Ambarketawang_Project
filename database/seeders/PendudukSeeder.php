<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\Alamat;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kartuKeluarga = KartuKeluarga::all();
        $alamatIds = Alamat::pluck('id')->toArray();

        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $kk = $kartuKeluarga->random();

            $data[] = [
                'nik' => $faker->unique()->numerify('320###########'),
                'no_kk' => $kk->no_kk,
                'nama' => $faker->name(),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->dateTimeBetween('-70 years', '-5 years')->format('Y-m-d'),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA/SMK', 'Diploma', 'Sarjana', 'Pascasarjana']),
                'pekerjaan' => $faker->randomElement(['Petani', 'Guru', 'Pegawai', 'Wiraswasta', 'Pelajar']),
                'hubungan_dalam_keluarga' => $faker->randomElement(['Kepala Keluarga', 'Istri', 'Anak', 'Cucu', 'Orang Tua']),
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O', null]),
                'kewarganegaraan' => 'WNI',
                'alamat_id' => $alamatIds[array_rand($alamatIds)],
                'is_wafat' => $faker->boolean(5), // 5% penduduk wafat
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert batch untuk efisiensi
        foreach (array_chunk($data, 20) as $chunk) {
            Penduduk::insert($chunk);
        }
    }
}
