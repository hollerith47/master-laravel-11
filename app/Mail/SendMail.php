<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailBody;
    public $mailSubject;



    /**
     * Create a new message instance.
     */
    public function __construct($mailBody, $mailSubject)
    {
        $this->mailBody = $mailBody;
        $this->mailSubject = $mailSubject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $sujet = $this->mailSubject;
        return new Envelope(
            from: new Address("laravel@htech-cloud.com", "Admin"),
            subject: $sujet
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.demo-mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
