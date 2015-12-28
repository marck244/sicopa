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

     <script type="text/javascript">

    function checkForm(form)
  {
    
    if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {

        if(form.pwd1.value.length > 25) {
        alertify.error("Error: la contraseña no debe tener un maximo de 25 caracteres!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value.length < 6) {
        alertify.error("Error: la contraseña debe tener un minimo de 6 caracteres!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd1.value == form.username.value) {
        alertify.error("Error: la contraseña debe ser diferente a el Nickname ingresado!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd1.value)) {
        alertify.error("Error: la contraseña debe contener al menos un numero!");
        form.pwd1.focus();
        return false;
      }
     
     
    } else {
      alertify.warning("Atencion: No dejes los campos de la contraseña vacios porfavor al confirmar la contraseña debe concordar!");
      form.pwd1.focus();
      return false;
    }

   
    return true;
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
            <h4>Usuarios > Actualizar Usuario</h4>
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
                                <li><a href="v_nwUsuario">Agregar Usuario</a></li>
                                <li><a href="v_upUsuario">Actualizar Usuario</a></li>
                                <li><a href="v_dlUsuario">Eliminar Usuario</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Actualizar Usuario</legend>


  <div class="jumbotron">
                <form class="form-horizontal" action="m_llenarformupUsuario.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Usuario :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="buscar" placeholder="Busqueda por Nickname" pattern="[a-zA-Z\.]{8,25}" title="El campo Nickname debe contener un minimo de 8 Caracteres y como maximo 25 Caracteres" required>
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
                if (empty($_GET['nick'])) {

        $nick="";

         if (empty($_GET['nombre']))
         {
                $nombre="";
         }
         if (empty($_GET['apellido'])) {

            $apellido="";
             # code...
         }
         if(empty($_GET['nivel']))
         {
                $nivel="";
         }


     }
     else
     {
        $nick=$_GET['nick'];
        $nombre=$_GET['nombre'];
        $apellido=$_GET['apellido'];
        $nivel=$_GET['nivel'];
     ?>
<div class="col-15 col-sm-12 col-md-12 col-lg-13">
                    <fielset>
                        
                       <form action="m_upUsuario.php" method="POST" class="form-horizontal" onsubmit="return checkForm(this);">
                     
              <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nickname :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="text" class="form-control" name="username" value="<?php echo $nick; ?>" placeholder="Usuario Nickname" pattern="[A-Za-z\.]{8,25}" title="El campo Nickname debe contener un minimo de 8 Caracteres y como maximo 25 Caracteres" required>
         </div>
     </div>
          
                          <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" class="form-control" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre del Usuario" pattern="[A-Za-z ]{4,25}" title="El campo Nombre debe contener un minimo de 4 caracteres y como maximo 25 caracteres" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Apellido:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" class="form-control" name="apellido" value="<?php echo $apellido; ?>" placeholder="Apellido del Usuario" pattern="[A-Za-z ]{4,25}" title="El campo Apellido debe contener un minimo de 4 caracteres y como maximo 25 caracteres" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Contraseña(Nueva):</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="password" name="pwd1" class="form-control" placeholder="*********">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Confirmar Contraseña(Nueva):</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="password" name="pwd2" class="form-control" placeholder="*********">
         </div>
     </div>

    <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nivel de Acceso :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbonivelacceso" class="form-control">

                    <?php if ($nivel=="1") {
                        ?>
                           <option value="1" selected="true">Administrador</option>
                 <option value="2">Gerencia</option>
                 <option value="3">Operador</option>
                 <?php
                    }
                    elseif ($nivel=="2") {
                        ?>
                          <option value="1" >Administrador</option>
                 <option value="2" selected="true">Gerencia</option>
                 <option value="3">Operador</option>
                 <?php
                    }
                    else{
                        ?>
                          <option value="1" >Administrador</option>
                 <option value="2" >Gerencia</option>
                 <option value="3" selected="true">Operador</option>
                 <?php
                    }

                     ?>
              
             </select>
         </div>
     </div>
                             


     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-1 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
         </div>
         </center>
     </div>
                    </form>
                    </fielset>
                </div>

                <?php } ?>



      

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

    ?>
</body>
</html>