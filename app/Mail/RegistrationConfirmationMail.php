<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $name;
    public $room;

    public function __construct($event, $name)
    {
        $this->event = $event;
        $this->name = $name;
        $this->room = $event->room ?? null; // room ophalen vanuit het event-model
    }

     /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Test Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.registration_confirmation',
            with: [
                'event' => $this->event,
                'name' => $this->name,
                'room' => $this->room,
                // 'qrImage' => $this->embed($qrPath), // <-- hier embedden we het
            ]
        );
    }

     /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path('images/QR_Code.png'))
                ->as('QR_Code.png')
                
        ];
    }

    // public function build()
    // {
    //     // Genereer de QR-code
    //     $qrPath = public_path('images/QR_Code.png');
        
    //     return $this->subject('Registration Confirmation for ' . $this->event->name)
    //                 ->view('emails.registration_confirmation')
    //                 ->with([
    //                     'event' => $this->event,
    //                     'name' => $this->name,
    //                     'room' => $this->room,
    //                     // 'qrImage' => $this->embed($qrPath), // <-- hier embedden we het
    //                 ])
    //                 // ->withSymfonyMessage(function ($message) {

    //                 //     // dd($message);
    //                 //     $message->embed(public_path('images\QR_Code.png'), 'qrImage');
    //                 // });
    //                 ->withSymfonyMessage(function ($message) use ($qrPath) {
    //                     $cid = $message->embed($qrPath);
    //                     $message->getHeaders()->addTextHeader('X-QrImage-Cid', $cid); // optioneel voor debuggen
    //                 });
    // }
}
