<?php
				
				include("../conexion/conexion.php");
				$id=$_GET['id'];

				$query=$conn->query("DELETE FROM cliente where CLIENTE_ID=$id");
				

				if ($query > 0 ) {
					header("location:v_dlCliente.php?eliminado=si");
				}

				else
				{
					header("location:v_dlCliente.php?eliminado=no");	
				}











  ?>