<?php
	
	include("../conexion/conexion.php");
  
    $data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT USER_NICK FROM usuario WHERE USER_NICK LIKE '%".$searchTerm."%' ORDER BY USER_NICK ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['USER_NICK'];
    }
    
    //return json data
    echo json_encode($data);


  ?>