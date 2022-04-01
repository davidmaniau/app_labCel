<?php include '00configuraciones.php';

$range_to = date('m/d/Y');
//$range_from = date('m/d/Y', strtotime('-15 day', strtotime($range_to)));
$range_from = date('m/d/Y');

?>

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

              <div class="input-group">

                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from . ' - ' . $range_to; ?>">
              </div>

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
                        <!-- <th><?php //echo $campo0; ?></th> -->

                        <th><?php echo $campo1; ?></th>
                        <th><?php echo $campo2; ?></th>
                        <th><?php echo $campo3; ?></th>
                        <th><?php echo $campo4; ?></th>
                        <th><?php echo $campo5; ?></th>
                        <th><?php echo $campo6; ?></th>
                        <th><?php echo $campo7; ?></th>
                        <th><?php echo $campo8; ?></th>
                        <th><?php echo $campo9; ?></th>
                        <th><?php echo $campo10; ?></th>
                        <th>Acciones</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php


                      $to = date('Y-m-d');
                      $from = date('Y-m-d');

                      if (isset($_GET['range'])) {
                        $range = $_GET['range'];
                        $ex = explode(' - ', $range);
                        $from = date('Y-m-d', strtotime($ex[0]));
                        $to = date('Y-m-d', strtotime($ex[1]));

                        $sql1v = "SELECT *, ".$tabla.".id as empid,
                        usuarios.nombre_completo as nombre_completo2,
                        concat(horarios.hora_inicio,' ',horarios.hora_final) as horarioempleado,
                        horarios.hora_inicio as hora_entrada_of,
                        horarios.hora_final as hora_salida_of

                        FROM ".$tabla."

                        left join usuarios on usuarios.id = ".$tabla.".usuario_id
                        left join horarios on horarios.id = usuarios.horario_id

                        where ".$tabla.".fecha between '$from' AND '$to'

                        order by ".$tabla.".fecha desc";

                      }

                      else{


                       $sql1v = "SELECT *, ".$tabla.".id as empid,
                       usuarios.nombre_completo as nombre_completo2,
                       concat(horarios.hora_inicio,' ',horarios.hora_final) as horarioempleado,
                       horarios.hora_inicio as hora_entrada_of,
                       horarios.hora_final as hora_salida_of

                       FROM ".$tabla."

                       left join usuarios on usuarios.id = ".$tabla.".usuario_id
                       left join horarios on horarios.id = usuarios.horario_id

                       where ".$tabla.".fecha between '$from' AND '$to'

                       order by ".$tabla.".fecha desc";



                     }




                     $query1v = $conn->query($sql1v);




                     while($row = $query1v->fetch_assoc()){  ?>
                      <tr>
                        <!-- <td><?php //echo $row['empid']; ?></td>  -->
                        <td><?php echo $row['nombre_completo2']; ?></td>

                        <td><?php echo    date('d/m/Y', strtotime($row['fecha'])) ; ?></td>

                        <?php $tiempoO = date('h:i A', strtotime($row['hora_entrada_of'])); ?>
                        <?php $tiempo1 = date('h:i A', strtotime($row['hora_entrada'])); ?>

                        <td><?php echo $tiempoO.'<br>'.$tiempo1; ?></td>

                        <?php
                        $status = ($row['estado_entrada']) ?
                        '<span class="badge badge-success">a tiempo</span>' :
                        '<span class="badge badge-danger">tarde</span>';
                        ?>




                        <td style="text-align: center;"><?php echo $status; ?></td>

                        <?php

                        $temporal = date('d/m/Y', strtotime($row['fecha2'])) ;


                        ?>

                        <?php
                        $status2 = ($row['fecha2']) ?

                        $temporal :



                        '<span class="badge badge-danger">Pendiente <br> de marcar</span>';
                        ?>

                        <td style="text-align: center;"><?php echo $status2; ?></td>



                        <?php //$tiempo2 = date('h:i A', strtotime($row['hora_salida'])); ?>

                        <?php $tiemposO = date('h:i A', strtotime($row['hora_salida_of'])); ?>
                        <?php $tiempos1 = date('h:i A', strtotime($row['hora_salida'])); ?>






                        <?php
                        $status3 = ( $row['hora_salida'] <> '00:00:00' ) ?
                        $tiemposO.'<br>'.$tiempos1 :
                        '<span class="badge badge-danger">Dato <br> Pendiente</span>';
                        ?>


                        <td style="text-align: center;"><?php echo $status3; ?></td>


                        <?php
                        $status4 = ($row['estado_salida']) ?
                        '<span class="badge badge-success">A tiempo</span>' :
                        '<span class="badge badge-danger">Dato <br> Pendiente</span>';
                        ?>

                        <td style="text-align: center;"><?php echo $status4; ?></td>


                        <?php
                        $status5 = ( $row['horas_tardes'] <> '0.00' ) ?
                        $row['horas_tardes'] :
                        '<span class="badge badge-danger">Sin Horas <br> Tardes</span>';
                        ?>

                        <td style="text-align: center;"><?php echo $status5; ?></td>


                        <?php
                        $status6 = ( $row['horas_extras'] <> '0.00' ) ?
                        $row['horas_extras'] :
                        '<span class="badge badge-danger">Sin Horas <br> extras</span>';
                        ?>

                        <td style="text-align: center;"><?php echo $status6; ?></td>

                        <?php
                        $status7 = ( $row['horas_trabajadas'] <> '0.00' ) ?
                        $row['horas_trabajadas'] :
                        '<span class="badge badge-danger">Dato <br> Pendiente</span>';
                        ?>


                        <td style="text-align: center;"><?php echo $status7; ?></td>

                        <td>

                          <div  class="btn-group-vertical">

                            <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"><i class="fa fa-edit"></i> Editar Entrada </button>

                            <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-primary btn-sm edit_s " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX_s(<?php echo $row['empid']; ?>)"><i class="fa fa-edit"></i> Editar Salida </button>


                            <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>
                          </div>

                        </td>

                      </tr>
                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <!-- <th><?php //echo $campo0; ?></th> -->
                      <th><?php echo $campo1; ?></th>
                      <th><?php echo $campo2; ?></th>
                      <th><?php echo $campo3; ?></th>
                      <th><?php echo $campo4; ?></th>
                      <th><?php echo $campo5; ?></th>
                      <th><?php echo $campo6; ?></th>
                      <th><?php echo $campo7; ?></th>
                      <th><?php echo $campo8; ?></th>
                      <th><?php echo $campo9; ?></th>
                      <th><?php echo $campo10; ?></th>

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

    $('#modal-edit_e').modal('show');    
    var id = valor;    
    getRow(id);     

  }

  function funcionX_s(valor){
    //alert(valor);

    $('#modal-edit_s').modal('show');    
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


    $("#reservation").on('change', function() {
      var range = encodeURI($(this).val());
      window.location = '01index.php?range=' + range;
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
      $('.del_employee_name').html(response.tasa1);
      
      $('#employee_name').html(response.tasa1);
      $('#edit_datepicker_add').val(response.fecha);
      $('#edit_tasa_c').val(response.tasa1);

      $('#edit_dato3').val(response.fecha);
      $('#edit_time_in').val(response.hora_entrada);


      if (response.hora_salida=='00:00:00')  {
// alert('hora de salida 0');


var now = new Date(Date.now());
var formatted = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

$('#edit_time_out').val(formatted);

}else
{
  $('#edit_time_out').val(response.hora_salida);
}


// var formattedDate = new Date(response.fecha);

// var d = formattedDate.getDate() +1 ;
// var m =  formattedDate.getMonth();
// m += 1;  // JavaScript months are 0-11
// var y = formattedDate.getFullYear();

// $("#datepicker_edit").val(d + "-" + m + "-" + y);

var date = response.fecha1;
date = date.split("-").reverse().join("-");
     // alert(date);
      $("#datepicker_edit").val(date);//2022-03-01






      var formattedDate2 = new Date(response.fecha2);

      if (response.fecha2==null)  {
  //alert("fecha 2 atencion");
}

var ds = formattedDate2.getDate() +1 ;
var ms =  formattedDate2.getMonth();
ms += 1;  // JavaScript months are 0-11
var ys = formattedDate2.getFullYear();


if (response.fecha2==null)  {
 // $("#datepicker_edit_s").val();
 $("#datepicker_edit_s").val( moment().format('D-MM-YYYY') );
}else
{
  $("#datepicker_edit_s").val(ds + "-" + ms + "-" + ys);
}




     // $('#datepicker_edit').val(response.fecha);

     
   }
 });
  }
</script>










</body>
</html>
