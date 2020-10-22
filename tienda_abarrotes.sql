-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2020 a las 00:47:37
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_abarrotes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearfactura` (IN `N_idusuario` INT, IN `N_total` INT)  INSERT INTO factura (fecha, id_usuario, total)values(curdate(), N_idusuario, N_total)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `detallado` (IN `N_idproducto` INT, IN `N_nombre` VARCHAR(50), IN `N_cant` INT, IN `N_sub` INT)  INSERT INTO detalle_fac(id_factu,id_produc,nombre, cant, subtotal)SELECT max(id),N_idproducto,N_nombre, N_cant,N_sub FROM factura$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_producto` int(100) NOT NULL,
  `id_proveedores` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fac`
--

CREATE TABLE `detalle_fac` (
  `id_factu` int(100) NOT NULL,
  `id_produc` int(100) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cant` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_fac`
--

INSERT INTO `detalle_fac` (`id_factu`, `id_produc`, `nombre`, `cant`, `subtotal`) VALUES
(5, 1, 'coca cola', 9, 27000),
(5, 3, 'arroz', 5, 2500),
(6, 1, 'coca cola', 9, 27000),
(6, 2, 'azucar', 1, 6000),
(6, 3, 'arroz', 6, 3000),
(7, 1, 'coca cola', 8, 24000),
(7, 3, 'arroz', 3, 1500),
(8, 1, 'coca cola', 8, 24000),
(8, 2, 'azucar', 1, 6000),
(8, 3, 'arroz', 3, 1500),
(9, 1, 'coca cola', 8, 24000),
(9, 2, 'azucar', 2, 12000),
(9, 3, 'arroz', 3, 1500),
(10, 1, 'coca cola', 8, 24000),
(10, 2, 'azucar', 2, 12000),
(10, 3, 'arroz', 4, 2000),
(11, 2, 'azucar', 1, 6000),
(11, 3, 'arroz', 2, 1000),
(12, 1, 'coca cola', 54, 162000),
(12, 2, 'azucar', 70, 420000),
(13, 2, 'azucar', 1, 6000),
(13, 3, 'arroz', 1, 500),
(14, 1, 'coca cola', 1, 3000),
(14, 2, 'azucar', 1, 6000),
(15, 2, 'azucar', 5, 30000),
(16, 1, 'coca cola', 1, 3000),
(17, 1, 'coca cola', 1, 3000),
(17, 2, 'azucar', 1, 6000),
(17, 3, 'arroz', 1, 500),
(18, 2, 'azucar', 1, 6000),
(19, 2, 'azucar', 5, 30000),
(19, 3, 'arroz', 4, 2000),
(19, 4, 'chcocolate', 2, 4000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(100) NOT NULL,
  `fecha` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` int(100) NOT NULL,
  `estado` enum('Pagado','No pagado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `id_usuario`, `total`, `estado`) VALUES
(2, '2017-09-29', 2147483647, 5500, 'Pagado'),
(3, '2017-09-29', 2147483647, 29500, 'Pagado'),
(4, '2017-09-29', 2147483647, 29500, 'Pagado'),
(5, '2017-09-29', 2147483647, 29500, 'Pagado'),
(6, '2017-09-29', 2147483647, 36000, 'Pagado'),
(7, '2017-09-29', 2147483647, 4500, 'Pagado'),
(8, '2017-09-29', 2147483647, 31500, 'Pagado'),
(9, '2017-09-29', 2147483647, 37500, 'Pagado'),
(10, '2017-09-29', 2147483647, 38000, 'Pagado'),
(11, '2017-09-29', 2147483647, 7000, 'Pagado'),
(12, '2017-09-29', 2147483647, 168000, 'Pagado'),
(15, '2018-10-22', 2147483647, 6000, 'Pagado'),
(16, '2020-10-22', 2147483647, 3000, 'Pagado'),
(17, '2020-10-22', 2147483647, 9500, 'Pagado'),
(18, '2020-10-22', 7676, 6000, 'Pagado'),
(19, '2020-10-22', 2147483647, 8500, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `cedula` int(100) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(100) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipousu` int(100) NOT NULL,
  `claveusu` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cedula`, `nombre`, `apellido`, `direccion`, `telefono`, `correo`, `tipousu`, `claveusu`) VALUES
(7676, 'Juan', 'Garcia', 'Itagui', 897, 'juanesbond007@hotmail.com', 1, '123'),
(1001457229, 'Alvaro', 'Garzon', 'itagüi', 911, 'alvaro@gmail.com', 2, '1001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `cantidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio_compra` int(100) NOT NULL,
  `precio_venta` int(100) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `cantidad`, `precio_compra`, `precio_venta`, `imagen`) VALUES
(1, 'coca cola', '1', 2000, 3000, 'photo/coca.jpg'),
(2, 'azucar', '1', 5000, 6000, 'photo/azucar.jpg'),
(3, 'arroz', '1', 2000, 500, 'photo/arroz.jpg'),
(4, 'chcocolate', '10', 1000, 2000, 'photo/descarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(100) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_producto`,`id_proveedores`);

--
-- Indices de la tabla `detalle_fac`
--
ALTER TABLE `detalle_fac`
  ADD PRIMARY KEY (`id_factu`,`id_produc`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cedula`,`correo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
