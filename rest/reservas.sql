-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3013
-- Tiempo de generación: 31-03-2026 a las 04:45:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--
CREATE SCHEMA reservas;
USE reservas;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabania`
--

CREATE TABLE `cabania` (
  `id_cabania` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `precio_por_persona` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cabania`
--

INSERT INTO `cabania` (`id_cabania`, `nombre`, `capacidad`, `precio_por_persona`, `estado`) VALUES
(1, 'Hatillo', 4, 80000, 1),
(2, 'Carare', 8, 100000, 1),
(3, 'Centro', 2, 80000, 1),
(4, 'Gachanzuca', 4, 100000, 1),
(5, 'Garibay', 8, 80000, 1),
(6, 'Manga', 2, 100000, 1),
(7, 'Suárez Ulloa', 4, 80000, 1),
(8, 'Funcial', 4, 100000, 1),
(9, 'Tablón', 8, 100000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `fecha_registro`, `observaciones`) VALUES
(1, 1, '2024-01-10', 'Frecuente'),
(2, 2, '2024-02-15', 'Nuevo'),
(3, 3, '2024-03-20', 'Recomendado'),
(4, 4, '2024-04-05', 'Sin novedad'),
(5, 5, '2024-05-18', 'VIP'),
(6, 6, '2024-06-22', 'Pago puntual'),
(7, 7, '2024-07-01', 'Ocasional'),
(8, 8, '2024-08-12', 'Buen cliente'),
(9, 9, '2024-09-30', 'Activo'),
(10, 10, '2024-10-10', 'Preferencial'),
(11, 11, '2024-11-11', 'Nuevo'),
(12, 12, '2024-12-01', 'Frecuente'),
(13, 13, '2025-01-08', 'Sin novedad'),
(14, 14, '2025-01-20', 'VIP'),
(15, 15, '2025-02-14', 'Buen historial'),
(16, 16, '2025-02-28', 'Ocasional'),
(17, 17, '2025-03-05', 'Activo'),
(18, 18, '2025-03-18', 'Pago tardío'),
(19, 19, '2025-04-02', 'Recomendado'),
(20, 20, '2025-04-15', 'Frecuente'),
(21, 21, '2025-05-01', 'Nuevo'),
(22, 22, '2025-05-10', 'Preferencial'),
(23, 23, '2025-05-20', 'Sin novedad'),
(24, 24, '2025-06-01', 'Buen cliente'),
(25, 25, '2025-06-15', 'VIP'),
(26, 26, '2025-07-01', 'Ocasional'),
(27, 27, '2025-07-10', 'Activo'),
(28, 28, '2025-07-20', 'Frecuente'),
(29, 29, '2025-08-01', 'Recomendado'),
(30, 30, '2025-08-15', 'Sin novedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado_sesion` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `correo`, `contrasena`, `estado_sesion`, `id_usuario`) VALUES
(1, 'carlos.perez@gmail.com', 'U2#Segura2025$', 0, 2),
(2, 'ana.gomez@hotmail.com', 'U3#ClaveFuerte9$', 0, 3),
(3, 'luis.martinez@gmail.com', 'U4#PassAlta88$', 0, 4),
(4, 'laura.rodriguez@yahoo.com', 'U5#Seguridad77$', 0, 5),
(5, 'jorge.ramirez@gmail.com', 'U6#ClaveSafe66$', 0, 6),
(6, 'sofia.torres@gmail.com', 'U7#AccesoSeguro1$', 0, 7),
(7, 'andres.diaz@hotmail.com', 'U8#LoginStrong2$', 0, 8),
(8, 'valentina.moreno@gmail.com', 'U9#ClaveMax33$', 0, 9),
(9, 'diego.castro@gmail.com', 'U10#SecureKey44$', 0, 10),
(10, 'camila.ortiz@gmail.com', 'U11#PassPro55$', 0, 11),
(11, 'juan.herrera@yahoo.com', 'U12#ClaveTop66$', 0, 12),
(12, 'paula.rojas@gmail.com', 'U13#SeguraPlus7$', 0, 13),
(13, 'mateo.vargas@hotmail.com', 'U14#KeyFuerte8$', 0, 14),
(14, 'daniela.silva@gmail.com', 'U15#SafePass99$', 0, 15),
(15, 'sebastian.reyes@gmail.com', 'U16#LoginPro10$', 0, 16),
(16, 'natalia.cruz@yahoo.com', 'U17#ClaveAlta11$', 0, 17),
(17, 'felipe.mendoza@gmail.com', 'U18#SecureMe12$', 0, 18),
(18, 'juliana.guerrero@hotmail.com', 'U19#PassSeguro$', 0, 19),
(19, 'ricardo.navarro@gmail.com', 'U20#ClaveProMax$', 0, 20),
(20, 'angela.pineda@gmail.com', 'U21#Acceso123$', 0, 21),
(21, 'oscar.campos@hotmail.com', 'U22#ClaveFuerte$', 0, 22),
(22, 'diana.soto@gmail.com', 'U23#Seguridad$', 0, 23),
(23, 'hugo.ibarra@yahoo.com', 'U24#PassSeguro$', 0, 24),
(24, 'tatiana.leal@gmail.com', 'U25#ClaveAlta$', 0, 25),
(25, 'mauricio.acosta@gmail.com', 'U26#SafeLogin$', 0, 26),
(26, 'karen.bautista@hotmail.com', 'U27#ClavePro$', 0, 27),
(27, 'ivan.pena@gmail.com', 'U28#SeguraMax$', 0, 28),
(28, 'lina.cortes@yahoo.com', 'U29#KeyStrong$', 0, 29),
(29, 'alberto.suarez@gmail.com', 'U30#PassTop$', 0, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `id_factura` int(11) NOT NULL,
  `iva_unitario` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `iva_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`id_detalle`, `descripcion`, `cantidad`, `precio_unitario`, `subtotal`, `id_factura`, `iva_unitario`, `total`, `iva_subtotal`) VALUES
(1, 'Mojarra Frita', 10, 10000, 100000, 1, 1900, 119000, 19000),
(2, 'Cazuela', 12, 12000, 120000, 2, 2280, 142800, 22800),
(3, 'Hospedajea', 8, 80000, 640000, 3, 0, 640000, 0),
(4, 'Hospedaje', 4, 80000, 320000, 1, 0, 320000, 0),
(5, 'Hospedaje', 8, 80000, 640000, 5, 0, 640000, 0),
(6, 'Patacón Relleno', 8, 10000, 100000, 5, 1900, 119000, 19000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `impuestos` int(11) NOT NULL,
  `estado` enum('paga','pendiente') NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `numero_factura`, `fecha_emision`, `subtotal`, `impuestos`, `estado`, `id_reserva`, `total`) VALUES
(1, 1, '2026-03-30 19:48:13', 100000, 19000, 'paga', 7, 119000),
(2, 2, '2026-03-30 20:05:30', 120000, 22800, 'paga', 9, 142800),
(3, 3, '2026-03-30 20:27:21', 640000, 0, 'paga', 5, 640000),
(4, 4, '2026-03-30 20:31:15', 320000, 0, 'paga', 1, 320000),
(5, 5, '2026-03-30 20:37:36', 740000, 19000, 'paga', 11, 759000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `numero`, `capacidad`, `estado`) VALUES
(1, 1, 4, 1),
(2, 2, 6, 1),
(3, 3, 8, 1),
(4, 4, 10, 1),
(5, 5, 12, 1),
(6, 6, 14, 1),
(7, 7, 16, 1),
(8, 8, 4, 1),
(9, 9, 6, 1),
(10, 10, 8, 1),
(11, 11, 10, 1),
(12, 12, 12, 1),
(13, 13, 14, 1),
(14, 14, 16, 1),
(15, 15, 4, 1),
(16, 16, 6, 1),
(17, 17, 8, 1),
(18, 18, 10, 1),
(19, 19, 12, 1),
(20, 20, 14, 1),
(21, 21, 16, 1),
(22, 22, 4, 1),
(23, 23, 6, 1),
(24, 24, 8, 1),
(25, 25, 10, 1),
(26, 26, 12, 1),
(27, 27, 14, 1),
(28, 28, 16, 1),
(29, 29, 4, 1),
(30, 30, 6, 1),
(31, 1, 4, 1),
(32, 2, 6, 1),
(33, 3, 8, 1),
(34, 4, 10, 1),
(35, 5, 12, 1),
(36, 6, 14, 1),
(37, 7, 16, 1),
(38, 8, 4, 1),
(39, 9, 6, 1),
(40, 10, 8, 1),
(41, 11, 10, 1),
(42, 12, 12, 1),
(43, 13, 14, 1),
(44, 14, 16, 1),
(45, 15, 4, 1),
(46, 16, 6, 1),
(47, 17, 8, 1),
(48, 18, 10, 1),
(49, 19, 12, 1),
(50, 20, 14, 1),
(51, 21, 16, 1),
(52, 22, 4, 1),
(53, 23, 6, 1),
(54, 24, 8, 1),
(55, 25, 10, 1),
(56, 26, 12, 1),
(57, 27, 14, 1),
(58, 28, 16, 1),
(59, 29, 4, 1),
(60, 30, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` int(11) NOT NULL,
  `metodo` enum('efectivo','tarjeta') NOT NULL,
  `id_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `fecha`, `monto`, `metodo`, `id_factura`) VALUES
(1, '2026-03-30 20:53:30', 119000, 'efectivo', 1),
(2, '2026-03-30 20:53:30', 142800, 'tarjeta', 2),
(3, '2026-03-30 20:53:30', 640000, 'efectivo', 3),
(4, '2026-03-30 20:53:30', 320000, 'tarjeta', 4),
(5, '2026-03-30 20:53:30', 759000, 'tarjeta', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha_hora_inicio` datetime NOT NULL,
  `fecha_hora_fin` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `cantidad_personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_hora_inicio`, `fecha_hora_fin`, `id_cliente`, `estado`, `cantidad_personas`) VALUES
(1, '2026-03-30 18:03:16', '2026-03-30 20:03:16', 1, 0, 4),
(2, '2026-01-10 10:00:00', '2026-01-10 14:00:00', 1, 0, 4),
(3, '2026-01-25 14:00:00', '2026-01-25 18:00:00', 2, 0, 6),
(4, '2026-02-05 09:00:00', '2026-02-05 13:00:00', 3, 0, 2),
(5, '2026-02-18 16:00:00', '2026-02-18 20:00:00', 4, 0, 8),
(6, '2026-03-02 11:00:00', '2026-03-02 15:00:00', 5, 0, 4),
(7, '2026-03-10 13:30:00', '2026-03-10 17:30:00', 6, 0, 10),
(8, '2026-03-15 08:00:00', '2026-03-15 12:00:00', 7, 0, 6),
(9, '2026-03-20 17:00:00', '2026-03-20 21:00:00', 8, 0, 12),
(10, '2026-03-22 12:00:00', '2026-03-22 16:00:00', 9, 0, 4),
(11, '2026-03-25 15:00:00', '2026-03-25 19:00:00', 10, 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_cabania`
--

CREATE TABLE `reserva_cabania` (
  `id_reserva` int(11) NOT NULL,
  `id_cabania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva_cabania`
--

INSERT INTO `reserva_cabania` (`id_reserva`, `id_cabania`) VALUES
(1, 1),
(5, 5),
(11, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_mesa`
--

CREATE TABLE `reserva_mesa` (
  `id_reserva` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva_mesa`
--

INSERT INTO `reserva_mesa` (`id_reserva`, `id_mesa`) VALUES
(7, 4),
(9, 5),
(11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `description`) VALUES
(1, 'administrador', 'Administrador del Sistema'),
(2, 'usuario', 'Usuario normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `numero_documento` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `telefono`, `direccion`, `ciudad`, `fecha_nacimiento`, `estado`, `id_rol`) VALUES
(1, 'Miguel', 'Saenz', 1, '1001', '3100000001', 'Funcial', 'Togui', '2000-01-01', 1, 1),
(2, 'Carlos', 'Perez', 1, '1002', '3100000002', 'Funcial', 'Togui', '1999-02-02', 0, 2),
(3, 'Ana', 'Gomez', 1, '1003', '3100000003', 'Funcial', 'Togui', '2001-03-03', 1, 2),
(4, 'Luis', 'Martinez', 1, '1004', '3100000004', 'Funcial', 'Togui', '1998-04-04', 0, 2),
(5, 'Laura', 'Rodriguez', 1, '1005', '3100000005', 'Funcial', 'Togui', '2002-05-05', 1, 2),
(6, 'Jorge', 'Ramirez', 1, '1006', '3100000006', 'Funcial', 'Togui', '1997-06-06', 1, 2),
(7, 'Sofia', 'Torres', 1, '1007', '3100000007', 'Funcial', 'Togui', '2003-07-07', 0, 2),
(8, 'Andres', 'Diaz', 1, '1008', '3100000008', 'Funcial', 'Togui', '1996-08-08', 1, 2),
(9, 'Valentina', 'Moreno', 1, '1009', '3100000009', 'Funcial', 'Togui', '2004-09-09', 1, 2),
(10, 'Diego', 'Castro', 1, '1010', '3100000010', 'Funcial', 'Togui', '1995-10-10', 0, 2),
(11, 'Camila', 'Ortiz', 1, '1011', '3100000011', 'Funcial', 'Togui', '2000-11-11', 1, 2),
(12, 'Juan', 'Herrera', 1, '1012', '3100000012', 'Funcial', 'Togui', '1999-12-12', 0, 2),
(13, 'Paula', 'Rojas', 1, '1013', '3100000013', 'Funcial', 'Togui', '2001-01-13', 1, 2),
(14, 'Mateo', 'Vargas', 1, '1014', '3100000014', 'Funcial', 'Togui', '1998-02-14', 1, 2),
(15, 'Daniela', 'Silva', 1, '1015', '3100000015', 'Funcial', 'Togui', '2002-03-15', 0, 2),
(16, 'Sebastian', 'Reyes', 1, '1016', '3100000016', 'Funcial', 'Togui', '1997-04-16', 1, 2),
(17, 'Natalia', 'Cruz', 1, '1017', '3100000017', 'Funcial', 'Togui', '2003-05-17', 1, 2),
(18, 'Felipe', 'Mendoza', 1, '1018', '3100000018', 'Funcial', 'Togui', '1996-06-18', 0, 2),
(19, 'Juliana', 'Guerrero', 1, '1019', '3100000019', 'Funcial', 'Togui', '2004-07-19', 1, 2),
(20, 'Ricardo', 'Navarro', 1, '1020', '3100000020', 'Funcial', 'Togui', '1995-08-20', 1, 2),
(21, 'Angela', 'Pineda', 1, '1021', '3100000021', 'Funcial', 'Togui', '2000-09-21', 0, 2),
(22, 'Oscar', 'Campos', 1, '1022', '3100000022', 'Funcial', 'Togui', '1999-10-22', 1, 2),
(23, 'Diana', 'Soto', 1, '1023', '3100000023', 'Funcial', 'Togui', '2001-11-23', 1, 2),
(24, 'Hugo', 'Ibarra', 1, '1024', '3100000024', 'Funcial', 'Togui', '1998-12-24', 0, 2),
(25, 'Tatiana', 'Leal', 1, '1025', '3100000025', 'Funcial', 'Togui', '2002-01-25', 1, 2),
(26, 'Mauricio', 'Acosta', 1, '1026', '3100000026', 'Funcial', 'Togui', '1997-02-26', 1, 2),
(27, 'Karen', 'Bautista', 1, '1027', '3100000027', 'Funcial', 'Togui', '2003-03-27', 0, 2),
(28, 'Ivan', 'Peña', 1, '1028', '3100000028', 'Funcial', 'Togui', '1996-04-28', 1, 2),
(29, 'Lina', 'Cortes', 1, '1029', '3100000029', 'Funcial', 'Togui', '2004-05-29', 1, 2),
(30, 'Alberto', 'Suarez', 1, '1030', '3100000030', 'Funcial', 'Togui', '1995-06-30', 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabania`
--
ALTER TABLE `cabania`
  ADD PRIMARY KEY (`id_cabania`),
  ADD UNIQUE KEY `id_cabania` (`id_cabania`),
  ADD KEY `id_cabania_2` (`id_cabania`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_cliente` (`id_cliente`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cliente_2` (`id_cliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `id_cuenta` (`id_cuenta`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_cuenta_2` (`id_cuenta`),
  ADD KEY `correo_2` (`correo`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `detalle_factura_ibfk_1` (`id_factura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD UNIQUE KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_mesa_2` (`id_mesa`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_reserva_2` (`id_reserva`),
  ADD KEY `reserva_fk3` (`id_cliente`);

--
-- Indices de la tabla `reserva_cabania`
--
ALTER TABLE `reserva_cabania`
  ADD PRIMARY KEY (`id_reserva`,`id_cabania`),
  ADD KEY `reserva_cabania_fk1` (`id_cabania`);

--
-- Indices de la tabla `reserva_mesa`
--
ALTER TABLE `reserva_mesa`
  ADD PRIMARY KEY (`id_reserva`,`id_mesa`),
  ADD KEY `reserva_mesa_fk1` (`id_mesa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`),
  ADD KEY `id_rol_2` (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `usuario_fk10` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabania`
--
ALTER TABLE `cabania`
  MODIFY `id_cabania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reserva_cabania`
--
ALTER TABLE `reserva_cabania`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_fk1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_fk4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_fk3` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `reserva_cabania`
--
ALTER TABLE `reserva_cabania`
  ADD CONSTRAINT `reserva_cabania_fk0` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_cabania_fk1` FOREIGN KEY (`id_cabania`) REFERENCES `cabania` (`id_cabania`);

--
-- Filtros para la tabla `reserva_mesa`
--
ALTER TABLE `reserva_mesa`
  ADD CONSTRAINT `reserva_mesa_fk0` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_mesa_fk1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_fk10` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
