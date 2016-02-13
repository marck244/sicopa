<?php  


		include("../conexion/conexion.php");

		$id=$_GET['id'];
		$user=$_GET['user'];
		$lotificacion=$_GET['lotificacion'];

		$fechabitacora=date("Y-m-d H:i:s");
	
					$tabla="Lote";
					$actividad="Se elimino un lote con su codigo ".$codigo." de un precio de : ".$precio." para la lotifiacion : ".$lotificacion."";
			
					$ip=$_SERVER['REMOTE_ADDR'];

		$query=$conn->query("DELETE FROM lote where LOTE_ID='$id'");
				

				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlLote.php?eliminado=si");
				}

				else
				{
					header("location:v_dlLote.php?eliminado=no");	
				}








?>