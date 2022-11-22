-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 09-11-2022 a las 11:25:48
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_aergibide`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `num_Empleado` varchar(5) NOT NULL,
  `nombre_Empleado` varchar(15) DEFAULT NULL,
  `apellidos_Empleado` varchar(20) DEFAULT NULL,
  `telefono_Empleado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`num_Empleado`, `nombre_Empleado`, `apellidos_Empleado`, `telefono_Empleado`) VALUES
('12345', 'Iker', 'martinez', 666778899);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `empleados_num_Empleado` varchar(5) NOT NULL,
  `preguntas_idpreguntas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`empleados_num_Empleado`, `preguntas_idpreguntas`) VALUES
('12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idpreguntas` int NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  `empleados_num_Empleado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idpreguntas`, `titulo`, `tag`, `empleados_num_Empleado`) VALUES
(1, 'Pregunta1', 'php', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`num_Empleado`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`empleados_num_Empleado`,`preguntas_idpreguntas`),
  ADD KEY `fk_empleados_has_preguntas_preguntas2_idx` (`preguntas_idpreguntas`),
  ADD KEY `fk_empleados_has_preguntas_empleados2_idx` (`empleados_num_Empleado`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idpreguntas`,`empleados_num_Empleado`),
  ADD KEY `fk_preguntas_empleados1_idx` (`empleados_num_Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idpreguntas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `fk_empleados_has_preguntas_empleados2` FOREIGN KEY (`empleados_num_Empleado`) REFERENCES `empleados` (`num_Empleado`),
  ADD CONSTRAINT `fk_empleados_has_preguntas_preguntas2` FOREIGN KEY (`preguntas_idpreguntas`) REFERENCES `preguntas` (`idpreguntas`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_empleados1` FOREIGN KEY (`empleados_num_Empleado`) REFERENCES `empleados` (`num_Empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
