<?php

namespace App\Policies;

use App\Models\TicketType;
use App\Models\User;

class TicketPolicy
{
    public function update(User $user, TicketType $ticketType)
    {
        return $user->is_admin; // Of je eigen autorisatielogica
    }

    public function delete(User $user, TicketType $ticketType)
    {
        return $user->is_admin; // Of je eigen autorisatielogica
    }
}
