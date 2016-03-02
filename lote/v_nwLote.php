<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="3") {
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

    <!-- script validacion entrada solo numero INICIO -->
	 <script type="text/javascript">
	  <!--
	  function solonumeros(evt)
	  {
		 var charCode = (evt.which) ? evt.which : event.keyCode
		 if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
 
		 return true;
	  }
	  //-->
   </script>
   <!-- script validacion entrada solo numero FIN -->



   <!-- script validacion para detallesextra excluyendo caracteres como @ o ! INICIO-->

   <script type="text/javascript">
   function detallesextra(e) {
	tecla=(document.all) ? e.keyCode : e.which;
	//alert(tecla);
	if (tecla==64 || tecla==33  || tecla==36 || tecla==37 || tecla==61 || tecla==161 || tecla==63 || tecla==92) {
 
		return false;
	}
}
   </script>

   <!-- script validacion para detallesextra excluyendo caracteres como @ o ! FIN-->



   <!-- script no dejar campos vacios en el formulario INICIO-->

   <script type="text/javascript">

   function validar(){

		var campoextension= document.getElementById("extension");
		var campoprecio=document.getElementById("precio");
		var combolotificacion=document.getElementById("cbolotificacion");
		var combopoligono=document.getElementById("cbopoligono");
		

		if (campoextension.value=='') {

			alertify.warning('No puede dejar el campo Extension vacio');
			return false

		}
		if(campoprecio.value==''){
			alertify.warning('No puede dejar el campo Precio vacio');
			return false;
		}

		if(combolotificacion.value==''){
			alertify.warning('No puede dejar el campo Lotificacion sin elegir');
			return false;
		}

		if(combopoligono.value==''){
			alertify.warning('No puede dejar el campo Poligono sin elegir');
			return false;
		}
		



	return true;		

   }

   </script>

  <!--script no dejar campos vacios en el formulario FIN -->
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
            <H1>Lotes</H1>
            <h4>Lotes > Agregar Nuevo Lote</h4>
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
                        <span class=" navbar-brand">Menu Lotes</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_nwLote">Agregar Lote</a></li>
                                <li><a href="v_upLote">Actualizar Lote</a></li>
                                <li><a href="v_dlLote">Eliminar Lote</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Registro de un nuevo lote</legend>
                       <form action="m_nwLote.php" method="POST" name="form" class="form-horizontal" onsubmit="return validar()" autocomplete="off">
                        
                        <input type="hidden" name="user" value="<?php echo $_SESSION["loginUser-name"]; ?>">

                        <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Codigo/Lote :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" maxlength="4" pattern="[a-z]{1}[0-9]{3}" name="codigo" title="Ingresa primer digito letra y los restantes numeros" class="form-control" placeholder="Codigo de Lote" required>
         </div>
     </div>


                             <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Extension :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="extension" id="extension" onkeypress="return solonumeros(event)" class="form-control" placeholder="Metros cuadrados">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Precio Lote:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name"  name="precio" id="precio" class="form-control" onkeypress="return solonumeros(event)" placeholder="valor de el lote">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Lotificacion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbolotificacion" id="cbolotificacion" class="form-control">
                 <option value="">Seleccione</option>
                 <?php 

                include("../conexion/conexion.php");
                $sqlloti="SELECT LOTIFICACION_ID,LOTIFICACION_NOMBRE FROM lotificacion";
                $queryloti=$conn->query($sqlloti);
                while ($rowloti=$queryloti->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $rowloti['LOTIFICACION_ID'];?>"><?php echo $rowloti['LOTIFICACION_NOMBRE']; ?></option>
                    <?php
                }

                ?>
             </select>
         </div>
     </div>

    <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Poligono :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbopoligono" id="cbopoligono" class="form-control">
                 <option value="">Seleccione</option>
                  <?php 

                
                $sqlpoli="SELECT POLIGONO_ID,POLIGONO_NUM FROM poligono";
                $query=$conn->query($sqlpoli);
                while ($row=$query->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['POLIGONO_ID'];?>"><?php echo $row['POLIGONO_NUM']; ?></option>
                    <?php
                }

                ?>
             </select>
         </div>
     </div>

       <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Detalles Extra :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <textarea class="form-control" name="detalles" maxlength="100" onkeypress="return detallesextra(event)" rows="3" placeholder="Ingresa una descripcion sobre este lote"></textarea>
         </div>
     </div>
     



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-1 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Registrar Lote</button>
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

            ?> <script type="text/javascript">alertify.error('Error: el codigo del lote ya existe');</script> <?php

        }
    }


    if (empty($_GET['guardado'])) {
        $guardado="";
    }
    else
    {   
        $guardado=$_GET['guardado'];
        if($guardado=="si"){

            ?> <script type="text/javascript">alertify.success('El lote se ha ingresado exitosamente');</script> <?php

        }

        if($guardado == "no")
        {
            ?> <script type="text/javascript">alertify.error('Error: El lote no se pudo guardar');</script> <?php
        }
    }
?>
</html>
