@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>



<div id="TituloFuncion" >
	Crear Usuario
</div>

<br>

<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					{{ Form::open(['url' => '/Administrador/crearUsuario','class'=>'form-style-9', 'method' =>'post' ]) }}


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
							<span class="error">  {{$mensaje2}}</span>
						</td>
					</tr>



					<tr>
						<td class="listado">
							Password:
						</td>
						<td class="listado">
							{{ Form::password('password') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('password') }}  </span>
						</td>
					</tr>



					<tr>
						<td class="listado">
							Nombre Completo:
						</td>
						<td class="listado">
							{{ Form::text('nombre') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('nombre') }}
						</td>
					</tr>



					<tr>
						<td class="listado">
							Correo:
						</td>
						<td class="listado">
							{{ Form::text('email') }}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('email') }}  </span>
						</td>
					</tr>




					<tr>
						<td class="listado">
							Cargo:
						</td>
						<td class="listado">
							{{ Form::select('cargo', 
							[ 'Secretaria' => 'Secretaria',
							'Administrador' => 'Administrador',
							'Director' => 'Director']) }}
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
