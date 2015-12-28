
<?php
		include("../conexion/conexion.php");

		
		
		$dui = TRIM($_POST["dui"]);
		
		$nombre = strtoupper($_POST["nombre"]);
		$apellido = strtoupper($_POST["apellido"]);
		$nit = TRIM($_POST["nit"]);
		$nitt= str_replace("-","",$nit);
		$edad = $_POST["edad"];
		$domicilio = strtoupper($_POST["domicilio"]);
		$telefono = $_POST["telefono"];
		$fechanacimiento = $_POST["fechanacimiento"];
		$profesion = $_POST["cboprofesion"];
		$municipio = $_POST["cbomuni"];
		$firma = $_POST["cbofirma"];
		$usuario= $_POST["usuario"];


		$query=$conn->query("UPDATE cliente SET CLIENTE_ID='$dui',MUNICIPIO_ID='$municipio',PROFESIONES_ID='$profesion',USER_NICK='$usuario',CLIENTE_NIT='$nitt',CLIENTE_NOMBRE='$nombre',CLIENTE_APELLIDO='$apellido',CLIENTE_EDAD='$edad',CLIENTE_DOMICILIO='$domicilio',CLIENTE_TELEFONO='$telefono',CLIENTE_FECHANAC='$fechanacimiento',CLIENTE_FIRMA='$firma' WHERE CLIENTE_ID='$dui'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upCliente.php?actualizo=si");
		}
		else
		{
			header("location: v_upCliente.php?actualizo=no");
		}



		?>