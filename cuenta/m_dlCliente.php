<?php
				
				include("../conexion/conexion.php");
				$id=$_GET['id'];
				
				$user=$_GET['user'];
				
				$query0=$conn->query("SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$id'");
				$row=$query0->fetch_assoc();
				$nombre=$row['CLIENTE_NOMBRE']." ".$row['CLIENTE_APELLIDO'];
				
				$fechabitacora=date("Y-m-d H:i:s");
				
				$tabla="Cliente";
				
				$actividad="Se elimino el cliente ".$nombre." con numero de Dui No: ".$id."";
				
				$ip=$_SERVER['REMOTE_ADDR'];

				
				
				$query=$conn->query("DELETE FROM cliente where CLIENTE_ID=$id");
				



				if ($query > 0 ) {
					$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
					header("location:v_dlCliente.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCliente.php?eliminado=no");	
				}











  ?>