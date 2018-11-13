-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2018 a las 14:04:27
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigo`
--

CREATE TABLE `amigo` (
  `ID_USUARIO` bigint(20) NOT NULL,
  `ID_USUARIO_1` bigint(20) NOT NULL,
  `ESTADO` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE `escala` (
  `ID_ESCALA` bigint(20) NOT NULL,
  `ESCALA` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escala`
--

INSERT INTO `escala` (`ID_ESCALA`, `ESCALA`) VALUES
(1, 'america');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habla`
--

CREATE TABLE `habla` (
  `ID_IDIOMA` bigint(20) NOT NULL,
  `ID_USUARIO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habla`
--

INSERT INTO `habla` (`ID_IDIOMA`, `ID_USUARIO`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `ID_IDIOMA` bigint(20) NOT NULL,
  `IDIOMA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`ID_IDIOMA`, `IDIOMA`) VALUES
(1, 'geringoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `ID_INTERES` bigint(20) NOT NULL,
  `DESCRIPCION` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `le_interesa`
--

CREATE TABLE `le_interesa` (
  `ID_PUNTO` bigint(20) NOT NULL,
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_USUARIO` bigint(20) NOT NULL,
  `ID_INTERES` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `ID_PUNTO` bigint(20) NOT NULL,
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_USUARIO` bigint(20) NOT NULL,
  `EJE_X` bigint(20) NOT NULL,
  `EJE_Y` bigint(20) NOT NULL,
  `FECHA_INICIO` datetime NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `RADIO_EXTRA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto`
--

INSERT INTO `punto` (`ID_PUNTO`, `ID_VIAJE`, `ID_USUARIO`, `EJE_X`, `EJE_Y`, `FECHA_INICIO`, `FECHA_FIN`, `RADIO_EXTRA`) VALUES
(3, 2, 1, 5, 7, '2018-11-13 00:00:00', '2018-12-12', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` bigint(20) NOT NULL,
  `NOMBRE` char(16) NOT NULL,
  `APELLIDO` char(16) NOT NULL,
  `FECHA_NAC` datetime NOT NULL,
  `PAIS` char(16) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `CONTACTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `APELLIDO`, `FECHA_NAC`, `PAIS`, `DESCRIPCION`, `CONTACTO`) VALUES
(1, 'ezequiel', 'antencho', '2017-10-18 00:00:00', 'argentina', 'Soy un chico normal, bastante fachero, pero con dificultades a la hora de socializar.', '15000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_USUARIO` bigint(20) NOT NULL,
  `ID_ESCALA` bigint(20) DEFAULT NULL,
  `NOMBRE` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`ID_VIAJE`, `ID_USUARIO`, `ID_ESCALA`, `NOMBRE`) VALUES
(2, 1, 1, 'El viaje de ronaldo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigo`
--
ALTER TABLE `amigo`
  ADD PRIMARY KEY (`ID_USUARIO`,`ID_USUARIO_1`),
  ADD KEY `ID_USUARIO_1` (`ID_USUARIO_1`);

--
-- Indices de la tabla `escala`
--
ALTER TABLE `escala`
  ADD PRIMARY KEY (`ID_ESCALA`);

--
-- Indices de la tabla `habla`
--
ALTER TABLE `habla`
  ADD PRIMARY KEY (`ID_IDIOMA`,`ID_USUARIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`ID_IDIOMA`);

--
-- Indices de la tabla `interes`
--
ALTER TABLE `interes`
  ADD PRIMARY KEY (`ID_INTERES`);

--
-- Indices de la tabla `le_interesa`
--
ALTER TABLE `le_interesa`
  ADD PRIMARY KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_USUARIO`,`ID_INTERES`),
  ADD KEY `ID_INTERES` (`ID_INTERES`);

--
-- Indices de la tabla `punto`
--
ALTER TABLE `punto`
  ADD PRIMARY KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_USUARIO`),
  ADD KEY `ID_VIAJE` (`ID_VIAJE`,`ID_USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`ID_VIAJE`,`ID_USUARIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_ESCALA` (`ID_ESCALA`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigo`
--
ALTER TABLE `amigo`
  ADD CONSTRAINT `amigo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `amigo_ibfk_2` FOREIGN KEY (`ID_USUARIO_1`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `habla`
--
ALTER TABLE `habla`
  ADD CONSTRAINT `habla_ibfk_1` FOREIGN KEY (`ID_IDIOMA`) REFERENCES `idiomas` (`ID_IDIOMA`),
  ADD CONSTRAINT `habla_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `le_interesa`
--
ALTER TABLE `le_interesa`
  ADD CONSTRAINT `le_interesa_ibfk_1` FOREIGN KEY (`ID_PUNTO`,`ID_VIAJE`,`ID_USUARIO`) REFERENCES `punto` (`ID_PUNTO`, `ID_VIAJE`, `ID_USUARIO`),
  ADD CONSTRAINT `le_interesa_ibfk_2` FOREIGN KEY (`ID_INTERES`) REFERENCES `interes` (`ID_INTERES`);

--
-- Filtros para la tabla `punto`
--
ALTER TABLE `punto`
  ADD CONSTRAINT `punto_ibfk_1` FOREIGN KEY (`ID_VIAJE`,`ID_USUARIO`) REFERENCES `viaje` (`ID_VIAJE`, `ID_USUARIO`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`ID_ESCALA`) REFERENCES `escala` (`ID_ESCALA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
