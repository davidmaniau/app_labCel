<?php include '00configuraciones.php';

if(isset($_GET['d'])){
  $doc = 0;
  $doc = $_GET['d'];
}

?>

<?php

$tablax  = "ventas_detalle";
$sql2x = "SELECT sum(total) as totalr
FROM ".$tablax."
where ".$tablax.".venta_id = ".$doc." and ".$tablax.".tipo_doc_id = 1";
$query2x = $conn->query($sql2x);
$row2x = $query2x->fetch_assoc();
$total_detalles=$row2x['totalr'];


$tablax  = "ventas_detalle_abonos";
$sql2x = "SELECT sum(monto) as totala
FROM ".$tablax."
where ".$tablax.".venta_detalle_id = ".$doc." and ".$tablax.".tipo_doc_id = 1";
$query2x = $conn->query($sql2x);
$row2x = $query2x->fetch_assoc();
$total_abonos=$row2x['totala'];


$tabla  = "ventas_detalle";
$sql3x = "SELECT ventas.id as empid2
FROM ".$tabla."
left join ventas on ventas.no_doc = ".$tabla.".venta_id
where ".$tabla.".venta_id = ".$doc." and ".$tabla.".tipo_doc_id = 1 and ventas.tipo_doc_id = 1 group by ".$tabla.".id";
$query3x = $conn->query($sql3x);
$row3x = $query3x->fetch_assoc();
$registro_venta=$row3x['empid2'];
$deuda = number_format(($total_detalles+($total_detalles*0))-$total_abonos,2);


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
    <?php
//$registro_venta;
    include '../include/menu_superior_2.php'; ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include '../include/menu_lateral_izquierdo.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->




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
                <div class="btn-group">

                  <a style="margin-right: 10px " href="<?php echo '../ventas_recibo/01index.php';  ?>" class="btn btn-sm btn-danger"> <i class="fa fa-chevron-left"></i> Regresar </a>

                 <!--  <button style="margin-right: 10px " type="button" class="btn btn-sm btn-primary"   data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i> Agregar Producto</button>

                    <button style="margin-right: 10px " type="button" class="btn btn-sm btn-success"   data-toggle="modal" data-target="#modal-pagar">
                     <i class="fas fa-dollar-sign"></i>  Pagar </button>


                     <button style="margin-right: 10px " type="button" class="btn btn-sm btn-warning"   data-toggle="modal" data-target="#modal-abonar">
                       <i class="far fa-credit-card"></i> Abonar </button> -->

                       <?php if (($total_detalles > 0) && ($deuda == 0)) {  //total_detalles = subtotal, deuda= saldo pendientes
                  ?>

                  <a style="margin-right: 10px "  class="btn btn-sm btn-danger">  RECIBO CANCELADO </a>

                <?php }else { ?>

                  <button style="margin-right: 10px " type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i> Agregar Item al detalle </button>

                    <button style="margin-right: 10px " type="button" class="btn btn-sm btn-success"   data-toggle="modal" data-target="#modal-pagar"> <i class="fas fa-dollar-sign"></i>  Pagar </button>


                    <button style="margin-right: 10px " type="button" class="btn btn-sm btn-warning"   data-toggle="modal" data-target="#modal-abonar"> <i class="far fa-credit-card"></i> Abonar </button>

                  <?php } ?>


                     </div>

                   </div>
