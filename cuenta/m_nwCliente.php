
<?php  
	
	include("../conexion/conexion.php");

		
		
		$dui = TRIM($_POST["dui"]);
		$duii= str_replace("-","",$dui);
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$nit = TRIM($_POST["nit"]);
				$nitt= str_replace("-","",$nit);
		$edad = $_POST["edad"];
		$domicilio = $_POST["domicilio"];
		$telefono = $_POST["telefono"];
		$fechanacimiento = $_POST["fechanacimiento"];
		$profesion = $_POST["cboprofesion"];
					?><script>alert('<?php echo $profesion; ?>');</script><?php
		$municipio = $_POST["cbomuni"];
		$firma = $_POST["cbofirma"];
		$usuario= $_POST["usuario"];
		
		
		$consultadui=$conn->query("Select CLIENTE_ID from cliente WHERE CLIENTE_ID='$duii' ");
		$consultanit=$conn->query("Select CLIENTE_NIT from cliente WHERE CLIENTE_NIT='$nitt' ");

		
		

		if ($consultadui > 0) {
			header("location: v_nwCliente.php?duplicado=dui");
		}

		elseif ($consultanit > 0) {
			header("location: v_nwCliente.php?duplicado=nit");
		}
		else{
		$query=$conn->query("INSERT INTO cliente(CLIENTE_ID,MUNICIPIO_ID,PROFESIONES_ID,USER_NICK,CLIENTE_NIT,CLIENTE_NOMBRE,CLIENTE_APELLIDO,CLIENTE_EDAD,CLIENTE_DOMICILIO,CLIENTE_TELEFONO,CLIENTE_FECHANAC,CLIENTE_FIRMA) VALUES('$duii','$municipio','$profesion','$usuario','$nitt','$nombre','$apellido','$edad','$domicilio','$telefono','$fechanacimiento','$firma')");

		
		if($query > 0)
		
		{
			header("location: v_nwCliente.php?guardado=si");
		}
		else
		{				
				header("location: v_nwCliente.php?guardado=no");
		}
			

}

		
	 






	










?>