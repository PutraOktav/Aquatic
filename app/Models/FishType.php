<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'ukuran_awal',
        'waktu_panen',
        'biomassa',
        'ukuran_panen',
        'stocking_density',
        'fcr',
        'fish_food_id',
        'waktu_sampling'
    ];
    public function fishFood()
    {
        return $this->belongsTo(FishFood::class);
    }
}
