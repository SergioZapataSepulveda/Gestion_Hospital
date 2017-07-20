@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userSecretaria/menuSecretaria')
</div>



<div id="TituloFuncion" >
	Modificar Atencion
</div>


<br>







<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					{{ Form::open(['url' => '/Secretaria/modificarAtencion','class'=>'form-style-9', 'method' =>'post' ]) }}

					<tr>
						<td class="listado">
							Id:
						</td>
						<td class="listado">
							{{ Form::text('id', null, array('disabled' => 'disabled')) }}
							{{ Form::hidden('id') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('id') }}  </span>
						</td>
					</tr>


					<tr>
						<td class="listado">
							Fecha de atencion:
						</td>
						<td class="listado">
							{{ Form::date('fecha_hora_atencion') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('fecha_hora_atencion') }}  </span>
						</td>
					</tr>

					<tr>
						<td class="listado">
							Paciente antendido:
						</td>
						<td class="listado">
							<select name="ddl_paciente" id="solicitud_pacientes" >
								@foreach($solicitud_pacientes as $solicitud_pacientes)
								<option value="{{ $solicitud_pacientes->rut}}"> {{ $solicitud_pacientes->rut}} ::: {{ $solicitud_pacientes->nombre_completo}} </option>
								@endforeach
							</select>
						</td>
						<td class="listado">
							<!-- <span class="error">  {{ $errors->first('paciente_atendido') }}  </span> -->
							Si necesita un Paciente que no esta en la lista, solicite su creacion con el Administrador
						</td>
					</tr>

					<tr>
						<td class="listado">
							Medico encargado:
						</td>
						<td class="listado">
							<select name="ddl_medicos" id="ddl_medicos" >
								@foreach($solicitud_medicos as $solicitud_medicos2)
								<option value="{{ $solicitud_medicos2->rut}}"> {{ $solicitud_medicos2->rut}} ::: {{ $solicitud_medicos2->nombre_completo}}  </option>
								@endforeach
							</select>
						</td>
						<td class="listado">
							<!-- <span class="error">  {{ $errors->first('medico_a_cargo') }}  </span> -->
							Si necesita un Medico que no esta en la lista, solicite su creacion con el Administrador
						</td>
					</tr>

					<tr>
						<td class="listado">
							Seleccione el estado de la Atencion :
						</td>
						<td class="listado">
							{{ Form::select('estado', [ 'agendada' => 'agendada',
							'confirmada' => 'confirmada',
							'anulada' => 'anulada ',
							'perdida' => 'perdida',
							'realizada' => 'realizada']) }}
						</td>
						<td class="listado">
						</td>
					</tr>

					<tr>
						<td class="listado"></td>
						<td class="listado"></td>
						<td class="listado">
							{{ Form::submit("Guardar") }}
							{{ Form::close() }}
						</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</article>






@endsection
