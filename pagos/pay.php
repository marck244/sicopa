<?php
/* Modulo Creado por Marvin Segura. email: marc_244@hotmail.com */
session_start();
if(isset($_SESSION["loginUser-name"])){
  /*mas codigo si esta logueado*/
  if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3" || $_SESSION["user-nivelacceso"]=="4") {
        # code...
    require("../conexion/conexion.php");
    
    $cuenta = $_POST["payid"];
    $abono = $_POST["abonoUSD"];
    $deuda = $_POST["deuda"];
    $factura = $_POST["recibo"];
    $dui = $_POST["dui"];
    $accion = $_POST["accion"];

    $ak = ($abono - (($deuda*0.0125))*1.13)/1.13;
    $ainteres = $deuda*0.0125;
    $aiva = ($ak+$ainteres)*0.13;

    $ak = number_format($ak,2,'.','');
    $ainteres = number_format($ainteres,2,'.','');
    $aiva = number_format($aiva,2,'.','');
    //$ak+$ainteres+$aiva."<br>";
    $motivo ="error";
    if ($accion == "1") {
      # liquidar
      $motivo = "FINALIZA CREDITO";
    }
    if ($accion == "2") {
      # normal
      $motivo = "PAGO NORMAL";
    }
    $sql = "INSERT INTO cuenta_pagos(CUENTA_ID, CUENTA_PAGOS_NUMRECIBO, CUENTA_PAGOS_INTERES, CUENTA_PAGOS_IVA, CUENTA_PAGOS_CAPITAL, CUENTA_PAGOS_DESCRIPCION) 
    VALUES ('$cuenta','$factura','$ainteres','$aiva','$ak', '$motivo')";

//***********************************************************
$fechabitacora=date("Y-m-d H:i:s");
$sqlBitacora = "INSERT INTO bitacora(USER_NICK,BITACORA_FECHA,BITACORA_ACTIVIDAD,BITACORA_TABLA,BITACORA_IP) VALUES('".$_SESSION["loginUser-name"]."','$fechabitacora','Realizo pago a CUENTA $cuenta con FACTURA $factura','PAGOS','PAGO COUTA')";
if ($conn->query($sqlBitacora) === TRUE) {
    echo "New record created successfully";
}//**********************************************************


	if ($conn->query($sql) === TRUE) {
    if ($accion == "1") {
      # liquidar
      $conn->query("UPDATE cuenta SET CUENTA_ESTADOS_ID='2' WHERE CUENTA_ID='".$cuenta."'");
    }
    header("Location: ../pagos/v_calculoPago?dui=".$dui."&error=0");
	    
	} else {
    header("Location: ../pagos/v_calculoPago?dui=".$dui."&error=1");

      
	}

	$conn->close();

  }else{
    header("Location: ../");
  }
}else{
  header("Location: ../user/v_login");
}
?>