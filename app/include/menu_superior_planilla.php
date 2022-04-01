  <?php //include 'session.php'; ?>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

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


<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Modulo1</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Modulo2</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Modulo3</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Modulo4</a>
      </li> -->

      <div class="form-group">
          <h3><?php echo $titulo_modulo.': '.$nombreEmpleadoSelect; ?></h3>
      </div>


    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
     <!--    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
      </li>

<?php //include 'notificaciones_y_mensajes.php'; ?>


  <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $user['nombres'].' '.$user['apellidos']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo $user['nombre_completo'] ?>
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->
         <!--  <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div> -->
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="../include/logout.php" class="btn btn-default btn-flat float-right">Cerrar sesion</a>
          </li>
        </ul>
      </li>



    </ul>
  </nav>