-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2021 a las 16:21:33
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
-- Base de datos: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `DNI` char(9) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI`, `Nombre`, `Direccion`, `Telefono`) VALUES
('12345678B', 'Eric', 'Utrera, Sevilla', 630985990),
('12345678C', 'Jose', 'Utrera, Sevilla', 630985991),
('12345678D', 'Jesus', 'Utrera, Sevilla', 630985992),
('12345678E', 'Manuel', 'Utrera, Sevilla', 630985993),
('12345678F', 'Antonio', 'Utrera, Sevilla', 630985994),
('12345678G', 'Jose Antonio', 'Utrera, Sevilla', 630985995),
('12345678H', 'Jose Luis', 'Utrera, Sevilla', 630985996),
('12345678I', 'Alejandro', 'Utrera, Sevilla', 630985997),
('12345678J', 'David', 'Utrera, Sevilla', 630985998),
('12345678K', 'Juan', 'Utrera, Sevilla', 630985999),
('12345678W', 'Aitor Tilla', 'Utrera, Sevilla', 632025895),
('12345678Z', 'Carlos', 'Utrera, Sevilla', 666666666),
('20229400A', 'Cristian, Fernandez', 'Utrera, Sevilla', 630985990),
('98765432A', 'Pedro Manuel', 'Utrera, Sevilla', 785447856),
('98765432B', 'Armando Guerra', 'Utrera, Sevilla', 456321897);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
