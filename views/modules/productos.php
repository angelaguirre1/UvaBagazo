<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
            Agregar Producto
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px";>#</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php

                $item = null;

                $valor = null;

                $productos = ControllerProductos::ctrMostrarProductos($item,$valor);

                foreach ($productos as $key => $value) {
                  echo '<tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["codigo"].'</td>
                  <td>'.$value["descripcion"].'</td>';

                  $item = "id";
                  $valor = $value["id_categoria"];

                  $categoria = ControllerCategorias::ctrMostrarCategorias($item,$valor);

                  echo '
                  <td>'.$categoria["categoria"].'</td>
                  <td><button class="btn btn-success btn-xs">'.$value["stock"].'</button></td>
                  <td>'.'$'.$value["precio"].'</td>
                  <td>'.$value["fecha"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarProducto" data-toggle="modal" data-target="#modalEditarProducto" idProducto="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarProducto"
                      idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>
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


  <!-- Modal Agregar Producto -->

  <div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Producto</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeHolder="Nombre" required>
                </div>
              </div>

              <!-- Entrada del codigo -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoCodigo" placeHolder="Codigo" required>
                </div>
              </div>

              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeHolder="Descripcion" required>
                </div>
              </div>

              <!-- Entrada de categoria -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg" name="nuevaCategoria">
                    <option value="">Seleccionar Categoria</option>
                    <?php
                       $categoria = ControllerCategorias::ctrMostrarCategorias(null,null);

                       foreach ($categoria as $key => $value) {
                         echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                       }
                    ?>

                  </select>
                </div>
              </div>

              <!-- Entrada para el stock -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-tags"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeHolder="Stock" required>
                </div>
              </div>

              <!-- Entrada para el precio -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                  <input type="number" step="any" class="form-control input-lg" name="nuevoPrecio" min="0" placeHolder="Precio" required>
                </div>
              </div>

            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
          </div>

          <?php
            $productos = new ControllerProductos();
            $productos->ctrCrearProducto();
          ?>
      </form>
    </div>
  </div>
</div>



<div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Producto</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                  <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>
                </div>
              </div>

              <!-- Entrada del codigo -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-code"></i></span>
                  <input type="text" class="form-control input-lg" name="editarCodigo" id="editarCodigo" readonly required>
                </div>
              </div>

              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                </div>
              </div>

              <!-- Entrada de categoria -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                  <select class="form-control input-lg" name="editarCategoria" readonly>
                    <option id="editarCategoria"></option>
                  </select>
                </div>
              </div>

              <!-- Entrada para el stock -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-tags"></i></span>
                  <input type="number" class="form-control input-lg" name="editarStock" min="0" id="editarStock" required>
                </div>
              </div>

              <!-- Entrada para el precio -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa  fa-dollar"></i></span>
                  <input type="number" step="any" class="form-control input-lg" name="editarPrecio" min="0" id="editarPrecio" required>
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
            $editarProducto = new ControllerProductos();
            $editarProducto -> ctrEditarProducto();
          ?>
      </form>
    </div>
  </div>
</div>

<?php
  $eliminarPorducto = new ControllerProductos();
  $eliminarPorducto->ctrEliminarProducto();
?>