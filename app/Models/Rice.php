<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rice extends Model
{
    use HasFactory;

    protected $table = 'rice';

    protected $fillable = [
        'rice_name',
        'stock',
        'price',
        'description'
    ];
}