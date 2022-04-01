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


                  
                    <div class="form-group">
                    <input type="hidden" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">
                    
                        


                        <label for="nombre" class="col-sm-3 control-label">Nombre:</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>



                      <div class="form-group">
                        <label for="apellido" class="col-sm-3 control-label">Apellido</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                    </div>


                          <div class="form-group">
                        <label for="dni" class="col-sm-3 control-label">DNI</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="dni" name="dni" required>
                        </div>
                    </div>

                       


                            <div class="form-group">
                        <label for="cargo_id" class="col-sm-3 control-label">Cargo</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="cargo_id" id="cargo_id" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM cargos";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                              <option value='" . $prow['id'] . "'>" . $prow['descripcion'] . "</option>
                            ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="salario_mensual" class="col-sm-3 control-label">Salario Mensual</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="salario_mensual" name="salario_mensual" required>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="numero_cuenta_banco" class="col-sm-3 control-label">N° Cuenta Banco</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="numero_cuenta_banco" name="numero_cuenta_banco" required>
                        </div>
                    </div>

                          <div class="form-group">
                        <label for="entrada" class="col-sm-3 control-label">H. Entrada</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="entrada" name="entrada" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="salida" class="col-sm-3 control-label">H. Salida</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="salida" name="salida" required>
                        </div>
                    </div>

                       
                  </div>

                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
                  <h4 class="modal-title">Editar <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">


                  <div class="form-group">

                    <input type="hidden" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">

                        <label for="edit_nombre" class="col-sm-3 control-label">Nombre:</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                        </div>
                    </div>


                      <div class="form-group">
                        <label for="edit_apellido" class="col-sm-3 control-label">Apellido</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_apellido" name="apellido" required>
                        </div>
                    </div>


                          <div class="form-group">
                        <label for="edit_dni" class="col-sm-3 control-label">DNI</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_dni" name="dni" required>
                        </div>
                    </div>

                       


                            <div class="form-group">
                        <label for="edit_cargo_id" class="col-sm-3 control-label">Cargo</label>

                        <div class="col-sm-9">
                            <select class="form-control" name="cargo_id" id="edit_cargo_id" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM cargos";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                              <option value='" . $prow['id'] . "'>" . $prow['descripcion'] . "</option>
                            ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="edit_salario_mensual" class="col-sm-3 control-label">Salario Mensual</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_salario_mensual" name="salario_mensual" required>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="edit_numero_cuenta_banco" class="col-sm-3 control-label">N° Cuenta Banco</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_numero_cuenta_banco" name="numero_cuenta_banco" required>
                        </div>
                    </div>

                          <div class="form-group">
                        <label for="edit_entrada" class="col-sm-3 control-label">H. Entrada</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_entrada" name="entrada" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_salida" class="col-sm-3 control-label">H. Salida</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_salida" name="salida" required>
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

            <form class="form-horizontal" action="05editar_fotos.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar foto <?php echo $titulo_modulo; ?></h4>
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
  <input type="hidden" class="empid" name="id">
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
      <!-- /.modal