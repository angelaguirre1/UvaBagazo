-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 03:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administracion`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `textColor` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '#FFFFFF',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `calendario`
--

INSERT INTO `calendario` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(6, 'Prueba de el primer evento', 'Todo esta perfecto', '#d12ec5', '#FFFFFF', '2019-04-23 10:30:00', '2019-04-23 10:30:00'),
(7, 'Prueba del segundo evento', 'Evento realizado perfectamente', '#80ff00', '#FFFFFF', '2019-04-17 10:30:00', '2019-04-17 10:30:00'),
(8, 'Evento 1', 'Evento realizado perfectamente', '#1ce3e3', '#FFFFFF', '2019-05-08 10:30:00', '2019-05-08 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `contrasena`, `departamento`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(2, 'Angel Ernesto Aguirre Jasso', 'AngelAguirre', 'angele.aguirre@alumnos.udg.mx', 'holamundo', 'Administracion', 'views/images/users/AngelAguirre/933.jpg', 1, '2019-05-02 20:44:38', '2019-05-03 01:44:38'),
(7, 'Carlos Eduardo Uribe', 'CarlosUribe', 'carlos@gmail.com', 'holamundo', 'Produccion', 'views/images/users/CarlosUribe/245.png', 1, '2019-04-17 21:32:24', '2019-04-30 18:37:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
