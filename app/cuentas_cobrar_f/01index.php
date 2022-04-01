<?php include '00configuraciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo_pagina; ?></title>
  <?php include '../include/header.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include '../include/menu_superior_2.php'; ?>
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
            <!--   <div class="card-header">
                <h3 class="card-title">Registros grabados previamente</h3>
              </div> -->
              <!-- /.card-header -->
                  <?php //echo $sql;
                  $range_to = date('m/d/Y');
                  $range_from = date('m/d/Y');
                  ?>
                  <!-- CONTROL O SELECTOR DE FECHAS -->
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range" value="<?php echo (isset($_GET['range'])) ? $_GET['range'] : $range_from . ' - ' . $range_to; ?>">
                  </div>

                  <?php include '02index_estadisticas.php'; ?>


                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>

                         <th>ID</th>
                         <th><?php echo $campo1; ?></th>
                         <th><?php echo $campo2; ?></th>

                         <th><?php echo $campo3; ?></th>



                         <th>monto</th>
                         <th>impuesto 15%</th>
                         <th>monto + 15%</th>

                         <th>abonos</th>
                         <th>pendiente</th>
                         <th>Acciones</th>

                       </tr>
                     </thead>
                     <tbody>
                      <?php

                      $sql = "SELECT *, ".$tabla.".id as empid,
                      cliente.nombre as nombre_cliente,
                      usuarios.nombre_completo as nombre_vendedor,
                      ventas_doc_tipo.descripcion as doc_descrip,
                      venta_tipo.descripcion as venta_descrip,
                      forma_pago.descripcion as pago_descrip
                      FROM ".$tabla."
                      left join cliente on cliente.id = ".$tabla.".cliente_id
                      left join usuarios on usuarios.id = ".$tabla.".vendedor_id
                      left join ventas_doc_tipo on ventas_doc_tipo.id = ".$tabla.".tipo_doc_id
                      left join venta_tipo on venta_tipo.id = ".$tabla.".venta_tipo_id
                      left join forma_pago on forma_pago.id = ".$tabla.".forma_pago_id
                      where ".$tabla.".estado_registro = '1' and tipo_doc_id = 2
                      and ".$tabla.".fecha between '$from' AND '$to'
                      order by ".$tabla.".fecha desc
                      ";

                      $query = $conn->query($sql);



                      while($row = $query->fetch_assoc()){  ?>
                       <?php

                       $tablax  = "ventas_detalle";

                       $sql2x = "SELECT
                       IfNull(sum(".$tablax.".total),0) as totalr,
                        ".$tablax.".venta_id as empid2, ventas.id as empid,

                        IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$row['no_doc']." and ventas_detalle_abonos.tipo_doc_id = 2) ,0)
                        as totalAbonos, (IfNull( sum(total),0)) - IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$row['no_doc']." and ventas_detalle_abonos.tipo_doc_id = 2) ,0)
                        as pendiente FROM ".$tablax."
                        INNER JOIN ventas on ventas.no_doc = ventas_detalle.venta_id
                        where ".$tablax.".venta_id = ".$row['no_doc']." and ventas.tipo_doc_id = 2 and ".$tablax.".tipo_doc_id = 2 ";



                        $query2x = $conn->query($sql2x);
                        $row2x = $query2x->fetch_assoc();
                        $total_detalles=$row2x['totalr'];
                        $total_abonos=$row2x['totalAbonos'];
                        $total_pendiente=$row2x['pendiente'];

                        ?>

                        <?php if ($total_pendiente>0) { ?>



                          <tr>
                            <td><?php echo $row['empid']; ?></td>
                            <td><?php echo $row['fecha']; ?></td>
                            <td><?php echo $row['nombre_cliente']; ?></td>
                            <td><?php echo $row['nombre_vendedor']; ?></td>


                            <td> <?php echo number_format($total_detalles,2); ?> </td>
                            <td> <?php echo number_format(($total_detalles*0.15),2); ?> </td>
                            <td> <?php echo number_format(($total_detalles+($total_detalles*0.15)),2); ?> </td>
                            <td> <?php echo number_format($total_abonos,2); ?> </td>
                            <td> <?php echo number_format((($total_detalles+($total_detalles*0.15)) - $total_abonos),2); ?> </td>

                            <td>

                              <div  class="btn-group-vertical">

                                <?php
                                $doc = $row['empid'];
                                ?>

                                <?php
                                $doc1 = $row['no_doc'];
                                ?>

                                <?php if ($total_detalles>0) { ?>
                                  <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-primary btn-sm abonar " data-id="<?php echo $row['no_doc']; ?>" onclick = "funcionA(<?php echo $row['no_doc']; ?>)"><i class="fa fa-usd"></i> $ Abonar </button>
                                <?php } ?>

                              </div>

                              <a style="color: white; margin-top: 0px;margin-bottom: 5px;" class="btn btn-success btn-sm "  href="<?php echo '../cuentas_cobrar_f_detalles/01index.php?d='.$doc1;  ?>"> <i class="fa fa-check"></i>  Detalles .. </a>





                            </div>

                          </td>

                        </tr>


                      <?php } ?>

                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th><?php echo $campo1; ?></th>
                      <th><?php echo $campo2; ?></th>

                      <th><?php echo $campo3; ?></th>



                      <th>monto</th>
                      <th>impuesto 15%</th>
                      <th>monto + 15%</th>

                      <th>abonos</th>
                      <th>pendiente</th>
                      <th>Acciones</th>

                    </tr>
                  </tfoot>
                </table>
                <?php //echo $sql2x; ?>
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
    getRow2(id);

  }


  function funcionA(valor){
    //alert(valor);
    $('#modal-abonar').modal('show');
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
      getRow2(id);
    });

    $("#reservation").on('change', function() {
      var range = encodeURI($(this).val());
      window.location = '01index.php?range=' + range;
    });

    $('.abonar').click(function(e){
      e.preventDefault();
      $('#modal-abonar').modal('show');
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
        console.log(response);

        $('.employee_id').html(response.nombreempleado);
        $('.del_employee_name').html(response.nombre);
        $('#edit_rtn_dni').val(response.rtn_dni);
        $('#edit_cliente_tipo_id').val(response.cliente_tipo_id);
        $('#edit_telefono').val(response.telefono);
        $('#edit_direccion').val(response.direccion);

      $('.empid').val(response.empid);//id del registro que se desea editar o eliminar
      $('.empid3').val(response.empid2);//id del registro que se desea editar o eliminar
      $('#edit_monto').val(response.totalr);
      const formatter = new Intl.NumberFormat('en-US', {
      //style: 'currency',
      //currency: 'USD',
      minimumFractionDigits: 2
    })
      //let num = response.totalr-response.totalAbonos;
      let num = ( (response.totalr*0.15) + response.totalr * 1 ) - response.totalAbonos*1 ;
      $('#edit_monto').val(formatter.format(num));
    }
  });
  }

  function getRow2(id){
    var tabla = '<?php echo $tabla; ?>';
    $.ajax({
      type: 'POST',
      url: '02data2.php',
      data: {id:id,tabla:tabla},
      dataType: 'json',
      success: function(response){
      //$('.empid').val(response.empid);
      $('.empid').val(response.empid);//id del registro que se desea editar o eliminar
      $('.employee_id').html(response.nombreempleado);
      $('.del_employee_name').html(response.nombre);

    }
  });
  }
</script>
</body>
</html>