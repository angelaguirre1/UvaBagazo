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
    <section class="content">
        <div class="row">
        <body>
          <?php

          $Nombre = $_POST['Nombre'];
          $Email = $_POST['Email'];
          $Mensaje = $_POST['Mensaje'];
          $archivo = $_FILES['adjunto'];

          if ($Nombre=='' || $Email=='' || $Mensaje==''){

          echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

          }else{


              require("class.phpmailer.php");
              $mail = new PHPMailer();

              $mail->From     = $Email;
              $mail->FromName = $Nombre; 
              $mail->AddAddress("correo@tucorreo.com"); // Dirección a la que llegaran los mensajes.
            
          // Aquí van los datos que apareceran en el correo que reciba
              //adjuntamos un archivo 
                  //adjuntamos un archivo
                      
              $mail->WordWrap = 50; 
              $mail->IsHTML(true);     
              $mail->Subject  =  "Contacto";
              $mail->Body     =  "Nombre: $Nombre \n<br />".    
              "Email: $Email \n<br />".    
              "Mensaje: $Mensaje \n<br />";
              $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
              
              
              

          // Datos del servidor SMTP

              $mail->IsSMTP(); 
              $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
              $mail->SMTPAuth = true; 
              $mail->Username = "tucorreo@gmail.com";  // Correo Electrónico
              $mail->Password = "tucontraseña"; // Contraseña
              
              if ($mail->Send())
              echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');location.href ='javascript:history.back()';</script>";
              else
              echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

          }

          ?>

          <label>Nombre*</label> <input id="Nombre" class="form-control" type="text" name="Nombre" /> 
                  <label>Email*</label> <input id="Email" class="form-control" type="email" name="Email" />
                </div>
                  <div class="col-lg-6"><label>Mensaje*</label> 
                  <textarea id="Mensaje" class="form-control" name="Mensaje" rows="4"></textarea>
                  </div>
                  <div class="col-lg-12">
              <label for="exampleInputFile">Adjuntar archivo</label>
              <input type="file" name="adjunto" id="archivo-adjunto">
              <p class="help-block">Example block-level help text here.</p>
            </div>
                  <button class="btn btn-default pull-right" type="submit">Enviar</button>
                </div>
              </form>
            </div>
            
              <!-- javascript para confirmar datos del formulario.
              ================================================== -->
              <!-- La página carga más rapido si estan situados al final del documento. -->
              <script src="js/jquery.js"></script>
              <script src="js/bootstrap.min.js"></script>
        </div>
    </section>
  </div>
