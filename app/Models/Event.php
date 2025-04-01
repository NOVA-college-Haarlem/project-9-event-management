<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'is_virtual',
        'venue_id',
        'room',
        'organizer_id',
        'status',
    ];

    // Relatie met Venue
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }



    // Tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    // Ticket Types
    public function ticketTypes()
    {
    return $this->hasMany(TicketType::class);
    }

    // Sessions
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    // Surveys
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    // Budgets
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    // Marketing Campaigns
    public function marketingCampaigns()
    {
        return $this->hasMany(MarketingCampaign::class);
    }

    // Resources
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    // EventStaff
    public function staff()
    {
        return $this->hasMany(EventStaff::class);
    }

    // Sponsors (many-to-many)
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    // Exhibitors (many-to-many)
    public function exhibitors()
    {
        return $this->belongsToMany(Exhibitor::class);
    }

    // Communications
    public function communications()
    {
        return $this->hasMany(Communication::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }
}
