-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2018 a las 04:42:21
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mochileros`
--
CREATE DATABASE IF NOT EXISTS `mochileros` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mochileros`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `ID_Interes` int(11) NOT NULL,
  `ID_Punto` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `interes`:
--   `ID_Punto`
--       `punto` -> `ID_Punto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `ID_Publicacion` int(11) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comentario` varchar(640) NOT NULL,
  `Publico` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `publicacion`:
--   `ID_Usuario`
--       `usuario` -> `ID_Usuario`
--

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`ID_Publicacion`, `ID_Usuario`, `Comentario`, `Publico`, `Fecha`) VALUES
(1, '110433993825937047664', 'esto es un comentario (esto esta publico)', 2, '2018-10-18'),
(8, '117974607496192147045', 'comento esto para probar (esto esta publico)', 2, '2018-10-18'),
(9, '111733596368903726939', 'probamos esto con un texto un poco mas largo.\r\nprobamos esto con un texto un poco mas largo.\r\nprobamos esto con un texto un poco mas largo.\r\nprobamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largoprobamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.probamos esto con un texto un poco mas largo.(esto esta publico)', 2, '2018-10-18'),
(10, '117974607496192147045', 'esto solo lo veo yo y mis amigos :D', 1, '2018-10-18'),
(16, '117974607496192147045', 'sad', 1, '2018-10-21'),
(17, '117974607496192147045', 'esto es publico', 1, '2018-10-21'),
(18, '117974607496192147045', 'esto si es publico XD', 2, '2018-10-21'),
(19, '117974607496192147045', 'sad', 1, '2018-10-22'),
(20, '117974607496192147045', 'ahora', 1, '2018-10-22'),
(21, '117974607496192147045', 'esto ya publica bien :D', 1, '2018-10-22'),
(22, '117974607496192147045', 'si es publico tambien publica bien?', 2, '2018-10-22'),
(23, '111733596368903726939', '', 1, '2018-10-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `ID_Punto` int(11) NOT NULL,
  `Fecha_inicio` date NOT NULL,
  `Fecha_fin` date NOT NULL,
  `Cordenadas` varchar(64) NOT NULL,
  `Intereses` varchar(64) NOT NULL,
  `ID_Viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `punto`:
--   `ID_Viaje`
--       `viaje` -> `ID_Viaje`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solisitud`
--

CREATE TABLE `solisitud` (
  `ID_solisitud` int(11) NOT NULL,
  `User` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amigo` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `solisitud`:
--

--
-- Volcado de datos para la tabla `solisitud`
--

INSERT INTO `solisitud` (`ID_solisitud`, `User`, `Amigo`, `Estado`) VALUES
(6, '110433993825937047664', '111733596368903726939', 2),
(8, '117974607496192147045', '110433993825937047664', 1),
(9, '117974607496192147045', '111733596368903726939', 2),
(10, '107533581959836595008', '111733596368903726939', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` varchar(64) NOT NULL,
  `Apellido` varchar(64) NOT NULL,
  `Edad` date DEFAULT NULL,
  `Idioma` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pais` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Intereses` varchar(64) DEFAULT NULL,
  `Contacto` varchar(64) DEFAULT NULL,
  `Descripcion_U` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `usuario`:
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Idioma`, `Pais`, `Intereses`, `Contacto`, `Descripcion_U`) VALUES
('1', 'Invitado', ' ', '0000-00-00', '', '', '', '', ''),
('107533581959836595008', 'daniel', 'galeano', NULL, NULL, NULL, NULL, NULL, NULL),
('110433993825937047664', 'daniel', 'galeano', NULL, NULL, NULL, NULL, NULL, NULL),
('111733596368903726939', 'pablo', 'kimon', NULL, NULL, NULL, NULL, NULL, NULL),
('117974607496192147045', 'Daniel', 'Galeano', '1995-08-24', '', 'Argentina', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `interes`
--
ALTER TABLE `interes`
  ADD PRIMARY KEY (`ID_Interes`),
  ADD KEY `ID_Punto` (`ID_Punto`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`ID_Publicacion`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_Usuario_2` (`ID_Usuario`),
  ADD KEY `ID_Usuario_3` (`ID_Usuario`);

--
-- Indices de la tabla `punto`
--
ALTER TABLE `punto`
  ADD PRIMARY KEY (`ID_Punto`),
  ADD KEY `ID_Viaje` (`ID_Viaje`);

--
-- Indices de la tabla `solisitud`
--
ALTER TABLE `solisitud`
  ADD PRIMARY KEY (`ID_solisitud`),
  ADD KEY `User` (`User`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `interes`
--
ALTER TABLE `interes`
  MODIFY `ID_Interes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `punto`
--
ALTER TABLE `punto`
  MODIFY `ID_Punto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solisitud`
--
ALTER TABLE `solisitud`
  MODIFY `ID_solisitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `interes`
--
ALTER TABLE `interes`
  ADD CONSTRAINT `interes_ibfk_1` FOREIGN KEY (`ID_Punto`) REFERENCES `punto` (`ID_Punto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `punto`
--
ALTER TABLE `punto`
  ADD CONSTRAINT `punto_ibfk_1` FOREIGN KEY (`ID_Viaje`) REFERENCES `viaje` (`ID_Viaje`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
