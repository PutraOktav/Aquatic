<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hpp extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'hpp',
        'date',
    ];
}
