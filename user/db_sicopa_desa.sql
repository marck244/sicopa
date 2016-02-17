-- dumpFDW  
-- version 1.0
-- http://www.forosdelweb.com/miembros/abimaelrc/
--  
-- Host: localhost
-- Generation Time: 2016-02-16 15:05:03
-- PHP Version: 5.5.12 
-- Database: 'db_sicopa_desa' 
-- Tables: [0] => bitacora;
--           [1] => cliente;
--           [2] => cuenta;
--           [3] => cuenta_estados;
--           [4] => cuenta_pagos;
--           [5] => departamento;
--           [6] => impuesto;
--           [7] => lote;
--           [8] => lotificacion;
--           [9] => municipio;
--           [10] => poligono;
--           [11] => profesiones;
--           [12] => usuario; 

DROP TABLE IF EXISTS `bitacora`;
CREATE TABLE `bitacora` (
  `BITACORA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NICK` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `BITACORA_FECHA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BITACORA_ACTIVIDAD` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `BITACORA_TABLA` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `BITACORA_IP` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`BITACORA_ID`,`USER_NICK`),
  KEY `FK_RELATIONSHIP_3` (`USER_NICK`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `bitacora`(`BITACORA_ID`, `USER_NICK`, `BITACORA_FECHA`, `BITACORA_ACTIVIDAD`, `BITACORA_TABLA`, `BITACORA_IP`) VALUES 
(1, 'admin', '2016-01-22 00:00:00', 'se registro al clienteJAIRO ERNESTO, VELASQUEZ SIBRIAN con su numero de dui No:050796106', 'Cliente', '::1'),
(2, 'admin', '2016-01-22 15:18:27', 'se registro al cliente JOSE EMILIO, ANCHETA CARRANZA con su numero de dui No: 050496401', 'Cliente', '::1'),
(3, 'admin', '2016-01-22 15:42:05', 'Se modifico informacion del cliente JAIRO ERNES VELASQUEZ SIBRIANcon numero de Dui No: 050796106', 'Cliente', '::1'),
(8, 'admin', '2016-02-05 16:08:51', 'Se elimino el cliente JOSE EMILIO ANCHETA CARRANZA con numero de Dui No: 050496401 ', 'Cliente', ''),
(9, 'admin', '2016-02-05 16:12:34', 'Se elimino el cliente ABRAHAN GALDAMEZ con numero de Dui No: 037788998 ', 'Cliente', '::1'),
(10, 'admin', '2016-02-05 17:13:55', 'se registro al cliente JORGE ALBERTO, SIBRIAN GONZALES con su numero de dui No: 050796107', 'Cliente', '::1'),
(12, 'admin', '2016-02-05 17:16:26', 'Se creo una cuenta con una entrada de prima de $ 200 a nombre de el clienteJORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107 al lote B002', 'Cuenta', '::1'),
(40, 'admin', '2016-02-06 19:15:10', 'Se modifico una cuenta sin entrada de prima a nombre de el cliente JORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107', 'Cuenta', '::1'),
(42, 'admin', '2016-02-06 19:17:08', 'Se modifico una cuenta sin entrada de prima a nombre de el cliente JORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107', 'Cuenta', '::1'),
(43, 'admin', '2016-02-06 19:19:57', 'Se modifico una cuenta con una entrada de prima de $ 200 a nombre de el cliente JORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107', 'Cuenta', '::1'),
(44, 'admin', '2016-02-06 19:25:18', 'Se modifico una cuenta con una entrada de prima de $ 200 a nombre de el cliente JORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107', 'Cuenta', '::1'),
(46, 'admin', '2016-02-07 11:41:14', 'Se dio de baja una cuenta porque tenia pagos a nombre de el cliente JORGE ALBERTO SIBRIAN GONZALES con numero de Dui No: 050796107', 'Cuenta', '::1'),
(47, 'admin', '2016-02-08 12:11:27', 'Se registro un lote con su codigo C001 a un precio de :  para la lotifiacion : Chaparron', 'Lote', '::1'),
(48, 'admin', '2016-02-09 12:08:14', 'Se registro un impuesto con la siguiente descripcion IMPUESTO POR LA TELEFONIA LOCAL', 'Impuesto', '::1'),
(49, 'admin', '2016-02-09 12:25:09', 'Se elimino un impuesto con la siguiente descripcion PRUEBA', 'Impuesto', '::1'),
(50, 'admin', '2016-02-09 15:02:39', 'Se agrego un usuario con su nombre completo:  JAIRO ERNESTO SIBRIAN SIBRIAN y su nickname: JAIRO.VELASQUEZ', 'Usuario', '::1'),
(51, 'admin', '2016-02-09 16:30:48', 'Se elimino un usuario con su nombre completo:  JAIRO ERNESTO  SIBRIAN SIBRIAN y su nickname: JAIRO.VELASQUEZ ', 'Usuario', '::1'),
(52, 'admin', '2016-02-11 16:24:27', 'Se registro un lote con su codigo C002 a un precio de : 4000 para la lotifiacion : San Bartolo', 'Lote', '::1'),
(53, 'admin', '2016-02-11 16:31:19', 'Se modifico un lote con su codigo C002 a un precio de : 4000 para la lotifiacion : San Bartolo', 'Lote', '::1'),
(54, 'admin', '2016-02-11 16:31:30', 'Se elimino un lote con su codigo  de un precio de :  para la lotifiacion : San Bartolo', 'Lote', '::1'),
(55, 'admin', '2016-02-11 16:39:05', 'Se registro un impuesto con la siguiente descripcion ', 'Impuesto', '::1'),
(56, 'admin', '2016-02-11 16:49:41', 'Se agrego un usuario con su nombre completo:  jose ernesto velasquez y su nickname: jose.ernesto', 'Usuario', '::1'),
(57, 'admin', '2016-02-11 16:50:12', 'Se modifico un usuario con su nombre completo:  JOSE JAIRO VELASQUEZ y su nickname: JOSE.JAIRO', 'Usuario', '::1'),
(58, 'admin', '2016-02-11 16:52:44', 'Se modifico un usuario con su nombre completo:  JOSE JAIRO VELASQUEZ y su nickname: JOSE.JAIRO', 'Usuario', '::1'),
(59, 'admin', '2016-02-11 16:53:06', 'Se modifico un usuario con su nombre completo:  JOSE JAIRO VELASQUEZ y su nickname: JOSE.JAIRO', 'Usuario', '::1'),
(60, 'admin', '2016-02-11 16:53:56', 'Se modifico un usuario con su nombre completo:  JOSE PINA VELASQUEZ y su nickname: JOSE.PINA', 'Usuario', '::1'),
(61, 'admin', '2016-02-11 16:54:23', 'Se modifico un usuario con su nombre completo:  JOSE PINA VELASQUEZ y su nickname: JOSE.PINA', 'Usuario', '::1'),
(62, 'admin', '2016-02-11 16:58:15', 'Se modifico un usuario con su nombre completo:  JOSE PINA VELASQUEZ y su nickname: JOSE.PINA', 'Usuario', '::1'),
(63, 'admin', '2016-02-12 20:36:37', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(64, 'admin', '2016-02-12 20:37:57', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(65, 'admin', '2016-02-12 20:39:36', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(66, 'admin', '2016-02-12 20:40:27', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(67, 'admin', '2016-02-12 20:44:51', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(68, 'admin', '2016-02-12 20:46:25', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(69, 'admin', '2016-02-12 20:47:37', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(70, 'admin', '2016-02-12 20:48:52', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASQUEZ y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(71, 'admin', '2016-02-12 20:51:26', 'Se modifico un usuario con su nombre completo:  JOSE ERNESTO VELASQUEZ y su nickname: JOSE.ERNESTO', 'Usuario', '::1'),
(72, 'admin', '2016-02-12 20:52:08', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASCO y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(73, 'admin', '2016-02-12 20:54:15', 'Se modifico un usuario con su nombre completo:  JOSE JUAN VELASCO y su nickname: JOSE.JUAN', 'Usuario', '::1'),
(74, 'admin', '2016-02-12 20:55:45', 'Se elimino un usuario con su nombre completo:  JOSE ERNESTO  VELASQUEZ y su nickname: JOSE.ERNESTO ', 'Usuario', '::1'),
(75, 'admin', '2016-02-12 22:06:14', 'Se hizo un backup de la base de datos', 'Sistema', '::1');


DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `CLIENTE_ID` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `MUNICIPIO_ID` int(11) NOT NULL,
  `PROFESIONES_ID` int(11) NOT NULL,
  `USER_NICK` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_NIT` char(14) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_APELLIDO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_EDAD` int(11) NOT NULL,
  `CLIENTE_DOMICILIO` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_TELEFONO` char(8) COLLATE utf8_spanish_ci NOT NULL,
  `CLIENTE_FECHANAC` date NOT NULL,
  `CLIENTE_FIRMA` char(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CLIENTE_ID`,`PROFESIONES_ID`,`USER_NICK`,`MUNICIPIO_ID`),
  KEY `FK_RELATIONSHIP_10` (`PROFESIONES_ID`),
  KEY `FK_RELATIONSHIP_13` (`USER_NICK`),
  KEY `FK_RELATIONSHIP_2` (`MUNICIPIO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `cliente`(`CLIENTE_ID`, `MUNICIPIO_ID`, `PROFESIONES_ID`, `USER_NICK`, `CLIENTE_NIT`, `CLIENTE_NOMBRE`, `CLIENTE_APELLIDO`, `CLIENTE_EDAD`, `CLIENTE_DOMICILIO`, `CLIENTE_TELEFONO`, `CLIENTE_FECHANAC`, `CLIENTE_FIRMA`) VALUES 
(50796106, 1, 1, 'admin', 55459656565662, 'JAIRO ERNESTO', 'VELASQUEZ SIBRIAN', 20, 'COLONIA SANTA EUGENIA POLIGONO C CASA 16 AGUILARES SAN SALVADOR', 72003590, '1994-11-21', 'SI'),
(50796107, 1, 1, 'admin', 65656565656565, 'JORGE ALBERTO', 'SIBRIAN GONZALES', 25, 'SAN SALVADOR', 72003590, '1992-08-05', 'SI');


DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE `cuenta` (
  `CUENTA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLIENTE_ID` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `IMPUESTO_ID` int(11) NOT NULL,
  `CUENTA_ESTADOS_ID` int(11) NOT NULL,
  `LOTE_ID` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTA_FECHA_CREADO` date NOT NULL,
  `CUENTA_FECHA_MODIFICADO` date DEFAULT NULL,
  `CUENTA_PLAZO` int(11) NOT NULL,
  PRIMARY KEY (`CUENTA_ID`,`LOTE_ID`,`CLIENTE_ID`,`IMPUESTO_ID`,`CUENTA_ESTADOS_ID`),
  KEY `FK_RELATIONSHIP_14` (`LOTE_ID`),
  KEY `FK_RELATIONSHIP_5` (`CLIENTE_ID`),
  KEY `FK_RELATIONSHIP_6` (`IMPUESTO_ID`),
  KEY `FK_RELATIONSHIP_7` (`CUENTA_ESTADOS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `cuenta`(`CUENTA_ID`, `CLIENTE_ID`, `IMPUESTO_ID`, `CUENTA_ESTADOS_ID`, `LOTE_ID`, `CUENTA_FECHA_CREADO`, `CUENTA_FECHA_MODIFICADO`, `CUENTA_PLAZO`) VALUES 
(5, 50796107, 1, 3, 'B001', '2016-02-05', '2016-02-06', 120);


DROP TABLE IF EXISTS `cuenta_estados`;
CREATE TABLE `cuenta_estados` (
  `CUENTA_ESTADOS_ID` int(2) NOT NULL AUTO_INCREMENT,
  `CUENTA_ESTADOS_NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTA_ESTADOS_DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CUENTA_ESTADOS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `cuenta_estados`(`CUENTA_ESTADOS_ID`, `CUENTA_ESTADOS_NOMBRE`, `CUENTA_ESTADOS_DESCRIPCION`) VALUES 
(1, 'ACTIVO', 'Pago Normal de un lote adquirido'),
(2, 'INACTIVO/MORA', 'Ya no pudo pagar porque cayo en mora y no se ha presentado a pagar'),
(3, 'INACTIVO/OLVIDADO', 'Cayo en mora y nunca se acerco a ver el estado de su cuenta');


DROP TABLE IF EXISTS `cuenta_pagos`;
CREATE TABLE `cuenta_pagos` (
  `CUENTA_PAGOS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUENTA_ID` int(11) NOT NULL,
  `CUENTA_PAGOS_FECHA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CUENTA_PAGOS_NUMRECIBO` int(11) NOT NULL,
  `CUENTA_PAGOS_INTERES` decimal(10,2) NOT NULL,
  `CUENTA_PAGOS_IVA` decimal(10,2) NOT NULL,
  `CUENTA_PAGOS_CAPITAL` decimal(10,2) NOT NULL,
  `CUENTA_PAGOS_DESCRIPCION` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CUENTA_PAGOS_ID`,`CUENTA_ID`),
  KEY `FK_RELATIONSHIP_8` (`CUENTA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `cuenta_pagos`(`CUENTA_PAGOS_ID`, `CUENTA_ID`, `CUENTA_PAGOS_FECHA`, `CUENTA_PAGOS_NUMRECIBO`, `CUENTA_PAGOS_INTERES`, `CUENTA_PAGOS_IVA`, `CUENTA_PAGOS_CAPITAL`, `CUENTA_PAGOS_DESCRIPCION`) VALUES 
(2, 5, '2016-02-06 19:25:18', 2147483647, 50.00, 23.01, 126.99, 'Exito');


DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `DEPARTAMENTO_ID` int(2) NOT NULL AUTO_INCREMENT,
  `DEPARTAMENTO_NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DEPARTAMENTO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `departamento`(`DEPARTAMENTO_ID`, `DEPARTAMENTO_NOMBRE`) VALUES 
(1, 'Chalatenango');


DROP TABLE IF EXISTS `impuesto`;
CREATE TABLE `impuesto` (
  `IMPUESTO_ID` int(5) NOT NULL AUTO_INCREMENT,
  `IMPUESTO_INTERES` decimal(5,2) NOT NULL,
  `IMPUESTO_IVA` decimal(5,2) NOT NULL,
  `IMPUESTO_DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IMPUESTO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `impuesto`(`IMPUESTO_ID`, `IMPUESTO_INTERES`, `IMPUESTO_IVA`, `IMPUESTO_DESCRIPCION`) VALUES 
(1, 0.15, 0.13, 'Tasa de interes del 15% segun contrato. tasa de iva del 13% segun ley Salvadore'),
(5, 0.10, 0.15, 'IMPUESTO POR LA TELEFONIA LOCAL');


DROP TABLE IF EXISTS `lote`;
CREATE TABLE `lote` (
  `LOTE_ID` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `LOTIFICACION_ID` int(11) NOT NULL,
  `POLIGONO_ID` int(11) NOT NULL,
  `LOTE_EXTENSION` decimal(7,2) NOT NULL,
  `LOTE_PRECIO` decimal(7,2) DEFAULT '0.00',
  `LOTE_EXTRA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `LOTE_ESTADO` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`LOTE_ID`,`POLIGONO_ID`,`LOTIFICACION_ID`),
  KEY `FK_RELATIONSHIP_15` (`POLIGONO_ID`),
  KEY `FK_RELATIONSHIP_4` (`LOTIFICACION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `lote`(`LOTE_ID`, `LOTIFICACION_ID`, `POLIGONO_ID`, `LOTE_EXTENSION`, `LOTE_PRECIO`, `LOTE_EXTRA`, `LOTE_ESTADO`) VALUES 
('B001', 1, 1, 52.50, 4000.00, 'NORMAL', 'PAGANDO'),
('B002', 1, 1, 50.00, 4000.00, 'NORMAL', 'LIBRE'),
('B003', 1, 1, 50.00, 4000.00, 'NORMAL', 'LIBRE'),
('C001', 3, 1, 25.00, 4000.00, 'NORMAL', 'LIBRE');


DROP TABLE IF EXISTS `lotificacion`;
CREATE TABLE `lotificacion` (
  `LOTIFICACION_ID` int(5) NOT NULL AUTO_INCREMENT,
  `LOTIFICACION_NOMBRE` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `LOTIFICACION_NLOTE` int(11) NOT NULL,
  `LOTIFICACION_PRECIO` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`LOTIFICACION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `lotificacion`(`LOTIFICACION_ID`, `LOTIFICACION_NOMBRE`, `LOTIFICACION_NLOTE`, `LOTIFICACION_PRECIO`) VALUES 
(1, 'San Bartolo', 88, 9234234.00),
(3, 'Chaparron', 200, 34000.00),
(4, 'Chilindrina', 50, 24000.00),
(5, 'Esparta', 300, 300000.00);


DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `MUNICIPIO_ID` int(3) NOT NULL AUTO_INCREMENT,
  `DEPARTAMENTO_ID` int(11) NOT NULL,
  `MUNICIPIO_NOMBRE` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`MUNICIPIO_ID`,`DEPARTAMENTO_ID`),
  KEY `FK_RELATIONSHIP_1` (`DEPARTAMENTO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `municipio`(`MUNICIPIO_ID`, `DEPARTAMENTO_ID`, `MUNICIPIO_NOMBRE`) VALUES 
(1, 1, 'San Miguel de Mercedes');


DROP TABLE IF EXISTS `poligono`;
CREATE TABLE `poligono` (
  `POLIGONO_ID` int(5) NOT NULL AUTO_INCREMENT,
  `POLIGONO_NUM` int(11) NOT NULL,
  PRIMARY KEY (`POLIGONO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `poligono`(`POLIGONO_ID`, `POLIGONO_NUM`) VALUES 
(1, 4),
(2, 8);


DROP TABLE IF EXISTS `profesiones`;
CREATE TABLE `profesiones` (
  `PROFESIONES_ID` int(5) NOT NULL AUTO_INCREMENT,
  `PROFESIONES_NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`PROFESIONES_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `profesiones`(`PROFESIONES_ID`, `PROFESIONES_NOMBRE`) VALUES 
(1, 'Lic. de Matematicas');


DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `USER_NICK` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `USER_CONTRASENA` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `USER_NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `USER_APELLIDO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `USER_NIVELACCESO` int(11) NOT NULL,
  PRIMARY KEY (`USER_NICK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario`(`USER_NICK`, `USER_CONTRASENA`, `USER_NOMBRE`, `USER_APELLIDO`, `USER_NIVELACCESO`) VALUES 
('admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Administrador', 'General', 1),
('marck.admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Administrador', 'General', 1),
('marck.administrativo', 'c3284d0f94606de1fd2af172aba15bf3', 'adminstrativo', 'administrativo', 3),
('marck.gerente', 'c3284d0f94606de1fd2af172aba15bf3', 'Usuario', 'Gerente', 2),
('marck.operador', 'c3284d0f94606de1fd2af172aba15bf3', 'operador', 'operador', 4);


ALTER TABLE bitacora
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`USER_NICK`) REFERENCES `usuario` (`USER_NICK`);

ALTER TABLE cliente
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`PROFESIONES_ID`) REFERENCES `profesiones` (`PROFESIONES_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`USER_NICK`) REFERENCES `usuario` (`USER_NICK`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`MUNICIPIO_ID`) REFERENCES `municipio` (`MUNICIPIO_ID`);

ALTER TABLE cuenta
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`LOTE_ID`) REFERENCES `lote` (`LOTE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`CLIENTE_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`IMPUESTO_ID`) REFERENCES `impuesto` (`IMPUESTO_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`CUENTA_ESTADOS_ID`) REFERENCES `cuenta_estados` (`CUENTA_ESTADOS_ID`);

ALTER TABLE cuenta_pagos
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`CUENTA_ID`) REFERENCES `cuenta` (`CUENTA_ID`);

ALTER TABLE lote
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`POLIGONO_ID`) REFERENCES `poligono` (`POLIGONO_ID`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`LOTIFICACION_ID`) REFERENCES `lotificacion` (`LOTIFICACION_ID`);

ALTER TABLE municipio
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`DEPARTAMENTO_ID`) REFERENCES `departamento` (`DEPARTAMENTO_ID`);