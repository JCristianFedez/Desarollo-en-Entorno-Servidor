-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2021 a las 14:23:27
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ej01-boletin-mvc`
--
CREATE DATABASE IF NOT EXISTS `ej01-boletin-mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ej01-boletin-mvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` varchar(1000) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `titulo`, `contenido`, `fecha`) VALUES
(7, 'Hola Mundo Titulo', 'Hola Mundo, contenido', '2021-02-03'),
(22, 'Hola Mundo', 'Hola Mundo', '2021-02-03'),
(23, 'Hola Mundo Titulo', 'Contenido', '2021-02-03'),
(24, 'Hola Mundo Titulo', 'Contenido', '2021-02-03'),
(25, 'Titulo', 'Conetnido', '2021-02-03'),
(26, 'asd', 'sdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asldsdkmkasld askd asd asda sd asmd asd askdaskd aslkd asdkask dals dask dalskd aslkd asld', '2021-02-03'),
(27, 'Facebook2', 'asd', '2021-02-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
