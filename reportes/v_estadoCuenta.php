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
    function buscarHistorial(cuenta){
      xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("tablaCuenta").innerHTML = xhttp.responseText;
            }
        }
        xhttp.open("GET", "m_estadoCuenta.php?cuenta="+cuenta, true);
        xhttp.send();
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
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="../" class="glyphicon glyphicon-home" ></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> Clientes</a></li>
                                <li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> Cuentas</a></li>
                                <li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> Pagos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> Lotificaciones</a></li>
                                <li><a href="../lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> Lotes</a></li>
                            </ul>
                        </li>
                        
                              <li><a href="../impuestos/v_nwImpuestos" class="glyphicon glyphicon-book"> IMPUESTO</a></li>
                                                <li class="active"><a href="v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        

                             <li class="dropdown">
                            <a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>
                                <li><a href="../user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>
                                <li><a href="../profesion/v_nwProfesion" class="glyphicon glyphicon-certificate"> PROFESIONES</a></li>
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
            <H1>Reportes</H1>
            <h4>Reportes > Estado de Cuenta</h4>
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
                        <span class="visible-xs navbar-brand">Menu Reportes</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_estadoCuenta">Estado de Cuentas</a></li>
                                <li><a href="v_listadoCuentas">Listado de Estado de Cuentas</a></li>
                                <li><a href="v_bitacora">Bitacora de SICOPA</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Estado de Cuenta</legend>
                        <div class="jumbotron">
                            <form class="form-horizontal" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="lotiname" class="control-label col-sm-4 hidden-xs">DUI Cliente</label>
                                        <div class="input-group col-sm-8">
                                            <input type="text" name="dui" id="dui" class="form-control" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" pattern="[0-9-]{10}" title="Solo se aceptan numeros. No letras." placeholder="00000000-0" required>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Buscar!</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </fielset>
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Estado de Cuenta de <strong>Jacinto Ordoñez</strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover text-center">
                            <tr>
                              <th>Cuenta</th>
                              <th>Fecha</th>
                              <th>Capital</th>
                              <th>Prima</th>
                              <th>Interes</th>
                              <th>IVA</th>
                              <th>Credito Total</th>
                              <th>C.C</th>
                              <th>C.Interes</th>
                              <th>C.IVA</th>
                              <th>T. Cuota</th>
                              <th>Estado</th>
                              <th></th>
                            </tr>
                            <tr>
                              <td>2 <input type="hidden" value="2" id="cuenta1"></td>
                              <td>2015/01/05</td>
                              <td>$6,000</td>
                              <td>$100</td>
                              <td>$900</td>
                              <td>$897.00</td>
                              <td>$7,797</td>
                              <td>$50.00</td>
                              <td>$7.50</td>
                              <td>$7.48</td>
                              <td>$64.98</td>
                              <td>VIGENTE</td>
                              <td><a href="#" class="glyphicon glyphicon-search mr-glyphicon-2" onclick="buscarHistorial(cuenta1.value)"></a></td>
                            </tr>
                            <tr>
                              <td>38 <input type="hidden" value="38" id="cuenta2"></td>
                              <td>2015/04/24</td>
                              <td>$4,000</td>
                              <td>$200</td>
                              <td>$600</td>
                              <td>$520</td>
                              <td>$5,120</td>
                              <td>$33.33</td>
                              <td>$5.00</td>
                              <td>$4.33</td>
                              <td>$42.67</td>
                              <td>CANCELADA</td>
                              <td><a href="#" class="glyphicon glyphicon-search mr-glyphicon-2" onclick="buscarHistorial(cuenta2.value)"></a></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><span class="glyphicon glyphicon-print mr-glyphicon-2"></span> Estado/Historial de Cuenta</div>                        
                        <!-- Table -->
                        <div class="table-responsive" id="tablaCuenta">
                          
                        </div>
                        </div>  
                      </div><!-- row 2-->
                </div><!-- ROW-->
        </div><!-- container-->








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

