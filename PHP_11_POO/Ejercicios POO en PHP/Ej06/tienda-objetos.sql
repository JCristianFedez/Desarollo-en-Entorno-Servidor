-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2021 a las 17:13:17
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
-- Base de datos: `tienda-objetos`
--
CREATE DATABASE IF NOT EXISTS `tienda-objetos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda-objetos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `clave_prod` varchar(20) NOT NULL,
  `cant` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `clave` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `url_local` tinyint(1) NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`clave`, `nombre`, `precio`, `imagen`, `url_local`, `stock`) VALUES
('babyYoda', 'Baby Yoda', '123349.99', 'babyYoda.png', 1, 1),
('dobleElefanteTelepat', 'Doble Elefante Telepata de Guerra', '1724.00', 'dobleElefanteTelepataDeGuerra.png', 1, 1),
('nikeBenAndJerrys', 'Nike SB Drunk Low Ben Jerrys', '123.20', 'Nike-SB-Dunk-Low-Ben-Jerrys.png', 1, 3),
('nikeInterFlag', 'Nike International Flag', '256.20', 'https://image.goat.com/crop/750/attachments/product_template_pictures/images/012/824/237/original/382044_00.png.png', 0, 1),
('nikeISPA', 'Nike ISPA Overreact FK', '180.20', 'Nike-Overreact-Flyknit.png', 1, 13),
('tvSamsung', 'Televisor Samsung 40 Pulgadas', '320.50', 'https://www.giztele.com/wp-content/uploads/2018/10/televisores-4K-baratosp-e1540283138792-1024x768.png', 0, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`clave_prod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`clave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
