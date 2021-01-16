@extends ('layout')

@section('contenido')
		
	<h2>Listado de reservas</h2>
	<ul>
	@foreach ($reservas as $reserva)
		<li>{{$reserva->hora}}</li>
		<li>{{$reserva->dia}}</li>
		<li>{{$reserva->cliente_id}}</li>
	@endforeach
	</ul>

@stop
