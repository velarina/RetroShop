<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'category', 'title', 'spesification', 'description', 'ship_from', 'stock', 'voucher'
    ];
}
