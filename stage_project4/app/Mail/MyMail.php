<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $acceptLink;
    public $declineLink;

    public function __construct($user, $acceptLink, $declineLink)
    {
        if (is_string($user)) {
            $this->user = (object) ['name' => $user, 'email' => ''];
        } else {
            $this->user = $user;
        }
        $this->acceptLink = $acceptLink;
        $this->declineLink = $declineLink;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle demande de client',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.test-email',  // Créez la vue email pour afficher les liens
            with: [
                'name' => $this->user->name,
                'acceptLink' => $this->acceptLink,
                'declineLink' => $this->declineLink,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
