<?php

// app/Models/FeedTransaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['feed_id', 'quantity', 'type'];

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
}
