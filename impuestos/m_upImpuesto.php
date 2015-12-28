<?php  

		
		include("../conexion/conexion.php");

		$id=$_POST['id'];
		$nombre=TRIM(strtoupper($_POST['nombre']));
		$valor=TRIM($_POST['valor']);
		$descripcion=TRIM(strtoupper($_POST['descripcion']));

		$query=$conn->query("UPDATE impuesto SET IMPUESTO_VALOR='$valor',IMPUESTO_NOMBRE='$nombre',IMPUESTO_DESCRIPCION='$descripcion' WHERE IMPUESTO_ID='$id'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upImpuesto.php?actualizo=si");
		}
		else
		{
			header("location: v_upImpuesto.php?actualizo=no");
		}

?>