<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="2") {
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

    <script>
    function filtroNormal(){
      setTimeout(function(){
        $("#filtroNormal").slideDown(500);
      },500);
      $("#filtro1dia").slideUp(500);
      $("#filtro2dia").slideUp(500);
    }
    function filtro1dia(){
      setTimeout(function(){
        $("#filtro1dia").slideDown(500);
      },500);
      $("#filtro2dia").slideUp(500);
      $("#filtroNormal").slideUp(500);
    }
    function filtro2dia(){
     setTimeout(function(){
        $("#filtro2dia").slideDown(500);
      },500);
      $("#filtro1dia").slideUp(500);
      $("#filtroNormal").slideUp(500);
    }
    function validarFormFecha(){
      var fecha1 = document.forms["form2fecha"]["fechaI"].value;
      var fecha2 = document.forms["form2fecha"]["fechaF"].value;

      var valuesStart = fecha1.split("-");
      var valuesEnd = fecha2.split("-");

      var dateStart = new Date(valuesStart[0],(valuesStart[1]-1),valuesStart[2]); // new Date(anio,mes-1,dia)
      var dateEnd = new Date(valuesEnd[0],(valuesEnd[1]-1),valuesEnd[2]);
      var dateHoy = new Date();

      if (dateEnd>dateHoy) {
        alertify.error("Fecha Final no debe ser mayor a este Dia");
        return false;
      }else{
        if(dateStart>=dateEnd){
          alertify.error("FECHA FINAL debe ser mayor que la FECHA INICIO");
          return false;
        }
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
            <H1>Reportes</H1>
            <h4>Reportes > Bitacora de SICOPA</h4>
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
                        <legend>Bitacora del Sistema</legend>
                    </fielset>

                      <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-default"  onclick="filtroNormal()">Actual</button>
                        <button type="button" class="btn btn-default"  onclick="filtro1dia()">Dia Específico</button>
                        <button type="button" class="btn btn-default"  onclick="filtro2dia()">Intervalos</button>
                      </div>
                  <br><br>
                    <div class="controles-filtro ocultar" id="filtroNormal">
                      <div class="alert alert-info" role="alert">Se Muestra todos los movimientos del dia actual: <?php echo date("d/m/Y");?></div>
                    </div>
                    <div class="controles-filtro ocultar" id="filtro1dia">
                      <form class="form-inline">
                        <div class="form-group">
                          <label for="buscar" class="control-label">Fecha</label>
                          <div class="input-group">
                           <input type="date" class="form-control" aria-describedby="basic-addon2" required>
                           <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                         </div>
                       </div>
                       <button class="btn btn-primary">Buscar</button>
                     </form>
                    <br>
                    </div>
                    <div class="controles-filtro ocultar" id="filtro2dia">
                      <form class="form-inline" name="form2fecha" onsubmit="return validarFormFecha()" method="GET">
                        <div class="form-group">
                          <label for="buscar" class="control-label">Fecha Inicio</label>
                          <div class="input-group">
                           <input type="date" name="fechaI" class="form-control" aria-describedby="basic-addon2" required>
                           <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                         </div>
                       </div>
                       <div class="form-group">
                          <label for="buscar" class="control-label">Fecha Final</label>
                          <div class="input-group">
                           <input type="date" name="fechaF" class="form-control" aria-describedby="basic-addon2" required>
                           <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                         </div>
                       </div>
                       <button class="btn btn-primary" type="submit">Buscar</button>
                     </form>
                    <br>
                    </div>
                   
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Actividades de <strong>SICOPA</strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover text-center">
                            <tr>
                              <th>#</th>
                              <th>Usuario</th>
                              <th>Fecha</th>
                              <th>Actividad</th>
                              <th>Tabla</th>
                              <th>IP</th>
                            </tr>
                            <tr>
                              <td>1</td>
                              <td>Marisol Menjivar</td>
                              <td>2015/11/10 10:27:05 PM</td>
                              <td>Nuevo cliente Jorge Alberto</td>
                              <td>Cliente</td>
                              <td>192.168.0.14</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Ernesto Lopez</td>
                              <td>2015/11/10 10:30:55 PM</td>
                              <td>Genero reporte de Estado de Cuenta de Cindy Garcia</td>
                              <td>Generada al momento</td>
                              <td>204.56.52.202</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Marisol Menjivar</td>
                              <td>2015/11/10 10:37:52 PM</td>
                              <td>Agrego Lote E050 a Jorge Alberto</td>
                              <td>Cuenta</td>
                              <td>192.168.0.16</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Marisol Menjivar</td>
                              <td>2015/11/10 10:40:23 PM</td>
                              <td>Actualizo a Jorge Alberto a Jorge Alberto Deras</td>
                              <td>Cliente</td>
                              <td>192.168.0.16</td>
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

