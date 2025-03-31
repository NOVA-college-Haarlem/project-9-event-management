<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;

class TicketsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $tickets = Ticket::all();
        $events = Event::all();
        $ticketTypes = TicketType::all();
        $users = User::all();
        return view('tickets.create', compact('tickets', 'events', 'ticketTypes', 'users'));
    }

    public function store(TicketRequest $request)
    {
        $ticket = new Ticket();
        
        $this->save($ticket, $request);
        return redirect('/tickets');
    }

    public function update(Request $request, Ticket $ticket)
    {
        $this->save($ticket, $request);
        return redirect('/tickets');
    }

    private function save(Ticket $ticket, TicketRequest $request): void
    {
        
        $ticket->event_id = $request->event_id;
        $ticket->user_id = $request->user_id;
        $ticket->ticket_types_id = $request->ticket_types_id;
        $ticket->status = $request->status;
        $ticket->purchase_date = $request->purchase_date;
        $ticket->reference_code = $ticket->reference_code;
        $ticket->save();
    }

    public function delete(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/tickets');
    }
}
