<?php
include("../conexion/conexion.php");

	$buscar= TRIM(strtoupper($_POST["busqueda"]));
	

	$query= $conn->query("SELECT LOTE_ID,LOTE_PRECIO,LOTE_EXTENSION,LOTIFICACION_ID,POLIGONO_ID FROM lote WHERE LOTE_ID='$buscar'");
	

	$row = $query->fetch_assoc();
	if ( $row > 0 ){
			

			$codigo=$row['LOTE_ID'];
			$precio = $row['LOTE_PRECIO'];
			$extension = $row['LOTE_EXTENSION'];

			$idlotificacion = $row['LOTIFICACION_ID'];

			$query2= $conn->query("SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID='$idlotificacion'");
			$row2=$query2->fetch_assoc();

			$nombrelotificacion=$row2['LOTIFICACION_NOMBRE'];

			$idpoligono = $row['POLIGONO_ID'];
 
			$query3= $conn->query("SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono WHERE POLIGONO_ID='$idpoligono'");
			$row3=$query3->fetch_assoc();

			$numpoligono=$row3['POLIGONO_NUM'];


			header("location:v_dlLote.php?codigo=$codigo & precio=$precio & extension=$extension & nombrelotificacion=$nombrelotificacion&numpoligono=$numpoligono");


		}	
		else
		{
			header("location:v_dlLote.php?vacio=si");
		}


		?>
