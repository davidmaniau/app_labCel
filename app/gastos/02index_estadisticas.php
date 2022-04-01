
<div class="row">

  <div class="col-sm-2 col-3">
    <div class="description-block border-right">
      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
      <h5 class="description-header text-success"><!-- L. --> <?php //echo number_format($salario_quincenal,2) ; ?></h5>
      <span class="description-text"><strong> <!-- SALARIO QUINCENAL --></strong></span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->




  <div class="col-sm-2 col-3">
    <div class="description-block border-right">
      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
      <h5 class="description-header text-success"><!-- L. --> <?php //echo number_format($salario_quincenal,2) ; ?></h5>
      <span class="description-text"><strong> <!-- SALARIO QUINCENAL --></strong></span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->




  <div class="col-sm-2 col-3">
    <div class="description-block border-right">
      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
      <h5 class="description-header text-success"><!-- L. --> <?php //echo number_format($salario_quincenal,2) ; ?></h5>
      <span class="description-text"><strong> <!-- SALARIO QUINCENAL --></strong></span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->



  <div class="col-sm-2 col-3">
    <div class="description-block border-right">
      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
      <h5 class="description-header text-success"><!-- L. --> <?php //echo number_format($salario_quincenal,2) ; ?></h5>
      <span class="description-text"><strong> <!-- SALARIO QUINCENAL --></strong></span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->



  <div class="col-sm-2 col-3">
    <div class="description-block border-right">
      <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
      <h5 class="description-header text-success"><!-- L. --> <?php //echo number_format($salario_quincenal,2) ; ?></h5>
      <span class="description-text"><strong> <!-- SALARIO QUINCENAL --></strong></span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->

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
                      $sql = "SELECT sum(monto) as totalSuma
                      FROM ".$tabla."
                      left join proveedor on proveedor.id = ".$tabla.".proveedor_id
                      left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id
                      where ".$tabla.".estado_registro = '1' and ".$tabla.".gasto_tipo_id = '$tipo_gasto' and fecha between '$from' AND '$to' ";
                       //echo $sql.' _ CON parametros get';
                    }
                    else{
//toda la data a mostrar en la tabla de registros previamente guardados
                      $sql = "SELECT sum(monto) as totalSuma
                      FROM ".$tabla."
                      left join proveedor on proveedor.id = ".$tabla.".proveedor_id
                      left join gasto_tipo on gasto_tipo.id = ".$tabla.".gasto_tipo_id
                      where ".$tabla.".estado_registro = '1' and fecha between '$from' AND '$to' ";
                      //echo $sql.' _ sin parametros get';
                    }

                    $EJECUTAR = $conn->query($sql);
                    $RESPUESTA = $EJECUTAR->fetch_assoc();
                    $totalSuma =  $RESPUESTA['totalSuma'];



                    ?>



                    <div class="col-sm-2 col-3">
                      <div class="description-block">

                        <h6 class="description-header text-success">L. <?php echo number_format($totalSuma,2) ; ?></h6>
                        <span class="description-text"><strong>= TOTAL GASTOS</strong></span>
                      </div>
                      <!-- /.description-block -->
                    </div>

                  </div>