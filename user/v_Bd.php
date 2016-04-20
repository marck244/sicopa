<?php
session_start();
if(isset($_SESSION["loginUser-name"])){
    /*mas codigo si esta logueado*/
    if ($_SESSION["user-nivelacceso"]=="1" || $_SESSION["user-nivelacceso"]=="2") {
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

    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>


    <script type="text/javascript">
            $(document).ready(function() {
                $(".restoreFile").hide();
            });
            function checkParameters(){
                var username = $.trim($("#username").val());
                var password = $.trim($("#password").val());
                var databasename = $.trim($("#databasename").val());
                if (username == ""){
                    alert("Plsease enter mysql username.");return false;
                }
                else if (password == ""){
                    alert("Plsease enter mysql password.");return false;
                }
                else if (databasename == ""){
                    alert("Plsease enter mysql database name.");return false;
                }
                else if($("#restore").is(':checked')){
                    var filename = $(".restoreFile").val();
                    if(filename == ""){
                        alert("Please choose a file.");return false;
                    }
                    else{
                        var valid_extensions = /(\.db|\.sql)$/;   
                        if (!valid_extensions.test(filename)){ 
                            alert('Invalid file format.');return false;
                        }                   
                    }
                }
                else{
                    return true;
                }
            }
            function showHide(id){
                if (id == "backup"){
                    $(".backupRadio").show();
                    $(".restoreFile").hide();
                }
                else{
                    $(".backupRadio").hide();
                    $(".restoreFile").show();
                }
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
            <H1>Sistema</H1>
            <h4>Sistema > BD</h4>
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
                        <span class="navbar-brand">Menu BD</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="v_BD">Backup/Restaurar BD</a></li>
                                
                                
                            </ul>
                        </div><!--/.nav-collapse -->
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
                    <fielset>
                        <legend>Registro de un nuevo Usuario</legend>
                       <form action="" method="POST" class="form-horizontal" onsubmit="return checkParameters();" autocomplete="off" enctype="multipart/form-data">
                       
                        
                   


                             
     <div class="form-group oculto">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Usuario:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" name="username" id="username" readonly="true" class="form-control" placeholder="" value="root">
         </div>
     </div>
     <div class="form-group oculto">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Contraseña:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="password" name="password" id="password" class="form-control" value="root" readonly="true">
         </div>
     </div>
     <div class="form-group">
         <label for="inputEmail"class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Base De Datos:</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
             <input type="name" id="databasename" name="databasename" class="form-control" value="db_sicopa_desa" readonly="true">
         </div>
     </div>

    <div class="form-group">
         <label for="inputEmail" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Controles :</label>
         <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="radio">
  <label>
    <input type="radio" name="backupRestore" id="backup" value="backup" checked="true" onclick="showHide(this.id);">
    Backup
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="backupRestore" id="restore" value="restore" onclick="showHide(this.id);">
    Restaurar
  </label>
</div>
         </div>
     </div>


    
     



     <div class="form-group">
     <center>
         <div class="col-xs-12 col-sm-2 col-sm-offset-3">
             <input type="submit" class="btn btn-primary" value="Procesar">
         </div>

         <div class="col-xs-12 col-sm-2 col-sm-offset-1">
             <input type="file" name="databasefile" id="databasefile" class="restoreFile">
         </div>

         </center>
     </div>
                    </form>
                    </fielset>
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

<?php
 if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['databasename'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $databasename = trim($_POST['databasename']);
        $backupRestore = $_POST['backupRestore'];
 
        if ($backupRestore == 'backup'){        
           
set_time_limit(0);
 
define('DB_NAME', 'db_sicopa_desa');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
 
 
function setQuery($setSelectQueryStr, $fetchType = NULL){
    $arr = array();
 
    try{
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $pdoQuery = $db->query($setSelectQueryStr);
        $fetchType = empty($fetchType) ? PDO::FETCH_ASSOC : $fetchType;
        $arr = ($pdoQuery->rowCount() > 0) ? $pdoQuery->fetchAll($fetchType) : array();
 
    }catch(PDOException $e){
        echo $e->getMessage();
        exit;
    }
 
    return $arr;
}
 
 
 
 
define('NL', PHP_EOL);
 
$drop = true; 
$tables = array(); 
$extra = array();
$constraints = array();
 
$f = fopen(DB_NAME . '.sql', 'w');
 
$query = setQuery('SHOW TABLES FROM `' . DB_NAME . '`', PDO::FETCH_NUM);
foreach($query as $row){
    $tables[] = $row[0];
}
 
$extra['dumpVersion'] = "1.0";
$extra['dtTm'] = date("Y-m-d H:i:s");
$extra['phpVersion'] = phpversion();
$extra['dbName'] = DB_NAME;
 
$t = array();
foreach($tables as $k => $v){
    $t[] = "[$k] => $v;";
}
$extra['tables'] = implode(NL . '--           ', $t);
 
$text = <<<HEADERTEXT
-- dumpFDW  
-- version {$extra['dumpVersion']}
-- http://www.forosdelweb.com/miembros/abimaelrc/
--  
-- Host: {$_SERVER['HTTP_HOST']}
-- Generation Time: {$extra['dtTm']}
-- PHP Version: {$extra['phpVersion']} 
-- Database: '{$extra['dbName']}' 
-- Tables: {$extra['tables']} 
HEADERTEXT;
 
fwrite($f, $text);
 
foreach ($tables as $table){
    fwrite($f, NL . NL .($drop ? "DROP TABLE IF EXISTS `$table`;" : "-- No especificado.") . NL);
 
    $query = setQuery("SHOW CREATE TABLE `$table`", PDO::FETCH_NUM);
    foreach($query as $row){
        $arr = explode("\n", $row[1]);
        $tmpArr = array();
        foreach($arr as $key => $value){
            if(stripos($value, "CONSTRAINT") !== false){
                $tmpArr[] = '  ADD ' . trim($value);
                if(array_key_exists($key - 1, $arr)){
                    $arr[$key - 1] = str_replace(',','',$arr[$key - 1]);
                }
                unset($arr[$key]);
            }
        }
        if(!empty($tmpArr)){
            $constraints[] = 'ALTER TABLE ' . $row[0] . NL . implode(NL, $tmpArr) . ';';
        }
        fwrite($f, implode(NL, $arr) . ';' . NL . NL);
    }
 
 
    $query = setQuery("SELECT * FROM `$table`");
 
    $n = 0;
    $nR = count($query) - 1;
    foreach($query as $qry){
        $columnas = array_keys($qry);
        $values = array();
        $keys = array();
 
        foreach($columnas as $columna){
            $keys[] = "`".$columna."`";
            if( is_numeric($qry[$columna]) || is_null($qry[$columna]) ){
                $values[] = $qry[$columna];
            } else{
                $values[] = "'" . str_replace(array("'", NL), array("''", '\r\n'), addcslashes($qry[$columna], '\\')) . "'";
            }
        }
 
        /* $sC = special Char, saber cual cáracter especial colocar al final del código */
        $sC = ($n%2000 == 1999 || $n == $nR ? ";" : ",");
 
        if($n%2000 == 0){
            fwrite($f, "INSERT INTO `$table`(".implode(", ", $keys).") VALUES " . NL . "(" . implode(", ", $values) . ")" . $sC . NL);
        }else{
            fwrite($f, "(" . implode(", ", $values) . ")" . $sC . NL);
        }
        $n++;
    }
}
 
if(!empty($constraints)){
    fwrite($f, NL . NL . implode(NL . NL, $constraints));
}
 
fclose($f); 

?> <script type="text/javascript">alertify.success('Copia de Base de datos generada');</script> <?php
 
        }


        
        else{//Restore the database
          include("../conexion/conexion.php");
               $databasefilename = $_FILES["databasefile"]["name"];
                 $templine = '';
   $lines    = file($databasefilename);
  //Recorrer Informacion para ejecutarlo
  foreach ($lines as $line)
  {
    // si es un comentario lo brincamos
    if (substr($line, 0, 2) == '--' || $line == '')
      continue;
   
    //Añadimos linea para el segmento
    $templine .= $line;
    //si tiene un punto y coma ejecutamos query
    if (substr(trim($line), -1, 1) == ';')
    {
      $conn->query($templine);
      $templine = '';
    }
  }
  ?> <script type="text/javascript">alertify.success('Copia de Base de datos restaurada exitosamente');</script> <?php
        }
    }

  ?>