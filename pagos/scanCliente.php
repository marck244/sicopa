<?php

require("../conexion/conexion.php");
   
$data = array();
   
$scanDui = $_GET['term'];
    
$q = $conn->query("SELECT CLIENTE_ID, CLIENTE_NOMBRE, CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID LIKE '%".$scanDui."%' ORDER BY CLIENTE_ID ASC");

while ($row = $q->fetch_assoc()) {
    $dui_mask = str_split($row['CLIENTE_ID']);
    $iddui = $dui_mask[0].$dui_mask[1].$dui_mask[2].$dui_mask[3].$dui_mask[4].$dui_mask[5].$dui_mask[6].$dui_mask[7]."-".$dui_mask[8];
    $data[] = $iddui;
}
    
echo json_encode($data);

?>