@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>



<div id="TituloFuncion" >
	Gestionar Medicos
	</div>

<div id="botonCrear" >
<a href="/Administrador/crearMedico" class="btn">Ingresar Medico</a>
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
				      <th class="listado">Rut</th>
				      <th class="listado">Nombre</th>
				      <th class="listado">Fecha Contratacion</th>
				      <th class="listado">Especialidad</th>
				      <th class="listado">Valor_consulta</th>
			      </tr>
					</thead>
					<tbody>
						@foreach($listado_Medicos as $listado_Medicos)
						<tr class="odd gradeX">
							<td class="listado">{{ $listado_Medicos->id }}</td>
				      <td class="listado">{{ $listado_Medicos->rut }}</td>
				      <td class="listado">{{ $listado_Medicos->nombre_completo }}</td>
				      <td class="listado">{{ $listado_Medicos->fecha_contratacion }}</td>
				      <td class="listado">{{ $listado_Medicos->especialidad }}</td>
				      <td class="listado">{{ $listado_Medicos->valor_consulta }}</td>
							<td>
									<a href="/Administrador/modificarMedico?id={{ $listado_Medicos->id }}&
																		     								 rut={{ $listado_Medicos->rut }}&
													   								 nombre_completo={{ $listado_Medicos->nombre_completo }}&
																			    fecha_contratacion={{ $listado_Medicos->fecha_contratacion }}&
													      		      	 		especialidad={{ $listado_Medicos->especialidad }}&
													    				        valor_consulta={{ $listado_Medicos->valor_consulta }}" >Modificar</a>

							</td>
							<td>
										<a href="{{ url('/Administrador/eliminarMedico', [$listado_Medicos->id]) }}" method="post">Eliminar</a>
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
