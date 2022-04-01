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

            <label for="gasto_tipo_id" class="col-sm-3 control-label">Tipo de Gasto</label>

            <div class="col-sm-9">
                <select class="form-control" name="gasto_tipo_id" id="gasto_tipo_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sqla = "SELECT * FROM gasto_tipo where estado_registro = '1'";
                    $querya = $conn->query($sqla);
                    while ($prow = $querya->fetch_assoc()) {
                        echo "<option value='".$prow['id']."'>". $prow['descripcion'] . "</option> ";
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


        <label for="proveedor_id" class="col-sm-3 control-label">Proveedor</label>

        <div class="col-sm-9">
            <select class="form-control" name="proveedor_id" id="proveedor_id" required>
                <option value="" selected>- Seleccionar -</option>
                <?php
                $sql = "SELECT * FROM proveedor";
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
        <label for="descripcion_gasto" class="col-sm-3 control-label">Descripción</label>

        <div class="col-sm-9">
            <input type="text" class="form-control" id="descripcion_gasto" name="descripcion_gasto" required>
        </div>
    </div>

    <div class="form-group">
        <label for="monto" class="col-sm-3 control-label">Monto</label>

        <div class="col-sm-9">
            <input type="text" class="form-control" id="monto" name="monto" required>
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

            <label for="edit_gasto_tipo_id" class="col-sm-3 control-label">Tipo de Gasto</label>

            <div class="col-sm-9">
                <select class="form-control" name="gasto_tipo_id" id="edit_gasto_tipo_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sqla = "SELECT * FROM gasto_tipo where estado_registro = '1'";
                    $querya = $conn->query($sqla);
                    while ($prow = $querya->fetch_assoc()) {
                        echo "<option value='".$prow['id']."'>". $prow['descripcion'] . "</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>




        <div class="form-group">
          <label for="datepicker_edit">Fecha</label>
          <div class="input-group date"  id="reservationdate" data-target-input="nearest">

              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>

            <input type="text" id="datepicker_edit" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate"   data-toggle="datetimepicker"/>
        </div>
    </div>

    <div class="form-group">


        <label for="edit_proveedor_id" class="col-sm-3 control-label">Proveedor</label>

        <div class="col-sm-9">
            <select class="form-control" name="proveedor_id" id="edit_proveedor_id" required>
                <option value="" selected>- Seleccionar -</option>
                <?php
                $sql = "SELECT * FROM proveedor";
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
        <label for="edit_descripcion_gasto" class="col-sm-3 control-label">Descripción</label>

        <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_descripcion_gasto" name="descripcion_gasto" required>
        </div>
    </div>

    <div class="form-group">
        <label for="edit_monto" class="col-sm-3 control-label">Monto</label>

        <div class="col-sm-9">
            <input type="text" class="form-control" id="edit_monto" name="monto" required>
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
      <!-- /.modal-->