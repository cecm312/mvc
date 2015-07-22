-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2015 a las 20:38:45
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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `RFC` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Provincia` varchar(50) NOT NULL,
  `Forma_de_pago` varchar(50) NOT NULL,
  `Entidad_bancaria` varchar(50) NOT NULL,
  `Cuenta_bancaria` int(11) NOT NULL,
  `Codigo_postal` int(11) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Movil` varchar(10) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Direccion_web` varchar(100) NOT NULL,
  `Razon_social` varchar(100) NOT NULL,
  `Domicilio_fiscal` varchar(100) NOT NULL,
  `Observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `Nombre`, `RFC`, `Direccion`, `Localidad`, `Provincia`, `Forma_de_pago`, `Entidad_bancaria`, `Cuenta_bancaria`, `Codigo_postal`, `Telefono`, `Movil`, `Correo`, `Direccion_web`, `Razon_social`, `Domicilio_fiscal`, `Observacion`) VALUES
(1, 'Alejandro', 'ALEJ1234', 'direccion demo', 'localidad demo', 'Baja California', 'Tarjeta', 'Banamex', 123456789, 123456789, '123456789', '123456789', 'correo@demo', 'direccionweb.demo', 'razon demo', 'domicilio demo', 'observacion demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
