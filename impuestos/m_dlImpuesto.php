<?php 



include("../conexion/conexion.php");

		$id=$_GET['id'];
		$user=$_GET['user'];
		$descripcion=$_GET['descripcion'];

		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Impuesto";
		$actividad="Se elimino un impuesto con la siguiente descripcion ".$descripcion."";	
		$ip=$_SERVER['REMOTE_ADDR'];

		$query=$conn->query("DELETE FROM impuesto where IMPUESTO_ID='$id'");
				

				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlImpuesto.php?eliminado=si");
				}

				else
				{
					header("location:v_dlImpuesto.php?eliminado=no");	
				}




 ?>