-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2018 a las 17:07:41
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
-- Base de datos: `olimpiadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_edad` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_edad`, `nombre`) VALUES
(1, 'Hasta 29'),
(2, '30 - 39'),
(3, '40 - 49'),
(4, '50 en Adelante'),
(5, 'Hasta 34'),
(6, '35 en Adelante'),
(7, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combinacion`
--

CREATE TABLE `combinacion` (
  `id_combinacion` int(10) NOT NULL,
  `id_deporte` int(10) NOT NULL,
  `id_sexo` int(10) NOT NULL,
  `id_edad` int(10) NOT NULL,
  `id_especialidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `combinacion`
--

INSERT INTO `combinacion` (`id_combinacion`, `id_deporte`, `id_sexo`, `id_edad`, `id_especialidad`) VALUES
(59, 1, 1, 1, 1),
(60, 1, 1, 2, 1),
(61, 1, 1, 3, 1),
(62, 1, 1, 4, 1),
(63, 1, 2, 1, 1),
(64, 1, 2, 2, 1),
(65, 1, 2, 3, 1),
(66, 1, 2, 4, 1),
(67, 1, 1, 1, 2),
(68, 1, 1, 2, 2),
(69, 1, 1, 3, 2),
(70, 1, 1, 4, 2),
(71, 1, 2, 1, 2),
(72, 1, 2, 2, 2),
(73, 1, 2, 3, 2),
(74, 1, 2, 4, 2),
(75, 2, 1, 5, 3),
(76, 2, 1, 6, 3),
(77, 2, 2, 5, 3),
(78, 2, 2, 6, 3),
(79, 3, 4, 7, 4),
(80, 3, 5, 7, 4),
(81, 3, 6, 7, 4),
(82, 4, 1, 7, 5),
(83, 4, 2, 7, 5),
(84, 5, 1, 7, 6),
(85, 5, 2, 7, 6),
(86, 6, 3, 7, 7),
(87, 7, 3, 7, 8),
(88, 8, 3, 7, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `id_deporte` int(10) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`id_deporte`, `nombre`, `imagen`, `descripcion`) VALUES
(1, 'Marat&oacuten', '../img/deportes/maraton.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(2, 'F&uacutetbol 7', '../img/deportes/futbol.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(3, 'Tenis de Mesa', '../img/deportes/pingpong.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(4, 'Voleibol', '../img/deportes/volei.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(5, 'B&aacutesquetbol', '../img/deportes/basquet.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(6, 'Ajedrez', '../img/deportes/ajedrez.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(7, 'Truco', '../img/deportes/truco.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!'),
(8, 'Loba', '../img/deportes/loba.jpg', 'Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `id_especialidad` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre`) VALUES
(1, '5 K'),
(2, '3 K '),
(3, 'F&uacutetbol 7'),
(4, 'Tenis de Mesa'),
(5, 'Voleibol'),
(6, 'B&aacutesquetbol'),
(7, 'Ajedrez'),
(8, 'Truco'),
(9, 'Loba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(10) NOT NULL,
  `id_persona` int(10) NOT NULL,
  `id_combinacion` int(10) NOT NULL,
  `fecha_inscripcion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(10) NOT NULL,
  `dni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Mixto'),
(4, 'Doble Masculino'),
(5, 'Doble Femenino'),
(6, 'Doble Mixto');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_edad`);

--
-- Indices de la tabla `combinacion`
--
ALTER TABLE `combinacion`
  ADD PRIMARY KEY (`id_combinacion`),
  ADD KEY `id_deporte` (`id_deporte`),
  ADD KEY `id_sexo` (`id_sexo`),
  ADD KEY `id_edad` (`id_edad`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`id_deporte`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_persona` (`id_persona`),
  ADD KEY `id_combinacion` (`id_combinacion`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_edad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `combinacion`
--
ALTER TABLE `combinacion`
  MODIFY `id_combinacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
  MODIFY `id_deporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id_especialidad` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `combinacion`
--
ALTER TABLE `combinacion`
  ADD CONSTRAINT `combinacion_ibfk_1` FOREIGN KEY (`id_edad`) REFERENCES `categoria` (`id_edad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combinacion_ibfk_2` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combinacion_ibfk_3` FOREIGN KEY (`id_deporte`) REFERENCES `deporte` (`id_deporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combinacion_ibfk_4` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
