<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentCommercial extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['date'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'cin',
        'role'
    ];
}
