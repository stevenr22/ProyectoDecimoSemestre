-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2024 a las 05:14:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_mango`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id_detalle` int(11) NOT NULL,
  `fech_solicitud` date NOT NULL,
  `tipo_insu` varchar(255) NOT NULL,
  `nombre_insu` varchar(255) NOT NULL,
  `cantidad_insu` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_prove` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Recibido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id_detalle`, `fech_solicitud`, `tipo_insu`, `nombre_insu`, `cantidad_insu`, `id_solicitud`, `id_prove`, `estado`) VALUES
(75, '2024-01-10', 'Vehiculo', 'Chevrolet', 5, 73, 1, 'Facturado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Recibido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `fecha_emision`, `valor`, `total`, `id_solicitud`, `estado`) VALUES
(38, '2024-01-10', 5430.00, 27150.00, 73, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `id_insumo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `fecha_regis` date NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`id_insumo`, `nombre`, `tipo`, `fecha_regis`, `cantidad`, `estado`) VALUES
(81, 'Podadora', 'Herramienta', '2024-01-01', 10, 'Disponible'),
(82, 'Aspersor', 'Herramienta', '2024-01-01', 5, 'Disponible'),
(83, 'Fumigadores', 'Herramienta', '2024-01-01', 30, 'Disponible'),
(84, 'Pala', 'Herramienta', '2024-01-01', 50, 'Disponible'),
(85, 'Terragator', 'Maquinaria', '2024-01-01', 3, 'Disponible'),
(86, 'Tractor recolector', 'Maquinaria', '2024-01-01', 3, 'Disponible'),
(87, 'Herbicidas', 'Insecticida', '2024-01-01', 60, 'Disponible'),
(88, 'Fungicidas', 'Insecticida', '2024-01-01', 60, 'Disponible'),
(89, 'Acaricidas', 'Insecticida', '2024-01-01', 60, 'Disponible'),
(90, 'Mango Tommy', 'Mango', '2024-01-01', 1000, 'Disponible'),
(96, 'Aspersor', 'Herramienta', '2024-03-09', 6, 'Disponible'),
(97, 'Aspersor', 'Herramienta', '2024-05-09', 2, 'Disponible'),
(98, 'Aspersor', 'Herramienta', '2024-07-09', 5, 'Disponible'),
(99, 'Aspersor', 'Herramienta', '2024-09-09', 6, 'Disponible'),
(100, 'Aspersor', 'Herramienta', '2024-11-09', 2, 'Disponible'),
(101, 'Fumigadores', 'Herramienta', '2024-03-09', 2, 'Disponible'),
(102, 'Fumigadores', 'Herramienta', '2024-05-09', 5, 'Disponible'),
(103, 'Fumigadores', 'Herramienta', '2024-07-09', 7, 'Disponible'),
(104, 'Fumigadores', 'Herramienta', '2024-09-09', 8, 'Disponible'),
(105, 'Fumigadores', 'Herramienta', '2024-11-09', 8, 'Disponible'),
(110, 'Pala', 'Herramienta', '2024-03-09', 10, 'Disponible'),
(111, 'Pala', 'Herramienta', '2024-07-09', 10, 'Disponible'),
(112, 'Pala', 'Herramienta', '2024-11-09', 10, 'Disponible'),
(113, 'Podadora', 'Herramienta', '2024-03-09', 10, 'Disponible'),
(114, 'Podadora', 'Herramienta', '2024-07-09', 10, 'Disponible'),
(115, 'Podadora', 'Herramienta', '2024-11-09', 10, 'Disponible'),
(116, 'Aspersor', 'Herramienta', '2024-07-09', 10, 'Disponible'),
(117, 'Aspersor', 'Herramienta', '2024-11-09', 10, 'Disponible'),
(118, 'Terragator', 'Maquinaria', '2024-07-09', 1, 'Disponible'),
(119, 'Tractor recolector', 'Maquinaria', '2024-05-09', 1, 'Disponible'),
(120, 'Fungicidas', 'Insecticida', '2024-05-09', 60, 'Disponible'),
(121, 'Fungicidas', 'Insecticida', '2024-09-09', 60, 'Disponible'),
(122, 'Fungicidas', 'Insecticida', '2024-11-09', 60, 'Disponible'),
(123, 'Acaricidas', 'Insecticida', '2024-05-09', 60, 'Disponible'),
(124, 'Acaricidas', 'Insecticida', '2024-09-09', 60, 'Disponible'),
(125, 'Acaricidas', 'Insecticida', '2024-11-09', 60, 'Disponible'),
(126, 'Herbicidas', 'Insecticida', '2024-05-09', 60, 'Disponible'),
(127, 'Herbicidas', 'Insecticida', '2024-07-09', 20, 'Disponible'),
(128, 'Herbicidas', 'Insecticida', '2024-07-09', 10, 'Disponible'),
(129, 'Herbicidas', 'Insecticida', '2024-11-09', 20, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcela`
--

CREATE TABLE `parcela` (
  `id_parcela` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ancho` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parcela`
--

INSERT INTO `parcela` (`id_parcela`, `nombre`, `ancho`, `alto`, `fecha_registro`, `estado`) VALUES
(1, 'Parcela A', 500, 500, '2023-12-06', 'Operando'),
(2, 'Parcela B', 500, 500, '2023-11-29', 'Operando'),
(3, 'Parcela C', 500, 500, '2023-11-29', 'Operando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdf_files`
--

CREATE TABLE `pdf_files` (
  `id_pdf` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pdf_files`
--

INSERT INTO `pdf_files` (`id_pdf`, `file_name`) VALUES
(12, 'factura.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prove` int(11) NOT NULL,
  `nombre_empre` varchar(255) NOT NULL,
  `nombre_traba` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `num_tele` int(11) NOT NULL,
  `fecha_regis` date NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prove`, `nombre_empre`, `nombre_traba`, `direccion`, `num_tele`, `fecha_regis`, `estado`) VALUES
(1, 'Ecua S.A.', 'Ing. Alejandro Pin', 'Av. los ceibos y la cuarta', 969265483, '2023-12-06', 'Operando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `cargo`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Control sistema', 1),
(2, 'Gerente', 'Control total', 1),
(3, 'Empleado', 'Registrar uso de insumos y actividades', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `tipo_insumo` varchar(255) NOT NULL,
  `nombre_insu` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `id_usu` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Enviado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `fecha_solicitud`, `tipo_insumo`, `nombre_insu`, `cantidad`, `proveedor`, `id_usu`, `estado`) VALUES
(73, '2024-01-10', 'Vehiculo', 'Chevrolet', 5, 'Ecua S.A.', 3, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `total_insumos`
--

CREATE TABLE `total_insumos` (
  `id_total_insumo` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `fecha_agregada` date DEFAULT NULL,
  `cantidad_sumada` varchar(255) NOT NULL,
  `cantidad_restada` varchar(255) NOT NULL DEFAULT '0',
  `cantidad_total_usada` int(11) DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `total_insumos`
--

INSERT INTO `total_insumos` (`id_total_insumo`, `nombre`, `tipo`, `fecha_agregada`, `cantidad_sumada`, `cantidad_restada`, `cantidad_total_usada`, `estado`) VALUES
(12, 'Podadora', 'Herramienta', '2024-01-09', '+10', '-2', 34, 'Disponible'),
(13, 'Aspersor', 'Herramienta', '2024-01-09', '+10', '-2', 34, 'Disponible'),
(14, 'Fumigadores', 'Herramienta', '2024-01-09', '+8', '-2', 54, 'Disponible'),
(15, 'Pala', 'Herramienta', '2024-01-09', '+10', '-5', 65, 'Disponible'),
(16, 'Terragator', 'Maquinaria', '2024-01-09', '+1', '-1', 1, 'Disponible'),
(17, 'Tractor recolector', 'Maquinaria', '2024-01-09', '+1', '0', 4, 'Disponible'),
(18, 'Herbicidas', 'Insecticida', '2024-01-09', '+20', '-2', 168, 'Disponible'),
(19, 'Fungicidas', 'Insecticida', '2024-01-09', '+60', '-20', 220, 'Disponible'),
(20, 'Acaricidas', 'Insecticida', '2024-01-09', '+60', '0', 240, 'Disponible'),
(21, 'Mango Tommy', 'Mango', '2024-01-09', '', '-200', 400, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_insumos`
--

CREATE TABLE `uso_insumos` (
  `id_uso_insumo` int(11) NOT NULL,
  `id_parcela` int(11) NOT NULL,
  `id_total_insumo` int(11) NOT NULL,
  `cantidad_utilizada` int(11) NOT NULL,
  `fecha_utilizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `uso_insumos`
--

INSERT INTO `uso_insumos` (`id_uso_insumo`, `id_parcela`, `id_total_insumo`, `cantidad_utilizada`, `fecha_utilizacion`) VALUES
(11, 1, 13, 2, '2024-01-09'),
(12, 1, 16, 1, '2024-01-10'),
(13, 2, 13, 4, '2024-01-09'),
(14, 1, 12, 2, '2024-01-15'),
(15, 1, 16, 1, '2024-01-26'),
(16, 1, 18, 2, '2024-01-15'),
(17, 2, 12, 2, '2024-01-14'),
(18, 2, 16, 1, '2024-01-14'),
(19, 2, 21, 200, '2024-01-15'),
(20, 1, 21, 200, '2024-01-17'),
(21, 3, 21, 200, '2024-01-15'),
(22, 2, 19, 20, '2024-01-15'),
(23, 3, 12, 2, '2024-01-15'),
(24, 3, 13, 2, '2024-01-15'),
(25, 2, 13, 2, '2024-01-15'),
(26, 3, 13, 2, '2024-01-16'),
(27, 1, 14, 2, '2024-01-14'),
(28, 2, 14, 2, '2024-01-15'),
(29, 3, 14, 2, '2024-01-15'),
(30, 1, 15, 5, '2024-01-16'),
(31, 2, 15, 5, '2024-01-14'),
(32, 3, 15, 5, '2024-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre_usu` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_completo`, `correo`, `nombre_usu`, `clave`, `estado`, `id_rol`) VALUES
(1, 'Steven Rojas Guerrero', 'rojas185@gmail.com', 'admin', '123', 1, 1),
(3, 'Carmen Guerrero', 'carmen@gmail.com', 'Crojas', '123', 1, 3),
(5, 'Armando Rojas', 'armanddo@gmail.com', 'Arojas', '123', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`id_parcela`);

--
-- Indices de la tabla `pdf_files`
--
ALTER TABLE `pdf_files`
  ADD PRIMARY KEY (`id_pdf`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prove`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usu` (`id_usu`);

--
-- Indices de la tabla `total_insumos`
--
ALTER TABLE `total_insumos`
  ADD PRIMARY KEY (`id_total_insumo`);

--
-- Indices de la tabla `uso_insumos`
--
ALTER TABLE `uso_insumos`
  ADD PRIMARY KEY (`id_uso_insumo`),
  ADD KEY `id_parcela` (`id_parcela`),
  ADD KEY `id_total_insumo` (`id_total_insumo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `parcela`
--
ALTER TABLE `parcela`
  MODIFY `id_parcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id_pdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `total_insumos`
--
ALTER TABLE `total_insumos`
  MODIFY `id_total_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `uso_insumos`
--
ALTER TABLE `uso_insumos`
  MODIFY `id_uso_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `uso_insumos`
--
ALTER TABLE `uso_insumos`
  ADD CONSTRAINT `uso_insumos_ibfk_1` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`),
  ADD CONSTRAINT `uso_insumos_ibfk_2` FOREIGN KEY (`id_total_insumo`) REFERENCES `total_insumos` (`id_total_insumo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
