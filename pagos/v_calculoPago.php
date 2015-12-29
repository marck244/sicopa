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
    function abrirModal(){
      var myModal = $('#inicioModal');
      myModal.modal('show');
      var codigo = document.getElementById("codigoCuenta");
      var factu = document.getElementById("recibo");
      var usd = document.getElementById("abono");
      document.getElementById("labelCodigo").innerHTML=cod;
      codigo.value = cod;
      factu.value = factura;
      usd.value = cuota;
    }
    //Para realizar un pago mensual de un lote.
    function abrirModal2(cod,factura,cuota){
      var myModal = $('#inicioModal');
      myModal.modal('show');
      var codigo = document.getElementById("codigoCuenta");
      var factu = document.getElementById("recibo");
      var usd = document.getElementById("abono");
      document.getElementById("labelCodigo").innerHTML=cod;
      codigo.value = cod;
      factu.value = factura;
      usd.value = cuota;
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
    
    //valida los montos de dinero.
    function hacerPago(factura,cuota,cod){
      if(factura=="" || cuota==""){
        alertify.error('El numero de FACTURA y CUOTA no pueden estar vacios');
      }else if (factura!=null && cuota!=null){
        if(isNaN(cuota)){
          alertify.error("Debe de Escribir una cantidad de dinero sin simbolos. Ejemplo: 50.98");
        }else{
          abrirModal(cod,factura,cuota);
        }
        
      }
    }

    //funcion hacerPago()
    function cancelarPago(){
      alertify.log("Pago ha sido Cancelado!");
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
      /*var nameCliente = document.getElementById("clientenombre"+id);
      document.getElementById("nombreCLiente").innerHTML=nameCliente.value; */
      var txtBuscar = document.getElementById("textScan");
      txtBuscar.value = id;
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

                    <div class="panel panel-default">
                        <div class="panel-heading">Listado de Cuentas Abiertas de <strong id="nombreCLiente"></strong></div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                               <tr>
                                 <th>Cuenta</th>
                                 <th>Lotificacion</th>
                                 <th>Lote</th>
                                 <th>Saldo</th>
                                 <th>A Capital</th>
                                 <th>A Interes</th>
                                 <th>A Iva</th>
                                 <th>Pago Minimo</th>      
                                 <th>N&deg; Recibo</th>
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
        $aCapital = number_format($aCapital,2,'.',',');
        $aInteres = ($row["LOTE_PRECIO"]-$Cpagado)*$NInteres;
        $aInteres = number_format($aInteres,2,'.',',');
        $aIva = ($aCapital+$aInteres)*$NIva;
        $aIva = number_format($aIva,2,'.',',');
        $cuotaMinima = $aCapital + $aInteres + $aIva;
      
         ?>
                              <tr>
                                 <td><?php echo $row["CUENTA_ID"]; ?></td>
                                 <td><?php echo $row["LOTIFICACION_NOMBRE"]; ?></td>
                                 <td><?php echo $row["LOTE_ID"]; ?></td>
                                 <td><?php echo "$ ".number_format($row["LOTE_PRECIO"]-$Cpagado,2,'.',','); ?></td>
                                 <td><?php echo "$ ".$aCapital; ?></td>
                                 <td><?php echo "$ ".$aInteres; ?></td>
                                 <td><?php echo "$ ".$aIva; ?></td>

                                 <td><?php echo "$ ".$cuotaMinima; ?></td>      
                                 <td><input type="number" name="txtRecibo<?php echo $row['CUENTA_ID'];?>" id="txtRecibo<?php echo $row['CUENTA_ID'];?>"></td>
                                 <td><input type="text" name="txtAbono<?php echo $row['CUENTA_ID'];?>" id="txtAbono<?php echo $row['CUENTA_ID'];?>"></td>
                                 <td><button type="button" class="btn btn-link btn-sm" onclick="abrirModal('<?php echo $row['CUENTA_ID']; ?>')"><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span></button></td>
                              </tr>
        <?php
      }else{
        echo "<tr><td colspan='11'>no hay ninguna pago registrado</td></tr>"; //Este mensaje nunca se vera. el cero como resultado es un valor. asi q nunca entrara al else.
      }
       
    }
} else {
    echo "<tr><td colspan='11'>El cliente no tiene ningun lote adquirido..</td></tr>";
}
$conn->close();
                             ?>

                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td colspan=2><strong>Minimo Total</strong></td>
                              <td><strong id="minimo">$</strong></td>
                              <td><strong>Total</strong></td>
                              <td><strong id="total">$</strong></td>
                              <td></td>
                          </tr>
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
                    <h4 class="modal-title">Abono a Cuenta: <strong id="labelCodigo"></strong></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">Codigo de Cuenta</label>
                            <input type="text" value="" id="codigoCuenta" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Fecha de Pago </label>
                            <input type="text" value="<?php echo date("Y/m/d H:m:s");?>" id="fecha" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="idloti">Numero de Recibo</label>
                            <input type="text" value="" id="recibo" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="idloti">Abono de $ USD</label>
                            <input type="text" value="" id="abono" class="form-control" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-default" onclick="cancelarPago()" data-dismiss="modal">Cancelar</button>
                </div>                            
            </div>
        </div>
    </div>

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

