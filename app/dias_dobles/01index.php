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

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>

                        <th><?php echo $campo1; ?></th>
                        <th><?php echo $campo2; ?></th>
                        <th><?php echo $campo3; ?></th>
                        <th>Acciones</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php  while($row = $query->fetch_assoc()){  ?>
                        <tr>

                         <!--  <td><?php //echo $row['id']; ?></td> -->
                         <td><?php echo $row['nombre_completo']; ?></td>
                         <td><?php echo date('d-m-Y', strtotime($row['fecha'])) ; ?></td>
                         <td><?php echo $row['comentario']; ?></td>


                         <td>

                          <div  class="btn-group-vertical"> 

                            <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"><i class="fa fa-edit"></i> Editar</button>


                            <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>
                          </div>

                        </td>

                      </tr>
                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                    <tr>

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



<script>


  function funcionX(valor){
    //alert(valor);
    $('#modal-edit').modal('show');    
    var id = valor;    
    getRow(id);     

  }

  function funcionY(valor){
    //alert(valor);
    $('#modal-delete').modal('show');
    var id = valor;
    getRow(id);

  }

  
  $(function(){
    $('.edit').click(function(e){
      e.preventDefault();
      $('#modal-edit').modal('show');
      var id = $(this).data('id');

    // alert(id);
    
    getRow(id);
  });

    $('.delete').click(function(e){
      e.preventDefault();
      $('#modal-delete').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $('.photo').click(function(e){
      e.preventDefault();
      var id = $(this).data('id');
      getRow(id);
    });

  });

  function getRow(id){
    var tabla = '<?php echo $tabla; ?>';
    $.ajax({
      type: 'POST',
      url: '02data.php',
      data: {id:id,tabla:tabla},
      dataType: 'json',
      success: function(response){

      //$('.empid').val(response.empid);
      $('.empid').val(response.empid);//id del registro que se desea editar o eliminar
      $('.employee_id').html(response.nombreempleado);
      $('.del_employee_name').html(response.nombre);
      var date = response.fecha;
      date = date.split("-").reverse().join("-");
      //console.log(date);
      $("#edit_datepicker").val(date);//2022-03-01

$("#edit_usuarios_id").select2("val", response.usuario_id);
     // $('#edit_usuarios_id').val(response.usuario_id);
          $('#edit_comentario').val(response.comentario);


    }
  });
  }
</script>



</body>
</html>
