<?php
include 'include/conexion.php';
session_start();


include 'include/configuracion_negocio.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $var0 ?> | Marcacion </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">


<div class="login-box" style="margin-top:-110px;">
  <!-- <div class="login-box"> -->
  <div class="login-logo">
    <a href="index2.html"><b><?php echo $var1 ?></b><?php echo $var2 ?></a>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
<!--       <p class="login-box-msg">Fecha & Hora Local</p>  -->       
      <h5 style="text-align: center;" id="date"></h5>
    <h5 style="text-align: center;" id="time" class="bold"></h5>


<!-- ESCTRUCRA DEL FORMULARIO QUE ENVIARA LOS DATOS A VALIDAR EL ACCESO -->

      <form action="include/marcacion.php" method="post">
       
     <div class="form-group mb-3">
            <label for="exampleSelectBorder">Tipo Marcacion </label>
                  <select name = "tipo_marcacion_id" class="custom-select" id="exampleSelectBorder">
                    <option value="1">Entrada</option>
                    <option value="2">Salida</option>                    
                  </select>
                </div>


        <div class="form-group mb-3">
            <label for="exampleSelectBorder">Nombre del Usuario </label>
                  <select name = "usuario_id" class="custom-select" id="exampleSelectBorder">
                    <?php 
                      $consulta = "SELECT * FROM usuarios ORDER BY nombre_completo asc";
                      $objetorespuesta = $conn->query($consulta);
                        while ($elemento = $objetorespuesta->fetch_assoc()){
                         echo '<option value='. $elemento['id'] .'>' .$elemento['nombre_completo']. '</option>';
                        }
                     ?>
                   
                  </select>
                </div>
<br>
<br>
<br>

        
        <div class="row">
          <div class="col-4">
           <!--  <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->

 <button type="button" onclick="window.location.href='acceder.php'" class="btn btn-primary btn-block">Ingresar</button>

          </div>

           <div class="col-4">
           <!--  <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->

 
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="marcar_asistencia" class="btn btn-success btn-block">Marcar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<!--       <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

     <!--   <p class="mb-1">
       <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->


    </div>
    <!-- /.login-card-body -->


<!--   <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div> -->




  </div>


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
        else{
          //echo "prueba";
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




  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>




<?php //include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    // $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('DD MMMM, YYYY'));  

var fecha = new Date();
var options = { year: 'numeric', month: 'long', day: 'numeric' };

    $('#date').html(fecha.toLocaleDateString("es-ES", options));  
     
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>




</body>
</html>
