@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>



<div id="TituloFuncion" >
	Modificar Medico
</div>

<br>

<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					{{ Form::open(['url' => '/Administrador/modificarMedico','class'=>'form-style-9', 'method' =>'post' ]) }}

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
							Fecha Contratacion:
						</td>
						<td class="listado">
							{{ Form::date('fecha_contratacion') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('fecha_contratacion') }}  </span>
						</td>
					</tr>



					<tr>
						<td class="listado">
							Especialidad:
						</td>
						<td class="listado">
							{{ Form::text('especialidad') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('especialidad') }}  </span>
						</td>
					</tr>



					<tr>
						<td class="listado">
							Valor Consulta:
						</td>
						<td class="listado">
							{{ Form::number('valor_consulta') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('valor_consulta') }}  </span>
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
