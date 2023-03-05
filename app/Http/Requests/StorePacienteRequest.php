<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
            "nombre"=>"required|string|min:3|max:150",
            "apellido"=>"required|string|min:3|max:150",
            "fecha_nac"=>"required|string",
            "lugar_nac"=>"required|string|min:3|max:100",
            "ocupacion"=>"required|string|min:5|max:100",
            "direccion"=>"required|string|min:5|max:250",
            "cedula"=>"required|string|min:10|max:10",
            "telefono"=>"required|string|min:10|max:10",
            "sexo"=>"required|string",
            "observacion"=>"nullable|string|max:256",
        ];
    }
}
