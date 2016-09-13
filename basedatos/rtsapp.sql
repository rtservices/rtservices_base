-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2016 a las 16:32:35
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
(1, 'No aplica', '-', 1);

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
(1, 'root', '827ccb0eea8a706c4c34a16891f84e7b', 1, '1,2,3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rtsmaterial`
--

CREATE TABLE IF NOT EXISTS `rtsmaterial` (
`IdMaterial` int(11) NOT NULL,
  `DescripcionMaterial` varchar(45) COLLATE utf8_bin NOT NULL,
  `Estado` tinyint(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

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
(3, 1, 1, 3);

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
(1, 1000000000, 'Robledo', 'Tenis Club', 'H', 'rackettenisservices@gmail.com', '', 0, '0', '1990-01-01', '2016-09-13', 1, 1);

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
