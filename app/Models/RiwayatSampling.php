<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSampling extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'area',
        'ukuranIkanSampling',
        'feedDayKG',
        'totalFeedSampling',
        'sampling',
    ];
}
