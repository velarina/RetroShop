<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    protected $fillable = [
        'title', 'code', 'periode', 'nominal', 'max_user'
    ];
}
