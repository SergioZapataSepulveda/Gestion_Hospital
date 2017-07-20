


<header id="header">
  <div class="container">

    <!-- <div id="logo" class="pull-left">
    <a href="index.html"><img src="imgenes/logo1.PNG" alt="" title="" /></img></a>
    <svg viewBox="-20" ></svg>
  </div> -->


  <ul class="nav-menu">
    <li><a href="http://127.0.0.1:8000/Paciente">Pacientes</a></li>
    <li><a href="http://127.0.0.1:8000/Secretaria/gestionarReservas">Secretarias</a></li>
    <li><a href="http://127.0.0.1:8000/Administrador/gestionarPacientes">Administrador</a></li>
    <li><a href="http://127.0.0.1:8000/Director/estadisticasMensuales">Director</a></li>
  </li>
</ul>
</div>
</header>

<div class="usuarioActivo">
  @if (Auth::guest())
  <a href="{{ route('login') }}">Ingresar</a>
  <a>::</a>
  <a href="{{ route('register') }}">Registrarse</a>
  @else
  Hola  <strong>{{ Auth::user()->nombre }} </strong> / {{ Auth::user()->cargo}}<span class="caret"></span>
  <br>
  <a href ="{{ route('logout') }}" onclick ="event.preventDefault();
  document.getElementById('logout-form').submit();">
  Cerrar Sesión .
</a>

<form id ="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>

@endif
</div>
