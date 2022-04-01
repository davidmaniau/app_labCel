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
                    

                  <div class="form-group row">
                        <label style="text-align: right;" for="dato1" class="col-sm-2 col-form-label"><?php echo $campo1 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato1" placeholder="ingrese el <?php echo $campo1 ?>" name="dato1">
                           </div>
                      </div>


                        <div class="form-group row">
                        <label style="text-align: right;" for="dato2" class="col-sm-2 col-form-label"><?php echo $campo2 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato2" placeholder="ingrese el <?php echo $campo2 ?>" name="dato2">
                           </div>
                      </div>

                      <div class="form-group row">
                        <label style="text-align: right;" for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="telefono" placeholder="ingrese el telefono" name="telefono">
                           </div>
                      </div>



                      <div class="form-group row">
                        <label style="text-align: right;" for="dato3" class="col-sm-2 col-form-label"><?php echo $campo3 ?></label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="dato3" placeholder="ingrese el <?php //echo $campo3 ?>" name="dato3"> -->
                              <select class="form-control"  id="dato3"    name="dato3" required>
                                    <option value="" selected> Seleccionar </option>
                                    <?php
                                    $sql = "SELECT * FROM usuarios where usuario_tipo_id = 2 ORDER BY nombre asc";
                                    $query = $conn->query($sql);
                                    while ($prow = $query->fetch_assoc()) {
                                        echo "<option value='" . $prow['id'] . "'>".$prow['nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label style="text-align: right;" for="ciudad_id" class="col-sm-2 col-form-label">Ciudad</label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="ciudad_id" placeholder="ingrese el <?php //echo $campo3 ?>" name="ciudad_id"> -->
                              <select class="form-control"  id="ciudad_id"    name="ciudad_id"  required>
                                    <option value="" selected> Seleccionar </option>
                                    <?php
                                    $sql = "SELECT * FROM departamentos ORDER BY descripcion ASC";
                                    $query = $conn->query($sql);
                                    while ($prow = $query->fetch_assoc()) {
                                        echo "<option value='" . $prow['id'] . "'>".$prow['descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                      </div>



<!-- Date -->
                <div class="form-group row">
                  <label style="text-align: right;" for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="input-group date col-sm-10"  id="reservationdate" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                        <input type="text" id="fecha" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo date("d-m-Y");?>" data-toggle="datetimepicker"/>

                    </div>
                </div>



                      <div class="form-group row">
                        <label style="text-align: right;" for="diez" class="col-sm-2 col-form-label">C$ 10</label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="diez" placeholder="ingrese el <?php //echo $campo3 ?>" name="diez"> -->
                              <select class="form-control"  id="diez"    name="diez"  required>
                                    <option value="" selected> Seleccionar </option>
                                    <option value="10" selected> 10.00 </option>
                                    <option value="0" selected> 0.00 </option>
                                </select>
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
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="add" class="btn btn-primary">Guardar</button>
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





 <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="05editar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Realizando Examenes <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">


                    <input type="text"  class="empid" name="id">
                    <input type="text"  class="empid2" name="id2">
                    <input type="hidden"                name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"                name="modulo"  value="01index.php">


                  <div class="form-group row">
                        <label style="text-align: right;" for="edit_nombre" class="col-sm-2 col-form-label"><?php echo $campo1 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_nombre" placeholder="ingrese el <?php echo $campo1 ?>" name="nombre">
                           </div>
                      </div>


                        <div class="form-group row">
                        <label style="text-align: right;" for="edit_edad" class="col-sm-2 col-form-label"><?php echo $campo2 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_edad" placeholder="ingrese el <?php echo $campo2 ?>" name="edad">
                           </div>
                      </div>

                      <div class="form-group row">
                        <label style="text-align: right;" for="edit_telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="edit_telefono" placeholder="ingrese el telefono" name="telefono">
                           </div>
                      </div>



                      <div class="form-group row">
                        <label style="text-align: right;" for="dato3" class="col-sm-2 col-form-label"><?php echo $campo3 ?></label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="dato3" placeholder="ingrese el <?php //echo $campo3 ?>" name="dato3"> -->
                              <select class="form-control"  id="edit_promotor_id"    name="promotor_id" required>
                                    <option value="" selected> Seleccionar </option>
                                    <?php
                                    $sql = "SELECT * FROM usuarios where usuario_tipo_id = 2 ORDER BY nombre asc";
                                    $query = $conn->query($sql);
                                    while ($prow = $query->fetch_assoc()) {
                                        echo "<option value='" . $prow['id'] . "'>".$prow['nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label style="text-align: right;" for="ciudad_id" class="col-sm-2 col-form-label">Ciudad</label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="ciudad_id" placeholder="ingrese el <?php //echo $campo3 ?>" name="ciudad_id"> -->
                              <select class="form-control"  id="edit_ciudad_id"    name="ciudad_id"  required>
                                    <option value="" selected> Seleccionar </option>
                                    <?php
                                    $sql = "SELECT * FROM departamentos ORDER BY descripcion ASC";
                                    $query = $conn->query($sql);
                                    while ($prow = $query->fetch_assoc()) {
                                        echo "<option value='" . $prow['id'] . "'>".$prow['descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                      </div>



<!-- Date -->
                <div class="form-group row">
                  <label style="text-align: right;" for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="input-group date col-sm-10"  id="reservationdate" data-target-input="nearest">

                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>

                        <input type="text" id="edit_datepicker_edit" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo date("d-m-Y");?>" data-toggle="datetimepicker"/>

                    </div>
                </div>



                      <div class="form-group row">
                        <label style="text-align: right;" for="diez" class="col-sm-2 col-form-label">C$ 10</label>
                        <div class="col-sm-10">
                         <!-- <input type="text" class="form-control" id="diez" placeholder="ingrese el <?php //echo $campo3 ?>" name="diez"> -->
                              <select class="form-control"  id="edit_diez"    name="diez"  required>
                                    <option value="" selected> Seleccionar </option>
                                    <option value="10" selected> 10.00 </option>
                                    <option value="0" selected> 0.00 </option>
                                </select>
                        </div>
                      </div>








                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="edit" class="btn btn-primary">Modificar</button>
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

            <form class="form-horizontal" action="04agregar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar Foto <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

                  <div class="form-group row">
                        <label for="dato1" class="col-sm-2 col-form-label"><?php echo $campo1 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato1" placeholder="ingrese el <?php echo $campo1 ?>" name="dato1">
                           </div>
                      </div>


                        <div class="form-group row">
                        <label for="dato2" class="col-sm-2 col-form-label"><?php echo $campo2 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato2" placeholder="ingrese el <?php echo $campo2 ?>" name="dato2">
                           </div>
                      </div>


                      <div class="form-group row">
                        <label for="dato3" class="col-sm-2 col-form-label"><?php echo $campo3 ?></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="dato3" placeholder="ingrese el <?php echo $campo3 ?>" name="dato3">
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

            <form class="form-horizontal" action="06eliminar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">eliminar <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

               <div class="card-body">
                    <input type="text" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">


                    <p><h5 style="text-align: center;"> estas seguro que deseas eliminar este registro </h5></p>

                                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                </div>

            </form>

          </div>





          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->