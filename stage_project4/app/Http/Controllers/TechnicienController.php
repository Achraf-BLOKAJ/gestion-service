<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClientStatusNotification;
use App\Mail\MyMail;
use App\Mail\ResponseMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

// New notification for status change

class TechnicienController extends Controller
{
    public function handleResponse($client_id, $response)
    {
        // Récupérer le client
        $client = Client::findOrFail($client_id);

        // Récupérer l'utilisateur qui est un technicien et qui a répondu
        $technician = auth()->user(); // Assumes the logged-in user is the technician

        // Gérer la réponse du technicien
        if ($response == 'accept') {
            $client->intervention = 'en_cour'; // Mettre à jour le statut ou tout autre champ dans le modèle Client
        } else {
            $client->intervention = 'non_confirmer'; // Mettre à jour le statut ou tout autre champ dans le modèle Client
        }

        $client->save();

        // Créer des liens pour accepter ou refuser la demande
        $acceptLink = route('technician.response', ['client_id' => $client->id, 'response' => 'accept']);
        $declineLink = route('technician.response', ['client_id' => $client->id, 'response' => 'decline']);

        // Vous pouvez récupérer le nom et le numéro de téléphone du technicien ici
        $technicianName = $technician->name; // Assuming 'name' field exists
        $technicianPhone = $technician->phone; // Assuming 'phone' field exists

        // Optionally, log the technician's info for debugging
        \Log::info("Technician who accepted the request: $technicianName, Phone: $technicianPhone");
        
        // Récupérer le commercial associé au client
        $commercial = User::where('role', 'commercial')
            ->where('name', $client->nom_commerciale)
            ->first();

        

        if ($commercial) {
            // Envoyer l'email au commercial pour l'informer de la réponse
            Mail::to($commercial->email)->send(new ResponseMail($client, $response, $technicianName, $technicianPhone));
        }  else {
            // Gérer le cas où le client n'a pas de commercial spécifique, envoyer à tous les commerciaux
            $commercials = User::where('role', 'commercial')->get(); // Récupérer tous les commerciaux

            foreach ($commercials as $commercial) {
                // Envoyer l'email à chaque commercial
                Mail::to($commercial->email)->send(new ResponseMail($client, $response, $technicianName, $technicianPhone));
            }
        }

        return('<h1 class="text-center">la réponse a été envoyée au commercial</h1>');

       
    }

}