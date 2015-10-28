<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    require("../conexion/list_menu.php");
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
    <script>
    function abrirModal(cod,factura,cuota){
      var myModal = $('#inicioModal');
      myModal.modal('show');
      var codigo = document.getElementById("codigoCuenta");
      var factu = document.getElementById("recibo");
      var usd = document.getElementById("abono");
      document.getElementById("labelCodigo").innerHTML=cod;
      codigo.value = cod;
      factu.value = factura;
      usd.value = cuota;
    }
    function sumar(num){
      var suma = 0.00;
      i=1;
      while(i<=num){
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
    function hacerPago(factura,cuota,cod){
      if(factura=="" || cuota==""){
        alertify.error('El numero de FACTURA y CUOTA no pueden estar vacios');
      }else if (factura!=null && cuota!=null){
        if(isNaN(cuota)){
          alertify.error("Debe de Escribir una cantidad de dinero sin simbolos. Ejemplo: 50.98");
        }else{
          abrirModal(cod,factura,cuota);
        }
        
      }
    }//funcion hacerPago()
    function cancelarPago(){
      alertify.log("Pago ha sido Cancelado!");
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
            <H1>Pagos</H1>
            <h4>Pagos > Calculo de Pagos</h4>
            <p class="separate"></p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <fielset>
                        <legend>Calculo de Pagos</legend>
                        <div class="jumbotron">
                            <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="lotiname" class="control-label col-sm-4 hidden-xs">DUI Cliente</label>
                                        <div class="input-group col-sm-8">
                                          <div class="dropdown">
                                          <input type="text" name="dui" id="dropdownMenu1" class="form-control dropdown-toggle" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" pattern="[0-9-]{10}" title="Solo se aceptan numeros. No letras." placeholder="00000000-0" required autocomplete="off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="#">Escriba algo..</a></li>
                                            <li><a href=""></a></li>
                                          </ul>
                                        </div>
                                          <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">Buscar!</button>
                                          </span>
                                        </div><!-- /input-group -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                            </form>
                        </div>
                    </fielset>

<div class="dropdown ocultar">
  <input class="dropdown-toggle" type="text" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Listado de Cuentas Abiertas de <strong>Marvin Rolando Segura Menjivar</strong></div>
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                               <tr>
                                 <th>Cuenta</th>
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
                            
                              <td>2 <input type="hidden" id="cod1" value="2"></td>
                              <td>La Cima 2</td>
                              <td>E004 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="number" placeholder="Numero" id="factura1"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta1" onkeyup="sumar(3)" size="5"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2" onclick="hacerPago(factura1.value,cuenta1.value,cod1.value)"></a>
                              </td>
                             

                          </tr>
                          <tr>
                           
                              <td>3 <input type="hidden" id="cod2" value="3"></td>
                              <td>Esparta</td>
                              <td>E005 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="number" placeholder="Numero" id="factura2"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta2" onkeyup="sumar(3)" size="5"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2" onclick="hacerPago(factura2.value,cuenta2.value,cod2.value)"></a>
                              </td>
                           

                          </tr>
                          <tr>
                            
                              <td>38 <input type="hidden" id="cod3" value="38"></td>
                              <td>La Cima</td>
                              <td>E040 </td>
                              <td><?php echo date("Y/m/d");?></td>
                              <td><input type="number" placeholder="Numero" id="factura3"></td>
                              <td>$ 4,500.00</td>
                              <td>$ 33.33</td>
                              <td>$ 5.00</td>
                              <td>$ 4.33</td>
                              <td>$ 42.37</td>
                              <td><input type="text" placeholder="$" id="cuenta3" onkeyup="sumar(3)" size="5"></td>
                              <td>
                                <a href="#" class="glyphicon glyphicon-piggy-bank mr-glyphicon-2" onclick="hacerPago(factura3.value,cuenta3.value,cod3.value)"></a>
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
                  </div> <!-- no se 1-->
                  </div> <!-- no se 2-->
                </div><!-- tabla-->
            </div><!-- ROW-->
        </div><!-- container-->
<a href=""></a>
<div class="modal fade" id="inicioModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" aria-hidden="true" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Abono a Cuenta: <strong id="labelCodigo"></strong></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="idloti">Codigo de Cuenta</label>
                            <input type="text" value="" id="codigoCuenta" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pass">Fecha de Pago </label>
                            <input type="text" value="<?php echo date("Y/m/d H:m:s");?>" id="fecha" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="idloti">Numero de Recibo</label>
                            <input type="text" value="" id="recibo" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="idloti">Abono de $ USD</label>
                            <input type="text" value="" id="abono" class="form-control" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Aceptar</button>
                    <button class="btn btn-default" onclick="cancelarPago()" data-dismiss="modal">Cancelar</button>
                </div>                            
            </div>
        </div>
    </div>

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

