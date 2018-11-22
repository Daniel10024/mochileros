-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2018 a las 14:55:30
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
-- Base de datos: `mochileros4`
--
CREATE DATABASE IF NOT EXISTS `mochileros4` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mochileros4`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE `escala` (
  `ID_ESCALA` bigint(20) NOT NULL,
  `ESCALA` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `escala`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habla`
--

CREATE TABLE `habla` (
  `ID_IDIOMA` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `habla`:
--   `ID_IDIOMA`
--       `idiomas` -> `ID_IDIOMA`
--   `ID_Usuario`
--       `usuario` -> `ID_Usuario`
--

--
-- Volcado de datos para la tabla `habla`
--

INSERT INTO `habla` (`ID_IDIOMA`, `ID_Usuario`) VALUES
(1, '117974607496192147045');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `ID_IDIOMA` bigint(20) NOT NULL,
  `IDIOMA` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `idiomas`:
--

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`ID_IDIOMA`, `IDIOMA`) VALUES
(1, 'Español'),
(2, 'Engles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `ID_Interes` bigint(20) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `interes`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `le_interesa`
--

CREATE TABLE `le_interesa` (
  `ID_PUNTO` bigint(20) NOT NULL,
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Interes` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `le_interesa`:
--   `ID_PUNTO`
--       `punto` -> `ID_PUNTO`
--   `ID_VIAJE`
--       `punto` -> `ID_VIAJE`
--   `ID_Usuario`
--       `punto` -> `ID_Usuario`
--   `ID_Interes`
--       `interes` -> `ID_Interes`
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
--

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`ID_Publicacion`, `ID_Usuario`, `Comentario`, `Publico`, `Fecha`) VALUES
(1, '117974607496192147045', 'hola', 1, '2018-11-19'),
(2, '117974607496192147045', 'publico', 2, '2018-11-19'),
(3, '110433993825937047664', 'publico 2', 1, '2018-11-19'),
(4, '110433993825937047664', 'publico 2 ', 2, '2018-11-19'),
(5, '111733596368903726939', 'esto es nuevo', 2, '2018-11-20'),
(6, '111733596368903726939', 'esto es mas nuevo', 1, '2018-11-20'),
(7, '117974607496192147045', 'hola esto es muy nuevo', 1, '2018-11-20'),
(8, '117974607496192147045', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2018-11-21'),
(9, '117974607496192147045', 'a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a ', 1, '2018-11-21'),
(10, '117974607496192147045', ' a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a', 1, '2018-11-21'),
(11, '117974607496192147045', '!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important!important', 1, '2018-11-22'),
(12, '117974607496192147045', 'sadasdasdaaapojfsfjsdnkj nankdjnasdjnak ndkajn dkasndkj asndkjanksdnaskjd nsadjna kjndkasj ndnkajn dkjasn kdjnask jda', 1, '2018-11-22'),
(13, '117974607496192147045', 'vos seeguis publicanco?', 1, '2018-11-22'),
(14, '117974607496192147045', 'lo ultimo de ultimo', 1, '2018-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `ID_PUNTO` bigint(20) NOT NULL,
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `EJE_X` bigint(20) NOT NULL,
  `EJE_Y` bigint(20) NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` bigint(20) NOT NULL,
  `RADIO_EXTRA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `punto`:
--   `ID_VIAJE`
--       `viaje` -> `ID_VIAJE`
--   `ID_Usuario`
--       `viaje` -> `ID_Usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solisitud`
--

CREATE TABLE `solisitud` (
  `ID_solisitud` bigint(20) NOT NULL,
  `User` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amigo` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `solisitud`:
--   `User`
--       `usuario` -> `ID_Usuario`
--   `Amigo`
--       `usuario` -> `ID_Usuario`
--

--
-- Volcado de datos para la tabla `solisitud`
--

INSERT INTO `solisitud` (`ID_solisitud`, `User`, `Amigo`, `Estado`) VALUES
(3, '111733596368903726939', '117974607496192147045', 1),
(4, '110433993825937047664', '117974607496192147045', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre` char(16) NOT NULL,
  `Apellido` char(16) NOT NULL,
  `Edad` date NOT NULL,
  `Pais` char(16) NOT NULL,
  `Descripcion_U` varchar(321) NOT NULL,
  `Contacto` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `usuario`:
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Pais`, `Descripcion_U`, `Contacto`) VALUES
('1', 'Invitado', '', '0000-00-00', '', '', ''),
('110433993825937047664', 'daniel', 'galeano', '0000-00-00', '', '', ''),
('111733596368903726939', 'pablo', 'kimon', '2018-11-14', '', '', ''),
('117974607496192147045', 'Daniel', 'Galeano', '2018-11-14', 'Francia', 'asdaasdasdasdassdadadsadssasdasasdasdasdasdasasdsadsadasasdzx', 'asdasdasdasdassdadasdaasdasdasdasdasdasdasdasdasdasdasdasdasdaas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_ESCALA` bigint(20) DEFAULT NULL,
  `NOMBRE` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `viaje`:
--   `ID_Usuario`
--       `usuario` -> `ID_Usuario`
--   `ID_ESCALA`
--       `escala` -> `ID_ESCALA`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `escala`
--
ALTER TABLE `escala`
  ADD PRIMARY KEY (`ID_ESCALA`);

--
-- Indices de la tabla `habla`
--
ALTER TABLE `habla`
  ADD PRIMARY KEY (`ID_IDIOMA`,`ID_Usuario`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`ID_IDIOMA`);

--
-- Indices de la tabla `interes`
--
ALTER TABLE `interes`
  ADD PRIMARY KEY (`ID_Interes`);

--
-- Indices de la tabla `le_interesa`
--
ALTER TABLE `le_interesa`
  ADD PRIMARY KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_Usuario`,`ID_Interes`),
  ADD KEY `ID_Interes` (`ID_Interes`);

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
  ADD PRIMARY KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_Usuario`),
  ADD KEY `ID_VIAJE` (`ID_VIAJE`,`ID_Usuario`);

--
-- Indices de la tabla `solisitud`
--
ALTER TABLE `solisitud`
  ADD PRIMARY KEY (`ID_solisitud`,`User`,`Amigo`),
  ADD KEY `User` (`User`),
  ADD KEY `Amigo` (`Amigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID_VIAJE`,`ID_Usuario`),
  ADD KEY `ID_Usuario` (`ID_Usuario`),
  ADD KEY `ID_ESCALA` (`ID_ESCALA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escala`
--
ALTER TABLE `escala`
  MODIFY `ID_ESCALA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `ID_IDIOMA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `interes`
--
ALTER TABLE `interes`
  MODIFY `ID_Interes` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `punto`
--
ALTER TABLE `punto`
  MODIFY `ID_PUNTO` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solisitud`
--
ALTER TABLE `solisitud`
  MODIFY `ID_solisitud` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `ID_VIAJE` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habla`
--
ALTER TABLE `habla`
  ADD CONSTRAINT `habla_ibfk_1` FOREIGN KEY (`ID_IDIOMA`) REFERENCES `idiomas` (`ID_IDIOMA`),
  ADD CONSTRAINT `habla_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `le_interesa`
--
ALTER TABLE `le_interesa`
  ADD CONSTRAINT `le_interesa_ibfk_1` FOREIGN KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_Usuario`) REFERENCES `punto` (`ID_PUNTO`, `ID_VIAJE`, `ID_Usuario`),
  ADD CONSTRAINT `le_interesa_ibfk_2` FOREIGN KEY (`ID_Interes`) REFERENCES `interes` (`ID_Interes`);

--
-- Filtros para la tabla `punto`
--
ALTER TABLE `punto`
  ADD CONSTRAINT `punto_ibfk_1` FOREIGN KEY (`ID_VIAJE`,`ID_Usuario`) REFERENCES `viaje` (`ID_VIAJE`, `ID_Usuario`);

--
-- Filtros para la tabla `solisitud`
--
ALTER TABLE `solisitud`
  ADD CONSTRAINT `solisitud_ibfk_1` FOREIGN KEY (`User`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `solisitud_ibfk_2` FOREIGN KEY (`Amigo`) REFERENCES `usuario` (`ID_Usuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`ID_ESCALA`) REFERENCES `escala` (`ID_ESCALA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
