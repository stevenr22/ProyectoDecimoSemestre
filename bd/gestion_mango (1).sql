-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2023 a las 20:42:09
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cate` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_proc` int(11) DEFAULT NULL,
  `id_parcela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `id_compro` int(11) NOT NULL,
  `nombre_empre` varchar(255) NOT NULL DEFAULT 'GESTION MANGO',
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcela`
--

CREATE TABLE `parcela` (
  `id_parcela` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ancho` decimal(10,0) NOT NULL,
  `alto` decimal(10,0) NOT NULL,
  `fecha_registro` date NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parcela`
--

INSERT INTO `parcela` (`id_parcela`, `nombre`, `ancho`, `alto`, `fecha_registro`, `estado`) VALUES
(1, 'Parcela A', 33, 43, '2023-12-15', 'Eliminado'),
(2, 'Parcela B', 34, 45, '2023-12-15', 'Operando'),
(3, 'Parcela C', 454, 655, '2023-12-19', 'Eliminado'),
(4, 'Parcela D', 454, 56, '2023-12-10', 'Operando'),
(5, 'Parcela A', 32, 43, '2023-12-08', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id_produccion` int(11) NOT NULL,
  `id_usu_emple` int(11) NOT NULL,
  `id_proc` int(11) NOT NULL,
  `id_parcela` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_proc` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_cate` int(11) NOT NULL,
  `id_parcela` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prove` int(11) NOT NULL,
  `nombre_empre` varchar(255) NOT NULL,
  `nombre_traba` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `num_tele` varchar(255) NOT NULL,
  `fecha_regis` date NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prove`, `nombre_empre`, `nombre_traba`, `direccion`, `num_tele`, `fecha_regis`, `estado`) VALUES
(1, 'Ecua S.A.', 'Ing. Steven Rojas Guerrero', 'Guasmo sur', '09695849', '2023-11-28', 'Operando'),
(2, 'Industrias S.A.', 'Ing. Marcos Ponguillo', 'Central 23', '09695849', '2023-12-06', 'Operando'),
(3, 'Ali S.A.', 'Ing. Alejandro Joel', 'Norte 234', '09695849', '2023-12-01', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `cargo`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Control sistema', 1),
(2, 'Gerente', 'Control total', 1),
(3, 'Empleado', 'Registro de datos', 1),
(4, 'Proveedor', 'Otorgar insumos', 1),
(5, 'Servientrega', 'Entregar productos a todo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_soli` int(11) NOT NULL,
  `nombre_insu` varchar(255) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `fecha_regis_soli` date NOT NULL,
  `id_usu` int(11) NOT NULL,
  `id_cate` int(11) NOT NULL,
  `id_prove` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Enviado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_producto`
--

CREATE TABLE `uso_producto` (
  `id_regis_uso` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `fecha_inic` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `fecha_uso` date NOT NULL,
  `id_proc` int(11) NOT NULL,
  `id_usu_emple` int(11) NOT NULL,
  `id_parcela` int(11) NOT NULL,
  `id_provee` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Operando'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(255) NOT NULL,
  `nombre_completo` text NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre_usu` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombre_completo`, `correo`, `nombre_usu`, `clave`, `estado`, `id_rol`) VALUES
(1, 'Steven Galo Rojas', 'rojas185@gmail.com', 'admin', '123', 1, 1),
(2, 'Armando Rojas', 'armanddo@gmail.com', 'Arojas', '123', 1, 2),
(3, 'Carmen Ana Guerrero', 'carmen@gmail.com', 'Crojas', '123', 1, 3),
(4, 'Galo Rojas', 'galo123@gmail.com', 'galo', '123', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cate`),
  ADD KEY `id_proc` (`id_proc`),
  ADD KEY `id_parcela` (`id_parcela`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`id_compro`),
  ADD KEY `id_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `parcela`
--
ALTER TABLE `parcela`
  ADD PRIMARY KEY (`id_parcela`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `id_usu_emple` (`id_usu_emple`),
  ADD KEY `id_proc` (`id_proc`),
  ADD KEY `id_parcela` (`id_parcela`),
  ADD KEY `id_cate` (`id_cate`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_proc`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_parcela` (`id_parcela`);

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
  ADD PRIMARY KEY (`id_soli`),
  ADD KEY `id_usu` (`id_usu`),
  ADD KEY `id_cate` (`id_cate`),
  ADD KEY `id_prove` (`id_prove`);

--
-- Indices de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  ADD PRIMARY KEY (`id_regis_uso`),
  ADD KEY `id_proc` (`id_proc`),
  ADD KEY `id_usu_emple` (`id_usu_emple`),
  ADD KEY `id_parcela` (`id_parcela`),
  ADD KEY `id_provee` (`id_provee`);

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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `id_compro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parcela`
--
ALTER TABLE `parcela`
  MODIFY `id_parcela` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_proc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prove` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_soli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  MODIFY `id_regis_uso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_proc`) REFERENCES `producto` (`id_proc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `comprobante_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitudes` (`id_soli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `produccion_ibfk_1` FOREIGN KEY (`id_proc`) REFERENCES `producto` (`id_proc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produccion_ibfk_2` FOREIGN KEY (`id_usu_emple`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produccion_ibfk_3` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produccion_ibfk_4` FOREIGN KEY (`id_cate`) REFERENCES `categoria` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_cate`) REFERENCES `categoria` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_usu`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_cate`) REFERENCES `categoria` (`id_cate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`id_prove`) REFERENCES `proveedor` (`id_prove`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `uso_producto`
--
ALTER TABLE `uso_producto`
  ADD CONSTRAINT `uso_producto_ibfk_1` FOREIGN KEY (`id_usu_emple`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uso_producto_ibfk_2` FOREIGN KEY (`id_parcela`) REFERENCES `parcela` (`id_parcela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uso_producto_ibfk_3` FOREIGN KEY (`id_proc`) REFERENCES `producto` (`id_proc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uso_producto_ibfk_4` FOREIGN KEY (`id_provee`) REFERENCES `proveedor` (`id_prove`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
