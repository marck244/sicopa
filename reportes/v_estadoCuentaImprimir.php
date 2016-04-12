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
      xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("tablaCuenta").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "m_estadoCuenta.php?cuenta="+cuenta, true);
        xhttp.send();
    }
    </script>
</head>
<body onload="buscarHistorial(<?php echo $_GET['cuenta']; ?>)">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Nuevo Nav Bar-->
        <!-- FIN Nuevo Nav Bar-->
        <div class="container">
            <H1>SICOPA</H1>
            <h4>Reportes > Estado de Cuenta</h4>
            <p class="separate"></p>
        </div>

        <div class="container">
            <div class="row">
               
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    

                
                        <div class="panel panel-default"><!-- Panel 2--> 
                        <!-- Default panel contents -->
                        <div class="panel-heading alig txt-right">Estado/Historial de Cuenta <a href="#" class="glyphicon glyphicon-print mr-glyphicon-2 mr-glyphicon-padding-6" onclick="window.print();"></a></div>                        
                        <!-- Table -->
                        <div class="table-responsive" id="tablaCuenta">
                          
                        </div>
                        </div> <!-- Panel 2--> 

               
                      </div><!-- row 2-->
                </div><!-- ROW-->
        </div><!-- container-->

<center>
    <footer>
        <p>&copy; SICOPA 2016</p>
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

