<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('home', function () {
    return view('home');
});



Route::get('/reg', function () {
    return view('auth\register');
});




// :::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::PACIENTE


Route::get('/Paciente', "Controller@formIngresarRut");
Route::post('/Paciente/verPaciente', "Controller@listarPorRut");






// :::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::SECRETARIA


Route::get('/Secretaria/listarPacientes', "HomeController@listarPacientes");
Route::get('/Secretaria/listarMedicos', "HomeController@listarMedicos");
Route::get('/Secretaria/gestionarReservas', "HomeController@gestionarReservas");

Route::get('/Secretaria/agendarAtencion', "HomeController@formAgendarAtencion");
Route::post('/Secretaria/agendarAtencion', "HomeController@agendarAtencion");

Route::get('/Secretaria/modificarAtencion', "HomeController@formModificarAtencion");
Route::post('/Secretaria/modificarAtencion', "HomeController@modificarAtencion");

Route::get('/Secretaria/eliminarAtencion/{id}', "HomeController@eliminarAtencion");






// :::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::ADMINISTRADOR

Route::get('/Administrador/crearPaciente', "HomeController@formCrearPaciente");
Route::post('/Administrador/crearPaciente', "HomeController@crearPaciente");

Route::get('/Administrador/modificarPaciente', "HomeController@formModificarPaciente");
Route::post('/Administrador/modificarPaciente', "HomeController@modificarPaciente");

Route::get('/Administrador/eliminarPaciente/{id}', "HomeController@eliminarPaciente");

Route::get('/Administrador/gestionarPacientes', "HomeController@gestionarPacientes");





Route::get('/Administrador/crearMedico', "HomeController@formCrearMedico");
Route::post('/Administrador/crearMedico', "HomeController@crearMedico");

Route::get('/Administrador/modificarMedico', "HomeController@formModificarMedico");
Route::post('/Administrador/modificarMedico', "HomeController@modificarMedico");

Route::get('/Administrador/eliminarMedico/{id}', "HomeController@eliminarMedico");

Route::get('/Administrador/gestionarMedicos', "HomeController@gestionarMedicos");





Route::get('/Administrador/crearUsuario', "HomeController@formCrearUsuario");
Route::post('/Administrador/crearUsuario', "HomeController@crearUsuario");

Route::get('/Administrador/modificarUsuario', "HomeController@formModificarUsuario");
Route::post('/Administrador/modificarUsuario', "HomeController@modificarUsuario");

Route::get('/Administrador/eliminarUsuario/{id}', "HomeController@eliminarUsuario");

Route::get('/Administrador/gestionarUsuarios', "HomeController@gestionarUsuarios");






// :::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::DIRECTOR

Route::get('/Director/estadisticasMensuales', "HomeController@estadisticasMensuales");
Route::get('/Director/listarPacientes', "HomeController@listarPacientes");
Route::get('/Director/listarMedicos', "HomeController@listarMedicos");
Route::get('/Director/listarReservas', "HomeController@listarReservas");

Route::get('/Paciente/listarAtenciones', function () {
    return view('/userPaciente/listarAtenciones');
});




Auth::routes();
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
