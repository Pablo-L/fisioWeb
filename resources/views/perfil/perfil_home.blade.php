@extends ('perfil/perfil_layout')

@section('contenido')

	<div class="jumbotron" style="background-color:#85929e; border-top: 1px solid #000; border-bottom: 1px solid #000;">
	  <h1 class="display-4">¡Bienvenido a tu perfil de Fisioweb, {{ Auth::user()->name }}!</h1>
	  <p class="lead">Aquí puedes revisar tus datos, métodos de págo, citas pendientes, etcétera.</p>
	  <hr class="my-4">
	  
		<div id="accordion">
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingOne">
			  <h5 class="mb-0">
				<button class="btn btn-link" data-toggle="collapse" style="color:white;"  data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				 <strong> Datos personales</strong>
				</button>
			  </h5>
			</div>

			<div id="collapseOne" class="collapse show" style="background-color: #283747 ;" aria-labelledby="headingOne" data-parent="#accordion">
			<form method="POST" action="('profile')">
            @csrf
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Nombre y Apellidos</span>
				  </div>
				  <input name="nameinput" id="nameinput" type="text" class="form-control" value="{{Auth::user()->name}}" aria-label="Nombre" aria-describedby="basic-addon1">
				  <input name="apellidosinput" id="apellidosinput" type="text" class="form-control" value="{{Auth::user()->name}}" aria-label="Apellidos" aria-describedby="basic-addon1">
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
					<span class="input-group-text" id="basic-addon1">Nueva contraseña</span>
				  </div>
				  <input name="newpasswordinput" id="newpasswordinput" type="password" class="form-control" placeholder="Introduce aquí tu nueva contraseña." aria-label="Nueva contraseña" aria-describedby="basic-addon1">
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
					<span class="input-group-text" id="basic-addon1">Confirmar contraseña</span>
				  </div>
				  <input name="confirmpasswordinput" id="confirmpasswordinput" type="password" class="form-control" placeholder="Confirma tu contraseña actual." aria-label="Confirmar Contraseña" aria-describedby="basic-addon1">
				     </div>
				  </div>
				  
				  <div class="card-body">
					 <div class="input-group mb-3">
				  <div class="input-group-prepend">
				  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exitoModal">Guardar cambios</button></div>
				  </div></div>
				  </form>
				  

			</div>
		  </div>
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingTwo">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" style="color:white;"  data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				  <strong>Mis direcciones de facturación</strong>
				</button>
			  </h5>
			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" style="background-color: #649de8; data-parent="#accordion">
			  <div class="card-body">
				Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			  </div>
			</div>
		  </div>
		  <div class="card">
			<div class="card-header" style="background-color: #34495e;" id="headingThree">
			  <h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" style="color:white;" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				 <strong> Mis métodos de pago</strong>
				</button>
			  </h5>
			</div>
			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" style="background-color: #649de8; data-parent="#accordion">
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