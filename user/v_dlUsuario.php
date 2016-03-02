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
    <script type="text/javascript" src="../alertify/alertify.min.js"></script>

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="../js/vendor/bootstrap.min.js"></script>

    <script>
    $(function() {
    $( "#busqueda" ).autocomplete({
        source: 'autousuario.php'
    });
    });
    </script>


     <script type="text/javascript">
         function cancelareliminarusuario(){
      alertify.log("proceso ha sido Cancelado!");
    }

        function eliminarusuario()
        {
            /******************* codigo para eliminar         */
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
            <H1>Usuarios</H1>
            <h4>Usuarios > Eliminar Usuario</h4>
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
                        <span class="navbar-brand">Menu Usuario</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="v_nwUsuario">Agregar Usuarios</a></li>
                            <li><a href="v_upUsuario">Actualizar Usuarios</a></li>
                            <li><a href="v_dlUsuario">Eliminar Usuarios</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
            <fielset>
                <legend>Eliminar Usuario</legend>


                <div class="jumbotron">
                <form class="form-horizontal" action="m_llenartabladlUsuario.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Usuario :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Busqueda por Nickname" pattern="[a-zA-Z\.]{8,25}" title="El campo Nickname debe contener un minimo de 8 Caracteres y como maximo 25 Caracteres" required>
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
  <div class="panel-heading">Usuarios Registrados en <strong>SICOPA</strong></div>

  <!-- Table -->
  <div class="table-responsive">
  <?php 

  if (empty($_GET['nick'])) {
        $nick="";
        if (empty($_GET['nombre'])) {
            $nombre="";
        }
        if (empty($_GET['apellido'])) {
            $apellido="";
        }
        if (empty($_GET['nivel'])) {
            $nivel="";
            $nivelnom="";
        }
      
           
    }
    else
    {   
        $user=$_SESSION["loginUser-name"];
        $nick=$_GET['nick'];
        $nombre=$_GET['nombre'];
        $apellido=$_GET['apellido'];
        $nivel=$_GET['nivel'];

        if ($nivel == "1" ) {
            $nivelnom="Administrador";
        }
        if ($nivel == "2" ) {
            $nivelnom="Gerencia";
        }
        if ($nivel=="3") {
            $nivelnom="Operador";
        }
         

?>
    <table class="table table-hover text-center">
     <tr>
    <th>Usuario</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Nivel de Acceso</th>      

    <th>Eliminar</th>
     </tr>

     <tr>
      <td><?php echo $nick; ?></td>
      <td><?php echo $nombre; ?></td>
      <td><?php echo $apellido; ?></td>
      <td><?php echo $nivelnom; ?></td>
      <td><a href="#" class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#inicioModal"></a></td>
    </tr>
  </table>

  <?php } ?>
</div>
<?php 
if (empty($_GET['vacio'])) {
        $vacio="";
    }
    else
    {
        $vacio=$_GET['vacio'];
        if ($vacio == "si") {
            ?>
             <table class="table table-hover text-center">
     <tr>
        <th>Mensaje Del Sistema</th>
   
     </tr>

     <tr>
      <td>No hay informacion almacenada con ese Nickname</td>
      
      
    </tr>
  </table>
            <?php
        }
    }

  
?> 
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
                    <h4 class="modal-title">Eliminacion de Usuario</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">UserName</label>
                            <input type="text" value="<?php echo $nick; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Nombre del Usuario: </label>
                            <p class="form-control-static"><?php echo $nombre." ".$apellido; ?></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="m_dlUsuario.php?id=<?php echo $nick; ?>&user=<?php echo $user; ?>&nombre=<?php echo $nombre; ?>&apellido=<?php echo $apellido; ?>" id="eliminar" onclick="" class="btn btn-primary">Aceptar</a>
                    <button class="btn btn-default" onclick="cancelareliminarusuario();" data-dismiss="modal">Cancelar</button>
                </div>                            
            </div>
        </div>
    </div>





<center>
  <footer>
    <p>&copy; SICOPA 2015</p>
</footer>
</center>
</div> <!-- /container -->       

</body>
<?php
 if (empty($_GET['eliminado'])) {
        $mensaje="";
    }
    else
    {   
        $mensaje=$_GET['eliminado'];
        if ($mensaje == "si") {
            ?> <script type="text/javascript">alertify.success('Registro eliminado exitosamente');</script> <?php
        }

        if ($mensaje == "no") {
            ?> <script type="text/javascript">alertify.error('El registro no se elimino');</script> <?php
        }
    }
?>
</html>