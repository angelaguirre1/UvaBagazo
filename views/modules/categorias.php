<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border"> 
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            Agregar Categoria
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px";>#</th>
                <th>Categoria</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php

                  $item = null;
                  $valor = null;
                  $categoria = ControllerCategorias::ctrMostrarCategorias($item,$valor);

                  foreach ($categoria as $key => $value) {
                      echo '<tr>
                      <td>'.($key + 1).'</td>
                      <td>'.$value["categoria"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'"
                          data-toggle="modal"
                          data-target="#modalEditarCategoria" ><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                    </tr>';
                  }
              ?>

            </tbody>
          </table>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Agregar Categoria -->

  <div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Categoria</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaCategoria" placeHolder="Categoria" required>
                </div>
              </div>
            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Agregar Categoria</button>
          </div>

          <?php

            $crearCategoria = new ControllerCategorias();
            $crearCategoria->ctrCrearCategoria();

          ?>

      </form>
    </div>
  </div>
</div>

  <!-- Modal Editar Categoria -->

  <div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Categoria</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
                  <input type="hidden" name="idCategoria" id="idCategoria">
                </div>
              </div>
            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>

          <?php

            $editarCategoria = new ControllerCategorias();
            $editarCategoria->ctrEditarCategoria();

          ?>

      </form>
    </div>
  </div>
</div>

<?php

  $eliminarCategoria = new ControllerCategorias();
  $eliminarCategoria -> ctrBorrarCategoria();

?>