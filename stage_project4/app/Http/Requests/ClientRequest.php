<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool     
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'client_name' => 'required|min:3',
            'entreprise_name' => 'nullable',
            'date_demande' => 'required|date_format:Y-m-d',
            'origine_demande' => 'required|in:whatsapp,mail,direct',
            'contact' => 'required',
            'type_besoin' => 'required|in:service,Marchandise,Service_et_Marchandise,autre',
            'autre_besoin' => 'nullable',
            'nom_commerciale' => 'nullable',
            'date_visite' => 'required|date_format:Y-m-d',
            'type_cadence' => 'required|in:Ponctuelle,Reguliere,Autre',
            'client_address' => 'required|string|min:5|max:255',
            'detail_service' => 'required',
            'intervention' => 'required|in:en_cour,non_confirmer,terminer',
            "autre_type_cadence" => 'nullable',
        ];

        $typeBesoin = $this->input('type_besoin');
        $typeCadence = $this->input('type_cadence');
        $origineDemande = $this->input('origine_demande');

        // Apply contact validation based on origine_demande
        if ($origineDemande === 'whatsapp' || $origineDemande === 'direct') {
            $rules['contact'] = 'required|regex:/^(\+?\d{1,4}[\s-]?)?(\(?\d{1,3}\)?[\s-]?)?(\d{1,4}[\s-]?)?(\d{1,4}[\s-]?)?$/'; // Regex for phone number
        } elseif ($origineDemande === 'mail') {
            $rules['contact'] = 'required|email'; // Email validation
        }

        // Type besoin dépendances
        if ($typeBesoin === 'service') {
            $rules['nature_service'] = 'required';
            $rules['categorie_besoin'] = 'required|in:Nettoyage,Climatisation,Deratisation,Surveillance,
                Plomberie,Serrurier,Gardinnage,Pienture,Electricite,Demenagement,
                Amenagement,Bricolage,Anti_nuisibles,Autre';
        } elseif ($typeBesoin === 'Marchandise') {
            $rules['marchandiz'] = 'required';
        } elseif ($typeBesoin === 'Service_et_Marchandise') {
            $rules['nature_service'] = 'required';
            $rules['marchandiz'] = 'required';
            $rules['categorie_besoin'] = 'required|in:Nettoyage,Climatisation,Deratisation,Surveillance,
                Plomberie,Serrurier,Gardinnage,Pienture,Electricite,Demenagement,
                Amenagement,Bricolage,Anti_nuisibles,Autre';
        } elseif ($typeBesoin === 'autre') {
            $rules['autre_besoin'] = 'required|string|min:3';
        }

        // Type cadence dépendances
        if ($typeCadence === 'Autre') {
            $rules['autre_type_cadence'] = 'required|string|min:3';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'autre_besoin.required' => 'Veuillez préciser le type de besoin.',
            'autre_type_cadence.required' => 'Veuillez préciser le type de cadence.',
            'contact.regex' => 'Le numéro de téléphone est invalide.',
            'contact.email' => 'Veuillez entrer une adresse email valide.',
        ];
    }
}
