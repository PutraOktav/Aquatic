<?php

// app/Models/MedicineTransaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['medicine_id', 'quantity', 'type'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
