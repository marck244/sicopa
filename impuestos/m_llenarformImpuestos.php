<?php  



			include("../conexion/conexion.php");
			$busqueda=TRIM($_POST['busqueda']);

			$query=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_INTERES,IMPUESTO_IVA,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_DESCRIPCION='$busqueda'");
			if ($row=$query->fetch_assoc()){

						$id=$row['IMPUESTO_ID'];
						

						

						$ivav=$row['IMPUESTO_IVA'];
						$interesv=$row['IMPUESTO_INTERES'];

						$iva=$ivav * 100;
						$interes=$interesv * 100;

						$descripcion=$row['IMPUESTO_DESCRIPCION'];


						header("location: v_upImpuesto.php?id=$id&iva=$iva&interes=$interes&descripcion=$descripcion");






			}
			else
			{
				header("location: v_upImpuesto.php?vacio=si");
			}
















?>