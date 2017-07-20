<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FormRegistroMedicoRequest;
use App\SolicitudMedicos;




class RegistroMedicoController extends Controller
{
    
    public function ingresoMedicos(){
        return view('Form_ingresarMedico');
    }

    public function registrarM(FormRegistroMedicoRequest $request){
        
        $solicitud_medicos = new SolicitudMedicos(); 
        $solicitud_medicos->rut                  = $request->input('rut');
        $solicitud_medicos->nombre_completo      = $request->input('nombre_completo');
        $solicitud_medicos->fecha_contratacion   = $request->input('fecha_contratacion');
        $solicitud_medicos->especialidad         = $request->input('especialidad');
        $solicitud_medicos->valor_consulta       = $request->input('valor_consulta');                        

        $ok = $solicitud_medicos->save();
        
        if ($ok){
            $nombre=$request->input('nombre_completo');
            return view('Aviso_Ingreso_Medico')->With('NombreMedico', $nombre);
        }else{
            return "Error al ingresar Medico";
        }
    }


    


}
