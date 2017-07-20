@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userPaciente/menuPaciente')
</div>



<div id="TituloFuncion" >
	Ver Mis Reservas
	</div>


<br><br>
<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					{{ Form::open(['url' => '/Paciente/verPaciente','class'=>'form-style-9', 'method' =>'post' ]) }}

					<tr>
						<td class="listado">
							Rut:
						</td>
						<td class="listado">
							{{ Form::text('rut') }} -
							{!! Form::input('text','digitoVerificador', null, array('required'=>'required','class' => 'digitoVerificador','maxlength' => 1 )) !!}
						</td>
						<td class="listado">
							<span class="error">  {{ $errors->first('rut') }}  </span>
							<span class="error">  {{ $errors->first('digitoVerificador') }}  </span>
							<span class="error">{{$mensaje2}}</span>
						</td>
					</tr>
					<tr>
						<td class="listado"></td>
						<td class="listado"></td>
						<td class="listado">
							{{ Form::submit("Buscar") }}
							{{ Form::close() }}
						</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
</article>





@endsection
