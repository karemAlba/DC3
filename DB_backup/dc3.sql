-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2018 a las 18:27:52
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dc3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_curso`
--

CREATE TABLE `tbl_curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `duracion` varchar(10) DEFAULT NULL,
  `f_inicio` date DEFAULT NULL,
  `f_termino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_curso`
--

INSERT INTO `tbl_curso` (`id`, `nombre`, `duracion`, `f_inicio`, `f_termino`) VALUES
(1, 'Combate contra incendios', '2', '2018-05-02', '2018-05-02'),
(2, 'Primeros auxilios', '2', '2018-05-03', '2018-05-03'),
(3, 'Integracion, organizacion y funcionamiento de la comision de seguridad e higiene', '2', '2018-05-04', '2018-05-04'),
(4, 'Metodos de evacuacion y desalojo', '2', '2018-05-07', '2018-05-07'),
(5, 'Programa especifico de seguridad e higiene para la operacion y mantenimiento de la maquinaria y equipo', '2', '2018-05-08', '2018-05-08'),
(6, 'Programa especifico de seguridad e higiene para el manejo, transporte y almacenamiento de sustancias quimicas', '6', '2018-05-09', '2018-05-09'),
(7, 'Procedimiento de uso de limpieza, mantenimiento, resguardo y disposicion del EPP ', '2', '2018-05-10', '2018-05-10'),
(8, 'Sistema de identificacion y comunicacion de peligros', '2', '2018-05-11', '2018-05-11'),
(9, 'Interpretacion de los elementos de senalizacion ', '3', '2018-05-15', '2018-05-15'),
(10, 'Peligros y riesgos de la electricidad estatica', '3', '2018-05-16', '2018-05-16'),
(11, 'Trabajo en alturas', '2', '2018-05-18', '2018-05-18'),
(12, 'Servicios preventivos de seguridad y salud en el trabajo', '2', '2018-05-22', '2018-05-22'),
(13, 'Uso y conservacion de las areas de trabajo', '2', '2018-05-24', '2018-05-24'),
(14, 'NOM-020-STPS-2011', '4', '2018-05-25', '2018-05-25'),
(15, 'Seguridad en las actividades en espacios confinados de acuerdo al art. 12 de la NOM-031-STPS-2011 y NOM-033-STPS-2015', '4', '2018-05-28', '2018-05-28'),
(16, 'Seguridad en la actividad de cargas manuales de acuerdo a la NOM-006-STPS-2014', '4', '2018-05-29', '2018-05-29'),
(17, 'Informacion a trabajadores por riesgos por iluminacion ', '4', '2018-05-30', '2018-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `curp` varchar(40) DEFAULT NULL,
  `puesto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`id`, `nombre`, `curp`, `puesto`) VALUES
(1, 'LORETO GARCIA ADRIANA', 'LOGA840517MMCRRD0', 'AUXILIAR ADMINISTRATIVO'),
(2, 'MOLINA MENDOZA LUCIA', 'MOML571030MMCLNC0', 'INTENDENCIA'),
(3, 'COLIN ARIAS GUADALUPE', 'COAG611219MDFLRD04', 'OFICIAL GASOLINERO'),
(4, 'DOMINGUEZ MOLINA NORMA CRISTINA', 'DOMN800427MMCMLR0', 'OFICIAL GASOLINERO'),
(5, 'ESTRADA CASTA?EDA JUAN', 'EACJ660127HMCSSN03', 'OFICIAL GASOLINERO'),
(6, 'MILLAN ALTAMIRANO VICTOR MANUEL', 'MIAV910221HMCLLC01', 'OFICIAL GASOLINERO'),
(7, 'ORTIZ SALGADO ALFONSO JAVIER', 'OISA680727HMCRLL03', 'OFICIAL GASOLINERO'),
(8, 'ORTIZ SALGADO FRANCISCO ALEJANDRO', 'OISF650129HMCRLR04', 'OFICIAL GASOLINERO'),
(9, 'PEREZ LABASTIDA EULOGIO BENITO', 'PELE650311HMCRBL08', 'OFICIAL GASOLINERO'),
(10, 'ORDO?EZ LOPEZ JOSE ANTONIO', 'OOLA841110HMCRPN0', 'OFICIAL GASOLINERO'),
(11, 'GUTIERREZ FLORES ELVIA ROCIO', 'GUFE950924MMCTLL00', 'AUXILIAR ADMINISTRATIVO'),
(12, 'MARTINEZ LOPEZ HECTOR DANIEL', 'MALH911101HMCRPC0', 'AUXILIAR ADMINISTRATIVO'),
(13, 'GARCIA DE LA CRUZ RODOLFO', 'GACR720317HMCRRD0', 'OFICIAL GASOLINERO'),
(14, 'RIVERA SANCHEZ RODOLFO', 'RISR821001HMCVND04', 'OFICIAL GASOLINERO'),
(15, 'DE JESUS BAUTISTA JUAN?', 'JEBJ710516HMCSTN03', 'OFICIAL GASOLINERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estacion`
--

CREATE TABLE `tbl_estacion` (
  `id` int(11) NOT NULL,
  `r_social` varchar(50) DEFAULT NULL,
  `rfc` varchar(50) DEFAULT NULL,
  `r_patronal` varchar(50) DEFAULT NULL,
  `r_trabajador` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estacion`
--

INSERT INTO `tbl_estacion` (`id`, `r_social`, `rfc`, `r_patronal`, `r_trabajador`) VALUES
(1, 'SERVICIO GRILLOS S.A. DE C.V.', 'SGR9601294J2', 'ADRIANA LORETO GARCIA', 'ELVIA ROCIO GUTIERREZ FLORES');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_estacion`
--
ALTER TABLE `tbl_estacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_curso`
--
ALTER TABLE `tbl_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_estacion`
--
ALTER TABLE `tbl_estacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
