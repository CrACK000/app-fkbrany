<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected $request,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: $this->request->email,
            subject: 'Kontaktný formulár'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
            with: [
                'name' => $this->request->name,
                'email' => $this->request->email,
                'mobile' => $this->request->mobile,
                'msg' => $this->request->msg
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
