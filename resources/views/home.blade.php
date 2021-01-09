<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    </head>
	
	
		<body>
		<nav class="navbar navbar-expand-xs navbar-light bg-light">
		  <a class="navbar-brand" href="#">Navbar</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			  <li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			  </li>
			</ul>
		  </div>
		</nav>




		
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->
		
		<div id="carouselHome" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselHome" data-slide-to="0" class="active"></li>
			<li data-target="#carouselHome" data-slide-to="1" ></li>
			<li data-target="#carouselHome" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100" src="imagenes/carrusel1.jpg" alt="First slide" height=550px> <!-- Imagen 1 del carrusel -->
				  <div class="carousel-caption d-none d-md-block">
					<h5>Clínicas Fisioweb</h5>
					<p>Con tratamientos para todo tipo de problemas fisiológicos.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel2.jpg" alt="Second slide" height=550px> <!-- Imagen 2 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block">
					<h5>Tratamientos de aromaterapia</h5>
					<p>Realizamos masajes y tratamientos con aromaterapia para tratar lesiones causadas por el estrés.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel3.jpg" alt="Third slide" height=550px> <!-- Imagen 3 del carrusel -->
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
		
		<div>
		<h5> Texto aleatorio</h5>
		</div>

		
		@auth
		<!-- Utilizar esta parte unicamente para cuando el usuario este logueado-->
		@endauth

		@guest
		<!-- Esta parte solo para visitantes -->
		@endguest

		</body>
</html>
