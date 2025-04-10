<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Afficher le formulaire de connexion
    public function show()
    {
        return view('login.show');
    }

    // Gérer la tentative de connexion
    public function login(Request $request)
    {
        // Validation des données de la demande
        $request->validate([
            'login' => 'required',  // Le champ 'login' (email ou nom)
            'password' => 'required|min:6', // Le mot de passe doit être requis et d'une longueur minimale
        ]);

        // Récupérer l'email ou le nom
        $login = $request->login;
        $password = $request->password;

        // Déterminer si 'login' est un email ou un nom d'utilisateur
        $credentials = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $login, 'password' => $password]
            : ['name' => $login, 'password' => $password];
        
        // Tenter la connexion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Régénérer la session pour des raisons de sécurité

            $user = Auth::user(); // Récupérer l'utilisateur connecté

            // Redirection en fonction du rôle de l'utilisateur
            if ($user->role == 'admin') {
                return to_route('users.index')->with('success', 'Vous êtes bien connecté en tant qu\'admin : ' . $login);
            } elseif ($user->role == 'commercial') {
                return to_route('clients.index')->with('success', 'Vous êtes bien connecté en tant que commercial : ' . $login);
            } elseif ($user->role == 'technicien') {
                return to_route('users.show', $user->id)->with('success', 'Vous êtes bien connecté en tant que technicien : ' . $login);
            } else {
                // Si le rôle n'est pas défini correctement, on redirige vers la page par défaut
                return to_route('users.index')->with('success', 'Vous êtes bien connecté : ' . $login);
            }
        } else {
            // Si la tentative de connexion échoue
            return back()->withErrors([
                'login' => 'Email ou mot de passe incorrect.' // Afficher un message d'erreur
            ])->onlyInput('login'); // Garder les données saisies dans le formulaire
        }
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        // Nettoyer la session et déconnecter l'utilisateur
        Session::flush();
        Auth::logout();

        // Redirection vers la page de connexion avec un message de succès
        return to_route('login')->with('success', 'Vous êtes bien déconnecté.');
    }
}
