<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col"></div>
            <div class="col-7">
                <div id="calendario" style="width: 80%; display: inline-table; margin: 0px 20px 0px 100px"></div>
            </div>
            <div class="col"></div>
        </div>
    </section>
  </div>
  

<div id="modalAgregarEvento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Eventos</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el titulo -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-font"></i></span>
                  <input type="text" id="titulo" class="form-control input-lg" name="titulo" placeHolder="Titulo" required>
                </div>
              </div>
              <!-- Entrada para la descripcion -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                  <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeHolder="Descripcion" required>
                </div>
              </div>
              <!-- Entrada para la fecha -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" class="form-control input-lg" id="fecha" name="fecha" placeHolder="Fecha: YYYY/MM/DD" required>
                </div>
              </div>
              <!-- Entrada para la hora -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <input type="text" class="form-control input-lg" id="hora" name="hora" value="10:30" required>
                </div>
              </div>
              <!-- Entrada de color -->
              <div class="form-group">
                <div class="input-group">
                  <input type="color" name="color" id="color" placeholder="Color" value="#ff0000">
                </div>
              </div>
            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Agregar</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          </div>

          <?php
            $crearEvento = new ControllerEventos();
            $crearEvento -> ctrCrearEvento();
          ?>
        </form>
        </div>
    </div>
</div>


<div id="modalMostrarEvento" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="tituloEvento"></h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <div id="descripcionEvento"></div>
              <input type="hidden" name="idEvento" id="idEvento" value="0">
            </div>
          </div>

          <div class="modal-footer">
              <button type="submit" class="btn btn-danger" id="btnEliminar">Eliminar</button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          </div>

          <?php
              $eliminar = new ControllerEventos();
              $eliminar->ctrEliminarEvento();
          ?>
        </form>
        </div>
    </div>
</div>
