-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-03-2022 a las 17:41:40
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `informatica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_entrega_tinta_toner`
--

CREATE TABLE `bitacora_entrega_tinta_toner` (
  `id` int(11) NOT NULL,
  `fecha_cambio` date NOT NULL,
  `area` varchar(40) NOT NULL,
  `impresora` varchar(40) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `especificaciones` varchar(20) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `recibe` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora_entrega_tinta_toner`
--

INSERT INTO `bitacora_entrega_tinta_toner` (`id`, `fecha_cambio`, `area`, `impresora`, `tipo`, `especificaciones`, `cantidad`, `recibe`) VALUES
(1, '2022-01-12', 'Recaudación', 'Samsung', 'Toner', 'MLT-D111S', 1, 'Claudia Rosas Aguilar'),
(2, '2022-01-14', 'Servicios públicos', 'Samsung', 'Toner', 'MLT-D111S', 1, 'Jorge Aguilar García'),
(3, '2022-01-19', 'Recursos humanos', 'Canon', 'toner', 'D1520', 1, 'Claudia Cota'),
(4, '2022-01-19', 'Atención ciudadana', 'Samsung', 'Toner', 'M2020', 1, 'Martina V.'),
(5, '2022-01-19', 'Cabildo', 'Epson', 'Tanque', '---', 1, 'Lorena'),
(6, '2022-01-26', 'Recursos humanos', 'Canon', 'Toner', 'D1520', 1, 'José Patrón'),
(7, '2022-01-27', 'Delegación San Ignacio', 'Samsung', 'Toner', '5101A0', 2, 'Claudia Ojeda'),
(8, '2022-01-28', 'Delegación Vizcaíno', 'Samsung', 'Toner', 'ML2020', 1, 'Carmen Vega'),
(9, '2022-01-31', 'Catastro', 'HP', 'Toner', 'P3015', 3, 'Marcos Espinoza'),
(10, '2022-01-31', 'Delegación Bahía Tortugas', 'Samsung', 'Toner', 'ML2020', 1, 'María Auxiliadora Amador Higuera'),
(11, '2022-01-02', 'Tesorería', 'Canon', 'Tinta', '664', 1, 'Dalila Díaz'),
(12, '2022-01-02', 'Delegación San Bruno', 'Samsung', 'Toner', 'ML2020', 1, 'Norma Luz Rivera'),
(13, '2022-02-02', 'Recaudación', 'Epson', 'Tinta', '664', 1, 'Nayely De La Toba Mtz.'),
(14, '2022-02-03', 'Contabilidad', 'Canon', 'Toner', 'CE505', 2, 'Raúl Tamayo Armenta'),
(15, '2022-01-19', 'CADI', 'Samsung', 'Toner', 'M2020', 1, 'Elia Gpe. Ramírez'),
(16, '2022-02-04', 'Tránsito', 'Epson', 'Tanque', 'M100', 1, 'Emmanuel Fuerte'),
(17, '2022-02-08', 'Recaudación Mulegé', 'HP', 'Toner', '---', 1, 'Sandra Heylene N.'),
(18, '2022-02-09', 'Asesoría Jurídica', 'Epson', 'Tinta', '544', 1, 'Osiris Peralta O.'),
(19, '2022-02-09', 'Delegación Punta Abreojos', 'HP', 'Toner', 'M2020', 1, 'Erik Zúñiga'),
(20, '2022-02-10', 'Administración', 'HP', 'Toner', '248A', 1, 'Margarita Quintero R.'),
(21, '2022-02-10', 'Delegación Bahía Tortuga', 'Samsung', 'Toner', 'ML2020', 1, 'Lilia Villa'),
(22, '2022-02-11', 'Recaudación', 'Epson', 'Tanque', '774 (664)', 1, 'Cinthia Nayely De la Toba Mtz.'),
(23, '2022-02-14', 'DIF', 'Epson', 'Tanque', '664', 1, 'Francisco Javier Camacho'),
(24, '2022-02-16', 'Recaudación', 'Epson', 'Tanque', '544', 1, 'Ana Delia López V.'),
(25, '2022-02-16', 'Tesorería', 'Epson', 'Tanque', '544', 1, 'Lupita Ahumada'),
(26, '2022-02-16', 'Presidencia', 'Epson', 'Tanque', '544', 1, 'Silvia Núñez V.'),
(27, '2022-02-18', 'Cajas', 'Epson', 'Tanque', '664', 1, 'Cinthia Nayely De la Toba Mtz.'),
(28, '2022-02-21', 'Tránsito', 'Epson', 'Tanque', '664', 1, 'Jaime A. Sánchez Gutiérrez'),
(29, '2022-02-22', 'Recursos humanos', 'Epson', 'Tanque', 'M100', 1, 'José Patrón Cota'),
(30, '2022-02-22', 'Desarrollo', 'Epson', 'Tanque', '544', 1, 'Luís García'),
(31, '2022-02-23', 'Secretaría General', 'Epson', 'Tanque', '544', 1, 'Elia Gpe. Meza L.'),
(32, '2022-02-24', 'Tránsito', 'Samsung', 'Toner', 'M2020', 1, 'Gregoria Galderón'),
(33, '2022-02-24', 'Tránsito', 'Samsung', 'Toner', 'ML1910', 1, 'Gregoria Calderón'),
(34, '2022-02-25', 'Administración', 'Epson', 'Tanque', '664 / 544', 1, 'Jesús'),
(35, '2022-02-25', 'Servicios Públicos', 'Samsung', 'Toner', 'M2020', 1, '---'),
(36, '2022-02-25', 'Nómina', 'Toner', 'Toner', 'ML4020', 1, '---'),
(37, '2022-02-25', 'Atención ciudadana', 'Samsung', 'Toner', 'M2020', 1, 'Martina V.'),
(38, '2022-02-25', 'Contabilidad', 'Canon', 'Toner', '---', 1, 'Raúl Tamayo Armenta'),
(39, '2022-02-28', 'Recaudación', 'Samsung', 'Toner', 'M2020', 1, 'Claudia C. A.'),
(40, '2022-03-01', 'Deportes', 'HP', 'Toner', '285', 1, '---'),
(41, '2022-03-01', '---', 'Epson', 'Tanque', '544 / 664', 2, '---'),
(42, '2022-03-02', 'Cultura', 'Samsung', 'Toner', 'ML2020', 1, 'Sandra'),
(43, '2022-03-02', 'Tránsito', 'Epson', 'Tanque', '664', 1, 'Emmanuel'),
(44, '2022-03-02', 'Tortugas', 'HP', 'Toner', '1102', 1, 'Irasú Hdez.'),
(45, '2022-03-03', 'Deporte', 'Samsung', 'Toner', '5101A0', 1, 'Alberto C.'),
(46, '2022-03-03', 'Contabilidad', 'Canon', 'Toner', 'CE505A', 1, 'Raúl Tamayo Armenta'),
(47, '2022-03-04', 'Administración', 'Epson', 'Tanque', 'L575', 1, 'Lilia V.'),
(48, '2022-03-07', 'Administración', 'Epson', 'Tanque', 'L575', 1, 'Lilia V.'),
(49, '2022-03-04', 'Catastro Guerrero Negro', 'Canon', 'Tanque', '664', 4, '---'),
(50, '2022-03-08', 'Comunicación', 'Epson', 'Tanque', '774/664', 1, 'Claudia M.'),
(51, '2022-03-08', 'Recaudación', 'Epson', 'Tanque', 'L3110', 1, 'Ana Delia L.'),
(52, '2022-03-11', 'Recaudación', 'Epson', 'Tanque', 'M100', 1, 'Cinthia Nayeli Mtz.'),
(53, '2022-03-14', 'Asesoría Jurídica', 'Epson', 'Tanque', 'L3110', 1, 'Osiris Peralta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_mantenimiento`
--

CREATE TABLE `bitacora_mantenimiento` (
  `reporte` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `area_trabajo` varchar(40) NOT NULL,
  `unidad` varchar(40) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `solicitante` varchar(80) NOT NULL,
  `actividad` text NOT NULL,
  `observaciones` text NOT NULL,
  `conclusiones` text NOT NULL,
  `responsable` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora_mantenimiento`
--

INSERT INTO `bitacora_mantenimiento` (`reporte`, `fecha_ingreso`, `fecha_salida`, `area_trabajo`, `unidad`, `marca`, `modelo`, `solicitante`, `actividad`, `observaciones`, `conclusiones`, `responsable`) VALUES
(1, '2022-03-12', '2022-03-12', 'Recaudación', 'PC de escritorio', 'HP', 'DC6800', 'Carmen Vega', 'La computadora presenta lentitud en su tiempo de respuesta al ejecutar las órdenes del usuario.', 'Mucha acumulación de polvo en el interior del gabinete.', 'Al revisar el interior del gabinete, y observar que este presentaba una alta acumulación de polvo, se llegó a la conclusión de que tal acumulación propiciaba el sobrecalentamiento del equipo, lo que a su vez provocaba su lento tiempo de respuesta.\r\n\r\nPor el motivo anterior, se procedió a realizar limpieza general del hardware, también se le dio mantenimiento al software con el fin de mejorar su desempeño.', 'Manuel Antonio Sandoval Valenzuela'),
(2, '2022-03-12', '2022-03-12', 'Dirección del deporte', 'Impresora', 'Epson', 'L3110', 'Tete', 'La impresora muestra líneas blancas cuando imprime.', 'Posible obstrucción de los cabezales de impresión.', 'Se realizó limpieza de cabezales.', 'Manuel Antonio Sandoval Valenzuela.'),
(3, '2022-03-12', '2022-03-12', 'Sindicatura', 'Impresora', 'Epson', 'L575', 'Judith López', 'La impresora no imprime bien.', 'Hay líneas blancas al imprimir.', 'Se realizó limpieza de cabezales.', 'Manuel Antonio Sandoval Valenzuela.'),
(4, '2022-03-12', '2022-03-12', 'Instituto de la juventud', 'PC de escritorio', 'Lenovo', 'Think centre 50', 'Contralor', 'La computadora está muy lenta.', 'El sistema operativo y los programas tardan mucho tiempo en abrir, la respuesta a las órdenes del usuario tardan mucho tiempo en ejecutarse.', 'Se realizó limpieza del hardware y mantenimiento del software.', 'José Pablo Romero Verdugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadoras`
--

CREATE TABLE `computadoras` (
  `id` int(11) NOT NULL,
  `area` varchar(40) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE `impresoras` (
  `id` int(11) NOT NULL,
  `area` varchar(40) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `modelo` varchar(40) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `modelo_tinta_toner` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` tinytext NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `nombre` tinytext NOT NULL,
  `area` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `nombre`, `area`) VALUES
(1, 'Informática 1', '$2y$15$WBaEZFcLeDjiLWOWf4Td3OY3vBAbmbHEpE.Cbgeyk/B59nGeNHn.2', 'Manuel Antonio Sandoval Valenzuela', 'Informática');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora_entrega_tinta_toner`
--
ALTER TABLE `bitacora_entrega_tinta_toner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora_mantenimiento`
--
ALTER TABLE `bitacora_mantenimiento`
  ADD PRIMARY KEY (`reporte`);

--
-- Indices de la tabla `computadoras`
--
ALTER TABLE `computadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
