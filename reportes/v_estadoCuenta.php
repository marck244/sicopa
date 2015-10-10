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
                        <li class="active"><a href="../" class="glyphicon glyphicon-home" ></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-user"> Clientes</a></li>
                                <li><a href="#" class="glyphicon glyphicon-list-alt"> Cuentas</a></li>
                                <li><a href="#" class="glyphicon glyphicon-usd"> Pagos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="glyphicon glyphicon-tower"> Lotificaciones</a></li>
                                <li><a href="#" class="glyphicon glyphicon-tree-conifer"> Lotes</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="#" class="glyphicon glyphicon-book"> IMPUESTO</a></li>
                        <li><a href="#" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        <li><a href="#" class="glyphicon glyphicon-cog"> SISTEMA</a></li>
                        <li ><a href="#" class="glyphicon glyphicon-off" > SALIR</a></li>
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
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Estado de Cuenta</legend>
                        <div class="jumbotron">
                            <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="lotiname" class="control-label col-sm-4 hidden-xs">DUI Cliente</label>
                                        <div class="input-group col-sm-8">
                                            <input type="text" class="form-control" placeholder="000000-0">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">Buscar!</button>
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
                              <td>2</td>
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
                              <td><a href="#" class="glyphicon glyphicon-search mr-glyphicon-2"></a></td>
                            </tr>
                            <tr>
                              <td>38</td>
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
                              <td><a href="#" class="glyphicon glyphicon-search mr-glyphicon-2"></a></td>
                            </tr>
                          </table>
                        </div>
                        </div>
                        <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Estado de Cuenta - Lotificacion: <strong>Esparta</strong> - Lote: <strong>E004</strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                          <table class="table table-hover text-center">
                            <tr>
                              <th>#</th>
                              <th>Fecha Pago</th>
                              <th>Saldo Capital</th>
                              <th>Saldo Interes</th>
                              <th>Saldo IVA</th>
                              <th>Credito Total</th>
                              <th>C.C</th>
                              <th>C.Interes</th>
                              <th>C.IVA</th>
                              <th>T. Cuota</th>
                              <th>Credito Pagado</th>
                            </tr>
                            <tr><td>01</td><td>2015/02/15</td><td>$5,950.00</td><td>$892.50</td><td>$889.53</td><td>$7,732.03</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$64.98 </td></tr>
                            <tr><td>02</td><td>2015/03/15</td><td>$5,900.00</td><td>$885.00</td><td>$882.05</td><td>$7,667.05</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$129.95</td></tr> 
                            <tr><td>03</td><td>2015/04/15</td><td>$5,850.00</td><td>$877.50</td><td>$874.58</td><td>$7,602.08</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$194.93</td></tr> 
                            <tr><td>04</td><td>2015/05/15</td><td>$5,800.00</td><td>$870.00</td><td>$867.10</td><td>$7,537.10</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$259.90</td></tr> 
                            <tr><td>05</td><td>2015/06/15</td><td>$5,750.00</td><td>$862.50</td><td>$859.63</td><td>$7,472.13</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$324.88</td></tr> 
                            <tr><td>06</td><td>2015/07/15</td><td>$5,700.00</td><td>$855.00</td><td>$852.15</td><td>$7,407.15</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$389.85</td></tr> 
                            <tr><td>07</td><td>2015/08/15</td><td>$5,650.00</td><td>$847.50</td><td>$844.68</td><td>$7,342.18</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$454.83</td></tr> 
                            <tr><td>08</td><td>2015/09/15</td><td>$5,600.00</td><td>$840.00</td><td>$837.20</td><td>$7,277.20</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$519.80</td></tr> 
                            <tr><td>09</td><td>2015/10/15</td><td>$5,550.00</td><td>$832.50</td><td>$829.73</td><td>$7,212.23</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$584.78</td></tr> 
                            <tr><td>10</td><td>2015/11/15</td><td>$5,500.00</td><td>$825.00</td><td>$822.25</td><td>$7,147.25</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$649.75</td></tr> 
                            <tr><td>11</td><td>2015/12/15</td><td>$5,450.00</td><td>$817.50</td><td>$814.78</td><td>$7,082.28</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$714.73</td></tr> 
                            <tr><td>12</td><td>2016/01/15</td><td>$5,400.00</td><td>$810.00</td><td>$807.30</td><td>$7,017.30</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$779.70</td></tr> 
                            <tr><td>13</td><td>2016/02/15</td><td>$5,350.00</td><td>$802.50</td><td>$799.83</td><td>$6,952.33</td><td>$50.00</td><td>$7.50</td><td>$7.48</td><td>$64.98</td><td>$844.68</td></tr> 
                          </table>
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

