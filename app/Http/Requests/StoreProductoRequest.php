<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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


    public function rules()
    {
        return [
            "nombre"=>'required|string|min:3|max:50',
            "marca"=>'required|string|min:3|max:50',
            "modelo"=>'required|string|min:3|max:50',
            "codigo"=>'required|string|min:5|max:5',
            // "color"=>'required|string',
            "precio_costo"=>'required|numeric',
            "pvp"=>'required|numeric',
            "cantidad"=>'required'
      
        ];
    }
}
