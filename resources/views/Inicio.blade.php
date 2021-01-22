@extends ('layout')

@section('contenido')
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->
		
		<div id="carouselHome" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselHome" data-slide-to="0" class="active"></li>
			<li data-target="#carouselHome" data-slide-to="1" ></li>
			<li data-target="#carouselHome" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
			<div class="carousel-item active" style="max-height:768px; min-width: auto;">
			  <img class="d-block w-100" src="imagenes/carrusel1.jpg"> <!-- Imagen 1 del carrusel -->
				  <div class="carousel-caption d-none d-md-block" style="color:black;">
					<h5>Clínicas Fisioweb</h5>
					<p>Nuestros especialistas te proporcionarán en todo momento un seguimiento.</p>
				  </div>
			</div>
			<div class="carousel-item" style="max-height:768px; min-width: auto;">
			  <img class="d-block w-100" src="imagenes/carrusel2.jpg"> <!-- Imagen 2 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block" style="color:black;">
					<h5>Tratamientos personalizados</h5>
					<p>Con tratamientos personalizados para cubrir todas tus necesidades.</p>
				  </div>
			</div>
			<div class="carousel-item" style="max-height:768px; min-width: auto;">
			  <img class="d-block w-100" src="imagenes/carrusel3.jpg"> <!-- Imagen 3 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block" style="color:black;">
					<h5>Rehabilitación completa con seguimiento del paciente</h5>
					<p>En clínicas Fisioweb damos un seguimiento completo a cualquier cliente durante los años posteriores a su rehabilitación.</p>
				  </div>
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previo</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Siguiente</span>
		  </a>
		</div>
		
		<!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL --><!-- CARRUSEL -->

@stop
