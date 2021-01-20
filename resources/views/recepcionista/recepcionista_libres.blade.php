@extends ('recepcionista/layout')

@section ('contenido')

<div class="responsive-table" style="background-color: #a7c5ed;">
	<table class="table">
		<tr>
			<td>
				<table>
					<th>Festivos existentes</th>
					<tr>
						<td>Dia</td>
						<td>Motivo</td>
						<td></td>
					</tr>
					@foreach($dias as $dia)
					<tr>
						<td>{{$dia->dia}}</td>
						<td>{{$dia->motivo}}</td>
						<td><input class="btn" type="button" name="DeleteDia" value="Eliminar"></td>
					</tr>
					@endforeach
				</table>
			</td>
			<td>
				<form method="POST" action="{{ route('recepcionista_diaLibre') }}">
					<table>
						<th>Nuevo dia libre</th>
						<tr>
							<td style="vertical-align: bottom;">
								<label>Dia</label>
							</td>
							<td style="vertical-align: bottom;">
								<label>Motivo</label>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<input type="date" name="dia">
							</td>
							<td style="vertical-align: top;">
								<input type="" name="motivo">
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: center;">
								<input class="btn" type="button" name="AddDay" value="Añadir día">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</div>

@stop