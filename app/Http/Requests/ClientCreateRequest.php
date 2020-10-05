<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|min:4|max:255',
            'prenom' => 'required|min:4|max:255',
            'tel' => 'required|max:255|regex:/^[0-9]{9}$/|unique:clients',
            'email' => 'required|email|max:255|unique:clients',
            'adresse' => 'required|min:3|max:255',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
