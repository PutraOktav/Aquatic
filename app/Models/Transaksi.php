<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'jenis_ikan',
        'jumlah',
        'harga_per_unit',
        'tanggal_transaksi',
        // tambahkan atribut lain yang diperlukan
    ];
}
