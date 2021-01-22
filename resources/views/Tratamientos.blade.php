@extends ('layout')

@section('contenido')

<div class="card-group">
	@if ($tratamientos->count() == 0)
	<div class="jumbotron" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; color:white; font-family:'Nobile';">
	<h5>No hay tratamientos en esta categoría.<h5> 
	<hr class="my-4" style="background-color:white">
	<p>Estamos trabajando en ello, contacte con el administrador de la página para más preguntas.</p>
	</div>
	@else
		
	@foreach ($tratamientos as $tratamiento)
	
	<div class="card" style="margin-left:20px; min-width:auto; max-width:25%;">
		<img class="card-img-top rounded" src="{{url('/imagenes/' .$tratamiento->nombre .'.jpg')}}" alt="Parece que no se encuentra la imagen de este tratamiento." style="max-height: 30%;">
		<div class="card-body" style="max-height: 60%;">
		  <h5 class="card-title text-center">{{$tratamiento->nombre}}</h5>
		  <hr class="my-4">
		  <h4 class="card-text text-center">{{$tratamiento->categoria}}</h4>
		  <hr class="my-4">
		  <p class="card-text">{{$tratamiento->descripcion}}</p>
		  <div class="text-center">
		<br><p class="badge badge-pill badge-info" style="max-width:40%;">Tarifa habitual: {{$tratamiento->tarifa}}€</p>
		</div>
		</div>	
	</div>
	@endforeach
</div>

<br><div class="d-flex justify-content-center text-center">
{!! $tratamientos->links() !!}
</div>

	@endif

@stop
