            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>id</th> <!-- los th son los encabezados -->
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Hora Entrada</th>  
                    <th>Estado</th>       
                    <th>Hora Salida</th>   
                    <th>Estado</th>
                    <th>Horas Tardes</th>  
                    <th>Horas Extras</th>
                    <th>Horas Trabajadas</th>  
                    
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php //incluide 'tabla_data_default2'; ?>

                                     <?php
                    $sql = "select * from asistencias";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>

                          <tr>
                          <!-- <td class="hidden"></td>                   -->

                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['fecha']; ?></td>
                          <td><?php echo $row['usuario_id']; ?></td>
                          <td><?php echo $row['hora_entrada']; ?></td>
                          <td><?php echo $row['estado_entrada']; ?></td>
                          <td><?php echo $row['hora_salida']; ?></td>
                          <td><?php echo $row['estado_salida']; ?></td>
                          <td><?php echo $row['horas_tardes']; ?></td>
                          <td><?php echo $row['horas_extras']; ?></td>
                          <td><?php echo $row['horas_trabajadas']; ?></td>

                           <td>
                            
<div  class="btn-group-vertical"> 

<button class="btn btn-success btn-sm edit " data-id="<?php echo $row['id'];  ?>" onclick = "funcionX(<?php echo $row['id']; ?>)"><i class="fa fa-edit"></i> Editar</button>

<button class="btn btn-danger btn-sm delete " data-id="<?php echo $row['id']; ?>" onclick = "funcionY(<?php echo $row['id']; ?>)"><i class="fa fa-trash"></i> Eliminar</button>



</div>


                          </td>



                        </tr>
<?php 
    } 
    ?>
                  
                  </tbody>

                  <!-- los th son los encabezados -->


                <!--   <tfoot>
                  <tr>
                    <th>Codigo Empresa</th> 
                    <th>Nombre Usuario</th>
                    <th>Cargo</th>
                    <th>Entrada</th>  
                    <th>Salida</th>                 
                    <th>cedula</th>                   
                    <th>Acciones</th>
                  </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>