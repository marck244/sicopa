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
        
        var busqueda= document.getElementById("busqueda");

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
            <h4>Cuentas > Estados de Cuenta</h4>
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
                        <span class="navbar-brand">Menu Estados</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                         <ul class="nav navbar-nav">
                            <li><a href="v_EstadoCuentas">Clientes Morosos</a></li>
                            
                            
                            </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
            <fielset>
                <legend>Cambios De Estados De Cuenta</legend>


                  <div class="jumbotron">
                <form class="form-horizontal" method="POST"  action="" onsubmit="return valida()" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-4 hidden-xs">Numero DUI :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" id="busqueda" data-provide="typeahead" placeholder="Ingresa un numero de Dui">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" name="buscar" type="submit">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Cuentas Registradas En <strong>SICOPA</strong> Que Entran En <strong>MORA</strong></div>
  <!-- Table -->
  <?php 
  if (isset($_POST["buscar"])) {

  	include("../conexion/conexion.php");
         $busqueda=trim(str_replace("-","",$_POST["busqueda"]));
        
         $fechaactual=date("Y-m-d");
         $query=$conn->query("SELECT CUENTA_ID,CLIENTE_ID,LOTE_ID FROM cuenta WHERE CLIENTE_ID='$busqueda'");

         $resultado=$query->num_rows;


         if ($resultado > 0) {
         	
      
     

  	?>
  	<div class="table-responsive">
    <table class="table table-hover text-center">
         <table class="table table-hover text-center">

        
   
      <?php 
        while($row=$query->fetch_assoc()) { 
        
         

         

      	 

         $cuenta_id= $row['CUENTA_ID'];
       	 $lote=$row['LOTE_ID'];
         
         $query1=$conn->query("SELECT DATEDIFF('$fechaactual',CUENTA_PAGOS_FECHA) as MORA_DIAS FROM cuenta_pagos WHERE CUENTA_ID='$cuenta_id'");
         $ndias=$query1->fetch_assoc();
         $mora=$ndias['MORA_DIAS'];
         
         $query9=$conn->query("SELECT CUENTA_PAGOS_ID FROM cuenta_pagos WHERE CUENTA_ID='$cuenta_id'");
         $cuenta_pago=$query9->fetch_assoc();
         

         $cuenta_pagos=$cuenta_pago['CUENTA_PAGOS_ID'];

         $queryfech=$conn->query("SELECT CUENTA_PAGOS_FECHA FROM cuenta_pagos WHERE CUENTA_ID='$cuenta_id'");
         $rowfech=$queryfech->fetch_assoc();
         $fechapago=date("d-m-Y",strtotime($rowfech['CUENTA_PAGOS_FECHA']));

         $queryclien=$conn->query("SELECT CLIENTE_ID,CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$busqueda'");
         $rowclien=$queryclien->fetch_assoc();

         $duis=$rowclien['CLIENTE_ID'];
         $cliente=$rowclien['CLIENTE_NOMBRE']." ".$rowclien['CLIENTE_APELLIDO'];
         
        
         if ($mora > 60) {
         	?>
         	  <tr>
        <th>Codigo Cuenta De Pago</th>
        <th>Dui</th>
    <th>Cliente</th>     
    <th>Lote Adquirido</th>
    <th>Ultima Fecha De Pago</th>
    <th>Dias Mora Hasta El Dia De Hoy</th>
    
    <th>Recuperar Lote</th>

     </tr>

     <tr>
         	<?php
         	
         
         	     
         ?>
      <td><?php echo $cuenta_id; ?></td>
      <td><?php echo $duis;?></td>
      <td><?php echo $cliente;?></td>
      <td><?php echo $lote;?></td>
      <td><?php echo $fechapago;?></td>
      <td><?php echo $mora." dias";?></td>
      
      
      
      <td><a href="#" class="glyphicon glyphicon-trash" id="" data-toggle="modal" data-target="#inicioModal"></a></td>
     
    </tr>
     <?php  
 
      }

      else{
        ?> <script type="text/javascript">alertify.success("<?php echo 'la cuenta de pago '.$cuenta_id.' y el lote '.$lote.' no estan en mora'; ?>");</script> <?php
      } 
     
    }

      ?>
  </table>
         <?php
    }

    else
    {
        
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

  ?>
  </table>
</div>
  	<?php
  	
  }
  else
  {

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
                    <h4 class="modal-title">Recuperar Lote</h4>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                            <label for="idloti">Codigo De Cuenta De Pagos</label>
                            <input type="text" value="<?php echo $cuenta_id; ?>" class="form-control" disabled>
                        </div>
                    	<div class="form-group">
                            <label for="idloti">Codigo De Cuenta</label>
                            <input type="text" value="<?php echo $cuenta_pagos; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="idloti">Codigo De Cliente</label>
                            <input type="text" value="<?php echo $duis; ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Lote: </label>
                            <p class="form-control-static"><?php echo $lote; ?></p>
                        </div>
                    </form>
                    <p><strong> NOTA:</strong> Estas tratando de recuperar el lote asociado a la cuenta de pagos y el cliente por lo tanto se anulara todo proceso de pago que tiene actualmente el cliente con ese lote </p>
                         <div class="modal-footer">
                    <a href="m_RecuperarLote.php?id_pago=<?php echo $cuenta_pagos; ?>&id_cuenta=<?php echo $cuenta_id; ?>&lote=<?php echo $lote; ?>" class="btn btn-primary" id="eliminar" onclick="">Aceptar</a>
                    <button class="btn btn-default" onclick="cancelareliminar();" data-dismiss="modal">Cancelar</button>
                </div> 
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