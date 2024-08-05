<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishFood extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price'
    ];
    public function fishTypes()
    {
        return $this->hasMany(FishType::class);
    }
}
