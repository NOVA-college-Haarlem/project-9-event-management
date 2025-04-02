<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
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

    public function store(StoreEventRequest $request)
    {
        
        Event::create($request->validated());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');

    }

    public function edit($id)
    {
        $event = \App\Models\Event::findOrFail($id);
        $organizers = \App\Models\User::all();
        $venues = \App\Models\Venue::all();

        return view('events.edit', compact('event', 'organizers', 'venues'));
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->validated());

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
