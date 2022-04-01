


 <div class="modal fade" id="modal-add">
        <div class="modal-dialog">      



          <div class="modal-content">

            <form class="form-horizontal" action="04agregar.php" method="POST">

                <div class="modal-header">
                  <h4 class="modal-title">Agregar Producto</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

<input type="hidden" name="venta" value="<?php echo $doc; ?>">
<input type="hidden" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">



             <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Producto</th>                    
                    <th>Add</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php  

$tabla2  = "producto";
$sql = "SELECT *, id as empid
FROM ".$tabla2." 
where ".$tabla2.".estado_registro = 1";

$query = $conn->query($sql);



                    while($row = $query->fetch_assoc()){  


                      ?>
                      <tr>

                        <td><?php echo $row['descripcion']; ?></td>
                 
                        
                        <td>
                          
                          <div  class="btn-group-vertical"> 

 <a style="margin-top:5px; margin-bottom: 5px;" href="producto_add.php?id=<?php echo $row['empid'].'&doc='.$doc;?>" class="btn btn-success btn-sm "><i class="fa fa-check-square-o"></i> Añadir</a>




                        </td>

                      </tr>
                    <?php  }  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    
                    <th>Producto</th>                    
                    <th>Add</th>

                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
                  


                     

                        

                       
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










<!-- ------------------------------------------------------------------------------------------
----------------------TOMAR LOS DATOS QUE SE AGREGARAN A LA BASE DE DATOS ------------------------------------------------------------
------------------------------------------------------------------------------------------ --> 


 <div class="modal fade" id="modal-addx">
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

<input type="hidden" name="venta" value="<?php echo $doc; ?>">
<input type="hidden" class="empid" name="id">
                    <input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
                    <input type="hidden"               name="modulo"  value="01index.php">



                      <div class="form-group">
                        <label for="producto_id" class="col-sm-3 control-label">Producto:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="producto_id" id="producto_id" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM producto where estado_registro = 1

                                order by descripcion asc";

                                
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


                    
                  


                    <div class="form-group"  >
                    <label for="descripcion" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea cols="30" rows="10" class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                </div>



                    <div class="form-group">
                        <label for="cant" class="col-sm-3 control-label">Cantidad</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cant" name="cant" required>
                        </div>
                    </div>




                <div class="form-group">
                        <label for="pu" class="col-sm-3 control-label">Precio Unidad</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pu" name="pu" required>
                        </div>
                    </div>


<!--   <div class="form-group">
                        <label for="descuento" class="col-sm-3 control-label">Descuento</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="descuento" name="descuento" required>
                        </div>
                    </div> -->


                      <div class="form-group">
                        <label for="subt" class="col-sm-3 control-label">Sub Total con Desc</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subt" name="subt" required>
                        </div>
                    </div>



 


                    <div class="form-group">
                        <label for="impuesto" class="col-sm-3 control-label">Impuesto</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="impuesto" name="impuesto" required>
                        </div>
                    </div>


  


                    <div class="form-group">
                        <label for="total" class="col-sm-3 control-label">Total (cant * sub-desc)+imp</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total" name="total" required>
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

            <form name="f" class="form-horizontal" action="05editar.php" method="post">

                <div class="modal-header">
                  <h4 class="modal-title">Editar <?php echo $titulo_modulo; ?></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
               <div class="card-body">

<input type="hidden" name="venta" value="<?php echo $doc; ?>">

<input type="hidden" class="empid" name="id">
<input type="hidden" class="empid2" name="id2">

