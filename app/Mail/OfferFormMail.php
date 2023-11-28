<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OfferFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        protected $request,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: $this->request->email,
            subject: 'Žiadosť o cenovú ponuku'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.offer-form',
            with: [
                'name' => $this->request->name,
                'surname' => $this->request->surname,
                'email' => $this->request->email,
                'mobile' => $this->request->mobile,
                'gate' => $this->request->gate,
                'styleGate' => $this->request->styleGate,
                'widthGate' => $this->request->widthGate,
                'heightGate' => $this->request->heightGate,
                'entryGate' => $this->request->entryGate ? 1 : 0,
                'widthEntryGate' => $this->request->widthEntryGate,
                'heightEntryGate' => $this->request->heightEntryGate,
                'montage' => $this->request->montage ? 1 : 0,
                'montagePlace' => $this->request->montagePlace,
                'motor' => $this->request->motor ? 1 : 0,
                'msg' => $this->request->msg
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
