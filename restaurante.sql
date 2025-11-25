-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2025 a las 11:55:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(6, 'Carnes'),
(8, 'Mariscos'),
(9, 'Bebidas'),
(11, 'Pescados'),
(12, 'Postres'),
(13, 'Tapas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

DROP TABLE IF EXISTS `mesa`;
CREATE TABLE `mesa` (
  `num` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0-Vacía 1-Ocupada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`num`, `estado`) VALUES
(1, 1),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '1-En curso 2-Pagado',
  `dni` varchar(255) NOT NULL,
  `numMesa` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `numComensales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `estado`, `dni`, `numMesa`, `fecha`, `hora`, `numComensales`) VALUES
(897, 2, '12345678A', 1, '20:11:2025', '13:39:55', 3),
(898, 2, '12345678A', 1, '20:11:2025', '13:47:51', 3),
(899, 1, '12345678A', 1, '23:11:2025', '13:33:03', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoproducto`
--

DROP TABLE IF EXISTS `pedidoproducto`;
CREATE TABLE `pedidoproducto` (
  `idLinea` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0-En curso 1-Entregado',
  `comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidoproducto`
--

INSERT INTO `pedidoproducto` (`idLinea`, `idPedido`, `idProducto`, `cantidad`, `estado`, `comentario`) VALUES
(39, 895, 18, 2, 0, ''),
(40, 895, 19, 1, 0, ''),
(41, 895, 31, 1, 0, ''),
(42, 895, 33, 2, 0, ''),
(43, 895, 18, 10, 0, ''),
(44, 896, 18, 1, 0, ''),
(45, 896, 19, 2, 0, ''),
(46, 897, 18, 1, 1, ''),
(47, 897, 19, 1, 1, ''),
(48, 898, 18, 1, 1, ''),
(49, 898, 19, 1, 1, ''),
(50, 898, 18, 1, 1, ''),
(51, 898, 19, 2, 1, 'Con hielo'),
(52, 898, 31, 1, 1, ''),
(53, 898, 32, 1, 1, ''),
(54, 898, 33, 1, 1, ''),
(55, 899, 18, 1, 0, ''),
(56, 899, 19, 1, 0, 'Con hielo'),
(57, 899, 31, 1, 0, ''),
(58, 899, 32, 2, 0, ''),
(59, 899, 33, 3, 0, ''),
(60, 899, 18, 1, 0, ''),
(61, 899, 19, 1, 0, ''),
(62, 899, 31, 1, 0, ''),
(63, 899, 33, 1, 0, ''),
(64, 899, 18, 1, 0, ''),
(65, 899, 19, 2, 0, ''),
(66, 899, 31, 1, 0, ''),
(67, 899, 33, 1, 0, ''),
(68, 899, 18, 1, 0, ''),
(69, 899, 18, 1, 0, ''),
(70, 899, 18, 3, 0, ''),
(71, 899, 18, 2, 0, ''),
(72, 899, 19, 1, 0, ''),
(73, 899, 31, 1, 0, ''),
(74, 899, 33, 3, 0, ''),
(75, 899, 18, 1, 0, ''),
(76, 899, 19, 1, 0, ''),
(77, 899, 31, 2, 0, ''),
(78, 899, 18, 3, 0, ''),
(79, 899, 19, 1, 0, 'Con hielo'),
(80, 899, 31, 1, 0, ''),
(81, 899, 33, 2, 0, ''),
(82, 899, 19, 2, 0, ''),
(83, 899, 31, 1, 0, ''),
(84, 899, 33, 3, 0, ''),
(85, 899, 19, 2, 0, 'Con hielo'),
(86, 899, 31, 1, 0, ''),
(87, 899, 33, 3, 0, ''),
(88, 899, 33, 1, 0, 'asasasasasasasasasasas'),
(89, 899, 31, 1, 0, 'asasasasasasasasasasas'),
(90, 899, 19, 1, 0, '012345678901234567890123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0-Normal 1-Deshabilitado',
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `estado`, `categoria`) VALUES
(18, 'Filete de ternera', 5.00, 0, 0, 6),
(19, 'Coca-Cola', 2.00, 42, 0, 9),
(20, 'Fanta ', 1.00, 0, 0, 9),
(21, 'Calamares', 7.00, 0, 0, 8),
(22, 'Tarta de queso', 6.00, 0, 0, 12),
(23, 'Marinera', 0.00, 0, 0, 13),
(31, 'CafÃ©', 2.00, 38, 0, 9),
(32, 'Hamburguesa', 4.00, 0, 0, 6),
(33, 'SalmÃ³n', 7.50, 3, 0, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `dni` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL COMMENT '0-Usuario 1-Camarero 2-Encargado',
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0-Normal 1-Bloqueado',
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `rol`, `email`, `telefono`, `direccion`, `estado`, `contrasena`) VALUES
('12345678A', 'cliente cliente', 0, 'cliente@restaurante.com', '123123123', 'cliente', 0, '1234'),
('12345678B', 'camarero camarero', 1, 'camarero@restaurante.com', '123123123', 'camarero', 0, '1234'),
('12345678C', 'encargado encargado', 2, 'encargado@restaurante.com', '123123123', 'encargado', 0, '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`num`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numMesa` (`numMesa`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD PRIMARY KEY (`idLinea`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=900;

--
-- AUTO_INCREMENT de la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  MODIFY `idLinea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`numMesa`) REFERENCES `mesa` (`num`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoproducto`
--
ALTER TABLE `pedidoproducto`
  ADD CONSTRAINT `pedidoproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
