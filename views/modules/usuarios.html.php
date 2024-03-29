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
                <th>Email</th>
                <th>Departamento</th>
                <th>Estado</th>
                <th>Ultimo Login</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Angel Ernesto Aguirre Jasso</td>
                <td>AngelAguirre</td>
                <td>jassoa53@gmail.com</td>
                <td>Administracion</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>4-9-2019 12:12:32</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </div>
                </td>
              </tr>
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
              <!-- Entrada para el nombre -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeHolder="Usuario" required>
                </div>
              </div>
              <!-- Entrada para el email -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeHolder="Email" required>
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
            </div>
          </div>
          <!-- Footer del modal -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
          </div>
      </form>
    </div>
  </div>
</div>