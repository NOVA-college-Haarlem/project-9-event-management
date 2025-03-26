<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenuesController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('venue.index', compact('venues'));
    }

    public function create()
    {
        return view('venue.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'capacity' => 'nullable|integer|min:0',
        ]);

        Venue::create($request->all());

        return redirect()->route('venues.index')->with('success', 'Venue created successfully!');
    }
}
