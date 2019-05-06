-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 08:35 PM
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
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Medica', '2019-05-05 04:01:37'),
(2, 'Quimica', '2019-05-05 04:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(4, 'Angel Jasso', 85258, 'itzlalvarez@gmail.com', '3312538888', 'guadalajara', '1999-11-10', 14, '2019-05-06 18:34:43'),
(5, 'Yessi', 852875, 'carlos@gmail.com', '(222) 222-2222', 'guadalajara', '2088-08-08', 71, '2019-05-06 16:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `codigo`, `descripcion`, `imagen`, `stock`, `precio`, `ventas`, `fecha`) VALUES
(1, 1, 'Hilos', '2146', 'Hilos biodegradables', '', 168, 200.89, 81, '2019-05-06 18:34:43'),
(2, 2, 'Cinta', '25852', 'Funciona', '', 20, 10, 5, '2019-05-06 16:06:21');

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
(2, 'Angel Ernesto Aguirre Jasso', 'AngelAguirre', 'angele.aguirre@alumnos.udg.mx', 'holamundo', 'Administracion', 'views/images/users/AngelAguirre/933.jpg', 1, '2019-05-06 13:33:58', '2019-05-06 18:33:58'),
(7, 'Carlos Eduardo Uribe', 'CarlosUribe', 'carlos@gmail.com', 'holamundo', 'Produccion', 'views/images/users/CarlosUribe/245.png', 1, '2019-04-17 21:32:24', '2019-04-30 18:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(2, 10001, 4, 2, '[{\"id\":\"1\",\"descripcion\":\"Hilos biodegradables\",\"cantidad\":\"5\",\"stock\":\"83\",\"precio\":\"200.89\",\"total\":\"1004.45\"}]', 50.2225, 1004.45, 1054.67, 'TC-789654123', '2019-05-06 02:57:34'),
(3, 10002, 4, 2, '[{\"id\":\"1\",\"descripcion\":\"Hilos biodegradables\",\"cantidad\":\"3\",\"stock\":\"80\",\"precio\":\"200.89\",\"total\":\"602.67\"},{\"id\":\"2\",\"descripcion\":\"Funciona\",\"cantidad\":\"4\",\"stock\":\"21\",\"precio\":\"10\",\"total\":\"40\"}]', 19.2801, 642.67, 661.95, 'TD-8585285285', '2019-05-06 16:02:47'),
(4, 10003, 5, 2, '[{\"id\":\"1\",\"descripcion\":\"Hilos biodegradables\",\"cantidad\":\"70\",\"stock\":\"10\",\"precio\":\"200.89\",\"total\":\"14062.3\"},{\"id\":\"2\",\"descripcion\":\"Funciona\",\"cantidad\":\"1\",\"stock\":\"20\",\"precio\":\"10\",\"total\":\"10\"}]', 281.446, 14072.3, 14353.7, 'Efectivo', '2019-05-06 16:06:21'),
(5, 10004, 4, 2, '[{\"id\":\"1\",\"descripcion\":\"Hilos biodegradables\",\"cantidad\":\"2\",\"stock\":\"168\",\"precio\":\"200.89\",\"total\":\"401.78\"}]', 84.3738, 401.78, 486.154, 'TC-7898525858', '2019-05-06 18:34:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
