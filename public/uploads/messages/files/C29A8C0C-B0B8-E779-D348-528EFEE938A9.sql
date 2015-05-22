-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2015 a las 18:56:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `adelaida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE IF NOT EXISTS `audits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=420 ;

--
-- Volcado de datos para la tabla `audits`
--

INSERT INTO `audits` (`id`, `name`, `title`, `description`, `id_user`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-26 16:18:55', '2015-01-26 16:18:55', NULL),
(2, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-26 16:39:41', '2015-01-26 16:39:41', NULL),
(3, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-28 00:48:24', '2015-01-28 00:48:24', NULL),
(4, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-28 03:42:15', '2015-01-28 03:42:15', NULL),
(5, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-28 03:47:52', '2015-01-28 03:47:52', NULL),
(6, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-28 04:04:02', '2015-01-28 04:04:02', NULL),
(7, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-30 01:41:47', '2015-01-30 01:41:47', NULL),
(8, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-31 00:46:58', '2015-01-31 00:46:58', NULL),
(9, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-31 02:01:12', '2015-01-31 02:01:12', NULL),
(10, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-01-31 04:34:59', '2015-01-31 04:34:59', NULL),
(11, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:35:06', '2015-01-31 04:35:06', NULL),
(12, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:43:06', '2015-01-31 04:43:06', NULL),
(13, 'users_get_create', 'Formulario de Creación de Usuarios', 'Vizualización del Formulario de Creación de Usuarios', 1, 'READ', '2015-01-31 04:43:17', '2015-01-31 04:43:17', NULL),
(14, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:44:46', '2015-01-31 04:44:46', NULL),
(15, 'users_get_create', 'Formulario de Creación de Usuarios', 'Vizualización del Formulario de Creación de Usuarios', 1, 'READ', '2015-01-31 04:44:48', '2015-01-31 04:44:48', NULL),
(16, 'users_create', 'Usuario Agregado', 'El usuario Daniel Henriquez fue agregado exitosamente', 1, 'CREATE', '2015-01-31 04:45:18', '2015-01-31 04:45:18', NULL),
(17, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:45:19', '2015-01-31 04:45:19', NULL),
(18, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:47:13', '2015-01-31 04:47:13', NULL),
(19, 'users_get_show', 'Visualización detallada de Usuario', 'Vizualización detallada del Usuario robertdacorte', 1, 'READ', '2015-01-31 04:47:18', '2015-01-31 04:47:18', NULL),
(20, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 04:54:56', '2015-01-31 04:54:56', NULL),
(21, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 07:33:29', '2015-01-31 07:33:29', NULL),
(22, 'users_get_edit', 'Formulario de Edición de Usuarios', 'Vizualización del Formulario de Edición de Usuarios', 1, 'READ', '2015-01-31 07:33:32', '2015-01-31 07:33:32', NULL),
(23, 'users_edit', 'Usuario Editado', 'El usuario Daniel Henriquez fue editado exitosamente', 1, 'UPDATE', '2015-01-31 07:33:37', '2015-01-31 07:33:37', NULL),
(24, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 07:33:37', '2015-01-31 07:33:37', NULL),
(25, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-01-31 07:35:14', '2015-01-31 07:35:14', NULL),
(26, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 09:50:24', '2015-01-31 09:50:24', NULL),
(27, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 09:50:28', '2015-01-31 09:50:28', NULL),
(28, 'capability_create', 'Capacidad Agregada', 'La capacidad Visualizar Metodos de Pago fue agregada exitosamente', 1, 'CREATE', '2015-01-31 09:51:28', '2015-01-31 09:51:28', NULL),
(29, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 09:51:28', '2015-01-31 09:51:28', NULL),
(30, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 09:51:42', '2015-01-31 09:51:42', NULL),
(31, 'capability_create', 'Capacidad Agregada', 'La capacidad Visualizar Cuentas de Facturación fue agregada exitosamente', 1, 'CREATE', '2015-01-31 09:52:19', '2015-01-31 09:52:19', NULL),
(32, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 09:52:20', '2015-01-31 09:52:20', NULL),
(33, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-01-31 09:52:23', '2015-01-31 09:52:23', NULL),
(34, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-01-31 09:52:28', '2015-01-31 09:52:28', NULL),
(35, 'role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas', 1, 'UPDATE', '2015-01-31 09:52:31', '2015-01-31 09:52:31', NULL),
(36, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-01-31 09:52:32', '2015-01-31 09:52:32', NULL),
(37, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-01-31 09:53:36', '2015-01-31 09:53:36', NULL),
(38, 'stock_get_index', 'Stock', 'Vizualización del listado de items disponibles en stock', 1, 'READ', '2015-01-31 09:58:16', '2015-01-31 09:58:16', NULL),
(39, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:37:42', '2015-01-31 10:37:42', NULL),
(40, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:39:03', '2015-01-31 10:39:03', NULL),
(41, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:42:40', '2015-01-31 10:42:40', NULL),
(42, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:43:04', '2015-01-31 10:43:04', NULL),
(43, 'client_get_index', 'Listado de clientes', 'Vizualización del listado de clientes', 1, 'READ', '2015-01-31 10:43:13', '2015-01-31 10:43:13', NULL),
(44, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:43:43', '2015-01-31 10:43:43', NULL),
(45, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 10:43:50', '2015-01-31 10:43:50', NULL),
(46, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 10:43:53', '2015-01-31 10:43:53', NULL),
(47, 'capability_create', 'Capacidad Agregada', 'La capacidad Crear Métodos de Pago fue agregada exitosamente', 1, 'CREATE', '2015-01-31 10:44:25', '2015-01-31 10:44:25', NULL),
(48, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 10:44:25', '2015-01-31 10:44:25', NULL),
(49, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 10:44:29', '2015-01-31 10:44:29', NULL),
(50, 'capability_create', 'Capacidad Agregada', 'La capacidad Editar Métodos de Pago fue agregada exitosamente', 1, 'CREATE', '2015-01-31 10:45:14', '2015-01-31 10:45:14', NULL),
(51, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 10:45:15', '2015-01-31 10:45:15', NULL),
(52, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 10:45:18', '2015-01-31 10:45:18', NULL),
(53, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:48:18', '2015-01-31 10:48:18', NULL),
(54, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 10:48:23', '2015-01-31 10:48:23', NULL),
(55, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 10:48:33', '2015-01-31 10:48:33', NULL),
(56, 'capability_controller_err', 'Error al agregar la capacidad', 'Error: el controlador PaymentMethodController@getIndex ya existe, intente con uno diferente.', 1, 'CREATE', '2015-01-31 10:49:27', '2015-01-31 10:49:27', NULL),
(57, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-01-31 10:49:28', '2015-01-31 10:49:28', NULL),
(58, 'capability_create', 'Capacidad Agregada', 'La capacidad Eliminar Métodos de Pago fue agregada exitosamente', 1, 'CREATE', '2015-01-31 10:49:54', '2015-01-31 10:49:54', NULL),
(59, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-01-31 10:49:54', '2015-01-31 10:49:54', NULL),
(60, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-01-31 10:49:59', '2015-01-31 10:49:59', NULL),
(61, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-01-31 10:50:02', '2015-01-31 10:50:02', NULL),
(62, 'role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas', 1, 'UPDATE', '2015-01-31 10:50:06', '2015-01-31 10:50:06', NULL),
(63, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-01-31 10:50:07', '2015-01-31 10:50:07', NULL),
(64, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:50:09', '2015-01-31 10:50:09', NULL),
(65, 'payment_method_get_create', 'Añadir Métodos de Pago', 'Adición de métodos de pago', 1, 'READ', '2015-01-31 10:51:14', '2015-01-31 10:51:14', NULL),
(66, 'payment_method_create', 'Método de Pago Agregado', 'El método de pago Débito fue agregado exitosamente', 1, 'CREATE', '2015-01-31 10:52:02', '2015-01-31 10:52:02', NULL),
(67, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:52:02', '2015-01-31 10:52:02', NULL),
(68, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:52:49', '2015-01-31 10:52:49', NULL),
(69, 'payment_method_get_edit', 'Editar Métodos de Pago', 'Edicion de métodos de pago', 1, 'READ', '2015-01-31 10:54:44', '2015-01-31 10:54:44', NULL),
(70, 'payment_method_get_edit', 'Editar Métodos de Pago', 'Edicion de métodos de pago', 1, 'READ', '2015-01-31 10:55:00', '2015-01-31 10:55:00', NULL),
(71, 'payment_method_get_edit', 'Editar Métodos de Pago', 'Edicion de métodos de pago', 1, 'READ', '2015-01-31 10:55:14', '2015-01-31 10:55:14', NULL),
(72, 'payment_method_edit', 'Método de Pago editado', 'El método de pago Débito fue editado exitosamente', 1, 'UPDATE', '2015-01-31 10:57:26', '2015-01-31 10:57:26', NULL),
(73, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:57:26', '2015-01-31 10:57:26', NULL),
(74, 'payment_method_get_delete', 'Eliminar Métodos de Pago', 'Eliminar registro de métodos de pago', 1, 'READ', '2015-01-31 10:57:37', '2015-01-31 10:57:37', NULL),
(75, 'payment_method_get_delete', 'Eliminar Métodos de Pago', 'Eliminar registro de métodos de pago', 1, 'READ', '2015-01-31 10:58:13', '2015-01-31 10:58:13', NULL),
(76, 'payment_method_delete', 'Método de Pago eliminada', 'El método de pago Débito fue eliminado exitosamente', 1, 'DELETE', '2015-01-31 10:58:17', '2015-01-31 10:58:17', NULL),
(77, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-01-31 10:58:17', '2015-01-31 10:58:17', NULL),
(78, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-01-31 11:04:35', '2015-01-31 11:04:35', NULL),
(79, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-01-31 11:06:10', '2015-01-31 11:06:10', NULL),
(80, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-08 00:34:30', '2015-02-08 00:34:30', NULL),
(81, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 00:35:08', '2015-02-08 00:35:08', NULL),
(82, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:35:19', '2015-02-08 00:35:19', NULL),
(83, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-08 00:35:39', '2015-02-08 00:35:39', NULL),
(84, 'capability_create', 'Capacidad Agregada', 'La capacidad Crear Cuentas de Facturación fue agregada exitosamente', 1, 'CREATE', '2015-02-08 00:37:15', '2015-02-08 00:37:15', NULL),
(85, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:37:16', '2015-02-08 00:37:16', NULL),
(86, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-08 00:37:45', '2015-02-08 00:37:45', NULL),
(87, 'capability_create', 'Capacidad Agregada', 'La capacidad Editar Cuentas de Facturación fue agregada exitosamente', 1, 'CREATE', '2015-02-08 00:38:16', '2015-02-08 00:38:16', NULL),
(88, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:38:18', '2015-02-08 00:38:18', NULL),
(89, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-08 00:38:31', '2015-02-08 00:38:31', NULL),
(90, 'capability_create', 'Capacidad Agregada', 'La capacidad Eliminar Cuentas de Facturación fue agregada exitosamente', 1, 'CREATE', '2015-02-08 00:38:59', '2015-02-08 00:38:59', NULL),
(91, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:39:00', '2015-02-08 00:39:00', NULL),
(92, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 00:39:45', '2015-02-08 00:39:45', NULL),
(93, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-08 00:39:53', '2015-02-08 00:39:53', NULL),
(94, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 00:39:59', '2015-02-08 00:39:59', NULL),
(95, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-08 00:40:03', '2015-02-08 00:40:03', NULL),
(96, 'role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas', 1, 'UPDATE', '2015-02-08 00:40:13', '2015-02-08 00:40:13', NULL),
(97, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 00:40:15', '2015-02-08 00:40:15', NULL),
(98, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 00:40:36', '2015-02-08 00:40:36', NULL),
(99, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:41:14', '2015-02-08 00:41:14', NULL),
(100, 'capability_get_edit', 'Editar capacidades', 'Edición de capacidades', 1, 'READ', '2015-02-08 00:41:30', '2015-02-08 00:41:30', NULL),
(101, 'capability_edit', 'Capacidad Editada', 'La capacidad Crear Cuentas de Facturación fue editada exitosamente', 1, 'UPDATE', '2015-02-08 00:41:39', '2015-02-08 00:41:39', NULL),
(102, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:41:41', '2015-02-08 00:41:41', NULL),
(103, 'capability_get_edit', 'Editar capacidades', 'Edición de capacidades', 1, 'READ', '2015-02-08 00:41:54', '2015-02-08 00:41:54', NULL),
(104, 'capability_edit', 'Capacidad Editada', 'La capacidad Editar Cuentas de Facturación fue editada exitosamente', 1, 'UPDATE', '2015-02-08 00:42:02', '2015-02-08 00:42:02', NULL),
(105, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:42:03', '2015-02-08 00:42:03', NULL),
(106, 'capability_get_edit', 'Editar capacidades', 'Edición de capacidades', 1, 'READ', '2015-02-08 00:42:19', '2015-02-08 00:42:19', NULL),
(107, 'capability_edit', 'Capacidad Editada', 'La capacidad Eliminar Cuentas de Facturación fue editada exitosamente', 1, 'UPDATE', '2015-02-08 00:42:29', '2015-02-08 00:42:29', NULL),
(108, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-08 00:42:30', '2015-02-08 00:42:30', NULL),
(109, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 00:42:41', '2015-02-08 00:42:41', NULL),
(110, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 00:42:46', '2015-02-08 00:42:46', NULL),
(111, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 00:50:09', '2015-02-08 00:50:09', NULL),
(112, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 00:50:28', '2015-02-08 00:50:28', NULL),
(113, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 00:51:02', '2015-02-08 00:51:02', NULL),
(114, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:03:29', '2015-02-08 01:03:29', NULL),
(115, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:07:53', '2015-02-08 01:07:53', NULL),
(116, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:09:06', '2015-02-08 01:09:06', NULL),
(117, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:11:38', '2015-02-08 01:11:38', NULL),
(118, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:12:23', '2015-02-08 01:12:23', NULL),
(119, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:12:36', '2015-02-08 01:12:36', NULL),
(120, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:13:22', '2015-02-08 01:13:22', NULL),
(121, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:18:27', '2015-02-08 01:18:27', NULL),
(122, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-08 01:28:44', '2015-02-08 01:28:44', NULL),
(123, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:28:45', '2015-02-08 01:28:45', NULL),
(124, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 01:29:02', '2015-02-08 01:29:02', NULL),
(125, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-08 01:29:09', '2015-02-08 01:29:09', NULL),
(126, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 01:30:12', '2015-02-08 01:30:12', NULL),
(127, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-08 01:30:19', '2015-02-08 01:30:19', NULL),
(128, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-08 01:31:32', '2015-02-08 01:31:32', NULL),
(129, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-08 01:31:51', '2015-02-08 01:31:51', NULL),
(130, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-08 01:31:59', '2015-02-08 01:31:59', NULL),
(131, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-02-08 01:54:44', '2015-02-08 01:54:44', NULL),
(132, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 01:54:45', '2015-02-08 01:54:45', NULL),
(133, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:54:51', '2015-02-08 01:54:51', NULL),
(134, 'invoice_account_create_image_err', 'Error al agregar el cuenta', 'El Archivo subido no cumple con los requisitos del sistema.', 1, 'CREATE', '2015-02-08 01:56:21', '2015-02-08 01:56:21', NULL),
(135, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:56:23', '2015-02-08 01:56:23', NULL),
(136, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:58:26', '2015-02-08 01:58:26', NULL),
(137, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 01:58:43', '2015-02-08 01:58:43', NULL),
(138, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 02:05:21', '2015-02-08 02:05:21', NULL),
(139, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 02:07:12', '2015-02-08 02:07:12', NULL),
(140, 'invoice_account_create', 'Cuenta Agregada', 'La cuenta Banesco  fue agregado exitosamente', 1, 'CREATE', '2015-02-08 02:08:06', '2015-02-08 02:08:06', NULL),
(141, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:08:07', '2015-02-08 02:08:07', NULL),
(142, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:09:01', '2015-02-08 02:09:01', NULL),
(143, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:10:37', '2015-02-08 02:10:37', NULL),
(144, 'invoice_account_get_edit', 'Editar Cuentas', 'Edicion de cuentas', 1, 'READ', '2015-02-08 02:14:17', '2015-02-08 02:14:17', NULL),
(145, 'invoice_account_get_edit', 'Editar Cuentas', 'Edicion de cuentas', 1, 'READ', '2015-02-08 02:15:54', '2015-02-08 02:15:54', NULL),
(146, 'invoice_account_edit', 'Cuenta Editar', 'La cuenta Banesco  fue editada exitosamente', 1, 'UPDATE', '2015-02-08 02:20:49', '2015-02-08 02:20:49', NULL),
(147, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:20:50', '2015-02-08 02:20:50', NULL),
(148, 'invoice_account_get_edit', 'Editar Cuentas', 'Edicion de cuentas', 1, 'READ', '2015-02-08 02:20:56', '2015-02-08 02:20:56', NULL),
(149, 'invoice_account_edit', 'Cuenta Editar', 'La cuenta Banesco  fue editada exitosamente', 1, 'UPDATE', '2015-02-08 02:21:23', '2015-02-08 02:21:23', NULL),
(150, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:21:25', '2015-02-08 02:21:25', NULL),
(151, 'invoice_account_get_create', 'Añadir Cuentas', 'Adición de cuentas', 1, 'READ', '2015-02-08 02:21:44', '2015-02-08 02:21:44', NULL),
(152, 'invoice_account_create', 'Cuenta Agregada', 'La cuenta Mercantil fue agregada exitosamente', 1, 'CREATE', '2015-02-08 02:22:28', '2015-02-08 02:22:28', NULL),
(153, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:22:29', '2015-02-08 02:22:29', NULL),
(154, 'invoice_account_get_delete', 'Eliminar Cuentas', 'Eliminar registro de cuentas', 1, 'READ', '2015-02-08 02:22:39', '2015-02-08 02:22:39', NULL),
(155, 'invoice_account_get_delete', 'Eliminar Cuentas', 'Eliminar registro de cuentas', 1, 'READ', '2015-02-08 02:24:26', '2015-02-08 02:24:26', NULL),
(156, 'invoice_account_delete', 'Cuenta eliminada', 'El cuenta Mercantil fue eliminado exitosamente', 1, 'DELETE', '2015-02-08 02:24:32', '2015-02-08 02:24:32', NULL),
(157, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:24:33', '2015-02-08 02:24:33', NULL),
(158, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-02-08 02:28:21', '2015-02-08 02:28:21', NULL),
(159, 'payment_method_get_create', 'Añadir Métodos de Pago', 'Adición de métodos de pago', 1, 'READ', '2015-02-08 02:28:28', '2015-02-08 02:28:28', NULL),
(160, 'payment_method_create', 'Método de Pago Agregado', 'El método de pago Crédito fue agregado exitosamente', 1, 'CREATE', '2015-02-08 02:28:50', '2015-02-08 02:28:50', NULL),
(161, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-02-08 02:28:51', '2015-02-08 02:28:51', NULL),
(162, 'payment_method_get_edit', 'Editar Métodos de Pago', 'Edicion de métodos de pago', 1, 'READ', '2015-02-08 02:28:57', '2015-02-08 02:28:57', NULL),
(163, 'payment_method_edit', 'Método de Pago editado', 'El método de pago Crédito fue editado exitosamente', 1, 'UPDATE', '2015-02-08 02:29:12', '2015-02-08 02:29:12', NULL),
(164, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-02-08 02:29:13', '2015-02-08 02:29:13', NULL),
(165, 'invoice_account_get_index', 'Listado de Cuentas', 'Vizualización del listado de cuentas', 1, 'READ', '2015-02-08 02:29:46', '2015-02-08 02:29:46', NULL),
(166, 'payment_method_get_index', 'Listado de Métodos de Pago', 'Vizualización del listado de métodos de pago', 1, 'READ', '2015-02-08 02:30:42', '2015-02-08 02:30:42', NULL),
(167, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-08 05:19:28', '2015-02-08 05:19:28', NULL),
(168, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-08 16:27:51', '2015-02-08 16:27:51', NULL),
(169, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-08 17:21:54', '2015-02-08 17:21:54', NULL),
(170, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-08 17:26:33', '2015-02-08 17:26:33', NULL),
(171, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-08 17:26:46', '2015-02-08 17:26:46', NULL),
(172, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-09 16:38:35', '2015-02-09 16:38:35', NULL),
(173, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-09 16:38:36', '2015-02-09 16:38:36', NULL),
(174, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-09 22:14:42', '2015-02-09 22:14:42', NULL),
(175, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:20:48', '2015-02-09 22:20:48', NULL),
(176, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:22:16', '2015-02-09 22:22:16', NULL),
(177, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:29:36', '2015-02-09 22:29:36', NULL),
(178, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:30:26', '2015-02-09 22:30:26', NULL),
(179, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:31:06', '2015-02-09 22:31:06', NULL),
(180, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:34:00', '2015-02-09 22:34:00', NULL),
(181, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 22:36:36', '2015-02-09 22:36:36', NULL),
(182, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:21:00', '2015-02-09 23:21:00', NULL),
(183, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-09 23:21:14', '2015-02-09 23:21:14', NULL),
(184, 'capability_create', 'Capacidad Agregada', 'La capacidad Crear Tareas fue agregada exitosamente', 1, 'CREATE', '2015-02-09 23:22:03', '2015-02-09 23:22:03', NULL),
(185, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:22:04', '2015-02-09 23:22:04', NULL),
(186, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-09 23:22:13', '2015-02-09 23:22:13', NULL),
(187, 'capability_create', 'Capacidad Agregada', 'La capacidad Editar Tareas fue agregada exitosamente', 1, 'CREATE', '2015-02-09 23:22:39', '2015-02-09 23:22:39', NULL),
(188, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:22:40', '2015-02-09 23:22:40', NULL),
(189, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-09 23:22:49', '2015-02-09 23:22:49', NULL),
(190, 'capability_create', 'Capacidad Agregada', 'La capacidad Eliminar Tareas fue agregada exitosamente', 1, 'CREATE', '2015-02-09 23:23:15', '2015-02-09 23:23:15', NULL),
(191, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:23:17', '2015-02-09 23:23:17', NULL),
(192, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-09 23:29:15', '2015-02-09 23:29:15', NULL),
(193, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:29:21', '2015-02-09 23:29:21', NULL),
(194, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-09 23:30:02', '2015-02-09 23:30:02', NULL),
(195, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-09 23:30:29', '2015-02-09 23:30:29', NULL),
(196, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-09 23:30:37', '2015-02-09 23:30:37', NULL),
(197, 'role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas', 1, 'UPDATE', '2015-02-09 23:30:47', '2015-02-09 23:30:47', NULL),
(198, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-09 23:30:48', '2015-02-09 23:30:48', NULL),
(199, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:35:04', '2015-02-09 23:35:04', NULL),
(200, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:35:25', '2015-02-09 23:35:25', NULL),
(201, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:42:29', '2015-02-09 23:42:29', NULL),
(202, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:43:57', '2015-02-09 23:43:57', NULL),
(203, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-09 23:44:18', '2015-02-09 23:44:18', NULL),
(204, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:45:51', '2015-02-09 23:45:51', NULL),
(205, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-09 23:51:24', '2015-02-09 23:51:24', NULL),
(206, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-09 23:51:31', '2015-02-09 23:51:31', NULL),
(207, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:05:14', '2015-02-10 00:05:14', NULL),
(208, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:08:49', '2015-02-10 00:08:49', NULL),
(209, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:13:03', '2015-02-10 00:13:03', NULL),
(210, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:14:09', '2015-02-10 00:14:09', NULL),
(211, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:14:32', '2015-02-10 00:14:32', NULL),
(212, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:16:29', '2015-02-10 00:16:29', NULL),
(213, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:20:48', '2015-02-10 00:20:48', NULL),
(214, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:21:00', '2015-02-10 00:21:00', NULL),
(215, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:24:46', '2015-02-10 00:24:46', NULL),
(216, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 00:25:05', '2015-02-10 00:25:05', NULL),
(217, 'task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-10 00:59:21', '2015-02-10 00:59:21', NULL),
(218, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 00:59:22', '2015-02-10 00:59:22', NULL),
(219, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:23:13', '2015-02-10 01:23:13', NULL),
(220, 'task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-10 01:24:03', '2015-02-10 01:24:03', NULL),
(221, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:24:05', '2015-02-10 01:24:05', NULL),
(222, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:24:43', '2015-02-10 01:24:43', NULL),
(223, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:24:49', '2015-02-10 01:24:49', NULL),
(224, 'task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-10 01:25:36', '2015-02-10 01:25:36', NULL),
(225, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:25:38', '2015-02-10 01:25:38', NULL),
(226, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:26:01', '2015-02-10 01:26:01', NULL),
(227, 'task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-10 01:26:18', '2015-02-10 01:26:18', NULL),
(228, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:26:20', '2015-02-10 01:26:20', NULL),
(229, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:27:38', '2015-02-10 01:27:38', NULL),
(230, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:28:16', '2015-02-10 01:28:16', NULL),
(231, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:29:42', '2015-02-10 01:29:42', NULL),
(232, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:29:58', '2015-02-10 01:29:58', NULL),
(233, 'task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-10 01:30:21', '2015-02-10 01:30:21', NULL),
(234, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:30:22', '2015-02-10 01:30:22', NULL),
(235, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 01:34:12', '2015-02-10 01:34:12', NULL),
(236, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:42:24', '2015-02-10 01:42:24', NULL),
(237, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:44:21', '2015-02-10 01:44:21', NULL),
(238, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:45:38', '2015-02-10 01:45:38', NULL),
(239, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:54:13', '2015-02-10 01:54:13', NULL),
(240, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:54:40', '2015-02-10 01:54:40', NULL),
(241, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 01:54:57', '2015-02-10 01:54:57', NULL),
(242, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-02-10 02:03:03', '2015-02-10 02:03:03', NULL),
(243, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-10 02:03:21', '2015-02-10 02:03:21', NULL),
(244, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-10 02:03:35', '2015-02-10 02:03:35', NULL),
(245, 'capability_create', 'Capacidad Agregada', 'La capacidad Activación de Usuarios fue agregada exitosamente', 1, 'CREATE', '2015-02-10 02:04:16', '2015-02-10 02:04:16', NULL),
(246, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-10 02:04:17', '2015-02-10 02:04:17', NULL),
(247, 'capability_get_create', 'Añadir capacidades', 'Adición de capacidades', 1, 'READ', '2015-02-10 02:04:42', '2015-02-10 02:04:42', NULL),
(248, 'capability_create', 'Capacidad Agregada', 'La capacidad Desactivar Usuarios fue agregada exitosamente', 1, 'CREATE', '2015-02-10 02:05:17', '2015-02-10 02:05:17', NULL),
(249, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-10 02:05:19', '2015-02-10 02:05:19', NULL),
(250, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-10 02:05:31', '2015-02-10 02:05:31', NULL),
(251, 'capability_get_index', 'Capacidades', 'Vizualización de capacidades', 1, 'READ', '2015-02-10 02:05:55', '2015-02-10 02:05:55', NULL),
(252, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-10 02:08:38', '2015-02-10 02:08:38', NULL),
(253, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-10 02:08:50', '2015-02-10 02:08:50', NULL),
(254, 'role_get_assign', 'Asignación de roles', 'Asignación de roles a un usuario del sistema', 1, 'READ', '2015-02-10 02:08:57', '2015-02-10 02:08:57', NULL),
(255, 'role_assign', 'Capacidades Asignadas', 'Las capacidades fueron exitosamente asignadas', 1, 'UPDATE', '2015-02-10 02:09:06', '2015-02-10 02:09:06', NULL),
(256, 'role_get_index', 'Roles', 'Vizualización del listado de roles en el sistema', 1, 'READ', '2015-02-10 02:09:07', '2015-02-10 02:09:07', NULL),
(257, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-02-10 02:10:26', '2015-02-10 02:10:26', NULL),
(258, 'users_activate', 'Usuario activado satisfactoriamente', 'El usuario Daniel Henriquez ha sido activado exitosamente', 1, 'UPDATE', '2015-02-10 02:10:37', '2015-02-10 02:10:37', NULL),
(259, 'users_get_create', 'Listado de Usuarios', 'Vizualización del listado de Usuarios', 1, 'READ', '2015-02-10 02:10:39', '2015-02-10 02:10:39', NULL),
(260, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:06:22', '2015-02-10 03:06:22', NULL),
(261, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:07:25', '2015-02-10 03:07:25', NULL),
(262, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:08:36', '2015-02-10 03:08:36', NULL),
(263, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:10:33', '2015-02-10 03:10:33', NULL),
(264, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:11:02', '2015-02-10 03:11:02', NULL),
(265, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:18:32', '2015-02-10 03:18:32', NULL),
(266, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:23:18', '2015-02-10 03:23:18', NULL),
(267, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:31:30', '2015-02-10 03:31:30', NULL),
(268, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:31:44', '2015-02-10 03:31:44', NULL),
(269, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:32:00', '2015-02-10 03:32:00', NULL),
(270, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:33:28', '2015-02-10 03:33:28', NULL),
(271, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:43:09', '2015-02-10 03:43:09', NULL),
(272, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:43:22', '2015-02-10 03:43:22', NULL),
(273, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:43:23', '2015-02-10 03:43:23', NULL),
(274, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:45:09', '2015-02-10 03:45:09', NULL),
(275, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:45:59', '2015-02-10 03:45:59', NULL),
(276, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:46:29', '2015-02-10 03:46:29', NULL),
(277, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:46:31', '2015-02-10 03:46:31', NULL),
(278, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:46:37', '2015-02-10 03:46:37', NULL),
(279, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:47:22', '2015-02-10 03:47:22', NULL),
(280, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:47:48', '2015-02-10 03:47:48', NULL),
(281, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:48:28', '2015-02-10 03:48:28', NULL),
(282, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:48:42', '2015-02-10 03:48:42', NULL),
(283, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:48:47', '2015-02-10 03:48:47', NULL),
(284, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:49:53', '2015-02-10 03:49:53', NULL),
(285, 'task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-10 03:49:58', '2015-02-10 03:49:58', NULL),
(286, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:50:02', '2015-02-10 03:50:02', NULL),
(287, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:50:08', '2015-02-10 03:50:08', NULL),
(288, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:50:18', '2015-02-10 03:50:18', NULL),
(289, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:52:24', '2015-02-10 03:52:24', NULL),
(290, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:52:30', '2015-02-10 03:52:30', NULL),
(291, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:52:32', '2015-02-10 03:52:32', NULL),
(292, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:55:36', '2015-02-10 03:55:36', NULL),
(293, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:55:56', '2015-02-10 03:55:56', NULL),
(294, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:56:15', '2015-02-10 03:56:15', NULL),
(295, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:56:28', '2015-02-10 03:56:28', NULL),
(296, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:56:29', '2015-02-10 03:56:29', NULL),
(297, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:56:35', '2015-02-10 03:56:35', NULL),
(298, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:56:52', '2015-02-10 03:56:52', NULL),
(299, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:56:53', '2015-02-10 03:56:53', NULL),
(300, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:56:58', '2015-02-10 03:56:58', NULL),
(301, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:57:12', '2015-02-10 03:57:12', NULL),
(302, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:57:13', '2015-02-10 03:57:13', NULL),
(303, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-10 03:57:20', '2015-02-10 03:57:20', NULL),
(304, 'task_edit', 'Tarea editada', 'La tarea  fue editada exitosamente', 1, 'CREATE', '2015-02-10 03:57:33', '2015-02-10 03:57:33', NULL),
(305, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 03:57:34', '2015-02-10 03:57:34', NULL),
(306, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:00:23', '2015-02-10 04:00:23', NULL),
(307, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:09:36', '2015-02-10 04:09:36', NULL),
(308, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:10:08', '2015-02-10 04:10:08', NULL),
(309, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:10:29', '2015-02-10 04:10:29', NULL),
(310, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:11:41', '2015-02-10 04:11:41', NULL),
(311, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:11:59', '2015-02-10 04:11:59', NULL),
(312, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:14:32', '2015-02-10 04:14:32', NULL),
(313, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:19:14', '2015-02-10 04:19:14', NULL),
(314, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:19:27', '2015-02-10 04:19:27', NULL),
(315, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:20:06', '2015-02-10 04:20:06', NULL),
(316, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:21:31', '2015-02-10 04:21:31', NULL),
(317, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:39:13', '2015-02-10 04:39:13', NULL),
(318, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:40:19', '2015-02-10 04:40:19', NULL),
(319, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:41:16', '2015-02-10 04:41:16', NULL),
(320, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:42:14', '2015-02-10 04:42:14', NULL),
(321, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:46:33', '2015-02-10 04:46:33', NULL),
(322, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:47:07', '2015-02-10 04:47:07', NULL),
(323, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:47:58', '2015-02-10 04:47:58', NULL),
(324, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:49:36', '2015-02-10 04:49:36', NULL),
(325, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 04:51:49', '2015-02-10 04:51:49', NULL),
(326, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:02:49', '2015-02-10 05:02:49', NULL),
(327, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:15:29', '2015-02-10 05:15:29', NULL),
(328, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:16:54', '2015-02-10 05:16:54', NULL),
(329, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:21:08', '2015-02-10 05:21:08', NULL),
(330, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:21:23', '2015-02-10 05:21:23', NULL),
(331, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:22:30', '2015-02-10 05:22:30', NULL),
(332, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:25:51', '2015-02-10 05:25:51', NULL),
(333, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:26:12', '2015-02-10 05:26:12', NULL),
(334, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:26:44', '2015-02-10 05:26:44', NULL),
(335, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 05:42:39', '2015-02-10 05:42:39', NULL),
(336, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:03:07', '2015-02-10 06:03:07', NULL),
(337, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:03:52', '2015-02-10 06:03:52', NULL),
(338, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:17:52', '2015-02-10 06:17:52', NULL),
(339, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:19:20', '2015-02-10 06:19:20', NULL),
(340, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:20:22', '2015-02-10 06:20:22', NULL),
(341, 'tasks_done', 'Tarea finalizada satisfactoriamente', 'El tarea Inicio del Proyecto ha sido finalizada exitosamente', 1, 'UPDATE', '2015-02-10 06:20:32', '2015-02-10 06:20:32', NULL),
(342, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:20:33', '2015-02-10 06:20:33', NULL),
(343, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:21:32', '2015-02-10 06:21:32', NULL),
(344, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:21:49', '2015-02-10 06:21:49', NULL),
(345, 'tasks_undone', 'Tarea regresada satisfactoriamente', 'La tarea Inicio del Proyecto ha sido regresada exitosamente', 1, 'UPDATE', '2015-02-10 06:22:58', '2015-02-10 06:22:58', NULL),
(346, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:22:59', '2015-02-10 06:22:59', NULL),
(347, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-10 06:24:52', '2015-02-10 06:24:52', NULL);
INSERT INTO `audits` (`id`, `name`, `title`, `description`, `id_user`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(348, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-11 01:26:00', '2015-02-11 01:26:00', NULL),
(349, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-14 00:37:09', '2015-02-14 00:37:09', NULL),
(350, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-14 01:06:50', '2015-02-14 01:06:50', NULL),
(351, 'tasks_done', 'Tarea finalizada satisfactoriamente', 'El tarea Inicio del Proyecto ha sido finalizada exitosamente', 1, 'UPDATE', '2015-02-14 01:06:58', '2015-02-14 01:06:58', NULL),
(352, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-14 01:07:00', '2015-02-14 01:07:00', NULL),
(353, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-14 01:11:47', '2015-02-14 01:11:47', NULL),
(354, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-16 15:51:07', '2015-02-16 15:51:07', NULL),
(355, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:35:17', '2015-02-16 17:35:17', NULL),
(356, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:37:40', '2015-02-16 17:37:40', NULL),
(357, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:38:05', '2015-02-16 17:38:05', NULL),
(358, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:38:23', '2015-02-16 17:38:23', NULL),
(359, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:39:45', '2015-02-16 17:39:45', NULL),
(360, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:40:35', '2015-02-16 17:40:35', NULL),
(361, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:40:44', '2015-02-16 17:40:44', NULL),
(362, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:40:57', '2015-02-16 17:40:57', NULL),
(363, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:41:16', '2015-02-16 17:41:16', NULL),
(364, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:43:27', '2015-02-16 17:43:27', NULL),
(365, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:43:48', '2015-02-16 17:43:48', NULL),
(366, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:44:10', '2015-02-16 17:44:10', NULL),
(367, 'my_task_create_err', 'Error al agregar la tarea', 'Debe Seleccionar una Tarea Padre.', 1, 'CREATE', '2015-02-16 17:46:27', '2015-02-16 17:46:27', NULL),
(368, 'my_task_get_create', 'Añadir tareas', 'Adición de tareas', 1, 'READ', '2015-02-16 17:46:29', '2015-02-16 17:46:29', NULL),
(369, 'my_task_create', 'Tarea agregada', 'La tarea  fue agregada exitosamente', 1, 'CREATE', '2015-02-16 17:46:51', '2015-02-16 17:46:51', NULL),
(370, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:46:52', '2015-02-16 17:46:52', NULL),
(371, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-16 17:49:04', '2015-02-16 17:49:04', NULL),
(372, 'task_get_edit', 'Editar tareas', 'Edición de tareas', 1, 'READ', '2015-02-16 17:49:25', '2015-02-16 17:49:25', NULL),
(373, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:53:23', '2015-02-16 17:53:23', NULL),
(374, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:54:15', '2015-02-16 17:54:15', NULL),
(375, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:54:36', '2015-02-16 17:54:36', NULL),
(376, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:55:32', '2015-02-16 17:55:32', NULL),
(377, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:56:06', '2015-02-16 17:56:06', NULL),
(378, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:56:22', '2015-02-16 17:56:22', NULL),
(379, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:57:00', '2015-02-16 17:57:00', NULL),
(380, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:58:43', '2015-02-16 17:58:43', NULL),
(381, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 17:59:34', '2015-02-16 17:59:34', NULL),
(382, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 18:01:22', '2015-02-16 18:01:22', NULL),
(383, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-16 18:01:54', '2015-02-16 18:01:54', NULL),
(384, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-17 02:50:04', '2015-02-17 02:50:04', NULL),
(385, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-17 03:21:34', '2015-02-17 03:21:34', NULL),
(386, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-17 03:24:27', '2015-02-17 03:24:27', NULL),
(387, 'my_tasks_undone', 'Tarea regresada satisfactoriamente', 'La tarea Inicio del Proyecto ha sido regresada exitosamente', 1, 'UPDATE', '2015-02-17 03:24:53', '2015-02-17 03:24:53', NULL),
(388, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-17 03:24:54', '2015-02-17 03:24:54', NULL),
(389, 'my_tasks_done', 'Tarea finalizada satisfactoriamente', 'El tarea Media Tarea ha sido finalizada exitosamente', 1, 'UPDATE', '2015-02-17 03:25:05', '2015-02-17 03:25:05', NULL),
(390, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 1, 'READ', '2015-02-17 03:25:07', '2015-02-17 03:25:07', NULL),
(391, 'project_get_index', 'Proyectos', 'Vizualización de Proyectos', 1, 'READ', '2015-02-17 03:25:39', '2015-02-17 03:25:39', NULL),
(392, 'auth_logout', 'Cierre de Sesión', 'El usuario AlexanderZon ha Cerrado Sesión', 1, 'DELETE', '2015-02-17 03:29:27', '2015-02-17 03:29:27', NULL),
(393, 'auth_login', 'Inicio de Sesión', 'El usuario robertdacorte ha Iniciado Sesión', 2, 'CREATE', '2015-02-17 03:29:52', '2015-02-17 03:29:52', NULL),
(394, 'dashboard_get_index', 'Escritorio', 'Vizualización del Escritorio', 2, 'READ', '2015-02-17 03:32:00', '2015-02-17 03:32:00', NULL),
(395, 'dashboard_get_index', 'Escritorio', 'Vizualización del Escritorio', 2, 'READ', '2015-02-17 03:32:24', '2015-02-17 03:32:24', NULL),
(396, 'category_get_index', 'Categorias', 'Vizualización de Categorias', 2, 'READ', '2015-02-17 03:32:35', '2015-02-17 03:32:35', NULL),
(397, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:32:48', '2015-02-17 03:32:48', NULL),
(398, 'my_tasks_activate', 'Tarea iniciada satisfactoriamente', 'La tarea Tercera Tarea ha sido iniciada exitosamente', 2, 'UPDATE', '2015-02-17 03:33:17', '2015-02-17 03:33:17', NULL),
(399, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:33:19', '2015-02-17 03:33:19', NULL),
(400, 'my_tasks_done', 'Tarea finalizada satisfactoriamente', 'El tarea Tercera Tarea ha sido finalizada exitosamente', 2, 'UPDATE', '2015-02-17 03:33:33', '2015-02-17 03:33:33', NULL),
(401, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:33:35', '2015-02-17 03:33:35', NULL),
(402, 'project_get_index', 'Proyectos', 'Vizualización de Proyectos', 2, 'READ', '2015-02-17 03:33:49', '2015-02-17 03:33:49', NULL),
(403, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:33:55', '2015-02-17 03:33:55', NULL),
(404, 'tasks_done', 'Tarea finalizada satisfactoriamente', 'El tarea Inicio del Proyecto ha sido finalizada exitosamente', 2, 'UPDATE', '2015-02-17 03:34:01', '2015-02-17 03:34:01', NULL),
(405, 'task_get_index', 'Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:34:02', '2015-02-17 03:34:02', NULL),
(406, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:34:09', '2015-02-17 03:34:09', NULL),
(407, 'my_tasks_activate', 'Tarea iniciada satisfactoriamente', 'La tarea Finalizar Proyecto ha sido iniciada exitosamente', 2, 'UPDATE', '2015-02-17 03:34:15', '2015-02-17 03:34:15', NULL),
(408, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:34:16', '2015-02-17 03:34:16', NULL),
(409, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:35:36', '2015-02-17 03:35:36', NULL),
(410, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:36:22', '2015-02-17 03:36:22', NULL),
(411, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:37:28', '2015-02-17 03:37:28', NULL),
(412, 'my_task_get_index', 'Mis Tareas', 'Vizualización de Tareas', 2, 'READ', '2015-02-17 03:38:16', '2015-02-17 03:38:16', NULL),
(413, 'project_get_index', 'Proyectos', 'Vizualización de Proyectos', 2, 'READ', '2015-02-17 03:44:15', '2015-02-17 03:44:15', NULL),
(414, 'material_get_index', 'Materiales', 'Vizualización de Materiales', 2, 'READ', '2015-02-17 03:51:40', '2015-02-17 03:51:40', NULL),
(415, 'material_get_index', 'Materiales', 'Vizualización de Materiales', 2, 'READ', '2015-02-17 03:54:27', '2015-02-17 03:54:27', NULL),
(416, 'material_get_index', 'Materiales', 'Vizualización de Materiales', 2, 'READ', '2015-02-17 03:55:35', '2015-02-17 03:55:35', NULL),
(417, 'material_get_index', 'Materiales', 'Vizualización de Materiales', 2, 'READ', '2015-02-17 03:58:01', '2015-02-17 03:58:01', NULL),
(418, 'auth_login', 'Inicio de Sesión', 'El usuario AlexanderZon ha Iniciado Sesión', 1, 'CREATE', '2015-02-18 02:45:03', '2015-02-18 02:45:03', NULL),
(419, 'dashboard_get_index', 'Escritorio', 'Vizualización del Escritorio', 1, 'READ', '2015-02-18 02:45:05', '2015-02-18 02:45:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capabilities`
--

CREATE TABLE IF NOT EXISTS `capabilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `capabilities`
--

INSERT INTO `capabilities` (`id`, `name`, `title`, `description`, `controller`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dashboard_view_get', 'Visualizar Escritorio', '', 'DashboardController@getIndex', '2015-01-26 16:15:12', '2015-01-26 16:23:27', NULL),
(2, 'users_view_get', 'Visualizar Usuarios', '', 'UserController@getIndex', '2015-01-26 16:15:12', '2015-01-26 16:39:34', NULL),
(3, 'users_create_get', 'Crear Usuarios', '', 'UserController@getCreate', '2015-01-26 16:15:12', '2015-01-26 16:38:44', NULL),
(4, 'users_edit_get', 'Editar Usuarios', '', 'UserController@getEdit', '2015-01-26 16:15:12', '2015-01-26 16:39:01', NULL),
(5, 'users_delete_get', 'Eliminar Usuarios', '', 'UserController@getDelete', '2015-01-26 16:15:12', '2015-01-26 16:39:16', NULL),
(6, 'capabilities_view_get', 'Visualizar Capacidades', '', 'CapabilityController@getIndex', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(7, 'capabilities_create_get', 'Crear Capacidades', '', 'CapabilityController@getCreate', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(8, 'capabilities_edit_get', 'Editar Capacidades', '', 'CapabilityController@getEdit', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(9, 'capabilities_delete_get', 'Eliminar Capacidades', '', 'CapabilityController@getDelete', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(10, 'roles_view_get', 'Visualizar Roles', '', 'RoleController@getIndex', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(11, 'roles_create_get', 'Crear Roles', '', 'RoleController@getCreate', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(12, 'roles_edit_get', 'Editar Roles', '', 'RoleController@getEdit', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(13, 'roles_delete_get', 'Eliminar Roles', '', 'RoleController@getDelete', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(14, 'roles_assign_get', 'Asignar Capacidades ', '', 'RoleController@getAssign', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(15, 'stock_view_get', 'Visualizar Stock', '', 'StockController@getIndex', '2015-01-28 00:49:36', '2015-01-28 00:49:36', NULL),
(16, 'stock_create_get', 'Crear Items de Stock', '', 'StockController@getCreate', '2015-01-28 00:50:14', '2015-01-28 00:50:14', NULL),
(17, 'stock_edit_get', 'Editar Stock', '', 'StockController@getEdit', '2015-01-28 00:50:44', '2015-01-28 00:50:44', NULL),
(18, 'stock_delete_get', 'Eliminar Stock', '', 'StockController@getDelete', '2015-01-28 00:51:49', '2015-01-28 00:51:49', NULL),
(19, 'categories_view_get', 'Visualizar Categorias', '', 'CategoryController@getIndex', '2015-01-28 00:53:28', '2015-01-28 00:53:28', NULL),
(20, 'categories_create_get', 'Crear Categorias', '', 'CategoryController@getCreate', '2015-01-28 00:54:15', '2015-01-28 00:54:15', NULL),
(21, 'categories_edit_get', 'Editar Categorias', '', 'CategoryController@getEdit', '2015-01-28 00:55:16', '2015-01-28 00:55:16', NULL),
(22, 'categories_delete_get', 'Eliminar Categorias', '', 'CategoryController@getDelete', '2015-01-28 00:55:49', '2015-01-28 00:55:49', NULL),
(23, 'measurement_units_view_get', 'Visualizar Unidades de Medida', '', 'MeasurementUnitController@getIndex', '2015-01-28 00:58:17', '2015-01-28 00:58:17', NULL),
(24, 'measurement_units_create_get', 'Crear Unidades de Medida', '', 'MeasurementUnitController@getCreate', '2015-01-28 00:59:09', '2015-01-28 00:59:09', NULL),
(25, 'measurement_units_edit_get', 'Editar Unidades de Medida', '', 'MeasurementUnitController@getEdit', '2015-01-28 00:59:42', '2015-01-28 00:59:42', NULL),
(26, 'measurement_units_delete_get', 'Eliminar Unidades de Medida', '', 'MeasurementUnitController@getDelete', '2015-01-28 01:00:22', '2015-01-28 01:00:22', NULL),
(27, 'clients_view_get', 'Visualizar Clientes', '', 'ClientController@getIndex', '2015-01-28 01:38:05', '2015-01-28 01:38:05', NULL),
(28, 'clients_create_get', 'Crear Clientes', '', 'ClientController@getCreate', '2015-01-28 01:38:28', '2015-01-28 01:38:28', NULL),
(29, 'clients_edit_get', 'Editar Clientes', '', 'ClientController@getEdit', '2015-01-28 01:39:09', '2015-01-28 01:39:09', NULL),
(30, 'clients_delete_get', 'Eliminar Clientes', '', 'ClientController@getDelete', '2015-01-28 01:40:07', '2015-01-28 01:40:07', NULL),
(31, 'persons_view_get', 'Visualizar Personas', '', 'PersonController@getIndex', '2015-01-30 02:02:52', '2015-01-30 02:02:52', NULL),
(32, 'providers_view_get', 'Visualizar Proveedores', '', 'ProviderController@getIndex', '2015-01-30 02:04:24', '2015-01-30 02:07:04', NULL),
(33, 'locations_view_get', 'Visualizar Localidades', '', 'LocationController@getIndex', '2015-01-30 02:05:10', '2015-01-30 02:05:10', NULL),
(34, 'persons_create_get', 'Crear Personas', '', 'PersonController@getCreate', '2015-01-30 02:52:10', '2015-01-30 02:52:10', NULL),
(35, 'persons_edit_get', 'Editar Personas', '', 'PersonController@getEdit', '2015-01-30 02:52:49', '2015-01-30 02:52:49', NULL),
(36, 'persons_delete_get', 'Eliminar Personas', '', 'PersonController@getDelete', '2015-01-30 02:53:33', '2015-01-30 02:56:33', NULL),
(37, 'locations_create_get', 'Crear Localidades', '', 'LocationController@getCreate', '2015-01-30 02:54:36', '2015-01-30 02:54:36', NULL),
(38, 'locations_edit_get', 'Editar Localidades', '', 'LocationController@getEdit', '2015-01-30 02:55:07', '2015-01-30 02:55:07', NULL),
(39, 'locations_delete_get', 'Eliminar Localidades', '', 'LocationController@getDelete', '2015-01-30 02:55:38', '2015-01-30 02:56:00', NULL),
(40, 'providers_create_get', 'Crear Proveedores', '', 'ProviderController@getCreate', '2015-01-31 01:28:10', '2015-01-31 01:28:10', NULL),
(41, 'providers_edit_get', 'Editar Proveedores', '', 'ProviderController@getEdit', '2015-01-31 01:28:55', '2015-01-31 01:29:18', NULL),
(42, 'providers_delete_get', 'Eliminar Proveedores', '', 'ProviderController@getDelete', '2015-01-31 01:30:07', '2015-01-31 01:30:07', NULL),
(43, 'users_show_get', 'Visualizar Detalle de Usuario', '', 'UserController@getShow', '2015-01-31 04:47:03', '2015-01-31 04:47:03', NULL),
(44, 'projects_view_get', 'Visualizar Proyectos', '', 'ProjectController@getIndex', '2015-01-31 05:09:08', '2015-01-31 05:09:08', NULL),
(45, 'tasks_view_get', 'Visualizar Tareas', '', 'TaskController@getIndex', '2015-01-31 05:09:39', '2015-01-31 05:09:39', NULL),
(46, 'materials_view_get', 'Visualizar Materiales', '', 'MaterialController@getIndex', '2015-01-31 05:10:09', '2015-01-31 05:10:09', NULL),
(47, 'projects_create_get', 'Crear Proyectos', '', 'ProjectController@getCreate', '2015-01-31 05:32:32', '2015-01-31 05:32:32', NULL),
(48, 'projects_edit_get', 'Editar Proyectos', '', 'ProjectController@getEdit', '2015-01-31 05:32:53', '2015-01-31 05:32:53', NULL),
(49, 'projects_delete_get', 'Eliminar Proyectos', '', 'ProjectController@getDelete', '2015-01-31 05:33:42', '2015-01-31 05:33:42', NULL),
(50, 'payment_methods_view_get', 'Visualizar Metodos de Pago', '', 'PaymentMethodController@getIndex', '2015-01-31 09:51:28', '2015-01-31 09:51:28', NULL),
(51, 'invoice_accounts_view_get', 'Visualizar Cuentas de Facturación', '', 'InvoiceAccountController@getIndex', '2015-01-31 09:52:19', '2015-01-31 09:52:19', NULL),
(52, 'payment_methods_create_get', 'Crear Métodos de Pago', '', 'PaymentMethodController@getCreate', '2015-01-31 10:44:25', '2015-01-31 10:44:25', NULL),
(53, 'payment_methods_edit_get', 'Editar Métodos de Pago', '', 'PaymentMethodController@getEdit', '2015-01-31 10:45:14', '2015-01-31 10:45:14', NULL),
(54, 'payment_methods_delete_get', 'Eliminar Métodos de Pago', '', 'PaymentMethodController@getDelete', '2015-01-31 10:49:54', '2015-01-31 10:49:54', NULL),
(55, 'invoice_accounts_create_get', 'Crear Cuentas de Facturación', '', 'InvoiceAccountController@getCreate', '2015-02-08 00:37:15', '2015-02-08 00:41:39', NULL),
(56, 'invoice_accounts_edit_get', 'Editar Cuentas de Facturación', '', 'InvoiceAccountController@getEdit', '2015-02-08 00:38:16', '2015-02-08 00:42:02', NULL),
(57, 'invoice_accounts_delete_get', 'Eliminar Cuentas de Facturación', '', 'InvoiceAccountController@getDelete', '2015-02-08 00:38:59', '2015-02-08 00:42:28', NULL),
(58, 'tasks_create_get', 'Crear Tareas', '', 'TaskController@getCreate', '2015-02-09 23:22:03', '2015-02-09 23:22:03', NULL),
(59, 'tasks_edit_get', 'Editar Tareas', '', 'TaskController@getEdit', '2015-02-09 23:22:39', '2015-02-09 23:22:39', NULL),
(60, 'tasks_delete_get', 'Eliminar Tareas', '', 'TaskController@getDelete', '2015-02-09 23:23:15', '2015-02-09 23:23:15', NULL),
(61, 'users_activate_get', 'Activación de Usuarios', '', 'UserController@getActivate', '2015-02-10 02:04:16', '2015-02-10 02:04:16', NULL),
(62, 'users_deactivate_get', 'Desactivar Usuarios', '', 'UserController@getDeactivate', '2015-02-10 02:05:17', '2015-02-10 02:05:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Metales', 'Cabillas, Alambres, Láminas', 'stock', '', '2015-01-28 01:08:30', '2015-01-28 01:08:30', NULL),
(2, 'Maderas', 'Contrachapados', 'stock', '', '2015-01-28 01:10:37', '2015-01-28 01:10:37', NULL),
(3, 'Clavos', '', 'stock', '', '2015-01-28 01:13:32', '2015-01-28 01:13:32', NULL),
(4, 'Tornillos', '', 'stock', '', '2015-01-28 01:13:44', '2015-01-28 01:13:44', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `identification_number`, `email`, `phone`, `id_person`, `id_location`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Magicmedia', 'J405064943', 'magicmediave@gmail.com', '02432831372', 4, 2, '', '', '2015-01-31 05:00:15', '2015-01-31 05:00:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_authorized`
--

CREATE TABLE IF NOT EXISTS `client_authorized` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_conventions`
--

CREATE TABLE IF NOT EXISTS `client_conventions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correlative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_invoice_account` int(11) NOT NULL,
  `id_sale_order` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_accounts`
--

CREATE TABLE IF NOT EXISTS `invoice_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `header` longtext COLLATE utf8_unicode_ci NOT NULL,
  `footer` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `invoice_accounts`
--

INSERT INTO `invoice_accounts` (`id`, `name`, `header`, `footer`, `image_url`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banesco ', '													<p><img src="data:image/jpeg;base64,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" data-filename="WIN_20150125_184324.JPG" class="img-circle" style="line-height: 1.42857143; width: 25%;">&nbsp;<br></p><p><br></p>\r\n												', '																																						<table class="table table-bordered"><tbody><tr><td>Nombres</td><td>Apellidos</td></tr><tr><td>Alexis Anderson</td><td>Montenegro Reyes</td></tr><tr><td><br></td><td><br></td></tr></tbody></table>\r\n												\r\n												', '', 'Corriente', 'active', '2015-02-08 02:08:06', '2015-02-08 02:21:23', NULL);
INSERT INTO `invoice_accounts` (`id`, `name`, `header`, `footer`, `image_url`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Mercantil', '												', '												', '', 'Ahorro', 'inactive', '2015-02-08 02:22:28', '2015-02-08 02:24:32', '2015-02-08 02:24:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name`, `description`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Maracay - La Romana', 'Sector La Romana', 'location', 'active', '2015-01-30 03:56:24', '2015-01-30 04:01:12', '2015-01-30 04:01:12'),
(2, 'Maracay - La Romana', 'Urbanización La Romana', 'location', 'active', '2015-01-31 01:37:46', '2015-01-31 01:37:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_stock` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `units` float(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `measurement_units`
--

CREATE TABLE IF NOT EXISTS `measurement_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `measurement_units`
--

INSERT INTO `measurement_units` (`id`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Metros', 'm', '2015-01-28 01:06:36', '2015-01-28 01:06:36'),
(2, 'Centímetros', 'cm', '2015-01-28 01:07:07', '2015-01-28 01:07:07'),
(3, 'Kilogramos', 'kg', '2015-01-28 01:07:30', '2015-01-28 01:07:30'),
(4, 'Gramos', 'g', '2015-01-28 01:07:41', '2015-01-28 01:07:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_05_163122_create_clients_table', 1),
('2015_01_05_163259_create_client_authorized_table', 1),
('2015_01_05_163405_create_client_conventions_table', 1),
('2015_01_05_163431_create_persons_table', 1),
('2015_01_05_163457_create_locations_table', 1),
('2015_01_05_163534_create_sellers_table', 1),
('2015_01_05_163605_create_invoice_accounts_table', 1),
('2015_01_05_163630_create_invoices_table', 1),
('2015_01_05_163701_create_sale_orders_table', 1),
('2015_01_05_163732_create_receipts_table', 1),
('2015_01_05_163809_create_payment_methods_table', 1),
('2015_01_05_163843_create_purchase_orders_table', 1),
('2015_01_05_163915_create_projects_table', 1),
('2015_01_05_164022_create_materials_table', 1),
('2015_01_05_164052_create_stock_table', 1),
('2015_01_05_164140_create_measurement_units_table', 1),
('2015_01_05_164210_create_providers_table', 1),
('2015_01_05_164349_create_provider_invoices_table', 1),
('2015_01_05_164424_create_provider_items_table', 1),
('2015_01_05_164453_create_categories_table', 1),
('2015_01_05_212719_create_users_table', 1),
('2015_01_06_002911_create_roles_table', 1),
('2015_01_06_002951_create_capabilities_table', 1),
('2015_01_07_212659_create_options_table', 1),
('2015_01_07_212742_create_audits_table', 1),
('2015_01_07_212758_create_tasks_table', 1),
('2015_01_07_212823_create_messages_table', 1),
('2015_01_07_213423_create_role_capabilities_table', 1),
('2015_01_07_214401_create_user_tasks_table', 1),
('2015_01_07_225827_create_message_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `options_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `description`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Crédito', 'Tarjeta de Crédito Bancario', 'payment_method', 'active', '2015-02-08 02:28:50', '2015-02-08 02:29:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `persons`
--

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `identification_number`, `email`, `phone`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alexis Anderson', 'Montenegro Reyes', 'V23498535', 'amontenegro.sistemas@gmail.com', '+584243134301', 'client_representant', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Yoselin Susana', 'Chacin Martínez', 'V24443306', 'susanaunefa@hotmail.com', '04241234567', 'person', 'active', '2015-01-28 04:03:10', '2015-01-30 03:39:34', '2015-01-30 03:39:34'),
(3, 'Antony Robert', 'Borges Dacorte', 'V18554560', 'robertdacorte@gmail.com', '04241234567', 'person', 'active', '2015-01-30 03:11:59', '2015-01-30 03:11:59', NULL),
(4, 'Fredo', 'Godofredo', 'V96385274', 'fredogodofredo@gmail.com', '04147894651', 'provider_representant', 'active', '2015-01-31 01:44:25', '2015-01-31 01:44:25', NULL),
(5, 'Hebber', 'McGubber', 'V14725836', 'hebbermcgubber@gmail.com', '02437418523', 'provider_representant', 'active', '2015-01-31 01:46:57', '2015-01-31 01:46:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `code`, `name`, `description`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'A000001', 'Primer Proyecto Editado', 'Esta es una descripción', '', 'active', '2015-02-08 06:03:46', '2015-02-09 19:17:01', '2015-02-09 19:17:01'),
(7, 'A000002', 'Segundo Proyecto', 'descripcion de proyecto', '', 'active', '2015-02-09 17:18:46', '2015-02-09 17:18:46', NULL),
(8, 'A000004', 'Tercer Proyecto', 'Esta es la descripcion del proyecto', '', 'active', '2015-02-16 16:58:58', '2015-02-16 16:58:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE IF NOT EXISTS `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_location` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `name`, `identification_number`, `email`, `phone`, `id_person`, `id_location`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Parmalat', 'J1234567981', 'ventas@parmalat.com.ve', '02437654321', 5, 2, '', '', '2015-01-31 01:44:32', '2015-01-31 02:04:34', '2015-01-31 02:04:34'),
(2, 'Bimbo', 'J789456123', 'ventas@bimbo.com', '02431234567', 4, 2, '', '', '2015-01-31 02:03:04', '2015-01-31 02:03:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_invoices`
--

CREATE TABLE IF NOT EXISTS `provider_invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correlative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_purchase_order` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_items`
--

CREATE TABLE IF NOT EXISTS `provider_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `units` float(8,2) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_purchase_order` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase_orders`
--

CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(16,2) NOT NULL,
  `id_sale_order` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `receipts`
--

INSERT INTO `receipts` (`id`, `name`, `description`, `amount`, `id_sale_order`, `id_payment_method`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adelanto de Proyecto', 'Adelanto para Proyecto: Primer Proyecto', 120000.00, 5, 2, 'advancement', 'active', '2015-02-08 06:03:46', '2015-02-09 19:17:01', '2015-02-09 19:17:01'),
(2, 'Adelanto de Proyecto', 'Adelanto para Proyecto: Segundo Proyecto', 230000.00, 6, 2, 'advancement', 'active', '2015-02-09 17:18:46', '2015-02-09 17:18:46', NULL),
(3, 'Adelanto de Proyecto', 'Adelanto para Proyecto: Tercer Proyecto', 50000.00, 7, 2, 'advancement', 'active', '2015-02-16 16:58:58', '2015-02-16 16:58:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'Super Administrador', 'active', '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(2, 'administrator', 'Administrador', 'active', '2015-01-31 04:43:40', '2015-01-31 04:43:40', NULL),
(3, 'seller', 'Vendedor', 'active', '2015-01-31 07:31:33', '2015-01-31 07:32:45', '2015-01-31 07:32:45'),
(4, 'seller', 'Vendedor', 'active', '2015-01-31 07:33:13', '2015-01-31 07:33:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_capabilities`
--

CREATE TABLE IF NOT EXISTS `role_capabilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_capability` int(10) unsigned NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_capabilities_id_capability_index` (`id_capability`),
  KEY `role_capabilities_id_role_index` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=109 ;

--
-- Volcado de datos para la tabla `role_capabilities`
--

INSERT INTO `role_capabilities` (`id`, `id_capability`, `id_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(2, 2, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(6, 6, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(7, 7, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(8, 8, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(9, 9, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(10, 10, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(11, 11, 1, '2015-01-26 16:15:13', '2015-01-26 16:15:13', NULL),
(12, 12, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(13, 13, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(14, 14, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(16, 4, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(17, 5, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(18, 3, 1, '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL),
(19, 16, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 17, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(21, 18, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(22, 15, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(23, 20, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(24, 21, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(25, 22, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(26, 19, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(27, 24, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(28, 25, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(29, 26, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(30, 23, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(31, 28, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(32, 29, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(33, 30, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(34, 27, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(35, 33, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(36, 31, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(37, 32, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(38, 37, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(39, 34, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(40, 38, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(41, 35, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(42, 39, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(43, 36, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(44, 40, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(45, 41, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(46, 42, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(47, 14, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(48, 7, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(49, 20, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(50, 28, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(51, 16, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(52, 37, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(53, 34, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(54, 40, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(55, 11, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(56, 24, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(57, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(58, 8, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(59, 21, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(60, 29, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(61, 38, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(62, 35, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(63, 41, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(64, 12, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(65, 17, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(66, 25, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(67, 4, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(68, 9, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(69, 22, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(70, 30, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(71, 39, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(72, 36, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(73, 42, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(74, 13, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(75, 18, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(76, 26, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(77, 5, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(78, 6, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(79, 19, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(80, 27, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(81, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(82, 33, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(83, 31, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(84, 32, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(85, 10, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(86, 15, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(87, 23, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(88, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(89, 43, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(90, 46, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(91, 44, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(92, 45, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(93, 47, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(94, 48, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(95, 49, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(96, 51, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(97, 50, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(98, 52, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(99, 53, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(100, 54, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(101, 55, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(102, 56, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(103, 57, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(104, 58, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(105, 59, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(106, 60, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(107, 61, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(108, 62, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_orders`
--

CREATE TABLE IF NOT EXISTS `sale_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correlative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `budget` float(16,2) NOT NULL,
  `period_days` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `sale_orders`
--

INSERT INTO `sale_orders` (`id`, `correlative`, `date`, `budget`, `period_days`, `id_client`, `id_seller`, `id_project`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '000123458', '1969-12-31', 850000.00, 100, 1, 3, 6, '', 'active', '2015-02-08 06:03:46', '2015-02-09 19:17:01', '2015-02-09 19:17:01'),
(6, '000123457', '2015-02-03', 1200000.00, 150, 1, 3, 7, '', 'active', '2015-02-09 17:18:46', '2015-02-16 17:03:03', NULL),
(7, '000123459', '2015-02-25', 120000.00, 50, 1, 3, 8, '', 'active', '2015-02-16 16:58:58', '2015-02-16 16:58:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `id_measurement_unit` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `units` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `name`, `description`, `id_measurement_unit`, `id_category`, `units`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Clavos', '\r\n', 4, 3, 200.00, '2015-01-28 01:33:28', '2015-01-28 01:33:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `hours`, `id_project`, `id_parent`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Inicio del Proyecto', 'Esta es la descripción de la tarea', 20, 7, 0, '', 'done', '2015-02-10 00:59:21', '2015-02-17 03:34:01', NULL),
(2, 'Finalizar Proyecto', 'Descripcion del fin', 40, 7, 1, '', 'active', '2015-02-10 01:24:03', '2015-02-17 03:34:15', NULL),
(3, 'Media Tarea', 'Esta es la descripción de la tarea 2', 16, 7, 0, '', 'done', '2015-02-10 01:25:36', '2015-02-17 03:25:05', NULL),
(4, 'Tercera Tarea', 'Mini descripcion', 32, 7, 0, '', 'done', '2015-02-10 01:26:18', '2015-02-17 03:33:33', NULL),
(5, 'Tarea Hija', 'Esta es la descripción de la tarea hija', 64, 7, 1, '', 'inactive', '2015-02-10 01:30:21', '2015-02-10 01:30:21', NULL),
(6, 'Titulo', 'Descripcion', 6, 7, 1, '', 'inactive', '2015-02-16 17:46:50', '2015-02-16 17:46:50', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `displayname`, `email`, `password`, `id_role`, `status`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 'Alexis', 'Montenegro', 'AlexanderZon', 'Alexis Montenegro', 'amontenegro@magicmedia.com.ve', '$2y$10$n2GSpFQogYh6QitwvS/ycuN4xekWRUdhUmR9xIrngwDMuE1G5v.pS', 1, 'active', '2015-01-26 16:15:14', '2015-02-17 03:29:27', NULL, '03oSAp2kvuxYCAs7hMacXeq8IOomLv28BJqUYjkSPYBjCeCoirSSq1RJfXQ6'),
(2, 'Antony', 'Borges', 'robertdacorte', 'Antony Borges', 'aborges@magicmedia.com.ve', '$2y$10$yMFpcNzTAxDCmU3BN7ek8eNbsYoyIykTKT3EAp849KaMHxmHVGovq', 1, 'active', '2015-01-26 16:15:14', '2015-01-26 16:15:14', NULL, NULL),
(3, 'Daniel', 'Henriquez', 'henriquezdan', 'Daniel Henriquez', 'henriquezdan@gmail.com', '$2y$10$fSgh/p72I9AhgK54c6yLGOG/yuGkMiubb4ehTp39e1nUAtJG7Qw7S', 4, 'active', '2015-01-31 04:45:18', '2015-02-10 02:10:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_mesages`
--

CREATE TABLE IF NOT EXISTS `user_mesages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_message` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_mesages_id_message_index` (`id_message`),
  KEY `user_mesages_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_tasks`
--

CREATE TABLE IF NOT EXISTS `user_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_task` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_tasks_id_user_index` (`id_user`),
  KEY `user_tasks_id_task_index` (`id_task`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `id_user`, `id_task`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 3, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 1, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 3, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 1, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `role_capabilities`
--
ALTER TABLE `role_capabilities`
  ADD CONSTRAINT `role_capabilities_id_capability_foreign` FOREIGN KEY (`id_capability`) REFERENCES `capabilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_capabilities_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_mesages`
--
ALTER TABLE `user_mesages`
  ADD CONSTRAINT `user_mesages_id_message_foreign` FOREIGN KEY (`id_message`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_mesages_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD CONSTRAINT `user_tasks_id_task_foreign` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_tasks_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
