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
            <h4>Usuarios > Agregar Nuevo Usuario</h4>
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
                        <legend>Registro de un nuevo Usuario</legend>
                       <form action="m_nwUsuario.php" method="POST" class="form-horizontal" onsubmit="return checkForm(this)" autocomplete="off">
                       <input type="hidden" name="user" value="<?php echo $_SESSION["loginUser-name"]; ?>">
                        
                    <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nickname :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="text" class="form-control" name="username" placeholder="Usuario Nickname" pattern="[a-zA-Z\.]{8,25}" title="El campo Nickname debe contener un minimo de 8 Caracteres y como maximo 25 Caracteres" required>
         </div>
     </div>


                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="nombre" class="form-control" placeholder="Nombre del Usuario" pattern="[a-zA-Z ]{4,25}" title="El campo Nombre debe contener un minimo de 4 caracteres y como maximo 25 caracteres" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Apellido:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="apellido" class="form-control" placeholder="Apellido del Usuario" pattern="[a-zA-Z ]{4,25}" title="El campo Apellido debe contener un minimo de 4 caracteres y como maximo 25 caracteres" required>
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Contraseña:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="password" name="pwd1" class="form-control"  placeholder="*********">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Repetir Contraseña:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="password" name="pwd2" class="form-control"  placeholder="*********">
         </div>
     </div>

    <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nivel de Acceso :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbonivelacceso" class="form-control">
                 <option value="2">Gerencia General</option>
                 <option value="3">Administrativo General</option>
                 <option value="4">Operador del Sistema</option>
             </select>
         </div>
     </div>
     



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-2 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Registrar Usuario</button>
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
if (empty($_GET['duplicado'])) {
        $duplicado="";
    }
    else
    {   
        $duplicado=$_GET['duplicado'];
        if($duplicado=="si"){

            ?> <script type="text/javascript">alertify.error('Error: el Nickname ingresado ya existe');</script> <?php

        }
    }


    if (empty($_GET['guardado'])) {
        $guardado="";
    }
    else
    {   
        $guardado=$_GET['guardado'];
        if($guardado=="si"){

            ?> <script type="text/javascript">alertify.success('El Usuario se ha ingresado exitosamente');</script> <?php

        }

        if($guardado == "no")
        {
            ?> <script type="text/javascript">alertify.error('Error: El Usuario no se pudo guardar');</script> <?php
        }
    }
?>
</html>