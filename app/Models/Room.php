<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    const BUILDINGS = [
        'Gedung Utama' => 'Gedung Utama',
        'Tower A' => 'Tower A',
        'Tower B' => 'Tower B',
        'Teaching Factory' => 'Teaching Factory',
        'Apartment' => 'Apartment',
        'Technopreneur' => 'Technopreneur',
    ];

    protected $fillable = [
        'code',
        'name',
        'building',
        'capacity',
    ];
}
