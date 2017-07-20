<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\FormPacienteListar;
use App\SolicitudAtenciones;
use App\SolicitudPacientes;
use App\SolicitudMedicos;
use Illuminate\Support\Facades\DB;
use Auth;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function formIngresarRut(){
    return view('userPaciente/ingresarRut')->With('mensaje2', '');
  }
  public function listarPorRut(FormPacienteListar $request){
    $new_Atenciones    = new SolicitudAtenciones();
    $new_Pacientes     = new SolicitudPacientes();
    $new_Medicos       = new SolicitudMedicos();
    $rut               = $request->input('rut');
    $rut1              = $request->input('rut');
    $digitoIngresado   = $request->input('digitoVerificador');
    $numero_atenciones = DB::table('solicitud_Atenciones')->where('paciente_atendido', $rut )->count();
    if ($numero_atenciones > 0 ) {

      $digito;
      $contador = 2;
      $acumulador = 0;
      $multiplo;
      while($rut > 0){
        $multiplo = ($rut % 10) * $contador;
        $acumulador += $multiplo;
        $rut = floor($rut / 10);
        $contador++;
        if($contador == 8){
          $contador = 2;
        }
      }
      $digito = 11 - ($acumulador % 11);
      if($digito == 10){
        $digito = 'K';
      }
      if($digito == 11){
        $digito = 0;
      }

      if ($digito == strtoupper($digitoIngresado)) {

        $lista_paciente = $new_Pacientes->where('rut', $rut1 )->get();
        $listas_Unidas =  DB::table('solicitud_medicos')
            ->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('paciente_atendido', $rut1 )
            ->select('solicitud_atenciones.*', 'solicitud_medicos.*')
            ->get();

        return view('userPaciente/verPaciente' , compact('listas_Unidas','lista_paciente') )->With('mensaje1', $rut1)->With('mensaje3', strtoupper($digitoIngresado));


      }


      $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
      return view('userPaciente/ingresarRut')->With('mensaje2', $msj_formato);


    }

    $msj_2 = 'Rut No está registrado';
    return view('userPaciente/ingresarRut')->With('mensaje2', $msj_2);
  }

}
