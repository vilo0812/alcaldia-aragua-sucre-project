<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
           'name'    => 'required',
            'email' => "required|unique:users,email|max:255",
            'rol_id'    => "required",
            'password'    => "required|confirmed",
        ];
    }
    public function messages()
    {
        return[
        'email.required' => 'El campo correo electrónico es obligatorio',
        'name.required' => 'El campo nombre es obligatorio',
        'email.email' => 'El correo electrónico no corresponde con una dirección de correo electrónico válida',
        'password.required' => 'La contraseña es obligatoria',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'rol_id.required' => 'El rol es requerido',
        ];
    }
}
