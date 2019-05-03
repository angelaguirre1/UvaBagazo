<aside class="main-sidebar">
    <section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <?php
                if($_SESSION["foto"] != ""){
                    echo '<img src="'.$_SESSION["foto"].'" class="user-image">';
                }else{
                    echo '<img src="views/images/users/default/anonymous.png" class="user-image">';
                }
            ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["usuario"]; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
        </div>
      </div>

        <ul class="sidebar-menu">
            <li class="active">
                <a href="inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li>
                <a href="usuarios">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            
            <li>
                <a href="calendario">
                    <i class="fa fa-calendar"></i>
                    <span>Calendario</span>
                </a>
            </li>

            <li>
                <a href="estadisticas">
                    <i class="fa fa-pie-chart"></i>
                    <span>Estadisticas</span>
                </a>
            </li>

            <li class="treeview">
                <a href="">
                    <i class="fa fa-list-ul"></i>
                    <span>Maquinaria</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="maquina-separacion">
                            <i class="fa fa-circle-o"></i>
                            <span>Separacion</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-horno">
                            <i class="fa fa-circle-o"></i>
                            <span>Horno</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-molino">
                            <i class="fa fa-circle-o"></i>
                            <span>Molino</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-tamizador">
                            <i class="fa fa-circle-o"></i>
                            <span>Tamizador</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-hidrolisis">
                            <i class="fa fa-circle-o"></i>
                            <span>Hidrolisis</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-filtro">
                            <i class="fa fa-circle-o"></i>
                            <span>Filtro</span>
                        </a>
                    </li>

                    <li>
                        <a href="maquina-extraccion">
                            <i class="fa fa-circle-o"></i>
                            <span>Extraccion</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="contacto">
                    <i class="fa fa-envelope-open"></i>
                    <span>Contacto</span>
                </a>
            </li>
            
        </ul>
    </section>
</aside>