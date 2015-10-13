<?php
session_start();
$error = 0;
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    header("Location: ../");
}else{
    if (isset($_POST["nick"])) {
        # code...
        require("../conexion/conexion.php");
         $id=$_POST["nick"];
         $pass=$_POST["pass"];
         $pass5 = md5(md5($pass));
         $sql = "SELECT * FROM usuario WHERE USER_NICK = '".$id."' AND USER_CONTRASENA = '".$pass5."' ";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION["loginUser-name"] = $id;
                header("Location: v_login.php");
            }
        } else {
            $error=1;
        }
        $conn->close();
    }
   
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

        <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
        <script>
            setTimeout(function() {
                $("#login-error").slideDown(500);
                }, 200);
            setTimeout(function() {
                $("#login-error").slideUp(500);
                }, 5000);
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header class="mr-login">
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
            </div><!-- Container Fluid-->
        </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container color-white mr-login-background">
            <h1>
                Bienvenido a <strong>SICOPA</strong>.
            </h1>
            <h3>Para poder ingresar al sistema, ud debe de estar registrado.
                De no estarlo, pedir al adminstrador que le de las credenciales
                respectivas. 
            </h3>
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-3 col-lg-6 col-lg-offset-4">
                <?php if ($error==1) {?>
                <div id="login-error" class="form-group" style="display: none;">
                            <div class="alert alert-danger" role="alert">
                              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                              <span class="sr-only">Error:</span>
                              Nombre de Usuario y Contraseña no coindicen!
                          </div>
                </div>
                <?php } ?>
                <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label for="usuario" class="col-sm-2">Usuario</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" name="nick" placeholder="Ejemplo: Loren.Guitierrez" class="form-control" pattern="[A-Za-z.]{4,}" title="Ejemplo Loren.Guitierrez. No puede poner numeros ni simbolos especiales" required>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="pass" class="col-sm-2">Contraseña</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="password" name="pass" placeholder="Contraseña" class="form-control" pattern="[A-Za-z0-9]{4,}" title="No se admiten simbolos especiales. Solo letras y numeros." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-primary">
                                    Entrar
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
            
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        </header>
        <center>
      <footer>
        <p>&copy; SICOPA 2015</p>
      </footer>
      </center>

        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="../js/vendor/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>