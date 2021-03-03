<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorStoreRequest extends FormRequest
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
            'proveedor'=>['required'],
            'idCategoria'=>['required'],
            'telefono'=>['required'],
            'ciudad'=>['required'],
            'correo_electronico'=>['required'],
            'pagina_web'=>[''],
            'descripcion'=>['']
        ];
    }
}
