<?php  


	include("../conexion/conexion.php");

	$nombre=TRIM(strtoupper($_POST['nombre']));
		$valor=TRIM($_POST['valor']);
		$descripcion=TRIM(strtoupper($_POST['descripcion']));





	$consulta=$conn->query("SELECT IMPUESTO_NOMBRE FROM impuesto WHERE IMPUESTO_NOMBRE='$nombre' ");
	$array=$consulta->fetch_assoc();



	if ($array > 0) {
		header("location: v_nwImpuestos.php?duplicado=si");
	}

	else
	{
		$query=$conn->query("INSERT INTO impuesto(IMPUESTO_VALOR,IMPUESTO_NOMBRE,IMPUESTO_DESCRIPCION) VALUES('$valor','$nombre','$descripcion')");

		
		if($query > 0)
		
		{
			header("location: v_nwImpuestos.php?guardado=si");
		}
		else
		{				
				header("location: v_nwImpuestos.php?guardado=no");
		}
	}










?>