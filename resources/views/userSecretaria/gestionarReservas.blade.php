@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userSecretaria/menuSecretaria')
</div>



<div id="TituloFuncion" >
	Gestionar Pacientes
	</div>

<div id="botonCrear" >
<a href="/Secretaria/agendarAtencion" class="btn">Crear Reserva</a>
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
				      <th class="listado">Fecha Atencion</th>
				      <th class="listado">Paciente Atendido</th>
				      <th class="listado">Medico a Cargo</th>
				      <th class="listado">Estado</th>
			      </tr>
					</thead>
					<tbody>
						@foreach($solicitud_atenciones as $solicitud_atenciones)
						<tr class="odd gradeX">
							<td>{{ $solicitud_atenciones->id }}</td>
							<td>{{ $solicitud_atenciones->fecha_hora_atencion }}</td>
							<td>{{ $solicitud_atenciones->paciente_atendido }}</td>
							<td>{{ $solicitud_atenciones->medico_a_cargo }}</td>
							<td>{{ $solicitud_atenciones->estado }}</td>
							<td>
									<a href="/Secretaria/modificarAtencion?id={{$solicitud_atenciones->id}}&
													fecha_hora_atencion={{$solicitud_atenciones->fecha_hora_atencion}}&
													paciente_atendido={{$solicitud_atenciones->paciente_atendido}}&
													medico_a_cargo={{$solicitud_atenciones->medico_a_cargo}}&
													estado={{$solicitud_atenciones->estado}}" >Modificar</a>

							</td>
							<td>
										<a href="{{ url('/Secretaria/eliminarAtencion', [$solicitud_atenciones->id]) }}" method="post">Eliminar</a>



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
