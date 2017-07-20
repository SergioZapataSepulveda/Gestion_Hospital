@extends('layouts.master')

@section('titulo')
Reserva de Hora
@endsection

@section('contenido')




<div id="menuUsuarios" >
	@include('userDirector/menuDirector')
</div>




<div id="TituloFuncion" >
	Estadisticas Internas
</div>

<br>
<br>
<br>


<article>
	<div class="col-md-12">
		<p class="TutuloEstadisticas">Estado de Atenciones Registradas</p>
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th style="width:20%">Tipo</th>
							<th style="width:20%">Cantidad</th>
							<th style="width:60%">Grafico (sobre el 100%)</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td style="width:20%">Agendada</td>
							<td>{{$estadistica_A1}}</td>
							<td><div style="width: {{$estadistica_A1/$estadistica_A0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Anulada</td>
							<td>{{$estadistica_A2}}</td>
							<td><div style="width: {{$estadistica_A2/$estadistica_A0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Confirmada</td>
							<td>{{$estadistica_A3}}</td>
							<td><div style="width: {{$estadistica_A3/$estadistica_A0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Perdida</td>
							<td>{{$estadistica_A4}}</td>
							<td><div style="width: {{$estadistica_A4/$estadistica_A0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Realizada</td>
							<td>{{$estadistica_A5}}</td>
							<td><div style="width: {{$estadistica_A5/$estadistica_A0*100}}%;" class="bar">:</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>


<br>
<br>
<br>


<article>
	<div class="col-md-12">
		<p class="TutuloEstadisticas">Genero de Pacientes</p>
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th style="width:20%">Genero</th>
							<th style="width:20%">Cantidad</th>
							<th style="width:60%">Grafico (sobre el 100%)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Mujeres</td>
							<td>{{$estadistica_B1}}</td>
							<td><div style="width: {{$estadistica_B1/$estadistica_B0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Hombres</td>
							<td>{{$estadistica_B2}}</td>
							<td><div style="width: {{$estadistica_B2/$estadistica_B0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Otros</td>
							<td>{{$estadistica_B3}}</td>
							<td><div style="width: {{$estadistica_B3/$estadistica_B0*100}}%;" class="bar">:</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>


<br>
<br>
<br>


<article>
	<div class="col-md-12">
		<p class="TutuloEstadisticas">Atenciones por Mes</p>
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th style="width:20%">Mes</th>
							<th style="width:20%">Cantidad</th>
							<th style="width:60%">Grafico (sobre el 100%)</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td style="width:20%">Enero</td>
							<td>{{$estadistica_C1}}</td>
							<td><div style="width: {{$estadistica_C1/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Febrero</td>
							<td>{{$estadistica_C2}}</td>
							<td><div style="width: {{$estadistica_C2/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Marzo</td>
							<td>{{$estadistica_C3}}</td>
							<td><div style="width: {{$estadistica_C3/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Abril</td>
							<td>{{$estadistica_C4}}</td>
							<td><div style="width: {{$estadistica_C4/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Mayo</td>
							<td>{{$estadistica_C5}}</td>
							<td><div style="width: {{$estadistica_C5/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Junio</td>
							<td>{{$estadistica_C6}}</td>
							<td><div style="width: {{$estadistica_C6/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>JuLio</td>
							<td>{{$estadistica_C7}}</td>
							<td><div style="width: {{$estadistica_C7/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Agosto</td>
							<td>{{$estadistica_C8}}</td>
							<td><div style="width: {{$estadistica_C8/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Septiembre</td>
							<td>{{$estadistica_C9}}</td>
							<td><div style="width: {{$estadistica_C9/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Octubre</td>
							<td>{{$estadistica_C10}}</td>
							<td><div style="width: {{$estadistica_C10/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Noviembre</td>
							<td>{{$estadistica_C11}}</td>
							<td><div style="width: {{$estadistica_C11/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Diciembre</td>
							<td>{{$estadistica_C12}}</td>
							<td><div style="width: {{$estadistica_C12/$estadistica_C0*100}}%;" class="bar">:</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>


<br>
<br>
<br>


<article>
	<div class="col-md-12">
		<p class="TutuloEstadisticas">Especialidades</p>
		<div class="card">
			<div class="table-flip-scroll">
				<table class="table table-striped table-bordered table-hover flip-content">
					<thead class="flip-header">
						<tr>
							<th style="width:20%">Genero</th>
							<th style="width:20%">Cantidad</th>
							<th style="width:60%">Grafico (sobre el 100%)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Diagnostico Medico</td>
							<td>{{$estadistica_D1}}</td>
							<td><div style="width: {{$estadistica_D1/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Psicología</td>
							<td>{{$estadistica_D2}}</td>
							<td><div style="width: {{$estadistica_D2/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Pediatría</td>
							<td>{{$estadistica_D3}}</td>
							<td><div style="width: {{$estadistica_D3/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Oftalmología</td>
							<td>{{$estadistica_D4}}</td>
							<td><div style="width: {{$estadistica_D4/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Gastroenterología</td>
							<td>{{$estadistica_D5}}</td>
							<td><div style="width: {{$estadistica_D5/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Dermatología</td>
							<td>{{$estadistica_D6}}</td>
							<td><div style="width: {{$estadistica_D6/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Cardiología</td>
							<td>{{$estadistica_D7}}</td>
							<td><div style="width: {{$estadistica_D7/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Traumatología</td>
							<td>{{$estadistica_D8}}</td>
							<td><div style="width: {{$estadistica_D8/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Oncología</td>
							<td>{{$estadistica_D9}}</td>
							<td><div style="width: {{$estadistica_D9/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
						<tr>
							<td>Ginecología</td>
							<td>{{$estadistica_D10}}</td>
							<td><div style="width: {{$estadistica_D10/$estadistica_D0*100}}%;" class="bar">:</div></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</article>



@endsection
