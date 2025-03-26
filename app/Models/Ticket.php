<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'purchase_date', 'reference_code'];

    protected $casts = [
        'purchase_date' => 'datetime',
    ];
}
