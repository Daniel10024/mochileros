-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2018 a las 11:47:42
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mochileros4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escala`
--

CREATE TABLE `escala` (
  `ID_ESCALA` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ESCALA` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escala`
--

INSERT INTO `escala` (`ID_ESCALA`, `ESCALA`) VALUES
('0', 'global'),
('1', 'America'),
('10', 'Angola'),
('100', 'IrÃ¡n'),
('101', 'Irlanda'),
('102', 'Isla Bouvet'),
('103', 'Isla de Christmas'),
('104', 'Islandia'),
('105', 'Islas CaimÃ¡n'),
('106', 'Islas Cook'),
('107', 'Islas de Cocos o Keeling'),
('108', 'Islas Faroe'),
('109', 'Islas Heard y McDonald'),
('11', 'Anguilla'),
('110', 'Islas Malvinas'),
('111', 'Islas Marianas del Norte'),
('112', 'Islas Marshall'),
('113', 'Islas menores de Estados Unidos'),
('114', 'Islas Palau'),
('115', 'Islas SalomÃ³n'),
('116', 'Islas Svalbard y Jan Mayen'),
('117', 'Islas Tokelau'),
('118', 'Islas Turks y Caicos'),
('119', 'Islas VÃ­rgenes (EEUU)'),
('12', 'AntÃ¡rtida'),
('120', 'Islas VÃ­rgenes (Reino Unido)'),
('121', 'Islas Wallis y Futuna'),
('122', 'Israel'),
('123', 'Italia'),
('124', 'Jamaica'),
('125', 'JapÃ³n'),
('126', 'Jordania'),
('127', 'KazajistÃ¡n'),
('128', 'Kenia'),
('129', 'KirguizistÃ¡n'),
('13', 'Antigua y Barbuda'),
('130', 'Kiribati'),
('131', 'Kuwait'),
('132', 'Laos'),
('133', 'Lesotho'),
('134', 'Letonia'),
('135', 'LÃ­bano'),
('136', 'Liberia'),
('137', 'Libia'),
('138', 'Liechtenstein'),
('139', 'Lituania'),
('14', 'Antillas Holandesas'),
('140', 'Luxemburgo'),
('141', 'Macedonia, Ex-RepÃºblica Yugoslava de'),
('142', 'Madagascar'),
('143', 'Malasia'),
('144', 'Malawi'),
('145', 'Maldivas'),
('146', 'MalÃ­'),
('147', 'Malta'),
('148', 'Marruecos'),
('149', 'Martinica'),
('15', 'Arabia SaudÃ­'),
('150', 'Mauricio'),
('151', 'Mauritania'),
('152', 'Mayotte'),
('153', 'MÃ©xico'),
('154', 'Micronesia'),
('155', 'Moldavia'),
('156', 'MÃ³naco'),
('157', 'Mongolia'),
('158', 'Montserrat'),
('159', 'Mozambique'),
('16', 'Argelia'),
('160', 'Namibia'),
('161', 'Nauru'),
('162', 'Nepal'),
('163', 'Nicaragua'),
('164', 'NÃ­ger'),
('165', 'Nigeria'),
('166', 'Niue'),
('167', 'Norfolk'),
('168', 'Noruega'),
('169', 'Nueva Caledonia'),
('17', 'Argentina'),
('170', 'Nueva Zelanda'),
('171', 'OmÃ¡n'),
('172', 'PaÃ­ses Bajos'),
('173', 'PanamÃ¡'),
('174', 'PapÃºa Nueva Guinea'),
('175', 'PaquistÃ¡n'),
('176', 'Paraguay'),
('177', 'PerÃº'),
('178', 'Pitcairn'),
('179', 'Polinesia Francesa'),
('18', 'Armenia'),
('180', 'Polonia'),
('181', 'Portugal'),
('182', 'Puerto Rico'),
('183', 'Qatar'),
('184', 'Reino Unido'),
('185', 'RepÃºblica Centroafricana'),
('186', 'RepÃºblica Checa'),
('187', 'RepÃºblica de SudÃ¡frica'),
('188', 'RepÃºblica Dominicana'),
('189', 'RepÃºblica Eslovaca'),
('19', 'Aruba'),
('190', 'ReuniÃ³n'),
('191', 'Ruanda'),
('192', 'Rumania'),
('193', 'Rusia'),
('194', 'Sahara Occidental'),
('195', 'Saint Kitts y Nevis'),
('196', 'Samoa'),
('197', 'Samoa Americana'),
('198', 'San Marino'),
('199', 'San Vicente y Granadinas'),
('2', 'Europa'),
('20', 'Australia'),
('200', 'Santa Helena'),
('201', 'Santa LucÃ­a'),
('202', 'Santo TomÃ© y PrÃ­ncipe'),
('203', 'Senegal'),
('204', 'Seychelles'),
('205', 'Sierra Leona'),
('206', 'Singapur'),
('207', 'Siria'),
('208', 'Somalia'),
('209', 'Sri Lanka'),
('21', 'Austria'),
('210', 'St Pierre y Miquelon'),
('211', 'Suazilandia'),
('212', 'SudÃ¡n'),
('213', 'Suecia'),
('214', 'Suiza'),
('215', 'Surinam'),
('216', 'Tailandia'),
('217', 'TaiwÃ¡n'),
('218', 'Tanzania'),
('219', 'TayikistÃ¡n'),
('22', 'AzerbaiyÃ¡n'),
('220', 'Territorios franceses del Sur'),
('221', 'Timor Oriental'),
('222', 'Togo'),
('223', 'Tonga'),
('224', 'Trinidad y Tobago'),
('225', 'TÃºnez'),
('226', 'TurkmenistÃ¡n'),
('227', 'TurquÃ­a'),
('228', 'Tuvalu'),
('229', 'Ucrania'),
('23', 'Bahamas'),
('230', 'Uganda'),
('231', 'Uruguay'),
('232', 'UzbekistÃ¡n'),
('233', 'Vanuatu'),
('234', 'Venezuela'),
('235', 'Vietnam'),
('236', 'Yemen'),
('237', 'Yugoslavia'),
('238', 'Zambia'),
('239', 'Zimbabue'),
('24', 'Bahrein'),
('25', 'Bangladesh'),
('26', 'Barbados'),
('27', 'BÃ©lgica'),
('28', 'Belice'),
('29', 'Benin'),
('3', 'Africa'),
('30', 'Bermudas'),
('31', 'Bielorrusia'),
('32', 'Birmania'),
('33', 'Bolivia'),
('34', 'Bosnia y Herzegovina'),
('35', 'Botswana'),
('36', 'Brasil'),
('37', 'Brunei'),
('38', 'Bulgaria'),
('39', 'Burkina Faso'),
('4', 'Asia'),
('40', 'Burundi'),
('41', 'ButÃ¡n'),
('42', 'Cabo Verde'),
('43', 'Camboya'),
('44', 'CamerÃºn'),
('45', 'CanadÃ¡'),
('46', 'Chad'),
('47', 'Chile'),
('48', 'China'),
('49', 'Chipre'),
('5', 'Oceania'),
('50', 'Ciudad del Vaticano (Santa Sede)'),
('51', 'Colombia'),
('52', 'Comores'),
('53', 'Congo'),
('54', 'Congo, RepÃºblica DemocrÃ¡tica del'),
('55', 'Corea'),
('56', 'Corea del Norte'),
('57', 'Costa de MarfÃ­l'),
('58', 'Costa Rica'),
('59', 'Croacia (Hrvatska)'),
('6', 'AfganistÃ¡n'),
('60', 'Cuba'),
('61', 'Dinamarca'),
('62', 'Djibouti'),
('63', 'Dominica'),
('64', 'Ecuador'),
('65', 'Egipto'),
('66', 'El Salvador'),
('67', 'Emiratos Ãrabes Unidos'),
('68', 'Eritrea'),
('69', 'Eslovenia'),
('7', 'Albania'),
('70', 'EspaÃ±a'),
('71', 'Estados Unidos'),
('72', 'Estonia'),
('73', 'EtiopÃ­a'),
('74', 'Fiji'),
('75', 'Filipinas'),
('76', 'Finlandia'),
('77', 'Francia'),
('78', 'GabÃ³n'),
('79', 'Gambia'),
('8', 'Alemania'),
('80', 'Georgia'),
('81', 'Ghana'),
('82', 'Gibraltar'),
('83', 'Granada'),
('84', 'Grecia'),
('85', 'Groenlandia'),
('86', 'Guadalupe'),
('87', 'Guam'),
('88', 'Guatemala'),
('89', 'Guayana'),
('9', 'Andorra'),
('90', 'Guayana Francesa'),
('91', 'Guinea'),
('92', 'Guinea Ecuatorial'),
('93', 'Guinea-Bissau'),
('94', 'HaitÃ­'),
('95', 'Honduras'),
('96', 'HungrÃ­a'),
('97', 'India'),
('98', 'Indonesia'),
('99', 'Irak');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habla`
--

