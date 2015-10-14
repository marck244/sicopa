<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
}else{
    header("Location: user/v_login");
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

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="#" class="glyphicon glyphicon-home" ></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>
                                <li><a href="cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>
                                <li><a href="#" class="glyphicon glyphicon-usd"> PAGOS</a></li>
                            </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>
                                <li><a href="lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> LOTES</a></li>
                            </ul>
                            </li>
                            
                         <li><a href="reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        

                             <li class="dropdown">
                            <a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>
                                <li><a href="user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>
                                <li><a href="profesion/v_nwProfesion" class="glyphicon glyphicon-certificate"> PROFESIONES</a></li>
                                
                            </ul>
                        </li>

                        <li ><a href="user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>
                        </ul>

                    </div>


                </div><!-- Container Fluid-->
            </nav>
            <div class="mr-infobar hidden-xs">
                Bienvenido: <strong><?php echo $_SESSION["loginUser-name"];?></strong> Hora: <strong>02:00 AM</strong>
            </div>
            <!-- FIN Nuevo Nav Bar-->

            
            <div class="container mr-index color-white" >
                    <h1>Bienvenid@ a SICOPA</h1>
                <h3><strong>S</strong>istema <strong>I</strong>nformático para el <strong>Co</strong>ntrol de <strong>Pa</strong>gos.</h3>
           </div>

            <section>
                <br>
                <div class="container">
                <div class="row">
                    <div class="xs-12 col-sm-12 col-md-6">
                        <h3>Control de Clientes.</h3>
                        <p class="separate"></p>
                        <p class="mr-justificar">
                            Llevar el control de los clientes nunca fué mas facil. Con <strong>SICOPA</strong> usted puede llevar el control
                            de los usuarios, clientes, cuentas, pagos, historial de cuentas, listado de estados de cuenta y mas.
                            En el cual se vera reflejado las cuantas cuotas pagadas, el monto, interes e iva que tiene pendientes.
                        
                        </p>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-user mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Clientes</h4>
                                <p class="mr-justificar">
                                    Esta opcion hace nuevos clientes que deseen adquirir por primera vez un lote, 
                                    tambien hacer una busqueda de los clientes registrados en <strong class="color-blue-1">SICOPA</strong> 
                                    para verificar sus datos, actualiazar los datos o darle de baja, segun se requiera.
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-list-alt mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Cuentas</h4>
                                <p class="mr-justificar">
                                    Cuando un cliente esta registrado, en este seccion se puede vincular los lotes que desea adquirir. 
                                    Por cada lote que un cliente desse adquirir, se creara una cuenta que lleve el control.
                                    Puede buscar las cuentas de un cliente en espeficio para saber cuantas cuentas este posee y el estado de éstas.
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-usd mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Pagos</h4>
                                <p class="mr-justificar">
                                    Media vez el cliente se haya registrado, y creado una cuenta, el sistema podra hacer el cobro de la cuota
                                    que debe pagar, a que fecha, y sus impuestos a cobrar. 
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="xs-12 col-sm-12 col-md-6">
                        <h3>Reporteria y creacion de usuarios.</h3>
                        <p class="separate"></p>
                        <p class="mr-justificar">
                            El sistema ofrece reportes importantes de <strong>Historia de Pagos</strong> y el <strong>Calculo de Pago Mensual</strong>
                            para cada cliente, segun el gerente u operador lo solicite para una persona en especifico. 
                            Tambien creacion de usuarios para manipular el sistema, segun lo estime la gerencia, por si decide expandir y necesite mas 
                            emplead@s para cobrar las cuotas.
                        
                        </p>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-tower mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Lotificaciones</h4>
                                <p class="mr-justificar">
                                    Este sistema es tan robusto que no solo le puede llevar el control de los clientes de una lotificacion.
                                    Tambien puede agregar otra lotificacion, con clientes diferentes, y llevar el control de sus pagos de un forma sencilla
                                    y centralizada
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-tree-conifer mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Lotes</h4>
                                <p class="mr-justificar">
                                    Como es de esperar, esta opcion agregar todos los lotes a una lotificacion, si es que posee mas de una, y cual es el precio 
                                    vigente para este lote y darlo a la venta.
                                    Puede modificar su precio, solo si no hay nadie que ya este pagando.
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="pull-left">
                                <span class="glyphicon glyphicon-book mr-glyphicon-1 color-white bgcolor-blue-1"></span>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Control de Impuestos</h4>
                                <p class="mr-justificar">
                                    Ademas de poder llevar el control de todos las lotificaciones que posea, tambien se puede llevar
                                    el control de todos los impuestos o clausulas que estimen en los contratos.
                                    Dichos impuestos o clausulas tienen un trato especial en el sistema. Ud puede modificar sus percentajes o tarifas,
                                    pero solo el administrador de <strong>SICOPA</strong> puede agregar o quitar un impuesto, dado que hay que modificar
                                    la tabla del historial de pagos que el sistema ofrece en los reportes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            

          <center>
              <footer>
                <p>&copy; SICOPA 2015</p>
            </footer>
        </center>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
</body>
</html>

