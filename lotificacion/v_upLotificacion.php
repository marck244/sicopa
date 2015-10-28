<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
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
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="../" class="glyphicon glyphicon-home" ></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li ><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> Clientes</a></li>
                                <li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> Cuentas</a></li>
                                <li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> Pagos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                       <li  class="active"><a href="v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>
                                <li><a href="../lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> Lotes</a></li>
                            </ul>
                        </li>
                        
                             
                                                <li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        
                             <li class="dropdown">
                            <a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>
                                <li><a href="../user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>
                                <li><a href="../profesion/v_nwProfesion" class="glyphicon glyphicon-certificate"> PROFESIONES</a></li>
                                <li><a href="../impuestos/v_nwImpuestos" class="glyphicon glyphicon-book"> IMPUESTO</a></li>
                                </ul>
                                </li>
                        <li ><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>
                    </ul>

                </div>


            </div><!-- Container Fluid-->
        </nav>
        <div class="mr-infobar hidden-xs">
            Bienvenido: <strong><?php echo $_SESSION["loginUser-name"];?></strong> Hora: <strong id="timeServer"></strong>
        </div>
        <!-- FIN Nuevo Nav Bar-->

        <div class="container">
            <H1>Lotificacion</H1>
            <h4>Lotificacion > Actualizar Lotificacion</h4>
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
                        <span class="visible-xs navbar-brand">Menu Lotificacion</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="v_nwLotificacion">Agregar Lotificacion</a></li>
                            <li><a href="v_upLotificacion">Actualizar Lotificacion</a></li>
                            <li><a href="v_dlLotificacion">Eliminar Lotificacion</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
            <fielset>
                <legend>Actualizacion de Lotificacion</legend>


                <div class="jumbotron">
                <form action="" class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Lotificacion</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre de Lotificacion" pattern="[A-Za-z ]{5,150}" title="No se admiten numeros" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>




        <form action="" class="form-horizontal">
            <div class="form-group">
                <label for="Id Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Codigo</label>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">

                    <p class="form-control-static">#ID (Sera dinamico)</p>
                </div>
            </div>
            <div class="form-group">
                <label for="Nombre Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre</label>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control" placeholder="Nombre de la Nueva Lotificacion" pattern="[A-Za-z ]{5,150}" title="No se admiten numeros. Maximo 150 caracteres." required>
                </div>
            </div>
            <div class="form-group">
                <label for="Numero de Lotes" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Numero de Lotes</label>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <input type="number" class="form-control" placeholder="Numero de Lotes que posee o puede poseer" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Precio de Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Precio $ USD</label>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <input type="text" class="form-control" placeholder="Ejemplo: 10000 o 10000.99" pattern="[0-9.]{7,9}" title="Ejemplo 1234567.89 No se permiten las comas (,). \n Minimo de un terremo es de $1000.00" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-sm-2 col-sm-offset-3">
                    <button class="btn btn-primary">Actualizar Lotificacion</button>
                </div>
            </div>
        </form>
    </fielset>
</div>
</div>
</div>







<center>
  <footer>
    <p>&copy; SICOPA 2015</p>
</footer>
</center>
</div> <!-- /container -->       
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="../js/vendor/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>