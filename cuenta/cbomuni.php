<?php
include('../conexion/conexion.php');
$salida="";
$id_pais=$_POST["elegido"];
// construimos el combo de ciudades deacuerdo al pais seleccionado
$combog = $conn->query("SELECT MUNICIPIO_ID,DEPARTAMENTO_ID,MUNICIPIO_NOMBRE FROM municipio WHERE DEPARTAMENTO_ID='$id_pais' ORDER BY MUNICIPIO_NOMBRE ASC");
  while($sql_p = $combog->fetch_assoc())
  {
   $salida.= "<option value='".$sql_p['MUNICIPIO_ID']."'>".$sql_p['MUNICIPIO_NOMBRE']."</option>";
  }  
echo $salida;
?>