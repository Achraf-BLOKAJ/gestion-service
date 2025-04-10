<?php

namespace App\Http\Controllers;

// use App\Notifications\ClientRegisteredNotification;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\User;
// use App\Notifications\ClientCreatedNotification;
// use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('Client.index', compact('clients'));
    }


    public function create()
    {
        return view('Client.create');
    }

    public function store(ClientRequest $request)
{
    $formFields = $request->validated();
    $client = Client::create($formFields);

    // Vérifie si categorie_besoin est présent
    if (!empty($client->categorie_besoin)) {
        // Filtrer les techniciens par spécialité
        $technicians = User::where('role', 'technicien')
            ->where('speciality', $client->categorie_besoin)
            ->get();
    } else {
        // Pas de catégorie, envoyer à tous les techniciens
        $technicians = User::where('role', 'technicien')->get();
    }

    // Créer des liens pour accepter ou refuser
    $acceptLink = route('technician.response', ['client_id' => $client->id, 'response' => 'accept']);
    $declineLink = route('technician.response', ['client_id' => $client->id, 'response' => 'decline']);

    // Envoi de mail
    foreach ($technicians as $technician) {
        $name = $technician->name;
        Mail::to($technician->email)->send(new MyMail($name, $acceptLink, $declineLink));
    }

    return redirect()->route('clients.index')->with('success', 'Le client a été bien créé et les techniciens ont été notifiés.');
}




    public function show(Client $client)
    {
        return view('Client.show', compact('client'));
    }


    public function edit(Client $client)
    {
        return view('Client.edit', compact('client'));
    }


    public function update(ClientRequest $request, Client $client)
    {
        $formFields = $request->validated();
        $client->fill($formFields)->save();

        return redirect()->route('clients.show', $client->id)->with('success', 'le compte de client est bien Modifié');
    }


    public function updateIntervention(Request $request, $id)
    {
        // Find the client by ID
        $client = Client::findOrFail($id);
    
        // Validate the intervention field
        $request->validate([
            'intervention' => 'required|string|in:en_cour,non_confirmer,terminer',
        ]);
    
        // Update the intervention status
        $client->intervention = $request->input('intervention');
        $client->save();
    
        // Redirect back with success message
        return redirect()->route('clients.index')->with('success', 'Intervention updated successfully');
    }
    

    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('clients.index')->with('success', 'Le client a été bien supprimé');
    }
}
