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
		@include('navbar')
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->
		
		<div id="carouselHome" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselHome" data-slide-to="0" class="active"></li>
			<li data-target="#carouselHome" data-slide-to="1" ></li>
			<li data-target="#carouselHome" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <img class="d-block w-100" src="imagenes/carrusel1.jpg" height=685px> <!-- Imagen 1 del carrusel -->
				  <div class="carousel-caption d-none d-md-block">
					<h5>Clínicas Fisioweb</h5>
					<p>Con tratamientos para todo tipo de problemas fisiológicos.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel2.jpg" height=685px> <!-- Imagen 2 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block">
					<h5>Tratamientos de aromaterapia</h5>
					<p>Realizamos masajes y tratamientos con aromaterapia para tratar lesiones causadas por el estrés.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel3.jpg" height=685px> <!-- Imagen 3 del carrusel -->
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
		</body>
		
		@include('footer')
</html>
