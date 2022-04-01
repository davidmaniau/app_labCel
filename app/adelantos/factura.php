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




          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php //echo $titulo_modulo; ?></li>
            </ol> -->
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

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <th><?php echo $campo1; ?></th>
                    <th><?php echo $campo2; ?></th>
                    <th><?php echo $campo3; ?></th>

                      <th><?php echo $campo4; ?></th>
                     <th><?php echo $campo5; ?></th>
                     <th><?php echo $campo6; ?></th>

                      <th><?php echo $campo7; ?></th>
                     <th><?php echo $campo8; ?></th>
                     <th><?php echo $campo9; ?></th>

                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  while($row = $querynt->fetch_assoc()){  ?>
                      <tr>

                        <td><?php echo $row[$dato1]; ?></td>
                        <td><?php echo $row[$dato2]; ?></td>
                        <td><?php echo $row[$dato3]; ?></td>

                        <td><?php echo $row[$dato4]; ?></td>
                        <td><?php echo $row[$dato5]; ?></td>
                        <td><?php echo $row[$dato6]; ?></td>

                         <td><?php echo $row[$dato7]; ?></td>
                        <td><?php echo $row[$dato8]; ?></td>
                        <td><?php echo $row[$dato9]; ?></td>

                        <td>
                          
                          <div  class="btn-group-vertical">

                            <button style="margin-top: 0px;margin-bottom: 5px;" class="btn btn-primary btn-sm edit "  data-id="<?php echo $row[$dato0];  ?>" onclick = "funcionXq(<?php echo $row[$dato0]; ?>)"><i class="fa fa-edit"></i> Pasar Consulta </button>

                            <!-- <a style="color: white; margin-top: 0px;margin-bottom: 5px;" class="btn btn-warning btn-sm "  href="<?php //echo '../consultas/01index.php?paciente_id='.$row[$dato0];  ?>"> <i class="fa fa-check"></i>  Pasar Consulta </a> -->


                            <button style="margin-top: 0px;margin-bottom: 5px;" class="btn btn-success btn-sm edit "  data-id="<?php echo $row[$dato0];  ?>" onclick = "funcionX(<?php echo $row[$dato0]; ?>)"><i class="fa fa-edit"></i> Editar</button>



                            <button style="margin-top: 0px;margin-bottom: 5px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row[$dato0]; ?>" onclick = "funcionY(<?php echo $row[$dato0]; ?>)"><i class="fa fa-trash"></i> Eliminar</button>
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

                      <th><?php echo $campo4; ?></th>
                     <th><?php echo $campo5; ?></th>
                     <th><?php echo $campo6; ?></th>

                       <th><?php echo $campo7; ?></th>
                     <th><?php echo $campo8; ?></th>
                     <th><?php echo $campo9; ?></th>

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
   // alert(valor);

    $('#modal-edit').modal('show');
    var id = valor;
    getRow(id);

  }


function funcionXq(valor){
   // alert(valor);

    $('#modal-editq').modal('show');
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
  $('.edit_e').click(function(e){
    e.preventDefault();
    $('#modal-edit_e').modal('show');
    var id = $(this).data('id');

    // alert(id);

    getRow(id);
  });



  $('.edit_s').click(function(e){
    e.preventDefault();
    $('#modal-edit_s').modal('show');
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

      $('.empid').val(response.idp);//id del registro que se desea editar o eliminar

      $('.employee_id').html(response.nombreempleado);
      $('.del_employee_name').html(response.nombre_paciente);



      $('#edit_dato3').val(response.fecha);


       $('#edit_idp').val(response.idp);
       $('#edit_nombre').val(response.nombre_paciente);
       $('#edit_edad').val(response.edad);
       $('#edit_telefono').val(response.telefono);
       $('#edit_promotor_id').val(response.promotor_id);
       $('#edit_ciudad_id').val(response.ciudad_id);


       $('#edit_datepicker_edit').val(response.fecha);

       $('#edit_ocupacion').val(response.ocupacion);



// if (response.hora_salida=='00:00:00')  {
// alert('hora de salida 0');


// var now = new Date(Date.now());
// var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

//         $('#edit_time_out').val(formatted);

// }else
// {
//         $('#edit_time_out').val(response.hora_salida);
// }


var formattedDate = new Date(response.fecha);

var d = formattedDate.getDate() +1 ;
var m =  formattedDate.getMonth();
m += 1;  // JavaScript months are 0-11
var y = formattedDate.getFullYear();

$("#datepicker_edit").val(d + "-" + m + "-" + y);


var formattedDate2 = new Date(response.fecha2);

// if (response.fecha2==null)  {
//   //alert("fecha 2 atencion");
// }

var ds = formattedDate2.getDate() +1 ;
var ms =  formattedDate2.getMonth();
ms += 1;  // JavaScript months are 0-11
var ys = formattedDate2.getFullYear();


// if (response.fecha2==null)  {
//  // $("#datepicker_edit_s").val();
//        $("#datepicker_edit").val( moment().format('D-MM-YYYY') );
// }else
// {
// $("#datepicker_edit").val(ds + "-" + ms + "-" + ys);
// }




     // $('#datepicker_edit').val(response.fecha);


    }
  });
}
</script>

</body>
</html>
