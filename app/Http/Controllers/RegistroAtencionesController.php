<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegistroAtencionesRequest;
use App\SolicitudAtenciones;




class RegistroAtencionesController extends Controller
{

    public function ingresarAtenciones(){
        return view('Form_ingresarAtenciones');
    }

    public function registrarAtenciones(FormRegistroAtencionesRequest $request){

        $solicitud_atenciones                      = new SolicitudAtenciones();
        $solicitud_atenciones->fecha_hora_atencion = $request->input('fecha_hora_atencion');
        $solicitud_atenciones->paciente_atendido   = $request->input('paciente_atendido');
        $solicitud_atenciones->medico_a_cargo      = $request->input('medico_a_cargo');
        $solicitud_atenciones->estado              = 'agendada';


        $ok = $solicitud_atenciones->save();

        if ($ok){
            $estado=$request->input('estado');
            return view('Aviso_Ingreso_Atencion')->With('estadoAtencion', $estado);
        }else{
            return "Error al ingresar Atencion";
        }
    }





}
