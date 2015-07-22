-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2015 a las 20:03:45
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `itic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `entidad_bancaria` tinyint(4) NOT NULL,
  `cuenta_bancaria` bigint(20) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `movil` bigint(20) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `direccion_web` varchar(100) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observaciones` longtext NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `rfc`, `direccion`, `localidad`, `estado`, `entidad_bancaria`, `cuenta_bancaria`, `codigo_postal`, `telefono`, `movil`, `correo_electronico`, `direccion_web`, `fecha_alta`, `observaciones`, `estatus`, `contacto`) VALUES
(2, 'carlos chan', 'CARC9790', 'su casa', 'su localidad', 2, 2, 123456789, 77500, 9982049830, 9982049830, 'carlos@micorreo.com', 'carlos.com', '2015-07-22 17:50:55', 'Buen proveedor', 2, 'Sr. Carlos'),
(3, 'Jardiel Enterprise', 'JARD1234', 'Casa Jardiel', 'Localidad Jardiel', 4, 4, 123456789, 77500, 99813476115, 99813476115, 'jardiel@correo.com', 'jardiel.com', '2015-07-22 17:41:38', 'Buen proveedor', 1, 'sr. Jardiel'),
(4, 'Empresa Martin', 'MART1234', 'Casa Martin', 'Localidad Martin', 3, 2, 123456789, 77500, 9988774455, 9988774455, 'martin@correo.com', 'martin.com', '2015-07-22 05:00:00', 'Es un mal proveedor pero tiene un producto unico', 1, 'Sr. Martin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
