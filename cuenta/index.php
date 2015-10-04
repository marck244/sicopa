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

        <script type="text/javascript">
function mostrar(){
document.getElementById('oculto').style.display = 'block';}
</script>
     
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <nav role="navigation" class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Bienvenido : USUARIO HORA :</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="#" class="glyphicon glyphicon-home" >HOME</a></li>
                <li class="active"><a href="#" class="glyphicon glyphicon-user">CLIENTES</a></li>
                <li><a href="#" class="glyphicon glyphicon-tower">LOTIFICACION</a></li>
                <li><a href="#" class="glyphicon glyphicon-tree-conifer">LOTE</a></li>
                <li><a href="#" class="glyphicon glyphicon-list-alt">CUENTA</a></li>
                <li><a href="#" class="glyphicon glyphicon-book">IMPUESTOS</a></li>
                <li><a href="#" class="glyphicon glyphicon-usd">PAGOS</a></li>
                <li><a href="#" class="glyphicon glyphicon-folder-open">REPORTES</a></li>

                <li><a href="#" class="glyphicon glyphicon-cog">SISTEMA</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="#" class="glyphicon glyphicon-off" >LOGOUT</a></li>
            </ul>
        </div>
    </div>
</nav>


    

  <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

      	<div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" onclick="mostrar()">Agregar Cliente</a></li>
            <li><a href="#">Buscar Cliente</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    
    
   <div id="oculto" style='display:none;'> 	
   <center><label>FORMULARIO DE INGRESO DE CLIENTES</label></center>
<form class="form-horizontal">
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Nombre:</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Nombre">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Apellido :</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Apellido">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Nit :</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Nit">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Edad :</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Edad">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Domicilio :</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Domicilio">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Telefono :</label>
         <div class="col-xs-10">
             <input type="name" class="form-control" placeholder="Telefono">
         </div>
     </div>

     <div class="form-group">
         <label for="inputEmail" class="control-label col-xs-2">Fecha Nacimiento :</label>
         <div class="col-xs-10">
             <input type="date" class="form-control">
         </div>
     </div>
     <div class="form-group">
         <div class="col-xs-offset-2 col-xs-10">
             <button type="submit" class="btn btn-primary">Enviar</button>
         </div>
     </div>
</form>
   </div>



  </div>
</div>

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
     

      

      <center>
      <footer>
        <p>&copy; SICOPA 2015</p>
      </footer>
      </center>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>
    </body>
</html>