CREATE TABLE `habla` (
  `ID_IDIOMA` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habla`
--

INSERT INTO `habla` (`ID_IDIOMA`, `ID_Usuario`) VALUES
(50, '105330132474270054108');

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
(0, 'Afrikáans'),
(1, 'Akan'),
(2, 'AlbanÃ©s'),
(3, 'AlemÃ¡n'),
(4, 'AmhÃ¡rico'),
(5, 'Ãrabe'),
(6, 'Armenio'),
(7, 'AsamÃ©s'),
(8, 'Asirio'),
(9, 'Azerbaiyano'),
(10, 'Badini'),
(11, 'Bambara'),
(12, 'Baskir'),
(13, 'BengalÃ­'),
(14, 'Bielorruso'),
(15, 'Birmano'),
(16, 'Bisaya'),
(17, 'Bosnio'),
(18, 'Bravanese'),
(19, 'BÃºlgaro'),
(20, 'Cachemir'),
(21, 'Caldeo'),
(22, 'Camboyano'),
(23, 'CanarÃ©s'),
(24, 'CantonÃ©s'),
(25, 'CatalÃ¡n'),
(26, 'Cebuano'),
(27, 'Chamorro'),
(28, 'Chaozhou'),
(29, 'Chavacano'),
(30, 'Checo'),
(31, 'Chichewa'),
(32, 'Chiluba'),
(33, 'Chin'),
(34, 'ChuukÃ©s'),
(35, 'CingalÃ©s'),
(36, 'CingalÃ©s'),
(37, 'Coreano'),
(38, 'Cree'),
(39, 'Criollo haitiano'),
(40, 'Croata'),
(41, 'Dakota'),
(42, 'DanÃ©s'),
(43, 'DarÃ­'),
(44, 'Dinka'),
(45, 'Diula'),
(46, 'Dzongkha'),
(47, 'Eslovaco'),
(48, 'Esloveno'),
(49, 'Esloveno'),
(50, 'EspaÃ±ol'),
(51, 'Estonio'),
(52, 'EwÃ©'),
(53, 'Fante'),
(54, 'Farsi'),
(55, 'FeroÃ©s'),
(56, 'FinÃ©s'),
(57, 'Flamenco'),
(58, 'FrancÃ©s'),
(59, 'FrancÃ©s canadiense'),
(60, 'FrisÃ³n'),
(61, 'FujianÃ©s'),
(62, 'Fujiano'),
(63, 'Fula'),
(64, 'Fula'),
(65, 'Fulani'),
(66, 'Fuzhou'),
(67, 'Ga'),
(68, 'GaÃ©lico'),
(69, 'GalÃ©s'),
(70, 'Gallego'),
(71, 'Ganda'),
(72, 'Georgiano'),
(73, 'Gorani'),
(74, 'Griego'),
(75, 'Guanxi'),
(76, 'Gujarati'),
(77, 'Hakka'),
(78, 'HassanÃ­a'),
(79, 'Hausa'),
(80, 'Hebreo'),
(81, 'HiligainÃ³n'),
(82, 'Hindi'),
(83, 'Hindi de Fiyi'),
(84, 'HindÃº'),
(85, 'Hmong'),
(86, 'HolandÃ©s'),
(87, 'HÃºngaro'),
(88, 'Ibanag'),
(89, 'Igbo'),
(90, 'Ilocano'),
(91, 'Ilongo'),
(92, 'Indonesio'),
(93, 'InglÃ©s'),
(94, 'Inuit'),
(95, 'IrlandÃ©s'),
(96, 'IslandÃ©s'),
(97, 'Italiano'),
(98, 'Jalja'),
(99, 'JaponÃ©s'),
(100, 'JavanÃ©s'),
(101, 'Jemer'),
(102, 'Kanjobal'),
(103, 'Karen'),
(104, 'Kazajo'),
(105, 'Kikuyu'),
(106, 'KiÃ±aruanda'),
(107, 'KirguÃ­s'),
(108, 'Kirundi'),
(109, 'Kosovar'),
(110, 'Kotokoli'),
(111, 'Krio'),
(112, 'Kurdo'),
(113, 'Kurmanji'),
(114, 'Lakota'),
(115, 'Laosiano'),
(116, 'LatÃ­n'),
(117, 'LetÃ³n'),
(118, 'Lingala'),
(119, 'Lituano'),
(120, 'Luganda'),
(121, 'Luo'),
(122, 'Lusoga'),
(123, 'LuxemburguÃ©s'),
(124, 'Maay'),
(125, 'Macedonio'),
(126, 'Malayalam'),
(127, 'Malayo'),
(128, 'Maldiviano'),
(129, 'Malgache'),
(130, 'MaltÃ©s'),
(131, 'MandarÃ­n'),
(132, 'Mandinga'),
(133, 'Mandingo'),
(134, 'MaorÃ­'),
(135, 'MaratÃ­'),
(136, 'MarshalÃ©s'),
(137, 'Mien'),
(138, 'Mirpuri'),
(139, 'Mixteco'),
(140, 'Moldavo'),
(141, 'Mongol'),
(142, 'Napolitano'),
(143, 'Navajo'),
(144, 'NepalÃ­'),
(145, 'Noruego'),
(146, 'Nuer'),
(147, 'Ojibwa'),
(148, 'Oriya'),
(149, 'Oromo'),
(150, 'Osetio'),
(151, 'Pahari'),
(152, 'Pampango'),
(153, 'PanyabÃ­'),
(154, 'Pashto'),
(155, 'Patois'),
(156, 'Pidgin inglÃ©s'),
(157, 'Polaco'),
(158, 'PortuguÃ©s'),
(159, 'Pothwari'),
(160, 'PutiÃ¡n'),
(161, 'Quechua'),
(162, 'Romanche'),
(163, 'RomanÃ­'),
(164, 'Rumano'),
(165, 'Rundi'),
(166, 'Ruso'),
(167, 'Samoano'),
(168, 'Sango'),
(169, 'SÃ¡nscrito'),
(170, 'Serbio'),
(171, 'Sesotho'),
(172, 'Setsuana'),
(173, 'ShangainÃ©s'),
(174, 'Shona'),
(175, 'Sichuan'),
(176, 'Siciliano'),
(177, 'Sindhi'),
(178, 'Siswati/suazi'),
(179, 'SomalÃ­'),
(180, 'SondanÃ©s'),
(181, 'SoninkÃ©'),
(182, 'Sorani'),
(183, 'Suajili'),
(184, 'Sueco'),
(185, 'Susu'),
(186, 'Sylheti'),
(187, 'Tagalo'),
(188, 'TailandÃ©s'),
(189, 'TaiwanÃ©s'),
(190, 'Tamil'),
(191, 'Tayiko'),
(192, 'TelugÃº'),
(193, 'Tibetano'),
(194, 'TigriÃ±a'),
(195, 'Tongano'),
(196, 'Tsonga'),
(197, 'Turco'),
(198, 'Turcomano'),
(199, 'Ucraniano'),
(200, 'Uigur'),
(201, 'UrdÃº'),
(202, 'Uzbeco'),
(203, 'Vasco (euskera)'),
(204, 'Venda'),
(205, 'Vietnamita'),
(206, 'WÃ³lof'),
(207, 'Xhosa'),
(208, 'YakartanÃ©s'),
(209, 'Yao'),
(210, 'Yidis'),
(211, 'Yoruba'),
(212, 'Yupik'),
(213, 'ZulÃº');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `ID_Interes` bigint(20) NOT NULL,
  `Nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `interes`
--

INSERT INTO `interes` (`ID_Interes`, `Nombre`) VALUES
(1, 'citas'),
(2, 'fotos'),
(3, 'comer'),
(4, 'bailar'),
(5, 'deportes'),
(6, 'musica'),
(7, 'cultura'),
(8, 'amigos'),
(9, 'todos');

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
-- Volcado de datos para la tabla `le_interesa`
--

INSERT INTO `le_interesa` (`ID_PUNTO`, `ID_VIAJE`, `ID_Usuario`, `ID_Interes`) VALUES
(1, 1, '105330132474270054108', 1),
(2, 1, '105330132474270054108', 1),
(3, 1, '105330132474270054108', 7),
(4, 1, '105330132474270054108', 6),
(5, 2, '105330132474270054108', 3),
(6, 2, '105330132474270054108', 6),
(7, 2, '105330132474270054108', 4),
(8, 2, '105330132474270054108', 4),
(9, 2, '105330132474270054108', 3),
(10, 3, '105330132474270054108', 1),
(11, 3, '105330132474270054108', 5),
(12, 3, '105330132474270054108', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `ID_Publicacion` int(11) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comentario` varchar(211) NOT NULL,
  `Publico` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto`
--

CREATE TABLE `punto` (
  `ID_PUNTO` bigint(20) NOT NULL,
  `ID_VIAJE` bigint(20) NOT NULL,
  `ID_Usuario` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `EJE_X` varchar(20) NOT NULL,
  `EJE_Y` varchar(20) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FIN` date NOT NULL,
  `RADIO_EXTRA` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `punto`
--

INSERT INTO `punto` (`ID_PUNTO`, `ID_VIAJE`, `ID_Usuario`, `EJE_X`, `EJE_Y`, `FECHA_INICIO`, `FECHA_FIN`, `RADIO_EXTRA`) VALUES
(1, 1, '105330132474270054108', '-29.830213', '-60.791933', '2018-11-02', '2018-11-05', 20),
(2, 1, '105330132474270054108', '-28.409447', '-62.630297', '2018-11-05', '2018-11-08', 30),
(3, 1, '105330132474270054108', '-32.350892', '-63.641039', '2018-11-09', '2018-11-15', 25),
(4, 1, '105330132474270054108', '-33.531023', '-61.751391', '2018-11-16', '2018-11-20', 20),
(5, 2, '105330132474270054108', '-34.790347', '-58.523207', '2018-11-05', '2018-11-10', 10),
(6, 2, '105330132474270054108', '-38.993601', '-68.032217', '2018-11-10', '2018-11-11', 20),
(7, 2, '105330132474270054108', '-50.345327', '-71.604351', '2018-11-12', '2018-11-16', 15),
(8, 2, '105330132474270054108', '-48.268504', '-71.398716', '2018-11-16', '2018-11-19', 15),
(9, 2, '105330132474270054108', '-46.080784', '-70.673619', '2018-11-19', '2018-11-25', 22),
(10, 3, '105330132474270054108', '-29.908856', '-64.354678', '2018-11-06', '2018-11-15', 20),
(11, 3, '105330132474270054108', '-33.148225', '-65.354678', '2018-11-16', '2018-11-21', 15),
(12, 3, '105330132474270054108', '-32.501982', '-63.014346', '2018-11-22', '2018-11-24', 15);

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
  `Contacto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Edad`, `Pais`, `Descripcion_U`, `Contacto`) VALUES
('105330132474270054108', 'Roman', 'Venica', '0000-00-00', 'argentina', '', '');

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
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`ID_VIAJE`, `ID_Usuario`, `ID_ESCALA`, `NOMBRE`) VALUES
(1, '105330132474270054108', 17, 'Viaje por el norte'),
(2, '105330132474270054108', 17, 'Viaje por el pais'),
(3, '105330132474270054108', 17, 'Viaje por cordoba');

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
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
