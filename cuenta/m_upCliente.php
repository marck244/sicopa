
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

		/******************** VARIABLES PARA INSERTAR EN BITACORA ******/
		$usuario= $_POST["usuario"];
		$ip=$_SERVER['REMOTE_ADDR'];

		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Cliente";
		$actividad="Se modifico informacion del cliente ".$nombre." ".$apellido." con numero de Dui No: ".$dui."";

		/***************************************************************/

		$query=$conn->query("UPDATE cliente SET CLIENTE_ID='$dui',MUNICIPIO_ID='$municipio',PROFESIONES_ID='$profesion',USER_NICK='$usuario',CLIENTE_NIT='$nitt',CLIENTE_NOMBRE='$nombre',CLIENTE_APELLIDO='$apellido',CLIENTE_EDAD='$edad',CLIENTE_DOMICILIO='$domicilio',CLIENTE_TELEFONO='$telefono',CLIENTE_FECHANAC='$fechanacimiento',CLIENTE_FIRMA='$firma' WHERE CLIENTE_ID='$dui'")
		or die($conn->error);
		

		if ($query >0) {
			$query1=$conn->query(" INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$usuario','$fechabitacora','$actividad','$tabla','$ip') ");
			header("location: v_upCliente.php?actualizo=si");
		}
		else
		{
			header("location: v_upCliente.php?actualizo=no");
		}



		?>