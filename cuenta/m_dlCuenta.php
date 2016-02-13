<?php  



include("../conexion/conexion.php");
				$id=$_GET['cuenta'];
				$pago=$_GET['pago'];
				$user=$_GET["user"];
				$dui =$_GET["dui"];

				if ($pago=="si") {
					
					$query12=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'");
					$rowi=$query12->fetch_assoc();
					$nombre=$rowi['CLIENTE_NOMBRE']." ".$rowi['CLIENTE_APELLIDO'];
	
					$fechabitacora=date("Y-m-d H:i:s");
	
					$tabla="Cuenta";
					$actividad="Se dio de baja una cuenta porque tenia pagos a nombre de el cliente ".$nombre." con numero de Dui No: ".$dui."";
			
					$ip=$_SERVER['REMOTE_ADDR'];

					$query=$conn->query("UPDATE cuenta SET CUENTA_ESTADOS_ID=3 where CUENTA_ID='$id'");
				

				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlCuenta.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCuenta.php?eliminado=no");	
				}

				}
				else
				{
					$query12=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'");
					$rowi=$query12->fetch_assoc();
					$nombre=$rowi['CLIENTE_NOMBRE']." ".$rowi['CLIENTE_APELLIDO'];
	
					$fechabitacora=date("Y-m-d H:i:s");
	
					$tabla="Cuenta";
					$actividad="Se elimino una cuenta a nombre de el cliente ".$nombre." con numero de Dui No: ".$dui."";
			
					$ip=$_SERVER['REMOTE_ADDR'];

				$query=$conn->query("DELETE FROM cuenta where CUENTA_ID='$id'");
				

				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlCuenta.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCuenta.php?eliminado=no");	
				}

				}
				





?>