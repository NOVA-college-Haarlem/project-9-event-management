<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'total_price'
    ];

    // Relatie naar de User (de klant)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketTypes()
    {
        return $this->belongsToMany(TicketType::class)
                    ->withPivot('quantity', 'price');
    }
}
