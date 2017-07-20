@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')



<div id="menuUsuarios" >
	@include('userPaciente/menuPaciente')
</div>



<div id="TituloFuncion" >
	Reservas de Paciente
</div>


<div class="holaPaciente">
@foreach($lista_paciente as $lista_paciente)
Hola <strong>{{ $lista_paciente->nombre_completo }}</strong>, este es el listado de todas tus reservas 	<br><br>
Tu Rut es 	<strong>{{$mensaje1}} - {{$mensaje3}}</strong>
@endforeach
</div>


<br><br>
<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">

				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th class="listado">Fecha Atencion</th>
							<th class="listado">Rut Medico</th>
							<th class="listado">Nombre Medico</th>
							<th class="listado">Especialidad</th>
							<th class="listado">Estado</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listas_Unidas as $listas_Unidas)
						<tr class="odd gradeX">
							<td>{{ $listas_Unidas->fecha_hora_atencion }}</td>
							<td>{{ $listas_Unidas->medico_a_cargo }} </td>
							<td>{{ $listas_Unidas->nombre_completo }} </td>
							<td>{{ $listas_Unidas->especialidad }} </td>
							<td>{{ $listas_Unidas->estado }} </td>
						</tr>
						@endforeach

					</tbody>
				</table>
				@if(count($listas_Unidas) == 0)
				No hay Reservas Registradas con el Rut Consultado
				@else
				@endif
			</div>
		</div>
	</div>
</article>





@endsection
