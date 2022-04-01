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
where ".$tablax.".venta_id = ".$doc." and ".$tablax.".tipo_doc_id = 2";

$query2x = $conn->query($sql2x);
$row2x = $query2x->fetch_assoc(); 
$total_detalles=$row2x['totalr'];
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

              <!-- <div class="card-header">
                <h3 class="card-title">Registros grabados previamente</h3>
              </div> -->

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 0px;" class="hidden"></th>
                    
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
$sql = "SELECT *, ".$tabla.".id as empid,
producto.descripcion as producto_descrip,
".$tabla.".descripcion as producto_descrip2
FROM ".$tabla."  
left join producto on producto.id = ".$tabla.".producto_id
left join ventas on ventas.id = ".$tabla.".venta_id
where ".$tabla.".venta_id = ".$doc." and ".$tabla.".tipo_doc_id = 2";
$query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){  
                      ?>

                      <tr>
<td style="width: 0px;" class="hidden"></td>
                        
                        <td><?php echo $row['cant']; ?></td>
                        <td><?php echo $row['producto_descrip']; ?></td>
                        <td><?php echo $row['producto_descrip2']; ?></td>
                        <td><?php echo $row['pu']; ?></td>
                        <td><?php echo $row['subt']; ?></td>
                        
                        <td>
                          
                         <!--  <div  class="btn-group-vertical">  -->

<button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php echo $row['empid'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"> Editar</button>


<button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"> Quitar</button>

<!-- </div> -->

                        </td>

                      </tr>                      
                    <?php  }  ?>
                    <tr>
                      <td style="width: 0px;" class="hidden"></td>
                          
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td> </td>
                      </tr>
                    <tr>
                      <td style="width: 0px;" class="hidden"></td>
                          
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td>SUBTOTAL:</td>
                          <td><?php echo $total_detalles; ?></td>
                          <td> </td>
                      </tr>
                    <tr>
                      <td style="width: 0px;" class="hidden"></td>
                          
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td>IMPUESTO:</td>
                          <td><?php echo $total_detalles*0.15; ?></td>
                          <td> </td>
                      </tr>
                      <tr>
                        <td style="width: 0px;" class="hidden"></td>
                         
                          <td> </td>
                          <td> </td>
                          <td> </td>
                          <td>NETO A PAGAR:</td>
                          <td><?php echo (($total_detalles*0.15)+$total_detalles); ?></td>
                          <td> </td>
                      </tr>



                <tr>
                        <td style="width: 0px;" class="hidden"></td>
                          
                          <td> </td>
                          <td> </td>
                          <td> </td>
                         <td> </td>
                          <td> </td>
                          <td> </td>
                      </tr>

                      <tr>
                        <td style="width: 0px;" class="hidden"></td>
                          
                          <td> </td>
                          <td> </td>
                          <td> </td>
                         <td> </td>
                          <td> </td>
                          <td> </td>
                      </tr>



                  </tbody>
                  <tfoot>
                  <tr>
                    
                    
                      <th style="width: 0px;" class="hidden"></th>
                    
                    <th> </th>
                     <th> </th>
                     <th> </th>
                     <th> </th>
                     <th> 

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                 <strong> Pagar </strong> 
                </button>

                     </th>
                     <th> </th>

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


     
    }
  });
}
</script>



</body>
</html>
