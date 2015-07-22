-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-07-2015 a las 19:16:57
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
  `direccion_web` varchar(100) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observaciones` longtext NOT NULL,
  `estatus` tinyint(4) NOT NULL,
  `contacto` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `rfc`, `direccion`, `localidad`, `estado`, `entidad_bancaria`, `cuenta_bancaria`, `codigo_postal`, `telefono`, `movil`, `correo_electronico`, `direccion_web`, `fecha_alta`, `observaciones`, `estatus`, `contacto`) VALUES
(6, '2', '1', '2', '2', 2, 2, 2, 2, 2, 2, '2', '2', '2015-07-21 00:21:01', '', 0, ''),
(8, 'asdads', 'adsasd', 'asdasd', 'asdasd', 2, 2, 123123, 123123, 123123, 111, 'cfgcfgcgf', 'hghgvhgv', '2015-07-21 00:21:01', '', 0, ''),
(9, 'Pablito company', 'PAB123', 'Cancun', 'Cancun', 3, 2, 1231231312, 77500, 8198237812, 123198313, 'pablito@hotmail.com', 'pablito.com', '2015-07-21 00:21:01', '', 0, ''),
(10, 'Nuevo', 'NUEVO123', 'A', 'A', 4, 3, 12313123, 123123, 123131, 12313, 'DEMO@hotmail.com', 'www.demo.mx', '2015-01-01 06:00:00', 'asdasd', 1, 'Sr. Demo'),
(11, '0', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '2015-07-22 06:17:17', '', 0, ''),
(15, 'CARLOSCHAN', 'CARC9', 'MI CASA', 'PUERTO MORELOS', 2, 2, 123123132, 131313, 131313, 12313123, 'lotengo@hotmail.com', 'midireccion@homai.co', '2014-01-01 06:00:00', 'es bueno', 1, 'Jose Esponosa'),
(16, 'wdfsfsad', 'asdad', '', '', 1, 1, 0, 0, 0, 0, '', '', '2015-12-01 05:00:00', '', 1, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
