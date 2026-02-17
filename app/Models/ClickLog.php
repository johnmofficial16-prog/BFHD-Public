<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClickLog extends Model
{
    protected $fillable = [
        'partner_id',
        'vertical',
        'user_ip',
        'user_agent',
        'referer',
        'redirect_url',
        'search_params',
    ];

    protected $casts = [
        'search_params' => 'array',
    ];

    /**
     * Relationship: Click log belongs to a partner
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
