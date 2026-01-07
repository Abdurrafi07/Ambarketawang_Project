<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alamat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jalan', 150);
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kota', 50);
            $table->string('provinsi', 50);
            $table->string('kode_pos', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
