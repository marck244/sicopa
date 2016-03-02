<?php  

				include("../conexion/conexion.php");
				
				$codigo=$_POST['codigo'];
				$extension=$_POST['extension'];
				$precio=$_POST['precio'];
				$cbolotificacion=$_POST['cbolotificacion'];
				$cbopoligono=$_POST['cbopoligono'];
				$detalles=$_POST['detalles'];

				$user=TRIM($_POST['user']);


				

	$consulta1=$conn->query("SELECT LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID='$cbolotificacion'");
	$row1=$consulta1->fetch_assoc();

	

	$fechabitacora=date("Y-m-d H:i:s");
	
					$tabla="Lote";
					$actividad="Se modifico un lote con su codigo ".$codigo." a un precio de : ".$precio." para la lotifiacion : ".$row1['LOTIFICACION_NOMBRE']."";
			
					$ip=$_SERVER['REMOTE_ADDR'];


				$query=$conn->query("UPDATE lote SET LOTE_ID='$codigo',LOTIFICACION_ID='$cbolotificacion',POLIGONO_ID='$cbopoligono',LOTE_EXTENSION='$extension',LOTE_PRECIO='$precio',LOTE_EXTRA='$detalles' WHERE LOTE_ID='$codigo'")
		or die($conn->error);
		

		if ($query >0) {

			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_upLote.php?actualizo=si");
		}
		else
		{
			header("location: v_upLote.php?actualizo=no");
		}


















?>