<?php
	include("../conexion/conexion.php");
  
    $data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_DESCRIPCION LIKE '%".$searchTerm."%' ORDER BY IMPUESTO_DESCRIPCION ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['IMPUESTO_DESCRIPCION'];
    }
    
    //return json data
    echo json_encode($data);
  ?>