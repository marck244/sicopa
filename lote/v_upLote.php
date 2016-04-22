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
        source: 'autolote.php'
    });
    });
    </script>



    <!-- script validacion entrada solo numero INICIO -->
     <script type="text/javascript">
      <!--
      function solonumeros(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
   </script>
   <!-- script validacion entrada solo numero FIN -->

   
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
            <H1>Lotes</H1>
            <h4>Lotes > Actualizar Lote</h4>
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
                        <span class=" navbar-brand">Menu Lotes</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_nwLote">Agregar Lote</a></li>
                                <li><a href="v_upLote">Actualizar Lote</a></li>
                                <li><a href="v_dlLote">Eliminar Lote</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Actualizar Lote</legend>


  <div class="jumbotron">
                <form class="form-horizontal" action="m_llenarformLote.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Lote :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Ingresar Codigo de Lote"  pattern="[A-Za-z]{1}[0-9]{4}" title="Ingresa primer digito letra mayuscula o minuscula y los restantes numeros Maximo digitos permitidos 5" required>
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
                if (empty($_GET['id'])) {

        $id="";

         if (empty($_GET['idlotificacion']))
         {
                $idlotificacion="";
         }
         if (empty($_GET['nombrelotificacion'])) {

            $nombrelotificacion="";
             # code...
         }
         if(empty($_GET['idpoligono']))
         {
                $idpoligono="";
         }

         if(empty($_GET['numpoligono']))
         {
                $numpoligono="";
         }
         if(empty($_GET['extension']))
         {
                $extension="";
         }
         if(empty($_GET['precio']))
         {
                 $precio="";
         }
         if(empty($_GET['extra']))
         {
                 $extra="";
         }
        
        
        
       
        
        
    }
    else
    {   
         $id=$_GET['id'];
        $idlotificacion=$_GET['idlotificacion'];

        $idpoligono=$_GET['idpoligono'];

        $numpoligono=$_GET['numpoligono'];

        $extension=TRIM($_GET['extension']);
        $precio=$_GET['precio'];
        $extra=$_GET['extra'];
        $nombrelotificacion=$_GET['nombrelotificacion'];

        $user=$_SESSION["loginUser-name"];

        ?>

        <div class="col-15 col-sm-12 col-md-12 col-lg-13">
                    <fielset>
                        
                       <form action="m_upLote.php" method="POST" class="form-horizontal">
                       <input type="hidden" name="user" class="form-control" value="<?php echo $user; ?>" >
                        <div class="form-group">
                            <label for="Id Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Codigo/Lote :</label>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                
                                             <input type="name" name="codigo" class="form-control" readonly="true" value="<?php echo $id; ?>"  placeholder="Codigo de Lote">
                            </div>
                        </div>
                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Extension:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="extension" class="form-control" value="<?php echo $extension; ?>" placeholder="Metros cuadrados" onkeypress="return solonumeros(event)" title="Ingresar solo numeros y no dejar campo vacio" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Precio lote :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" class="form-control" name="precio" value="<?php echo $precio; ?>" placeholder="valor de el lote"  onkeypress="return solonumeros(event)" title="Ingresar solo numeros y no dejar campo vacio" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotificacion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolotificacion" class="form-control" required title="Debe seleccionar una Lotificacion">
                 <option value="<?php echo $idlotificacion; ?>" selected=""><?php echo $nombrelotificacion; ?></option>
                  <?php 
            include("../conexion/conexion.php");
            $sql=$conn->query("SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion WHERE LOTIFICACION_ID <> $idlotificacion");
            while ($row=$sql->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['LOTIFICACION_ID'];?>" ><?php echo $row['LOTIFICACION_NOMBRE']; ?></option>
                <?php
            }
           
            ?>
             </select>
         </div>
     </div>

    <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Poligono :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbopoligono" class="form-control" required title="Debe seleccionar un poligono">
                 <option value="<?php echo $idpoligono; ?>" selected=""><?php echo $numpoligono; ?></option>
                    <?php 
            
            $sql=$conn->query("SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono WHERE POLIGONO_ID <> $idpoligono");
            while ($row=$sql->fetch_assoc()) {
                ?>
                <option value="<?php echo $row['POLIGONO_ID'];?>" ><?php echo $row['POLIGONO_NUM']; ?></option>
                <?php
            }
           
            ?>
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Detalles Extra :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <textarea class="form-control" name="detalles" rows="3" placeholder="Ingresa una descripcion sobre este lote"><?php echo $extra; ?></textarea>
         </div>
     </div>
     


     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-1 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Actualizar Lote</button>
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


<?php
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

    if (empty($_GET['vacio'])) {
        $mensaje="";
    }
    else
    {   
        $mensaje=$_GET['vacio'];
        if ($mensaje=="si") {
            ?> <script type="text/javascript">alertify.error("No se encontro ningun registro asociado a ese Lote");</script> <?php
        }
    
    }

    ?>
</body>
</html>