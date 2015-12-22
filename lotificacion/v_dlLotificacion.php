<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3") {
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

    function buscarLotificacion(){
        var texto = document.getElementById("textScan");
        //document.getElementById("resultado").innerHTML = texto.value;
            var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("resultado").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "m_dlLotificacion_scan.php?loti="+texto.value, true);
        xhttp.send();
    }

    function abrirModalDelete(id){
        var nombreL = document.getElementById("nom"+id);
        var ID = document.getElementById("idEliminarX");

        document.getElementById("deleTitle").innerHTML = "Eliminar Lotificacion: "+nombreL.value;
        document.getElementById("deleID").innerHTML = id;
        ID.value = id;
        document.getElementById("deleNom").innerHTML = nombreL.value;
        var myModal = $('#inicioModal');
        myModal.modal('show');
    }

/*
$(document).ready(function(){
    $(".dropRespuesta").dropdown("toggle");
});
*/

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
            <H1>Lotificacion</H1>
            <h4>Lotificacion > Eliminar/Cambio de Estado de  Lotificacion</h4>
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
                        <span class="navbar-brand">Menu Lotificacion</span>
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
                <legend>Eliminacion de Lotificacion</legend>


                <div class="jumbotron">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Lotificacion</label>
                            <div class="input-group">
                                <input type="text" id="textScan" class="form-control" placeholder="Nombre de Lotificacion" pattern="[A-Za-z0-9 ]{5,150}" title="Minimo 5 letras. Maximo 150. Solo letras y Numeros" required autocomplete="off" onkeyup="buscarLotificacion()" autofocus>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lotificaciones Registradas en <strong>SICOPA</strong></div>
  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-hover text-center" id="resultado">

    </table>
</div>
</div>        
    </fielset>
</div>
</div>
</div>

 <div class="modal fade" id="inicioModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="deleTitle">Eliminacion de Lotificacion</h4>
                </div>
                <div class="modal-body">
                    <form id="formDelete" action="m_dlLotificacion_action" method="POST">
                        <div class="form-group">
                            <label for="idloti">Codigo: </label>
                            <p class="form-control-static" id="deleID"></p>
                            <input type="hidden" id="idEliminarX" name="EliminarID">
                        </div>
                        <div class="form-group">
                            <label for="pass">Lotificacion: </label>
                            <p class="form-control-static" id="deleNom"></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" form="formDelete" value="Submit">Aceptar</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>                            
            </div>
        </div>
    </div>
<?php 
    if (isset($_GET["r"])) {
        # code...
        if ($_GET["r"]==1) {?>
        <script>
            alertify.error("No se Pudo Eliminar! Ya hay lotes Asociados a esta Lotificacion");
        </script>
    <?php }elseif ($_GET["r"]==0) {
        # code...
        ?>
        <script>
            alertify.success("Lotificacion ELIMNADA exitosamente!");
        </script>
    <?php
    }
    } ?>

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