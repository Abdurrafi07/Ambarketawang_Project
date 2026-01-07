<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'nama_jalan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
    ];

    public function kartuKeluarga()
    {
        return $this->hasMany(KartuKeluarga::class, 'alamat_id');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'alamat_id');
    }
}
