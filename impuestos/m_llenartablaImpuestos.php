<?php
include("../conexion/conexion.php");

	$buscar= TRIM($_POST["buscar"]);
	

$query=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_VALOR,IMPUESTO_NOMBRE,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_NOMBRE='$buscar'");
	

	$row = $query->fetch_assoc();
	if ( $row > 0 ){
			

			$id=$row['IMPUESTO_ID'];
			$valor=$row['IMPUESTO_VALOR'];
			$nombre=$row['IMPUESTO_NOMBRE'];
			$descripcion=$row['IMPUESTO_DESCRIPCION'];

			header("location: v_dlImpuesto.php?id=$id & valor=$valor & nombre= $nombre & descripcion=$descripcion");


		}	
		else
		{
			header("location: v_dlImpuesto.php?vacio=si");
		}


		?>