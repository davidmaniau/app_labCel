

  <span class="right badge badge-success">ok</span>


<?php


 // CONSULTA PARA OBTENER UN VALOR

        $CONSULTA = "SELECT * FROM TABLA";
        $EJECUTAR = $conn->query($CONSULTA);
        $RESPUESTA = $EJECUTAR->fetch_assoc();
        $VALOR_BUSCADO =  $RESPUESTA['totalAbonos'];




$sql = "SELECT sum(total) as totalr, ".$tablax.".venta_id as empid, IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id = ".$id.") ,0) as totalAbonos,
round( (IfNull( (sum(total) + (sum(total) * 0.15)) ,0)) - IfNull( (select sum(monto) from ventas_detalle_abonos where ventas_detalle_abonos.venta_detalle_id =  ".$id.") ,0) ,2)
as pendiente
FROM ventas_detalle where ".$tablax.".venta_id = ".$id." and ".$tablax.".tipo_doc_id = 2";



$idp = $row['idp'];
$sql5x = "SELECT *, seleccion_lentes.id as empid FROM seleccion_lentes left join productos on productos.id = seleccion_lentes.producto_id where factura_id = ".$idp;

$query5x = $conn->query($sql5x);
while($row5x = $query5x->fetch_assoc()){
    echo '<strong>'.$row5x['descripcion'].'</strong>'.'<br>-----------<br>';  }

    $sql5x = "SELECT sum(abono) as totalAbonos FROM facturas_abonos where  factura_id = ".$idp;

    $query5x = $conn->query($sql5x);
    $row5x = $query5x->fetch_assoc();

    $totalAbonos =  $row5x['totalAbonos'];

    $idp = $row['idp'];
    $sql5x = "SELECT *, seleccion_lentes.id as empid FROM seleccion_lentes left join productos on productos.id = seleccion_lentes.producto_id where factura_id = ".$idp;
    $query5x = $conn->query($sql5x);
    while($row5x = $query5x->fetch_assoc()){
        echo '<strong>'.$row5x['descripcion'].'</strong>'.'<br>-----------<br>';  }






        ?>


        <?php

   






        $sql = "UPDATE facturas SET abonos = '$nombre', edad = '$edad',
        telefono = '$telefono',
        promotor_id = '$promotor_id', ciudad_id = '$ciudad_id', C10 = '$C10'
        WHERE id = '$empid'";

        if($conn->query($sql)){
            $_SESSION['success'] = 'actualizado con éxito ';//.$modulo;//.$sql;
        }
        else{
            $_SESSION['error'] = $conn->error;//.$sql;
        }

        ?>


        <script>

            function cal() {
               try {
//UNIDAD---A
var a = parseFloat(document.f.A.value);
//console.log('valor obtenido: '+ a);
if (isNaN(a)) {
    a=0;
}

//PRECIOU---B
var b_po = parseFloat(document.f.b_po.value);
//console.log('valor obtenido:: '+b);
if (isNaN(b_po)) {
    b_po=0;
}

//PRECIOU---C
var b_so = parseFloat(document.f.b_so.value);
//console.log('valor obtenido:: '+c);
if (isNaN(b_so)) {
    b_so=0;
}

//PRECIOU---B
var d = parseFloat(document.f.d.value);
//console.log('valor obtenido:: '+b);
if (isNaN(d)) {
    d=0;
}

//PRECIOU---C
var f = parseFloat(document.f.f.value);
//console.log('valor obtenido:: '+c);
if (isNaN(f)) {
    f=0;
}


//SUBTOTAL---C
var c = parseFloat((b_po+b_so)/a)*100;
//console.log('subtotal: '+c);

document.f.c.value = c.toFixed(2);


var e = parseFloat(d/a)*100;
//console.log('subtotal: '+c);

document.f.e.value = e.toFixed(2);

var g = parseFloat(f/a)*100;
//console.log('subtotal: '+c);

document.f.g.value = g.toFixed(2);



}
catch (e) {
}
}
</script>







echo '<script>window.history.go(-1)</script>';