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
    $( "#dui" ).autocomplete({
        source: 'autocliente.php'
    });
});
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

<script type="text/javascript">
    function simulador()
    {
      var dui = document.getElementById("dui");
      var impuesto = document.getElementById("cboimpuesto");
      var lote = document.getElementById("cbolote");
      var prima = document.getElementById("prima");
      var plazo = document.getElementById("plazo");
      
       if (dui.value=='') {

            alertify.warning('No puede dejar el campo DUI vacio');
            dui.focus();
            

        }
        else if (impuesto.value=='') {

            alertify.warning('No puede dejar el campo Impuesto vacio');
            impuesto.focus();
            

        }
        

        else if (lote.value=='0') {
            alertify.warning('No puede dejar el campo Lote vacio selecciona una lotificacion para elegir un Lote');
            lote.focus();
          
        }

       
        else if (plazo.value=='') {
            alertify.warning('No puede dejar el campo Plazo vacio');
            plazo.focus();
           
        }
       

        else
        {
            window.open("v_Simulador.php?dui="+dui.value+"&impuesto="+impuesto.value+"&lote="+lote.value+"&prima="+prima.value+"&plazo="+plazo.value+"");
        }

        

    }

</script>


 <!-- script no dejar campos vacios en el formulario INICIO-->

   <script type="text/javascript">

   function validar(){

        var campodui= document.getElementById("dui");
        var campoimpuesto= document.getElementById("cboimpuesto");
        var campoestado= document.getElementById("cboestado");
        var campolotificacion= document.getElementById("cbolotificacion");
        var campolote= document.getElementById("cbolote");
        
        
        var campoplazo= document.getElementById("plazo");

        if (campodui.value=='') {

            alertify.warning('No puede dejar el campo DUI vacio');
            campodui.focus();
            return false

        }
        if (campoimpuesto.value=='') {

            alertify.warning('No puede dejar el campo Impuesto vacio');
            campoimpuesto.focus();
            return false;

        }
        if (campoestado.value=='') {
            alertify.warning('No puede dejar el campo Estado vacio');
            campoestado.focus();
            return false;
        }

        if (campolotificacion.value=='0') {
            alertify.warning('No puede dejar el campo Lotificacion vacio');
            campolotificacion.focus();
            return false;
        }

          if (campolote.value=='0') {
            alertify.warning('No puede dejar el campo Lote vacio');
            campolote.focus();
            return false;
        }

       
        if (campoplazo.value=='') {
            alertify.warning('No puede dejar el campo Plazo vacio');
            campoplazo.focus();
            return false;
        }



    return true;        

   }

   </script>

  <!--script no dejar campos vacios en el formulario FIN -->

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
            <h4>Cuentas > Agregar Nueva Cuenta</h4>
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
                        <legend>Registro de una nueva cuenta</legend>
                       <form action="m_nwCuenta.php" method="POST" class="form-horizontal" onsubmit="return validar()" autocomplete="off">
                       <?php $user=$_SESSION["loginUser-name"]; ?>
                            <input type="hidden" name="user" value="<?php echo $user; ?>">
                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Dui Cliente:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" class="form-control" name="dui" id="dui" placeholder="Ingrese Un Dui">
         </div>
     </div>
     <div class="form-group">
         <label for="inputImpuesto" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Impuesto :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboimpuesto" id="cboimpuesto" class="form-control">
                <option value="">Seleccione</option>
                <?php 

                include("../conexion/conexion.php");
                $sql="SELECT IMPUESTO_ID,IMPUESTO_DESCRIPCION FROM impuesto";
                $query=$conn->query($sql);
                while ($row=$query->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['IMPUESTO_ID'];?>"><?php echo $row['IMPUESTO_DESCRIPCION']; ?></option>
                    <?php
                }

                ?>
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputEstadoCuenta" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Estado de Cuenta :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboestado" id="cboestado" class="form-control">
               <option value="">Seleccione</option>
                 <?php 

                
                $sqlestado="SELECT CUENTA_ESTADOS_ID,CUENTA_ESTADOS_NOMBRE FROM cuenta_estados";
                $queryestado=$conn->query($sqlestado);
                while ($rowestado=$queryestado->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $rowestado['CUENTA_ESTADOS_ID'];?>"><?php echo $rowestado['CUENTA_ESTADOS_NOMBRE']; ?></option>
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
                <option value="0">Seleccione</option>
                <?php 

                
                $sqlloti="SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion";
                $queryloti=$conn->query($sqlloti);
                while ($rowloti=$queryloti->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $rowloti['LOTIFICACION_ID'];?>"><?php echo $rowloti['LOTIFICACION_NOMBRE']; ?></option>
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
                <option value="0">Seleccione</option>
                
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputCuentaPrima" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta de prima :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" name="prima" id="prima" class="form-control" placeholder="Valor de Prima">
         </div>
     </div>
     <div class="form-group">
         <label for="inputCuentaPrima" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Numero Recibo :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" name="recibo" id="recibo" class="form-control" placeholder="Valor de Prima">
         </div>
     </div>

     <div class="form-group">
         <label for="inputCuentaPlazo" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Cuenta de plazo :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="number" name="plazo" id="plazo" class="form-control" placeholder="Plazo de pago(dias)">
         </div>
     </div>


      


     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-2 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Registrar Cuenta</button>
         </div>

         <div class="col-xs-12 col-sm-1 col-sm-offset-0">
             <button type="button" name="simular" class="btn btn-primary" onclick="simulador();" >Simular Proceso</button>
         </div>


         </center>
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

</body>
<?php
if (empty($_GET['guardado'])) {
        $mensaje="";
    }
    else
    {
        $mensaje=$_GET['guardado'];
    if($mensaje=="si")
    {
            

        ?> <script type="text/javascript"> alertify.success("El registro se efectuo exitosamente");</script>  <?php 
    }
    if ($mensaje== "no") {
        ?> <script type="text/javascript">alertify.error("Error: no se pudo efectuar el registro");</script>  <?php 
    }
}
?>
</html>
