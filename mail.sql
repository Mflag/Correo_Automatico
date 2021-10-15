-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 05:29:25
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mail`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casillas`
--

CREATE TABLE `casillas` (
  `id_casilla` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `casilla` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casillas`
--

INSERT INTO `casillas` (`id_casilla`, `id_cliente`, `nombre`, `casilla`) VALUES
(1, 1, 'dsadsadsa', 'dsadsadsadsa'),
(2, 1, 'prueba@prueba.com', 'prueba@prueba.com'),
(3, 2, 'prueba@prueba.com', 'prueba@prueba.com'),
(4, 5, 'prueba@prueba.com', 'prueba2@prueba2.com'),
(5, 3, 'prueba3@prueba3.com', 'prueba3@prueba3.com'),
(6, 6, 'Puto', 'puto@puto.com'),
(7, 7, 'hola', 'hola@hola.com'),
(8, 2, 'prueba@prueba.com', 'prueba@prueba.com'),
(9, 2, 'prueba@prueba.com', ''),
(10, 2, 'prueba@prueba.com', 'prueba@prueba.com'),
(11, 2, 'prueba@prueba.com', 'prueba@prueba.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cuit` int(11) NOT NULL,
  `razon_social` varchar(128) NOT NULL,
  `fecha_mesa` date NOT NULL,
  `id_version` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cuit`, `razon_social`, `fecha_mesa`, `id_version`) VALUES
(2, 2040012923, 'ANSDASNDSA', '2021-10-08', 1),
(3, 2147483647, 'OPA ', '2021-10-09', 1),
(4, 2040012923, 'SDADSADSA', '2021-10-16', 1),
(5, 2040012923, 'ASSADSADSADSA', '2021-10-09', 1),
(6, 2040012923, 'ANSDASNDSA', '2021-09-30', 2),
(7, 123456789, 'PRUEBA1 ', '2021-10-12', 5),
(8, 234567891, 'PRUEBA2', '2021-10-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id_version` int(11) NOT NULL,
  `version` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id_version`, `version`) VALUES
(1, '1.1.1'),
(2, '2.2.2'),
(3, '3.3.3'),
(4, '4.4.4'),
(5, '5.5.5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casillas`
--
ALTER TABLE `casillas`
  ADD PRIMARY KEY (`id_casilla`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `version` (`id_version`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id_version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casillas`
--
ALTER TABLE `casillas`
  MODIFY `id_casilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `version` FOREIGN KEY (`id_version`) REFERENCES `versiones` (`id_version`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
