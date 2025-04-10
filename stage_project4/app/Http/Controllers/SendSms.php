<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SendSms extends Controller
{
    public function send()
    {
        try {

            $techniciens = User::where('role', 'technicien')->get();
            $phones = $techniciens->pluck('phone');

            $basic = new \Vonage\Client\Credentials\Basic('8932c886', 'n6mo8vehH9yAOFuF');
            $client = new \Vonage\Client($basic);

            foreach ($phones as $phone) {
                $message = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($phone, 'App Gestion Service', 'On ajoute un nouveau client'));
            }
        return response()->json(['SMS sent successfully',200]);
        } 
        catch (\Exception $e) {
            // En cas d'erreur, retourner un message d'erreur
            return response()->json(['error' => 'Failed to send SMS: ' . $e->getMessage()], 500);
        }
    }
}
