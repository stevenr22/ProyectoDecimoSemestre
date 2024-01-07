-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2024 a las 20:56:53
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
(64, '2023-12-09', 'Maquinaria', 'Podadora', 65, 54, 1, 'Facturado'),
(65, '2023-12-12', 'Maquinaria', 'Pala industrial', 67, 55, 1, 'Facturado'),
(66, '2023-12-16', 'Mango', 'Mango kent', 3, 56, 1, 'Facturado'),
(67, '2023-12-26', 'Maquinaria', 'Tractor 34kg', 67, 57, 1, 'Facturado'),
(68, '2024-01-11', 'Maquinaria', 'PICADORA 123', 2, 58, 1, 'Facturado'),
(69, '2024-01-11', 'Herramienta', 'Podadora', 55, 59, 1, 'Facturado'),
(70, '2024-01-24', 'Herramienta', 'Pala', 45, 60, 1, 'Facturado'),
(71, '2024-01-25', 'Herramienta', 'Pala industrial', 34, 61, 1, 'Recibido'),
(72, '2024-01-16', 'Mango', 'Mango kent', 34, 65, 1, 'Recibido'),
(73, '2024-01-26', 'Maquinaria', 'TRACTOR INDUSTRIAL', 34, 68, 1, 'Recibido');

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
(24, '2023-12-09', 46.00, 2975.70, 54, 'Enviado'),
(27, '2023-12-01', 79.00, 5285.63, 55, 'Enviado'),
(31, '2023-12-16', 1.35, 4.05, 56, 'Enviado'),
(32, '2024-01-21', 1230.78, 82462.26, 57, 'Enviado'),
(33, '2024-01-18', 23.45, 46.90, 58, 'Enviado'),
(34, '2024-01-19', 3.40, 187.00, 59, 'Enviado'),
(35, '2024-02-01', 10.45, 470.25, 60, 'Enviado');

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
(71, 'Sulfato de amonio', 'Insecticida', '2024-02-01', 5, 'Disponible'),
(72, 'Sulfato de amonio', 'Insecticida', '2024-01-25', 7, 'Disponible'),
(73, 'Podadora', 'Herramienta', '2024-01-19', 8, 'Disponible'),
(74, 'Podadora', 'Herramienta', '2024-01-20', 2, 'Disponible'),
(75, 'Podadora', 'Herramienta', '2024-02-01', 67, 'Disponible'),
(76, 'Podadora', 'Herramienta', '2024-01-25', 67, 'Disponible'),
(77, 'Podadora', 'Herramienta', '2024-01-19', 67, 'Disponible'),
(78, 'Sulfato de amonio', 'Insecticida', '2024-01-25', 34, 'Disponible'),
(79, 'Sulfato de amonio', 'Insecticida', '2024-02-02', 34, 'Disponible'),
(80, 'Podadora', 'Herramienta', '2024-01-18', 34, 'Disponible');

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
(1, 'Parcela A', 23, 23, '2023-12-06', 'Operando'),
(2, 'Parcela B', 756, 5675, '2023-11-29', 'Eliminado'),
(3, 'Parcela C', 576, 678, '2023-11-29', 'Operando');

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
(1, 'factura_65910280ebde82.87809697.pdf'),
(2, 'factura_6591030779d012.28297117.pdf'),
(3, 'factura.pdf'),
(4, 'factura (1).pdf'),
(5, 'factura (2).pdf'),
(6, 'factura (4).pdf'),
(7, 'factura_65910280ebde82.87809697 (5).pdf'),
(8, 'factura (6).pdf'),
(9, 'factura (7).pdf'),
(10, 'factura (8).pdf');

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
(1, 'Ecua S.A.', 'Ing. Steven Rojas', 'Av. los ceibos y la cuarta', 969265483, '2023-12-06', 'Operando'),
(2, 'Industrias S.A.', 'Ing. Marcos Ponguillo', 'Central 23', 9695849, '2023-12-05', 'Operando'),
(3, 'Ali S.A.', 'Ing. Alejandro Joel', 'Central 23', 9695849, '2023-12-13', 'Operando');

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
(54, '2023-12-09', 'Maquinaria', 'Podadora', 65, 'Ecua S.A.', 3, 'Aprobado'),
(55, '2023-12-12', 'Maquinaria', 'Pala industrial', 67, 'Ecua S.A.', 3, 'Aprobado'),
(56, '2023-12-16', 'Mango', 'Mango kent', 3, 'Ecua S.A.', 3, 'Aprobado'),
(57, '2023-12-26', 'Maquinaria', 'Tractor 34kg', 67, 'Ecua S.A.', 3, 'Aprobado'),
(58, '2024-01-11', 'Maquinaria', 'PICADORA 123', 2, 'Ecua S.A.', 3, 'Aprobado'),
(59, '2024-01-11', 'Herramienta', 'Podadora', 55, 'Ecua S.A.', 3, 'Aprobado'),
(60, '2024-01-24', 'Herramienta', 'Pala', 45, 'Ecua S.A.', 3, 'Aprobado'),
(61, '2024-01-25', 'Herramienta', 'Pala industrial', 34, 'Ecua S.A.', 3, 'Aprobado'),
(62, '2024-01-28', 'Mango', 'Mango kent', 34, 'Ecua S.A.', 3, 'Denegado'),
(63, '2024-01-21', 'Mango', 'Mango Tommy', 23, 'Ecua S.A.', 3, 'Eliminado'),
(64, '2024-01-18', 'Mango', 'Mango manzana', 12, 'Ecua S.A.', 3, 'Aprobado'),
(65, '2024-01-16', 'Mango', 'Mango kent', 34, 'Ecua S.A.', 3, 'Aprobado'),
(66, '2024-01-20', 'Mango', 'Mango de x', 56, 'Ecua S.A.', 3, 'Aprobado'),
(67, '2024-01-13', 'Herramienta', 'Picadora', 45, 'Ecua S.A.', 3, 'Aprobado'),
(68, '2024-01-26', 'Maquinaria', 'TRACTOR INDUSTRIAL', 34, 'Ecua S.A.', 3, 'Aprobado'),
(69, '2024-01-11', 'Mango', 'Mango tipo 34', 56, '', 3, 'Recibido');

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
(10, 'Sulfato de amonio', 'Insecticida', '2024-01-04', '+34', '-8', 80, 'Disponible'),
(11, 'Podadora', 'Herramienta', '2024-01-04', '+34', '-211', 245, 'Disponible');

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
(1, 1, 11, 1, '2024-01-12'),
(2, 1, 10, 2, '2024-01-18'),
(3, 3, 10, 1, '2024-01-14'),
(4, 1, 11, 2, '2024-01-12'),
(5, 1, 10, 1, '2024-01-26'),
(6, 1, 11, 7, '2024-02-07'),
(7, 1, 11, 4, '2024-01-25'),
(8, 3, 10, 8, '2024-01-18'),
(9, 1, 11, 211, '2024-01-02');

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
(4, 'Jose Rojas', 'jose@gmail.com', 'Jrojas', '123', 1, 3),
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
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `parcela`
--
ALTER TABLE `parcela`
  MODIFY `id_parcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id_pdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `total_insumos`
--
ALTER TABLE `total_insumos`
  MODIFY `id_total_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `uso_insumos`
--
ALTER TABLE `uso_insumos`
  MODIFY `id_uso_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
