
<?php  
	
	include("../conexion/conexion.php");

		
		
		$dui = TRIM($_POST["dui"]);
		$duis= str_replace("-","",$dui);
		$nombre = strtoupper($_POST["nombre"]);
		$apellido = strtoupper($_POST["apellido"]);
		$nit = TRIM($_POST["nit"]);
		$nitt= str_replace("-","",$nit);
		$edad = $_POST["edad"];
		$domicilio = strtoupper($_POST["domicilio"]);
		$telefono = $_POST["telefono"];

		$fechanacimientoold = $_POST["fechanacimiento"];
		$fechanacimiento = date("Y-m-d",strtotime($fechanacimientoold));

		$profesion = $_POST["cboprofesion"];
		$municipio = $_POST["cbomuni"];
		$firma = $_POST["cbofirma"];


		$usuario= $_POST["usuario"];
		$ip=$_SERVER['REMOTE_ADDR'];
		
		$consultadui=$conn->query("SELECT CLIENTE_ID FROM cliente WHERE CLIENTE_ID='$duis' ");
		$arraydui=$consultadui->fetch_assoc();


		$consultanit=$conn->query("SELECT CLIENTE_NIT FROM cliente WHERE CLIENTE_NIT='$nitt' ");
		$arraynit=$consultanit->fetch_assoc();
		
		$fechabitacora=date("Y-m-d H:i:s");
		
		
		

		if ( $arraydui > 0 ) {

			header("location: v_nwCliente.php?duplicado=dui");
		}
		elseif ($arraynit > 0) {

			header("location: v_nwCliente.php?duplicado=nit");
			
		}


		
		else{
		$query=$conn->query("INSERT INTO cliente(CLIENTE_ID,MUNICIPIO_ID,PROFESIONES_ID,USER_NICK,CLIENTE_NIT,CLIENTE_NOMBRE,CLIENTE_APELLIDO,CLIENTE_EDAD,CLIENTE_DOMICILIO,CLIENTE_TELEFONO,CLIENTE_FECHANAC,CLIENTE_FIRMA) VALUES('$duis','$municipio','$profesion','$usuario','$nitt','$nombre','$apellido','$edad','$domicilio','$telefono','$fechanacimiento','$firma')");

		

		
		if($query > 0)
		
		{
			$query1=$conn->query(" INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$usuario','$fechabitacora','se registro al cliente ".$nombre.", ".$apellido." con su numero de dui No: ".$duis."','Cliente','$ip') ");
			header("location: v_nwCliente.php?guardado=si");
		}
		else
		{				
				header("location: v_nwCliente.php?guardado=no");
		}
			

}

		
	 






	










?>