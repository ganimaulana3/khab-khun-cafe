<?php

function date_indo($date)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    $split = explode('-', $date);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
