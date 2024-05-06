-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2024 a las 03:27:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `codasig` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `intensidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codasig`, `nombre`, `valor`, `intensidad`) VALUES
('1', 'Logica', 5, 2),
('2', 'PHP Intermedio', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ident` varchar(12) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ident`, `apellidos`, `nombres`, `correo`, `contrasena`) VALUES
('121212', 'aas', 'www', 'wasw@gmail.com', '111'),
('23', 'sfdsf', 'sdfdsf', 'dfsd', '456'),
('454577', 'PÃ©rez', 'Maria Salome', 'pperez@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ident` varchar(12) NOT NULL,
  `codasig` varchar(3) NOT NULL,
  `periodo` varchar(6) NOT NULL,
  `notam1` double NOT NULL,
  `notam2` double NOT NULL,
  `notam3` double NOT NULL,
  `id_nota` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ident`, `codasig`, `periodo`, `notam1`, `notam2`, `notam3`, `id_nota`, `activo`) VALUES
('121212', '1', '3', 4, 3, 4, 1, 0),
('121212', '1', '1', 4, 3, 4, 2, 1),
('121212', '2', '3', 4, 3, 4, 3, 0),
('23', '2', '1', 3, 5, 5, 4, 0),
('23', '2', '2', 4, 4, 5, 5, 1),
('454577', '2', '3', 5, 5, 2, 6, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`codasig`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `ident` (`ident`),
  ADD KEY `codasig` (`codasig`),
  ADD KEY `periodo` (`periodo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_asignatura` FOREIGN KEY (`codasig`) REFERENCES `asignatura` (`codasig`),
  ADD CONSTRAINT `fk_nota_estudiante` FOREIGN KEY (`ident`) REFERENCES `estudiante` (`ident`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
