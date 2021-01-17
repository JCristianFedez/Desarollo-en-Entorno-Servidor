-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2021 a las 19:39:43
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
-- Base de datos: `escuela`
--
CREATE DATABASE IF NOT EXISTS `escuela` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `escuela`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `cod` int(5) NOT NULL,
  `dia` varchar(30) NOT NULL,
  `primera` varchar(30) NOT NULL,
  `segunda` varchar(30) NOT NULL,
  `tercera` varchar(30) NOT NULL,
  `cuarta` varchar(30) NOT NULL,
  `quinta` varchar(30) NOT NULL,
  `sexta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`cod`, `dia`, `primera`, `segunda`, `tercera`, `cuarta`, `quinta`, `sexta`) VALUES
(1, 'Lunes', 'DWEC', 'DWEC', 'DWEC', 'DWES', 'DWES', 'DWES'),
(2, 'Martes', 'DWEC', 'DWEC', 'DWEC', 'DIW', 'DIW', 'DIW'),
(3, 'Miercoles', 'EIE', 'EIE', 'DIW', 'DIW', 'DWES', 'DWES'),
(4, 'Jueves', 'DWES', 'DWES', 'DWES', 'DIW', 'EIE', 'EIE'),
(5, 'Viernes', 'LC', 'LC', 'LC', 'DAW', 'DAW', 'DAW');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cod`,`dia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `cod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
