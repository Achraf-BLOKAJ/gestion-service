<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['date'];

    protected $fillable = [
        'client_name',
        'entreprise_name',
        'date_demande',
        'origine_demande',
        'contact',
        'type_besoin',
        'autre_besoin',
        'categorie_besoin',
        'nature_service',
        'marchandiz',
        'nom_commerciale',
        'date_visite',
        'type_cadence',
        'client_address',
        'detail_service',
        'autre_type_cadence',
        'intervention',
    ];
    
}
