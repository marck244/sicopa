<?php


include("../conexion/conexion.php");

	$buscar= str_replace("-","",$_POST["busqueda"]);
	

	$query= $conn->query("SELECT CUENTA_ID,CLIENTE_ID,IMPUESTO_ID,CUENTA_ESTADOS_ID,LOTE_ID,CUENTA_FECHA_CREADO,CUENTA_PLAZO FROM cuenta WHERE CLIENTE_ID='$buscar'");
	$fill=$query->num_rows;

	
	if ( $fill > 0 ){
			
			while ($row = $query->fetch_assoc()) {
				
			
			$id=$row["CUENTA_ID"];
			$dui=$row["CLIENTE_ID"];

			$query1= $conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'");
			$row1 = $query1->fetch_assoc();
			$cliente=$row1["CLIENTE_NOMBRE"]." ".$row1["CLIENTE_APELLIDO"];



			$impuesto_id=$row["IMPUESTO_ID"];

			$query2= $conn->query("SELECT IMPUESTO_ID,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_ID='$impuesto_id'");
			$row2 = $query2->fetch_assoc();
			$impuesto_descripcion=$row2["IMPUESTO_DESCRIPCION"];


			$cuenta_estados_id=$row["CUENTA_ESTADOS_ID"];

			$query3= $conn->query("SELECT CUENTA_ESTADOS_ID,CUENTA_ESTADOS_NOMBRE FROM cuenta_estados WHERE CUENTA_ESTADOS_ID='$cuenta_estados_id'");
			$row3 = $query3->fetch_assoc();
			$estado=$row3["CUENTA_ESTADOS_NOMBRE"];


			$lote=$row["LOTE_ID"];
			$cuenta_fecha_creado=$row["CUENTA_FECHA_CREADO"];
			$plazo=$row["CUENTA_PLAZO"];
			


			header("location:v_dlCuenta.php?id=$id&dui=$dui&cliente=$cliente&impuestodescripcion=$impuesto_descripcion&cuenta_estado_id=$cuenta_estados_id&estado=$estado&lote=$lote&fechacreado=$cuenta_fecha_creado&plazo=$plazo");

			}
		}	
		else
		{
			header("location:v_dlCuenta.php?vacio=si");
		}






  ?>