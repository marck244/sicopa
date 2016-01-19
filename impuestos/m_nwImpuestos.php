<?php  


	include("../conexion/conexion.php");

	

		$valorinteres=TRIM($_POST['valorinteres']);
		$valoriva=TRIM($_POST['valoriva']);

		$interes= $valorinteres / 100;
		$iva= $valoriva / 100;

		$descripcion=TRIM(strtoupper($_POST['descripcion']));





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
			header("location: v_nwImpuestos.php?guardado=si");
		}
		else
		{				
				header("location: v_nwImpuestos.php?guardado=no");
		}
	}










?>