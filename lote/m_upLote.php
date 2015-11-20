<?php  

				include("../conexion/conexion.php");
				
				$codigo=$_POST['codigo'];
				$extension=$_POST['extension'];
				$precio=$_POST['precio'];
				$cbolotificacion=$_POST['cbolotificacion'];
				$cbopoligono=$_POST['cbopoligono'];
				$detalles=$_POST['detalles'];



				$query=$conn->query("UPDATE lote SET LOTE_ID='$codigo',LOTIFICACION_ID='$cbolotificacion',POLIGONO_ID='$cbopoligono',LOTE_EXTENSION='$extension',LOTE_PRECIO='$precio',LOTE_EXTRA='$detalles' WHERE LOTE_ID='$codigo'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upLote.php?actualizo=si");
		}
		else
		{
			header("location: v_upLote.php?actualizo=no");
		}


















?>