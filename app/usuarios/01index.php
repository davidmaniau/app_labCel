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
                  <h3 class="card-title">Registros grabados previamente</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th><?php echo $campo1; ?></th>
                        <th><?php echo $campo3; ?></th>
                        <th><?php echo $campo4; ?></th>
                        <th><?php echo $campo5; ?></th>
                        <th><?php echo $campo6; ?></th>

                        <th>DNI</th>
                        <th>numero cuenta</th>
                        <th>salario mensual</th>

                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  while($row = $query->fetch_assoc()){  ?>
                        <tr>

                          <td><img src="<?php echo (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg'; ?>" width="64px" height="64px"> <a href="#modal-edit-picture" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"><span class="fa fa-edit"></span></a></td>


                          <td><?php echo $row['username']; ?></td>

                          <td><?php echo $row['rol_descrip']; ?></td>
                          <td><?php echo $row['nombre_completo']; ?></td>
                          <td><?php echo $row['cargo_descrip']; ?></td>
                          <td><?php echo $row['hora_inicio'].'<br>'.$row['hora_final']; ?></td>

                          <td><?php echo $row['dni']; ?></td>
                          <td><?php echo $row['numero_cuenta']; ?></td>
                          <td><?php echo $row['salario_m']; ?></td>


                          <td>

                            <div  class="btn-group-vertical">

                              <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"><i class="fa fa-edit"></i> Editar</button>

                              <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-warning btn-sm edit2 " data-id="<?php echo $row['empid']; ?>" onclick = "funcionX_1(<?php echo $row['empid']; ?>)"><i class="fa fa-key"></i> Nueva Contraseña</button>

                              <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>

                            </div>





                          </td>

                        </tr>
                      <?php  }  ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Foto</th>
                        <th><?php echo $campo1; ?></th>
                        <th><?php echo $campo3; ?></th>
                        <th><?php echo $campo4; ?></th>
                        <th><?php echo $campo5; ?></th>
                        <th><?php echo $campo6; ?></th>

                        <th>DNI</th>
                        <th>numero cuenta</th>
                        <th>salario mensual</th>

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

  function funcionX_1(valor){
    //alert(valor);

    $('#edit2').modal('show');
    var id = valor;
    getRow(id);

  }

  function funcionY(valor){
    
    //alert(valor);

    $('#modal-delete').modal('show');
    var id = valor;
    getRow(id);

  }

  function funcionZ(valor){
    
    //alert(valor);

    $('#modal-edit-picture').modal('show');
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


    $('.edit2').click(function(e) {
      e.preventDefault();
      $('#edit2').modal('show');
      var id = $(this).data('id');
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
    //alert(id);
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
      $('.user_id_photo').val(response.empid);

      $('.employee_id').html(response.nombreempleado);
      $('.del_employee_name').html(response.tasa1);
      
      $('#employee_name').html(response.tasa1);
      $('#edit_datepicker_add').val(response.fecha);



      $('#edit_username').val(response.username);
      $('#edit_nombre_completo').val(response.nombre_completo);
      $('#edit_password').val(response.password);
      $('#edit_rol_id').val(response.rol_id);
      $('#edit_cargo_id').val(response.cargo_id);
      $('#edit_horario_id').val(response.horario_id);

      $('#edit_dni').val(response.dni);
      $('#edit_no_cuenta').val(response.numero_cuenta);
      $('#edit_salario').val(response.salario_m);
      

      $('#edit_nombre_usuario').val(response.username);
     // $('#edit_clave').val(response.clave);



     $('#edit_tasa_c').val(response.tasa1);

     $('#edit_dato3').val(response.fecha);
     $('#edit_time_in').val(response.hora_entrada);
     $('#edit_time_out').val(response.hora_salida);


     // $('#datepicker_edit').val(response.fecha);

   }
 });
  }
</script>



</body>
</html>
