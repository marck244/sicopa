<?php  
	
	include("../conexion/conexion.php");

	$busqueda=str_replace("-","",$_POST["busqueda"]);


	$query=$conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO,CLIENTE_NIT,CLIENTE_EDAD,CLIENTE_DOMICILIO,CLIENTE_TELEFONO,CLIENTE_FECHANAC
		,PROFESIONES_ID,MUNICIPIO_ID,CLIENTE_FIRMA FROM cliente WHERE CLIENTE_ID='$busqueda' ");

	if ($row=$query->fetch_assoc()){

		$dui=$row["CLIENTE_ID"];
		$nombre=$row["CLIENTE_NOMBRE"];
		$apellido=$row["CLIENTE_APELLIDO"];
		$nit=$row["CLIENTE_NIT"];
		$edad=$row["CLIENTE_EDAD"];
		$domicilio=$row["CLIENTE_DOMICILIO"];
		$telefono=$row["CLIENTE_TELEFONO"];
		$fechanac=$row["CLIENTE_FECHANAC"];
		$profesionid=$row["PROFESIONES_ID"];
//////////////////////////////////////IDMUNICIPIO
		$municipioid=$row["MUNICIPIO_ID"];
/////////////////////////////////////////////////
		$firma=$row["CLIENTE_FIRMA"];
		
		$query1=$conn->query("SELECT PROFESIONES_ID,PROFESIONES_NOMBRE FROM profesiones WHERE PROFESIONES_ID = '$profesionid' ");
		$row1=$query1->fetch_assoc();
		$nombreprofesion=$row1["PROFESIONES_NOMBRE"];
		
				$query2=$conn->query("SELECT MUNICIPIO_ID,DEPARTAMENTO_ID,MUNICIPIO_NOMBRE FROM municipio WHERE MUNICIPIO_ID = '$municipioid' ");
		$row2=$query2->fetch_assoc();
		$nombremunicipio=$row2["MUNICIPIO_NOMBRE"];

///////////////////////////////////IDDEPARTAMENTO
		$id_departamento=$row2["DEPARTAMENTO_ID"];
/////////////////////////////////////////////////

		$query3=$conn->query("SELECT DEPARTAMENTO_ID,DEPARTAMENTO_NOMBRE FROM departamento WHERE DEPARTAMENTO_ID='$id_departamento' ");
		$row3=$query3->fetch_assoc();
		$nombredepartamento=$row3["DEPARTAMENTO_NOMBRE"];
		

		header("location: v_upCliente.php?dui=$dui&nombre=$nombre&apellido=$apellido&nit=$nit
		&edad=$edad&domicilio=$domicilio&telefono=$telefono&fechanac=$fechanac&profesionid=$profesionid&nombreprofesion=$nombreprofesion&departamentoid=$id_departamento&departamentonombre=$nombredepartamento&municipioid=$municipioid&municipionombre=$nombremunicipio&firma=$firma");
		

	}












?>