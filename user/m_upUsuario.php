<?php
		include("../conexion/conexion.php");

		$username=TRIM($_POST['username']);	
		
		$nombre= TRIM($_POST['nombre']);
		
		$apellido= TRIM($_POST['apellido']);
		
		$pass= TRIM($_POST['pwd1']);
		
		$pass5=md5(md5($pass));
		$nivel=TRIM($_POST['cbonivelacceso']);
		
		$user=$_POST['user'];
		



		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Usuario";
		$actividad="Se modifico un usuario con su nombre completo:  ".$nombre." ".$apellido." y su nickname: ".$username."";	
		$ip=$_SERVER['REMOTE_ADDR'];

		$query=$conn->query("UPDATE usuario SET USER_NICK='$username',USER_CONTRASENA='$pass5',USER_NOMBRE='$nombre',USER_APELLIDO='$apellido',USER_NIVELACCESO='$nivel' WHERE USER_NICK='$username'") or die($conn->error);

		

		

	
		

		if ($query > 0) {
			$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
			header("location: v_upUsuario.php?actualizo=si");
		}
		else
		{
			header("location: v_upUsuario.php?actualizo=no");
		}








  ?>