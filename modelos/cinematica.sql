-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 08:11:16
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinematica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `idactor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `nombrePersonaje` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actor`
--

INSERT INTO `actor` (`idactor`, `nombre`, `apellido`, `nombrePersonaje`) VALUES
(1, 'Leonardo ', 'DiCaprio', 'asdasd'),
(2, 'Johnny', 'Depp', 'asdas'),
(3, 'Tom', 'Cruise', 'asdsad'),
(4, 'Jennifer', 'Lawrence', 'saadsd'),
(5, 'Scarlett', 'Johansson', 'aasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'Diego', 'Fernandez', 'pgl@pgl.com', 'd0d1b3721f62133f8e8b6eb710e58ad1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `iddirector` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`iddirector`, `nombre`, `apellido`, `nacionalidad`) VALUES
(1, 'Steven', 'Spielberg', 'Aleman'),
(2, 'Peter', 'Jackson', 'Aleman'),
(3, 'Martin', 'Scorsese', 'Escoses'),
(4, 'Christopher', 'Nolan', 'Estadounidense'),
(5, 'Ridley', 'Scott', 'Estadounidense'),
(6, 'Quentin', 'Tarantino', 'Italiano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `idfuncion` int(11) NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `pelicula` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `sillas` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`idfuncion`, `fechaInicio`, `fechaFin`, `pelicula`, `horario`, `sillas`, `precio`) VALUES
(1, '2022-11-29', '2023-10-16', 1, 2, 140, 150001),
(2, '2022-01-01', '2023-10-30', 2, 3, 450, 8000),
(3, '2022-09-28', '2023-10-25', 3, 3, 450, 7500),
(4, '2019-09-01', '2019-10-05', 4, 3, 410, 12000),
(6, '2019-11-08', '2024-10-31', 5, 1, 10, 100000),
(7, '2022-12-01', '2022-12-31', 4, 5, 432, 4000),
(10, '2022-12-01', '2023-01-07', 3, 3, 450, 12600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `nombre`) VALUES
(1, 'Accion'),
(2, 'Ficcion'),
(3, 'Terror'),
(4, 'Comedia'),
(5, 'Drama'),
(6, 'Fantasia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idhorario`, `horaInicio`, `horaFin`) VALUES
(1, '09:00:00', '11:00:00'),
(2, '13:00:00', '15:00:00'),
(3, '16:00:00', '18:00:00'),
(4, '19:00:00', '21:00:00'),
(5, '22:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `ididioma` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`ididioma`, `nombre`) VALUES
(1, 'Español'),
(2, 'Ingles'),
(3, 'Aleman'),
(4, 'Frances'),
(5, 'Portugues'),
(6, 'Japones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idpelicula` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sinopsis` varchar(45) DEFAULT NULL,
  `idioma` int(11) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `genero` int(11) NOT NULL,
  `director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idpelicula`, `nombre`, `sinopsis`, `idioma`, `imagen`, `genero`, `director`) VALUES
(1, 'pelicula1', 'sinopsis pelicula1', 1, 'images (7).jpg', 5, 6),
(2, 'pelicula2', 'sinopsis pelicula2', 1, 'images (6).jpg', 5, 3),
(3, 'pelicula3', 'sinopsis pelicula3', 4, 'images (4).jpg', 6, 6),
(4, 'pelicula4', 'sinopsis pelicula4', 6, 'descarga.jpg', 3, 2),
(5, 'pelicula5', 'sinopsis pelicula5', 1, NULL, 1, 1),
(6, 'pgl', 'kjcvkcjxhvkjcxhg', 3, '091c83bbeb72ebdae4dd9bb64e600410.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparto`
--

CREATE TABLE `reparto` (
  `idreparto` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idfuncion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciototal` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idusuario`, `idfuncion`, `cantidad`, `preciototal`, `fecha`) VALUES
(12, 13, 4, 5, 60000, '2022-12-15'),
(13, 1, 4, 10, 120000, '2022-12-15'),
(14, 1, 7, 8, 32000, '2022-12-15'),
(15, 17, 1, 10, 1500010, '2022-12-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'sergio', 'el socio', '321@321.com', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(10, 'sergio', 'amaru', 'am@am.com', 'c04cd38aeb30f3ad1f8ab4e64a0ded7b'),
(11, 'cualquiera', 'ese mismo', '456@456.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(13, 'sdsd', 'sdsd', '789@789.com', '68053af2923e00204c3ca7c6a3150cf7'),
(16, 'asas', 'asas', '963@963.com', '1ce927f875864094e3906a4a0b5ece68'),
(17, 'azsas', 'asas', '741@741.com', '2e65f2f2fdaf6c699b223c61b1b5ab89');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`idactor`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`iddirector`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`idfuncion`),
  ADD KEY `fk_funcion_pelicula1` (`pelicula`),
  ADD KEY `fk_funcion_horario1` (`horario`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idhorario`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`ididioma`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idpelicula`),
  ADD KEY `fk_pelicula_idioma` (`idioma`),
  ADD KEY `fk_pelicula_genero1` (`genero`),
  ADD KEY `fk_pelicula_director1` (`director`);

--
-- Indices de la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD PRIMARY KEY (`idreparto`),
  ADD KEY `fk_reparto_actor1` (`actor`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idfuncion` (`idfuncion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `idactor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `iddirector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `idfuncion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `ididioma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idpelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reparto`
--
ALTER TABLE `reparto`
  MODIFY `idreparto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `fk_funcion_horario1` FOREIGN KEY (`horario`) REFERENCES `horario` (`idhorario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcion_pelicula1` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`idpelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_pelicula_director1` FOREIGN KEY (`director`) REFERENCES `director` (`iddirector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_genero1` FOREIGN KEY (`genero`) REFERENCES `genero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_idioma` FOREIGN KEY (`idioma`) REFERENCES `idioma` (`ididioma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reparto`
--
ALTER TABLE `reparto`
  ADD CONSTRAINT `fk_reparto_actor1` FOREIGN KEY (`actor`) REFERENCES `actor` (`idactor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idfuncion`) REFERENCES `funcion` (`idfuncion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
