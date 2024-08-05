<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'area',
        'totalFish',
        'biomassakg',
        'biomassaPanenkg',
        'ukuranAwal',
        'waktuPanen',
        'namaPakan',
        'ukuranPanen',
        'totalFeed',
        'fishCost',
        'feedCost',
        'allCost',
        'sampling'
    ];

}
