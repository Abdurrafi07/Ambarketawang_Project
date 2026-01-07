<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sid extends Model
{
    use HasFactory;

    protected $table = 'sid';

    protected $fillable = [
        'nik',
        'no_kk',
        'no_rk',
        'nama',
        'jenis_kelamin',
        'umur',
        'tempat_lahir',
        'tanggal_lahir',
        'dusun',
        'rw',
        'rt',
        'pendidikan',
        'pekerjaan',
        'status_kawin',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Hitung umur otomatis dari tanggal lahir
     */
    public function getUmurAttribute()
    {
        if ($this->tanggal_lahir) {
            return Carbon::parse($this->tanggal_lahir)->age;
        }

        return null;
    }
}
