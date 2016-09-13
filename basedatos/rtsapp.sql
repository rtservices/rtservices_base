-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2016 a las 16:15:02
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `rtsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclasejugador_det`
--

CREATE TABLE IF NOT EXISTS `rtsclasejugador_det` (
`IdClasejugador` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdPlanClase_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rtsclasejugador_det`
--

INSERT INTO `rtsclasejugador_det` (`IdClasejugador`, `Estado`, `IdClase_deb`, `IdPlanClase_deb`) VALUES
(3, 1, 1, 2),
(5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsclase_deb`
--

CREATE TABLE IF NOT EXISTS `rtsclase_deb` (
`IdClase` int(11) NOT NULL,
  `NombreClase` varchar(50) COLLATE utf8_bin NOT NULL,
  `HoraInicio` varchar(20) COLLATE utf8_bin NOT NULL,
  `HoraFinal` varchar(20) COLLATE utf8_bin NOT NULL,
  `Dia` varchar(20) COLLATE utf8_bin NOT NULL,
  `CantidadJugadores` int(2) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `rtsclase_deb`
--

INSERT INTO `rtsclase_deb` (`IdClase`, `NombreClase`, `HoraInicio`, `HoraFinal`, `Dia`, `CantidadJugadores`, `Estado`, `IdPersonaRol_det`) VALUES
(1, 'Primera clase', '17:00', '17:45', 'Viernes', 0, 1, 2),
(2, 'Segunda clase', '17:15', '18:00', 'Lunes', 0, 1, 2),
(3, 'Tercera clase', '18:00', '18:45', 'Lunes', 0, 1, 2),
(4, 'Cuarta clase', '18:45', '19:30', 'Lunes', 0, 1, 2),
(5, 'Quinta clase', '19:30', '20:15', 'Lunes', 0, 1, 2),
(6, 'Sexta clase', '20:15', '21:00', 'Lunes', 0, 1, 2),
(7, 'Primera clase', '16:30', '17:15', 'Martes', 0, 1, 2),
(8, 'Segunda clase', '17:15', '18:00', 'Martes', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtseps`
--

CREATE TABLE IF NOT EXISTS `rtseps` (
`IdEps` int(11) NOT NULL,
  `NombreEps` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(15) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rtseps`
--

INSERT INTO `rtseps` (`IdEps`, `NombreEps`, `Telefono`, `Estado`) VALUES
(1, 'Fundación Medico Preventiva', '12358', 1),
(2, 'Sisben', '12345', 1),
(3, 'Sura EPS', '4178744', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtslogin_deb`
--

CREATE TABLE IF NOT EXISTS `rtslogin_deb` (
`IdLogin` int(11) NOT NULL,
  `Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `Clave` varchar(255) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `IdPersona` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `rtslogin_deb`
--

INSERT INTO `rtslogin_deb` (`IdLogin`, `Usuario`, `Clave`, `Estado`, `IdPersonaRol`, `IdPersona`) VALUES
(1, 'root', '827ccb0eea8a706c4c34a16891f84e7b', 1, '1,2,3', 1),
(2, 'instructor', '827ccb0eea8a706c4c34a16891f84e7b', 1, '4,5,6', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterial`
--

CREATE TABLE IF NOT EXISTS `rtsmaterial` (
`IdMaterial` int(11) NOT NULL,
  `DescripcionMaterial` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rtsmaterial`
--

INSERT INTO `rtsmaterial` (`IdMaterial`, `DescripcionMaterial`, `Estado`) VALUES
(1, 'Raqueta adulto', 1),
(2, 'Raqueta niño', 1),
(3, 'Raqueta transición', 1),
(4, 'Pelota sencilla', 0),
(5, 'Pelota 15cm x 10cm', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterialclase_det`
--

CREATE TABLE IF NOT EXISTS `rtsmaterialclase_det` (
`IdMaterialClase` int(11) NOT NULL,
  `Cantidad` varchar(5) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdClase_deb` int(11) DEFAULT NULL,
  `IdMaterial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersonarol_det`
--

CREATE TABLE IF NOT EXISTS `rtspersonarol_det` (
`IdPersonaRol` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersona_deb` int(11) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `rtspersonarol_det`
--

INSERT INTO `rtspersonarol_det` (`IdPersonaRol`, `Estado`, `IdPersona_deb`, `IdRol`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 0, 2, 1),
(5, 1, 2, 2),
(6, 1, 2, 3),
(7, 1, 3, 1),
(8, 1, 3, 2),
(9, 1, 3, 3),
(10, 1, 4, 1),
(11, 1, 4, 2),
(12, 1, 4, 3),
(13, 0, 5, 1),
(14, 0, 5, 2),
(15, 0, 5, 3),
(16, 0, 6, 1),
(17, 0, 6, 2),
(18, 1, 6, 3),
(19, 0, 7, 1),
(20, 0, 7, 2),
(21, 0, 7, 3),
(22, 0, 8, 1),
(23, 0, 8, 2),
(24, 1, 8, 3),
(25, 0, 9, 1),
(26, 1, 9, 2),
(27, 1, 9, 3),
(28, 0, 10, 1),
(29, 0, 10, 2),
(30, 0, 10, 3),
(31, 0, 11, 1),
(32, 0, 11, 2),
(33, 0, 11, 3),
(34, 0, 12, 1),
(35, 0, 12, 2),
(36, 0, 12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtspersona_deb`
--

CREATE TABLE IF NOT EXISTS `rtspersona_deb` (
`IdPersona` int(11) NOT NULL,
  `Documento` bigint(15) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_bin NOT NULL,
  `Apellidos` varchar(40) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(2) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `DireccionResidencia` varchar(40) COLLATE utf8_bin NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Celular` varchar(12) COLLATE utf8_bin NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdEps` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `rtspersona_deb`
--

INSERT INTO `rtspersona_deb` (`IdPersona`, `Documento`, `Nombre`, `Apellidos`, `Genero`, `Correo`, `DireccionResidencia`, `Telefono`, `Celular`, `FechaNacimiento`, `FechaIngreso`, `Estado`, `IdEps`) VALUES
(1, 1000000000, 'Robledo', 'Tenis Club', 'H', 'esneider.m12@gmail.com', 'Calle 88B #67-53', 6064973, '3218074451', '1996-04-02', '2016-02-08', 1, 1),
(2, 1035433509, 'Carlos Alberto', 'Acevedo Vallejo', 'M', 'carlos.acevedo152011@gmail.com', 'Calle 89A #74-27 ', 4414017, '3217090693', '1995-06-06', '2015-10-14', 1, 2),
(3, 1254444874, 'Santiago ', 'Velasquez Montoya ', 'M', 'velasquezsantiago1003@gmail.com', ' Carrera 25 #21-45', 2144455, '3125441122', '1997-10-31', '2016-02-08', 1, 1),
(4, 1036543123, 'Yeison Alexander', 'Diaz Gallo   ', 'H', 'yeison1325@gmail.com ', ' Calle 91# 69-17', 4416364, '3125669888', '1995-12-06', '2016-02-08', 1, 2),
(5, 12544221111, 'Jose Esneider', 'Mejia Ciro', 'H', 'esneidermanss@gmail.com', 'Carrera 45 # 45-98', 2571478, '3125441122', '1996-04-02', '2016-07-15', 0, 1),
(6, 2354411111, 'Maryely', 'Gonzales Garcia', 'M', 'aaaa@aaa.com', 'Calle 57 #14-23', 3215422, '2114455541', '2016-02-05', '2016-11-15', 1, 1),
(7, 32541125541, 'Camila Rogelia', 'Artrozis Meridos', 'M', 'estosirve@gmail.com', 'Calle 89D #56-87', 3125441, '3145774444', '1990-02-08', '2016-02-16', 1, 3),
(8, 1032112144, 'Miguel', 'Ansermo Pancracio', 'H', 'pancramiguel@gmail.com', 'Carrera 35 #45-12', 2114455, '3214511122', '2016-03-23', '2016-05-18', 1, 1),
(9, 1023541122, 'Arturo Ramiro', 'Hernandez Ramirez', 'H', 'arturra@gmail.com', 'Calle 25 # 45-65', 3652211, '3218045522', '1999-02-04', '2016-03-21', 1, 3),
(10, 96020417883, 'Erica', 'Londoño Prieto', 'M', 'erikayul@hotmail.com', 'carrera 25 # 58- 69', 3215411, '', '2000-02-02', '2016-03-22', 0, 2),
(11, 10326511122, 'Julian Jose', 'Jaramillo Velez', 'H', 'JosedeJesus@gmail.com', 'Carrera 12 # 12-14', 6321111, '3215412233', '1996-06-06', '2016-04-10', 0, 3),
(12, 24234234243, 'qeqweqweqwe', 'qweqweqwe', 'H', 'qweqw@gmail.com', 'qweqweqwe', 31233333, '312331233333', '1999-06-09', '2016-04-10', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsplanclase_deb`
--

CREATE TABLE IF NOT EXISTS `rtsplanclase_deb` (
`IdPlanClase` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `DiasRestantes` int(11) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rtsplanclase_deb`
--

INSERT INTO `rtsplanclase_deb` (`IdPlanClase`, `FechaInicio`, `DiasRestantes`, `Estado`, `IdPersonaRol_det`) VALUES
(1, '2016-01-06', 24, 1, 3),
(2, '2016-02-03', 24, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresponsablejugador_det`
--

CREATE TABLE IF NOT EXISTS `rtsresponsablejugador_det` (
`IdResponsableJugador` int(11) NOT NULL,
  `Parentesco` varchar(20) NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdPersonaRol_det` int(11) DEFAULT NULL,
  `IdPersona_deb` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `rtsresponsablejugador_det`
--

INSERT INTO `rtsresponsablejugador_det` (`IdResponsableJugador`, `Parentesco`, `Estado`, `IdPersonaRol_det`, `IdPersona_deb`) VALUES
(1, 'Hermano', 1, 6, 1),
(2, 'Primo', 1, 6, 3),
(3, 'Madre', 1, 18, 7),
(4, 'Padre', 1, 18, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsresset_deb`
--

CREATE TABLE IF NOT EXISTS `rtsresset_deb` (
`IdResset` int(11) NOT NULL,
  `Token` varchar(255) COLLATE utf8_bin NOT NULL,
  `FechaGenerada` date NOT NULL,
  `Estado` tinyint(2) NOT NULL,
  `IdLogin_deb` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rtsresset_deb`
--

INSERT INTO `rtsresset_deb` (`IdResset`, `Token`, `FechaGenerada`, `Estado`, `IdLogin_deb`) VALUES
(3, 'J.K2VIOLVOYUEUFJGEZ6MSXRRZORHCB0CV37DSS8FQ1TKGB.VA5G127T0VJI7VJJPMR2DJAS8BLSSWSN5X27ZA0.4JIBE0V3MM5Z4FRDRB5J7X5DU8LTILSN', '2016-07-22', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsrol`
--

CREATE TABLE IF NOT EXISTS `rtsrol` (
`IdRol` int(11) NOT NULL,
  `NombreRol` varchar(25) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rtsrol`
--

INSERT INTO `rtsrol` (`IdRol`, `NombreRol`, `Estado`) VALUES
(1, 'Administrador', 1),
(2, 'Instructor', 1),
(3, 'Jugador', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
 ADD PRIMARY KEY (`IdClasejugador`), ADD KEY `fkcl` (`IdClase_deb`), ADD KEY `fkplacla` (`IdPlanClase_deb`);

--
-- Indices de la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
 ADD PRIMARY KEY (`IdClase`), ADD KEY `fkins` (`IdPersonaRol_det`);

--
-- Indices de la tabla `rtseps`
--
ALTER TABLE `rtseps`
 ADD PRIMARY KEY (`IdEps`);

--
-- Indices de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
 ADD PRIMARY KEY (`IdLogin`), ADD KEY `fkpersorol` (`IdPersonaRol`);

--
-- Indices de la tabla `rtsmaterial`
--
ALTER TABLE `rtsmaterial`
 ADD PRIMARY KEY (`IdMaterial`);

--
-- Indices de la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
 ADD PRIMARY KEY (`IdMaterialClase`), ADD KEY `fkcla` (`IdClase_deb`), ADD KEY `fkmaterial` (`IdMaterial`);

--
-- Indices de la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
 ADD PRIMARY KEY (`IdPersonaRol`), ADD KEY `fkPer` (`IdPersona_deb`), ADD KEY `fkrol` (`IdRol`);

--
-- Indices de la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
 ADD PRIMARY KEY (`IdPersona`), ADD UNIQUE KEY `Documento` (`Documento`), ADD UNIQUE KEY `Correo` (`Correo`), ADD KEY `fkEps` (`IdEps`);

--
-- Indices de la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
 ADD PRIMARY KEY (`IdPlanClase`), ADD KEY `fkJug` (`IdPersonaRol_det`);

--
-- Indices de la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
 ADD PRIMARY KEY (`IdResponsableJugador`), ADD KEY `fkpersona` (`IdPersonaRol_det`), ADD KEY `IdPersona_deb` (`IdPersona_deb`);

--
-- Indices de la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
 ADD PRIMARY KEY (`IdResset`), ADD UNIQUE KEY `Token` (`Token`), ADD KEY `fklo` (`IdLogin_deb`);

--
-- Indices de la tabla `rtsrol`
--
ALTER TABLE `rtsrol`
 ADD PRIMARY KEY (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
MODIFY `IdClasejugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
MODIFY `IdClase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `rtseps`
--
ALTER TABLE `rtseps`
MODIFY `IdEps` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtslogin_deb`
--
ALTER TABLE `rtslogin_deb`
MODIFY `IdLogin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rtsmaterial`
--
ALTER TABLE `rtsmaterial`
MODIFY `IdMaterial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
MODIFY `IdMaterialClase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
MODIFY `IdPersonaRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
MODIFY `IdPlanClase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
MODIFY `IdResponsableJugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
MODIFY `IdResset` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rtsrol`
--
ALTER TABLE `rtsrol`
MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rtsclasejugador_det`
--
ALTER TABLE `rtsclasejugador_det`
ADD CONSTRAINT `fkcl` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`),
ADD CONSTRAINT `fkplacla` FOREIGN KEY (`IdPlanClase_deb`) REFERENCES `rtsplanclase_deb` (`IdPlanClase`);

--
-- Filtros para la tabla `rtsclase_deb`
--
ALTER TABLE `rtsclase_deb`
ADD CONSTRAINT `fkins` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtsmaterialclase_det`
--
ALTER TABLE `rtsmaterialclase_det`
ADD CONSTRAINT `fkcla` FOREIGN KEY (`IdClase_deb`) REFERENCES `rtsclase_deb` (`IdClase`),
ADD CONSTRAINT `fkmaterial` FOREIGN KEY (`IdMaterial`) REFERENCES `rtsmaterial` (`IdMaterial`);

--
-- Filtros para la tabla `rtspersonarol_det`
--
ALTER TABLE `rtspersonarol_det`
ADD CONSTRAINT `fkPer` FOREIGN KEY (`IdPersona_deb`) REFERENCES `rtspersona_deb` (`IdPersona`),
ADD CONSTRAINT `fkrol` FOREIGN KEY (`IdRol`) REFERENCES `rtsrol` (`IdRol`);

--
-- Filtros para la tabla `rtspersona_deb`
--
ALTER TABLE `rtspersona_deb`
ADD CONSTRAINT `fkEps` FOREIGN KEY (`IdEps`) REFERENCES `rtseps` (`IdEps`);

--
-- Filtros para la tabla `rtsplanclase_deb`
--
ALTER TABLE `rtsplanclase_deb`
ADD CONSTRAINT `fkJug` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`);

--
-- Filtros para la tabla `rtsresponsablejugador_det`
--
ALTER TABLE `rtsresponsablejugador_det`
ADD CONSTRAINT `fkpersona` FOREIGN KEY (`IdPersonaRol_det`) REFERENCES `rtspersonarol_det` (`IdPersonaRol`),
ADD CONSTRAINT `rtsresponsablejugador_det_ibfk_1` FOREIGN KEY (`IdPersona_deb`) REFERENCES `rtspersona_deb` (`IdPersona`);

--
-- Filtros para la tabla `rtsresset_deb`
--
ALTER TABLE `rtsresset_deb`
ADD CONSTRAINT `fklo` FOREIGN KEY (`IdLogin_deb`) REFERENCES `rtslogin_deb` (`IdLogin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
