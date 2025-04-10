<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Models\Technicien;
use App\Models\User;
use App\Models\Client;
// use App\Notifications\TechnicienNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index()
    {
        $clients = Client::count();
        $techniciens = User::where('role', 'technicien')->count();
        $commercials = User::where('role', 'commercial')->count();
        return view('home', compact('clients', 'techniciens', 'commercials'));
    }

    public function indexCommercial()
    {
        $users = User::where('role', 'commercial')->get();
        return view('user.index', compact('users'));
    }

    public function indexTechnicien()
    {
        $users = User::where('role', 'technicien')->get();
        return view('user.index', compact('users'));
    }
    


    public function create()
    {
        return view('user.create');
    }


    public function store(UserRequest $request)
    {
        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);

        if ($formFields['role'] === 'technicien') {
            $formFields['address'] = $formFields['address'] ?? 'Adresse par défaut';
            $formFields['speciality'] = $formFields['speciality'] ?? 'Electricien';
            $formFields['experience'] = $formFields['experience'] ?? 0;
            $formFields['status'] = $formFields['status'] ?? 'Active';
        }

        $user = User::create($formFields);


        if ($user->role === 'technicien') {
            return redirect()->route('users.techniciens')->with('success', 'Utilisateur créé avec succès');
        } else {
            return redirect()->route('users.commercials')->with('success', 'Utilisateur créé avec succès');
        }

        // $post= ['title'=>'Nouvelle inscription', 'body'=>'Un nouveau client a été ajouté. Veuillez vérifier les détails.'];
        // $user->notify(new ClientRegisteredNotification($user,$post));

    }




    public function show(User $user)
    {
        return view('user.show',compact("user"));

    }


    public function edit( User $user)
    {
        return view('user.edit',compact( 'user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $formFields = $request->validated();
        
        // Si un mot de passe est fourni, le hasher avant de l'enregistrer
        if ($request->password) {
            $formFields['password'] = Hash::make($request->password);
        }

        // Mettre à jour l'utilisateur avec les nouveaux champs
        $user->fill($formFields)->save();

        return redirect()->route('users.show', $user->id)->with('success', 'Votre compte a été modifié avec succès');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('success','Le compte a été bien supprimé');
    }





    public function accept($client_id)
    {
        $client = Client::findOrFail($client_id);
        // Logique pour accepter la demande
        return redirect()->route('users.show', $user->id)->with('success', 'La demande a été acceptée.');
    }

    public function decline($client_id)
    {
        $client = Client::findOrFail($client_id);
        // Logique pour refuser la demande
        return redirect()->route('users.show', $user->id)->with('error', 'La demande a été refusée.');
    }

}