-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2017 a las 15:51:29
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serclinic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_config`
--

CREATE TABLE `app_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activar_log` bit(1) NOT NULL DEFAULT b'1',
  `cuenta_paypal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `app_config`
--

INSERT INTO `app_config` (`id`, `activar_log`, `cuenta_paypal`) VALUES
(1, b'1', 'paypal@pondernet.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `operacion` varchar(250) DEFAULT NULL,
  `autor` varchar(50) NOT NULL,
  `producto` varchar(250) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(25) NOT NULL,
  `detalles` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id`, `operacion`, `autor`, `producto`, `fecha`, `ip`, `detalles`) VALUES
(1, 'producto/create', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-06 22:05:40', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(2, 'producto/create', 'admin (admin@siitur.com)', 'Curso de Marketing Online', '2016-03-06 22:19:08', '85.59.196.199', 'ID: 2, NOMBRE: Curso de Marketing Online, CATEGORIA: MongoDB'),
(3, 'producto/crear-carpeta', 'admin (admin@siitur.com)', 'Curso de Marketing Online', '2016-03-06 22:20:10', '85.59.196.199', 'ID: 2, NOMBRE: Curso de Marketing Online, CATEGORIA: MongoDB, RECURSO: MKO'),
(4, 'producto/update', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-12 00:31:23', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(5, 'producto/update', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-12 00:36:31', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(6, 'producto/update', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-12 01:54:41', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(7, 'producto/update', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-12 04:42:33', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(8, 'producto/update', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-12 15:20:19', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(9, 'producto/update', 'admin (admin@siitur.com)', 'Curso de Marketing Online', '2016-03-13 02:28:47', '85.59.196.199', 'ID: 2, NOMBRE: Curso de Marketing Online, CATEGORIA: Marketing'),
(10, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-14 21:59:26', '85.59.196.199', 'ID: 569, USUARIO: Jose.I, NOMBRE: José De la Cruz. IDENTIDAD: DNI: 9617390. CAMBIOS:'),
(11, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-14 21:59:53', '85.59.196.199', 'ID: 569, USUARIO: Jose.I, NOMBRE: José De la Cruz. IDENTIDAD: DNI: 9617390. CAMBIOS:'),
(12, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-14 22:11:49', '85.59.196.199', 'ID: 569, USUARIO: Jose.I, NOMBRE: José De la Cruz. IDENTIDAD: DNI: 9617390. CAMBIOS:'),
(13, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-14 22:27:13', '85.59.196.199', 'ID: 569, USUARIO: Jose.I, NOMBRE: José De la Cruz. IDENTIDAD: DNI: 9617390. CAMBIOS:'),
(14, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-16 15:28:54', '85.59.196.199', 'ID: 578, USUARIO: checom, NOMBRE: jorge pacheco. IDENTIDAD: DNI: 76363250. CAMBIOS: DIRECCION: Paso hondo 02030, MUNIC: Quilpue, PROV: Valparaiso'),
(15, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-03-24 23:45:07', '85.59.196.199', 'ID: 1, USUARIO: mayseval, NOMBRE: María José García. IDENTIDAD: DNI: 250000 R. CAMBIOS: EMAIL: snerol@yahoo.com'),
(16, 'producto/crear-carpeta', 'admin (admin@siitur.com)', 'Cursos WordPress', '2016-03-29 23:07:59', '85.59.196.199', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación, RECURSO: wordpress'),
(17, 'user/update', 'admin (admin@siitur.com)', NULL, '2016-04-02 01:48:30', '85.59.196.199', 'ID: 567, USUARIO: PATRICIA, NOMBRE: Prueba Ejemplo Ponder. IDENTIDAD: IFE: PEPD54030602M701. CAMBIOS: EMAIL: prueba@prueba.com, NOMBRE: Prueba, APELLIDOS: Ejemplo Ponder, SKYPE: prueba@prueba.com, PAYPAL: prueba@prueba.com, FACEBOOK: prueba, DIRECCION: Prueba Norte 215'),
(18, 'producto/create', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 07:56:15', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software'),
(19, 'producto/crear-carpeta', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 07:56:31', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: Ruby'),
(20, 'producto/update', 'yadier (yadierq87@gmail.com)', 'Cursos WordPress', '2016-04-10 10:10:42', '127.0.0.1', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación'),
(21, 'producto/update', 'yadier (yadierq87@gmail.com)', 'Curso de Marketing Online', '2016-04-10 10:10:57', '127.0.0.1', 'ID: 2, NOMBRE: Curso de Marketing Online, CATEGORIA: Marketing'),
(22, 'producto/update', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 10:11:08', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software'),
(23, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 10:58:07', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: Mejoras.docx'),
(24, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 10:58:37', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: hqdefault.jpg'),
(25, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 11:03:32', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: MALUMA_-_Borro_Cassette_.mp3'),
(26, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 11:04:01', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: MALUMA_-_Borro_Cassette_.mp3'),
(27, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Curso Ruby On Rails', '2016-04-10 11:04:28', '127.0.0.1', 'ID: 3, NOMBRE: Curso Ruby On Rails, CATEGORIA: Desarrollo de Software, RECURSO: tu-eres-la-unica-persona-que-me-hace-dibujar-corazones.jpg'),
(28, 'operacion/create', 'yadier (yadierq87@gmail.com)', NULL, '2016-05-03 11:55:08', '127.0.0.1', 'ID: 36, NOMBRE: retorno, RUTA: producto/ipn-ponder'),
(29, 'producto/gestionar-ficheros', 'yadier (yadierq87@gmail.com)', 'Cursos WordPress', '2016-05-25 00:13:07', '127.0.0.1', 'ID: 1, NOMBRE: Cursos WordPress, CATEGORIA: Lenguajes de Programación, RECURSO: Cosas_resueltas.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_acquire_image`
--

CREATE TABLE `cf_acquire_image` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `cf_equipment_id` int(11) DEFAULT NULL,
  `specialist` int(11) DEFAULT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL,
  `tasa_conteo` float NOT NULL,
  `fecha_hora_inyeccion` datetime NOT NULL,
  `fecha_hora_adquisicion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_acquire_image`
--

INSERT INTO `cf_acquire_image` (`id`, `cf_medical_consultation_id`, `cf_equipment_id`, `specialist`, `observation`, `status`, `causes`, `username`, `datetime_w`, `datetime_r`, `tasa_conteo`, `fecha_hora_inyeccion`, `fecha_hora_adquisicion`) VALUES
(48, 18, 5, 1, 'Ninguna OK', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, '2017-01-03 05:39:46', '2017-01-05 01:30:33'),
(49, 17, 5, 1, 'buena imagen del pulmon', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 125, '2017-01-04 18:58:20', '2017-01-04 11:55:11'),
(50, 21, 5, 2, 'Se ve bien!', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, '2017-01-06 17:42:19', '2017-01-06 10:40:52'),
(51, 22, NULL, 1, 'miles', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, '2017-01-06 17:48:53', '2017-01-06 10:45:18'),
(52, 23, 5, 1, 'ok', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 13, '2017-01-06 18:06:54', '2017-01-06 10:05:20'),
(53, 24, 5, 1, 'took', '1', '', 'yadier', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 123, '2017-01-31 20:52:31', '2017-01-26 21:50:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_activimetro`
--

CREATE TABLE `cf_activimetro` (
  `id` int(11) NOT NULL,
  `fecha_medicion` date NOT NULL,
  `hora` time NOT NULL,
  `fondo_act` float NOT NULL,
  `actv_fuente_patron` text NOT NULL,
  `actv_estandar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_administer_doses`
--

CREATE TABLE `cf_administer_doses` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `zone` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL,
  `remanente` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_administer_doses`
--

INSERT INTO `cf_administer_doses` (`id`, `cf_medical_consultation_id`, `zone`, `observation`, `specialist`, `status`, `causes`, `username`, `datetime_w`, `datetime_r`, `remanente`) VALUES
(1, 9, 'abajo', '', '', '1', '', 'yadier', '2016-12-15 00:00:00', '2016-12-16 00:00:00', ''),
(2, 1, 'dssdfsd', '', '', '1', 'drg1', 'yadier', '2016-12-09 00:00:00', '2016-12-07 00:00:00', ''),
(3, 1, 'ad', 'v', '', '1', '', 'yadier', '2016-12-08 00:00:00', '2016-12-14 00:00:00', ''),
(4, 9, 'nalga', 'gdsgds', 'Empleado  Publico', 'dsgds', '1', 'yadier', '2016-12-03 00:00:00', '2016-12-04 00:00:00', ''),
(5, 10, '', 'dsgdgsd', '', '1', 'tgdfsg', 'yadier', '2016-12-03 00:00:00', '2016-12-08 00:00:00', ''),
(6, 1, 'pecho', 'dfjsdjfhas', 'Empleado  Publico', '1', '', 'yadier', '2016-12-02 00:00:00', '2016-12-01 00:00:00', ''),
(7, 2, 'pecho', 'sdfdfsd', 'Empleado  Publico', '1', '', 'yadier', '2016-12-02 00:00:00', '2016-12-01 00:00:00', ''),
(8, 8, 'pecho', 'sdfgsdgsdgsdg', 'Empleado  Publico', '1', 'kdsjfkasjfjasklfkla', 'yadier', '2016-12-02 00:00:00', '2016-12-01 00:00:00', ''),
(10, 18, 'brazo', 'Todo bien', 'Empleado  Publico', '1', '', 'yadier', '2017-01-03 05:39:46', '2017-01-02 22:39:46', '0'),
(11, 17, 'pecho', 'todo bien', 'Abel Perez Perez', '1', '', 'yadier', '2017-01-04 18:58:20', '2017-01-04 11:58:20', '1'),
(12, 21, 'brazo', 'nada bueno', 'Empleado  Publico', '1', '', 'yadier', '2017-01-06 17:42:19', '2017-01-06 10:42:19', '12'),
(13, 22, 'brazo', 'todo fine!', '', '1', '', 'yadier', '2017-01-06 17:48:53', '2017-01-06 10:48:53', '2'),
(14, 23, 'pecho', '', 'Empleado  Publico', '1', '', 'yadier', '2017-01-06 18:06:54', '2017-01-06 11:06:54', '0'),
(15, 24, 'pecho', 'to jodio', 'Empleado  Publico', '1', '', 'yadier', '2017-01-31 20:52:31', '2017-01-31 13:52:32', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_campana`
--

CREATE TABLE `cf_campana` (
  `fecha` datetime NOT NULL,
  `presion` varchar(200) NOT NULL,
  `flujo_aire` varchar(200) NOT NULL,
  `id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_campana`
--

INSERT INTO `cf_campana` (`fecha`, `presion`, `flujo_aire`, `id`) VALUES
('2017-01-06 00:00:00', '125', '20', 1),
('2017-02-09 00:00:00', '1', '100', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_cod_proceso`
--

CREATE TABLE `cf_cod_proceso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_cod_proceso`
--

INSERT INTO `cf_cod_proceso` (`id`, `nombre`) VALUES
(1, 'Recepcion'),
(2, 'RadioFarmacia'),
(3, 'Administrar Dosis'),
(4, 'Adquirir Imagen'),
(5, 'Procesamiento'),
(6, 'Entrega');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_cod_zonas`
--

CREATE TABLE `cf_cod_zonas` (
  `id` int(11) NOT NULL,
  `nombre_lugar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_cod_zonas`
--

INSERT INTO `cf_cod_zonas` (`id`, `nombre_lugar`) VALUES
(1, 'brazo'),
(2, 'pecho'),
(3, 'nalga'),
(4, 'Oreja'),
(5, 'Hombro'),
(6, 'pois'),
(7, 'dsdsh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_diary_elution`
--

CREATE TABLE `cf_diary_elution` (
  `id` int(11) NOT NULL,
  `elution_datetime` datetime NOT NULL,
  `codigo_generator` varchar(150) NOT NULL,
  `activity_elution` float NOT NULL,
  `volumen_elution` float NOT NULL,
  `activity99Mo` float NOT NULL,
  `percent_radiocoloides` float DEFAULT NULL,
  `aluminio` float DEFAULT NULL,
  `ph` float DEFAULT NULL,
  `aspecto_organoleptico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_diary_elution`
--

INSERT INTO `cf_diary_elution` (`id`, `elution_datetime`, `codigo_generator`, `activity_elution`, `volumen_elution`, `activity99Mo`, `percent_radiocoloides`, `aluminio`, `ph`, `aspecto_organoleptico`) VALUES
(2, '2017-02-02 11:04:41', '3', 95.13, 10, 98.19, NULL, NULL, NULL, ''),
(3, '2017-01-04 12:03:35', '3', 45, 45, 45, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_entrega_reporte`
--

CREATE TABLE `cf_entrega_reporte` (
  `id` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `quien_entrega` varchar(250) NOT NULL,
  `quien_recibe` varchar(250) NOT NULL,
  `ci_quien_recibe` varchar(250) NOT NULL,
  `telf_quien_recibe` varchar(250) NOT NULL,
  `direccion_quien_recibe` varchar(250) NOT NULL,
  `observaciones` text NOT NULL,
  `id_cf_medical_consultation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_entrega_reporte`
--

INSERT INTO `cf_entrega_reporte` (`id`, `fecha_entrega`, `quien_entrega`, `quien_recibe`, `ci_quien_recibe`, `telf_quien_recibe`, `direccion_quien_recibe`, `observaciones`, `id_cf_medical_consultation`) VALUES
(2, '2017-01-06', 'JOse', 'Alberto Rodgez', '870694150233', '47859213', 'ave 68 % 13 y 14', 'ok', 17),
(3, '2017-08-02', 'Empleado  Publico', 'fgfdg', '4245235235', '2535 ', 'dsfs 24', 'dgsdg dsf4', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_equipment`
--

CREATE TABLE `cf_equipment` (
  `id` int(11) NOT NULL,
  `cf_local_id` int(11) DEFAULT NULL,
  `cf_types_equipment_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `production_datetime` datetime DEFAULT NULL,
  `last_calibration_datetime` datetime DEFAULT NULL,
  `last_calibration_certified` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `can_users` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_equipment`
--

INSERT INTO `cf_equipment` (`id`, `cf_local_id`, `cf_types_equipment_id`, `name`, `stock_number`, `mark`, `model`, `specialist`, `production_datetime`, `last_calibration_datetime`, `last_calibration_certified`, `status`, `observation`, `can_users`, `datetime_r`, `username`) VALUES
(5, 6, 2, 'Camara Gammagrafica', '17182205', 'TB-IDEN', 'ZTE', '1', '2009-02-05 00:00:00', '2010-02-04 00:00:00', 'OK', 1, 'asss', '0', '0000-00-00 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_generator`
--

CREATE TABLE `cf_generator` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) DEFAULT NULL,
  `batch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `indice_transpte_recepcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reception_datetime` datetime NOT NULL,
  `waste_datetime` datetime DEFAULT NULL,
  `factory_datetime_reference` datetime DEFAULT NULL,
  `factory_activity_reference` double DEFAULT NULL,
  `factory_production_datetime` datetime DEFAULT NULL,
  `factory_expiracion_datetime` datetime DEFAULT NULL,
  `first_datetime_elucion` datetime DEFAULT NULL,
  `first_activity_elucion` double DEFAULT NULL,
  `last_datetime_elucion` datetime DEFAULT NULL,
  `last_activity_elucion` double DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dosis1m_recepcion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dosis1m_desecho` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `frotis_recepcion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_generator`
--

INSERT INTO `cf_generator` (`id`, `name`, `number`, `batch`, `indice_transpte_recepcion`, `company`, `reception_datetime`, `waste_datetime`, `factory_datetime_reference`, `factory_activity_reference`, `factory_production_datetime`, `factory_expiracion_datetime`, `first_datetime_elucion`, `first_activity_elucion`, `last_datetime_elucion`, `last_activity_elucion`, `specialist`, `status`, `observation`, `datetime_r`, `username`, `dosis1m_recepcion`, `dosis1m_desecho`, `frotis_recepcion`) VALUES
(3, 'Generador del 99Mo-99mTc 20 GBq', 25012, 'BZ-103', NULL, 'CENTIS', '2017-02-02 00:00:00', '2017-01-09 11:01:43', '2017-01-01 10:01:42', 37, '2017-01-02 06:01:42', '2017-01-09 11:01:43', NULL, NULL, NULL, NULL, '2', 1, 'dfth', '0000-00-00 00:00:00', 'yadier', '1', '1', 1),
(4, 'Generador del 99Mo-99mTc 37 GBq', 4589, '4589', NULL, 'CENTIS', '2017-01-05 05:01:00', '2017-01-05 12:01:06', '2017-01-12 01:01:05', 37, '2016-12-30 05:12:05', '2017-01-12 05:01:06', NULL, NULL, NULL, NULL, '2', 1, '', '0000-00-00 00:00:00', 'yadier', '14', '25', 2),
(5, 'generador', 123, '23', NULL, 'CENTIS', '2017-02-02 00:00:00', '2017-02-02 01:02:47', '2017-02-09 09:02:47', 54, '2017-02-12 11:02:47', '2017-02-02 05:02:47', NULL, NULL, NULL, NULL, '1', 1, '', '0000-00-00 00:00:00', 'yadier', '2', '4', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_history_log`
--

CREATE TABLE `cf_history_log` (
  `id` int(11) NOT NULL,
  `entity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip_source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `old_value` longtext COLLATE utf8_unicode_ci,
  `new_value` longtext COLLATE utf8_unicode_ci,
  `datetime` datetime NOT NULL,
  `msg` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_image_acquire_study`
--

CREATE TABLE `cf_image_acquire_study` (
  `id` int(11) NOT NULL,
  `img_name_path` varchar(250) NOT NULL,
  `img_size` varchar(150) NOT NULL,
  `img_type` varchar(120) NOT NULL,
  `meta_tag` varchar(250) NOT NULL,
  `process_status` tinyint(1) NOT NULL,
  `observation` text NOT NULL,
  `cf_medical_consultation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_image_acquire_study`
--

INSERT INTO `cf_image_acquire_study` (`id`, `img_name_path`, `img_size`, `img_type`, `meta_tag`, `process_status`, `observation`, `cf_medical_consultation_id`) VALUES
(40, 'docs-patient/Fernanda9/Estudio del pulmon I/1720170103-060343-IMG.jpg', '9183 bytes', 'image/jpeg', 'Estudio del pulmon I', 1, '', 18),
(41, 'docs-patient/Paciente7/Estudio del pulmon I/4620170104-190011-IMG.jpg', '3856 bytes', 'image/png', 'Estudio del pulmon I', 1, '', 17),
(42, 'docs-patient/Alexandro12/Estudio Dinamico de Rinnon MEG-3/4520170106-174351-IMG.jpg', '15167 bytes', 'image/jpeg', 'Estudio Dinamico de Rinnon MEG-3', 1, '', 21),
(43, 'docs-patient/Pacienta11/Estudio Dinamico de Rinnon MEG-3/9520170106-175023-IMG.jpg', '9194 bytes', 'image/jpeg', 'Estudio Dinamico de Rinnon MEG-3', 1, '', 22),
(44, 'docs-patient/Samantha13/Estudio del corazon I/9320170106-180905-IMG.jpg', '53512 bytes', 'image/jpeg', 'Estudio del corazon I', 1, '', 23),
(45, 'docs-patient/Brenda14/Gammagraafia osea/4920170131-210110-IMG.jpg', '58220 bytes', 'image/jpeg', 'Gammagraafia osea', 1, '', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_indications_templates`
--

CREATE TABLE `cf_indications_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `template_indication` longtext COLLATE utf8_unicode_ci,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_local`
--

CREATE TABLE `cf_local` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_local`
--

INSERT INTO `cf_local` (`id`, `name`, `status`, `observation`, `datetime_r`, `username`) VALUES
(4, 'Local Estudios Medico', 1, 'df', '0000-00-00 00:00:00', 'yadier'),
(5, 'Camara Gamma Uno', 1, '', '0000-00-00 00:00:00', 'yadier'),
(6, 'Camara Estudios II', 1, '', '0000-00-00 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_media`
--

CREATE TABLE `cf_media` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_media`
--

INSERT INTO `cf_media` (`id`, `name`, `file_name`, `mime_type`, `size`, `path`, `meta`, `status`, `observation`) VALUES
(1, 'loko', 'logo', 'png', 125, 'logo', 'tag', 1, 'ninguna'),
(2, 'cambios', 'loko', 'txt', 145, 'docs', 'tag', 1, 'ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_medical_consultation`
--

CREATE TABLE `cf_medical_consultation` (
  `id` int(11) NOT NULL,
  `cf_medical_study_id` int(11) DEFAULT NULL,
  `cf_patient_id` int(11) DEFAULT NULL,
  `date_turn` date NOT NULL,
  `hour_turn` time DEFAULT NULL,
  `off_calendar` smallint(6) DEFAULT NULL,
  `doctor_makes_referral_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_makes_referral_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_makes_referral_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hospital_makes_referral_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_remission` datetime DEFAULT NULL,
  `size` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `indication` longtext COLLATE utf8_unicode_ci,
  `price` longtext COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci,
  `is_external` smallint(6) DEFAULT NULL,
  `age` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_w` datetime DEFAULT NULL,
  `datetime_r` datetime NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `specialist` int(11) NOT NULL,
  `sobrepeso` smallint(11) DEFAULT NULL,
  `bajopeso` smallint(11) DEFAULT NULL,
  `estado_externo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_medical_consultation`
--

INSERT INTO `cf_medical_consultation` (`id`, `cf_medical_study_id`, `cf_patient_id`, `date_turn`, `hour_turn`, `off_calendar`, `doctor_makes_referral_id`, `doctor_makes_referral_name`, `doctor_makes_referral_email`, `hospital_makes_referral_name`, `date_remission`, `size`, `weight`, `indication`, `price`, `status`, `causes`, `is_external`, `age`, `observation`, `datetime_w`, `datetime_r`, `username`, `specialist`, `sobrepeso`, `bajopeso`, `estado_externo`, `parent_id`) VALUES
(17, 18, 7, '2017-03-23', '08:05:25', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2016-12-29 00:00:00', 180, 65, 'No Inyectar penicilina', '145 CUP', 'Entregado', '', 1, '16 años', 'Nada', '2017-01-04 00:00:00', '2017-03-23 00:00:00', 'yadier', 2, NULL, NULL, '', 0),
(18, 16, 9, '2017-03-23', '10:05:06', 0, '', 'Dr. Garcia Perez', '', 'Hospital Militar', '2016-12-29 00:00:00', 165, 64, '', '145 CUP', 'Creado', '', 0, '29 años', 'Nada', '2017-01-02 00:00:00', '2017-03-23 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(21, 17, 12, '2017-03-23', '10:25:26', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', NULL, 185, 85, '', '25 CUC', 'Creado', '', 0, '26 años', 'todo bien', '2017-01-06 00:00:00', '2017-03-23 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(22, 17, 11, '2017-01-06', '10:47:25', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-01-04 00:00:00', 128, 25, '', '25 CUC', 'Procesado', '', 0, '16 años', 'ok', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(23, 18, 13, '2017-01-06', '10:05:58', 1, '', 'Dr. Alvarez Martinez', '', 'Gral Calixto Garcia', '2017-01-04 00:00:00', 85, 85, '', '120 CUP', 'Procesado', '', 0, '6 años', 'bien', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'yadier', 2, NULL, NULL, '', 0),
(24, 20, 14, '2017-01-04', '02:25:10', 0, '', 'Dr. Garcia Perez', '', 'Hospital Militar', '2017-01-26 00:00:00', 150, 40, '', ' CUP', 'Reportado', '', 0, '16 años', '', '2017-01-31 00:00:00', '2017-01-31 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(25, 16, 10, '0000-00-00', '00:00:02', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-03-11 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(26, 16, 9, '0000-00-00', '00:00:02', 0, '', 'Polanco Rubio Alvarez', '', 'Hospital Militar', '2017-03-08 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(27, 19, 7, '2017-03-29', '08:00:00', 0, '', 'Dr. Garcia Perez', '', 'Hospital Militar', NULL, NULL, NULL, '', '', 'Reportado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(28, 16, 11, '2017-03-29', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', '', NULL, NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(29, 16, 9, '2017-03-10', '01:05:45', 1, '', '', '', '', NULL, NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(30, 16, 13, '2017-03-31', '08:00:00', 0, '', '', '', '', NULL, NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-27 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(31, 20, 12, '2017-04-03', '08:00:00', 0, '', '', '', '', NULL, NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-03-28 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(32, 19, 13, '2017-05-01', '08:00:00', 0, '', 'Dr. Garcia Perez', 'gsdgds@dsgsd', 'Gral Calixto Garcia', '2017-04-28 00:00:00', NULL, NULL, 'sdgdsg', '', 'Procesado', 'sdgds', 0, '', 'dsgdsgdg', NULL, '2017-04-28 00:00:00', 'yadier', 1, NULL, NULL, '', 23),
(33, 17, 9, '2017-06-12', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-06-15 00:00:00', NULL, NULL, '', '', 'Administrado', '', 1, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 2, NULL, NULL, 'Administrado', 0),
(34, 22, 10, '2017-06-12', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-06-07 00:00:00', NULL, NULL, '', '', 'Administrado', '', 1, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 2, NULL, NULL, 'Administrado', 0),
(35, 16, 12, '2017-06-12', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', 'Gral Calixto Garcia', '2017-06-07 00:00:00', 2, 2, '', '', 'Administrado', '', 1, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 1, NULL, NULL, 'Administrado', 0),
(36, 21, 12, '2017-06-12', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', 'Gral Calixto Garcia', '2017-06-08 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 2, NULL, NULL, '', 31),
(37, 21, 7, '0000-00-00', '09:25:29', 1, '', 'Polanco Rubio Alvarez', '', 'Hospital Militar', '2017-06-23 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 2, NULL, NULL, '', 0),
(38, 19, 11, '0000-00-00', NULL, 1, '', 'Dr. Garcia Perez', '', 'Gral Calixto Garcia', '2017-06-08 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(39, 21, 10, '0000-00-00', NULL, 1, '', 'Polanco Rubio Alvarez', '', 'Hospital Militar', '2017-05-31 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 2, NULL, NULL, '', 0),
(40, 23, 9, '0000-00-00', NULL, 1, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-06-06 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 1, NULL, NULL, '', 18),
(41, 22, 9, '2017-06-12', '08:00:00', 0, '', 'Dr. Alvarez Martinez', '', 'Hospital Militar', '2017-06-08 00:00:00', NULL, NULL, '', '', 'Creado', '', 0, '', '', NULL, '2017-06-07 00:00:00', 'yadier', 1, NULL, NULL, '', 0),
(42, 23, 13, '1900-12-10', '09:45:24', 1, '', 'Dr. Garcia Perez', '', 'Hospital Militar', '2017-05-31 00:00:00', 23, 43, 'fds', '', 'Preparado', '', 0, '', 'kukk', NULL, '2017-06-07 00:00:00', 'yadier', 1, NULL, NULL, 'Preparado', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_medical_study`
--

CREATE TABLE `cf_medical_study` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `administer_doses_zone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_moneda` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `is_dinamic` enum('Si','No') COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `dosis_sugerida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_medical_study`
--

INSERT INTO `cf_medical_study` (`id`, `name`, `administer_doses_zone`, `price`, `status`, `observation`, `datetime_r`, `username`, `tipo_moneda`, `is_dinamic`, `parent_id`, `dosis_sugerida`) VALUES
(16, 'Estudio del pulmon I', 'brazo', '145', 1, 'r', '2017-02-02 00:00:00', 'yadier', 'CUP', 'No', 0, 0),
(17, 'Estudio Dinamico de Rinnon MEG-3', 'nalga', '25', 1, '', '2017-01-02 00:00:00', 'yadier', 'CUC', 'Si', 0, 0),
(18, 'Estudio del corazon I', 'pecho', '120', 1, '', '2017-01-02 00:00:00', 'yadier', 'CUP', 'No', 0, 0),
(19, 'Estudio del corazon II', 'pecho', '25', 1, '', '2017-01-02 00:00:00', 'yadier', 'CUC', 'No', 18, 0),
(20, 'Gammagraafia osea', 'brazo,pecho,nalga,oreja', '', 1, '', '2017-01-06 00:00:00', 'yadier', 'CUP', 'No', 0, 0),
(21, 'Gammagraafia osea II', 'brazo,pecho,nalga,oreja', '', 1, '', '2017-01-06 00:00:00', 'yadier', 'CUP', 'No', 20, 0),
(22, ' va', 'brazo', '23', 1, '', '2017-02-02 00:00:00', 'yadier', 'CUP', 'Si', 0, 0),
(23, 'LOKO 79', 'pecho,Hombro,pois', '250', 1, 'cfgftgdft', '2017-05-12 00:00:00', 'yadier', 'CUP', 'No', NULL, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_medical_study_cf_types_equipment`
--

CREATE TABLE `cf_medical_study_cf_types_equipment` (
  `cfmedicalstudy_id` int(11) NOT NULL,
  `cftypesequipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_medical_study_cf_types_radiopharmaceutical`
--

CREATE TABLE `cf_medical_study_cf_types_radiopharmaceutical` (
  `cfmedicalstudy_id` int(11) NOT NULL,
  `cftypesradiopharmaceutical_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_municipio`
--

CREATE TABLE `cf_municipio` (
  `id` int(11) NOT NULL,
  `id_cf_provincia` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_municipio`
--

INSERT INTO `cf_municipio` (`id`, `id_cf_provincia`, `nombre`, `code`) VALUES
(1, 1, 'SANDINO', 2101),
(2, 1, 'MANTUA', 2102),
(3, 1, 'MINAS DE MATAHAMBRE', 2103),
(4, 1, 'VINALES', 2104),
(5, 1, 'LA PALMA', 2105),
(6, 1, 'LOS PALACIOS', 2106),
(7, 1, 'CONSOLACION DEL SUR', 2107),
(8, 1, 'PINAR DEL RIO', 2108),
(9, 1, 'SAN LUIS', 2109),
(10, 1, 'SAN JUAN Y MARTINEZ', 2110),
(11, 1, 'GUANE', 2111),
(12, 2, 'BAHIA HONDA', 2201),
(13, 2, 'MARIEL', 2202),
(14, 2, 'GUANAJAY', 2203),
(15, 2, 'CAIMITO', 2204),
(16, 2, 'BAUTA', 2205),
(17, 2, 'SAN ANTONIO DE LOS BANOS', 2206),
(18, 2, 'GUIRA DE MELENA', 2207),
(19, 2, 'ALQUIZAR', 2208),
(20, 2, 'ARTEMISA', 2209),
(21, 2, 'CANDELARIA', 2210),
(22, 2, 'SAN CRISTOBAL', 2211),
(23, 3, 'PLAYA', 2301),
(24, 3, 'PLAZA DE LA REVOLUCION', 2302),
(25, 3, 'CENTRO HABANA', 2303),
(26, 3, 'LA HABANA VIEJA', 2304),
(27, 3, 'REGLA', 2305),
(28, 3, 'LA HABANA DEL ESTE', 2306),
(29, 3, 'GUANABACOA', 2307),
(30, 3, 'SAN MIGUEL DEL PADRON', 2308),
(31, 3, 'DIEZ DE OCTUBRE', 2309),
(32, 3, 'CERRO', 2310),
(33, 3, 'MARIANAO', 2311),
(34, 3, 'LA LISA', 2312),
(35, 3, 'BOYEROS', 2313),
(36, 3, 'ARROYO NARANJO', 2314),
(37, 3, 'COTORRO', 2315),
(38, 4, 'BEJUCAL', 2401),
(39, 4, 'SAN JOSE DE LAS LAJAS', 2402),
(40, 4, 'JARUCO', 2403),
(41, 4, 'SANTA CRUZ DEL NORTE', 2404),
(42, 4, 'MADRUGA', 2405),
(43, 4, 'NUEVA PAZ', 2406),
(44, 4, 'SAN NICOLAS', 2407),
(45, 4, 'GUINES', 2408),
(46, 4, 'MELENA DEL SUR', 2409),
(47, 4, 'BATABANO', 2410),
(48, 4, 'QUIVICAN', 2411),
(49, 5, 'MATANZAS', 2501),
(50, 5, 'CARDENAS ', 2502),
(51, 5, 'MARTI', 2503),
(52, 5, 'COLON', 2504),
(53, 5, 'PERICO', 2505),
(54, 5, 'JOVELLANOS', 2506),
(55, 5, 'PEDRO BETANCOURT', 2507),
(56, 5, 'LIMONAR', 2508),
(57, 5, 'UNION DE REYES', 2509),
(58, 5, 'CIENAGA DE ZAPATA', 2510),
(59, 5, 'JAGUEY GRANDE', 2511),
(60, 5, 'CALIMETE', 2512),
(61, 5, 'LOS ARABOS', 2513),
(62, 6, 'CORRALILLO', 2601),
(63, 6, 'QUEMADO DE GUINES', 2602),
(64, 6, 'SAGUA LA GRANDE', 2603),
(65, 6, 'ENCRUCIJADA', 2604),
(66, 6, 'CAMAJUANI', 2605),
(67, 6, 'CAIBARIEN', 2606),
(68, 6, 'REMEDIOS', 2607),
(69, 6, 'PLACETAS', 2608),
(70, 6, 'SANTA CLARA', 2609),
(71, 6, 'CIFUENTES', 2610),
(72, 6, 'SANTO DOMINGO', 2611),
(73, 6, 'RANCHUELO', 2612),
(74, 6, 'MANICARAGUA', 2613),
(75, 7, 'AGUADA DE PASAJEROS', 2701),
(76, 7, 'RODAS', 2702),
(77, 7, 'PALMIRA', 2703),
(78, 7, 'LAJAS', 2704),
(79, 7, 'CRUCES', 2705),
(80, 7, 'CUMANAYAGUA', 2706),
(81, 7, 'CIENFUEGOS', 2707),
(82, 7, 'ABREUS', 2708),
(83, 8, 'YAGUAJAY', 2801),
(84, 8, 'JATIBONICO', 2802),
(85, 8, 'TAGUASCO', 2803),
(86, 8, 'CABAIGUAN', 2804),
(87, 8, 'FOMENTO', 2805),
(88, 8, 'TRINIDAD', 2806),
(89, 8, 'SANCTI SPIRITUS', 2807),
(90, 8, 'LA SIERPE', 2808),
(91, 9, 'CHAMBAS', 2901),
(92, 9, 'MORON', 2902),
(93, 9, 'BOLIVIA', 2903),
(94, 9, 'PRIMERO DE ENERO', 2904),
(95, 9, 'CIRO REDONDO', 2905),
(96, 9, 'FLORENCIA', 2906),
(97, 9, 'MAJAGUA', 2907),
(98, 9, 'CIEGO DE AVILA', 2908),
(99, 9, 'VENEZUELA', 2909),
(100, 9, 'BARAGUA', 2910),
(101, 10, 'CARLOS MANUEL DE CESPEDES', 3001),
(102, 10, 'ESMERALDA', 3002),
(103, 10, 'SIERRA DE CUBITAS', 3003),
(104, 10, 'MINAS', 3004),
(105, 10, 'NUEVITAS', 3005),
(106, 10, 'GUAIMARO', 3006),
(107, 10, 'SIBANICU', 3007),
(108, 10, 'CAMAGUEY', 3008),
(109, 10, 'FLORIDA', 3009),
(110, 10, 'VERTIENTES', 3010),
(111, 10, 'JIMAGUAYU', 3011),
(112, 10, 'NAJASA', 3012),
(113, 10, 'SANTA CRUZ DEL SUR', 3013),
(114, 11, 'MANATI', 3101),
(115, 11, 'PUERTO PADRE', 3102),
(116, 11, 'JESUS MENENDEZ', 3103),
(117, 11, 'MAJIBACOA', 3104),
(118, 11, 'LAS TUNAS', 3105),
(119, 11, 'JOBABO', 3106),
(120, 11, 'COLOMBIA', 3107),
(121, 11, 'AMANCIO', 3108),
(122, 12, 'GIBARA', 3201),
(123, 12, 'RAFAEL FREYRE', 3202),
(124, 12, 'BANES', 3203),
(125, 12, 'ANTILLA', 3204),
(126, 12, 'BAGUANOS', 3205),
(127, 12, 'HOLGUIN', 3206),
(128, 12, 'CALIXTO GARCIA', 3207),
(129, 12, 'CACOCUM', 3208),
(130, 12, 'URBANO NORIS', 3209),
(131, 12, 'CUETO', 3210),
(132, 12, 'MAYARI', 3211),
(133, 12, 'FRANK PAIS', 3212),
(134, 12, 'SAGUA DE TANAMO', 3213),
(135, 12, 'MOA', 3214),
(136, 13, 'RIO CAUTO', 3301),
(137, 13, 'CAUTO CRISTO', 3302),
(138, 13, 'JIGUANI', 3303),
(139, 13, 'BAYAMO', 3304),
(140, 13, 'YARA', 3305),
(141, 13, 'MANZANILLO', 3306),
(142, 13, 'CAMPECHUELA', 3307),
(143, 13, 'MEDIA LUNA', 3308),
(144, 13, 'NIQUERO', 3309),
(145, 13, 'PILON', 3310),
(146, 13, 'BARTOLOME MASO', 3311),
(147, 13, 'BUEY ARRIBA', 3312),
(148, 13, 'GUISA', 3313),
(149, 14, 'CONTRAMAESTRE', 3401),
(150, 14, 'MELLA', 3402),
(151, 14, 'SAN LUIS', 3403),
(152, 14, 'SEGUNDO FRENTE', 3404),
(153, 14, 'SONGO - LA MAYA', 3405),
(154, 14, 'SANTIAGO DE CUBA', 3406),
(155, 14, 'PALMA SORIANO', 3407),
(156, 14, 'TERCER FRENTE', 3408),
(157, 14, 'GUAMA', 3409),
(158, 15, 'EL SALVADOR', 3501),
(159, 15, 'MANUEL TAMES', 3502),
(160, 15, 'YATERAS', 3503),
(161, 15, 'BARACOA', 3504),
(162, 15, 'MAISI', 3505),
(163, 15, 'IMIAS', 3506),
(164, 15, 'SAN ANTONIO DEL SUR', 3507),
(165, 15, 'CAIMANERA', 3508),
(166, 15, 'GUANTANAMO', 3509),
(167, 15, 'NICETO PEREZ', 3510),
(168, 16, 'ISLA DE LA JUVENTUD', 4001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_nombre_con_estudio`
--

CREATE TABLE `cf_nombre_con_estudio` (
  `id` int(11) NOT NULL,
  `id_cf_medical_study` int(11) NOT NULL,
  `id_cf_nombre_radiofarmaco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_nombre_con_estudio`
--

INSERT INTO `cf_nombre_con_estudio` (`id`, `id_cf_medical_study`, `id_cf_nombre_radiofarmaco`) VALUES
(17, 16, 10),
(18, 17, 10),
(19, 18, 10),
(20, 19, 10),
(21, 22, 10),
(22, 23, 10),
(23, 23, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_nombre_hospitales`
--

CREATE TABLE `cf_nombre_hospitales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_nombre_hospitales`
--

INSERT INTO `cf_nombre_hospitales` (`id`, `nombre`, `municipio_id`, `direccion`) VALUES
(1, 'Hospital Militar', 34, 'dgf'),
(2, 'Gral Calixto Garcia', 24, 'dfrgdh'),
(6, 'Julio Trigo', 25, 'ave 86');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_nombre_liofilizado`
--

CREATE TABLE `cf_nombre_liofilizado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_nombre_liofilizado`
--

INSERT INTO `cf_nombre_liofilizado` (`id`, `nombre`) VALUES
(1, 'Pirofosfato'),
(2, 'MIBI'),
(3, 'DMSA\r\n'),
(4, 'MAG3'),
(5, 'MDP'),
(6, 'DTPA'),
(7, 'HMPAO'),
(8, 'ECD'),
(9, 'Elucion al Vacio'),
(10, 'Elucion NaCl 0.9%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_nombre_medicos`
--

CREATE TABLE `cf_nombre_medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_nombre_medicos`
--

INSERT INTO `cf_nombre_medicos` (`id`, `nombre`, `email`) VALUES
(1, 'Dr. Alvarez Martinez', '1edj'),
(2, 'Dr. Garcia Perez', '1'),
(3, 'Polanco Rubio Alvarez', 'platt@infomed.cu'),
(4, 'Tee', 'tee@nau.d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_nombre_radiofarmaco`
--

CREATE TABLE `cf_nombre_radiofarmaco` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_nombre_radiofarmaco`
--

INSERT INTO `cf_nombre_radiofarmaco` (`id`, `nombre`) VALUES
(1, 'F-18 FDG'),
(2, 'Tc-99m DMSA'),
(3, 'Tc-99m Pertechnetate'),
(4, 'Tc-99m MAA'),
(5, 'Tc-99m MDP'),
(6, 'Tc-99m MIBI (exercise)'),
(7, 'Tc-99m Tetrofosmin (exercise)'),
(8, '---List of all exams---'),
(9, 'H-3 Glucose'),
(10, 'C-14 Urea, Normal'),
(11, 'Co-57 Cyanocobalamin'),
(12, 'Cr-51 Sodium Chromate RBCs'),
(13, 'F-18 FDG'),
(14, 'F-18 Sodium Flouride'),
(15, 'Ga-67'),
(16, 'I-123 Hippuran'),
(17, 'I-123 Ioflupane (DaTscan)'),
(18, 'I-123 MIBG'),
(19, 'I-123 NaI (0%) (thyroid cancer)'),
(20, 'I-123 NaI (25%)'),
(21, 'I-125 albumin'),
(22, 'I-131 hippuran'),
(23, 'I-131 MIBG'),
(24, 'I-131 NaI (0%) (thyroid cancer)'),
(25, 'I-131 NaI (25%)'),
(26, 'In-111 Octreoscan'),
(27, 'In-111 WBC'),
(28, 'Kr-81m Gas'),
(29, 'N-13 Ammonia'),
(30, 'O-15 water'),
(31, 'P-32 Phosphate (IV)'),
(32, 'Rb-82'),
(33, 'Tc-99m Neotect'),
(34, 'Tc-99m Disofenin/Mebrofenin'),
(35, 'Tc-99m DMSA'),
(36, 'Tc-99m DTPA (IV)'),
(37, 'Tc-99m HMPAO'),
(38, 'Tc-99m Glucoheptonate'),
(39, 'Tc-99m MAA'),
(40, 'Tc-99m MDP'),
(41, 'Tc-99m MAG3'),
(42, 'Tc-99m ECD (Neurolite)'),
(43, 'Tc-99m DTPA (inhalation)'),
(44, 'Tc-99m Pyrophosphate'),
(45, 'Tc-99m RBCs'),
(46, 'Tc-99m MIBI (exercise)'),
(47, 'Tc-99m MIBI (resting)'),
(48, 'Tc-99m Pertechnetate'),
(49, 'Tc-99m Sulfur Colloid (IV)'),
(50, 'Tc-99m Sulfur Colloid (oral)'),
(51, 'Tc-99m Technegas'),
(52, 'Tc-99m Tetrofosmin (exercise)'),
(53, 'Tc-99m Tetrofosmin (resting)'),
(54, 'Tc-99m WBCs'),
(55, 'Tl-201 TlCl'),
(56, 'Xe-133 Gas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_patient`
--

CREATE TABLE `cf_patient` (
  `id` int(11) NOT NULL,
  `cf_media_id` int(11) DEFAULT NULL,
  `personal_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `up_date` date DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `medical_record_id` int(11) DEFAULT NULL,
  `medical_record` longtext COLLATE utf8_unicode_ci,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notification_email` smallint(6) NOT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `nationality` longtext COLLATE utf8_unicode_ci,
  `town` longtext COLLATE utf8_unicode_ci,
  `region` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_patient`
--

INSERT INTO `cf_patient` (`id`, `cf_media_id`, `personal_id`, `firstname`, `lastname`, `photo`, `up_date`, `date_birth`, `medical_record_id`, `medical_record`, `email`, `notification_email`, `telephone`, `sex`, `status`, `observation`, `nationality`, `town`, `region`, `datetime_r`, `username`) VALUES
(7, NULL, '121448784587', 'Paciente', 'Gonzalez', 'docs-patient/Animal7/121448784587.jpg', '2017-02-02', '2000-09-08', 2124870, 'Paciente con asma', 'paciente@nauta.cu', 1, '454578', 'M', 1, 'nigunad', 'CUB', '9', 'GUAMA', '2016-09-27 22:00:43', 'yadier'),
(9, NULL, '87051220145', 'Fernanda', 'Rodriguez', 'docs-patient/tyer5634yd9/32535236523.jpg', '2017-01-02', '1987-09-09', 3523, 'Ninguna enfermedad', 'rodrigo@etecsa.cu', 1, '345325326', 'F', 1, 'saludable', 'CUB', '7', 'CIENFUEGOS', '2016-09-13 08:10:00', 'yadier'),
(10, NULL, '42341251325', 'Elian', 'Andres', 'docs-patient/Elian10/42341251325.jpg', '2017-01-02', '1980-09-08', 23435, 'Nada que sennalar', 'ferna@cujae', 1, '', 'M', 1, 'ninguna', 'CUB', '14', 'PALMA SORIANO', '2016-09-27 22:00:43', 'yadier'),
(11, NULL, '87051220145', 'Pacienta', 'De Prueba', 'docs-patient/Paciente 11/87051220145.jpg', '2017-01-02', '2000-02-03', 1520, 'HI45', 'edfsd@efwf', 0, '54545', 'F', 1, 'Nada\r\n', 'CUB', '11', 'JOBABO', '0000-00-00 00:00:00', 'yadier'),
(12, NULL, '90051601223', 'Alexandro', 'Martinez', 'docs-patient/Alexandro12/90051601223.jpg', '2017-01-02', '1990-05-16', 4578, 'Problemas en los riñones', '', 0, '', 'M', 1, 'doble bolsa en riñon izquierdo', 'CUB', '6', 'SANTO DOMINGO', '0000-00-00 00:00:00', 'yadier'),
(13, NULL, '20245557788', 'Samantha', 'Jules Garcia', 'docs-patient/Samantha13/20245557788.jpg', '2017-01-06', '2010-02-12', 45875, 'Paciente con asma', '', 0, '', 'F', 1, 'alergica', 'CUB', '16', 'ISLA DE LA JUVENTUD', '0000-00-00 00:00:00', 'yadier'),
(14, NULL, '01445587666', 'Brenda', 'Perez', 'docs-patient/Brenda14/01445587666.jpg', '2017-01-31', '2001-01-05', 2540, '', '', 0, '', 'F', 1, '', 'CUB', '16', 'ISLA DE LA JUVENTUD', '0000-00-00 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_phases_medical_consultation`
--

CREATE TABLE `cf_phases_medical_consultation` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) NOT NULL,
  `cf_process_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cf_process_section_id` int(11) NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_planificacion_dias`
--

CREATE TABLE `cf_planificacion_dias` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_cf_med_study` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_planificacion_dias`
--

INSERT INTO `cf_planificacion_dias` (`id`, `day`, `quantity`, `id_cf_med_study`) VALUES
(1, 0, 12, 6),
(2, 2, 12, 6),
(3, 4, 5, 6),
(4, 0, 4, 7),
(5, 2, 4, 7),
(6, 4, 4, 7),
(7, 6, 3, 7),
(8, 1, 5, 8),
(9, 3, 5, 8),
(10, 5, 10, 8),
(19, 0, 2, 11),
(20, 1, 5, 11),
(21, 2, 5, 11),
(22, 3, 6, 11),
(23, 4, 5, 11),
(24, 5, 5, 11),
(25, 1, 3, 12),
(26, 2, 3, 12),
(27, 4, 2, 12),
(28, 5, 5, 12),
(29, 0, 4, 13),
(30, 2, 5, 13),
(31, 4, 10, 13),
(32, 0, 5, 14),
(33, 2, 12, 14),
(34, 3, 4, 14),
(35, 4, 4, 14),
(36, 0, 2, 15),
(37, 1, 2, 15),
(38, 2, 2, 15),
(39, 3, 2, 15),
(40, 4, 4, 15),
(41, 0, 8, 16),
(42, 2, 8, 16),
(43, 4, 8, 16),
(44, 0, 5, 17),
(45, 2, 5, 17),
(46, 3, 5, 17),
(47, 4, 5, 17),
(48, 0, 5, 18),
(49, 1, 5, 18),
(50, 2, 5, 18),
(51, 0, 5, 19),
(52, 1, 5, 19),
(53, 2, 5, 19),
(54, 3, 5, 19),
(55, 4, 5, 19),
(56, 0, 14, 20),
(57, 2, 10, 20),
(58, 3, 12, 20),
(59, 0, 14, 21),
(60, 2, 10, 21),
(61, 3, 12, 21),
(62, 0, 4, 22),
(63, 1, 4, 22),
(64, 1, 45, 23),
(65, 4, 8, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_planificacion_procesos`
--

CREATE TABLE `cf_planificacion_procesos` (
  `id` int(11) NOT NULL,
  `id_cf_cod_proceso` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `id_cf_med_study` int(11) NOT NULL,
  `orden_proceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_planificacion_procesos`
--

INSERT INTO `cf_planificacion_procesos` (`id`, `id_cf_cod_proceso`, `dias`, `id_cf_med_study`, `orden_proceso`) VALUES
(46, 1, 1, 16, 0),
(47, 3, 1, 16, 1),
(48, 5, 1, 16, 2),
(49, 6, 1, 16, 3),
(50, 3, 1, 17, 0),
(51, 1, 1, 17, 1),
(52, 4, 1, 17, 2),
(53, 1, 1, 18, 0),
(54, 2, 1, 18, 1),
(55, 3, 1, 18, 2),
(56, 5, 1, 18, 3),
(57, 2, 1, 19, 0),
(58, 3, 1, 19, 1),
(59, 4, 1, 19, 2),
(60, 5, 1, 19, 3),
(61, 6, 1, 19, 4),
(62, 1, 1, 20, 0),
(63, 1, 1, 21, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_prepare_doses`
--

CREATE TABLE `cf_prepare_doses` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `cf_radiopharmaceutical_id` int(11) DEFAULT NULL,
  `cf_generator_id` int(11) DEFAULT NULL,
  `load_doses` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_prepare_doses`
--

INSERT INTO `cf_prepare_doses` (`id`, `cf_medical_consultation_id`, `cf_radiopharmaceutical_id`, `cf_generator_id`, `load_doses`, `volume`, `specialist`, `observation`, `status`, `causes`, `username`, `datetime_w`, `datetime_r`) VALUES
(1, 18, 6, 3, 12, 15, '1', '', '1', '', '', '2017-01-03 01:03:39', '2017-01-02 18:03:39'),
(2, 17, 6, 3, 14, 13, '1', '', '1', '', '', '2017-01-04 18:55:47', '2017-01-04 11:55:47'),
(3, 21, 6, 3, 25, 15, '1', 'ok', '1', '', '', '2017-01-06 17:41:45', '2017-01-06 10:41:45'),
(4, 22, 6, 3, 15, 12, '1', '', '1', '', '', '2017-01-06 17:48:27', '2017-01-06 10:48:27'),
(5, 23, 7, 3, 12, 2, '', 'bien ahora', '1', '', '', '2017-01-06 18:06:20', '2017-01-06 11:06:20'),
(6, 24, 6, 3, 15, 4, '', 'nada x ahora', '1', '', '', '2017-01-31 20:49:04', '2017-01-31 13:49:04'),
(7, 32, 6, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_processing`
--

CREATE TABLE `cf_processing` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `images` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_processing`
--

INSERT INTO `cf_processing` (`id`, `cf_medical_consultation_id`, `specialist`, `images`, `observation`, `datetime_w`, `datetime_r`, `username`, `status`, `causes`) VALUES
(9, 5, '1', NULL, 'ewtwer ertygrey', '2016-12-22 00:00:00', '2016-12-22 00:00:00', 'yadier', '1', 'reyerywrtrt'),
(10, 1, '1', NULL, 'dgfh', '2016-12-22 00:00:00', '2016-12-22 00:00:00', 'yadier', '1', 'fdhdfh'),
(11, 3, '1', NULL, 'dfgfd', '2016-12-22 00:00:00', '2016-12-22 00:00:00', 'yadier', '1', 'dfhdfh'),
(12, 8, '1', NULL, 'wtetwe', '2016-12-23 00:00:00', '2016-12-23 00:00:00', 'yadier', '1', 'eryery'),
(13, 1, '1', NULL, 'dfsd', '2016-12-23 00:00:00', '2016-12-23 00:00:00', 'yadier', '1', ''),
(14, 8, '1', NULL, 'sdfdfdsf', '2016-12-28 00:00:00', '2016-12-28 00:00:00', 'yadier', '1', ''),
(15, 8, '1', NULL, 'sdfdfdsf', '2016-12-28 00:00:00', '2016-12-28 00:00:00', 'yadier', '1', ''),
(16, 8, '1', NULL, 'sdfdfdsf', '2016-12-28 00:00:00', '2016-12-28 00:00:00', 'yadier', '1', ''),
(17, 8, '1', NULL, 'sdfdfdsf', '2016-12-28 00:00:00', '2016-12-28 00:00:00', 'yadier', '1', ''),
(18, 16, '1', NULL, 'dfasfsgfhfb afsdfasf ', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(19, 4, '1', NULL, 'fsdg', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(20, 3, '1', NULL, 'jkljkl', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(21, 1, '1', NULL, 'dfgsdg', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(22, 8, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(23, 5, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(27, 4, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(28, 9, '1', NULL, 'sdf', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(32, 12, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(33, 13, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(34, 13, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(35, 12, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(36, 3, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(37, 1, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(38, 10, '1', NULL, '', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'yadier', '1', ''),
(39, 18, '2', NULL, 'Imagen Nitida Pulmon OK', '2017-01-03 00:00:00', '2017-01-03 00:00:00', 'yadier', '1', ''),
(40, 17, '2', NULL, 'Los pulmones se ven limpios', '2017-01-04 00:00:00', '2017-01-04 00:00:00', 'yadier', '1', ''),
(41, 21, '1', NULL, 'Se termino', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'yadier', '1', ''),
(42, 22, '1', NULL, 'artritis', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'yadier', '1', ''),
(43, 23, '1', NULL, 'Buen estudio', '2017-01-06 00:00:00', '2017-01-06 00:00:00', 'yadier', '1', ''),
(44, 24, '2', NULL, 'OK', '2017-01-31 00:00:00', '2017-01-31 00:00:00', 'yadier', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_provincias`
--

CREATE TABLE `cf_provincias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_provincias`
--

INSERT INTO `cf_provincias` (`id`, `nombre`) VALUES
(1, 'PINAR DEL RIO'),
(2, 'ARTEMISA'),
(3, 'LA HABANA'),
(4, 'MAYABEQUE'),
(5, 'MATANZAS'),
(6, 'VILLA CLARA'),
(7, 'CIENFUEGOS'),
(8, 'SANCTI SPIRITUS'),
(9, 'CIEGO DE AVILA'),
(10, 'CAMAGUEY'),
(11, 'LAS TUNAS'),
(12, 'HOLGUIN'),
(13, 'GRANMA'),
(14, 'SANTIAGO DE CUBA'),
(15, 'GUANTANAMO'),
(16, 'ISLA DE LA JUVENTUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_radiopharmaceutical`
--

CREATE TABLE `cf_radiopharmaceutical` (
  `id` int(11) NOT NULL,
  `cf_types_radiopharmaceutical_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marcage_datetime` datetime DEFAULT NULL,
  `marcage_activity` double DEFAULT NULL,
  `marcage_volumen` double DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lote_utilizado` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `volumen_final` float NOT NULL,
  `fecha_hora_calidad` datetime DEFAULT NULL,
  `percent_marcaje` float DEFAULT NULL,
  `ph` float DEFAULT NULL,
  `aspecto_organoleptico` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_radiopharmaceutical`
--

INSERT INTO `cf_radiopharmaceutical` (`id`, `cf_types_radiopharmaceutical_id`, `name`, `marcage_datetime`, `marcage_activity`, `marcage_volumen`, `specialist`, `status`, `observation`, `lote_utilizado`, `volumen_final`, `fecha_hora_calidad`, `percent_marcaje`, `ph`, `aspecto_organoleptico`) VALUES
(6, 8, '10', '2017-02-02 11:02:13', 257, 32, '1', 1, 'sf', '1504', 45, '2017-02-02 11:02:13', NULL, NULL, ''),
(7, 6, '10', '2017-01-02 13:04:08', 40, 20, '1', 1, '', '1503', 18, '2017-01-02 13:04:08', 98, 4, 'limpido'),
(8, 10, '10', '2017-01-04 12:05:54', 13, 14, '1', 1, '', '5842', 15, '2017-01-04 12:05:54', NULL, NULL, ''),
(9, 6, '10', '2017-02-02 10:19:37', 34, 43, '1', 1, '', '1503', 43, '2017-02-02 10:19:37', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_reception`
--

CREATE TABLE `cf_reception` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `size` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_reception`
--

INSERT INTO `cf_reception` (`id`, `cf_medical_consultation_id`, `size`, `weight`, `specialist`, `observation`, `status`, `causes`, `username`, `datetime_w`, `datetime_r`) VALUES
(1, 1, 15, 200, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(2, 8, 15, 120, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(3, 5, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(4, 3, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(5, 2, 15, 120, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(6, 4, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(7, 9, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(8, 12, 15, 120, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(9, 13, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00'),
(10, 14, 15, 100, 'fgjgjgfj', 'fgjfgjfg gfjfgj', 'fgjgfjgfjgfj', 'fgjgfjgfjgjgf', 'fgjgfjgfj', '2016-12-21 00:00:00', '2016-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_refrigeradores`
--

CREATE TABLE `cf_refrigeradores` (
  `id` int(16) NOT NULL,
  `Temperatura_refrigerador` varchar(200) NOT NULL,
  `fecha_refrigerador` datetime NOT NULL,
  `temperatura_congelador` varchar(200) NOT NULL,
  `fecha_congelador` datetime NOT NULL,
  `temperatura_freezer` varchar(200) NOT NULL,
  `fecha_freezer` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cf_refrigeradores`
--

INSERT INTO `cf_refrigeradores` (`id`, `Temperatura_refrigerador`, `fecha_refrigerador`, `temperatura_congelador`, `fecha_congelador`, `temperatura_freezer`, `fecha_freezer`) VALUES
(1, '303', '2017-01-06 00:00:00', '152', '2017-01-06 00:00:00', '20', '2017-01-06 00:00:00'),
(2, '34', '2017-03-23 00:00:00', '12', '2017-03-23 00:00:00', '2', '2017-03-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_report`
--

CREATE TABLE `cf_report` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `images_selected` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pre_document` longtext COLLATE utf8_unicode_ci,
  `document` longtext COLLATE utf8_unicode_ci,
  `post_document` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `causes` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_report`
--

INSERT INTO `cf_report` (`id`, `cf_medical_consultation_id`, `specialist`, `images_selected`, `pre_document`, `document`, `post_document`, `observation`, `username`, `datetime_w`, `datetime_r`, `status`, `causes`) VALUES
(1, 3, '1', NULL, '', '', 'Ing Yadier', 'retertery', 'yadier', '2016-12-23 00:00:00', '2016-12-22 00:00:00', '1', 'yeryery'),
(2, 1, '1', NULL, '', '<h4>Centro de Investigaciones Clinicas</h4></br>                telefonos 2027055 2023763</br>                <h3>Informe Medico:</h3></br>                <ul>                    <li>Nombre y apellidos: <span>Paciente: Animal Extremo</span></li>                    <li>Centro de Procedencia:<span>Hospital: asfasfasf</span></li>                    <li><label style=''font-variant: all-petite-caps''>Numero de Estudio</label>                        <span>HC: 2124870</span>                    </li>                    <li>Fecha de Estudio: 2016-12-06</li>                    <li>Tipo de estudio: estudio del corazon uno</li>                    <li>Radiofarmaco empleado: estudio del corazon uno</li>                </ul>                <div class=''panel''>                    Resultado:        <span>            { ;}        </span>', 'Ing Dr ALvarez', 'Cadenas', 'yadier', '2016-12-23 00:00:00', '2016-12-15 00:00:00', '1', 'Lesionesss '),
(3, 17, NULL, NULL, '$predocument', 'Los pulmones se ven limpios', 'todo bien', '', 'yadier', '2017-01-04 00:00:00', '2017-01-04 00:00:00', '1', ''),
(4, 18, NULL, NULL, '$predocument', 'Imagen Nitida Pulmon OK', 'Preparado para entregar', '', 'yadier', '2017-01-04 00:00:00', '2017-01-04 00:00:00', '1', ''),
(5, 24, NULL, NULL, '$predocument', 'OK', 'ESTO ESTA ESCAPAO', '', 'yadier', '2017-01-31 00:00:00', '2017-01-31 00:00:00', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_report_templates`
--

CREATE TABLE `cf_report_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `template_pre_document` longtext COLLATE utf8_unicode_ci,
  `template_document` longtext COLLATE utf8_unicode_ci,
  `template_post_document` longtext COLLATE utf8_unicode_ci,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_settings`
--

CREATE TABLE `cf_settings` (
  `id` int(11) NOT NULL,
  `parameter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_submit`
--

CREATE TABLE `cf_submit` (
  `id` int(11) NOT NULL,
  `cf_medical_consultation_id` int(11) DEFAULT NULL,
  `applicant_makes_referral_data` longtext COLLATE utf8_unicode_ci,
  `observation` longtext COLLATE utf8_unicode_ci,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci,
  `causes` longtext COLLATE utf8_unicode_ci,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datetime_w` datetime NOT NULL,
  `datetime_r` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_types_equipment`
--

CREATE TABLE `cf_types_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_types_equipment`
--

INSERT INTO `cf_types_equipment` (`id`, `name`, `status`, `observation`, `datetime_r`, `username`) VALUES
(2, 'Equipo de Imagenes Radiograficas', 1, 'sdf', '0000-00-00 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_types_radiopharmaceutical`
--

CREATE TABLE `cf_types_radiopharmaceutical` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `batch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `internal_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `production_company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `production_datetime` datetime NOT NULL,
  `expiration_datetime` datetime NOT NULL,
  `reception_datetime` datetime NOT NULL,
  `count` smallint(6) NOT NULL,
  `used_count` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_types_radiopharmaceutical`
--

INSERT INTO `cf_types_radiopharmaceutical` (`id`, `name`, `batch`, `internal_code`, `production_company`, `production_datetime`, `expiration_datetime`, `reception_datetime`, `count`, `used_count`, `status`, `observation`, `datetime_r`, `username`) VALUES
(6, 'DMSA\r\n', '1503', '2101', 'CENTIS', '2016-12-28 02:20:00', '2017-01-04 09:20:00', '2017-01-01 23:20:00', 150, 0, 1, 'dg', '2017-02-02 00:00:00', 'yadier'),
(7, 'MAG3', '1502', '2100', 'CENTIS', '2017-01-01 23:23:00', '2017-01-08 23:20:00', '2017-01-01 23:23:00', 120, 0, 1, '', '2017-01-02 00:00:00', 'yadier'),
(8, 'Elucion al Vacio', '1504', '2102', 'CENTIS', '2016-12-31 10:25:00', '2017-01-07 14:25:00', '2017-01-01 23:26:00', 40, 0, 1, '', '2017-01-02 00:00:00', 'yadier'),
(9, 'Elucion NaCl 0.9%', '1505', '2104', 'CENTIS', '2016-12-30 10:25:00', '2017-01-06 10:25:00', '2017-01-01 23:25:00', 170, 0, 1, '', '2017-01-02 00:00:00', 'yadier'),
(10, 'Pirofosfato', '5842', '78936', 'CENTIS', '2017-01-05 13:25:00', '2017-01-04 05:25:00', '2017-01-03 13:00:00', 150, 0, 1, 'Todo bien', '2017-01-04 00:00:00', 'yadier'),
(11, 'Pirofosfatoj', 'g', 'd', 'CENTIS', '2017-02-03 06:30:00', '2017-02-01 05:25:00', '2017-02-03 06:30:00', 3, 0, 1, '', '2017-02-02 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cf_worker`
--

CREATE TABLE `cf_worker` (
  `id` int(11) NOT NULL,
  `fos_user_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `personal_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `sex` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_toe` smallint(6) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `nationality` longtext COLLATE utf8_unicode_ci,
  `town` longtext COLLATE utf8_unicode_ci,
  `region` longtext COLLATE utf8_unicode_ci,
  `datetime_r` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cf_worker`
--

INSERT INTO `cf_worker` (`id`, `fos_user_id`, `firstname`, `lastname`, `personal_id`, `entity_id`, `photo`, `date_birth`, `sex`, `status`, `user_id`, `email`, `telephone`, `is_toe`, `category`, `observation`, `nationality`, `town`, `region`, `datetime_r`, `username`) VALUES
(1, 591, 'Empleado ', 'Publico', '214124', '4124124', NULL, '2014-09-08', 1, 1, NULL, '', '', 1, 'Doctor', 'hk', 'CUB', '1', NULL, '0000-00-00 00:00:00', 'yadier'),
(2, NULL, 'Abel', 'Perez Perez', '1', '1', 'docs-worker/Abel2/Abel2.jpg', '1987-02-11', 0, 1, 591, 'abel@nauta.cu', '', 0, 'Doctor', '', 'CUB', '3', 'PLAZA DE LA REVOLUCION', '0000-00-00 00:00:00', 'yadier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores_dosis_radiofarmaco`
--

CREATE TABLE `factores_dosis_radiofarmaco` (
  `id` int(11) NOT NULL,
  `organo_critico` varchar(250) NOT NULL,
  `id_radiofarmaco` int(11) NOT NULL,
  `dosis_efectiva_0a2` float NOT NULL,
  `dosis_efectiva_3a7` float NOT NULL,
  `dosis_efectiva_8a12` float NOT NULL,
  `dosis_efectiva_13a18` float NOT NULL,
  `dosis_efectiva_hombre` float NOT NULL,
  `dosis_efectiva_mujer` float NOT NULL,
  `dosis_org_crit_0a2` float NOT NULL,
  `dosis_org_crit_3a7` float NOT NULL,
  `dosis_org_crit_8a12` float NOT NULL,
  `dosis_org_crit_13a18` float NOT NULL,
  `dosis_org_crit_hombre` float NOT NULL,
  `dosis_org_crit_mujer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factores_dosis_radiofarmaco`
--

INSERT INTO `factores_dosis_radiofarmaco` (`id`, `organo_critico`, `id_radiofarmaco`, `dosis_efectiva_0a2`, `dosis_efectiva_3a7`, `dosis_efectiva_8a12`, `dosis_efectiva_13a18`, `dosis_efectiva_hombre`, `dosis_efectiva_mujer`, `dosis_org_crit_0a2`, `dosis_org_crit_3a7`, `dosis_org_crit_8a12`, `dosis_org_crit_13a18`, `dosis_org_crit_hombre`, `dosis_org_crit_mujer`) VALUES
(1, 'Bladder', 1, 0.019, 0.024, 0.024, 0.037, 0.056, 0.095, 0.13, 0.16, 0.16, 0.25, 0.34, 0.47),
(2, 'Kidneys', 2, 0.0088, 0.011, 0.011, 0.015, 0.021, 0.037, 0.18, 0.18, 0.22, 0.3, 0.43, 0.76),
(3, 'Upper large intestine', 3, 0.013, 0.017, 0.017, 0.026, 0.042, 0.079, 0.057, 0.073, 0.073, 0.12, 0.2, 0.38),
(4, 'Lungs', 4, 0.011, 0.016, 0.016, 0.023, 0.034, 0.063, 0.066, 0.097, 0.097, 0.13, 0.2, 0.39),
(5, 'Bone surfaces', 5, 0.0057, 0.007, 0.007, 0.011, 0.014, 0.027, 0.063, 0.082, 0.082, 0.13, 0.22, 0.53),
(6, 'Gallbladder', 6, 0.0079, 0.01, 0.01, 0.016, 0.023, 0.045, 0.033, 0.038, 0.038, 0.049, 0.086, 0.26),
(7, 'Gallbladder', 7, 0.007, 0.0082, 0.0082, 0.012, 0.018, 0.035, 0.027, 0.031, 0.031, 0.041, 0.072, 0.23),
(8, '0', 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Bladder', 9, 0.015, 0.0195, 0.0195, 0.0332, 0.0556, 0.113, 0.024, 0.031, 0.0315, 0.052, 0.0857, 0.173),
(10, 'Bladder', 10, 0.026, 0.033, 0.033, 0.056, 0.094, 0.19, 0.12, 0.16, 0.16, 0.25, 0.41, 0.81),
(11, 'Liver', 11, 5.8, 7.3, 7.3, 11, 16, 28, 51, 64, 64, 94, 140, 250),
(12, 'Spleen', 12, 0.26, 0.33, 0.33, 0.52, 0.8, 1.5, 1.6, 2.1, 2.1, 3.3, 5.1, 9.3),
(13, 'Bladder', 13, 0.019, 0.024, 0.024, 0.037, 0.056, 0.095, 0.13, 0.16, 0.16, 0.25, 0.34, 0.47),
(14, 'Bladder wall', 14, 0.027, 0.034, 0.034, 0.052, 0.086, 0.17, 0.22, 0.27, 0.27, 0.4, 0.61, 1.1),
(15, 'Bone surfaces', 15, 0.1, 0.13, 0.13, 0.2, 0.33, 0.64, 0.63, 0.81, 0.81, 1.3, 2.2, 5.2),
(16, 'Bladder', 16, 0.012, 0.015, 0.015, 0.019, 0.019, 0.034, 0.19, 0.24, 0.24, 0.3, 0.28, 0.51),
(17, 'Bladder wall', 17, 0.024, 0, 0, 0, 0, 0, 0.054, 0, 0, 0, 0, 0),
(18, 'Liver', 18, 0.013, 0.017, 0.017, 0.026, 0.037, 0.068, 0.067, 0.087, 0.087, 0.13, 0.18, 0.33),
(19, 'Bladder wall', 19, 0.013, 0.016, 0.016, 0.024, 0.037, 0.067, 0.09, 0.11, 0.11, 0.16, 0.24, 0.45),
(20, 'Thyroid', 20, 0.11, 0.17, 0.17, 0.26, 0.54, 1, 3.2, 5, 5, 7.5, 16, 31),
(21, 'Heart', 21, 0.34, 0.41, 0.41, 0.68, 1.1, 2.2, 0.69, 0.8, 0.8, 1.3, 2, 3.8),
(22, 'Bladder', 22, 0.066, 0.083, 0.083, 0.13, 0.19, 0.37, 0.96, 1.2, 1.2, 1.8, 2.8, 5.4),
(23, 'Liver', 23, 0.2, 0.26, 0.26, 0.4, 0.61, 1.1, 0.83, 1.1, 1.1, 1.6, 2.4, 4.6),
(24, 'Bladder wall', 24, 0.072, 0.088, 0.088, 0.14, 0.21, 0.4, 0.61, 0.75, 0.75, 1.1, 1.8, 3.4),
(25, 'Thyroid', 25, 11, 17, 17, 25, 56, 100, 360, 560, 560, 840, 1900, 3400),
(26, 'Spleen', 26, 0.054, 0.071, 0.071, 0.1, 0.16, 0.28, 0.57, 0.79, 0.79, 1.2, 1.8, 3.1),
(27, 'Spleen', 27, 0.59, 0.79, 0.79, 1.2, 1.8, 3.2, 5.5, 7.6, 7.6, 11, 17, 30),
(28, 'Lungs', 28, 0.087, 0.11, 0.11, 0.16, 0.24, 0.42, 0.00021, 0.00031, 0.00031, 0.00044, 0.00068, 0.0013),
(29, 'Bladder wall', 29, 0.0027, 0.0032, 0.0032, 0.0049, 0.0077, 0.015, 0.0081, 0.0099, 0.0099, 0.015, 0.024, 0.043),
(30, 'Heart', 30, 0.00093, 0.0014, 0.0014, 0.0023, 0.0038, 0.0077, 0.0019, 0.0024, 0.0024, 0.0038, 0.0062, 0.012),
(31, 'Bone surface', 31, 2.2, 3, 3, 5.1, 10, 22, 11, 14, 14, 26, 58, 120),
(32, 'Kidneys', 32, 0.0012, 0.0016, 0.0016, 0.0039, 0.0061, 0.011, 0.0093, 0.011, 0.011, 0.016, 0.024, 0.056),
(33, 'Kidneys', 33, 0.00763, 0.0091, 0.0102, 0.0149, 0.0229, 0.0428, 0.0429, 0.0469, 0.0512, 0.0711, 0.141, 0.263),
(34, 'Gallbladder', 34, 0.017, 0.021, 0.021, 0.029, 0.045, 0.1, 0.11, 0.12, 0.12, 0.18, 0.29, 0.95),
(35, 'Kidneys', 35, 0.0088, 0.011, 0.011, 0.015, 0.021, 0.037, 0.18, 0.18, 0.22, 0.3, 0.43, 0.76),
(36, 'Bladder wall', 36, 0.0049, 0.0062, 0.0062, 0.0082, 0.009, 0.016, 0.062, 0.078, 0.078, 0.097, 0.095, 0.17),
(37, 'Kidneys', 37, 0.0093, 0.011, 0.011, 0.017, 0.027, 0.049, 0.034, 0.042, 0.042, 0.063, 0.14, 0.26),
(38, 'Bladder', 38, 0.009, 0.011, 0.011, 0.016, 0.024, 0.042, 0.056, 0.069, 0.069, 0.1, 0.15, 0.27),
(39, 'Lungs', 39, 0.011, 0.016, 0.016, 0.023, 0.034, 0.063, 0.066, 0.097, 0.097, 0.13, 0.2, 0.39),
(40, 'Bone surfaces', 40, 0.0057, 0.007, 0.007, 0.011, 0.014, 0.027, 0.063, 0.082, 0.082, 0.13, 0.22, 0.53),
(41, 'Bladder', 41, 0.007, 0.009, 0.009, 0.012, 0.012, 0.022, 0.11, 0.14, 0.14, 0.17, 0.18, 0.32),
(42, 'Bladder', 42, 0.0077, 0.0099, 0.0099, 0.015, 0.022, 0.04, 0.05, 0.062, 0.062, 0.087, 0.11, 0.14),
(43, 'Bladder', 43, 0.0063, 0.0078, 0.0078, 0.011, 0.017, 0.03, 0.065, 0.081, 0.081, 0.12, 0.17, 0.32),
(44, 'Bone surfaces', 44, 0.0057, 0.007, 0.007, 0.011, 0.014, 0.027, 0.063, 0.082, 0.082, 0.13, 0.22, 0.53),
(45, 'Heart wall', 45, 0.007, 0.0089, 0.0089, 0.014, 0.021, 0.039, 0.023, 0.029, 0.029, 0.043, 0.066, 0.11),
(46, 'Gallbladder', 46, 0.0079, 0.01, 0.01, 0.016, 0.023, 0.045, 0.033, 0.038, 0.038, 0.049, 0.086, 0.26),
(47, 'Gallbladder', 47, 0.009, 0.012, 0.012, 0.018, 0.028, 0.053, 0.039, 0.045, 0.045, 0.058, 0.1, 0.32),
(48, 'Upper large intestine', 48, 0.013, 0.017, 0.017, 0.026, 0.042, 0.079, 0.057, 0.073, 0.073, 0.12, 0.2, 0.38),
(49, 'Spleen', 49, 0.014, 0.018, 0.018, 0.028, 0.041, 0.073, 0.077, 0.11, 0.11, 0.16, 0.25, 0.45),
(50, 'Upper large intestine', 50, 0.0223, 0.0264, 0.0287, 0.0447, 0.0731, 0.106, 0.0065, 0.0076, 0.00855, 0.014, 0.0213, 0.0368),
(51, 'Lungs', 51, 0.015, 0.022, 0.022, 0.031, 0.047, 0.087, 0.11, 0.16, 0.16, 0.22, 0.33, 0.63),
(52, 'Gallbladder', 52, 0.007, 0.0082, 0.0082, 0.012, 0.018, 0.035, 0.027, 0.031, 0.031, 0.041, 0.072, 0.23),
(53, 'Gallbladder', 53, 0.0076, 0.0096, 0.0096, 0.013, 0.022, 0.043, 0.036, 0.036, 0.04, 0.053, 0.093, 0.31),
(54, 'Spleen', 54, 0.011, 0.014, 0.014, 0.022, 0.034, 0.062, 0.15, 0.21, 0.21, 0.31, 0.48, 0.85),
(55, 'Kidneys', 55, 0.14, 0.2, 0.2, 0.56, 0.79, 1.3, 0.48, 0.58, 0.58, 3.1, 3.6, 4.9),
(56, 'Lungs', 56, 0.0008, 0.001, 0.001, 0.0016, 0.0027, 0.0054, 0.0011, 0.0017, 0.0017, 0.0024, 0.0037, 0.0075);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factores_dosis_radiofarmaco_embarazo`
--

CREATE TABLE `factores_dosis_radiofarmaco_embarazo` (
  `id` int(11) NOT NULL,
  `early_pregnant` float NOT NULL,
  `3_meses` float NOT NULL,
  `6_meses` float NOT NULL,
  `9_meses` float NOT NULL,
  `id_radiofarmaco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factores_dosis_radiofarmaco_embarazo`
--

INSERT INTO `factores_dosis_radiofarmaco_embarazo` (`id`, `early_pregnant`, `3_meses`, `6_meses`, `9_meses`, `id_radiofarmaco`) VALUES
(1, 0.022, 0.022, 0.017, 0.017, 1),
(2, 0.0051, 0.0047, 0.004, 0.0034, 2),
(3, 0.011, 0.022, 0.014, 0.0093, 3),
(4, 0.0028, 0.004, 0.005, 0.004, 4),
(5, 0.0061, 0.0054, 0.0027, 0.0024, 5),
(6, 0.015, 0.012, 0.0084, 0.0054, 6),
(7, 0.0096, 0.007, 0.0054, 0.0036, 7),
(8, 0, 0, 0, 0, 8),
(9, 0.02, 0.0196, 0.018, 0.018, 9),
(10, 0.0285, 0.0285, 0.0262, 0.0255, 10),
(11, 1.1, 0.68, 0.84, 0.88, 11),
(12, 0.126, 0.096, 0.084, 0.072, 12),
(13, 0.022, 0.022, 0.017, 0.017, 13),
(14, 0.022, 0.017, 0.0075, 0.0068, 14),
(15, 0.093, 0.2, 0.18, 0.13, 15),
(16, 0.031, 0.024, 0.0084, 0.0079, 16),
(17, 0, 0, 0, 0, 17),
(18, 0.026, 0.011, 0.0041, 0.0034, 18),
(19, 0.0196, 0.00872, 0.00622, 0.00619, 19),
(20, 0.02, 0.014, 0.011, 0.0098, 20),
(21, 0.25, 0.078, 0.038, 0.026, 21),
(22, 0.064, 0.05, 0.019, 0.018, 22),
(23, 0.11, 0.054, 0.038, 0.035, 23),
(24, 0.0668, 0.051, 0.213, 0.259, 24),
(25, 0.072, 0.068, 0.23, 0.27, 25),
(26, 0.082, 0.06, 0.035, 0.031, 26),
(27, 0.13, 0.096, 0.096, 0.094, 27),
(28, 0, 0, 0, 0, 28),
(29, 0.00245, 0.0021, 0.0017, 0.0016, 29),
(30, 0.00044, 0.00055, 0.0016, 0.0029, 30),
(31, 0.915, 0.915, 0.842, 0.819, 31),
(32, 0.0011, 0.00028, 0.00024, 0.00021, 32),
(33, 0.00515, 0.00403, 0.00363, 0.00321, 33),
(34, 0.017, 0.015, 0.012, 0.0067, 34),
(35, 0.0051, 0.0047, 0.004, 0.0034, 35),
(36, 0.012, 0.0087, 0.0041, 0.0047, 36),
(37, 0.0087, 0.0067, 0.0048, 0.0036, 37),
(38, 0.012, 0.011, 0.0053, 0.0046, 38),
(39, 0.0028, 0.004, 0.005, 0.004, 39),
(40, 0.0061, 0.0054, 0.0027, 0.0024, 40),
(41, 0.018, 0.014, 0.0055, 0.0052, 41),
(42, 0.0114, 0.00914, 0.00558, 0.00415, 42),
(43, 0.012, 0.0087, 0.0041, 0.0047, 43),
(44, 0.006, 0.0066, 0.0036, 0.0029, 44),
(45, 0.0064, 0.0043, 0.0033, 0.0027, 45),
(46, 0.015, 0.012, 0.0084, 0.0054, 46),
(47, 0.015, 0.012, 0.0084, 0.0054, 47),
(48, 0.011, 0.022, 0.014, 0.0093, 48),
(49, 0.0018, 0.0021, 0.0032, 0.0037, 49),
(50, 0, 0, 0, 0, 50),
(51, 0.000457, 0.00042, 0.00054, 0.00058, 51),
(52, 0.0096, 0.007, 0.0054, 0.0036, 52),
(53, 0.0096, 0.007, 0.0054, 0.0036, 53),
(54, 0.0038, 0.0028, 0.0029, 0.0028, 54),
(55, 0.097, 0.058, 0.047, 0.027, 55),
(56, 0.00043, 0.00024, 0.00019, 0.00015, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_group`
--

CREATE TABLE `fos_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`, `photo`) VALUES
(1, 'admin', 'admin', 'admin@gmail', 'admin@gmail', 1, 'dos', 'GAKO89+TmUtUpNkmhzQBxq923hZ4ubPUqSArFBguNFtZWCnS3C7dEdO3+0RgSCOGUfrsgQSpXTZHmVwRqKF77w==', '2016-06-23 00:06:43', 0, 0, NULL, NULL, NULL, 'a:3:{i:0;s:30:"ROLE_MEDICAL_CONSULTATION_LIST";i:1;s:27:"ROLE_RECEPTION_TO_RECEPTION";i:2;s:19:"ROLE_RECEPTION_LIST";}', 0, '2016-07-31 00:00:00', 'admin', 'admin', NULL),
(2, 'josecarlos', 'josecarlos', 'josecarlos@correo.cu', 'josecarlos@correo.cu', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '50360551b49f1181e06c8244402634838c1e1a99', '2015-09-13 22:36:36', 0, 0, '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', 'a:118:{i:0;s:30:"ROLE_MEDICAL_CONSULTATION_EDIT";i:1;s:30:"ROLE_MEDICAL_CONSULTATION_LIST";i:2;s:21:"ROLE_RECEPTION_IGNORE";i:3;s:21:"ROLE_RECEPTION_REAPED";i:4;s:21:"ROLE_RECEPTION_CREATE";i:5;s:35:"ROLE_PREPARE_DOSES_TO_PREPARE_DOSES";i:6;s:23:"ROLE_PRE', 0, '0000-00-00 00:00:00', 'Ramos Carmenates', 'bundles/cfsclinic/images/jose.jpg', ''),
(4, 'ernesto', 'ernesto', 'ernesto@cu', 'ernesto@cu', 1, '2pu3vupiq544wwwgsg0gs8gosw8skw8', 'YEmhJKTZXZJoxkdXd0b7i5AiDa9MPfx3a1KGYy8TqChkjB6QWyK9QcBs2yX7p5hklDxdpIVX8qMuTAykp8fzyw==', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0', 0, '0000-00-00 00:00:00', '0', '0', 'a:0:{}'),
(5, 'victor', 'victor', 'victorcruz@nauta.cu', 'victorcruz@nauta.cu', 1, 'pr6dx300fr44gw0o4ogskk88k84osg8', 'MmHMC+OTW9ctlgW3MjiFh9If+uTU3L2jhW34lIFvw4/amdmyVv6Wz6uX4qB6zMQzfKJrCaNCQhGUvd5uiIhNZA==', '2015-07-26 17:46:42', 0, 0, '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00', '0', 0, '0000-00-00 00:00:00', '0', '0', 'a:3:{i:0;s:30:"ROLE_MEDICAL_CONSULTATION_LIST";i:1;s:27:"ROLE_RECEPTION_TO_RECEPTION";i:2;s:19:"ROLE_RECEPTION_LIST";}'),
(6, 'yadier', 'yadier', 'yadier@nauta.cu', 'yadier@nauta.cu', 1, 'dos', 'dos', NULL, 0, 0, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user_user_group`
--

CREATE TABLE `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`id`, `nombre`, `ruta`) VALUES
(1, 'Mostrar página "Acerca de"', 'site/about'),
(2, 'Mostrar página principal del sitio', 'site/index'),
(3, 'Mostrar detalles del curso', 'producto/view'),
(4, 'Subir ficheros al curso', 'producto/gestionar-ficheros'),
(5, 'Adicionar nuevo curso', 'producto/create'),
(6, 'Editar curso', 'producto/update'),
(7, 'Eliminar curso', 'producto/delete'),
(8, 'Listar cursos', 'producto/index'),
(9, 'Crear carpeta en curso', 'producto/crear-carpeta'),
(10, 'Eliminar ficheros del curso', 'producto/eliminar-fichero'),
(11, 'Eliminar carpeta del curso', 'producto/eliminar-carpeta'),
(12, 'Crear usuario', 'user/create'),
(13, 'Listar usuarios', 'user/index'),
(14, 'Descargar ficheros', 'producto/descargar'),
(31, 'Auditoría - Listar objetos', 'auditoria/index'),
(32, 'Auditoría - Mostrar detalles', 'auditoria/view'),
(33, 'Actualizar pagos', 'pagos/update'),
(34, 'Cambiar contraseña', 'site/change-password'),
(35, 'Enviar invitación', 'site/invitar'),
(36, 'retorno', 'producto/ipn-ponder');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quality_control_equipment`
--

CREATE TABLE `quality_control_equipment` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `parameter_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_min` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_max` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_count` int(11) DEFAULT NULL,
  `value_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_select` longtext COLLATE utf8_unicode_ci,
  `frequency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL,
  `specialist` longtext COLLATE utf8_unicode_ci NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  `entity` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quality_control_parameters`
--

CREATE TABLE `quality_control_parameters` (
  `id` int(11) NOT NULL,
  `parameter_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `value_min` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_max` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value_count` int(11) NOT NULL,
  `value_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `value_select` longtext COLLATE utf8_unicode_ci,
  `frequency` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `equipment_id` int(11) NOT NULL,
  `can_users` longtext COLLATE utf8_unicode_ci,
  `entity` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(3, 'Administrador'),
(2, 'Asesor'),
(1, 'Cliente'),
(4, 'Super administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operacion`
--

CREATE TABLE `rol_operacion` (
  `rol_id` int(11) NOT NULL,
  `operacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol_operacion`
--

INSERT INTO `rol_operacion` (`rol_id`, `operacion_id`) VALUES
(1, 1),
(1, 2),
(1, 8),
(1, 13),
(1, 14),
(1, 34),
(1, 35),
(2, 1),
(2, 2),
(2, 3),
(2, 8),
(2, 13),
(2, 14),
(2, 34),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 13),
(3, 14),
(3, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `rol_id` int(11) NOT NULL DEFAULT '10',
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `term_condic` bit(1) NOT NULL DEFAULT b'0',
  `id_nivel_acceso` bigint(20) UNSIGNED DEFAULT NULL,
  `idioma` varchar(7) COLLATE utf8_unicode_ci DEFAULT 'es-ES',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `rol_id`, `nombre`, `apellidos`, `term_condic`, `id_nivel_acceso`, `idioma`, `created_at`, `updated_at`) VALUES
(591, 'yadier', 'YiDbZP2edLMGw3_0Zp1agZrSFceGsU6q', '$2y$13$v9oO0wtPfE6SGJ638tg9XuA1hyE5IV/H.e0WGwzFLKweF64YTDov.', NULL, 'yadierq87@gmail.com', 1, 4, 'Yadier Abel', 'De Quesada', b'1', 1, 'es-ES', 1460568475, 1466361511),
(595, 'doctor', 'AQ2T3mR2uh-tub1TCEPbjzJiNAzFMzfA', '$2y$13$xDkbBOL0EhzlKCLpBZnoZOZjKilBF48JjWSK9BJNXu3g3TEU.lWqC', NULL, '', 1, 4, '', '', b'0', NULL, 'es-ES', 2016, 2016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_historial`
--

CREATE TABLE `user_historial` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `rol_id` int(11) NOT NULL DEFAULT '10',
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_doc_id` bigint(20) UNSIGNED NOT NULL,
  `num_doc_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tel_movil` bigint(20) DEFAULT NULL,
  `tel_fijo` bigint(20) DEFAULT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codigo_postal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_munic` bigint(20) UNSIGNED DEFAULT NULL,
  `id_prov` bigint(20) UNSIGNED DEFAULT NULL,
  `id_pais` bigint(20) UNSIGNED NOT NULL,
  `referido_por` int(11) DEFAULT NULL,
  `term_condic` bit(1) NOT NULL DEFAULT b'0',
  `id_nivel_acceso` bigint(20) UNSIGNED DEFAULT NULL,
  `idioma` varchar(7) COLLATE utf8_unicode_ci DEFAULT 'en-US',
  `intentos_cnx_fallidos` smallint(1) DEFAULT '0',
  `credito_circuitos` double NOT NULL DEFAULT '0',
  `credito_comisiones` double NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_config`
--
ALTER TABLE `app_config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_operacion` (`operacion`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `cf_acquire_image`
--
ALTER TABLE `cf_acquire_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_77F069A62A6604F1` (`cf_medical_consultation_id`),
  ADD KEY `IDX_77F069A6F4DF2537` (`cf_equipment_id`);

--
-- Indices de la tabla `cf_activimetro`
--
ALTER TABLE `cf_activimetro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_administer_doses`
--
ALTER TABLE `cf_administer_doses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_56F34C822A6604F1` (`cf_medical_consultation_id`);

--
-- Indices de la tabla `cf_campana`
--
ALTER TABLE `cf_campana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_cod_proceso`
--
ALTER TABLE `cf_cod_proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_cod_zonas`
--
ALTER TABLE `cf_cod_zonas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_diary_elution`
--
ALTER TABLE `cf_diary_elution`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_entrega_reporte`
--
ALTER TABLE `cf_entrega_reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cf_medical_consultation` (`id_cf_medical_consultation`);

--
-- Indices de la tabla `cf_equipment`
--
ALTER TABLE `cf_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E1563804EBDB452D` (`cf_local_id`),
  ADD KEY `IDX_E1563804148219BF` (`cf_types_equipment_id`);

--
-- Indices de la tabla `cf_generator`
--
ALTER TABLE `cf_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_history_log`
--
ALTER TABLE `cf_history_log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_image_acquire_study`
--
ALTER TABLE `cf_image_acquire_study`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_indications_templates`
--
ALTER TABLE `cf_indications_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_local`
--
ALTER TABLE `cf_local`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_media`
--
ALTER TABLE `cf_media`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_medical_consultation`
--
ALTER TABLE `cf_medical_consultation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7C34062261CB98` (`cf_medical_study_id`),
  ADD KEY `IDX_7C3406221867EA17` (`cf_patient_id`),
  ADD KEY `specialist` (`specialist`);

--
-- Indices de la tabla `cf_medical_study`
--
ALTER TABLE `cf_medical_study`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_medical_study_cf_types_equipment`
--
ALTER TABLE `cf_medical_study_cf_types_equipment`
  ADD PRIMARY KEY (`cfmedicalstudy_id`,`cftypesequipment_id`),
  ADD KEY `IDX_36D0024D816918E9` (`cfmedicalstudy_id`),
  ADD KEY `IDX_36D0024DCD72F167` (`cftypesequipment_id`);

--
-- Indices de la tabla `cf_medical_study_cf_types_radiopharmaceutical`
--
ALTER TABLE `cf_medical_study_cf_types_radiopharmaceutical`
  ADD PRIMARY KEY (`cfmedicalstudy_id`,`cftypesradiopharmaceutical_id`),
  ADD KEY `IDX_1B1A0F7F816918E9` (`cfmedicalstudy_id`),
  ADD KEY `IDX_1B1A0F7F59C5A598` (`cftypesradiopharmaceutical_id`);

--
-- Indices de la tabla `cf_municipio`
--
ALTER TABLE `cf_municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cf_provincia` (`id_cf_provincia`);

--
-- Indices de la tabla `cf_nombre_con_estudio`
--
ALTER TABLE `cf_nombre_con_estudio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cf_medical_study` (`id_cf_medical_study`),
  ADD KEY `id_cf_nombre_radiofarmaco` (`id_cf_nombre_radiofarmaco`);

--
-- Indices de la tabla `cf_nombre_hospitales`
--
ALTER TABLE `cf_nombre_hospitales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cfmunicipio` (`municipio_id`);

--
-- Indices de la tabla `cf_nombre_liofilizado`
--
ALTER TABLE `cf_nombre_liofilizado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_nombre_medicos`
--
ALTER TABLE `cf_nombre_medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_nombre_radiofarmaco`
--
ALTER TABLE `cf_nombre_radiofarmaco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_patient`
--
ALTER TABLE `cf_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FD93C6D45C1EB959` (`cf_media_id`);

--
-- Indices de la tabla `cf_phases_medical_consultation`
--
ALTER TABLE `cf_phases_medical_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_planificacion_dias`
--
ALTER TABLE `cf_planificacion_dias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cf_med_study` (`id_cf_med_study`);

--
-- Indices de la tabla `cf_planificacion_procesos`
--
ALTER TABLE `cf_planificacion_procesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cf_cod_proceso` (`id_cf_cod_proceso`),
  ADD KEY `id_cf_med_study` (`id_cf_med_study`);

--
-- Indices de la tabla `cf_prepare_doses`
--
ALTER TABLE `cf_prepare_doses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_41DBC5882A6604F1` (`cf_medical_consultation_id`),
  ADD KEY `IDX_41DBC588A5892139` (`cf_radiopharmaceutical_id`),
  ADD KEY `IDX_41DBC5886AB54FB1` (`cf_generator_id`);

--
-- Indices de la tabla `cf_processing`
--
ALTER TABLE `cf_processing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FB82D3452A6604F1` (`cf_medical_consultation_id`);

--
-- Indices de la tabla `cf_provincias`
--
ALTER TABLE `cf_provincias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_radiopharmaceutical`
--
ALTER TABLE `cf_radiopharmaceutical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_399AD8CF55DD1B0A` (`cf_types_radiopharmaceutical_id`);

--
-- Indices de la tabla `cf_reception`
--
ALTER TABLE `cf_reception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_62B868A82A6604F1` (`cf_medical_consultation_id`);

--
-- Indices de la tabla `cf_refrigeradores`
--
ALTER TABLE `cf_refrigeradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_report`
--
ALTER TABLE `cf_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_35134F8A2A6604F1` (`cf_medical_consultation_id`);

--
-- Indices de la tabla `cf_report_templates`
--
ALTER TABLE `cf_report_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_settings`
--
ALTER TABLE `cf_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_submit`
--
ALTER TABLE `cf_submit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CE0D8B4D2A6604F1` (`cf_medical_consultation_id`);

--
-- Indices de la tabla `cf_types_equipment`
--
ALTER TABLE `cf_types_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_types_radiopharmaceutical`
--
ALTER TABLE `cf_types_radiopharmaceutical`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cf_worker`
--
ALTER TABLE `cf_worker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6E8E876C8C20A0FB` (`fos_user_id`);

--
-- Indices de la tabla `factores_dosis_radiofarmaco`
--
ALTER TABLE `factores_dosis_radiofarmaco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factores_dosis_radiofarmaco_embarazo`
--
ALTER TABLE `factores_dosis_radiofarmaco_embarazo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fos_group`
--
ALTER TABLE `fos_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_4B019DDB5E237E06` (`name`);

--
-- Indices de la tabla `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Indices de la tabla `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `IDX_B3C77447A76ED395` (`user_id`),
  ADD KEY `IDX_B3C77447FE54D947` (`group_id`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruta_2` (`ruta`),
  ADD KEY `ruta` (`ruta`);

--
-- Indices de la tabla `quality_control_equipment`
--
ALTER TABLE `quality_control_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quality_control_parameters`
--
ALTER TABLE `quality_control_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD PRIMARY KEY (`rol_id`,`operacion_id`),
  ADD KEY `operacion_id` (`operacion_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `id_nivel_acceso` (`id_nivel_acceso`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `user_historial`
--
ALTER TABLE `user_historial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_config`
--
ALTER TABLE `app_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `cf_acquire_image`
--
ALTER TABLE `cf_acquire_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `cf_activimetro`
--
ALTER TABLE `cf_activimetro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_administer_doses`
--
ALTER TABLE `cf_administer_doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `cf_campana`
--
ALTER TABLE `cf_campana`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cf_cod_proceso`
--
ALTER TABLE `cf_cod_proceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cf_cod_zonas`
--
ALTER TABLE `cf_cod_zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cf_diary_elution`
--
ALTER TABLE `cf_diary_elution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cf_entrega_reporte`
--
ALTER TABLE `cf_entrega_reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cf_equipment`
--
ALTER TABLE `cf_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cf_generator`
--
ALTER TABLE `cf_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cf_history_log`
--
ALTER TABLE `cf_history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_image_acquire_study`
--
ALTER TABLE `cf_image_acquire_study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `cf_indications_templates`
--
ALTER TABLE `cf_indications_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_local`
--
ALTER TABLE `cf_local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cf_media`
--
ALTER TABLE `cf_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cf_medical_consultation`
--
ALTER TABLE `cf_medical_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `cf_medical_study`
--
ALTER TABLE `cf_medical_study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `cf_nombre_con_estudio`
--
ALTER TABLE `cf_nombre_con_estudio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `cf_nombre_hospitales`
--
ALTER TABLE `cf_nombre_hospitales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cf_nombre_liofilizado`
--
ALTER TABLE `cf_nombre_liofilizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cf_nombre_medicos`
--
ALTER TABLE `cf_nombre_medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cf_nombre_radiofarmaco`
--
ALTER TABLE `cf_nombre_radiofarmaco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `cf_patient`
--
ALTER TABLE `cf_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `cf_phases_medical_consultation`
--
ALTER TABLE `cf_phases_medical_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_planificacion_dias`
--
ALTER TABLE `cf_planificacion_dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `cf_planificacion_procesos`
--
ALTER TABLE `cf_planificacion_procesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `cf_prepare_doses`
--
ALTER TABLE `cf_prepare_doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cf_processing`
--
ALTER TABLE `cf_processing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `cf_radiopharmaceutical`
--
ALTER TABLE `cf_radiopharmaceutical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cf_reception`
--
ALTER TABLE `cf_reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cf_refrigeradores`
--
ALTER TABLE `cf_refrigeradores`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cf_report`
--
ALTER TABLE `cf_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cf_report_templates`
--
ALTER TABLE `cf_report_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_settings`
--
ALTER TABLE `cf_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_submit`
--
ALTER TABLE `cf_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cf_types_equipment`
--
ALTER TABLE `cf_types_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cf_types_radiopharmaceutical`
--
ALTER TABLE `cf_types_radiopharmaceutical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cf_worker`
--
ALTER TABLE `cf_worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `factores_dosis_radiofarmaco`
--
ALTER TABLE `factores_dosis_radiofarmaco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `factores_dosis_radiofarmaco_embarazo`
--
ALTER TABLE `factores_dosis_radiofarmaco_embarazo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `fos_group`
--
ALTER TABLE `fos_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `quality_control_equipment`
--
ALTER TABLE `quality_control_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `quality_control_parameters`
--
ALTER TABLE `quality_control_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cf_acquire_image`
--
ALTER TABLE `cf_acquire_image`
  ADD CONSTRAINT `FK_77F069A62A6604F1` FOREIGN KEY (`cf_medical_consultation_id`) REFERENCES `cf_medical_consultation` (`id`),
  ADD CONSTRAINT `FK_77F069A6F4DF2537` FOREIGN KEY (`cf_equipment_id`) REFERENCES `cf_equipment` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
