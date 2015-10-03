<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>Documento sin título</title>
<!-- Importe de librerias Bootstrap -->
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
<link href="css/main.css" type="text/css" rel="stylesheet">

<script src="js/vendor/bootstrap.min.js"></script>

<!-- Fin de Importe de librerias Bootstrap -->

<!-- EFECTO HOVER PARA OPCIONES DEL MENU PRINCIPAL -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.iconmenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sti-menu').iconmenu({
					animMouseenter	: {
						'mText' : {speed : 400, easing : 'easeOutExpo', delay : 140, dir : 1},
						'sText' : {speed : 400, easing : 'easeOutExpo', delay : 0, dir : 1},
						'icon'  : {speed : 800, easing : 'easeOutBounce', delay : 280, dir : 1}
					},
					animMouseleave	: {
						'mText' : {speed : 400, easing : 'easeInExpo', delay : 140, dir : 1},
						'sText' : {speed : 400, easing : 'easeInExpo', delay : 280, dir : 1},
						'icon'  : {speed : 400, easing : 'easeInExpo', delay : 0, dir : 1}
					}
				});
			});
		</script>
        
        <!-- FIN A EFECTO HOVER DE MENU PRINCIPAL -->
</head>

<header>
<ul id="sti-menu" class="sti-menu">
				<li data-hovercolor="#ff395e">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Clientes</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-alternative sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#57e676">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Lotificacion</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-info sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#d869b2">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Lotes</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-family sti-item"></span>
					</a>
				</li>
				<li data-hovercolor="#ffdd3f">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Cuenta</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-technology sti-item"></span>
					</a>
				</li>

				<li data-hovercolor="#37c5e9">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Impuesto</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-bd sti-item"></span>
					</a>
				</li>

				<li data-hovercolor="#ffdd3f">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Pagos</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-logout sti-item"></span>
					</a>
				</li>
                <li data-hovercolor="#ffdd3f">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Reportes</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-report sti-item"></span>
					</a>
				</li>
                <li data-hovercolor="#ffdd3f">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Sistema</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-system sti-item"></span>
					</a>
				</li>
                <li data-hovercolor="#ffdd3f">
					<a href="#" >
						<h2 data-type="mText" class="sti-item">Salir</h2>
						<h3 data-type="sText" class="sti-item"></h3>
						<span data-type="icon" class="sti-icon sti-icon-out sti-item"></span>
					</a>
				</li>
			</ul>
            
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<hr/>
</header>


<body>
<article>

        <img src="imagenes/logo.png" width="200" height="200">
        
        <p>

Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
        </p>
	
</article>


<aside>
      <p>

Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
        </p>
</aside>
</body>
</html>