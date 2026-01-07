<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendudukExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Penduduk::with(['kartuKeluarga', 'alamat'])->get();
    }

    public function headings(): array
    {
        return [
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
            'kewarganegaraan',
            'hubungan_dalam_keluarga',
            'nama_ayah',
            'nama_ibu',

            // opsional (informatif)
            'alamat',
            'rt',
            'rw',
            'kelurahan',
            'kecamatan',
            'kota',
            'provinsi',
        ];
    }

    public function map($penduduk): array
    {
        return [
            $penduduk->nik,
            $penduduk->no_kk,
            $penduduk->nama,
            $penduduk->tempat_lahir,
            $penduduk->tanggal_lahir,
            $penduduk->jenis_kelamin,
            $penduduk->agama,
            $penduduk->status_perkawinan,
            $penduduk->pendidikan,
            $penduduk->pekerjaan,
            $penduduk->kewarganegaraan,
            $penduduk->hubungan_dalam_keluarga,
            $penduduk->nama_ayah,
            $penduduk->nama_ibu,

            optional($penduduk->alamat)->nama_jalan,
            optional($penduduk->alamat)->rt,
            optional($penduduk->alamat)->rw,
            optional($penduduk->alamat)->kelurahan,
            optional($penduduk->alamat)->kecamatan,
            optional($penduduk->alamat)->kota,
            optional($penduduk->alamat)->provinsi,
        ];
    }
}
