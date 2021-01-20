@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#a7c5ed; border-top: 1px solid #000; border-bottom: 1px solid #000;">
	<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createTratamiento">
				  Añadir tratamiento
	</button>
		<table class="table table-bordered table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">categoria</th>
			  <th scope="col">nombre</th>
			  <th scope="col">descripcion</th>
			  <th scope="col">tarifa</th>
			  <th scope="col">modificar</th>
			  <th scope="col">eliminar</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  @foreach ($tratamientos as $tratamiento)
			<tr>
			  <td>{{$tratamiento->id}}</td>
			  <td>{{$tratamiento->categoria}}</td>
			  <td>{{$tratamiento->nombre}}</td>
			  <td>{{$tratamiento->descripcion}}</td>
			  <td>{{$tratamiento->tarifa}}€</td>
			  <td><type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modifyTratamiento{{$tratamiento->id}}">Modificar</button></td>
			  <td><type="button" class="btn btn-secondary" data-toggle="modal" data-target="#eliminarTratamiento{{$tratamiento->id}}">Eliminar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
	</div>
	
@foreach ($tratamientos as $tratamiento)

<!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO -->

<form method="POST" action="{{ route('admin_tratamientos_update') }}">
@csrf
@method('POST')
<div class="modal fade" id="modifyTratamiento{{$tratamiento->id}}" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Modificando tratamiento: {{$tratamiento->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="nombreTratamiento" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreTratamiento" name="nombreTratamiento" required placeholder ="Nombre de tratamiento:" value="{{$tratamiento->nombre}}">
          </div>
		  <div class="form-group">
            <label for="eleccioncategoria" class="col-form-label">Categoría:</label>
            <select id="categoriatratamiento" name="eleccioncategoria">
			@foreach ($categorias as $categoria)
			  <option value="{{$categoria}}">{{$categoria}}</option>
			  @endforeach
			</select>
          </div>
          <div class="form-group">
            <label for="descripcionTratamiento" class="col-form-label">Descripción:</label>
            <textarea class="form-control" id="descripcionTratamiento" name="descripcionTratamiento">{{$tratamiento->descripcion}}</textarea>
          </div>
		  <div class="form-group">
            <label for="tarifaTratamiento" class="col-form-label">Tarifa:</label>
            <input type="text" class="form-control" id="tarifaTratamiento" name="tarifaTratamiento" required placeholder ="Tarifa de tratamiento:" value="{{$tratamiento->tarifa}}">
			<input type="hidden" name="idTratamiento" value="{{$tratamiento->id}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO --><!-- MODIFICAR TRATAMIENTO -->
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->
<form method = "post" action="{{ route('admin_tratamientos_delete') }}">
@csrf
@method('POST')
	<div class="modal" id="eliminarTratamiento{{$tratamiento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar tratamiento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="color:black">
				¿Estás seguro de borrar el tratamiento?
				Todos los datos desaparecerán.
				</div>
				<div class="modal-footer">
				<input type="hidden" name="idTratamiento" value="{{$tratamiento->id}}">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Eliminar tratamiento</span></button>
			</div>
		</div>
	</div>
	</div>
</form>
<!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO --><!-- ELIMINAR TRATAMIENTO -->

@endforeach

<!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO -->

<form method="POST" action="{{ route('admin_tratamientos_create') }}">
@csrf
@method('POST')
<div class="modal fade" id="createTratamiento" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel">Creando tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="nombreTratamiento" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreTratamiento" name="nombreTratamiento" required placeholder ="Nombre de tratamiento">
          </div>
          <div class="form-group">
            <label for="eleccioncategoria" class="col-form-label">Categoría:</label>
            <select id="categoriatratamiento" name="eleccioncategoria">
			@foreach ($categorias as $categoria)
			  <option value="{{$categoria}}">{{$categoria}}</option>
			  @endforeach
			</select>
          </div>
		  <div class="form-group">
            <label for="descripcionTratamiento" class="col-form-label">Descripción:</label>
            <textarea class="form-control" id="descripcionTratamiento" name="descripcionTratamiento"></textarea>
          </div>
		  <div class="form-group">
            <label for="tarifaTratamiento" class="col-form-label">Tarifa:</label>
            <input type="text" class="form-control" id="tarifaTratamiento" name="tarifaTratamiento" required placeholder ="Tarifa de tratamiento">
			<input type="hidden" name="idTratamiento" value="{{$tratamiento->id}}">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO --><!-- AÑADIR TRATAMIENTO -->

	
@stop