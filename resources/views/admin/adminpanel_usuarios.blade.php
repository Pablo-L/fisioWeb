@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:transparent; color:white; font-family:'Nobile';">
	  <button type="button" class="btn btn-dark" style="margin-right:2px" data-toggle="modal" data-target="#createUsuario">
				  Dar de alta usuario
	  </button>
	
		<table class="table table-bordered table-hover" style="background-color:#66646a">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col" class="text-center">ID</th>
			  <th scope="col" class="text-center">Nombre</th>
			  <th scope="col" class="text-center">Apellidos</th>
			  <th scope="col" class="text-center">Email</th>
			  <th scope="col" class="text-center">Teléfono</th>
			  <th scope="col" class="text-center">Sexo</th>
			  <th scope="col" class="text-center">Rol</th>
			  <th colspan=2" class="text-center">Acciones</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  @foreach ($users as $user)
			<tr>
			  <td class="text-center">{{$user->id}}</td>
			  <td class="text-center">{{$user->nombre}}</td>
			  <td class="text-center">{{$user->apellidos}}</td>
			  <td class="text-center">{{$user->email}}</td>
			  <td class="text-center">{{$user->telefono}}</td>
			  <td class="text-center">{{$user->sexo}}</td>
			  <td class="text-center">{{$user->rol}}</td>
			  <td class="text-center"><type="button" class="btn btn-dark" data-toggle="modal" data-target="#modificarUsuario{{$user->id}}">Modificar</button></td>
			  <td class="text-center"><type="button" class="btn btn-dark" data-toggle="modal" data-target="#eliminarUsuario{{$user->id}}">Eliminar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
	</div>
	
	@foreach ($users as $user)

<!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO -->

<form method="POST" action="{{ route('admin_users_update') }}">
@csrf
@method('POST')
<div class="modal fade" id="modificarUsuario{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Modificando datos del usuario: {{$user->email}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="nombreUser" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreUser" name="nombreUser" required placeholder ="Nombre del usuario" value="{{$user->nombre}}">
          </div>
          <div class="form-group">
            <label for="apellidosUser" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidosUser" name="apellidosUser" value="{{$user->apellidos}}">
          </div>
		  <div class="form-group">
            <label for="emailUser" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="emailUser" name="emailUser" required placeholder ="Email del usuario:" value="{{$user->email}}">
          </div>
		  <div class="form-group">
            <label for="telefonoUsuario" class="col-form-label">Teléfono:</label>
            <input type="text" class="form-control" id="telefonoUser" name="telefonoUser" required placeholder ="Teléfono del usuario:" value="{{$user->telefono}}">
          </div>
          <div class="form-group" style="color:black;">
		  <label for="sexoUser" class="col-form-label">Sexo:</label><br>
		  @if($user->sexo == "M")
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoUser" id="sexoMujer" value="M" checked>
							  <label class="form-check-label" for="sexoMujer">Mujer</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoUser" id="sexoHombre" value="H">
							  <label class="form-check-label"  for="sexoHombre">Hombre</label>
							</div>
						@else

						 <div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoUser" id="sexoMujer" value="M">
							  <label class="form-check-label"  for="sexoMujer">Mujer</label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="sexoUser" id="sexoHombre" value="H" checked>
							  <label class="form-check-label"  for="sexoHombre">Hombre</label>
							</div>
					 @endif
			</div>
			<div class="form-group">
            <label for="rolUser" class="col-form-label">Tipo de usuario:</label>
            <select id="categoriatratamiento" name="rolUser">
			  <option value="user">Usuario</option>
			  <option value="trabajador">Trabajador</option>
			  <option value="recepcionista">Recepcionista</option>
			</select>
			</div>
		  <input type="hidden" name="idUser" value="{{$user->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO --><!-- MODIFICAR USUARIO -->

<!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO -->
<form method = "post" action="{{ route('admin_users_delete') }}">
@csrf
@method('POST')
	<div class="modal" id="eliminarUsuario{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color:black">
				¿Estás seguro de borrar los datos del usuario?
				Todos los datos, incluida la cuenta de usuario, desaparecerán.
				</div>
				<div class="modal-footer">
				<input type="hidden" name="idUsuario" value="{{$user->id}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Eliminar usuario</span></button>
			</div>
		</div>
	</div>
	</div>
</form>
<!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO --><!-- ELIMINAR USUARIO -->

@endforeach

<!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO --><!-- CREAR USUARIO -->
<form method="POST" action="{{ route('admin_users_create') }}">
@csrf
@method('POST')
<div class="modal fade" id="createUsuario" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Creando usuario nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="nombreUser" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreUser" name="nombreUser" required placeholder ="Nombre del usuario">
          </div>
          <div class="form-group">
            <label for="apellidosUser" class="col-form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidosUser" name="apellidosUser" required placeholder ="Apellidos del usuario">
          </div>
		  <div class="form-group">
            <label for="emailUser" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="emailUser" name="emailUser" required placeholder ="Email del usuario">
          </div>
		  <div class="form-group">
            <label for="telefonoUsuario" class="col-form-label">Teléfono:</label>
            <input type="text" class="form-control" id="telefonoUser" name="telefonoUser" required placeholder ="Teléfono del usuario">
          </div> 
		  <div class="form-group">
            <label for="contrasenaUser" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" id="contrasenaUser" name="contrasenaUser" required placeholder ="Contraseña del usuario">
          </div>
          <div class="form-group" style="color:black;">
		  <label for="sexoUser" class="col-form-label">Sexo:</label><br>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="sexoUser" id="sexoMujer" value="M" checked>
				<label class="form-check-label" for="sexoMujer">Mujer</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="sexoUser" id="sexoHombre" value="H">
				 <label class="form-check-label"  for="sexoHombre">Hombre</label>
			</div>
			</div>
			<div class="form-group">
            <label for="rolUser" class="col-form-label">Tipo de usuario:</label>
            <select id="categoriaUser" name="rolUser">
			  <option value="user">Usuario</option>
			  <option value="trabajador">Trabajador</option>
			  <option value="recepcionista">Recepcionista</option>
			</select>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear usuario</button>
      </div>
    </div>
  </div>
</div>
</form>
	
@stop