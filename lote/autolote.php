<?php

	
	include("../conexion/conexion.php");
  
    $data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT LOTE_ID FROM lote WHERE LOTE_ID LIKE '%".$searchTerm."%' ORDER BY LOTE_ID ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['LOTE_ID'];
    }
    
    //return json data
    echo json_encode($data);


  ?>