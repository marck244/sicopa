<?php

	include("../conexion/conexion.php");

	$buscar= str_replace("-","",$_POST["busqueda"]);
	

	$query= $conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO,CLIENTE_NIT FROM cliente WHERE CLIENTE_ID='$buscar'");
	$fill=$query->num_rows;

	$row = $query->fetch_assoc();
	if ( $row > 0 ){
			

			$dui=$row['CLIENTE_ID'];
			$nombre = $row['CLIENTE_NOMBRE'];
			$apellido = $row['CLIENTE_APELLIDO'];
			$nit = $row['CLIENTE_NIT'];


			header("location:v_dlCliente.php?dui=$dui & nombre=$nombre & apellido=$apellido & nit=$nit");


		}	
		else
		{
			header("location:v_dlCliente.php?vacio=si");
		}





  ?>