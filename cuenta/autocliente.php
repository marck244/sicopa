<?php
include("../conexion/conexion.php");
  
    $data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $q = $conn->query("SELECT CLIENTE_ID FROM cliente WHERE CLIENTE_ID LIKE '%".$searchTerm."%' ORDER BY CLIENTE_ID ASC");
    while ($row = $q->fetch_assoc()) {
        $data[] = $row['CLIENTE_ID'];
    }
    
    //return json data
    echo json_encode($data);

  ?>