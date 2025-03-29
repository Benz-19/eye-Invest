<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invest extends Model
{
    protected $fillable = [
        'id',
        'salary',
        'amount',
        'period',
        'date',
    ];
}
