SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `fans` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `fans`;

CREATE TABLE `comunidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comunidades` (`id`, `nombre`) VALUES
(1, 'Andalucía'),
(2, 'Madrid'),
(3, 'Cataluña'),
(4, 'Murcia'),
(5, 'Castilla La Mancha'),
(6, 'Castilla y León'),
(7, 'Extremadura'),
(8, 'Comunidad Valenciana'),
(9, 'Galicia'),
(10, 'Aragón'),
(11, 'Asturias'),
(12, 'Cantabria'),
(13, 'País Vasco'),
(14, 'Navarra'),
(15, 'La Rioja'),
(16, 'Islas Baleares'),
(17, 'Islas Canarias'),
(18, 'Ceuta'),
(19, 'Melilla');

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `puntos` int(11) NOT NULL,
  `comunidad` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `socios` (`id`, `nombre`, `puntos`, `comunidad`) VALUES
(2, 'Pepe Gonzalez', 580, 'Andalucía'),
(6, 'Antonio Vistahermosa', 65, 'Madrid'),
(20, 'Antonio Vela', 165, 'Asturias'),
(21, 'Jorge Garcia', 405, 'Cataluña'),
(22, 'Isabel perez', 320, 'Aragón'),
(25, 'Juana Isabel García', 120, 'Andalucía'),
(26, 'Daniel Moscoso', 255, 'País Vasco'),
(30, 'Ana Rosa', 550, 'Andalucía');


ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comunidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
