<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;
use App\Http\Requests\Ticket_TypeRequest;

class Ticket_TypeController extends Controller
{
    public function index()
    {
        $ticketTypes = TicketType::all();
        return view('ticket_types.index', compact('ticket_type'));
    }
    public function create()
    {
        $events = Event::all();
        return view('ticket_types.create', compact('events'));
    }
    public function store(Ticket_TypeRequest $request)
    {
        $ticketType = new TicketType();
        $this->save($ticketType, $request);
        return redirect('/ticket_types');
    }
    private function save(TicketType $ticketType, Ticket_TypeRequest $request): void
    {
        $ticketType->event_id = $request->event_id;
        $ticketType->name = $request->name;
        $ticketType->price = $request->price;
        $ticketType->quantity = $request->quantity;
        $ticketType->sales_start = $request->sales_start;
        $ticketType->sales_end = $request->sales_end;
        $ticketType->description = $request->description;
        $ticketType->save();
    }
    public function delete(TicketType $ticketType)
    {
        $ticketType->delete();
        return redirect('/ticket_types');
    }
}
