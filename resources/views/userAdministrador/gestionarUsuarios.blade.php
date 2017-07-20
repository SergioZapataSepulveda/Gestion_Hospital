@extends('layouts.master')

@section('titulo')
	Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userAdministrador/menuAdministrador')
</div>




<div id="TituloFuncion" >
	Gestionar Usuarios
	</div>

<div id="botonCrear" >
<a href="/Administrador/crearUsuario" class="btn">Ingresar Usuario</a>
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
				      <th class="listado">Nombre</th>
				      <th class="listado">Correo</th>
				      <th class="listado">Rut</th>
				      <th class="listado">Cargo</th>
			      </tr>
					</thead>
					<tbody>
						@foreach($listado_Usuarios as $listado_Usuarios)
						<tr class="odd gradeX">
							<td>{{ $listado_Usuarios->id }}</td>
							<td>{{ $listado_Usuarios->nombre }}</td>
							<td>{{ $listado_Usuarios->email }}</td>
							<td>{{ $listado_Usuarios->rut }}</td>
							<td>{{ $listado_Usuarios->cargo }}</td>
							<td>
								<a href="/Administrador/modificarUsuario?id={{ $listado_Usuarios->id }}&
																										 nombre={{ $listado_Usuarios->nombre }}&
																										  email={{ $listado_Usuarios->email }}&
																										    rut={{ $listado_Usuarios->rut }}&
																										  cargo={{ $listado_Usuarios->cargo }}" >Modificar</a>


								</td>
								<td>
									<a href="{{ url('/Administrador/eliminarUsuario', [$listado_Usuarios->id]) }}" method="post">Eliminar</a>
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
