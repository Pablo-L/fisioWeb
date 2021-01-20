@extends ('perfil/perfil_layout')

@section('contenido')


	<div class="jumbotron" style="background-color:#85929e; border-top: 1px solid #000; border-bottom: 1px solid #000;">
	  <h1 class="display-4">¡Bienvenido a tu perfil de Fisioweb, {{ Auth::user()->nombre }}!</h1>
	  <p class="lead">Aquí puedes revisar tus datos, métodos de págo, citas pendientes, etcétera.</p>
	  <hr class="my-4">
	  
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
	  
	  <!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES -->
		<div id="accordion">
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingOne">
			  <h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" style="color:white;"  data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				 <strong> Datos personales</strong>
				</button>
			  </h5>
			</div>

			<div id="collapseOne" class="collapse" style="background-color: #283747 ;" aria-labelledby="headingOne" data-parent="#accordion">
			<form method="POST" action="{{ route('profileEditPersonal') }}">
            @csrf
			@method('POST')
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Nombre</span>
				  </div>
				  <input name="nameinput" id="nameinput" type="text" class="form-control" value="{{Auth::user()->nombre}}" aria-label="Nombre" aria-describedby="basic-addon1">
				  <span class="input-group-text" id="basic-addon2">Apellidos</span>
				  <input name="apellidosinput" id="apellidosinput" type="text" class="form-control" value="{{Auth::user()->apellidos}}" aria-label="Apellidos" aria-describedby="basic-addon2">
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Correo electrónico</span>
				  </div>
				  <input name="emailinput" id="emailinput"  type="email" class="form-control" value="{{Auth::user()->email}}" aria-label="Correo electrónico" aria-describedby="basic-addon1">
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Contraseña actual</span>
				  </div>
				  <input name="actualpasswordinput" id="actualpasswordinput"  type="password" class="form-control" placeholder="Introduce aquí tu contraseña actual." aria-label="Contraseña" aria-describedby="basic-addon1">
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Nueva contraseña</span>
				  </div>
				  <input name="newpasswordinput" id="newpasswordinput" type="password" class="form-control" placeholder="Introduce aquí tu nueva contraseña." aria-label="Nueva contraseña" aria-describedby="basic-addon1">
				  <span class="input-group-text" id="basic-addon1">Confirmar contraseña</span>
				  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password" class="form-control" placeholder="Confirma tu nueva contraseña." aria-label="Confirmar Contraseña" aria-describedby="basic-addon1">
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
				  <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exitoModal">Guardar cambios</button></div>
				  </div></div>
				  </form>
			</div>
		  </div>
		  
		   <!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES --><!-- DATOS PERSONALES -->
		   <!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION -->
		  
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingTwo">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" style="color:white;"  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				  <strong>Mis direcciones de facturación</strong>
				</button>
			  </h5>
			</div>
			
			
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" style="background-color: #283747;" data-parent="#accordion">
			  <div class="card-body">
			  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anadirDireccion">
				  Añadir dirección de facturación
			  </button>
			  @php $num = 0 @endphp
			  <table class="table" style="color:white">
				  <thead>
					<tr>
					  <th scope="col">Nº</th>
					  <th scope="col">Provincia</th>
					  <th scope="col">Ciudad</th>
					  <th scope="col">Dirección</th>
					  <th scope="col">Modificar</th>
					  <th scope="col">Eliminar</th>
					</tr>
				  </thead>
				  <tbody>
				  @foreach ($direcciones as $direccion)
				  @php $num++ @endphp
				  <tr>
				  <th scope="row">{{$num}}</th>
				  <td>{{$direccion->provincia}}</td>
				  <td>{{$direccion->ciudad}}</td>
				  <td>{{$direccion->direccion}}</td>
					  <td>
					  <!-- MODIFICAR DIRECCION --><!-- MODIFICAR DIRECCION --><!-- MODIFICAR DIRECCION --><!-- MODIFICAR DIRECCION --><!-- MODIFICAR DIRECCION -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarDireccion{{$direccion->id}}">Modificar</button>
						<form method = "post" action="{{ route('profileModificarDireccion') }}">
						  @csrf
						  @method('POST')
						  <div class="modal fade" id="modificarDireccion{{$direccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modificando dirección de facturación</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Provincia</span>
									  </div>
									  <input type="text" name="provincia" value="{{$direccion->provincia}}" id="provincia" class="form-control">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Ciudad</span>
									  </div
									</div>
									<input type="text" name="ciudad" value="{{$direccion->ciudad}}" id="ciudad" class="form-control">
								  </div>
								  <div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Dirección</span>
									  </div>
									<input type="text" name="direccion" value="{{$direccion->direccion}}" id="direccion" class="form-control">
									<input type="hidden" name="idDireccion" value="{{$direccion->id}}">
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary">Modificar dirección</button>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  </form>
					</td>
					<td>
					 <!-- ELIMINAR DIRECCION --><!-- ELIMINAR DIRECCION --><!-- ELIMINAR DIRECCION --><!-- ELIMINAR DIRECCION --><!-- ELIMINAR DIRECCION -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarDireccion{{$direccion->id}}">Eliminar</button>
						<form method = "post" action="{{ route('profileEliminarDireccion') }}">
						@csrf
						@method('POST')
						<div class="modal" id="eliminarDireccion{{$direccion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog  modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
								<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar dirección</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body" style="color:black">
										¿Estás seguro de borrar la dirección?
										Todos los datos desaparecerán.
								</div>
								<div class="modal-footer">
								<input type="hidden" name="idDireccion" value="{{$direccion->id}}">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Eliminar dirección</span></button>
								</div>
							</div>
							</div>
						</div>
					</form>
					</td>
				  </tr>
				  @endforeach
				  </tbody>
				</table>
			  
			  <!-- AÑADIR DIRECCION --> <!-- AÑADIR DIRECCION --> <!-- AÑADIR DIRECCION --> <!-- AÑADIR DIRECCION --> <!-- AÑADIR DIRECCION -->
			  <form method = "post" action="{{ route('profileAnadirDireccion') }}">
			  @csrf
			  @method('POST')
			  <div class="modal fade" id="anadirDireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Añadir dirección de facturación</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Provincia</span>
						  </div>
						  <input type="text" name="provincia" id="provincia" class="form-control">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Ciudad</span>
						  </div
						</div>
						<input type="text" name="ciudad" id="ciudad" class="form-control">
					  </div>
					  <div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Dirección</span>
						  </div>
						<input type="text" name="direccion" id="direccion" class="form-control">
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Añadir dirección</button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  </form>
			  
			</div>
		  </div>
		  
		  <!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION --><!-- DIRECCION DE FACTURACION -->
		  
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingThree">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" style="color:white;" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				 <strong> Mis métodos de pago</strong>
				</button>
			  </h5>
			</div>
			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" style="background-color: #283747;" data-parent="#accordion">
			  <div class="card-body">
				Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			  </div>
			</div>
		  </div>
		</div>
	</div>
	
	 <div class="modal fade" id="exitoModal" role="dialog">
    <div class="modal-dialog">
        <div class="alert alert-success alert-dismissible">
            <a  class="close" data-dismiss="modal" data-dismiss="modal" aria-label="close">&times;</a>
            <strong>¡Éxito!</strong> Los datos personales se han modificado.
          </div>
    </div>
  </div>
	
@stop