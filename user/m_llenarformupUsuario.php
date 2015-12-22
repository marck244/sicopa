<?php
		include("../conexion/conexion.php");
		$busqueda=TRIM(strtoupper($_POST['buscar']));
		$query=$conn->query("SELECT USER_NICK,USER_NOMBRE,USER_APELLIDO,USER_NIVELACCESO FROM usuario WHERE USER_NICK='$busqueda'");

		if ($row = $query->fetch_assoc()) {
			
			$nick=$row['USER_NICK'];
			$nombre=$row['USER_NOMBRE'];
			$apellido=$row['USER_APELLIDO'];
			$nivel=$row['USER_NIVELACCESO'];

			header("location: v_upUsuario.php?nick=$nick & nombre=$nombre & apellido=$apellido & nivel=$nivel ");


		}
		else
		{
			header("location: v_upUsuario.php?vacio=si");
		}
  ?>