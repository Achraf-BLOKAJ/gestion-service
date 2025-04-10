<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index(Request $request)
    {
        $intervention = $request->input('intervention');

        $clients = Client::where('intervention', $intervention )->get();

        $views = [
            'en_cour' => 'intervention.en_cour',
            'non_confirmer' => 'intervention.non_confirmer',
            'terminer' => 'intervention.terminer',
        ];

        $view = $views[$intervention] ;



        return view($view, compact('clients'));    
    }
}
