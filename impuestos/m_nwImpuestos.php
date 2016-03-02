<?php  


	include("../conexion/conexion.php");

	

		$valorinteres=TRIM($_POST['valorinteres']);
		$valoriva=TRIM($_POST['valoriva']);
		$user=TRIM($_POST['user']);

		$interes= $valorinteres / 100;
		$iva= $valoriva / 100;

		$descripcion=TRIM(strtoupper($_POST['descripcion']));

		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Impuesto";
		$actividad="Se registro un impuesto con la siguiente descripcion ".$descripcion."";	
		$ip=$_SERVER['REMOTE_ADDR'];



	$consulta=$conn->query("SELECT IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_DESCRIPCION='$descripcion' ");
	$array=$consulta->fetch_assoc();



	if ($array > 0) {
		
		header("location: v_nwImpuestos.php?duplicado=si");
	}

	else
	{
		$query=$conn->query("INSERT INTO impuesto(IMPUESTO_INTERES,IMPUESTO_IVA,IMPUESTO_DESCRIPCION) VALUES('$interes','$iva','$descripcion')");

		
		if($query > 0)
		
		{
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_nwImpuestos.php?guardado=si");
		}
		else
		{				
				header("location: v_nwImpuestos.php?guardado=no");
		}
	}










?>