<!-- INICIO CINTA DETALLES TOTALES -->
                   <br>

                   <div class="row">


                     <div class="col-sm-2 col-3">
                      <div class="description-block border-right">
                        <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                        <h5 class="description-header text-success">$ <?php echo number_format($total_detalles,2) ; ?></h5>
                        <span class="description-text"><strong>SUBTOTAL</strong></span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->

                    <div class="col-sm-2 col-3">
                      <div class="description-block border-right">
                       <!--  <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span> -->
                       <h6 class="description-header text-warning">+$ <?php echo number_format( ($total_detalles*0),2); ?></h6>
                       <span class="description-text"><strong>IMPUESTO</strong></span>
                     </div>
                     <!-- /.description-block -->
                   </div>
                   <!-- /.col -->



                   <div class="col-sm-2 col-3">
                    <div class="description-block border-right">
                      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                      <h6 class="description-header text-success">$ <?php echo number_format($total_detalles,2) ; ?></h6>
                      <span class="description-text"><strong>SUBTOTAL + IMPUESTO</strong></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->



                  <div class="col-sm-2 col-3">
                    <div class="description-block">
                      <!--       <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                      <h6 class="description-header text-primary">-$ <?php echo number_format($total_abonos,2) ; ?></h6>
                      <span class="description-text"><strong>ABONOS</strong></span>
                    </div>
                    <!-- /.description-block -->
                  </div>





                  <div class="col-sm-2 col-3">
                    <div class="description-block">
                      <!--       <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                      <h6 class="description-header text-danger">$ <?php echo number_format(($total_detalles+($total_detalles*0))-$total_abonos,2) ; ?></h6>
                      <span class="description-text"><strong>SALDO PENDIETNE </strong></span>
                    </div>
                    <!-- /.description-block -->
                  </div>



                  <div class="col-sm-2 col-3">
                    <div class="description-block border-right">
                     <!--  <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> -->
                     <h6 class="description-header text-warning"><!-- $ --><?php //echo number_format( $tadelanto ,2)?></h6>
                     <span class="description-text"><strong></strong></span>
                   </div>
                   <!-- /.description-block -->
                 </div>
                 <!-- /.col -->





               </div>
               <!-- /.row -->



<!-- FIN DE LA CINTA DE DETALLES TOTALES -->
               <!-- /.card-header -->
               <div class="card-body">
                <table id="example1_1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <!-- <th style="width: 0px;" class="hidden"></th>
                     <th><?php //echo 'ID'; ?></th> -->

                     <th><?php echo $campo2; ?></th>
                     <th><?php echo $campo3; ?></th>
                     <th><?php echo $campo4; ?></th>
                     <th><?php echo $campo5; ?></th>
                     <th><?php echo $campo6; ?></th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>

                  <?php
                  $tabla  = "ventas_detalle";
                  $sql = "SELECT *, ".$tabla.".id as empid, ventas.id as empid2,
                  producto.descripcion as producto_descrip,
                  ".$tabla.".descripcion as producto_descrip2
                  FROM ".$tabla."
                  left join producto on producto.id = ".$tabla.".producto_id
                  left join ventas on ventas.no_doc = ".$tabla.".venta_id
                  where ".$tabla.".venta_id = ".$doc." and ".$tabla.".tipo_doc_id = 1 and ventas.tipo_doc_id = 1 group by ".$tabla.".id";
                  $query = $conn->query($sql);

                //echo $sql;

                  while($row = $query->fetch_assoc()){
                    ?>

                    <tr>
                      <!-- <td style="width: 0px;" class="hidden"></td>

                      <td><?php //echo $row['empid2']; ?></td> -->

                      <td><?php echo $row['cant']; ?></td>
                      <td><?php echo $row['producto_descrip']; ?></td>
                      <td><?php echo $row['producto_descrip2']; ?></td>
                      <td><?php echo $row['subt']; ?></td>
                      <td><?php echo $row['total']; ?></td>

                      <td>

                       <!--  <div  class="btn-group-vertical">  -->
                        <?php if ($deuda>0) {  ?>
                        <td>
                          <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"> Editar</button>
                          <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"> Quitar</button>
                        </td>
                      <?php } else { ?>

                      <?php } ?>



                    </tr>
                  <?php  }  ?>



                </tbody>
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

  function funcionA(valor){
    //alert(valor);
    $('#modal-abonar').modal('show');
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

      //$('.empid').val(response.empid);

      $('.empid').val(response.empid);//id del registro que se desea
      $('.empid2').val(response.venta_id);//id del registro que se desea editar o eliminar

      $('.employee_id').html(response.nombreempleado);

      $('.del_employee_name').html(response.nombre);



      $('#edit_venta_id').val(response.venta_id);
      $('#edit_producto_id').val(response.producto_id);
      $('#edit_descripcion').val(response.descripcion2);
      $('#edit_cant').val(response.cant);
      $('#edit_pu').val(response.pu);
      $('#edit_subt').val(response.subt);
      $('#edit_impuesto').val(response.impuesto);
      $('#edit_total').val(response.total);

      $('#edit_altura').val(response.alto);
      $('#edit_ancho').val(response.ancho);
      $('#edit_unidad_id').val(response.factor_conversion);
      $('#edit_area_pieza').val(response.area);
      $('#edit_precio_pieza').val(response.precio_pieza);



    }
  });
  }
</script>



</body>
</html>
