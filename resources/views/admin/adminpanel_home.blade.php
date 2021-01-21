@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#2b00a4; color:white;">
	  <h1 class="display-4">¡Bienvenido al Panel de Administración de Fisioweb!</h1>
	  <p class="lead">Aquí puedes modificar los tratamientos disponibles, los trabajadores dados de alta, revisar citas de clientes o incluso cancelarlas.</p>
	  <hr class="my-4">
	  <p>Además, sí lo deseas puedes volver a la vista normal de la página web.</p>
	  <p class="lead">
		<a class="btn btn-dark btn-lg" href="/Inicio" role="button">Volver a la vista normal</a>
	  </p>
	</div>
	
@stop