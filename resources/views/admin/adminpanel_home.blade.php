@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; color:white; font-family:'Nobile';">
	  <h1 class="display-4">¡Bienvenido al Panel de Administración de Fisioweb!</h1>
	  <p class="lead">Aquí puedes modificar los tratamientos disponibles, los trabajadores dados de alta, revisar citas de clientes o incluso cancelarlas.</p>
	  <hr class="my-4"style="background-color:white">
	  <p>Además, sí lo deseas puedes volver a la vista normal de la página web.</p>
	  <p class="lead">
		<a class="btn btn-dark btn-lg"  href="/Inicio" role="button">Volver a la vista normal</a>
	  </p>
	</div>
	
@stop