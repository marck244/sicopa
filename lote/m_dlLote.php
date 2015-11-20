<?php  


		include("../conexion/conexion.php");

		$id=$_GET['id'];

		$query=$conn->query("DELETE FROM lote where LOTE_ID='$id'");
				

				if ($query > 0 ) {
					header("location:v_dlLote.php?eliminado=si");
				}

				else
				{
					header("location:v_dlLote.php?eliminado=no");	
				}








?>