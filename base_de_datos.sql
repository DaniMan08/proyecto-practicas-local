-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2026 a las 13:41:33
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
-- Base de datos: `escuela_teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_alta`, `estado`) VALUES
(20, 'Lucía', 'Romero', 'lucia.romero@example.com', '600111001', '2024-01-01', 'Activo'),
(21, 'Daniel', 'Pérez', 'daniel.perez@example.com', '600111002', '2024-01-01', 'Activo'),
(22, 'Sofía', 'Navarro', 'sofia.navarro@example.com', '600111003', '2024-01-01', 'Activo'),
(23, 'Marcos', 'Ruiz', 'marcos.ruiz@example.com', '600111004', '2024-01-01', 'Activo'),
(24, 'Irene', 'Castillo', 'irene.castillo@example.com', '600111005', '2024-01-01', 'Activo'),
(25, 'Álvaro', 'Molina', 'alvaro.molina@example.com', '600112001', '2024-01-01', 'Activo'),
(26, 'Paula', 'Sánchez', 'paula.sanchez@example.com', '600112002', '2024-01-01', 'Activo'),
(27, 'Hugo', 'Torres', 'hugo.torres@example.com', '600112003', '2024-01-01', 'Activo'),
(28, 'Marta', 'López', 'marta.lopez@example.com', '600112004', '2024-01-01', 'Activo'),
(29, 'Sergio', 'Vidal', 'sergio.vidal@example.com', '600112005', '2024-01-01', 'Activo'),
(30, 'Clara', 'Jiménez', 'clara.jimenez@example.com', '600113001', '2024-01-01', 'Activo'),
(31, 'Javier', 'Ortega', 'javier.ortega@example.com', '600113002', '2024-01-01', 'Activo'),
(32, 'Nuria', 'Ramos', 'nuria.ramos@example.com', '600113003', '2024-01-01', 'Activo'),
(33, 'David', 'Soler', 'david.soler@example.com', '600113004', '2024-01-01', 'Activo'),
(34, 'Elena', 'Martín', 'elena.martin@example.com', '600113005', '2024-01-01', 'Activo'),
(35, 'Laura', 'Gómez', 'laura.gomez@example.com', '600114001', '2024-01-01', 'Activo'),
(36, 'Pablo', 'Herrera', 'pablo.herrera@example.com', '600114002', '2024-01-01', 'Activo'),
(37, 'Sara', 'Domínguez', 'sara.dominguez@example.com', '600114003', '2024-01-01', 'Activo'),
(38, 'Mario', 'Cano', 'mario.cano@example.com', '600114004', '2024-01-01', 'Activo'),
(39, 'Julia', 'Ferrer', 'julia.ferrer@example.com', '600114005', '2024-01-01', 'Activo'),
(40, 'Adrián', 'Morales', 'adrian.morales@example.com', '600115001', '2024-01-01', 'Activo'),
(41, 'Carmen', 'Sáez', 'carmen.saez@example.com', '600115002', '2024-01-01', 'Activo'),
(42, 'Víctor', 'Lozano', 'victor.lozano@example.com', '600115003', '2024-01-01', 'Activo'),
(43, 'Alicia', 'Campos', 'alicia.campos@example.com', '600115004', '2024-01-01', 'Activo'),
(44, 'Óscar', 'Medina', 'oscar.medina@example.com', '600115005', '2024-01-01', 'Activo'),
(45, 'Silvia', 'Pardo', 'silvia.pardo@example.com', '600116001', '2024-01-01', 'Activo'),
(46, 'Marcos', 'Gil', 'marcos.gil@example.com', '600116002', '2024-01-01', 'Activo'),
(47, 'Andrea', 'Torres', 'andrea.torres@example.com', '600116003', '2024-01-01', 'Activo'),
(48, 'Iván', 'Serrano', 'ivan.serrano@example.com', '600116004', '2024-01-01', 'Activo'),
(49, 'Noelia', 'Rivas', 'noelia.rivas@example.com', '600116005', '2024-01-01', 'Activo'),
(50, 'Sonia', 'Aguilar', 'sonia.aguilar@example.com', '600117001', '2024-01-01', 'Activo'),
(51, 'Diego', 'Pastor', 'diego.pastor@example.com', '600117002', '2024-01-01', 'Activo'),
(52, 'Marina', 'López', 'marina.lopez@example.com', '600117003', '2024-01-01', 'Activo'),
(53, 'Carlos', 'Vidal', 'carlos.vidal@example.com', '600117004', '2024-01-01', 'Activo'),
(54, 'Eva', 'Sánchez', 'eva.sanchez@example.com', '600117005', '2024-01-01', 'Activo'),
(55, 'Héctor', 'Navarro', 'hector.navarro@example.com', '600118001', '2024-01-01', 'Activo'),
(56, 'Alba', 'Ruiz', 'alba.ruiz@example.com', '600118002', '2024-01-01', 'Activo'),
(57, 'Samuel', 'Torres', 'samuel.torres@example.com', '600118003', '2024-01-01', 'Activo'),
(58, 'Patricia', 'Gómez', 'patricia.gomez@example.com', '600118004', '2024-01-01', 'Activo'),
(59, 'Rubén', 'Morales', 'ruben.morales@example.com', '600118005', '2024-01-01', 'Activo'),
(60, 'Cristina', 'Ramos', 'cristina.ramos@example.com', '600119001', '2024-01-01', 'Activo'),
(61, 'Jorge', 'Castillo', 'jorge.castillo@example.com', '600119002', '2024-01-01', 'Activo'),
(62, 'Belén', 'Ortiz', 'belen.ortiz@example.com', '600119003', '2024-01-01', 'Activo'),
(63, 'Adrián', 'Soler', 'adrian.soler@example.com', '600119004', '2024-01-01', 'Activo'),
(64, 'Miriam', 'Cano', 'miriam.cano@example.com', '600119005', '2024-01-01', 'Activo'),
(65, 'Raquel', 'Pérez', 'raquel.perez@example.com', '600120001', '2024-01-01', 'Activo'),
(66, 'Tomás', 'Herrera', 'tomas.herrera@example.com', '600120002', '2024-01-01', 'Activo'),
(67, 'Lucía', 'Gil', 'lucia.gil@example.com', '600120003', '2024-01-01', 'Activo'),
(68, 'Andrés', 'Rivas', 'andres.rivas@example.com', '600120004', '2024-01-01', 'Activo'),
(69, 'Carla', 'Domínguez', 'carla.dominguez@example.com', '600120005', '2024-01-01', 'Activo'),
(70, 'Víctor', 'Aguilar', 'victor.aguilar@example.com', '600121001', '2024-01-01', 'Activo'),
(71, 'Elena', 'Pastor', 'elena.pastor@example.com', '600121002', '2024-01-01', 'Activo'),
(72, 'Sergio', 'Gómez', 'sergio.gomez@example.com', '600121003', '2024-01-01', 'Activo'),
(73, 'Paula', 'Cano', 'paula.cano@example.com', '600121004', '2024-01-01', 'Activo'),
(74, 'Marcos', 'Navarro', 'marcos.navarro@example.com', '600121005', '2024-01-01', 'Activo'),
(75, 'Alicia', 'Soler', 'alicia.soler@example.com', '600122001', '2024-01-01', 'Activo'),
(76, 'David', 'Martín', 'david.martin@example.com', '600122002', '2024-01-01', 'Activo'),
(77, 'Nuria', 'Gil', 'nuria.gil@example.com', '600122003', '2024-01-01', 'Activo'),
(78, 'Óscar', 'Ramos', 'oscar.ramos@example.com', '600122004', '2024-01-01', 'Activo'),
(79, 'Marta', 'Serrano', 'marta.serrano@example.com', '600122005', '2024-01-01', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_grupo`
--

CREATE TABLE `alumnos_grupo` (
  `curso_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_grupo`
--

INSERT INTO `alumnos_grupo` (`curso_id`, `alumno_id`, `grupo_id`) VALUES
(1, 20, 37),
(1, 21, 37),
(1, 22, 37),
(1, 23, 37),
(1, 24, 37),
(1, 25, 38),
(1, 26, 38),
(1, 27, 38),
(1, 28, 38),
(1, 29, 38),
(1, 30, 39),
(1, 31, 39),
(1, 32, 39),
(1, 33, 39),
(1, 34, 39),
(1, 35, 40),
(1, 36, 40),
(1, 37, 40),
(1, 38, 40),
(1, 39, 40),
(1, 40, 41),
(1, 41, 41),
(1, 42, 41),
(1, 43, 41),
(1, 44, 41),
(1, 45, 42),
(1, 46, 42),
(1, 47, 42),
(1, 48, 42),
(1, 49, 42),
(1, 50, 43),
(1, 51, 43),
(1, 52, 43),
(1, 53, 43),
(1, 54, 43),
(1, 55, 44),
(1, 56, 44),
(1, 57, 44),
(1, 58, 44),
(1, 59, 44),
(1, 60, 45),
(1, 61, 45),
(1, 62, 45),
(1, 63, 45),
(1, 64, 45),
(1, 65, 46),
(1, 66, 46),
(1, 67, 46),
(1, 68, 46),
(1, 69, 46),
(1, 70, 47),
(1, 71, 47),
(1, 72, 47),
(1, 73, 47),
(1, 74, 47),
(1, 75, 48),
(1, 76, 48),
(1, 77, 48),
(1, 78, 48),
(1, 79, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(11) NOT NULL,
  `sede` varchar(150) NOT NULL,
  `nombre_sala` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `sede`, `nombre_sala`, `direccion`) VALUES
(1, 'Dénia Centro', 'Sala Principal', 'Calle Mayor 12'),
(2, 'Dénia Centro', 'Sala Ensayo', 'Calle Mayor 12'),
(3, 'Dénia Centro', 'Sala Voz', 'Calle Mayor 12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canal_mensaje`
--

CREATE TABLE `canal_mensaje` (
  `id_canal` int(11) NOT NULL,
  `app` enum('Whatsapp','Email') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_academico`
--

CREATE TABLE `curso_academico` (
  `id_curso` int(11) NOT NULL,
  `curso_academico` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso_academico`
--

INSERT INTO `curso_academico` (`id_curso`, `curso_academico`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Curso 2024-2025', '2024-09-01', '2025-06-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `rol` enum('Admin','Profesor') NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`nombre`, `apellidos`, `rol`, `email`, `telefono`, `fecha_alta`, `estado`, `id_empleado`, `usuario_id`) VALUES
('Carlos', 'Medina', 'Profesor', 'carlos.medina@escuela.com', '600111111', '2024-01-01', 'Activo', 13, 1),
('Laura', 'Torres', 'Profesor', 'laura.torres@escuela.com', '600222222', '2024-01-01', 'Activo', 14, 2),
('Javier', 'Ríos', 'Profesor', 'javier.rios@escuela.com', '600333333', '2024-01-01', 'Activo', 15, 3),
('Ana', 'Beltrán', 'Profesor', 'ana.beltran@escuela.com', '600444444', '2024-01-01', 'Activo', 16, 4),
('Marcos', 'Vidal', 'Profesor', 'marcos.vidal@escuela.com', '600555555', '2024-01-01', 'Activo', 17, 5),
('Elena', 'Suárez', 'Profesor', 'elena.suarez@escuela.com', '600666666', '2024-01-01', 'Activo', 18, 6),
('Pablo', 'Serrano', 'Profesor', 'pablo.serrano@escuela.com', '600777777', '2024-01-01', 'Activo', 19, 7),
('Marta', 'Aguilar', 'Profesor', 'marta.aguilar@escuela.com', '600888888', '2024-01-01', 'Activo', 20, 8),
('Sergio', 'Llorens', 'Profesor', 'sergio.llorens@escuela.com', '600999999', '2024-01-01', 'Activo', 21, 9),
('Nuria', 'Campos', 'Profesor', 'nuria.campos@escuela.com', '600000000', '2024-01-01', 'Activo', 22, 10),
('Admin', 'Sistema', '', 'admin@escuela.com', '600000000', '2026-04-27', 'Activo', 24, 13),
('Juan Carlos', 'Manchego', 'Profesor', 'menchego@gmail.com', '966000000', '2026-05-08', 'Activo', 25, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_clase`
--

CREATE TABLE `grupos_clase` (
  `id_grupo_clase` int(11) NOT NULL,
  `nombre_grupo` varchar(150) NOT NULL,
  `dia_semana` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') NOT NULL,
  `hora` time NOT NULL,
  `profesor` varchar(100) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `nivel` enum('Iniciación','Intermedio','Avanzado') NOT NULL,
  `aula_id` int(11) NOT NULL,
  `tipo` enum('Improvisación','Teatro','Voz','Otros') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos_clase`
--

INSERT INTO `grupos_clase` (`id_grupo_clase`, `nombre_grupo`, `dia_semana`, `hora`, `profesor`, `profesor_id`, `nivel`, `aula_id`, `tipo`) VALUES
(37, 'Improvisación Iniciación', 'Lunes', '17:00:00', 'Carlos Medina', 13, 'Iniciación', 1, 'Improvisación'),
(38, 'Improvisación Intermedio', 'Lunes', '18:30:00', 'Laura Torres', 14, 'Intermedio', 2, 'Improvisación'),
(39, 'Improvisación Avanzado', 'Lunes', '20:00:00', 'Javier Ríos', 15, 'Avanzado', 3, 'Improvisación'),
(40, 'Teatro Iniciación', 'Martes', '17:00:00', 'Ana Beltrán', 16, 'Iniciación', 1, 'Teatro'),
(41, 'Teatro Intermedio', 'Martes', '18:30:00', 'Marcos Vidal', 17, 'Intermedio', 2, 'Teatro'),
(42, 'Teatro Avanzado', 'Martes', '20:00:00', 'Elena Suárez', 18, 'Avanzado', 3, 'Teatro'),
(43, 'Voz Iniciación', 'Miércoles', '17:00:00', 'Pablo Serrano', 19, 'Iniciación', 1, 'Voz'),
(44, 'Voz Intermedio', 'Miércoles', '18:30:00', 'Marta Aguilar', 20, 'Intermedio', 2, 'Voz'),
(45, 'Voz Avanzado', 'Miércoles', '20:00:00', 'Sergio Llorens', 21, 'Avanzado', 3, 'Voz'),
(46, 'Eventos Iniciación', 'Jueves', '17:00:00', 'Nuria Campos', 22, 'Iniciación', 1, 'Otros'),
(47, 'Eventos Intermedio', 'Jueves', '18:30:00', 'Carlos Medina', 13, 'Intermedio', 2, 'Otros'),
(48, 'Eventos Avanzado', 'Jueves', '20:00:00', 'Laura Torres', 14, 'Avanzado', 3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `id_remitente` int(11) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `canal` enum('Email','WhatsApp') NOT NULL DEFAULT 'Email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id_mensaje`, `id_remitente`, `asunto`, `contenido`, `fecha_envio`, `canal`) VALUES
(3, 24, 'Prueba directa', 'Texto de prueba', '2026-04-27 20:42:06', 'Email'),
(4, 24, 'error', 'probar el error', '2026-04-27 20:50:45', 'Email'),
(5, 24, 'Prueba error', 'error canal', '2026-04-27 20:55:01', 'Email'),
(6, 24, 'prueba', 'error', '2026-04-27 20:58:24', 'Email'),
(7, 24, 'Prueba con Llanos', 'grupos', '2026-04-29 13:03:54', 'Email'),
(8, 24, 'Prueba Whatsapp', 'Cambio de horario de calse de 10.00h a 11.00h', '2026-05-04 13:41:08', 'WhatsApp'),
(9, 24, 'Prueba 2 Whatsapp', 'Cambio de horario de calse de 10.00h a 11.00h', '2026-05-04 13:44:41', 'WhatsApp'),
(10, 24, 'Prueba 3 Whatsapp', 'Cambio de horario de calse de 10.00h a 11.00h', '2026-05-04 13:49:16', 'WhatsApp'),
(11, 13, 'Prueba flujo', 'whatsapp', '2026-05-05 10:21:07', 'WhatsApp'),
(12, 13, 'prueba', 'historial', '2026-05-05 13:06:01', 'Email'),
(13, 13, 'prueba', 'historial', '2026-05-05 13:06:15', 'Email'),
(14, 13, 'prueba', 'historial', '2026-05-05 13:09:24', 'Email'),
(15, 13, 'prueba whatsapp', 'envio correcto', '2026-05-05 13:12:55', 'WhatsApp'),
(16, 13, 'prueba2 whats', 'Cambio de hora el lunes a las 10.00', '2026-05-05 13:17:35', 'WhatsApp'),
(17, 13, 'Prueba', 'WhatsApp Simulado', '2026-05-06 13:03:34', 'WhatsApp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje_destinatario`
--

CREATE TABLE `mensaje_destinatario` (
  `mensaje_id` int(11) NOT NULL,
  `id_destinatario` int(11) NOT NULL,
  `estado_envio` enum('Enviado','Fallido','Pendiente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensaje_destinatario`
--

INSERT INTO `mensaje_destinatario` (`mensaje_id`, `id_destinatario`, `estado_envio`) VALUES
(6, 20, 'Enviado'),
(6, 21, 'Enviado'),
(6, 22, 'Enviado'),
(6, 23, 'Enviado'),
(6, 24, 'Enviado'),
(7, 30, 'Enviado'),
(7, 32, 'Enviado'),
(7, 34, 'Enviado'),
(8, 60, 'Enviado'),
(8, 61, 'Enviado'),
(8, 62, 'Enviado'),
(8, 63, 'Enviado'),
(8, 64, 'Enviado'),
(9, 60, 'Enviado'),
(9, 61, 'Enviado'),
(9, 62, 'Enviado'),
(9, 63, 'Enviado'),
(9, 64, 'Enviado'),
(10, 60, 'Enviado'),
(10, 61, 'Enviado'),
(10, 62, 'Enviado'),
(10, 63, 'Enviado'),
(10, 64, 'Enviado'),
(11, 30, 'Enviado'),
(12, 35, 'Enviado'),
(13, 35, 'Enviado'),
(13, 36, 'Enviado'),
(14, 35, 'Enviado'),
(14, 36, 'Enviado'),
(14, 37, 'Enviado'),
(14, 38, 'Enviado'),
(14, 39, 'Enviado'),
(15, 25, 'Enviado'),
(15, 26, 'Enviado'),
(15, 27, 'Enviado'),
(15, 28, 'Enviado'),
(15, 29, 'Enviado'),
(16, 70, 'Enviado'),
(16, 71, 'Enviado'),
(16, 72, 'Enviado'),
(17, 35, 'Enviado'),
(17, 36, 'Enviado'),
(17, 37, 'Enviado'),
(17, 38, 'Enviado'),
(17, 39, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `fecha_inicio_bloque` date NOT NULL,
  `fecha_fin_bloque` date NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `importe` decimal(6,2) NOT NULL,
  `estado_pago` enum('Pendiente','Pagado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posibles_alumnos`
--

CREATE TABLE `posibles_alumnos` (
  `id_posible_alumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `nivel_interes` enum('Iniciación','Intermedio','Avanzado') NOT NULL,
  `fecha_interes` date NOT NULL,
  `tipo_interes` enum('No insistir','Avisar más adelante','Ex alumno','Intensivo','Ya no vive en Madrid') NOT NULL,
  `clase_prueba` tinyint(1) NOT NULL,
  `apuntado` tinyint(1) NOT NULL,
  `fecha_apuntado` date NOT NULL,
  `horario_apuntado` varchar(100) NOT NULL,
  `notas` text NOT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` enum('Empleado','Alumno','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `password`, `tipo`) VALUES
(1, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'Admin'),
(2, 'carlos.medina', '1234', 'Empleado'),
(3, 'laura.torres', '1234', 'Empleado'),
(4, 'javier.rios', '1234', 'Empleado'),
(5, 'ana.beltran', '1234', 'Empleado'),
(6, 'marcos.vidal', '1234', 'Empleado'),
(7, 'elena.suarez', '1234', 'Empleado'),
(8, 'pablo.serrano', '1234', 'Empleado'),
(9, 'marta.aguilar', '1234', 'Empleado'),
(10, 'sergio.llorens', '1234', 'Empleado'),
(11, 'nuria.campos', '1234', 'Empleado'),
(13, 'administrador', '1234', 'Admin'),
(14, 'menchego@gmail.com', '$2y$10$E5O2sFWf3DBMLvTfBSUie.A2actm4K.OUPw0y93Je2W4RGWb9slkG', 'Empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `alumnos_grupo`
--
ALTER TABLE `alumnos_grupo`
  ADD PRIMARY KEY (`curso_id`,`alumno_id`,`grupo_id`),
  ADD KEY `id_alumno` (`alumno_id`),
  ADD KEY `id_grupo` (`grupo_id`),
  ADD KEY `id_curso` (`curso_id`) USING BTREE;

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `canal_mensaje`
--
ALTER TABLE `canal_mensaje`
  ADD PRIMARY KEY (`id_canal`);

--
-- Indices de la tabla `curso_academico`
--
ALTER TABLE `curso_academico`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk_empleados_usuario` (`usuario_id`);

--
-- Indices de la tabla `grupos_clase`
--
ALTER TABLE `grupos_clase`
  ADD PRIMARY KEY (`id_grupo_clase`),
  ADD KEY `id_aula` (`aula_id`),
  ADD KEY `fk_grupo_profesor` (`profesor_id`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_empleado` (`id_remitente`);

--
-- Indices de la tabla `mensaje_destinatario`
--
ALTER TABLE `mensaje_destinatario`
  ADD PRIMARY KEY (`mensaje_id`,`id_destinatario`),
  ADD KEY `id_mensaje` (`mensaje_id`),
  ADD KEY `id_alumno` (`id_destinatario`) USING BTREE;

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_alumno` (`alumno_id`);

--
-- Indices de la tabla `posibles_alumnos`
--
ALTER TABLE `posibles_alumnos`
  ADD UNIQUE KEY `id` (`id_posible_alumno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `canal_mensaje`
--
ALTER TABLE `canal_mensaje`
  MODIFY `id_canal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso_academico`
--
ALTER TABLE `curso_academico`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `grupos_clase`
--
ALTER TABLE `grupos_clase`
  MODIFY `id_grupo_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posibles_alumnos`
--
ALTER TABLE `posibles_alumnos`
  MODIFY `id_posible_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_grupo`
--
ALTER TABLE `alumnos_grupo`
  ADD CONSTRAINT `fk_ag_alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_ag_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso_academico` (`id_curso`),
  ADD CONSTRAINT `fk_ag_grupo` FOREIGN KEY (`grupo_id`) REFERENCES `grupos_clase` (`id_grupo_clase`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_empleados_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `grupos_clase`
--
ALTER TABLE `grupos_clase`
  ADD CONSTRAINT `fk_grupo_aula` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id_aula`),
  ADD CONSTRAINT `fk_grupo_profesor` FOREIGN KEY (`profesor_id`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `fk_mensaje_remitente` FOREIGN KEY (`id_remitente`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `mensaje_destinatario`
--
ALTER TABLE `mensaje_destinatario`
  ADD CONSTRAINT `fk_md_alumno` FOREIGN KEY (`id_destinatario`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `fk_md_mensaje` FOREIGN KEY (`mensaje_id`) REFERENCES `mensaje` (`id_mensaje`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
