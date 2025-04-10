<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
// use App\Models\Client;
// use App\Models\User;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\MyMail;

class ResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client;
    public $response;

    /**
     * Créez une nouvelle instance de message.
     *
     * @param \App\Models\Client $client
     * @param string $response
     */
    public function __construct($client, $response)
    {
        $this->client = $client;
        $this->response = $response;
    }

    /**
     * Obtenez l'enveloppe du message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Réponse du technicien pour le client ' . $this->client->client_name,
        );
    }

    /**
     * Obtenez la définition du contenu du message.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.commercial_response',  // Créez cette vue pour personnaliser l'email
            with: [
                'client' => $this->client,
                'response' => $this->response,
            ]
        );
    }
}
