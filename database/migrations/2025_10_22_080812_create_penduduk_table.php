<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('no_kk', 16)->index();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama', 20);
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('pendidikan', [
                'Tidak/Belum Sekolah',
                'SD',
                'SMP',
                'SMA/SMK',
                'Diploma',
                'Sarjana',
                'Pascasarjana'
            ]);
            $table->string('pekerjaan', 50);
            $table->enum('hubungan_dalam_keluarga', [
                'Kepala Keluarga',
                'Istri',
                'Anak',
                'Cucu',
                'Orang Tua',
                'Mertua',
                'Famili Lain'
            ]);
            $table->string('nama_ayah', 100);
            $table->string('nama_ibu', 100);
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O', '-'])->nullable();
            $table->string('kewarganegaraan', 20)->default('WNI');
            $table->foreignId('alamat_id')->constrained('alamat')->onDelete('cascade');
            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga')->onDelete('cascade');
            $table->boolean('is_wafat')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
