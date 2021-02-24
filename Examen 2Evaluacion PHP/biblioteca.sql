-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2021 a las 19:56:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `isbn` varchar(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`isbn`, `titulo`, `estado`, `cliente`) VALUES
('333ccc', 'El corredor del laberinto', 'alquilado', 'Ana'),
('444ddd', 'Técnicas para meditar', 'libre', NULL),
('aaa111', 'El código da vinci', 'alquilado', 'Pepe'),
('abc123', 'Don Quijote de la Mancha', 'libre', NULL),
('bbb222', 'Harry Potter y la piedra filosofal', 'libre', NULL),
('ccc333', '50 sombras de Grey', 'alquilado', 'Paola'),
('eee555', 'Aprende PHP con ejercicios', 'alquilado', 'Manuel'),
('fff666', 'Juegos de ingenio', 'libre', NULL);

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo`, `titulo`, `estado`, `persona`) VALUES
(1, 'Java para torpes', 'prestado', 'pepe'),
(2, 'Interfaces Web para DAW', 'prestado', 'ana'),
(3, 'Aprende Angular con ejemplos', 'libre', ''),
(4, 'PHP desde cero', 'prestado', 'pepillo'),
(5, 'La biblia de Javascript', 'libre', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
