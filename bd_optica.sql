-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2018 a las 02:30:41
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono_celular` varchar(11) DEFAULT NULL,
  `telefono_fijo` varchar(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `identificacion`, `nombre`, `apellido`, `fecha_nacimiento`, `telefono_celular`, `telefono_fijo`, `descripcion`) VALUES
(3, '204842433', 'ronny jose', 'simosa montoya', '0000-00-00', '993350031', '', ''),
(4, '204842433', 'ronny jose', 'simosa montoya', '0000-00-00', '993350031', '', ''),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '204842433', 'ronny jose', 'simosa montoya', '0000-00-00', '993350031', '', ''),
(7, '2058005822', 'jose jose', 'montoya guanipa', '0000-00-00', '993350031', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `descripcion`, `color`, `estatus`) VALUES
(1, 'Ok', '#005139', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_global`
--

CREATE TABLE `estatus_global` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus_global`
--

INSERT INTO `estatus_global` (`id`, `descripcion`, `color`) VALUES
(1, 'On', '#09af01'),
(2, 'Off', '#961b01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto_operacional`
--

CREATE TABLE `gasto_operacional` (
  `id_gast_oper` int(11) NOT NULL COMMENT 'id de gasto operacional',
  `categoria` int(11) NOT NULL COMMENT 'id de la categoria, union con tabla td_careg_operc',
  `tip_serv` int(11) NOT NULL COMMENT 'id del servicio, union con tabla td_serv_operc',
  `nrecibo` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero del recibo',
  `frecibo` date NOT NULL COMMENT 'fecha del recibo',
  `cedula` int(11) NOT NULL COMMENT 'cedula de la persona',
  `nombre` varchar(200) CHARACTER SET latin1 NOT NULL COMMENT 'nombre de la persona',
  `apellido` varchar(1000) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido de la persona',
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'telefono de la persona',
  `mrecibo` float NOT NULL COMMENT 'monto del recibo',
  `detalle` text CHARACTER SET latin1 NOT NULL COMMENT 'detalle del gasto operacional',
  `fcreacion` datetime NOT NULL COMMENT 'fecha de creacion',
  `responsable` int(11) NOT NULL COMMENT 'cedula del responsable',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = Activo, 1 = Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gasto_operacional`
--

INSERT INTO `gasto_operacional` (`id_gast_oper`, `categoria`, `tip_serv`, `nrecibo`, `frecibo`, `cedula`, `nombre`, `apellido`, `telefono`, `mrecibo`, `detalle`, `fcreacion`, `responsable`, `status`) VALUES
(1, 7, 29, '24164', '2016-10-22', 0, 'Brisas Digital', '', '', 4995, 'Compra de calculadora ', '2016-10-22 18:35:52', 304100879, 1),
(2, 5, 17, '61144094', '2016-10-19', 0, 'Jasec', '', '', 3717, 'Pago electricidad del periodo de octubre-16 ', '2016-10-22 18:39:33', 304100879, 0),
(3, 5, 15, '61144097', '2016-10-19', 0, 'Ice telefonica ', '', '', 19485, 'Pago de teléfono periodo setiembre  ', '2016-10-22 18:43:12', 304100879, 0),
(4, 5, 18, '1744081', '2016-10-19', 0, 'Municipalidad Oreamuno', '', '', 7280, 'Periodo de setiembre ', '2016-10-22 19:07:41', 304100879, 0),
(5, 3, 10, '1275743', '2016-11-01', 303840209, 'Lucia', 'Madriz Nuñez', '84666284', 13000, 'Comisión de la segunda quincena de Octubre.', '2016-11-09 16:35:04', 304880391, 0),
(6, 3, 12, '1275742', '2016-11-01', 302860051, 'Marco Tulio', 'Montoya', '83915709', 14240, 'Pago de comisión de cobros y gasolina', '2016-11-09 16:39:15', 304880391, 0),
(7, 5, 14, '61624', '2016-11-03', 0, 'Vera Orozco Mata ', '', '', 170000, 'Pago alquiler de oficina ', '2016-11-10 16:07:48', 304100879, 0),
(8, 7, 29, '24330', '2016-11-05', 0, 'Brisas Digital', '', '', 1050, 'Compra de recibos ', '2016-11-10 16:10:22', 304100879, 0),
(9, 6, 26, '0335', '2016-11-13', 0, 'Evelyn Miranda Jimenez', '', '', 19000, '4 Talonarios, hoja tamañas cartas Blanco y negro.', '2016-11-14 12:29:17', 304880391, 0),
(10, 7, 27, '393024', '2016-11-14', 0, 'Corporacin Supermecados unidos', '', '', 11140, 'Varios artículos de Linpieza', '2016-11-16 17:08:46', 304880391, 0),
(11, 5, 15, '61378660', '2016-11-16', 0, 'ICE TELEFONIA', '', '', 16840, 'Pago del telefono y internet', '2016-11-16 18:33:36', 304880391, 0),
(12, 5, 17, '61378645', '2016-11-16', 0, 'JASEC', '', '', 3640, 'Se pago la luz', '2016-11-16 18:34:48', 304880391, 0),
(13, 5, 18, '17500059', '2016-11-17', 0, 'Municipalidad de Oreamuno', '', '', 7280, 'Se paga el servicio de agua', '2016-11-17 12:40:44', 304880391, 0),
(14, 7, 30, '0291112', '2016-11-28', 0, 'Omar Gomez Alvarez', '', '', 10000, 'Pago de gasolina', '2016-11-28 13:14:13', 304880391, 0),
(15, 1, 5, '02911112', '2016-11-30', 302740772, 'Omar ', 'Gomez Alvarez', '89379222', 10000, 'Viáticos de 3 dìas', '2016-12-03 16:49:19', 304880391, 0),
(16, 1, 5, '0291113', '2016-11-28', 302740772, 'omar', 'Gomez Alvarez ', '89379222', 7000, 'viaticos', '2016-12-03 16:51:20', 304880391, 1),
(17, 7, 30, '0291119', '2016-12-05', 302860051, 'Marco Tulio', 'Montoya Sanchez ', '', 10000, 'Servicios profesionales cancelados a don Marco', '2016-12-05 11:51:19', 304880391, 0),
(18, 3, 12, '0291116', '2016-11-30', 304880391, 'Mariana', 'Muñiz Gomez', '84826025', 25000, 'Paga de comisión por llegar a la meta', '2016-12-09 11:52:23', 304880391, 0),
(19, 7, 30, '0291115', '2016-11-30', 0, 'Mariana Muñiz Gomez', '', '', 100000, 'Paga de salario del 15 noviembre al 30 de noviembre', '2016-12-09 11:54:16', 304880391, 0),
(20, 3, 12, '0291117', '2016-11-30', 303840209, 'Lucia ', 'Madriz Nuñez', '84666284', 7500, 'Pago de comisión del 12 de noviembre al 29 de Noviembre', '2016-12-09 12:02:30', 304880391, 0),
(21, 3, 12, '0291118', '2016-11-30', 304100879, 'Carolina', 'Gomez Granados', '84073333', 30000, 'Pago de comisiones de 12 de noviembre al 29 de noviembre', '2016-12-09 12:06:40', 304880391, 0),
(22, 5, 15, '1403918', '2016-12-22', 0, 'ICE', '', '', 16765, 'Pago de teléfono de la oficina.', '2016-12-22 11:47:15', 304880391, 0),
(23, 5, 17, '1404529', '2016-12-22', 0, 'Jasec', '', '', 4000, 'Pago de la luz', '2016-12-22 11:48:54', 304880391, 0),
(24, 5, 18, '1759003', '2016-12-22', 0, 'Municipalidad de Oreamuno', '', '', 7280, 'Pago del agua.', '2016-12-22 11:50:23', 304880391, 0),
(25, 9, 31, '1759004', '2016-12-22', 304880391, 'Vera', 'Orozco Mata', '25510730', 39000, 'Pago de la recolección de basura de los meses Agosto, setiembre, octubre, noviembre y diciembre. Se pagaron 5 recibos ', '2016-12-22 11:56:45', 304880391, 0),
(26, 3, 10, '0291127', '2016-12-22', 303840209, 'Lucia ', 'Madriz Nuñez', '25521617', 10500, 'Pago de comisión de Lucia.', '2016-12-22 11:59:18', 304880391, 0),
(27, 3, 10, '029112', '2016-12-22', 303410174, 'Carmen', 'Zuñiga Campos', '70383198', 3000, 'Pago de comisión del 29 de noviembre al 14 de diciembre.', '2016-12-22 12:09:14', 304880391, 0),
(28, 7, 30, '02911129', '2016-12-22', 0, 'Omar Gómez Alvarez', '', '', 10000, 'Pago de don Omar por ir a cobrar a tucurrique, orosi, san rafael del día 22 de diciembre ', '2016-12-22 12:11:22', 304880391, 0),
(29, 1, 5, '0291132', '2016-12-22', 302740772, 'Omar', 'Gomez Alvarez', '89379222', 10000, 'Pago de cobro del 22 de diciembre, tucurrique, orosi y san rafael. ', '2016-12-22 12:25:00', 304880391, 0),
(30, 3, 10, '0291131', '2016-12-15', 304100879, 'Carolina', 'Gomez Granados', '84073333', 5500, 'Pago de comisiones del 29 al 14 de diciembre 2016', '2016-12-22 12:30:54', 304880391, 0),
(31, 5, 14, '061633', '2016-12-03', 0, 'Vera  Mata Orozco', '', '', 170000, 'Pago de Alquiler de la oficina', '2016-12-22 16:11:04', 304880391, 0),
(32, 5, 16, '162261853136', '2016-12-26', 0, 'CLARO', '', '', 6860, 'Pago del teléfono celular', '2016-12-27 15:26:38', 304880391, 0),
(33, 7, 30, '670530', '2017-02-01', 0, 'Corporación Supermercados unidos', '', '', 5900, 'Articulos, suministros de limpieza', '2017-02-11 11:25:11', 304880391, 0),
(34, 7, 30, '000602', '2017-02-06', 0, 'Daniel Alfonso Leandro Mata', '', '', 80000, 'Revisión general de la carroza.', '2017-02-11 11:27:28', 304880391, 0),
(35, 7, 30, '000517002476', '2017-02-06', 0, 'RITEVE SYC SA', '', '', 9930, 'Revisión de RITEVE', '2017-02-11 11:29:53', 304880391, 0),
(36, 7, 30, '269687', '2017-02-06', 0, 'SERVIREPUESTOS JGSA', '', '', 106672, 'COMPRA DE REPUESTOS PARA LA CARROZA', '2017-02-11 11:33:13', 304880391, 0),
(37, 7, 30, '0909063310', '2017-02-05', 0, 'PEQUEÑO MUNDO', '', '', 5900, 'SUMINISTROS', '2017-02-11 11:35:28', 304880391, 0),
(38, 7, 30, '133003', '2017-02-05', 0, 'CASOMA', '', '', 24805, 'SUMINISTROS DE MAQUILLAJE', '2017-02-11 11:42:08', 304880391, 0),
(39, 7, 30, '1769618', '2017-01-20', 0, 'MUNICIPALIDAD DE OREAMUNO', '', '', 31040, 'PAGO DE PATENTE', '2017-02-11 11:49:42', 304880391, 0),
(40, 7, 27, '764737', '2017-03-24', 0, 'Supermercados Unidos', '', '', 2400, 'Varios', '2017-04-02 16:26:45', 304880391, 0),
(41, 7, 29, '280720', '2017-03-28', 0, 'TIENDA', '', '', 9300, 'Floristeria', '2017-04-02 16:29:07', 304880391, 0),
(42, 7, 27, '078862', '2017-03-24', 0, 'Mundo Magico', '', '', 7900, 'Cortina de Baño', '2017-04-02 16:31:44', 304880391, 0),
(43, 7, 27, '14022', '2017-03-21', 0, 'Ferretería Procasa', '', '', 4550, 'Ferreteria', '2017-04-02 16:34:21', 304880391, 0),
(44, 7, 30, '022398', '2017-03-19', 0, 'Inverciones Fine Pan', '', '', 2975, 'ALIMENTACION', '2017-04-02 16:37:28', 304880391, 0),
(45, 7, 27, '10000001', '2017-03-17', 0, 'COMPAN SA', '', '', 1700, 'BOLSAS DE BASURA', '2017-04-02 16:38:59', 304880391, 0),
(46, 7, 29, '025671', '2017-03-03', 0, 'Manuel Jimenez Cespedes', '', '', 230, 'lapiz y borrador', '2017-04-02 16:40:56', 304880391, 0),
(47, 7, 27, '0464168', '2017-03-20', 0, 'Ferretería tornillos y mas Guillermo ', '', '', 6000, 'Ferretería ', '2017-04-02 16:45:17', 304880391, 0),
(48, 7, 29, '025670', '2017-03-03', 0, 'Brisas digital ', '', '', 19815, 'varios ', '2017-04-02 16:48:30', 304880391, 0),
(49, 3, 10, '0589838', '2017-03-16', 303810209, 'Lucia ', 'Madriz Nuñez ', '84666282', 11500, 'pago de comisión ', '2017-04-02 16:56:27', 304880391, 0),
(50, 3, 10, '0589839', '2017-03-16', 303380706, 'Carmen', 'Zuñiga Campos ', '70383193', 3000, 'Pago de comisión ', '2017-04-02 17:00:32', 304880391, 0),
(51, 2, 7, '0589840', '2017-03-16', 700690650, 'Juan Carlos', 'Cordero Mora', '', 35000, 'Pago de cobranza', '2017-04-02 17:06:10', 304880391, 0),
(52, 3, 10, '0589837', '2017-03-15', 304100879, 'Carolina ', 'Gomez Granados', '84073333', 18500, 'Pago de comision', '2017-04-02 17:10:17', 304880391, 0),
(53, 3, 10, '0589833', '2017-03-02', 304880391, 'Mariana', 'Muñiz Gomez', '84826025', 27800, 'Pago de comision', '2017-04-02 17:13:36', 304880391, 0),
(54, 2, 7, '0589832', '2017-03-01', 304880391, 'Mariana ', 'Muñiz Gomez', '84826025', 100000, 'Pago de honorarios', '2017-04-02 17:16:39', 304880391, 0),
(55, 7, 29, '625770', '2017-03-01', 0, 'Molina y Robles', '', '', 5000, 'Gasolina', '2017-04-02 17:19:16', 304880391, 0),
(59, 7, 29, '000313400', '2017-03-29', 0, 'office Depot', '', '', 134000, 'Impresora', '2017-04-03 13:41:20', 304880391, 0),
(61, 7, 29, '0162612', '2017-03-18', 0, 'Jose Miguel Marato S', '', '', 40000, '8 Cajones', '2017-04-03 13:55:06', 304880391, 0),
(62, 7, 30, '9248146', '2017-03-22', 0, 'Claro', '', '', 6859, 'Pago de Celular.', '2017-04-03 13:57:09', 304880391, 0),
(63, 7, 29, '811268', '2017-03-14', 0, 'FERRETERÍA EPA', '', '', 46675, 'COMPRA DE MATERIALES', '2017-04-03 14:01:07', 304880391, 0),
(64, 7, 29, '679320', '2017-03-05', 0, 'FERRETERÍA EPA', '', '', 246300, 'MATERIALES', '2017-04-03 15:21:27', 304880391, 0),
(65, 7, 29, '289700', '2017-03-18', 0, 'FERRERÍA IZTARU', '', '', 7826, 'COMPRA DE MATERIALES', '2017-04-03 15:25:45', 304880391, 0),
(66, 7, 29, '414649', '2017-03-14', 0, 'Ferretería EPA', '', '', 17590, 'Compra de Materiales', '2017-04-03 15:27:39', 304880391, 0),
(67, 7, 29, '289062', '2017-03-15', 0, 'Ferreteria Iztaru', '', '', 7010, 'compra de materiales', '2017-04-03 15:33:18', 304880391, 0),
(68, 7, 29, '214061', '2017-03-08', 0, 'LANCO', '', '', 6880, 'Compra de Materiales', '2017-04-03 15:56:51', 304880391, 0),
(69, 7, 29, '32601', '2017-03-03', 0, 'Librería Leman', '', '', 1650, 'Compra de etiquetas', '2017-04-03 15:59:40', 304880391, 0),
(70, 7, 29, '30262', '2017-02-26', 0, 'SIMAN', '', '', 75900, 'Deoracion', '2017-04-03 16:02:03', 304880391, 0),
(71, 7, 27, '1326144', '2017-03-19', 0, 'Grupo Empresarial Supermercados unidos', '', '', 21032, 'Compra de artículos de limpieza', '2017-04-03 16:04:33', 304880391, 0),
(72, 7, 29, '0912039820', '2017-02-23', 0, 'Pequeño Mundo Cartago', '', '', 39550, 'Decoración', '2017-04-03 16:06:54', 304880391, 0),
(73, 7, 29, '625972', '2017-03-02', 0, 'MOLINA Y ROBLES', '', '', 5000, 'Gasolina', '2017-04-03 16:15:19', 304880391, 0),
(74, 7, 29, '401253', '2017-02-23', 0, 'EL REY', '', '', 7025, 'Compra de suministros', '2017-04-03 16:21:56', 304880391, 0),
(75, 7, 29, '407264', '2017-03-05', 0, 'EL REY', '', '', 14250, 'COMPRA DE SUMINITROS', '2017-04-03 16:23:20', 304880391, 0),
(76, 7, 29, '434118', '2017-03-16', 0, 'EL REY', '', '', 1950, 'Libreria', '2017-04-03 16:45:59', 304880391, 0),
(77, 7, 29, '0508', '2017-03-05', 0, 'ALPEMUSA SA', '', '', 34000, 'Floristería ', '2017-04-03 16:48:05', 304880391, 0),
(78, 7, 29, '33928', '2017-03-16', 0, 'Libreria Leman SA', '', '', 5100, 'Carpetas colgantes', '2017-04-03 16:49:50', 304880391, 0),
(79, 5, 15, '226419', '2017-03-22', 0, 'ICE', '', '', 17405, 'PAGA DE TELEFONO E INTERNET', '2017-04-03 16:51:59', 304880391, 0),
(80, 7, 29, '627954', '2017-03-16', 0, 'Molina Y Robles', '', '', 5000, 'Gasolina', '2017-04-03 16:53:43', 304880391, 0),
(81, 7, 29, '628137', '2017-03-17', 0, 'Molina y Robles', '', '', 5000, 'Gasolina', '2017-04-03 16:55:03', 304880391, 0),
(82, 5, 17, '226422', '2017-03-16', 0, 'JASEC', '', '', 3862, 'PAGO DE LUZ', '2017-04-03 16:56:20', 304880391, 0),
(83, 7, 29, '61605', '2017-04-04', 0, 'SeguriCentro', '', '', 70060, 'Seguridad', '2017-04-04 14:54:57', 304880391, 0),
(84, 2, 7, '0572807', '2017-04-04', 706900650, 'Juan Carlos ', 'Cordero Matamoros', '89141381', 40000, 'Pago de cobranza del 1 y 2 de abril.', '2017-04-04 15:49:43', 304880391, 0),
(85, 7, 29, '0513', '2017-04-11', 0, 'ALPEMUSA SA', '', '', 48800, 'SUMINISTROS DE FLORISTERIA', '2017-04-12 17:12:40', 304880391, 0),
(86, 7, 29, '428094', '2017-04-11', 0, 'ALMACEN EL REY', '', '', 48350, 'SUMINISTROS DE FLORISTERIA', '2017-04-12 17:14:04', 304880391, 0),
(87, 7, 29, '45240', '2017-04-12', 0, 'FERRESOLUCIONES', '', '', 30799, 'MATERIALES DE FERRETERIA', '2017-04-12 17:15:34', 304880391, 0),
(88, 7, 29, '0455', '2017-04-12', 0, 'Decoraciones exclusit bost light year SRL', '', '', 160000, 'Restauración de carroza gris ', '2017-04-13 16:59:46', 304100879, 0),
(89, 8, 44, '0291114', '2016-11-30', 0, 'Omar ', 'Gomez Alvares', '25521617', 30000, 'pago de servicios profesionales del mes de nov', '2017-04-17 21:35:42', 303280212, 0),
(90, 8, 44, '0991120', '2016-11-30', 302860051, 'Marco Tulio', 'Montoya', '25521617', 13000, 'pago de comisión por cobro mes de noviembre', '2017-04-17 21:37:51', 303280212, 0),
(91, 5, 16, '100000000000', '2016-11-28', 0, 'claro costa rica', '', '', 6859, 'pago de telf celular', '2017-04-17 21:39:49', 303280212, 0),
(92, 8, 44, '0291106', '2016-11-11', 0, 'Marco Tulio', 'Moya', '25521617', 40000, 'Pago de la mitad del acuerdo de servicios negociado', '2017-04-17 21:41:30', 303280212, 0),
(93, 8, 44, '0291105', '2016-11-15', 0, 'Marco Tulio', 'Moya', '25521617', 14625, 'Pago de combustible y comision por cobro', '2017-04-17 21:42:58', 303280212, 0),
(94, 8, 44, '0291110', '2016-11-16', 304100879, 'Carolina ', 'Gomez granados', '84073333', 33000, 'Pago de servicios profesionales', '2017-04-17 21:44:19', 303280212, 0),
(95, 3, 10, '0291109', '2016-12-16', 304100879, 'Carolina', 'Gomez Granados', '84073333', 12500, 'pago de comisiones del 01 al 15 de nov', '2017-04-17 21:45:45', 303280212, 0),
(96, 8, 44, '029111', '2016-11-16', 304370215, 'Daniel', 'Ramirez Alvarez', '63122405', 58331, 'Pago de servicios profesionales, por el tiempo laborado', '2017-04-17 21:47:44', 303280212, 0),
(97, 8, 46, '589846', '2017-04-15', 304880391, 'Mariana ', 'Muñiz Gomez', '84826025', 100000, 'Pago de salario del 30 de marzo al 15 de abril 2017', '2017-04-18 20:11:57', 304100879, 0),
(98, 3, 10, '589848', '2017-04-17', 304880391, 'Mariana ', 'Muñiz Gomez', '84826025', 12800, 'Pago de comisiones contratos vendidos ', '2017-04-18 20:14:13', 304100879, 0),
(99, 3, 11, '589849', '2017-04-17', 304880391, 'Mariana ', 'Muñiz Gomez ', '84826025', 42100, 'Pago de comisión por el servicio vendido 5 de abril 2017 ', '2017-04-18 20:16:34', 304100879, 0),
(100, 3, 10, '3106', '2017-04-17', 304100879, 'Carolina ', 'Gomez Granados ', '84073333', 11500, 'Pago de comisiones primera quincena de abril ', '2017-04-18 20:18:27', 304100879, 0),
(101, 11, 53, '631655', '2017-04-17', 2147483647, 'Estación servicio', 'Molina y Robles ', '25930322', 5000, 'Pago de combustible ', '2017-04-18 20:21:24', 304100879, 0),
(102, 11, 50, '984789', '2017-04-15', 2147483647, 'Estación de servicio ', 'Molina y Robles', '25930322', 5000, 'Pago de combustible Aysen Quesada ', '2017-04-18 20:23:50', 304100879, 0),
(103, 11, 50, '630394', '2017-04-03', 2147483647, 'Estación de servicio', 'Molina Robles ', '25930322', 4500, 'Pago combustible Aysen Q', '2017-04-18 20:25:52', 304100879, 0),
(104, 11, 50, '630238', '2017-04-01', 2147483647, 'Estacion de servicio', 'Molina Robles', '25930322', 5500, 'Pago de combustible de Aysen Q ', '2017-04-18 20:28:52', 304100879, 0),
(105, 10, 49, '589850', '2017-04-17', 700790650, 'Juan Carlos ', 'Cordero Montenegro ', '89141381', 40000, 'Servicio de cobro ', '2017-04-18 20:30:56', 304100879, 0),
(106, 7, 28, '140898', '2017-04-18', 0, 'Sucursal Casoma ', '', '', 17210, 'compra de pizarra, lapicero, hojas y marcador  ', '2017-04-18 20:35:54', 304100879, 0),
(107, 5, 16, '14225316', '2017-04-19', 0, 'Claro CR Telecomunicaciones SA', '', '', 6859, 'Pago de celular periodo de abril 2017', '2017-04-19 20:02:42', 304100879, 0),
(110, 8, 46, '1275741', '2016-11-01', 302860051, 'Marco Tulio ', 'Montoya ', '89561250', 40000, 'Pago de servicios profesionales ', '2017-04-19 20:47:15', 304100879, 0),
(111, 8, 46, '1275740', '2016-10-29', 304100879, 'Carolina ', 'Gomez Granados ', '84073333', 72000, 'Pago de servicios profesionales ', '2017-04-19 20:49:07', 304100879, 0),
(113, 7, 27, '632000645862', '2016-11-11', 0, 'Maxi pali ', '', '', 11140, 'suministros de limpieza y de oficina ', '2017-04-19 20:53:39', 304100879, 0),
(114, 3, 9, '291108', '2016-11-11', 0, 'Carmen', 'Zuñiga ', '00000000', 3000, 'Comisiones de primera quincena de noviembre ', '2017-04-19 20:56:21', 304100879, 0),
(115, 3, 10, '291107', '2016-11-11', 303840209, 'Lucia ', 'Madriz Nuñez', '84666284', 21000, 'Pago de comisiones primera quincena de noviembre ', '2017-04-19 20:59:00', 304100879, 0),
(116, 11, 51, '291129', '2016-12-22', 303410179, 'Omar', 'Gomez Alvarez ', '70383193', 7000, 'Pago de gasolina del día 22 de diciembre ', '2017-04-19 21:08:51', 304100879, 0),
(117, 3, 10, '291131', '2016-12-15', 304100879, 'Carolina ', 'Gomez Granados ', '84073333', 5500, 'Pago de comisiones del 29 al 14 de diciembre 2016 ', '2017-04-19 21:10:54', 304100879, 0),
(118, 3, 10, '291128', '2016-12-22', 303410179, 'Carmen ', 'Zuñiga Campos ', '70383193', 3000, 'Pago de comisiones del 29 al 14 de diciembre 2016', '2017-04-19 21:13:23', 304100879, 0),
(119, 7, 27, '265549', '2016-12-19', 0, 'Super Jolie', '', '', 1625, 'Compra de helado y papel higiénico ( Mariana Muñiz Gomez )  ', '2017-04-19 21:18:04', 304100879, 0),
(120, 8, 46, '1275750', '2016-12-16', 302740772, 'Omar ', 'Gomez Alvarez ', '00000000', 20000, 'Pago de servicios profesionales y gasolina ', '2017-04-19 21:20:06', 304100879, 0),
(121, 11, 50, '221913', '2016-12-05', 2147483647, 'Servicentro ', 'El Molino SA', '25516909', 7000, 'Pago de gasolina ', '2017-04-19 21:22:31', 304100879, 0),
(122, 11, 51, '291123', '2016-12-05', 0, 'Omar ', 'Gomez Alvarez ', '00000000', 7000, 'Pago de gasolina de los días lunes y martes ', '2017-04-19 21:27:01', 304100879, 0),
(123, 11, 51, '291125', '2016-12-09', 302740772, 'Omar', 'Gomez Alvarez ', '00000000', 10000, 'Pago de gasolina ', '2017-04-19 21:29:02', 304100879, 0),
(124, 5, 18, '1759005', '2016-12-22', 0, 'Municipalidad de Oreamuno ', '', '', 6434, 'Pago correspondiente de basura ', '2017-04-19 21:31:21', 304100879, 0),
(125, 5, 18, '1759006', '2016-12-22', 0, 'Municipalidad de Oreamuno ', '', '', 6312, 'Pago que corresponde la basura ', '2017-04-19 21:32:46', 304100879, 0),
(126, 5, 18, '1759007', '2016-12-22', 0, 'Municipalidad de Oreamuno ', '', '', 6191, 'Pago servicio de basura ', '2017-04-19 21:34:15', 304100879, 0),
(127, 5, 18, '1759008', '2016-12-22', 0, 'Municipalidad de Oreamuno ', '', '', 6070, 'Pago de recolección de basura ', '2017-04-19 21:35:47', 304100879, 0),
(129, 8, 46, '291134', '2016-12-30', 302740272, 'Omar ', 'Gomez Alvarez', '00000000', 20000, 'Pago de servicios profesionales ', '2017-04-19 21:41:15', 304100879, 0),
(130, 5, 16, '161226185313', '2016-12-26', 0, 'Claro', '', '', 6859, 'Pago de celular claro ', '2017-04-19 21:42:57', 304100879, 0),
(131, 3, 10, '291135', '2016-12-30', 0, 'Lucia ', 'Madriz Nuñez', '00000000', 14000, 'Pago de comisiones de la segunda quincena de diciembre 14 al 28 ', '2017-04-19 21:45:07', 304100879, 0),
(132, 11, 51, '291136', '2017-01-02', 0, 'Omar ', 'Gomez Alvarez', '00000000', 5000, 'Pago de gasolina ', '2017-04-19 21:48:01', 304100879, 0),
(133, 3, 10, '291133', '2016-12-30', 304100879, 'Carolina ', 'Gomez Granados ', '84073333', 24500, 'Pago de comisiones del 14 al 28 de diciembre ', '2017-04-19 21:49:33', 304100879, 0),
(134, 3, 10, '291139', '2016-12-30', 304880391, 'Mariana', 'Muñiz Gomez', '84880391', 25000, 'Pago de comisión por llegar a la meta segunda quincena de diciembre ', '2017-04-19 21:51:41', 304100879, 0),
(135, 7, 30, '394', '2017-04-20', 0, 'HMDESIGN ', '', '', 19000, 'Compra de recibos Monte Santo ', '2017-04-20 16:15:33', 304100879, 0),
(136, 7, 30, '9673', '2017-04-20', 0, 'Printico B Aranjuez ', '', '', 8400, 'Servicio de impresión ', '2017-04-20 18:09:40', 304100879, 0),
(137, 7, 41, '3573', '2017-04-21', 0, 'Taco Bell ', '', '', 5900, 'Almuerzo ', '2017-04-21 21:39:20', 304100879, 0),
(138, 3, 10, '3110', '2017-04-15', 303840209, 'Lucia ', 'Madriz Nuñez', '84666284', 10500, 'pago de comisiones que equivale a la primera quincena de abril ', '2017-04-21 21:42:21', 304100879, 0),
(139, 3, 10, '3109', '2017-03-30', 303840209, 'Lucia', 'Madriz Nuñez', '84666284', 11000, 'Pago de comisiones que equivale a la quincena segunda de marzo ', '2017-04-21 21:45:16', 304100879, 0),
(140, 3, 10, '3108', '2017-04-15', 303380706, 'Carmen ', 'Zuñiga Campos ', '70383193', 3000, 'Comisión contrato 1004', '2017-04-21 21:46:42', 304100879, 0),
(141, 8, 45, '818303', '2017-04-05', 302440709, 'Jose Maria', 'Ramirez Solano', '89257554', 35000, 'Pago de servicio de chofer funeral 05 04 17 ', '2017-04-24 16:53:45', 304100879, 0),
(142, 8, 45, '818304', '2017-04-05', 304100879, 'Carolina', 'Gomez Granados ', '84073333', 15000, 'Pago de servicios profesionales asistencia a funeral 05 04 17 ', '2017-04-24 16:56:01', 304100879, 0),
(143, 13, 55, '554925', '2017-04-04', 0, 'xxxxxxxxxx', 'xxxxxxx', '', 112600, 'El recibo que corresponde este gasto no tiene nombre, cédula  tampoco teléfono ', '2017-04-24 17:11:36', 304100879, 0),
(144, 14, 56, '3519', '2017-04-06', 2147483647, 'Distribuidora ', 'Pax', '26352163', 90000, 'Feretro Salermo  5763 ', '2017-04-24 17:18:40', 304100879, 0),
(145, 14, 56, '5763', '2017-04-06', 2147483647, 'Distribuidora ', 'Pax Centroamerica ', '26352163', 90000, 'Feretro Salermo 6440', '2017-04-24 17:23:40', 304100879, 0),
(146, 11, 52, '630614', '2017-04-05', 2147483647, 'Estacion de servicio', 'Molina Robles', '25930322', 30000, 'Combustible para hacer servicio de funeral 05-04-17 ', '2017-04-24 18:09:19', 304100879, 0),
(147, 11, 53, '114746', '2017-04-07', 2147483647, 'Nadeuple SA', 'Lubricentro Oreamuno ', '25516518', 43750, 'Aceite, filtro de aceite, transmisión  Odissey ', '2017-04-24 18:12:23', 304100879, 0),
(148, 7, 41, '23492337766', '2017-04-06', 0, 'Auto mercados SA', '', '', 4505, 'Varios ', '2017-04-24 18:17:47', 304100879, 0),
(149, 11, 50, '1032455', '2017-04-05', 2147483647, 'Estación de servicio ', 'Los Angeles ', '25914550', 34483, 'Gasolina Odissey ', '2017-04-24 18:20:02', 304100879, 0),
(150, 7, 28, '391', '2017-04-11', 0, 'HMDESING', '', '', 19000, 'Talonarios', '2017-04-24 18:21:14', 304100879, 0),
(151, 7, 57, '1862', '2017-04-10', 0, 'Butterfly Dreams', '', '', 1469, 'Una pupa', '2017-04-24 18:23:24', 304100879, 0),
(152, 13, 58, '455', '2017-04-12', 2147483647, 'Decoraciones Exclusit', 'Bost Light SRL ', '25514956', 160000, 'Restauración de auto plataforma de piso Odiisey ', '2017-04-24 18:26:12', 304100879, 0),
(153, 11, 50, '1041270', '2017-04-15', 2147483647, 'Estacion de servicio ', 'Los Angeles ', '25914550', 24124, 'Gasolina Aysen ', '2017-04-24 18:28:34', 304100879, 0),
(154, 11, 50, '17041465', '2017-04-04', 2147483647, 'Petroleos ', 'Delta ', '22428300', 16516, 'Gasolina Aysen ', '2017-04-24 18:30:21', 304100879, 0),
(155, 11, 50, '17086787', '2017-04-08', 2147483647, 'Petróleos Delta ', 'Costa Rica SA', '22428300', 13850, 'Gasolina Aysen ', '2017-04-24 18:32:00', 304100879, 0),
(156, 3, 12, '572807', '2017-04-04', 706900650, 'Juan Carlos ', 'Cordero Matamoros ', '70690650', 40000, 'Recibo por pagos de cobranza del 1 y 2 de abril 2017 ', '2017-04-24 18:34:07', 304100879, 0),
(157, 7, 29, '292424', '2017-04-05', 0, 'Ferreterias FYF ', '', '', 40357, 'Remodelacion de oficina San Jose ', '2017-04-24 18:36:35', 304100879, 0),
(158, 11, 50, '626876', '2017-03-09', 2147483647, 'Estación de servicio  ', 'Molina y Robles', '25930322', 15000, 'Combustible Aysen ', '2017-04-24 21:23:17', 304100879, 0),
(159, 11, 50, '828177', '2017-03-06', 2147483647, 'Multiservicios ', 'La pista ', '22276858', 15000, 'Combustible Aysen', '2017-04-24 21:25:18', 304100879, 0),
(160, 11, 50, '1573071', '2017-03-11', 2147483647, 'Servicentro ', 'Cartago', '25517609', 15000, 'Combustible Aysen ', '2017-04-24 21:27:23', 304100879, 0),
(161, 11, 50, '17078983', '2017-03-23', 2147483647, 'Petroleos', 'Delta Costa Rica', '22428300', 22003, 'Gasolina Aysen Q', '2017-04-24 21:29:43', 304100879, 0),
(162, 11, 50, '17081405', '2017-03-15', 2147483647, 'Petroleos ', 'Delta Costa Rica', '22428300', 15000, 'Gasolina Aysen', '2017-04-24 21:31:07', 304100879, 0),
(163, 11, 50, '207356', '2017-03-30', 2147483647, 'Servicentro ', 'La Tica', '25378047', 18000, 'Gasolina Aysen ', '2017-04-24 21:32:55', 304100879, 0),
(164, 7, 41, '967198', '2017-03-01', 0, 'Corporación Supermercados unidos  ', '', '', 4600, 'Varios ', '2017-04-24 21:38:15', 304100879, 0),
(165, 13, 59, '187068', '2017-03-28', 2147483647, 'Parqueo publico ', 'Avenida ', '22560558', 1650, 'Parqueo carro Aysen ', '2017-04-25 12:25:51', 304100879, 0),
(166, 11, 50, '267022', '2017-04-23', 2147483647, 'Estacion de Servicio', 'Los Angeles ', '25914550', 17510, 'Gasolina Aysen ', '2017-04-25 12:27:50', 304100879, 0),
(167, 7, 28, '0907083842', '2017-04-24', 0, 'Pequeño mundo ', '', '', 6100, 'Decoración para floristeria ', '2017-04-25 13:59:08', 304100879, 0),
(168, 7, 29, '3643', '2017-03-05', 0, 'Siman', '', '', 77250, 'Compra de microondas y espejos ', '2017-04-26 19:50:05', 304100879, 0),
(169, 14, 56, '3331', '2017-03-03', 2147483647, 'Distribuidora ', 'Pax', '26352163', 250000, 'Salermo 5543\r\nBiblia 3578', '2017-04-26 19:53:09', 304100879, 0),
(171, 7, 29, '301030072918', '2017-03-24', 0, 'Mundo Mágico ', '', '', 7900, 'Compra de Cortina \r\n', '2017-04-26 19:57:55', 304100879, 0),
(172, 7, 60, '809311', '2017-03-25', 0, 'Epa', '', '', 246300, 'Compra de material para remodelación oficina San José ', '2017-04-26 20:03:37', 304100879, 0),
(173, 7, 60, '310172024212', '2017-03-05', 0, 'Epa', '', '', 206656, 'Remodelación oficina San José ', '2017-04-26 20:09:28', 304100879, 0),
(174, 7, 29, '109378', '2017-03-05', 0, 'Alpamusa', '', '', 34000, 'Varios ', '2017-04-26 20:11:56', 304100879, 0),
(175, 7, 60, '700471051', '2017-03-14', 0, 'Epa', '', '', 46665, 'Varios\r\n', '2017-04-26 20:14:06', 304100879, 0),
(176, 7, 29, '162612', '2017-03-18', 0, 'Miguel Maroto', '', '', 40000, 'Restauración cajones', '2017-04-26 20:15:54', 304100879, 0),
(177, 7, 29, '6307', '2017-03-29', 0, 'Office Depot', '', '', 34990, 'Varios ', '2017-04-26 20:18:11', 304100879, 0),
(178, 3, 10, '589830', '2017-03-02', 304100879, 'Carolina ', 'Gómez Grqnados', '84073333', 19000, 'Comisiones segunda quincena de febrero ', '2017-04-26 20:20:17', 304100879, 0),
(179, 3, 10, '589828', '2017-03-02', 303840208, 'Lucia ', 'Madriz Nuñez ', '84666284', 15500, 'Comisión segunda quincena de febrero ', '2017-04-26 20:22:32', 304100879, 0),
(180, 10, 48, '589831', '2017-03-02', 700690650, 'Juan Carlos ', 'Matamoros', '89141381', 35000, 'Comisión servicio de cobranza ', '2017-04-26 20:25:02', 304100879, 0),
(181, 8, 46, '589832', '2017-03-01', 0, 'Mariana ', 'Muñiz Gomez', '00000000', 100000, 'A este recibo no se entiende bien la letra de Mariana ', '2017-04-26 20:27:48', 304100879, 0),
(182, 3, 10, '589833', '2017-03-02', 304880391, 'Mariana ', 'Muñiz Gomez', '84826025', 27800, 'Comisiones segunda quincena de febrero ', '2017-04-26 20:30:21', 304100879, 0),
(183, 7, 61, '9310', '2017-03-05', 0, 'D''kore', '', '', 18000, '6 arreglos ', '2017-04-26 20:32:44', 304100879, 0),
(184, 7, 41, '515137', '2017-01-14', 0, 'Arcos Dorados', '', '', 2500, 'Varios ', '2017-04-26 20:37:23', 304100879, 0),
(185, 7, 41, '381483340115', '2017-01-14', 0, 'Almacenes el Rey ', '', '', 22150, 'Artículos de fiesta (Aysen ) ', '2017-04-26 20:40:56', 304100879, 0),
(186, 7, 60, '149177', '2017-01-12', 0, 'Ferretería Campeón ', '', '', 57900, 'Varios ', '2017-04-26 20:42:22', 304100879, 0),
(187, 11, 50, '264168', '2017-01-16', 2147483647, 'Estación de servicios ', 'la costanera ', '40320700', 19000, 'Gasolina Aysen ', '2017-04-26 20:46:17', 304100879, 0),
(188, 7, 41, '3880', '2017-01-18', 0, 'Distribuidora Cruz', '', '', 3710, 'Aysen ', '2017-04-26 20:51:33', 304100879, 0),
(189, 11, 50, '1132158', '2017-01-31', 2147483647, 'Servicios La Pista', 'Zapote', '22864483', 17000, 'Aysen ', '2017-04-26 20:54:23', 304100879, 0),
(190, 11, 50, '262000', '2017-01-02', 2147483647, 'Estación de servicios ', 'Costanera Veintisiete ', '40320700', 15146, 'Gasolima Aysen ', '2017-04-26 20:57:12', 304100879, 0),
(191, 11, 50, '263566', '2017-01-08', 2147483647, 'Estación de servicios ', 'Costanera Veinticiete', '40320700', 15000, 'Gasolina Aysen ', '2017-04-26 20:59:16', 304100879, 0),
(192, 7, 41, '1102201936', '2017-01-13', 0, 'Fidel Puntarenas', '', '', 4731, 'Tabcin, colgate ', '2017-04-26 21:01:42', 304100879, 0),
(193, 11, 50, '978729', '2017-01-11', 2147483647, 'Estación de servicios ', 'Molina y Robles ', '25930322', 11108, 'Gasolina Aysen ', '2017-04-26 21:03:40', 304100879, 0),
(194, 7, 29, '903090638', '2017-01-14', 0, 'Pequeño Mundo ', '', '', 18800, 'Varios decoración ', '2017-04-26 21:05:03', 304100879, 0),
(195, 7, 60, '333078', '2017-01-12', 0, 'Ferretería Apuro S A L', '', '', 15520, 'Descripción de la factura no se entiende ', '2017-04-26 21:06:57', 304100879, 0),
(196, 11, 51, '291142', '2017-01-11', 302740772, 'Omar ', 'Gomez Alvarez ', '00000000', 8000, 'Gasolina del día cobro 11-01-2017 ', '2017-04-27 21:09:10', 304100879, 0),
(197, 5, 14, '61636', '2017-01-10', 0, 'Vera Orozco Mata ', '', '', 170000, 'Alquiler de oficina ', '2017-04-27 21:13:12', 304100879, 0),
(198, 19, 74, '7777777', '2018-05-02', 2147483647, 'RPNNY', 'SIOSAaaa', '', 2220, 'Prueba de gastps', '2018-05-13 00:08:56', 0, 1),
(199, 5, 32, '77777', '2018-05-10', 0, 'cut', '', '', 300000, 'jddjdddd', '2018-05-13 01:44:14', 123456789, 1),
(200, 13, 58, '8888', '2018-05-11', 2147483647, 'Iiiii', 'Fffff', '', 88888900000, 'Kdkdkkdd', '2018-05-13 01:46:13', 123456789, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_servicio`
--

CREATE TABLE `informacion_servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informacion_servicio`
--

INSERT INTO `informacion_servicio` (`id`, `descripcion`, `estatus`) VALUES
(1, 'tipo de luna', 1),
(2, 'materiales de luna', 1),
(3, 'tratamiento de luna', 1),
(4, 'tipo de montura', 1),
(5, 'materiales de montura', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descripcion_general` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `descripcion`, `descripcion_general`, `cantidad`, `fecha_creacion`, `estatus`) VALUES
(1, 'Inventario Base', 'Inventario base de la optica', 1500, '2018-05-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_de_vendedor`
--

CREATE TABLE `listado_de_vendedor` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listado_de_vendedor`
--

INSERT INTO `listado_de_vendedor` (`id`, `identificacion`, `nombre`, `apellido`, `celular`, `estatus`, `fecha_creacion`) VALUES
(1, '204842434', 'Ronny Jose', 'Simosa Montoya', '993350031', 1, '2018-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_luna`
--

CREATE TABLE `materiales_luna` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales_luna`
--

INSERT INTO `materiales_luna` (`id`, `descripcion`, `estatus`) VALUES
(1, 'resina', 1),
(2, 'cristal', 1),
(3, 'policarbonato', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_monturas`
--

CREATE TABLE `materiales_monturas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materiales_monturas`
--

INSERT INTO `materiales_monturas` (`id`, `descripcion`, `estatus`) VALUES
(1, 'carey', 1),
(2, 'acetato', 1),
(3, 'metal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_report` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `url` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `archivo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_report`, `nombre`, `url`, `archivo`, `orden`, `status`) VALUES
(4, 'Reporte por Montura', 'reporte/facturacion', 'excel/view_deposito', 3, 0),
(5, 'Reporte por Luna', 'reporte/facturacion', 'excel/view_factura', 5, 0),
(6, 'Reporte por Vendedor\r\n', 'reporte/proyeccion', 'excel/view_vendedor', 1, 0),
(7, 'Reporte de Gastos Operacionales', 'reporte/operacional', 'excel/view_operacional', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_categ_operac`
--

CREATE TABLE `td_categ_operac` (
  `id_categ` int(11) NOT NULL COMMENT 'id de la categoría operacional',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la categoria',
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'descripcion de la categoria',
  `fcreacion` date NOT NULL COMMENT 'fecha de creacion',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = Activo, 1 = Inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_categ_operac`
--

INSERT INTO `td_categ_operac` (`id_categ`, `nombre`, `descripcion`, `fcreacion`, `status`) VALUES
(1, 'Viáticos', 'Los viáticos son aprobado solo al personal de monte santo', '2016-09-07', 1),
(2, 'Honorarios', 'Honorarios profesionales', '2016-09-08', 1),
(3, 'Comisiones', 'Comisiones de vendedores, cobradores, comercios, etc.', '2016-09-08', 1),
(4, 'Incentivos', 'Abarca todo lo relacionado con los incentivos', '2016-09-08', 1),
(5, 'Alquileres Y Pago De Servicios', 'Este servicio abarca todo lo relacionado con el inmueble y otras cosas mas', '2016-09-08', 1),
(6, 'Publicidad Y Mercadeo', 'Abarca todo lo relacionado con publicidad y mercadeo', '2016-09-08', 1),
(7, 'Otros Gastos', 'Abarca todo lo relacionado con con otros gastos', '2016-09-08', 1),
(8, 'Servicios Profesionales ', 'Pago de servicios profesionales ', '2016-11-09', 1),
(9, 'Pago de servicios Municipales', 'Pago de la Recolección de basura', '2016-12-22', 1),
(10, 'Cobro', 'Cobros que se llevan en Monte Santo', '2017-04-17', 1),
(11, 'Combustible Y Lubricantes', 'Llevar los gastos de combustible de monte santo', '2017-04-17', 1),
(12, 'Catafalco', 'Iglesia ', '2017-04-24', 1),
(13, 'Carros y Carrozas', '', '2017-04-24', 1),
(14, 'Cofres ', ' Distribuidora Pax Centroamérica ', '2017-04-24', 1),
(18, 'Mierda Hose', 'Maricoooo', '2018-05-12', 1),
(19, 'Aaaaaaaaaaaaa', 'Aaaaaaaaaaaaaa', '2018-05-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_servicio`
--

CREATE TABLE `td_servicio` (
  `id_serv` int(11) NOT NULL COMMENT 'Id del Servicio o Plan',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Servicio o plan ',
  `descripcion_general` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'Fecha Creacion del Servicio o Plan',
  `fcreacion` date DEFAULT NULL COMMENT 'Estatus del servicio o plan: 0 = Activo, 1 = Inactivo',
  `id_categoria` int(11) DEFAULT NULL COMMENT '0 = Contratos, 1 = Contratos Comercializadora, Lo lleno manual para saber que dicho plan solo se visualiza en contratos de Comercializadora'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Servicios o Planes de Monte Santo';

--
-- Volcado de datos para la tabla `td_servicio`
--

INSERT INTO `td_servicio` (`id_serv`, `nombre`, `descripcion_general`, `status`, `fcreacion`, `id_categoria`) VALUES
(1, 'Servicio Súper Económico 12 Meses', '1', 1, '0000-00-00', 1),
(2, 'Servicio Súper Económico 24 Meses', '2', 2147483647, '0000-00-00', 0),
(3, 'Servicio Económico', '0', 2147483647, '0000-00-00', 0),
(4, 'Servicio Único Siempre Contigo', '8', 2147483647, '0000-00-00', 1),
(5, 'Servicio Super Econòmico 36 Meses', '3', 2147483647, '0000-00-00', 0),
(6, 'Plan Corporativo', '10', 2147483647, '0000-00-00', 0),
(7, 'Plan Corporativo Plus', '10', 2147483647, '0000-00-00', 0),
(8, 'Plan Ejecutivo', '10', 2147483647, '0000-00-00', 0),
(9, 'Plan Siempre Contigo Vitalicio', '20', 2147483647, '0000-00-00', 1),
(10, 'Servicio de niño económico ', '1', 2147483647, '0000-00-00', 0),
(11, 'Servicio Regular Economico', '0', 2147483647, '0000-00-00', 0),
(12, 'prueaba tu tu', 'prueba est tut tu', 1, '2018-05-15', 5),
(13, 'prueaba ronny', 'prueba est mierda', 1, '2018-05-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_serv_operac`
--

CREATE TABLE `td_serv_operac` (
  `id_serv_operac` int(11) NOT NULL COMMENT 'id del servicio operacional',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del Servicio operacional',
  `fcreacion` datetime NOT NULL COMMENT 'fecha de creacion',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 = Activo, 1 = Inactivo',
  `fk_id_categ` int(11) NOT NULL COMMENT 'Campo relacionar con la tabla td_serv_operac_categ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_serv_operac`
--

INSERT INTO `td_serv_operac` (`id_serv_operac`, `nombre`, `fcreacion`, `status`, `fk_id_categ`) VALUES
(1, 'Viáticos Oficinista', '2016-09-07 23:46:59', 1, 1),
(2, 'Viáticos Vendedores', '2016-09-07 23:46:59', 1, 1),
(3, 'Viáticos Jefe De Ventas', '2016-09-07 23:46:59', 1, 1),
(4, 'Viáticos E-comerce', '2016-09-07 23:46:59', 1, 1),
(5, 'Viáticos Cobrador', '2016-09-07 23:46:59', 1, 1),
(6, 'Honorarios Abogado', '2016-09-08 00:52:43', 1, 2),
(7, 'Honorarios Contador', '2016-09-08 00:52:43', 1, 2),
(8, 'Comision Por Referidos (digital)', '2016-09-08 01:03:38', 1, 3),
(9, 'Comision Gerente De Ventas', '2016-09-08 01:03:38', 1, 3),
(10, 'Comision Vendedores', '2016-09-08 01:03:38', 1, 3),
(11, 'Comision Por Venta De Servicios Directos', '2016-09-08 01:03:38', 1, 3),
(12, 'Comisión Por Cobro', '2016-09-08 01:04:09', 1, 3),
(13, 'Insentivos Anuales 2%', '2016-09-08 01:05:07', 1, 4),
(14, 'Alquiler De Oficina', '2016-09-08 01:07:48', 1, 5),
(15, 'Telefono E Internet', '2016-09-08 01:07:48', 1, 5),
(16, 'Telefono Celular', '2016-09-08 01:07:48', 1, 5),
(17, 'Electricidad', '2016-09-08 01:07:48', 1, 5),
(18, 'Agua', '2016-09-08 01:07:48', 1, 5),
(19, 'Impuestos', '2016-09-08 01:07:48', 1, 5),
(20, 'Poliza Colectiva Del INS', '2016-09-08 01:07:48', 1, 5),
(21, 'Pago Impuesto de Renta', '2016-09-08 01:07:48', 1, 5),
(22, 'Poliza De Riesgos Del Trabajo', '2016-09-08 01:07:48', 1, 5),
(23, 'Pago Impuesto de Ventas', '2016-09-08 01:07:48', 1, 5),
(24, 'Mercadeo Y Comercializacion', '2016-09-08 01:12:48', 1, 6),
(25, 'Publicidad Facebook', '2016-09-08 01:12:48', 1, 6),
(26, 'Material Impreso', '2016-09-08 01:13:11', 1, 6),
(27, 'Insumos De Limpieza', '2016-09-08 01:14:06', 1, 7),
(28, 'Suministros De Oficina', '2016-09-08 01:14:06', 1, 7),
(29, 'Mobiliario Y Equipo De Oficina', '2016-09-08 01:14:06', 1, 7),
(30, 'Costo De Papelería Oficial', '2016-09-08 01:15:06', 1, 7),
(31, 'Recolección de Basura', '2016-12-22 11:53:02', 1, 9),
(32, 'Comisiones Bancarias', '2017-04-17 00:00:00', 1, 5),
(33, 'Correos Y Curier', '2017-04-17 00:00:00', 1, 5),
(34, 'Pago Seguros Carrozas', '2017-04-17 00:00:00', 1, 5),
(35, 'Pago seguros voluntarios', '2017-04-17 00:00:00', 1, 5),
(36, 'Pago CCSS', '2017-04-17 00:00:00', 1, 5),
(37, 'Parqueo De Carro Gerencia', '2017-04-17 00:00:00', 1, 5),
(38, 'Parqueo De Carrozas', '2017-04-17 00:00:00', 1, 5),
(39, 'Otros parqueos', '2017-04-17 00:00:00', 1, 5),
(40, 'Uniformes', '2017-04-17 00:00:00', 1, 7),
(41, 'Alimentación', '2017-04-17 00:00:00', 1, 7),
(42, 'Patente Municipal', '2017-04-17 00:00:00', 1, 9),
(43, 'Impuestos Municipales', '2017-04-17 00:00:00', 1, 9),
(44, 'Servicios Profesionales Por Contrato', '2017-04-17 00:00:00', 1, 8),
(45, 'Servicios Profesionales Eventuales', '2017-04-17 00:00:00', 1, 8),
(46, 'Incentivos Salariales Varios', '2017-04-17 00:00:00', 1, 8),
(47, 'Comisiones Tarjetas De Crédito', '2017-04-17 00:00:00', 1, 10),
(48, 'Comisiones A Puntos De Cobro', '2017-04-17 00:00:00', 1, 10),
(49, 'Otras Comisiones', '2017-04-17 00:00:00', 1, 10),
(50, 'Combustible Gerencia', '2017-04-17 00:00:00', 1, 11),
(51, 'Combustible Cobrador', '2017-04-17 00:00:00', 1, 11),
(52, 'Combustible Servicios', '2017-04-17 00:00:00', 1, 11),
(53, 'Combustible Descripción De Concepto', '2017-04-17 00:00:00', 1, 11),
(54, 'Iglesia de Tejar Cartago ', '2017-04-24 17:02:58', 1, 12),
(55, 'Compra', '2017-04-24 17:09:29', 1, 13),
(56, 'Contado O Crédito ', '2017-04-24 17:14:39', 1, 14),
(57, 'Mariposas', '2017-04-24 18:22:30', 1, 7),
(58, 'Restauraciones ', '2017-04-24 18:24:20', 1, 13),
(59, 'Parqueos ', '2017-04-25 12:23:52', 1, 13),
(60, 'Ferretería ', '2017-04-26 20:00:59', 1, 7),
(61, 'Flores ', '2017-04-26 20:31:41', 1, 7),
(62, 'mierda', '2018-05-12 20:40:22', 1, 14),
(69, 'ab', '2018-05-12 20:52:13', 0, 18),
(70, 'ac', '2018-05-12 20:52:13', 0, 18),
(71, 'ag', '2018-05-12 20:52:13', 0, 18),
(72, 'ab', '2018-05-12 20:57:07', 0, 18),
(73, 'ab', '2018-05-12 20:57:07', 0, 18),
(74, 'A', '2018-05-12 20:58:18', 1, 19),
(75, 'B', '2018-05-12 20:58:18', 1, 19),
(76, 'C', '2018-05-12 20:58:18', 1, 19),
(77, 'D', '2018-05-12 20:58:28', 1, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_monturas`
--

CREATE TABLE `tipos_de_monturas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_de_monturas`
--

INSERT INTO `tipos_de_monturas` (`id`, `descripcion`, `estatus`) VALUES
(1, 'marco completo', 1),
(2, 'semi al aire', 1),
(3, 'al aire', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_pagos`
--

CREATE TABLE `tipos_de_pagos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `descripcion_general` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_de_pagos`
--

INSERT INTO `tipos_de_pagos` (`id`, `descripcion`, `descripcion_general`, `estatus`, `fecha_creacion`) VALUES
(1, 'Base', 'Inventario base de la optica', 2, '2018-05-09'),
(2, 'pago por abonado', 'aplica solo para abonos en dos partes', 1, '2018-05-09'),
(3, 'Pago Por Tarjeta', 'Aplica para todos los pagos con tarjetas de creditos o debito', 1, '2018-05-09'),
(4, 'prueba', 'test ronny', 2, '2018-05-12'),
(5, 'Oooppp', 'Hghhh', 1, '2018-05-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_tarjetas`
--

CREATE TABLE `tipos_de_tarjetas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descripcion_general` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_de_tarjetas`
--

INSERT INTO `tipos_de_tarjetas` (`id`, `descripcion`, `descripcion_general`, `estatus`, `fecha_creacion`) VALUES
(2, 'visa', '', 1, '2018-05-09'),
(3, 'Mastercard', 'Prueba', 1, '2018-05-09'),
(4, 'Mastercard 2', 'Prueba', 1, '2018-05-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_de_vitrinas`
--

CREATE TABLE `tipos_de_vitrinas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `descripcion_general` varchar(100) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_de_vitrinas`
--

INSERT INTO `tipos_de_vitrinas` (`id`, `descripcion`, `descripcion_general`, `estatus`, `fecha_creacion`) VALUES
(1, '1', '', 1, '0000-00-00'),
(2, '2', '', 1, '0000-00-00'),
(3, '3', '', 1, '0000-00-00'),
(4, '4', '', 1, '0000-00-00'),
(5, 'a', '', 1, '0000-00-00'),
(6, 'b', '', 1, '0000-00-00'),
(7, 'c', '', 1, '0000-00-00'),
(8, 'niños', '', 1, '0000-00-00'),
(9, 'solares', '', 1, '0000-00-00'),
(10, 'prueba', 'Prueba test', 1, '2018-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_luna`
--

CREATE TABLE `tipo_de_luna` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_de_luna`
--

INSERT INTO `tipo_de_luna` (`id`, `descripcion`, `estatus`) VALUES
(1, 'monofocal', 1),
(2, 'bifocal', 1),
(3, 'multifocal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento_luna`
--

CREATE TABLE `tratamiento_luna` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamiento_luna`
--

INSERT INTO `tratamiento_luna` (`id`, `descripcion`, `estatus`) VALUES
(1, 'antireflejo', 1),
(2, 'protección UV', 1),
(3, 'fotocromaticos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `identificacion` varchar(11) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `telefono_movil` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `identificacion`, `clave`, `telefono_movil`, `estatus`, `fecha_creacion`) VALUES
(1, 'Ronny Jose', 'Simosa Montoya', '000109812', '827ccb0eea8a706c4c34a16891f84e7b', 993350031, 1, '2018-05-13'),
(2, 'Emily', 'Mercado', '113306903', '907fc10f1338514846ef98a4e284c8e8', 926938522, 1, '2018-05-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` varchar(11) DEFAULT NULL,
  `id_montura` int(11) DEFAULT NULL,
  `id_material_montura` int(11) DEFAULT NULL,
  `codigo_montura` int(11) DEFAULT NULL,
  `color_montura` varchar(100) DEFAULT NULL,
  `id_vitrina` int(11) DEFAULT NULL,
  `medida_OD` varchar(10) DEFAULT NULL,
  `medida_OI` varchar(10) DEFAULT NULL,
  `medida_ADD` varchar(10) DEFAULT NULL,
  `descripcion_montura` text,
  `id_luna` int(11) DEFAULT NULL,
  `id_material_luna` int(11) DEFAULT NULL,
  `id_tratamiento_luna` int(11) DEFAULT NULL,
  `descripcion_luna` text,
  `id_tipo_pago` int(11) DEFAULT NULL,
  `id_tipo_tarjeta` int(11) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL,
  `numero_orden` varchar(20) DEFAULT NULL,
  `numero_boleta` varchar(20) DEFAULT NULL,
  `numero_factura` varchar(20) DEFAULT NULL,
  `monto_a_pagar` varchar(20) DEFAULT NULL,
  `monto_total` varchar(20) DEFAULT NULL,
  `fecha_de_venta` date DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `id_montura`, `id_material_montura`, `codigo_montura`, `color_montura`, `id_vitrina`, `medida_OD`, `medida_OI`, `medida_ADD`, `descripcion_montura`, `id_luna`, `id_material_luna`, `id_tratamiento_luna`, `descripcion_luna`, `id_tipo_pago`, `id_tipo_tarjeta`, `id_vendedor`, `numero_orden`, `numero_boleta`, `numero_factura`, `monto_a_pagar`, `monto_total`, `fecha_de_venta`, `estatus`) VALUES
(4, '204842433', 3, 1, 0, '', 7, '', '', '', '', 2, 2, 3, '', 5, NULL, 1, '777', '999', '777', NULL, '777', NULL, 1),
(5, '2058005822', 3, 2, 88888888, 'azul', 2, '0.50', '0.25', '0.25', 'prueba test', 2, 3, 3, 'test prueba', 1, NULL, 1, '99999999', '00000098', '00098764', NULL, '220', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `estatus_global`
--
ALTER TABLE `estatus_global`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gasto_operacional`
--
ALTER TABLE `gasto_operacional`
  ADD PRIMARY KEY (`id_gast_oper`),
  ADD UNIQUE KEY `nrecibo` (`nrecibo`);

--
-- Indices de la tabla `informacion_servicio`
--
ALTER TABLE `informacion_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listado_de_vendedor`
--
ALTER TABLE `listado_de_vendedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales_luna`
--
ALTER TABLE `materiales_luna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materiales_monturas`
--
ALTER TABLE `materiales_monturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_report`);

--
-- Indices de la tabla `td_categ_operac`
--
ALTER TABLE `td_categ_operac`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indices de la tabla `td_servicio`
--
ALTER TABLE `td_servicio`
  ADD PRIMARY KEY (`id_serv`);

--
-- Indices de la tabla `td_serv_operac`
--
ALTER TABLE `td_serv_operac`
  ADD PRIMARY KEY (`id_serv_operac`);

--
-- Indices de la tabla `tipos_de_monturas`
--
ALTER TABLE `tipos_de_monturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_de_pagos`
--
ALTER TABLE `tipos_de_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_de_tarjetas`
--
ALTER TABLE `tipos_de_tarjetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_de_vitrinas`
--
ALTER TABLE `tipos_de_vitrinas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_de_luna`
--
ALTER TABLE `tipo_de_luna`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamiento_luna`
--
ALTER TABLE `tratamiento_luna`
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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estatus_global`
--
ALTER TABLE `estatus_global`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `gasto_operacional`
--
ALTER TABLE `gasto_operacional`
  MODIFY `id_gast_oper` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de gasto operacional', AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT de la tabla `informacion_servicio`
--
ALTER TABLE `informacion_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `listado_de_vendedor`
--
ALTER TABLE `listado_de_vendedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `materiales_luna`
--
ALTER TABLE `materiales_luna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `materiales_monturas`
--
ALTER TABLE `materiales_monturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `td_categ_operac`
--
ALTER TABLE `td_categ_operac`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la categoría operacional', AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `td_servicio`
--
ALTER TABLE `td_servicio`
  MODIFY `id_serv` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Servicio o Plan', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `td_serv_operac`
--
ALTER TABLE `td_serv_operac`
  MODIFY `id_serv_operac` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del servicio operacional', AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `tipos_de_monturas`
--
ALTER TABLE `tipos_de_monturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos_de_pagos`
--
ALTER TABLE `tipos_de_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipos_de_tarjetas`
--
ALTER TABLE `tipos_de_tarjetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos_de_vitrinas`
--
ALTER TABLE `tipos_de_vitrinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tipo_de_luna`
--
ALTER TABLE `tipo_de_luna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tratamiento_luna`
--
ALTER TABLE `tratamiento_luna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
