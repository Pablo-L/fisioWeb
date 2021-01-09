		<!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR -->
	
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">Clínicas Fisioweb</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Tratamientos</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Action</a>
				  <a class="dropdown-item" href="#">Another action</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="#">Something else here</a>
				</div>
			  </li>
			  <li class="nav-item">
				<a class="nav-link disabled" href="#">En un futuro...</a>
			  </li>
			  <li class=nav-item>
			  <a class="nav-link" href="#">Reservar cita</a>
			  </li>
			</ul>
			
			
			@auth <!-- Utilizar esta parte unicamente para cuando el usuario este logueado-->
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			</form>
			@endauth

			@guest <!-- Esta parte solo para visitantes -->
			<ul class="navbar-nav mr-auto" style="margin-left:60%">
			<li class="nav-item">
				<a class="nav-link" href="#">Iniciar sesión</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Registrarse</a>
			</li>
			<li>
			</ul>
			@endguest
			
		  </div>
		</nav>

		<!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR -->