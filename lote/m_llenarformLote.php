<?php
	
		include("../conexion/conexion.php");
		$busqueda=TRIM(strtoupper($_POST['busqueda']));



		$query=$conn->query("SELECT LOTE_ID,LOTIFICACION_ID,POLIGONO_ID,LOTE_EXTENSION,LOTE_PRECIO,LOTE_EXTRA,LOTE_ESTADO FROM lote WHERE LOTE_ID='$busqueda'");
		$fi=$query->num_rows;
		if ($fi > 0) {
			$row=$query->fetch_assoc();

			$id=$row['LOTE_ID'];
			$idlotificacion= $row['LOTIFICACION_ID'];

			$query2=$conn->query("SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID='$idlotificacion'");
			$row2=$query2->fetch_assoc();
			$nombrelotificacion=$row2['LOTIFICACION_NOMBRE'];


			$idpoligono= $row['POLIGONO_ID'];

			$query3=$conn->query("SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono WHERE POLIGONO_ID='$idpoligono'");
			$row3=$query3->fetch_assoc();
			$numpoligono=$row3['POLIGONO_NUM'];

			$extension= $row['LOTE_EXTENSION'];
			$precio = $row['LOTE_PRECIO'];
			$extra = $row['LOTE_EXTRA'];

			header("location: v_upLote.php?id=$id&idlotificacion=$idlotificacion&nombrelotificacion=$nombrelotificacion&idpoligono=$idpoligono&numpoligono=$numpoligono&extension=$extension&precio=$precio&extra=$extra");
		}
		else
		{
			header("location: v_upLote.php?vacio=si");
		}



















  ?>