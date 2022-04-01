<?php include '00configuraciones.php';
$range_to1_1 = date('m/d/Y');
$range_from1_1 = date('m/d/Y');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  if (isset($_GET['t']))
  {
    $t = $_GET['t'];
    $CONSULTA = "SELECT * FROM usuarios where id = ".$t;
    $EJECUTAR = $conn->query($CONSULTA);
    $RESPUESTA = $EJECUTAR->fetch_assoc();
    $nombreEmpleadoSelect =  $RESPUESTA['nombre_completo'];
  }
  else{
   $nombreEmpleadoSelect =  "";
 }

 ?>


 <title><?php echo $titulo_pagina.' '.$nombreEmpleadoSelect; ?></title>
 <?php include '../include/header.php'; ?>



</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include '../include/menu_superior_planilla.php'; ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include '../include/menu_lateral_izquierdo.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php
//echo $fecha_actual;


      $fecha = $fecha_actual;
      $fechaComoEntero = strtotime($fecha);


//Primer día del mes:
      date('Y-m-01');
//Último día del mes:
      date('Y-m-t');





      $anio = date("Y", $fechaEntera);
      $mes = date("m", $fechaEntera);
      $dia = date("d", $fechaEntera);

//echo '<br>'.$dia;

      $hora = date("H", $fechaEntera);
      $minutos = date("i", $fechaEntera);
      $segundos = date("s", $fechaEntera);

      $month_start = strtotime('first day of this month', time());
      $month_end = strtotime('last day of this month', time());

      $dia_actual=date("d");

      //echo 'numero del dia del mes actual '.$dia_actual;




      if ($dia_actual <= 15)
      {
  //primera quincena
        //echo '<br> primer dia del mes actual: '.date('d/m/Y', $month_start);
        $inicio = 0;
        $range_to = date('d/m/Y', strtotime('14 day', $month_start));
        //echo '<br> dia primera quincena del mes actual: '.$range_to;
        $range_from= date('d/m/Y', strtotime('0 day', $month_start));


        $range_to1 = date('Y/m/d', strtotime('14 day', $month_start));
        $range_from1= date('Y/m/d', strtotime('0 day', $month_start));

        $limite = 15;
      }
      else{
        $inicio = 15;
        $range_to = date('d/m/Y', strtotime('15 day', $month_start));

        $range_from1 = date('Y/m/d', strtotime('15 day', $month_start));
        $range_to1= date('Y/m/d', strtotime('0 day', $month_end));
        //echo '<br> primer dia de la 2da quincena del mes actual: '.$range_to;
        //echo '<br> ultimo dia de la 2da quincena del mes actual: '.date('d/m/Y', $month_end);
        $limite=date('d', $month_end);
      }


      // El resultados sera 3 dias
      //echo '<br> este mes tiene '.date('d', $month_end). ' dias';

      ?>

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


                  <!-- CONTROL O SELECTOR DE FECHAS -->
        <!--           <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>

                    <input type="text" class="form-control float-right" id="reservation" value="<?php //echo (isset($_GET['range'])) ? $_GET['range'] : $range_from1_1 . ' - ' . $range_to1_1; ?>">
                  </div> -->

                  <!-- Date -->
                  <div class="form-group">
                    <div class="input-group date" >

                      <input type="text"  id="reservationdate" class="form-control datetimepicker-input" data-toggle="datetimepicker"  value="<?php echo date("d-m-Y");?>" onChange = "myAlertFunction()" >

                    </div>
                  </div>



                  <br>

                  <?php
                  if (isset($_GET['t']))
                    {   $t = $_GET['t'];    ?>
                  <div class="form-group row">
                   <label style="text-align: right;" for="listar" class="col-sm-3 control-label"> Empleado:  </label>
                   <div class="col-sm-9">
                    <select class="form-control" name="zona" id="listar" required>
                      <option value="" > Seleccione el nombre del Empleado </option>
                      <?php
                      $sql_2 = "SELECT * FROM usuarios ";
                      $query_2 = $conn->query($sql_2);
                      while ($prow = $query_2->fetch_assoc()) {
                        if ($prow['id'] == $t) {
                          echo "<option value='" . $prow['id'] . "' selected>" . $prow['nombre_completo'] . "</option>";
                          $nombreEmpleadoSelect = $prow['nombre_completo'];
                        }
                        else{
                         echo "<option value='" . $prow['id'] . "'>" . $prow['nombre_completo'] . "</option>";
                       }
                     }
                     ?>
                   </select>
                 </div>
               </div>


               <div class="row">
                <?php
                if (isset($_GET['t']))
                {
                  $t = $_GET['t'];
                  $CONSULTA = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." where estado_registro = '1' and id = ".$t;
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $VALOR_BUSCADO =  $RESPUESTA['falto'];

                  $salario_quincenal = $RESPUESTA['salario_m'] / 2;
                  $salario_dia = $RESPUESTA['salario_m'] / date('d', $month_end);

                    //ADELANTOS
                  $CONSULTA = "SELECT sum(monto) as total_adelantos
                  FROM adelantos  where fecha between '$range_from1' AND '$range_to1' and usuario_id = $t";
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $adelantos =  $RESPUESTA['total_adelantos'];

//echo $CONSULTA;

                    //DEDUCCIONES
                  $CONSULTA = "SELECT sum(monto) as total_deducciones
                  FROM deducciones  where fecha between '$range_from1' AND '$range_to1' and usuario_id = $t";
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $total_deducciones =  $RESPUESTA['total_deducciones'];

                    //DIAS FALTADOS
                  $CONSULTA = "SELECT count(*) as total_faltas
                  FROM asistencias_faltas  where fecha between '$range_from1' AND '$range_to1' and usuario_id = $t";
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $total_faltas =  $RESPUESTA['total_faltas'];


                    //DIAS DOBLES
                  $CONSULTA = "SELECT count(*) as total_dobles
                  FROM asistencias_dobles  where fecha between '$range_from1' AND '$range_to1' and usuario_id = $t";
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $total_dobles =  $RESPUESTA['total_dobles'];


 // CONSULTA PARA OBTENER UN VALOR

                  $CONSULTA = "SELECT * FROM usuarios";
                  $EJECUTAR = $conn->query($CONSULTA);
                  $RESPUESTA = $EJECUTAR->fetch_assoc();
                  $dato1 =  $RESPUESTA['dato1'];
                  $dato2 =  $RESPUESTA['dato2'];
                  $dato3 =  $RESPUESTA['dato3'];
                  $dato4 =  $RESPUESTA['dato4'];
                  $dato5 =  $RESPUESTA['dato5'];
                  $dato6 =  $RESPUESTA['dato6'];
                  $dato7 =  $RESPUESTA['dato7'];



                }

                ?>




                <div class="col-sm-2 col-3">
                  <div class="description-block border-right">
                    <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                    <h5 class="description-header text-success">L. <?php echo number_format($salario_quincenal,2) ; ?></h5>
                    <span class="description-text"><strong> SALARIO QUINCENAL</strong></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->




                <div class="col-sm-2 col-3">
                  <div class="description-block border-right">
                    <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                    <h6 class="description-header text-primary">L. <?php echo number_format(($total_dobles*$salario_dia),2) ; ?></h6>
                    <span class="description-text"><strong>+ DIAS DOBLE </strong></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->




                <div class="col-sm-2 col-3">
                  <div class="description-block border-right">
                   <!--  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> -->
                   <h6 class="description-header text-danger">L. <?php echo number_format( $adelantos,2); ?></h6>
                   <span class="description-text"><strong> - ANTICIPOS</strong></span>
                 </div>
                 <!-- /.description-block -->
               </div>
               <!-- /.col -->



               <div class="col-sm-2 col-3">
                <div class="description-block border-right">
                  <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                  <h6 class="description-header text-danger">L. <?php echo number_format(($total_faltas*$salario_dia),2) ; ?></h6>
                  <span class="description-text"><strong>- DIAS FALTADOS </strong></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->



              <div class="col-sm-2 col-3">
                <div class="description-block">
                  <!--       <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                  <h6 class="description-header text-danger">L. <?php echo number_format($total_deducciones,2) ; ?></h6>
                  <span class="description-text"><strong> - DEDUCCIONES</strong></span>
                </div>
                <!-- /.description-block -->
              </div>






              <div class="col-sm-2 col-3">
                <div class="description-block">

                  <h6 class="description-header text-success">L. <?php echo number_format(($adelantos  + ($total_deducciones) + ($total_faltas*$salario_dia) - ($total_dobles*$salario_dia) - ($salario_quincenal)),2) ; ?></h6>
                  <span class="description-text"><strong>= NETO A PAGAR</strong></span>
                </div>
                <!-- /.description-block -->
              </div>




              <?php

            }
            else{
             ?>

             <div class="form-group row">
               <label style="text-align: right;" for="listar" class="col-sm-3 control-label"> Empleados </label>
               <div class="col-sm-9">
                <select class="form-control" name="zona" id="listar" required>
                  <option value="" selected> Seleccione el nombre del Empleado </option>
                  <?php

                  $sql_2 = "SELECT * FROM usuarios";
                  $query_2 = $conn->query($sql_2);
                  while ($prow = $query_2->fetch_assoc()) {
                    echo "<option value='" . $prow['id'] . "'>" . $prow['nombre_completo'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>


                <?php  } //echo 'valor: '.$t;
                ?>



              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php


              //$tabla_1 = "asistencias";
                if (isset($_GET['t']))
                {
                  $t = $_GET['t'];
                  $sql = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." where estado_registro = '1' and id = ".$t;
                //echo $sql;
                }else
                {
                  $sql = "SELECT *, ".$tabla.".id as empid FROM ".$tabla." where estado_registro = '1'";
                }

                $query = $conn->query($sql);
                $row = $query->fetch_assoc();


                ?>


                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                    <tr>

                     <th>Fecha</th>
                     <th>Sueldo <br>Diario</th>
                     <th>Dias <br>Doble</th>
                     <th>Anticipos</th>
                     <th>Dias <br>Faltados</th>
                     <th>Deducciones</th>
                     <th>OBSERVACIONES</th>

                   </tr>
                 </thead>
                 <tbody>
                  <?php  for ($i=$inicio; $i < $limite ; $i++) {

                    ?>

                    <tr>
                      <?php
                      $salario_dia = $row['salario_m'] / date('d', $month_end);
                      ?>

                      <!-- strtotime('15 day', $month_start) -->
                      <!-- FECHA -->
                      <td><?php echo date('d/m/Y', strtotime($i.' day', $month_start));?></td>
                      <!-- SUELDO DIARIO -->
                      <td><?php echo number_format($salario_dia,2); ?></td>
                      <!-- DIAS DOBLE -->
                      <td style="color: green;">

                        <?php
                        if (isset($_GET['t']))
                        {
                          $t = $_GET['t'];
                          $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));
                          $CONSULTA = "SELECT count(*) as falto FROM asistencias_dobles  where fecha = '$fecha_eva' and usuario_id = $t";
                          $EJECUTAR = $conn->query($CONSULTA);
                          $RESPUESTA = $EJECUTAR->fetch_assoc();
                          $VALOR_BUSCADO =  $RESPUESTA['falto'];
                          if ($VALOR_BUSCADO>0) {
                            echo '<strong>'.number_format(($salario_dia*1),2).'</strong>'  ;
                          }
                          else{
                          }
                        }
                        ?>


                      </td>
                      <!-- ANTICIPOS -->
                      <td style="color: red;"> <strong>
                       <?php
                       if (isset($_GET['t']))
                       {
                        $t = $_GET['t'];
                        //ANTICIPOS
                        $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));
                        $CONSULTA = "SELECT monto FROM adelantos  where fecha = '$fecha_eva' and usuario_id = $t";
                        $EJECUTAR = $conn->query($CONSULTA);
                        $RESPUESTA = $EJECUTAR->fetch_assoc();
                        $VALOR_BUSCADO =  $RESPUESTA['monto'];
                        //echo $CONSULTA;
                        echo  $VALOR_BUSCADO;
                      }
                      ?>
                    </strong>
                  </td>
                  <!-- DIAS FALTADOS -->
                  <td style="color: red;">

                    <?php
                    if (isset($_GET['t']))
                    {
                      $t = $_GET['t'];
                      $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));
                      $CONSULTA = "SELECT count(*) as falto FROM asistencias_faltas  where fecha = '$fecha_eva' and usuario_id = $t";
                      $EJECUTAR = $conn->query($CONSULTA);
                      $RESPUESTA = $EJECUTAR->fetch_assoc();
                      $VALOR_BUSCADO =  $RESPUESTA['falto'];
                      if ($VALOR_BUSCADO>0) {
                        echo '<strong>'.number_format($salario_dia,2).'</strong>'  ;
                      }
                      else{
                      }
                    }
                    ?>


                  </td>
                  <td style="color: red;">
                    <strong>
                       <?php //DEDUCCIONES


                       if (isset($_GET['t']))
                       {
                        $t = $_GET['t'];
                        //ANTICIPOS
                        $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));
                        $CONSULTA = "SELECT monto FROM deducciones  where fecha = '$fecha_eva' and usuario_id = $t";
                        $EJECUTAR = $conn->query($CONSULTA);
                        $RESPUESTA = $EJECUTAR->fetch_assoc();
                        $VALOR_BUSCADO =  $RESPUESTA['monto'];
                        //echo $CONSULTA;
                        echo  $VALOR_BUSCADO;}




                        ?>
                      </strong>
                    </td>

                      <td>  <?php //OBSERVACIONES

                      if (isset($_GET['t'])){
                        $t = $_GET['t'];
                        $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));

                        $CONSULTA = "SELECT comentario FROM asistencias_faltas  where fecha = '$fecha_eva' and usuario_id = $t";
                        $EJECUTAR = $conn->query($CONSULTA);
                        $RESPUESTA = $EJECUTAR->fetch_assoc();
                        $comentario =  $RESPUESTA['comentario'];
                        if ($comentario<>'') {
                          echo '<strong> En la fecha '.$fecha_eva.' se registro una inasistentica y el comentario es: '.$comentario.'</strong><br><br>'  ;
                        }
                        else{
                        }
                      }

                      if (isset($_GET['t'])){
                        $t = $_GET['t'];
                        $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));

                        $CONSULTA = "SELECT comentario FROM asistencias_dobles  where fecha = '$fecha_eva' and usuario_id = $t";
                        $EJECUTAR = $conn->query($CONSULTA);
                        $RESPUESTA = $EJECUTAR->fetch_assoc();
                        $comentario =  $RESPUESTA['comentario'];
                        if ($comentario<>'') {
                          echo '<strong> En la fecha '.$fecha_eva.' se registro una ASISTENCIA DOBLE  y el comentario es: '.$comentario.'</strong><br><br>'  ;
                        }
                        else{
                        }
                      }

                      if (isset($_GET['t'])){
                        $t = $_GET['t'];
                        $fecha_eva = date('Y-m-d', strtotime($i.' day', $month_start));

                        $CONSULTA = "SELECT comentario FROM deducciones  where fecha = '$fecha_eva' and usuario_id = $t";
                        $EJECUTAR = $conn->query($CONSULTA);
                        $RESPUESTA = $EJECUTAR->fetch_assoc();
                        $comentario =  $RESPUESTA['comentario'];
                        if ($comentario<>'') {
                          echo '<strong> En la fecha '.$fecha_eva.' se registro una DEDUCCION y el comentario es: '.$comentario.'</strong><br><br>'  ;
                        }
                        else{
                        }
                      }


                    ?></td>

                  </tr>
                <?php  }  ?>
              </tbody>
              <tfoot>
                <tr>

                  <th>Fecha</th>
                  <th>Sueldo <br>Diario</th>
                  <th>Dias <br>Doble</th>
                  <th>Anticipos</th>
                  <th>Dias <br>Faltados</th>
                  <th>Deducciones</th>
                  <th>OBSERVACIONES</th>

                </tr>
              </tfoot>
            </table>

            <br><br>



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



