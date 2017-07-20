@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>



<div id="TituloFuncion" >
	Modificar Paciente
</div>

<br>

<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					{{ Form::open(['url' => '/Administrador/modificarPaciente','class'=>'form-style-9', 'method' =>'post' ]) }}


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
							Rut:
						</td>
						<td class="listado">
							{{ Form::text('rut') }} -
							{!! Form::input('text','digitoVerificador', null, array('class' => 'digitoVerificador','maxlength' => 1 )) !!}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('rut') }}  </span>
							<span class="error">  {{ $errors->first('digitoVerificador') }}  </span>
							<span class="error">{{$mensaje2}}</span>
						</td>
					</tr>


					<tr>
						<td class="listado">
							Nombre Completo:
						</td>
						<td class="listado">
							{{ Form::text('nombre_completo') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('nombre_completo') }}
						</td>
					</tr>


					<tr>
						<td class="listado">
							Fecha Nacimiento:
						</td>
						<td class="listado">
							{{ Form::date('fecha_nacimiento') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('fecha_nacimiento') }}  </span>
						</td>
					</tr>


					<tr>
						<td class="listado">
							Sexo:
						</td>
						<td class="listado">
							{{ Form::select('sexo', [ 'Masculino' => 'Masculino',
													  'Femenino' => 'Femenino ',
													  'Otros' => 'Otros'])
							}}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('sexo') }}  </span>
						</td>
					</tr>


					<tr>
						<td class="listado">
							Direccion:
						</td>
						<td class="listado">
							{{ Form::text('direccion') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('direccion') }}  </span>
						</td>
					</tr>


					<tr>
						<td class="listado">
							Telefono:
						</td>
						<td class="listado">
							{{ Form::number('telefono') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('telefono') }}  </span>
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
