<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="2" || $_SESSION["user-nivelacceso"]=="3" || $_SESSION["user-nivelacceso"]=="4") {
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
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css" />

    <script>
    function buscarHistorial(cuenta){
      var txt = document.getElementById("imprimirValor");
      txt.value = cuenta;
      xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("tablaCuenta").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "m_estadoCuenta24.php?cuenta="+cuenta, true);
        xhttp.send();
    }
    </script>

    <script>
      function abrirVentana() {
        var txt = document.getElementById("imprimirValor").value;
        window.open("v_estadoCuentaImprimir.php?cuenta="+txt, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1020, height=600");
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
            <H1>Reportes</H1>
            <h4>Reportes > Estado de Cuenta</h4>
            <p class="separate"></p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                    <div class="sidebar-nav">
                      <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="navbar-brand">Menu Reportes</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <?php echo $menu_reporte;?>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Estado de Cuenta</legend>
                        <div class="jumbotron">
                            <form class="form-horizontal" method="GET">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="lotiname" class="control-label col-sm-4 hidden-xs">DUI Cliente</label>
                                        <div class="input-group col-sm-8">
                                            <input type="text" id="textScan" name="dui" class="form-control auto" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" pattern="[0-9-]{10}" title="Solo se aceptan numeros. No letras." placeholder="00000000-0" required autocomplete="off" >
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Buscar!</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </fielset>

                    <?php if (isset($_GET["dui"])) { ?>
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
                    <div class="panel panel-default"><!-- Panel 1--> 
                        <!-- Default panel contents -->
                        <div class="panel-heading">Estado de Cuenta de <strong id="nombreCLiente"><?php echo $ClienteName;?></strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Ultimo Pago</th>
                              <th>Capital</th>
                              <th>C. Pagado</th>
                              <th>Interes</th>
                              <th>IVA</th>
                              <th>Total Pagado</th>
                              <th>Estado</th>
                              <th>Ver</th>
                            </tr>
                            <?php
                               $sqlcuenta = "SELECT cuenta.CUENTA_ID, lote.LOTE_PRECIO, cuenta_estados.CUENTA_ESTADOS_NOMBRE FROM cuenta INNER JOIN lote ON cuenta.LOTE_ID=lote.LOTE_ID INNER JOIN cuenta_estados ON cuenta.CUENTA_ESTADOS_ID=cuenta_estados.CUENTA_ESTADOS_ID WHERE cuenta.CLIENTE_ID='$duiexplod'";
                               $resultCuenta = $conn->query($sqlcuenta);
                               if ($resultCuenta->num_rows > 0) {
                                while($rowCuenta = $resultCuenta->fetch_assoc()) {
                                  $sqlSumas = "SELECT MAX(cp.CUENTA_PAGOS_FECHA) as fecha, SUM(cp.CUENTA_PAGOS_CAPITAL) as pagoCapital, SUM(cp.CUENTA_PAGOS_INTERES) as interes, SUM(cp.CUENTA_PAGOS_IVA) as iva FROM cuenta_pagos cp WHERE cp.CUENTA_ID = '".$rowCuenta["CUENTA_ID"]."'";
                                  $resultsumas = $conn->query($sqlSumas);
                                  if ($resultsumas->num_rows > 0) {
                                    if ($rowSumas = $resultsumas->fetch_assoc()) { 
                                      $fechaFormateada = date_create($rowSumas["fecha"]);
                                  ?>
                                  <tr>
                                    <td><?php echo $rowCuenta["CUENTA_ID"]; ?> <input type="hidden" value="<?php echo $rowCuenta["CUENTA_ID"]; ?>" id="cuenta<?php echo $rowCuenta["CUENTA_ID"]; ?>"></td>
                                    <td><?php echo date_format($fechaFormateada,'d/m/Y g:i A');?></td>
                                    <td><?php echo "$ ". number_format($rowCuenta["LOTE_PRECIO"],2,'.',','); ?></td>
                                    <td><?php echo "$ ". number_format($rowSumas["pagoCapital"],2,'.',',');?></td>
                                    <td><?php echo "$ ". number_format($rowSumas["interes"],2,'.',',');?></td>
                                    <td><?php echo "$ ". number_format($rowSumas["iva"],2,'.',',');?></td>
                                    <td><?php echo "$ ".number_format(($rowSumas["pagoCapital"]+$rowSumas["interes"]+$rowSumas["iva"]),2,'.',',');?></td>
                                    <td><?php echo $rowCuenta["CUENTA_ESTADOS_NOMBRE"]; ?></td>
                                    <td><a href="#" class="glyphicon glyphicon-search mr-glyphicon-2" onclick="buscarHistorial(cuenta<?php echo $rowCuenta["CUENTA_ID"]; ?>.value)"></a></td>
                                  </tr>
                                  <?php
                                  }
                                  }
                                }
                              }
                            ?>
                          </table>
                        </div>
                        </div><!-- Panel 1--> 
                        <div class="panel panel-default"><!-- Panel 2--> 
                        <!-- Default panel contents -->
                        <div class="panel-heading alig txt-right">Estado/Historial de Cuenta <a href="#" class="glyphicon glyphicon-print mr-glyphicon-2 mr-glyphicon-padding-6" onclick="abrirVentana()"></a></div>                        
                        <!-- Table -->
                        <div class="table-responsive" id="tablaCuenta">
                          
                        </div>
                        </div> <!-- Panel 2--> 

                      <?php }?> 
                      </div><!-- row 2-->
                </div><!-- ROW-->
        </div><!-- container-->

<input type="hidden" id="imprimirValor">


<?php
 $conn->close();
  ?>



<center>
    <footer>
        <p>&copy; SICOPA 2015</p>
    </footer>
</center>
     
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="../js/vendor/bootstrap.min.js"></script>
<script src="../js/main.js"></script>


<script type="text/javascript" src="../js/vendor/jquery-ui.min.js"></script>    
<script type="text/javascript">

$(function() {
    //autocomplete
    $(".auto").autocomplete({
        source: "../pagos/scanCliente.php",
        minLength: 1
    });                
});
</script>
</body>
</html>

