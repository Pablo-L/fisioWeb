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
			<div class="carousel-item active">
			  <img class="d-block w-100" src="imagenes/carrusel1.jpg" height=750px> <!-- Imagen 1 del carrusel -->
				  <div class="carousel-caption d-none d-md-block">
					<h5>Clínicas Fisioweb</h5>
					<p>Con tratamientos para todo tipo de problemas fisiológicos.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel2.jpg" height=750px> <!-- Imagen 2 del carrusel -->
			  	  <div class="carousel-caption d-none d-md-block">
					<h5>Tratamientos de aromaterapia</h5>
					<p>Realizamos masajes y tratamientos con aromaterapia para tratar lesiones causadas por el estrés.</p>
				  </div>
			</div>
			<div class="carousel-item">
			  <img class="d-block w-100" src="imagenes/carrusel3.jpg" height=750px> <!-- Imagen 3 del carrusel -->
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

@stop
