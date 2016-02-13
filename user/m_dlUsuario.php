<?php  

include("../conexion/conexion.php");

		$id=$_GET['id'];
		$user=$_GET['user'];
		$nombre=$_GET['nombre'];
		$apellido=$_GET['apellido'];

			$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Usuario";
		$actividad="Se elimino un usuario con su nombre completo:  ".$nombre." ".$apellido." y su nickname: ".$id."";	
		$ip=$_SERVER['REMOTE_ADDR'];

		$query=$conn->query("DELETE FROM usuario where USER_NICK='$id'");
				

				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlUsuario.php?eliminado=si");
				}

				else
				{
					header("location:v_dlUsuario.php?eliminado=no");	
				}



?>