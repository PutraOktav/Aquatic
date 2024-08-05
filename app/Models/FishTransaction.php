<?php

// app/Models/FishTransaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['fish_id', 'quantity', 'type'];

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }
}
