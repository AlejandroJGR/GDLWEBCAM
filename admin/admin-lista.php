<?php 
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/main-sidebar.php' ?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="col-sm-6">
        <h1>Lista de Administradores</h1>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card">
          
          <div class="card-body">
            <table id="registros" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                  try{
                      $sql= "SELECT id_admin, username, name FROM administradores";
                      $resultado=$conn->query($sql);

                  }catch (Exception $e){
                    $error=$e->getMessage();
                    echo $error;
                  }
                  
                while ($admin=$resultado->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $admin['username']; ?></td>
                    <td><?php echo $admin['name']; ?></td>
                    <td>
                      <a href="editar-admin.php?id=<?php echo $admin['id_admin'];?>" class="btn bg-orange btn-sm margin btn-flat"> <i class="fas fa-pencil-alt"></i></a>
                      <a href="#" data-id="<?php echo $admin['id_admin'];?>" data-tipo="admin" class="btn bg-red btn-sm margin btn-flat borrar_registro"> <i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>

                <?php } ?>
              </tbody>
              <tfoot>
              <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Actions</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
            </div>
      </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'?>