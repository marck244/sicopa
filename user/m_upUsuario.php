<?php
		include("../conexion/conexion.php");
		$username=TRIM($_POST['username']);
		$nombre= TRIM($_POST['nombre']);
		$apellido= TRIM($_POST['apellido']);
		$pass= $_POST['pwd1'];
		$pass5=md5(md5($pass));
		$nivel=$_POST['cbonivelacceso'];


			$query=$conn->query("UPDATE usuario SET USER_NICK='$username',USER_CONTRASENA='$pass5',USER_NOMBRE='$nombre',USER_APELLIDO='$apellido',USER_NIVELACCESO='$nivel' WHERE USER_NICK='$username'")
		or die($conn->error);
		

		if ($query >0) {
			header("location: v_upUsuario.php?actualizo=si");
		}
		else
		{
			header("location: v_upUsuario.php?actualizo=no");
		}








  ?>