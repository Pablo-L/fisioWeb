@extends ('layout')

@section('contenido')

<div class="card-group">
	@foreach ($tratamientos as $tratamiento)
	
	<div class="card">
    <img class="card-img-top rounded" src="imagenes\{{$tratamiento->nombre}}.jpg" alt="Card image cap" style="max-height: 50%;">
    <div class="card-body" style="max-height: 40%;">
      <h5 class="card-title text-center">{{$tratamiento->nombre}}</h5>
      <p class="card-text">{{$tratamiento->descripcion}}</p>
    </div>
	</div>
	@endforeach
</div>

@stop
