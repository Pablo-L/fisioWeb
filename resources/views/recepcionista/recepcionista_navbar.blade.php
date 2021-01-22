<!DOCTYPE html>
<html>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; font-family:'Nobile'; border-bottom:1px solid #000">
		  <a class="navbar-brand" style="color:white" href="{{route('recepcionista')}}">Panel de Recepcionista</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 1px solid #000; border-left: 2px solid #000; color:white" href="{{route('recepcionista_citas')}}">Citas</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 1px solid #000;  border-left: 2px solid #000; color:white" href="{{route('recepcionista_libres')}}">Administrar dias libres</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 2px solid #000; border-left: 2px solid #000; color:white" href="/logout">Cerrar sesión</a>
			  </li>
			</ul>
		 </div>
		</nav>
	</body>
</html>

