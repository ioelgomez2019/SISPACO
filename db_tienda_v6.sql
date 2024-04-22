-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2022 a las 22:20:15
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda_v6`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acc_estrategica`
--

CREATE TABLE `acc_estrategica` (
  `idaccestr` int(11) NOT NULL,
  `accionestr` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigoaei` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `obj_estrategico_idobjestr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `acc_estrategica`
--

INSERT INTO `acc_estrategica` (`idaccestr`, `accionestr`, `codigoaei`, `status`, `obj_estrategico_idobjestr`) VALUES
(1, 'Servicio de educacion oportuna, integral y calidad a la poblacion de educacion basica', 'AEI.02.01', '1', 1),
(2, 'Adiestramiento integral y de calidad para docentes de educacion basica', 'AEI.02.02', '1', 1),
(3, 'Acceso a servicios de educacion de calidad para la poblacion de 3 a 16 anios', 'AEI.02.03', '1', 1),
(4, 'Servicio educativo integral y de calidad a los (as) estudiantes de educacion tecnico productivo', 'AEI.02.04', '1', 1),
(5, 'Servicio educativo integral a los(as) estudiantes de educacion tecnico productivo', 'AEI.02.05', '1', 1),
(6, 'Infraestructura y equipamiento mejorado en las intituciones publicas', 'AEI.03.01', '1', 3),
(9, 'Conectividad institucional fortalecida en las entidades publicas', 'AEI.03.02', '1', 3),
(10, 'Capacidades fortalecidas de manera permanente a los servidores publicos', 'AEI.03.03', '1', 3),
(11, 'Instrumentos de gestion implementados en las dependencias del gobierno regional', 'AEI.03.04', '1', 3),
(12, 'Servicios de prevencion integral con operativos multisectoriales en seguridad ciudadana en la region de puno', 'AEI.03.05', '1', 3),
(13, 'Atencion psicologica especializada, preventiva e integral a personas y familias victima de feminicidio', 'AEI.03.06', '1', 3),
(14, 'Programas de desarorllo integral en zonas de frontera y limítrofes', 'AEI.03.07', '1', 3),
(15, 'Puesta en valor del patrimonio documental de la región Puno', 'AEI.03.08', '1', 3),
(16, 'Registros sistematizados de bienes del gobierno regional Puno', 'AEI.03.09', '1', 3),
(17, 'Procesos y espacios de participación ciudadana fortalecida en la gestión publica regional ', 'AEI.03.10', '1', 3),
(18, 'Recursos y bienes gestionados en forma oportuna de GOREPUNO', 'AEI.03.11', '1', 3),
(19, 'Proyectos de inversión transferidos oportunamente para su mantenimiento y operación', 'AEI.03.12', '1', 3),
(20, 'Procesos técnicos de sistemas administrativos implementados oportunamente en GOREPUNO', 'AEI.03.13', '1', 3),
(21, 'Infraestructura deportiva moderna para practica del deporte de alta competencia de la region Puno', 'AEI.03.14', '1', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `idcodigo_act` int(11) NOT NULL,
  `nombre_act` varchar(500) COLLATE utf8mb4_swedish_ci NOT NULL,
  `programa_pre` varchar(45) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigo_pp` int(11) NOT NULL,
  `desc_act_ope` varchar(45) COLLATE utf8mb4_swedish_ci NOT NULL,
  `desc_cua_met` varchar(45) COLLATE utf8mb4_swedish_ci NOT NULL,
  `responsable` varchar(45) COLLATE utf8mb4_swedish_ci NOT NULL,
  `registropoi_idregistro` int(11) NOT NULL,
  `programa_pre_idprograma_pre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`idcodigo_act`, `nombre_act`, `programa_pre`, `codigo_pp`, `desc_act_ope`, `desc_cua_met`, `responsable`, `registropoi_idregistro`, `programa_pre_idprograma_pre`) VALUES
(1, 'Comida Para Cumpleanios', 'Cumplimiento de Metas', 9001, 'TORTA PARA CUMPLEANIOS', 'TORTA PARA CUMPLEANIOS', 'esp.Planificador', 27, 1),
(2, 'Ponencia En Contra La Vulneraciones De Los Derechos', 'Cumplimiento de Metas', 9001, 'Ponencia para los estudiantes de colegio avel', 'Alcance de los estudiantes en su totalidad', 'esp.Planificador', 29, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costo`
--

CREATE TABLE `centro_costo` (
  `idcentrocosto` int(11) NOT NULL,
  `nomcentrocosto` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `centro_costo`
--

INSERT INTO `centro_costo` (`idcentrocosto`, `nomcentrocosto`, `status`) VALUES
(1, 'Gestion Pedagogica', 1),
(2, 'Educacion Inicial', 1),
(3, 'Educacion Primaria', 1),
(4, 'Educacion Secundaria Comunicacion', 1),
(5, 'Educacion Secundaria Matematica', 1),
(6, 'Educacion Primaria EIB', 1),
(7, 'Educacion Secundaria TIC', 1),
(8, 'Educacion Secundaria CTA', 1),
(9, 'Educacion Secundaria Cultura Deperte', 1),
(10, 'Educacion Secundaria TOE', 1),
(11, 'Educacion Secundaria CCSS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadro_necesidades`
--

CREATE TABLE `cuadro_necesidades` (
  `idNecesidad` int(11) NOT NULL,
  `requerimiento` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_gas_cod` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_gas_nombre` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidad_med` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `cantidad` int(8) NOT NULL,
  `costo_unitario` float NOT NULL,
  `gastoMES` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `actividad_codActividad` int(11) NOT NULL,
  `insumos_idrequerimientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `cuadro_necesidades`
--

INSERT INTO `cuadro_necesidades` (`idNecesidad`, `requerimiento`, `espe_gas_cod`, `espe_gas_nombre`, `unidad_med`, `cantidad`, `costo_unitario`, `gastoMES`, `actividad_codActividad`, `insumos_idrequerimientos`) VALUES
(1, 'sanduichs de pollo', '2.1.15.22', 'OTRAS RETRIBUCIONES Y COMPLEMENTOS', 'unidad', 23, 4, 'Abril', 1, 4),
(2, 'lapiceros', '2.1.15.22', 'OTRAS RETRIBUCIONES Y COMPLEMENTOS', 'paquete', 23, 124, 'septiembre', 2, 4),
(3, 'Papel bond', '2.1.15.22', 'OTRAS RETRIBUCIONES Y COMPLEMENTOS', 'paquete', 3, 124, 'septiembre', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `iddetalle_temp` int(11) NOT NULL,
  `Precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `token` varchar(45) NOT NULL,
  `insumos_CodInsumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadoraei`
--

CREATE TABLE `indicadoraei` (
  `idindicadoraei` int(11) NOT NULL,
  `nombreaei` varchar(120) NOT NULL,
  `acc_estrategica_idaccestr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `indicadoraei`
--

INSERT INTO `indicadoraei` (`idindicadoraei`, `nombreaei`, `acc_estrategica_idaccestr`) VALUES
(1, 'Porcentaje de la poblacion de educacion basica que recibe sevicios educativos en forma oportuna integral y de calidad', 1),
(2, 'Porcentaje dedocentes de educacion basica capacitados en forma integral y con calidad', 2),
(3, 'Porcentaje de asistencia de la poblacion de 3 a 16 anios a educacion de calidad ', 3),
(4, 'Porcentaje de estudiantes de educacion superior no universitaria  con formacion tecnica integral ', 4),
(5, 'Porcentaje de estudiantes de CETPRO con formacion tecnica integral', 5),
(6, 'Numero de instituciones publicas mejoradas', 6),
(7, '	Numero de instituciones publicas con conectividad integral', 9),
(8, 'Porcentaje de servidores públicos capacitados en forma permanente', 10),
(9, 'Numero de instrumentos de gestión implmentados en las dependencias del GOREPUNO', 11),
(10, 'Tasa de denuncias de delitos por cada 1,000 habitantes', 12),
(11, 'Tasa de homicidios por cada 100 mil habitantes', 12),
(12, 'Tasa de victimas de feminicidios por cada 100 mil mujeres', 13),
(13, 'Numero de proyectos implementados en zonas de frontera y limítrofe', 14),
(14, 'Numero de personas que acceden al patrimonio documental puesta en valor', 15),
(15, 'Numero de bienes del GOREPUNO con registros sistematizados', 16),
(16, 'Numero de organizaciones participantes en los procesos de concertación', 17),
(17, 'Numero de personas que participan en los espacios de participación ciudadana', 17),
(18, 'Numero de servicios de control de auditorias', 18),
(19, 'Numero de servicios de control simultaneo', 18),
(20, 'Numero de proyectos de inversión trasnferidos oportunamente para mantenimiento y operacion', 19),
(21, 'Numero de estados financieros presupuestarios y complementarios del Pliego Regional y UE', 20),
(22, 'Numero de escenarios deportivos modernos para practica de alta competencia', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadoroei`
--

CREATE TABLE `indicadoroei` (
  `idindicadoroei` int(11) NOT NULL,
  `nombreoei` varchar(100) NOT NULL,
  `obj_estrategico_idobjestr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `indicadoroei`
--

INSERT INTO `indicadoroei` (`idindicadoroei`, `nombreoei`, `obj_estrategico_idobjestr`) VALUES
(1, 'Porcentaje de estudiantes de educacion primaria de ERB con nivel satisfactorio en matematica', 1),
(2, 'Porcentaje de estudiantes de educacion primaria de ERB con nivel satisfactorio en comunicacion', 1),
(3, 'Porcentaje de estudiantes de educacion secundaria de ERB con nivel satisfactorio en comunicacion', 1),
(4, 'Porcentaje de estudiantes de educacion secundaria de ERB con nivel satisfactorio en comunicacion', 1),
(5, 'Porcentaje de estudiantes de educacion secundaria de ERB con nivel satisfactorio en ciencias sociale', 1),
(6, 'Porcentaje de estudiantes de educacion secundaria de ERB con nivel satisfactorio en ciencia y tecnol', 1),
(7, 'Porcentaje de 3 a 16 anios que accede a la educacion basica', 1),
(8, 'Numero de instituciones de educacion no universitaria no acreditadas', 1),
(9, 'indice de desempenio institucional de la gestion ', 3),
(10, 'indice de desempenio institucional de la gestion ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idrequerimientos` int(11) NOT NULL,
  `requerimiento` varchar(45) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `espe_identificador` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `espe_nombre` varchar(45) COLLATE utf8mb4_swedish_ci NOT NULL,
  `unid_medida` varchar(45) COLLATE utf8mb4_swedish_ci DEFAULT NULL,
  `costo_uni` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`idrequerimientos`, `requerimiento`, `espe_identificador`, `espe_nombre`, `unid_medida`, `costo_uni`) VALUES
(1, NULL, '2.1.15.11', 'PERSONAL NOMBRADO', NULL, NULL),
(2, NULL, '2.1.15.12', 'PERSONAL CONTRATADO', NULL, NULL),
(3, NULL, '2.1.15.21', 'BONIFICACIÓN ESPECIAL A FAVOR DEL DOCENTE INV', NULL, NULL),
(4, NULL, '2.1.15.22', 'OTRAS RETRIBUCIONES Y COMPLEMENTOS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos2`
--

CREATE TABLE `insumos2` (
  `CodInsumo` int(11) NOT NULL,
  `CatProducto` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `DesProducto` varchar(500) COLLATE utf8mb4_swedish_ci NOT NULL,
  `UnidadMed` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `costoUnitario` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `EspGasto` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Ficha_POI', 'productos de ceplan', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Caterogías', 'Caterogías Productos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obj_estrategico`
--

CREATE TABLE `obj_estrategico` (
  `idobjestr` int(11) NOT NULL,
  `nomobjestr` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codoe` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `obj_estrategico`
--

INSERT INTO `obj_estrategico` (`idobjestr`, `nomobjestr`, `codoe`, `status`) VALUES
(1, 'Mejorar los niveles de logro de aprendizaje en los (as) estudiantes de educacion basica , tecnico productivo y no universitaria', 'OEI.02', 1),
(2, 'Asegurar el empoderamiento sobre los\r\nderechos y obligaciones de ciudadanas y\r\nciudadanos', 'OEI.01', 0),
(3, 'Fortalecer la gestion institucional', 'OEI.03', 1),
(4, 'Proveer la actividad minera y energia electrica en la region de Puno', 'OEI.05', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(230, 2, 1, 1, 0, 0, 0),
(231, 2, 2, 0, 0, 0, 0),
(232, 2, 3, 0, 0, 0, 0),
(233, 2, 4, 0, 0, 0, 0),
(234, 2, 5, 0, 0, 0, 0),
(235, 2, 6, 0, 0, 0, 0),
(410, 7, 1, 1, 1, 1, 1),
(411, 7, 2, 0, 0, 0, 0),
(412, 7, 3, 0, 0, 0, 0),
(413, 7, 4, 1, 1, 1, 1),
(414, 7, 5, 0, 0, 0, 0),
(415, 7, 6, 1, 1, 1, 0),
(416, 1, 1, 1, 1, 1, 1),
(417, 1, 2, 1, 1, 1, 1),
(418, 1, 3, 1, 1, 1, 1),
(419, 1, 4, 1, 1, 1, 1),
(420, 1, 5, 1, 1, 1, 1),
(421, 1, 6, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombres` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `password` varchar(75) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `nombrefiscal` varchar(80) COLLATE utf8mb4_swedish_ci NOT NULL,
  `direccionfiscal` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `area` varchar(25) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `status`, `area`) VALUES
(1, '71052981', 'Joel Santos', 'Gomez Alanoca', 9857452871, 'ioelgomez2019@gmail.com', '6afc63b048f0aea8aec66254776d725e9eecd1e5367cca63472e0faed6e92395', '24252622', 'Joel sga', 'peru lima', '6f15c99cc5b3a8778122-3335597e1301b85c9b15-6087b73cc787a8719d71-49708807a79dcf28ad32', 1, '2020-08-13 00:51:44', 1, 'DGI'),
(2, '7865421565', 'Divan', 'Cari', 789465487, 'divancari@gmail.com', 'bb2ad88a1c61f00d0c98d2b34b46b2e9f3895f551574d2c525d1b1df1589686a', '', '', '', '2c52a34f7988a0afc63e-dfe4badca8d2cb2b93e6-94824d050567a0ccd851-56165c5603c4ca020', 1, '2020-08-13 00:54:08', 1, 'dg'),
(3, '879846545454', 'Pablo', 'Arana', 784858856, 'pablo@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', '', 3, '2020-08-14 01:42:34', 0, ''),
(4, '65465465', 'Roxana', 'Dgi', 987846545, 'roxana@gmail.com', '488b323ed274be65eb8be1cc44e9dac6476cdf2c4134972c2a2862dac3b50900', '', '', '', '', 3, '2020-08-22 00:27:17', 1, ''),
(5, '4654654', 'DREP PUNO', 'DGI', 646545645, 'drepunodgi@prueba.com', '434835928ff7f68cf2c5d6bfceb1b1f3be0631ab08b06676d7846272187bd278', '', '', '', '', 1, '2020-08-22 00:35:04', 1, ''),
(6, '8465484', 'Alex Fernando', 'Méndez', 222222222, 'alex@info.com', '608cfa9ffc1dac43e8710cb23bbcf1d5215beee7ca8632c6a4a5a63a56f59aeb', '', '', '', '', 7, '2020-08-22 00:48:50', 0, ''),
(7, '54684987', 'Francisco', 'Herrera', 6654456545, 'francisco@info.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '', '', '', 2, '2020-08-22 01:55:57', 1, ''),
(8, '54646849844', 'Axel Gudiel', 'Vela', 654687454, 'axel@info.com', '993fdea29acd1f7c6a6423c038601b175bb282382fc85b306a85f134fff4a63e', '', '', '', '', 3, '2020-09-07 01:30:52', 1, ''),
(9, '46548454', 'Alan', 'Arenales', 45687954, 'alan@info.com', 'dc4e32154482eff8c1a2061374a0fc2ca40fbf9b893197e949c79be535b06b23', 'CF', 'Alan', 'Ciudad', '', 7, '2020-10-11 01:30:23', 1, ''),
(10, '46545678', 'Marta', 'Cardona', 78548578, 'marta@info.com', '959b633150ca56bdbe8eefb0b510d720ec00714fc3f6160832dd2ae0c0a0611b', 'CF', 'Marta', 'peru', '', 7, '2020-10-11 01:43:30', 1, ''),
(11, '54789656458', 'Joel Eduardo', 'Cabrera', 54124528, 'joel@joel.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'CF', 'Joel Eduardo', 'peru', '', 7, '2020-10-11 01:44:30', 1, ''),
(12, '56874657', 'IOEL', 'IGOMEZ IALANOCA', 98776543, 'gomez@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'CF', 'Pablo', 'peru', '', 7, '2020-10-11 01:59:45', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_pre`
--

CREATE TABLE `programa_pre` (
  `idprograma_pre` int(11) NOT NULL,
  `nombre_pp` varchar(45) NOT NULL,
  `cod_pp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa_pre`
--

INSERT INTO `programa_pre` (`idprograma_pre`, `nombre_pp`, `cod_pp`) VALUES
(1, 'Cumplimiento de Metas', '9001'),
(2, 'Cumplimientos de metas 02', '9002'),
(3, 'Cumplimiento de metas de la drep', '9002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registropoi`
--

CREATE TABLE `registropoi` (
  `idregistro` int(11) NOT NULL,
  `centrocosto` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `objestrinst` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigooe` varchar(10) COLLATE utf8mb4_swedish_ci NOT NULL,
  `indicadoroe` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidmedidaoe` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `metaoe` int(11) NOT NULL,
  `accestrinst` varchar(200) COLLATE utf8mb4_swedish_ci NOT NULL,
  `codigoae` varchar(15) COLLATE utf8mb4_swedish_ci NOT NULL,
  `indicadorae` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `unidmedidaae` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `metaae` int(11) NOT NULL,
  `persona_idpersona` bigint(20) NOT NULL,
  `centro_costo_idcentrocosto` int(11) NOT NULL,
  `obj_estrategico_idobjestr` int(11) NOT NULL,
  `acc_estrategica_idaccestr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `registropoi`
--

INSERT INTO `registropoi` (`idregistro`, `centrocosto`, `objestrinst`, `codigooe`, `indicadoroe`, `unidmedidaoe`, `metaoe`, `accestrinst`, `codigoae`, `indicadorae`, `unidmedidaae`, `metaae`, `persona_idpersona`, `centro_costo_idcentrocosto`, `obj_estrategico_idobjestr`, `acc_estrategica_idaccestr`) VALUES
(27, 'Educacion Secundaria Comunicacion', 'Fortalecer la gestion institucional', 'OEI.03', 'indice de desempenio institucional de la gestion ', 'Alumnos', 100, 'Servicios de prevencion integral con operativos multisectoriales en seguridad ciudadana en la region de puno', 'AEI.03.05', 'Tasa de homicidios por cada 100 mil habitantes', 'servidor publico', 100, 1, 4, 3, 12),
(28, 'Gestion Pedagogica', 'Mejorar los niveles de logro de aprendizaje en los (as) estudiantes de educacion basica , tecnico productivo y no universitaria', 'OEI.02', 'Porcentaje de estudiantes de educacion secundaria de ERB con nivel satisfactorio en comunicacion', 'Alumnos', 100, 'Servicio educativo integral a los(as) estudiantes de educacion tecnico productivo', 'AEI.02.05', 'Porcentaje de estudiantes de CETPRO con formacion tecnica integral', 'Porcetaje de servidor publicod', 100, 1, 1, 1, 5),
(29, 'Gestion Pedagogica', 'Mejorar los niveles de logro de aprendizaje en los (as) estudiantes de educacion basica , tecnico productivo y no universitaria', 'OEI.02', 'Porcentaje de estudiantes de educacion primaria de ERB con nivel satisfactorio en matematica', 'Alumnos', 100, 'Acceso a servicios de educacion de calidad para la poblacion de 3 a 16 anios', 'AEI.02.03', 'Porcentaje de asistencia de la poblacion de 3 a 16 anios a educacion de calidad ', 'Alumnos', 100, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 1),
(2, 'Supervisor', 'Supervisor', 1),
(3, 'Secretaria', 'Secretaria de las areas', 1),
(4, 'Servicio al cliente', 'Servicio al cliente sistema', 0),
(5, 'Bodega', 'Bodega', 0),
(6, 'Resporteria', 'Resporteria Sistema', 0),
(7, 'Usuario', 'Usuarios', 1),
(8, 'Ejemplo rol', 'Ejemplo rol sitema', 0),
(9, 'Coordinador', 'Coordinador', 0),
(10, 'Consulta Ventas', 'Consulta Ventas', 0),
(11, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidaaei`
--

CREATE TABLE `unidad_medidaaei` (
  `idunidad_medidaaei` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `indicadoraei_idindicadoraei` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medidaaei`
--

INSERT INTO `unidad_medidaaei` (`idunidad_medidaaei`, `nombre`, `indicadoraei_idindicadoraei`) VALUES
(1, 'servidor publico', 11),
(2, 'indice de desempenio', 19),
(5, 'servidor publico 4', 2),
(6, 'Porcetaje de servidor publicod', 5),
(17, 'Alumnos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidaoei`
--

CREATE TABLE `unidad_medidaoei` (
  `idunidad_medidaoei` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `indicadoroei_idindicadoroei` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medidaoei`
--

INSERT INTO `unidad_medidaoei` (`idunidad_medidaoei`, `nombre`, `indicadoroei_idindicadoroei`) VALUES
(1, 'Alumnos', 2),
(2, 'Alumnos', 3),
(3, 'Alumnos', 1),
(9, 'Accion', 8),
(11, 'Alumnos', 7),
(13, 'Alumnos', 5),
(14, 'Alumnos', 9),
(15, 'Alumnos', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acc_estrategica`
--
ALTER TABLE `acc_estrategica`
  ADD PRIMARY KEY (`idaccestr`),
  ADD KEY `fk_acc_estrategica_obj_estrategico1_idx` (`obj_estrategico_idobjestr`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idcodigo_act`),
  ADD KEY `fk_actividad_registropoi1_idx` (`registropoi_idregistro`),
  ADD KEY `fk_actividad_programa_pre1_idx` (`programa_pre_idprograma_pre`);

--
-- Indices de la tabla `centro_costo`
--
ALTER TABLE `centro_costo`
  ADD PRIMARY KEY (`idcentrocosto`),
  ADD UNIQUE KEY `NomCentroCosto` (`nomcentrocosto`);

--
-- Indices de la tabla `cuadro_necesidades`
--
ALTER TABLE `cuadro_necesidades`
  ADD PRIMARY KEY (`idNecesidad`),
  ADD KEY `fk_cuadro_necesidades_actividad1_idx` (`actividad_codActividad`),
  ADD KEY `fk_cuadro_necesidades_insumos1_idx` (`insumos_idrequerimientos`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`iddetalle_temp`),
  ADD KEY `fk_detalle_temp_insumos1_idx` (`insumos_CodInsumo`);

--
-- Indices de la tabla `indicadoraei`
--
ALTER TABLE `indicadoraei`
  ADD PRIMARY KEY (`idindicadoraei`),
  ADD KEY `fk_indicadoraei_acc_estrategica1_idx` (`acc_estrategica_idaccestr`);

--
-- Indices de la tabla `indicadoroei`
--
ALTER TABLE `indicadoroei`
  ADD PRIMARY KEY (`idindicadoroei`),
  ADD KEY `fk_indicadoroei_obj_estrategico1_idx` (`obj_estrategico_idobjestr`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idrequerimientos`);

--
-- Indices de la tabla `insumos2`
--
ALTER TABLE `insumos2`
  ADD PRIMARY KEY (`CodInsumo`),
  ADD UNIQUE KEY `EspGasto` (`EspGasto`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `obj_estrategico`
--
ALTER TABLE `obj_estrategico`
  ADD PRIMARY KEY (`idobjestr`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `programa_pre`
--
ALTER TABLE `programa_pre`
  ADD PRIMARY KEY (`idprograma_pre`);

--
-- Indices de la tabla `registropoi`
--
ALTER TABLE `registropoi`
  ADD PRIMARY KEY (`idregistro`),
  ADD KEY `fk_registropoi_persona1_idx` (`persona_idpersona`),
  ADD KEY `fk_registropoi_centro_costo1_idx` (`centro_costo_idcentrocosto`),
  ADD KEY `fk_registropoi_obj_estrategico1_idx` (`obj_estrategico_idobjestr`),
  ADD KEY `fk_registropoi_acc_estrategica1_idx` (`acc_estrategica_idaccestr`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `unidad_medidaaei`
--
ALTER TABLE `unidad_medidaaei`
  ADD PRIMARY KEY (`idunidad_medidaaei`),
  ADD UNIQUE KEY `indicadoraei_idindicadoraei_UNIQUE` (`indicadoraei_idindicadoraei`),
  ADD KEY `fk_unidad_medidaaei_indicadoraei1_idx` (`indicadoraei_idindicadoraei`);

--
-- Indices de la tabla `unidad_medidaoei`
--
ALTER TABLE `unidad_medidaoei`
  ADD PRIMARY KEY (`idunidad_medidaoei`),
  ADD UNIQUE KEY `indicadoroei_idindicadoroei_UNIQUE` (`indicadoroei_idindicadoroei`),
  ADD KEY `fk_unidad_medidaoei_indicadoroei1_idx` (`indicadoroei_idindicadoroei`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acc_estrategica`
--
ALTER TABLE `acc_estrategica`
  MODIFY `idaccestr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idcodigo_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuadro_necesidades`
--
ALTER TABLE `cuadro_necesidades`
  MODIFY `idNecesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `iddetalle_temp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `indicadoraei`
--
ALTER TABLE `indicadoraei`
  MODIFY `idindicadoraei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `indicadoroei`
--
ALTER TABLE `indicadoroei`
  MODIFY `idindicadoroei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idrequerimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `insumos2`
--
ALTER TABLE `insumos2`
  MODIFY `CodInsumo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `obj_estrategico`
--
ALTER TABLE `obj_estrategico`
  MODIFY `idobjestr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `programa_pre`
--
ALTER TABLE `programa_pre`
  MODIFY `idprograma_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registropoi`
--
ALTER TABLE `registropoi`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `unidad_medidaaei`
--
ALTER TABLE `unidad_medidaaei`
  MODIFY `idunidad_medidaaei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `unidad_medidaoei`
--
ALTER TABLE `unidad_medidaoei`
  MODIFY `idunidad_medidaoei` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acc_estrategica`
--
ALTER TABLE `acc_estrategica`
  ADD CONSTRAINT `fk_acc_estrategica_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_programa_pre1` FOREIGN KEY (`programa_pre_idprograma_pre`) REFERENCES `programa_pre` (`idprograma_pre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actividad_registropoi1` FOREIGN KEY (`registropoi_idregistro`) REFERENCES `registropoi` (`idregistro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuadro_necesidades`
--
ALTER TABLE `cuadro_necesidades`
  ADD CONSTRAINT `fk_cuadro_necesidades_actividad1` FOREIGN KEY (`actividad_codActividad`) REFERENCES `actividad` (`idcodigo_act`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cuadro_necesidades_insumos1` FOREIGN KEY (`insumos_idrequerimientos`) REFERENCES `insumos` (`idrequerimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `fk_detalle_temp_insumos1` FOREIGN KEY (`insumos_CodInsumo`) REFERENCES `insumos2` (`CodInsumo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `indicadoraei`
--
ALTER TABLE `indicadoraei`
  ADD CONSTRAINT `fk_indicadoraei_acc_estrategica1` FOREIGN KEY (`acc_estrategica_idaccestr`) REFERENCES `acc_estrategica` (`idaccestr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `indicadoroei`
--
ALTER TABLE `indicadoroei`
  ADD CONSTRAINT `fk_indicadoroei_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registropoi`
--
ALTER TABLE `registropoi`
  ADD CONSTRAINT `fk_registropoi_acc_estrategica1` FOREIGN KEY (`acc_estrategica_idaccestr`) REFERENCES `acc_estrategica` (`idaccestr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registropoi_centro_costo1` FOREIGN KEY (`centro_costo_idcentrocosto`) REFERENCES `centro_costo` (`idcentrocosto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registropoi_obj_estrategico1` FOREIGN KEY (`obj_estrategico_idobjestr`) REFERENCES `obj_estrategico` (`idobjestr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registropoi_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `unidad_medidaaei`
--
ALTER TABLE `unidad_medidaaei`
  ADD CONSTRAINT `fk_unidad_medidaaei_indicadoraei1` FOREIGN KEY (`indicadoraei_idindicadoraei`) REFERENCES `indicadoraei` (`idindicadoraei`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `unidad_medidaoei`
--
ALTER TABLE `unidad_medidaoei`
  ADD CONSTRAINT `fk_unidad_medidaoei_indicadoroei1` FOREIGN KEY (`indicadoroei_idindicadoroei`) REFERENCES `indicadoroei` (`idindicadoroei`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
