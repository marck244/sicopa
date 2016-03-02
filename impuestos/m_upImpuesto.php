<?php  

		
		include("../conexion/conexion.php");

		$id=$_POST['id'];

		$valorinteres=TRIM($_POST['valorinteres']);
		$valoriva=TRIM($_POST['valoriva']);
		$user=TRIM($_POST['user']);

		$interes= $valorinteres / 100;
		$iva= $valoriva / 100;

		$descripcion=TRIM(strtoupper($_POST['descripcion']));

		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Impuesto";
		$actividad="Se modifico un impuesto con la siguiente descripcion ".$descripcion."";	
		$ip=$_SERVER['REMOTE_ADDR'];

		$query=$conn->query("UPDATE impuesto SET IMPUESTO_INTERES='$interes',IMPUESTO_IVA='$iva',IMPUESTO_DESCRIPCION='$descripcion' WHERE IMPUESTO_ID='$id'")
		or die($conn->error);
		

		if ($query >0) {
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_upImpuesto.php?actualizo=si");
		}
		else
		{
			header("location: v_upImpuesto.php?actualizo=no");
		}

?>