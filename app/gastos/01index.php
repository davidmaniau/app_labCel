
<?php include '00configuraciones.php'; 
$range_to = date('m/d/Y');
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

              <div class="btn-group">



                <!-- CONTROL O SELECTOR DE FECHAS -->
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

                  <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from . ' - ' . $range_to; ?>">

                </div>

                ..
                <!-- CONTROL O SELECTOR DE TIPO DE GASTOS (CATEGORIAS DE GASTOS) -->
                <?php
                if (isset($_GET['gasto']))
                  {   $gasto1 = $_GET['gasto'];    ?>
                <label for="listar" class=" control-label">Gastos</label>
                <div>
                  <select class="form-control" name="gasto" id="listar" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sqln2 = "SELECT * FROM gasto_tipo";
                    $queryn2 = $conn->query($sqln2);
                    while ($prown2 = $queryn2->fetch_assoc()) {
                     if ($prown2['id'] == $gasto1) {
                      echo "<option value='" . $prown2['id'] . "' selected >" . $prown2['descripcion'] . "</option>";
                    }else{
                     echo "<option value='" . $prown2['id'] . "'  >" . $prown2['descripcion'] . "</option>";
                   }
                 }
                 ?>
               </select>
             </div>
           <?php } else{ ?>

            <label for="listar" class=" control-label">Gastos</label>
            <div>
              <select class="form-control" name="gasto" id="listar" required>
                <option value="" selected>- Seleccionar -</option>
                <?php
                $sqln2 = "SELECT * FROM gasto_tipo";
                $queryn2 = $conn->query($sqln2);
                while ($prown2 = $queryn2->fetch_assoc()) {
                 echo "<option value='" . $prown2['id'] . "'  >" . $prown2['descripcion'] . "</option>";
               }
               ?>
             </select>
           </div>

         <?php } ?>


       </div>


     </div>
     <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><?php echo $titulo_modulo; ?></li>
      </ol>
    </div>
  </div>


  <?php include '02index_estadisticas.php'; ?>




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

                  <th><?php echo $campo1; ?></th>
                  <th><?php echo $campo2; ?></th>
                  <th><?php echo $campo3; ?></th>
                  <th><?php echo $campo4; ?></th>
                  <th><?php echo $campo5; ?></th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php

                    $to = date('Y-m-d');//inicio se la fecha actual
                   // $from = date('Y-m-d', strtotime('-15 day', strtotime($to)));
                    $from = date('Y-m-d');//final del rango sea la fecha actual

                    if (isset($_GET['range'])) {
                      $range = $_GET['range'];
                      $ex = explode(' - ', $range);
                      $from = date('Y-m-d', strtotime($ex[0]));
                      $to = date('Y-m-d', strtotime($ex[1]));
                    }

                    if (isset($_GET['gasto'])) {
                      $tipo_gasto = $_GET['gasto'];
      //toda la data a mostrar en la tabla de registros previamente guardados
                      $sql = "SELECT *, ".$tabla.".id as empid,
                      proveedor.nombre as nombre_provee,
                      gasto_tipo.descripcion as nombre_gasto
                      FROM ".$tabla."
                      left join proveedor on proveedor.id = ".$tabla.".proveedor_id
                      left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id
                      where ".$tabla.".estado_registro = '1' and ".$tabla.".gasto_tipo_id = '$tipo_gasto' and fecha between '$from' AND '$to' ";
                       //echo $sql.' _ CON parametros get';

                    }

                    else{
//toda la data a mostrar en la tabla de registros previamente guardados
                      $sql = "SELECT *, ".$tabla.".id as empid,
                      proveedor.nombre as nombre_provee,
                      gasto_tipo.descripcion as nombre_gasto
                      FROM ".$tabla."
                      left join proveedor on proveedor.id = ".$tabla.".proveedor_id
                      left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id
                      where ".$tabla.".estado_registro = '1' and fecha between '$from' AND '$to' ";

                      //echo $sql.' _ sin parametros get';
                    }

                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){

                      ?>
                      <tr>
                        <td><?php echo date('d-m-Y', strtotime($row['fecha'])) ; ?></td>
                        <td><?php echo $row['nombre_gasto']; ?></td>
                        
                        <td><?php echo $row['nombre_provee']; ?></td>
                        <td><?php echo $row['descripcion_gasto']; ?></td>
                        <td><?php echo $row['monto']; ?></td>

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
                      <th><?php echo $campo4; ?></th>
                      <th><?php echo $campo5; ?></th>
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



    $("#reservation").on('change', function() {
      var range = encodeURI($(this).val());
      window.location = '01index.php?range=' + range;
    });

    $("#listar").on('change', function() {
     var gasto = encodeURI($(this).val());
     if (gasto=="") {
       var range = encodeURI(document.getElementById("reservation").value);
       window.location = '01index.php?range=' + range;
      //window.location = '01index.php?range='02/01/2022%20-%2003/31/2022'+
    }
    else{
      var range = encodeURI(document.getElementById("reservation").value);
      window.location = '01index.php?range=' + range+'&gasto='+gasto;
      //window.location = '01index.php?range='02/01/2022%20-%2003/31/2022'+
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
      //console.log(response)
      //$('.empid').val(response.empid);

      $('.empid').val(response.empid);//id del registro que se desea editar o eliminar
      $('.employee_id').html(response.nombreempleado);
      $('.del_employee_name').html(response.nombre);
      $('#edit_gasto_tipo_id').val(response.gasto_tipo_id);
      var date = response.fecha;
      date = date.split("-").reverse().join("-");
      //console.log(date);
      $("#datepicker_edit").val(date);//2022-03-01
      $('#edit_proveedor_id').val(response.proveedor_id);
      $('#edit_descripcion_gasto').val(response.descripcion_gasto);
      $('#edit_monto').val(response.monto);



    }
  });
  }
</script>



</body>
</html>
