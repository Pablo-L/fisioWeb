@extends ('admin/adminpanel_layout')

@section('contenido')

@if (\Session::has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			{!! \Session::get('success') !!}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		@endif
		
		@if (\Session::has('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			{!! \Session::get('error') !!}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
		@endif
		
<div class="jumbotron" style="background-color:transparent; color:white; font-family:'Nobile';">
	<table class="table table-bordered table-hover" style="background-color:#66646a">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col" class="text-center">Hora</th>
			  <th scope="col" class="text-center">Día</th>
			  <th scope="col" class="text-center">Cliente</th>
			  <th scope="col" class="text-center">Trabajador</th>
			  <th colspan=2" class="text-center">Acciones</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  @foreach ($citas as $cita)
			<tr>
			  <td class="text-center">{{$cita->hora}}</td>
			  <td class="text-center">{{$cita->dia}}</td>
			  <td class="text-center">
			  @php $nombrecliente = DB::table('users')->where('id', $cita->cliente_id)->value('nombre'); @endphp
			  {{$nombrecliente }}</td>
			  <td class="text-center">
			  @php $nombretrabajador = DB::table('trabajadores')->where('id', $cita->trabajador_id)->value('nombre'); @endphp
			  {{$nombretrabajador}}</td>
			  <td class="text-center"><type="button" class="btn btn-dark" data-toggle="modal" data-target="#eliminarCita{{$cita->id}}">Eliminar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
</div>		

<div style="background: url(/imagenes/black_lozenge.png) repeat 0 0; color:white; font-family:'Nobile';" class="table-responsive">
	<table  class="table table-bordered table-hover">
		<tr>
			<td style="vertical-align: top;">
				<table class="table table-bordered table-hover" style="background-color:#66646a">
				<thead class="thead-dark">
					<th colspan="4" class="text-center">Usuarios</th>
					<tr>
						<td class="text-center">Nombre</td>
						<td class="text-center">Email</td>
						<td></td>
					</tr>
					</thead>
					@foreach($users as $user)
					<tr>
						<td>{{$user->nombre}} {{$user->apellidos}}</td>
						<td>{{$user->email}}</td>
						<td><input class="btn" type="button" name="SelectUsuario" value="Seleccionar" onclick="usuario('{{$user->email}}', '{{$user->id}}' )"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top; margin-right: 5px;">
				<table class="table table-bordered table-hover" style="background-color:#66646a">
				<thead class="thead-dark">
					<th colspan="4" class="text-center">Trabajadores</th>
					<tr>
						<td class="text-center">Nombre</td>
						<td></td>
					</tr>
					</thead>
					@foreach($trabajadores as $trabajador)
					<tr>
						<td>{{$trabajador->nombre}}</td>
						<td><input class="btn" type="button" name="SelectTratamiento" value="Seleccionar" onclick="trabajador('{{$trabajador->nombre}}', '{{$trabajador->id}}' )"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top; margin-right: 5px;">
				<table class="table table-bordered table-hover" style="background-color:#66646a">
				<thead class="thead-dark">
					<th colspan="4" class="text-center">Tratamientos</th>
					<tr>
						<td class="text-center">Nombre</td>
						<td class="text-center">Tarifa</td>
						<td></td>
					</tr>
					</thead>
					@foreach($tratamientos as $tratamiento)
					<tr>
						<td>{{$tratamiento->nombre}}</td>
						<td>{{$tratamiento->tarifa}} €</td>
						<td><input class="btn" type="button" name="SelectTratamiento" value="Seleccionar" onclick="tratamiento('{{$tratamiento->nombre}}', '{{$tratamiento->id}}' )"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top;">
				<form method="POST" action="{{ route('admin_citas_create') }}">
					@csrf
					<table class="table table-bordered table-hover" style="background-color:#66646a">
						<tr>
							<td class="text-center" style="vertical-align: bottom;">
								<label>Usuario</label>
							</td>
							<td  class="text-center"style="vertical-align: bottom;">
								<label>Trabajador</label>
							</td>
							<td  class="text-center" style="vertical-align: bottom;">
								<label>Tratamiento</label>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<input type="hidden" name="idUser" id="idUser">
								<input type="text" name="user" id="emailUsuario" disabled>
							</td>
							<td style="vertical-align: top;">
								<input type="hidden" name="idTrabajador" id="idTrabajador">
								<input type="text" name="trabajador" id="nombreTrabajador" disabled>
							</td>
							<td style="vertical-align: top;">
								<input type="hidden" name="idTratamiento" id="idTratamiento">
								<input type="text" name="tratamiento" id="nombreTratamiento" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<input type="date" name="dia" id="dia" min="{{$min}}" required>
							</td>
							<td>
								<input type="time" name="hora" min="9" max="20" required>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input class="btn" type="submit" name="Confirmar" value="Confirmar cita">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</div>

@foreach ($citas as $cita)
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->
<form method = "post" action="{{ route('admin_citas_delete') }}">
@csrf
@method('POST')
	<div class="modal" id="eliminarCita{{$cita->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar cita</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color:black">
				¿Estás seguro de borrar esta cita?
				</div>
				<div class="modal-footer">
				<input type="hidden" name="idCita" value="{{$cita->id}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Eliminar cita</span></button>
			</div>
		</div>
	</div>
	</div>
</form>
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->

@endforeach

<script>
	function usuario(valor, valor2){
		document.getElementById("emailUsuario").value = valor;
		document.getElementById("idUser").value = valor2;
	}

	function trabajador(valor, valor2){
		document.getElementById("nombreTrabajador").value = valor;
		document.getElementById("idTrabajador").value = valor2;
	}

	function tratamiento(valor, valor2){
		document.getElementById("nombreTratamiento").value = valor;
		document.getElementById("idTratamiento").value = valor2;
	}
</script>
@stop