<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'preferences',
        'registered_at',
    ];

    protected $casts = [
        'preferences' => 'array',
        'registered_at' => 'datetime',
    ];
}
