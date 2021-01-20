@extends ('recepcionista/layout')

@section ('contenido')

<div style="background-color: #a7c5ed;" class="table-responsive">
	<table class="table">
		<tr>
			<td style="vertical-align: top;">
				<table class="table table-striped" style="background-color: #B3CDEF">
					<th colspan="4">Usuarios</th>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Email</td>
						<td></td>
					</tr>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->nombre}} {{$user->apellidos}}</td>
						<td>{{$user->email}}</td>
						<td><input class="btn" type="button" name="SelectUsuario" value="Seleccionar usuario"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top; margin-right: 5px;">
				<table class="table table-striped" style="background-color: #B3CDEF">
					<th colspan="4">Tratamientos</th>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Tarifa</td>
						<td></td>
					</tr>
					@foreach($tratamientos as $tratamiento)
					<tr>
						<td>{{$tratamiento->id}}</td>
						<td>{{$tratamiento->nombre}}</td>
						<td>{{$tratamiento->tarifa}} €</td>
						<td><input class="btn" type="button" name="SelectTratamiento" value="Seleccionar tratamiento"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top;">
				<form method="POST" action="{{ route('recepcionista_reserva') }}">
					@csrf
					<table class="table" style="background-color: #B3CDEF">
						<tr>
							<td style="vertical-align: bottom;">
								<label>Usuario</label>
							</td>
							<td style="vertical-align: bottom;">
								<label>Tratamiento</label>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<input type="" name="user" disabled>
							</td>
							<td style="vertical-align: top;">
								<input type="" name="tratamiento" disabled>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input class="btn" type="button" name="Confirmar" value="Confirmar cita">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</div>

{{-- $(".btnPilih").each(function(){
    $(this).click(function(){
    var nik = $(this).data("nik");
    document.getElementById("nik").value = nik;
    })
  });
--}}
@stop