-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 28-10-2023 a las 19:05:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nexgendb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre_producto` text NOT NULL,
  `consulta` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabla creada para recopilar las consultas';

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `telefono`, `email`, `nombre_producto`, `consulta`) VALUES
(1, 'manuel', 11111111, 'prueba@prueba.com', 'Gabinete', 'Que dimensiones tiene'),
(2, 'manuel', 1122334455, 'manuel@gmail.com', 'ssd', 'tamaño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `categoria_producto` varchar(45) NOT NULL,
  `precio_producto` float(8,2) NOT NULL,
  `descuento_producto` float(8,2) NOT NULL,
  `nombre_archivo_producto` varchar(45) DEFAULT NULL,
  `producto_promo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion_producto`, `categoria_producto`, `precio_producto`, `descuento_producto`, `nombre_archivo_producto`, `producto_promo`) VALUES
(1, 'Gabinete Corsair', 'Gabinete apto modular', 'Perifericos', 3500.00, 0.00, 'gabinete1', 0),
(5, 'SSD Samsung 2TB', 'Disco solido 2TB Samsung', 'Almacenamiento', 40000.00, 1500.00, 'ssdsamsung', 1),
(6, 'Gabinete Red Dragon', 'Gabinete lleno de luces led, modular, con botones y cosas, y no se que mas poner en la descripcion', 'Perifericos', 45000.00, 5000.00, 'gabinete2', 1),
(7, 'Perrito Computadora', 'No tengo imagen', 'Un producto random', 40000.00, 0.00, NULL, 0),
(8, 'Disco Solido 480', '480GB', 'Almacenamiento', 12000.00, 0.00, 'disco', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
