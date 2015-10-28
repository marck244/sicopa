<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3" || $_SESSION["user-nivelacceso"]=="4") {
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
    <script type="text/javascript" src="../alertify/alertify.min.js"></script>
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
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
            <H1>Cuentas</H1>
            <h4>Cuentas > Actualizar Cuenta</h4>
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
                        <span class="navbar-brand">Menu Cuenta</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                            <li><a href="v_nwCuenta">Agregar Cuenta</a></li>
                                <li><a href="v_upCuenta">Actualizar Cuenta</a></li>
                                <li><a href="v_dlCuenta">Eliminar Cuenta</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Actualizar Cuenta</legend>


  <div class="jumbotron">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Cliente :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="buscar cuenta por nombre cliente">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>



                    </fielset>
                </div>
                </div>
<div class="col-15 col-sm-12 col-md-12 col-lg-13">
                    <fielset>
                        
                      <form action="" class="form-horizontal">
                        <div class="form-group">
                            <label for="Id Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Id Cuenta :</label>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                
                                             <input type="name" class="form-control" disabled="true" placeholder="Codigo de Cuenta">
                            </div>
                        </div>
                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre/cliente:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" class="form-control" placeholder="Ingrese Un Cliente">
         </div>
     </div>
     <div class="form-group">
         <label for="inputImpuesto" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Impuesto :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboimpuesto" class="form-control">
                <option>Seleccione</option>
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputEstadoCuenta" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Estado/Cuenta :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboestado" class="form-control">
                <option>Activo</option>
                <option>Inactivo</option>
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputLotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotificacion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolotificacion" class="form-control">
                <option>Seleccione</option>
              
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputLotes" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotes :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolote" class="form-control">
                <option>Seleccione</option>
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputCuentaPrima" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta/prima :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" placeholder="Valor de Prima">
         </div>
     </div>

     <div class="form-group">
         <label for="inputCuentaPlazo" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta /plazo :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" placeholder="Plazo de pago(dias)">
         </div>
     </div>

     <div class="form-group">
         <label for="inputCuentaInteres" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta/interes :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" placeholder="cuenta de interes a pagar">
         </div>
     </div>


     <div class="form-group">
         <label for="inputCuentaIVA" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta IVA :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" placeholder="cuenta de IVA">
         </div>
     </div>

    
     <div class="form-group">
         <label for="inputCuentaMontoTotal" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Monto Total :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" placeholder="cuenta de monto total a pagar">
         </div>
     </div>


      <div class="form-group">
         <label for="inputCuentaMontoTotal" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Fecha Creacion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="date" class="form-control" placeholder="">
         </div>
     </div>



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-1 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Actualizar Cuenta</button>
         </div>
         </center>
     </div>
                    </form>
                    </fielset>
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
