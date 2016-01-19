<?php
include("../conexion/conexion.php");

	$buscar= TRIM(strtoupper($_POST["buscar"]));
	

$query=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_INTERES,IMPUESTO_IVA,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_DESCRIPCION='$buscar'");
	

	$row = $query->fetch_assoc();
	if ( $row > 0 ){
			

			$id=$row['IMPUESTO_ID'];
			$interes=$row['IMPUESTO_INTERES'];
			$iva=$row['IMPUESTO_IVA'];
			$descripcion=$row['IMPUESTO_DESCRIPCION'];

			header("location: v_dlImpuesto.php?id=$id&interes=$interes&iva=$iva&descripcion=$descripcion");


		}	
		else
		{
			header("location: v_dlImpuesto.php?vacio=si");
		}


		?>