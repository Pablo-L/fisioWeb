<!DOCTYPE html>
<html>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #190061;">
		  <a class="navbar-brand" style="color:white" href="/adminPanel">Panel de Administración</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item ">
				<a class="nav-link" style="border-right: 1px solid #000; border-left: 1px solid #000; color:white" href="{{route('admin_resumen')}}">Resumen</a>
			  </li>
			  <li class="nav-item" >
				<a class="nav-link" style="border-right: 1px solid #000; border-left: 1px solid #000; color:white" href="{{route('admin_tratamientos')}}">Tratamientos</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 1px solid #000; color:white" href="{{route('admin_trabajadores')}}">Trabajadores</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 1px solid #000; color:white" href="{{route('admin_citas')}}">Citas</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 3px solid #000; color:white" href="{{route('admin_users')}}">Usuarios</a>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="border-right: 3px solid #000; color:white" href="/logout">Cerrar sesión</a>
			  </li>
			</ul>
		 </div>
		</nav>
	</body>
</html>

