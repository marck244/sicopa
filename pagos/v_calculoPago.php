<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
  /*mas codigo si esta logueado*/
  if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3" || $_SESSION["user-nivelacceso"]=="4") {
        # code...
    require("../conexion/conexion.php");
    require("../conexion/list_menu.php");
  }else{
    header("Location: ../");
  }
}else{
  header("Location: ../user/v_login");
}
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../alertify/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../alertify/css/themes/default.css">

  <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
  <script type="text/javascript" src="../alertify/alertify.min.js"></script>
  <script>
  function abrirModal(cuenta,liquidar){

    var txtPagoMinimo = document.getElementById("txtAbono"+cuenta);
    var hinPagoMinio = document.getElementById("hin"+cuenta);
    txtPagoMinimo = txtPagoMinimo.value;
    hinPagoMinio = hinPagoMinio.value;
    if(txtPagoMinimo == ""){
      alertify.warning("Abono a Cuenta no puede estar vacio!");
    }else{
      txtPagoMinimo = parseFloat(txtPagoMinimo);
      hinPagoMinio = parseFloat(hinPagoMinio);
      if(txtPagoMinimo >= hinPagoMinio){
        var myModal = $('#inicioModal');
        myModal.modal('show');

        var usd = document.getElementById("abonoUSD");
        var pay = document.getElementById("payid");
        var abonoMaximo = document.getElementById("abonoLiquidar");
        document.getElementById("labelCodigo").innerHTML=cuenta;
        document.getElementById("liquidar").innerHTML = liquidar;
        document.getElementById("abonoUSDlabel").innerHTML = "$ "+txtPagoMinimo;
        pay.value = cuenta;
        usd.value = txtPagoMinimo;
        abonoMaximo.value = liquidar;

      }else{
        alertify.error("Abono a Cuenta no puede ser menor que Pago Minimo. Debe ser igual o mayor.");
        
      }
    }

  }

    //sumar los txt de los minimos. Posiblemente ya no lo ocupe
    function sumar(num){
      var suma = 0.00;
      i=1;
      while(i<=num){
        if(eval($("#cuenta"+i).val())==null){
          suma += 0;
        }
        else{
          suma += eval($("#cuenta"+i).val()); 
        }
        i++;
      }
      document.getElementById("total").innerHTML = "$ "+suma.toFixed(2);
    }
    
    

    //funcion cancelar Pago
    function cancelarPago(){
      alertify.log("Pago ha sido Cancelado!");
      var recibo = document.getElementById("recibo");
      recibo.value = "";
    }


    /* Funcion para buscar una persona*/
    function buscarClienteCuentas(){
      var txt_id = document.getElementById("textScan");
      $(".dropRespuesta").dropdown("toggle");
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
          document.getElementById("resultado").innerHTML = xhttp.responseText;
        }
      }
      xhttp.open("GET", "m_ClienteCuenta_scan.php?dui="+txt_id.value, true);
      xhttp.send();
    }

    function panelPagos(id){
      var txtBuscar = document.getElementById("textScan");
      txtBuscar.value = id;
    }
    /********************************/
    /* Funcion que genera el pago   */
    /********************************/
    function efectuarPago(cuenta,factura){
      if (factura!="") {

        var abonoMaximo = document.getElementById("abonoLiquidar").value;
        var abono = document.getElementById("abonoUSD").value;
        abono = parseFloat(abono); // es pago minimo o mas del minimo
        abonoMaximo = parseFloat(abonoMaximo); // abono Maximo es Liquidar cuenta
        //Formula Deduccion de capital a partir del abono
        var txtpagado = document.getElementById("cpagado"+cuenta).value;
        txtpagado = parseFloat(txtpagado);
        var deuda = document.getElementById("deuda");
        deuda.value = txtpagado;
        var K =0.00;
        K = (abono - ((txtpagado*0.0125)*1.13)) / 1.13;
        K = parseFloat(K.toFixed(2));
        // fin de formula

        if (abono <= abonoMaximo) {
          var resta = abonoMaximo - abono;
          var Kminima = document.getElementById("ak"+cuenta).value;
          var nuevoK = txtpagado - K;

          if (resta == 0.00) {
            //ABONAR CANCELAR
            document.getElementById("pagopay").submit();
          }else if (nuevoK >= Kminima){
            //ABONAR
            document.getElementById("pagopay").submit();
          }else{
            //No se puede ABONAR esa cantidad. Trate de LIQUIDAR la cuenta o disminuya el monto de ABONO
            alertify.error("No se puede ABONAR esa cantidad. Trate de LIQUIDAR la cuenta o disminuya el monto de ABONO");
          }
          //document.getElementById("pagopay").submit();
        }else{
          alertify.error("El abono que esta intentando realizar supera el total maximo para canelar la cuenta. Por favor, revise bien el monto que se abonara.");
        }
        //alertify.log("hola pay: "+cuenta+" - fac: "+factura+" - "+abono);
      }else{
        alertify.warning("Debe introducir el numero de la factura que relaciona la Transaccion para poder continuar");
      }
    }
    </script>

  </head>
  <body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Nuevo Nav Bar-->
        <nav class="navbar navbar-inverse navbar-fixed-top"> <!-- navbar-dafault o navbar-inverse -->
          <div class="container-fluid">
            <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="#" class="navbar-brand">SICOPA</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php echo $menu_system; ?>
            </div>

          </div><!-- Container Fluid-->
        </nav>
        <div class="mr-infobar hidden-xs">
          Bienvenido: <strong><?php echo $_SESSION["loginUser-name"];?></strong> Hora: <strong id="timeServer">--:--:--</strong>
        </div>
        <!-- FIN Nuevo Nav Bar-->

        <div class="container">
          <H1>Pagos</H1>
          <h4>Pagos > Calculo de Pagos</h4>
          <p class="separate"></p>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <fielset>
                <legend>Calculo de Pagos</legend>
                <div class="jumbotron">
                  <form class="form-horizontal">
                    <div class="row">
                      <div class="col-lg-6">
                        <label for="lotiname" class="control-label col-sm-4 hidden-xs">DUI Cliente</label>
                        <div class="input-group col-sm-8">
                          <input type="text" id="textScan" name="dui" class="form-control" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" pattern="[0-9-]{10}" title="Solo se aceptan numeros. No letras." placeholder="00000000-0" required autocomplete="off" >
                          <div class="dropdown">
                            <p class="dropRespuesta" data-toggle="dropdown"></p>
                            <ul class="dropdown-menu dropdown-scan" id="resultado" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Escriba DUI de Cliente</a></li>
                            </ul>
                          </div>
                          <span class="input-group-btn">
                            <button class="btn btn-default">Buscar!</button>
                          </span>
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                  </form>
                </div>
              </fielset>
              <!-- Codigo si hay un DUI a Buscar-->
              <?php if(isset($_GET["dui"])){  ?>

              <?php
              $duimarcara = $_GET["dui"];
              $duiexplode = explode("-", $duimarcara);
              $duiexplod = $duiexplode[0].$duiexplode[1];
              $sqlname = "SELECT CLIENTE_APELLIDO, CLIENTE_NOMBRE FROM cliente WHERE CLIENTE_ID = '$duiexplod'";
              $resulname = $conn->query($sqlname);
              $ClienteName = "";
              if ($resulname->num_rows > 0) {
                // output data of each row
                if($rowcliente = $resulname->fetch_assoc()) {
                  $ClienteName = $rowcliente["CLIENTE_APELLIDO"].", ".$rowcliente["CLIENTE_NOMBRE"]." - DUI: ".$_GET["dui"];
                }
              } else {
                  $ClienteName = "No Name";
              }
              ?>

              <div class="panel panel-default">
                <div class="panel-heading">Listado de Cuentas Abiertas de <strong id="nombreCLiente"><?php echo $ClienteName;?></strong></div>
                <div class="table-responsive">
                  <table class="table table-hover text-center">
                   <tr>
                     <th>Cuenta</th>
                     <th>Lotificacion</th>
                     <th>Lote</th>
                     <th>CAPITAL</th>
                     <th>A Capital</th>
                     <th>A Interes</th>
                     <th>A Iva</th>
                     <th>Pago Minimo</th>      
                     <th>Abono a Cuenta</th>
                     <th>Cancelar</th>
                   </tr>
                   <?php
                   $scanDui = explode("-", $_GET["dui"]);
// Version 1. este si funciono
// Pero no tiene IVA e INTERES dinamicos de la base
//$sql = "SELECT cuenta.CUENTA_ID, lotificacion.LOTIFICACION_NOMBRE, cuenta.LOTE_ID, lote.LOTE_PRECIO, cuenta.CUENTA_PLAZO FROM cuenta INNER JOIN lote ON cuenta.LOTE_ID=lote.LOTE_ID INNER JOIN lotificacion ON lote.LOTIFICACION_ID=lotificacion.LOTIFICACION_ID WHERE cuenta.CLIENTE_ID='".$scanDui[0].$scanDui[1]."'";
// Version 2
/*
  Este ya posee iva e interes dinamicamente de la base.
*/
$sql = "SELECT cuenta.CUENTA_ID, lotificacion.LOTIFICACION_NOMBRE, cuenta.LOTE_ID, lote.LOTE_PRECIO, cuenta.CUENTA_PLAZO, impuesto.IMPUESTO_INTERES, impuesto.IMPUESTO_IVA FROM cuenta INNER JOIN lote ON cuenta.LOTE_ID=lote.LOTE_ID INNER JOIN lotificacion ON lote.LOTIFICACION_ID=lotificacion.LOTIFICACION_ID INNER JOIN impuesto ON cuenta.IMPUESTO_ID=impuesto.IMPUESTO_ID WHERE cuenta.CLIENTE_ID='".$scanDui[0].$scanDui[1]."'";
$result = $conn->query($sql);
$NInteres=0.00; // es la tasa de interes entre 12 meses..
$NIva = 0.00; // es tasa normal del iva.
$Cpagado=0.00;// es la suma de todo el capital que tiene guardado la tabla CUENTAS_PAGOS
$aCapital=0.00; // es el valor fijo segun contrado del valor del lote entre numero de meses.
$aInteres=0.00; // Valor que gana la lotificadora porq var el prestamo.
$aIva=0.00; // iva a recolectar y dar al gobierno.
$cuotaMinima=0.00;
$liquidar=0.00;
$CapitalSaldo = 0.00;
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    $strTotalCapital = "SELECT SUM(CUENTA_PAGOS_CAPITAL) as TCAPITAL FROM cuenta_pagos WHERE CUENTA_ID='".$row["CUENTA_ID"]."'";
    $rsTotalCapital = $conn->query($strTotalCapital);
    if($rsTotalCapital->num_rows > 0){
      $rowCapital =$rsTotalCapital->fetch_assoc();
      $Cpagado = $rowCapital["TCAPITAL"];

      $NInteres = $row["IMPUESTO_INTERES"]/12;
      $NIva = $row["IMPUESTO_IVA"];

      $aCapital = $row["LOTE_PRECIO"]/$row["CUENTA_PLAZO"];
      $aCapital = number_format($aCapital,2,'.','');
      $aInteres = ($row["LOTE_PRECIO"]-$Cpagado)*$NInteres;
      $aInteres = number_format($aInteres,2,'.','');
      $aIva = ($aCapital+$aInteres)*$NIva;
      $aIva = number_format($aIva,2,'.','');
      $cuotaMinima = $aCapital + $aInteres + $aIva;
        $liquidar = ($row["LOTE_PRECIO"]-$Cpagado); //Sacando el capital que se debe.
        //$N2Interes = $NInteres*12;
        $liquidar = $liquidar + ($liquidar*$NInteres); // se saca el interes al capital q se debe y se suma al capital
        $liquidar = $liquidar*(1+$NIva); // se saca el iva y se agrega. 
        $liquidar = number_format($liquidar,2,'.','');
        $CapitalSaldo = $row["LOTE_PRECIO"]-$Cpagado;
        ?>
        <tr>
         <td><?php echo $row["CUENTA_ID"]; ?></td>
         <td><?php echo $row["LOTIFICACION_NOMBRE"]; ?></td>
         <td><?php echo $row["LOTE_ID"]; ?></td>
         <td><?php echo "$ ".number_format($CapitalSaldo,2,'.',''); ?></td>
         <td><input type="hidden" name="ak<?php echo $row['CUENTA_ID'];?>" id="ak<?php echo $row['CUENTA_ID'];?>" value="<?php echo $aCapital;?>"><?php echo "$ ".$aCapital; ?></td>
         <td><?php echo "$ ".$aInteres; ?></td>
         <td><?php echo "$ ".$aIva; ?></td>
         <td><input type="hidden" name="cpagado<?php echo $row['CUENTA_ID'];?>" id="cpagado<?php echo $row['CUENTA_ID'];?>" value="<?php echo $CapitalSaldo;?>"><input type="hidden" name="hin<?php echo $row['CUENTA_ID'];?>" id="hin<?php echo $row['CUENTA_ID'];?>" value="<?php echo $cuotaMinima; ?>"><?php echo "$ ".$cuotaMinima; ?></td>      
         <td><input type="text" name="txtAbono<?php echo $row['CUENTA_ID'];?>" id="txtAbono<?php echo $row['CUENTA_ID'];?>" size="8"></td>
         <td><button type="button" class="btn btn-link btn-sm" onclick="abrirModal('<?php echo $row['CUENTA_ID']; ?>','<?php echo $liquidar; ?>')"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></button></td>
       </tr>
       <?php
     }else{
        echo "<tr><td colspan='10'>no hay ninguna pago registrado</td></tr>"; //Este mensaje nunca se vera. el cero como resultado es un valor. asi q nunca entrara al else.
      }

    }
  } else {
    echo "<tr><td colspan='10'>El cliente no tiene ningun lote adquirido..</td></tr>";
  }
  $conn->close();
  ?>


