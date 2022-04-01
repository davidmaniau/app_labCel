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

            <input type="hidden" class="empid" name="id">
            <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"               name="modulo"  value="01index.php">


            <div class="form-group">
                <label for="tipo_venta_id" class="col-sm-3 control-label">Tipo Venta:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="tipo_venta_id" id="tipo_venta_id" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                        $sql = "SELECT * FROM venta_tipo where estado_registro = 1";
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
              <label for="datepicker">Fecha</label>
              <div class="input-group date"  id="reservationdate11" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" id="datepicker" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate11"  value="<?php echo date("d-m-Y");?>" data-toggle="datetimepicker"/>
            </div>
        </div>


        <div class="form-group">
            <label for="cliente_id" class="col-sm-3 control-label">Cliente:</label>

            <div class="col-sm-9">
                <select class="form-control" name="cliente_id" id="cliente_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM cliente where estado_registro = 1";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                        echo "
                        <option value='" . $prow['id'] . "'>" . $prow['nombre'] . "</option>
                        ";
                    }
                    ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="vendedor_id" class="col-sm-3 control-label">Vendedor:</label>
            <div class="col-sm-9">
                <select class="form-control" name="vendedor_id" id="vendedor_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM usuarios where estado_registro = 1";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                        echo "
                        <option value='" . $prow['id'] . "'>" . $prow['nombre_completo'] . "</option>
                        ";
                    }
                    ?>
                </select>
            </div>
        </div>












    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="add" class="btn btn-primary">Agregar detalles</button>
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
            <input type="hidden" class="empid" name="id">
            <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"               name="modulo"  value="01index.php">

            <div class="form-group">
                <label for="edit_nombre" class="col-sm-3 control-label">Nombre:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                </div>
            </div>

            <div class="form-group">
                <label for="edit_rtn_dni" class="col-sm-3 control-label">RTN/DNI</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_rtn_dni" name="rtn_dni" required>
                </div>
            </div>


            <div class="form-group">
                <label for="edit_cliente_tipo_id" class="col-sm-3 control-label">Rol</label>
                <div class="col-sm-9">
                    <select class="form-control" name="cliente_tipo_id" id="edit_cliente_tipo_id" required>
                        <option value="" selected>- Seleccionar -</option>
                        <?php
                        $sql = "SELECT * FROM cliente_tipo";
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
                <label for="edit_telefono" class="col-sm-3 control-label">Teléfono</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_telefono" name="telefono" required>
                </div>
            </div>

            <div class="form-group">
                <label for="edit_direccion" class="col-sm-3 control-label">Dirección</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_direccion" name="direccion" required>
                </div>
            </div>

            <div class="form-group">
                <label for="edit_email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_email" name="email" required>
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








<div class="modal fade" id="modal-abonar">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="05abonar.php" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Abonar </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">
            <input type="hidden" class="empid" name="id">
            <input type="hidden" class="empid3" name="id3">
            <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"               name="modulo"  value="01index.php">
            


            <div class="form-group row">
              <label class="col-sm-2" for="datepicker">Fecha</label>
              <div class="input-group date col-sm-10"  id="reservationdate1" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" id="datepicker" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate1"  value="<?php echo date("d-m-Y");?>" data-toggle="datetimepicker"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit_monto" class="col-sm-2 control-label">Monto Pendiente:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="edit_monto" readonly name="monto" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="edit_abono" class="col-sm-2 control-label">Abono</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  step="any" id="edit_abono" name="abono" required />
            </div>
        </div>


        <div class="form-group row">
            <label for="edit_forma_pago" class="col-sm-2 control-label">Forma Pago</label>
            <div class="col-sm-10">
                <select class="form-control" id="edit_forma_pago" name="forma_pago" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM forma_pago";
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




    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="abonar" class="btn btn-primary">Abonar</button>
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