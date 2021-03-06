<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1") {
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

     <link rel="stylesheet" href="../css/jquery-ui.css">
  <script src="../js/vendor/jquery-ui.js"></script>

  <script src="../js/vendor/bootstrap.min.js"></script>
<script>
$(function() {
    $( "#busqueda" ).autocomplete({
        source: 'autoimpuesto.php'
    });
});
</script>

    <script type="text/javascript">
         function cancelareliminarimpuesto(){
      alertify.log("proceso ha sido Cancelado!");
    }

        function eliminarimpuesto()
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
            <H1>Impuestos</H1>
            <h4>Impuestos > Eliminar Impuesto</h4>
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
                        <span class=" navbar-brand">Menu Impuestos</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="v_nwImpuestos">Agregar Impuestos</a></li>
                            <li><a href="v_upImpuesto">Actualizar Impuestos</a></li>
                            <li><a href="v_dlImpuesto">Eliminar Impuestos</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
            <fielset>
                <legend>Eliminar Impuesto</legend>


                <div class="jumbotron">
                <form class="form-horizontal" action="m_llenartablaImpuestos.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Impuesto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="buscar" id="busqueda" placeholder="Nombre del impuesto">
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
  <div class="panel-heading">Impuestos Registrados en <strong>SICOPA</strong></div>
  <!-- Table -->
  <div class="table-responsive">
   <?php 

  if (empty($_GET['id'])) {
        $id="";
         $interes="";
          $iva="";
           $descripcion="";
           
           
    }
    else
    {   
        $id=$_GET['id'];
        $interes=$_GET['interes'];
        $iva=$_GET['iva'];
        $descripcion=$_GET['descripcion'];
        $user=$_SESSION["loginUser-name"];
         

?>
    <table class="table table-hover text-center">
     <tr>
        <th>Descripcion del impuesto</th>
    <th>Interes</th>
    <th>Iva</th>      
    <th>Eliminar</th>
     </tr>

     <tr>
      <td><?php echo $descripcion; ?></td>
      <td><?php echo $interes; ?></td>
      <td><?php echo $iva; ?></td>
      <td><a href="#" class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#inicioModal"></a></td>
    </tr>
  </table>
  <?php
}
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
      <td>No hay informacion almacenada con ese nombre de impuesto</td>
      
      
    </tr>
  </table>
            <?php
        }
    }

  
?>      
  
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
                    <h4 class="modal-title">Eliminacion de Impuesto</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">Codigo De Impuesto</label>
                            <input type="text" value="<?php echo $id;?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Nombre Del Impuesto: </label>
                            <p class="form-control-static"><?php echo $descripcion; ?></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="m_dlImpuesto.php?id=<?php echo $id; ?>&user=<?php echo $user; ?>&descripcion=<?php echo $descripcion; ?>" id="eliminar" onclick="" class="btn btn-primary">Aceptar</a>
                    <button class="btn btn-default" onclick="cancelareliminarimpuesto();" data-dismiss="modal">Cancelar</button>
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
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="../js/vendor/bootstrap.min.js"></script>

<script src="../js/main.js"></script>
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