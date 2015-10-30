<?php
	

	if (isset($_POST["query"])) {
		include("../conexion/conexion.php");

		$query=$_POST["query"];


		$mysql_query=$conn->query("SELECT CLIENTE_ID FROM cliente WHERE CLIENTE_ID LIKE '%{$query}%' LIMIT 5 ");

		while ($row=$mysql_query->fetch_assoc()) {
			$array[] = $row['CLIENTE_ID'];
		}

		echo json_encode($array);

	}




  ?>