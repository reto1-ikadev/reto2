-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 24-11-2022 a las 12:18:38
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
CREATE DATABASE IF NOT EXISTS `db_aergibide` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_aergibide`;

CREATE USER 'ikasdev'@'%' IDENTIFIED BY 'ACai7925';
GRANT ALL PRIVILEGES ON db_aergibide.* TO 'ikasdev'@'%';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_respuesta`
--

CREATE TABLE `archivo_respuesta` (
  `id_respuesta` int NOT NULL,
  `id_archivo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `numEmple` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `pass` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numEmple`, `nombre`, `apellidos`, `pass`, `correo`, `departamento`) VALUES
(12345, 'Prueba', 'Cortes Perez', '$2y$10$2jr5cu4DCqF4qcdEiurIvuoIybHhtDqjJM3NlxLFYP8HrvM/g47TS', 'bobo@alejandro.esss', 'aeronautica'),
(12346, 'Aritz', 'castillo', '12346', 'aritz@castillo.es', 'aeronautica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `empleado_numEmple` int NOT NULL,
  `pregunta_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `guia` (
  `id` int NOT NULL,
  `contenido` varchar(45) DEFAULT NULL,
  `idArchivo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id` int NOT NULL,
  `empleado_numEmple` int NOT NULL,
  `titulo` varchar(4500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contenido` varchar(4500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tags` varchar(45) DEFAULT NULL,
  `empleado_numEmple` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int NOT NULL,
  `contenido` varchar(45) DEFAULT NULL,
  `empleado_numEmple` int NOT NULL,
  `pregunta_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_fav`
--

CREATE TABLE `respuestas_fav` (
  `empleado_numEmple` int NOT NULL,
  `id_respuesta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivo_respuesta`
--
ALTER TABLE `archivo_respuesta`
  ADD PRIMARY KEY (`id_respuesta`,`id_archivo`),
  ADD KEY `fk_id_archivo` (`id_archivo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`numEmple`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`empleado_numEmple`,`pregunta_id`),
  ADD KEY `fk_Empleado_has_Pregunta_Pregunta1_idx` (`pregunta_id`),
  ADD KEY `fk_Empleado_has_Pregunta_Empleado1_idx` (`empleado_numEmple`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `guia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idarchivo` (`idArchivo`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Notificacion_Empleado1_idx` (`empleado_numEmple`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pregunta_Empleado1_idx` (`empleado_numEmple`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`,`pregunta_id`),
  ADD KEY `fk_Respuesta_Empleado_idx` (`empleado_numEmple`),
  ADD KEY `fk_Respuesta_Pregunta1_idx` (`pregunta_id`);

--
-- Indices de la tabla `respuestas_fav`
--
ALTER TABLE `respuestas_fav`
  ADD PRIMARY KEY (`empleado_numEmple`,`id_respuesta`),
  ADD KEY `fk_Tutorial_Empleado1_idx` (`empleado_numEmple`),
  ADD KEY `fk_idrespuesta` (`id_respuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `guia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo_respuesta`
--
ALTER TABLE `archivo_respuesta`
  ADD CONSTRAINT `fk_id_archivo` FOREIGN KEY (`id_archivo`) REFERENCES `archivos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_id_respuesta` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `fk_Empleado_has_Pregunta_Empleado1` FOREIGN KEY (`empleado_numEmple`) REFERENCES `empleado` (`numEmple`),
  ADD CONSTRAINT `fk_Empleado_has_Pregunta_Pregunta1` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `guia`
--
ALTER TABLE `guia`
  ADD CONSTRAINT `fk_idarchivo` FOREIGN KEY (`idArchivo`) REFERENCES `archivos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_Notificacion_Empleado1` FOREIGN KEY (`empleado_numEmple`) REFERENCES `empleado` (`numEmple`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `fk_Pregunta_Empleado1` FOREIGN KEY (`empleado_numEmple`) REFERENCES `empleado` (`numEmple`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_Respuesta_Empleado` FOREIGN KEY (`empleado_numEmple`) REFERENCES `empleado` (`numEmple`),
  ADD CONSTRAINT `fk_Respuesta_Pregunta1` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `respuestas_fav`
--
ALTER TABLE `respuestas_fav`
  ADD CONSTRAINT `fk_idrespuesta` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_Tutorial_Empleado1` FOREIGN KEY (`empleado_numEmple`) REFERENCES `empleado` (`numEmple`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
