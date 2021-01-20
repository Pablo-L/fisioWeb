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
				  <input name="nameinput" id="nameinput" type="text" class="form-control" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="El nombre sólo puede contener letras" value="{{Auth::user()->nombre}}" aria-label="Nombre" aria-describedby="basic-addon1" required>
				  <span class="input-group-text" id="basic-addon2">Apellidos</span>
				  <input name="apellidosinput" id="apellidosinput" type="text" class="form-control" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="Los apellidos sólo pueden contener letras" value="{{Auth::user()->apellidos}}" aria-label="Apellidos" aria-describedby="basic-addon2" required>
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Correo electrónico</span>
				  </div>
				  <input name="emailinput" id="emailinput"  type="email" class="form-control" value="{{Auth::user()->email}}" aria-label="Correo electrónico" aria-describedby="basic-addon1" required>
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
				  <input name="newpasswordinput" id="newpasswordinput" type="password" class="form-control" pattern=".{8,}" title="La contraseña debe de contener al menos ocho caracteres" placeholder="Introduce aquí tu nueva contraseña." aria-label="Nueva contraseña" aria-describedby="basic-addon1">
				  <span class="input-group-text" id="basic-addon1">Confirmar contraseña</span>
				  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password" class="form-control" pattern=".{8,}" title="La contraseña debe de contener al menos ocho caracteres" placeholder="Confirma tu nueva contraseña." aria-label="Confirmar Contraseña" aria-describedby="basic-addon1">
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
									  <input type="text" name="provincia" value="{{$direccion->provincia}}" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="La provincia sólo puede contener letras" id="provincia" class="form-control" required>
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Ciudad</span>
									  </div
									</div>
									<input type="text" name="ciudad" value="{{$direccion->ciudad}}" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="La ciudad sólo puede contener letras" id="ciudad" class="form-control" required>
								  </div>
								  <div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Dirección</span>
									  </div>
									<input type="text" name="direccion" value="{{$direccion->direccion}}" id="direccion" class="form-control" required>
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
						  <input type="text" name="provincia" id="provincia" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="La provincia sólo puede contener letras" class="form-control" required>
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Ciudad</span>
						  </div
						</div>
						<input type="text" name="ciudad" id="ciudad" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="La ciudad sólo puede contener letras" class="form-control" required>
					  </div>
					  <div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Dirección</span>
						  </div>
						<input type="text" name="direccion" id="direccion" class="form-control" required>
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
		  <!-- METODOS DE PAGO --><!-- METODOS DE PAGO --><!-- METODOS DE PAGO --><!-- METODOS DE PAGO --><!-- METODOS DE PAGO --><!-- METODOS DE PAGO --><!-- METODOS DE PAGO -->
		  
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anadirMetodoPago">
				  Añadir método de pago
			  </button>
			  @php $num_pago = 0 @endphp
			  <table class="table" style="color:white">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Nº Tarjeta</th>
					  <th scope="col">Nombre del titular</th>
					  <th scope="col">Fecha de caducidad</th>
					  <th scope="col">Modificar</th>
					  <th scope="col">Eliminar</th>
					</tr>
				  </thead>
				  <tbody>
				  @foreach ($metodospago as $metodopago)
				  @php $num_pago++ @endphp
				  <tr>
				  <th scope="row">{{$num_pago}}</th>
				  <td>{{$metodopago->numero_tarjeta}}</td>
				  <td>{{$metodopago->nombre_titular}}</td>
				  <td>{{$metodopago->fecha_caducidad}}</td>
					  <td>
					  <!-- MODIFICAR METODO PAGO --><!-- MODIFICAR METODO PAGO --><!-- MODIFICAR METODO PAGO --><!-- MODIFICAR METODO PAGO --><!-- MODIFICAR METODO PAGO -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarMetodoPago{{$metodopago->id}}">Modificar</button>
						<form method = "post" action="{{ route('profilemodificarMetodoPago') }}">
						  @csrf
						  @method('POST')
						  <div class="modal fade" id="modificarMetodoPago{{$metodopago->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Modificando método de pago</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Nº Tarjeta</span>
									  </div>
									  <input type="text" name="numero_tarjeta" value="{{$metodopago->numero_tarjeta}}" pattern="^[0-9_]+( [0-9_]+)*$" title="El nº tarjeta sólo puede contener números" id="numero_tarjeta" class="form-control" required>
									</div>
									<div class="input-group">
								  	<div class="input-group-prepend">
										<span class="input-group-text" id="">Nombre del titular</span>
									  </div>
									  <input type="text" name="nombre_titular" value="{{$metodopago->nombre_titular}}" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="El nombre del titular sólo puede contener letras" id="nombre_titular" class="form-control" required>
									</div>
									
									<div class="input-group">
									  <div class="input-group-prepend">
										<span class="input-group-text" id="">Fecha de caducidad</span>
									  </div>
									<input type="date" name="fecha_caducidad" value="{{$metodopago->fecha_caducidad}}" id="fecha_caducidad" class="form-control" required>
									<input type="hidden" name="metodoPago_id" value="{{$metodopago->id}}">
								  </div>
									
									</div>
								  
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="submit" class="btn btn-primary">Modificar método de pago</button>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  </form>
					</td>
					<td>
					 <!-- ELIMINAR METODO PAGO --><!-- ELIMINAR METODO PAGO --><!-- ELIMINAR METODO PAGO --><!-- ELIMINAR METODO PAGO --><!-- ELIMINAR METODO PAGO -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eliminarMetodoPago{{$metodopago->id}}">Eliminar</button>
						<form method = "post" action="{{ route('profileliminarMetodoPago') }}">
						@csrf
						@method('POST')
						<div class="modal" id="eliminarMetodoPago{{$metodopago->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog  modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
								<h5 class="modal-title" style="color:black" id="exampleModalLabel">Borrar método de pago</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body" style="color:black">
										¿Estás seguro de borrar el método de pago?
										Todos los datos desaparecerán.
								</div>
								<div class="modal-footer">
								<input type="hidden" name="metodoPago_id" value="{{$metodopago->id}}">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger btn-block"><span><i class="fas fa-trash mr-2"></i>Eliminar método de pago</span></button>
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
				
				<!-- AÑADIR METODO PAGO --> <!-- AÑADIR METODO PAGO --><!-- AÑADIR METODO PAGO --><!-- AÑADIR METODO PAGO --><!-- AÑADIR METODO PAGO -->
			  <form method = "post" action="{{ route('profileanadirMetodoPago') }}">
			  @csrf
			  @method('POST')
			  <div class="modal fade" id="anadirMetodoPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Añadir método de pago</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Nº Tarjeta</span>
						  </div>
						  <input type="text" name="numero_tarjeta" id="numero_tarjeta" pattern="^[0-9_]+( [0-9_]+)*$" title="El nº tarjeta sólo puede contener números" class="form-control" required>
					  </div>
					  <div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Nombre del titular</span>
						  </div
						</div>
						<input type="text" name="nombre_titular" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" title="El nombre del titular sólo puede contener letras" id="nombre_titular" class="form-control" required>
					  </div>
					  <div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="">Fecha de caducidad</span>
						  </div>
						<input type="date" name="fecha_caducidad" id="fecha_caducidad" class="form-control" required>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Añadir método de pago</button>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  </form>
				
			  </div>
			</div>
		  </div>
		</div>
	</div>

@stop