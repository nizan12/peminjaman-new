<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const JURUSAN_PRODI = [
        'Teknik Elektro' => [
            'D3 Teknik Elektronika Manufaktur',
            'D4 Teknologi Rekayasa Elektronika',
            'D3 Teknik Instrumentasi',
            'D4 Teknik Mekatronika',
            'D4 Teknologi Rekayasa Pembangkit Energi',
            'D4 Teknik Robotika'
        ],
        'Teknik Informatika' => [
            'D3 Teknik Informatika',
            'D3 Teknologi Geomatika',
            'D4 Animasi',
            'D4 Teknik Multimedia dan Jaringan',
            'D4 Rekayasa Keamanan Siber',
            'D4 Rekayasa Perangkat Lunak'
        ],
        'Teknik Mesin' => [
            'D3 Teknik Mesin',
            'D3 Teknik Perawatan Pesawat Udara',
            'D4 Teknologi Rekayasa Konstruksi Perkapalan',
            'D4 Teknologi Rekayasa Pengelasan dan Fabrikasi',
            'Program Profesi Insinyur (PSPPI)'
        ],
        'Manajemen Bisnis' => [
            'D3 Akuntansi',
            'D4 Akuntansi Manajerial',
            'D4 Administrasi Bisnis Terapan',
            'D4 Logistik Perdagangan Internasional',
            'D4 Administrasi Bisnis Terapan (International Class)',
            'D2 Distribusi Barang'
        ]
    ];
    

    protected $fillable = [
        'code',
        'name',
        'prodi',
    ];
}
