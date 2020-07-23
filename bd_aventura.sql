-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2020 a las 00:26:51
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_aventura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_clientes`
--

CREATE TABLE `bd_clientes` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_clientes`
--

INSERT INTO `bd_clientes` (`id`, `tipo_documento`, `identificacion`, `nombre`, `apellido`, `email`, `codigo_area`, `telefono`, `status`, `fecha_registro`) VALUES
(1, 'DNI', '41043661', 'María', 'Iparraguirre', 'iparraguirreroman@hotmail.com', '51', '943 636 523', 1, '2020-03-04 10:43:43'),
(2, 'DNI', '001881738', 'ronny jose', 'simosa montoya', 'rjsimosa@gmail.com', '51', '993 350 031', 1, '2020-03-09 19:43:31'),
(3, 'C.E', '01881738', 'ronny jose', 'simosa montoya', 'rjsimosa@gmail.com', '51', '993350031', 1, '2020-03-14 12:05:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_cupon`
--

CREATE TABLE `bd_cupon` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `id_sigla` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `cupon_validar` text COLLATE utf16_spanish_ci NOT NULL,
  `descuento` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_cupon`
--

INSERT INTO `bd_cupon` (`id`, `descripcion`, `id_sigla`, `cupon_validar`, `descuento`, `fecha_inicio`, `fecha_fin`, `status`, `fecha_registro`) VALUES
(1, 'cupon solo aplicable para la primera compra de cada usuario', '1', 'AVE-0001', '10', '2020-03-09', '2020-03-31', 1, '2020-03-09 16:10:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_departamentos`
--

CREATE TABLE `bd_departamentos` (
  `id` char(6) COLLATE utf16_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(50) COLLATE utf16_spanish_ci NOT NULL DEFAULT '',
  `fecha_registro` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_departamentos`
--

INSERT INTO `bd_departamentos` (`id`, `nombre`, `fecha_registro`, `status`) VALUES
('010000', 'Amazonas', NULL, 1),
('020000', 'Áncash', NULL, 1),
('030000', 'Apurímac', NULL, 1),
('040000', 'Arequipa', NULL, 1),
('050000', 'Ayacucho', NULL, 1),
('060000', 'Cajamarca', NULL, 1),
('070000', 'Callao', NULL, 1),
('080000', 'Cusco', NULL, 1),
('090000', 'Huancavelica', NULL, 1),
('100000', 'Huánuco', NULL, 1),
('110000', 'Ica', NULL, 1),
('120000', 'Junín', NULL, 1),
('130000', 'La Libertad', NULL, 1),
('140000', 'Lambayeque', NULL, 1),
('150000', 'Lima', NULL, 1),
('160000', 'Loreto', NULL, 1),
('170000', 'Madre de Dios', NULL, 1),
('180000', 'Moquegua', NULL, 1),
('190000', 'Pasco', NULL, 1),
('200000', 'Piura', NULL, 1),
('210000', 'Puno', NULL, 1),
('220000', 'San Martín', NULL, 1),
('230000', 'Tacna', NULL, 1),
('240000', 'Tumbes', NULL, 1),
('250000', 'Ucayali', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_distrito`
--

CREATE TABLE `bd_distrito` (
  `id` char(6) COLLATE utf16_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `id_provincia` char(6) CHARACTER SET utf8 DEFAULT NULL,
  `id_departamento` char(6) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_distrito`
--

INSERT INTO `bd_distrito` (`id`, `nombre`, `id_provincia`, `id_departamento`, `status`, `fecha_registro`) VALUES
('010101', 'Chachapoyas', '010100', '010000', 1, NULL),
('010102', 'Asunción', '010100', '010000', 1, NULL),
('010103', 'Balsas', '010100', '010000', 1, NULL),
('010104', 'Cheto', '010100', '010000', 1, NULL),
('010105', 'Chiliquin', '010100', '010000', 1, NULL),
('010106', 'Chuquibamba', '010100', '010000', 1, NULL),
('010107', 'Granada', '010100', '010000', 1, NULL),
('010108', 'Huancas', '010100', '010000', 1, NULL),
('010109', 'La Jalca', '010100', '010000', 1, NULL),
('010110', 'Leimebamba', '010100', '010000', 1, NULL),
('010111', 'Levanto', '010100', '010000', 1, NULL),
('010112', 'Magdalena', '010100', '010000', 1, NULL),
('010113', 'Mariscal Castilla', '010100', '010000', 1, NULL),
('010114', 'Molinopampa', '010100', '010000', 1, NULL),
('010115', 'Montevideo', '010100', '010000', 1, NULL),
('010116', 'Olleros', '010100', '010000', 1, NULL),
('010117', 'Quinjalca', '010100', '010000', 1, NULL),
('010118', 'San Francisco de Daguas', '010100', '010000', 1, NULL),
('010119', 'San Isidro de Maino', '010100', '010000', 1, NULL),
('010120', 'Soloco', '010100', '010000', 1, NULL),
('010121', 'Sonche', '010100', '010000', 1, NULL),
('010201', 'Bagua', '010200', '010000', 1, NULL),
('010202', 'Aramango', '010200', '010000', 1, NULL),
('010203', 'Copallin', '010200', '010000', 1, NULL),
('010204', 'El Parco', '010200', '010000', 1, NULL),
('010205', 'Imaza', '010200', '010000', 1, NULL),
('010206', 'La Peca', '010200', '010000', 1, NULL),
('010301', 'Jumbilla', '010300', '010000', 1, NULL),
('010302', 'Chisquilla', '010300', '010000', 1, NULL),
('010303', 'Churuja', '010300', '010000', 1, NULL),
('010304', 'Corosha', '010300', '010000', 1, NULL),
('010305', 'Cuispes', '010300', '010000', 1, NULL),
('010306', 'Florida', '010300', '010000', 1, NULL),
('010307', 'Jazan', '010300', '010000', 1, NULL),
('010308', 'Recta', '010300', '010000', 1, NULL),
('010309', 'San Carlos', '010300', '010000', 1, NULL),
('010310', 'Shipasbamba', '010300', '010000', 1, NULL),
('010311', 'Valera', '010300', '010000', 1, NULL),
('010312', 'Yambrasbamba', '010300', '010000', 1, NULL),
('010401', 'Nieva', '010400', '010000', 1, NULL),
('010402', 'El Cenepa', '010400', '010000', 1, NULL),
('010403', 'Río Santiago', '010400', '010000', 1, NULL),
('010501', 'Lamud', '010500', '010000', 1, NULL),
('010502', 'Camporredondo', '010500', '010000', 1, NULL),
('010503', 'Cocabamba', '010500', '010000', 1, NULL),
('010504', 'Colcamar', '010500', '010000', 1, NULL),
('010505', 'Conila', '010500', '010000', 1, NULL),
('010506', 'Inguilpata', '010500', '010000', 1, NULL),
('010507', 'Longuita', '010500', '010000', 1, NULL),
('010508', 'Lonya Chico', '010500', '010000', 1, NULL),
('010509', 'Luya', '010500', '010000', 1, NULL),
('010510', 'Luya Viejo', '010500', '010000', 1, NULL),
('010511', 'María', '010500', '010000', 1, NULL),
('010512', 'Ocalli', '010500', '010000', 1, NULL),
('010513', 'Ocumal', '010500', '010000', 1, NULL),
('010514', 'Pisuquia', '010500', '010000', 1, NULL),
('010515', 'Providencia', '010500', '010000', 1, NULL),
('010516', 'San Cristóbal', '010500', '010000', 1, NULL),
('010517', 'San Francisco de Yeso', '010500', '010000', 1, NULL),
('010518', 'San Jerónimo', '010500', '010000', 1, NULL),
('010519', 'San Juan de Lopecancha', '010500', '010000', 1, NULL),
('010520', 'Santa Catalina', '010500', '010000', 1, NULL),
('010521', 'Santo Tomas', '010500', '010000', 1, NULL),
('010522', 'Tingo', '010500', '010000', 1, NULL),
('010523', 'Trita', '010500', '010000', 1, NULL),
('010601', 'San Nicolás', '010600', '010000', 1, NULL),
('010602', 'Chirimoto', '010600', '010000', 1, NULL),
('010603', 'Cochamal', '010600', '010000', 1, NULL),
('010604', 'Huambo', '010600', '010000', 1, NULL),
('010605', 'Limabamba', '010600', '010000', 1, NULL),
('010606', 'Longar', '010600', '010000', 1, NULL),
('010607', 'Mariscal Benavides', '010600', '010000', 1, NULL),
('010608', 'Milpuc', '010600', '010000', 1, NULL),
('010609', 'Omia', '010600', '010000', 1, NULL),
('010610', 'Santa Rosa', '010600', '010000', 1, NULL),
('010611', 'Totora', '010600', '010000', 1, NULL),
('010612', 'Vista Alegre', '010600', '010000', 1, NULL),
('010701', 'Bagua Grande', '010700', '010000', 1, NULL),
('010702', 'Cajaruro', '010700', '010000', 1, NULL),
('010703', 'Cumba', '010700', '010000', 1, NULL),
('010704', 'El Milagro', '010700', '010000', 1, NULL),
('010705', 'Jamalca', '010700', '010000', 1, NULL),
('010706', 'Lonya Grande', '010700', '010000', 1, NULL),
('010707', 'Yamon', '010700', '010000', 1, NULL),
('020101', 'Huaraz', '020100', '020000', 1, NULL),
('020102', 'Cochabamba', '020100', '020000', 1, NULL),
('020103', 'Colcabamba', '020100', '020000', 1, NULL),
('020104', 'Huanchay', '020100', '020000', 1, NULL),
('020105', 'Independencia', '020100', '020000', 1, NULL),
('020106', 'Jangas', '020100', '020000', 1, NULL),
('020107', 'La Libertad', '020100', '020000', 1, NULL),
('020108', 'Olleros', '020100', '020000', 1, NULL),
('020109', 'Pampas Grande', '020100', '020000', 1, NULL),
('020110', 'Pariacoto', '020100', '020000', 1, NULL),
('020111', 'Pira', '020100', '020000', 1, NULL),
('020112', 'Tarica', '020100', '020000', 1, NULL),
('020201', 'Aija', '020200', '020000', 1, NULL),
('020202', 'Coris', '020200', '020000', 1, NULL),
('020203', 'Huacllan', '020200', '020000', 1, NULL),
('020204', 'La Merced', '020200', '020000', 1, NULL),
('020205', 'Succha', '020200', '020000', 1, NULL),
('020301', 'Llamellin', '020300', '020000', 1, NULL),
('020302', 'Aczo', '020300', '020000', 1, NULL),
('020303', 'Chaccho', '020300', '020000', 1, NULL),
('020304', 'Chingas', '020300', '020000', 1, NULL),
('020305', 'Mirgas', '020300', '020000', 1, NULL),
('020306', 'San Juan de Rontoy', '020300', '020000', 1, NULL),
('020401', 'Chacas', '020400', '020000', 1, NULL),
('020402', 'Acochaca', '020400', '020000', 1, NULL),
('020501', 'Chiquian', '020500', '020000', 1, NULL),
('020502', 'Abelardo Pardo Lezameta', '020500', '020000', 1, NULL),
('020503', 'Antonio Raymondi', '020500', '020000', 1, NULL),
('020504', 'Aquia', '020500', '020000', 1, NULL),
('020505', 'Cajacay', '020500', '020000', 1, NULL),
('020506', 'Canis', '020500', '020000', 1, NULL),
('020507', 'Colquioc', '020500', '020000', 1, NULL),
('020508', 'Huallanca', '020500', '020000', 1, NULL),
('020509', 'Huasta', '020500', '020000', 1, NULL),
('020510', 'Huayllacayan', '020500', '020000', 1, NULL),
('020511', 'La Primavera', '020500', '020000', 1, NULL),
('020512', 'Mangas', '020500', '020000', 1, NULL),
('020513', 'Pacllon', '020500', '020000', 1, NULL),
('020514', 'San Miguel de Corpanqui', '020500', '020000', 1, NULL),
('020515', 'Ticllos', '020500', '020000', 1, NULL),
('020601', 'Carhuaz', '020600', '020000', 1, NULL),
('020602', 'Acopampa', '020600', '020000', 1, NULL),
('020603', 'Amashca', '020600', '020000', 1, NULL),
('020604', 'Anta', '020600', '020000', 1, NULL),
('020605', 'Ataquero', '020600', '020000', 1, NULL),
('020606', 'Marcara', '020600', '020000', 1, NULL),
('020607', 'Pariahuanca', '020600', '020000', 1, NULL),
('020608', 'San Miguel de Aco', '020600', '020000', 1, NULL),
('020609', 'Shilla', '020600', '020000', 1, NULL),
('020610', 'Tinco', '020600', '020000', 1, NULL),
('020611', 'Yungar', '020600', '020000', 1, NULL),
('020701', 'San Luis', '020700', '020000', 1, NULL),
('020702', 'San Nicolás', '020700', '020000', 1, NULL),
('020703', 'Yauya', '020700', '020000', 1, NULL),
('020801', 'Casma', '020800', '020000', 1, NULL),
('020802', 'Buena Vista Alta', '020800', '020000', 1, NULL),
('020803', 'Comandante Noel', '020800', '020000', 1, NULL),
('020804', 'Yautan', '020800', '020000', 1, NULL),
('020901', 'Corongo', '020900', '020000', 1, NULL),
('020902', 'Aco', '020900', '020000', 1, NULL),
('020903', 'Bambas', '020900', '020000', 1, NULL),
('020904', 'Cusca', '020900', '020000', 1, NULL),
('020905', 'La Pampa', '020900', '020000', 1, NULL),
('020906', 'Yanac', '020900', '020000', 1, NULL),
('020907', 'Yupan', '020900', '020000', 1, NULL),
('021001', 'Huari', '021000', '020000', 1, NULL),
('021002', 'Anra', '021000', '020000', 1, NULL),
('021003', 'Cajay', '021000', '020000', 1, NULL),
('021004', 'Chavin de Huantar', '021000', '020000', 1, NULL),
('021005', 'Huacachi', '021000', '020000', 1, NULL),
('021006', 'Huacchis', '021000', '020000', 1, NULL),
('021007', 'Huachis', '021000', '020000', 1, NULL),
('021008', 'Huantar', '021000', '020000', 1, NULL),
('021009', 'Masin', '021000', '020000', 1, NULL),
('021010', 'Paucas', '021000', '020000', 1, NULL),
('021011', 'Ponto', '021000', '020000', 1, NULL),
('021012', 'Rahuapampa', '021000', '020000', 1, NULL),
('021013', 'Rapayan', '021000', '020000', 1, NULL),
('021014', 'San Marcos', '021000', '020000', 1, NULL),
('021015', 'San Pedro de Chana', '021000', '020000', 1, NULL),
('021016', 'Uco', '021000', '020000', 1, NULL),
('021101', 'Huarmey', '021100', '020000', 1, NULL),
('021102', 'Cochapeti', '021100', '020000', 1, NULL),
('021103', 'Culebras', '021100', '020000', 1, NULL),
('021104', 'Huayan', '021100', '020000', 1, NULL),
('021105', 'Malvas', '021100', '020000', 1, NULL),
('021201', 'Caraz', '021200', '020000', 1, NULL),
('021202', 'Huallanca', '021200', '020000', 1, NULL),
('021203', 'Huata', '021200', '020000', 1, NULL),
('021204', 'Huaylas', '021200', '020000', 1, NULL),
('021205', 'Mato', '021200', '020000', 1, NULL),
('021206', 'Pamparomas', '021200', '020000', 1, NULL),
('021207', 'Pueblo Libre', '021200', '020000', 1, NULL),
('021208', 'Santa Cruz', '021200', '020000', 1, NULL),
('021209', 'Santo Toribio', '021200', '020000', 1, NULL),
('021210', 'Yuracmarca', '021200', '020000', 1, NULL),
('021301', 'Piscobamba', '021300', '020000', 1, NULL),
('021302', 'Casca', '021300', '020000', 1, NULL),
('021303', 'Eleazar Guzmán Barron', '021300', '020000', 1, NULL),
('021304', 'Fidel Olivas Escudero', '021300', '020000', 1, NULL),
('021305', 'Llama', '021300', '020000', 1, NULL),
('021306', 'Llumpa', '021300', '020000', 1, NULL),
('021307', 'Lucma', '021300', '020000', 1, NULL),
('021308', 'Musga', '021300', '020000', 1, NULL),
('021401', 'Ocros', '021400', '020000', 1, NULL),
('021402', 'Acas', '021400', '020000', 1, NULL),
('021403', 'Cajamarquilla', '021400', '020000', 1, NULL),
('021404', 'Carhuapampa', '021400', '020000', 1, NULL),
('021405', 'Cochas', '021400', '020000', 1, NULL),
('021406', 'Congas', '021400', '020000', 1, NULL),
('021407', 'Llipa', '021400', '020000', 1, NULL),
('021408', 'San Cristóbal de Rajan', '021400', '020000', 1, NULL),
('021409', 'San Pedro', '021400', '020000', 1, NULL),
('021410', 'Santiago de Chilcas', '021400', '020000', 1, NULL),
('021501', 'Cabana', '021500', '020000', 1, NULL),
('021502', 'Bolognesi', '021500', '020000', 1, NULL),
('021503', 'Conchucos', '021500', '020000', 1, NULL),
('021504', 'Huacaschuque', '021500', '020000', 1, NULL),
('021505', 'Huandoval', '021500', '020000', 1, NULL),
('021506', 'Lacabamba', '021500', '020000', 1, NULL),
('021507', 'Llapo', '021500', '020000', 1, NULL),
('021508', 'Pallasca', '021500', '020000', 1, NULL),
('021509', 'Pampas', '021500', '020000', 1, NULL),
('021510', 'Santa Rosa', '021500', '020000', 1, NULL),
('021511', 'Tauca', '021500', '020000', 1, NULL),
('021601', 'Pomabamba', '021600', '020000', 1, NULL),
('021602', 'Huayllan', '021600', '020000', 1, NULL),
('021603', 'Parobamba', '021600', '020000', 1, NULL),
('021604', 'Quinuabamba', '021600', '020000', 1, NULL),
('021701', 'Recuay', '021700', '020000', 1, NULL),
('021702', 'Catac', '021700', '020000', 1, NULL),
('021703', 'Cotaparaco', '021700', '020000', 1, NULL),
('021704', 'Huayllapampa', '021700', '020000', 1, NULL),
('021705', 'Llacllin', '021700', '020000', 1, NULL),
('021706', 'Marca', '021700', '020000', 1, NULL),
('021707', 'Pampas Chico', '021700', '020000', 1, NULL),
('021708', 'Pararin', '021700', '020000', 1, NULL),
('021709', 'Tapacocha', '021700', '020000', 1, NULL),
('021710', 'Ticapampa', '021700', '020000', 1, NULL),
('021801', 'Chimbote', '021800', '020000', 1, NULL),
('021802', 'Cáceres del Perú', '021800', '020000', 1, NULL),
('021803', 'Coishco', '021800', '020000', 1, NULL),
('021804', 'Macate', '021800', '020000', 1, NULL),
('021805', 'Moro', '021800', '020000', 1, NULL),
('021806', 'Nepeña', '021800', '020000', 1, NULL),
('021807', 'Samanco', '021800', '020000', 1, NULL),
('021808', 'Santa', '021800', '020000', 1, NULL),
('021809', 'Nuevo Chimbote', '021800', '020000', 1, NULL),
('021901', 'Sihuas', '021900', '020000', 1, NULL),
('021902', 'Acobamba', '021900', '020000', 1, NULL),
('021903', 'Alfonso Ugarte', '021900', '020000', 1, NULL),
('021904', 'Cashapampa', '021900', '020000', 1, NULL),
('021905', 'Chingalpo', '021900', '020000', 1, NULL),
('021906', 'Huayllabamba', '021900', '020000', 1, NULL),
('021907', 'Quiches', '021900', '020000', 1, NULL),
('021908', 'Ragash', '021900', '020000', 1, NULL),
('021909', 'San Juan', '021900', '020000', 1, NULL),
('021910', 'Sicsibamba', '021900', '020000', 1, NULL),
('022001', 'Yungay', '022000', '020000', 1, NULL),
('022002', 'Cascapara', '022000', '020000', 1, NULL),
('022003', 'Mancos', '022000', '020000', 1, NULL),
('022004', 'Matacoto', '022000', '020000', 1, NULL),
('022005', 'Quillo', '022000', '020000', 1, NULL),
('022006', 'Ranrahirca', '022000', '020000', 1, NULL),
('022007', 'Shupluy', '022000', '020000', 1, NULL),
('022008', 'Yanama', '022000', '020000', 1, NULL),
('030101', 'Abancay', '030100', '030000', 1, NULL),
('030102', 'Chacoche', '030100', '030000', 1, NULL),
('030103', 'Circa', '030100', '030000', 1, NULL),
('030104', 'Curahuasi', '030100', '030000', 1, NULL),
('030105', 'Huanipaca', '030100', '030000', 1, NULL),
('030106', 'Lambrama', '030100', '030000', 1, NULL),
('030107', 'Pichirhua', '030100', '030000', 1, NULL),
('030108', 'San Pedro de Cachora', '030100', '030000', 1, NULL),
('030109', 'Tamburco', '030100', '030000', 1, NULL),
('030201', 'Andahuaylas', '030200', '030000', 1, NULL),
('030202', 'Andarapa', '030200', '030000', 1, NULL),
('030203', 'Chiara', '030200', '030000', 1, NULL),
('030204', 'Huancarama', '030200', '030000', 1, NULL),
('030205', 'Huancaray', '030200', '030000', 1, NULL),
('030206', 'Huayana', '030200', '030000', 1, NULL),
('030207', 'Kishuara', '030200', '030000', 1, NULL),
('030208', 'Pacobamba', '030200', '030000', 1, NULL),
('030209', 'Pacucha', '030200', '030000', 1, NULL),
('030210', 'Pampachiri', '030200', '030000', 1, NULL),
('030211', 'Pomacocha', '030200', '030000', 1, NULL),
('030212', 'San Antonio de Cachi', '030200', '030000', 1, NULL),
('030213', 'San Jerónimo', '030200', '030000', 1, NULL),
('030214', 'San Miguel de Chaccrampa', '030200', '030000', 1, NULL),
('030215', 'Santa María de Chicmo', '030200', '030000', 1, NULL),
('030216', 'Talavera', '030200', '030000', 1, NULL),
('030217', 'Tumay Huaraca', '030200', '030000', 1, NULL),
('030218', 'Turpo', '030200', '030000', 1, NULL),
('030219', 'Kaquiabamba', '030200', '030000', 1, NULL),
('030220', 'José María Arguedas', '030200', '030000', 1, NULL),
('030301', 'Antabamba', '030300', '030000', 1, NULL),
('030302', 'El Oro', '030300', '030000', 1, NULL),
('030303', 'Huaquirca', '030300', '030000', 1, NULL),
('030304', 'Juan Espinoza Medrano', '030300', '030000', 1, NULL),
('030305', 'Oropesa', '030300', '030000', 1, NULL),
('030306', 'Pachaconas', '030300', '030000', 1, NULL),
('030307', 'Sabaino', '030300', '030000', 1, NULL),
('030401', 'Chalhuanca', '030400', '030000', 1, NULL),
('030402', 'Capaya', '030400', '030000', 1, NULL),
('030403', 'Caraybamba', '030400', '030000', 1, NULL),
('030404', 'Chapimarca', '030400', '030000', 1, NULL),
('030405', 'Colcabamba', '030400', '030000', 1, NULL),
('030406', 'Cotaruse', '030400', '030000', 1, NULL),
('030407', 'Ihuayllo', '030400', '030000', 1, NULL),
('030408', 'Justo Apu Sahuaraura', '030400', '030000', 1, NULL),
('030409', 'Lucre', '030400', '030000', 1, NULL),
('030410', 'Pocohuanca', '030400', '030000', 1, NULL),
('030411', 'San Juan de Chacña', '030400', '030000', 1, NULL),
('030412', 'Sañayca', '030400', '030000', 1, NULL),
('030413', 'Soraya', '030400', '030000', 1, NULL),
('030414', 'Tapairihua', '030400', '030000', 1, NULL),
('030415', 'Tintay', '030400', '030000', 1, NULL),
('030416', 'Toraya', '030400', '030000', 1, NULL),
('030417', 'Yanaca', '030400', '030000', 1, NULL),
('030501', 'Tambobamba', '030500', '030000', 1, NULL),
('030502', 'Cotabambas', '030500', '030000', 1, NULL),
('030503', 'Coyllurqui', '030500', '030000', 1, NULL),
('030504', 'Haquira', '030500', '030000', 1, NULL),
('030505', 'Mara', '030500', '030000', 1, NULL),
('030506', 'Challhuahuacho', '030500', '030000', 1, NULL),
('030601', 'Chincheros', '030600', '030000', 1, NULL),
('030602', 'Anco_Huallo', '030600', '030000', 1, NULL),
('030603', 'Cocharcas', '030600', '030000', 1, NULL),
('030604', 'Huaccana', '030600', '030000', 1, NULL),
('030605', 'Ocobamba', '030600', '030000', 1, NULL),
('030606', 'Ongoy', '030600', '030000', 1, NULL),
('030607', 'Uranmarca', '030600', '030000', 1, NULL),
('030608', 'Ranracancha', '030600', '030000', 1, NULL),
('030609', 'Rocchacc', '030600', '030000', 1, NULL),
('030610', 'El Porvenir', '030600', '030000', 1, NULL),
('030611', 'Los Chankas', '030600', '030000', 1, NULL),
('030701', 'Chuquibambilla', '030700', '030000', 1, NULL),
('030702', 'Curpahuasi', '030700', '030000', 1, NULL),
('030703', 'Gamarra', '030700', '030000', 1, NULL),
('030704', 'Huayllati', '030700', '030000', 1, NULL),
('030705', 'Mamara', '030700', '030000', 1, NULL),
('030706', 'Micaela Bastidas', '030700', '030000', 1, NULL),
('030707', 'Pataypampa', '030700', '030000', 1, NULL),
('030708', 'Progreso', '030700', '030000', 1, NULL),
('030709', 'San Antonio', '030700', '030000', 1, NULL),
('030710', 'Santa Rosa', '030700', '030000', 1, NULL),
('030711', 'Turpay', '030700', '030000', 1, NULL),
('030712', 'Vilcabamba', '030700', '030000', 1, NULL),
('030713', 'Virundo', '030700', '030000', 1, NULL),
('030714', 'Curasco', '030700', '030000', 1, NULL),
('040101', 'Arequipa', '040100', '040000', 1, NULL),
('040102', 'Alto Selva Alegre', '040100', '040000', 1, NULL),
('040103', 'Cayma', '040100', '040000', 1, NULL),
('040104', 'Cerro Colorado', '040100', '040000', 1, NULL),
('040105', 'Characato', '040100', '040000', 1, NULL),
('040106', 'Chiguata', '040100', '040000', 1, NULL),
('040107', 'Jacobo Hunter', '040100', '040000', 1, NULL),
('040108', 'La Joya', '040100', '040000', 1, NULL),
('040109', 'Mariano Melgar', '040100', '040000', 1, NULL),
('040110', 'Miraflores', '040100', '040000', 1, NULL),
('040111', 'Mollebaya', '040100', '040000', 1, NULL),
('040112', 'Paucarpata', '040100', '040000', 1, NULL),
('040113', 'Pocsi', '040100', '040000', 1, NULL),
('040114', 'Polobaya', '040100', '040000', 1, NULL),
('040115', 'Quequeña', '040100', '040000', 1, NULL),
('040116', 'Sabandia', '040100', '040000', 1, NULL),
('040117', 'Sachaca', '040100', '040000', 1, NULL),
('040118', 'San Juan de Siguas', '040100', '040000', 1, NULL),
('040119', 'San Juan de Tarucani', '040100', '040000', 1, NULL),
('040120', 'Santa Isabel de Siguas', '040100', '040000', 1, NULL),
('040121', 'Santa Rita de Siguas', '040100', '040000', 1, NULL),
('040122', 'Socabaya', '040100', '040000', 1, NULL),
('040123', 'Tiabaya', '040100', '040000', 1, NULL),
('040124', 'Uchumayo', '040100', '040000', 1, NULL),
('040125', 'Vitor', '040100', '040000', 1, NULL),
('040126', 'Yanahuara', '040100', '040000', 1, NULL),
('040127', 'Yarabamba', '040100', '040000', 1, NULL),
('040128', 'Yura', '040100', '040000', 1, NULL),
('040129', 'José Luis Bustamante Y Rivero', '040100', '040000', 1, NULL),
('040201', 'Camaná', '040200', '040000', 1, NULL),
('040202', 'José María Quimper', '040200', '040000', 1, NULL),
('040203', 'Mariano Nicolás Valcárcel', '040200', '040000', 1, NULL),
('040204', 'Mariscal Cáceres', '040200', '040000', 1, NULL),
('040205', 'Nicolás de Pierola', '040200', '040000', 1, NULL),
('040206', 'Ocoña', '040200', '040000', 1, NULL),
('040207', 'Quilca', '040200', '040000', 1, NULL),
('040208', 'Samuel Pastor', '040200', '040000', 1, NULL),
('040301', 'Caravelí', '040300', '040000', 1, NULL),
('040302', 'Acarí', '040300', '040000', 1, NULL),
('040303', 'Atico', '040300', '040000', 1, NULL),
('040304', 'Atiquipa', '040300', '040000', 1, NULL),
('040305', 'Bella Unión', '040300', '040000', 1, NULL),
('040306', 'Cahuacho', '040300', '040000', 1, NULL),
('040307', 'Chala', '040300', '040000', 1, NULL),
('040308', 'Chaparra', '040300', '040000', 1, NULL),
('040309', 'Huanuhuanu', '040300', '040000', 1, NULL),
('040310', 'Jaqui', '040300', '040000', 1, NULL),
('040311', 'Lomas', '040300', '040000', 1, NULL),
('040312', 'Quicacha', '040300', '040000', 1, NULL),
('040313', 'Yauca', '040300', '040000', 1, NULL),
('040401', 'Aplao', '040400', '040000', 1, NULL),
('040402', 'Andagua', '040400', '040000', 1, NULL),
('040403', 'Ayo', '040400', '040000', 1, NULL),
('040404', 'Chachas', '040400', '040000', 1, NULL),
('040405', 'Chilcaymarca', '040400', '040000', 1, NULL),
('040406', 'Choco', '040400', '040000', 1, NULL),
('040407', 'Huancarqui', '040400', '040000', 1, NULL),
('040408', 'Machaguay', '040400', '040000', 1, NULL),
('040409', 'Orcopampa', '040400', '040000', 1, NULL),
('040410', 'Pampacolca', '040400', '040000', 1, NULL),
('040411', 'Tipan', '040400', '040000', 1, NULL),
('040412', 'Uñon', '040400', '040000', 1, NULL),
('040413', 'Uraca', '040400', '040000', 1, NULL),
('040414', 'Viraco', '040400', '040000', 1, NULL),
('040501', 'Chivay', '040500', '040000', 1, NULL),
('040502', 'Achoma', '040500', '040000', 1, NULL),
('040503', 'Cabanaconde', '040500', '040000', 1, NULL),
('040504', 'Callalli', '040500', '040000', 1, NULL),
('040505', 'Caylloma', '040500', '040000', 1, NULL),
('040506', 'Coporaque', '040500', '040000', 1, NULL),
('040507', 'Huambo', '040500', '040000', 1, NULL),
('040508', 'Huanca', '040500', '040000', 1, NULL),
('040509', 'Ichupampa', '040500', '040000', 1, NULL),
('040510', 'Lari', '040500', '040000', 1, NULL),
('040511', 'Lluta', '040500', '040000', 1, NULL),
('040512', 'Maca', '040500', '040000', 1, NULL),
('040513', 'Madrigal', '040500', '040000', 1, NULL),
('040514', 'San Antonio de Chuca', '040500', '040000', 1, NULL),
('040515', 'Sibayo', '040500', '040000', 1, NULL),
('040516', 'Tapay', '040500', '040000', 1, NULL),
('040517', 'Tisco', '040500', '040000', 1, NULL),
('040518', 'Tuti', '040500', '040000', 1, NULL),
('040519', 'Yanque', '040500', '040000', 1, NULL),
('040520', 'Majes', '040500', '040000', 1, NULL),
('040601', 'Chuquibamba', '040600', '040000', 1, NULL),
('040602', 'Andaray', '040600', '040000', 1, NULL),
('040603', 'Cayarani', '040600', '040000', 1, NULL),
('040604', 'Chichas', '040600', '040000', 1, NULL),
('040605', 'Iray', '040600', '040000', 1, NULL),
('040606', 'Río Grande', '040600', '040000', 1, NULL),
('040607', 'Salamanca', '040600', '040000', 1, NULL),
('040608', 'Yanaquihua', '040600', '040000', 1, NULL),
('040701', 'Mollendo', '040700', '040000', 1, NULL),
('040702', 'Cocachacra', '040700', '040000', 1, NULL),
('040703', 'Dean Valdivia', '040700', '040000', 1, NULL),
('040704', 'Islay', '040700', '040000', 1, NULL),
('040705', 'Mejia', '040700', '040000', 1, NULL),
('040706', 'Punta de Bombón', '040700', '040000', 1, NULL),
('040801', 'Cotahuasi', '040800', '040000', 1, NULL),
('040802', 'Alca', '040800', '040000', 1, NULL),
('040803', 'Charcana', '040800', '040000', 1, NULL),
('040804', 'Huaynacotas', '040800', '040000', 1, NULL),
('040805', 'Pampamarca', '040800', '040000', 1, NULL),
('040806', 'Puyca', '040800', '040000', 1, NULL),
('040807', 'Quechualla', '040800', '040000', 1, NULL),
('040808', 'Sayla', '040800', '040000', 1, NULL),
('040809', 'Tauria', '040800', '040000', 1, NULL),
('040810', 'Tomepampa', '040800', '040000', 1, NULL),
('040811', 'Toro', '040800', '040000', 1, NULL),
('050101', 'Ayacucho', '050100', '050000', 1, NULL),
('050102', 'Acocro', '050100', '050000', 1, NULL),
('050103', 'Acos Vinchos', '050100', '050000', 1, NULL),
('050104', 'Carmen Alto', '050100', '050000', 1, NULL),
('050105', 'Chiara', '050100', '050000', 1, NULL),
('050106', 'Ocros', '050100', '050000', 1, NULL),
('050107', 'Pacaycasa', '050100', '050000', 1, NULL),
('050108', 'Quinua', '050100', '050000', 1, NULL),
('050109', 'San José de Ticllas', '050100', '050000', 1, NULL),
('050110', 'San Juan Bautista', '050100', '050000', 1, NULL),
('050111', 'Santiago de Pischa', '050100', '050000', 1, NULL),
('050112', 'Socos', '050100', '050000', 1, NULL),
('050113', 'Tambillo', '050100', '050000', 1, NULL),
('050114', 'Vinchos', '050100', '050000', 1, NULL),
('050115', 'Jesús Nazareno', '050100', '050000', 1, NULL),
('050116', 'Andrés Avelino Cáceres Dorregaray', '050100', '050000', 1, NULL),
('050201', 'Cangallo', '050200', '050000', 1, NULL),
('050202', 'Chuschi', '050200', '050000', 1, NULL),
('050203', 'Los Morochucos', '050200', '050000', 1, NULL),
('050204', 'María Parado de Bellido', '050200', '050000', 1, NULL),
('050205', 'Paras', '050200', '050000', 1, NULL),
('050206', 'Totos', '050200', '050000', 1, NULL),
('050301', 'Sancos', '050300', '050000', 1, NULL),
('050302', 'Carapo', '050300', '050000', 1, NULL),
('050303', 'Sacsamarca', '050300', '050000', 1, NULL),
('050304', 'Santiago de Lucanamarca', '050300', '050000', 1, NULL),
('050401', 'Huanta', '050400', '050000', 1, NULL),
('050402', 'Ayahuanco', '050400', '050000', 1, NULL),
('050403', 'Huamanguilla', '050400', '050000', 1, NULL),
('050404', 'Iguain', '050400', '050000', 1, NULL),
('050405', 'Luricocha', '050400', '050000', 1, NULL),
('050406', 'Santillana', '050400', '050000', 1, NULL),
('050407', 'Sivia', '050400', '050000', 1, NULL),
('050408', 'Llochegua', '050400', '050000', 1, NULL),
('050409', 'Canayre', '050400', '050000', 1, NULL),
('050410', 'Uchuraccay', '050400', '050000', 1, NULL),
('050411', 'Pucacolpa', '050400', '050000', 1, NULL),
('050412', 'Chaca', '050400', '050000', 1, NULL),
('050501', 'San Miguel', '050500', '050000', 1, NULL),
('050502', 'Anco', '050500', '050000', 1, NULL),
('050503', 'Ayna', '050500', '050000', 1, NULL),
('050504', 'Chilcas', '050500', '050000', 1, NULL),
('050505', 'Chungui', '050500', '050000', 1, NULL),
('050506', 'Luis Carranza', '050500', '050000', 1, NULL),
('050507', 'Santa Rosa', '050500', '050000', 1, NULL),
('050508', 'Tambo', '050500', '050000', 1, NULL),
('050509', 'Samugari', '050500', '050000', 1, NULL),
('050510', 'Anchihuay', '050500', '050000', 1, NULL),
('050511', 'Oronccoy', '050500', '050000', 1, NULL),
('050601', 'Puquio', '050600', '050000', 1, NULL),
('050602', 'Aucara', '050600', '050000', 1, NULL),
('050603', 'Cabana', '050600', '050000', 1, NULL),
('050604', 'Carmen Salcedo', '050600', '050000', 1, NULL),
('050605', 'Chaviña', '050600', '050000', 1, NULL),
('050606', 'Chipao', '050600', '050000', 1, NULL),
('050607', 'Huac-Huas', '050600', '050000', 1, NULL),
('050608', 'Laramate', '050600', '050000', 1, NULL),
('050609', 'Leoncio Prado', '050600', '050000', 1, NULL),
('050610', 'Llauta', '050600', '050000', 1, NULL),
('050611', 'Lucanas', '050600', '050000', 1, NULL),
('050612', 'Ocaña', '050600', '050000', 1, NULL),
('050613', 'Otoca', '050600', '050000', 1, NULL),
('050614', 'Saisa', '050600', '050000', 1, NULL),
('050615', 'San Cristóbal', '050600', '050000', 1, NULL),
('050616', 'San Juan', '050600', '050000', 1, NULL),
('050617', 'San Pedro', '050600', '050000', 1, NULL),
('050618', 'San Pedro de Palco', '050600', '050000', 1, NULL),
('050619', 'Sancos', '050600', '050000', 1, NULL),
('050620', 'Santa Ana de Huaycahuacho', '050600', '050000', 1, NULL),
('050621', 'Santa Lucia', '050600', '050000', 1, NULL),
('050701', 'Coracora', '050700', '050000', 1, NULL),
('050702', 'Chumpi', '050700', '050000', 1, NULL),
('050703', 'Coronel Castañeda', '050700', '050000', 1, NULL),
('050704', 'Pacapausa', '050700', '050000', 1, NULL),
('050705', 'Pullo', '050700', '050000', 1, NULL),
('050706', 'Puyusca', '050700', '050000', 1, NULL),
('050707', 'San Francisco de Ravacayco', '050700', '050000', 1, NULL),
('050708', 'Upahuacho', '050700', '050000', 1, NULL),
('050801', 'Pausa', '050800', '050000', 1, NULL),
('050802', 'Colta', '050800', '050000', 1, NULL),
('050803', 'Corculla', '050800', '050000', 1, NULL),
('050804', 'Lampa', '050800', '050000', 1, NULL),
('050805', 'Marcabamba', '050800', '050000', 1, NULL),
('050806', 'Oyolo', '050800', '050000', 1, NULL),
('050807', 'Pararca', '050800', '050000', 1, NULL),
('050808', 'San Javier de Alpabamba', '050800', '050000', 1, NULL),
('050809', 'San José de Ushua', '050800', '050000', 1, NULL),
('050810', 'Sara Sara', '050800', '050000', 1, NULL),
('050901', 'Querobamba', '050900', '050000', 1, NULL),
('050902', 'Belén', '050900', '050000', 1, NULL),
('050903', 'Chalcos', '050900', '050000', 1, NULL),
('050904', 'Chilcayoc', '050900', '050000', 1, NULL),
('050905', 'Huacaña', '050900', '050000', 1, NULL),
('050906', 'Morcolla', '050900', '050000', 1, NULL),
('050907', 'Paico', '050900', '050000', 1, NULL),
('050908', 'San Pedro de Larcay', '050900', '050000', 1, NULL),
('050909', 'San Salvador de Quije', '050900', '050000', 1, NULL),
('050910', 'Santiago de Paucaray', '050900', '050000', 1, NULL),
('050911', 'Soras', '050900', '050000', 1, NULL),
('051001', 'Huancapi', '051000', '050000', 1, NULL),
('051002', 'Alcamenca', '051000', '050000', 1, NULL),
('051003', 'Apongo', '051000', '050000', 1, NULL),
('051004', 'Asquipata', '051000', '050000', 1, NULL),
('051005', 'Canaria', '051000', '050000', 1, NULL),
('051006', 'Cayara', '051000', '050000', 1, NULL),
('051007', 'Colca', '051000', '050000', 1, NULL),
('051008', 'Huamanquiquia', '051000', '050000', 1, NULL),
('051009', 'Huancaraylla', '051000', '050000', 1, NULL),
('051010', 'Huaya', '051000', '050000', 1, NULL),
('051011', 'Sarhua', '051000', '050000', 1, NULL),
('051012', 'Vilcanchos', '051000', '050000', 1, NULL),
('051101', 'Vilcas Huaman', '051100', '050000', 1, NULL),
('051102', 'Accomarca', '051100', '050000', 1, NULL),
('051103', 'Carhuanca', '051100', '050000', 1, NULL),
('051104', 'Concepción', '051100', '050000', 1, NULL),
('051105', 'Huambalpa', '051100', '050000', 1, NULL),
('051106', 'Independencia', '051100', '050000', 1, NULL),
('051107', 'Saurama', '051100', '050000', 1, NULL),
('051108', 'Vischongo', '051100', '050000', 1, NULL),
('060101', 'Cajamarca', '060100', '060000', 1, NULL),
('060102', 'Asunción', '060100', '060000', 1, NULL),
('060103', 'Chetilla', '060100', '060000', 1, NULL),
('060104', 'Cospan', '060100', '060000', 1, NULL),
('060105', 'Encañada', '060100', '060000', 1, NULL),
('060106', 'Jesús', '060100', '060000', 1, NULL),
('060107', 'Llacanora', '060100', '060000', 1, NULL),
('060108', 'Los Baños del Inca', '060100', '060000', 1, NULL),
('060109', 'Magdalena', '060100', '060000', 1, NULL),
('060110', 'Matara', '060100', '060000', 1, NULL),
('060111', 'Namora', '060100', '060000', 1, NULL),
('060112', 'San Juan', '060100', '060000', 1, NULL),
('060201', 'Cajabamba', '060200', '060000', 1, NULL),
('060202', 'Cachachi', '060200', '060000', 1, NULL),
('060203', 'Condebamba', '060200', '060000', 1, NULL),
('060204', 'Sitacocha', '060200', '060000', 1, NULL),
('060301', 'Celendín', '060300', '060000', 1, NULL),
('060302', 'Chumuch', '060300', '060000', 1, NULL),
('060303', 'Cortegana', '060300', '060000', 1, NULL),
('060304', 'Huasmin', '060300', '060000', 1, NULL),
('060305', 'Jorge Chávez', '060300', '060000', 1, NULL),
('060306', 'José Gálvez', '060300', '060000', 1, NULL),
('060307', 'Miguel Iglesias', '060300', '060000', 1, NULL),
('060308', 'Oxamarca', '060300', '060000', 1, NULL),
('060309', 'Sorochuco', '060300', '060000', 1, NULL),
('060310', 'Sucre', '060300', '060000', 1, NULL),
('060311', 'Utco', '060300', '060000', 1, NULL),
('060312', 'La Libertad de Pallan', '060300', '060000', 1, NULL),
('060401', 'Chota', '060400', '060000', 1, NULL),
('060402', 'Anguia', '060400', '060000', 1, NULL),
('060403', 'Chadin', '060400', '060000', 1, NULL),
('060404', 'Chiguirip', '060400', '060000', 1, NULL),
('060405', 'Chimban', '060400', '060000', 1, NULL),
('060406', 'Choropampa', '060400', '060000', 1, NULL),
('060407', 'Cochabamba', '060400', '060000', 1, NULL),
('060408', 'Conchan', '060400', '060000', 1, NULL),
('060409', 'Huambos', '060400', '060000', 1, NULL),
('060410', 'Lajas', '060400', '060000', 1, NULL),
('060411', 'Llama', '060400', '060000', 1, NULL),
('060412', 'Miracosta', '060400', '060000', 1, NULL),
('060413', 'Paccha', '060400', '060000', 1, NULL),
('060414', 'Pion', '060400', '060000', 1, NULL),
('060415', 'Querocoto', '060400', '060000', 1, NULL),
('060416', 'San Juan de Licupis', '060400', '060000', 1, NULL),
('060417', 'Tacabamba', '060400', '060000', 1, NULL),
('060418', 'Tocmoche', '060400', '060000', 1, NULL),
('060419', 'Chalamarca', '060400', '060000', 1, NULL),
('060501', 'Contumaza', '060500', '060000', 1, NULL),
('060502', 'Chilete', '060500', '060000', 1, NULL),
('060503', 'Cupisnique', '060500', '060000', 1, NULL),
('060504', 'Guzmango', '060500', '060000', 1, NULL),
('060505', 'San Benito', '060500', '060000', 1, NULL),
('060506', 'Santa Cruz de Toledo', '060500', '060000', 1, NULL),
('060507', 'Tantarica', '060500', '060000', 1, NULL),
('060508', 'Yonan', '060500', '060000', 1, NULL),
('060601', 'Cutervo', '060600', '060000', 1, NULL),
('060602', 'Callayuc', '060600', '060000', 1, NULL),
('060603', 'Choros', '060600', '060000', 1, NULL),
('060604', 'Cujillo', '060600', '060000', 1, NULL),
('060605', 'La Ramada', '060600', '060000', 1, NULL),
('060606', 'Pimpingos', '060600', '060000', 1, NULL),
('060607', 'Querocotillo', '060600', '060000', 1, NULL),
('060608', 'San Andrés de Cutervo', '060600', '060000', 1, NULL),
('060609', 'San Juan de Cutervo', '060600', '060000', 1, NULL),
('060610', 'San Luis de Lucma', '060600', '060000', 1, NULL),
('060611', 'Santa Cruz', '060600', '060000', 1, NULL),
('060612', 'Santo Domingo de la Capilla', '060600', '060000', 1, NULL),
('060613', 'Santo Tomas', '060600', '060000', 1, NULL),
('060614', 'Socota', '060600', '060000', 1, NULL),
('060615', 'Toribio Casanova', '060600', '060000', 1, NULL),
('060701', 'Bambamarca', '060700', '060000', 1, NULL),
('060702', 'Chugur', '060700', '060000', 1, NULL),
('060703', 'Hualgayoc', '060700', '060000', 1, NULL),
('060801', 'Jaén', '060800', '060000', 1, NULL),
('060802', 'Bellavista', '060800', '060000', 1, NULL),
('060803', 'Chontali', '060800', '060000', 1, NULL),
('060804', 'Colasay', '060800', '060000', 1, NULL),
('060805', 'Huabal', '060800', '060000', 1, NULL),
('060806', 'Las Pirias', '060800', '060000', 1, NULL),
('060807', 'Pomahuaca', '060800', '060000', 1, NULL),
('060808', 'Pucara', '060800', '060000', 1, NULL),
('060809', 'Sallique', '060800', '060000', 1, NULL),
('060810', 'San Felipe', '060800', '060000', 1, NULL),
('060811', 'San José del Alto', '060800', '060000', 1, NULL),
('060812', 'Santa Rosa', '060800', '060000', 1, NULL),
('060901', 'San Ignacio', '060900', '060000', 1, NULL),
('060902', 'Chirinos', '060900', '060000', 1, NULL),
('060903', 'Huarango', '060900', '060000', 1, NULL),
('060904', 'La Coipa', '060900', '060000', 1, NULL),
('060905', 'Namballe', '060900', '060000', 1, NULL),
('060906', 'San José de Lourdes', '060900', '060000', 1, NULL),
('060907', 'Tabaconas', '060900', '060000', 1, NULL),
('061001', 'Pedro Gálvez', '061000', '060000', 1, NULL),
('061002', 'Chancay', '061000', '060000', 1, NULL),
('061003', 'Eduardo Villanueva', '061000', '060000', 1, NULL),
('061004', 'Gregorio Pita', '061000', '060000', 1, NULL),
('061005', 'Ichocan', '061000', '060000', 1, NULL),
('061006', 'José Manuel Quiroz', '061000', '060000', 1, NULL),
('061007', 'José Sabogal', '061000', '060000', 1, NULL),
('061101', 'San Miguel', '061100', '060000', 1, NULL),
('061102', 'Bolívar', '061100', '060000', 1, NULL),
('061103', 'Calquis', '061100', '060000', 1, NULL),
('061104', 'Catilluc', '061100', '060000', 1, NULL),
('061105', 'El Prado', '061100', '060000', 1, NULL),
('061106', 'La Florida', '061100', '060000', 1, NULL),
('061107', 'Llapa', '061100', '060000', 1, NULL),
('061108', 'Nanchoc', '061100', '060000', 1, NULL),
('061109', 'Niepos', '061100', '060000', 1, NULL),
('061110', 'San Gregorio', '061100', '060000', 1, NULL),
('061111', 'San Silvestre de Cochan', '061100', '060000', 1, NULL),
('061112', 'Tongod', '061100', '060000', 1, NULL),
('061113', 'Unión Agua Blanca', '061100', '060000', 1, NULL),
('061201', 'San Pablo', '061200', '060000', 1, NULL),
('061202', 'San Bernardino', '061200', '060000', 1, NULL),
('061203', 'San Luis', '061200', '060000', 1, NULL),
('061204', 'Tumbaden', '061200', '060000', 1, NULL),
('061301', 'Santa Cruz', '061300', '060000', 1, NULL),
('061302', 'Andabamba', '061300', '060000', 1, NULL),
('061303', 'Catache', '061300', '060000', 1, NULL),
('061304', 'Chancaybaños', '061300', '060000', 1, NULL),
('061305', 'La Esperanza', '061300', '060000', 1, NULL),
('061306', 'Ninabamba', '061300', '060000', 1, NULL),
('061307', 'Pulan', '061300', '060000', 1, NULL),
('061308', 'Saucepampa', '061300', '060000', 1, NULL),
('061309', 'Sexi', '061300', '060000', 1, NULL),
('061310', 'Uticyacu', '061300', '060000', 1, NULL),
('061311', 'Yauyucan', '061300', '060000', 1, NULL),
('070101', 'Callao', '070100', '070000', 1, NULL),
('070102', 'Bellavista', '070100', '070000', 1, NULL),
('070103', 'Carmen de la Legua Reynoso', '070100', '070000', 1, NULL),
('070104', 'La Perla', '070100', '070000', 1, NULL),
('070105', 'La Punta', '070100', '070000', 1, NULL),
('070106', 'Ventanilla', '070100', '070000', 1, NULL),
('070107', 'Mi Perú', '070100', '070000', 1, NULL),
('080101', 'Cusco', '080100', '080000', 1, NULL),
('080102', 'Ccorca', '080100', '080000', 1, NULL),
('080103', 'Poroy', '080100', '080000', 1, NULL),
('080104', 'San Jerónimo', '080100', '080000', 1, NULL),
('080105', 'San Sebastian', '080100', '080000', 1, NULL),
('080106', 'Santiago', '080100', '080000', 1, NULL),
('080107', 'Saylla', '080100', '080000', 1, NULL),
('080108', 'Wanchaq', '080100', '080000', 1, NULL),
('080201', 'Acomayo', '080200', '080000', 1, NULL),
('080202', 'Acopia', '080200', '080000', 1, NULL),
('080203', 'Acos', '080200', '080000', 1, NULL),
('080204', 'Mosoc Llacta', '080200', '080000', 1, NULL),
('080205', 'Pomacanchi', '080200', '080000', 1, NULL),
('080206', 'Rondocan', '080200', '080000', 1, NULL),
('080207', 'Sangarara', '080200', '080000', 1, NULL),
('080301', 'Anta', '080300', '080000', 1, NULL),
('080302', 'Ancahuasi', '080300', '080000', 1, NULL),
('080303', 'Cachimayo', '080300', '080000', 1, NULL),
('080304', 'Chinchaypujio', '080300', '080000', 1, NULL),
('080305', 'Huarocondo', '080300', '080000', 1, NULL),
('080306', 'Limatambo', '080300', '080000', 1, NULL),
('080307', 'Mollepata', '080300', '080000', 1, NULL),
('080308', 'Pucyura', '080300', '080000', 1, NULL),
('080309', 'Zurite', '080300', '080000', 1, NULL),
('080401', 'Calca', '080400', '080000', 1, NULL),
('080402', 'Coya', '080400', '080000', 1, NULL),
('080403', 'Lamay', '080400', '080000', 1, NULL),
('080404', 'Lares', '080400', '080000', 1, NULL),
('080405', 'Pisac', '080400', '080000', 1, NULL),
('080406', 'San Salvador', '080400', '080000', 1, NULL),
('080407', 'Taray', '080400', '080000', 1, NULL),
('080408', 'Yanatile', '080400', '080000', 1, NULL),
('080501', 'Yanaoca', '080500', '080000', 1, NULL),
('080502', 'Checca', '080500', '080000', 1, NULL),
('080503', 'Kunturkanki', '080500', '080000', 1, NULL),
('080504', 'Langui', '080500', '080000', 1, NULL),
('080505', 'Layo', '080500', '080000', 1, NULL),
('080506', 'Pampamarca', '080500', '080000', 1, NULL),
('080507', 'Quehue', '080500', '080000', 1, NULL),
('080508', 'Tupac Amaru', '080500', '080000', 1, NULL),
('080601', 'Sicuani', '080600', '080000', 1, NULL),
('080602', 'Checacupe', '080600', '080000', 1, NULL),
('080603', 'Combapata', '080600', '080000', 1, NULL),
('080604', 'Marangani', '080600', '080000', 1, NULL),
('080605', 'Pitumarca', '080600', '080000', 1, NULL),
('080606', 'San Pablo', '080600', '080000', 1, NULL),
('080607', 'San Pedro', '080600', '080000', 1, NULL),
('080608', 'Tinta', '080600', '080000', 1, NULL),
('080701', 'Santo Tomas', '080700', '080000', 1, NULL),
('080702', 'Capacmarca', '080700', '080000', 1, NULL),
('080703', 'Chamaca', '080700', '080000', 1, NULL),
('080704', 'Colquemarca', '080700', '080000', 1, NULL),
('080705', 'Livitaca', '080700', '080000', 1, NULL),
('080706', 'Llusco', '080700', '080000', 1, NULL),
('080707', 'Quiñota', '080700', '080000', 1, NULL),
('080708', 'Velille', '080700', '080000', 1, NULL),
('080801', 'Espinar', '080800', '080000', 1, NULL),
('080802', 'Condoroma', '080800', '080000', 1, NULL),
('080803', 'Coporaque', '080800', '080000', 1, NULL),
('080804', 'Ocoruro', '080800', '080000', 1, NULL),
('080805', 'Pallpata', '080800', '080000', 1, NULL),
('080806', 'Pichigua', '080800', '080000', 1, NULL),
('080807', 'Suyckutambo', '080800', '080000', 1, NULL),
('080808', 'Alto Pichigua', '080800', '080000', 1, NULL),
('080901', 'Santa Ana', '080900', '080000', 1, NULL),
('080902', 'Echarate', '080900', '080000', 1, NULL),
('080903', 'Huayopata', '080900', '080000', 1, NULL),
('080904', 'Maranura', '080900', '080000', 1, NULL),
('080905', 'Ocobamba', '080900', '080000', 1, NULL),
('080906', 'Quellouno', '080900', '080000', 1, NULL),
('080907', 'Kimbiri', '080900', '080000', 1, NULL),
('080908', 'Santa Teresa', '080900', '080000', 1, NULL),
('080909', 'Vilcabamba', '080900', '080000', 1, NULL),
('080910', 'Pichari', '080900', '080000', 1, NULL),
('080911', 'Inkawasi', '080900', '080000', 1, NULL),
('080912', 'Villa Virgen', '080900', '080000', 1, NULL),
('080913', 'Villa Kintiarina', '080900', '080000', 1, NULL),
('080914', 'Megantoni', '080900', '080000', 1, NULL),
('081001', 'Paruro', '081000', '080000', 1, NULL),
('081002', 'Accha', '081000', '080000', 1, NULL),
('081003', 'Ccapi', '081000', '080000', 1, NULL),
('081004', 'Colcha', '081000', '080000', 1, NULL),
('081005', 'Huanoquite', '081000', '080000', 1, NULL),
('081006', 'Omacha', '081000', '080000', 1, NULL),
('081007', 'Paccaritambo', '081000', '080000', 1, NULL),
('081008', 'Pillpinto', '081000', '080000', 1, NULL),
('081009', 'Yaurisque', '081000', '080000', 1, NULL),
('081101', 'Paucartambo', '081100', '080000', 1, NULL),
('081102', 'Caicay', '081100', '080000', 1, NULL),
('081103', 'Challabamba', '081100', '080000', 1, NULL),
('081104', 'Colquepata', '081100', '080000', 1, NULL),
('081105', 'Huancarani', '081100', '080000', 1, NULL),
('081106', 'Kosñipata', '081100', '080000', 1, NULL),
('081201', 'Urcos', '081200', '080000', 1, NULL),
('081202', 'Andahuaylillas', '081200', '080000', 1, NULL),
('081203', 'Camanti', '081200', '080000', 1, NULL),
('081204', 'Ccarhuayo', '081200', '080000', 1, NULL),
('081205', 'Ccatca', '081200', '080000', 1, NULL),
('081206', 'Cusipata', '081200', '080000', 1, NULL),
('081207', 'Huaro', '081200', '080000', 1, NULL),
('081208', 'Lucre', '081200', '080000', 1, NULL),
('081209', 'Marcapata', '081200', '080000', 1, NULL),
('081210', 'Ocongate', '081200', '080000', 1, NULL),
('081211', 'Oropesa', '081200', '080000', 1, NULL),
('081212', 'Quiquijana', '081200', '080000', 1, NULL),
('081301', 'Urubamba', '081300', '080000', 1, NULL),
('081302', 'Chinchero', '081300', '080000', 1, NULL),
('081303', 'Huayllabamba', '081300', '080000', 1, NULL),
('081304', 'Machupicchu', '081300', '080000', 1, NULL),
('081305', 'Maras', '081300', '080000', 1, NULL),
('081306', 'Ollantaytambo', '081300', '080000', 1, NULL),
('081307', 'Yucay', '081300', '080000', 1, NULL),
('090101', 'Huancavelica', '090100', '090000', 1, NULL),
('090102', 'Acobambilla', '090100', '090000', 1, NULL),
('090103', 'Acoria', '090100', '090000', 1, NULL),
('090104', 'Conayca', '090100', '090000', 1, NULL),
('090105', 'Cuenca', '090100', '090000', 1, NULL),
('090106', 'Huachocolpa', '090100', '090000', 1, NULL),
('090107', 'Huayllahuara', '090100', '090000', 1, NULL),
('090108', 'Izcuchaca', '090100', '090000', 1, NULL),
('090109', 'Laria', '090100', '090000', 1, NULL),
('090110', 'Manta', '090100', '090000', 1, NULL),
('090111', 'Mariscal Cáceres', '090100', '090000', 1, NULL),
('090112', 'Moya', '090100', '090000', 1, NULL),
('090113', 'Nuevo Occoro', '090100', '090000', 1, NULL),
('090114', 'Palca', '090100', '090000', 1, NULL),
('090115', 'Pilchaca', '090100', '090000', 1, NULL),
('090116', 'Vilca', '090100', '090000', 1, NULL),
('090117', 'Yauli', '090100', '090000', 1, NULL),
('090118', 'Ascensión', '090100', '090000', 1, NULL),
('090119', 'Huando', '090100', '090000', 1, NULL),
('090201', 'Acobamba', '090200', '090000', 1, NULL),
('090202', 'Andabamba', '090200', '090000', 1, NULL),
('090203', 'Anta', '090200', '090000', 1, NULL),
('090204', 'Caja', '090200', '090000', 1, NULL),
('090205', 'Marcas', '090200', '090000', 1, NULL),
('090206', 'Paucara', '090200', '090000', 1, NULL),
('090207', 'Pomacocha', '090200', '090000', 1, NULL),
('090208', 'Rosario', '090200', '090000', 1, NULL),
('090301', 'Lircay', '090300', '090000', 1, NULL),
('090302', 'Anchonga', '090300', '090000', 1, NULL),
('090303', 'Callanmarca', '090300', '090000', 1, NULL),
('090304', 'Ccochaccasa', '090300', '090000', 1, NULL),
('090305', 'Chincho', '090300', '090000', 1, NULL),
('090306', 'Congalla', '090300', '090000', 1, NULL),
('090307', 'Huanca-Huanca', '090300', '090000', 1, NULL),
('090308', 'Huayllay Grande', '090300', '090000', 1, NULL),
('090309', 'Julcamarca', '090300', '090000', 1, NULL),
('090310', 'San Antonio de Antaparco', '090300', '090000', 1, NULL),
('090311', 'Santo Tomas de Pata', '090300', '090000', 1, NULL),
('090312', 'Secclla', '090300', '090000', 1, NULL),
('090401', 'Castrovirreyna', '090400', '090000', 1, NULL),
('090402', 'Arma', '090400', '090000', 1, NULL),
('090403', 'Aurahua', '090400', '090000', 1, NULL),
('090404', 'Capillas', '090400', '090000', 1, NULL),
('090405', 'Chupamarca', '090400', '090000', 1, NULL),
('090406', 'Cocas', '090400', '090000', 1, NULL),
('090407', 'Huachos', '090400', '090000', 1, NULL),
('090408', 'Huamatambo', '090400', '090000', 1, NULL),
('090409', 'Mollepampa', '090400', '090000', 1, NULL),
('090410', 'San Juan', '090400', '090000', 1, NULL),
('090411', 'Santa Ana', '090400', '090000', 1, NULL),
('090412', 'Tantara', '090400', '090000', 1, NULL),
('090413', 'Ticrapo', '090400', '090000', 1, NULL),
('090501', 'Churcampa', '090500', '090000', 1, NULL),
('090502', 'Anco', '090500', '090000', 1, NULL),
('090503', 'Chinchihuasi', '090500', '090000', 1, NULL),
('090504', 'El Carmen', '090500', '090000', 1, NULL),
('090505', 'La Merced', '090500', '090000', 1, NULL),
('090506', 'Locroja', '090500', '090000', 1, NULL),
('090507', 'Paucarbamba', '090500', '090000', 1, NULL),
('090508', 'San Miguel de Mayocc', '090500', '090000', 1, NULL),
('090509', 'San Pedro de Coris', '090500', '090000', 1, NULL),
('090510', 'Pachamarca', '090500', '090000', 1, NULL),
('090511', 'Cosme', '090500', '090000', 1, NULL),
('090601', 'Huaytara', '090600', '090000', 1, NULL),
('090602', 'Ayavi', '090600', '090000', 1, NULL),
('090603', 'Córdova', '090600', '090000', 1, NULL),
('090604', 'Huayacundo Arma', '090600', '090000', 1, NULL),
('090605', 'Laramarca', '090600', '090000', 1, NULL),
('090606', 'Ocoyo', '090600', '090000', 1, NULL),
('090607', 'Pilpichaca', '090600', '090000', 1, NULL),
('090608', 'Querco', '090600', '090000', 1, NULL),
('090609', 'Quito-Arma', '090600', '090000', 1, NULL),
('090610', 'San Antonio de Cusicancha', '090600', '090000', 1, NULL),
('090611', 'San Francisco de Sangayaico', '090600', '090000', 1, NULL),
('090612', 'San Isidro', '090600', '090000', 1, NULL),
('090613', 'Santiago de Chocorvos', '090600', '090000', 1, NULL),
('090614', 'Santiago de Quirahuara', '090600', '090000', 1, NULL),
('090615', 'Santo Domingo de Capillas', '090600', '090000', 1, NULL),
('090616', 'Tambo', '090600', '090000', 1, NULL),
('090701', 'Pampas', '090700', '090000', 1, NULL),
('090702', 'Acostambo', '090700', '090000', 1, NULL),
('090703', 'Acraquia', '090700', '090000', 1, NULL),
('090704', 'Ahuaycha', '090700', '090000', 1, NULL),
('090705', 'Colcabamba', '090700', '090000', 1, NULL),
('090706', 'Daniel Hernández', '090700', '090000', 1, NULL),
('090707', 'Huachocolpa', '090700', '090000', 1, NULL),
('090709', 'Huaribamba', '090700', '090000', 1, NULL),
('090710', 'Ñahuimpuquio', '090700', '090000', 1, NULL),
('090711', 'Pazos', '090700', '090000', 1, NULL),
('090713', 'Quishuar', '090700', '090000', 1, NULL),
('090714', 'Salcabamba', '090700', '090000', 1, NULL),
('090715', 'Salcahuasi', '090700', '090000', 1, NULL),
('090716', 'San Marcos de Rocchac', '090700', '090000', 1, NULL),
('090717', 'Surcubamba', '090700', '090000', 1, NULL),
('090718', 'Tintay Puncu', '090700', '090000', 1, NULL),
('090719', 'Quichuas', '090700', '090000', 1, NULL),
('090720', 'Andaymarca', '090700', '090000', 1, NULL),
('090721', 'Roble', '090700', '090000', 1, NULL),
('090722', 'Pichos', '090700', '090000', 1, NULL),
('090723', 'Santiago de Tucuma', '090700', '090000', 1, NULL),
('100101', 'Huanuco', '100100', '100000', 1, NULL),
('100102', 'Amarilis', '100100', '100000', 1, NULL),
('100103', 'Chinchao', '100100', '100000', 1, NULL),
('100104', 'Churubamba', '100100', '100000', 1, NULL),
('100105', 'Margos', '100100', '100000', 1, NULL),
('100106', 'Quisqui (Kichki)', '100100', '100000', 1, NULL),
('100107', 'San Francisco de Cayran', '100100', '100000', 1, NULL),
('100108', 'San Pedro de Chaulan', '100100', '100000', 1, NULL),
('100109', 'Santa María del Valle', '100100', '100000', 1, NULL),
('100110', 'Yarumayo', '100100', '100000', 1, NULL),
('100111', 'Pillco Marca', '100100', '100000', 1, NULL),
('100112', 'Yacus', '100100', '100000', 1, NULL),
('100113', 'San Pablo de Pillao', '100100', '100000', 1, NULL),
('100201', 'Ambo', '100200', '100000', 1, NULL),
('100202', 'Cayna', '100200', '100000', 1, NULL),
('100203', 'Colpas', '100200', '100000', 1, NULL),
('100204', 'Conchamarca', '100200', '100000', 1, NULL),
('100205', 'Huacar', '100200', '100000', 1, NULL),
('100206', 'San Francisco', '100200', '100000', 1, NULL),
('100207', 'San Rafael', '100200', '100000', 1, NULL),
('100208', 'Tomay Kichwa', '100200', '100000', 1, NULL),
('100301', 'La Unión', '100300', '100000', 1, NULL),
('100307', 'Chuquis', '100300', '100000', 1, NULL),
('100311', 'Marías', '100300', '100000', 1, NULL),
('100313', 'Pachas', '100300', '100000', 1, NULL),
('100316', 'Quivilla', '100300', '100000', 1, NULL),
('100317', 'Ripan', '100300', '100000', 1, NULL),
('100321', 'Shunqui', '100300', '100000', 1, NULL),
('100322', 'Sillapata', '100300', '100000', 1, NULL),
('100323', 'Yanas', '100300', '100000', 1, NULL),
('100401', 'Huacaybamba', '100400', '100000', 1, NULL),
('100402', 'Canchabamba', '100400', '100000', 1, NULL),
('100403', 'Cochabamba', '100400', '100000', 1, NULL),
('100404', 'Pinra', '100400', '100000', 1, NULL),
('100501', 'Llata', '100500', '100000', 1, NULL),
('100502', 'Arancay', '100500', '100000', 1, NULL),
('100503', 'Chavín de Pariarca', '100500', '100000', 1, NULL),
('100504', 'Jacas Grande', '100500', '100000', 1, NULL),
('100505', 'Jircan', '100500', '100000', 1, NULL),
('100506', 'Miraflores', '100500', '100000', 1, NULL),
('100507', 'Monzón', '100500', '100000', 1, NULL),
('100508', 'Punchao', '100500', '100000', 1, NULL),
('100509', 'Puños', '100500', '100000', 1, NULL),
('100510', 'Singa', '100500', '100000', 1, NULL),
('100511', 'Tantamayo', '100500', '100000', 1, NULL),
('100601', 'Rupa-Rupa', '100600', '100000', 1, NULL),
('100602', 'Daniel Alomía Robles', '100600', '100000', 1, NULL),
('100603', 'Hermílio Valdizan', '100600', '100000', 1, NULL);
INSERT INTO `bd_distrito` (`id`, `nombre`, `id_provincia`, `id_departamento`, `status`, `fecha_registro`) VALUES
('100604', 'José Crespo y Castillo', '100600', '100000', 1, NULL),
('100605', 'Luyando', '100600', '100000', 1, NULL),
('100606', 'Mariano Damaso Beraun', '100600', '100000', 1, NULL),
('100607', 'Pucayacu', '100600', '100000', 1, NULL),
('100608', 'Castillo Grande', '100600', '100000', 1, NULL),
('100609', 'Pueblo Nuevo', '100600', '100000', 1, NULL),
('100610', 'Santo Domingo de Anda', '100600', '100000', 1, NULL),
('100701', 'Huacrachuco', '100700', '100000', 1, NULL),
('100702', 'Cholon', '100700', '100000', 1, NULL),
('100703', 'San Buenaventura', '100700', '100000', 1, NULL),
('100704', 'La Morada', '100700', '100000', 1, NULL),
('100705', 'Santa Rosa de Alto Yanajanca', '100700', '100000', 1, NULL),
('100801', 'Panao', '100800', '100000', 1, NULL),
('100802', 'Chaglla', '100800', '100000', 1, NULL),
('100803', 'Molino', '100800', '100000', 1, NULL),
('100804', 'Umari', '100800', '100000', 1, NULL),
('100901', 'Puerto Inca', '100900', '100000', 1, NULL),
('100902', 'Codo del Pozuzo', '100900', '100000', 1, NULL),
('100903', 'Honoria', '100900', '100000', 1, NULL),
('100904', 'Tournavista', '100900', '100000', 1, NULL),
('100905', 'Yuyapichis', '100900', '100000', 1, NULL),
('101001', 'Jesús', '101000', '100000', 1, NULL),
('101002', 'Baños', '101000', '100000', 1, NULL),
('101003', 'Jivia', '101000', '100000', 1, NULL),
('101004', 'Queropalca', '101000', '100000', 1, NULL),
('101005', 'Rondos', '101000', '100000', 1, NULL),
('101006', 'San Francisco de Asís', '101000', '100000', 1, NULL),
('101007', 'San Miguel de Cauri', '101000', '100000', 1, NULL),
('101101', 'Chavinillo', '101100', '100000', 1, NULL),
('101102', 'Cahuac', '101100', '100000', 1, NULL),
('101103', 'Chacabamba', '101100', '100000', 1, NULL),
('101104', 'Aparicio Pomares', '101100', '100000', 1, NULL),
('101105', 'Jacas Chico', '101100', '100000', 1, NULL),
('101106', 'Obas', '101100', '100000', 1, NULL),
('101107', 'Pampamarca', '101100', '100000', 1, NULL),
('101108', 'Choras', '101100', '100000', 1, NULL),
('110101', 'Ica', '110100', '110000', 1, NULL),
('110102', 'La Tinguiña', '110100', '110000', 1, NULL),
('110103', 'Los Aquijes', '110100', '110000', 1, NULL),
('110104', 'Ocucaje', '110100', '110000', 1, NULL),
('110105', 'Pachacutec', '110100', '110000', 1, NULL),
('110106', 'Parcona', '110100', '110000', 1, NULL),
('110107', 'Pueblo Nuevo', '110100', '110000', 1, NULL),
('110108', 'Salas', '110100', '110000', 1, NULL),
('110109', 'San José de Los Molinos', '110100', '110000', 1, NULL),
('110110', 'San Juan Bautista', '110100', '110000', 1, NULL),
('110111', 'Santiago', '110100', '110000', 1, NULL),
('110112', 'Subtanjalla', '110100', '110000', 1, NULL),
('110113', 'Tate', '110100', '110000', 1, NULL),
('110114', 'Yauca del Rosario', '110100', '110000', 1, NULL),
('110201', 'Chincha Alta', '110200', '110000', 1, NULL),
('110202', 'Alto Laran', '110200', '110000', 1, NULL),
('110203', 'Chavin', '110200', '110000', 1, NULL),
('110204', 'Chincha Baja', '110200', '110000', 1, NULL),
('110205', 'El Carmen', '110200', '110000', 1, NULL),
('110206', 'Grocio Prado', '110200', '110000', 1, NULL),
('110207', 'Pueblo Nuevo', '110200', '110000', 1, NULL),
('110208', 'San Juan de Yanac', '110200', '110000', 1, NULL),
('110209', 'San Pedro de Huacarpana', '110200', '110000', 1, NULL),
('110210', 'Sunampe', '110200', '110000', 1, NULL),
('110211', 'Tambo de Mora', '110200', '110000', 1, NULL),
('110301', 'Nasca', '110300', '110000', 1, NULL),
('110302', 'Changuillo', '110300', '110000', 1, NULL),
('110303', 'El Ingenio', '110300', '110000', 1, NULL),
('110304', 'Marcona', '110300', '110000', 1, NULL),
('110305', 'Vista Alegre', '110300', '110000', 1, NULL),
('110401', 'Palpa', '110400', '110000', 1, NULL),
('110402', 'Llipata', '110400', '110000', 1, NULL),
('110403', 'Río Grande', '110400', '110000', 1, NULL),
('110404', 'Santa Cruz', '110400', '110000', 1, NULL),
('110405', 'Tibillo', '110400', '110000', 1, NULL),
('110501', 'Pisco', '110500', '110000', 1, NULL),
('110502', 'Huancano', '110500', '110000', 1, NULL),
('110503', 'Humay', '110500', '110000', 1, NULL),
('110504', 'Independencia', '110500', '110000', 1, NULL),
('110505', 'Paracas', '110500', '110000', 1, NULL),
('110506', 'San Andrés', '110500', '110000', 1, NULL),
('110507', 'San Clemente', '110500', '110000', 1, NULL),
('110508', 'Tupac Amaru Inca', '110500', '110000', 1, NULL),
('120101', 'Huancayo', '120100', '120000', 1, NULL),
('120104', 'Carhuacallanga', '120100', '120000', 1, NULL),
('120105', 'Chacapampa', '120100', '120000', 1, NULL),
('120106', 'Chicche', '120100', '120000', 1, NULL),
('120107', 'Chilca', '120100', '120000', 1, NULL),
('120108', 'Chongos Alto', '120100', '120000', 1, NULL),
('120111', 'Chupuro', '120100', '120000', 1, NULL),
('120112', 'Colca', '120100', '120000', 1, NULL),
('120113', 'Cullhuas', '120100', '120000', 1, NULL),
('120114', 'El Tambo', '120100', '120000', 1, NULL),
('120116', 'Huacrapuquio', '120100', '120000', 1, NULL),
('120117', 'Hualhuas', '120100', '120000', 1, NULL),
('120119', 'Huancan', '120100', '120000', 1, NULL),
('120120', 'Huasicancha', '120100', '120000', 1, NULL),
('120121', 'Huayucachi', '120100', '120000', 1, NULL),
('120122', 'Ingenio', '120100', '120000', 1, NULL),
('120124', 'Pariahuanca', '120100', '120000', 1, NULL),
('120125', 'Pilcomayo', '120100', '120000', 1, NULL),
('120126', 'Pucara', '120100', '120000', 1, NULL),
('120127', 'Quichuay', '120100', '120000', 1, NULL),
('120128', 'Quilcas', '120100', '120000', 1, NULL),
('120129', 'San Agustín', '120100', '120000', 1, NULL),
('120130', 'San Jerónimo de Tunan', '120100', '120000', 1, NULL),
('120132', 'Saño', '120100', '120000', 1, NULL),
('120133', 'Sapallanga', '120100', '120000', 1, NULL),
('120134', 'Sicaya', '120100', '120000', 1, NULL),
('120135', 'Santo Domingo de Acobamba', '120100', '120000', 1, NULL),
('120136', 'Viques', '120100', '120000', 1, NULL),
('120201', 'Concepción', '120200', '120000', 1, NULL),
('120202', 'Aco', '120200', '120000', 1, NULL),
('120203', 'Andamarca', '120200', '120000', 1, NULL),
('120204', 'Chambara', '120200', '120000', 1, NULL),
('120205', 'Cochas', '120200', '120000', 1, NULL),
('120206', 'Comas', '120200', '120000', 1, NULL),
('120207', 'Heroínas Toledo', '120200', '120000', 1, NULL),
('120208', 'Manzanares', '120200', '120000', 1, NULL),
('120209', 'Mariscal Castilla', '120200', '120000', 1, NULL),
('120210', 'Matahuasi', '120200', '120000', 1, NULL),
('120211', 'Mito', '120200', '120000', 1, NULL),
('120212', 'Nueve de Julio', '120200', '120000', 1, NULL),
('120213', 'Orcotuna', '120200', '120000', 1, NULL),
('120214', 'San José de Quero', '120200', '120000', 1, NULL),
('120215', 'Santa Rosa de Ocopa', '120200', '120000', 1, NULL),
('120301', 'Chanchamayo', '120300', '120000', 1, NULL),
('120302', 'Perene', '120300', '120000', 1, NULL),
('120303', 'Pichanaqui', '120300', '120000', 1, NULL),
('120304', 'San Luis de Shuaro', '120300', '120000', 1, NULL),
('120305', 'San Ramón', '120300', '120000', 1, NULL),
('120306', 'Vitoc', '120300', '120000', 1, NULL),
('120401', 'Jauja', '120400', '120000', 1, NULL),
('120402', 'Acolla', '120400', '120000', 1, NULL),
('120403', 'Apata', '120400', '120000', 1, NULL),
('120404', 'Ataura', '120400', '120000', 1, NULL),
('120405', 'Canchayllo', '120400', '120000', 1, NULL),
('120406', 'Curicaca', '120400', '120000', 1, NULL),
('120407', 'El Mantaro', '120400', '120000', 1, NULL),
('120408', 'Huamali', '120400', '120000', 1, NULL),
('120409', 'Huaripampa', '120400', '120000', 1, NULL),
('120410', 'Huertas', '120400', '120000', 1, NULL),
('120411', 'Janjaillo', '120400', '120000', 1, NULL),
('120412', 'Julcán', '120400', '120000', 1, NULL),
('120413', 'Leonor Ordóñez', '120400', '120000', 1, NULL),
('120414', 'Llocllapampa', '120400', '120000', 1, NULL),
('120415', 'Marco', '120400', '120000', 1, NULL),
('120416', 'Masma', '120400', '120000', 1, NULL),
('120417', 'Masma Chicche', '120400', '120000', 1, NULL),
('120418', 'Molinos', '120400', '120000', 1, NULL),
('120419', 'Monobamba', '120400', '120000', 1, NULL),
('120420', 'Muqui', '120400', '120000', 1, NULL),
('120421', 'Muquiyauyo', '120400', '120000', 1, NULL),
('120422', 'Paca', '120400', '120000', 1, NULL),
('120423', 'Paccha', '120400', '120000', 1, NULL),
('120424', 'Pancan', '120400', '120000', 1, NULL),
('120425', 'Parco', '120400', '120000', 1, NULL),
('120426', 'Pomacancha', '120400', '120000', 1, NULL),
('120427', 'Ricran', '120400', '120000', 1, NULL),
('120428', 'San Lorenzo', '120400', '120000', 1, NULL),
('120429', 'San Pedro de Chunan', '120400', '120000', 1, NULL),
('120430', 'Sausa', '120400', '120000', 1, NULL),
('120431', 'Sincos', '120400', '120000', 1, NULL),
('120432', 'Tunan Marca', '120400', '120000', 1, NULL),
('120433', 'Yauli', '120400', '120000', 1, NULL),
('120434', 'Yauyos', '120400', '120000', 1, NULL),
('120501', 'Junin', '120500', '120000', 1, NULL),
('120502', 'Carhuamayo', '120500', '120000', 1, NULL),
('120503', 'Ondores', '120500', '120000', 1, NULL),
('120504', 'Ulcumayo', '120500', '120000', 1, NULL),
('120601', 'Satipo', '120600', '120000', 1, NULL),
('120602', 'Coviriali', '120600', '120000', 1, NULL),
('120603', 'Llaylla', '120600', '120000', 1, NULL),
('120604', 'Mazamari', '120600', '120000', 1, NULL),
('120605', 'Pampa Hermosa', '120600', '120000', 1, NULL),
('120606', 'Pangoa', '120600', '120000', 1, NULL),
('120607', 'Río Negro', '120600', '120000', 1, NULL),
('120608', 'Río Tambo', '120600', '120000', 1, NULL),
('120609', 'Vizcatan del Ene', '120600', '120000', 1, NULL),
('120701', 'Tarma', '120700', '120000', 1, NULL),
('120702', 'Acobamba', '120700', '120000', 1, NULL),
('120703', 'Huaricolca', '120700', '120000', 1, NULL),
('120704', 'Huasahuasi', '120700', '120000', 1, NULL),
('120705', 'La Unión', '120700', '120000', 1, NULL),
('120706', 'Palca', '120700', '120000', 1, NULL),
('120707', 'Palcamayo', '120700', '120000', 1, NULL),
('120708', 'San Pedro de Cajas', '120700', '120000', 1, NULL),
('120709', 'Tapo', '120700', '120000', 1, NULL),
('120801', 'La Oroya', '120800', '120000', 1, NULL),
('120802', 'Chacapalpa', '120800', '120000', 1, NULL),
('120803', 'Huay-Huay', '120800', '120000', 1, NULL),
('120804', 'Marcapomacocha', '120800', '120000', 1, NULL),
('120805', 'Morococha', '120800', '120000', 1, NULL),
('120806', 'Paccha', '120800', '120000', 1, NULL),
('120807', 'Santa Bárbara de Carhuacayan', '120800', '120000', 1, NULL),
('120808', 'Santa Rosa de Sacco', '120800', '120000', 1, NULL),
('120809', 'Suitucancha', '120800', '120000', 1, NULL),
('120810', 'Yauli', '120800', '120000', 1, NULL),
('120901', 'Chupaca', '120900', '120000', 1, NULL),
('120902', 'Ahuac', '120900', '120000', 1, NULL),
('120903', 'Chongos Bajo', '120900', '120000', 1, NULL),
('120904', 'Huachac', '120900', '120000', 1, NULL),
('120905', 'Huamancaca Chico', '120900', '120000', 1, NULL),
('120906', 'San Juan de Iscos', '120900', '120000', 1, NULL),
('120907', 'San Juan de Jarpa', '120900', '120000', 1, NULL),
('120908', 'Tres de Diciembre', '120900', '120000', 1, NULL),
('120909', 'Yanacancha', '120900', '120000', 1, NULL),
('130101', 'Trujillo', '130100', '130000', 1, NULL),
('130102', 'El Porvenir', '130100', '130000', 1, NULL),
('130103', 'Florencia de Mora', '130100', '130000', 1, NULL),
('130104', 'Huanchaco', '130100', '130000', 1, NULL),
('130105', 'La Esperanza', '130100', '130000', 1, NULL),
('130106', 'Laredo', '130100', '130000', 1, NULL),
('130107', 'Moche', '130100', '130000', 1, NULL),
('130108', 'Poroto', '130100', '130000', 1, NULL),
('130109', 'Salaverry', '130100', '130000', 1, NULL),
('130110', 'Simbal', '130100', '130000', 1, NULL),
('130111', 'Victor Larco Herrera', '130100', '130000', 1, NULL),
('130201', 'Ascope', '130200', '130000', 1, NULL),
('130202', 'Chicama', '130200', '130000', 1, NULL),
('130203', 'Chocope', '130200', '130000', 1, NULL),
('130204', 'Magdalena de Cao', '130200', '130000', 1, NULL),
('130205', 'Paijan', '130200', '130000', 1, NULL),
('130206', 'Rázuri', '130200', '130000', 1, NULL),
('130207', 'Santiago de Cao', '130200', '130000', 1, NULL),
('130208', 'Casa Grande', '130200', '130000', 1, NULL),
('130301', 'Bolívar', '130300', '130000', 1, NULL),
('130302', 'Bambamarca', '130300', '130000', 1, NULL),
('130303', 'Condormarca', '130300', '130000', 1, NULL),
('130304', 'Longotea', '130300', '130000', 1, NULL),
('130305', 'Uchumarca', '130300', '130000', 1, NULL),
('130306', 'Ucuncha', '130300', '130000', 1, NULL),
('130401', 'Chepen', '130400', '130000', 1, NULL),
('130402', 'Pacanga', '130400', '130000', 1, NULL),
('130403', 'Pueblo Nuevo', '130400', '130000', 1, NULL),
('130501', 'Julcan', '130500', '130000', 1, NULL),
('130502', 'Calamarca', '130500', '130000', 1, NULL),
('130503', 'Carabamba', '130500', '130000', 1, NULL),
('130504', 'Huaso', '130500', '130000', 1, NULL),
('130601', 'Otuzco', '130600', '130000', 1, NULL),
('130602', 'Agallpampa', '130600', '130000', 1, NULL),
('130604', 'Charat', '130600', '130000', 1, NULL),
('130605', 'Huaranchal', '130600', '130000', 1, NULL),
('130606', 'La Cuesta', '130600', '130000', 1, NULL),
('130608', 'Mache', '130600', '130000', 1, NULL),
('130610', 'Paranday', '130600', '130000', 1, NULL),
('130611', 'Salpo', '130600', '130000', 1, NULL),
('130613', 'Sinsicap', '130600', '130000', 1, NULL),
('130614', 'Usquil', '130600', '130000', 1, NULL),
('130701', 'San Pedro de Lloc', '130700', '130000', 1, NULL),
('130702', 'Guadalupe', '130700', '130000', 1, NULL),
('130703', 'Jequetepeque', '130700', '130000', 1, NULL),
('130704', 'Pacasmayo', '130700', '130000', 1, NULL),
('130705', 'San José', '130700', '130000', 1, NULL),
('130801', 'Tayabamba', '130800', '130000', 1, NULL),
('130802', 'Buldibuyo', '130800', '130000', 1, NULL),
('130803', 'Chillia', '130800', '130000', 1, NULL),
('130804', 'Huancaspata', '130800', '130000', 1, NULL),
('130805', 'Huaylillas', '130800', '130000', 1, NULL),
('130806', 'Huayo', '130800', '130000', 1, NULL),
('130807', 'Ongon', '130800', '130000', 1, NULL),
('130808', 'Parcoy', '130800', '130000', 1, NULL),
('130809', 'Pataz', '130800', '130000', 1, NULL),
('130810', 'Pias', '130800', '130000', 1, NULL),
('130811', 'Santiago de Challas', '130800', '130000', 1, NULL),
('130812', 'Taurija', '130800', '130000', 1, NULL),
('130813', 'Urpay', '130800', '130000', 1, NULL),
('130901', 'Huamachuco', '130900', '130000', 1, NULL),
('130902', 'Chugay', '130900', '130000', 1, NULL),
('130903', 'Cochorco', '130900', '130000', 1, NULL),
('130904', 'Curgos', '130900', '130000', 1, NULL),
('130905', 'Marcabal', '130900', '130000', 1, NULL),
('130906', 'Sanagoran', '130900', '130000', 1, NULL),
('130907', 'Sarin', '130900', '130000', 1, NULL),
('130908', 'Sartimbamba', '130900', '130000', 1, NULL),
('131001', 'Santiago de Chuco', '131000', '130000', 1, NULL),
('131002', 'Angasmarca', '131000', '130000', 1, NULL),
('131003', 'Cachicadan', '131000', '130000', 1, NULL),
('131004', 'Mollebamba', '131000', '130000', 1, NULL),
('131005', 'Mollepata', '131000', '130000', 1, NULL),
('131006', 'Quiruvilca', '131000', '130000', 1, NULL),
('131007', 'Santa Cruz de Chuca', '131000', '130000', 1, NULL),
('131008', 'Sitabamba', '131000', '130000', 1, NULL),
('131101', 'Cascas', '131100', '130000', 1, NULL),
('131102', 'Lucma', '131100', '130000', 1, NULL),
('131103', 'Marmot', '131100', '130000', 1, NULL),
('131104', 'Sayapullo', '131100', '130000', 1, NULL),
('131201', 'Viru', '131200', '130000', 1, NULL),
('131202', 'Chao', '131200', '130000', 1, NULL),
('131203', 'Guadalupito', '131200', '130000', 1, NULL),
('140101', 'Chiclayo', '140100', '140000', 1, NULL),
('140102', 'Chongoyape', '140100', '140000', 1, NULL),
('140103', 'Eten', '140100', '140000', 1, NULL),
('140104', 'Eten Puerto', '140100', '140000', 1, NULL),
('140105', 'José Leonardo Ortiz', '140100', '140000', 1, NULL),
('140106', 'La Victoria', '140100', '140000', 1, NULL),
('140107', 'Lagunas', '140100', '140000', 1, NULL),
('140108', 'Monsefu', '140100', '140000', 1, NULL),
('140109', 'Nueva Arica', '140100', '140000', 1, NULL),
('140110', 'Oyotun', '140100', '140000', 1, NULL),
('140111', 'Picsi', '140100', '140000', 1, NULL),
('140112', 'Pimentel', '140100', '140000', 1, NULL),
('140113', 'Reque', '140100', '140000', 1, NULL),
('140114', 'Santa Rosa', '140100', '140000', 1, NULL),
('140115', 'Saña', '140100', '140000', 1, NULL),
('140116', 'Cayalti', '140100', '140000', 1, NULL),
('140117', 'Patapo', '140100', '140000', 1, NULL),
('140118', 'Pomalca', '140100', '140000', 1, NULL),
('140119', 'Pucala', '140100', '140000', 1, NULL),
('140120', 'Tuman', '140100', '140000', 1, NULL),
('140201', 'Ferreñafe', '140200', '140000', 1, NULL),
('140202', 'Cañaris', '140200', '140000', 1, NULL),
('140203', 'Incahuasi', '140200', '140000', 1, NULL),
('140204', 'Manuel Antonio Mesones Muro', '140200', '140000', 1, NULL),
('140205', 'Pitipo', '140200', '140000', 1, NULL),
('140206', 'Pueblo Nuevo', '140200', '140000', 1, NULL),
('140301', 'Lambayeque', '140300', '140000', 1, NULL),
('140302', 'Chochope', '140300', '140000', 1, NULL),
('140303', 'Illimo', '140300', '140000', 1, NULL),
('140304', 'Jayanca', '140300', '140000', 1, NULL),
('140305', 'Mochumi', '140300', '140000', 1, NULL),
('140306', 'Morrope', '140300', '140000', 1, NULL),
('140307', 'Motupe', '140300', '140000', 1, NULL),
('140308', 'Olmos', '140300', '140000', 1, NULL),
('140309', 'Pacora', '140300', '140000', 1, NULL),
('140310', 'Salas', '140300', '140000', 1, NULL),
('140311', 'San José', '140300', '140000', 1, NULL),
('140312', 'Tucume', '140300', '140000', 1, NULL),
('150101', 'Lima', '150100', '150000', 1, NULL),
('150102', 'Ancón', '150100', '150000', 1, NULL),
('150103', 'Ate', '150100', '150000', 1, NULL),
('150104', 'Barranco', '150100', '150000', 1, NULL),
('150105', 'Breña', '150100', '150000', 1, NULL),
('150106', 'Carabayllo', '150100', '150000', 1, NULL),
('150107', 'Chaclacayo', '150100', '150000', 1, NULL),
('150108', 'Chorrillos', '150100', '150000', 1, NULL),
('150109', 'Cieneguilla', '150100', '150000', 1, NULL),
('150110', 'Comas', '150100', '150000', 1, NULL),
('150111', 'El Agustino', '150100', '150000', 1, NULL),
('150112', 'Independencia', '150100', '150000', 1, NULL),
('150113', 'Jesús María', '150100', '150000', 1, NULL),
('150114', 'La Molina', '150100', '150000', 1, NULL),
('150115', 'La Victoria', '150100', '150000', 1, NULL),
('150116', 'Lince', '150100', '150000', 1, NULL),
('150117', 'Los Olivos', '150100', '150000', 1, NULL),
('150118', 'Lurigancho', '150100', '150000', 1, NULL),
('150119', 'Lurin', '150100', '150000', 1, NULL),
('150120', 'Magdalena del Mar', '150100', '150000', 1, NULL),
('150121', 'Pueblo Libre', '150100', '150000', 1, NULL),
('150122', 'Miraflores', '150100', '150000', 1, NULL),
('150123', 'Pachacamac', '150100', '150000', 1, NULL),
('150124', 'Pucusana', '150100', '150000', 1, NULL),
('150125', 'Puente Piedra', '150100', '150000', 1, NULL),
('150126', 'Punta Hermosa', '150100', '150000', 1, NULL),
('150127', 'Punta Negra', '150100', '150000', 1, NULL),
('150128', 'Rímac', '150100', '150000', 1, NULL),
('150129', 'San Bartolo', '150100', '150000', 1, NULL),
('150130', 'San Borja', '150100', '150000', 1, NULL),
('150131', 'San Isidro', '150100', '150000', 1, NULL),
('150132', 'San Juan de Lurigancho', '150100', '150000', 1, NULL),
('150133', 'San Juan de Miraflores', '150100', '150000', 1, NULL),
('150134', 'San Luis', '150100', '150000', 1, NULL),
('150135', 'San Martín de Porres', '150100', '150000', 1, NULL),
('150136', 'San Miguel', '150100', '150000', 1, NULL),
('150137', 'Santa Anita', '150100', '150000', 1, NULL),
('150138', 'Santa María del Mar', '150100', '150000', 1, NULL),
('150139', 'Santa Rosa', '150100', '150000', 1, NULL),
('150140', 'Santiago de Surco', '150100', '150000', 1, NULL),
('150141', 'Surquillo', '150100', '150000', 1, NULL),
('150142', 'Villa El Salvador', '150100', '150000', 1, NULL),
('150143', 'Villa María del Triunfo', '150100', '150000', 1, NULL),
('150201', 'Barranca', '150200', '150000', 1, NULL),
('150202', 'Paramonga', '150200', '150000', 1, NULL),
('150203', 'Pativilca', '150200', '150000', 1, NULL),
('150204', 'Supe', '150200', '150000', 1, NULL),
('150205', 'Supe Puerto', '150200', '150000', 1, NULL),
('150301', 'Cajatambo', '150300', '150000', 1, NULL),
('150302', 'Copa', '150300', '150000', 1, NULL),
('150303', 'Gorgor', '150300', '150000', 1, NULL),
('150304', 'Huancapon', '150300', '150000', 1, NULL),
('150305', 'Manas', '150300', '150000', 1, NULL),
('150401', 'Canta', '150400', '150000', 1, NULL),
('150402', 'Arahuay', '150400', '150000', 1, NULL),
('150403', 'Huamantanga', '150400', '150000', 1, NULL),
('150404', 'Huaros', '150400', '150000', 1, NULL),
('150405', 'Lachaqui', '150400', '150000', 1, NULL),
('150406', 'San Buenaventura', '150400', '150000', 1, NULL),
('150407', 'Santa Rosa de Quives', '150400', '150000', 1, NULL),
('150501', 'San Vicente de Cañete', '150500', '150000', 1, NULL),
('150502', 'Asia', '150500', '150000', 1, NULL),
('150503', 'Calango', '150500', '150000', 1, NULL),
('150504', 'Cerro Azul', '150500', '150000', 1, NULL),
('150505', 'Chilca', '150500', '150000', 1, NULL),
('150506', 'Coayllo', '150500', '150000', 1, NULL),
('150507', 'Imperial', '150500', '150000', 1, NULL),
('150508', 'Lunahuana', '150500', '150000', 1, NULL),
('150509', 'Mala', '150500', '150000', 1, NULL),
('150510', 'Nuevo Imperial', '150500', '150000', 1, NULL),
('150511', 'Pacaran', '150500', '150000', 1, NULL),
('150512', 'Quilmana', '150500', '150000', 1, NULL),
('150513', 'San Antonio', '150500', '150000', 1, NULL),
('150514', 'San Luis', '150500', '150000', 1, NULL),
('150515', 'Santa Cruz de Flores', '150500', '150000', 1, NULL),
('150516', 'Zúñiga', '150500', '150000', 1, NULL),
('150601', 'Huaral', '150600', '150000', 1, NULL),
('150602', 'Atavillos Alto', '150600', '150000', 1, NULL),
('150603', 'Atavillos Bajo', '150600', '150000', 1, NULL),
('150604', 'Aucallama', '150600', '150000', 1, NULL),
('150605', 'Chancay', '150600', '150000', 1, NULL),
('150606', 'Ihuari', '150600', '150000', 1, NULL),
('150607', 'Lampian', '150600', '150000', 1, NULL),
('150608', 'Pacaraos', '150600', '150000', 1, NULL),
('150609', 'San Miguel de Acos', '150600', '150000', 1, NULL),
('150610', 'Santa Cruz de Andamarca', '150600', '150000', 1, NULL),
('150611', 'Sumbilca', '150600', '150000', 1, NULL),
('150612', 'Veintisiete de Noviembre', '150600', '150000', 1, NULL),
('150701', 'Matucana', '150700', '150000', 1, NULL),
('150702', 'Antioquia', '150700', '150000', 1, NULL),
('150703', 'Callahuanca', '150700', '150000', 1, NULL),
('150704', 'Carampoma', '150700', '150000', 1, NULL),
('150705', 'Chicla', '150700', '150000', 1, NULL),
('150706', 'Cuenca', '150700', '150000', 1, NULL),
('150707', 'Huachupampa', '150700', '150000', 1, NULL),
('150708', 'Huanza', '150700', '150000', 1, NULL),
('150709', 'Huarochiri', '150700', '150000', 1, NULL),
('150710', 'Lahuaytambo', '150700', '150000', 1, NULL),
('150711', 'Langa', '150700', '150000', 1, NULL),
('150712', 'Laraos', '150700', '150000', 1, NULL),
('150713', 'Mariatana', '150700', '150000', 1, NULL),
('150714', 'Ricardo Palma', '150700', '150000', 1, NULL),
('150715', 'San Andrés de Tupicocha', '150700', '150000', 1, NULL),
('150716', 'San Antonio', '150700', '150000', 1, NULL),
('150717', 'San Bartolomé', '150700', '150000', 1, NULL),
('150718', 'San Damian', '150700', '150000', 1, NULL),
('150719', 'San Juan de Iris', '150700', '150000', 1, NULL),
('150720', 'San Juan de Tantaranche', '150700', '150000', 1, NULL),
('150721', 'San Lorenzo de Quinti', '150700', '150000', 1, NULL),
('150722', 'San Mateo', '150700', '150000', 1, NULL),
('150723', 'San Mateo de Otao', '150700', '150000', 1, NULL),
('150724', 'San Pedro de Casta', '150700', '150000', 1, NULL),
('150725', 'San Pedro de Huancayre', '150700', '150000', 1, NULL),
('150726', 'Sangallaya', '150700', '150000', 1, NULL),
('150727', 'Santa Cruz de Cocachacra', '150700', '150000', 1, NULL),
('150728', 'Santa Eulalia', '150700', '150000', 1, NULL),
('150729', 'Santiago de Anchucaya', '150700', '150000', 1, NULL),
('150730', 'Santiago de Tuna', '150700', '150000', 1, NULL),
('150731', 'Santo Domingo de Los Olleros', '150700', '150000', 1, NULL),
('150732', 'Surco', '150700', '150000', 1, NULL),
('150801', 'Huacho', '150800', '150000', 1, NULL),
('150802', 'Ambar', '150800', '150000', 1, NULL),
('150803', 'Caleta de Carquin', '150800', '150000', 1, NULL),
('150804', 'Checras', '150800', '150000', 1, NULL),
('150805', 'Hualmay', '150800', '150000', 1, NULL),
('150806', 'Huaura', '150800', '150000', 1, NULL),
('150807', 'Leoncio Prado', '150800', '150000', 1, NULL),
('150808', 'Paccho', '150800', '150000', 1, NULL),
('150809', 'Santa Leonor', '150800', '150000', 1, NULL),
('150810', 'Santa María', '150800', '150000', 1, NULL),
('150811', 'Sayan', '150800', '150000', 1, NULL),
('150812', 'Vegueta', '150800', '150000', 1, NULL),
('150901', 'Oyon', '150900', '150000', 1, NULL),
('150902', 'Andajes', '150900', '150000', 1, NULL),
('150903', 'Caujul', '150900', '150000', 1, NULL),
('150904', 'Cochamarca', '150900', '150000', 1, NULL),
('150905', 'Navan', '150900', '150000', 1, NULL),
('150906', 'Pachangara', '150900', '150000', 1, NULL),
('151001', 'Yauyos', '151000', '150000', 1, NULL),
('151002', 'Alis', '151000', '150000', 1, NULL),
('151003', 'Allauca', '151000', '150000', 1, NULL),
('151004', 'Ayaviri', '151000', '150000', 1, NULL),
('151005', 'Azángaro', '151000', '150000', 1, NULL),
('151006', 'Cacra', '151000', '150000', 1, NULL),
('151007', 'Carania', '151000', '150000', 1, NULL),
('151008', 'Catahuasi', '151000', '150000', 1, NULL),
('151009', 'Chocos', '151000', '150000', 1, NULL),
('151010', 'Cochas', '151000', '150000', 1, NULL),
('151011', 'Colonia', '151000', '150000', 1, NULL),
('151012', 'Hongos', '151000', '150000', 1, NULL),
('151013', 'Huampara', '151000', '150000', 1, NULL),
('151014', 'Huancaya', '151000', '150000', 1, NULL),
('151015', 'Huangascar', '151000', '150000', 1, NULL),
('151016', 'Huantan', '151000', '150000', 1, NULL),
('151017', 'Huañec', '151000', '150000', 1, NULL),
('151018', 'Laraos', '151000', '150000', 1, NULL),
('151019', 'Lincha', '151000', '150000', 1, NULL),
('151020', 'Madean', '151000', '150000', 1, NULL),
('151021', 'Miraflores', '151000', '150000', 1, NULL),
('151022', 'Omas', '151000', '150000', 1, NULL),
('151023', 'Putinza', '151000', '150000', 1, NULL),
('151024', 'Quinches', '151000', '150000', 1, NULL),
('151025', 'Quinocay', '151000', '150000', 1, NULL),
('151026', 'San Joaquín', '151000', '150000', 1, NULL),
('151027', 'San Pedro de Pilas', '151000', '150000', 1, NULL),
('151028', 'Tanta', '151000', '150000', 1, NULL),
('151029', 'Tauripampa', '151000', '150000', 1, NULL),
('151030', 'Tomas', '151000', '150000', 1, NULL),
('151031', 'Tupe', '151000', '150000', 1, NULL),
('151032', 'Viñac', '151000', '150000', 1, NULL),
('151033', 'Vitis', '151000', '150000', 1, NULL),
('160101', 'Iquitos', '160100', '160000', 1, NULL),
('160102', 'Alto Nanay', '160100', '160000', 1, NULL),
('160103', 'Fernando Lores', '160100', '160000', 1, NULL),
('160104', 'Indiana', '160100', '160000', 1, NULL),
('160105', 'Las Amazonas', '160100', '160000', 1, NULL),
('160106', 'Mazan', '160100', '160000', 1, NULL),
('160107', 'Napo', '160100', '160000', 1, NULL),
('160108', 'Punchana', '160100', '160000', 1, NULL),
('160110', 'Torres Causana', '160100', '160000', 1, NULL),
('160112', 'Belén', '160100', '160000', 1, NULL),
('160113', 'San Juan Bautista', '160100', '160000', 1, NULL),
('160201', 'Yurimaguas', '160200', '160000', 1, NULL),
('160202', 'Balsapuerto', '160200', '160000', 1, NULL),
('160205', 'Jeberos', '160200', '160000', 1, NULL),
('160206', 'Lagunas', '160200', '160000', 1, NULL),
('160210', 'Santa Cruz', '160200', '160000', 1, NULL),
('160211', 'Teniente Cesar López Rojas', '160200', '160000', 1, NULL),
('160301', 'Nauta', '160300', '160000', 1, NULL),
('160302', 'Parinari', '160300', '160000', 1, NULL),
('160303', 'Tigre', '160300', '160000', 1, NULL),
('160304', 'Trompeteros', '160300', '160000', 1, NULL),
('160305', 'Urarinas', '160300', '160000', 1, NULL),
('160401', 'Ramón Castilla', '160400', '160000', 1, NULL),
('160402', 'Pebas', '160400', '160000', 1, NULL),
('160403', 'Yavari', '160400', '160000', 1, NULL),
('160404', 'San Pablo', '160400', '160000', 1, NULL),
('160501', 'Requena', '160500', '160000', 1, NULL),
('160502', 'Alto Tapiche', '160500', '160000', 1, NULL),
('160503', 'Capelo', '160500', '160000', 1, NULL),
('160504', 'Emilio San Martín', '160500', '160000', 1, NULL),
('160505', 'Maquia', '160500', '160000', 1, NULL),
('160506', 'Puinahua', '160500', '160000', 1, NULL),
('160507', 'Saquena', '160500', '160000', 1, NULL),
('160508', 'Soplin', '160500', '160000', 1, NULL),
('160509', 'Tapiche', '160500', '160000', 1, NULL),
('160510', 'Jenaro Herrera', '160500', '160000', 1, NULL),
('160511', 'Yaquerana', '160500', '160000', 1, NULL),
('160601', 'Contamana', '160600', '160000', 1, NULL),
('160602', 'Inahuaya', '160600', '160000', 1, NULL),
('160603', 'Padre Márquez', '160600', '160000', 1, NULL),
('160604', 'Pampa Hermosa', '160600', '160000', 1, NULL),
('160605', 'Sarayacu', '160600', '160000', 1, NULL),
('160606', 'Vargas Guerra', '160600', '160000', 1, NULL),
('160701', 'Barranca', '160700', '160000', 1, NULL),
('160702', 'Cahuapanas', '160700', '160000', 1, NULL),
('160703', 'Manseriche', '160700', '160000', 1, NULL),
('160704', 'Morona', '160700', '160000', 1, NULL),
('160705', 'Pastaza', '160700', '160000', 1, NULL),
('160706', 'Andoas', '160700', '160000', 1, NULL),
('160801', 'Putumayo', '160800', '160000', 1, NULL),
('160802', 'Rosa Panduro', '160800', '160000', 1, NULL),
('160803', 'Teniente Manuel Clavero', '160800', '160000', 1, NULL),
('160804', 'Yaguas', '160800', '160000', 1, NULL),
('170101', 'Tambopata', '170100', '170000', 1, NULL),
('170102', 'Inambari', '170100', '170000', 1, NULL),
('170103', 'Las Piedras', '170100', '170000', 1, NULL),
('170104', 'Laberinto', '170100', '170000', 1, NULL),
('170201', 'Manu', '170200', '170000', 1, NULL),
('170202', 'Fitzcarrald', '170200', '170000', 1, NULL),
('170203', 'Madre de Dios', '170200', '170000', 1, NULL),
('170204', 'Huepetuhe', '170200', '170000', 1, NULL),
('170301', 'Iñapari', '170300', '170000', 1, NULL),
('170302', 'Iberia', '170300', '170000', 1, NULL),
('170303', 'Tahuamanu', '170300', '170000', 1, NULL),
('180101', 'Moquegua', '180100', '180000', 1, NULL),
('180102', 'Carumas', '180100', '180000', 1, NULL),
('180103', 'Cuchumbaya', '180100', '180000', 1, NULL),
('180104', 'Samegua', '180100', '180000', 1, NULL),
('180105', 'San Cristóbal', '180100', '180000', 1, NULL),
('180106', 'Torata', '180100', '180000', 1, NULL),
('180201', 'Omate', '180200', '180000', 1, NULL),
('180202', 'Chojata', '180200', '180000', 1, NULL),
('180203', 'Coalaque', '180200', '180000', 1, NULL),
('180204', 'Ichuña', '180200', '180000', 1, NULL),
('180205', 'La Capilla', '180200', '180000', 1, NULL),
('180206', 'Lloque', '180200', '180000', 1, NULL),
('180207', 'Matalaque', '180200', '180000', 1, NULL),
('180208', 'Puquina', '180200', '180000', 1, NULL),
('180209', 'Quinistaquillas', '180200', '180000', 1, NULL),
('180210', 'Ubinas', '180200', '180000', 1, NULL),
('180211', 'Yunga', '180200', '180000', 1, NULL),
('180301', 'Ilo', '180300', '180000', 1, NULL),
('180302', 'El Algarrobal', '180300', '180000', 1, NULL),
('180303', 'Pacocha', '180300', '180000', 1, NULL),
('190101', 'Chaupimarca', '190100', '190000', 1, NULL),
('190102', 'Huachon', '190100', '190000', 1, NULL),
('190103', 'Huariaca', '190100', '190000', 1, NULL),
('190104', 'Huayllay', '190100', '190000', 1, NULL),
('190105', 'Ninacaca', '190100', '190000', 1, NULL),
('190106', 'Pallanchacra', '190100', '190000', 1, NULL),
('190107', 'Paucartambo', '190100', '190000', 1, NULL),
('190108', 'San Francisco de Asís de Yarusyacan', '190100', '190000', 1, NULL),
('190109', 'Simon Bolívar', '190100', '190000', 1, NULL),
('190110', 'Ticlacayan', '190100', '190000', 1, NULL),
('190111', 'Tinyahuarco', '190100', '190000', 1, NULL),
('190112', 'Vicco', '190100', '190000', 1, NULL),
('190113', 'Yanacancha', '190100', '190000', 1, NULL),
('190201', 'Yanahuanca', '190200', '190000', 1, NULL),
('190202', 'Chacayan', '190200', '190000', 1, NULL),
('190203', 'Goyllarisquizga', '190200', '190000', 1, NULL),
('190204', 'Paucar', '190200', '190000', 1, NULL),
('190205', 'San Pedro de Pillao', '190200', '190000', 1, NULL),
('190206', 'Santa Ana de Tusi', '190200', '190000', 1, NULL),
('190207', 'Tapuc', '190200', '190000', 1, NULL),
('190208', 'Vilcabamba', '190200', '190000', 1, NULL),
('190301', 'Oxapampa', '190300', '190000', 1, NULL),
('190302', 'Chontabamba', '190300', '190000', 1, NULL),
('190303', 'Huancabamba', '190300', '190000', 1, NULL),
('190304', 'Palcazu', '190300', '190000', 1, NULL),
('190305', 'Pozuzo', '190300', '190000', 1, NULL),
('190306', 'Puerto Bermúdez', '190300', '190000', 1, NULL),
('190307', 'Villa Rica', '190300', '190000', 1, NULL),
('190308', 'Constitución', '190300', '190000', 1, NULL),
('200101', 'Piura', '200100', '200000', 1, NULL),
('200104', 'Castilla', '200100', '200000', 1, NULL),
('200105', 'Catacaos', '200100', '200000', 1, NULL),
('200107', 'Cura Mori', '200100', '200000', 1, NULL),
('200108', 'El Tallan', '200100', '200000', 1, NULL),
('200109', 'La Arena', '200100', '200000', 1, NULL),
('200110', 'La Unión', '200100', '200000', 1, NULL),
('200111', 'Las Lomas', '200100', '200000', 1, NULL),
('200114', 'Tambo Grande', '200100', '200000', 1, NULL),
('200115', 'Veintiseis de Octubre', '200100', '200000', 1, NULL),
('200201', 'Ayabaca', '200200', '200000', 1, NULL),
('200202', 'Frias', '200200', '200000', 1, NULL),
('200203', 'Jilili', '200200', '200000', 1, NULL),
('200204', 'Lagunas', '200200', '200000', 1, NULL),
('200205', 'Montero', '200200', '200000', 1, NULL),
('200206', 'Pacaipampa', '200200', '200000', 1, NULL),
('200207', 'Paimas', '200200', '200000', 1, NULL),
('200208', 'Sapillica', '200200', '200000', 1, NULL),
('200209', 'Sicchez', '200200', '200000', 1, NULL),
('200210', 'Suyo', '200200', '200000', 1, NULL),
('200301', 'Huancabamba', '200300', '200000', 1, NULL),
('200302', 'Canchaque', '200300', '200000', 1, NULL),
('200303', 'El Carmen de la Frontera', '200300', '200000', 1, NULL),
('200304', 'Huarmaca', '200300', '200000', 1, NULL),
('200305', 'Lalaquiz', '200300', '200000', 1, NULL),
('200306', 'San Miguel de El Faique', '200300', '200000', 1, NULL),
('200307', 'Sondor', '200300', '200000', 1, NULL),
('200308', 'Sondorillo', '200300', '200000', 1, NULL),
('200401', 'Chulucanas', '200400', '200000', 1, NULL),
('200402', 'Buenos Aires', '200400', '200000', 1, NULL),
('200403', 'Chalaco', '200400', '200000', 1, NULL),
('200404', 'La Matanza', '200400', '200000', 1, NULL),
('200405', 'Morropon', '200400', '200000', 1, NULL),
('200406', 'Salitral', '200400', '200000', 1, NULL),
('200407', 'San Juan de Bigote', '200400', '200000', 1, NULL),
('200408', 'Santa Catalina de Mossa', '200400', '200000', 1, NULL),
('200409', 'Santo Domingo', '200400', '200000', 1, NULL),
('200410', 'Yamango', '200400', '200000', 1, NULL),
('200501', 'Paita', '200500', '200000', 1, NULL),
('200502', 'Amotape', '200500', '200000', 1, NULL),
('200503', 'Arenal', '200500', '200000', 1, NULL),
('200504', 'Colan', '200500', '200000', 1, NULL),
('200505', 'La Huaca', '200500', '200000', 1, NULL),
('200506', 'Tamarindo', '200500', '200000', 1, NULL),
('200507', 'Vichayal', '200500', '200000', 1, NULL),
('200601', 'Sullana', '200600', '200000', 1, NULL),
('200602', 'Bellavista', '200600', '200000', 1, NULL),
('200603', 'Ignacio Escudero', '200600', '200000', 1, NULL),
('200604', 'Lancones', '200600', '200000', 1, NULL),
('200605', 'Marcavelica', '200600', '200000', 1, NULL),
('200606', 'Miguel Checa', '200600', '200000', 1, NULL),
('200607', 'Querecotillo', '200600', '200000', 1, NULL),
('200608', 'Salitral', '200600', '200000', 1, NULL),
('200701', 'Pariñas', '200700', '200000', 1, NULL),
('200702', 'El Alto', '200700', '200000', 1, NULL),
('200703', 'La Brea', '200700', '200000', 1, NULL),
('200704', 'Lobitos', '200700', '200000', 1, NULL),
('200705', 'Los Organos', '200700', '200000', 1, NULL),
('200706', 'Mancora', '200700', '200000', 1, NULL),
('200801', 'Sechura', '200800', '200000', 1, NULL),
('200802', 'Bellavista de la Unión', '200800', '200000', 1, NULL),
('200803', 'Bernal', '200800', '200000', 1, NULL),
('200804', 'Cristo Nos Valga', '200800', '200000', 1, NULL),
('200805', 'Vice', '200800', '200000', 1, NULL),
('200806', 'Rinconada Llicuar', '200800', '200000', 1, NULL),
('210101', 'Puno', '210100', '210000', 1, NULL),
('210102', 'Acora', '210100', '210000', 1, NULL),
('210103', 'Amantani', '210100', '210000', 1, NULL),
('210104', 'Atuncolla', '210100', '210000', 1, NULL),
('210105', 'Capachica', '210100', '210000', 1, NULL),
('210106', 'Chucuito', '210100', '210000', 1, NULL),
('210107', 'Coata', '210100', '210000', 1, NULL),
('210108', 'Huata', '210100', '210000', 1, NULL),
('210109', 'Mañazo', '210100', '210000', 1, NULL),
('210110', 'Paucarcolla', '210100', '210000', 1, NULL),
('210111', 'Pichacani', '210100', '210000', 1, NULL),
('210112', 'Plateria', '210100', '210000', 1, NULL),
('210113', 'San Antonio', '210100', '210000', 1, NULL),
('210114', 'Tiquillaca', '210100', '210000', 1, NULL),
('210115', 'Vilque', '210100', '210000', 1, NULL),
('210201', 'Azángaro', '210200', '210000', 1, NULL),
('210202', 'Achaya', '210200', '210000', 1, NULL),
('210203', 'Arapa', '210200', '210000', 1, NULL),
('210204', 'Asillo', '210200', '210000', 1, NULL),
('210205', 'Caminaca', '210200', '210000', 1, NULL),
('210206', 'Chupa', '210200', '210000', 1, NULL),
('210207', 'José Domingo Choquehuanca', '210200', '210000', 1, NULL),
('210208', 'Muñani', '210200', '210000', 1, NULL),
('210209', 'Potoni', '210200', '210000', 1, NULL),
('210210', 'Saman', '210200', '210000', 1, NULL),
('210211', 'San Anton', '210200', '210000', 1, NULL),
('210212', 'San José', '210200', '210000', 1, NULL),
('210213', 'San Juan de Salinas', '210200', '210000', 1, NULL),
('210214', 'Santiago de Pupuja', '210200', '210000', 1, NULL),
('210215', 'Tirapata', '210200', '210000', 1, NULL),
('210301', 'Macusani', '210300', '210000', 1, NULL),
('210302', 'Ajoyani', '210300', '210000', 1, NULL),
('210303', 'Ayapata', '210300', '210000', 1, NULL),
('210304', 'Coasa', '210300', '210000', 1, NULL),
('210305', 'Corani', '210300', '210000', 1, NULL),
('210306', 'Crucero', '210300', '210000', 1, NULL),
('210307', 'Ituata', '210300', '210000', 1, NULL),
('210308', 'Ollachea', '210300', '210000', 1, NULL),
('210309', 'San Gaban', '210300', '210000', 1, NULL),
('210310', 'Usicayos', '210300', '210000', 1, NULL),
('210401', 'Juli', '210400', '210000', 1, NULL),
('210402', 'Desaguadero', '210400', '210000', 1, NULL),
('210403', 'Huacullani', '210400', '210000', 1, NULL),
('210404', 'Kelluyo', '210400', '210000', 1, NULL),
('210405', 'Pisacoma', '210400', '210000', 1, NULL),
('210406', 'Pomata', '210400', '210000', 1, NULL),
('210407', 'Zepita', '210400', '210000', 1, NULL),
('210501', 'Ilave', '210500', '210000', 1, NULL),
('210502', 'Capazo', '210500', '210000', 1, NULL),
('210503', 'Pilcuyo', '210500', '210000', 1, NULL),
('210504', 'Santa Rosa', '210500', '210000', 1, NULL),
('210505', 'Conduriri', '210500', '210000', 1, NULL),
('210601', 'Huancane', '210600', '210000', 1, NULL),
('210602', 'Cojata', '210600', '210000', 1, NULL),
('210603', 'Huatasani', '210600', '210000', 1, NULL),
('210604', 'Inchupalla', '210600', '210000', 1, NULL),
('210605', 'Pusi', '210600', '210000', 1, NULL),
('210606', 'Rosaspata', '210600', '210000', 1, NULL),
('210607', 'Taraco', '210600', '210000', 1, NULL),
('210608', 'Vilque Chico', '210600', '210000', 1, NULL),
('210701', 'Lampa', '210700', '210000', 1, NULL),
('210702', 'Cabanilla', '210700', '210000', 1, NULL),
('210703', 'Calapuja', '210700', '210000', 1, NULL),
('210704', 'Nicasio', '210700', '210000', 1, NULL),
('210705', 'Ocuviri', '210700', '210000', 1, NULL),
('210706', 'Palca', '210700', '210000', 1, NULL),
('210707', 'Paratia', '210700', '210000', 1, NULL),
('210708', 'Pucara', '210700', '210000', 1, NULL),
('210709', 'Santa Lucia', '210700', '210000', 1, NULL),
('210710', 'Vilavila', '210700', '210000', 1, NULL),
('210801', 'Ayaviri', '210800', '210000', 1, NULL),
('210802', 'Antauta', '210800', '210000', 1, NULL),
('210803', 'Cupi', '210800', '210000', 1, NULL),
('210804', 'Llalli', '210800', '210000', 1, NULL),
('210805', 'Macari', '210800', '210000', 1, NULL),
('210806', 'Nuñoa', '210800', '210000', 1, NULL),
('210807', 'Orurillo', '210800', '210000', 1, NULL),
('210808', 'Santa Rosa', '210800', '210000', 1, NULL),
('210809', 'Umachiri', '210800', '210000', 1, NULL),
('210901', 'Moho', '210900', '210000', 1, NULL),
('210902', 'Conima', '210900', '210000', 1, NULL),
('210903', 'Huayrapata', '210900', '210000', 1, NULL),
('210904', 'Tilali', '210900', '210000', 1, NULL),
('211001', 'Putina', '211000', '210000', 1, NULL),
('211002', 'Ananea', '211000', '210000', 1, NULL),
('211003', 'Pedro Vilca Apaza', '211000', '210000', 1, NULL),
('211004', 'Quilcapuncu', '211000', '210000', 1, NULL),
('211005', 'Sina', '211000', '210000', 1, NULL),
('211101', 'Juliaca', '211100', '210000', 1, NULL),
('211102', 'Cabana', '211100', '210000', 1, NULL),
('211103', 'Cabanillas', '211100', '210000', 1, NULL),
('211104', 'Caracoto', '211100', '210000', 1, NULL),
('211105', 'San Miguel', '211100', '210000', 1, NULL),
('211201', 'Sandia', '211200', '210000', 1, NULL),
('211202', 'Cuyocuyo', '211200', '210000', 1, NULL),
('211203', 'Limbani', '211200', '210000', 1, NULL),
('211204', 'Patambuco', '211200', '210000', 1, NULL),
('211205', 'Phara', '211200', '210000', 1, NULL),
('211206', 'Quiaca', '211200', '210000', 1, NULL),
('211207', 'San Juan del Oro', '211200', '210000', 1, NULL),
('211208', 'Yanahuaya', '211200', '210000', 1, NULL),
('211209', 'Alto Inambari', '211200', '210000', 1, NULL),
('211210', 'San Pedro de Putina Punco', '211200', '210000', 1, NULL),
('211301', 'Yunguyo', '211300', '210000', 1, NULL),
('211302', 'Anapia', '211300', '210000', 1, NULL),
('211303', 'Copani', '211300', '210000', 1, NULL),
('211304', 'Cuturapi', '211300', '210000', 1, NULL),
('211305', 'Ollaraya', '211300', '210000', 1, NULL),
('211306', 'Tinicachi', '211300', '210000', 1, NULL),
('211307', 'Unicachi', '211300', '210000', 1, NULL),
('220101', 'Moyobamba', '220100', '220000', 1, NULL),
('220102', 'Calzada', '220100', '220000', 1, NULL),
('220103', 'Habana', '220100', '220000', 1, NULL),
('220104', 'Jepelacio', '220100', '220000', 1, NULL),
('220105', 'Soritor', '220100', '220000', 1, NULL),
('220106', 'Yantalo', '220100', '220000', 1, NULL),
('220201', 'Bellavista', '220200', '220000', 1, NULL),
('220202', 'Alto Biavo', '220200', '220000', 1, NULL),
('220203', 'Bajo Biavo', '220200', '220000', 1, NULL),
('220204', 'Huallaga', '220200', '220000', 1, NULL),
('220205', 'San Pablo', '220200', '220000', 1, NULL),
('220206', 'San Rafael', '220200', '220000', 1, NULL),
('220301', 'San José de Sisa', '220300', '220000', 1, NULL),
('220302', 'Agua Blanca', '220300', '220000', 1, NULL),
('220303', 'San Martín', '220300', '220000', 1, NULL),
('220304', 'Santa Rosa', '220300', '220000', 1, NULL),
('220305', 'Shatoja', '220300', '220000', 1, NULL),
('220401', 'Saposoa', '220400', '220000', 1, NULL),
('220402', 'Alto Saposoa', '220400', '220000', 1, NULL),
('220403', 'El Eslabón', '220400', '220000', 1, NULL),
('220404', 'Piscoyacu', '220400', '220000', 1, NULL),
('220405', 'Sacanche', '220400', '220000', 1, NULL),
('220406', 'Tingo de Saposoa', '220400', '220000', 1, NULL),
('220501', 'Lamas', '220500', '220000', 1, NULL),
('220502', 'Alonso de Alvarado', '220500', '220000', 1, NULL),
('220503', 'Barranquita', '220500', '220000', 1, NULL),
('220504', 'Caynarachi', '220500', '220000', 1, NULL),
('220505', 'Cuñumbuqui', '220500', '220000', 1, NULL),
('220506', 'Pinto Recodo', '220500', '220000', 1, NULL),
('220507', 'Rumisapa', '220500', '220000', 1, NULL),
('220508', 'San Roque de Cumbaza', '220500', '220000', 1, NULL),
('220509', 'Shanao', '220500', '220000', 1, NULL),
('220510', 'Tabalosos', '220500', '220000', 1, NULL),
('220511', 'Zapatero', '220500', '220000', 1, NULL),
('220601', 'Juanjuí', '220600', '220000', 1, NULL),
('220602', 'Campanilla', '220600', '220000', 1, NULL),
('220603', 'Huicungo', '220600', '220000', 1, NULL),
('220604', 'Pachiza', '220600', '220000', 1, NULL),
('220605', 'Pajarillo', '220600', '220000', 1, NULL),
('220701', 'Picota', '220700', '220000', 1, NULL),
('220702', 'Buenos Aires', '220700', '220000', 1, NULL),
('220703', 'Caspisapa', '220700', '220000', 1, NULL),
('220704', 'Pilluana', '220700', '220000', 1, NULL),
('220705', 'Pucacaca', '220700', '220000', 1, NULL),
('220706', 'San Cristóbal', '220700', '220000', 1, NULL),
('220707', 'San Hilarión', '220700', '220000', 1, NULL),
('220708', 'Shamboyacu', '220700', '220000', 1, NULL),
('220709', 'Tingo de Ponasa', '220700', '220000', 1, NULL),
('220710', 'Tres Unidos', '220700', '220000', 1, NULL),
('220801', 'Rioja', '220800', '220000', 1, NULL),
('220802', 'Awajun', '220800', '220000', 1, NULL),
('220803', 'Elías Soplin Vargas', '220800', '220000', 1, NULL),
('220804', 'Nueva Cajamarca', '220800', '220000', 1, NULL),
('220805', 'Pardo Miguel', '220800', '220000', 1, NULL),
('220806', 'Posic', '220800', '220000', 1, NULL),
('220807', 'San Fernando', '220800', '220000', 1, NULL),
('220808', 'Yorongos', '220800', '220000', 1, NULL),
('220809', 'Yuracyacu', '220800', '220000', 1, NULL),
('220901', 'Tarapoto', '220900', '220000', 1, NULL),
('220902', 'Alberto Leveau', '220900', '220000', 1, NULL),
('220903', 'Cacatachi', '220900', '220000', 1, NULL),
('220904', 'Chazuta', '220900', '220000', 1, NULL),
('220905', 'Chipurana', '220900', '220000', 1, NULL),
('220906', 'El Porvenir', '220900', '220000', 1, NULL),
('220907', 'Huimbayoc', '220900', '220000', 1, NULL),
('220908', 'Juan Guerra', '220900', '220000', 1, NULL),
('220909', 'La Banda de Shilcayo', '220900', '220000', 1, NULL),
('220910', 'Morales', '220900', '220000', 1, NULL),
('220911', 'Papaplaya', '220900', '220000', 1, NULL),
('220912', 'San Antonio', '220900', '220000', 1, NULL),
('220913', 'Sauce', '220900', '220000', 1, NULL),
('220914', 'Shapaja', '220900', '220000', 1, NULL),
('221001', 'Tocache', '221000', '220000', 1, NULL),
('221002', 'Nuevo Progreso', '221000', '220000', 1, NULL),
('221003', 'Polvora', '221000', '220000', 1, NULL),
('221004', 'Shunte', '221000', '220000', 1, NULL),
('221005', 'Uchiza', '221000', '220000', 1, NULL),
('230101', 'Tacna', '230100', '230000', 1, NULL),
('230102', 'Alto de la Alianza', '230100', '230000', 1, NULL),
('230103', 'Calana', '230100', '230000', 1, NULL),
('230104', 'Ciudad Nueva', '230100', '230000', 1, NULL),
('230105', 'Inclan', '230100', '230000', 1, NULL),
('230106', 'Pachia', '230100', '230000', 1, NULL),
('230107', 'Palca', '230100', '230000', 1, NULL),
('230108', 'Pocollay', '230100', '230000', 1, NULL),
('230109', 'Sama', '230100', '230000', 1, NULL),
('230110', 'Coronel Gregorio Albarracín Lanchipa', '230100', '230000', 1, NULL),
('230111', 'La Yarada los Palos', '230100', '230000', 1, NULL),
('230201', 'Candarave', '230200', '230000', 1, NULL),
('230202', 'Cairani', '230200', '230000', 1, NULL),
('230203', 'Camilaca', '230200', '230000', 1, NULL),
('230204', 'Curibaya', '230200', '230000', 1, NULL),
('230205', 'Huanuara', '230200', '230000', 1, NULL),
('230206', 'Quilahuani', '230200', '230000', 1, NULL),
('230301', 'Locumba', '230300', '230000', 1, NULL),
('230302', 'Ilabaya', '230300', '230000', 1, NULL),
('230303', 'Ite', '230300', '230000', 1, NULL),
('230401', 'Tarata', '230400', '230000', 1, NULL),
('230402', 'Héroes Albarracín', '230400', '230000', 1, NULL),
('230403', 'Estique', '230400', '230000', 1, NULL),
('230404', 'Estique-Pampa', '230400', '230000', 1, NULL),
('230405', 'Sitajara', '230400', '230000', 1, NULL),
('230406', 'Susapaya', '230400', '230000', 1, NULL),
('230407', 'Tarucachi', '230400', '230000', 1, NULL),
('230408', 'Ticaco', '230400', '230000', 1, NULL),
('240101', 'Tumbes', '240100', '240000', 1, NULL),
('240102', 'Corrales', '240100', '240000', 1, NULL),
('240103', 'La Cruz', '240100', '240000', 1, NULL),
('240104', 'Pampas de Hospital', '240100', '240000', 1, NULL),
('240105', 'San Jacinto', '240100', '240000', 1, NULL),
('240106', 'San Juan de la Virgen', '240100', '240000', 1, NULL),
('240201', 'Zorritos', '240200', '240000', 1, NULL),
('240202', 'Casitas', '240200', '240000', 1, NULL),
('240203', 'Canoas de Punta Sal', '240200', '240000', 1, NULL),
('240301', 'Zarumilla', '240300', '240000', 1, NULL),
('240302', 'Aguas Verdes', '240300', '240000', 1, NULL),
('240303', 'Matapalo', '240300', '240000', 1, NULL),
('240304', 'Papayal', '240300', '240000', 1, NULL),
('250101', 'Calleria', '250100', '250000', 1, NULL),
('250102', 'Campoverde', '250100', '250000', 1, NULL),
('250103', 'Iparia', '250100', '250000', 1, NULL),
('250104', 'Masisea', '250100', '250000', 1, NULL),
('250105', 'Yarinacocha', '250100', '250000', 1, NULL),
('250106', 'Nueva Requena', '250100', '250000', 1, NULL),
('250107', 'Manantay', '250100', '250000', 1, NULL),
('250201', 'Raymondi', '250200', '250000', 1, NULL),
('250202', 'Sepahua', '250200', '250000', 1, NULL),
('250203', 'Tahuania', '250200', '250000', 1, NULL),
('250204', 'Yurua', '250200', '250000', 1, NULL),
('250301', 'Padre Abad', '250300', '250000', 1, NULL),
('250302', 'Irazola', '250300', '250000', 1, NULL),
('250303', 'Curimana', '250300', '250000', 1, NULL),
('250304', 'Neshuya', '250300', '250000', 1, NULL),
('250305', 'Alexander Von Humboldt', '250300', '250000', 1, NULL),
('250401', 'Purús', '250400', '250000', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_duracion`
--

CREATE TABLE `bd_duracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_duracion`
--

INSERT INTO `bd_duracion` (`id`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'medio día', '', 1, '0000-00-00 00:00:00'),
(2, 'día completo', '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_estatus_global`
--

CREATE TABLE `bd_estatus_global` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `color` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_estatus_global`
--

INSERT INTO `bd_estatus_global` (`id`, `descripcion`, `color`) VALUES
(0, 'Inactivo', '#961b01'),
(1, 'Activo', '#09af01'),
(3, 'Entrada de inventario', '#09af01'),
(4, 'Salida de inventario', '#961b01'),
(5, 'Venta anulada', '#961b01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_habitaciones`
--

CREATE TABLE `bd_habitaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_habitaciones`
--

INSERT INTO `bd_habitaciones` (`id`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'Habitaciones simple', '', 1, '2019-10-14 16:00:00'),
(2, 'Habitaciones Matrimoniales', '', 1, '2019-10-14 16:00:00'),
(3, 'HABITACIONES DOBLES', '', 1, '2019-10-14 16:00:00'),
(4, 'HABITACIONES TRIPLES', '', 1, '2019-10-14 16:00:00'),
(5, 'HABITACIONES CUADRUPLEX', '', 1, '2020-02-15 00:00:00'),
(6, 'HABITACIONES QUINTUPLEX', '', 1, '2020-02-15 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_hoteles`
--

CREATE TABLE `bd_hoteles` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf16_spanish_ci NOT NULL,
  `servicio` text COLLATE utf16_spanish_ci NOT NULL,
  `id_departamento` text COLLATE utf16_spanish_ci NOT NULL,
  `id_provincia` text COLLATE utf16_spanish_ci NOT NULL,
  `id_distrito` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_hoteles`
--

INSERT INTO `bd_hoteles` (`id`, `nombre`, `descripcion`, `servicio`, `id_departamento`, `id_provincia`, `id_distrito`, `status`, `fecha_registro`) VALUES
(1, 'Samak Wasi', '<p>El hotel se encuentra en una zona centrica, muy cerca a la plaza y a restaurantes.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-13 10:42:02'),
(2, 'Madera Labrada Lodge', '<p>Si lo tuyo es lo rústico y ecológico este hotel es una ¡Buena opción para ti!</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\r\n\r\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-14 17:05:19'),
(4, 'Casa Bosque Hotel', '<p>Si quieres estar rodeada de vegetación y sentirte como en la selva Casa Bosque es una buena opción.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Av. Circunvalacion # 2449 (A 5 min de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\r\n\r\n<p>- <strong>Check In:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-14 18:28:44'),
(5, 'Hotel Rio Cumbaza', '<p>Rio Cumbaza es un hotel tradicional y muy conocido en Tarapoto se encuentra a 4 minutos de la plaza.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>:</strong> Jr. Pedro de Urzua 515 (A 4 min aprox de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno buffet, baños privados, TV con cable, Wifi, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-14 18:47:21'),
(6, 'Hotel Nilas', '<p>Nilas es un hotel tradicional se encuentra en una zona centrica a unas cuantos metros de plaza.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Jr. Moyobamba 173 (A 30 metros de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina al aire libre, baño privado, desayuno buffet, TV con cable, Wifi, ascensor, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 15:00pm / <strong>Check out:</strong> 13:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-14 19:02:46'),
(7, 'Hotel Monte Peruvian', '<p>Monte Peruvian es un hotel muy céntrico y tiene todas las comodidas que necesitas.</p>\r\n\r\n<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n', '<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\r\n\r\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\r\n', '010000', '010100', '010101', 1, '2020-02-15 12:47:14'),
(8, 'Hotel Puma Urco', '<p>Puma Urco es un hotel tradicional que te brinda todos los servicios necesarios y que se e se encuentra a unos metros de la plaza.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\r\n\r\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\r\n', '010000', '010100', '010101', 1, '2020-02-15 14:18:15'),
(9, 'Hotel La Mansion', '<p>La Mansión es un hotel centrico que se encuentra a unos metros de la plaza, cuenta con piscina al aire libre.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\r\n\r\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\r\n', '220000', '220900', '220901', 1, '2020-02-17 11:00:14'),
(10, 'Hotel Villa de Paris', '<p>Villa de Paris es uno de nuestros hoteles mas solicitados en Chachapoyas, te brinda un buen servicio y se encuentra a 7 minutos de la plaza.</p>\r\n\r\n<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n', '<p><strong>- Ubicación</strong><strong>: </strong>Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)</p>\r\n\r\n<p><strong>- Servicios: </strong>Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.</p>\r\n\r\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\r\n', '010000', '010100', '010101', 1, '2020-02-17 16:27:10'),
(11, 'Hotel Urpi', '<p>Con este hotel tendrás todas las comodidades se encuentra a 7 minutos de la plaza de Armas de Cusco.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Av. Confraternidad 426 B-1  (A 7 min de la Plaza de Armas - Cusco)</p>\r\n\r\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, etc.</p>\r\n\r\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\r\n\r\n<p> </p>\r\n', '080000', '080100', '080101', 1, '2020-02-17 17:18:33'),
(12, 'Hotel Kusipaqari', '<p>Este hotel es el más solicitado de nuestros clientes, tiene todos los servicios principales y se encuentra a unas cuadras de la plaza de Armas de Cusco.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\r\n\r\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\r\n\r\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\r\n', '080000', '080100', '080101', 1, '2020-02-17 18:00:20'),
(13, 'Hotel Monasterio San Pedro', '<p>El Hotel Monasterio San Pedro tiene un estilo tradicional es un hotel de lujo y te brinda todos los servicios necesarios se encuentra a unas cuadras de la plaza de Armas.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Calle Cascaparo 116  (A 6 cuadras de la Plaza de Armas - Cusco)</p>\r\n\r\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc</p>\r\n\r\n<p><strong>- Check in:</strong> 12:00 hrs <strong>Check out:</strong> 10:00hrs</p>\r\n', '080000', '080100', '080101', 1, '2020-02-17 18:08:33'),
(14, 'hotel seven mapi', '<p>Seven Mapi es un hotel que tiene todas las comodidades y se encuentra muy cerca ala Estacion de tren, les recomendamos sus servicios.</p>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p><strong>- Ubicación</strong><strong>: </strong>Calle Wiñaywayna 100 C-12, Aguas Calientes (A la espalda de la Estación de Tren)</p>\r\n\r\n<p><strong>- Servicios:</strong> Asistencia recojo de la Estacion de Tren, desayuno buffet, Wifi, calefaccion, TV con Cable, etc.</p>\r\n\r\n<p>- <strong>Check in: </strong>12:00 hrs <strong>Check out:</strong> 9:30 hrs</p>\r\n', '080000', '081300', '081304', 0, '2020-02-17 18:15:41'),
(15, 'Hostal Uspalay', '<p>El Hostal Uspalay tiene todas las comodidades que te harán sentir como en casa, tiene una terraza con una hermosa vista y esta a unas cuadras de la plaza.</p>\r\n', '<p><strong>- Ubicación: </strong>Calle Mercaderes, 142 (A 1 cuadra de la Plaza de Armas de Arequipa)</p>\r\n\r\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, TV con cable, Wifi, etc.</p>\r\n\r\n<p><strong>- Check in:</strong> 11:30AM <strong>Check out:</strong> 11:00AM</p>\r\n', '040000', '040100', '040101', 1, '2020-02-18 18:23:12'),
(16, 'Hotel Riviera Colonial', '<p>Este hotel Riviera Colonial es el más solicitado por nuestros clientes tiene todos los servicios que se necesita para su estadía sea placentera, se encuentra a unos metros de la plaza.</p>\r\n', '<p><strong>- Ubicación</strong><strong>: </strong>Calle Puente Bolognesi 114, Arequipa (A media cuadra de la Plaza de Arequipa)</p>\r\n\r\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, Tv con cable, Wifi, etc.</p>\r\n\r\n<p>- <strong>Check in: </strong>13:00hrs<strong> Check out: </strong>11:00hrs</p>\r\n', '040000', '040100', '040101', 1, '2020-02-18 18:38:29'),
(17, 'Hotel Las Flores', '<p>Las Flores es un hotel que tiene todas las comodidas y brinda un servicio de calidad se encuentra a 10min de la plaza de Ica.</p>\r\n', '<p><strong>- Ubicación: </strong>Urb. Las Flores de San José (A 10 min de la plaza de armas de Ica)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina, desayuno americano, baño privado, tv con cable, wifi, agua caliente, etc.</p>\r\n\r\n<p><strong>- Check in: </strong>14:00 hrs<strong> Check out: </strong>12:00hrs</p>\r\n\r\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 7am a 9:30 am</p>\r\n', '110000', '110100', '110101', 1, '2020-02-19 12:21:52'),
(18, 'Hotel Sol de Ica', '<p>Sol de Ica es nuestro hotel mas solicitado tiene todas las comodidades que se necesitan para que tu estadía sea placentera se encuentra a una cuadra de plaza de Ica.</p>\r\n', '<p><strong>- Ubicación: </strong>&lt;!-- x-tinymce/html --&gt;Calle Lima 265 (A 200 metros aprox de la Plaza de Armas - Ica)</p>\r\n\r\n<p><strong>- Servicios: </strong>Piscina, desayuno buffet, baño privado, tv con cable, wifi, agua caliente, etc.</p>\r\n\r\n<p><strong>- Check in: </strong>13:00 hrs<strong> Check out: </strong>12:00hrs</p>\r\n\r\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 6:30am a 9:30 am</p>\r\n', '110000', '110100', '110101', 1, '2020-02-19 12:30:29'),
(19, 'HOTEL INTERNAZIONALE   ', '<p>awdeAFDAS</p>\r\n', '<p>Desayuno americano o continental (Horario de atención: 7:00 a 09:30 hrs)</p>\r\n\r\n<p>Mate de coca (infusion)<br>\r\nWifi (internet)<br>\r\nTv (cable)<br>\r\nBaño privado</p>\r\n', '050000', '050100', '050101', 0, '2020-03-05 12:25:25'),
(20, 'Hotel Santa Rosa', '<p>Este hotel se encuentra ubicado a unos metros de la plaza tiene todas las comodidas que se necesita para tu estadía en Ayacucho sea inolvidable.</p>\r\n', '<p><strong>- Ubicación: </strong>Jr. Lima 166 Ayacucho, Perú (A 200 metros de la Plaza de Armas de Ayacucho)</p>\r\n\r\n<p><strong>- Servicios:</strong> Desayuno buffet, baño privado, TV con cable, Wifi, etc.</p>\r\n\r\n<p><strong>- Check in:</strong> 13:00 Hrs <strong>Check out:</strong> 12:00 Hrs</p>\r\n', '050000', '050100', '050101', 0, '2020-03-06 17:02:43'),
(21, 'Hotel Sevilla', '<p>El Hotel Sevilla se encuentra muy cerca a 2 cuadras de la plaza de Armas es un hotel tradicional su infraestructura es parecido a una casona.</p>\r\n', '<p><strong>- Ubicación: </strong>Jr Libertad 631, Ayacucho, Perú (A 2 cuadras de la Plaza de Armas de Ayacucho)</p>\r\n\r\n<p><strong>- Servicios:</strong> Desayuno continental, baño privado, TV con cable, Wifi, etc.</p>\r\n\r\n<p><strong>- Check in:</strong> 12:00 Hrs <strong>Check out:</strong> 11:00 Hrs</p>\r\n', '050000', '050100', '050101', 1, '2020-03-06 17:39:56'),
(22, 'test prueba', '<p>rrrrrrrrrrrrrr</p>\r\n', '<p>eeeeeeeeeeeeeeeeeee</p>\r\n', '010000', '010300', '010304', 1, '2020-07-13 23:33:15'),
(23, 'mierda', '<p>aaaaaaaaaaaa</p>\r\n', '<p>ssssssssssss</p>\r\n', '150000', '150200', '150202', 1, '2020-07-14 17:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_hoteles_habitaciones_dia`
--

CREATE TABLE `bd_hoteles_habitaciones_dia` (
  `id` int(11) NOT NULL,
  `id_hoteles` int(11) NOT NULL,
  `id_habitaciones` int(11) NOT NULL,
  `cantidad_habitaciones` int(11) NOT NULL,
  `disponibilidad` varchar(11) COLLATE utf16_spanish_ci NOT NULL,
  `precio_minimo` decimal(10,2) NOT NULL,
  `precio_maximo` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_disponibilidad` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_hoteles_habitaciones_dia`
--

INSERT INTO `bd_hoteles_habitaciones_dia` (`id`, `id_hoteles`, `id_habitaciones`, `cantidad_habitaciones`, `disponibilidad`, `precio_minimo`, `precio_maximo`, `status`, `fecha_disponibilidad`) VALUES
(1, 1, 1, 3, 'SI', '50.00', '60.00', 1, '2020-02-13 10:42:02'),
(2, 2, 2, 4, 'SI', '160.00', '170.00', 1, '2020-02-14 17:05:19'),
(3, 2, 1, 3, 'SI', '110.00', '120.00', 1, '2020-02-14 17:05:19'),
(4, 2, 3, 4, 'SI', '160.00', '170.00', 1, '2020-02-14 17:05:19'),
(5, 2, 4, 2, 'SI', '210.00', '220.00', 1, '2020-02-14 17:05:19'),
(6, 1, 2, 4, 'SI', '80.00', '90.00', 1, '2020-02-14 17:29:54'),
(7, 1, 3, 3, 'SI', '80.00', '90.00', 1, '2020-02-14 17:31:24'),
(8, 1, 4, 1, 'SI', '100.00', '110.00', 1, '2020-02-14 17:34:16'),
(9, 3, 1, 2, 'SI', '120.00', '130.00', 1, '2020-02-14 18:06:25'),
(10, 3, 2, 3, 'SI', '170.00', '180.00', 1, '2020-02-14 18:06:25'),
(11, 3, 3, 3, 'SI', '170.00', '180.00', 1, '2020-02-14 18:06:25'),
(12, 3, 4, 2, 'SI', '210.00', '220.00', 1, '2020-02-14 18:06:25'),
(13, 4, 1, 3, 'SI', '120.00', '130.00', 1, '2020-02-14 18:28:44'),
(14, 4, 2, 4, 'SI', '170.00', '175.00', 1, '2020-02-14 18:28:44'),
(15, 4, 3, 3, 'SI', '170.00', '175.00', 1, '2020-02-14 18:28:44'),
(16, 4, 4, 3, 'SI', '220.00', '225.00', 1, '2020-02-14 18:28:44'),
(17, 5, 1, 3, 'SI', '140.00', '145.00', 1, '2020-02-14 18:47:21'),
(18, 5, 3, 4, 'SI', '180.00', '190.00', 1, '2020-02-14 18:47:21'),
(19, 5, 2, 4, 'SI', '180.00', '190.00', 1, '2020-02-14 18:47:21'),
(20, 5, 4, 3, 'SI', '230.00', '240.00', 1, '2020-02-14 18:47:21'),
(21, 6, 1, 3, 'SI', '150.00', '160.00', 1, '2020-02-14 19:02:46'),
(22, 6, 2, 4, 'SI', '190.00', '200.00', 1, '2020-02-14 19:02:46'),
(23, 6, 3, 4, 'SI', '210.00', '220.00', 1, '2020-02-14 19:02:46'),
(24, 6, 4, 4, 'SI', '230.00', '240.00', 1, '2020-02-14 19:02:46'),
(25, 7, 1, 3, 'SI', '90.00', '100.00', 1, '2020-02-15 12:47:14'),
(26, 7, 2, 3, 'SI', '130.00', '140.00', 1, '2020-02-15 12:47:14'),
(27, 7, 3, 4, 'SI', '130.00', '140.00', 1, '2020-02-15 12:47:14'),
(28, 7, 4, 3, 'SI', '165.00', '175.00', 1, '2020-02-15 12:47:14'),
(29, 8, 1, 2, 'SI', '100.00', '110.00', 1, '2020-02-15 14:18:15'),
(30, 8, 2, 3, 'SI', '150.00', '160.00', 1, '2020-02-15 14:18:15'),
(31, 8, 3, 3, 'SI', '150.00', '160.00', 1, '2020-02-15 14:18:15'),
(32, 8, 4, 2, 'SI', '180.00', '190.00', 1, '2020-02-15 14:18:15'),
(33, 8, 5, 1, 'SI', '240.00', '250.00', 1, '2020-02-15 14:18:15'),
(34, 1, 5, 1, 'SI', '125.00', '135.00', 1, '2020-02-15 14:20:12'),
(35, 2, 5, 3, 'SI', '260.00', '270.00', 1, '2020-02-15 14:21:57'),
(36, 2, 6, 2, 'SI', '275.00', '285.00', 1, '2020-02-15 14:24:13'),
(37, 9, 1, 2, 'SI', '100.00', '105.00', 1, '2020-02-17 11:00:14'),
(38, 9, 2, 4, 'SI', '120.00', '130.00', 1, '2020-02-17 11:00:14'),
(39, 9, 3, 3, 'SI', '120.00', '130.00', 1, '2020-02-17 11:00:14'),
(40, 9, 5, 2, 'SI', '220.00', '230.00', 1, '2020-02-17 11:00:14'),
(41, 9, 4, 2, 'SI', '180.00', '190.00', 1, '2020-02-17 11:00:14'),
(42, 10, 1, 2, 'SI', '130.00', '140.00', 1, '2020-02-17 16:27:10'),
(43, 10, 2, 4, 'SI', '190.00', '200.00', 1, '2020-02-17 16:27:10'),
(44, 10, 3, 3, 'SI', '190.00', '200.00', 1, '2020-02-17 16:27:10'),
(45, 10, 4, 3, 'SI', '255.00', '265.00', 1, '2020-02-17 16:27:10'),
(46, 10, 5, 2, 'SI', '315.00', '325.00', 1, '2020-02-17 16:27:10'),
(47, 7, 5, 2, 'SI', '200.00', '210.00', 1, '2020-02-17 16:32:13'),
(48, 11, 1, 1, 'SI', '85.00', '95.00', 1, '2020-02-17 17:18:33'),
(49, 11, 2, 3, 'SI', '85.00', '95.00', 1, '2020-02-17 17:42:36'),
(50, 11, 3, 4, 'SI', '85.00', '95.00', 1, '2020-02-17 17:44:02'),
(51, 11, 4, 3, 'SI', '115.00', '125.00', 1, '2020-02-17 17:46:26'),
(52, 11, 5, 3, 'SI', '150.00', '160.00', 1, '2020-02-17 17:49:06'),
(53, 12, 1, 2, 'SI', '115.00', '125.00', 1, '2020-02-17 18:00:20'),
(54, 12, 2, 4, 'SI', '150.00', '160.00', 1, '2020-02-17 18:00:20'),
(55, 12, 3, 3, 'SI', '150.00', '160.00', 1, '2020-02-17 18:00:20'),
(56, 12, 4, 3, 'SI', '225.00', '235.00', 1, '2020-02-17 18:00:20'),
(57, 12, 5, 2, 'SI', '280.00', '290.00', 1, '2020-02-17 18:00:20'),
(58, 13, 1, 2, 'SI', '265.00', '275.00', 1, '2020-02-17 18:08:33'),
(59, 13, 2, 3, 'SI', '280.00', '290.00', 1, '2020-02-17 18:08:33'),
(60, 13, 3, 3, 'SI', '280.00', '290.00', 1, '2020-02-17 18:08:33'),
(61, 13, 4, 2, 'SI', '380.00', '390.00', 1, '2020-02-17 18:08:33'),
(62, 14, 1, 2, 'SI', '115.00', '125.00', 1, '2020-02-17 18:15:41'),
(63, 14, 2, 3, 'SI', '150.00', '160.00', 1, '2020-02-17 18:15:41'),
(64, 14, 3, 3, 'SI', '150.00', '160.00', 1, '2020-02-17 18:15:41'),
(65, 14, 4, 2, 'SI', '225.00', '235.00', 1, '2020-02-17 18:15:41'),
(66, 15, 1, 3, 'SI', '85.00', '95.00', 1, '2020-02-18 18:23:12'),
(67, 15, 2, 2, 'SI', '130.00', '140.00', 1, '2020-02-18 18:23:12'),
(68, 15, 3, 2, 'SI', '130.00', '140.00', 1, '2020-02-18 18:23:12'),
(69, 15, 4, 1, 'SI', '160.00', '170.00', 1, '2020-02-18 18:23:12'),
(70, 16, 1, 2, 'SI', '145.00', '155.00', 1, '2020-02-18 18:38:29'),
(71, 16, 2, 3, 'SI', '180.00', '190.00', 1, '2020-02-18 18:38:29'),
(72, 16, 3, 3, 'SI', '180.00', '190.00', 1, '2020-02-18 18:38:29'),
(73, 16, 4, 2, 'SI', '220.00', '230.00', 1, '2020-02-18 18:38:29'),
(74, 17, 1, 2, 'SI', '140.00', '150.00', 1, '2020-02-19 12:21:52'),
(75, 17, 2, 3, 'SI', '230.00', '240.00', 1, '2020-02-19 12:21:53'),
(76, 17, 3, 2, 'SI', '230.00', '240.00', 1, '2020-02-19 12:21:53'),
(77, 17, 4, 2, 'SI', '290.00', '300.00', 1, '2020-02-19 12:21:53'),
(78, 18, 2, 3, 'SI', '240.00', '250.00', 1, '2020-02-19 12:30:29'),
(79, 18, 3, 2, 'SI', '240.00', '250.00', 1, '2020-02-19 12:30:29'),
(80, 18, 1, 2, 'SI', '190.00', '200.00', 1, '2020-02-19 12:30:29'),
(81, 18, 4, 2, 'SI', '290.00', '300.00', 1, '2020-02-19 12:30:29'),
(82, 19, 1, 2, 'SI', '120.00', '130.00', 1, '2020-03-05 12:25:25'),
(83, 19, 2, 3, 'SI', '190.00', '200.00', 1, '2020-03-05 12:25:25'),
(84, 19, 3, 2, 'SI', '190.00', '200.00', 1, '2020-03-05 12:25:25'),
(85, 19, 4, 2, 'SI', '230.00', '240.00', 1, '2020-03-05 12:25:25'),
(86, 20, 3, 2, 'SI', '175.00', '185.00', 1, '2020-03-06 17:02:43'),
(87, 20, 2, 2, 'SI', '160.00', '170.00', 1, '2020-03-06 17:02:43'),
(88, 20, 1, 2, 'SI', '130.00', '140.00', 1, '2020-03-06 17:02:43'),
(89, 20, 4, 1, 'SI', '225.00', '235.00', 1, '2020-03-06 17:02:43'),
(90, 21, 2, 2, 'SI', '140.00', '150.00', 1, '2020-03-06 17:39:56'),
(91, 21, 1, 2, 'SI', '115.00', '125.00', 1, '2020-03-06 17:39:56'),
(92, 21, 3, 2, 'SI', '160.00', '170.00', 1, '2020-03-06 17:39:56'),
(93, 21, 4, 2, 'SI', '205.00', '215.00', 1, '2020-03-06 17:39:56'),
(94, 22, 1, 1, 'SI', '120.00', '120.00', 1, '2020-07-13 23:33:15'),
(95, 22, 2, 1, 'SI', '12.22', '12.23', 1, '2020-07-14 16:44:12'),
(96, 23, 1, 1, 'SI', '1.00', '2.00', 1, '2020-07-14 17:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_hoteles_habitaciones_info`
--

CREATE TABLE `bd_hoteles_habitaciones_info` (
  `id` int(11) NOT NULL,
  `id_hoteles` int(11) NOT NULL,
  `id_habitaciones` int(11) NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `id_monedas` int(11) NOT NULL,
  `servicios` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_hoteles_habitaciones_info`
--

INSERT INTO `bd_hoteles_habitaciones_info` (`id`, `id_hoteles`, `id_habitaciones`, `cantidad_personas`, `id_monedas`, `servicios`, `status`, `fecha_registro`) VALUES
(1, 1, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-13 10:42:02'),
(2, 2, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:05:19'),
(3, 2, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:05:19'),
(4, 2, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:05:19'),
(5, 2, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:05:19'),
(6, 1, 2, 2, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:29:54'),
(7, 1, 3, 2, 1, '<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:31:24'),
(8, 1, 4, 3, 1, '<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 17:34:16'),
(9, 3, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>:</strong> Jr. Progreso 680 (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:06:25'),
(10, 3, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Jr. Progreso 680 (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:06:25'),
(11, 3, 3, 2, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>:</strong> Jr. Progreso 680 (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:06:25'),
(12, 3, 4, 3, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>:</strong> Jr. Progreso 680 (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:06:25'),
(13, 4, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Av. Circunvalacion # 2449 (A 5 min de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 18:28:44'),
(14, 4, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Circunvalacion # 2449 (A 5 min de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 18:28:44'),
(15, 4, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Circunvalacion # 2449 (A 5 min de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 18:28:44'),
(16, 4, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Circunvalacion # 2449 (A 5 min de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-14 18:28:44'),
(17, 5, 1, 1, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Jr. Pedro de Urzua 515 (A 4 min aprox de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno buffet, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:47:21'),
(18, 5, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Jr. Pedro de Urzua 515 (A 4 min aprox de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno buffet, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:47:21'),
(19, 5, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Jr. Pedro de Urzua 515 (A 4 min aprox de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno buffet, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:47:21'),
(20, 5, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Jr. Pedro de Urzua 515 (A 4 min aprox de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno buffet, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 18:47:21'),
(21, 6, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Jr. Moyobamba 173 (A 30 metros de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, baño privado, desayuno buffet, TV con cable, Wifi, ascensor, etc.</p>\n\n<p>- <strong>Check in:</strong> 15:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 19:02:46'),
(22, 6, 2, 2, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Jr. Moyobamba 173 (A 30 metros de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, baño privado, desayuno buffet, TV con cable, Wifi, ascensor, etc.</p>\n\n<p>- <strong>Check in:</strong> 15:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 19:02:46'),
(23, 6, 3, 2, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Jr. Moyobamba 173 (A 30 metros de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, baño privado, desayuno buffet, TV con cable, Wifi, ascensor, etc.</p>\n\n<p>- <strong>Check in:</strong> 15:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 19:02:46'),
(24, 6, 4, 3, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Jr. Moyobamba 173 (A 30 metros de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, baño privado, desayuno buffet, TV con cable, Wifi, ascensor, etc.</p>\n\n<p>- <strong>Check in:</strong> 15:00pm / <strong>Check out:</strong> 13:00pm</p>\n', 1, '2020-02-14 19:02:46'),
(25, 7, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 12:47:14'),
(26, 7, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 12:47:14'),
(27, 7, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 12:47:14'),
(28, 7, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 12:47:14'),
(29, 8, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:18:15'),
(30, 8, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:18:15'),
(31, 8, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:18:15'),
(32, 8, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:18:15'),
(33, 8, 5, 4, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Jiron Amazonas  (A 300 metros de la plaza de Armas - de Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:18:15'),
(34, 1, 5, 4, 1, '<p><strong>- Ubicación:</strong> Jr. Cahuide 362  (A 3 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 13:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:20:12'),
(35, 2, 5, 4, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:21:57'),
(36, 2, 6, 5, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Pasaje Santa Monica (A 7 minutos de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios: </strong>Piscina al aire libre, desayuno continental,  baños privados, TV con cable, Wifi, etc.</p>\n\n<p>- <strong>Check In:</strong> 13:00pm /<strong> Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-15 14:24:13'),
(37, 9, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, recojo y traslado del aeropuerto, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 11:00:14'),
(38, 9, 2, 2, 1, '<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 11:00:14'),
(39, 9, 3, 2, 1, '<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 11:00:14'),
(40, 9, 5, 4, 1, '<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 11:00:14'),
(41, 9, 4, 3, 1, '<p><strong>- Ubicación:</strong> Jr. Maynas 286 (A 2 cuadras de la Plaza de Armas - Tarapoto)</p>\n\n<p><strong>- Servicios:</strong> Piscina al aire libre, desayuno americano, baños privados, TV con cable, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm19</p>\n', 1, '2020-02-17 11:00:14'),
(42, 10, 1, 1, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 16:27:10'),
(43, 10, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n', 1, '2020-02-17 16:27:10'),
(44, 10, 3, 2, 1, '- Ubicación: Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)\n\n- Servicios: Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.\n\n- Check in: 14:00pm / Check Out: 12:00pm', 1, '2020-02-17 16:27:10'),
(45, 10, 4, 3, 1, '- Ubicación: Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)\n\n- Servicios: Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.\n\n- Check in: 14:00pm / Check Out: 12:00pm', 1, '2020-02-17 16:27:10'),
(46, 10, 5, 4, 1, '- Ubicación: Prolongación dos de mayo (A 7 minutos aprox. de la Plaza de Armas - Chachapoyas)\n\n- Servicios: Desayuno buffet, baños privados, TV con cable, wifi (en áreas común), etc.\n\n- Check in: 14:00pm / Check Out: 12:00pm', 1, '2020-02-17 16:27:10'),
(47, 7, 5, 4, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Libertad 692  (A 4 minutos de la Plaza de Armas - Chachapoyas)</p>\n\n<p><strong>- Servicios: </strong>Desayuno americano, baños privados, TV con cable, wifi, etc.</p>\n\n<p>- <strong>Check in:</strong> 14:00pm / <strong>Check Out:</strong> 12:00pm</p>\n\n<p><strong>**Habitación de 2 camas de 2 plazas**</strong></p>\n', 0, '2020-02-17 16:32:13'),
(48, 11, 1, 1, 1, '<p>dsada</p>\n', 1, '2020-02-17 17:18:33'),
(49, 11, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Confraternidad 426 B-1  (A 7 min de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 17:42:36'),
(50, 11, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Confraternidad 426 B-1  (A 7 min de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 17:44:02'),
(51, 11, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Confraternidad 426 B-1  (A 7 min de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 17:46:26'),
(52, 11, 5, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Av. Confraternidad 426 B-1  (A 7 min de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 0, '2020-02-17 17:49:06'),
(53, 12, 1, 1, 1, '<p>&lt;!-- x-tinymce/html --&gt;</p>\n\n<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:00:20'),
(54, 12, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:00:20'),
(55, 12, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:00:20'),
(56, 12, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:00:20'),
(57, 12, 5, 4, 1, '<p><strong>- Ubicación</strong><strong>:</strong> Meson De La Estrella 120(A 4 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc.</p>\n\n<p><strong>- Check in:</strong> 11:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 0, '2020-02-17 18:00:20'),
(58, 13, 1, 1, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Cascaparo 116  (A 6 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc</p>\n\n<p><strong>- Check in:</strong> 12:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:08:33'),
(59, 13, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Cascaparo 116  (A 6 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc</p>\n\n<p><strong>- Check in:</strong> 12:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:08:33'),
(60, 13, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Cascaparo 116  (A 6 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc</p>\n\n<p><strong>- Check in:</strong> 12:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:08:33'),
(61, 13, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Cascaparo 116  (A 6 cuadras de la Plaza de Armas - Cusco)</p>\n\n<p>- <strong>Servicios:</strong> Desayuno buffet, Wifi, baño privado, agua caliente, TV con cable, calefacción, etc</p>\n\n<p><strong>- Check in:</strong> 12:00 hrs <strong>Check out:</strong> 10:00hrs</p>\n', 1, '2020-02-17 18:08:33'),
(62, 14, 1, 1, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Wiñaywayna 100 C-12, Aguas Calientes (A la espalda de la Estación de Tren)</p>\n\n<p><strong>- Servicios:</strong> Asistencia recojo de la Estacion de Tren, desayuno buffet, Wifi, calefaccion, TV con Cable, etc.</p>\n\n<p>- <strong>Check in: </strong>12:00 hrs <strong>Check out:</strong> 9:30 hrs</p>\n', 1, '2020-02-17 18:15:41'),
(63, 14, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Wiñaywayna 100 C-12, Aguas Calientes (A la espalda de la Estación de Tren)</p>\n\n<p><strong>- Servicios:</strong> Asistencia recojo de la Estacion de Tren, desayuno buffet, Wifi, calefaccion, TV con Cable, etc.</p>\n\n<p>- <strong>Check in: </strong>12:00 hrs <strong>Check out:</strong> 9:30 hrs</p>\n', 1, '2020-02-17 18:15:41'),
(64, 14, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Wiñaywayna 100 C-12, Aguas Calientes (A la espalda de la Estación de Tren)</p>\n\n<p><strong>- Servicios:</strong> Asistencia recojo de la Estacion de Tren, desayuno buffet, Wifi, calefaccion, TV con Cable, etc.</p>\n\n<p>- <strong>Check in: </strong>12:00 hrs <strong>Check out:</strong> 9:30 hrs</p>\n', 1, '2020-02-17 18:15:41'),
(65, 14, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Wiñaywayna 100 C-12, Aguas Calientes (A la espalda de la Estación de Tren)</p>\n\n<p><strong>- Servicios:</strong> Asistencia recojo de la Estacion de Tren, desayuno buffet, Wifi, calefaccion, TV con Cable, etc.</p>\n\n<p>- <strong>Check in: </strong>12:00 hrs <strong>Check out:</strong> 9:30 hrs</p>\n', 1, '2020-02-17 18:15:41'),
(66, 15, 1, 1, 1, '<p><strong>- Ubicación: </strong>Calle Mercaderes, 142 (A 1 cuadra de la Plaza de Armas de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 11:30AM <strong>Check out:</strong> 11:00AM</p>\n', 1, '2020-02-18 18:23:12'),
(67, 15, 2, 2, 1, '<p><strong>- Ubicación: </strong>Calle Mercaderes, 142 (A 1 cuadra de la Plaza de Armas de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 11:30AM <strong>Check out:</strong> 11:00AM</p>\n', 1, '2020-02-18 18:23:12'),
(68, 15, 3, 2, 1, '<p><strong>- Ubicación: </strong>Calle Mercaderes, 142 (A 1 cuadra de la Plaza de Armas de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 11:30AM <strong>Check out:</strong> 11:00AM</p>\n', 1, '2020-02-18 18:23:12'),
(69, 15, 4, 3, 1, '<p><strong>- Ubicación: </strong>Calle Mercaderes, 142 (A 1 cuadra de la Plaza de Armas de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 11:30AM <strong>Check out:</strong> 11:00AM</p>\n', 1, '2020-02-18 18:23:12'),
(70, 16, 1, 1, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Puente Bolognesi 114, Arequipa (A media cuadra de la Plaza de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, Tv con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in: </strong>13:00hrs<strong> Check out: </strong>11:00hrs</p>\n', 1, '2020-02-18 18:38:29'),
(71, 16, 2, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Puente Bolognesi 114, Arequipa (A media cuadra de la Plaza de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, Tv con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in: </strong>13:00hrs<strong> Check out: </strong>11:00hrs</p>\n', 1, '2020-02-18 18:38:29'),
(72, 16, 3, 2, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Puente Bolognesi 114, Arequipa (A media cuadra de la Plaza de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, Tv con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in: </strong>13:00hrs<strong> Check out: </strong>11:00hrs</p>\n', 1, '2020-02-18 18:38:29'),
(73, 16, 4, 3, 1, '<p><strong>- Ubicación</strong><strong>: </strong>Calle Puente Bolognesi 114, Arequipa (A media cuadra de la Plaza de Arequipa)</p>\n\n<p><strong>- Servicios:</strong> Desayuno americano, baño privado, Tv con cable, Wifi, etc.</p>\n\n<p>- <strong>Check in: </strong>13:00hrs<strong> Check out: </strong>11:00hrs</p>\n', 1, '2020-02-18 18:38:29'),
(74, 17, 1, 1, 1, '<p><strong>- Ubicación: </strong>Urb. Las Flores de San José (A 10 min de la plaza de armas de Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno americano, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>14:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 7am a 9:30 am</p>\n', 1, '2020-02-19 12:21:52'),
(75, 17, 2, 2, 1, '<p><strong>- Ubicación: </strong>Urb. Las Flores de San José (A 10 min de la plaza de armas de Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno americano, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>14:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 7am a 9:30 am</p>\n', 1, '2020-02-19 12:21:53'),
(76, 17, 3, 2, 1, '<p><strong>- Ubicación: </strong>Urb. Las Flores de San José (A 10 min de la plaza de armas de Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno americano, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>14:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 7am a 9:30 am</p>\n', 1, '2020-02-19 12:21:53'),
(77, 17, 4, 3, 1, '<p><strong>- Ubicación: </strong>Urb. Las Flores de San José (A 10 min de la plaza de armas de Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno americano, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>14:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 7am a 9:30 am</p>\n', 1, '2020-02-19 12:21:53'),
(78, 18, 2, 2, 1, '<p><strong>- Ubicación: </strong>&lt;!-- x-tinymce/html --&gt;Calle Lima 265 (A 200 metros aprox de la Plaza de Armas - Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno buffet, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>13:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 6:30am a 9:30 am</p>\n', 1, '2020-02-19 12:30:29'),
(79, 18, 3, 2, 1, '<p><strong>- Ubicación: </strong>&lt;!-- x-tinymce/html --&gt;Calle Lima 265 (A 200 metros aprox de la Plaza de Armas - Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno buffet, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>13:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 6:30am a 9:30 am</p>\n', 1, '2020-02-19 12:30:29'),
(80, 18, 1, 1, 1, '<p><strong>- Ubicación: </strong>&lt;!-- x-tinymce/html --&gt;Calle Lima 265 (A 200 metros aprox de la Plaza de Armas - Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno buffet, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>13:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 6:30am a 9:30 am</p>\n', 1, '2020-02-19 12:30:29'),
(81, 18, 4, 3, 1, '<p><strong>- Ubicación: </strong>&lt;!-- x-tinymce/html --&gt;Calle Lima 265 (A 200 metros aprox de la Plaza de Armas - Ica)</p>\n\n<p><strong>- Servicios: </strong>Piscina, desayuno buffet, baño privado, tv con cable, wifi, agua caliente, etc.</p>\n\n<p><strong>- Check in: </strong>13:00 hrs<strong> Check out: </strong>12:00hrs</p>\n\n<p><strong>- Importante:</strong> Desayuno (Servido en mesa) de 6:30am a 9:30 am</p>\n', 1, '2020-02-19 12:30:29'),
(82, 19, 1, 1, 1, '<p>FSDFSD</p>\n', 1, '2020-03-05 12:25:25'),
(83, 19, 2, 2, 1, '<p>adsdas</p>\n', 1, '2020-03-05 12:25:25'),
(84, 19, 3, 2, 1, '<p>dfsdfdfs</p>\n', 1, '2020-03-05 12:25:25'),
(85, 19, 4, 3, 1, '<p>asDdssaf</p>\n', 1, '2020-03-05 12:25:25'),
(86, 20, 3, 2, 1, '<p><strong>- Ubicación: </strong>Jr. Lima 166 Ayacucho, Perú (A 200 metros de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno buffet, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 13:00 Hrs <strong>Check out:</strong> 12:00 Hrs</p>\n', 1, '2020-03-06 17:02:43'),
(87, 20, 2, 2, 1, '<p><strong>- Ubicación: </strong>Jr. Lima 166 Ayacucho, Perú (A 200 metros de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno buffet, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 13:00 Hrs <strong>Check out:</strong> 12:00 Hrs</p>\n', 1, '2020-03-06 17:02:43'),
(88, 20, 1, 1, 1, '<p><strong>- Ubicación: </strong>Jr. Lima 166 Ayacucho, Perú (A 200 metros de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno buffet, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 13:00 Hrs <strong>Check out:</strong> 12:00 Hrs</p>\n', 1, '2020-03-06 17:02:43'),
(89, 20, 4, 3, 1, '<p><strong>- Ubicación: </strong>Jr. Lima 166 Ayacucho, Perú (A 200 metros de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno buffet, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 13:00 Hrs <strong>Check out:</strong> 12:00 Hrs</p>\n', 1, '2020-03-06 17:02:43'),
(90, 21, 2, 2, 1, '<p><strong>- Ubicación: </strong>Jr Libertad 631, Ayacucho, Perú (A 2 cuadras de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno continental, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 12:00 Hrs <strong>Check out:</strong> 11:00 Hrs</p>\n', 1, '2020-03-06 17:39:56'),
(91, 21, 1, 1, 1, '<p><strong>- Ubicación: </strong>Jr Libertad 631, Ayacucho, Perú (A 2 cuadras de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno continental, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 12:00 Hrs <strong>Check out:</strong> 11:00 Hrs</p>\n', 1, '2020-03-06 17:39:56'),
(92, 21, 3, 2, 1, '<p><strong>- Ubicación: </strong>Jr Libertad 631, Ayacucho, Perú (A 2 cuadras de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno continental, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 12:00 Hrs <strong>Check out:</strong> 11:00 Hrs</p>\n', 1, '2020-03-06 17:39:56'),
(93, 21, 4, 3, 1, '<p><strong>- Ubicación: </strong>Jr Libertad 631, Ayacucho, Perú (A 2 cuadras de la Plaza de Armas de Ayacucho)</p>\n\n<p><strong>- Servicios:</strong> Desayuno continental, baño privado, TV con cable, Wifi, etc.</p>\n\n<p><strong>- Check in:</strong> 12:00 Hrs <strong>Check out:</strong> 11:00 Hrs</p>\n', 1, '2020-03-06 17:39:56'),
(94, 22, 1, 1, 1, '<p>test prueba</p>\n', 1, '2020-07-13 23:33:15'),
(95, 22, 2, 1, 1, '<p>sssssssssss</p>\n', 1, '2020-07-14 16:44:12'),
(96, 23, 1, 1, 1, '<p>33333333</p>\n', 1, '2020-07-14 17:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_hoteles_imagenes`
--

CREATE TABLE `bd_hoteles_imagenes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf16_spanish_ci NOT NULL,
  `nombre_extension` text COLLATE utf16_spanish_ci NOT NULL,
  `alt_seo` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL,
  `id_hoteles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_hoteles_imagenes`
--

INSERT INTO `bd_hoteles_imagenes` (`id`, `nombre`, `nombre_extension`, `alt_seo`, `status`, `fecha_registro`, `id_hoteles`) VALUES
(1, '136546734', '136546734.jpg', '', 1, '2020-02-13 10:42:02', 1),
(2, '12963644_1099507643446680_507840388895937460_n', '12963644_1099507643446680_507840388895937460_n.jpg', '', 1, '2020-02-14 17:05:19', 2),
(3, 'BUBINZANA MAGICAL LODGE-2', 'BUBINZANA MAGICAL LODGE-2.jpg', '', 1, '2020-02-14 18:06:25', 3),
(4, '45463942', '45463942.jpg', '', 1, '2020-02-14 18:06:25', 3),
(6, '234703479', '234703479.jpg', '', 1, '2020-02-14 18:28:44', 4),
(7, '122315775', '122315775.jpg', '', 1, '2020-02-14 18:47:21', 5),
(8, '141134710', '141134710.jpg', '', 1, '2020-02-14 19:02:46', 6),
(9, '61525667', '61525667.jpg', '', 1, '2020-02-15 14:18:16', 8),
(10, '123362328', '123362328.jpg', '', 1, '2020-02-17 11:00:14', 9),
(11, '141541532', '141541532.jpg', '', 1, '2020-02-17 16:27:10', 10),
(12, '173915911', '173915911.jpg', '', 1, '2020-02-17 16:27:57', 7),
(13, '110944555', '110944555.jpg', '', 1, '2020-02-17 17:18:33', 11),
(14, '4965657af186b9092c7a96976ffe881c_XL', '4965657af186b9092c7a96976ffe881c_XL.jpg', '', 1, '2020-02-17 17:40:45', 11),
(15, '110944562', '110944562.jpg', '', 1, '2020-02-17 18:00:20', 12),
(16, '149142078', '149142078.jpg', '', 1, '2020-02-17 18:08:33', 13),
(17, '14', '14.jpg', '', 1, '2020-02-17 18:15:41', 14),
(18, '29749757', '29749757.jpg', '', 1, '2020-02-18 18:23:12', 15),
(19, '82201480', '82201480.jpg', '', 1, '2020-02-18 18:38:29', 16),
(20, '138137953', '138137953.jpg', '', 1, '2020-02-19 12:21:53', 17),
(21, 'flores-1', 'flores-1.jpg', '', 1, '2020-02-19 12:21:53', 17),
(23, '226873833', '226873833.jpg', '', 1, '2020-02-19 12:30:29', 18),
(24, 'BUBINZANA MAGICAL LODGE-5', 'BUBINZANA MAGICAL LODGE-5.jpg', '', 1, '2020-02-19 13:27:29', 3),
(25, 'BUBINZANA MAGICAL LODGE-4', 'BUBINZANA MAGICAL LODGE-4.jpg', '', 1, '2020-02-19 13:28:11', 3),
(26, 'BUBINZANA MAGICAL LODGE-6', 'BUBINZANA MAGICAL LODGE-6.jpg', '', 1, '2020-02-19 13:28:39', 3),
(27, 'BUBINZANA MAGICAL LODGE-3', 'BUBINZANA MAGICAL LODGE-3.jpg', '', 1, '2020-02-19 13:28:58', 3),
(28, 'Casa bosque hotel-6', 'Casa bosque hotel-6.jpg', '', 1, '2020-02-19 13:46:23', 4),
(29, 'Casa bosque hotel-1', 'Casa bosque hotel-1.jpg', '', 1, '2020-02-19 13:46:56', 4),
(30, 'Casa bosque hotel-2', 'Casa bosque hotel-2.jpg', '', 1, '2020-02-19 13:47:30', 4),
(31, 'Casa bosque hotel-3', 'Casa bosque hotel-3.jpg', '', 1, '2020-02-19 13:49:01', 4),
(32, 'Casa bosque hotel-4', 'Casa bosque hotel-4.jpg', '', 1, '2020-02-19 13:50:03', 4),
(33, 'hostal usplay', 'hostal usplay.jpg', '', 1, '2020-02-19 13:59:35', 15),
(34, 'hostal usplay-2', 'hostal usplay-2.jpg', '', 1, '2020-02-19 14:00:15', 15),
(35, 'hostal usplay-3', 'hostal usplay-3.jpg', '', 1, '2020-02-19 14:00:58', 15),
(36, 'hostal usplay-5', 'hostal usplay-5.jpg', '', 1, '2020-02-19 14:02:47', 15),
(37, 'hostal usplay-4', 'hostal usplay-4.jpg', '', 1, '2020-02-19 14:04:59', 15),
(38, 'kusupaqari-2', 'kusupaqari-2.jpg', '', 1, '2020-02-19 14:13:57', 12),
(39, 'kusupaqari-1', 'kusupaqari-1.jpg', '', 1, '2020-02-19 14:16:04', 12),
(40, 'kusupaqari-3', 'kusupaqari-3.jpg', '', 1, '2020-02-19 14:16:31', 12),
(41, 'kusupaqari-4', 'kusupaqari-4.jpg', '', 1, '2020-02-19 14:16:59', 12),
(42, 'kusupaqari-5', 'kusupaqari-5.jpg', '', 1, '2020-02-19 14:18:11', 12),
(43, 'mansion-3', 'mansion-3.jpg', '', 1, '2020-02-19 14:25:20', 9),
(44, 'mansion-4', 'mansion-4.jpg', '', 1, '2020-02-19 14:27:47', 9),
(45, 'mansion-6', 'mansion-6.jpg', '', 1, '2020-02-19 14:28:54', 9),
(46, 'mansion-5', 'mansion-5.jpg', '', 1, '2020-02-19 14:31:42', 9),
(47, 'mansion-2', 'mansion-2.jpg', '', 1, '2020-02-19 14:33:16', 9),
(48, 'flores-6', 'flores-6.jpg', '', 1, '2020-02-19 14:38:48', 17),
(49, 'flores-5', 'flores-5.jpg', '', 1, '2020-02-19 14:39:21', 17),
(50, 'flores-3', 'flores-3.jpg', '', 1, '2020-02-19 14:45:26', 17),
(51, 'flores-2', 'flores-2.jpg', '', 1, '2020-02-19 14:48:31', 17),
(52, 'san pedro-2', 'san pedro-2.jpg', '', 1, '2020-02-19 14:50:06', 13),
(53, 'san pedro-4 (1)', 'san pedro-4 (1).jpg', '', 1, '2020-02-19 14:52:00', 13),
(54, 'san pedro-6', 'san pedro-6.jpg', '', 0, '2020-02-19 14:54:37', 13),
(55, 'san pedro-5', 'san pedro-5.jpg', '', 1, '2020-02-19 14:57:43', 13),
(56, 'san pedro-3', 'san pedro-3.jpg', '', 1, '2020-02-19 14:58:45', 13),
(57, 'peruvian', 'peruvian.jpg', '', 1, '2020-02-19 15:05:31', 7),
(58, 'peruvian-2', 'peruvian-2.jpg', '', 1, '2020-02-19 15:08:39', 7),
(59, 'peruvian-4', 'peruvian-4.jpg', '', 1, '2020-02-19 15:11:48', 7),
(60, 'peruvian-3', 'peruvian-3.jpg', '', 1, '2020-02-19 15:15:14', 7),
(61, 'peruvian-5', 'peruvian-5.jpg', '', 1, '2020-02-19 15:15:53', 7),
(62, 'WhatsApp Image 2019-11-14 at 5', 'WhatsApp Image 2019-11-14 at 5.35.07 PM.jpg', '', 1, '2020-02-19 15:20:42', 2),
(63, '53bad807-ad06-43a2-be05-b9c0620e82bb (1)', '53bad807-ad06-43a2-be05-b9c0620e82bb (1).jpg', '', 1, '2020-02-19 15:21:12', 2),
(64, '27439416', '27439416.jpg', '', 0, '2020-02-19 15:22:37', 2),
(65, 'WhatsApp Image 2019-11-14 at 5', 'WhatsApp Image 2019-11-14 at 5.35.08 PM (1).jpg', '', 1, '2020-02-19 15:23:00', 2),
(66, 'hotel_nilas-1', 'hotel_nilas-1.jpg', '', 1, '2020-02-19 15:23:57', 6),
(67, 'hotel_nilas-5', 'hotel_nilas-5.jpg', '', 1, '2020-02-19 15:25:43', 6),
(68, 'WhatsApp Image 2019-11-14 at 5', 'WhatsApp Image 2019-11-14 at 5.35.11 PM (2).jpg', '', 1, '2020-02-19 15:26:15', 2),
(69, 'hotel_nilas-4', 'hotel_nilas-4.jpg', '', 1, '2020-02-19 15:27:44', 6),
(70, 'hotel_nilas-6', 'hotel_nilas-6.jpg', '', 1, '2020-02-19 15:29:05', 6),
(71, 'hotel_nilas-3', 'hotel_nilas-3.jpg', '', 1, '2020-02-19 15:38:35', 6),
(72, 'puma urcu-2', 'puma urcu-2.jpg', '', 1, '2020-02-19 15:40:21', 8),
(73, 'puma urcu-1', 'puma urcu-1.jpg', '', 1, '2020-02-19 15:40:46', 8),
(74, 'puma urcu-3', 'puma urcu-3.jpg', '', 1, '2020-02-19 15:42:13', 8),
(75, 'puma urcu-4', 'puma urcu-4.jpg', '', 1, '2020-02-19 15:43:11', 8),
(76, 'puma urcu-5', 'puma urcu-5.jpg', '', 1, '2020-02-19 15:45:09', 8),
(77, 'cumbaza-1', 'cumbaza-1.jpg', '', 1, '2020-02-19 15:49:11', 5),
(78, 'cumbaza-2', 'cumbaza-2.jpg', '', 1, '2020-02-19 15:50:34', 5),
(79, 'cumbaza-3', 'cumbaza-3.jpg', '', 1, '2020-02-19 15:52:35', 5),
(80, 'cumbaza-4', 'cumbaza-4.jpg', '', 1, '2020-02-19 15:54:04', 5),
(81, 'colonial-1', 'colonial-1.jpg', '', 1, '2020-02-19 15:54:12', 16),
(82, 'cumbaza-5', 'cumbaza-5.jpg', '', 1, '2020-02-19 15:54:39', 5),
(83, 'colonial-2', 'colonial-2.jpg', '', 1, '2020-02-19 15:55:23', 16),
(84, 'colonial-3', 'colonial-3.jpg', '', 1, '2020-02-19 15:59:30', 16),
(85, 'colonial-4', 'colonial-4.jpg', '', 1, '2020-02-19 16:01:02', 16),
(86, 'colonial-5', 'colonial-5.jpg', '', 1, '2020-02-19 16:01:31', 16),
(87, '133349153', '133349153.jpg', '', 1, '2020-02-19 16:09:51', 14),
(88, '103513937', '103513937.jpg', '', 1, '2020-02-19 16:10:14', 14),
(89, '103517299', '103517299.jpg', '', 1, '2020-02-19 16:11:56', 14),
(90, '133354712', '133354712.jpg', '', 1, '2020-02-19 16:14:16', 14),
(91, '103514911', '103514911.jpg', '', 1, '2020-02-19 16:15:08', 14),
(92, 'sol-2', 'sol-2.jpg', '', 1, '2020-02-19 16:20:04', 18),
(93, 'sol-3', 'sol-3.jpg', '', 0, '2020-02-19 16:21:40', 18),
(94, 'sol-4', 'sol-4.jpg', '', 0, '2020-02-19 16:22:57', 18),
(95, 'sol-5', 'sol-5.jpg', '', 1, '2020-02-19 16:23:23', 18),
(96, 'sol-6', 'sol-6.jpg', '', 1, '2020-02-19 16:24:00', 18),
(97, 'urpi-1', 'urpi-1.jpg', '', 1, '2020-02-19 16:27:24', 11),
(98, 'urpi-2', 'urpi-2.jpg', '', 1, '2020-02-19 16:27:58', 11),
(99, 'urpi-7', 'urpi-7.jpg', '', 1, '2020-02-19 16:31:09', 11),
(100, 'urpi-6', 'urpi-6.jpg', '', 1, '2020-02-19 16:31:24', 11),
(101, 'paris-1', 'paris-1.jpg', '', 1, '2020-02-19 16:38:29', 10),
(102, 'paris-2', 'paris-2.jpg', '', 1, '2020-02-19 16:41:54', 10),
(103, 'paris-3', 'paris-3.jpg', '', 1, '2020-02-19 16:43:12', 10),
(104, 'paris-4', 'paris-4.jpg', '', 1, '2020-02-19 16:45:07', 10),
(105, 'paris-6', 'paris-6.jpg', '', 1, '2020-02-19 16:45:33', 10),
(106, '63ce47e7-e7f3-44eb-8578-410dc1c7147c', '63ce47e7-e7f3-44eb-8578-410dc1c7147c.jpg', '', 1, '2020-02-19 16:55:41', 1),
(107, 'WhatsApp Image 2019-11-20 at 11', 'WhatsApp Image 2019-11-20 at 11.30.18 AM (2).jpg', '', 1, '2020-02-19 16:56:34', 1),
(108, 'WhatsApp Image 2019-11-20 at 11', 'WhatsApp Image 2019-11-20 at 11.30.15 AM.jpg', '', 1, '2020-02-19 16:57:08', 1),
(109, 'miau', 'miau.jpg', '', 1, '2020-02-19 16:57:26', 1),
(110, 'miau-2', 'miau-2.jpg', '', 1, '2020-02-19 16:59:42', 1),
(111, 'foto-hotel-20200714171544', 'foto-hotel-20200714171544.jpg', 'test prueba', 0, '2020-07-13 23:33:15', 22),
(112, 'foto-hotel-20200713231034', 'foto-hotel-20200713231034.jpg', '', 1, '2020-07-13 23:33:15', 22),
(113, 'foto-hotel-20200713233059', 'foto-hotel-20200713233059.jpg', '', 1, '2020-07-13 23:33:15', 22),
(114, 'foto-hotel-20200713233212', 'foto-hotel-20200713233212.jpg', '', 1, '2020-07-13 23:33:15', 22),
(115, 'foto-hotel-20200713233231', 'foto-hotel-20200713233231.jpg', 'aaaaaaa', 1, '2020-07-13 23:33:15', 22),
(118, 'foto-hotel-20200714171619', 'foto-hotel-20200714171619.jpg', 'nueva test', 0, '2020-07-14 17:16:20', 22),
(119, 'foto-hotel-20200714171706', 'foto-hotel-20200714171706.jpg', '', 0, '2020-07-14 17:17:07', 22),
(120, 'foto-hotel-20200714005350', 'foto-hotel-20200714005350.jpg', '', 1, '2020-07-14 17:37:01', 23),
(121, 'foto-hotel-20200714173445', 'foto-hotel-20200714173445.jpg', '', 1, '2020-07-14 17:37:01', 23),
(122, 'foto-hotel-20200714173448', 'foto-hotel-20200714173448.jpg', '', 1, '2020-07-14 17:37:01', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_hoteles_servicios_populares`
--

CREATE TABLE `bd_hoteles_servicios_populares` (
  `id` int(11) NOT NULL,
  `id_hoteles` int(11) NOT NULL,
  `id_servicios` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_hoteles_servicios_populares`
--

INSERT INTO `bd_hoteles_servicios_populares` (`id`, `id_hoteles`, `id_servicios`, `status`, `fecha_registro`) VALUES
(19, 1, 1, 1, '2020-02-17 10:42:48'),
(30, 14, 1, 1, '2020-02-17 18:15:41'),
(51, 2, 1, 1, '2020-02-20 18:05:36'),
(52, 2, 3, 1, '2020-02-20 18:05:36'),
(53, 2, 2, 1, '2020-02-20 18:05:36'),
(63, 19, 1, 1, '2020-03-05 12:25:25'),
(67, 4, 1, 1, '2020-03-07 14:42:16'),
(68, 4, 3, 1, '2020-03-07 14:42:16'),
(69, 4, 2, 1, '2020-03-07 14:42:16'),
(70, 15, 1, 1, '2020-03-07 14:42:37'),
(71, 12, 1, 1, '2020-03-07 14:43:00'),
(72, 9, 1, 1, '2020-03-07 14:43:39'),
(73, 9, 2, 1, '2020-03-07 14:43:39'),
(74, 17, 1, 1, '2020-03-07 14:43:57'),
(75, 17, 2, 1, '2020-03-07 14:43:57'),
(76, 13, 1, 1, '2020-03-07 14:44:26'),
(79, 7, 1, 1, '2020-03-07 14:45:55'),
(80, 6, 1, 1, '2020-03-07 14:46:22'),
(81, 6, 2, 1, '2020-03-07 14:46:22'),
(82, 8, 1, 1, '2020-03-07 14:46:44'),
(83, 5, 1, 1, '2020-03-07 14:47:07'),
(84, 5, 3, 1, '2020-03-07 14:47:07'),
(85, 5, 2, 1, '2020-03-07 14:47:07'),
(86, 16, 1, 1, '2020-03-07 14:47:35'),
(87, 20, 1, 1, '2020-03-07 14:48:09'),
(88, 21, 1, 1, '2020-03-07 14:48:44'),
(89, 18, 1, 1, '2020-03-07 14:49:20'),
(90, 18, 3, 1, '2020-03-07 14:49:20'),
(91, 18, 2, 1, '2020-03-07 14:49:20'),
(92, 11, 1, 1, '2020-03-07 14:49:41'),
(93, 10, 1, 1, '2020-03-07 14:50:10'),
(94, 10, 3, 1, '2020-03-07 14:50:10'),
(95, 22, 3, 1, '2020-07-13 23:33:15'),
(96, 3, 1, 1, '2020-07-13 23:52:19'),
(97, 3, 2, 1, '2020-07-13 23:52:19'),
(98, 23, 3, 1, '2020-07-14 17:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_monedas`
--

CREATE TABLE `bd_monedas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci DEFAULT NULL,
  `simbolo` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `tipo_mercado_pago` varchar(20) COLLATE utf16_spanish_ci NOT NULL,
  `tipo_cambio` decimal(10,2) NOT NULL,
  `descripcion` varchar(200) COLLATE utf16_spanish_ci DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_monedas`
--

INSERT INTO `bd_monedas` (`id`, `nombre`, `simbolo`, `tipo_mercado_pago`, `tipo_cambio`, `descripcion`, `fecha_registro`, `status`) VALUES
(1, 'Nuevo Soles', 'S/.', 'PEN', '3.36', 'SOLES PERUANOS', '2019-10-03 15:00:00', 1),
(2, 'Dolares', 'US$', 'USD', '3.36', 'dolares amaricanos', '2019-10-04 13:36:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_notificacion`
--

CREATE TABLE `bd_notificacion` (
  `id` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_notificacion`
--

INSERT INTO `bd_notificacion` (`id`, `email`, `status`) VALUES
(1, 'Liz19781@hotmail.com', 1),
(2, 'urioljulian5@gmail.com', 1),
(3, 'robledofloresm@gmail.com', 1),
(4, '40temmuz@gmail.com', 1),
(5, 'johanarandy80@gmail.com', 1),
(6, 'Katia_14_22@hotmail.con', 1),
(7, 'Kimberlyvargas1990@gmail.com', 1),
(8, 'maroes13@hotmail.com', 1),
(9, 'Ingrid.ipanaque_1904@hotmail.com', 1),
(10, 'aules70@hotmai.com', 1),
(11, 'rcamposlora@gmail.com', 1),
(12, 'agiuliana@hotmail.com', 1),
(13, 'jenniferleon216@gmail.com', 1),
(14, 'jacquiroal@gmail.com', 1),
(15, 'lore250691@gmail.com', 1),
(16, 'robertel99@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_ofertas`
--

CREATE TABLE `bd_ofertas` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_tipo_oferta` int(11) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `id_destino` int(11) DEFAULT '0',
  `min_persona` int(11) NOT NULL,
  `monto_min` text COLLATE utf8_spanish_ci NOT NULL,
  `regla_monto_oferta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `monto_oferta` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bd_ofertas`
--

INSERT INTO `bd_ofertas` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `id_tipo_oferta`, `id_tipo_servicio`, `id_destino`, `min_persona`, `monto_min`, `regla_monto_oferta`, `monto_oferta`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'test prueba descuento ', '2020-07-01', '2020-07-31', 3, 1, NULL, 0, '0', '1', '10', 'descuento del 10% paquete maximo de costo 100', 0, '2020-07-23 16:30:48'),
(2, 'aumento del ', '2020-07-01', '2020-07-31', 1, 1, NULL, 0, '0', '1', '15', 'test prueba de aumento', 1, '2020-07-23 16:38:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_oferta_detalle`
--

CREATE TABLE `bd_oferta_detalle` (
  `id` int(11) NOT NULL,
  `id_ofertas` int(11) NOT NULL,
  `id_servicios` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bd_oferta_detalle`
--

INSERT INTO `bd_oferta_detalle` (`id`, `id_ofertas`, `id_servicios`, `status`) VALUES
(1, 1, 38, 1),
(2, 1, 32, 1),
(3, 1, 11, 1),
(4, 1, 6, 1),
(5, 1, 13, 1),
(6, 1, 39, 1),
(7, 1, 25, 1),
(8, 1, 34, 1),
(9, 1, 3, 1),
(10, 1, 26, 1),
(11, 1, 23, 1),
(12, 1, 21, 1),
(13, 1, 4, 1),
(14, 1, 9, 1),
(15, 1, 5, 1),
(16, 1, 20, 1),
(17, 1, 8, 1),
(18, 1, 22, 1),
(19, 1, 15, 1),
(20, 1, 27, 1),
(21, 1, 10, 1),
(22, 1, 24, 1),
(23, 1, 2, 1),
(24, 1, 19, 1),
(25, 1, 1, 1),
(26, 1, 18, 1),
(27, 1, 14, 1),
(28, 1, 17, 1),
(29, 1, 28, 1),
(30, 1, 7, 1),
(31, 1, 29, 1),
(32, 1, 12, 1),
(33, 1, 33, 1),
(34, 1, 35, 1),
(35, 2, 38, 1),
(36, 2, 32, 1),
(37, 2, 11, 1),
(38, 2, 6, 1),
(39, 2, 13, 1),
(40, 2, 39, 1),
(41, 2, 25, 1),
(42, 2, 34, 1),
(43, 2, 3, 1),
(44, 2, 26, 1),
(45, 2, 23, 1),
(46, 2, 21, 1),
(47, 2, 4, 1),
(48, 2, 9, 1),
(49, 2, 5, 1),
(50, 2, 20, 1),
(51, 2, 8, 1),
(52, 2, 22, 1),
(53, 2, 15, 1),
(54, 2, 27, 1),
(55, 2, 10, 1),
(56, 2, 24, 1),
(57, 2, 2, 1),
(58, 2, 19, 1),
(59, 2, 1, 1),
(60, 2, 18, 1),
(61, 2, 14, 1),
(62, 2, 17, 1),
(63, 2, 28, 1),
(64, 2, 7, 1),
(65, 2, 29, 1),
(66, 2, 12, 1),
(67, 2, 33, 1),
(68, 2, 35, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_orden`
--

CREATE TABLE `bd_orden` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cupon_validar` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_orden`
--

INSERT INTO `bd_orden` (`id`, `tipo_documento`, `identificacion`, `cupon_validar`, `status`, `fecha_registro`) VALUES
(1, 'DNI', '41043661', 'AVE-0001', 1, '2020-03-04 10:43:38'),
(2, 'DNI', '001881738', '', 1, '2020-03-09 19:43:31'),
(3, 'DNI', '001881738', '', 1, '2020-03-09 19:43:43'),
(4, 'C.E', '01881738', '', 1, '2020-03-14 12:05:24'),
(5, 'C.E', '01881738', '', 1, '2020-03-14 12:06:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_paises`
--

CREATE TABLE `bd_paises` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_paises`
--

INSERT INTO `bd_paises` (`id`, `nombre`, `descripcion`) VALUES
(1, 'AF', 'Afganistán'),
(2, 'AX', 'Islas Gland'),
(3, 'AL', 'Albania'),
(4, 'DE', 'Alemania'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antártida'),
(9, 'AG', 'Antigua y Barbuda'),
(10, 'AN', 'Antillas Holandesas'),
(11, 'SA', 'Arabia Saudí'),
(12, 'DZ', 'Argelia'),
(13, 'AR', 'Argentina'),
(14, 'AM', 'Armenia'),
(15, 'AW', 'Aruba'),
(16, 'AU', 'Australia'),
(17, 'AT', 'Austria'),
(18, 'AZ', 'Azerbaiyán'),
(19, 'BS', 'Bahamas'),
(20, 'BH', 'Bahréin'),
(21, 'BD', 'Bangladesh'),
(22, 'BB', 'Barbados'),
(23, 'BY', 'Bielorrusia'),
(24, 'BE', 'Bélgica'),
(25, 'BZ', 'Belice'),
(26, 'BJ', 'Benin'),
(27, 'BM', 'Bermudas'),
(28, 'BT', 'Bhután'),
(29, 'BO', 'Bolivia'),
(30, 'BA', 'Bosnia y Herzegovina'),
(31, 'BW', 'Botsuana'),
(32, 'BV', 'Isla Bouvet'),
(33, 'BR', 'Brasil'),
(34, 'BN', 'Brunéi'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'CV', 'Cabo Verde'),
(39, 'KY', 'Islas Caimán'),
(40, 'KH', 'Camboya'),
(41, 'CM', 'Camerún'),
(42, 'CA', 'Canadá'),
(43, 'CF', 'República Centroafricana'),
(44, 'TD', 'Chad'),
(45, 'CZ', 'República Checa'),
(46, 'CL', 'Chile'),
(47, 'CN', 'China'),
(48, 'CY', 'Chipre'),
(49, 'CX', 'Isla de Navidad'),
(50, 'VA', 'Ciudad del Vaticano'),
(51, 'CC', 'Islas Cocos'),
(52, 'CO', 'Colombia'),
(53, 'KM', 'Comoras'),
(54, 'CD', 'República Democrática del Congo'),
(55, 'CG', 'Congo'),
(56, 'CK', 'Islas Cook'),
(57, 'KP', 'Corea del Norte'),
(58, 'KR', 'Corea del Sur'),
(59, 'CI', 'Costa de Marfil'),
(60, 'CR', 'Costa Rica'),
(61, 'HR', 'Croacia'),
(62, 'CU', 'Cuba'),
(63, 'DK', 'Dinamarca'),
(64, 'DM', 'Dominica'),
(65, 'DO', 'República Dominicana'),
(66, 'EC', 'Ecuador'),
(67, 'EG', 'Egipto'),
(68, 'SV', 'El Salvador'),
(69, 'AE', 'Emiratos Árabes Unidos'),
(70, 'ER', 'Eritrea'),
(71, 'SK', 'Eslovaquia'),
(72, 'SI', 'Eslovenia'),
(73, 'ES', 'España'),
(74, 'UM', 'Islas ultramarinas de Estados Unidos'),
(75, 'US', 'Estados Unidos'),
(76, 'EE', 'Estonia'),
(77, 'ET', 'Etiopía'),
(78, 'FO', 'Islas Feroe'),
(79, 'PH', 'Filipinas'),
(80, 'FI', 'Finlandia'),
(81, 'FJ', 'Fiyi'),
(82, 'FR', 'Francia'),
(83, 'GA', 'Gabón'),
(84, 'GM', 'Gambia'),
(85, 'GE', 'Georgia'),
(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur'),
(87, 'GH', 'Ghana'),
(88, 'GI', 'Gibraltar'),
(89, 'GD', 'Granada'),
(90, 'GR', 'Grecia'),
(91, 'GL', 'Groenlandia'),
(92, 'GP', 'Guadalupe'),
(93, 'GU', 'Guam'),
(94, 'GT', 'Guatemala'),
(95, 'GF', 'Guayana Francesa'),
(96, 'GN', 'Guinea'),
(97, 'GQ', 'Guinea Ecuatorial'),
(98, 'GW', 'Guinea-Bissau'),
(99, 'GY', 'Guyana'),
(100, 'HT', 'Haití'),
(101, 'HM', 'Islas Heard y McDonald'),
(102, 'HN', 'Honduras'),
(103, 'HK', 'Hong Kong'),
(104, 'HU', 'Hungría'),
(105, 'IN', 'India'),
(106, 'ID', 'Indonesia'),
(107, 'IR', 'Irán'),
(108, 'IQ', 'Iraq'),
(109, 'IE', 'Irlanda'),
(110, 'IS', 'Islandia'),
(111, 'IL', 'Israel'),
(112, 'IT', 'Italia'),
(113, 'JM', 'Jamaica'),
(114, 'JP', 'Japón'),
(115, 'JO', 'Jordania'),
(116, 'KZ', 'Kazajstán'),
(117, 'KE', 'Kenia'),
(118, 'KG', 'Kirguistán'),
(119, 'KI', 'Kiribati'),
(120, 'KW', 'Kuwait'),
(121, 'LA', 'Laos'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Letonia'),
(124, 'LB', 'Líbano'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libia'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lituania'),
(129, 'LU', 'Luxemburgo'),
(130, 'MO', 'Macao'),
(131, 'MK', 'ARY Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MY', 'Malasia'),
(134, 'MW', 'Malawi'),
(135, 'MV', 'Maldivas'),
(136, 'ML', 'Malí'),
(137, 'MT', 'Malta'),
(138, 'FK', 'Islas Malvinas'),
(139, 'MP', 'Islas Marianas del Norte'),
(140, 'MA', 'Marruecos'),
(141, 'MH', 'Islas Marshall'),
(142, 'MQ', 'Martinica'),
(143, 'MU', 'Mauricio'),
(144, 'MR', 'Mauritania'),
(145, 'YT', 'Mayotte'),
(146, 'MX', 'México'),
(147, 'FM', 'Micronesia'),
(148, 'MD', 'Moldavia'),
(149, 'MC', 'Mónaco'),
(150, 'MN', 'Mongolia'),
(151, 'MS', 'Montserrat'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NI', 'Nicaragua'),
(158, 'NE', 'Níger'),
(159, 'NG', 'Nigeria'),
(160, 'NU', 'Niue'),
(161, 'NF', 'Isla Norfolk'),
(162, 'NO', 'Noruega'),
(163, 'NC', 'Nueva Caledonia'),
(164, 'NZ', 'Nueva Zelanda'),
(165, 'OM', 'Omán'),
(166, 'NL', 'Países Bajos'),
(167, 'PK', 'Pakistán'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestina'),
(170, 'PA', 'Panamá'),
(171, 'PG', 'Papúa Nueva Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Perú'),
(174, 'PN', 'Islas Pitcairn'),
(175, 'PF', 'Polinesia Francesa'),
(176, 'PL', 'Polonia'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'GB', 'Reino Unido'),
(181, 'RE', 'Reunión'),
(182, 'RW', 'Ruanda'),
(183, 'RO', 'Rumania'),
(184, 'RU', 'Rusia'),
(185, 'EH', 'Sahara Occidental'),
(186, 'SB', 'Islas Salomón'),
(187, 'WS', 'Samoa'),
(188, 'AS', 'Samoa Americana'),
(189, 'KN', 'San Cristóbal y Nevis'),
(190, 'SM', 'San Marino'),
(191, 'PM', 'San Pedro y Miquelón'),
(192, 'VC', 'San Vicente y las Granadinas'),
(193, 'SH', 'Santa Helena'),
(194, 'LC', 'Santa Lucía'),
(195, 'ST', 'Santo Tomé y Príncipe'),
(196, 'SN', 'Senegal'),
(197, 'CS', 'Serbia y Montenegro'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leona'),
(200, 'SG', 'Singapur'),
(201, 'SY', 'Siria'),
(202, 'SO', 'Somalia'),
(203, 'LK', 'Sri Lanka'),
(204, 'SZ', 'Suazilandia'),
(205, 'ZA', 'Sudáfrica'),
(206, 'SD', 'Sudán'),
(207, 'SE', 'Suecia'),
(208, 'CH', 'Suiza'),
(209, 'SR', 'Surinam'),
(210, 'SJ', 'Svalbard y Jan Mayen'),
(211, 'TH', 'Tailandia'),
(212, 'TW', 'Taiwán'),
(213, 'TZ', 'Tanzania'),
(214, 'TJ', 'Tayikistán'),
(215, 'IO', 'Territorio Británico del Océano Índico'),
(216, 'TF', 'Territorios Australes Franceses'),
(217, 'TL', 'Timor Oriental'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad y Tobago'),
(222, 'TN', 'Túnez'),
(223, 'TC', 'Islas Turcas y Caicos'),
(224, 'TM', 'Turkmenistán'),
(225, 'TR', 'Turquía'),
(226, 'TV', 'Tuvalu'),
(227, 'UA', 'Ucrania'),
(228, 'UG', 'Uganda'),
(229, 'UY', 'Uruguay'),
(230, 'UZ', 'Uzbekistán'),
(231, 'VU', 'Vanuatu'),
(232, 'VE', 'Venezuela'),
(233, 'VN', 'Vietnam'),
(234, 'VG', 'Islas Vírgenes Británicas'),
(235, 'VI', 'Islas Vírgenes de los Estados Unidos'),
(236, 'WF', 'Wallis y Futuna'),
(237, 'YE', 'Yemen'),
(238, 'DJ', 'Yibuti'),
(239, 'ZM', 'Zambia'),
(240, 'ZW', 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_paquetes`
--

CREATE TABLE `bd_paquetes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf16_spanish_ci NOT NULL,
  `nombre_posic` text COLLATE utf16_spanish_ci NOT NULL,
  `id_departamento` text COLLATE utf16_spanish_ci NOT NULL,
  `id_provincia` text COLLATE utf16_spanish_ci NOT NULL,
  `id_distrito` text COLLATE utf16_spanish_ci NOT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `tipo_descuento` int(11) NOT NULL,
  `monto_descuento` text COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf16_spanish_ci NOT NULL,
  `descripcion_posic` text COLLATE utf16_spanish_ci NOT NULL,
  `servicios` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_paquetes`
--

INSERT INTO `bd_paquetes` (`id`, `nombre`, `nombre_posic`, `id_departamento`, `id_provincia`, `id_distrito`, `cantidad_dias`, `tipo_descuento`, `monto_descuento`, `descripcion`, `descripcion_posic`, `servicios`, `status`, `fecha_registro`) VALUES
(1000000, 'Conociendo Tarapoto', '', '220000', '220900', '220901', 4, 1, '10', '<p>Este programa es más tradicional y completo para visitar Tarapoto, ¡Animate! si quieres una recomendación nuestra pues está es una buen opción.</p>\r\n', '', '<p><strong>✓ </strong>Recojo del aeropuerto - hotel - aeropuerto<br>\r\n<strong>✓ </strong>03 noches de alojamiento<br>\r\n<strong>✓ </strong>03 desayunos<br>\r\n<strong>✓ </strong>Guiado en español<br>\r\n<strong>✓ </strong>Ingreso a los lugares turísticos</p>\r\n', 1, '2020-02-15 14:33:07'),
(1000001, 'Tarapoto Aventureros', '', '220000', '220900', '220901', 5, 1, '10', '<p>Si quieres un poco más de aventura en un programa, te recomendamos este no te arrepentirás y lo disfrutarás al máximo ¡Solicitalo ya!</p>\r\n', '', '<p><strong>✓ </strong>Recojo del aeropuerto - hotel - aeropuerto<br>\r\n<strong>✓ </strong>04 noches de alojamiento <br>\r\n<strong>✓ </strong>04 desayunos<br>\r\n<strong>✓ </strong>Guiado en español<br>\r\n<strong>✓ </strong>Ingreso a los lugares turísticos</p>\r\n', 1, '2020-02-15 15:04:51'),
(1000002, 'Tarapoto Clasico', '', '220000', '220900', '220901', 3, 1, '10', '<p>En este programa podrás disfrutar al máximo los principales lugares turisticos de Tarapoto en pocos días, ¡Te encantará!</p>\r\n', '', '<p><strong>✓ </strong>Recojo del aeropuerto - hotel - aeropuerto<br>\r\n<strong>✓ </strong>02 noches de alojamiento<br>\r\n<strong>✓ </strong>02 desayunos<br>\r\n<strong>✓ </strong>Guiado en español<br>\r\n<strong>✓ </strong>Ingreso a los lugares turísticos</p>\r\n', 1, '2020-02-15 15:09:44'),
(1000003, 'Tarapoto Extremo', '', '220000', '220900', '220901', 6, 1, '10', '<p>En este programa podrás aventurarte más a fondo y vivir una experiencia dentro de la selva, lo pasarás increible ¡Separalo ya!</p>\r\n', '', '<p><strong>✓ </strong>Recojo del Aeropuerto - Hotel - Aeropuerto<br>\r\n<strong>✓ </strong>05 Noches de Alojamiento según elección<br>\r\n<strong>✓ </strong>05 Desayunos<br>\r\n<strong>✓ </strong>Guiado en español<br>\r\n<strong>✓ </strong>Ingreso a los lugares turísticos</p>\r\n\r\n<p><strong>**NOTA: Programa no valido para 1 persona**</strong></p>\r\n', 1, '2020-02-17 16:08:10'),
(1000004, 'Chachapoyas Clasico', '', '010000', '010100', '010101', 3, 1, '10', '<p>Este programa es perfecto para las personas que solo disponen de poco tiempo pero desean disfrutar de los principales lugares turísticos de Chachapoyas.</p>\r\n', '', '<p><strong>✓</strong> 02 Noches de alojamiento<br>\r\n<strong>✓ </strong>02 Desayunos<br>\r\n<strong>✓ </strong>Tickets De Entradas<br>\r\n<strong>✓ </strong>Movilidad compartida para realizar los tours<br>\r\n<strong>✓ </strong>Guiado en español</p>\r\n\r\n<p><strong>**NOTA: Programa no valido para 1 persona**</strong></p>\r\n', 1, '2020-02-17 16:18:28'),
(1000005, 'Conociendo Chachapoyas', '', '010000', '010100', '010101', 4, 1, '10', '<p>Este programa es más completo tiene todos los principales lugares turisticos que hay en Chachapoyas, si quieres una recomendación nuestra está es una buena opción este programa tiene mucho por ofrecer.</p>\r\n', '', '<p><strong>✓</strong> 03 Noches de alojamiento<br>\r\n<strong>✓ </strong>03 Desayunos<br>\r\n<strong>✓ </strong>Tickets De Entradas<br>\r\n<strong>✓ </strong>Movilidad compartida para realizar los tours<br>\r\n<strong>✓ </strong>Guiado en español</p>\r\n\r\n<p><strong>**NOTA: Programa no valido para 1 persona**</strong></p>\r\n\r\n<p> </p>\r\n', 1, '2020-02-17 16:44:45'),
(1000006, 'Chachapoyas Extremo', '', '010000', '010100', '010101', 5, 1, '10', '<p>Este programa es poco tradicional pero si tienes varios dias de estadía en Chachapoyas esta es una buena opción.</p>\r\n', '', '<p><strong>✓</strong> 04 Noches de alojamiento<br>\r\n<strong>✓ </strong>04 Desayunos<br>\r\n<strong>✓ </strong>Tickets De Entradas<br>\r\n<strong>✓ </strong>Movilidad compartida para realizar los tours<br>\r\n<strong>✓ </strong>Guiado en español</p>\r\n\r\n<p><strong>**NOTA: Programa no válido para 1 persona**</strong></p>\r\n', 1, '2020-02-17 16:49:54'),
(1000007, 'Cusco Aventureros', '', '080000', '080100', '080101', 6, 1, '10', '<p>En este programa podrás disfrutar al máximo de Cusco, será una aventura inolvidable. ¡Animate a tomar este programa!</p>\r\n', '', '<p><strong>✓ </strong>Recojo del Aeropuerto - Hotel - Aeropuerto<br>\r\n<strong>✓ </strong>05 Noches De Alojamiento <br>\r\n<strong>✓ </strong>05 Desayunos<br>\r\n<strong>✓ </strong>Movilidad Compartida para hacer los tours.<br>\r\n<strong>✓ </strong>Guiado en español y/o ingles.</p>\r\n', 1, '2020-02-17 17:11:09'),
(1000008, 'Cusco Clasico', '', '080000', '080100', '080101', 4, 1, '10', '<p>En este programa podrás visitar los principales destinos alrededor de la Ciudad de Cusco y por supuesto la ciudadela de Machu Picchu. ¡Animate a separarlo!</p>\r\n', '', '<p><strong>✓ </strong>Recojo del Aeropuerto - Hotel - Aeropuerto<br>\r\n<strong>✓ </strong>03 Noches De Alojamiento <br>\r\n<strong>✓ </strong>03 Desayunos<br>\r\n<strong>✓ </strong>Movilidad Compartida para hacer los tours.<br>\r\n<strong>✓ </strong>Guiado en español y/o ingles.</p>\r\n', 1, '2020-02-17 18:39:26'),
(1000009, 'Cusco Colorido', '', '080000', '080100', '080101', 5, 1, '10', '<p>En este programa podrás disfrutar de un lugar turístico que se ha vuelto muy recurrido por los turistas déjate atrapar por la mágica aventura que tendrás si adquieres este programa.</p>\r\n', '', '<p><strong>✓ </strong>Recojo del Aeropuerto - Hotel - Aeropuerto<br>\r\n<strong>✓ </strong>04 Noches De Alojamiento <br>\r\n<strong>✓ </strong>04 Desayunos<br>\r\n<strong>✓ </strong>Movilidad Compartida para hacer los tours.<br>\r\n<strong>✓ </strong>Guiado en español y/o ingles.</p>\r\n', 1, '2020-02-17 19:10:28'),
(1000010, 'Arequipa Clasico', 'test prueba', '040000', '040100', '040101', 3, 1, '10', '<p>Tienes pocos días para visitar Arequipa pero quieres disfrutar al máximo, pues está es una buena opción. ¡Animate a tomarlo!</p>\r\n', '<p>test prueba</p>\r\n', '<p><strong>✓ </strong>02 Noches de Alojamiento<br>\r\n<strong>✓ </strong>02 Desayunos<br>\r\n<strong>✓</strong> Movilidad compartida para los tours <br>\r\n<strong>✓ </strong>Guiado en español y/o inglés</p>\r\n', 1, '2020-02-18 18:43:38'),
(1000011, 'Conociendo Arequipa', '', '040000', '040100', '040101', 4, 1, '10', '<p>Este programa es más completo podrás visitar los lugares turísticos más principales de Arequipa, animate y ¡Separa este programa!</p>\r\n', '', '<p><strong>✓ </strong>03 Noches de Alojamiento<br>\r\n<strong>✓ </strong>03 Desayunos<br>\r\n<strong>✓</strong> Movilidad compartida para los tours <br>\r\n<strong>✓ </strong>Guiado en español y/o inglés</p>\r\n', 1, '2020-02-18 18:46:18'),
(1000012, 'Ica Tradicional', '', '110000', '110100', '110101', 2, 1, '10', '<p>En este programa podrás disfrutar de unos días de relajo y full Adrenalina a unas cuantas horas de Lima.</p>\r\n', '', '<p><strong>✓ </strong>02 Noches de Alojamiento <br>\r\n<strong>✓ </strong>02 Desayunos (Cortesía del hotel)<br>\r\n<strong>✓ </strong> Movilidad compartida para los tours<br>\r\n<strong>✓ </strong> Ingreso a los lugares a visitar.<br>\r\n<strong>✓ </strong>Guiado</p>\r\n', 1, '2020-02-19 12:11:16'),
(1000013, 'ronny simosa', 'mamama', '010000', '010300', '010303', 2, 1, '10', '<p>aaaaaaaaaaa</p>\r\n', '<p>aaaaaaaaa</p>\r\n', '<p>aaaaaaaa</p>\r\n', 1, '2020-07-13 15:48:34'),
(1000014, 'aaaaaa', 'aaaaaaaa', '010000', '010300', '010303', 3, 2, '', '<p>sssssss</p>\r\n', '<p>sss</p>\r\n', '<p>s</p>\r\n', 1, '2020-07-14 18:01:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_paquetes_hoteles`
--

CREATE TABLE `bd_paquetes_hoteles` (
  `id` int(11) NOT NULL,
  `id_paquetes` int(11) NOT NULL,
  `id_hoteles` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_paquetes_hoteles`
--

INSERT INTO `bd_paquetes_hoteles` (`id`, `id_paquetes`, `id_hoteles`, `status`, `fecha_registro`) VALUES
(143, 1000012, 17, 1, '2020-02-19 17:32:21'),
(144, 1000012, 18, 1, '2020-02-19 17:32:21'),
(151, 1000008, 11, 1, '2020-02-21 14:44:44'),
(152, 1000008, 12, 1, '2020-02-21 14:44:44'),
(153, 1000008, 13, 1, '2020-02-21 14:44:44'),
(154, 1000009, 11, 1, '2020-02-21 14:45:46'),
(155, 1000009, 12, 1, '2020-02-21 14:45:46'),
(156, 1000009, 13, 1, '2020-02-21 14:45:46'),
(162, 1000011, 15, 1, '2020-02-22 11:37:55'),
(163, 1000011, 16, 1, '2020-02-22 11:37:55'),
(170, 1000006, 7, 1, '2020-02-26 13:27:08'),
(171, 1000006, 8, 1, '2020-02-26 13:27:08'),
(172, 1000006, 10, 1, '2020-02-26 13:27:08'),
(173, 1000004, 7, 1, '2020-02-26 13:27:36'),
(174, 1000004, 8, 1, '2020-02-26 13:27:36'),
(175, 1000004, 10, 1, '2020-02-26 13:27:36'),
(176, 1000005, 7, 1, '2020-02-26 13:28:02'),
(177, 1000005, 8, 1, '2020-02-26 13:28:02'),
(178, 1000005, 10, 1, '2020-02-26 13:28:02'),
(188, 1000002, 1, 1, '2020-03-02 19:04:01'),
(189, 1000002, 9, 1, '2020-03-02 19:04:01'),
(190, 1000002, 2, 1, '2020-03-02 19:04:01'),
(191, 1000000, 1, 1, '2020-03-05 11:13:53'),
(192, 1000000, 9, 1, '2020-03-05 11:13:53'),
(193, 1000000, 2, 1, '2020-03-05 11:13:53'),
(194, 1000000, 4, 1, '2020-03-05 11:13:53'),
(195, 1000001, 1, 1, '2020-03-05 11:15:42'),
(196, 1000001, 9, 1, '2020-03-05 11:15:42'),
(197, 1000001, 2, 1, '2020-03-05 11:15:42'),
(198, 1000001, 4, 1, '2020-03-05 11:15:42'),
(199, 1000001, 5, 1, '2020-03-05 11:15:42'),
(200, 1000003, 1, 1, '2020-03-05 11:16:22'),
(201, 1000003, 9, 1, '2020-03-05 11:16:22'),
(202, 1000003, 2, 1, '2020-03-05 11:16:22'),
(203, 1000003, 4, 1, '2020-03-05 11:16:22'),
(204, 1000003, 5, 1, '2020-03-05 11:16:22'),
(207, 1000013, 2, 1, '2020-07-13 16:14:41'),
(208, 1000013, 11, 1, '2020-07-13 16:14:41'),
(209, 1000007, 11, 1, '2020-07-13 16:16:32'),
(210, 1000007, 12, 1, '2020-07-13 16:16:32'),
(211, 1000007, 13, 1, '2020-07-13 16:16:32'),
(216, 1000010, 15, 1, '2020-07-14 17:57:48'),
(217, 1000010, 16, 1, '2020-07-14 17:57:48'),
(219, 1000014, 22, 1, '2020-07-14 18:02:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_paquetes_tours`
--

CREATE TABLE `bd_paquetes_tours` (
  `id` int(11) NOT NULL,
  `id_paquetes` int(11) NOT NULL,
  `id_tours_basico` int(11) NOT NULL,
  `id_tours_exclusivo` int(11) NOT NULL,
  `id_tours_recomendado` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_paquetes_tours`
--

INSERT INTO `bd_paquetes_tours` (`id`, `id_paquetes`, `id_tours_basico`, `id_tours_exclusivo`, `id_tours_recomendado`, `dias`, `status`, `fecha_registro`) VALUES
(182, 1000012, 26, 26, 26, 1, 1, '2020-02-19 17:32:21'),
(183, 1000012, 27, 27, 27, 2, 1, '2020-02-19 17:32:21'),
(195, 1000008, 13, 13, 13, 1, 1, '2020-02-21 14:44:44'),
(196, 1000008, 15, 15, 15, 2, 1, '2020-02-21 14:44:44'),
(197, 1000008, 18, 18, 18, 3, 1, '2020-02-21 14:44:44'),
(198, 1000008, 14, 14, 14, 4, 1, '2020-02-21 14:44:44'),
(199, 1000009, 13, 13, 13, 1, 1, '2020-02-21 14:45:46'),
(200, 1000009, 15, 15, 15, 2, 1, '2020-02-21 14:45:46'),
(201, 1000009, 18, 18, 18, 3, 1, '2020-02-21 14:45:46'),
(202, 1000009, 17, 17, 17, 4, 1, '2020-02-21 14:45:46'),
(203, 1000009, 14, 14, 14, 5, 1, '2020-02-21 14:45:46'),
(213, 1000011, 23, 23, 23, 1, 1, '2020-02-22 11:37:55'),
(214, 1000011, 22, 22, 22, 2, 1, '2020-02-22 11:37:55'),
(215, 1000011, 25, 25, 25, 3, 1, '2020-02-22 11:37:55'),
(216, 1000011, 24, 24, 24, 4, 1, '2020-02-22 11:37:55'),
(223, 1000006, 11, 11, 11, 1, 1, '2020-02-26 13:27:08'),
(224, 1000006, 8, 8, 8, 2, 1, '2020-02-26 13:27:08'),
(225, 1000006, 9, 9, 9, 3, 1, '2020-02-26 13:27:08'),
(226, 1000006, 10, 10, 10, 4, 1, '2020-02-26 13:27:08'),
(227, 1000006, 12, 12, 12, 5, 1, '2020-02-26 13:27:08'),
(228, 1000004, 11, 11, 11, 1, 1, '2020-02-26 13:27:36'),
(229, 1000004, 8, 8, 8, 2, 1, '2020-02-26 13:27:36'),
(230, 1000004, 9, 9, 9, 3, 1, '2020-02-26 13:27:36'),
(231, 1000005, 11, 11, 11, 1, 1, '2020-02-26 13:28:02'),
(232, 1000005, 8, 8, 8, 2, 1, '2020-02-26 13:28:02'),
(233, 1000005, 9, 9, 9, 3, 1, '2020-02-26 13:28:02'),
(234, 1000005, 10, 10, 10, 4, 1, '2020-02-26 13:28:02'),
(244, 1000002, 1, 1, 1, 1, 1, '2020-03-02 19:04:01'),
(245, 1000002, 2, 2, 2, 2, 1, '2020-03-02 19:04:01'),
(246, 1000002, 21, 21, 21, 3, 1, '2020-03-02 19:04:01'),
(247, 1000000, 1, 1, 1, 1, 1, '2020-03-05 11:13:53'),
(248, 1000000, 2, 2, 2, 2, 1, '2020-03-05 11:13:53'),
(249, 1000000, 3, 3, 3, 3, 1, '2020-03-05 11:13:53'),
(250, 1000000, 21, 21, 21, 4, 1, '2020-03-05 11:13:53'),
(251, 1000001, 1, 1, 1, 1, 1, '2020-03-05 11:15:42'),
(252, 1000001, 2, 2, 2, 2, 1, '2020-03-05 11:15:42'),
(253, 1000001, 3, 3, 3, 3, 1, '2020-03-05 11:15:42'),
(254, 1000001, 4, 4, 4, 4, 1, '2020-03-05 11:15:42'),
(255, 1000001, 21, 21, 21, 5, 1, '2020-03-05 11:15:42'),
(256, 1000003, 1, 1, 1, 1, 1, '2020-03-05 11:16:22'),
(257, 1000003, 2, 2, 2, 2, 1, '2020-03-05 11:16:22'),
(258, 1000003, 3, 3, 3, 3, 1, '2020-03-05 11:16:22'),
(259, 1000003, 4, 4, 4, 4, 1, '2020-03-05 11:16:22'),
(260, 1000003, 5, 5, 5, 5, 1, '2020-03-05 11:16:22'),
(261, 1000003, 21, 21, 21, 6, 1, '2020-03-05 11:16:22'),
(264, 1000013, 35, 33, 33, 1, 1, '2020-07-13 16:14:41'),
(265, 1000013, 33, 12, 29, 2, 1, '2020-07-13 16:14:41'),
(266, 1000007, 13, 13, 13, 1, 1, '2020-07-13 16:16:32'),
(267, 1000007, 15, 15, 15, 2, 1, '2020-07-13 16:16:33'),
(268, 1000007, 18, 18, 18, 3, 1, '2020-07-13 16:16:33'),
(269, 1000007, 17, 17, 17, 4, 1, '2020-07-13 16:16:33'),
(270, 1000007, 19, 19, 19, 5, 1, '2020-07-13 16:16:33'),
(271, 1000007, 14, 14, 14, 6, 1, '2020-07-13 16:16:33'),
(278, 1000010, 23, 23, 23, 1, 1, '2020-07-14 17:57:48'),
(279, 1000010, 22, 22, 22, 2, 1, '2020-07-14 17:57:48'),
(280, 1000010, 24, 24, 24, 3, 1, '2020-07-14 17:57:48'),
(284, 1000014, 35, 12, 7, 1, 1, '2020-07-14 18:02:25'),
(285, 1000014, 33, 2, 12, 2, 1, '2020-07-14 18:02:25'),
(286, 1000014, 19, 10, 18, 3, 1, '2020-07-14 18:02:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_provincias`
--

CREATE TABLE `bd_provincias` (
  `id` char(6) COLLATE utf16_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(50) COLLATE utf16_spanish_ci NOT NULL DEFAULT '',
  `id_departamento` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_provincias`
--

INSERT INTO `bd_provincias` (`id`, `nombre`, `id_departamento`, `fecha_registro`, `status`) VALUES
('010100', 'Chachapoyas', '010000', NULL, 0),
('010200', 'Bagua', '010000', NULL, 0),
('010300', 'Bongará', '010000', NULL, 0),
('010400', 'Condorcanqui', '010000', NULL, 0),
('010500', 'Luya', '010000', NULL, 0),
('010600', 'Rodríguez de Mendoza', '010000', NULL, 0),
('010700', 'Utcubamba', '010000', NULL, 0),
('020100', 'Huaraz', '020000', NULL, 0),
('020200', 'Aija', '020000', NULL, 0),
('020300', 'Antonio Raymondi', '020000', NULL, 0),
('020400', 'Asunción', '020000', NULL, 0),
('020500', 'Bolognesi', '020000', NULL, 0),
('020600', 'Carhuaz', '020000', NULL, 0),
('020700', 'Carlos Fermín Fitzcarrald', '020000', NULL, 0),
('020800', 'Casma', '020000', NULL, 0),
('020900', 'Corongo', '020000', NULL, 0),
('021000', 'Huari', '020000', NULL, 0),
('021100', 'Huarmey', '020000', NULL, 0),
('021200', 'Huaylas', '020000', NULL, 0),
('021300', 'Mariscal Luzuriaga', '020000', NULL, 0),
('021400', 'Ocros', '020000', NULL, 0),
('021500', 'Pallasca', '020000', NULL, 0),
('021600', 'Pomabamba', '020000', NULL, 0),
('021700', 'Recuay', '020000', NULL, 0),
('021800', 'Santa', '020000', NULL, 0),
('021900', 'Sihuas', '020000', NULL, 0),
('022000', 'Yungay', '020000', NULL, 0),
('030100', 'Abancay', '030000', NULL, 0),
('030200', 'Andahuaylas', '030000', NULL, 0),
('030300', 'Antabamba', '030000', NULL, 0),
('030400', 'Aymaraes', '030000', NULL, 0),
('030500', 'Cotabambas', '030000', NULL, 0),
('030600', 'Chincheros', '030000', NULL, 0),
('030700', 'Grau', '030000', NULL, 0),
('040100', 'Arequipa', '040000', NULL, 0),
('040200', 'Camaná', '040000', NULL, 0),
('040300', 'Caravelí', '040000', NULL, 0),
('040400', 'Castilla', '040000', NULL, 0),
('040500', 'Caylloma', '040000', NULL, 0),
('040600', 'Condesuyos', '040000', NULL, 0),
('040700', 'Islay', '040000', NULL, 0),
('040800', 'La Uniòn', '040000', NULL, 0),
('050100', 'Huamanga', '050000', NULL, 0),
('050200', 'Cangallo', '050000', NULL, 0),
('050300', 'Huanca Sancos', '050000', NULL, 0),
('050400', 'Huanta', '050000', NULL, 0),
('050500', 'La Mar', '050000', NULL, 0),
('050600', 'Lucanas', '050000', NULL, 0),
('050700', 'Parinacochas', '050000', NULL, 0),
('050800', 'Pàucar del Sara Sara', '050000', NULL, 0),
('050900', 'Sucre', '050000', NULL, 0),
('051000', 'Víctor Fajardo', '050000', NULL, 0),
('051100', 'Vilcas Huamán', '050000', NULL, 0),
('060100', 'Cajamarca', '060000', NULL, 0),
('060200', 'Cajabamba', '060000', NULL, 0),
('060300', 'Celendín', '060000', NULL, 0),
('060400', 'Chota', '060000', NULL, 0),
('060500', 'Contumazá', '060000', NULL, 0),
('060600', 'Cutervo', '060000', NULL, 0),
('060700', 'Hualgayoc', '060000', NULL, 0),
('060800', 'Jaén', '060000', NULL, 0),
('060900', 'San Ignacio', '060000', NULL, 0),
('061000', 'San Marcos', '060000', NULL, 0),
('061100', 'San Miguel', '060000', NULL, 0),
('061200', 'San Pablo', '060000', NULL, 0),
('061300', 'Santa Cruz', '060000', NULL, 0),
('070100', 'Prov. Const. del Callao', '070000', NULL, 0),
('080100', 'Cusco', '080000', NULL, 0),
('080200', 'Acomayo', '080000', NULL, 0),
('080300', 'Anta', '080000', NULL, 0),
('080400', 'Calca', '080000', NULL, 0),
('080500', 'Canas', '080000', NULL, 0),
('080600', 'Canchis', '080000', NULL, 0),
('080700', 'Chumbivilcas', '080000', NULL, 0),
('080800', 'Espinar', '080000', NULL, 0),
('080900', 'La Convención', '080000', NULL, 0),
('081000', 'Paruro', '080000', NULL, 0),
('081100', 'Paucartambo', '080000', NULL, 0),
('081200', 'Quispicanchi', '080000', NULL, 0),
('081300', 'Urubamba', '080000', NULL, 0),
('090100', 'Huancavelica', '090000', NULL, 0),
('090200', 'Acobamba', '090000', NULL, 0),
('090300', 'Angaraes', '090000', NULL, 0),
('090400', 'Castrovirreyna', '090000', NULL, 0),
('090500', 'Churcampa', '090000', NULL, 0),
('090600', 'Huaytará', '090000', NULL, 0),
('090700', 'Tayacaja', '090000', NULL, 0),
('100100', 'Huánuco', '100000', NULL, 0),
('100200', 'Ambo', '100000', NULL, 0),
('100300', 'Dos de Mayo', '100000', NULL, 0),
('100400', 'Huacaybamba', '100000', NULL, 0),
('100500', 'Huamalíes', '100000', NULL, 0),
('100600', 'Leoncio Prado', '100000', NULL, 0),
('100700', 'Marañón', '100000', NULL, 0),
('100800', 'Pachitea', '100000', NULL, 0),
('100900', 'Puerto Inca', '100000', NULL, 0),
('101000', 'Lauricocha ', '100000', NULL, 0),
('101100', 'Yarowilca ', '100000', NULL, 0),
('110100', 'Ica ', '110000', NULL, 0),
('110200', 'Chincha ', '110000', NULL, 0),
('110300', 'Nasca ', '110000', NULL, 0),
('110400', 'Palpa ', '110000', NULL, 0),
('110500', 'Pisco ', '110000', NULL, 0),
('120100', 'Huancayo ', '120000', NULL, 0),
('120200', 'Concepción ', '120000', NULL, 0),
('120300', 'Chanchamayo ', '120000', NULL, 0),
('120400', 'Jauja ', '120000', NULL, 0),
('120500', 'Junín ', '120000', NULL, 0),
('120600', 'Satipo ', '120000', NULL, 0),
('120700', 'Tarma ', '120000', NULL, 0),
('120800', 'Yauli ', '120000', NULL, 0),
('120900', 'Chupaca ', '120000', NULL, 0),
('130100', 'Trujillo ', '130000', NULL, 0),
('130200', 'Ascope ', '130000', NULL, 0),
('130300', 'Bolívar ', '130000', NULL, 0),
('130400', 'Chepén ', '130000', NULL, 0),
('130500', 'Julcán ', '130000', NULL, 0),
('130600', 'Otuzco ', '130000', NULL, 0),
('130700', 'Pacasmayo ', '130000', NULL, 0),
('130800', 'Pataz ', '130000', NULL, 0),
('130900', 'Sánchez Carrión ', '130000', NULL, 0),
('131000', 'Santiago de Chuco ', '130000', NULL, 0),
('131100', 'Gran Chimú ', '130000', NULL, 0),
('131200', 'Virú ', '130000', NULL, 0),
('140100', 'Chiclayo ', '140000', NULL, 0),
('140200', 'Ferreñafe ', '140000', NULL, 0),
('140300', 'Lambayeque ', '140000', NULL, 0),
('150100', 'Lima ', '150000', NULL, 0),
('150200', 'Barranca ', '150000', NULL, 0),
('150300', 'Cajatambo ', '150000', NULL, 0),
('150400', 'Canta ', '150000', NULL, 0),
('150500', 'Cañete ', '150000', NULL, 0),
('150600', 'Huaral ', '150000', NULL, 0),
('150700', 'Huarochirí ', '150000', NULL, 0),
('150800', 'Huaura ', '150000', NULL, 0),
('150900', 'Oyón ', '150000', NULL, 0),
('151000', 'Yauyos ', '150000', NULL, 0),
('160100', 'Maynas ', '160000', NULL, 0),
('160200', 'Alto Amazonas ', '160000', NULL, 0),
('160300', 'Loreto ', '160000', NULL, 0),
('160400', 'Mariscal Ramón Castilla ', '160000', NULL, 0),
('160500', 'Requena ', '160000', NULL, 0),
('160600', 'Ucayali ', '160000', NULL, 0),
('160700', 'Datem del Marañón ', '160000', NULL, 0),
('160800', 'Putumayo', '160000', NULL, 0),
('170100', 'Tambopata ', '170000', NULL, 0),
('170200', 'Manu ', '170000', NULL, 0),
('170300', 'Tahuamanu ', '170000', NULL, 0),
('180100', 'Mariscal Nieto ', '180000', NULL, 0),
('180200', 'General Sánchez Cerro ', '180000', NULL, 0),
('180300', 'Ilo ', '180000', NULL, 0),
('190100', 'Pasco ', '190000', NULL, 0),
('190200', 'Daniel Alcides Carrión ', '190000', NULL, 0),
('190300', 'Oxapampa ', '190000', NULL, 0),
('200100', 'Piura ', '200000', NULL, 0),
('200200', 'Ayabaca ', '200000', NULL, 0),
('200300', 'Huancabamba ', '200000', NULL, 0),
('200400', 'Morropón ', '200000', NULL, 0),
('200500', 'Paita ', '200000', NULL, 0),
('200600', 'Sullana ', '200000', NULL, 0),
('200700', 'Talara ', '200000', NULL, 0),
('200800', 'Sechura ', '200000', NULL, 0),
('210100', 'Puno ', '210000', NULL, 0),
('210200', 'Azángaro ', '210000', NULL, 0),
('210300', 'Carabaya ', '210000', NULL, 0),
('210400', 'Chucuito ', '210000', NULL, 0),
('210500', 'El Collao ', '210000', NULL, 0),
('210600', 'Huancané ', '210000', NULL, 0),
('210700', 'Lampa ', '210000', NULL, 0),
('210800', 'Melgar ', '210000', NULL, 0),
('210900', 'Moho ', '210000', NULL, 0),
('211000', 'San Antonio de Putina ', '210000', NULL, 0),
('211100', 'San Román ', '210000', NULL, 0),
('211200', 'Sandia ', '210000', NULL, 0),
('211300', 'Yunguyo ', '210000', NULL, 0),
('220100', 'Moyobamba ', '220000', NULL, 0),
('220200', 'Bellavista ', '220000', NULL, 0),
('220300', 'El Dorado ', '220000', NULL, 0),
('220400', 'Huallaga ', '220000', NULL, 0),
('220500', 'Lamas ', '220000', NULL, 0),
('220600', 'Mariscal Cáceres ', '220000', NULL, 0),
('220700', 'Picota ', '220000', NULL, 0),
('220800', 'Rioja ', '220000', NULL, 0),
('220900', 'San Martín ', '220000', NULL, 0),
('221000', 'Tocache ', '220000', NULL, 0),
('230100', 'Tacna ', '230000', NULL, 0),
('230200', 'Candarave ', '230000', NULL, 0),
('230300', 'Jorge Basadre ', '230000', NULL, 0),
('230400', 'Tarata ', '230000', NULL, 0),
('240100', 'Tumbes ', '240000', NULL, 0),
('240200', 'Contralmirante Villar ', '240000', NULL, 0),
('240300', 'Zarumilla ', '240000', NULL, 0),
('250100', 'Coronel Portillo ', '250000', NULL, 0),
('250200', 'Atalaya ', '250000', NULL, 0),
('250300', 'Padre Abad ', '250000', NULL, 0),
('250400', 'Purús', '250000', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_reclamos`
--

CREATE TABLE `bd_reclamos` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `numero` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `actividad` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `servicio` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `problema` text COLLATE utf16_spanish_ci NOT NULL,
  `solucion` text COLLATE utf16_spanish_ci NOT NULL,
  `direccion` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_servicios_populares_hoteles`
--

CREATE TABLE `bd_servicios_populares_hoteles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_servicios_populares_hoteles`
--

INSERT INTO `bd_servicios_populares_hoteles` (`id`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'desayuno gratis', '', 1, '0000-00-00 00:00:00'),
(2, 'piscina', '', 1, '0000-00-00 00:00:00'),
(3, 'estacionamiento', '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_siglas_cupon`
--

CREATE TABLE `bd_siglas_cupon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_siglas_cupon`
--

INSERT INTO `bd_siglas_cupon` (`id`, `nombre`, `status`, `fecha_registro`) VALUES
(1, 'AVE', 1, '2020-03-09 16:07:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tematicas`
--

CREATE TABLE `bd_tematicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tematicas`
--

INSERT INTO `bd_tematicas` (`id`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'Canotaje', '', 1, '2019-10-08 04:00:00'),
(2, 'Naturaleza', '', 1, '2019-10-07 02:00:00'),
(3, 'Trekking', '', 1, '0000-00-00 00:00:00'),
(4, 'Cuatrimoto', '', 1, '0000-00-00 00:00:00'),
(5, 'Rafting', '', 1, '0000-00-00 00:00:00'),
(6, 'Catarata', '', 1, '0000-00-00 00:00:00'),
(7, 'City Tour', '', 1, '0000-00-00 00:00:00'),
(8, 'Historico', '', 1, '0000-00-00 00:00:00'),
(9, 'aventuras', 'adrenalina y diversión', 1, '2020-02-19 10:38:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_temporal_imagenes`
--

CREATE TABLE `bd_temporal_imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `nombre_extension` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `identificador` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_temporal_imagenes`
--

INSERT INTO `bd_temporal_imagenes` (`id`, `nombre`, `nombre_extension`, `identificador`) VALUES
(7, 'foto-tour-20200711014530', 'foto-tour-20200711014530.jpg', '001881738'),
(8, 'foto-tour-20200711014535', 'foto-tour-20200711014535.jpg', '001881738'),
(9, 'foto-tour-20200711014605', 'foto-tour-20200711014605.jpg', '001881738'),
(10, 'foto-tour-20200711014634', 'foto-tour-20200711014634.jpg', '001881738'),
(11, 'foto-tour-20200711014640', 'foto-tour-20200711014640.jpg', '001881738'),
(12, 'foto-tour-20200713224746', 'foto-tour-20200713224746.jpg', '001881738');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_temporal_imagenes_hoteles`
--

CREATE TABLE `bd_temporal_imagenes_hoteles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `nombre_extension` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `identificador` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tipos_ofertas`
--

CREATE TABLE `bd_tipos_ofertas` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tipos_ofertas`
--

INSERT INTO `bd_tipos_ofertas` (`id`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES
(1, 'aumento', '', 1, '2020-07-21 23:54:04'),
(2, 'cupón', '', 1, '2020-07-21 23:54:04'),
(3, 'descuento', '', 1, '2020-07-21 23:54:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tours`
--

CREATE TABLE `bd_tours` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `nombre_posic` varchar(200) COLLATE utf16_spanish_ci NOT NULL,
  `tipo_evento` varchar(100) COLLATE utf16_spanish_ci NOT NULL DEFAULT 'TOURS',
  `descripcion` text COLLATE utf16_spanish_ci NOT NULL,
  `descripcion_posic` text COLLATE utf16_spanish_ci NOT NULL,
  `detalle` text COLLATE utf16_spanish_ci NOT NULL,
  `recomendacion` text COLLATE utf16_spanish_ci NOT NULL,
  `moneda` int(11) NOT NULL,
  `precio_minimo` decimal(10,2) NOT NULL,
  `precio_maximo` decimal(10,2) NOT NULL,
  `duracion` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `id_departamento` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `id_provincia` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `id_distrito` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tours`
--

INSERT INTO `bd_tours` (`id`, `nombre`, `nombre_posic`, `tipo_evento`, `descripcion`, `descripcion_posic`, `detalle`, `recomendacion`, `moneda`, `precio_minimo`, `precio_maximo`, `duracion`, `status`, `id_departamento`, `id_provincia`, `id_distrito`, `fecha_registro`) VALUES
(1, 'Tour Lamas Nativo', '', 'TOURS', '<p>En este tour visitaremos Lamas es una ciudad muy colorida se encuentra cerca a Tarapoto, tambien iremos a su conocido castillo que es muy lindo y tiene una hermosa vista también podrás compartir sus costumbres junto con los nativos de la ciudad.</p>\r\n', '', '<p><strong>SALIDA: </strong> 15:00 PM - 15:30 PM </p>\r\n\r\n<p><strong>RETORNO: </strong> 19:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Visita el castillo</li>\r\n <li>Visita al mirador natural</li>\r\n <li>Visita el barrio Wayku – comunidad nativos</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Visita el museo étnico (Es opcional - pagar ticket de entrada)</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>15:30 pm:</strong> Recojo de su hotel y partida a Lamas.</p>\r\n\r\n<p>Visita al museo étnico. (Opcional a cuenta del pasajero).</p>\r\n\r\n<p>Visita al mirador natural.</p>\r\n\r\n<p>Visita al castillo de Lamas.</p>\r\n\r\n<p>Visita al barrio nativo quechua Wayku.</p>\r\n\r\n<p><strong>18:30 pm - 19:00 pm: </strong>Llegada a Tarapoto.</p>\r\n', '<p>- Llevar ropa ligera, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '35.00', '40.00', 1, 1, '220000', '220900', '220901', '2020-02-10 18:48:25'),
(2, 'Tour Laguna Azul', '', 'TOURS', '<p>Si quieres pasar un día de full relajo entonces esta es una buena opción para ti, vas a poder disfrutar de la laguna y al final nunca querrás irte de este mágico lugar.</p>\r\n', '', '<p><strong>SALIDA: </strong>8:30 AM – 9:15 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 18:30 PM  (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Almuerzo regional *Solo platos seleccionados*</li>\r\n <li>Paseo en bote a motor por la laguna</li>\r\n <li>Paseo en Caballo</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Actividades extras (Moto acuática y canopy costo S/25.00 Aproximado, Kayak costo S/15.00 Aproximado)</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>08:30 am - 09:15 am:</strong> Recojo desde su hotel y partida hacia nuestro destino Sauce (Laguna Azul)</p>\r\n\r\n<p><strong>11:00 am. </strong>Llegada al distrito de Sauce.</p>\r\n\r\n<p>Paseo en bote a motor por la laguna.</p>\r\n\r\n<p><strong>13:00 p.m.</strong> Almuerzo en el restaurante  (A orillas de la Laguna Azul).</p>\r\n\r\n<p>Visita al recreo turístico el Caño para bañarse y paseo a caballo, (actividades opcionales- no incluye).</p>\r\n\r\n<p>Tiempo libre para ver y comprar artesanías.</p>\r\n\r\n<p>Paseo en bote motor de retorno.</p>\r\n\r\n<p><strong>16:30 pm.</strong> Partida a la ciudad de Tarapoto.</p>\r\n\r\n<p><strong>18:00 pm - 18:30 pm</strong> Llegada a Tarapoto y traslado a su hotel.</p>\r\n', '<p>- Llevar ropa ligera (Ropa de baño, shorts o bermudas, sandalias o zapatos de agua), zapatillas, toallas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '75.00', '85.00', 2, 1, '220000', '220900', '220901', '2020-02-10 19:05:03'),
(3, 'Tour Alto Mayo ', '', 'TOURS', '<p>En este tour podrás disfrutar al máximo y visitarás varios destinos de nuestra linda Amazonía, entre ellos la ciudad de Rioja y Moyobamba más conocida como la ciudad de las Orquídeas.</p>\r\n', '', '<p><strong>SALIDA: </strong> 7:30 AM - 8:15 AM</p>\r\n\r\n<p><strong>RETORNO: </strong> 19:30 PM - 20:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio Compartido)</li>\r\n <li>Guiado en Español</li>\r\n <li>Ingreso a los lugares turísticos</li>\r\n <li>Visita al Tio Yacu (Manantial)</li>\r\n <li>Visita a los Baños Termales San Mateo</li>\r\n <li>Visita al Chuchucenter </li>\r\n <li>Visita al Orquidiario</li>\r\n <li>Almuerzo regional *Solo platos Seleccionados*</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>07:30 am - 08:00 am:</strong>  Recojo y partida hacia la ciudad de Moyobamba</p>\r\n\r\n<p><strong>10:00 am.</strong> Llegada a la ciudad de Moyobamba, visita al Orquideario</p>\r\n\r\n<p><strong>12:00 pm.</strong> Visita a la naciente del río Tioyacu</p>\r\n\r\n<p><strong>13:30 pm. </strong>Visita a Chuchucenter</p>\r\n\r\n<p><strong>14:30 pm. </strong>Almuerzo en recreo</p>\r\n\r\n<p><strong>16:00 pm.</strong> Visita a los Baños Termales de San Mateo</p>\r\n\r\n<p><strong>18:00 pm.</strong> Retorno a la ciudad de Tarapoto</p>\r\n\r\n<p><strong>19:30 pm - 20:00 pm:</strong> Llegada a Tarapoto.</p>\r\n', '<p>- Llevar ropa ligera (Ropa de baño, shorts o bermudas, sandalias o zapatos de agua), zapatillas, toallas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '90.00', '110.00', 2, 1, '220000', '220900', '220901', '2020-02-10 19:10:03'),
(4, 'Tour Catarata de Carpishuyacu ', '', 'TOURS', '<p>En este tour podrás disfrutar de una aventura dentro de la selva, visitaremos la catarata de Carpishuyacu y los baños termales donde luego de una caminata un poco complicada podrán relajarse.</p>\r\n', '', '<p><strong>SALIDA: </strong>9:00 AM - 9:30 AM</p>\r\n\r\n<p><strong>RETORNO: </strong> 16:30 PM - 17:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Entrada a la Catarata</li>\r\n <li>Visita a los Baños Termales San Jose</li>\r\n <li>Almuerzo box lunch</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>09:00 am - 09:30 am:</strong> Recojo y partida de su hotel hacia las catarata de Carpishuyacu</p>\r\n\r\n<p><strong>10:30 am.</strong> Llegada a la entrada de las cataratas</p>\r\n\r\n<p><strong>10:40 am</strong>. Comienzo de la caminata rumbo a los baños termales y cataratas</p>\r\n\r\n<p><strong>11:20 am</strong>. Cruce de rio en balsa</p>\r\n\r\n<p><strong>12:00 pm.</strong> Llegada a la catarata de Carpishuyacu</p>\r\n\r\n<p><strong>13:00 pm.</strong> Retorno a los baños termales de San José y almuerzo</p>\r\n\r\n<p><strong>03:00 pm</strong>. Visita a los baños termales de San José</p>\r\n\r\n<p><strong>14:30 pm.</strong> Caminata de retorno</p>\r\n\r\n<p><strong>16:30 pm - 17:00 pm: </strong>Llegada a Tarapoto.</p>\r\n', '<p>- Llevar ropa ligera (Ropa de baño, shorts o bermudas, sandalias o zapatos de agua), zapatillas, toallas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>*NOTA: No recomendado para niños y adultos mayores**</strong></p>\r\n', 1, '75.00', '85.00', 2, 1, '220000', '220900', '220901', '2020-02-12 12:04:01'),
(5, 'Tour Catarata de Pucayaquillo', '', 'TOURS', '<p>Este tour harémos una breve caminata en la linda Amazonía peruana y al final llegaremos a nuestro destino \"la catarata de Pucayaquillo\" luego podrán meterse un chapuzón en sus cristalinas aguas.</p>\r\n', '', '<p><strong>SALIDA: </strong> 9:00 A 9:30 AM</p>\r\n\r\n<p><strong>RETORNO: </strong> 16:00 PM - 16:30PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Entrada a la catarata</li>\r\n <li>Almuerzo box lunch</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>09:00 am - 09:30 am:</strong> Recojo y partida de su hotel</p>\r\n\r\n<p><strong>10:30 am.</strong> Llegada a la entrada de la catarata</p>\r\n\r\n<p><strong>11:15 am.</strong> Inicio de la caminata rumbo a la catarata</p>\r\n\r\n<p><strong>12:00 am.</strong> Llegada a la catarata (Se pueden dar un baño refrescante)</p>\r\n\r\n<p><strong>12:30 pm.</strong> Caminata de retorno</p>\r\n\r\n<p><strong>14:00 pm.</strong> Almuerzo</p>\r\n\r\n<p><strong>15:45 pm</strong>. Retorno a Tarapoto</p>\r\n\r\n<p><strong>16:30 pm</strong>  Llegada a Tarapoto.</p>\r\n', '<p>- Llevar ropa ligera (Ropa de baño, shorts o bermudas, sandalias o zapatos de agua), zapatillas, toallas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>**Nota: Mínimo 2 personas para tomar el tour**</strong></p>\r\n', 1, '90.00', '100.00', 2, 1, '220000', '220900', '220901', '2020-02-12 12:14:55'),
(6, 'City tour Tarapoto', '', 'TOURS', '<p>Si quieres pasar un momento familiar este es el tour indicado, visitarás los principales lugares de la ciudad de Tarapoto la fábrica de chocolate, la conocida Tabacalera y el Centro de Rescate de animales Urkus.</p>\r\n', '', '<p><strong>SALIDA: </strong> 9:00 AM</p>\r\n\r\n<p><strong>RETORNO: </strong> 12:00 - 12:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio Compartido)</li>\r\n <li>Entradas</li>\r\n <li>Guiado en Español</li>\r\n <li>Visita a la Fabrica de Chocolate </li>\r\n <li>Visita a la Tabacalera</li>\r\n <li>Visita al Centro de Rescate Urkus</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Alimentación</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>09:00 am:</strong> Recojo de hotel</p>\r\n\r\n<p><strong>09:45 am</strong> Visita a la Fábrica de puros artesanales de tabaco</p>\r\n\r\n<p><strong>10:15 am</strong> Visita a la Fábrica de Chocolate la Orquídea</p>\r\n\r\n<p><strong>11:00 am. </strong>Visita al Centro de Rescate Urkus</p>\r\n\r\n<p><strong>12:00 pm - 12:30 pm: </strong>Retorno a su hotel.</p>\r\n', '<p>- Llevar ropa ligera, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<ul>\r\n <li> Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</li>\r\n <li> Niños a partir de 5 años pagan la tarifa normal.</li>\r\n</ul>\r\n\r\n<p><strong>**Nota: Mínimo 2 personas para tomarl el tour**</strong></p>\r\n', 1, '60.00', '70.00', 1, 1, '220000', '220900', '220901', '2020-02-12 12:21:49'),
(7, 'Tour Rafting y Canotaje', '', 'TOURS', '<p>Quieres sentir la adrenalina y pasar un momento increible, entonces este es el tour ideal para ti, harás canotaje y rafting en el rio mayo.</p>\r\n', '', '<p><strong>SALIDA: </strong> 9:00 AM (1er Turno) /  15:00 PM (2do Turno)</p>\r\n\r\n<p><strong>RETORNO: </strong> 12:30 PM (1er turno) / 18:30PM (2do turno)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Instructor y guía de turismo.</li>\r\n <li>Equipos de seguridad (Chaleco)</li>\r\n</ul>\r\n', '<p>- Llevar ropa cómoda, zapatillas, toallas, repelente, bloqueador, lentes de sol, snacks, etc.</p>\r\n\r\n<p><strong>*NOTA: No recomendado para niños y adultos mayores**</strong></p>\r\n', 1, '60.00', '70.00', 1, 1, '220000', '220900', '220901', '2020-02-12 12:30:59'),
(8, 'Tour Fortaleza de Kuelap', '', 'TOURS', '<p>En está excursion podrás visitar la Fortaleza de Kuelap uno de los lugares más representativos de la cultura Chachapoyas, fue una ciudad antigua se calcula que vivieron cerca de 3000 personas.</p>\r\n', '', '<p><strong>SALIDA: </strong>8:00 AM - 8:45 AM</p>\r\n\r\n<p><strong>RETORNO: </strong>17:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo de su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Traslado en telecabinas Kuelap ida y retorno (teleférico)</li>\r\n <li>Ingreso a la ciudadela</li>\r\n <li>Visita a la Fortaleza de Kuelap</li>\r\n <li>Almuerzo en restaurante campestre *Solo platos seleccionados**           </li>\r\n</ul>\r\n', '<p>- Llevar ropa ligera y abrigadora, impermeable (en caso que pueda llover), zapatillas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años solo pagan el servicio de las telecabinas S/20.40 Aprox, sobre los demas servicios están exonerados de pago pero no tienen derecho a tomar asiento en los tours ni alimentación.</p>\r\n\r\n<p>- Niños desde los 5 años pagan el precio normal.</p>\r\n', 1, '110.00', '120.00', 2, 1, '010000', '010100', '010101', '2020-02-13 12:08:27'),
(9, 'Tour Catarata de Gocta', '', 'TOURS', '<p>En este tour podrás visitar una de las cataratas más grandes del mundo, para llegar a la \"catarata de Gocta\" realizaremos una larga caminata donde apreciaremos una linda gama de flora y fauna si tienen suerte podrán ver a la famosa ave Gallito de las Rocas.</p>\r\n', '', '<p><strong>SALIDA</strong> 8:30 AM - 9:15 AM</p>\r\n\r\n<p><strong>RETORNO</strong> 17:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo de su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Entrada a la catarata</li>\r\n <li>Almuerzo en el poblado de Cocachimba</li>\r\n</ul>\r\n\r\n<p><strong>Tiempo de caminata:  4 horas, ida y vuelta (Aprox.) </strong></p>\r\n', '<p>- Llevar ropa ligera y abrigadora, impermeable (en caso que pueda llover), zapatillas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>*Nota: No recomendado para niños y adultos mayores**</strong></p>\r\n', 1, '70.00', '80.00', 2, 1, '010000', '010100', '010101', '2020-02-13 12:11:50'),
(10, 'Tour Karajia y Cavernas de Quiocta', '', 'TOURS', '<p>En está excursion visitaremos Karajia unos sarcófagos que servian como tumbas para altos rangos de clase social, también iremos a las Cavernas de Quiocta donde podremos observar hermosas formaciones de estalactitas que nos dejarán impresionados.</p>\r\n', '', '<p><strong>SALIDA</strong> 8:00 AM - 8:45 AM</p>\r\n\r\n<p><strong>RETORNO</strong> 18:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo de su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Visita a los sarcofagos de Karajia</li>\r\n <li>Visita a las cavernas de Quiocta</li>\r\n <li>Almuerzo en Lamud - Luya</li>\r\n <li>Entradas</li>\r\n</ul>\r\n', '<p>- Llevar ropa ligera y abrigadora, impermeable (en caso que pueda llover), zapatillas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '110.00', '120.00', 2, 1, '010000', '010100', '010101', '2020-02-13 12:19:23'),
(11, 'City tour Huancas', '', 'TOURS', '<p>En este tour visitaremos a un pueblo muy conocido por ser alfareros \"Huancas\" es un pueblo muy lindo que tiene mucho por ofrecer, tambien visitaremos cañones donde podremos tener espectaculares vistas quedarás maravillado.</p>\r\n', '', '<p><strong>SALIDA: </strong>10:00 AM (1er Turno) / 14:00 PM (2do Turno)</p>\r\n\r\n<p><strong>RETORNO: </strong>13:00 PM (1er Turno) / 17:00 PM (2do Turno)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo de su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Visita al pueblo Huancas (Plaza principal, iglesia y alrededores)</li>\r\n <li>Visita al mirador del cañon del rio Sonche</li>\r\n <li>Visita al cañon de Huanca Urco</li>\r\n <li>Visita al mirador Luya Urco</li>\r\n <li>Visita al pozo de Yanayacu (Fuente del amor)</li>\r\n <li>Ticket de ingreso a los lugares a visitar</li>\r\n</ul>\r\n', '<p>- Llevar ropa ligera y abrigadora, impermeable (en caso que pueda llover), zapatillas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>**Nota: Mínimo 2 personas para tomar el tour**</strong></p>\r\n', 1, '60.00', '70.00', 1, 1, '010000', '010100', '010101', '2020-02-13 12:30:59'),
(12, 'Tour Revash y Museo de Leymebamba', '', 'TOURS', '<p>En este tour visitaremos un lugar enigmático Revash es un sitio arqueológico que fue usado como tumbas, están ubicados en lugares inaccesibles; tambien iremos al museo de Leymebamba donde albergan más de 200 momias es un tour muy interesante.</p>\r\n', '', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p>&lt;!-- x-tinymce/html --&gt;<strong>SALIDA:</strong> 8:00 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 6:30 PM</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Visita al pueblo de San Bartolo (Desde ahi se caminará por 45min Aprox.)</li>\r\n <li>Visita a los mausoleos de Revash </li>\r\n <li>Visita al museo de Leymebamba</li>\r\n <li>Ticket de ingreso a los lugares a visitar</li>\r\n</ul>\r\n', '<p>&lt;!-- x-tinymce/html --&gt;</p>\r\n\r\n<p>- Llevar ropa ligera y abrigadora, impermeable (en caso que pueda llover), zapatillas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES: </strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>** Nota: Mínimo 2 personas para tomar el tour**</strong></p>\r\n', 1, '120.00', '130.00', 2, 1, '010000', '010100', '010101', '2020-02-13 12:40:51'),
(13, 'City Tour y Ruinas', '', 'TOURS', '<p>En está excursión muy aparte de hacer un City tour dentro de la ciudad y también de visitar Koricancha, nos dirigiremos a las principales ruinas que están cerca y alrededor de la ciudad de Cusco.</p>\r\n', '', '<p><strong>SALIDA:</strong> 13:15 PM - 13:45 PM</p>\r\n\r\n<p><strong>RETORNO:</strong> 18:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<p>- Recojo en su hotel (Solo cerca de la ciudad)</p>\r\n\r\n<p>- Movilidad (Servicio Compartido)</p>\r\n\r\n<p>- Guiado en Español</p>\r\n\r\n<p>- Visita  Koricancha + Ingreso </p>\r\n\r\n<p>- Visita al Sacsayhuaman</p>\r\n\r\n<p>- Visita a Qenqo</p>\r\n\r\n<p>- Visita a Puca Pucara (Fortaleza Roja)</p>\r\n\r\n<p>- Visita a Tambomachay</p>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<p>- Tickets de ingreso para los sitios arqueológicos de Cusco y Valle Sagrado (Lo pueden adquirir cuando esten realizando su primera visita solo recuerden llevar efectivo) Si solo tomarán este tour solo necesitarían el Boleto Turístico Parcial: Nacionales S/. 40.00 Extranjeros S/. 70.00 que solo te dura 1 día, o bien recomendamos comprar el Boleto Turistico General: Nacionales S/. 70.00 Extranjeros S/. 130.00 tiene 10 días de duración.</p>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>13:15pm a 13:45pm: Empezaremos con el recojo respectivo a su hotel para trasladarlos hasta el lugar donde inicia el tour.</p>\r\n\r\n<p>Iniciamos la excursión visitando el templo del Sol o Qoricancha, la máxima expresión de la arquitectura e ingeniería inca, luego nos embarcamos en nuestra movilidad con rumbo a la impresionante fortaleza de Sacsayhuaman, está estratégicamente construida sobre un cerro desde donde se aprecia todo Cusco.</p>\r\n\r\n<p>Continuando con nuestro recorrido, visitamos el Complejo arqueológico de Qenqo, etimologicamente significa laberinto o zigzag, cumplió una función netamente religiosa. Para finalizar visitaremos Puka Pikara que significa «fortaleza roja», porque las piedras calcáreas con las que está construida han adquirido la coloración rojiza del terreno, muy abundante en hierro. Y por ultimo Tambomachay es un sitio arqueológico que fue destinado al culto al agua y para que el jefe del Imperio Inca pudiese descansar. </p>\r\n\r\n<p>18:30 pm: Retorno a Cusco (desembarque lugar céntrico).</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, calzado cómodo y/o para caminatas, impermeable o poncho (en caso de lluvias), gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho al asiento en los tours ni alimentación)</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '70.00', '85.00', 1, 1, '080000', '080100', '080101', '2020-02-13 13:05:03'),
(14, 'Tour Maras Moray y Salineras', '', 'TOURS', '<p>Esta visita guiada es ideal para saber más acerca de la historia Inca y también podrás disfrutar de hermosas vistas, que te brinda cada lugar turistico como Moray que fue un laboratorio agricola y tambien las Salineras de Maras que son un conjunto de minas de sal.</p>\r\n', '', '<p><strong>SALIDA:</strong> 8:00AM - 8:30AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 14:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<p>- Recojo en su hotel (Solo cerca de la ciudad)</p>\r\n\r\n<p>- Movilidad (Servicio Compartido)</p>\r\n\r\n<p>- Guiado en Español</p>\r\n\r\n<p>- Visita a Moray</p>\r\n\r\n<p>- Visita al Pueblo de Maras</p>\r\n\r\n<p>- Visita a las Salineras de Maras</p>\r\n\r\n<p>- Ingreso a las Salineras</p>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<p>- Tickets de ingreso para los sitios arqueológicos de Cusco y Valle Sagrado (Lo pueden adquirir cuando esten realizando su primera visita solo recuerden llevar efectivo) Si solo tomarán este tour solo necesitarían el Boleto Turístico Parcial: Nacionales S/. 40.00 Extranjeros S/. 70.00 que solo te dura 1 día, o bien recomendamos comprar el Boleto Turistico General: Nacionales S/. 70.00 Extranjeros S/. 130.00 tiene 10 días de duración.</p>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>08:00 am - 08:30 am: Nuestra excursión inicia con el recojo del hotel en Cusco.</p>\r\n\r\n<p>Luego iremos con dirección a Maras, un pueblo tradicional donde apreciaremos su iglesia hecha de adobe, continuaremos hacia el centro arqueológico de Moray al norte de la ciudad de Maras. Moray es una construcción única de varias plataformas circulares que sirvieron como laboratorio agrícola para experimentar con diferentes productos en la época incaica.</p>\r\n\r\n<p>Continuando la excursión llegaremos a las Salineras de Maras, impresionantes plataformas de sal formada de miles de pozos blancos que aparecen como la nieve. Estos se han utilizado durante miles de años, mucho antes del imperio Inca y hasta hoy en día, se mantienen en uso por los habitantes locales.</p>\r\n\r\n<p>14:30pm: Aproxidamente culminaremos el recorrido en Cusco.</p>\r\n\r\n<p> </p>\r\n', '<p>- Llevar ropa ligera y abrigadora, calzado cómodo y/o para caminatas, impermeables y ponchos (en caso de lluvia), gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho al asiento en los tours ni alimentación)</p>\r\n', 1, '75.00', '90.00', 1, 1, '080000', '080100', '080101', '2020-02-13 13:17:42'),
(15, 'Tour Full Day Valle Sagrado', '', 'TOURS', '<p>En está excursión visitaremos ruinas muy conocidas en Cusco, que son Pisaq y Ollantaymbo, tambien visitaremos el mercado Artesanal de Pisac y el pueblo de Chincheros, por último degustaremos de un delicioso almuerzo buffet.</p>\r\n', '', '<p><strong>SALIDA:</strong> 8:30AM - 8:50AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 19:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<p>- Recojo en su hotel (Solo cerca de la ciudad)</p>\r\n\r\n<p>- Movilidad (Servicio Compartido)</p>\r\n\r\n<p>- Guiado en Español </p>\r\n\r\n<p>- 01 Almuerzo buffet</p>\r\n\r\n<p>- Visita a Pisaq y Mercado Artesanal</p>\r\n\r\n<p>- Visita a Ollantaytambo \"La Ciudad del Inca Viviente\"</p>\r\n\r\n<p>- Visita a Chinchero </p>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<p>- Tickets de ingreso para los sitios arqueológicos de Cusco y Valle Sagrado (Lo pueden adquirir cuando esten realizando su primera visita solo recuerden llevar efectivo) Si solo tomarán este tour solo necesitarían el Boleto Turístico Parcial: Nacionales S/. 40.00 Extranjeros S/. 70.00 que solo te dura 1 día, o bien recomendamos comprar el Boleto Turistico General: Nacionales S/. 70.00 Extranjeros S/. 130.00 tiene 10 días de duración.</p>\r\n\r\n<p><strong>ITINERARIO: </strong></p>\r\n\r\n<p>08:30 am - 8:50 am: Iniciaremos con el recojo a su respectivo hotel para luego dirigirnos al pueblo de Pisaq ; donde se podrá apreciar y hacer algunas compras en el Mercado Artesanal de Pisaq, ubicado en la Plaza Principal, también se observará el trabajo típico artesanal en cerámica, cuero y telares.</p>\r\n\r\n<p>Continuando la excursión pasaremos por los poblados de Coya, Lamay, Calca, Yucay, Urubamba, observando gran variedad de flora y fauna, así como también terrazas incas, al llegar a la ciudad de Urubamba haremos una parada donde almorzaremos en un restaurant típico (Almuerzo buffet); luego continuamos el recorrido hacia el pueblo de Ollantaytambo, en donde visitaremos el Complejo Arqueológico, construida para vigilar el ingreso a esta parte del valle y protegerlo de posibles invasiones. Después de la visita al retorno visitaremos las ruinas de Chinchero y su pequeña Capilla a pocos minutos de la ciudad del Cusco.</p>\r\n\r\n<p>18:00 pm: Retornamos a la ciudad de Cusco (Desembarque lugar centrico).</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, calzado cómodo, impermeable o poncho (en caso de lluvias), gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho al asiento en los tours y alimentación).</p>\r\n\r\n<p>- Niños a partir de los 5 años pagan la tarifa normal.</p>\r\n', 1, '95.00', '110.00', 2, 1, '080000', '080100', '080101', '2020-02-13 14:55:53'),
(16, 'Tour Valle Sagrado con conexion', '', 'TOURS', '<p>En está excursión visitaremos ruinas muy conocidas en Cusco, que son Pisaq y Ollantaymbo tambien disfrutaremos de un delicioso almuerzo buffet.</p>\r\n', '', '<p><strong>SALIDA:</strong> 7:30AM - 8:00AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 4:30PM – 5:00 PM (Aprox.) a la Estación de Tren Ollantaytambo</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio Compartido)</li>\r\n <li>Guiado</li>\r\n <li>01 Almuerzo buffet</li>\r\n <li>Visita a Pisaq y Mercado Artesanal</li>\r\n <li>Visita a Ollantaytambo \"La Ciudad del Inca Viviente\"</li>\r\n <li>Entradas para los lugares a visitar (Boleto Turístico parcial)</li>\r\n</ul>\r\n', '<p>- Llevar ropa ligera y abrigadora, calzado cómodo, gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho al asiento en los tours y alimentación)</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '140.00', '175.00', 2, 0, '080000', '080100', '080101', '2020-02-13 15:03:11'),
(17, 'Tour Montaña de 7 colores', '', 'TOURS', '<p>Está excursión se hizo muy reconocido a nivel mundial que no te lo puedes perder, para llegar a la Montaña de 7 Colores la caminata es un poco pesada pero vale la pena tiene una vista espectacular</p>\r\n', '', '<p><strong>SALIDA:</strong> 04:00AM – 04:30AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 18:00PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo en su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio Compartido)</li>\r\n <li>Guiado en Español</li>\r\n <li>Visita a la Montaña de 7 Colores</li>\r\n <li>01 Desayuno </li>\r\n <li>01 Almuerzo</li>\r\n <li>Ticket de Entrada</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>04:00 am - 4:30 am: Muy temprano los recogeremos temprano de su hotel de Cusco y partiremos con rumbo hacia el sendero de Cusipata tiene una duración aproximada de 3 horas al llegar tendremos tiempo suficiente para tomar nuestro desayuno y comenzaremos nuestro tour a la montaña de siete colores la duracion de la caminata será de 1 hora y 30 minutos aproximadamente (dependerá de la condicion física que tengan) en el trayecto vamos a tener vistas increíbles del lugar podremos observar alpacas, llamas y si tenemos suerte podremos ver chinchillas y vicuñas; muchas montañas rojas son también un punto culminante de esta parte del tour a la montaña Vinicunca en Cusco. </p>\r\n\r\n<p>Al llegar a la Montaña de 7 colores quedarán maravillados de su belleza y valdrá el esfuerzo de todo el trayecto, tendráb tiempo para explorar la zona impacto de su belleza, tendrá tiempo para explorar la zona, dispondran de tiempo suficiente para tomar fotografías y sumergirse en el medio ambiente.</p>\r\n\r\n<p>Iniciaremos nuestro descenso para almorzar y retornar a la ciudad del Cusco.</p>\r\n\r\n<p>18:00 pm: Llegada a la ciudad de Cusco. (Desembarque lugar céntrico)</p>\r\n\r\n<p><strong>TIEMPO DE CAMINATA:</strong> 3 horas aproximadamente (Ida y vuelta)</p>\r\n\r\n<p><strong>GRADO DE DIFICULTAD:</strong> Intermedio</p>\r\n', '<p>-Llevar ropa ligera y abrigadora, calzado cómodo y/o para caminatas, impermeable y ponchos (en caso de lluvias), gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación)</p>\r\n\r\n<p>- Niños desde los 5 años pagan el paquete completo.</p>\r\n\r\n<p><strong>**NOTA: No recomendable para niños y adultos mayores**</strong></p>\r\n', 1, '120.00', '140.00', 2, 1, '080000', '080100', '080101', '2020-02-13 15:22:28'),
(18, 'Tour Machu Picchu Tren Turista', '', 'TOURS', '<p>Visita una de las maravillas del mundo \"La Ciudadela de Machu Picchu\" sin duda un tour imperdible si visitas Cusco, quedarás asombrado por sus magnificas estructuras. ¡infaltable! </p>\r\n', '', '<p><strong>SALIDA:</strong> 3:30 AM - 4:00 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 20:00 PM - 20:30 PM (Aprox.) a la ciudad de Cusco</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<p>- Recojo de su hotel (Solo aplica a hoteles cerca a la plaza de Armas)</p>\r\n\r\n<p>- Traslados in/out a la Estación de Tren</p>\r\n\r\n<p>- Guiado en el Santuario Historico de Machu Picchu</p>\r\n\r\n<p>- Tren Turista o expedition  (ida y vuelta)</p>\r\n\r\n<p>- Entrada para la Ciudadela de Machu Picchu</p>\r\n\r\n<p>- Bus de Aguas Calientes a la ciudadela de Machu Picchu (subida y bajada)</p>\r\n\r\n<p><strong>NO INCLUYE: </strong></p>\r\n\r\n<p>- Alimentación.</p>\r\n\r\n<p><strong>**Nota: La salida y el retorno dependerá del horario de la compra del tren (Previa coordinación)**</strong></p>\r\n', '<p>- Llevar ropa ligera y abrigadora, calzado cómodo y/o para caminatas, impermeable o ponchos (en caso de lluvia) gorro para el sol, bloqueador solar, lentes de sol, snacks, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños de 3 y 4 años exonerados de pago (No tienen derecho a tomar asiento en el bus y traslados adicionales) con excepción del pago del Tren turista ó expedition que es obligatorio.</p>\r\n\r\n<p>- Niños desde los 5 años pagan el paquete completo. </p>\r\n', 1, '850.00', '990.00', 2, 1, '080000', '080100', '080101', '2020-02-13 16:03:07'),
(19, 'Tour Laguna Humantay', '', 'TOURS', '<p>En este tour visitaremos la Laguna Humantay actualmente se está haciendo mucho más conocido y la gente se va fascinada luego de haberlo visitado ¿Y tú que esperás? quedarás maravillado por su hermoso paisaje.</p>\r\n', '', '<p><strong>SALIDA:</strong> 4:00 AM - 4:30AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 18:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo en su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio Compartido)</li>\r\n <li>Guiado en Español y/o inglés</li>\r\n <li>Visita a la Laguna Humantay</li>\r\n <li>01 Desayuno</li>\r\n <li>01 Almuerzo</li>\r\n <li>Ticket de Entrada</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>4:00 am - 4:30 a.m.: Primero pasaremos a recogerlo a su hotel en Cusco.</p>\r\n\r\n<p>Nos dirigiremos al noreste de la ciudad del Cusco, pasaremos por diferentes poblaciones y caseríos hasta el poblado de Limatambo, a partir de este punto ascenderemos hacia el pueblo de Mollepata. Lugar donde tendrá tiempo para tomar un desayuno, luego continuaremos nuestro viaje hasta Soraypampa.<br>\r\n<br>\r\nAl llegar a Soraypampa, comenzaremos nuestra caminata rumbo a la Laguna Humantay que tiene una duracion de 1 hora y 30 minutos aproxidamente (dependerá de la condicion física que tengan) al llegar a la Laguna Humantay podremos apreciar el hermoso paisaje y la vista imponente de los nevados Humantay y Salkantay, después de un breve descanso y de tomarnos las fotos retornaremos por la misma ruta hasta Soraypampa, tomaremos nuestra movilidad y regresaremos a Mollepata, en este lugar disfrutaremos de un delicioso almuerzo.</p>\r\n\r\n<p>18:00 pm: Llegaremos a la ciudad de Cusco (Desembarque lugar centrico)</p>\r\n\r\n<p><strong>TIEMPO DE CAMINATA:</strong> 3 Horas aproximadamente (Ida y vuelta)</p>\r\n\r\n<p><strong>GRADO DE DIFICULTAD:</strong> Intermedio</p>\r\n', '<p>-Llevar ropa ligera y abrigadora, calzado cómodo y/o para caminatas, impermeables o ponchos (en caso que llueva), gorro para el sol, bloqueador solar, snacks, pastilla para la altura, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación)</p>\r\n\r\n<p>- Niños desde los 5 años pagan el paquete completo.</p>\r\n\r\n<p><strong>**Nota: No recomendable para niños y adultos mayores**</strong></p>\r\n', 1, '130.00', '155.00', 2, 1, '080000', '080100', '080101', '2020-02-13 18:13:23'),
(20, 'Tour Circuito de Valle Sur', '', 'TOURS', '<p>En este tour podrás visitar lugares turísticos poco tradicionales en la ciudad de Cusco pero que igual te llaman mucho la atención, si tienes varios días de estadía te recomendamos este tour histórico.</p>\r\n', '', '<p><strong>SALIDA:</strong> 8:00 AM - 8:30AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 14:00 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<p>- Recojo en su hotel (Solo cerca de la ciudad)</p>\r\n\r\n<p>- Movilidad (Servicio Compartido)</p>\r\n\r\n<p>- Guiado en Español</p>\r\n\r\n<p>- Visita a Andahuaylillas + ingreso</p>\r\n\r\n<p>- Visita al Centro Arqueologico Pikillacta</p>\r\n\r\n<p>- Visita a Tipon \"Templo del Agua\"</p>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<p>- Tickets de ingreso para los sitios arqueológicos de Cusco y Valle Sagrado (Lo pueden adquirir cuando esten realizando su primera visita solo recuerden llevar efectivo) Si solo tomarán este tour solo necesitarían el Boleto Turístico Parcial: Nacionales S/. 40.00 Extranjeros S/. 70.00 que solo te dura 1 día, o bien recomendamos comprar el Boleto Turistico General: Nacionales S/. 70.00 Extranjeros S/. 130.00 tiene 10 días de duración.</p>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>08:00 a.m - 08:30 am: Te recogeremos de tu hotel.</p>\r\n\r\n<p>Partiremos hacia el Valle Sur de Cusco, en el trayecto, el primer atractivo turístico que visitaremos durante nuestro recorrido será el templo al agua de Tipón, en este lugar observaremos los impresionantes canales, las magníficas fuentes de agua y un complejo sistema de andenes.</p>\r\n\r\n<p>Luego, continuaremos hacia la antigua ciudad de los Waris de Pikillacta donde apreciaremos el gran centro urbano pre-inca y las impresionantes vistas del humedal de Huacarpay – Lucre.</p>\r\n\r\n<p>Finalmente, recorreremos un corto hasta el distrito de Andahuaylillas donde visitaremos la Iglesia San Pedro Apóstol de Andahuaylillas, que en su interior resguarda las mejores muestras del arte religioso de la colonia.</p>\r\n\r\n<p>14:00 pm: Retorno a la ciudad de Cusco. (Desembarque lugar centrico)</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, impermeable o poncho (En caso de lluvias), calzado cómodo y/o para caminatas, gorro para el sol, bloqueador solar, lentes de sol, agua, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho al asiento en los tours y alimentación)</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '75.00', '90.00', 1, 1, '080000', '080100', '080101', '2020-02-14 16:18:29'),
(21, 'Tour Catarata de Ahuashiyacu', '', 'TOURS', '<p>En está excursión visitaremos una catarata muy conocida de Tarapoto, se encuentra cerca a la ciudad si llegas a Tarapoto este tour es infaltable.</p>\r\n', '', '<p><strong>SALIDA: </strong>10:00 AM – 10:30 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 13:00 PM - 13:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido)</li>\r\n <li>Guiado en español</li>\r\n <li>Ingreso a las catarata</li>\r\n <li>Visita el mirador</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>10:00 am - 10:30 am:</strong> Recojo y partida desde su hotel.</p>\r\n\r\n<p>Visita Mirador natural de cataratas y cordillera Escalera.</p>\r\n\r\n<p><strong>11:00 am.</strong> Inicio de la caminata rumbo a la catarata</p>\r\n\r\n<p> Llegada a la catarata de Ahuashiyacu y baño refrescante.</p>\r\n\r\n<p><strong>12:50 pm - 13:30 pm:</strong> Llegada a la ciudad de Tarapoto.</p>\r\n', '<p>- Llevar ropa ligera (Ropa de baño, shorts o bermudas, sandalias o zapatos de agua), zapatillas, toallas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen a tomar asiento en los tours ni a la alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '35.00', '40.00', 1, 1, '220000', '220900', '220901', '2020-02-15 14:52:38'),
(22, 'Tour Full Day Valle del Colca ', '', 'TOURS', '<p>En este tour podrás disfrutar un día completo en el valle del Colca, te quedarás maravillado de tan hermosos paisajes que podras apreciar y tambien podrás disfrutar de un delicioso almuerzo buffet tipico. ¡Animate a separarlo! incluye todo.</p>\r\n', '', '<p><strong>SALIDA:</strong> 2:30 AM - 3:00 AM </p>\r\n\r\n<p><strong>RETORNO:</strong> 17:30 PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo en su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Guiado en español.</li>\r\n <li>01 desayuno.</li>\r\n <li>01 almuerzo buffet.</li>\r\n <li>Entrada para los baños termales.</li>\r\n <li>Botiquin de seguridad.</li>\r\n <li>Asistencia permanente.</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>BTC Entrada al Colca: Nacionales S/. 20.00,  Sudamericanos: S/. 40.00 y Otras nacionalidades: S/. 70.00</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>2:45am a 3:30am </strong>Los recogemos de los hoteles, en caso estén dentro del centro de la ciudad y en otros casos cuando estén un poco alejado se cita a los pasajeros a la plaza principal de armas a las<strong> 2:40 am. </strong></p>\r\n\r\n<p>Primero nos dirigimos al Valle del Colca luego haremos una parada para tomar desayuno, posteriormente nos iremos hacia el mirador de la Cruz del Cóndor, donde podremos observar el vuelo del cóndor y también la profundidad del cañón.</p>\r\n\r\n<p>En el trayecto haremos breves paradas en el mirador de Wayrapunko y el mirador de Antahuillque, después podremos disfrutar de los baños termales de Chacapi en Yanque por 1 hora, luego nos dirigiremos a Chivay donde podremos disfrutar de un rico almuerzo buffet de variedad de comida típica.</p>\r\n\r\n<p>Luego de un tiempo enrumbamos de retorno a la ciudad de Arequipa haciendo paradas en el mirador de Patapampa y en la Reserva de Salinas, por último en Patahuasi.</p>\r\n\r\n<p><strong>17:30pm</strong> Finalmente, ya directo a la ciudad, desembarcamos cerca a la Plaza de Armas finalizando nuestra actividad.</p>\r\n', '<p>- Llevar ropa cómoda y abrigadora, zapatillas adecuadas para caminata, impermeable o poncho (en caso de lluvias), bloqueador, lentes de sol, gorro, ropa de baño (para ingresar a los baños termales), cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '140.00', '160.00', 2, 1, '040000', '040100', '040101', '2020-02-18 12:11:23'),
(23, 'Tour Campiña en Mirabus Turistico', '', 'TOURS', '<p>En esta excursión podrás conocer más de la ciudad de Arequipa y sus alrededores, pasa un momento agradable y disfruta de una linda vista por el bus panorámico.</p>\r\n', '', '<p><strong>SALIDA:</strong> 9:30 AM (1er Turno) / 14:15 PM (2do Turno)</p>\r\n\r\n<p><strong>RETORNO:</strong> 13:00 PM (1er Turno) Aprox. /  18:00 PM (2do Turno) Aprox. </p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Recojo de plaza de armas y/o hoteles muy cercanos a la ciudad.</li>\r\n <li>Transporte mirabus turístico (Servicio compartido).</li>\r\n <li>Guiado en español y/o inglés.</li>\r\n <li>Botiquin de seguridad</li>\r\n <li>Ticket de ingreso al mirador de Carmen Alto</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Opcional: Entrada de la mansión del Fundador S/.12.00 y Entrada al molino de Sabandia S/. 10.00</li>\r\n</ul>\r\n\r\n<p><strong>RESUMEN:</strong></p>\r\n\r\n<p>Para este tour realizaremos un recorrido en bus panorámico cuyas visitas serán:<br>\r\n- Plaza de Armas.<br>\r\n- Mirador de Carmen alto.<br>\r\n- Plaza y Mirador de Carmen Alto.<br>\r\n- Yanahuara Iglesia Mirador y Plaza<br>\r\n- Outlet Incalpaca y zoológico,<br>\r\n- Distrito de Sachaca,<br>\r\n- Balneario de tingo,<br>\r\n- vía paisajista,<br>\r\n- Mansión del Fundador *Opcional*<br>\r\n- Molino de piedra en Sabandia *Opcional*<br>\r\n- Andenería de Paucarpata.</p>\r\n\r\n<p>Durante este viaje podrá apreciar el esplendor paisajístico que posee Arequipa. Haciendo breves paradas en 5 puntos principales donde podrán caminar por los alrededores.</p>\r\n', '<p>- Llevar ropa cómoda y abrigadora, bloqueador, lentes de sol, gorro, impermeables (En caso de lluvia), cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '55.00', '65.00', 1, 1, '040000', '040100', '040101', '2020-02-18 13:22:01'),
(24, 'Tour la Ruta del Sillar', '', 'TOURS', '<p>En este tour te quedarás maravillado por los tallados que hacen los pobladores a base de sillar y tambien encontraremos petroglifos de Sillar que hasta ahora se desconocen su origen, podrás sacar estupendas fotografias.</p>\r\n', '', '<p><strong>SALIDA:</strong> 8:00AM (1er Turno) / 14:00PM (2do Turno)</p>\r\n\r\n<p><strong>RETORNO:</strong> 12:30PM  (1er Turno) Aprox. / 18:30PM (2do Turno) Aprox.</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo en su hotel (Solo cerca de la ciudad)</li>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Guiado profesional en cada servicio.</li>\r\n <li>Ticket de ingreso.</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>8:00am ó 14:00pm </strong>El tour inicia con el recojo de los pasajeros de su respectivo hotel o en todo caso en la plaza principal será el punto de inicio, y empezaremos el trayecto luego haremos una parada en el camino a un mirador natural donde podremos apreciar los volcanes y el resto de la ciudad, luego llegaremos a las canteras de añashuayco.<br>\r\nPrimero los canteros explicaran el proceso de tallado del sillar, su composición e historia como es que usan esta piedra desde la antigüedad ya que forma parte de todo el complejo arquitectónico del centro de la ciudad y podrán apreciar tallados y podrán tomarse divertidas fotos para su recuerdo.<br>\r\n<br>\r\nDespués de ello volvemos a subir al transporte para dirigirnos al último punto, haremos una caminata de 20min aprox. hacia Culebrillas.<br>\r\nLuego haremos una caminata hacia culebrillas, un pequeño cañón formado de sillar por el paso del tiempo, donde podrán ver tallados en esta piedra sillar, estos petroglifos aún se desconocen su origen o causa, durante el recorrido pueden tomarse varias fotos y tener el tiempo suficiente para disfrutar este paisaje.</p>\r\n\r\n<p><strong>12:30pm ó 18:30pm</strong> Luego saldremos por el mismo camino y retornaremos al centro de la ciudad de Arequipa.</p>\r\n', '<p>- Llevar ropa cómoda y abrigadora, zapatillas adecuadas para caminata, impermeable o poncho (en caso de lluvias), bloqueador, lentes de sol, gorro, repelente, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '55.00', '65.00', 1, 1, '040000', '040100', '040101', '2020-02-18 16:18:56');
INSERT INTO `bd_tours` (`id`, `nombre`, `nombre_posic`, `tipo_evento`, `descripcion`, `descripcion_posic`, `detalle`, `recomendacion`, `moneda`, `precio_minimo`, `precio_maximo`, `duracion`, `status`, `id_departamento`, `id_provincia`, `id_distrito`, `fecha_registro`) VALUES
(25, 'Tour a la Catarata de Pillones', '', 'TOURS', '<p>Si la caminata es lo tuyo pues esta es una buena opción para ti, aventurate para llegar a la hermosa catarata de Pillones. ¡Animense aventureros!</p>\r\n', '', '<p><strong>SALIDA:</strong> 6:00 AM - 6:30 AM</p>\r\n\r\n<p><strong>RETORNO </strong>17:00PM (Aprox.)</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo del hotel cerca al centro de la ciudad.</li>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de ingreso</li>\r\n <li>Guia profesional</li>\r\n <li>Botiquin de seguridad</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Alimentación</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p><strong>6:00am a 06:30 am</strong> Recojo de sus hotel en la ciudad de Arequipa y los trasladaremos hacia la catarata de Pillones, en aproximadamente 02 horas, pero antes al llegar a Patahuasi, podrán comprar algo para desayunar, algún mate no tan pesado. Luego llegaremos al punto de inicio de la caminata, un descenso algo complicado. Alistaremos ropa abrigadora ya que por la altura (4 mil metros sobre el nivel del mar) hace bastante frío.</p>\r\n\r\n<p>Iniciaremos una caminata de 30 minutos algo dificultosa, para llegar a la catarata de Pillones, tendremos que bajar por una pendiente de rocas con mucho cuidado, y un recorrido por el costado de un río al llegar a la catarata de Pillones podremos tomarnos todas las fotografías que se nos imaginen, estaremos un promedio de 45 minutos en el lugar.</p>\r\n\r\n<p> De retorno en el Carro, iniciaremos el recorrido para llegar al Bosque de piedras de Imata de 30 minutos aprox. al llegar se podran tomar fotografías que su imaginación les permita.</p>\r\n\r\n<p><strong>14:00pm </strong>Tendrán tiempo para el almuerzo en el poblado de Imata antes de retornar a Arequipa.<br>\r\n<strong>17:00pm</strong> Llegada al Centro de Arequipa.</p>\r\n', '<p>- Llevar ropa cómoda y abrigadora, zapatillas adecuadas para caminata, impermeables (en caso de lluvia), bloqueador, lentes de sol, gorro o sombrero, algun medicamento para la altura, algunos snacks, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>**Nota: No recomendable para niños y adultos mayores**</strong></p>\r\n', 1, '110.00', '120.00', 2, 1, '040000', '040100', '040101', '2020-02-18 16:42:17'),
(26, 'Tour Aventura en Huacachina', '', 'TOURS', '<p>Si quieres pasar un momento de diversión y del full adrenalina está es una buena opción, disfruta de un paseo en sandbuggies con una hermosa vista de la laguna de Huacachina.</p>\r\n', '', '<p><strong>SALIDAS:</strong>  11:00 AM (1er Turno) / 16:00 PM (2do Turno) / 17:00 PM (3er Turno)</p>\r\n\r\n<p><strong>DURACIÓN:</strong> 1 Hora Aprox.</p>\r\n\r\n<p><strong>PUNTO DE RECOJO:</strong> Plaza de armas de Ica</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Movilidad compartida</li>\r\n <li>Visitaremos el desierto de Ica</li>\r\n <li>Paseo en los sandBuggies en el desierto</li>\r\n <li>Paseo en las tablas deslizadores en las dunas</li>\r\n <li>Ticket de ingreso a las dunas</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Alimentación</li>\r\n</ul>\r\n', '<p>- Llevar ropa cómoda y fresca, bloqueador, lentes de sol, gorro o sombrero, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 2 años no pagan (no tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 3 años pagan la tarifa normal.</p>\r\n', 1, '75.00', '85.00', 1, 1, '110000', '110100', '110101', '2020-02-19 10:52:02'),
(27, 'Tour Islas Ballestas y Reserva Nacional de Paracas', '', 'TOURS', '<p>En está excursión tendrán un paseo en el mar y podrán observar el habitat de los lobos marinos, también pasearemos por las playas que hay dentro de la Reserva Nacional de Paracas. Animate para tener un día relajado.</p>\r\n', '', '<p><strong>SALIDA:</strong>  6:30AM </p>\r\n\r\n<p><strong>DURACIÓN:</strong> 8 horas Aprox.</p>\r\n\r\n<p><strong>PUNTO DE RECOJO:</strong> Plaza de armas de Ica</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad compartida.</li>\r\n <li>Visita al Candelabro.</li>\r\n <li>Visita a las formaciones rocosas en la Reserva de Paracas</li>\r\n <li>Visita al perfil de Cristo</li>\r\n <li>Visita al arco de los deseos</li>\r\n <li>Visita a la maternidad de lobos.</li>\r\n <li>Visita a las aves guaneras.</li>\r\n <li>Visita la sala de interpretación de Paracas.</li>\r\n <li>Visita al itsmo (Mirador natural de la península de Paracas)</li>\r\n <li>Visita a la playa Roja</li>\r\n <li>Visita a la playa Lagunilla (Tiempo determinado de 1 hora para que tomen sus alimentos)</li>\r\n <li>Paseo en los deslizadores</li>\r\n <li>Implemento de Seguridad (Chaleco salvavidas)</li>\r\n <li>Ticket de ingreso</li>\r\n <li>Guiado</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Alimentación.</li>\r\n</ul>\r\n', '<p>- Llevar ropa cómoda y fresca, bloqueador, lentes de sol, gorro o sombrero, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 2 años no pagan (no tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 3 años pagan la tarifa normal.</p>\r\n', 1, '130.00', '140.00', 2, 1, '110000', '110100', '110101', '2020-02-19 11:08:58'),
(28, 'Tour Nazca Terrestre', '', 'TOURS', '<p>En este tour podremos visitar los principales lugares turísticos de Nazca, y lograremos observar por un mirador algunas famosas Lineas de Nazca.</p>\r\n', '', '<p><strong>SALIDA:</strong>  7:00AM</p>\r\n\r\n<p><strong>DURACIÓN</strong><strong>:</strong> 8 horas Aprox.</p>\r\n\r\n<p><strong>PUNTO DE RECOJO:</strong> Plaza de Armas de Ica</p>\r\n\r\n<p><strong>INCLUYE: </strong></p>\r\n\r\n<ul>\r\n <li>Movilidad compartida</li>\r\n <li>Guiado</li>\r\n <li>Ticket de ingreso</li>\r\n <li>Visita al museo Maria Reiche</li>\r\n <li>Visita al mirador metálico de dos figuras (Manos y huarango)</li>\r\n <li>Visita a los paredones</li>\r\n <li>Visita a los acueductos</li>\r\n <li>Visita a un taller de cerámica</li>\r\n <li>Visita a un taller de proceso del oro</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:  </strong></p>\r\n\r\n<ul>\r\n <li>Alimentación</li>\r\n</ul>\r\n', '<p>- Llevar ropa cómoda y fresca, bloqueador, lentes de sol, gorro o sombrero, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 2 años no pagan (no tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 3 años pagan la tarifa normal.</p>\r\n', 1, '210.00', '220.00', 2, 1, '110000', '110100', '110101', '2020-02-19 11:43:45'),
(29, 'Tour Reserva de Salinas y Aguada Blanca', '', 'TOURS', '<p>En esta excursion podrás disfrutar de hermosas vistas que dejarán maravillado de Arequipa y observaremos una gran variedad de vida animal, estando en la reserva visitaremos un Salar donde podrás tomarte magnificas fotos ¡Animate a separarlo!</p>\r\n', '', '<p><strong>SALIDA:</strong> 6:15 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 13:30 PM ó 16:30 PM </p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Recojo de plaza de Armas y/o hoteles muy cercanos a la ciudad.</li>\r\n <li>Transporte turístico (Servicio compartido).</li>\r\n <li>Guía profesional</li>\r\n <li>Botiquín de seguridad</li>\r\n <li>Asistencia permanente</li>\r\n</ul>\r\n\r\n<p><strong>NO INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Alimentación y gastos extras personales.</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>6:00 am a 6:30 am Recojo de los hoteles más céntricos de Arequipa luego comenzaremos a viajar al lago salado de Salinas y Aguada Blanca durante aproximadamente 3 horas.</p>\r\n\r\n<p>7:30 am Hacemos una breve parada en el pueblo de Chiguata para comprar algo ligero de comer o algo para llevar como botella de agua y galletas. Luego de ello continuamos hacia nuestro destino, pasaremos por el volcán Misti y el bosque Qeñuales, todo el camino ofrece una vista espectacular del panorama andino, lo que hace que este viaje sea muy interesante.</p>\r\n\r\n<p>10:30 a.m. estaremos llegando al lago de sal Salinas, ubicado en la Reserva Nacional de Aguada Blanca y Salinas, este lago se encuentra a medio camino entre el volcán Misti, el volcán Ubinas y el nevado de Picchu Picchu. Al realizar una caminata alrededor de este lago, podremos apreciar variedad de vida animal, especialmente aves andinas (flamencos rosados) y migratorias (patos, cóndores, águilas, flamencos, colibríes, etc.) el viaje incluye una agradable caminata de un lado a otro de la laguna para obtener imágenes increíbles y, por suerte, disfrutará de cómo la gente local recolecta la sal conocida como borato.</p>\r\n\r\n<p>**Opcionalmente a decisión del cliente, se puede visitar un poco más hacia adentro de nuestro recorrido la zona del mini volcán de Lojen y los baños termales, con esta excursión el tiempo de visita es más prolongado, por ende, tienen un tiempo para almorzar y el retorno es a las 4:30 pm**</p>\r\n\r\n<p>En caso de solo visitar la laguna de Salinas y el Salar, las partes más importantes, el retorno es a la 1:30 pm.</p>\r\n', '<p>- &lt;!-- x-tinymce/html --&gt;Llevar ropa de abrigo de precaución (por dentro ropa ligera y/o deportiva), impermeables (en caso de lluvia) zapatillas para caminatas, bloqueador solar, repelente, medicamento para la altura, botella de agua, snack, lentes de sol, etc.</p>\r\n\r\n<p><strong>**Nota: Mejor temporada para realizar visitas es de abril a diciembre, cuando la posibilidad de lluvia disminuye**</strong></p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 4 años exonerados de pago (No tienen derecho a tomar asiento en los tours ni alimentación).</p>\r\n\r\n<p>- Niños a partir de 5 años pagan la tarifa normal.</p>\r\n', 1, '150.00', '160.00', 2, 1, '040000', '040100', '040101', '2020-02-25 18:52:15'),
(32, 'City Tour Historico', '', 'TOURS', '<p>En está excursión visitaremos los principales atractivos alrededor de la ciudad de Huamanga como museo, monasterio, taller artesanal y podremos apreciar una hermosa vista de toda la ciudad.</p>\r\n', '', '<p><strong>SALIDA:</strong> 15:20 PM</p>\r\n\r\n<p><strong>RETORNO: </strong>19:00 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de entrada</li>\r\n <li>Guia profesional</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>15:20 pm: Punto de encuentro en la Plaza de Armas Ayacucho</p>\r\n\r\n<p>El tour comprende de la visita del 01 Museo (Hipólito Unanue, El museo la memoria ó Juaquin Lopez Antay), Monasterio de Santa Teresa de las Carmelitas Descalzas, taller Artesanal Barrio de Santa Ana, Mirador de Cerro Acuchimay para ver una vista panorámica de la ciudad, la Catedral y algunas casonas coloniales; Castilla y Zamora, Boza y Solís, Velarde Álvarez.</p>\r\n\r\n<p>19:00 pm: Retorno a la ciudad.</p>\r\n', '<p>- Llevar ropa ligera y casacas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n', 1, '50.00', '60.00', 1, 1, '050000', '050100', '050101', '2020-02-28 18:34:42'),
(33, 'Tour Ruta de la Independencia y Wari', '', 'TOURS', '<p>En este tour visitaremos el Santuario histórico donde se llevo a cabo la batalla de Ayacucho por la Independencia del Perú y tambien visitatemos Wari un sitio arqueológico más conocido en Ayacucho.</p>\r\n', '', '<p><strong>SALIDA:</strong> 09:20 PM</p>\r\n\r\n<p><strong>RETORNO: </strong>14:30 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de entrada</li>\r\n <li>Guia profesional</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>9:20 am: Concentración Plaza de Armas Ayacucho.</p>\r\n\r\n<p>9:30 am: Rumbo al Complejo Arqueológico de Wari, Capital del Primer Imperio Andino, donde se ingresa al Museo de Sitio, el Templo Mayor, Barrio o sectores de la cultura. Luego Visitaremos los talleres artesanales de Cerámica, Museo de Sitio, la casa de la Capitulación en el pueblo de Quinua, que se caracteriza por ser un pueblo Pintoresco y netamente Alfarero a un kilómetro del pueblo se encuentra, El Santuario Histórico de la Pampa de Ayacucho, donde se llevó a cabo la Batalla de Ayacucho por la independencia del Perú y de América.</p>\r\n\r\n<p>2:30 pm Retorno a la ciudad.</p>\r\n', '<p>- Llevar ropa ligera y casacas, zapatillas para caminatas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n', 1, '60.00', '70.00', 1, 1, '050000', '050100', '050101', '2020-03-02 17:28:26'),
(34, 'Tour Aguas Turquesas Millpu', '', 'TOURS', '<p>En este tour quedarás maravillado por la hermosa vista del lugar visitaremos Millpu son posas naturales que fueron formadas por la naturaleza sus aguas turquezas son impresionantes. </p>\r\n', '', '<p><strong>SALIDA:</strong> 07:50 AM</p>\r\n\r\n<p><strong>RETORNO: </strong>19:30 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de entrada</li>\r\n <li>Almuerzo Campestre</li>\r\n <li>Guia local para las Aguas Turquesas de Millpu.</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>07:50 am: Punto de encuentro en la Plaza de Armas Ayacucho</p>\r\n\r\n<p>08:00 am: Partida de Huamanga hacia las piscinas naturales de Millpu, recientemente descubierta desde entonces lo llamamos “La Joya Oculta de Ayacucho” ó “Aguas Turquesas”, son posas naturales en forma de cascada que mágicamente fueron formadas por la naturaleza a lo largo del cañón, en el recorrido podrán apreciar las piscigranjas y tomarse fotos en las orillas de las pozas turquesas. Luego caminaremos por 30 minutos hasta llegar a las cascadas de Millpu y el ojo donde nace todo este capricho de la naturaleza.</p>\r\n\r\n<p>15:00 pm: Almuerzo al aire libre (Trucha frita con papas, mote, ensalada).</p>\r\n\r\n<p>16:30 pm: Retorno a Ayacucho.</p>\r\n\r\n<p>19:30pm Llegamos a la ciudad de Huamanga.</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, zapatillas para caminatas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n\r\n<p>-Te recomendamos visitarlas entre MAYO a DICIEMBRE.</p>\r\n\r\n<p>- **Bajamos hasta cierta distancia de las pozas, no ingresamos al agua porque está prohibido bajo una ordenanza**</p>\r\n', 1, '125.00', '135.00', 2, 1, '050000', '050100', '050101', '2020-03-02 17:56:55'),
(35, 'Tour Vilcashuaman', '', 'TOURS', '<p>Si tienes mucha curiosidad por la historia incaica esta es buena opción para ti, en está excursión visitaremos restos Arqueológicos de la cultura Inca como: Torreón del Inca, Portada del Sol, Baños del Inca, Acllayhuasi, Templo del Sol y la Luna, entre otros.</p>\r\n', '', '<p><strong>SALIDA:</strong> 07:50 PM</p>\r\n\r\n<p><strong>RETORNO: </strong>19:00 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de entrada</li>\r\n <li>Guia profesional</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>07:50 am: Punto de encuentro en la Plaza de Armas Ayacucho.</p>\r\n\r\n<p>08:00 am: Visitaremos las plantas nativas más admiradas conocidos como las Puyas de Raimondi (titankas); posterior estamos llegando al complejo arqueológico de Pumaccocha<br>\r\ndonde se observa La laguna de mismo nombre y los restos Arqueológicos de la Cultura Inca (Torreón del Inca, Portada del Sol, Baños del Inca, Acllayhuasi, Intihuatana; así llegando al imponente Ciudad Inca Arqueológica de Vilcashuamán (el Templo de Sol y la Luna, la Plaza Pachacutec, y Pirámide Inca más conocido como el Ushno un lugar Ceremonial del inca y la colla.</p>\r\n\r\n<p>16:00 pm: Retorno a la ciudad de Ayacucho.</p>\r\n\r\n<p>19:00 pm: Fin del recorrido.</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, zapartillas para caminata, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n', 1, '95.00', '105.00', 2, 1, '050000', '050100', '050101', '2020-03-02 18:36:12'),
(36, 'TOUR PIKAMACHAY HUANTA', 'aaaa', 'TOURS', '<p>Si te interesa la vida de nuestros antepasados está excursión es la correcta visitaremos la cueva Pikimachay donde se dice que evidencia una antigua presencia humana del periódo lítico ¿muy interesante cierto? Animate a separar este tour.</p>\r\n', '<p>test</p>\r\n', '<p><strong>SALIDA:</strong> 09:20 AM</p>\r\n\r\n<p><strong>RETORNO: </strong>17:00 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>Ticket de entrada</li>\r\n <li>Guia oficial de turismo.</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO: </strong></p>\r\n\r\n<p>9:20 am Concentración Plaza de Armas Ayacucho.</p>\r\n\r\n<p>9:30 am Rumbo a la provincia de Huanta, caminata de 30 minutos aproximadamente hacia la cueva de Pikimachay (15.000 a.c), Puente Colonial de Ayahuarcuna una explicación de la historia del puente, el mirador natural de verde cruz, la ciudad de Huanta conocido como “La Bella Esmeralda de los Andes”, Visitaremos a la Plaza Mayor, la iglesia matriz de Huanta. Obispo de Piedra, Los centros de Apícolas para degustar la Miel y sus variedades, además Algarrobina y tragos típicos a base de frutas netas de la región, licor de coca, licor lúcuma con leche, limón con leche, licor de tuna y muchos más.</p>\r\n\r\n<p>17:00 pm Culmina el tour.</p>\r\n', '<p>- Llevar ropa ligera y abrigadora, zapatillas para caminatas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n\r\n<p><strong>**Nota: Mínimo 2 personas para tomar el tour**</strong></p>\r\n', 1, '75.00', '85.00', 2, 0, '050000', '050100', '050101', '2020-03-06 13:13:57'),
(37, 'Tour Ruta de Cataratas de Cangallo', '', 'TOURS', '<p>Si quieres hacer trekking y disfrutar de la naturaleza este tour es una buena opción, visitaremos varias cataratas que se encuentran en ruta de la ciudad de Cangallo.</p>\r\n', '', '<p><strong>SALIDA:</strong> 07:50 AM</p>\r\n\r\n<p><strong>RETORNO:</strong> 20:00 PM (Aprox.)</p>\r\n\r\n<p><strong>PUNTO DE ENCUENTRO:</strong> Plaza de Armas Ayacucho</p>\r\n\r\n<p><strong>INCLUYE:</strong></p>\r\n\r\n<ul>\r\n <li>Movilidad (Servicio compartido).</li>\r\n <li>\r\n <p>Entrada para la Piscina de Huahuapuquio.</p>\r\n </li>\r\n <li>Guia profesional</li>\r\n</ul>\r\n\r\n<p><strong>ITINERARIO:</strong></p>\r\n\r\n<p>07:50 am. Concentración Plaza de Armas Ayacucho.</p>\r\n\r\n<p>08:00 am Partida al Sur de Ayacucho, visitaremos la primera catarata de Pumapaqcha, realizaremos un trekking de 40 minutos entre ida y vuelta. Casi llegando a Pacupata nos estacionamos para realizar el segundo trekking hacia las Cataratas de Batan y Qorimaqma por un tiempo de 1:30 horas aproximadamente. Para luego encontrarnos con la movilidad que vendrá hasta donde llegaremos al otro lado de la carretera. Finalmente llegaremos a la Piscina gasificada de Huahuapuquio, podremos refrescarnos de tanta caminata. Lugar ideal para tomar los almuerzos. Luego de tomar los alimentos retomamos el viaje para llegar al último destino, la Histórica Ciudad de Cangallo.</p>\r\n\r\n<p>17:30 pm Retorno a Huamanga.</p>\r\n\r\n<p>20:00 pm Culmina el tour.</p>\r\n', '<p>- Llevar ropa ligera y casacas, repelente, bloqueador, lentes de sol, cámara fotográfica y/o filmadora.</p>\r\n\r\n<p><strong>RESTRICCIONES:</strong></p>\r\n\r\n<p>- Niños hasta los 5 años exonerados de pago (No tienen derecho a tomar asiento en los tours).</p>\r\n\r\n<p>- Niños a partir de 6 años pagan la tarifa normal.</p>\r\n\r\n<p><strong>IMPORTANTE: </strong></p>\r\n\r\n<p>- Precio no aplica para feriados largos (semana santa, fiestas patrias, etc.)</p>\r\n', 1, '100.00', '110.00', 2, 0, '050000', '050100', '050101', '2020-03-06 13:29:16'),
(38, 'aaaaaa', 'aaaa', 'TOURS', '<p>aaaaaaaaaaaaaa</p>\r\n', '<p>aaaaaaaaaaaaaaaaaa</p>\r\n', '<p>aaaaaaaaaaaaa</p>\r\n', '<p>aaaaaaaaaaaa</p>\r\n', 2, '11.00', '12.00', 2, 1, '010000', '010100', '010113', '2020-07-02 17:46:26'),
(39, 'Test Prueba', 'Test Prueba CEO', 'TOURS', '<p>ronny enfoca muchas cosas en la vida</p>\r\n', '<p>se enfoca test preuba</p>\r\n', '<p>aaaaaaaaaaaaaaaaaa</p>\r\n', '<p>sssssssssssssssssssss</p>\r\n', 1, '120.00', '130.00', 2, 1, '150000', '150500', '150505', '2020-07-07 23:59:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tours_imagenes`
--

CREATE TABLE `bd_tours_imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `nombre_extension` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `alt_seo` text COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL,
  `id_tours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tours_imagenes`
--

INSERT INTO `bd_tours_imagenes` (`id`, `nombre`, `nombre_extension`, `alt_seo`, `status`, `fecha_registro`, `id_tours`) VALUES
(1, 'Tour-a-Lamas-nativo-9', 'Tour-a-Lamas-nativo-9.jpg', '', 0, '2020-02-10 18:48:25', 1),
(2, 'Tour-a-Lamas-nativo-2', 'Tour-a-Lamas-nativo-2.jpg', '', 0, '2020-02-10 18:48:25', 1),
(4, 'tours-laguna-azul-1', 'tours-laguna-azul-1.jpg', '', 1, '2020-02-10 19:05:03', 2),
(5, 'tour-alto-mayo-1', 'tour-alto-mayo-1.jpg', '', 1, '2020-02-10 19:10:03', 3),
(6, 'tour-catarata-carpishuyacu-1', 'tour-catarata-carpishuyacu-1.jpg', '', 1, '2020-02-12 12:04:01', 4),
(7, 'tours-cataratas-pucayaquillo-1', 'tours-cataratas-pucayaquillo-1.jpg', '', 1, '2020-02-12 12:14:55', 5),
(8, 'tarapoto-city-tours-2', 'tarapoto-city-tours-2.jpg', '', 0, '2020-02-12 12:21:49', 6),
(9, 'tours-rafting-canotaje-8', 'tours-rafting-canotaje-8.jpg', '', 1, '2020-02-12 12:30:59', 7),
(10, 'tours-fortaleza-kuelap-1', 'tours-fortaleza-kuelap-1.jpg', '', 1, '2020-02-13 12:08:27', 8),
(11, 'tours-fortaleza-kuelap-2', 'tours-fortaleza-kuelap-2.jpg', '', 1, '2020-02-13 12:08:27', 8),
(13, 'Chachapoyas-Cataratas-del-Gocta-Nani', 'Chachapoyas-Cataratas-del-Gocta-Nani.jpg', '', 1, '2020-02-13 12:11:50', 9),
(14, 'tours-karajia-cavernas-4', 'tours-karajia-cavernas-4.jpg', '', 0, '2020-02-13 12:19:24', 10),
(15, 'tours-revash-1', 'tours-revash-1.jpg', '', 1, '2020-02-13 12:40:51', 12),
(16, 'tours-revash-4', 'tours-revash-4.jpg', '', 0, '2020-02-13 12:40:51', 12),
(18, 'City-of-Cuzco2', 'City-of-Cuzco2.jpg', '', 0, '2020-02-13 13:05:04', 13),
(19, 'tour-maras-moray-salineras-5', 'tour-maras-moray-salineras-5.jpg', '', 1, '2020-02-13 13:17:42', 14),
(20, 'optimized_4097-1', 'optimized_4097-1.jpg', '', 1, '2020-02-13 14:55:53', 16),
(21, 'tous-montana-7colores-4', 'tous-montana-7colores-4.jpg', '', 1, '2020-02-13 15:22:28', 17),
(22, 'tours-machupichu-tren-1', 'tours-machupichu-tren-1.jpg', '', 1, '2020-02-13 16:03:07', 18),
(23, 'tour-circuito-valle-sur-1', 'tour-circuito-valle-sur-1.jpg', '', 1, '2020-02-14 16:18:29', 20),
(24, 'Tour-a-Lamas-nativo-1', 'Tour-a-Lamas-nativo-1.jpg', '', 1, '2020-02-17 11:28:31', 1),
(25, 'tours-laguna-azul-2', 'tours-laguna-azul-2.jpg', '', 0, '2020-02-17 11:50:12', 2),
(26, 'tours-cataratas-ahuashiyacu-1', 'tours-cataratas-ahuashiyacu-1.jpg', '', 1, '2020-02-17 12:21:37', 21),
(27, 'city-tours-huancas-1', 'city-tours-huancas-1.jpg', '', 1, '2020-02-17 14:26:47', 11),
(28, 'Tour-valle-colca-2', 'Tour-valle-colca-2.jpg', '', 1, '2020-02-18 12:11:23', 22),
(29, 'Tour-valle-colca-1', 'Tour-valle-colca-1.jpg', '', 1, '2020-02-18 12:11:23', 22),
(32, 'tarapoto-city-tour-1', 'tarapoto-city-tour-1.jpg', '', 1, '2020-02-18 13:44:48', 6),
(33, 'tarapoto-city-tours-3', 'tarapoto-city-tours-3.jpg', '', 0, '2020-02-18 13:56:31', 6),
(34, 'tarapoto-city-tours-4', 'tarapoto-city-tours-4.jpg', '', 0, '2020-02-18 14:04:44', 6),
(35, 'tarapoto-city-tours-5', 'tarapoto-city-tours-5.jpg', '', 0, '2020-02-18 14:20:38', 6),
(36, 'tarapoto-city-tours-6', 'tarapoto-city-tours-6.jpg', '', 1, '2020-02-18 14:21:43', 6),
(37, 'tours-valle-sagrado-conexion-1', 'tours-valle-sagrado-conexion-1.jpg', '', 1, '2020-02-18 14:35:30', 15),
(38, 'tours-valle-sagrado-conexion-5', 'tours-valle-sagrado-conexion-5.jpg', '', 0, '2020-02-18 14:37:51', 15),
(39, 'tours-valle-sagrado-conexion-2', 'tours-valle-sagrado-conexion-2.jpg', '', 1, '2020-02-18 14:38:02', 15),
(40, 'tours-valle-sagrado-conexion-3', 'tours-valle-sagrado-conexion-3.jpg', '', 0, '2020-02-18 14:38:13', 15),
(41, 'tours-valle-sagrado-conexion-4', 'tours-valle-sagrado-conexion-4.jpg', '', 0, '2020-02-18 14:38:25', 15),
(42, 'tours-valle-sagrado-conexion-6', 'tours-valle-sagrado-conexion-6.jpg', '', 1, '2020-02-18 14:39:54', 15),
(43, 'tours-revash-3', 'tours-revash-3.jpg', '', 1, '2020-02-18 15:30:36', 12),
(44, 'tours-revash-6', 'tours-revash-6.jpg', '', 0, '2020-02-18 15:30:46', 12),
(45, 'tours-revash-7', 'tours-revash-7.jpg', '', 0, '2020-02-18 15:34:08', 12),
(46, 'tours-revash-8', 'tours-revash-8.jpg', '', 1, '2020-02-18 15:34:24', 12),
(47, 'tours-rafting-canotaje-2', 'tours-rafting-canotaje-2.jpg', '', 1, '2020-02-18 15:47:15', 7),
(48, 'tours-rafting-canotaje-4', 'tours-rafting-canotaje-4.jpg', '', 0, '2020-02-18 15:47:29', 7),
(49, 'tours-rafting-canotaje-1', 'tours-rafting-canotaje-1.jpg', '', 1, '2020-02-18 15:47:45', 7),
(50, 'tours-rafting-canotage-7', 'tours-rafting-canotage-7.jpg', '', 1, '2020-02-18 15:48:23', 7),
(51, 'tours-rafting-canotaje-9', 'tours-rafting-canotaje-9.jpg', '', 1, '2020-02-18 15:53:12', 7),
(52, 'tous-montana-7colores-6', 'tous-montana-7colores-6.jpg', '', 0, '2020-02-18 15:57:52', 17),
(53, 'tous-montana-7colores-1', 'tous-montana-7colores-1.jpg', '', 1, '2020-02-18 15:58:13', 17),
(54, 'tous-montana-7colores-9', 'tous-montana-7colores-9.jpg', '', 1, '2020-02-18 16:02:52', 17),
(55, 'tous-montana-7colores-7', 'tous-montana-7colores-7.jpg', '', 0, '2020-02-18 16:04:48', 17),
(56, 'tous-montana-7colores-8', 'tous-montana-7colores-8.jpg', '', 0, '2020-02-18 16:05:01', 17),
(57, 'tour-ruta-sillar-4', 'tour-ruta-sillar-4.jpg', '', 1, '2020-02-18 16:18:56', 24),
(58, 'tours-machupichu-tren-2', 'tours-machupichu-tren-2.jpg', '', 1, '2020-02-18 16:25:37', 18),
(59, 'tours-machupichu-tren-3', 'tours-machupichu-tren-3.jpg', '', 0, '2020-02-18 16:25:52', 18),
(60, 'tours-machupichu-tren-4', 'tours-machupichu-tren-4.jpg', '', 0, '2020-02-18 16:26:38', 18),
(61, 'tours-machupichu-tren-5', 'tours-machupichu-tren-5.jpg', '', 0, '2020-02-18 16:26:56', 18),
(63, 'tours-machupichu-tren-8', 'tours-machupichu-tren-8.jpg', '', 1, '2020-02-18 16:34:34', 18),
(64, 'tours-cataratas-pillones-6', 'tours-cataratas-pillones-6.jpg', '', 1, '2020-02-18 16:42:17', 25),
(65, 'tour-maras-moray-salineras-3', 'tour-maras-moray-salineras-3.jpg', '', 1, '2020-02-18 16:47:01', 14),
(66, 'tour-maras-moray-salineras-6', 'tour-maras-moray-salineras-6.jpg', '', 0, '2020-02-18 16:47:21', 14),
(67, 'tour-maras-moray-salineras-1', 'tour-maras-moray-salineras-1.jpg', '', 1, '2020-02-18 16:48:07', 14),
(68, 'tour-maras-moray-salineras-2', 'tour-maras-moray-salineras-2.jpg', '', 1, '2020-02-18 16:48:20', 14),
(69, 'tour-maras-moray-salineras-4', 'tour-maras-moray-salineras-4.jpg', '', 1, '2020-02-18 16:48:36', 14),
(70, 'tours-laguna-humantay-1', 'tours-laguna-humantay-1.jpg', '', 0, '2020-02-18 17:03:53', 19),
(71, 'tours-laguna-humantay-5', 'tours-laguna-humantay-5.jpg', '', 0, '2020-02-18 17:04:08', 19),
(72, 'tours-laguna-humantay-3', 'tours-laguna-humantay-3.jpg', '', 1, '2020-02-18 17:04:23', 19),
(73, 'tours-laguna-humantay-4', 'tours-laguna-humantay-4.jpg', '', 1, '2020-02-18 17:04:38', 19),
(74, 'tours-laguna-humantay-2', 'tours-laguna-humantay-2.jpg', '', 0, '2020-02-18 17:04:52', 19),
(75, 'tours-laguna-humantay-6', 'tours-laguna-humantay-6.jpg', '', 0, '2020-02-18 17:05:03', 19),
(76, 'tours-laguna-azul-3', 'tours-laguna-azul-3.jpg', '', 0, '2020-02-18 17:16:31', 2),
(77, 'tours-laguna-azul-4', 'tours-laguna-azul-4.jpg', '', 1, '2020-02-18 17:22:42', 2),
(78, 'tours-laguna-azul-6', 'tours-laguna-azul-6.jpg', '', 1, '2020-02-18 17:22:54', 2),
(79, 'tours-laguna-azul-7', 'tours-laguna-azul-7.jpg', '', 0, '2020-02-18 17:23:10', 2),
(80, 'tour-ruta-sillar-3', 'tour-ruta-sillar-3.jpg', '', 0, '2020-02-18 17:31:16', 24),
(81, 'tour-ruta-sillar-2', 'tour-ruta-sillar-2.jpg', '', 0, '2020-02-18 17:31:30', 24),
(82, 'tour-ruta-sillar-1', 'tour-ruta-sillar-1.jpg', '', 0, '2020-02-18 17:34:26', 24),
(83, 'tour-ruta-sillar-5', 'tour-ruta-sillar-5.jpg', '', 0, '2020-02-18 17:36:40', 24),
(84, 'tour-ruta-sillar-6', 'tour-ruta-sillar-6.jpg', '', 0, '2020-02-18 17:39:40', 24),
(85, 'tours-karajia-cavernas-2', 'tours-karajia-cavernas-2.jpg', '', 0, '2020-02-18 17:46:18', 10),
(86, 'tours-karajia-cavernas-3', 'tours-karajia-cavernas-3.jpg', '', 1, '2020-02-18 17:46:41', 10),
(87, 'tours-karajia-cavernas-6', 'tours-karajia-cavernas-6.jpg', '', 1, '2020-02-18 17:56:59', 10),
(88, 'tours-karajia-cavernas-5', 'tours-karajia-cavernas-5.jpg', '', 0, '2020-02-18 17:57:11', 10),
(89, 'tours-karajia-cavernas-7', 'tours-karajia-cavernas-7.jpg', '', 1, '2020-02-18 17:57:23', 10),
(90, 'Tour-valle-colca-3', 'Tour-valle-colca-3.jpg', '', 1, '2020-02-18 18:19:59', 22),
(91, 'Tour-valle-colca-6', 'Tour-valle-colca-6.jpg', '', 1, '2020-02-18 18:25:29', 22),
(92, 'Tour-valle-colca-5', 'Tour-valle-colca-5.jpg', '', 1, '2020-02-18 18:26:08', 22),
(93, 'Tour-valle-colca-4', 'Tour-valle-colca-4.jpg', '', 1, '2020-02-18 18:26:28', 22),
(94, 'tours-fortaleza-kuelap-7', 'tours-fortaleza-kuelap-7.jpg', '', 1, '2020-02-18 18:49:52', 8),
(95, 'tours-fortaleza-kuelap-4', 'tours-fortaleza-kuelap-4.jpg', '', 1, '2020-02-18 18:50:10', 8),
(96, 'tours-fortaleza-kuelap-8', 'tours-fortaleza-kuelap-8.jpg', '', 1, '2020-02-18 18:50:20', 8),
(97, 'tours-fortaleza-kuelap-9', 'tours-fortaleza-kuelap-9.jpg', '', 1, '2020-02-18 18:50:32', 8),
(98, 'tour-circuito-valle-sur-2', 'tour-circuito-valle-sur-2.jpg', '', 1, '2020-02-18 19:03:00', 20),
(99, 'tour-circuito-valle-sur-3', 'tour-circuito-valle-sur-3.jpg', '', 1, '2020-02-18 19:03:15', 20),
(100, 'tour-circuito-valle-sur-4', 'tour-circuito-valle-sur-4.jpg', '', 1, '2020-02-18 19:06:19', 20),
(101, 'tour-circuito-valle-sur-5', 'tour-circuito-valle-sur-5.jpg', '', 1, '2020-02-18 19:06:39', 20),
(102, 'tour-circuito-valle-sur-7', 'tour-circuito-valle-sur-7.jpg', '', 0, '2020-02-18 19:06:53', 20),
(103, 'tours-huacachina-3', 'tours-huacachina-3.jpg', '', 1, '2020-02-19 10:52:02', 26),
(104, 'tours-cataratas-pucayaquillo-4', 'tours-cataratas-pucayaquillo-4.jpg', '', 1, '2020-02-19 11:06:58', 5),
(105, 'tours-cataratas-pucayaquillo-6', 'tours-cataratas-pucayaquillo-6.jpg', '', 1, '2020-02-19 11:07:19', 5),
(106, 'tours-cataratas-pucayaquillo-3', 'tours-cataratas-pucayaquillo-3.jpg', '', 1, '2020-02-19 11:07:40', 5),
(107, 'tours-cataratas-pucayaquillo-5', 'tours-cataratas-pucayaquillo-5.jpg', '', 1, '2020-02-19 11:07:56', 5),
(108, 'tours-cataratas-pucayaquillo-2', 'tours-cataratas-pucayaquillo-2.jpg', '', 1, '2020-02-19 11:08:21', 5),
(109, 'paracasmajestic0001', 'paracasmajestic0001.jpg', '', 0, '2020-02-19 11:08:58', 27),
(110, 'tours-cataratas-ahuashiyacu-7', 'tours-cataratas-ahuashiyacu-7.jpg', '', 0, '2020-02-19 11:30:21', 21),
(111, 'tours-cataratas-ahuashiyacu-6', 'tours-cataratas-ahuashiyacu-6.jpg', '', 0, '2020-02-19 11:31:18', 21),
(112, 'tours-cataratas-ahuashiyacu-4', 'tours-cataratas-ahuashiyacu-4.jpg', '', 0, '2020-02-19 11:31:48', 21),
(113, 'tours-cataratas-ahuashiyacu-3', 'tours-cataratas-ahuashiyacu-3.jpg', '', 1, '2020-02-19 11:32:07', 21),
(114, 'tours-cataratas-ahuashiyacu-8', 'tours-cataratas-ahuashiyacu-8.jpg', '', 1, '2020-02-19 11:36:29', 21),
(115, 'tours-mirabus-turistico-2', 'tours-mirabus-turistico-2.jpg', '', 1, '2020-02-19 11:43:11', 23),
(116, 'tours-nazca-terrestre-1', 'tours-nazca-terrestre-1.jpg', '', 1, '2020-02-19 11:43:45', 28),
(117, 'tours-mirabus-turistico-1', 'tours-mirabus-turistico-1.jpg', '', 0, '2020-02-19 11:51:44', 23),
(118, 'tours-mirabus-turistico-3', 'tours-mirabus-turistico-3.jpg', '', 0, '2020-02-19 11:52:28', 23),
(119, 'tours-mirabus-turistico-4', 'tours-mirabus-turistico-4.jpg', '', 0, '2020-02-19 11:58:39', 23),
(120, 'tours-mirabus-turistico-6', 'tours-mirabus-turistico-6.jpg', '', 1, '2020-02-19 11:58:53', 23),
(121, 'tours-mirabus-turistico-5', 'tours-mirabus-turistico-5.jpg', '', 0, '2020-02-19 11:59:34', 23),
(122, 'tour-alto-mayo-2', 'tour-alto-mayo-2.jpg', '', 0, '2020-02-19 12:10:57', 3),
(123, 'tour-alto-mayo-3', 'tour-alto-mayo-3.jpg', '', 0, '2020-02-19 12:11:18', 3),
(124, 'tour-alto-mayo-7', 'tour-alto-mayo-7.jpg', '', 1, '2020-02-19 12:15:23', 3),
(125, 'tour-alto-mayo-4', 'tour-alto-mayo-4.jpg', '', 0, '2020-02-19 12:15:38', 3),
(126, 'tour-alto-mayo-6', 'tour-alto-mayo-6.jpg', '', 0, '2020-02-19 12:15:53', 3),
(127, 'tours-cataratas-pillones-2', 'tours-cataratas-pillones-2.jpg', '', 1, '2020-02-19 12:22:16', 25),
(128, 'tours-cataratas-pillones-3', 'tours-cataratas-pillones-3.jpg', '', 1, '2020-02-19 12:22:27', 25),
(130, 'tours-huacachina-2', 'tours-huacachina-2.jpg', '', 1, '2020-02-19 12:25:14', 26),
(131, 'tours-huacachina-8', 'tours-huacachina-8.jpg', '', 1, '2020-02-19 12:27:18', 26),
(132, 'tours-cataratas-pillones-5', 'tours-cataratas-pillones-5.jpg', '', 1, '2020-02-19 12:30:03', 25),
(133, 'tours-cataratas-pillones-1', 'tours-cataratas-pillones-1.jpg', '', 1, '2020-02-19 12:30:36', 25),
(134, 'tours-huacachina-4', 'tours-huacachina-4.jpg', '', 1, '2020-02-19 12:34:36', 26),
(135, 'tours-cataratas-pillones-7', 'tours-cataratas-pillones-7.jpg', '', 1, '2020-02-19 12:36:46', 25),
(136, 'tours-huacachina-10', 'tours-huacachina-10.jpg', '', 1, '2020-02-19 12:42:21', 26),
(137, 'tours-huacachina-7', 'tours-huacachina-7.jpg', '', 1, '2020-02-19 12:43:18', 26),
(138, 'Tour-a-Lamas-nativo-4', 'Tour-a-Lamas-nativo-4.jpg', '', 0, '2020-02-19 12:56:32', 1),
(139, 'Tour-a-Lamas-nativo-7', 'Tour-a-Lamas-nativo-7.jpg', '', 0, '2020-02-19 12:56:46', 1),
(140, 'Tour-a-Lamas-nativo-8', 'Tour-a-Lamas-nativo-8.jpg', '', 1, '2020-02-19 12:58:24', 1),
(141, 'tours-city-4', 'tours-city-4.jpg', '', 0, '2020-02-19 12:59:24', 13),
(142, 'tours-city tours y ruinas-3', 'tours-city-3.jpg', '', 1, '2020-02-19 13:01:20', 13),
(143, 'tours-city-1', 'tours-city-1.jpg', '', 0, '2020-02-19 13:02:22', 13),
(144, 'tours-city tours y ruinas-2', 'tours-city-2.jpg', '', 0, '2020-02-19 13:04:35', 13),
(145, 'tours-city tours y ruinas-5', 'tours-city-5.jpg', '', 1, '2020-02-19 13:05:19', 13),
(146, 'city-tours-huancas-4', 'city-tours-huancas-4.jpg', '', 0, '2020-02-19 13:14:20', 11),
(147, 'city-tours-huancas-10', 'city-tours-huancas-10.jpg', '', 1, '2020-02-19 13:14:33', 11),
(148, 'city-tours-huancas-9', 'city-tours-huancas-9.jpg', '', 1, '2020-02-19 13:14:45', 11),
(149, 'city-tours-huancas-8', 'city-tours-huancas-8.jpg', '', 0, '2020-02-19 13:14:55', 11),
(150, 'city-tours-huancas-12', 'city-tours-huancas-12.jpg', '', 0, '2020-02-19 13:15:06', 11),
(151, 'tours-nazca-terrestre-4', 'tours-nazca-terrestre-4.jpg', '', 1, '2020-02-19 13:32:50', 28),
(152, 'tours-nazca-terrestre-5', 'tours-nazca-terrestre-5.jpg', '', 1, '2020-02-19 13:33:32', 28),
(153, 'tours-nazca-terrestre-6', 'tours-nazca-terrestre-6.jpg', '', 1, '2020-02-19 13:38:20', 28),
(154, 'tours-nazca-terrestre-7', 'tours-nazca-terrestre-7.jpg', '', 1, '2020-02-19 13:38:36', 28),
(155, 'tours-nazca-terrestre-8', 'tours-nazca-terrestre-8.jpg', '', 1, '2020-02-19 13:40:38', 28),
(156, 'tour-catarata-carpishuyacu-2', 'tour-catarata-carpishuyacu-2.jpg', '', 1, '2020-02-19 13:52:49', 4),
(157, 'tour-catarata-carpishuyacu-3', 'tour-catarata-carpishuyacu-3.jpg', '', 1, '2020-02-19 13:53:09', 4),
(158, 'tour-catarata-carpishuyacu-4', 'tour-catarata-carpishuyacu-4.jpg', '', 1, '2020-02-19 13:53:26', 4),
(159, 'tour-catarata-carpishuyacu-5', 'tour-catarata-carpishuyacu-5.jpg', '', 1, '2020-02-19 13:53:40', 4),
(160, 'tour-catarata-carpishuyacu-6', 'tour-catarata-carpishuyacu-6.jpg', '', 0, '2020-02-19 13:54:04', 4),
(161, '84723199_2775878855830538_8440124487743045632_o', '84723199_2775878855830538_8440124487743045632_o.jpg', '', 0, '2020-02-20 15:39:59', 1),
(162, '84171992_2775878562497234_8909974720011567104_o', '84171992_2775878562497234_8909974720011567104_o.jpg', '', 0, '2020-02-20 16:12:05', 1),
(163, '80993750_2710914602326964_425671537236901888_o', '80993750_2710914602326964_425671537236901888_o.jpg', '', 0, '2020-02-20 16:12:26', 1),
(164, '81251325_2710925228992568_1803485853108928512_o', '81251325_2710925228992568_1803485853108928512_o.jpg', '', 0, '2020-02-20 16:12:50', 1),
(165, '81454738_2715341895217568_8153117009039589376_o', '81454738_2715341895217568_8153117009039589376_o.jpg', '', 0, '2020-02-20 16:21:00', 21),
(166, '82005411_2715343441884080_7307079185543987200_o', '82005411_2715343441884080_7307079185543987200_o.jpg', '', 0, '2020-02-20 16:21:16', 21),
(167, '83136835_2771781049573652_2532084345720537088_o', '83136835_2771781049573652_2532084345720537088_o.jpg', '', 0, '2020-02-20 16:21:28', 21),
(168, '84073118_2756185564466534_6091183268420386816_n', '84073118_2756185564466534_6091183268420386816_n.jpg', '', 0, '2020-02-20 16:21:47', 21),
(169, 'TOURS-LAGUNA-AZUL-11', 'TOURS-LAGUNA-AZUL-11.jpg', '', 1, '2020-02-20 17:10:26', 2),
(170, 'TOURS-LAGUNA-AZUL-9', 'TOURS-LAGUNA-AZUL-9.jpg', '', 1, '2020-02-20 17:10:41', 2),
(171, 'TOURS-LAGUNA-AZUL-8', 'TOURS-LAGUNA-AZUL-8.jpg', '', 1, '2020-02-20 17:10:58', 2),
(172, 'TOURS-LAGUNA-AZUL-10', 'TOURS-LAGUNA-AZUL-10.jpg', '', 0, '2020-02-20 17:11:27', 2),
(173, 'TOURS-CATARATA-CARPISHUYACU-7', 'TOURS-CATARATA-CARPISHUYACU-7.jpg', '', 1, '2020-02-20 17:20:42', 4),
(174, 'TOURS-VALLE-SAGRADO-CONEXION-7', 'TOURS-VALLE-SAGRADO-CONEXION-7.jpg', '', 0, '2020-02-21 13:39:51', 15),
(175, 'TOURS-VALLE-SAGRADO-CONEXION-8', 'TOURS-VALLE-SAGRADO-CONEXION-8.jpg', '', 0, '2020-02-21 13:40:20', 15),
(176, 'TOURS-VALLE-SAGRADO-CONEXION-8', 'TOURS-VALLE-SAGRADO-CONEXION-8.jpg', '', 1, '2020-02-21 13:54:06', 15),
(177, 'TOURS-VALLE-SAGRADO-CONEXION-9', 'TOURS-VALLE-SAGRADO-CONEXION-9.jpg', '', 1, '2020-02-21 14:01:46', 15),
(178, 'TOURS-VALLE-SAGRADO-CONEXION-10', 'TOURS-VALLE-SAGRADO-CONEXION-10.jpg', '', 1, '2020-02-21 14:02:38', 15),
(179, 'CITY-TOUR-CUSCO-6', 'CITY-TOUR-CUSCO-6.jpg', '', 1, '2020-02-21 14:12:52', 13),
(180, 'CITY-TOUR-CUSCO-7', 'CITY-TOUR-CUSCO-7.jpg', '', 1, '2020-02-21 14:13:12', 13),
(181, 'CITY-TOUR-CUSCO-8', 'CITY-TOUR-CUSCO-8.jpg', '', 0, '2020-02-21 14:13:25', 13),
(182, 'CITY-TOUR-CUSCO-9', 'CITY-TOUR-CUSCO-9.jpg', '', 1, '2020-02-21 14:13:39', 13),
(183, 'tour-maras-moray-7', 'tour-maras-moray-7.jpg', '', 0, '2020-02-21 14:22:44', 14),
(184, 'TOUR-MARAS-MORAY-SALINERAS-8', 'TOUR-MARAS-MORAY-SALINERAS-8.jpg', '', 1, '2020-02-21 14:25:33', 14),
(185, 'TOUR-GOCTA-01', 'TOUR-GOCTA-01.jpg', '', 0, '2020-02-24 17:04:00', 9),
(186, 'TOUR-GOCTA-02', 'TOUR-GOCTA-02.jpg', '', 0, '2020-02-24 17:04:12', 9),
(187, 'TOUR-RUTA-SILLAR-8', 'TOUR-RUTA-SILLAR-8.jpg', '', 0, '2020-02-24 19:21:03', 24),
(188, 'TOUR-RUTA-SILLAR-9', 'TOUR-RUTA-SILLAR-9.jpg', '', 0, '2020-02-24 19:21:15', 24),
(189, 'TOUR-RUTA-SILLAR-10', 'TOUR-RUTA-SILLAR-10.jpg', '', 0, '2020-02-24 19:21:26', 24),
(190, 'tours-laguna-azul-opt', 'tours-laguna-azul-opt.jpg', '', 0, '2020-02-25 15:24:14', 7),
(191, 'Salar-2', 'Salar-2.webp', '', 0, '2020-02-25 18:52:15', 29),
(192, 'WIN_20191122_10_33_36_Pro', 'WIN_20191122_10_33_36_Pro.jpg', '', 0, '2020-02-28 11:06:26', 11),
(193, 'WIN_20191122_10_33_36_Pro', 'WIN_20191122_10_33_36_Pro.jpg', '', 0, '2020-02-28 11:12:40', 11),
(194, 'TOUR-MONTANA-7COLORES-10', 'TOUR-MONTANA-7COLORES-10.jpg', '', 0, '2020-02-28 12:26:22', 17),
(195, 'TOUR-MONTANA-7COLORES11', 'TOUR-MONTANA-7COLORES11.jpg', '', 0, '2020-02-28 12:26:41', 17),
(196, 'TOUR-MONTANA-7COLORES-12', 'TOUR-MONTANA-7COLORES-12.jpg', '', 0, '2020-02-28 12:26:57', 17),
(197, 'TARAPOTO-CITY-TOURS-7', 'TARAPOTO-CITY-TOURS-7.jpg', '', 1, '2020-02-28 12:33:34', 6),
(198, 'TARAPOTO-CITY-TOURS-8', 'TARAPOTO-CITY-TOURS-8.jpg', '', 1, '2020-02-28 12:33:47', 6),
(199, 'TARAPOTO-CITY-TOURS-9', 'TARAPOTO-CITY-TOURS-9.jpg', '', 1, '2020-02-28 12:34:03', 6),
(200, 'TARAPOTO-CITY-TOURS-10', 'TARAPOTO-CITY-TOURS-10.jpg', '', 1, '2020-02-28 12:34:18', 6),
(201, 'TOUR-GOCTA-03', 'TOUR-GOCTA-03.jpg', '', 1, '2020-02-28 12:36:49', 9),
(202, 'TOUR-GOCTA-04', 'TOUR-GOCTA-04.jpg', '', 1, '2020-02-28 12:37:04', 9),
(203, 'TOUR-GOCTA-05', 'TOUR-GOCTA-05.jpg', '', 1, '2020-02-28 12:37:19', 9),
(204, 'city-tours-huancas-6', 'city-tours-huancas-6.jpg', '', 0, '2020-02-28 12:47:59', 29),
(205, 'TOUR-RAFTING-CANOTAJE-10', 'TOUR-RAFTING-CANOTAJE-10.jpg', '', 1, '2020-02-28 12:49:03', 7),
(206, 'logo', 'logo.png', '', 0, '2020-02-28 12:51:01', 29),
(207, 'TOURS-KARAJIA-CAVERNAS-8', 'TOURS-KARAJIA-CAVERNAS-8.jpg', '', 1, '2020-02-28 12:51:52', 10),
(208, 'TOURS-KARAJIA-CAVERNAS-9', 'TOURS-KARAJIA-CAVERNAS-9.jpg', '', 1, '2020-02-28 12:52:07', 10),
(209, 'TOURS-REVASH-9', 'TOURS-REVASH-9.jpg', '', 1, '2020-02-28 12:54:28', 12),
(210, 'TOURS-REVASH-10', 'TOURS-REVASH-10.jpg', '', 1, '2020-02-28 12:54:43', 12),
(211, 'TOURS-REVASH-11', 'TOURS-REVASH-11.jpg', '', 1, '2020-02-28 12:54:58', 12),
(212, 'TOUR-ALTO-MAYO-8', 'TOUR-ALTO-MAYO-8.jpg', '', 0, '2020-02-28 12:57:44', 3),
(213, 'TOUR-ALTO-MAYO-9', 'TOUR-ALTO-MAYO-9.jpg', '', 1, '2020-02-28 12:58:10', 3),
(214, 'TOUR-ALTO-MAYO-10', 'TOUR-ALTO-MAYO-10.jpg', '', 1, '2020-02-28 13:00:27', 3),
(215, 'TOUR-ALTO-MAYO-11', 'TOUR-ALTO-MAYO-11.jpg', '', 1, '2020-02-28 13:00:41', 3),
(216, 'TOUR-A-LAMAS-10', 'TOUR-A-LAMAS-10.jpg', '', 1, '2020-02-28 13:03:37', 1),
(217, 'TOUR-A-LAMAS-11', 'TOUR-A-LAMAS-11.jpg', '', 1, '2020-02-28 13:03:56', 1),
(218, 'TOUR-A-LAMAS-12', 'TOUR-A-LAMAS-12.jpg', '', 1, '2020-02-28 13:04:19', 1),
(226, 'TOUR-A-LAMAS-13', 'TOUR-A-LAMAS-13.jpg', '', 1, '2020-02-28 13:04:37', 1),
(227, 'TOURS-AHUASHIYACU-9', 'TOURS-AHUASHIYACU-9.jpg', '', 1, '2020-02-28 13:07:05', 21),
(228, 'TOURS-AHUASHIYACU-10', 'TOURS-AHUASHIYACU-10.jpg', '', 1, '2020-02-28 13:07:18', 21),
(229, 'CITY-TOURS-HUANCAS-11', 'CITY-TOURS-HUANCAS-11.jpg', '', 1, '2020-02-28 13:10:10', 11),
(230, 'CITY-TOURS-HUANCAS-12', 'CITY-TOURS-HUANCAS-12.jpg', '', 1, '2020-02-28 13:10:25', 11),
(231, 'CITY-TOURS-HUANCAS-13', 'CITY-TOURS-HUANCAS-13.jpg', '', 1, '2020-02-28 13:10:37', 11),
(232, 'TOUR-MONTANA-7COLORES-10', 'TOUR-MONTANA-7COLORES-10.jpg', '', 1, '2020-02-28 13:12:53', 17),
(233, 'TOUR-MONTANA-7COLORES-12', 'TOUR-MONTANA-7COLORES-12.jpg', '', 1, '2020-02-28 13:13:07', 17),
(234, 'TOUR-MONTANA-7COLORES11', 'TOUR-MONTANA-7COLORES11.jpg', '', 1, '2020-02-28 13:13:33', 17),
(235, 'TOURS-LAGUNA-HUMANTAY-5', 'TOURS-LAGUNA-HUMANTAY-5.jpg', '', 1, '2020-02-28 13:16:13', 19),
(236, 'TOURS-LAGUNA-HUMANTAY-7', 'TOURS-LAGUNA-HUMANTAY-7.jpg', '', 1, '2020-02-28 13:16:37', 19),
(237, 'TOURS-LAGUNA-HUMANTAY-6', 'TOURS-LAGUNA-HUMANTAY-6.jpg', '', 1, '2020-02-28 13:16:54', 19),
(238, 'TOURS-MACHUPICHU-TREN-9', 'TOURS-MACHUPICHU-TREN-9.jpg', '', 1, '2020-02-28 16:03:03', 18),
(239, 'TOURS-MACHUPICHU-TREN-10', 'TOURS-MACHUPICHU-TREN-10.jpg', '', 1, '2020-02-28 16:03:28', 18),
(240, 'TOURS-MACHUPICHU-TREN-11', 'TOURS-MACHUPICHU-TREN-11.jpg', '', 1, '2020-02-28 16:03:39', 18),
(241, 'TOUR-CIRCUITO-VALLE-SUR-6', 'TOUR-CIRCUITO-VALLE-SUR-6.jpg', '', 1, '2020-02-28 16:06:26', 20),
(242, 'TOUR-MIRABUS-TURISTICO-10', 'TOUR-MIRABUS-TURISTICO-10.jpg', '', 1, '2020-02-28 16:08:37', 23),
(243, 'TOUR-MIRABUS-TURISTICO-9', 'TOUR-MIRABUS-TURISTICO-9.jpg', '', 1, '2020-02-28 16:08:50', 23),
(244, 'TOUR-MIRABUS-TURISTICO-8', 'TOUR-MIRABUS-TURISTICO-8.jpg', '', 1, '2020-02-28 16:09:08', 23),
(245, 'TOUR-MIRABUS-TURISTICO-7', 'TOUR-MIRABUS-TURISTICO-7.jpg', '', 1, '2020-02-28 16:09:21', 23),
(246, 'TOUR-GOCTA-06', 'TOUR-GOCTA-06.jpg', '', 1, '2020-02-28 16:16:29', 9),
(247, 'TOUR-GOCTA-07', 'TOUR-GOCTA-07.jpg', '', 1, '2020-02-28 16:17:04', 9),
(248, 'ISLAS-PARACAS-01', 'ISLAS-PARACAS-01.jpg', '', 1, '2020-02-28 16:22:06', 27),
(249, 'ISLAS-PARACAS-02', 'ISLAS-PARACAS-02.jpg', '', 1, '2020-02-28 16:22:20', 27),
(250, 'ISLAS-PARACAS-03', 'ISLAS-PARACAS-03.jpg', '', 1, '2020-02-28 16:22:40', 27),
(251, 'ISLAS-PARACAS-04', 'ISLAS-PARACAS-04.jpg', '', 1, '2020-02-28 16:22:52', 27),
(252, 'ISLAS-PARACAS-05', 'ISLAS-PARACAS-05.jpg', '', 1, '2020-02-28 16:23:02', 27),
(253, 'Ruta-del-Sillar-Arequipa-1', 'Ruta-del-Sillar-Arequipa-1.jpg', '', 0, '2020-02-28 18:34:42', 32),
(254, 'TOURS-KARAJIA-CAVERNAS-10', 'TOURS-KARAJIA-CAVERNAS-10.jpg', '', 1, '2020-02-28 18:37:53', 10),
(255, 'TOUR-MIRABUS-TURISTICO-11', 'TOUR-MIRABUS-TURISTICO-11.jpg', '', 1, '2020-02-28 18:39:11', 23),
(256, 'TOURS-LAGUNA-HUMANTAY-8', 'TOURS-LAGUNA-HUMANTAY-8.jpg', '', 1, '2020-02-28 18:40:47', 19),
(257, 'CITY-TOUR-10', 'CITY-TOUR-10.jpg', '', 1, '2020-02-28 18:42:06', 13),
(258, 'TOUR-RUTA-SILLAR-5', 'TOUR-RUTA-SILLAR-5.jpg', '', 1, '2020-02-28 18:44:26', 24),
(259, 'TOUR-RUTA-SILLAR-6', 'TOUR-RUTA-SILLAR-6.jpg', '', 1, '2020-02-28 18:44:37', 24),
(260, 'TOUR-RUTA-SILLAR-7', 'TOUR-RUTA-SILLAR-7.jpg', '', 1, '2020-02-28 18:44:47', 24),
(261, 'TOUR-RUTA-SILLAR-8', 'TOUR-RUTA-SILLAR-8.jpg', '', 1, '2020-02-28 18:44:57', 24),
(262, 'TOUR-RUTA-SILLAR-9', 'TOUR-RUTA-SILLAR-9.jpg', '', 1, '2020-02-28 18:45:08', 24),
(263, 'TOUR-RUTA-SILLAR-10', 'TOUR-RUTA-SILLAR-10.jpg', '', 0, '2020-02-28 18:45:18', 24),
(264, 'ISLAS-PARACAS-06', 'ISLAS-PARACAS-06.jpg', '', 1, '2020-02-28 18:47:48', 27),
(265, 'TOURS-AHUASHIYACU-11', 'TOURS-AHUASHIYACU-11.jpg', '', 1, '2020-02-28 18:49:10', 21),
(266, 'TOUR-ALTO-MAYO-12', 'TOUR-ALTO-MAYO-12.jpg', '', 1, '2020-02-28 18:51:24', 3),
(267, '0ae13a33-6aa0-4003-ab4d-2f9abb815b0f', '0ae13a33-6aa0-4003-ab4d-2f9abb815b0f.jpg', '', 0, '2020-03-02 17:02:48', 29),
(268, '2bab00eb-a8fb-40fd-879d-055bcb82c3d0', '2bab00eb-a8fb-40fd-879d-055bcb82c3d0.jpg', '', 0, '2020-03-02 17:03:02', 29),
(269, 'TOUR-SALINAS-1', 'TOUR-SALINAS-1.jpg', '', 1, '2020-03-02 17:06:06', 29),
(270, 'TOUR-SALINAS-2', 'TOUR-SALINAS-2.jpg', '', 1, '2020-03-02 17:06:15', 29),
(271, 'TOUR-SALINAS-3', 'TOUR-SALINAS-3.jpg', '', 1, '2020-03-02 17:06:25', 29),
(272, 'TOUR-SALINAS-4', 'TOUR-SALINAS-4.jpg', '', 1, '2020-03-02 17:06:35', 29),
(273, 'TOUR-SALINAS-5', 'TOUR-SALINAS-5.jpg', '', 1, '2020-03-02 17:06:45', 29),
(274, 'TOUR-SALINAS-6', 'TOUR-SALINAS-6.jpg', '', 1, '2020-03-02 17:06:56', 29),
(275, 'CITY-TOUR-AYACUCHO-04', 'CITY-TOUR-AYACUCHO-04.jpg', '', 1, '2020-03-05 11:33:14', 32),
(276, 'CITY-TOUR-AYACUCHO-05', 'CITY-TOUR-AYACUCHO-05.jpg', '', 1, '2020-03-05 11:33:31', 32),
(277, 'CITY-TOUR-AYACUCHO-01', 'CITY-TOUR-AYACUCHO-01.jpg', '', 0, '2020-03-05 11:33:46', 32),
(278, 'CITY-TOUR-AYACUCHO-02', 'CITY-TOUR-AYACUCHO-02.jpg', '', 1, '2020-03-05 11:33:57', 32),
(279, 'CITY-TOUR-AYACUCHO-06', 'CITY-TOUR-AYACUCHO-06.jpg', '', 1, '2020-03-05 11:34:43', 32),
(280, 'CITY-TOUR-AYACUCHO-03', 'CITY-TOUR-AYACUCHO-03.jpg', '', 1, '2020-03-05 11:35:09', 32),
(281, 'MILLPU-01', 'MILLPU-01.jpg', '', 1, '2020-03-05 11:49:42', 34),
(282, 'MILLPU-02', 'MILLPU-02.jpg', '', 1, '2020-03-05 11:49:56', 34),
(283, 'MILLPU-03', 'MILLPU-03.jpg', '', 1, '2020-03-05 11:50:09', 34),
(284, 'MILLPU-04', 'MILLPU-04.jpg', '', 1, '2020-03-05 11:50:23', 34),
(285, 'MILLPU-05', 'MILLPU-05.jpg', '', 1, '2020-03-05 11:50:39', 34),
(286, 'WARI-QUINUA-02', 'WARI-QUINUA-02.jpg', '', 1, '2020-03-05 12:03:35', 33),
(287, 'WARI-QUINUA-01', 'WARI-QUINUA-01.jpg', '', 1, '2020-03-05 12:04:12', 33),
(288, 'WARI-QUINUA-03', 'WARI-QUINUA-03.jpg', '', 1, '2020-03-05 12:04:28', 33),
(289, 'WARI-QUINUA-04', 'WARI-QUINUA-04.jpg', '', 1, '2020-03-05 12:04:41', 33),
(290, 'VILCASHUAMAN-01', 'VILCASHUAMAN-01.jpg', '', 1, '2020-03-05 12:10:36', 35),
(291, 'VILCASHUAMAN-02', 'VILCASHUAMAN-02.jpg', '', 1, '2020-03-05 12:10:49', 35),
(292, 'VILCASHUAMAN-03', 'VILCASHUAMAN-03.jpg', '', 1, '2020-03-05 12:11:02', 35),
(293, 'VILCASHUAMAN-04', 'VILCASHUAMAN-04.jpg', '', 1, '2020-03-05 12:11:15', 35),
(294, 'VILCASHUAMAN-05', 'VILCASHUAMAN-05.jpg', '', 1, '2020-03-05 12:11:27', 35),
(299, 'foto_testprueba', 'foto_testprueba.jpg', '', 1, '2020-07-07 23:59:52', 39),
(300, 'foto_ron', 'foto_ron.jpg', '', 1, '2020-07-07 23:59:52', 39),
(302, 'foto-tour-20200711003049', 'foto-tour-20200711003049.jpg', 'aaaaaaaaa', 1, '2020-07-08 18:09:01', 38),
(303, 'foto-tour-20200708184343', 'foto-tour-20200708184343.jpg', '', 1, '2020-07-08 18:43:44', 38),
(304, 'foto-tour-20200708190548', 'foto-tour-20200708190548.jpg', '', 1, '2020-07-08 19:05:48', 38),
(305, 'foto-tour-20200708201837', 'foto-tour-20200708201837.jpg', '', 1, '2020-07-08 20:18:38', 38),
(306, 'foto-tour-20200709000259', 'foto-tour-20200709000259.jpg', '', 1, '2020-07-09 00:03:00', 38),
(307, 'foto-tour-20200710234623', 'foto-tour-20200710234623.jpg', 'bbbbbb', 1, '2020-07-10 23:46:24', 38),
(308, 'foto-tour-20200711001002', 'foto-tour-20200711001002.jpg', 'wwwwwwww', 1, '2020-07-11 00:10:03', 38),
(309, 'foto-tour-20200711003858', 'foto-tour-20200711003858.jpg', 'aa', 1, '2020-07-11 00:38:58', 38),
(310, 'foto-tour-20200711011742', 'foto-tour-20200711011742.jpg', 'asssaaaa', 1, '2020-07-11 01:17:42', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tours_imagenes_old`
--

CREATE TABLE `bd_tours_imagenes_old` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `nombre_extension` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL,
  `id_tours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tours_imagenes_old`
--

INSERT INTO `bd_tours_imagenes_old` (`id`, `nombre`, `nombre_extension`, `status`, `fecha_registro`, `id_tours`) VALUES
(1, 'Tour-a-Lamas-nativo-9', 'Tour-a-Lamas-nativo-9.png', 0, '2020-02-10 18:48:25', 1),
(2, 'Tour-a-Lamas-nativo-2', 'Tour-a-Lamas-nativo-2.png', 0, '2020-02-10 18:48:25', 1),
(4, 'tours-laguna-azul-1', 'tours-laguna-azul-1.png', 1, '2020-02-10 19:05:03', 2),
(5, 'tour-alto-mayo-1', 'tour-alto-mayo-1.png', 1, '2020-02-10 19:10:03', 3),
(6, 'tour-catarata-carpishuyacu-1', 'tour-catarata-carpishuyacu-1.png', 1, '2020-02-12 12:04:01', 4),
(7, 'tours-cataratas-pucayaquillo-1', 'tours-cataratas-pucayaquillo-1.png', 1, '2020-02-12 12:14:55', 5),
(8, 'tarapoto-city-tours-2', 'tarapoto-city-tours-2.png', 1, '2020-02-12 12:21:49', 6),
(9, 'tours-rafting-canotaje-8', 'tours-rafting-canotaje-8.png', 1, '2020-02-12 12:30:59', 7),
(10, 'tours-fortaleza-kuelap-1', 'tours-fortaleza-kuelap-1.png', 1, '2020-02-13 12:08:27', 8),
(11, 'tours-fortaleza-kuelap-2', 'tours-fortaleza-kuelap-2.png', 1, '2020-02-13 12:08:27', 8),
(13, 'Chachapoyas-Cataratas-del-Gocta-Nani', 'Chachapoyas-Cataratas-del-Gocta-Nani.jpg', 1, '2020-02-13 12:11:50', 9),
(14, 'tours-karajia-cavernas-4', 'tours-karajia-cavernas-4.png', 1, '2020-02-13 12:19:24', 10),
(15, 'tours-revash-1', 'tours-revash-1.png', 1, '2020-02-13 12:40:51', 12),
(16, 'tours-revash-4', 'tours-revash-4.png', 1, '2020-02-13 12:40:51', 12),
(18, 'City-of-Cuzco2', 'City-of-Cuzco2.jpg', 0, '2020-02-13 13:05:04', 13),
(19, 'tour-maras-moray-salineras-5', 'tour-maras-moray-salineras-5.png', 1, '2020-02-13 13:17:42', 14),
(20, 'optimized_4097-1', 'optimized_4097-1.jpg', 1, '2020-02-13 14:55:53', 16),
(21, 'tous-montana-7colores-4', 'tous-montana-7colores-4.png', 1, '2020-02-13 15:22:28', 17),
(22, 'tours-machupichu-tren-1', 'tours-machupichu-tren-1.png', 1, '2020-02-13 16:03:07', 18),
(23, 'tour-circuito-valle-sur-1', 'tour-circuito-valle-sur-1.png', 1, '2020-02-14 16:18:29', 20),
(24, 'Tour-a-Lamas-nativo-1', 'Tour-a-Lamas-nativo-1.png', 1, '2020-02-17 11:28:31', 1),
(25, 'tours-laguna-azul-2', 'tours-laguna-azul-2.png', 1, '2020-02-17 11:50:12', 2),
(26, 'tours-cataratas-ahuashiyacu-1', 'tours-cataratas-ahuashiyacu-1.png', 1, '2020-02-17 12:21:37', 21),
(27, 'city-tours-huancas-1', 'city-tours-huancas-1.png', 1, '2020-02-17 14:26:47', 11),
(28, 'Tour-valle-colca-2', 'Tour-valle-colca-2.png', 1, '2020-02-18 12:11:23', 22),
(29, 'Tour-valle-colca-1', 'Tour-valle-colca-1.png', 1, '2020-02-18 12:11:23', 22),
(32, 'tarapoto-city-tour-1', 'tarapoto-city-tour-1.png', 1, '2020-02-18 13:44:48', 6),
(33, 'tarapoto-city-tours-3', 'tarapoto-city-tours-3.png', 1, '2020-02-18 13:56:31', 6),
(34, 'tarapoto-city-tours-4', 'tarapoto-city-tours-4.png', 1, '2020-02-18 14:04:44', 6),
(35, 'tarapoto-city-tours-5', 'tarapoto-city-tours-5.png', 1, '2020-02-18 14:20:38', 6),
(36, 'tarapoto-city-tours-6', 'tarapoto-city-tours-6.png', 1, '2020-02-18 14:21:43', 6),
(37, 'tours-valle-sagrado-conexion-1', 'tours-valle-sagrado-conexion-1.png', 1, '2020-02-18 14:35:30', 15),
(38, 'tours-valle-sagrado-conexion-5', 'tours-valle-sagrado-conexion-5.png', 0, '2020-02-18 14:37:51', 15),
(39, 'tours-valle-sagrado-conexion-2', 'tours-valle-sagrado-conexion-2.png', 1, '2020-02-18 14:38:02', 15),
(40, 'tours-valle-sagrado-conexion-3', 'tours-valle-sagrado-conexion-3.png', 0, '2020-02-18 14:38:13', 15),
(41, 'tours-valle-sagrado-conexion-4', 'tours-valle-sagrado-conexion-4.png', 0, '2020-02-18 14:38:25', 15),
(42, 'tours-valle-sagrado-conexion-6', 'tours-valle-sagrado-conexion-6.jpg', 1, '2020-02-18 14:39:54', 15),
(43, 'tours-revash-3', 'tours-revash-3.png', 1, '2020-02-18 15:30:36', 12),
(44, 'tours-revash-6', 'tours-revash-6.png', 1, '2020-02-18 15:30:46', 12),
(45, 'tours-revash-7', 'tours-revash-7.png', 1, '2020-02-18 15:34:08', 12),
(46, 'tours-revash-8', 'tours-revash-8.png', 1, '2020-02-18 15:34:24', 12),
(47, 'tours-rafting-canotaje-2', 'tours-rafting-canotaje-2.png', 1, '2020-02-18 15:47:15', 7),
(48, 'tours-rafting-canotaje-4', 'tours-rafting-canotaje-4.png', 1, '2020-02-18 15:47:29', 7),
(49, 'tours-rafting-canotaje-1', 'tours-rafting-canotaje-1.png', 1, '2020-02-18 15:47:45', 7),
(50, 'tours-rafting-canotage-7', 'tours-rafting-canotage-7.png', 1, '2020-02-18 15:48:23', 7),
(51, 'tours-rafting-canotaje-9', 'tours-rafting-canotaje-9.png', 1, '2020-02-18 15:53:12', 7),
(52, 'tous-montana-7colores-6', 'tous-montana-7colores-6.png', 1, '2020-02-18 15:57:52', 17),
(53, 'tous-montana-7colores-1', 'tous-montana-7colores-1.png', 1, '2020-02-18 15:58:13', 17),
(54, 'tous-montana-7colores-9', 'tous-montana-7colores-9.png', 1, '2020-02-18 16:02:52', 17),
(55, 'tous-montana-7colores-7', 'tous-montana-7colores-7.png', 1, '2020-02-18 16:04:48', 17),
(56, 'tous-montana-7colores-8', 'tous-montana-7colores-8.png', 0, '2020-02-18 16:05:01', 17),
(57, 'tour-ruta-sillar-4', 'tour-ruta-sillar-4.png', 1, '2020-02-18 16:18:56', 24),
(58, 'tours-machupichu-tren-2', 'tours-machupichu-tren-2.png', 1, '2020-02-18 16:25:37', 18),
(59, 'tours-machupichu-tren-3', 'tours-machupichu-tren-3.png', 1, '2020-02-18 16:25:52', 18),
(60, 'tours-machupichu-tren-4', 'tours-machupichu-tren-4.png', 0, '2020-02-18 16:26:38', 18),
(61, 'tours-machupichu-tren-5', 'tours-machupichu-tren-5.png', 1, '2020-02-18 16:26:56', 18),
(63, 'tours-machupichu-tren-8', 'tours-machupichu-tren-8.png', 1, '2020-02-18 16:34:34', 18),
(64, 'tours-cataratas-pillones-6', 'tours-cataratas-pillones-6.png', 1, '2020-02-18 16:42:17', 25),
(65, 'tour-maras-moray-salineras-3', 'tour-maras-moray-salineras-3.png', 1, '2020-02-18 16:47:01', 14),
(66, 'tour-maras-moray-salineras-6', 'tour-maras-moray-salineras-6.png', 0, '2020-02-18 16:47:21', 14),
(67, 'tour-maras-moray-salineras-1', 'tour-maras-moray-salineras-1.png', 1, '2020-02-18 16:48:07', 14),
(68, 'tour-maras-moray-salineras-2', 'tour-maras-moray-salineras-2.png', 1, '2020-02-18 16:48:20', 14),
(69, 'tour-maras-moray-salineras-4', 'tour-maras-moray-salineras-4.png', 1, '2020-02-18 16:48:36', 14),
(70, 'tours-laguna-humantay-1', 'tours-laguna-humantay-1.png', 1, '2020-02-18 17:03:53', 19),
(71, 'tours-laguna-humantay-5', 'tours-laguna-humantay-5.png', 1, '2020-02-18 17:04:08', 19),
(72, 'tours-laguna-humantay-3', 'tours-laguna-humantay-3.png', 1, '2020-02-18 17:04:23', 19),
(73, 'tours-laguna-humantay-4', 'tours-laguna-humantay-4.png', 1, '2020-02-18 17:04:38', 19),
(74, 'tours-laguna-humantay-2', 'tours-laguna-humantay-2.png', 1, '2020-02-18 17:04:52', 19),
(75, 'tours-laguna-humantay-6', 'tours-laguna-humantay-6.png', 1, '2020-02-18 17:05:03', 19),
(76, 'tours-laguna-azul-3', 'tours-laguna-azul-3.png', 1, '2020-02-18 17:16:31', 2),
(77, 'tours-laguna-azul-4', 'tours-laguna-azul-4.png', 1, '2020-02-18 17:22:42', 2),
(78, 'tours-laguna-azul-6', 'tours-laguna-azul-6.png', 1, '2020-02-18 17:22:54', 2),
(79, 'tours-laguna-azul-7', 'tours-laguna-azul-7.png', 0, '2020-02-18 17:23:10', 2),
(80, 'tour-ruta-sillar-3', 'tour-ruta-sillar-3.png', 0, '2020-02-18 17:31:16', 24),
(81, 'tour-ruta-sillar-2', 'tour-ruta-sillar-2.png', 0, '2020-02-18 17:31:30', 24),
(82, 'tour-ruta-sillar-1', 'tour-ruta-sillar-1.png', 0, '2020-02-18 17:34:26', 24),
(83, 'tour-ruta-sillar-5', 'tour-ruta-sillar-5.png', 0, '2020-02-18 17:36:40', 24),
(84, 'tour-ruta-sillar-6', 'tour-ruta-sillar-6.png', 0, '2020-02-18 17:39:40', 24),
(85, 'tours-karajia-cavernas-2', 'tours-karajia-cavernas-2.png', 1, '2020-02-18 17:46:18', 10),
(86, 'tours-karajia-cavernas-3', 'tours-karajia-cavernas-3.png', 1, '2020-02-18 17:46:41', 10),
(87, 'tours-karajia-cavernas-6', 'tours-karajia-cavernas-6.png', 1, '2020-02-18 17:56:59', 10),
(88, 'tours-karajia-cavernas-5', 'tours-karajia-cavernas-5.png', 1, '2020-02-18 17:57:11', 10),
(89, 'tours-karajia-cavernas-7', 'tours-karajia-cavernas-7.png', 1, '2020-02-18 17:57:23', 10),
(90, 'Tour-valle-colca-3', 'Tour-valle-colca-3.png', 1, '2020-02-18 18:19:59', 22),
(91, 'Tour-valle-colca-6', 'Tour-valle-colca-6.png', 1, '2020-02-18 18:25:29', 22),
(92, 'Tour-valle-colca-5', 'Tour-valle-colca-5.png', 1, '2020-02-18 18:26:08', 22),
(93, 'Tour-valle-colca-4', 'Tour-valle-colca-4.png', 1, '2020-02-18 18:26:28', 22),
(94, 'tours-fortaleza-kuelap-7', 'tours-fortaleza-kuelap-7.jpg', 1, '2020-02-18 18:49:52', 8),
(95, 'tours-fortaleza-kuelap-4', 'tours-fortaleza-kuelap-4.png', 1, '2020-02-18 18:50:10', 8),
(96, 'tours-fortaleza-kuelap-8', 'tours-fortaleza-kuelap-8.png', 1, '2020-02-18 18:50:20', 8),
(97, 'tours-fortaleza-kuelap-9', 'tours-fortaleza-kuelap-9.png', 1, '2020-02-18 18:50:32', 8),
(98, 'tour-circuito-valle-sur-2', 'tour-circuito-valle-sur-2.png', 1, '2020-02-18 19:03:00', 20),
(99, 'tour-circuito-valle-sur-3', 'tour-circuito-valle-sur-3.png', 1, '2020-02-18 19:03:15', 20),
(100, 'tour-circuito-valle-sur-4', 'tour-circuito-valle-sur-4.png', 1, '2020-02-18 19:06:19', 20),
(101, 'tour-circuito-valle-sur-5', 'tour-circuito-valle-sur-5.png', 1, '2020-02-18 19:06:39', 20),
(102, 'tour-circuito-valle-sur-7', 'tour-circuito-valle-sur-7.png', 0, '2020-02-18 19:06:53', 20),
(103, 'tours-huacachina-3', 'tours-huacachina-3.png', 1, '2020-02-19 10:52:02', 26),
(104, 'tours-cataratas-pucayaquillo-4', 'tours-cataratas-pucayaquillo-4.png', 1, '2020-02-19 11:06:58', 5),
(105, 'tours-cataratas-pucayaquillo-6', 'tours-cataratas-pucayaquillo-6.png', 1, '2020-02-19 11:07:19', 5),
(106, 'tours-cataratas-pucayaquillo-3', 'tours-cataratas-pucayaquillo-3.png', 1, '2020-02-19 11:07:40', 5),
(107, 'tours-cataratas-pucayaquillo-5', 'tours-cataratas-pucayaquillo-5.png', 1, '2020-02-19 11:07:56', 5),
(108, 'tours-cataratas-pucayaquillo-2', 'tours-cataratas-pucayaquillo-2.png', 1, '2020-02-19 11:08:21', 5),
(109, 'paracasmajestic0001', 'paracasmajestic0001.jpg', 1, '2020-02-19 11:08:58', 27),
(110, 'tours-cataratas-ahuashiyacu-7', 'tours-cataratas-ahuashiyacu-7.png', 0, '2020-02-19 11:30:21', 21),
(111, 'tours-cataratas-ahuashiyacu-6', 'tours-cataratas-ahuashiyacu-6.png', 0, '2020-02-19 11:31:18', 21),
(112, 'tours-cataratas-ahuashiyacu-4', 'tours-cataratas-ahuashiyacu-4.png', 0, '2020-02-19 11:31:48', 21),
(113, 'tours-cataratas-ahuashiyacu-3', 'tours-cataratas-ahuashiyacu-3.png', 1, '2020-02-19 11:32:07', 21),
(114, 'tours-cataratas-ahuashiyacu-8', 'tours-cataratas-ahuashiyacu-8.png', 1, '2020-02-19 11:36:29', 21),
(115, 'tours-mirabus-turistico-2', 'tours-mirabus-turistico-2.png', 1, '2020-02-19 11:43:11', 23),
(116, 'tours-nazca-terrestre-1', 'tours-nazca-terrestre-1.png', 1, '2020-02-19 11:43:45', 28),
(117, 'tours-mirabus-turistico-1', 'tours-mirabus-turistico-1.png', 1, '2020-02-19 11:51:44', 23),
(118, 'tours-mirabus-turistico-3', 'tours-mirabus-turistico-3.png', 1, '2020-02-19 11:52:28', 23),
(119, 'tours-mirabus-turistico-4', 'tours-mirabus-turistico-4.png', 0, '2020-02-19 11:58:39', 23),
(120, 'tours-mirabus-turistico-6', 'tours-mirabus-turistico-6.png', 1, '2020-02-19 11:58:53', 23),
(121, 'tours-mirabus-turistico-5', 'tours-mirabus-turistico-5.png', 1, '2020-02-19 11:59:34', 23),
(122, 'tour-alto-mayo-2', 'tour-alto-mayo-2.png', 1, '2020-02-19 12:10:57', 3),
(123, 'tour-alto-mayo-3', 'tour-alto-mayo-3.png', 1, '2020-02-19 12:11:18', 3),
(124, 'tour-alto-mayo-7', 'tour-alto-mayo-7.png', 1, '2020-02-19 12:15:23', 3),
(125, 'tour-alto-mayo-4', 'tour-alto-mayo-4.png', 1, '2020-02-19 12:15:38', 3),
(126, 'tour-alto-mayo-6', 'tour-alto-mayo-6.png', 1, '2020-02-19 12:15:53', 3),
(127, 'tours-cataratas-pillones-2', 'tours-cataratas-pillones-2.png', 1, '2020-02-19 12:22:16', 25),
(128, 'tours-cataratas-pillones-3', 'tours-cataratas-pillones-3.png', 1, '2020-02-19 12:22:27', 25),
(130, 'tours-huacachina-2', 'tours-huacachina-2.png', 1, '2020-02-19 12:25:14', 26),
(131, 'tours-huacachina-8', 'tours-huacachina-8.png', 1, '2020-02-19 12:27:18', 26),
(132, 'tours-cataratas-pillones-5', 'tours-cataratas-pillones-5.png', 1, '2020-02-19 12:30:03', 25),
(133, 'tours-cataratas-pillones-1', 'tours-cataratas-pillones-1.png', 1, '2020-02-19 12:30:36', 25),
(134, 'tours-huacachina-4', 'tours-huacachina-4.png', 1, '2020-02-19 12:34:36', 26),
(135, 'tours-cataratas-pillones-7', 'tours-cataratas-pillones-7.png', 1, '2020-02-19 12:36:46', 25),
(136, 'tours-huacachina-10', 'tours-huacachina-10.png', 1, '2020-02-19 12:42:21', 26),
(137, 'tours-huacachina-7', 'tours-huacachina-7.png', 1, '2020-02-19 12:43:18', 26),
(138, 'Tour-a-Lamas-nativo-4', 'Tour-a-Lamas-nativo-4.png', 0, '2020-02-19 12:56:32', 1),
(139, 'Tour-a-Lamas-nativo-7', 'Tour-a-Lamas-nativo-7.png', 0, '2020-02-19 12:56:46', 1),
(140, 'Tour-a-Lamas-nativo-8', 'Tour-a-Lamas-nativo-8.png', 1, '2020-02-19 12:58:24', 1),
(141, 'tours-city-4', 'tours-city-4.png', 0, '2020-02-19 12:59:24', 13),
(142, 'tours-city tours y ruinas-3', 'tours-city-3.png', 1, '2020-02-19 13:01:20', 13),
(143, 'tours-city-1', 'tours-city-1.png', 0, '2020-02-19 13:02:22', 13),
(144, 'tours-city tours y ruinas-2', 'tours-city-2.png', 0, '2020-02-19 13:04:35', 13),
(145, 'tours-city tours y ruinas-5', 'tours-city-5.png', 1, '2020-02-19 13:05:19', 13),
(146, 'city-tours-huancas-4', 'city-tours-huancas-4.png', 1, '2020-02-19 13:14:20', 11),
(147, 'city-tours-huancas-10', 'city-tours-huancas-10.png', 1, '2020-02-19 13:14:33', 11),
(148, 'city-tours-huancas-9', 'city-tours-huancas-9.png', 1, '2020-02-19 13:14:45', 11),
(149, 'city-tours-huancas-8', 'city-tours-huancas-8.png', 1, '2020-02-19 13:14:55', 11),
(150, 'city-tours-huancas-12', 'city-tours-huancas-12.jpg', 1, '2020-02-19 13:15:06', 11),
(151, 'tours-nazca-terrestre-4', 'tours-nazca-terrestre-4.png', 1, '2020-02-19 13:32:50', 28),
(152, 'tours-nazca-terrestre-5', 'tours-nazca-terrestre-5.png', 1, '2020-02-19 13:33:32', 28),
(153, 'tours-nazca-terrestre-6', 'tours-nazca-terrestre-6.png', 1, '2020-02-19 13:38:20', 28),
(154, 'tours-nazca-terrestre-7', 'tours-nazca-terrestre-7.png', 1, '2020-02-19 13:38:36', 28),
(155, 'tours-nazca-terrestre-8', 'tours-nazca-terrestre-8.jpg', 1, '2020-02-19 13:40:38', 28),
(156, 'tour-catarata-carpishuyacu-2', 'tour-catarata-carpishuyacu-2.png', 1, '2020-02-19 13:52:49', 4),
(157, 'tour-catarata-carpishuyacu-3', 'tour-catarata-carpishuyacu-3.png', 1, '2020-02-19 13:53:09', 4),
(158, 'tour-catarata-carpishuyacu-4', 'tour-catarata-carpishuyacu-4.png', 1, '2020-02-19 13:53:26', 4),
(159, 'tour-catarata-carpishuyacu-5', 'tour-catarata-carpishuyacu-5.png', 1, '2020-02-19 13:53:40', 4),
(160, 'tour-catarata-carpishuyacu-6', 'tour-catarata-carpishuyacu-6.png', 1, '2020-02-19 13:54:04', 4),
(161, '84723199_2775878855830538_8440124487743045632_o', '84723199_2775878855830538_8440124487743045632_o.jpg', 1, '2020-02-20 15:39:59', 1),
(162, '84171992_2775878562497234_8909974720011567104_o', '84171992_2775878562497234_8909974720011567104_o.png', 1, '2020-02-20 16:12:05', 1),
(163, '80993750_2710914602326964_425671537236901888_o', '80993750_2710914602326964_425671537236901888_o.png', 0, '2020-02-20 16:12:26', 1),
(164, '81251325_2710925228992568_1803485853108928512_o', '81251325_2710925228992568_1803485853108928512_o.png', 1, '2020-02-20 16:12:50', 1),
(165, '81454738_2715341895217568_8153117009039589376_o', '81454738_2715341895217568_8153117009039589376_o.png', 0, '2020-02-20 16:21:00', 21),
(166, '82005411_2715343441884080_7307079185543987200_o', '82005411_2715343441884080_7307079185543987200_o.png', 0, '2020-02-20 16:21:16', 21),
(167, '83136835_2771781049573652_2532084345720537088_o', '83136835_2771781049573652_2532084345720537088_o.png', 1, '2020-02-20 16:21:28', 21),
(168, '84073118_2756185564466534_6091183268420386816_n', '84073118_2756185564466534_6091183268420386816_n.png', 1, '2020-02-20 16:21:47', 21),
(169, 'TOURS-LAGUNA-AZUL-11', 'TOURS-LAGUNA-AZUL-11.png', 1, '2020-02-20 17:10:26', 2),
(170, 'TOURS-LAGUNA-AZUL-9', 'TOURS-LAGUNA-AZUL-9.png', 1, '2020-02-20 17:10:41', 2),
(171, 'TOURS-LAGUNA-AZUL-8', 'TOURS-LAGUNA-AZUL-8.png', 1, '2020-02-20 17:10:58', 2),
(172, 'TOURS-LAGUNA-AZUL-10', 'TOURS-LAGUNA-AZUL-10.png', 1, '2020-02-20 17:11:27', 2),
(173, 'TOURS-CATARATA-CARPISHUYACU-7', 'TOURS-CATARATA-CARPISHUYACU-7.png', 1, '2020-02-20 17:20:42', 4),
(174, 'TOURS-VALLE-SAGRADO-CONEXION-7', 'TOURS-VALLE-SAGRADO-CONEXION-7.jpg', 0, '2020-02-21 13:39:51', 15),
(175, 'TOURS-VALLE-SAGRADO-CONEXION-8', 'TOURS-VALLE-SAGRADO-CONEXION-8.jpg', 0, '2020-02-21 13:40:20', 15),
(176, 'TOURS-VALLE-SAGRADO-CONEXION-8', 'TOURS-VALLE-SAGRADO-CONEXION-8.jpg', 1, '2020-02-21 13:54:06', 15),
(177, 'TOURS-VALLE-SAGRADO-CONEXION-9', 'TOURS-VALLE-SAGRADO-CONEXION-9.jpeg', 1, '2020-02-21 14:01:46', 15),
(178, 'TOURS-VALLE-SAGRADO-CONEXION-10', 'TOURS-VALLE-SAGRADO-CONEXION-10.jpg', 1, '2020-02-21 14:02:38', 15),
(179, 'CITY-TOUR-CUSCO-6', 'CITY-TOUR-CUSCO-6.png', 1, '2020-02-21 14:12:52', 13),
(180, 'CITY-TOUR-CUSCO-7', 'CITY-TOUR-CUSCO-7.png', 1, '2020-02-21 14:13:12', 13),
(181, 'CITY-TOUR-CUSCO-8', 'CITY-TOUR-CUSCO-8.png', 1, '2020-02-21 14:13:25', 13),
(182, 'CITY-TOUR-CUSCO-9', 'CITY-TOUR-CUSCO-9.png', 1, '2020-02-21 14:13:39', 13),
(183, 'tour-maras-moray-7', 'tour-maras-moray-7.jpg', 0, '2020-02-21 14:22:44', 14),
(184, 'TOUR-MARAS-MORAY-SALINERAS-8', 'TOUR-MARAS-MORAY-SALINERAS-8.jpg', 1, '2020-02-21 14:25:33', 14),
(185, 'TOUR-GOCTA-01', 'TOUR-GOCTA-01.png', 1, '2020-02-24 17:04:00', 9),
(186, 'TOUR-GOCTA-02', 'TOUR-GOCTA-02.png', 1, '2020-02-24 17:04:12', 9),
(187, 'TOUR-RUTA-SILLAR-8', 'TOUR-RUTA-SILLAR-8.png', 1, '2020-02-24 19:21:03', 24),
(188, 'TOUR-RUTA-SILLAR-9', 'TOUR-RUTA-SILLAR-9.png', 1, '2020-02-24 19:21:15', 24),
(189, 'TOUR-RUTA-SILLAR-10', 'TOUR-RUTA-SILLAR-10.png', 1, '2020-02-24 19:21:26', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_tours_tematicas`
--

CREATE TABLE `bd_tours_tematicas` (
  `id` int(11) NOT NULL,
  `id_tours` int(11) NOT NULL,
  `id_tematicas` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_tours_tematicas`
--

INSERT INTO `bd_tours_tematicas` (`id`, `id_tours`, `id_tematicas`, `status`, `fecha_registro`) VALUES
(307, 16, 2, 1, '2020-02-28 12:52:00'),
(308, 16, 8, 1, '2020-02-28 12:52:00'),
(326, 18, 3, 1, '2020-02-28 16:03:45'),
(327, 18, 2, 1, '2020-02-28 16:03:45'),
(328, 18, 8, 1, '2020-02-28 16:03:45'),
(359, 3, 2, 1, '2020-03-02 16:04:31'),
(360, 21, 2, 1, '2020-03-02 16:06:08'),
(361, 4, 3, 1, '2020-03-02 16:07:47'),
(362, 4, 2, 1, '2020-03-02 16:07:47'),
(363, 5, 3, 1, '2020-03-02 16:09:35'),
(364, 5, 2, 1, '2020-03-02 16:09:35'),
(365, 2, 2, 1, '2020-03-02 16:12:29'),
(366, 7, 5, 1, '2020-03-02 16:13:39'),
(367, 7, 1, 1, '2020-03-02 16:13:39'),
(368, 1, 8, 1, '2020-03-02 16:19:01'),
(371, 9, 3, 1, '2020-03-02 16:22:18'),
(372, 9, 2, 1, '2020-03-02 16:22:18'),
(373, 8, 2, 1, '2020-03-02 16:23:40'),
(374, 8, 8, 1, '2020-03-02 16:23:40'),
(375, 10, 2, 1, '2020-03-02 16:25:21'),
(376, 10, 8, 1, '2020-03-02 16:25:21'),
(377, 12, 2, 1, '2020-03-02 16:27:34'),
(378, 12, 8, 1, '2020-03-02 16:27:34'),
(379, 25, 3, 1, '2020-03-02 16:29:42'),
(380, 25, 2, 1, '2020-03-02 16:29:42'),
(381, 23, 8, 1, '2020-03-02 16:31:12'),
(382, 23, 7, 1, '2020-03-02 16:31:12'),
(383, 22, 2, 1, '2020-03-02 16:33:12'),
(384, 24, 8, 1, '2020-03-02 16:34:37'),
(388, 29, 3, 1, '2020-03-02 17:07:09'),
(389, 29, 2, 1, '2020-03-02 17:07:09'),
(398, 26, 9, 1, '2020-03-02 18:59:05'),
(399, 27, 2, 1, '2020-03-02 19:00:40'),
(400, 28, 8, 1, '2020-03-02 19:01:35'),
(411, 33, 8, 1, '2020-03-05 12:08:29'),
(412, 33, 7, 1, '2020-03-05 12:08:29'),
(413, 35, 2, 1, '2020-03-05 12:11:49'),
(414, 35, 8, 1, '2020-03-05 12:11:49'),
(415, 34, 2, 1, '2020-03-06 11:53:38'),
(419, 37, 2, 1, '2020-03-06 13:29:16'),
(422, 13, 8, 1, '2020-03-07 11:13:30'),
(423, 13, 7, 1, '2020-03-07 11:13:30'),
(424, 15, 2, 1, '2020-03-07 11:26:06'),
(425, 15, 8, 1, '2020-03-07 11:26:06'),
(428, 19, 3, 1, '2020-03-07 13:14:51'),
(429, 19, 2, 1, '2020-03-07 13:14:51'),
(432, 20, 2, 1, '2020-03-07 13:36:39'),
(433, 20, 8, 1, '2020-03-07 13:36:39'),
(434, 20, 7, 1, '2020-03-07 13:36:39'),
(436, 6, 8, 1, '2020-03-07 14:29:43'),
(437, 6, 7, 1, '2020-03-07 14:29:43'),
(438, 11, 2, 1, '2020-03-07 14:32:23'),
(439, 11, 7, 1, '2020-03-07 14:32:23'),
(440, 17, 3, 1, '2020-03-07 14:33:19'),
(441, 17, 2, 1, '2020-03-07 14:33:19'),
(442, 14, 8, 1, '2020-03-07 14:34:31'),
(444, 36, 8, 1, '2020-07-02 16:43:39'),
(457, 32, 7, 1, '2020-07-02 18:18:19'),
(460, 38, 2, 1, '2020-07-07 21:55:27'),
(461, 38, 7, 1, '2020-07-07 21:55:27'),
(462, 39, 5, 1, '2020-07-07 23:59:51'),
(463, 39, 8, 1, '2020-07-07 23:59:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_usuarios`
--

CREATE TABLE `bd_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(100) CHARACTER SET latin1 NOT NULL,
  `identificacion` varchar(11) CHARACTER SET latin1 NOT NULL,
  `clave` varchar(100) CHARACTER SET latin1 NOT NULL,
  `telefono_movil` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `rol` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_usuarios`
--

INSERT INTO `bd_usuarios` (`id`, `nombre`, `apellido`, `identificacion`, `clave`, `telefono_movil`, `estatus`, `rol`, `fecha_creacion`) VALUES
(1, 'ronny', 'simosa montoya', '001881738', '25d55ad283aa400af464c76d713c07ad', 993350031, 1, 1, '2018-05-13 10:00:00'),
(2, 'alissa', 'alissa', '47983173', '25f9e794323b453885f5181f1b624d0b', 0, 1, 1, '2019-11-26 10:49:31'),
(3, 'rrrrr', 'rrrrr', '444444444', '6b76b5b54567ec0008287d11a2e9e22a', 0, 1, 1, '2020-07-14 18:35:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_ventas`
--

CREATE TABLE `bd_ventas` (
  `id` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `tipo_documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen_tours` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `evento` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `infoprecio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_ninos` int(11) NOT NULL,
  `cantidad_adultos` int(11) NOT NULL,
  `duracion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre_servicio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cambio` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pais_procedencia` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `distrito_servicio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `simbolo_moneda` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_tours` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio_hotel` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `comentario_preveedor` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `punto_recojo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_hoteles` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_habitacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_vuelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `airolinea_vuelo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_llegada` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_ventas`
--

INSERT INTO `bd_ventas` (`id`, `numero_orden`, `tipo_documento`, `identificacion`, `imagen_tours`, `precio`, `evento`, `infoprecio`, `cantidad_ninos`, `cantidad_adultos`, `duracion`, `nombre_servicio`, `id_servicio`, `tipo_cambio`, `pais_procedencia`, `distrito_servicio`, `simbolo_moneda`, `precio_tours`, `precio_hotel`, `comentario_preveedor`, `punto_recojo`, `id_hoteles`, `id_habitacion`, `numero_vuelo`, `airolinea_vuelo`, `fecha_llegada`, `fecha_registro`, `status`) VALUES
(1, 1, 'DNI', '41043661', 'https://www.aventuras.pe/public/img/tours/tours-laguna-azul-1.jpg', '385', 'Paquetes', '235', 0, 2, '4 días 3 noches', 'CONOCIENDO TARAPOTO ', '1000000', '3.36', '\0p\0e\0r\0u', 'tarapoto', 'S/. ', '235', '510', '1 adulto italiano y 1 adulto peruana', '', '\03', '2', 'LA2254', 'LATAM ', '06/03/2020', '2020-03-04 10:43:43', 1),
(2, 2, 'DNI', '001881738', 'http://localhost/aventuras/public/img/tours/Chachapoyas-Cataratas-del-Gocta-Nani.jpg', '70', 'Tours', '70.00', 0, 2, 'día completo', 'Tour Catarata de Gocta', '9', '3.36', 'Perú', 'chachapoyas', 'S/. ', '0', '0', 'tttt', 'rjttt', '', '', '', '', '10/03/2020', '2020-03-09 19:43:31', 1),
(3, 3, 'DNI', '001881738', 'http://localhost/aventuras/public/img/tours/Chachapoyas-Cataratas-del-Gocta-Nani.jpg', '70', 'Tours', '70.00', 0, 2, 'día completo', 'Tour Catarata de Gocta', '9', '3.36', 'Perú', 'chachapoyas', 'S/. ', '0', '0', 'tttt', 'rjttt', '', '', '', '', '10/03/2020', '2020-03-09 19:43:43', 1),
(4, 4, 'C.E', '01881738', 'http://localhost/aventuras/public/img/tours/Tour-a-Lamas-nativo-1.jpg', '35', 'Tours', '35.00', 0, 2, 'medio día', 'Tour Lamas Nativo', '1', '3.36', 'Perú', 'tarapoto', 'S/. ', '0', '0', 'test prueba a', 'test prueba', '', '', '', '', '15/03/2020', '2020-03-14 12:05:24', 1),
(5, 5, 'C.E', '01881738', 'http://localhost/aventuras/public/img/tours/Tour-a-Lamas-nativo-1.jpg', '35', 'Tours', '35.00', 0, 2, 'medio día', 'Tour Lamas Nativo', '1', '3.36', 'Perú', 'tarapoto', 'S/. ', '0', '0', 'test prueba a', 'test prueba', '', '', '', '', '15/03/2020', '2020-03-14 12:06:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bd_ventas_habitaciones`
--

CREATE TABLE `bd_ventas_habitaciones` (
  `id` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `tipo_documento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_hoteles` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_habitacion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_personas` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `bd_ventas_habitaciones`
--

INSERT INTO `bd_ventas_habitaciones` (`id`, `numero_orden`, `tipo_documento`, `identificacion`, `id_hoteles`, `id_habitacion`, `cantidad_personas`) VALUES
(1, 1, 'DNI', '41043661', '3', '2', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bd_clientes`
--
ALTER TABLE `bd_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_cupon`
--
ALTER TABLE `bd_cupon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_duracion`
--
ALTER TABLE `bd_duracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_estatus_global`
--
ALTER TABLE `bd_estatus_global`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_habitaciones`
--
ALTER TABLE `bd_habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_hoteles`
--
ALTER TABLE `bd_hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_hoteles_habitaciones_dia`
--
ALTER TABLE `bd_hoteles_habitaciones_dia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_hoteles_habitaciones_info`
--
ALTER TABLE `bd_hoteles_habitaciones_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_hoteles_imagenes`
--
ALTER TABLE `bd_hoteles_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_hoteles_servicios_populares`
--
ALTER TABLE `bd_hoteles_servicios_populares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_monedas`
--
ALTER TABLE `bd_monedas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tipo_mercado_pago` (`tipo_mercado_pago`);

--
-- Indices de la tabla `bd_notificacion`
--
ALTER TABLE `bd_notificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_ofertas`
--
ALTER TABLE `bd_ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_oferta_detalle`
--
ALTER TABLE `bd_oferta_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_orden`
--
ALTER TABLE `bd_orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_paises`
--
ALTER TABLE `bd_paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_paquetes`
--
ALTER TABLE `bd_paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_paquetes_hoteles`
--
ALTER TABLE `bd_paquetes_hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_paquetes_tours`
--
ALTER TABLE `bd_paquetes_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_reclamos`
--
ALTER TABLE `bd_reclamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_servicios_populares_hoteles`
--
ALTER TABLE `bd_servicios_populares_hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_siglas_cupon`
--
ALTER TABLE `bd_siglas_cupon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tematicas`
--
ALTER TABLE `bd_tematicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_temporal_imagenes`
--
ALTER TABLE `bd_temporal_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_temporal_imagenes_hoteles`
--
ALTER TABLE `bd_temporal_imagenes_hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tipos_ofertas`
--
ALTER TABLE `bd_tipos_ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tours`
--
ALTER TABLE `bd_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tours_imagenes`
--
ALTER TABLE `bd_tours_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tours_imagenes_old`
--
ALTER TABLE `bd_tours_imagenes_old`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_tours_tematicas`
--
ALTER TABLE `bd_tours_tematicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_usuarios`
--
ALTER TABLE `bd_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_ventas`
--
ALTER TABLE `bd_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bd_ventas_habitaciones`
--
ALTER TABLE `bd_ventas_habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bd_clientes`
--
ALTER TABLE `bd_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bd_cupon`
--
ALTER TABLE `bd_cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bd_duracion`
--
ALTER TABLE `bd_duracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bd_estatus_global`
--
ALTER TABLE `bd_estatus_global`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bd_habitaciones`
--
ALTER TABLE `bd_habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bd_hoteles`
--
ALTER TABLE `bd_hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `bd_hoteles_habitaciones_dia`
--
ALTER TABLE `bd_hoteles_habitaciones_dia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `bd_hoteles_habitaciones_info`
--
ALTER TABLE `bd_hoteles_habitaciones_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `bd_hoteles_imagenes`
--
ALTER TABLE `bd_hoteles_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `bd_hoteles_servicios_populares`
--
ALTER TABLE `bd_hoteles_servicios_populares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `bd_monedas`
--
ALTER TABLE `bd_monedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bd_notificacion`
--
ALTER TABLE `bd_notificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `bd_ofertas`
--
ALTER TABLE `bd_ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bd_oferta_detalle`
--
ALTER TABLE `bd_oferta_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `bd_orden`
--
ALTER TABLE `bd_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bd_paises`
--
ALTER TABLE `bd_paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT de la tabla `bd_paquetes`
--
ALTER TABLE `bd_paquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000015;

--
-- AUTO_INCREMENT de la tabla `bd_paquetes_hoteles`
--
ALTER TABLE `bd_paquetes_hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `bd_paquetes_tours`
--
ALTER TABLE `bd_paquetes_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT de la tabla `bd_reclamos`
--
ALTER TABLE `bd_reclamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bd_servicios_populares_hoteles`
--
ALTER TABLE `bd_servicios_populares_hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bd_siglas_cupon`
--
ALTER TABLE `bd_siglas_cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bd_tematicas`
--
ALTER TABLE `bd_tematicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `bd_temporal_imagenes`
--
ALTER TABLE `bd_temporal_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bd_temporal_imagenes_hoteles`
--
ALTER TABLE `bd_temporal_imagenes_hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bd_tipos_ofertas`
--
ALTER TABLE `bd_tipos_ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bd_tours`
--
ALTER TABLE `bd_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `bd_tours_imagenes`
--
ALTER TABLE `bd_tours_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT de la tabla `bd_tours_imagenes_old`
--
ALTER TABLE `bd_tours_imagenes_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `bd_tours_tematicas`
--
ALTER TABLE `bd_tours_tematicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT de la tabla `bd_usuarios`
--
ALTER TABLE `bd_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `bd_ventas`
--
ALTER TABLE `bd_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bd_ventas_habitaciones`
--
ALTER TABLE `bd_ventas_habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
