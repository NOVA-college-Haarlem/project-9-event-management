<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackSubmittedMail;

class FeedbackController extends Controller
{
    public function create()
    {
        $events = Event::all();
        return view('feedback.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
            'email' => 'required|email',
            'event_id' => 'required|exists:events,id',
        ]);

        $event = \App\Models\Event::findOrFail($request->event_id);
        $name = explode('@', $request->email)[0]; // simpele naam

        // Feedback naar organisatie
        Mail::to('test@example.com')->send(
            new FeedbackSubmittedMail($event, $request->feedback, $name, false)
        );

        // Bevestiging naar gebruiker
        Mail::to($request->email)->send(
            new FeedbackSubmittedMail($event, $request->feedback, $name, true)
        );

        return redirect()->route('feedback.create')->with('success', 'Bedankt voor je feedback!');
    }
}
