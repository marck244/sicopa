<?php  



include("../conexion/conexion.php");
				$id=$_GET['cuenta'];
				$pago=$_GET['pago'];

				if ($pago=="si") {

					$query=$conn->query("UPDATE cuenta SET CUENTA_ESTADOS_ID=2 where CUENTA_ID='$id'");
				

				if ($query > 0 ) {
					header("location:v_dlCuenta.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCuenta.php?eliminado=no");	
				}

				}
				else
				{

				$query=$conn->query("DELETE FROM cuenta where CUENTA_ID='$id'");
				

				if ($query > 0 ) {
					header("location:v_dlCuenta.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCuenta.php?eliminado=no");	
				}

				}
				





?>