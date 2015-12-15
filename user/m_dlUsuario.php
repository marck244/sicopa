<?php  

include("../conexion/conexion.php");

		$id=$_GET['id'];

		$query=$conn->query("DELETE FROM usuario where USER_NICK='$id'");
				

				if ($query > 0 ) {
					header("location:v_dlUsuario.php?eliminado=si");
				}

				else
				{
					header("location:v_dlUsuario.php?eliminado=no");	
				}



?>