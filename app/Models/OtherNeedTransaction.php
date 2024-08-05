<?php
// app/Models/OtherNeedTransaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherNeedTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['other_need_id', 'quantity', 'type'];

    public function otherNeed()
    {
        return $this->belongsTo(OtherNeed::class);
    }
}
