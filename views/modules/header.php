<header class="main-header">

    <!-- Logotipo -->

    <a href="inicio" class="logo">

        <!-- Logotipo mini -->
        <span class="logo-mini">
            <img src="views/images/template/logo-mini.png" class="img-responsive"
            style = "padding:10px">
        </span>

        <!-- Logo normal -->

        <span class="logo-lg">
            <img src="views/images/template/logo-lg.png" class="img-responsive"
            style = "padding:10px 0px">
        </span>

        
    </a>

    <!-- Sidebar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!--Boton de naveggacion-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle Navigation</span>
        </a>

        <!-- perfil de usuario -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if($_SESSION["foto"] != ""){
                                echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
                            }else{
                                echo '<img src="views/images/users/default/anonymous.png" class="user-image">';
                            }
                        ?>
                         
                         <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>
                        <!-- dropdown toggle -->
                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>




    </nav>
</header>