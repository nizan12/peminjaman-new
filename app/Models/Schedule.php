<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;


    const HARI = [
        ['id' => 0, '_id' => 'Minggu', '_en' => 'Sunday'],
        ['id' => 1, '_id' => 'Senin', '_en' => 'Monday'],
        ['id' => 2, '_id' => 'Selasa', '_en' => 'Tuesday'],
        ['id' => 3, '_id' => 'Rabu', '_en' => 'Wednesday'],
        ['id' => 4, '_id' => 'Kamis', '_en' => 'Thursday'],
        ['id' => 5, '_id' => 'Jumat', '_en' => 'Friday'],
        ['id' => 6, '_id' => 'Sabtu', '_en' => 'Saturday'],
    ];

    const START_TIME = [
        "07.50", "08.40", "09.30", "10.20", "11.10",
        "12.00", "12.50", "13.40", "14.30", "15.20",
        "16.10", "17.00", "18.00", "18.50", "19.40",
        "20.30", "21.20", "22.10", "23.00"
    ];

    const END_TIME = [
        "08.40", "09.30", "10.20", "11.10",
        "12.00", "12.50", "13.40", "14.30", "15.20",
        "16.10", "17.00", "18.00", "18.50", "19.40",
        "20.30", "21.20", "22.10", "23.00"
    ];


    const TAHUN_AJARAN = [
        'GANJIL 2019/2020' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2019/2020' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2020/2021' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2020/2021' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2021/2022' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2021/2022' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2022/2023' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2022/2023' => [
            'start_date' => '2023-02-06',
            'end_date' => '2023-07-07'
        ],

        'GANJIL 2023/2024' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2023/2024' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2024/2025' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2024/2025' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2025/2026' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2025/2026' => [
            'start_date' => '',
            'end_date' => ''
        ],

        'GANJIL 2026/2027' => [
            'start_date' => '',
            'end_date' => ''
        ],
        'GENAP 2026/2027' => [
            'start_date' => '',
            'end_date' => ''
        ],
    ];

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'courses_id',
        'lecturers_id',
        'school_year',
        'rooms_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id', 'id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class, 'lecturers_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id', 'id');
    }


    public static function getStartTahun($tahun_ajaran)
    {
        return self::TAHUN_AJARAN[$tahun_ajaran]['start_date'] ?? '2020-01-01';
    }

    
    public static function getEndTahun($tahun_ajaran)
    {
        return self::TAHUN_AJARAN[$tahun_ajaran]['end_date'] ?? '2020-12-31';
    }
}
