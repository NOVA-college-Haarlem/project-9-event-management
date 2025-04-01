<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $primaryKey = 'ticket_id';

    protected $fillable = ['status', 'purchase_date', 'reference_code'];

    protected $casts = [
        'purchase_date' => 'datetime',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketType()
    {
        return $this->hasOne(TicketType::class,'ticket_id');
    }
}
