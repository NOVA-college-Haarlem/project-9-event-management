<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'name', 'price', 'quantity', 'sales_start', 'sales_end', 'description'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    
}
