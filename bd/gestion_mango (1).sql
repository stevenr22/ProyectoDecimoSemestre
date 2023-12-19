-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 00:18:14
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
-- Base de datos: `gestion_mango`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id_comprobante` int(11) NOT NULL,
  `id_usu_gerente` int(11) NOT NULL,
  `contenido_pdf` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `comprobante`
--

INSERT INTO `comprobante` (`id_comprobante`, `id_usu_gerente`, `contenido_pdf`) VALUES
(6, 2, 0x636f6d70726f62616e74655f325f313730323935383737362e706466);

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
  `estado` varchar(255) NOT NULL DEFAULT 'Disponible',
  `id_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(2, 'Parcela B', 756, 5675, '2023-11-29', 'Operando'),
(3, 'Parcela C', 576, 678, '2023-11-29', 'Operando');

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
(1, 'Ecua S.A.', 'Ing. Steven Rojas', 'Guasmo sur', 9695849, '2023-12-06', 'Operando'),
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
(8, '2023-12-06', 'Insecticida', 'Amoniaco 23 kg', 32, 'Industrias S.A.', 3, 'Aprobado'),
(9, '2023-12-12', 'Herramienta', 'Pala', 5, 'Ecua S.A.', 3, 'Denegado'),
(10, '2023-12-22', 'Mango', 'Mango kent', 100, 'Ali S.A.', 3, 'Aprobado'),
(11, '2023-12-24', 'Maquinaria', 'Tractor', 10, 'Industrias S.A.', 3, 'Denegado'),
(14, '2023-12-16', 'Mango', 'Mango rojo', 45, 'Industrias S.A.', 3, 'Denegado'),
(15, '2023-12-14', 'Insecticida', 'GGGG', 4, 'Ecua S.A.', 3, 'Aprobado'),
(17, '2023-12-02', 'Herramienta', 'Mastillo', 3, 'Industrias S.A.', 3, 'Aprobado'),
(18, '2023-12-22', 'Herramienta', 'werwrew', 3, 'Ecua S.A.', 3, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soli_recibidas`
--

CREATE TABLE `soli_recibidas` (
  `id_soli_reci` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Recibido',
  `id_solicitudes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `soli_recibidas`
--

INSERT INTO `soli_recibidas` (`id_soli_reci`, `estado`, `id_solicitudes`) VALUES
(5, 'Aprobado', 8),
(6, 'Denegado', 9),
(7, 'Aprobado', 10),
(8, 'Denegado', 11),
(11, 'Denegado', 14),
(12, 'Aprobado', 15),
(14, 'Aprobado', 17),
(15, 'Aprobado', 18);

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
(2, 'Armando Rojas', 'armando@gmail.com', 'Arojas', '123', 1, 2),
(3, 'Carmen Guerrero', 'carmen@gmail.com', 'Crojas', '123', 1, 3),
(4, 'Jose Rojas', 'jose@gmail.com', 'Jrojas', '123', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id_comprobante`),
  ADD KEY `id_usu_gerente` (`id_usu_gerente`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`id_insumo`),
  ADD KEY `id_usuario` (`id_usu`);

--
-- Indices de la tabla `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`id_parcela`);

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
-- Indices de la tabla `soli_recibidas`
--
ALTER TABLE `soli_recibidas`
  ADD PRIMARY KEY (`id_soli_reci`),
  ADD KEY `id_solicitudes` (`id_solicitudes`);

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
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `parcela`
--
ALTER TABLE `parcela`
  MODIFY `id_parcela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `soli_recibidas`
--
ALTER TABLE `soli_recibidas`
  MODIFY `id_soli_reci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `comprobante_ibfk_1` FOREIGN KEY (`id_usu_gerente`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `soli_recibidas`
--
ALTER TABLE `soli_recibidas`
  ADD CONSTRAINT `soli_recibidas_ibfk_1` FOREIGN KEY (`id_solicitudes`) REFERENCES `solicitudes` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
