<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </head>
		<body>
		
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
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			</form>
		  </div>
		</nav>

		<!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR --><!-- NAVBAR -->


		
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->
		
		<div id="carouselHome" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselHome" data-slide-to="0" class="active"></li>
			<li data-target="#carouselHome" data-slide-to="1" ></li>
			<li data-target="#carouselHome" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100 min-v-100" src="imagenes/carrusel1.jpg" height=680px> <!-- Imagen 1 del carrusel -->
				  <div class="carousel-caption d-none d-md-block">
					<h5>Clínicas Fisioweb</h5>
					<p>Con tratamientos para todo tipo de problemas fisiológicos.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel2.jpg" height=680px> <!-- Imagen 2 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block">
					<h5>Tratamientos de aromaterapia</h5>
					<p>Realizamos masajes y tratamientos con aromaterapia para tratar lesiones causadas por el estrés.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel3.jpg" height=680px> <!-- Imagen 3 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block">
					<h5>Rehabilitación completa con seguimiento del paciente</h5>
					<p>En clínicas Fisioweb damos un seguimiento completo a cualquier cliente durante los años posteriores a su rehabilitación.</p>
				  </div>
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->
		
		@auth
		<!-- Utilizar esta parte unicamente para cuando el usuario este logueado-->
		@endauth

		@guest
		<!-- Esta parte solo para visitantes -->
		@endguest

		</body>
		@include('footer')
</html>
