-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2021 a las 18:54:23
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE `sugerencias` (
  `correo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sugerencias`
--

INSERT INTO `sugerencias` (`correo`, `comentario`) VALUES
('alberto@gmail.com', 'Que buena pag'),
('alberto@gmail.com', 'Que buena pag'),
('alberto@gmail.com', 'Que buena pag'),
('prueba@gmail.com', 'Todo jala bien'),
('prueba@gmail.com', 'Todo jala bien'),
('prueba@gmail.com', 'Todo jala bien'),
('prueba@gmail.com', 'Todo jala bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'vegachido2a@gmail.com', '$2y$10$9mn5C2klZVRAOaO8Ck1a/.qPM1N8lT1br8Ksm.Iwd5Nb2AjFFnFgW'),
(2, 'AGalangonzalez@outlook.com', '$2y$10$sPKJKnOJIdjHWHrrMbzoWuBTYdfY0fteR5lsMSAwWlcgidDAzFMOW'),
(3, 'alan@gmail.com', '$2y$10$PxHvOMkTDPBUiJgPOpPr2uoTN257CkPPFy41dSSyCUqDzXFM8ggie'),
(4, 'fateligg@gmail.com', '$2y$10$s1auFqMgeL16BVBK7yoHJeRNDHShKnlxoXUFCt9C7JodqI2BOVv4.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
