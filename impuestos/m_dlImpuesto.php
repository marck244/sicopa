<?php 



include("../conexion/conexion.php");

		$id=$_GET['id'];

		$query=$conn->query("DELETE FROM impuesto where IMPUESTO_ID='$id'");
				

				if ($query > 0 ) {
					header("location:v_dlImpuesto.php?eliminado=si");
				}

				else
				{
					header("location:v_dlImpuesto.php?eliminado=no");	
				}




 ?>