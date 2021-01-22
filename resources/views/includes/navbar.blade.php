		<!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR -->
	
		
		<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; font-family:'Nobile'; border-bottom:1px solid #000">
		  <a class="navbar-brand" style="color:white" href="{{route('inicio')}}">Clínicas Fisioweb</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" style="color:white" href="{{route('inicio')}}">Inicio</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" style="color:white" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Tratamientos
				</a>
				@php 
				$tratamientos = DB::table('categorias')->get(); 
				@endphp
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				 @foreach ($tratamientos as $tratamiento)
				  <a class="dropdown-item" href="{{route('Tratamientos')}}">{{$tratamiento->nombre}}</a>
				  @endforeach
				</div>
			  </li>
			  <li class="nav-item">
			  <a class="nav-link" style="color:white" href="{{route('infoProfesionales')}}">Profesionales</a>
			  </li>
			</ul>
			
			
			@auth <!-- Utilizar esta parte unicamente para cuando el usuario este logueado como admin-->

				@if (Auth::user()->rol == "admin")
				
				<ul class="navbar-nav mr-auto" style="margin-left:35%;">
					<li>
					<a class="navbar-item" href="{{route('adminPanel')}}" style="padding-right:30px;">Panel de administración</a>
					</li>
					<li>
					<a class="navbar-item" href="{{route('logout')}}">Cerrar sesión</a>
				  </li>
				</ul>
				
				@else
				
				<ul class="navbar-nav mr-auto" style="margin-left:60%">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" style="color:white" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Bienvenido, {{ Auth::user()->nombre }}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					  <a class="dropdown-item" href="{{route('profile')}}">Perfil</a>
					  <a class="dropdown-item" href="{{route('logout')}}">Cerrar sesión</a>
					</div>
				  </li>
				</ul>
				
				@endif

			@endauth

			@guest <!-- Esta parte solo para visitantes -->
			<ul class="navbar-nav mr-auto" style="margin-left:70%">
			<li class="nav-item">
				<a class="nav-link" style="color:white" href="{{route('login')}}">Iniciar sesión</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" style="color:white" href="{{route('register')}}">Registrarse</a>
			</li>
			<li>
			</ul>
			@endguest
			
		  </div>
		</nav>

		<!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR -->