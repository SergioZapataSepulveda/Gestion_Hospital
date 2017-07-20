@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>



<div id="TituloFuncion" >
	Gestionar Pacientes
	</div>

<div id="botonCrear" >
<a href="/Administrador/crearPaciente" class="btn">Ingresar Paciente</a>
</div>
<br><br>
<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
				      <th class="listado">Id</th>
				      <th class="listado">Rut</th>
				      <th class="listado">Nombre Completo</th>
				      <th class="listado">Fecha Nacimiento</th>
							<th class="listado">Sexo</th>
							<th class="listado">Dirección</th>
				      <th class="listado">Telefono</th>
			      </tr>
					</thead>
					<tbody>
						@foreach($solicitud_pacientes as $solicitud_pacientes)
						<tr class="odd gradeX">
							<td>{{ $solicitud_pacientes->id }}</td>
							<td>{{ $solicitud_pacientes->rut }}</td>
							<td>{{ $solicitud_pacientes->nombre_completo }}</td>
							<td>{{ $solicitud_pacientes->fecha_nacimiento }}</td>
							<td>{{ $solicitud_pacientes->sexo }}</td>
							<!--  Comando para desemcriptar direccion desde la base de datos -->
							<td>{{decrypt($solicitud_pacientes->direccion)}}</td>
							<td>{{ $solicitud_pacientes->telefono }}</td>
							<td>
									<a href="/Administrador/modificarPaciente?id={{$solicitud_pacientes->id}}&
													rut={{ $solicitud_pacientes->rut }}&
													nombre_completo={{ $solicitud_pacientes->nombre_completo }}&
													fecha_nacimiento={{ $solicitud_pacientes->fecha_nacimiento }}&
													sexo={{ $solicitud_pacientes->sexo }}&
													direccion={{decrypt($solicitud_pacientes->direccion)}}&
													telefono={{$solicitud_pacientes->telefono}}" >Modificar</a>

							</td>
							<td>
										<a href="{{ url('/Administrador/eliminarPaciente', [$solicitud_pacientes->id]) }}" method="post">Eliminar</a>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>





@endsection
