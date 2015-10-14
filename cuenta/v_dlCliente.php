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
                        <li ><a href="../" class="glyphicon glyphicon-home" ></a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="v_nwCliente" class="glyphicon glyphicon-user"> Clientes</a></li>
                                <li><a href="v_nwCuenta" class="glyphicon glyphicon-list-alt"> Cuentas</a></li>
                                <li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> Pagos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tower"> Lotificaciones</a></li>
                                <li><a href="../lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> Lotes</a></li>
                            </ul>
                        </li>
                        
                              <li><a href="../impuestos/v_nwImpuestos" class="glyphicon glyphicon-book"> IMPUESTO</a></li>
                        <li><a href="#" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        

                             <li class="dropdown">
                            <a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>
                                <li><a href="../user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>
                            </ul>
                        </li>

                        <li ><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>
                    </ul>

                </div>


            </div><!-- Container Fluid-->
        </nav>
        <div class="mr-infobar hidden-xs">
            Bienvenido: <strong>Marvin Segura</strong> Hora: <strong>02:00 AM</strong>
        </div>
        <!-- FIN Nuevo Nav Bar-->

        <div class="container">
            <H1>Clientes</H1>
            <h4>Clientes > Eliminar/Cambio de Estado de  Clientes</h4>
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
                        <span class="visible-xs navbar-brand">Menu Clientes</span>
                    </div>
                    <div class="navbar-collapse collapse sidebar-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="v_nwCliente">Agregar Clientes</a></li>
                            <li><a href="v_upCliente">Actualizar Clientes</a></li>
                            <li><a href="v_dlCliente">Eliminar Clientes</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
            <fielset>
                <legend>Eliminacion de Clientes</legend>


                <div class="jumbotron">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-3 hidden-xs">Cliente :</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre de Cliente">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Clientes Registrados en <strong>SICOPA</strong></div>
  <!-- Table -->
  <div class="table-responsive">
    <table class="table table-hover text-center">
     <tr>
        <th>DUI</th>
    <th>Nombre</th>
    <th>Apellido</th>      
    <th>NIT</th>
    <th>Eliminar</th>
     </tr>

     <tr>
      <td>0000000</td>
      <td>Jairo</td>
      <td>Ernesto</td>
      <td>0000000</td>
      <td><a href="#" class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#inicioModal"></a></td>
    </tr>
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
                    <h4 class="modal-title">Eliminacion de Cliente</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">Codigo De Cliente</label>
                            <input type="text" value="000000000" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Nombre: </label>
                            <p class="form-control-static">Jairo Ernesto Velasquez</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="../js/vendor/bootstrap.min.js"></script>

<script src="../js/main.js"></script>
</body>
</html>