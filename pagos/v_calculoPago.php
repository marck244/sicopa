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
    function sumar(num){
      var suma = 0.00;
      i=1;
      while(i<=3){
        if(eval($("#cuenta"+i).val())==null){
          suma += 0;
        }
        else{
          suma += eval($("#cuenta"+i).val()); 
        }
        i++;
      }
      document.getElementById("total").innerHTML = "$ "+suma.toFixed(2);;
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
                        <li><a href="../" class="glyphicon glyphicon-home" ></a></li>
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> Clientes</a></li>
                                <li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> Cuentas</a></li>
                                <li><a href="v_calculoPago" class="glyphicon glyphicon-usd"> Pagos</a></li>
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
                        <li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>
                        <li><a href="#" class="glyphicon glyphicon-cog"> SISTEMA</a></li>
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
            <H1>Pagos</H1>
            <h4>Pagos > Calculo de Pagos</h4>
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
                        <span class="visible-xs navbar-brand">Menu Pagos</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Calculo de Pagos</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Calculo de Pagos</legend>
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
                        <div class="panel-heading">Listado de Cuentas Abiertas de <strong>Marvin Rolando Segura Menjivar</strong></div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                               <tr>
                                 <th>Cod Cuenta</th>
                                 <th>Lotificacion</th>
                                 <th>Lote</th>      
                                 <th>Fecha</th>
                                 <th>Numero Recibo</th>
                                 <th>Monto Restante</th>
                                 <th>Cuota Capital</th>
                                 <th>Cuota Interes</th>
                                 <th>Couta Iva</th>
                                 <th>Pago Minimo</th>
                                 <th>Abono a Cuenta</th>
                                 <th></th>
                             </tr>

                             <tr>
                              <td>2</td>
                              <td>Lotificacion Esparta</td>
                              <td>E004 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="text" placeholder="#00253" size="10"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta1" onkeyup="sumar(3)" size="10"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2"></a>
                              </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td>Lotificacion Esparta</td>
                              <td>E005 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="text" placeholder="#00253" size="10"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta2" onkeyup="sumar(3)" size="10"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2"></a>
                              </td>
                          </tr>
                          <tr>
                              <td>38</td>
                              <td>Lotificacion Esparta</td>
                              <td>E040 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="text" placeholder="#00253" size="10"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta3" onkeyup="sumar(3)" size="10"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2"></a>
                              </td>
                          </tr>
                            <tr>
                              
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              
                              <td colspan=2><strong>Minimo Total</strong></td>
                              <td><strong>$ 82.96</strong></td>
                              <td></td>
                              <td><strong>Total</strong></td>
                              <td><strong id="total"></strong></td>
                              <td></td>
                          </tr>
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

