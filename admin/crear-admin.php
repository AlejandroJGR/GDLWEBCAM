<?php 
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
  include_once 'templates/barra.php'?>
  <!-- /.navbar -->
  
  <?php include_once 'templates/main-sidebar.php'?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-sm-6">
        <h1>Crear Administradores</h1>
      </div>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card col-sm-6">
        <div class="card-body">
          <form role="form" method="POST" name="guardar-registro" id="guardar-registro" action="modelo-admin.php">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar nombre">
              </div>
              <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingresar nombre de usuario">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar contraseña">
              </div>
              <div class="form-group">
                <label for="password">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confirmar_password" name="confirmar_password" placeholder="Ingresar contraseña">
                <span id="resultado_password" class="help-block"></span>
              </div>
              <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" name="agregar-admin" id="crear_registro">Añadir</button>
            </form> 
          </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'?>