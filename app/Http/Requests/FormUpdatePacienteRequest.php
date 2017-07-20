<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdatePacienteRequest extends FormRequest
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
            'id'               => 'required|integer',
            'rut'              => 'required|integer|min:6',
            'nombre_completo'  => 'required',
            'fecha_nacimiento' => 'required',
            'direccion'        => 'required',
            'telefono'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required'               => 'El campo es obligatorio',
            'id.integer'                => 'El id debe ser un numero',
            'rut.required'              => 'El campo es obligatorio',
            'rut.integer'               => 'El rut debe ser un numero',
            'rut.min'                   => 'El rut debe ser un numero 7 como minimo',
            'nombre_completo.required'  => 'El campo es obligatorio',
            'fecha_nacimiento.required' => 'El campo es obligatorio',
            'sexo.required'             => 'El campo es obligatorio',
            'direccion.required'        => 'El campo es obligatorio',
            'telefono.required'         => 'El campo es obligatorio',
        ];
    }
}
