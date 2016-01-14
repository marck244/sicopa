<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3" || $_SESSION["user-nivelacceso"]=="4") {
        # code...
        require("../conexion/list_menu.php");
    }else{
        header("Location: ../");
    }
}else{
    header("Location: ../user/v_login");
}

            $dui=$_GET['dui'];
            $id_impuesto=$_GET['impuesto'];
            $lote=$_GET['lote'];
            $prima=$_GET['prima'];
            $plazo=$_GET['plazo'];
            $fechacreado=$_GET['fechacreado'];
            
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
    <link rel="stylesheet" type="text/css" href="../alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../alertify/css/themes/default.css">
    
    <link rel="stylesheet" href="../css/main.css">

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="../alertify/alertify.min.js"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script languaje='javascript' type='text/javascript'>

    function cerrar()
    {

    window.close();
}

    </script>

      

</head>
<body>
    <!--[if lt IE 8] 
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
            <H1>Cuentas</H1>
            <h4>Simulador de cuentas</h4>
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
                        <span class="navbar-brand">Menu Simulador</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_nwCuenta" onclick="cerrar();">Cerrar Ventana</a></li>
                             
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>


        	<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">

            <?php 
            include("../conexion/conexion.php");
                        $sqllote="SELECT LOTE_ID,LOTE_PRECIO FROM lote WHERE LOTE_ID='$lote'";
                        $querylote=$conn->query($sqllote);
                        $rowlote=$querylote->fetch_assoc();
                        $preciolotetotal=$rowlote['LOTE_PRECIO'];


                            $sql_iva_y_interes="SELECT IMPUESTO_ID,IMPUESTO_INTERES,IMPUESTO_IVA FROM impuesto WHERE IMPUESTO_ID='$id_impuesto'";
                        $query_iva_y_interes=$conn->query($sql_iva_y_interes);
                        $row_iva_y_interes=$query_iva_y_interes->fetch_assoc();

                        $iva=$row_iva_y_interes['IMPUESTO_IVA'];
                        $interes_anual=$row_iva_y_interes['IMPUESTO_INTERES'];
                        $interes_mensual=$interes_anual/12;


                        

                        

                        /********************PROGRAMACION IMPORTANTE ;)*************************************/
                        
                        
                        
                        

                        if (empty($prima)) {
                            $preciolote=$preciolotetotal;   
                        }
                        else
                        {
                            $preciolote= $preciolotetotal - $prima;

                        }

                        $interes=$preciolote * $interes_mensual;


                        $a_capital=$preciolote / $plazo;

                        

                        $a_interes=$interes / $plazo;

                        $cuenta_iva=($a_capital + $interes) * $iva;

                        $a_cuenta_iva=$cuenta_iva/$plazo;


                        $cuot_maxima=$interes + $a_capital + $cuenta_iva;

                        $a_cuot_maxima=$cuot_maxima/$plazo;

                        $pagar=$a_capital;
                        $a_pagar=$a_capital;

                        
                        $saldocapital=$preciolote - $a_capital;
                        $mes=0;
                        $dia=date("d");
                        /*******************VARIABLES MUESTRA********************/
                        $interes_muestra=$interes_anual * 100;
                        $iva_muestra= $iva * 100;
                        /********************************************************/

            $sqlcliente="SELECT CLIENTE_NOMBRE,CLIENTE_APELLIDO FROM cliente WHERE CLIENTE_ID='$dui'";
            $querycliente=$conn->query($sqlcliente);
            $rowcliente=$querycliente->fetch_assoc();

            $cliente=$rowcliente["CLIENTE_NOMBRE"]." ".$rowcliente["CLIENTE_APELLIDO"];



            ?>
                <h4>Informacion Relevante</h4>
                <p class="separate"></p>
                <h4>Cliente : <?php echo $cliente; ?></h4>
                <h4> Plazo Cuota: <?php echo $plazo." Meses"; ?></h4>
                <h4> Precio Lote: <?php echo "$ ".$preciolotetotal; ?></h4>
                <h4> Cuota Capital: <?php echo "$ ".number_format($a_capital,2); ?></h4>
                <h4>Interes: <?php echo $interes_muestra." %"; ?></h4>
                <h4>Iva: <?php echo $iva_muestra." %"; ?></h4>
                <?php 
                if (empty($prima)) {
                    
                }
                else{
                    ?> <h4>Prima: <?php echo "$ ".$prima; ?></h4>
                    <h4> Lote Capital Restante: <?php echo "$ ".$preciolote; ?></h4> <?php

                }
                ?>

                <h4></h4>

                <p class="separate"></p>
        		<div class="table-responsive">
        				<table class="table table-hover text-center">
        					<tr>
        					<th>#Cuota</th>
        					<th>Fecha Pago</th>
        					<th>Saldo Capital</th>
        					<th>A Capital</th>
        					<th>A Interes</th>
        					<th>A Iva</th>
        					<th>Cuota Mensual</th>
        					<th>Capital Pagado</th>
        					</tr>

                             <?php 
                            $contador;                 

            for ($contador=1; $contador <= $plazo ; $contador++,$saldocapital-=$a_capital,$interes-=$a_interes,$cuenta_iva-=$a_cuenta_iva,$cuot_maxima-=$a_cuot_maxima,$pagar+=$a_pagar) { 

                
                 
                ?>
                
        					<tr>
                           <td><?php echo $contador; ?></td>
                           <td><?php  

                           
                              if ($dia == 31 || $dia == 30 || $dia==29 || $dia==28  ) {
                                
                                        
                                        

                                     echo date( "d-F-Y", strtotime( "last day of this month +".$mes." month" ) ); 
                                     
                           }
                           else
                           {
                            
                                     echo date( "d-F-Y", strtotime( "+".$mes." month" ) ); 
                                     
                           }
                          

                           ?></td>
                            
                      
                            
                          <td><?php
                         

                            echo number_format($saldocapital,2);
                            
                            ?></td>
                            

                        


                          <td><?php echo number_format($a_capital,2);?></td>

                          <td><?php echo number_format($interes,2); ?></td>
                          <td><?php echo number_format($cuenta_iva,2); ?></td>
                          <td><?php echo number_format($cuot_maxima,2); ?></td>
                          <td><?php echo number_format($pagar,2); ?></td>

        					</tr>
                            
                           <?php
                           $mes++;
                            } ?>
                           
                            <?php 
            
                            ?>
        				</table>
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


<script src="../js/vendor/bootstrap.min.js"></script>

<script src="../js/main.js"></script>
</body>
</html>