<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegistroPacienteRequest extends FormRequest
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
            'rut'              => 'required|min:7',
            'nombre_completo'  => 'required',
            'fecha_nacimiento' => 'required',
            'sexo'             => 'required',
            'direccion'        => 'required',
            'telefono'         => 'required',

        ];
    }

    public function messages()
    {
        return [
            'rut.required'              => 'El campo es obligatorio',
            'rut.min'                   => 'El rut debe tener como minimo 7 valores',
            'nombre_completo.required'  => 'El campo es obligatorio',
            'fecha_nacimiento.required' => 'El campo es obligatorio',
            'sexo.required'             => 'El campo es obligatorio',
            'direccion.required'        => 'El campo es obligatorio',
            'telefono.required'         => 'El campo es obligatorio',

        ];
    }
}
