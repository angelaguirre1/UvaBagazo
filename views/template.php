<?php
  session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uva Bagazo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

   <link rel="icon" href="views/images/template/logo-mini.png">
  
  <!-- PLUGINS DE CSS -->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" href="views/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Data Tables -->
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="views/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">


  <!-- PLUGINS DE JAVASCRIP -->

  <!-- jQuery 3 -->
  <script src="views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="views/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="views/dist/js/demo.js"></script>
  <!-- Data Tables -->
  <script src="views/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <script src="views/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script> 
  <!-- Sweetalert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- InputMask -->
  <script src="views/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="views/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="views/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- Jquery Number -->
  <script src="views/plugins/jqueryNumber/jquerynumber.min.js"></script>
  
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->
    <?php

    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok")
    {

      echo '<div class="wrapper">';

      // header
      include "modules/header.php";
      // menu
      include "modules/menu.php";

      if(isset($_GET["ruta"])){
        if($_GET["ruta"] == "inicio" ||
           $_GET["ruta"] == "usuarios" ||
           $_GET["ruta"] == "estadisticas" ||
           $_GET["ruta"] == "contacto" ||
           $_GET["ruta"] == "enviar" ||
           $_GET["ruta"] == "maquina-separacion" ||
           $_GET["ruta"] == "maquina-horno" ||
           $_GET["ruta"] == "maquina-molino" ||
           $_GET["ruta"] == "maquina-tamizador" ||
           $_GET["ruta"] == "maquina-hidrolisis" ||
           $_GET["ruta"] == "maquina-filtro" ||
           $_GET["ruta"] == "maquina-extraccion" ||
           $_GET["ruta"] == "salir" ||
           $_GET["ruta"] == "calendario" ||
           $_GET["ruta"] == "enviar" ||
           $_GET["ruta"] == "clientes" ||
           $_GET["ruta"] == "categorias" ||
           $_GET["ruta"] == "productos" ||
           $_GET["ruta"] == "ventas" ||
           $_GET["ruta"] == "crear-venta" ||
           $_GET["ruta"] == "reportes"){

            
          include "modules/".$_GET["ruta"].".php";
        }else if($_GET["ruta"] == "eventos"){
          include "modules/".$_GET["ruta"].".php";
        }else{
          include "modules/404.php";
        }
      }else{
        include "modules/inicio.php";
      }

      //footer
      include "modules/footer.php";

      echo '</div>';

    }else{
      include "modules/login.php";
    }
    ?>

    <script src = "views/js/template.js"></script>
    
    <!-- <script src="views/js/jquery.min.js"></script> -->
    <script src="views/js/moment.min.js"></script>
    <link rel="stylesheet" href="views/css/fullcalendar.min.css">
    <script src="views/js/fullcalendar.min.js"></script>
    <script src="views/js/es.js"></script>
    <script src = "views/js/calendario.js"></script>
    <script src = "views/js/usuarios.js"></script>
    <script src = "views/js/categorias.js"></script>
    <script src = "views/js/productos.js"></script>
    <script src = "views/js/clientes.js"></script>
    <script src = "views/js/ventas.js"></script>
    
</body>
</html>
