<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;



class RegistrationController extends Controller
{
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('registrations.create', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'nullable',
            'meal' => 'required',
            'workshop' => 'required',
            'event_id' => 'required|exists:events,id',
        ]);

        // Check of user bestaat of maak aan
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => bcrypt(Str::random(12)), // of iets anders
                'role' => 'attendee',
            ]
        );

        Registration::create([
            'user_id' => $user->id,
            'event_id' => $request->event_id,
            'status' => 'pending',
            'preferences' => json_encode([
                'meal' => $request->meal,
                'workshop' => $request->workshop,
                'address' => $request->address,
            ]),
            'registered_at' => now(),
        ]);

        return redirect()->route('events.index')->with('success', 'Registration submitted!');
    }

}
