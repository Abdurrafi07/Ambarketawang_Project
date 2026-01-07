<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $primaryKey = 'no_kk';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
        'alamat_id',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'no_kk', 'no_kk');
    }
}
