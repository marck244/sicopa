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
    <script type="text/javascript" src="../alertify/alertify.min.js"></script>

    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>


  
   


    <!-- validacion form busqueda -->

    <script type="text/javascript">

    function valida () {
        
        var busqueda= document.getElementById("busqueda");

        if (busqueda.value=='') {
            alertify.warning("No ha digitado nada en la caja de busqueda por favor ingrese un numero de DUI");
            return false;
        }
        return true;

    }

    </script>

    <!-- **************************** -->

       <!-- script no dejar campos vacios en el formulario INICIO-->

   <script type="text/javascript">

   function validar(){

        
        var camponombre= document.getElementById("nombre");
        var campoapellido= document.getElementById("apellido");
        var camponit= document.getElementById("nit");
        var campoedad= document.getElementById("edad");
        var campodomicilio= document.getElementById("domicilio");
        var campotelefono= document.getElementById("telefono");
        var cbomunicipio= document.getElementById("cbomuni");

        

        if (camponombre.value=='') {

            alertify.warning('No puede dejar el campo Nombre vacio');
            return false;

        }
        if (campoapellido.value=='') {
            alertify.warning('No puede dejar el campo Apellido vacio');
            return false;
        }

        if (camponit.value=='') {
            alertify.warning('No puede dejar el campo NIT vacio');
            return false;
        }

        if (campoedad.value=='') {
            alertify.warning('No puede dejar el campo Edad vacio');
            return false;
        }

        if (campodomicilio.value=='') {
            alertify.warning('No puede dejar el campo Domicilio vacio');
            return false;
        }

        if (campotelefono.value=='') {
            alertify.warning('No puede dejar el campo Telefono vacio');
            return false;
        }
        if (cbomuni.value=='') {
            alertify.warning('No puede dejar sin elegir el campo Municipio');
            return false;
        }



    return true;        

   }

   </script>

  <!--script no dejar campos vacios en el formulario FIN -->


  <!-- script validacion entrada solo texto INICIO -->
    <script type="text/javascript">

    /*****************************************************************/
    /*****************************************************************/
    function soloLetras(e){
 key = e.keyCode || e.which;
 tecla = String.fromCharCode(key).toLowerCase();
 letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
 especiales = [8,37,39,46];

 tecla_especial = false
 for(var i in especiales){
     if(key == especiales[i]){
  tecla_especial = true;
  break;
            } 
 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     return false;
     }
     /*****************************************************************/
     /*****************************************************************/

    </script>
    <!-- script validacion entrada solo texto FIN -->


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

   <!-- script validacion para domicilio excluyendo caracteres como @ o ! INICIO-->

   <script type="text/javascript">
   function domicilio(e) {
    tecla=(document.all) ? e.keyCode : e.which;
    //alert(tecla);
    if (tecla==64 || tecla==33  || tecla==36 || tecla==37 || tecla==61 || tecla==161 || tecla==63 || tecla==92) {
 
        return false;
    }
}
   </script>

   <!-- script validacion para domicilio excluyendo caracteres como @ o ! FIN-->


   
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
            <H1>Clientes</H1>
            <h4>Clientes > Actualizar Clientes</h4>
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
                        <span class="navbar-brand">Menu Clientes</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_nwCliente">Agregar Cliente</a></li>
                                <li><a href="v_upCliente">Actualizar Cliente</a></li>
                                <li><a href="v_dlCliente">Eliminar Cliente</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Actualizar Clientes</legend>


  <div class="jumbotron">
                <form class="form-horizontal" onsubmit="return valida()">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="lotiname" class="control-label col-xs-4 hidden-xs">DUI Cliente :</label>
                            <div class="input-group">
                                <input name="cajatexto" id="cajatexto" maxlength="10" onkeyup="mascaradui(this,'-',arraydigitosdui,true);" type="text" class="form-control" placeholder="numero de Dui">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Buscar!</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                </form>
                </div>



                    </fielset>
                </div>
                </div>
<div class="col-15 col-sm-12 col-md-12 col-lg-13">
                    <fielset>
                        
                       <form action="" class="form-horizontal" onsubmit="return validar()">
                        <div class="form-group">
                            <label for="Id Lotificacion" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Id :</label>
                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                
                                             <input type="name" class="form-control" readonly="true" placeholder="# Dui">
                            </div>
                        </div>
  <div class="form-group">
         <label for="inputName" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nombre:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="nombre" id="nombre" class="form-control" maxlength="30" placeholder="Nombre" onkeypress="return soloLetras(event);">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Apellido :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="apellido" id="apellido" class="form-control" maxlength="30" placeholder="Apellido" onkeypress="return soloLetras(event);">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nit :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="nit" id="nit" class="form-control" maxlength="17" onkeyup="mascaradui(this,'-',arraydigitosnit,true);" placeholder="Nit">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Edad :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="edad" id="edad" class="form-control" maxlength="3" onkeypress="return solonumeros(event)" placeholder="Edad">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Domicilio :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="domicilio" id="domicilio" maxlength="150" class="form-control" onkeypress="return domicilio(event)" placeholder="Domicilio">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Telefono :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="telefono" id="telefono" class="form-control" maxlength="8" onkeypress="return solonumeros(event)" placeholder="Telefono">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" title="Fecha de Nacimiento" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Nacimiento :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="date" class="form-control">
         </div>
     </div>

      <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Profesion :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cboprofesion" class="form-control">
                <option>Seleccione</option>
             </select>
         </div>
     </div>

       <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Departamento :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbodepa" class="form-control">
                <option>Seleccione</option>
             </select>
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Municipio :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbomuni" id="cbomuni" class="form-control">
                <option value="" >Seleccione</option>
             </select>
         </div>
     </div>

      <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Sabe Firmar :</label>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <select name="cbofirma" class="form-control">
                <option>Si</option>
                <option>No</option>
             </select>
         </div>
     </div>



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-1 col-sm-offset-3">
             <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
         </div>
         </center>
     </div>
                    </form>
                    </fielset>
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


</body>
</html>

