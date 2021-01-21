@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; color:white; font-family:'Nobile';">
	  <h1 class="display-4">Resumen de la Clínica Fisioweb</h1>
	  <p class="lead">Aquí se muestran datos respecto a la situación económica y a la web de la Clínica Fisioweb</p>
	  <hr class="my-4" style="background-color:white">
	  
		<ul class="list-unstyled">
		  <li class="media">
			<img class="mr-3" src="/imagenes/trabajadores.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">Número de trabajadores activos en nómina: {{$numero_Trabajadores}}</h5>
			</div>
		  </li>
		  <li class="media my-4">
			<img class="mr-3" src="/imagenes/user.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">Número de usuarios registrados en la web: {{$numero_usuarios}}</h5>
			</div>
		  </li>
		  <li class="media">
			<img class="mr-3" src="/imagenes/cliente.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">de los cuales son clientes: {{$numero_clientes}}</h5>
			</div>
		  </li>
		  <br>
		  <li class="media">
			<img class="mr-3" src="/imagenes/altas.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">
			  Número de altas este mes: {{$numero_altas_mes}}. 
			  @if($numero_altas_mes == $numero_altas_mespasado)
			  ¡Nos mantenemos con las mismas altas que el mes pasado! ¡Somos imparables!  
			  @elseif($numero_altas_mes > $numero_altas_mespasado)
			  ¡Eso son {{$numero_altas_mes - $numero_altas_mespasado}} altas más respecto al mes pasado!
			  @else
			  Eso son {{ $numero_altas_mespasado - $numero_altas_mes}} altas menos respecto al mes pasado, ¡pero no hay que perder la esperanza!
			  @endif
			  </h5>
			</div>
		  </li>
		  <br>
		   <li class="media">
			<img class="mr-3" src="/imagenes/reservas.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">
			  Número de reservas para este mes: {{$numero_reservas_mes}}. 
			  @if($numero_reservas_mes == $numero_reservas_mespasado && $numero_reservas_mes != 0)
			  ¡Nos mantenemos con las mismas reservas que el mes pasado! ¡Somos imparables!  
			  @elseif($numero_reservas_mes > $numero_reservas_mespasado)
			  ¡Eso son {{$numero_reservas_mes - $numero_reservas_mespasado}} reservas más respecto al mes pasado!
			  @elseif($numero_reservas_mes == 0 )
			  Parece que no tenemos ninguna reserva para este mes... tiene que tratarse de algún error.
			  @else
			  Eso son {{ $numero_reservas_mespasado - $numero_reservas_mes}} reservas menos respecto al mes pasado, ¡pero no hay que perder la esperanza!
			  @endif
			  </h5>
			</div>
		  </li><br>
		  <li class="media">
			<img class="mr-3" src="/imagenes/num_tratamientos.png" alt="">
			<div class="media-body">
			  <h5 class="mt-0 mb-1">Ahora mismo ofertamos un total de: {{$numtratamientos}} tratamientos. Los cuales pertenecen a las siguientes categorías:<br><br> 
			  @foreach ($nombrescategorias as $nombrecategoria) 
			  <li class="list-group-item" style="background-color:transparent;">{{$nombrecategoria}}</li>
			  @endforeach</h5>
			</div>
		  </li>
		  
		</ul>
	</div>
	
@stop