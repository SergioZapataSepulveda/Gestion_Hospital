@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userSecretaria/menuSecretaria')
</div>



<div id="TituloFuncion" >
	Lista de Medicos
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
							<th class="listado">Fecha Contratacion</th>
							<th class="listado">Especialidad</th>
							<th class="listado">Valor Consulta</th>
						</tr>
					</thead>
					<tbody>
						@foreach($solicitud_medicos as $solicitud_medicos)
						<tr class="odd gradeX">
							<td class="listado">
								{{ $solicitud_medicos->id }}
							</td>
							<td class="listado">
								{{ $solicitud_medicos->rut }}
							</td>
							<td class="listado">
								{{ $solicitud_medicos->nombre_completo }}
							</td>
							<td class="listado">
								{{ $solicitud_medicos->fecha_contratacion }}
							</td>
							<td class="listado">
								{{ $solicitud_medicos->especialidad }}
							</td>
							<td class="listado">
								$ {{ $solicitud_medicos->valor_consulta }}
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
