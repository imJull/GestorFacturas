-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2019 a las 00:50:28
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestfacturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `compania` varchar(255) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `info` text,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `compania`, `nombre`, `apellido`, `info`, `email`, `telefono`, `creado`, `modificado`) VALUES
(1, 'Undefined', 'JP', 'Armani', 'Blah blah bñah', 'armani@jp.es', '88890020', NULL, NULL),
(2, 'Dext Malvados y Asociados', 'Jay', 'Dav', '', 'asdad@as.net', '88890022', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `titulo`, `creado`, `modificado`) VALUES
(1, 'Deportivos', NULL, NULL),
(2, 'Hogar', '2018-07-18 18:17:00', NULL),
(3, 'Escolar', '2018-06-16 14:14:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `lugar_id` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `productos` text,
  `lanzamiento` datetime DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `user_id`, `cliente_id`, `lugar_id`, `titulo`, `descripcion`, `productos`, `lanzamiento`, `creado`, `modificado`) VALUES
(1, 1, 1, 3, 'Deportivos Articulos', 'Compra de articulos deportivos', 'Raqueta\r\nBola de tenis\r\nZapatillas de Tenis', NULL, NULL, NULL),
(2, 2, 1, 3, 'Compra Mesas', 'Se compraron mesas para remdelacion de la casa. Y de mas cosas', 'Meass\r\nSillas\r\nTornillos martloo', NULL, '2019-08-30 14:15:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_etiquetas`
--

CREATE TABLE `facturas_etiquetas` (
  `factura_id` int(11) NOT NULL,
  `etiqueta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas_etiquetas`
--

INSERT INTO `facturas_etiquetas` (`factura_id`, `etiqueta_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `nombre`, `creado`, `modificado`) VALUES
(1, 'San Jose', NULL, NULL),
(2, 'Alajuela', NULL, NULL),
(3, 'Limon', NULL, NULL),
(4, 'Heredia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `factura_id`, `user_id`, `titulo`, `texto`, `creado`, `modificado`) VALUES
(1, 2, 2, 'Faltante', 'Faltaron algunos tornillos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `bio` text,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `modificado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `bio`, `email`, `password`, `creado`, `modificado`) VALUES
(1, 'Dexter', 'Famous', 'Administrador... Amante de los deportes.', 'migo@dex.net', '$2y$10$6uRP15wSfztNQUJaRKHBCu.kL3Q8wWdCKVL2SL9pdn1mVNpe/ZjLi', '2019-08-11 08:20:00', NULL),
(2, 'El Loco', 'Bill', 'Vuelto locoo!', 'bil@loco.net', '$2y$10$CQ/A1bENQ74LUxROu5xICOnSvpkRc71HlNbIyahPft9h7JSYv4diy', '2019-08-08 17:19:00', NULL),
(3, 'Edd', 'Eddy', 'sfdhuojskl', 'ed@ed.net', '$2y$10$vmqb0onMpiJ2NXuIzfePJOFgfzxi5AxbLOocCOSUnEcMsmuyuAPHy', '2018-06-29 15:13:00', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lugar_id` (`lugar_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `facturas_etiquetas`
--
ALTER TABLE `facturas_etiquetas`
  ADD PRIMARY KEY (`factura_id`,`etiqueta_id`),
  ADD KEY `etiqueta_id` (`etiqueta_id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factura_id` (`factura_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`lugar_id`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `facturas_etiquetas`
--
ALTER TABLE `facturas_etiquetas`
  ADD CONSTRAINT `facturas_etiquetas_ibfk_1` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`),
  ADD CONSTRAINT `facturas_etiquetas_ibfk_2` FOREIGN KEY (`factura_id`) REFERENCES `etiquetas` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
