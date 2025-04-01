<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $organizers = \App\Models\User::all();
        $venues = \App\Models\Venue::all();
        return view('events.create', compact('venues', 'organizers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_virtual' => 'required|boolean',
            'venue_id' => 'required|integer',
            'room' => 'required',
            'organizer_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->is_virtual = $request->is_virtual;
        $event->venue_id = $request->venue_id;
        $event->room = $request->room;
        $event->organizer_id = $request->organizer_id;
        $event->status = $request->status;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_virtual' => 'required|boolean',
            'venue_id' => 'required|integer',
            'room' => 'required',
            'organizer_id' => 'required|integer',
            'status' => 'required|string',
        ]);

        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->is_virtual = $request->is_virtual;
        $event->venue_id = $request->venue_id;
        $event->room = $request->room;
        $event->organizer_id = $request->organizer_id;
        $event->status = $request->status;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
