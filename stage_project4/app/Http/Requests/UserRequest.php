<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6|max:50|confirmed',
            'phone' => 'required',
            'cin' => 'required',
            'role'=>'required|in:commercial,admin,technicien',
            'address' => 'nullable|string|min:5|max:255',
            'speciality' => 'nullable|in:Nettoyage,Climatisation,Deratisation,Surveillance,
                                        Plomberie,Serrurier,Gardinnage,Pienture,Electricite,Demenagement,
                                        Amenagement,Bricolage,Anti_nuisibles,Autre',
            'experience' => 'nullable|integer',
            'status' => 'nullable|in:Active,Inactive',
        ];
    }
}
