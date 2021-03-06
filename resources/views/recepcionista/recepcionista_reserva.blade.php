@extends ('recepcionista/layout')

@section ('contenido')


@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('message', '') }}
    </div>
@endif

<div style="background: url(/imagenes/black_lozenge.png) repeat 0 0; color:white; font-family:'Nobile';" class="table-responsive">
	<table class="table">
		<tr>
			<td style="vertical-align: top;">
				<table class="table table-bordered table-hover" style="background-color:#66646a">
					<th colspan="4">Usuarios</th>
					<tr>
						<td>Nombre</td>
						<td>Email</td>
						<td></td>
					</tr>
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
					<th colspan="4">Trabajadores</th>
					<tr>
						<td>Nombre</td>
						<td></td>
					</tr>
					@foreach($trabajadores as $trabajador)
					<tr>
						<td>{{$trabajador->nombre}}</td>
						<td><input class="btn" type="button" name="SelectTratamiento" value="Seleccionar" onclick="trabajador('{{$trabajador->nombre}}', '{{$trabajador->DNI}}' )"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top; margin-right: 5px;">
				<table class="table table-bordered table-hover" style="background-color:#66646a">
					<th colspan="4">Tratamientos</th>
					<tr>
						<td>Nombre</td>
						<td>Tarifa</td>
						<td></td>
					</tr>
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
				<form method="POST" action="{{ route('recepcionista_reserva') }}">
					@csrf
					<table class="table table-bordered table-hover" style="background-color:#66646a">
						<tr>
							<td style="vertical-align: bottom;">
								<label>Usuario</label>
							</td>
							<td style="vertical-align: bottom;">
								<label>Trabajador</label>
							</td>
							<td style="vertical-align: bottom;">
								<label>Tratamiento</label>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<input type="hidden" name="idUser" id="idUser" required>
								<input type="text" name="user" id="emailUsuario" required>
							</td>
							<td style="vertical-align: top;">
								<input type="hidden" name="idTrabajador" id="idTrabajador" required>
								<input type="text" name="trabajador" id="nombreTrabajador" required>
							</td>
							<td style="vertical-align: top;">
								<input type="hidden" name="idTratamiento" id="idTratamiento" required>
								<input type="text" name="tratamiento" id="nombreTratamiento" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="date" name="dia" id="dia" min="{{$min}}" required>
							</td>
							<td>
								<input type="time" name="hora" id="hora" required>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input class="btn" type="submit" name="Confirmar" value="Confirmar cita" required>
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</div>

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