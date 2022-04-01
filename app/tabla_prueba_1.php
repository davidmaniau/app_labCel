            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Practica consumiendo data de la bd danilo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Codigo Empresa</th> <!-- los th son los encabezados -->
                    <th>Nombre Usuario</th>
                    <th>Cargo</th>
                    <th>Horario de trabajo</th>                   
                    <th>cedula</th>                   
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php //include 'data_default_tabla.php' ?>


                    <?php
                    $sql = "select * from trabajador";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>

                          <tr>
                          <!-- <td class="hidden"></td>                   -->

                          <td>
                            <?php echo $row['cod_empresa']; ?>
                          </td>
                          <td>
                            <?php echo $row['nombre_user']; ?>
                          </td>
                          <td>
                            <?php echo $row['cargo']; ?>
                          </td>
                          <td>
                            <?php echo $row['horario_trabajo']; ?>
                          </td>
                          <td>
                            <?php echo $row['cedula']; ?>
                          </td>

                           <td>
                            
<div  class="btn-group-vertical"> 

<button class="btn btn-success btn-sm edit " data-id="<?php echo $row['id'];  ?>" onclick = "funcionX(<?php echo $row['empid']; ?>)"><i class="fa fa-edit"></i> Editar</button>

<button class="btn btn-danger btn-sm delete " data-id="<?php echo $row['id']; ?>" onclick = "funcionY(<?php echo $row['empid']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>

</div>


                          </td>



                        </tr>
<?php 
    } 
    ?>



                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->