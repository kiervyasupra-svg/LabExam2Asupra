<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment; // ✅ IMPORTANT

class Order extends Model
{
    protected $fillable = [
        'rice_id',
        'quantity',
        'price',
        'total'
    ];

    public function rice()
    {
        return $this->belongsTo(Rice::class);
    }

    // ✅ ADD THIS METHOD
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}