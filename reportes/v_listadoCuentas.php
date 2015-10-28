<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="2" || $_SESSION["user-nivelacceso"]=="3") {
        # code...
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
            <h4>Reportes > Listado de Estados de Cuentas</h4>
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
                        <legend>Listado de Estados de Cuentas</legend>
                    </fielset>
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default">Al Corriente</button>
                        <button type="button" class="btn btn-default">Dias Criticos</button>
                        <button type="button" class="btn btn-default">Mora</button>
                      </div>
                      <br><br>

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Listado de Cuenta de <strong>Vigentes</strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover text-center">
                            <tr>
                              <th>DUI</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Cuenta</th>
                              <th>Credito Total</th>
                              <th>Credito Pagado</th>
                              <th>Dias</th>
                            </tr>
                            <tr>
                              <td>023569-8</td>
                              <td>Ana Patricia</td>
                              <td>Lemus Castro</td>
                              <td>50</td>
                              <td>$ 4,000</td>
                              <td>$ 300</td>
                              <td>5</td>
                            </tr>
                            <tr>
                              <td>259456-8</td>
                              <td>Isabel</td>
                              <td>Franco</td>
                              <td>15</td>
                              <td>$ 7,000</td>
                              <td>$ 1,500</td>
                              <td>7</td>
                            </tr>
                            <tr>
                              <td>651548-2</td>
                              <td>Jacinto</td>
                              <td>Ordoñez</td>
                              <td>2</td>
                              <td>$ 7,797</td>
                              <td>$ 844.68</td>
                              <td>22</td>
                            </tr>
                          </table>
                        </div>
                        </div>  
                      </div><!-- row 2-->
                </div><!-- ROW-->
        </div><!-- container-->








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

