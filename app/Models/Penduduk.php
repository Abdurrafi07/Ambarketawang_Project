<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penduduk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_perkawinan',
        'pendidikan',
        'pekerjaan',
        'hubungan_dalam_keluarga',
        'nama_ayah',
        'nama_ibu',
        'golongan_darah',
        'kewarganegaraan',
        'alamat_id',
        'is_wafat',
    ];

    protected $dates = ['deleted_at'];

    // public function kartuKeluarga()
    // {
    //     return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk');
    // }

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk', 'no_kk')->withDefault();
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }
}
