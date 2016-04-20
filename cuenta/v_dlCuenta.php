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
    <script type="text/javascript" src="../js/main.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
     <link rel="stylesheet" href="../css/jquery-ui.css">
  <script src="../js/vendor/jquery-ui.js"></script>

  <script src="../js/vendor/bootstrap.min.js"></script>

     <script>
$(function() {
    $( "#busqueda" ).autocomplete({
        source: 'autocuenta.php'
    });
});
</script> 


     <script type="text/javascript">

    function valida () {
        
        var busqueda= document.getElementById("typeahead");

        if (busqueda.value=='') {
            alertify.warning("No ha digitado nada en la caja de busqueda por favor ingrese un numero de DUI");
            return false;
        }
        return true;

    }

    </script>

    <script type="text/javascript">
         function cancelareliminar(){
      alertify.log("proceso ha sido Cancelado!");
    }

        function eliminarcliente()
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
            <H1>Cuentas</H1>
            <h4>Cuentas > Eliminar/Cambio de Estado de Cuenta</h4>
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
                <legend>Eliminar/Cambio de Estado de Cuenta</legend>


                  <div class="jumbotron">
                <form class="form-horizontal" method="POST"  action="m_llenartablaCuenta.php" onsubmit="return valida()" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-4 hidden-xs">Numero DUI :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" id="busqueda" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" placeholder="Ingresa un numero de Dui">
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
  <div class="panel-heading">Cuentas Registradas en <strong>SICOPA</strong></div>
  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-hover text-center">
    <?php 

  if (empty($_GET['dui']) || empty($_GET['id'])  ) {
        $dui="";
         $id="";
          $cliente="";
           $impuesto_descripcion="";
           $cuenta_estado_id="";
           $estado="";
           $lote="";
           $fecha_creado="";
           $plazo="";
    }
    else
    {   
        $dui=$_GET["dui"];
        $id=$_GET["id"];
        $cliente=$_GET["cliente"];
        $impuesto_descripcion=$_GET["impuestodescripcion"];
        $cuenta_estado_id=$_GET["cuenta_estado_id"];
        $estado=$_GET["estado"];
        $lote=$_GET["lote"];
        $fecha_creado=$_GET["fechacreado"];
        $plazo=$_GET["plazo"];

        $user=$_SESSION["loginUser-name"];;

         ?>
         <table class="table table-hover text-center">
     <tr>
        <th>Codigo Cuenta</th>
        <th>Dui</th>
    <th>Cliente</th>     
    <th>Estado Cuenta</th>
    <th>Lote</th>
    <th>Fecha Creacion</th>
    <th>Plazo</th>
    <th>Eliminar</th>
     </tr>

     <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $dui; ?></td>
      <td><?php echo $cliente; ?></td>
      <td><?php echo $estado; ?></td>
      <td><?php echo $lote; ?></td>
      <td><?php echo $fecha_creado; ?></td>
      <td><?php echo $plazo." Cuotas"; ?></td>
      
      
      <td><a href="#" class="glyphicon glyphicon-trash" id="<?php echo $dui; ?>" data-toggle="modal" data-target="#inicioModal"></a></td>
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
      <td>No hay informacion almacenada con ese dui</td>
      
      
    </tr>
  </table>
            <?php
        }
    }

  ?>
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
                    <h4 class="modal-title">Eliminar/Cambio de Estado de Cuenta</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">Codigo De Cuenta</label>
                            <input type="text" value="<?php echo $id; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Cliente: </label>
                            <p class="form-control-static"><?php echo $cliente; ?></p>
                        </div>
                    </form>
                    <?php
                    include("../conexion/conexion.php");

                    $sql="SELECT CUENTA_ID from cuenta_pagos WHERE CUENTA_ID='$id'";
                    $query=$conn->query($sql);
                    $n_row=$query->num_rows;

                    if ($n_row > 0) {
                        ?>
                        <p><strong>NOTA:</strong> La cuenta seleccionada no se eliminara porque posee un pago asi que se dara de baja es decir si antes estaba Activa ahora sera Inactiva.</p>
                         <div class="modal-footer">
                    <a href="m_dlCuenta.php?cuenta=<?php echo $id; ?>&pago=si&dui=<?php echo $dui; ?>&user=<?php echo $user; ?>" class="btn btn-primary" id="eliminar" onclick="">Aceptar</a>
                    <button class="btn btn-default" onclick="cancelareliminar();" data-dismiss="modal">Cancelar</button>
                </div>
                        <?php
                    }
                    else
                    {

                    ?>
                      <p><strong>NOTA:</strong> La cuenta seleccionada se eliminara porque NO posee un pago.</p>
                         <div class="modal-footer">
                    <a href="m_dlCuenta.php?cuenta=<?php echo $id; ?>&pago=no" class="btn btn-primary" id="eliminar" onclick="">Aceptar</a>
                    <button class="btn btn-default" onclick="cancelareliminar();" data-dismiss="modal">Cancelar</button>
                </div>
                    <?php
                
                
                    }

                    ?>
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
            ?> <script type="text/javascript">alertify.success('Registro eliminado o dado de baja exitosamente');</script> <?php
        }

        if ($mensaje == "no") {
            ?> <script type="text/javascript">alertify.error('El registro no se elimino ni se dio de baja');</script> <?php
        }
    }
?>
</html>