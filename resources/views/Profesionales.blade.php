@extends ('layout')

@section('contenido')

<div class="card-columns">

	@php $num = 0; $imgstring =""; @endphp
	

	@foreach ($trabajadores as $trabajador)
	
	@php 
	$num++;
	if($trabajador->sexo == "H")
	{
		$imgstring = "trabajador" . $num;
	}
	else
	{
		$imgstring = "trabajadora" . $num;
	}
	@endphp
	<div class="card">
    <img class="card-img-top" src="imagenes/{{$imgstring}}.jpg" alt="Imagen del/de la emprendedor/a">
    <div class="card-body">
      <h5 class="card-title text-center">{{$trabajador->nombre}}</h5>
      <p class="card-text">Persona trabajadora, brillante y con un gran futuro por delante. Su gran vocación por la fisioterapía le ha llevado a trabajar con nosotros en Fisioweb y a desarrollar su carrera profesional creciendo poco a poco a nuestro lado.</p>
      <p class="card-text"><small class="text-muted">Trabajando con nosotros desde hace {{rand(1,14)}} años.</small></p>
    </div>
  </div>
	@endforeach
</div>

<div class=jumbotron></div>

@stop
