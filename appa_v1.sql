/*
Navicat MySQL Data Transfer

Source Server         : Kathia
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : appa

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-12-05 17:09:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `idadministrador` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `facebook` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(8) NOT NULL,
  PRIMARY KEY (`idadministrador`),
  KEY `idlogin` (`idusuario`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of administrador
-- ----------------------------

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) NOT NULL AUTO_INCREMENT,
  `nombres_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `iddistrito` int(10) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `iddistrito` (`iddistrito`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('2', 'Rosa Sanchez', '963852143', 'Jr. Las Palmeras', '1');
INSERT INTO `cliente` VALUES ('3', 'Esther Bolaños', '946865959', 'Av. Caj sur Nª 87', '1');
INSERT INTO `cliente` VALUES ('4', 'sc', 'scs', 'scs', '1');
INSERT INTO `cliente` VALUES ('5', 'JOJOJO', 'scs', 'scs', '1');
INSERT INTO `cliente` VALUES ('6', 'eeee', 'sdcds', 'sdcs', '1');

-- ----------------------------
-- Table structure for cliente_mayor
-- ----------------------------
DROP TABLE IF EXISTS `cliente_mayor`;
CREATE TABLE `cliente_mayor` (
  `idclientemayor` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `iddistrito` int(10) NOT NULL,
  `idusuario` int(8) NOT NULL,
  PRIMARY KEY (`idclientemayor`),
  KEY `iddistrito` (`iddistrito`),
  KEY `idlogin` (`idusuario`),
  CONSTRAINT `cliente_mayor_ibfk_1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliente_mayor_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of cliente_mayor
-- ----------------------------

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `iddepartamento` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('1', 'San Martín');
INSERT INTO `departamento` VALUES ('2', 'Ancash');

-- ----------------------------
-- Table structure for detalle_evento_distrito
-- ----------------------------
DROP TABLE IF EXISTS `detalle_evento_distrito`;
CREATE TABLE `detalle_evento_distrito` (
  `idevento` int(10) NOT NULL,
  `iddistrito` int(10) NOT NULL,
  KEY `idevento` (`idevento`,`iddistrito`),
  KEY `iddistrito` (`iddistrito`),
  CONSTRAINT `detalle_evento_distrito_ibfk_1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_evento_distrito_ibfk_2` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detalle_evento_distrito
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_evento_tarifa
-- ----------------------------
DROP TABLE IF EXISTS `detalle_evento_tarifa`;
CREATE TABLE `detalle_evento_tarifa` (
  `idtarifa` int(10) NOT NULL,
  `idevento` int(10) NOT NULL,
  KEY `idevento` (`idevento`),
  KEY `idtarifa` (`idtarifa`),
  CONSTRAINT `detalle_evento_tarifa_ibfk_1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_evento_tarifa_ibfk_2` FOREIGN KEY (`idtarifa`) REFERENCES `tarifas` (`idtarifa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detalle_evento_tarifa
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_evento_trabajador
-- ----------------------------
DROP TABLE IF EXISTS `detalle_evento_trabajador`;
CREATE TABLE `detalle_evento_trabajador` (
  `idevento` int(10) NOT NULL,
  `idtrabajador` int(10) NOT NULL,
  KEY `idevento` (`idevento`,`idtrabajador`),
  KEY `idtrabajador` (`idtrabajador`),
  CONSTRAINT `detalle_evento_trabajador_ibfk_1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_evento_trabajador_ibfk_2` FOREIGN KEY (`idtrabajador`) REFERENCES `trabajador` (`idtrabajador`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detalle_evento_trabajador
-- ----------------------------

-- ----------------------------
-- Table structure for distrito
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `iddistrito` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_distrito` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idprovincia` int(10) NOT NULL,
  PRIMARY KEY (`iddistrito`),
  KEY `idprovincia` (`idprovincia`),
  CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('1', 'Calzada', '1');

-- ----------------------------
-- Table structure for estado_ticket
-- ----------------------------
DROP TABLE IF EXISTS `estado_ticket`;
CREATE TABLE `estado_ticket` (
  `idestadoticket` int(10) NOT NULL AUTO_INCREMENT,
  `estado_ticket` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idestadoticket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of estado_ticket
-- ----------------------------
INSERT INTO `estado_ticket` VALUES ('1', 'Libre');
INSERT INTO `estado_ticket` VALUES ('2', 'Vendido');

-- ----------------------------
-- Table structure for evento
-- ----------------------------
DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `idevento` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_evento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idusuario` int(10) NOT NULL,
  `idpago` int(10) NOT NULL,
  PRIMARY KEY (`idevento`),
  KEY `idpago` (`idpago`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`idpago`) REFERENCES `pago` (`idpago`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evento_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `cliente_mayor` (`idclientemayor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of evento
-- ----------------------------

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `idpadre` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `icono` varchar(50) NOT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=655 COMMENT='InnoDB free: 11264 kB';

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', null, 'EVENTOS', 'evento', '1', '1', 'glyphicon glyphicon-earphone');
INSERT INTO `modulo` VALUES ('2', null, 'TRABAJADOR', 'trabajador', '1', '1', '');
INSERT INTO `modulo` VALUES ('3', null, 'REPORTES', 'reportes', '1', '1', '');
INSERT INTO `modulo` VALUES ('4', null, 'REPARTIDOR', 'repartidor/index', '1', '1', '');

-- ----------------------------
-- Table structure for pago
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `idpago` int(10) NOT NULL AUTO_INCREMENT,
  `idtipopago` int(10) NOT NULL,
  `num_identificacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idpago`),
  KEY `idtipopago` (`idtipopago`),
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idtipopago`) REFERENCES `tipo_pago` (`idtipopago`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of pago
-- ----------------------------
INSERT INTO `pago` VALUES ('1', '1', '232541');

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=8192 COMMENT='InnoDB free: 11264 kB';

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'administrador', '1');
INSERT INTO `perfil` VALUES ('2', 'cliente_mayor', '1');
INSERT INTO `perfil` VALUES ('3', 'trabajador', '1');
INSERT INTO `perfil` VALUES ('4', 'repartidor', '1');

-- ----------------------------
-- Table structure for permiso
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `idmodulo` int(11) NOT NULL,
  `idperfil` int(11) NOT NULL,
  `acceder` tinyint(1) DEFAULT '0',
  `anadir` tinyint(1) DEFAULT '0',
  `editar` tinyint(1) DEFAULT '0',
  `eliminar` tinyint(1) DEFAULT '0',
  `imprimir` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idmodulo`,`idperfil`),
  KEY `Ref_permiso_to_perfil` (`idperfil`) USING BTREE,
  CONSTRAINT `Ref_permiso_to_modulo` FOREIGN KEY (`idmodulo`) REFERENCES `modulo` (`idmodulo`),
  CONSTRAINT `Ref_permiso_to_perfil` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=381 COMMENT='InnoDB free: 11264 kB; (`idmodulo`) REFER `bdgilmer/modulo`(';

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('1', '2', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('2', '1', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('2', '2', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('3', '1', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('3', '2', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('4', '3', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for provincia
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `idprovincia` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_provincia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `iddepartamento` int(10) NOT NULL,
  PRIMARY KEY (`idprovincia`),
  KEY `iddepartamento` (`iddepartamento`),
  CONSTRAINT `provincia_ibfk_2` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES ('1', 'Moyobamba', '1');

-- ----------------------------
-- Table structure for tarifas
-- ----------------------------
DROP TABLE IF EXISTS `tarifas`;
CREATE TABLE `tarifas` (
  `idtarifa` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion_tarifa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio_tarifa` double NOT NULL,
  PRIMARY KEY (`idtarifa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tarifas
-- ----------------------------
INSERT INTO `tarifas` VALUES ('1', '100 - 150', '50');

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `idticket` int(10) NOT NULL AUTO_INCREMENT,
  `numero_ticket` int(10) NOT NULL,
  `idevento` int(10) NOT NULL,
  `idcliente` int(10) NOT NULL,
  `idestadoticket` int(10) NOT NULL,
  PRIMARY KEY (`idticket`),
  KEY `idevento` (`idevento`,`idcliente`,`idestadoticket`),
  KEY `idcliente` (`idcliente`),
  KEY `idestadoticket` (`idestadoticket`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idestadoticket`) REFERENCES `estado_ticket` (`idestadoticket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of ticket
-- ----------------------------

-- ----------------------------
-- Table structure for tipo_pago
-- ----------------------------
DROP TABLE IF EXISTS `tipo_pago`;
CREATE TABLE `tipo_pago` (
  `idtipopago` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tipo_pago
-- ----------------------------
INSERT INTO `tipo_pago` VALUES ('1', 'Efectivo');
INSERT INTO `tipo_pago` VALUES ('2', 'Tarjeta de Crédito');

-- ----------------------------
-- Table structure for tipo_trabajador
-- ----------------------------
DROP TABLE IF EXISTS `tipo_trabajador`;
CREATE TABLE `tipo_trabajador` (
  `idtipotrabajador` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipotrabajador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tipo_trabajador
-- ----------------------------
INSERT INTO `tipo_trabajador` VALUES ('1', 'Repartidor');
INSERT INTO `tipo_trabajador` VALUES ('2', 'Vendedor');

-- ----------------------------
-- Table structure for trabajador
-- ----------------------------
DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE `trabajador` (
  `idtrabajador` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(10) NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idtipotrabajador` int(10) NOT NULL,
  `idusuario` int(8) NOT NULL,
  PRIMARY KEY (`idtrabajador`),
  KEY `idtipotrabajador` (`idtipotrabajador`),
  KEY `idlogin` (`idusuario`),
  CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`idtipotrabajador`) REFERENCES `tipo_trabajador` (`idtipotrabajador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trabajador_ibfk_3` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of trabajador
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(8) NOT NULL,
  `idperfil` int(11) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idperfil` (`idperfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192 COMMENT='InnoDB free: 11264 kB; (`idoficina`) REFER `bdgilmer/oficina';

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', 'admin', '123', '1');
INSERT INTO `usuario` VALUES ('2', '2', 'clienmay', '456', '1');
INSERT INTO `usuario` VALUES ('3', '3', 'trab', '789', '1');

-- ----------------------------
-- View structure for view_menuhijos
-- ----------------------------
DROP VIEW IF EXISTS `view_menuhijos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_menuhijos` AS select `m`.`idmodulo` AS `idmodulo`,`m`.`idpadre` AS `idpadre`,`m`.`descripcion` AS `descripcion`,`m`.`url` AS `url`,`m`.`icono` AS `icono`,`p`.`idperfil` AS `idperfil` from (`modulo` `m` join `permiso` `p` on((`m`.`idmodulo` = `p`.`idmodulo`))) where ((`m`.`estado` = 1) and (`p`.`acceder` = 1)) order by `m`.`orden` ;

-- ----------------------------
-- View structure for view_menupadres
-- ----------------------------
DROP VIEW IF EXISTS `view_menupadres`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_menupadres` AS select `m`.`idmodulo` AS `idmodulo`,`m`.`idpadre` AS `idpadre`,`m`.`descripcion` AS `descripcion`,`m`.`url` AS `url`,`m`.`icono` AS `icono`,`p`.`idperfil` AS `idperfil` from (`modulo` `m` join `permiso` `p` on((`m`.`idmodulo` = `p`.`idmodulo`))) where ((`m`.`estado` = 1) and isnull(`m`.`idpadre`) and (`p`.`acceder` = 1)) order by `m`.`orden` ;

-- ----------------------------
-- View structure for vista_modulo
-- ----------------------------
DROP VIEW IF EXISTS `vista_modulo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vista_modulo` AS select `modulo`.`idmodulo` AS `idmodulo`,`modulo`.`descripcion` AS `descripcion` from `modulo` where isnull(`modulo`.`idpadre`) ;
