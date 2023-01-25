<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitaRequest extends FormRequest
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
            "medico"=>"required|string|min:3|max:150",
            "estado"=>"required|string|max:20",
            "especialidad"=>"required|string|min:3|max:100",
            "fecha_inicio"=>"required|date",
            "fecha_fin"=>"required|date",
            "telefono"=>"required|string|min:10",
        ];
    }
}
