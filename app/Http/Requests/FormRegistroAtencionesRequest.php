<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegistroAtencionesRequest extends FormRequest
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
            'fecha_hora_atencion' => 'required',
            // 'paciente_atendido' => 'required',
            // 'medico_a_cargo' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'fecha_hora_atencion.required' => 'Fecha de antencion obligatoria',
            // 'paciente_atendido.required' => 'Rut Paciente Obligatorio',
            // 'medico_a_cargo.required' => 'Rut Medico Obligatorio',

        ];
    }
}
