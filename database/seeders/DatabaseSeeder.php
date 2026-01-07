<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AlamatSeeder::class,
            KartuKeluargaSeeder::class,
            PendudukSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
