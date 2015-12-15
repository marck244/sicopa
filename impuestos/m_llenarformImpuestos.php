<?php  



			include("../conexion/conexion.php");
			$busqueda=TRIM($_POST['busqueda']);

			$query=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_VALOR,IMPUESTO_NOMBRE,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_NOMBRE='$busqueda'");
			if ($row=$query->fetch_assoc()){

						$id=$row['IMPUESTO_ID'];
						$valo=TRIM($row['IMPUESTO_VALOR']);
						$valor=str_replace(".","",$valo);

						$nombre=$row['IMPUESTO_NOMBRE'];
						$descripcion=$row['IMPUESTO_DESCRIPCION'];


						header("location: v_upImpuesto.php?id=$id&valor=$valor&nombre=$nombre&descripcion=$descripcion");






			}
















?>