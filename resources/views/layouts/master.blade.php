<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('titulo')
	</title>
	<!-- <link rel="stylesheet" type="text/css"
	href="/css/app.css"> -->
	<link rel="stylesheet" type="text/css" href="/css/estilos.css">
	<link href="img/favicon.ico" rel="icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../imgenes/favicon.ico">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

</head>



<body>

	<div>
		@include('MP_banner')
	</div>

	<div>
		@include('MP_navegacion')
	</div>


	<div>
		@yield('contenido')
	</div>



	<div>
		<br><br><br><br><br><br><br><br>
	</div>


	@include('MP_footer')








</body>
</html>
