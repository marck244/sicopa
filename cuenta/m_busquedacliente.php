<?php

		include('../conexion/conexion.php');
   if(isset($_POST['consulta'])) {
			$queryString =($_POST['consulta']);
			
			
			if(strlen($queryString) >0) {

	$query = $conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID LIKE '%$queryString%' LIMIT 10 ");
				
				if($query) {
					while ($result = $query->fetch_assoc()) {
	         			echo '<li onClick="fill1(\''.$result["CLIENTE_ID"].'\');">'.$result["CLIENTE_NOMBRE"]." ".$result["CLIENTE_APELLIDO"].'</li>';
	         		}
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				
			} 
		} else {
			echo 'There should be no direct access to this script!';
		}

		
	
?>