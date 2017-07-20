<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateAtencionesRequest extends FormRequest
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
            'id' => 'required|integer',
            'fecha_hora_atencion' => 'required',
            'paciente_atendido' => 'required',
            'medico_a_cargo' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'El campo es obligatorio',
            'id.integer' => 'El id debe ser un numero',
            'fecha_hora_atencion.required' => 'Fecha de antencion obligatoria',
            'paciente_atendido.required' => 'El campo es obligatorio',
            'medico_a_cargo.required' => 'El campo es obligatorio',

        ];
    }
}
