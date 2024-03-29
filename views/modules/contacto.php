<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contacto
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <body>

    <div class="container">
    <!--la propiedad enctype permite el envío de archivos adjuntos en el formulario. -->    
      <form id="form1" class="well col-lg-12" action="enviar" method="post" name="form1" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg-6">
          <label>Nombre*</label> <input id="Nombre" class="form-control" type="text" name="Nombre" /> 
          <label>Email*</label> <input id="Email" class="form-control" type="email" name="Email" />
        </div>
          <div class="col-lg-5"><label>Mensaje*</label> 
          <textarea id="Mensaje" class="form-control" name="Mensaje" rows="4"></textarea>
          </div>
          <div class="col-lg-12">
      <label for="exampleInputFile">Adjuntar archivo</label>
      <input type="file" name="adjunto" id="archivo-adjunto">
      <p class="help-block"></p>
    </div>
          <button class="btn btn-primary pull-left" style="margin-left:15px" type="submit">Enviar</button>
        </div>
      </form>
    </div>

      <!-- javascript para confirmar datos del formulario.
      ================================================== -->
      <!-- La página carga más rapido si estan situados al final del documento. -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>

    </body>
    <section class="content">
        <div class="row">
          
        </div>
    </section>
  </div>
