<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $name;

    public function __construct($event, $name)
    {
        $this->event = $event;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Registration Confirmation for ' . $this->event->name)
                    ->view('emails.registration_confirmation')
                    ->with([
                        'event' => $this->event,
                        'name' => $this->name,
                    ]);
    }

}
