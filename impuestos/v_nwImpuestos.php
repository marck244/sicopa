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

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="../alertify/alertify.min.js"></script>
    <script type="text/javascript">
    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
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
            <h4>Impuestos > Agregar Nuevo Impuesto</h4>
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
                                <li><a href="v_nwImpuestos">Agregar Impuesto</a></li>
                                <li><a href="v_upImpuesto">Actualizar Impuesto</a></li>
                                <li><a href="v_dlImpuesto">Eliminar Impuesto</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Registro de un nuevo Impuesto</legend>
                       <form action="m_nwImpuestos.php" method="POST" class="form-horizontal" autocomplete="off">
                        
                  
                       <input type="hidden" name="user" value="<?php echo $_SESSION["loginUser-name"]; ?>">

                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Valor INTERES:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="valorinteres" class="form-control" placeholder="Valor interes del impuesto" title="Ingreso de solo numeros y no dejar campo vacio" onkeypress="return numeros(event)" required>
         </div>
     </div>

     <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Valor IVA:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="valoriva" class="form-control" placeholder="Valor iva del impuesto" title="Ingreso de solo numeros y no dejar campo vacio" onkeypress="return numeros(event)" required>
         </div>
     </div>
    
     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Descripcion Impuesto :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <textarea name="descripcion"  class="form-control" pattern="[/^\w+$/]{10,100}" title="No poner un minimo descripcion de 10 caracteres y ingresar un maximo de 100 no se permiten caracteres especiales @!" rows="3" placeholder="Ingresa una descripcion del impuesto" required></textarea>
         </div>
     </div>

   
     



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-2 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Registrar Impuesto</button>
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
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="../js/vendor/bootstrap.min.js"></script>

<script src="../js/main.js"></script>
</body>
<?php
if (empty($_GET['guardado'])) {
        $guardado="";
    }
    else
    {   
        $guardado=$_GET['guardado'];
        if($guardado=="si")
    {
            

        ?> <script type="text/javascript"> alertify.success("El registro del impuesto se efectuo exitosamente");</script>  <?php 
    }
    if ($guardado== "no") {
        ?> <script type="text/javascript">alertify.error("Error: no se pudo efectuar el registro del impuesto");</script>  <?php 
    }
    }
?>
</html>