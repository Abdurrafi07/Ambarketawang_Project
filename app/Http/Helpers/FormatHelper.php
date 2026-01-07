<?php

if (!function_exists('tanggal_indonesia')) {
    function tanggal_indonesia($tanggal)
    {
        if (!$tanggal) return '';

        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        $tgl = date('d', strtotime($tanggal));
        $bln = $bulan[(int)date('m', strtotime($tanggal))];
        $thn = date('Y', strtotime($tanggal));

        return "$tgl $bln $thn";
    }
}
