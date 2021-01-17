@extends ('admin/adminpanel_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#a7c5ed; border-top: 1px solid #000; border-bottom: 1px solid #000;">
		<table class="table table-bordered table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">categoria</th>
			  <th scope="col">nombre</th>
			  <th scope="col">descripcion</th>
			  <th scope="col">tarifa</th>
			  <th scope="col">modificar</th>
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
			  <td><type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modifyTratamiento{{$tratamiento->id}}" data-whatever='{"id":12,"todo":"xyz"}'>Modificar</button></td>
			</tr>
		 @endforeach
		  </tbody>
		</table>
	</div>
	
@foreach ($tratamientos as $tratamiento)

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
        <form>
          <div class="form-group">
            <label for="nombreTratamiento" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreTratamiento" name="nombreTratamiento" required placeholder ="Nombre de tratamiento:" value="{{$tratamiento->nombre}}">
          </div>
          <div class="form-group">
            <label for="descripcionTratamiento" class="col-form-label">Descripción:</label>
            <textarea class="form-control" id="descripcionTratamiento" name="descripcionTratamiento">{{$tratamiento->descripcion}}</textarea>
          </div>
		  <div class="form-group">
            <label for="tarifaTratamiento" class="col-form-label">Tarifa:</label>
            <input type="text" class="form-control" id="tarifaTratamiento" name="tarifaTratamiento" required placeholder ="Tarifa de tratamiento:" value="{{$tratamiento->tarifa}}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Modificar</button>
      </div>
    </div>
  </div>
</div>

@endforeach
	
@stop