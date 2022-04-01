<!-- ------------------------------------------------------------------------------------------
----------------------TOMAR LOS DATOS QUE SE AGREGARAN A LA BASE DE DATOS ------------------------------------------------------------
------------------------------------------------------------------------------------------ --> 


 <div class="modal fade" id="modal-add">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="04agregar.php" method="POST">

                <div class="modal-header">
                  <h4 class="modal-title">Nuevo <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

                <input type="hidden" name="tabla"  value="<?php echo $tabla; ?>">
                    

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


                     <div class="form-group mb-3">
            <label for="exampleSelectBorder">Tipo Marcacion </label>
                  <select name = "tipo_marcacion_id" class="custom-select" id="exampleSelectBorder">
                    <option value="1">Entrada</option>
                    <option value="2">Salida</option>                    
                  </select>
                </div>


                    <!-- Date -->
                <div class="form-group">
                  <label for="datepicker_add">Fecha</label>
                    <div class="input-group date"  id="reservationdate11" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                        <input type="text" id="datepicker" name="fecha_ini" class="form-control datetimepicker-input" data-target="#reservationdate11"  value="<?php echo date("d-m-Y");?>" data-toggle="datetimepicker"/>
                        
                    </div>
                </div>


                      <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label for="time_in">Hora Marco:</label>

                    <div class="input-group date" id="timepicker11" data-target-input="nearest">


 <div class="input-group-append" data-target="#timepicker11" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>

                      <input type="text" id="time_in" value="<?php echo $hora_actual ?>" name="time_in" data-toggle="datetimepicker" class="form-control datetimepicker-input" data-target="#timepicker11"/>

                     
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                  
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="marcar_asistencia" class="btn btn-primary">Guardar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->







<!-- _________________________________________________________________---------------------------------------
---------------------------RECUPERAR YU MOSTRAR LOS ELEMENTOS DE UN REGISTRO QUE YA ESTA GUARDADO EN LA BASE DE DATOS -----------------------------------------------------------------------------

 -->





 <div class="modal fade" id="modal-edit_e">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="05editar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar Entrada <?php echo $titulo_modulo; ?> de:  <span class="employee_id"></span></h4>
                  
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

            


                     
                    <input type="true" class="empid" name="id">
                    <input type="true"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="true"               name="modulo"  value="01index.php">




 <!-- Date -->
                <div class="form-group">
                  <label for="datepicker_edit">Fecha Entrada 1</label>
                    <div class="input-group date"  id="reservationdate" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                        <input type="text" id="datepicker_edit" name="fecha_ini" class="form-control datetimepicker-input" data-target="#reservationdate" data-toggle="datetimepicker"/>
                        
                    </div>
                </div>


                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label for="edit_time_in">Hora Marco Entrada:</label>

                    <div class="input-group date" id="timepicker" data-target-input="nearest">


 <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>

                      <input type="text" id="edit_time_in" name="time_in" data-toggle="datetimepicker" class="form-control datetimepicker-input" data-target="#timepicker"/>

                     
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

                    
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="edit_e" class="btn btn-primary">Modificar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






<!-- /////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// EDITAR LA SALIDA  ///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////// -->




 <div class="modal fade" id="modal-edit_s">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="05editar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar Salida <?php echo $titulo_modulo; ?> de:  <span class="employee_id"></span></h4>
                  
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

                     
                    <input type="hidden" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">


                <div class="form-group">
                  <label for="datepicker_edit_s" >Fecha Salida</label>
                    <div class="input-group date"  id="reservationdate2" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                        <input type="text" id="datepicker_edit_s" value="<?php echo $fecha_actual; ?>" name="fecha_out" class="form-control datetimepicker-input" data-target="#reservationdate2" data-toggle="datetimepicker"/>
                        
                    </div>
                </div>





                <div class="bootstrap-timepicker2">
                  <div class="form-group">
                    <label for="edit_time_out">Hora Marco Salida:</label>

  

                    <div class="input-group date" id="timepicker2" data-toggle="datetimepicker" data-target-input="nearest">


<div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>


                      <input type="text" id="edit_time_out" name="time_out" class="form-control datetimepicker-input" data-target="#timepicker2"/>

                    
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>



                          


                    
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="edit_s" class="btn btn-primary">Modificar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->













<!-- ----------------------------------------------------------------------------------------------------------------------------------------------ACTUALIZAR LA FOTO SI ES QUE INCLUYE FOTO-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

 <div class="modal fade" id="modal-edit-picture">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="05editar_fotos.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar foto <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

                  <div class="form-group row">
                        <label for="dato1" class="col-sm-2 col-form-label"><?php echo $dato1 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato1" placeholder="ingrese el <?php echo $dato1 ?>" name="dato1">
                           </div>
                      </div>


                        <div class="form-group row">
                        <label for="dato2" class="col-sm-2 col-form-label"><?php echo $dato2 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato2" placeholder="ingrese el <?php echo $dato2 ?>" name="dato2">
                           </div>
                      </div>


                      <div class="form-group row">
                        <label for="dato3" class="col-sm-2 col-form-label"><?php echo $dato3 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato3" placeholder="ingrese el <?php echo $dato3 ?>" name="dato3">
                      </div>
                       </div>
                      <!-- <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                          </div>
                        </div>
                      </div> -->
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






<!-- 
      --------------------------------------------------------------------------------------------------------------------------------------MODAL PARA ELIMINAR ------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



     <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form id="frm_eliminar" class="form-horizontal" action="06eliminar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Eliminar <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

                <?php 

                $modo_desarrollo=false;

                if ($modo_desarrollo) {
                  
                ?>

                 <input type="text" class="empid" name="id">
                 <input type="text" name="tabla"  value="<?php echo $tabla; ?>">
                 <input type="text" name="modulo"  value="01index.php">


                  <?php } ?>

                <p style="text-align: center;">Deseas eliminar este la <?php echo $tabla.' '; ?></p>
                     
                     
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger" name="delete">Eliminar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal