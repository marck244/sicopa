<?php

include('../conexion/conexion.php');
$salida="";
$nada="";
$id_lotificacion=$_POST["elegido"];

if ($id_lotificacion == "0") {
	$nada.= "<option value=''>Seleccione</option>";
	echo $nada;
}
// construimos el combo de ciudades deacuerdo al pais seleccionado
$combog = $conn->query("SELECT LOTE_ID,LOTIFICACION_ID FROM lote WHERE LOTIFICACION_ID='$id_lotificacion' AND LOTE_ESTADO='LIBRE' ORDER BY LOTE_ID ASC");
  while($sql_p = $combog->fetch_assoc())
  {
   $salida.= "<option value='".$sql_p['LOTE_ID']."'>".$sql_p['LOTE_ID']."</option>";
  }  
echo $salida;



?>