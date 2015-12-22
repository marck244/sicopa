<?php

	include("../conexion/conexion.php");
	$codigo=strtoupper($_POST['codigo']);

	$extension=$_POST['extension'];
	$precio=$_POST['precio'];
	$lotifiacion=$_POST['cbolotificacion'];
	$poligono=$_POST['cbopoligono'];
	$detalles=strtoupper($_POST['detalles']);

	$consulta=$conn->query("SELECT LOTE_ID FROM lote WHERE LOTE_ID='$codigo'");

	$row=$consulta->fetch_assoc();

	if ($row > 0) {
		header("location: v_nwLote.php?duplicado=si");
	}
	else
	{
		$query=$conn->query("INSERT INTO lote(LOTE_ID,LOTIFICACION_ID,POLIGONO_ID,LOTE_EXTENSION,LOTE_PRECIO,LOTE_EXTRA) VALUES('$codigo','$lotifiacion','$poligono','$extension','$precio','$detalles')");

		
		if($query > 0)
		
		{
			header("location: v_nwLote.php?guardado=si");
		}
		else
		{				
			header("location: v_nwLote.php?guardado=no");
		}
	}








?>