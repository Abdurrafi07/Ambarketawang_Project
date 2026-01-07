<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sid', function (Blueprint $table) {
            $table->id();

            // Identitas
            $table->string('nik', 16)->unique();
            $table->string('no_kk', 16);
            $table->string('no_rk', 20)->nullable();

            // Data pribadi
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->integer('umur')->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();

            // Wilayah
            $table->string('dusun', 100)->nullable();
            $table->string('rw', 5);
            $table->string('rt', 5);

            // Sosial
            $table->string('pendidikan', 50)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('status_kawin', 20)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sid');
    }
};
