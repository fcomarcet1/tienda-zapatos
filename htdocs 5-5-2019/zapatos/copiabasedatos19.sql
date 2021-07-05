/*

MySQL Data Transfer
Source Host: localhost
Source Database: zapatos
Target Host: localhost
Target Database: zapatos
Date: 04/07/2011 17:46:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for tblcategoria
-- ----------------------------
CREATE TABLE `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strDescripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tblproducto
-- ----------------------------
CREATE TABLE `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(100) DEFAULT NULL,
  `strSEO` varchar(100) DEFAULT NULL,
  `dblPrecio` double DEFAULT NULL,
  `intEstado` int(11) DEFAULT NULL,
  `intCategoria` int(11) DEFAULT NULL,
  `strImagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for tblusuario
-- ----------------------------
CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) DEFAULT NULL,
  `strEmail` varchar(100) DEFAULT NULL,
  `intActivo` int(11) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `tblcategoria` VALUES ('1', 'Botas');
INSERT INTO `tblcategoria` VALUES ('2', 'Sandalias');
INSERT INTO `tblcategoria` VALUES ('3', 'De playa');
INSERT INTO `tblcategoria` VALUES ('4', 'De montaña');
INSERT INTO `tblproducto` VALUES ('1', 'Bota de Agua', 'bota-de-agua', '20', '1', '1', 'zapato1.jpg');
INSERT INTO `tblproducto` VALUES ('9', 'Zapato Tacon', '987', '897', '1', '1', 'zapato2.jpg');
INSERT INTO `tblproducto` VALUES ('8', 'Zapato standard', 'uih', '87', '1', '1', 'zapato3.jpg');
INSERT INTO `tblproducto` VALUES ('7', 'Tacon Economico', 'bota-de-agua', '34', '1', '1', 'zapato4.jpg');
INSERT INTO `tblproducto` VALUES ('10', 'Zapato azul', '897', '20', '1', '1', 'zapato5.jpg');
INSERT INTO `tblusuario` VALUES ('1', 'Pepe Luis', 'pepel@gmail.com', '1', null);
INSERT INTO `tblusuario` VALUES ('2', 'Jorge Pepe', 'jorvidu2@gmail.com', '1', 'xxxx');
INSERT INTO `tblusuario` VALUES ('3', 'sdfsdf', 'sdfsdfs@sdfsdf.com', '1', 'wkejhwkjr');
