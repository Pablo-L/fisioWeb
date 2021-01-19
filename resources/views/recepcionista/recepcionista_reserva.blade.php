@extends ('recepcionista/layout')

@section ('contenido')

<div style="background-color: #a7c5ed;">
	<table>
		<tr>
			<td style="vertical-align: top;" rowspan="3">
				<table>
					<th>Usuarios</th>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->email}}</td>
						<td>Seleccionar usuario</td>
					</tr>
					@endforeach
				</table>
			</td>
			<td style="vertical-align: top; margin-right: 5px;" rowspan="3">
				<table>
					<th>Tratamientos</th>
					@foreach($tratamientos as $tratamiento)
					<tr>
						<td>{{$tratamiento->id}}</td>
						<td>{{$tratamiento->nombre}}</td>
						<td>{{$tratamiento->tarifa}}</td>
						<td>Seleccionar tratamiento</td>
					</tr>
					@endforeach
				</table>
			</td>
			<form method="POST" action="{{ route('recepcionista_reserva') }}">
				@csrf
				<td style="vertical-align: bottom;">
					<label>Usuario</label>
				</td>
				<td style="vertical-align: bottom;">
					<label>Tratamiento</label>
				</td>
			</form>
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
				<input type="button" name="Confirmar">
			</td>
		</tr>
	</table>
</div>

@stop