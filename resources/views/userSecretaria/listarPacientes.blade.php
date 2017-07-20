@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userSecretaria/menuSecretaria')
</div>



<div id="TituloFuncion" >
	Lista de Pacientes
</div>

<br>
<article>
	<div class="col-md-12">
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th class="listado">Id</th>
							<th class="listado">Rut</th>
							<th class="listado">Nombre</th>
							<th class="listado">Fecha Nacimiento</th>
							<th class="listado">Sexo</th>
							<th class="listado">Direccion</th>
							<th class="listado">Telefono</th>
						</tr>
					</thead>
					<tbody>
						@foreach($solicitud_pacientes as $solicitud_pacientes)
						<tr>
							<td class="listado">
								{{ $solicitud_pacientes->id }}
							</td>
							<td class="listado">
								{{ $solicitud_pacientes->rut }}
							</td>
							<td class="listado">
								{{ $solicitud_pacientes->nombre_completo }}
							</td>
							<td class="listado">
								{{ $solicitud_pacientes->fecha_nacimiento }}
							</td>
							<td class="listado">
								{{ $solicitud_pacientes->sexo }}
							</td>
							<td class="listado">
								{{ decrypt($solicitud_pacientes->direccion) }}
							</td>
							<td class="listado">
								{{ $solicitud_pacientes->telefono }}
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
