@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#a7c5ed; border-top: 1px solid #000; border-bottom: 1px solid #000;">
	  <button type="button" class="btn btn-dark" style="margin-right:2px" data-toggle="modal" data-target="#createTratamiento">
				  Dar de alta trabajador
	  </button>
	
		<table class="table table-bordered table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">DNI</th>
			  <th scope="col">Nombre y Apellidos</th>
			  <th scope="col">Edad</th>
			  <th scope="col">Teléfono</th>
			  <th scope="col">Email</th>
			  <th scope="col">Sexo</th>
			  <th scope="col">NºCuenta</th>
			  <th scope="col">Modificar</th>
			  <th scope="col">Eliminar</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  @foreach ($trabajadores as $trabajador)
			<tr>
			  <td>{{$trabajador->DNI}}</td>
			  <td>{{$trabajador->nombre}}</td>
			  <td>{{$trabajador->edad}}</td>
			  <td>{{$trabajador->telefono}}</td>
			  <td>{{$trabajador->email}}</td>
			  <td>{{$trabajador->sexo}}</td>
			  <td>{{$trabajador->numero_cuenta}}</td>
			  <td><type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modificarTrabajador{{$trabajador->DNI}}">Modificar</button></td>
			  <td><type="button" class="btn btn-secondary" data-toggle="modal" data-target="#eliminarTrabajador{{$trabajador->DNI}}">Eliminar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
	</div>
	
@stop