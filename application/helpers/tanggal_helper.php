<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function bulan($m = 0)
{
    $bulan_arr = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    if ($m !== 0) {
        return $bulan_arr[$m];
    }
    return $bulan_arr;
}

function tanggal($d = 0)
{
    $tanggal_arr = [
        //01 - 31
        '01' => '01',
        '02' => '02',
        '03' => '03',
        '04' => '04',
        '05' => '05',
        '06' => '06',
        '07' => '07',
        '08' => '08',
        '09' => '09',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30',
        '31' => '31'
    ];

    if ($d !== 0) {
        return $tanggal_arr[$d];
    }
    return $tanggal_arr;
}

function hari($d = 0)
{
    $hari_arr = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jum\'at',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu',
    ];

    if ($d !== 0) {
        return $hari_arr[$d];
    }
    return $hari_arr;
}

function tgl_hari($tgl)
{    
    $bulan = bulan(date('m', strtotime($tgl)));
    $hari = hari(date('l', strtotime($tgl)));
    return $hari . ', ' . date('d-', strtotime($tgl)) . $bulan . date('-Y', strtotime($tgl));
}

function hari_bulan($bulan, $tahun)
{
    $kalender = CAL_GREGORIAN;
    $jml_hari = cal_days_in_month($kalender, $bulan, $tahun);
    $hari_tgl = [];

    for ($i=1; $i <= $jml_hari; $i++) { 
        $tgl = $i . '-' . $bulan . '-' . $tahun;
        $hari_tgl[] = [
            'hari' => hari(date('l', strtotime($tgl))),
            'tgl' => date('d-m-Y', strtotime($tgl))
        ];
    }
    return $hari_tgl;
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\helpers\Tanggal.php */