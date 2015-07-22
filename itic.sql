/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : itic

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-07-22 15:00:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articulos
-- ----------------------------
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `iva` float NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `stock_max` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `preciocompra` double NOT NULL,
  `precioalmacen` double NOT NULL,
  `preciotienda` double NOT NULL,
  `fechaalta` date NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articulos
-- ----------------------------
INSERT INTO `articulos` VALUES ('3', 'ART1', '', 'descripcion', '10', 'Sur', '1', '100', 'asdads', '100', '100', '100', '2015-07-22', 'provaiders');

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('2', 'Alejandro2', 'ALEJ12342', 'direccion demo2', 'localidad demo2', 'Queretaro', 'Credito', 'Santander', '1234567892', '1234567892', '1234567892', '1234567892', 'correo@demo.com', 'pagina.demo.com2', 'razondemo2', 'domiciliodemo2', 'observaciondemo2');

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES ('2', 'carlos chan', 'CARC9790', 'su casa', 'su localidad', '2', '2', '123456789', '77500', '9982049830', '9982049830', 'carlos@micorreo.com', 'carlos.com', '2015-07-22 12:50:55', 'Buen proveedor', '2', 'Sr. Carlos');
INSERT INTO `proveedor` VALUES ('3', 'Jardiel Enterprise', 'JARD1234', 'Casa Jardiel', 'Localidad Jardiel', '4', '4', '123456789', '77500', '99813476115', '99813476115', 'jardiel@correo.com', 'jardiel.com', '2015-07-22 12:41:38', 'Buen proveedor', '1', 'sr. Jardiel');
INSERT INTO `proveedor` VALUES ('4', 'Empresa Martin', 'MART1234', 'Casa Martin', 'Localidad Martin', '3', '2', '123456789', '77500', '9988774455', '9988774455', 'martin@correo.com', 'martin.com', '2015-07-22 00:00:00', 'Es un mal proveedor pero tiene un producto unico', '1', 'Sr. Martin');
