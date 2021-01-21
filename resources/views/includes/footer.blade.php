<!-- Footer -->
<footer class="text-center text-light text-lg-start" style="background: url(/imagenes/black_lozenge.png) repeat 0 0; font-family:'Nobile';">
	
<div class="container p-4">
    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h4 class="text">Información</h4>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-white">Sobre nosotros</a>
          </li>
          <li>
            <a href="#!" class="text-white">Política de Privacidad</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h4 class="text mb-0">Síguenos en RRSS</h4><br>

        <ul class="list-unstyled" style="columns:4">
          <li>
            <a href="https://es-es.facebook.com/clinicafisioweb" class="text-white">Facebook</a>
			<img class="mr-3" src="/imagenes/facebook.png" alt="">
          </li>
          <li>
            <a href="https://twitter.com/clinicafisioweb" class="text-white">Twitter</a>
			<img class="mr-3" src="/imagenes/twitter.png" alt="">
          </li>
          <li>
            <a href="https://instagram.com/clinicafisioweb" class="text-white">Instagram</a>
			<img class="mr-3" src="/imagenes/instagram.png" alt="">
          </li>
          <li>
            <a href="" data-toggle="modal" data-target="#emailModal" data-whatever="clinicasfisioweb@info.com" class="text-light">Contacto</a>
			<img class="mr-3" src="/imagenes/email.png" alt="">
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->
</footer>

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
            <input type="text" class="form-control" id="recipient-name" placeholder="clinicasfisioweb@info.com" value="clinicasfisioweb@info.com">
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