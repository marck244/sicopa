<?php  
		include("../conexion/conexion.php");
		$username=$_POST['username'];
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$pass= $_POST['pwd1'];
		$pass5=md5(md5($pass));
		$nivel=$_POST['cbonivelacceso'];

		$user=$_POST['user'];


		$fechabitacora=date("Y-m-d H:i:s");
		$tabla="Usuario";
		$actividad="Se agrego un usuario con su nombre completo:  ".$nombre." ".$apellido." y su nickname: ".$username."";	
		$ip=$_SERVER['REMOTE_ADDR'];


		$consulta=$conn->query("SELECT USER_NICK FROM usuario WHERE USER_NICK='$username'");

		if($result=$consulta->fetch_assoc())
		{
			header("location: v_nwUsuario.php?duplicado=si");
		}
		else
		{
			$insert=$conn->query("INSERT INTO usuario(USER_NICK,USER_CONTRASENA,USER_NOMBRE,USER_APELLIDO,USER_NIVELACCESO)
				VALUES('$username','$pass5','$nombre','$apellido','$nivel')");

			if ($insert > 0) {
				$update=$conn->query("INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('$user','$fechabitacora','$actividad','$tabla','$ip')");
				header("location: v_nwUsuario.php?guardado=si");
			}
			else
			{
				header("location: v_nwUsuario.php?guardado=no");	
			}
		}
?>