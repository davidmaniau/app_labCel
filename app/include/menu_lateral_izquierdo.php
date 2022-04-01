<?php //include 'session.php'; ?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?php echo $negocio; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../images/profile.jpg'; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $user['nombre_completo']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="fas fa-users-cog"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php if ($modulo = "cliente_tipo" ) {
                $active = "active";
              }
              else{
               $active = "";
             }
             ?>


             <li class="nav-item">
              <a href="../productos/01index.php" class="nav-link">

                <i class="fas fa-boxes"></i>

                <p>Productos</p>
                <span class="right badge badge-success">ok</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="../proveedor/01index.php" class="nav-link">

                <i class="fa fa-truck"></i>
                <p>Proveedores</p>
                <span class="right badge badge-success">ok</span>
              </a>
            </li>


            <li class="nav-item">
              <a href="../forma_pago/01index.php" class="nav-link">

               <i class="fas fa-comment-dollar"></i>

               <p>Formas de Pago</p>
               <span class="right badge badge-success">Ok</span>
             </a>
           </li>



           <li class="nav-item">
            <a href="../venta_tipo/01index.php" class="nav-link">
              <i class="far fa-handshake"></i>
              <p>Tipo de Venta</p>
              <span class="right badge badge-success">ok</span>
            </a>
          </li>



          <li class="nav-item">
            <a href="../depositos/01index.php" class="nav-link">
             <i class="fas fa-donate"></i>
             <p>Depositos</p>
             <span class="right badge badge-success">ok</span>
           </a>
         </li>

            <?php //if ($modulo = "adelantos" ) {
              //$active = "active";
              //}
              //else{
               //$active = "";
              //}
             ?>





           </ul>
         </li>






      <!--     <li class="nav-item">
            <a href="../proveedor/01index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Proveedor
                <span class="right badge badge-success">M Fernanda</span>
              </p>
            </a>
          </li> -->



          <!-- MODULO CLIENTES -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
             <i class="fas fa-people-arrows"></i>
             <p>
              Clientes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">


           <li class="nav-item" <?php echo $active; ?> >
            <a href="../cliente_tipo/01index.php" class="nav-link">

              <i class="fa fa-user"></i>

              <p>Tipo Cliente</p>
              <span class="right badge badge-success">ok</span>
            </a>
          </li>




          <li class="nav-item">
            <a href="../cliente/01index.php" class="nav-link">
              <i class="nav-icon fa fa-user-plus"></i>
              <p>
                Clientes
                <span class="right badge badge-success">Ok</span>
              </p>
            </a>
          </li>

        </ul>
      </li>






      <!-- MODULO GASTOS -->

      <li class="nav-item">
        <a href="#" class="nav-link">
         <i class="far fa-chart-bar"></i>
         <p>
          Gastos
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>

      <ul class="nav nav-treeview">

        <li class="nav-item">
          <a href="../gastos_tipo/01index.php" class="nav-link">

            <i class="fas fa-dolly"></i>

            <p>Tipos de Gastos</p>
            <span class="right badge badge-success">Ok</span>
          </a>
        </li>


        <li class="nav-item">
          <a href="../gastos/01index.php" class="nav-link">

            <i class="fas fa-dolly-flatbed"></i>
            <p>Gastos</p>
            <span class="right badge badge-success">Ok</span>
          </a>
        </li>

      </ul>
    </li>



    <!-- MODULO VENTAS -->

    <li class="nav-item">
      <a href="#" class="nav-link">
       <i class="fas fa-chart-line"></i>
       <p>
        Ventas
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>

    <ul class="nav nav-treeview">

     <li class="nav-item">
      <a href="http://localhost/pixelasistencias/app/ventas_recibo/01index.php" class="nav-link">
       <i class="fas fa-file-invoice-dollar"></i>
       <p>
         Ventas Recibos
         <!-- <span class="right badge badge-success">M Fernanda</span> -->
       </p>
     </a>
   </li>


   <li class="nav-item">
    <a href="http://localhost/pixelasistencias/app/ventas_factura/01index.php" class="nav-link">
      <i class="fas fa-file-invoice-dollar"></i>
      <p>
       Ventas Facturas
       <!-- <span class="right badge badge-success">M Fernanda</span> -->
     </p>
   </a>
 </li>




</ul>
</li>

<!-- MODULO CUENTAS POR COBRAR -->


