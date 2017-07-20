<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormModificarUsuarios extends FormRequest
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
          'rut' => 'required|max:255',
          'password' => 'required|min:6|',
          'nombre' => 'required|max:255',
          'email' => 'required|email|max:255',
          'cargo' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
          'rut.required'      => 'El campo es obligatorio',
          'password.required' => 'El campo es obligatorio',
          'nombre.required'   => 'El campo es obligatorio',
          'email.required'    => 'El campo es obligatorio',
          'cargo.required'    => 'El campo es obligatorio',
        ];
    }
}
