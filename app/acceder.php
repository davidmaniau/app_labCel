<?php include 'include/conexion.php'; ?>
<?php
session_start();
if(isset($_SESSION['admin'])){
  header('location: ../app/asistencias/01index.php');
}
  // else{
  //    header('location:/bodega/proyecto/pacientes/01index.php');
  // }
?>
<?php include 'include/configuracion_negocio.php'; ?>

<!DOCTYPE html>
<html lang="es">
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
  <div class="login-box" style="margin-top:-210px;">
    <!-- <div class="login-box"> -->
      <div class="login-logo">
        <a href="index2.html"><b><?php echo $var1 ?></b><?php echo $var2 ?></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Ingrese sus credenciales</p>


          <!-- ESCTRUCRA DEL FORMULARIO QUE ENVIARA LOS DATOS A VALIDAR EL ACCESO -->

          <form action="include/login.php" method="post">
            <div class="input-group mb-3">
              <input type="text" name="username" class="form-control" placeholder="Nombre Usuario" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-5">
           <!--  <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
            <button type="button" onclick="window.location.href='index.php'" class="btn btn-danger btn-block">Ir a Marcar</button>

          </div>

          <div class="col-2">
           <!--  <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
            
          </div>
          <!-- /.col -->
          <div class="col-5">
           <button type="submit" name="login" class="btn btn-primary btn-block">Ingresar</button>
         </div>
         <!-- /.col -->
       </div>
     </form>



   </div>
   <!-- /.login-card-body -->
 </div>

 <?php
 if(isset($_SESSION['error'])){
  echo "
  <div class='callout callout-danger text-center mt20'>
  <p>".$_SESSION['error']."</p>
  </div>
  ";
  unset($_SESSION['error']);
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
</body>
</html>
