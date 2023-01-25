<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTratamientoRequest extends FormRequest
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
            "especialidad"=>"required|string|min:3|max:100",
            "asunto"=>"required|string|min:5|max:100",
            "observacion"=>"nullable|string|max:256",
            "paciente_id"=>"required",
        ];
    }
}