<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="fas fa-hand-holding-usd"></i>
    <p>
      Cuentas por Cobrar
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">

   <li class="nav-item">
    <a href="../cuentas_cobrar_r/01index.php" class="nav-link">

      <i class="fas fa-money-check-alt"></i>
      <p>
        Cuentas por Cobrar - Recibos
        <span class="right badge badge-warning">90 %</span>
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="../cuentas_cobrar_f/01index.php" class="nav-link">
     <i class="fas fa-file-invoice-dollar"></i>
     <p>
      Cuentas por Cobrar - Facturas
      <span class="right badge badge-warning">90 %</span>
    </p>
  </a>
</li>



</ul>
</li>

<!-- MODULO EMPLEADOS -->


<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="fas fa-users"></i>
    <p>
      Empleados
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">

   <li class="nav-item">
    <a href="../cargos/01index.php" class="nav-link">
      <i class="fas fa-id-badge"></i>
      <p>
        Cargos
        <span class="right badge badge-success">ok</span>
      </p>
    </a>
  </li>



  <li class="nav-item">
    <a href="../roles/01index.php" class="nav-link">
      <i class="fas fa-user-lock"></i>
      <p>
        Roles de Usuarios
        <span class="right badge badge-success">ok</span>
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="../horario/01index.php" class="nav-link">

      <i class="fas fa-calendar-check"></i>
      <p>
        Horario
        <span class="right badge badge-success"></span>
      </p>
    </a>
  </li>

  <li class="nav-item">
    <a href="../usuarios/01index.php" class="nav-link">
      <i class="fas fa-user-tie"></i>
      <p>
        Usuarios
        <span class="right badge badge-warning">?</span>
      </p>
    </a>
  </li>

  <li class="nav-item" >
    <a href="../deducciones/01index.php" class="nav-link ">
      <i class="far fa-money-bill-alt"></i>
      <p>Deducciones</p>
      <span class="right badge badge-success">ok</span>
    </a>
  </li>

  <li class="nav-item" >
    <a href="../adelantos/01index.php" class="nav-link ">
      <i class="far fa-money-bill-alt"></i>
      <p>Adelantos</p>
      <span class="right badge badge-success">ok</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="../faltas/01index.php" class="nav-link">
      <i class="fas fa-user-times"></i>
      <p>Dias Falto</p>
      <span class="right badge badge-success">ok</span>
    </a>
  </li>

  <li class="nav-item">
    <a href="../dias_dobles/01index.php" class="nav-link">
      <i class="fas fa-star"></i>
      <p>Dias Doble</p>
      <span class="right badge badge-success">ok</span>
    </a>
  </li>


</ul>
</li>



<li class="nav-item">
  <a href="../asistencias/01index.php" class="nav-link">
   <i class="fas fa-user-check"></i>
   <p>
    Asistencias
    <span class="right badge badge-warning">?</span>
  </p>
</a>
</li>


<li class="nav-item">
  <a href="../planilla/01index.php" class="nav-link">
    <i class="far fa-id-badge"></i>
    <p>
      Planilla

      <span class="right badge badge-warning">0 %</span>
    </p>
  </a>
</li>


<!--   <li class="nav-item">
    <a href="../ventas_factura_p/01index.php" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
       Proforma Facturas
     <span class="right badge badge-success">M Fernanda</span> 
     </p>
   </a>
 </li>
-->

 <!-- <li class="nav-item">
  <a href="../ventas_recibo_p/01index.php" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
     Proforma Recibo
     <span class="right badge badge-success">M Fernanda</span>
   </p>
 </a>
</li> -->




<!-- MARCACION -->

<li class="nav-item">
  <a href="http://localhost/pixelasistencias/app/index.php" class="nav-link">
    <i class="far fa-share-square"></i>
    <p>
     Ir a Marcar Asist
     <!-- <span class="right badge badge-success">M Fernanda</span> -->
   </p>
 </a>
</li>



<!-- MODULO REPORTES -->
<li class="nav-item">
  <a href="../reportes/01index.php" class="nav-link">
    <i class="fas fa-file-invoice"></i>
    <p>
     Reportes
     <!-- <span class="right badge badge-success">M Fernanda</span> -->
   </p>
 </a>
</li>






        <!--   <li class="nav-item">
            <a href="../00/01index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Demostraciones
                <span class="right badge badge-danger">En proceso</span>
              </p>
            </a>
          </li>


            <li class="nav-item">
            <a href="../categorias/01index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Categoria
                <span class="right badge badge-danger">En proceso</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../proveedor/01index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Proveedor
                <span class="right badge badge-success">M Fernanda</span>
              </p>
            </a>
          </li> -->


        </ul>
      </nav>
      <!-- /.sidebar-menu -->


      <br>
      <br>
      <br>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!--        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
       </div>
       <div class="info">
        <a href="#" class="d-block"><?php //echo $user['nombre_completo']; ?></a>
      </div>
    </div>

  </div>
  <!-- /.sidebar -->
</aside>