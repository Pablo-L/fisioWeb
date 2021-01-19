<!-- Footer -->
<footer class="bg-dark text-center text-light text-lg-start fixed-bottom">
	
  <!-- Grid container -->
  <div class="container">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-5 col-md-12 mb-4 mb-md-0 text-center">
        <h5 class="text text-center">Sobre nosotros</h5>
         Llevamos trabajando para el tratamiento de patologías
		 fisiológicas desde 1963. <br>© 2021 Copyright:
		<a class="text-light">Clínicas Fisioweb</a>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text">&nbsp Contacta con nosotros</h5>
		
        <ul class="list-unstyled mb-0" style="columns:2">
          <li>
			<img src=/iconos/facebook.svg alt="" width="32" height="32"/>
            <a href="https://es-es.facebook.com/clinicafisioweb"class="text-light">Facebook</a>
          </li>
          <li>
		  <img src=/iconos/twitter.svg alt="" width="32" height="32"/>
            <a href="https://twitter.com/clinicafisioweb" class="text-light">Twitter</a>
          </li>
          <li>
		  <img src=/iconos/instagram.svg alt="" width="32" height="32"/>
            <a href="https://instagram.com/clinicafisioweb" class="text-light">Instagram</a>
          </li>
          <li>
		  <img src=/iconos/mailbox.svg alt="" width="32" height="32"/>
            <a href="" data-toggle="modal" data-target="#emailModal" data-whatever="clinicasfisioweb@info.com" class="text-light">E-Mail</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text mb-0";">Información</h5>

        <ul class="list-unstyled" style="columns:1">
          <li>
            <a href="{{route('infoPoliticas')}}" class="text-light">Política de privacidad</a>
          </li>
		  <li>
		  <p class="text">Teléfono: 912 41 34 22</p>
		  </li>
        </ul>
		
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->
</footer>
<!-- Footer -->

  <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="recipient-name" placeholder="clinicasfisioweb@info.com">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mensaje:</label>
            <textarea class="form-control" id="message-text" placeholder="Introduce aquí tu duda y la resolveremos lo antes posible."></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exitoModal">Enviar</button>
    </div>
  </div>
</div>


  <div class="modal fade" id="exitoModal" role="dialog">
    <div class="modal-dialog">
        <div class="alert alert-success alert-dismissible">
            <a  class="close" data-dismiss="modal" data-dismiss="modal" aria-label="close">&times;</a>
            <strong>¡Éxito!</strong> Su mensaje ha sido enviado de forma satisfactoria y será respondido con la mayor brevedad.
          </div>
    </div>
  </div>