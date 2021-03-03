<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendRegisterWebinarRequest extends FormRequest
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
            'email'                 => 'required|email',
            'especialidad'          => 'required',
            'aceptoCondiciones'     => 'accepted',
        ];

    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required'     => 'Debe completar el recaptcha para continuar',
            'g-recaptcha-response.recaptcha'    => 'Por favor comprueba que eres humano',
            'nombre.required'                   => 'Nombre Requerido.',
            'email.required'                    => 'Email Requerido.',
            'email.email'                       => 'Email no esta en un formato valido.',
            'especialidad.required'             => 'Mensaje Requerido.',
            'aceptoCondiciones.accepted'        => 'Debe aceptar las Condiciones de Uso'
        ];
    }
}
