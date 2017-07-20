<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegistroAtencionesRequest;
use App\Http\Requests\FormUpdateAtencionesRequest;
///////
use App\Http\Requests\FormRegistroPacienteRequest;
use App\Http\Requests\FormUpdatePacienteRequest;
use App\Http\Requests\FormPacienteListar;
///////
use App\Http\Requests\FormRegistroMedicoRequest ;
use App\Http\Requests\FormUpdateMedicoRequest ;
///////
use App\Http\Requests\FormCrearUsuarios;
use App\Http\Requests\FormModificarUsuarios;
//////
use App\User;
use App\SolicitudAtenciones;
use App\SolicitudPacientes;
use App\SolicitudMedicos;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */



  // :::::::::::::::::::::::::::::::::::::::::::::::
  // :::::::::::::::::::::::::::::::::::::SECRETARIA DIRECTOR
  public function listarPacientes(){
    if (Auth::user()->cargo == 'Secretaria') {
      $solicitud_paciente   = new SolicitudPacientes();
      $solicitud_pacientes  = $solicitud_paciente->get();
      return view('userSecretaria/listarPacientes' , compact('solicitud_pacientes'));
    }
    if (Auth::user()->cargo == 'Director') {
      $solicitud_paciente   = new SolicitudPacientes();
      $solicitud_pacientes  = $solicitud_paciente->get();
      return view('userDirector/listarPacientes' , compact('solicitud_pacientes'));
    }
    return view('homeBloqueo');
  }


  public function listarMedicos(){
    if (Auth::user()->cargo == 'Secretaria') {
      $solicitud_medico     = new SolicitudMedicos();
      $solicitud_medicos    = $solicitud_medico->get();
      return view('userSecretaria/listarMedicos' , compact('solicitud_medicos'));
    }
    if (Auth::user()->cargo == 'Director') {
      $solicitud_medico     = new SolicitudMedicos();
      $solicitud_medicos    = $solicitud_medico->get();
      return view('userDirector/listarMedicos' , compact('solicitud_medicos'));
    }
    return view('homeBloqueo');
  }



















  // :::::::::::::::::::::::::::::::::::::::::::::::
  // :::::::::::::::::::::::::::::::::::::SECRETARIA
  public function gestionarReservas(){
    if (Auth::user()->cargo == 'Secretaria') {
      $solicitud_atencion   = new SolicitudAtenciones();
      $solicitud_atenciones = $solicitud_atencion->get();
      return view('userSecretaria/gestionarReservas' , compact('solicitud_atenciones'));
    }
    return view('homeBloqueo');
  }


  // :::::::::::: Crear Atencion
  public function formAgendarAtencion(){
    if (Auth::user()->cargo == 'Secretaria') {
      $solicitud_paciente   = new SolicitudPacientes();
      $solicitud_pacientes  = $solicitud_paciente->get();
      $solicitud_medico     = new SolicitudMedicos();
      $solicitud_medicos    = $solicitud_medico->get();
      return view('userSecretaria/agendarAtencion' , compact('solicitud_pacientes'), compact('solicitud_medicos'));
    }
    return view('homeBloqueo');
  }

  public function agendarAtencion(FormRegistroAtencionesRequest $request){
    $solicitud_atenciones                      = new SolicitudAtenciones();
    $solicitud_atenciones->fecha_hora_atencion = $request->input('fecha_hora_atencion');
    $solicitud_atenciones->paciente_atendido   = $request->input('ddl_paciente');
    $solicitud_atenciones->medico_a_cargo      = $request->input('ddl_medicos');
    $solicitud_atenciones->estado              = 'agendada';
    $ok                                        = $solicitud_atenciones->save();

    if ($ok){
      $solicitud_atencion                      = new SolicitudAtenciones();
      $solicitud_atenciones                    = $solicitud_atencion->get();
      return view('userSecretaria/gestionarReservas' , compact('solicitud_atenciones'));
    }else{
      return "Error al ingresar Atencion";
    }
  }



  // :::::::::::: Modificar Atencion
  public function formModificarAtencion(){
    if (Auth::user()->cargo == 'Secretaria') {
      $solicitud_paciente   = new SolicitudPacientes();
      $solicitud_pacientes  = $solicitud_paciente->get();
      $solicitud_medico     = new SolicitudMedicos();
      $solicitud_medicos    = $solicitud_medico->get();
      return view('userSecretaria/modificarAtencion' , compact('solicitud_pacientes'), compact('solicitud_medicos'));
    }
    return view('homeBloqueo');
  }

  public function modificarAtencion(FormRegistroAtencionesRequest $request){
    $solicitud_atenciones        = new SolicitudAtenciones();
    $id_entrada                  = $request->input('id');
    $fecha_hora_atencion         = $request->input('fecha_hora_atencion');
    $paciente_atendido           = $request->input('ddl_paciente');
    $medico_a_cargo              = $request->input('ddl_medicos');
    $estado                      = $request->input('estado');

    $solicitud_atencione         = $solicitud_atenciones->where('id', $id_entrada )->update(['fecha_hora_atencion'=>$fecha_hora_atencion]);
    $solicitud_atencione         = $solicitud_atenciones->where('id', $id_entrada )->update(['paciente_atendido'=>$paciente_atendido]);
    $solicitud_atencione         = $solicitud_atenciones->where('id', $id_entrada )->update(['medico_a_cargo'=>$medico_a_cargo]);
    $solicitud_atencione         = $solicitud_atenciones->where('id', $id_entrada )->update(['estado'=>$estado]);


    $solicitud_atenciones = $solicitud_atenciones->get();
    return view('userSecretaria/gestionarReservas' , compact('solicitud_atenciones'));
  }



  // :::::::::::: Eliminar Atencion
  public function eliminarAtencion($id){
    $solicitud_atencion   = new SolicitudAtenciones();
    $solicitud_atenciones = $solicitud_atencion->where('id', $id )->delete();

    $solicitud_atenciones = $solicitud_atencion->get();
    return view('userSecretaria/gestionarReservas' , compact('solicitud_atenciones'));
  }





















  // ::::::::::::::::::::::::::::::::::::::::::::::::::::
  // :::::::::::::::::::::::::::::::::::::ADMINISTRADOR

  // :::::::::::::::::::::::::::::::::::::CRUD PACIENTE

  public function formCrearPaciente(){
    return view('userAdministrador/crearPaciente')->With('mensaje2', '');
  }

  public function crearPaciente(FormRegistroPacienteRequest $request){
    $solicitud_pacientes = new SolicitudPacientes();
    $rut                 = $request->input('rut');
    $digitoIngresado     = $request->input('digitoVerificador');
    $digito;
    $contador            = 2;
    $acumulador          = 0;
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
      $solicitud_pacientes->rut              = $request->input('rut');
      $solicitud_pacientes->nombre_completo  = $request->input('nombre_completo');
      $solicitud_pacientes->fecha_nacimiento = $request->input('fecha_nacimiento');
      $solicitud_pacientes->sexo             = $request->input('sexo');
      $solicitud_pacientes->direccion        = encrypt($request->input('direccion'));
      $solicitud_pacientes->telefono         = $request->input('telefono');

      $ok                                    = $solicitud_pacientes->save();
      $solicitud_pacientes                   = $solicitud_pacientes->get();
      return view('userAdministrador/gestionarPacientes' , compact('solicitud_pacientes'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/crearPaciente')->With('mensaje2', $msj_formato);
  }



  public function formModificarPaciente(){
    if (Auth::user()->cargo == 'Administrador') {
      return view('userAdministrador/modificarPaciente')->With('mensaje2', '');
    }
    return view('homeBloqueo');
  }

  public function modificarPaciente(FormUpdatePacienteRequest $request){
    $solicitud_Nueva = new SolicitudPacientes();
    $rut                 = $request->input('rut');
    $digitoIngresado     = $request->input('digitoVerificador');
    $digito;
    $contador            = 2;
    $acumulador          = 0;
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
      $id_entrada          = $request->input('id');
      $rut                 = $request->input('rut');
      $nombre_completo     = $request->input('nombre_completo');
      $fecha_nacimiento    = $request->input('fecha_nacimiento');
      $sexo                = $request->input('sexo');
      $direccion           = encrypt($request->input('direccion'));
      $telefono            = $request->input('telefono');

      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['rut'=>$rut]);
      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['nombre_completo'=>$nombre_completo]);
      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['fecha_nacimiento'=>$fecha_nacimiento]);
      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['sexo'=>$sexo]);
      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['direccion'=>$direccion]);
      $solicitud_paciente  = $solicitud_Nueva->where('id', $id_entrada )->update(['telefono'=>$telefono]);

      $solicitud_pacientes = $solicitud_Nueva->get();
      return view('userAdministrador/gestionarPacientes' , compact('solicitud_pacientes'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/modificarPaciente')->With('mensaje2', $msj_formato);
  }



  public function eliminarPaciente($id){
    $solicitud_Nueva     = new SolicitudPacientes();
    $solicitud_OK        = $solicitud_Nueva->where('id', $id )->delete();

    $solicitud_pacientes = $solicitud_Nueva->get();
    return view('userAdministrador/gestionarPacientes' , compact('solicitud_pacientes'));
  }

  public function gestionarPacientes(){
    if (Auth::user()->cargo == 'Administrador') {
      $solicitud_paciente   = new SolicitudPacientes();
      $solicitud_pacientes  = $solicitud_paciente->get();
      return view('userAdministrador/gestionarPacientes' , compact('solicitud_pacientes'));
    }
    return view('homeBloqueo');
  }




  // :::::::::::::::::::::::::::::::::::::CRUD MEDICO

  public function formCrearMedico(){
    return view('userAdministrador/crearMedico')->With('mensaje2', '');
  }
  public function crearMedico(FormRegistroMedicoRequest $request){

    $solicitud_medicos_Nueva                     = new SolicitudMedicos();
    $rut                 = $request->input('rut');
    $digitoIngresado     = $request->input('digitoVerificador');
    $digito;
    $contador            = 2;
    $acumulador          = 0;
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
      $solicitud_medicos_Nueva->rut                = $request->input('rut');
      $solicitud_medicos_Nueva->nombre_completo    = $request->input('nombre_completo');
      $solicitud_medicos_Nueva->fecha_contratacion = $request->input('fecha_contratacion');
      $solicitud_medicos_Nueva->especialidad       = $request->input('especialidad');
      $solicitud_medicos_Nueva->valor_consulta     = $request->input('valor_consulta');

      $ok                                          = $solicitud_medicos_Nueva->save();
      $listado_Medicos                             = $solicitud_medicos_Nueva->get();
      return view('userAdministrador/gestionarMedicos' , compact('listado_Medicos'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/crearMedico')->With('mensaje2', $msj_formato);
  }


  public function formModificarMedico(){
    return view('userAdministrador/modificarMedico')->With('mensaje2', '');
  }

  public function modificarMedico(FormUpdateMedicoRequest $request){

    $solicitud_medicos_Nueva    = new SolicitudMedicos();
    $rut                        = $request->input('rut');
    $digitoIngresado            = $request->input('digitoVerificador');
    $digito;        
    $contador                   = 2;
    $acumulador                 = 0;
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
      $id_entrada              = $request->input('id');
      $rut                     = $request->input('rut');
      $nombre_completo         = $request->input('nombre_completo');
      $fecha_contratacion      = $request->input('fecha_contratacion');
      $especialidad            = $request->input('especialidad');
      $valor_consulta          = $request->input('valor_consulta');

      $solicitud_medico        = $solicitud_medicos_Nueva->where('id', $id_entrada )->update(['rut'=>$rut]);
      $solicitud_medico        = $solicitud_medicos_Nueva->where('id', $id_entrada )->update(['nombre_completo'=>$nombre_completo]);
      $solicitud_medico        = $solicitud_medicos_Nueva->where('id', $id_entrada )->update(['fecha_contratacion'=>$fecha_contratacion]);
      $solicitud_medico        = $solicitud_medicos_Nueva->where('id', $id_entrada )->update(['especialidad'=>$especialidad]);
      $solicitud_medico        = $solicitud_medicos_Nueva->where('id', $id_entrada )->update(['valor_consulta'=>$valor_consulta]);

      $listado_Medicos         = $solicitud_medicos_Nueva->get();
      return view('userAdministrador/gestionarMedicos' , compact('listado_Medicos'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/modificarMedico')->With('mensaje2', $msj_formato);
  }


  public function eliminarMedico($id){
    $solicitud_medicos_Nueva = new SolicitudMedicos();
    $solicitud_OK            = $solicitud_medicos_Nueva->where('id', $id )->delete();

    $listado_Medicos         = $solicitud_medicos_Nueva->get();
    return view('userAdministrador/gestionarMedicos' , compact('listado_Medicos'));
  }


  public function gestionarMedicos(){

    $solicitud_medicos_Nueva = new SolicitudMedicos();
    $listado_Medicos         = $solicitud_medicos_Nueva->get();
    return view('userAdministrador/gestionarMedicos' , compact('listado_Medicos'));

  }




  // :::::::::::::::::::::::::::::::::::::CRUD USUARIOS
  public function formCrearUsuario(){
    return view('userAdministrador/crearUsuario')->With('mensaje2', '');
  }

  public function crearUsuario(FormCrearUsuarios $request){

    $solicitud_usuarios_Nueva   = new User();
    $rut                        = $request->input('rut');
    $digitoIngresado            = $request->input('digitoVerificador');
    $digito;        
    $contador                   = 2;
    $acumulador                 = 0;
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
      $solicitud_usuarios_Nueva->rut      = $request->input('rut');
      $solicitud_usuarios_Nueva->password = bcrypt($request->input('password'));
      $solicitud_usuarios_Nueva->nombre   = $request->input('nombre');
      $solicitud_usuarios_Nueva->email    = $request->input('email');
      $solicitud_usuarios_Nueva->cargo    = $request->input('cargo');

      $ok                                 = $solicitud_usuarios_Nueva->save();
      $listado_Usuarios                   = $solicitud_usuarios_Nueva->get();
      return view('userAdministrador/gestionarUsuarios' , compact('listado_Usuarios'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/crearUsuario')->With('mensaje2', $msj_formato);
  }


  public function formModificarUsuario(){
    return view('userAdministrador/modificarUsuario')->With('mensaje2', '');
  }
  public function modificarUsuario(FormModificarUsuarios $request){

    $solicitud_usuarios_Nueva   = new User();
    $rut                        = $request->input('rut');
    $digitoIngresado            = $request->input('digitoVerificador');
    $digito;        
    $contador                   = 2;
    $acumulador                 = 0;
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
    $id_entrada               = $request->input('id');
    $rut                      = $request->input('rut');
    $password                 = bcrypt($request->input('password'));
    $nombre                   = $request->input('nombre');
    $email                    = $request->input('email');
    $cargo                    = $request->input('cargo');

    $solicitud_usuario        = $solicitud_usuarios_Nueva->where('id', $id_entrada )->update(['rut'=>$rut]);
    $solicitud_usuario        = $solicitud_usuarios_Nueva->where('id', $id_entrada )->update(['password'=>$password]);
    $solicitud_usuario        = $solicitud_usuarios_Nueva->where('id', $id_entrada )->update(['nombre'=>$nombre]);
    $solicitud_usuario        = $solicitud_usuarios_Nueva->where('id', $id_entrada )->update(['email'=>$email]);
    $solicitud_usuario        = $solicitud_usuarios_Nueva->where('id', $id_entrada )->update(['cargo'=>$cargo]);

    $listado_Usuarios         = $solicitud_usuarios_Nueva->get();
    return view('userAdministrador/gestionarUsuarios' , compact('listado_Usuarios'));
    }
    $msj_formato = 'Rut y Digito verificador ingresados no coinciden, revise los datos  ';
    return view('userAdministrador/modificarUsuario')->With('mensaje2', $msj_formato);
  }



  public function eliminarUsuario($id){
    $solicitud_usuarios_Nueva = new User();
    $solicitud_OK             = $solicitud_usuarios_Nueva->where('id', $id )->delete();

    $listado_Usuarios         = $solicitud_usuarios_Nueva->get();
    return view('userAdministrador/gestionarUsuarios' , compact('listado_Usuarios'));
  }



  public function gestionarUsuarios(){

    $solicitud_usuarios_Nueva = new User();
    $listado_Usuarios         = $solicitud_usuarios_Nueva->get();
    return view('userAdministrador/gestionarUsuarios' , compact('listado_Usuarios'));

  }





















  // :::::::::::::::::::::::::::::::::::::::::::::::
  // :::::::::::::::::::::::::::::::::::::DIRECTOR
  public function estadisticasMensuales(){
    if (Auth::user()->cargo == 'Director') {

      $solicitud_atenciones  = new SolicitudAtenciones();
      $solicitud_pacientes   = new SolicitudPacientes();
      $solicitud_medicos     = new SolicitudMedicos();
      //nombre columna, valor a comparar


      // Estadisticas de Atenciones
      $atenciones_totales    = $solicitud_atenciones->get()->count();
      $atenciones_agendada   = $solicitud_atenciones->where('estado', 'agendada' )->get(['estado'])->count();
      $atenciones_anulada    = $solicitud_atenciones->where('estado', 'anulada' )->get(['estado'])->count();
      $atenciones_confirmada = $solicitud_atenciones->where('estado', 'confirmada')->get(['estado'])->count();
      $atenciones_perdida    = $solicitud_atenciones->where('estado', 'perdida' )->get(['estado'])->count();
      $atenciones_realizada  = $solicitud_atenciones->where('estado', 'realizada' )->get(['estado'])->count();


      // Estadisticas de Pacientes
      $num_paciente_totales  = $solicitud_pacientes->get()->count();
      $num_paciente_Mujeres  = $solicitud_pacientes->where('sexo', 'Femenino' )->get(['sexo'])->count();
      $num_paciente_Hombres  = $solicitud_pacientes->where('sexo', 'Masculino' )->get(['sexo'])->count();
      $num_paciente_Otros    = $solicitud_pacientes->where('sexo', 'Otros' )->get(['sexo'])->count();


      // Estadisticas de Atenciones por Mes
      $num_atenciones_totales_Mes  = $solicitud_atenciones->get()->count();
      $num_atenciones_totales_Mes_01  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [1])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_02  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [2])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_03  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [3])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_04  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [4])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_05  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [5])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_06  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [6])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_07  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [7])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_08  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [8])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_09  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [9])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_10  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [10])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_11  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [11])->get(['fecha_hora_atencion'])->count();
      $num_atenciones_totales_Mes_12  = $solicitud_atenciones->whereRaw('MONTH(fecha_hora_atencion) = ?', [12])->get(['fecha_hora_atencion'])->count();


      // Estadisticas de Pacientes
      $num_paciente_totales  = $solicitud_pacientes->get()->count();
      $num_paciente_Mujeres  = $solicitud_pacientes->where('sexo', 'Femenino' )->get(['sexo'])->count();
      $num_paciente_Hombres  = $solicitud_pacientes->where('sexo', 'Masculino' )->get(['sexo'])->count();
      $num_paciente_Otros    = $solicitud_pacientes->where('sexo', 'Otros' )->get(['sexo'])->count();


      // Estadisticas de Especialidades
      $esp_total = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->count();
      $esp_Diag = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Diagnostico Medico' )->count();
      $esp_Psic = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Psicología' )->count();
      $esp_Pedi = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Pediatría' )->count();
      $esp_Ofta = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Oftalmología' )->count();
      $esp_Gast = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Gastroenterología' )->count();
      $esp_Derm = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Dermatología' )->count();
      $esp_Card = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Cardiología' )->count();
      $esp_Trau = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Traumatología' )->count();
      $esp_Onco = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Oncología' )->count();
      $esp_Gine = DB::table('solicitud_medicos')->join('solicitud_atenciones', 'solicitud_atenciones.medico_a_cargo', '=', 'solicitud_medicos.rut')->where('especialidad', 'Ginecología' )->count();



      return view('userDirector/estadisticasMensuales')
      ->With('estadistica_A0', $atenciones_totales)
      ->With('estadistica_A1', $atenciones_agendada)
      ->With('estadistica_A2', $atenciones_anulada)
      ->With('estadistica_A3', $atenciones_confirmada)
      ->With('estadistica_A4', $atenciones_perdida)
      ->With('estadistica_A5', $atenciones_realizada)
      ->With('estadistica_B0', $num_paciente_totales)
      ->With('estadistica_B1', $num_paciente_Mujeres)
      ->With('estadistica_B2', $num_paciente_Hombres)
      ->With('estadistica_B3', $num_paciente_Otros)
      ->With('estadistica_C0', $num_atenciones_totales_Mes)
      ->With('estadistica_C1', $num_atenciones_totales_Mes_01)
      ->With('estadistica_C2', $num_atenciones_totales_Mes_02)
      ->With('estadistica_C3', $num_atenciones_totales_Mes_03)
      ->With('estadistica_C4', $num_atenciones_totales_Mes_04)
      ->With('estadistica_C5', $num_atenciones_totales_Mes_05)
      ->With('estadistica_C6', $num_atenciones_totales_Mes_06)
      ->With('estadistica_C7', $num_atenciones_totales_Mes_07)
      ->With('estadistica_C8', $num_atenciones_totales_Mes_08)
      ->With('estadistica_C9', $num_atenciones_totales_Mes_09)
      ->With('estadistica_C10', $num_atenciones_totales_Mes_10)
      ->With('estadistica_C11', $num_atenciones_totales_Mes_11)
      ->With('estadistica_C12', $num_atenciones_totales_Mes_12)
      ->With('estadistica_D0', $esp_total)
      ->With('estadistica_D1', $esp_Diag)
      ->With('estadistica_D2', $esp_Psic)
      ->With('estadistica_D3', $esp_Pedi)
      ->With('estadistica_D4', $esp_Ofta)
      ->With('estadistica_D5', $esp_Gast)
      ->With('estadistica_D6', $esp_Derm)
      ->With('estadistica_D7', $esp_Card)
      ->With('estadistica_D8', $esp_Trau)
      ->With('estadistica_D9', $esp_Onco)
      ->With('estadistica_D10', $esp_Gine)
      ;
    }
    return view('homeBloqueo');
  }

  public function listarReservas(){
    if (Auth::user()->cargo == 'Director') {
      $solicitud_atencion = new SolicitudAtenciones();
      $solicitud_atenciones = $solicitud_atencion->get();
      return view('userDirector/listarReservas' , compact('solicitud_atenciones'));
    }
    return view('homeBloqueo');
  }































}
