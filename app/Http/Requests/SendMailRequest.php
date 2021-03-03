<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
{

    public function authorize()
    {
        return true;


    }


    public function rules()
    {
        return [
            'g-recaptcha-response'  => 'required|recaptcha',
            'nombre'                => 'required',
            'telefono'              => 'required',
            'email'                 => 'required|email',
            'mensaje'               => 'required',

        ];

    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required'     => 'El Recaptcha es obligatorio',
            'g-recaptcha-response.recaptcha'    => 'Por favor comprueba que eres humano',
            'nombre.required'                   => 'Nombre Requerido.',
            'telefono.required'                 => 'Teléfono Requerido.',
            'email.required'                    => 'Email Requerido.',
            'email.email'                       => 'Email no esta en un formato valido.',
            'mensaje.required'                  => 'Mensaje Requerido.',

        ];
    }
}
