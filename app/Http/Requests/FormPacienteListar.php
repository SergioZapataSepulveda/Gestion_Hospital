<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormPacienteListar extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // todos pueden usar este form...
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'rut' => 'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'El campo es obligatorio',
            'rut.integer' => 'solo debe ingresar numeros, su rut sin guion ni digito verificador',

        ];
    }
}
