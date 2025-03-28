<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\RegistrationConfirmationMail;
use Illuminate\Support\Facades\Mail;



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
            
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($request->event_id);

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
                'address' => $request->address,
            ]),
            'registered_at' => now(),
        ]);

        Mail::to('test@example.com')->send(new RegistrationConfirmationMail($event, $request->name));

        return redirect()->route('events.index')->with('success', 'Registration submitted!');
    }

}
