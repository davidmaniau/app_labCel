<?php include '00configuraciones.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo_pagina; ?></title>
        <?php include '../include/header.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php include '../include/menu_superior.php'; ?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
    <?php include '../include/menu_lateral_izquierdo.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $titulo_modulo; ?></h1>

<br>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-add">
                  Nueva <?php echo $titulo_modulo; ?>
                </button>
<br>

<!-- <br>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit">
                  Modificar <?php //echo $titulo_modulo; ?>
                </button>
<br>

<br>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-picture">
                  Editar foto <?php //echo $titulo_modulo; ?>
                </button>
<br>

<br>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-delete">
                  Eliminar <?php //echo $titulo_modulo; ?>
                </button>
<br> -->


          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $titulo_modulo; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


<?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i>¡Proceso Exitoso!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">



            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registros grabados previamente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><?php echo $campo0; ?></th>
                    <th><?php echo $campo1; ?></th>
                    <th><?php echo $campo2; ?></th>
                    <th><?php echo $campo3; ?></th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  while($row = $query->fetch_assoc()){  ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['usuario_crea']; ?></td>
                        <td><?php echo $row['fecha_crea']; ?></td>
                        
                        <td>
                          
                          <div  class="btn-group-vertical"> 

<button class="btn btn-success btn-sm edit " data-id="<?php echo $row['.$campo0.'];  ?>" onclick = "funcionX(<?php echo $row['.$campo0.']; ?>)"><i class="fa fa-edit"></i> Editar</button>

<button class="btn btn-danger btn-sm delete " data-id="<?php echo $row['.$campo0.']; ?>" onclick = "funcionY(<?php echo $row['.$campo0.']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>

</div>

                        </td>

                      </tr>
                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><?php echo $campo0; ?></th>
                    <th><?php echo $campo1; ?></th>
                    <th><?php echo $campo2; ?></th>
                    <th><?php echo $campo3; ?></th>
                    <th>Acciones</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <?php include '03modal.php'; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include '../include/footer.php'; ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include '../include/scriptsx.php'; ?>
</body>
</html>
