<?php

	include("../conexion/conexion.php");
	$codigo=strtoupper($_POST['codigo']);

	$extension=$_POST['extension'];
	$precio=$_POST['precio'];
	$lotifiacion=$_POST['cbolotificacion'];
	$poligono=$_POST['cbopoligono'];
	$detalles=strtoupper($_POST['detalles']);

	$user=TRIM($_POST['user']);

	$consulta=$conn->query("SELECT LOTE_ID FROM lote WHERE LOTE_ID='$codigo'");

	$consulta1=$conn->query("SELECT LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID='$lotifiacion'");
	$row1=$consulta1->fetch_assoc();

	$row=$consulta->fetch_assoc();

	$fechabitacora=date("Y-m-d H:i:s");
	
					$tabla="Lote";
					$actividad="Se registro un lote con su codigo ".$codigo." a un precio de : ".$precio." para la lotifiacion : ".$row1['LOTIFICACION_NOMBRE']."";
			
					$ip=$_SERVER['REMOTE_ADDR'];


	if ($row > 0) {
		header("location: v_nwLote.php?duplicado=si");
	}
	else
	{
		$query=$conn->query("INSERT INTO lote(LOTE_ID,LOTIFICACION_ID,POLIGONO_ID,LOTE_EXTENSION,LOTE_PRECIO,LOTE_EXTRA,LOTE_ESTADO) VALUES('$codigo','$lotifiacion','$poligono','$extension','$precio','$detalles','LIBRE')");

		
		if($query > 0)
		
		{
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_nwLote.php?guardado=si");
		}
		else
		{				
			header("location: v_nwLote.php?guardado=no");
		}
	}








?>