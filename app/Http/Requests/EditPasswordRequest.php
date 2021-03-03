<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'password'          => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required'    => 'El campo Contraseña es obligatorio.',
            'password.min'         => 'El campo Contraseña requiere estar compuesto de minimo 6 caracteres.',
            'password.confirmed'   => 'La confirmación de Contraseña no coincide.',
        ];
    }
}
