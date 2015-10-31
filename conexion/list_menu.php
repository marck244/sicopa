<?php
$menu_index='';
$menu_system = '';
$menu_reporte ='';
switch ($_SESSION["user-nivelacceso"]) {
	/* Caso Administrador del Sistema*/
	case '1':{
		$menu_index.='<ul class="nav navbar-nav navbar-right">';
        $menu_index.='<li class="active"><a href="index" class="glyphicon glyphicon-home" ></a></li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_index.='<li><a href="cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_index.='<li><a href="pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>';
        $menu_index.='<li><a href="lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> LOTES</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li><a href="reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>';
        $menu_index.='<li><a href="user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>';
        $menu_index.='<li><a href="impuestos/v_nwImpuestos" class="glyphicon glyphicon-book"> IMPUESTO</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li><a href="user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_index.='</ul>';

        $menu_system.='<ul class="nav navbar-nav navbar-right">';
        $menu_system.='<li><a href="../" class="glyphicon glyphicon-home" ></a></li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_system.='<li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_system.='<li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>';
        $menu_system.='<li><a href="../lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> LOTES</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="#" class="glyphicon glyphicon-tasks"> BD</a></li>';
        $menu_system.='<li><a href="../user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>';
        $menu_system.='<li><a href="../impuestos/v_nwImpuestos" class="glyphicon glyphicon-book"> IMPUESTO</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_system.='</ul>';

        $menu_reporte.='<ul class="nav navbar-nav">';
        $menu_reporte.='<li><a href="v_estadoCuenta">Estado de Cuentas</a></li>';
        $menu_reporte.='<li><a href="v_listadoCuentas">Listado de Estado de Cuentas</a></li>';
        $menu_reporte.='<li><a href="v_bitacora">Bitacora de SICOPA</a></li>';
        $menu_reporte.='</ul>';
		break;
	}
	/* Gerente General de SICOPA */
	case '2':{
		$menu_index.='<ul class="nav navbar-nav navbar-right">';
        $menu_index.='<li><a href="index" class="glyphicon glyphicon-home" ></a></li>';
        $menu_index.='<li><a href="reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li><a href="user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_index.='</ul>';

        $menu_system.='<ul class="nav navbar-nav navbar-right">';
        $menu_system.='<li><a href="../" class="glyphicon glyphicon-home" ></a></li>';
        $menu_system.='<li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="glyphicon glyphicon-cog" data-toggle="dropdown"> SISTEMA <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../user/v_nwUsuario" class="glyphicon glyphicon-user"> USUARIOS</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_system.='</ul>';

        $menu_reporte.='<ul class="nav navbar-nav">';
        $menu_reporte.='<li><a href="v_estadoCuenta">Estado de Cuentas</a></li>';
        $menu_reporte.='<li><a href="v_listadoCuentas">Listado de Estado de Cuentas</a></li>';
        $menu_reporte.='<li><a href="v_bitacora">Bitacora de SICOPA</a></li>';
        $menu_reporte.='</ul>';
		break;
	}
	/*  Personal Administrativo Funciones importantes */
	case '3':{
		$menu_index.='<ul class="nav navbar-nav navbar-right">';
        $menu_index.='<li class="active"><a href="index" class="glyphicon glyphicon-home" ></a></li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_index.='<li><a href="cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_index.='<li><a href="pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>';
        $menu_index.='<li><a href="lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> LOTES</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li><a href="reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_index.='<li><a href="user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_index.='</ul>';

        $menu_system.='<ul class="nav navbar-nav navbar-right">';
        $menu_system.='<li><a href="index" class="glyphicon glyphicon-home" ></a></li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_system.='<li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_system.='<li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="dropdown-toggle glyphicon glyphicon-tower" data-toggle="dropdown"> LOTIFICACION <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../lotificacion/v_nwLotificacion" class="glyphicon glyphicon-tower"> LOTIFICACIONES</a></li>';
        $menu_system.='<li><a href="../lote/v_nwLote" class="glyphicon glyphicon-tree-conifer"> LOTES</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_system.='<li><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_system.='</ul>';

        $menu_reporte.='<ul class="nav navbar-nav">';
        $menu_reporte.='<li><a href="v_estadoCuenta">Estado de Cuentas</a></li>';
        $menu_reporte.='<li><a href="v_listadoCuentas">Listado de Estado de Cuentas</a></li>';
        $menu_reporte.='</ul>';
		break;
	}
	/* Operador o Empleado que manejara lo necesario para cobros*/
	case '4':{
		$menu_index.='<ul class="nav navbar-nav navbar-right">';
        $menu_index.='<li class="active"><a href="" class="glyphicon glyphicon-home" ></a></li>';
        $menu_index.='<li class="dropdown">';
        $menu_index.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_index.='<ul class="dropdown-menu">';
        $menu_index.='<li><a href="cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_index.='<li><a href="cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_index.='<li><a href="pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_index.='</ul>';
        $menu_index.='</li>';
        $menu_index.='<li><a href="reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_index.='<li><a href="user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_index.='</ul>';

        $menu_system.='<ul class="nav navbar-nav navbar-right">';
        $menu_system.='<li><a href="../" class="glyphicon glyphicon-home" ></a></li>';
        $menu_system.='<li class="dropdown">';
        $menu_system.='<a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> CLIENTE <span class="caret"></span></a>';
        $menu_system.='<ul class="dropdown-menu">';
        $menu_system.='<li><a href="../cuenta/v_nwCliente" class="glyphicon glyphicon-user"> CLIENTES</a></li>';
        $menu_system.='<li><a href="../cuenta/v_nwCuenta" class="glyphicon glyphicon-list-alt"> CUENTAS</a></li>';
        $menu_system.='<li><a href="../pagos/v_calculoPago" class="glyphicon glyphicon-usd"> PAGOS</a></li>';
        $menu_system.='</ul>';
        $menu_system.='</li>';
        $menu_system.='<li><a href="../reportes/v_estadoCuenta" class="glyphicon glyphicon-folder-open"> REPORTES</a></li>';
        $menu_system.='<li><a href="../user/logout" class="glyphicon glyphicon-off" > SALIR</a></li>';
        $menu_system.='</ul>';

        $menu_reporte.='<ul class="nav navbar-nav">';
        $menu_reporte.='<li><a href="v_estadoCuenta">Estado de Cuentas</a></li>';
        $menu_reporte.='</ul>';
		break;
	}
		
	
	default:
		# code...
		break;
}
?>