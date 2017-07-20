<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegistroMedicoRequest extends FormRequest
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
            'rut' => 'required',
            'nombre_completo' => 'required',
            'fecha_contratacion' => 'required',
            'especialidad' => 'required',
            'valor_consulta' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'rut.required' => 'El campo es obligatorio',
            'nombre_completo.required' => 'El campo es obligatorio',
            'fecha_contratacion.required' => 'El campo es obligatorio',
            'especialidad.required' => 'El campo es obligatorio',
            'valor_consulta.required' => 'El campo es obligatorio',

        ];
    }
}
