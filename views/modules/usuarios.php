<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            Agregar Usuario
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th style="width:10px";>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Email</th>
                <th>Departamento</th>
                <th>Estado</th>
                <th>Ultimo Login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>

              <?php
                $item = null;
                $valor = null;
                $usuarios = ControllerUsuarios::ctrMostrarUsuario($item,$valor);

                 foreach($usuarios as $key => $value){
                   echo '<tr>
                   <td>'.($key + 1).'</td>
                   <td>'.$value["nombre"].'</td>
                   <td>'.$value["usuario"].'</td>';

                   if($value["foto"] != ""){
                      echo '<td><img src="'.$value["foto"].'" class="img-thumbail" width="40px"></td>';
                    }else{
                      echo '<td><img src="views/images/users/default/anonymous.png" class="img-thumbail" width="40px"></td>';
                    }

                   echo'
                   <td>'.$value["email"].'</td>
                   <td>'.$value["departamento"].'</td>';



                   if($value["estado"] == 1){
                     echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                   }else{
                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                   }

                   echo'
                   
                   <td>'.$value["ultimo_login"].'</td>
                   <td>
                     <div class="btn-group">
                       <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                       <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>
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


  <!-- Modal Agregar Usuarios -->

  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Usuario</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeHolder="Nombre Completo" required>
                </div>
              </div>
              <!-- Entrada para el usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" placeHolder="Usuario" required>
                </div>
              </div>
              <!-- Entrada para el email -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" id="nuevoEmail" name="nuevoEmail" placeHolder="Email" required>
                </div>
              </div>
              <!-- Entrada para la contrasena -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeHolder="Password" required>
                </div>
              </div>
              <!-- Entrada de departamento -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoDepartamento">
                    <option value="">Seleccionar Departamento</option>
                    <option value="Administracion">Administracion</option>
                    <option value="Produccion">Produccion</option>
                  </select>
                </div>
              </div>

              <!-- Foto -->

              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" name="nuevaFoto" class="nuevaFoto">
                <p class="help-block">Peso maximo 5MB</p>
                <img src="views/images/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>

            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
          </div>

          <?php
            $crearUsuario = new ControllerUsuarios();
            $crearUsuario -> ctrCrearUsuario();
          ?>
      </form>
    </div>
  </div>
</div>

<!-- Modal editar usuario -->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <!-- Cabeza del modal -->
          <div class="modal-header" style="background:#3c8dbc; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Usuario</h4>
          </div>
          <!-- Cuerpo de el modal -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" value="" required>
                </div>
              </div>
              <!-- Entrada para el usuario -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="editarUsuario" id="editarUsuario" value="" readonly>
                </div>
              </div>
              <!-- Entrada para el email -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" value="" required>
                </div>
              </div>
              <!-- Entrada para la contrasena -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="password" class="form-control input-lg" name="editarPassword" placeHolder="Password">
                  <input type="hidden" name="passwordActual" id="passwordActual">
                </div>
              </div>
              <!-- Entrada de departamento -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="editarDepartamento">
                    <option value="" id="editarDepartamento"></option>
                    <option value="Administracion">Administracion</option>
                    <option value="Produccion">Produccion</option>
                  </select>
                </div>
              </div>

              <!-- Foto -->

              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" name="editarFoto" class="nuevaFoto">
                <p class="help-block">Peso maximo 5MB</p>
                <img src="views/images/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>

            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

          <?php
            $editarUsuario = new ControllerUsuarios();
            $editarUsuario -> ctrEditarUsuario();
          ?>
      </form>
    </div>
  </div>
</div>

<?php
    $borrarUsuario = new ControllerUsuarios();
    $borrarUsuario -> ctrBorrarUsuario();
?>