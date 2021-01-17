-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2021 a las 16:23:27
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
-- Base de datos: `ej04_boletin_almacen`
--
CREATE DATABASE IF NOT EXISTS `ej04_boletin_almacen` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ej04_boletin_almacen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `precio_compra` decimal(8,2) NOT NULL,
  `precio_venta` decimal(8,2) NOT NULL,
  `margen` decimal(8,2) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `descripcion`, `precio_compra`, `precio_venta`, `margen`, `stock`) VALUES
('h02', 'Caja misteriosa 1', '10.00', '20.00', '2.00', 0),
('h03', 'Caja misteriosa 3', '10.00', '20.00', '2.00', 193),
('h04', 'Caja misteriosa 4', '10.00', '20.00', '2.00', 192),
('h05', 'Caja misteriosa 5', '10.00', '20.00', '2.00', 187),
('h06', 'Caja misteriosa 6', '10.00', '20.00', '2.00', 187),
('h07', 'Caja misteriosa 7', '10.00', '20.00', '2.00', 199),
('h08', 'Caja misteriosa 8', '10.00', '20.00', '2.00', 200),
('h09', 'Caja misteriosa 9', '10.00', '20.00', '2.00', 200),
('h1', 'as', '0.00', '0.00', '2.00', 2),
('h10', 'Caja misteriosa 10', '10.00', '20.00', '2.00', 200),
('h11', 'Caja misteriosa 11', '10.00', '20.00', '2.00', 200),
('h12', 'Caja misteriosa 12', '10.00', '20.00', '2.00', 200),
('h13', 'Caja misteriosa 13', '10.00', '20.00', '2.00', 200),
('h14', 'Caja misteriosa 14', '10.00', '20.00', '2.00', 200),
('h15', 'Caja misteriosa 15', '10.00', '20.00', '2.00', 200),
('h16', 'Caja misteriosa 16', '10.00', '20.00', '2.00', 200),
('h17', 'Caja misteriosa 17', '10.00', '20.00', '2.00', 200);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
