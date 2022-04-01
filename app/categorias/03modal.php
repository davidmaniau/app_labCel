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

            <form class="form-horizontal" action="04agregar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Nuevo <?php echo $titulo_modulo; ?></h4>
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
                  <button type="submit" class="btn btn-primary">Modificar</button>
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
                  <h4 class="modal-title">Nuevo <?php echo $titulo_modulo; ?></h4>
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

            <form class="form-horizontal" action="04agregar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Nuevo <?php echo $titulo_modulo; ?></h4>
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
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

            </form>
          
          </div>
       




          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal