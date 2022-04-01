 <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">

        <form  class="form-horizontal" action="04agregar.php" method="POST">

            <div class="modal-header">
              <h4 class="modal-title">Nuevo <?php echo $titulo_modulo; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">

            <input type="hidden" name="tabla"  value="<?php echo $tabla; ?>">



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
            <label style="text-align: right;" for="usuario_id" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">

              <select class="form-control"  id="usuario_id"    name="usuario_id" required>
                <option value="" selected> Seleccionar </option>
                <?php
                $sql = "SELECT * FROM usuarios  ORDER BY nombre_completo asc";
                $query = $conn->query($sql);
                while ($prow = $query->fetch_assoc()) {
                    echo "<option value='" . $prow['id'] . "'>".$prow['nombre_completo'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>





    <div class="form-group row">
        <label style="text-align: right;" for="monto" class="col-sm-2 col-form-label">Monto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" onchange="cal()" onkeyup="cal()" id="monto" placeholder="ingrese el monto" name="monto">
        </div>
    </div>






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

        <form  class="form-horizontal" action="05editar.php" method="post">

            <div class="modal-header">
              <h4 class="modal-title">Editar Adelanto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">


            <input type="hidden"  class="empid" name="id">
            <input type="hidden"                name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"                name="modulo"  value="01index.php">



            <div class="form-group row">
              <label for="datepicker_edit" class="col-sm-2 col-form-label">Fecha</label>
              <div class="input-group date col-sm-10"  id="reservationdate2" data-target-input="nearest">

                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>

                <input type="text" id="datepicker_edit" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate2"   data-toggle="datetimepicker"/>
            </div>
        </div>



        <div class="form-group row">
            <label style="text-align: right;" for="edit_usuario_id" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">

              <select class="form-control"  id="edit_usuario_id"    name="usuario_id" required>
                <option value="" selected> Seleccionar </option>
                <?php
                $sql = "SELECT * FROM usuarios  ORDER BY nombre_completo asc";
                $query = $conn->query($sql);
                while ($prow = $query->fetch_assoc()) {
                    echo "<option value='" . $prow['id'] . "'>".$prow['nombre_completo'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>





    <div class="form-group row">
        <label style="text-align: right;" for="edit_monto" class="col-sm-2 col-form-label">Monto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" onchange="cal()" onkeyup="cal()" id="edit_monto" placeholder="ingrese el monto" name="monto">
        </div>
    </div>







</div>

<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <button type="submit" name="edit" class="btn btn-success">Guardar cambios</button>
</div>

</form>

</div>





<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->








<div class="modal fade" id="modal-edit2">
    <div class="modal-dialog">



      <div class="modal-content">

        <form class="form-horizontal" action="04abonar.php" method="post">

            <div class="modal-header">
              <h4 class="modal-title">Abonar</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">


            <input type="hidden"  class="empid" name="id">
            <input type="hidden"                name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"                name="modulo"  value="01index.php">

            <div class="form-group row">
                <label style="text-align: right;" for="edit_saldo" class="col-sm-2 col-form-label">Saldo Pendiente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly id="edit_saldo" placeholder="ingrese el saldo" name="saldo">
                </div>
            </div>


            <div class="form-group row">
                <label style="text-align: right;" for="edit_abono" class="col-sm-2 col-form-label">abono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="edit_abono" placeholder="ingrese el abono" name="abono">
                </div>
            </div>






        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="editar2" class="btn btn-primary">Abonar</button>
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