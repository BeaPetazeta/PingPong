-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2017 a las 16:02:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship`
--

CREATE TABLE `championship` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id`, `name`) VALUES
(5, 'UEFA'),
(6, 'COPA DE REY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_has_users`
--

CREATE TABLE `championship_has_users` (
  `championship` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `championship_has_users`
--

INSERT INTO `championship_has_users` (`championship`, `user`) VALUES
(5, 9),
(5, 10),
(5, 1),
(5, 2),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'leroy', 'leroymerlin@hotmail.com', 'leroymerlin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `pointsP1` int(11) DEFAULT NULL,
  `pointsP2` int(11) DEFAULT NULL,
  `player1` int(11) NOT NULL,
  `player2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id`, `date`, `pointsP1`, `pointsP2`, `player1`, `player2`) VALUES
(1, NULL, 10, 15, 1, 2),
(2, NULL, NULL, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `nick` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `nick`, `email`, `password`) VALUES
(1, 'Beatriz', 'Bea', 'bea@gmail.com', 'beatriz'),
(2, 'Emilio', 'Emi', 'emi@gmail.com', 'emilio'),
(3, 'Miguel', 'Miki', 'miki@gmail.com', 'miguel'),
(4, 'Pau', 'Pau', 'pau@gmail.com', 'pau'),
(5, 'Gabi', 'Gabi', 'gabi@gmail.com', 'gabi'),
(6, 'Mario', 'Mario', 'mario@gmail.com', 'mario'),
(7, 'Fran', 'Fran', 'fran@gmail.com', 'fran'),
(8, 'Aleksandra', 'Sandra', 'aleksandra@gmail.com', 'aleksandra'),
(9, 'Paco', 'paquito', 'paco@gmail.com', 'paco'),
(10, 'Luis', 'luisito', 'luis@gmail.com', 'luis');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`,`player1`,`player2`),
  ADD KEY `fk_round_users_idx` (`player1`),
  ADD KEY `fk_round_users1_idx` (`player2`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_round_users` FOREIGN KEY (`player1`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_round_users1` FOREIGN KEY (`player2`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
