<?php 
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
    $id=$_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
      die(header("Location: ../404.php"));
    };
  include_once 'templates/barra.php'?>
  <!-- /.navbar -->
  
  <?php include_once 'templates/main-sidebar.php'?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Administrador</h1>
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
              <?php $sql= "SELECT * FROM administradores where id_admin=$id";
                    $resultado= $conn->query($sql);
                    $admin=$resultado->fetch_assoc(); ?>
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $admin['name']; ?>">
              </div>
              <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresar contraseña">
              </div>
              <input type="hidden" name="registro" value="actualizar">
              <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary" name="agregar-admin">Guardar</button>
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