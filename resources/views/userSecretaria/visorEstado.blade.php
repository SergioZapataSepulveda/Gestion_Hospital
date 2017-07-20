@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')



<div id="menuUsuarios" >
	@include('userSecretaria/menuSecretaria')
</div>



<div id="TituloFuncion" >
	Gestionar Atenciones
	</div>

<br>
<article>
	<div class="col-md-12">
			{{ $resultado }}
	</div>
</article>





@endsection
