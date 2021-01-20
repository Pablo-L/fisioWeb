@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#a7c5ed; border-top: 1px solid #000; border-bottom: 1px solid #000;">
	  <h1 class="display-4">¡Bienvenido al Panel de Administración de Fisioweb!</h1>
	  <p class="lead">Aquí puedes modificar los tratamientos disponibles, los trabajadores dados de alta, revisar citas de clientes o incluso cancelarlas.</p>
	  <hr class="my-4">
	  <p>Además, sí lo deseas puedes volver a la vista normal de la página web.</p>
	  <p class="lead">
		<a class="btn btn-primary btn-lg" href="/Inicio" role="button">Volver a la vista normal</a>
	  </p>
	</div>
	
@stop