<?php  

		
		include("../conexion/conexion.php");

		$id=$_POST['id'];

		$valorinteres=TRIM($_POST['valorinteres']);
		$valoriva=TRIM($_POST['valoriva']);

		$interes= $valorinteres / 100;
		$iva= $valoriva / 100;

		$descripcion=TRIM(strtoupper($_POST['descripcion']));

		$query=$conn->query("UPDATE impuesto SET IMPUESTO_INTERES='$interes',IMPUESTO_IVA='$iva',IMPUESTO_DESCRIPCION='$descripcion' WHERE IMPUESTO_ID='$id'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upImpuesto.php?actualizo=si");
		}
		else
		{
			header("location: v_upImpuesto.php?actualizo=no");
		}

?>