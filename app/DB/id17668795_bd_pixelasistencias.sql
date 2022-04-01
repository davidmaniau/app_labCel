-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2022 a las 00:37:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17668795_bd_pixelasistencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adelantos`
--

CREATE TABLE `adelantos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `adelantos`
--

INSERT INTO `adelantos` (`id`, `fecha`, `usuario_id`, `monto`) VALUES
(1, '2021-12-05', 7, '30.00'),
(2, '2022-01-01', 1, '300.00'),
(3, '2022-01-03', 2, '247.00'),
(4, '2022-01-05', 5, '35.77');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `estado_entrada` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `estado_salida` int(11) NOT NULL,
  `horas_tardes` decimal(10,2) NOT NULL,
  `horas_extras` decimal(10,2) NOT NULL,
  `horas_trabajadas` decimal(10,2) NOT NULL,
  `tipo_marcacion_id` int(11) NOT NULL,
  `estado_asistencia_id` int(11) NOT NULL COMMENT '=0 sin finalizar, 1=asistencia finalizo',
  `fecha2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `fecha`, `usuario_id`, `hora_entrada`, `estado_entrada`, `hora_salida`, `estado_salida`, `horas_tardes`, `horas_extras`, `horas_trabajadas`, `tipo_marcacion_id`, `estado_asistencia_id`, `fecha2`) VALUES
(41, '2022-01-06', 2, '01:46:00', 1, '00:00:00', 0, '0.00', '6.23', '0.00', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias_faltas`
--

CREATE TABLE `asistencias_faltas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencias_faltas`
--

