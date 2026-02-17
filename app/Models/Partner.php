<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'vertical',
        'tracking_id',
        'base_url',
        'priority',
        'region',
        'is_active',
        'config',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'config' => 'array',
        'priority' => 'integer',
    ];

    /**
     * Relationship: Partner has many click logs
     */
    public function clickLogs()
    {
        return $this->hasMany(ClickLog::class);
    }
}
