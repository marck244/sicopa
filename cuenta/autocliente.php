<?php
include("../conexion/conexion.php");
  
    /*$data = array();
   
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE FROM cliente WHERE CLIENTE_ID LIKE '%".$searchTerm."%' ORDER BY CLIENTE_ID ASC");
    while ($row = $query->fetch_assoc()) {
        
        $data[] = $row['CLIENTE_ID'];
    }
    
    //return json data
    echo json_encode($data);*/
    if(isset($_POST['queryString'])) {
            $queryString = $conn->real_escape_string($_POST['queryString']);
            
            if(strlen($queryString) >0) {

                $query = $conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID LIKE '$queryString%' LIMIT 1");
                if($query) {
                echo '<ul>';
                    while ($result = $query ->fetch_object()) {
                        echo '<li onClick="fill(\''.addslashes($result->CLIENTE_ID).'\');">'.$result->CLIENTE_NOMBRE.' '.$result->CLIENTE_APELLIDO.'</li>';
                    }
                echo '</ul>';
                    
                } else {
                    echo 'OOPS we had a problem :(';
                }
            } else {
                // do nothing
            }
        } else {
            echo 'There should be no direct access to this script!';
        }

  ?>