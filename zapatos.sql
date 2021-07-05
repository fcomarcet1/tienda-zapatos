-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2019 a las 18:28:25
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `zapatos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcarrito`
--

CREATE TABLE IF NOT EXISTS `tblcarrito` (
  `intContador` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `intCantidad` int(11) DEFAULT NULL,
  `intTransaccionEfectuada` int(11) DEFAULT '0',
  `intTalla` int(11) DEFAULT NULL,
  PRIMARY KEY (`intContador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `tblcarrito`
--

INSERT INTO `tblcarrito` (`intContador`, `idUsuario`, `idProducto`, `intCantidad`, `intTransaccionEfectuada`, `intTalla`) VALUES
(1, 2, 1, 1, 10, NULL),
(2, 2, 9, 1, 10, NULL),
(3, 2, 7, 1, 10, NULL),
(4, 2, 1, 1, 10, NULL),
(5, 2, 7, 1, 10, NULL),
(6, 2, 1, 1, 11, NULL),
(7, 2, 1, 1, 12, NULL),
(8, 2, 10, 1, 12, NULL),
(9, 2, 7, 1, 12, NULL),
(10, 2, 1, 1, 13, NULL),
(11, 2, 1, 1, 16, NULL),
(12, 2, 9, 1, 17, NULL),
(13, 2, 7, 1, 17, NULL),
(29, 2, 15, 6, 18, 41),
(30, 2, 1, 3, 0, 40),
(27, 2, 1, 13, 18, 40),
(31, 4, 1, 2, 19, 40),
(32, 4, 15, 2, 19, 39),
(33, 5, 1, 4, 20, 40),
(34, 5, 21, 1, 20, 41),
(35, 6, 21, 5, 22, 40),
(36, 6, 1, 1, 22, 40),
(37, 7, 15, 2, 24, 39),
(39, 7, 1, 1, 25, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE IF NOT EXISTS `tblcategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `strDescripcion` varchar(50) DEFAULT NULL,
  `idPadre` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`idCategoria`, `strDescripcion`, `idPadre`) VALUES
(1, 'Botas', 0),
(2, 'Sandalias', 0),
(3, 'De playa', 0),
(4, 'De montaña', 0),
(5, 'De camping', 0),
(6, 'Baratas', 1),
(7, 'Caras', 1),
(8, 'Nevada', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompra`
--

CREATE TABLE IF NOT EXISTS `tblcompra` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `fchCompra` datetime DEFAULT NULL,
  `intTipoPago` int(11) DEFAULT NULL,
  `dblTotal` double DEFAULT NULL,
  `intEstado` int(11) DEFAULT '0',
  PRIMARY KEY (`idCompra`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tblcompra`
--

INSERT INTO `tblcompra` (`idCompra`, `idUsuario`, `fchCompra`, `intTipoPago`, `dblTotal`, `intEstado`) VALUES
(11, 2, '2011-09-05 12:50:51', 2, 23.6, 0),
(12, 2, '2011-09-05 17:38:23', 2, 87.32, 2),
(13, 2, '2011-09-07 15:01:04', 2, 23.6, 2),
(16, 2, '2011-09-12 12:54:21', 3, 23.6, 0),
(17, 2, '2011-09-12 13:47:35', 1, 1098.58, 0),
(18, 2, '2011-12-09 19:17:15', 2, 693.84, 1),
(19, 4, '2019-05-09 22:54:30', 1, 614.68, 2),
(20, 5, '2019-05-10 13:03:00', 1, 242, 0),
(21, 5, '2019-05-10 13:03:35', 2, 242, 2),
(22, 6, '2019-05-10 14:15:22', 2, 750.2, 2),
(23, 6, '2019-05-10 14:16:19', 2, 750.2, 0),
(24, 7, '2019-05-10 18:19:54', 2, 1210, 1),
(25, 7, '2019-05-10 18:23:48', 1, 24.2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE IF NOT EXISTS `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(100) DEFAULT NULL,
  `strSEO` varchar(100) DEFAULT NULL,
  `dblPrecio` double DEFAULT NULL,
  `intEstado` int(11) DEFAULT NULL,
  `intCategoria` int(11) DEFAULT NULL,
  `strImagen` varchar(50) DEFAULT NULL,
  `intStock` int(11) DEFAULT NULL,
  `intOferta` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`idProducto`, `strNombre`, `strSEO`, `dblPrecio`, `intEstado`, `intCategoria`, `strImagen`, `intStock`, `intOferta`) VALUES
(1, 'Bota de Agua', 'bota-de-agua', 20, 1, 1, 'zapato1.jpg', 89, 1),
(9, 'Zapato Tacon', '987', 897, 1, 1, 'zapato2.jpg', 0, 0),
(8, 'Zapato standard', 'uih', 87, 1, 1, 'zapato3.jpg', 0, 0),
(7, 'Tacon Economico', 'bota-de-agua', 34, 1, 1, 'zapato4.jpg', 24, 1),
(10, 'Zapato azul', '897', 20, 1, 1, 'zapato5.jpg', 0, 0),
(12, 'Zapato 2', 'sdfsdf', 20, 1, 1, 'zapato5.jpg', 20, 0),
(13, 'Zapato 23', '234', 12, 1, 1, 'zapato5.jpg', 30, 1),
(15, 'Tacon Alto', '234', 500, 1, 5, '26118842-W-1.jpeg', 20, 1),
(19, 'Zapato 2', '423', 2, 1, 1, 'zapato5.jpg', 0, 0),
(20, 'Zapato 234', '4', 2, 1, 1, 'zapato5.jpg', 50, 1),
(21, 'botas blancas', '12', 120, 1, 2, '26128145-W-1.jpeg', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductotalla`
--

CREATE TABLE IF NOT EXISTS `tblproductotalla` (
  `idRelacion` int(11) NOT NULL AUTO_INCREMENT,
  `relProducto` int(11) DEFAULT NULL,
  `relTalla` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRelacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tblproductotalla`
--

INSERT INTO `tblproductotalla` (`idRelacion`, `relProducto`, `relTalla`) VALUES
(1, 15, 1),
(2, 15, 4),
(3, 15, 6),
(4, 1, 5),
(5, 21, 5),
(6, 21, 6),
(7, 13, 2),
(8, 13, 4),
(9, 13, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltallas`
--

CREATE TABLE IF NOT EXISTS `tbltallas` (
  `idTalla` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(10) DEFAULT NULL,
  `intAumento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTalla`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tbltallas`
--

INSERT INTO `tbltallas` (`idTalla`, `strNombre`, `intAumento`) VALUES
(1, '36', 0),
(2, '37', 0),
(3, '38', 2),
(4, '39', 2),
(5, '40', 3),
(6, '41', 5),
(7, '42', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE IF NOT EXISTS `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `strNombre` varchar(50) DEFAULT NULL,
  `strEmail` varchar(100) DEFAULT NULL,
  `intActivo` int(11) DEFAULT NULL,
  `strPassword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `strNombre`, `strEmail`, `intActivo`, `strPassword`) VALUES
(1, 'Pepe Luis', 'pepel@gmail.com', 1, NULL),
(2, 'Jorge Pepe', 'jorvidu2@gmail.com', 1, 'xxxx'),
(3, 'sdfsdf', 'sdfsdfs@sdfsdf.com', 1, 'wkejhwkjr'),
(4, 'Frank', 'fcomarcet1@gmail.com', 1, '1234'),
(5, 'frankz', 'fcomarcet2222@gmail.com', 1, '1234'),
(6, 'Lola', 'lola@gmail.com', 1, '1234'),
(7, 'aaagh', 'prueba1@gmail.com', 1, '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvariables`
--

CREATE TABLE IF NOT EXISTS `tblvariables` (
  `idContador` int(11) NOT NULL AUTO_INCREMENT,
  `intIVA` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tblvariables`
--

INSERT INTO `tblvariables` (`idContador`, `intIVA`) VALUES
(1, 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
