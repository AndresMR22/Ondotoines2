<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            "nombre_completo"=>'required|string|min:3|max:50',
            "cedula"=>'required|string|min:10|max:10',
            "telefono"=>'required|string|min:10|max:10',
            "lugar_trabajo"=>'required|string|min:3|max:50',
            "ciudad"=>'required|string|min:3|max:50',
            "canton"=>'required|string|min:3|max:50',
            "direccion"=>'required|string|min:3|max:100',
            "cargo"=>'required|string|min:3|max:50',
        ];
    }
}
