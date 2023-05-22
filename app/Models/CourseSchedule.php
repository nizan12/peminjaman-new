<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    use HasFactory;

    const HARI = [
        ['id' => 1, '_id' => 'Senin', '_en' => 'Monday'],
        ['id' => 2, '_id' => 'Selasa', '_en' => 'Tuesday'],
        ['id' => 3, '_id' => 'Rabu', '_en' => 'Wednesday'],
        ['id' => 4, '_id' => 'Kamis', '_en' => 'Thursday'],
        ['id' => 5, '_id' => 'Jumat', '_en' => 'Friday'],
        ['id' => 6, '_id' => 'Sabtu', '_en' => 'Saturday'],
        ['id' => 7, '_id' => 'Minggu', '_en' => 'Sunday'],
    ];

    const TAHUN_AJARAN = [
        'GANJIL 2019/2020',
        'GENAP 2019/2020',

        'GANJIL 2020/2021',
        'GENAP 2020/2021',
        
        'GANJIL 2021/2022',
        'GENAP 2021/2022',
        
        'GANJIL 2022/2023',
        'GENAP 2022/2023',
        
        'GANJIL 2023/2024',
        'GENAP 2023/2024',

        'GANJIL 2024/2025',
        'GENAP 2024/2025',

        'GANJIL 2025/2026',
        'GENAP 2025/2026',

        'GANJIL 2026/2027',
        'GENAP 2026/2027',
    ];

     
}