<!-- SECCION DE ESCRIPTS -->
<script>

  // Select the contents of a text field
function mySelectFunction() {
  document.getElementById("myText").select();
}

// Alert some text when the text in the text field has been selected
function myAlertFunction() {
 var fechaseleccionada = document.getElementById("reservationdate").select();
  alert("la fecha que selecciono es: "+fechaseleccionada);
}


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

//SELECCIONAMOS EL ID DEL EMPLEADO
$("#listar").on('change', function() {
  var zona = encodeURI($(this).val());
  var range = encodeURI(document.getElementById("reservation").value);
  if(zona==""){
    window.location = '01index.php';
  }
  else{

    if(range==""){
      window.location = '01index.php';
    }
    else{
      window.location = '01index.php?t=' + zona + '&range='+ range;
    }

       // window.location = '01index.php?t=' + zona;
     }

   });

// SELECCIONAMOS EL RANGO DE FECHA
$("#reservation").on('change', function() {
  var range = encodeURI($(this).val());
  var zona  = encodeURI(document.getElementById("listar").value);

  if(zona==""){
    if(range==""){
      window.location = '01index.php';
    }
    else{
      window.location = '01index.php?range='+ range;
    }
  }
  else{
    if(range==""){
      //window.location = '01index.php';
      window.location = '01index.php?t=' + zona;
    }
    else{
      window.location = '01index.php?t=' + zona + '&range='+ range;
    }

  }

 // window.location = '01index.php?range=' + range;


});



// SELECCIONAMOS EL RANGO DE FECHA





            $("#reservationdate").datetimepicker({
                onSelect: function (date, datetimepicker) {
                    if (date != "") {
                        alert("Selected Date: " + date);
                    }
                }
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
      $('#edit_descripcion').val(response.descripcion);

    }
  });
  }
</script>



</body>
</html>
