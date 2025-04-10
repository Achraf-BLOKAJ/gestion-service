<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentCmlRequest extends FormRequest
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
            'phone' => 'required|regex:/^(\+212|0)(6|7)[0-9]{8}$/',
            'cin' => 'required',
            'role'=>'required|in:User,Admin,Super_Admin'
        ];
    }
}
