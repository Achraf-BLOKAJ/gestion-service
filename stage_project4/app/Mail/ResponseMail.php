<?php

namespace App\Mail;

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $response;
    public $technicianName;
    public $technicianPhone;

    public function __construct($client, $response, $technicianName, $technicianPhone)
    {
        $this->client = $client;
        $this->response = $response;
        $this->technicianName = $technicianName;
        $this->technicianPhone = $technicianPhone;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Réponse du technicien pour le client ' . $this->client->client_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.commercial_response', // Ensure this view is created and customized
            with: [
                'client' => $this->client,
                'response' => $this->response,
                'technicianName' => $this->technicianName,
                'technicianPhone' => $this->technicianPhone,
            ]
        );
    }
}