INSERT INTO `asistencias_faltas` (`id`, `usuario_id`, `fecha`, `comentario`) VALUES
(1, 1, '2021-12-27', 'ninguno'),
(2, 2, '2022-01-06', 'prueba falto 06-01-2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'Administrador', 1),
(2, 'Empleado', 0),
(3, 'Produccion e Instalación', 1),
(4, 'Gerente General', 1),
(5, 'Diseñador Grafico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `usuario_crea` varchar(255) NOT NULL,
  `fecha_crea` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario_crea`, `fecha_crea`) VALUES
(1, 'frutas', 'danilo', '30/09/2021'),
(2, 'dddd', 'dddd', '30/09/2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `rtn_dni` varchar(14) DEFAULT NULL,
  `cliente_tipo_id` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(1024) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `rtn_dni`, `cliente_tipo_id`, `telefono`, `direccion`, `email`, `estado_registro`) VALUES
(3, 'La Eso', '2aaaa', 2, '111111111', '11111111', '111111', 1),
(4, 'luis maria romero romero', '169836709', 1, '98786757', 'Barrio jesus, cuadra y media ', 'luis@gmail.com', 1),
(6, 'Danilo', '403', 1, '255', 'managua', 'lapto2006@gmail.com', 1),
(7, 'Carnes las Vegas de San Antoni', '169836709', 2, '98786756', 'La granja', 'Ninguno', 1),
(8, 'Amba Media', '12345679', 1, '98897867', 'Calle Guatemala', 'ambamedia@gmail.com', 1),
(9, 'Procesadora de Lacteos la Lomi', '444', 2, '98780989', '-------', '------', 1),
(10, 'Lacteos Jutiquile', '2222222222', 2, '321', '-----------', '------------', 1),
(11, 'Enna Mejia', '456789', 2, '98765434', 'Frente a la escuela Morazan', '----', 1),
(12, 'Construcciones el Roble S.A', '6666', 2, '6666', '---', '---', 1),
(13, 'INMOBILIARIA SANTOS CALIX S. D', '8888', 2, '7777', '---', '---', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_tipo`
--

CREATE TABLE `cliente_tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_tipo`
--

INSERT INTO `cliente_tipo` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'Revendedor', 1),
(2, 'Normal', 1),
(3, 'Especial', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demostracion`
--

CREATE TABLE `demostracion` (
  `id` int(11) NOT NULL,
  `dato1` varchar(255) NOT NULL,
  `dato2` varchar(255) NOT NULL,
  `dato3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `demostracion`
--

INSERT INTO `demostracion` (`id`, `dato1`, `dato2`, `dato3`) VALUES
(1, 'EED', 'AAA', 'AAA'),
(2, 'EED', 'AAA', 'AAA'),
(3, 'PRUEBA1', 'PRUEBA2', 'PRUEBA3'),
(4, 'P2', 'P3', 'P7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `numero_cuenta` varchar(255) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `depositos`
--

INSERT INTO `depositos` (`id`, `usuarios_id`, `fecha`, `nombre`, `banco`, `numero_cuenta`, `monto`, `detalle`, `estado_registro`) VALUES
(1, 3, '2021-10-17', 'Ferreteria Caceress', 'BAC', '234567890', '89.00', 'Compra', 0),
(2, 3, '2021-10-19', 'Juan', 'BAC', '879000000', '77.00', 'material', 0),
(3, 3, '2021-10-19', 'rrr', 'rrrrr', 'rr', '66.00', 'rr', 0),
(4, 3, '2021-10-28', 'ddddddd', 'ddddddddd', '11111111', '78.00', 'fff', 1),
(5, 3, '2021-10-18', '444', '444', 'esta es la cuenta de su jefe', '78.00', 'kk', 1),
(6, 2, '2021-10-27', 'Oscar Zelayaa', 'BAC CREDOMATIC', '798-789-876', '5000.00', 'Deposito de caja', 1),
(7, 4, '2021-10-28', 'Osman Ariel', 'BAC', '7689', '6700.00', 'DEPOSITO ', 1),
(8, 1, '2021-10-28', 'danilo', 'bac', '403300189', '1000.00', 'pago por mantenimiento', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'Efectivo', 1),
(2, 'Transferencia', 1),
(3, 'PENDIENTE', 1),
(4, 'MIXTO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `gasto_tipo_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `descripcion_gasto` text NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `gasto_tipo_id`, `fecha`, `proveedor_id`, `descripcion_gasto`, `monto`, `estado_registro`) VALUES
(1, 1, '2021-09-01', 2, 'dddddd', '455.00', 0),
(2, 2, '2021-10-18', 2, 'yyyy', '98.00', 0),
(3, 2, '2021-10-18', 2, '777', '666.00', 0),
(4, 1, '2021-10-18', 2, 'tttt', '55.00', 0),
(5, 1, '2021-10-17', 2, 'papel2', '34.00', 0),
(6, 1, '2021-10-11', 2, 'rrr', '555.00', 0),
(7, 1, '2021-10-19', 2, 'ggg', '1111.00', 1),
(8, 2, '2021-10-22', 2, 'papel', '67.00', 1),
(9, 1, '2021-10-28', 3, '2 angulos', '890.00', 1),
(10, 1, '2021-09-01', 4, 'Marcadores', '35.00', 1),
(11, 1, '2021-10-28', 2, 'ffffffffffffff', '5555.00', 1),
(12, 4, '2021-10-27', 4, 'Almuerzo', '1000.00', 1),
(13, 4, '2021-10-28', 4, 'angulos Capa 18', '790.00', 1),
(14, 4, '2021-10-28', 2, 'Tape', '10.00', 1),
(15, 2, '2021-10-28', 4, 'hhhjikopp', '99999.00', 1),
(16, 1, '2021-12-01', 2, 'prueba', '789.00', 1),
(17, 1, '2021-12-01', 2, 'prueba 27-12-2021', '200.00', 1),
(18, 5, '2022-01-01', 3, 'preuba 02-01-2021', '300.00', 1),
(19, 7, '2021-12-01', 4, 'prueba 01-12-2021', '500.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto_tipo`
--

CREATE TABLE `gasto_tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gasto_tipo`
--

INSERT INTO `gasto_tipo` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'GASTOS DE MATERIA PRIMA', 1),
(2, 'GASTOS DE MANO DE OBRA E INSTALACIÓN ', 1),
(3, 'Prueba Eliminar', 0),
(4, 'GASTOS CON RECIBO', 1),
(5, 'OTROS GASTOS', 1),
(6, 'GASTOS FIJOS OFICINA', 1),
(7, 'GASTOS COMBUSTIBLE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora_inicio`, `hora_final`, `estado_registro`) VALUES
(1, '08:00:00', '05:00:00', 1),
(4, '08:00:00', '02:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo1` varchar(255) NOT NULL,
  `costo2` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `costo1`, `costo2`, `estado_registro`) VALUES
(1, 'Sticker', '0.25', '0.30', 1),
(2, 'Sticker Troquelado', '0.30', '0.35', 1),
(3, 'stickers 2\"', '3', '3', 0),
(4, 'Lona / Banner', '0.25', '0.30', 1),
(5, 'Lona Traslucida', '0.30', '0.35', 1),
(6, 'Sablanting', '0.40', '0.50', 1),
(7, 'Microperforado', '0.35', '0.50', 1),
(8, 'Sticker Estatico', '0.50', '0.55', 1),
(9, 'Laminado', '0.10', '0.15', 1),
(10, 'PVC 2 mm', '0.20', '0.25', 1),
(11, 'PVC 3 mm', '0.20', '0.25', 1),
(12, 'PVC 5 mm', '1.10', '1.20', 1),
(13, 'PVC 10 mm', '2.00', '2.10', 1),
(14, 'Carnet en PVC ', '85.00', '90.00', 1),
(15, 'Rotulo', '1', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `rtn_dni` varchar(14) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `estado_registro` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `rtn_dni`, `telefono`, `direccion`, `email`, `estado_registro`) VALUES
(2, 'Libreria Fernando', 'f55', '555', '555', '555', 0),
(3, 'Ferreteria Caceres', '1548990', '98786756', 'barrio las acacias', 'ferreteriacaceres@gmail.com', 0),
(4, 'LA ESO', '456789', '2789098', 'JFJNVJB', 'NN', 0),
(5, 'Ferreteria Moderna', '150119958967', '98765432', 'barrio las acacias', 'ferreteriamoderna@gmail.com', 0),
(6, 'Ferreteria y Constructora GRISSMACO', '1501-9010-2937', '2785-6392', 'Barrio Jesus,Calle el estadio, 3 cuadras hacia arriba de Hondutel, Juticalpa, Olancho', 'grissellzm@gmail.com', 1),
(7, 'Ferreteria Cáceres y Compañia S. de R.L', '1501-9003-4363', '2785-5704 / 9789-844', 'Barrio las Acacias, frente a Supermercado La Colonia, Juticalpa, Olancho', 'caceresyciaferreteria@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `detalles`, `estado_registro`) VALUES
(1, 'Administrador', 'Administrador de la empresa', 1),
(2, 'Empleado', 'empelado o trabajador', 1),
(3, 'Gerente General', 'Dueño de la Empresa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salario_mensual` decimal(10,2) NOT NULL,
  `numero_cuenta_banco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salida` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `apellido`, `dni`, `cargo_id`, `salario_mensual`, `numero_cuenta_banco`, `entrada`, `salida`, `estado_registro`) VALUES
(3, 'Maria Fernanda', 'Muñoz Melendez', '1501199502308', '1', '7000.00', '123456789', '8:00 am', '5:00 pm', 1),
(6, 'Jennifer Nicolle', 'Calderon Aguirre', '167898767890', '2', '6000.00', '123454444', '8:00 am', '5:00 pm', 1),
(8, 'Osman Ariel', 'Calderon', '12456789', '3', '6500.00', '123456789', '8:00 am', '5:00 pm', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medidas`
--

CREATE TABLE `unidades_medidas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `factor_conversion` decimal(10,2) NOT NULL,
  `operacion` varchar(255) NOT NULL,
  `abreviatura` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidades_medidas`
--

INSERT INTO `unidades_medidas` (`id`, `descripcion`, `factor_conversion`, `operacion`, `abreviatura`) VALUES
(1, 'metros', '39.37', 'multiplicar', 'm'),
(2, 'centimetros', '2.54', 'dividir', 'cm'),
(3, 'pies', '12.00', 'multiplicar', 'pie'),
(4, 'pulgada', '1.00', 'multiplicar', 'pulg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(11) NOT NULL,
  `nombre_completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `usuario_tipo_id` int(11) DEFAULT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1,
  `dni` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `salario_m` decimal(10,2) NOT NULL,
  `numero_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `rol_id`, `nombre_completo`, `cargo_id`, `horario_id`, `usuario_tipo_id`, `estado_registro`, `dni`, `salario_m`, `numero_cuenta`, `photo`) VALUES
(3, 'admin', '$2y$10$G7OLz39qFMjGwFTn9ixG3.ablT1zxmIMzvtLhW0d3sKT4EEBsurx2', 1, 'Oscar', 1, 1, 1, 0, '159', '8274.00', '13', ''),
(8, 'admin09', '$2y$10$.VIFn7/wEIVsRBxHkbhubutYW06uA8MmFWtLF8vv/0xF5Q8rR3Kze', 1, 'Maria Fernanda Muñoz', 1, 1, 1, 1, '1501-1995-0230', '9250.00', '744 257 491', 'Screenshot_20211017_180823.jpg'),
(9, 'nicolle', '$2y$10$FzBBCM1jRGuPrFe75bW3ru4.TiJQ.m8KUdzUE8DmPSuxdJew8d30i', 2, 'Jeniffer Nicoll Calderon', 3, 1, 1, 1, '1501-2001-0041', '7000.00', '744 851 021', ''),
(10, 'edgar', '$2y$10$R1r5zZ7lpGqi/mFg7peRGOolgQsBB/hmgkIWR4hVfyRP0ASohpilO', 2, 'Edgar Hernán Lopez', 3, 1, 1, 1, '1501-2002-0054', '9000.00', '743 576 691', ''),
(11, 'ariel', '$2y$10$7uy6TJXgoCcWIgiJnmytCODnTpwiuQgJK3ibHzcgN3dBdPlEajpC2', 2, 'Osman Ariel Calderon Aguirre', 3, 1, 1, 1, '1501-2003-0016', '7200.00', '745 923 131', ''),
(12, 'carlos', '$2y$10$ipwbk89E3dD2Jo2.9woK3OPEPNPJ/aNeNO.Hpq5BXYLja/QW19Dp6', 2, 'Carlos Hernandez', 5, 1, 1, 1, '1501-1996-0060', '7600.00', '742 275 631', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `venta_tipo_id` int(11) NOT NULL,
  `tipo_doc_id` int(11) NOT NULL,
  `forma_pago_id` int(11) NOT NULL,
  `estado_registro` int(11) NOT NULL,
  `estado_detalles` int(11) NOT NULL,
  `no_doc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `cliente_id`, `vendedor_id`, `venta_tipo_id`, `tipo_doc_id`, `forma_pago_id`, `estado_registro`, `estado_detalles`, `no_doc`) VALUES
(18, '2022-01-10', 13, 5, 2, 1, 0, 1, 0, 1),
(19, '2022-01-06', 13, 5, 2, 1, 0, 1, 0, 2),
(20, '2022-01-10', 10, 3, 1, 1, 0, 1, 0, 3),
(21, '2022-01-09', 10, 3, 1, 1, 0, 1, 0, 4),
(22, '2022-01-09', 10, 3, 1, 1, 0, 0, 0, 5),
(23, '2022-01-10', 12, 7, 1, 1, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `cant` decimal(10,2) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `pu` decimal(10,2) NOT NULL,
  `subt` decimal(10,2) NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tipo_doc_id` int(11) DEFAULT NULL,
  `ancho` decimal(10,2) NOT NULL,
  `alto` decimal(10,2) NOT NULL,
  `unidad_id` decimal(10,2) NOT NULL,
  `area` decimal(10,2) NOT NULL,
  `precio_pieza` decimal(10,2) NOT NULL,
  `abonos` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `cant`, `producto_id`, `descripcion`, `pu`, `subt`, `impuesto`, `total`, `tipo_doc_id`, `ancho`, `alto`, `unidad_id`, `area`, `precio_pieza`, `abonos`) VALUES
(21, 3, '1.00', 14, ' ', '90.00', '90.00', '0.00', '90.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL),
(22, 4, '2.00', 5, ' ', '0.35', '1470.00', '0.00', '2940.00', 1, '35.00', '10.00', '12.00', '4200.00', '1470.00', NULL),
(23, 4, '1.00', 15, ' ', '1.00', '1.00', '0.00', '1.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL),
(24, 1, '8.00', 4, ' ', '0.30', '21.60', '0.00', '172.80', 1, '3.00', '2.00', '12.00', '72.00', '21.60', NULL),
(25, 2, '1.00', 14, ' ', '90.00', '90.00', '0.00', '90.00', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL),
(26, 2, '1.00', 9, ' ', '0.15', '0.15', '0.00', '0.15', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL),
(27, 2, '1.00', 4, ' ', '0.30', '0.30', '0.00', '0.30', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL),
(28, 2, '1.00', 5, ' ', '0.35', '0.35', '0.00', '0.35', 1, '0.00', '0.00', '0.00', '0.00', '0.00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle_abonos`
--

CREATE TABLE `ventas_detalle_abonos` (
  `id` int(11) NOT NULL,
  `venta_detalle_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_detalle_abonos`
--

INSERT INTO `ventas_detalle_abonos` (`id`, `venta_detalle_id`, `fecha`, `forma_pago`, `monto`) VALUES
(1, 1, '2022-01-10', 1, '72.00'),
(2, 2, '2022-01-10', 1, '0.80'),
(3, 3, '2022-01-10', 2, '15.00'),
(4, 4, '2022-01-10', 2, '940.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_doc_tipo`
--

CREATE TABLE `ventas_doc_tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_doc_tipo`
--

INSERT INTO `ventas_doc_tipo` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'RECIBO', 1),
(2, 'FACTURA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_tipo`
--

CREATE TABLE `venta_tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado_registro` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_tipo`
--

INSERT INTO `venta_tipo` (`id`, `descripcion`, `estado_registro`) VALUES
(1, 'CONTADO', 1),
(2, 'CREDITO', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adelantos`
--
ALTER TABLE `adelantos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias_faltas`
--
ALTER TABLE `asistencias_faltas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_tipo`
--
ALTER TABLE `cliente_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `demostracion`
--
ALTER TABLE `demostracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gasto_tipo`
--
ALTER TABLE `gasto_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades_medidas`
--
ALTER TABLE `unidades_medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_detalle_abonos`
--
ALTER TABLE `ventas_detalle_abonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_doc_tipo`
--
ALTER TABLE `ventas_doc_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_tipo`
--
ALTER TABLE `venta_tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adelantos`
--
ALTER TABLE `adelantos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `asistencias_faltas`
--
ALTER TABLE `asistencias_faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cliente_tipo`
--
ALTER TABLE `cliente_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `demostracion`
--
ALTER TABLE `demostracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `gasto_tipo`
--
ALTER TABLE `gasto_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `unidades_medidas`
--
ALTER TABLE `unidades_medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle_abonos`
--
ALTER TABLE `ventas_detalle_abonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas_doc_tipo`
--
ALTER TABLE `ventas_doc_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta_tipo`
--
ALTER TABLE `venta_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
