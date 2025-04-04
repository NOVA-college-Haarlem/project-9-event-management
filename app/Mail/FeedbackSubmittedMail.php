<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FeedbackSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $feedback;
    public $name;
    public $toUser;

    /**
     * Create a new message instance.
     */
    public function __construct(Event $event, string $feedback, string $name, bool $toUser = false)
    {
        $this->event = $event;
        $this->feedback = $feedback;
        $this->name = $name;
        $this->toUser = $toUser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->toUser
                ? 'Thank you for your feedback!'
                : 'New Feedback Received for ' . $this->event->name
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->toUser
                ? 'emails.feedback_confirmation_to_user'
                : 'emails.feedback_to_team',
            with: [
                'event' => $this->event,
                'feedback' => $this->feedback,
                'name' => $this->name,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return []; // Geen bijlagen nodig voor feedback
    }
}
