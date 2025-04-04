<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;
    protected $fillable = ['event_id', 'name', 'price', 'quantity', 'sales_start', 'sales_end', 'description'];

    protected $casts = [
        'sales_start' => 'datetime',
        'sales_end' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function tickets()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_ticketType')  // Gebruik hier de juiste naam van de pivot-tabel
                    ->withPivot('quantity');
    }
}