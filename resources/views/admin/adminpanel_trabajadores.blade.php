@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#2b00a4; color:white; font-family:'Nobile';">
	  <button type="button" class="btn btn-dark" style="margin-right:2px" data-toggle="modal" data-target="#createTrabajador">
				  Dar de alta trabajador
	  </button>
	
		<table class="table table-bordered table-hover" style="background-color:#66646a">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col" class="text-center">DNI</th>
			  <th scope="col" class="text-center">Nombre y Apellidos</th>
			  <th scope="col" class="text-center">Edad</th>
			  <th scope="col" class="text-center">Teléfono</th>
			  <th scope="col" class="text-center">Email</th>
			  <th scope="col" class="text-center">Sexo</th>
			  <th scope="col" class="text-center">NºCuenta</th>
			  <th colspan=2" class="text-center">Acciones</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  @foreach ($trabajadores as $trabajador)
			<tr>
			  <td class="text-center">{{$trabajador->DNI}}</td>
			  <td class="text-center">{{$trabajador->nombre}}</td>
			  <td class="text-center">{{$trabajador->edad}}</td>
			  <td class="text-center">{{$trabajador->telefono}}</td>
			  <td class="text-center">{{$trabajador->email}}</td>
			  <td class="text-center">{{$trabajador->sexo}}</td>
			  <td class="text-center">{{$trabajador->numero_cuenta}}</td>
			  <td class="text-center"><type="button" class="btn btn-dark" data-toggle="modal" data-target="#modificarTrabajador{{$trabajador->DNI}}">Modificar</button></td>
			  <td class="text-center"><type="button" class="btn btn-dark" data-toggle="modal" data-target="#eliminarTrabajador{{$trabajador->DNI}}">Eliminar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
	</div>
	
@foreach ($trabajadores as $trabajador)

<!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR -->

<form method="POST" action="{{ route('admin_trabajadores_update') }}">
@csrf
@method('POST')
<div class="modal fade" id="modificarTrabajador{{$trabajador->DNI}}" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Modificando datos del trabajador: {{$trabajador->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="dniTrabajador" class="col-form-label">DNI:</label>
            <input type="text" class="form-control" id="dniTrabajador" name="dniTrabajador" required placeholder ="DNI del trabajador" value="{{$trabajador->DNI}}">
          </div>
          <div class="form-group">
            <label for="nombreTrabajador" class="col-form-label">Nombres y Apellidos:</label>
            <input type="text" class="form-control" id="nombreTrabajador" name="nombreTrabajador" value="{{$trabajador->nombre}}">
          </div>
		  <div class="form-group">
            <label for="edadTrabajador" class="col-form-label">Edad del trabajador:</label>
            <input type="number" class="form-control" id="edadTrabajador" name="edadTrabajador" required placeholder ="Edad del trabajador:" value="{{$trabajador->edad}}">
          </div>
		  <div class="form-group">
            <label for="telefonoTrabajador" class="col-form-label">Teléfono del trabajador:</label>
            <input type="text" class="form-control" id="telefonoTrabajador" name="telefonoTrabajador" required placeholder ="Teléfono del trabajador:" value="{{$trabajador->telefono}}">
          </div>
		  <div class="form-group">
            <label for="emailTrabajador" class="col-form-label">Email del trabajador:</label>
            <input type="text" class="form-control" id="emailTrabajador" name="emailTrabajador" required placeholder ="Email del trabajador:" value="{{$trabajador->email}}">
			</div>
          <div class="form-group" style="color:black;">
		  <label for="sexoTrabajador" class="col-form-label">Sexo del trabajador:</label><br>
		  @if($trabajador->sexo == "M")
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoMujer" value="M" checked>
							  <label class="form-check-label" for="sexoMujer">Mujer</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoHombre" value="H">
							  <label class="form-check-label"  for="sexoHombre">Hombre</label>
							</div>
						@else

						 <div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoMujer" value="M">
							  <label class="form-check-label"  for="sexoMujer">Mujer</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoHombre" value="H" checked>
							  <label class="form-check-label"  for="sexoHombre">Hombre</label>
							</div>
					 @endif
			</div>
			<div class="form-group">
            <label for="cuentaTrabajador" class="col-form-label">Número de cuenta del trabajador:</label>
            <input type="text" class="form-control" id="cuentaTrabajador" name="cuentaTrabajador" required placeholder ="Número de cuenta del trabajador:" value="{{$trabajador->numero_cuenta}}">
			</div>
		  <input type="hidden" name="idTrabajador" value="{{$trabajador->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR --><!-- MODIFICAR TRABAJADOR -->
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->
<form method = "post" action="{{ route('admin_trabajadores_delete') }}">
@csrf
@method('POST')
	<div class="modal" id="eliminarTrabajador{{$trabajador->DNI}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar trabajador</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color:black">
				¿Estás seguro de borrar los datos del trabajador?
				Todos los datos, incluida la cuenta de usuario, desaparecerán.
				</div>
				<div class="modal-footer">
				<input type="hidden" name="idTrabajador" value="{{$trabajador->id}}">
				<input type="hidden" name="emailTrabajador" value="{{$trabajador->email}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Dar de baja trabajador</span></button>
			</div>
		</div>
	</div>
	</div>
</form>
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->

@endforeach

<form method="POST" action="{{ route('admin_trabajadores_create') }}">
@csrf
@method('POST')
<div class="modal fade" id="createTrabajador" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Dar de alta trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="dniTrabajador" class="col-form-label">DNI:</label>
            <input type="text" class="form-control" id="dniTrabajador" name="dniTrabajador" required placeholder ="DNI del trabajador">
          </div>
          <div class="form-group">
            <label for="nombreTrabajador" class="col-form-label">Nombres y Apellidos:</label>
            <input type="text" class="form-control" id="nombreTrabajador" name="nombreTrabajador" required placeholder ="Nombres y Apellidos del trabajador"">
          </div>
		  <div class="form-group">
            <label for="edadTrabajador" class="col-form-label">Edad del trabajador:</label>
            <input type="number" class="form-control" id="edadTrabajador" name="edadTrabajador" required placeholder ="Edad del trabajador">
          </div>
		  <div class="form-group">
            <label for="telefonoTrabajador" class="col-form-label">Teléfono del trabajador:</label>
            <input type="text" class="form-control" id="telefonoTrabajador" name="telefonoTrabajador" required placeholder ="Teléfono del trabajador">
          </div>
		  <div class="form-group">
            <label for="emailTrabajador" class="col-form-label">Email del trabajador:</label>
            <input type="text" class="form-control" id="emailTrabajador" name="emailTrabajador" required placeholder ="Email del trabajador">
			</div>
          <div class="form-group" style="color:black;">
		  <label for="sexoTrabajador" class="col-form-label">Sexo del trabajador:</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoMujer" value="M" checked>
					<label class="form-check-label" for="sexoMujer">Mujer</label>
					</div>
						<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sexoTrabajador" id="sexoHombre" value="H">
						<label class="form-check-label"  for="sexoHombre">Hombre</label>
						</div>
			</div>
			<div class="form-group">
            <label for="cuentaTrabajador" class="col-form-label">Número de cuenta del trabajador:</label>
            <input type="text" class="form-control" id="cuentaTrabajador" name="cuentaTrabajador" required placeholder ="Número de cuenta del trabajador">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Dar de alta</button>
      </div>
    </div>
  </div>
</div>
</form>
	
@stop