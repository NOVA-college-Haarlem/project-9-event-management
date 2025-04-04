<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueRequest;
use Illuminate\Http\Request;
use App\Models\Venue;

class VenuesController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(VenueRequest $request)
    {
        Venue::create($request->validated());

        return redirect()->route('venues.index')->with('success', 'Venue created successfully!');
    }


    public function events($venueId)
    {
        $venue = Venue::with('events')->findOrFail($venueId);
        return view('venues.events', compact('venue'));
    }
}
