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

    <!--<script>
$(function() {
    $( "#busqueda" ).autocomplete({
        source: 'autocuenta.php'
    });
});
</script>-->
<script type="text/javascript">
    function suggest(inputString){
        if(inputString.length == 0) {
            $('#suggestions').fadeOut();
        } else {
        $('#busqueda').addClass('load');
            $.post("autocuentao.php", {queryString: ""+inputString+""}, function(data){
                if(data.length >0) {
                    $('#suggestions').fadeIn();
                    $('#suggestionsList').html(data);
                    $('#busqueda').removeClass('load');
                }
            });
        }
    }

    function fill(thisValue) {
        $('#busqueda').val(thisValue);
        setTimeout("$('#suggestions').fadeOut();", 600);
    }

</script>

     <script type="text/javascript">

    function valida () {
        
        var busqueda= document.getElementById("busq");

        if (busqueda.value=='') {
            alertify.warning("No ha digitado nada en la caja de busqueda por favor ingrese un numero de DUI");
            return false;
        }
        return true;


    }

    </script>

     <script type="text/javascript" >
      $(document).ready(function() {
      // Parametros para el combo
       $("#cbolotificacion").change(function () {
          $("#cbolotificacion option:selected").each(function () {
            elegido=$(this).val();
            $.post("cbolotes.php", { elegido: elegido }, function(data){
            $("#cbolote").html(data);
          });     
         });
       });    
    });
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
                <form class="form-horizontal" method="POST" action="m_llenarformCuenta.php" onsubmit="return valida();" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Cliente :</label>
                            <div class="input-group">
                                <!--<input  name="busqueda" id="busqueda" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" type="text" class="form-control" placeholder="Ingresa un numero de Dui">-->
                                <input id="busqueda" name="busqueda"  onblur="fill();" class="form-control" type="text" maxlength="9" onkeyup="suggest(this.value);" placeholder="00000000-0" autocomplete="off" />
                                   
<div id="suggestions" class="suggestionsBox" style="display: none;">
 <img style="position: relative; top: -12px; left: 30px;" src="arrow.png" alt="upArrow" />
