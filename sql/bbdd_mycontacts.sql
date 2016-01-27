-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2016 a las 22:03:26
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_mycontacts`
--
CREATE DATABASE IF NOT EXISTS `bbdd_mycontacts` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bbdd_mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contacto`
--

CREATE TABLE IF NOT EXISTS `tbl_contacto` (
  `con_id` int(3) NOT NULL,
  `con_nombre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_apellidos` varchar(35) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_telefono_fijo` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_telefono_movil` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_id` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`con_id`, `con_nombre`, `con_apellidos`, `con_mail`, `con_telefono_fijo`, `con_telefono_movil`, `log_id`) VALUES
(1, 'Alejandro', 'Moreno', 'alejandro.moreno@gmail.com', '933221221', '622622622', 1),
(2, 'Raúl', 'Pérez', 'raul.perez@gmail.com', '933445445', '666555444', 2),
(3, 'Pepe', 'Rodríguez Fernández', 'pepe.rodfer@gmail.com', '999888777', '654321987', 1),
(4, 'Paco', 'González Castro', 'paco.gonca@gmail.com', '987654321', '654987321', 2),
(10, '123', '123', '123', '123', '123', 1),
(11, '34234', '2343242', '32423', '234234', '23423', 1),
(12, '111', '111', '111', '111', '111', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `log_id` int(3) NOT NULL,
  `log_username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `log_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `log_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `log_username`, `log_mail`, `log_password`) VALUES
(1, 'raul.perez', 'raul.perez@gmail.com', 'c2f004a05fffa487f826003604b87de1'),
(2, 'alejandro.moreno', 'alejandro.moreno@gmail.com', 'a11f4fdfdba1f568a0832a9d64258d5c'),
(3, 'pepe.rodriguez', 'pepe.rodriguez@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'pe.pe', 'pe.pe@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mapa`
--

CREATE TABLE IF NOT EXISTS `tbl_mapa` (
  `map_id` int(3) NOT NULL,
  `map_longitud` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `map_latitud` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `map_direccion` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `con_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`con_id`);

--
-- Indices de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indices de la tabla `tbl_mapa`
--
ALTER TABLE `tbl_mapa`
  ADD PRIMARY KEY (`map_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `con_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `log_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_mapa`
--
ALTER TABLE `tbl_mapa`
  MODIFY `map_id` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
