

<!-- ----------------------------------------------------------------------------------------------------------------------------------------------ACTUALIZAR LA FOTO SI ES QUE INCLUYE FOTO-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<div class="modal fade" id="modal-edit-picture">
    <div class="modal-dialog">  
      <div class="modal-content">

        <form class="form-horizontal" action="05editar_fotos.php" method="post" enctype="multipart/form-data">

            <div class="modal-header">
              <h4 class="modal-title">Editar foto <?php echo $titulo_modulo; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">
            <input type="hidden" class="user_id_photo" name="id">

            <div class="form-group">
                <label for="photo" class="col-sm-3 control-label">Foto</label>

                <div class="col-sm-9">
                    <input type="file" id="photo" name="photo" required>
                </div>
            </div>

        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" name="upload" class="btn btn-primary">Salvar</button>
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

        <input type="hidden" class="empid" name="id">
        <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
        <input type="hidden"               name="modulo"  value="01index.php">

        <div class="card-body">



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





<div class="modal fade" id="modal-add">
    <div class="modal-dialog"> 
      <div class="modal-content">

        <form class="form-horizontal" action="04agregar.php" method="POST" enctype="multipart/form-data">

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
            <label for="rol_id" class="col-sm-3 control-label">Rol</label>
            <div class="col-sm-9">
                <select class="form-control" id="rol_id"  name="rol_id"required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM roles";
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
            <label for="nombre_usuario" class="col-sm-3 control-label">Usuario:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
            </div>
        </div>



        <div class="form-group">
            <label for="clave" class="col-sm-3 control-label">Contraseña:</label>

            <div class="col-sm-9">
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nombre_completo" class="col-sm-3 control-label">Nombre Completo:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
            </div>
        </div>



        <div class="form-group">
            <label for="photo" class="col-sm-3 control-label">Foto</label>
            <div class="col-sm-9">
                <input type="file" name="photo" id="photo">
            </div>
        </div>



        <div class="form-group">
            <label for="horario_id" class="col-sm-3 control-label">Horario</label>

            <div class="col-sm-9">
                <select class="form-control" name="horario_id" id="horario_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM horarios";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                        echo "
                        <option value='" . $prow['id'] . "'>" . $prow['hora_inicio'] .' - ' .$prow['hora_final']. "</option> ";
                    }
                    ?>
                </select>
            </div>
        </div>




        <div class="form-group">
            <label for="dni" class="col-sm-3 control-label">DNI:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
        </div>


        <div class="form-group">
            <label for="no_cuenta" class="col-sm-3 control-label">No cuenta:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="no_cuenta" name="no_cuenta" required>
            </div>
        </div>

        <div class="form-group">
            <label for="salario" class="col-sm-3 control-label">Salario:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="salario" name="salario" required>
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


          <form class="form-horizontal" action="05editar.php" method="POST" enctype="multipart/form-data">


            <input type="hidden" class="empid" name="id">
            <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
            <input type="hidden"               name="modulo"  value="01index.php">

            <div class="modal-header">
              <h4 class="modal-title">Editar <?php echo $titulo_modulo; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="card-body">

          <div class="form-group">
            <label for="edit_rol_id" class="col-sm-3 control-label">Rol</label>

            <div class="col-sm-9">
                <select class="form-control" name="rol_id" id="edit_rol_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM roles";
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
            <label for="edit_nombre_usuario" class="col-sm-3 control-label">Usuario:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_nombre_usuario" name="nombre_usuario" required>
            </div>
        </div>





        <div class="form-group">
            <label for="edit_nombre_completo" class="col-sm-3 control-label">Nombre Completo:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_nombre_completo" name="nombre_completo" required>
            </div>
        </div>

        

        <div class="form-group">
            <label for="edit_horario_id" class="col-sm-3 control-label">Horario</label>

            <div class="col-sm-9">
                <select class="form-control" name="horario_id" id="edit_horario_id" required>
                    <option value="" selected>- Seleccionar -</option>
                    <?php
                    $sql = "SELECT * FROM horarios";
                    $query = $conn->query($sql);
                    while ($prow = $query->fetch_assoc()) {
                        echo "
                        <option value='" . $prow['id'] . "'>" . $prow['hora_inicio'] .' - ' .$prow['hora_final']. "</option>
                        ";
                    }
                    ?>
                </select>
            </div>
        </div>




        <div class="form-group">
            <label for="edit_dni" class="col-sm-3 control-label">DNI:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_dni" name="dni" required>
            </div>
        </div>


        <div class="form-group">
            <label for="edit_no_cuenta" class="col-sm-3 control-label">No cuenta:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_no_cuenta" name="no_cuenta" required>
            </div>
        </div>

        <div class="form-group">
            <label for="edit_salario" class="col-sm-3 control-label">Salario:</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_salario" name="salario" required>
            </div>
        </div>


    </div>





    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" name= "edit" class="btn btn-primary">Modificar</button>
  </div>

</form>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->













<div class="modal fade" id="edit2">
    <div class="modal-dialog">



      <div class="modal-content">

        <form class="form-horizontal" action="05editar_2.php" method="post">

            <div class="modal-header">
              <h4 class="modal-title">Nueva Contraseña</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <input type="hidden" class="empid" name="id">
        <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
        <input type="hidden"               name="modulo"  value="01index.php">

        <div class="card-body">

         <div class="form-group row">
            <label for="clave" class="col-sm-3 control-label">Nueva Contraseña:</label>

            <div class="col-sm-9">
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
        </div>


    </div>

    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      <button type="submit" name="update2" class="btn btn-warning">Guardar</button>
  </div>

</form>

</div>

<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal-->


