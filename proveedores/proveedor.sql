-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2015 a las 05:42:18
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

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
  `id` int(11) NOT NULL,
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
  `direccion_web` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `rfc`, `direccion`, `localidad`, `estado`, `entidad_bancaria`, `cuenta_bancaria`, `codigo_postal`, `telefono`, `movil`, `correo_electronico`, `direccion_web`) VALUES
(6, '2', '1', '2', '2', 2, 2, 2, 2, 2, 2, '2', '2'),
(8, 'asdads', 'adsasd', 'asdasd', 'asdasd', 2, 2, 123123, 123123, 123123, 111, 'cfgcfgcgf', 'hghgvhgv'),
(9, 'Pablito company', 'PAB123', 'Cancun', 'Cancun', 3, 2, 1231231312, 77500, 8198237812, 123198313, 'pablito@hotmail.com', 'pablito.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfc` (`rfc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