</table>
</div> <!-- tabla responsiva-->
</div> <!-- panel de tabla-->

<?php } ?>
</div><!-- caja de row -->
</div><!-- ROW-->
</div><!-- container-->
<a href=""></a>
<div class="modal fade" id="inicioModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Abono a Numero de Cuenta: <strong id="labelCodigo"></strong></h4>
      </div>
      <div class="modal-body">
        <form id="pagopay" action="pay" method="POST">
          <div class="form-group">
            <label for="pass">Fecha de Pago </label>
            <input type="text" value="<?php echo date("d/m/Y");?>" id="fecha" class="form-control" disabled>
          </div>
          <div class="form-group">
            <label for="idloti">Numero de Recibo</label>
            <input type="number" name="recibo" id="recibo" class="form-control" placeholder="Digite el numero de factura correspondiente">
          </div>
          <div class="form-group">
            <label for="idloti">Abono a Cuenta de $ USD</label>
            <p class="form-control-static" id="abonoUSDlabel"></p>
          </div>
          <input type="hidden" name="payid" id="payid">
          <input type="hidden" name="abonoUSD" id="abonoUSD">
          <input type="hidden" id="abonoLiquidar">
          <input type="hidden" name="deuda" id="deuda">
          <input type="hidden" name ="dui" value = "<?php echo $_GET['dui'];?>">
        </form>
        <p>Nota: Si usted desea cancelar la cuenta en este momento, 
          debe pagar la cantidad de <span class="sp-liquidar">$<span id="liquidar"></span></span>. Intereses e IVA ya estan incluidos.</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" onclick="efectuarPago(payid.value,recibo.value)"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span> Realizar Transaccion</button>
        <button class="btn btn-default" onclick="cancelarPago()" data-dismiss="modal">Cancelar</button>
      </div>                            
    </div>
  </div>
</div>
<?php
if (isset($_GET["error"])) {
  # code...
  if ($_GET["error"]==0) {
    # code...
    // si se ingreso
    ?>
    <script>
    alertify.success("Su pago ha sido REGISTRADO EXITOSAMENTE.");
    </script>
    <?php
  }else if ($_GET["error"]==1) {
    # code...
    //no se pudo
    ?>
    <script>
    alertify.error("Su pago no ha podido ingresarse. Si el Problema persiste, favor contactar a mantenimiento");
    </script>
    <?php
  }
}
?>
<center>
  <footer>
    <p>&copy; SICOPA 2015</p>
  </footer>
</center>

<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="../js/vendor/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>