<div id="suggestionsList" class="suggestionList"></div>
</div>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>



                    </fielset>
                </div>
                </div>

                <?php
                    

                      if (empty($_GET['dui'])) {

        $duicliente="";
        if (empty($_GET['cuenta'])) {
        $cuenta="";
        }

        if (empty($_GET['nombrecliente'])) {
        $cliente="";
        }

      if (empty($_GET['impuesto_id'])) {
        $impuesto_id="";
        }

        if (empty($_GET['impuesto_nombre'])) {
        $impuesto_nombre="";
        }

        if (empty($_GET['cuenta_estados_id'])) {
        $cuenta_estados_id="";
        }

        if (empty($_GET['cuenta_estados_nombre'])) {
        $cuenta_estados_nombre="";
         }  

        if (empty($_GET['lotificacion_id'])) {
        $lotificacion_id="";
        }

        if (empty($_GET['lotificacion_nombre'])) {
            $lotificacion_nombre="";
        }

        if (empty($_GET['lote_id'])) {
            $lote_id="";
        }

        if (empty($_GET['plazo'])) {
            $plazo="";
        }

       
  
    }
    else
    {   
        $user=$_SESSION["loginUser-name"];
        $duicliente=$_GET['dui'];
        $cuenta=$_GET['cuenta'];
        $cliente=$_GET['nombrecliente'];
        $impuesto_id=$_GET['impuesto_id'];
        $impuesto_nombre=$_GET['impuesto_nombre'];
        $cuenta_estados_id=$_GET['cuenta_estados_id'];
        $cuenta_estados_nombre=TRIM($_GET['cuenta_estados_nombre']);
        $lotificacion_id=$_GET['lotificacion_id'];
        $lotificacion_nombre=$_GET['lotificacion_nombre'];
        $lote_id=$_GET['lote_id'];
        $plazo=$_GET['plazo'];
        

        ?>
<div class="col-15 col-sm-12 col-md-12 col-lg-13">
                    <fielset>
                        
                      <form action="m_upCuenta.php" class="form-horizontal" method="POST" autocomplete="off">
                      <input type="hidden" name="id" value="<?php echo $cuenta; ?>">
                      <input type="hidden" name="user" value="<?php echo $user; ?>">

                        <div class="form-group">
                            <label for="Id Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Dui :</label>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                
                        <input type="name" name="duicliente" id="duicliente" class="form-control"  value="<?php echo $duicliente;  ?>" readonly>
                            </div>
                        </div>
                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre/cliente:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="nombre" class="form-control" placeholder="Ingrese Un Cliente" disabled="true" value="<?php echo $cliente; ?>">
         </div>
     </div>
     <div class="form-group">
         <label for="inputImpuesto" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Impuesto :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboimpuesto" class="form-control">
                <option>Seleccione</option>
                <option value="<?php echo $impuesto_id; ?>" selected="selected"><?php echo $impuesto_nombre; ?></option>
                  <?php 
            include("../conexion/conexion.php");
            $sql6=$conn->query("SELECT IMPUESTO_ID,IMPUESTO_DESCRIPCION FROM impuesto WHERE IMPUESTO_ID <> $impuesto_id");
            while ($row6=$sql6->fetch_assoc()) {
                ?>
                <option value="<?php echo $row6['IMPUESTO_ID'];?>" ><?php echo $row6['IMPUESTO_DESCRIPCION']; ?></option>
                <?php
            }
           
            ?>
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputEstadoCuenta" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Estado/Cuenta :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboestado" class="form-control">
             
                <option value="<?php echo $cuenta_estados_id; ?>" selected="selected"><?php echo $cuenta_estados_nombre; ?></option>
                
                    <?php 
            
            $sql=$conn->query("SELECT CUENTA_ESTADOS_ID,CUENTA_ESTADOS_NOMBRE FROM cuenta_estados WHERE CUENTA_ESTADOS_ID <> $cuenta_estados_id");
            while ($row=$sql->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['CUENTA_ESTADOS_ID'];?>" ><?php echo $row['CUENTA_ESTADOS_NOMBRE']; ?></option>
                <?php
            }
           
            ?>
                
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputLotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotificacion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolotificacion" id="cbolotificacion" class="form-control">
                <option value="<?php echo $lotificacion_id; ?>" selected="selected"><?php echo $lotificacion_nombre; ?></option>
                   <?php 
            
            $sql1=$conn->query("SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID <> $lotificacion_id");
            while ($row1=$sql1->fetch_assoc()) {
                ?>
                <option value="<?php echo $row1['LOTIFICACION_ID'];?>" ><?php echo $row1['LOTIFICACION_NOMBRE']; ?></option>
                <?php
            }
           
            ?>
              
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputLotes" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotes :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolote" id="cbolote" class="form-control">
                <option value="<?php echo $lote_id; ?>" selected="selected"><?php echo $lote_id; ?></option>
                   <?php 
           
            $sql2=$conn->query("SELECT LOTE_ID,LOTIFICACION_ID FROM lote WHERE LOTIFICACION_ID='$lotificacion_id' AND LOTE_ESTADO='LIBRE' AND LOTE_ID <> '$lote_id'  ");
            while ($row2=$sql2->fetch_assoc()) {
                ?>
                <option value="<?php echo $row2['LOTE_ID'];?>" ><?php echo $row2['LOTE_ID']; ?></option>
                <?php
            }
           
            ?>
             </select>
         </div>
     </div>
     <?php 
     $sql3=$conn->query("SELECT CUENTA_ID FROM cuenta_pagos WHERE CUENTA_ID='$cuenta' ");
     $numrow=$sql3->num_rows;
     if ($numrow > 0) {
         ?>



         <?php
     }

     else
     {
        ?>
         <div class="form-group">
         <label for="inputCuentaPrima" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta/prima :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" name="prima" class="form-control" placeholder="Valor de Prima">
         </div>
     </div>

      <div class="form-group">
         <label for="inputCuentaPrima" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Numero Recibo :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" name="recibo" id="recibo" class="form-control" placeholder="numero recibo">
         </div>
     </div>
        <?php
     }
     ?>
    

     <div class="form-group">
         <label for="inputCuentaPlazo" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta /plazo :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" class="form-control" name="plazo" placeholder="Plazo de pago(dias)" value="<?php echo $plazo; ?>">
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

                <?php
            }

            ?>

      

        </div>




<center>
    <footer>
        <p>&copy; SICOPA 2015</p>
    </footer>
</center>
</div> <!-- /container -->        




<script src="../js/main.js"></script>

<?php
if (empty($_GET['vacio'])) {
        $mensaje="";
    }
    else
    {   
        $mensaje=$_GET['vacio'];
        if ($mensaje=="si") {
            ?> <script type="text/javascript">alertify.error("No se encontro ningun registro asociado a ese numero de Dui");</script> <?php
        }
    
    }


if (empty($_GET['actualizo'])) {
        $mensaje="";
    }
    else
    {   
        $mensaje=$_GET['actualizo'];
        if ($mensaje=="si") {
            ?> <script type="text/javascript">alertify.success("Registro actualizado exitosamente");</script> <?php
        }
        if ($mensaje=="no") {
            ?> <script type="text/javascript">alertify.error("Registro No se actualizo");</script> <?php
        }
    }

    ?>
</body>
</html>
