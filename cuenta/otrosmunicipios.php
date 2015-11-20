<?php

		include("../conexion/conexion.php");
	



$id_departamento = trim($_POST['id_departamento']);
$id_municipio=trim($_POST['id_municipio']);

$result = $conn->query("SELECT MUNICIPIO_ID,MUNICIPIO_NOMBRE,DEPARTAMENTO_ID FROM municipio WHERE DEPARTAMENTO_ID ='$id_departamento'   ORDER BY MUNICIPIO_NOMBRE ASC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['MUNICIPIO_ID'].'">'.$row['MUNICIPIO_NOMBRE'].'</option>';
    }
}
echo $html;











?>