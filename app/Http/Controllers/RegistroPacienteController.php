<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegistroPacienteRequest;
use App\SolicitudPaciente;




class RegistroPacienteController extends Controller
{

    public function ingresoPaciente(){
        return view('Form_ingresarPaciente');
    }

    public function registrarP(FormRegistroPacienteRequest $request){

        $solicitud_pacientes = new SolicitudPaciente();
        $solicitud_pacientes->rut                  = $request->input('rut');
        $solicitud_pacientes->nombre_completo      = $request->input('nombre_completo');
        $solicitud_pacientes->fecha_nacimiento     = $request->input('fecha_nacimiento');
        $solicitud_pacientes->sexo                 = $request->input('sexo');
        $solicitud_pacientes->direccion            = encrypt($request->input('direccion'));
        $solicitud_pacientes->telefono             = $request->input('telefono');

        $ok = $solicitud_pacientes->save();

        if ($ok){
            $nombre=$request->input('nombre_completo');
            return view('Aviso_Ingreso_Paciente')->With('NombrePaciente', $nombre);
        }else{
            return "Error al ingresar Paciente";
        }
    }





}
