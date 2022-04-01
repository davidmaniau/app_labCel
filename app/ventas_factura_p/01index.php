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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th class="hidden"></th>
                    <th><?php echo $campo1; ?></th>
                    <th><?php echo $campo2; ?></th>
                    <th><?php echo $campo3; ?></th>
                    <th><?php echo $campo4; ?></th>
                    <th><?php echo $campo5; ?></th>
                    <th><?php echo $campo6; ?></th>
                    <th><?php echo $campo7; ?></th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  while($row = $query->fetch_assoc()){  ?>
                      <tr>
<td class="hidden"></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['nombre_cliente']; ?></td>
                        <td><?php echo $row['nombre_vendedor']; ?></td>
                        <td><?php echo $row['venta_descrip']; ?></td>
                        <td><?php echo $row['doc_descrip']; ?></td>
                        <td><?php echo $row['pago_descrip']; ?></td>
                        <td><?php echo $row['estado_detalles']; ?></td>
                        
                        <td>
                          
                          <div  class="btn-group-vertical"> 

<!-- <button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-success btn-sm edit " data-id="<?php //echo $row['empid'];  ?>" onclick = "funcionX(<?php //echo $row['empid']; ?>)"><i class="fa fa-eye"></i> Ver Detalles</button> -->



<?php 
$doc = $row['no_doc'];
 ?>

    <a style="color: white; margin-top: 0px;margin-bottom: 5px;" class="btn btn-success btn-sm "  href="<?php echo '../ventas_detalles_f/01index.php?d='.$doc;  ?>">Detalles</a>

<button style="margin-top: 0px;margin-bottom: 05px;" class="btn btn-danger btn-sm delete " data-id="<?php echo $row['empid']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)">Eliminar</button>
</div>

                        </td>

                      </tr>
                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th class="hidden"></th>
                    <th><?php echo $campo1; ?></th>
                    <th><?php echo $campo2; ?></th>
                    <th><?php echo $campo3; ?></th>
                    <th><?php echo $campo4; ?></th>
                    <th><?php echo $campo5; ?></th>
                    <th><?php echo $campo6; ?></th>
                    <th><?php echo $campo7; ?></th>
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
     



      $('#edit_nombre').val(response.nombre);
      $('#edit_rtn_dni').val(response.rtn_dni);
      $('#edit_cliente_tipo_id').val(response.cliente_tipo_id);
      $('#edit_telefono').val(response.telefono);
      $('#edit_direccion').val(response.direccion);
      $('#edit_email').val(response.email);


     
    }
  });
}
</script>



</body>
</html>
