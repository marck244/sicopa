
<?php
include("../conexion/conexion.php");
  
    $data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT CLIENTE_ID FROM cuenta WHERE CLIENTE_ID LIKE '%".$searchTerm."%' GROUP BY CLIENTE_ID ORDER BY CLIENTE_ID ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['CLIENTE_ID'];
    }
    
    //return json data
    echo json_encode($data);

  ?>