<input type="hidden"               name="tabla"  value="<?php echo $tabla; ?>">
<input type="hidden"               name="modulo"  value="01index.php?d=<?php echo $doc; ?>">


                    <div class="form-group">
                        <label for="cant"  class="col-sm-3 control-label">Cantidad</label>

                        <div class="col-sm-9">
                            <input type="text" onchange="cal()" onkeyup="cal()" class="form-control" id="edit_cant" name="cant" required>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="ancho"  class="col-sm-3 control-label">Ancho</label>

                        <div class="col-sm-9">
                            <input type="text" onchange="cal()" onkeyup="cal()" class="form-control" id="edit_ancho" name="ancho" required>
                        </div>
                    </div>

                      <div class="form-group">
                        <label for="altura"  class="col-sm-3 control-label">Altura</label>

                        <div class="col-sm-9">
                            <input type="text" onchange="cal()" onkeyup="cal()" class="form-control" id="edit_altura" name="altura" required>
                        </div>
                    </div>


                       <div class="form-group">
                        <label for="edit_unidad_id" class="col-sm-3 control-label">Unidad de Medida:</label>
                        <div class="col-sm-9">
                            <select onchange="cal()" onkeyup="cal()" class="form-control" name="unidad_id" id="edit_unidad_id" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM unidades_medidas order by abreviatura asc";
                                $query = $conn->query($sql);
                                while ($prow = $query->fetch_assoc()) {
                                    echo "
                              <option value='" . $prow['factor_conversion'] . "'>" . $prow['abreviatura'] . "</option>
                            ";
                                }
                                ?>
                            </select>
                        </div>
                    </div>




                      <div class="form-group">
                        <label for="area_pieza"  class="col-sm-3 control-label">Area pulgs</label>

                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control"  id="edit_area_pieza" name="area_pieza" required>
                        </div>
                    </div>


                       <div class="form-group">
                        <label for="edit_producto_id" class="col-sm-3 control-label">Producto:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="producto_id" id="edit_producto_id" required>
                                <option value="" selected>- Seleccionar -</option>
                                <?php
                                $sql = "SELECT * FROM producto where estado_registro = 1 order by descripcion asc";
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


                    

                    
                  


                    <div class="form-group"  >
                    <label for="edit_descripcion" class="col-sm-3 control-label">Descripcion</label>
                    <div class="col-sm-9">
                        <textarea cols="30" rows="3" class="form-control" id="edit_descripcion" name="descripcion"></textarea>
                    </div>
                </div>



                 




                <div class="form-group">
                        <label for="edit_pu"  class="col-sm-3 control-label">Precio Unidad</label>

                        <div class="col-sm-9">
                            <input type="text" onchange="cal()" onkeyup="cal()" class="form-control" id="edit_pu" name="pu" required>
                        </div>
                    </div>


                      <div class="form-group">
                        <label for="edit_precio_pieza"  class="col-sm-3 control-label">Precio Unidad</label>

                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" id="edit_precio_pieza" name="precio_pieza" required>
                        </div>
                    </div>


 <div class="form-group">
                        <label for="edit_total" class="col-sm-3 control-label">Total</label>

                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" id="edit_total" name="total" required>
                         </div>
                    </div>


                    
<script>

function cal() {
 try {

//UNIDAD---A
var a = parseInt(document.f.cant.value);
//console.log('cantidad: '+ a);

var altox = parseFloat(document.f.altura.value);
//console.log('cantidad: '+ a);

var ancho = parseFloat(document.f.ancho.value);
//console.log('cantidad: '+ a);

var factor = parseFloat(document.f.unidad_id.value);
console.log('factor: '+ factor);


//SUBTOTAL---C
if (factor==39.37) {
  var area = parseFloat(altox*ancho)*factor;
//console.log('subtotal: '+c);
document.f.area_pieza.value = area.toFixed(2);
} 

if (factor==2.25) {
  var area = parseFloat(altox*ancho)/factor;
//console.log('subtotal: '+c);
document.f.area_pieza.value = area.toFixed(2);
} 

if (factor==12.00) {
  var area = parseFloat(altox*ancho)*factor;
//console.log('subtotal: '+c);
document.f.area_pieza.value = area.toFixed(2);
}

if (factor==1.00) {
  var area = parseFloat(altox*ancho)*factor;
//console.log('subtotal: '+c);
document.f.area_pieza.value = area.toFixed(2);
}




//PRECIOU---B
var b = parseFloat(document.f.pu.value);
//console.log('prciou: '+b);


  var preciopieza = parseFloat(b*area);
//console.log('subtotal: '+c);
document.f.precio_pieza.value = preciopieza.toFixed(2);


//SUBTOTAL---C
var c = parseFloat(a*preciopieza);
//console.log('subtotal: '+c);

document.f.total.value = c.toFixed(2);




  }
  catch (e) {
  }
}
</script>


 



  


                   
   
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