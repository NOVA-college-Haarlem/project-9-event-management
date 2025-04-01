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

    public function index(Request $request)
    {
        $query = Registration::with(['user', 'event.venue']);

    // Zoek op event naam
    if ($request->filled('event')) {
        $query->whereHas('event', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->event . '%');
        });
    }

    // Zoek op naam van geregistreerde
    if ($request->filled('name')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->name . '%');
        });
    }

    $registrations = $query->latest()->get();

    return view('registrations.index', compact('registrations'));
    }

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

        return view('registrations.thankyou');

    }

    public function edit($id)
    {
        $registration = Registration::with(['user', 'event.venue'])->findOrFail($id);
        return view('registrations.edit', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $registration->status = $request->status;
        $registration->save();

        return redirect()->route('registrations.index')->with('success', 'Registration updated.');
    }

    public function destroy($id)
    {
        Registration::destroy($id);
        return redirect()->route('registrations.index')->with('success', 'Registration deleted.');
    }

    public function delete(\App\Models\Registration $registration)
    {
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully.');
    }



}
