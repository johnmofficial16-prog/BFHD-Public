<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $fillable = [
        'vertical',
        'origin',
        'destination',
        'start_date',
        'end_date',
        'passengers',
        'guests',
        'user_ip',
        'user_agent',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
