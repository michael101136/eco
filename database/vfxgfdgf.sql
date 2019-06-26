-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla ecomer.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_blog_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcioncorta` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaPublicacion` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contador` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(120) NOT NULL,
  `urlimagen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ecomer.blogs: 0 rows
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.categoria_blogs
CREATE TABLE IF NOT EXISTS `categoria_blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.categoria_blogs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_blogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_blogs` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_hd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_language_id_foreign` (`language_id`),
  CONSTRAINT `categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.categories: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `language_id`, `name`, `img`, `img_hd`, `description`, `status`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(26, 1, 'cocina', 'gif', '', 'cocina', 'A', 'cocina', NULL, '2019-06-25 22:36:10', '2019-06-25 22:36:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.categories_has_tours
CREATE TABLE IF NOT EXISTS `categories_has_tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sub_categorie_id` int(10) unsigned NOT NULL,
  `tour_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_has_tours_categorie_id_foreign` (`sub_categorie_id`),
  KEY `categories_has_tours_tour_id_foreign` (`tour_id`),
  CONSTRAINT `categories_has_tours_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.categories_has_tours: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categories_has_tours` DISABLE KEYS */;
REPLACE INTO `categories_has_tours` (`id`, `sub_categorie_id`, `tour_id`, `created_at`, `updated_at`) VALUES
	(7, 16, 192, NULL, NULL);
/*!40000 ALTER TABLE `categories_has_tours` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.events: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.icons
CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.icons: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `icons` DISABLE KEYS */;
/*!40000 ALTER TABLE `icons` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `multimedia_id` int(10) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_multimedia_id_foreign` (`multimedia_id`),
  CONSTRAINT `images_multimedia_id_foreign` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.images: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
REPLACE INTO `images` (`id`, `multimedia_id`, `name`, `path`, `size`, `created_at`, `updated_at`) VALUES
	(1, 95, '1561498843.CUSCO-365x200.gif', 'admin/uploads/1561498843.CUSCO-365x200.gif', '69320', '2019-06-25 21:40:43', '2019-06-25 21:40:43');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.img
CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.img: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
/*!40000 ALTER TABLE `img` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.itineraries
CREATE TABLE IF NOT EXISTS `itineraries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `day` int(11) NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `altitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itineraries_tour_id_foreign` (`tour_id`),
  CONSTRAINT `itineraries_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.itineraries: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itineraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `itineraries` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbr` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.languages: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
REPLACE INTO `languages` (`id`, `name`, `abbr`, `flag`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'español', 'es', 'sa', '1', NULL, NULL, NULL),
	(2, 'ingles', 'en', 'en', '1', NULL, NULL, NULL);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.migrations: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_07_24_161436_create_languages_table', 1),
	(4, '2018_07_24_161508_create_categories_table', 1),
	(5, '2018_07_26_091818_create_multimedia_table', 1),
	(6, '2018_07_26_102743_create_images_table', 1),
	(7, '2018_07_26_102803_create_videos_table', 1),
	(8, '2018_07_26_160543_create_tours_table', 1),
	(9, '2018_07_26_160726_create_itineraries_table', 1),
	(10, '2018_07_27_160542_create_categories_has_tours_table', 1),
	(11, '2018_08_02_153953_create_series_controller', 1),
	(12, '2018_08_04_104154_create_icons_table', 1),
	(13, '2018_08_06_110143_create_events_table', 1),
	(14, '2018_08_07_094636_create_prices_table', 1),
	(15, '2018_08_21_152434_create_testimonials_table', 1),
	(16, '2018_08_22_154532_create_img_table', 1),
	(17, '2018_09_19_152752_create_paises_table', 1),
	(18, '2018_09_19_172904_create_reservations_table', 1),
	(19, '2019_06_25_172711_create_sub_categoria_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.multimedia
CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.multimedia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
REPLACE INTO `multimedia` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(95, 'dfg', 'dfg', '2019-06-25 21:40:36', '2019-06-25 21:40:36');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ecomer.paises: ~240 rows (aproximadamente)
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
REPLACE INTO `paises` (`id`, `iso`, `nombre`) VALUES
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
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.paises1
CREATE TABLE IF NOT EXISTS `paises1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.paises1: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `paises1` DISABLE KEYS */;
/*!40000 ALTER TABLE `paises1` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.password_resets: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
REPLACE INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('n.arnaldoaraujo@gmail.com', '$2y$10$oTkIpEKPVXTazmKZ14ZQterQUzww8Sh10QaJGtX1Yif2vVl3L5Mm2', '2019-04-05 04:37:13'),
	('admin@gmail.com', '$2y$10$dl1ctrJx/YA5hl.fDDachef0eGgaoWumSpW2SJtXLdhyZgwhc9DZK', '2019-04-13 03:18:12'),
	('admin1@gmail.com', '$2y$10$Wnhs36qC18qRxyMaU5hc7ekCgMk2jQf0e3NvZzjoY20mP4FODWzAG', '2019-04-16 00:05:47');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `range_first` int(11) NOT NULL,
  `range_end` int(11) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prices_tour_id_foreign` (`tour_id`),
  CONSTRAINT `prices_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.prices: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lenguaje` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `number_adults` int(11) DEFAULT NULL,
  `number_children` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `tour_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_tour_id_foreign` (`tour_id`),
  CONSTRAINT `reservations_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.reservations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.series
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(10) unsigned NOT NULL,
  `cant_person` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `series_tour_id_foreign` (`tour_id`),
  CONSTRAINT `series_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.series: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
/*!40000 ALTER TABLE `series` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.sub_categoria
CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.sub_categoria: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `sub_categoria` DISABLE KEYS */;
REPLACE INTO `sub_categoria` (`id`, `name`, `id_categoria`, `created_at`, `updated_at`) VALUES
	(16, 'cuchiyo', '26', NULL, NULL);
/*!40000 ALTER TABLE `sub_categoria` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` varchar(1050) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.testimonials: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.tours
CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_short` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_complete` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` mediumtext COLLATE utf8mb4_unicode_ci,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` tinyint(1) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `price_can` double(8,2) DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_tour` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_viaje` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multimedia_id` int(10) unsigned DEFAULT NULL,
  `lugar` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tours_slug_unique` (`slug`),
  KEY `tours_multimedia_id_foreign` (`multimedia_id`),
  CONSTRAINT `tours_multimedia_id_foreign` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.tours: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
REPLACE INTO `tours` (`id`, `name`, `img`, `description_short`, `description_complete`, `organization`, `meta_description`, `meta_keywords`, `status`, `principal`, `price`, `price_can`, `slug`, `tipo_tour`, `tipo_viaje`, `multimedia_id`, `lugar`, `created_at`, `updated_at`) VALUES
	(191, 'pimentel palominio michael alexander', NULL, 'as', 'asd', '<p>vchfgh</p>', NULL, NULL, 'A', 1, 44.00, 4.00, 'pimentel-palominio-michael-alexander', 'uno_dia', 'carro', 95, 'cusco', '2019-06-25 22:18:56', '2019-06-25 22:18:56'),
	(192, 'dasf', 'admin/uploads/tour/1561502226.es.jpg', 'sdf', 'sdf', '<p>sdf</p>', NULL, NULL, 'A', 1, 12.00, NULL, 'dasf', 'uno_dia', 'carro', 95, 'cusco', '2019-06-25 22:36:48', '2019-06-25 22:37:06');
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `privilege` varchar(124) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_document` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.users: ~126 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `privilege`, `name`, `apellido`, `email`, `type_document`, `type_number`, `pais`, `language_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
	(8, 'admin', 'admin', '', 'administrador@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$M4C4AdUzYqZ3je1YRvsm1uSDp1fqHFw/vg1I.3/WsRGiVAbrLmyYG', '5LIVvorBBNETuZUkWeaxixFmlOPTHvmoufs2bsxTlVE2emMmTECpkKLXzsT6', '2019-02-06 03:15:26', '2019-06-22 02:37:22', ''),
	(9, 'admin', 'golden', '', 'golden@gmail.com', NULL, '', NULL, 2, NULL, '$2y$10$07WfnUAFm2.AXn4tsGrgt.2EVxX66ez8FS1pko7/ZkekAJ586H7pe', 'jVmNnAkcYmeesvsMbTJGkP50PPQsW2LfhPe3fgCF0SBk1DchsMLJNn9iphWa', '2019-03-16 19:18:28', '2019-03-16 19:18:28', ''),
	(10, 'admin', 'jakeline', 'jakeline', 'jakysid@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$vpsFCuTKgOt6AAXbiZP8Ae.8Uac6dRR9awSmFvfJRMgU774qK8c3K', 'JIrTLKjHeF5mh7Z3JnU2brJK8RCGQiROIR6GaDfpHh6panMlxXgo4WzDiYH7', '2019-03-28 20:35:53', '2019-03-28 20:35:53', ''),
	(11, 'admin', 'arnaldo', 'arnaldo', 'n.arnaldoaraujo@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$kfUv.d60n2RPMEXteUvCnetKpx3yKBpoDAEqh57GTlJGO0dJMfx5a', 'hIjwB1kHlWzxxt7red0gPmV7jvSu7x6892gwujAp8ULASk4MSSHY9a4GE4YU', '2019-03-29 02:42:04', '2019-03-29 02:42:04', ''),
	(14, 'normal', 'hamely', '', 'hamely@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$fD7jD2z8By5l4T3sC8QPs.YMHD.yeUuyGtqaOqvSa85Qogitd4Qze', 'vLAifwF6ua2BZmB5vBNXZYxzkPazMGASlH2YCNuoyDREcTtPH0Th7I9HDCbe', '2019-04-02 20:27:50', '2019-04-02 20:28:17', ''),
	(15, 'comprador', 'ana', '', 'ana@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$ge2qUSbYbk64BL888UsFc.o9lBMAVWRuUGHWaPbfKsVycy46AUbi2', 'SlDEAvQ1V6xLwabJr9BBNMFJKhFXF27joHDEovlrmrH23liBkjU1OCaOSi99', '2019-04-02 20:30:50', '2019-04-02 20:30:50', ''),
	(16, 'comprador', 'Odette Trejo', '', 'odette.trejo97@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$FHpG27KWSGGkTjZWSA9.0OXL8/YEALEBqKMPBZan5RVzZpV4djMd6', NULL, '2019-04-02 20:42:23', '2019-04-02 20:42:23', ''),
	(17, 'comprador', 'ARNY', '', 'reservas@machupicchugolden.com', NULL, '', NULL, 1, NULL, '$2y$10$47tzI4PLy7NH0yO.KpPOjueSazM3wWQ50Q72RH3DiepSRsnaLLxKS', '4jRsAAcRL0QPOuEYZ7TpUpUplsXlbQj82tXaxaodpa2sXr5jNI7pfeQaMf3E', '2019-04-02 23:12:53', '2019-04-02 23:12:53', ''),
	(19, 'comprador', 'NICANOR ARNALDO', '', 'nicksagi@hotmail.com', NULL, '', NULL, 1, NULL, '$2y$10$QuZVimDP6Y2Z32db6NyAau6yNON0GW9NNXytB5GmLfN9maWdCn.3C', 'w0ILlfdtub3NBVIKlp53oADn3UhRvjLEN26rjLl1ErNNl7BgQdfw0UqeeWZV', '2019-04-06 23:22:48', '2019-04-27 06:04:40', ''),
	(20, 'comprador', 'LORENA QUINDE', '', 'contacto@vivatra.net', NULL, '', NULL, 1, NULL, '$2y$10$W8/aiN3YZ5M6Q2/Dvq0uX.96eUYTPkN.GiGayuQapts3IgTESN/Ee', NULL, '2019-04-09 03:27:38', '2019-04-09 03:27:38', ''),
	(21, 'comprador', 'Katia Eliana Yunis Limpias', '', 'katia.yunis@hotmail.com', NULL, '', NULL, 1, NULL, '$2y$10$WeC2VoxnqNX.X1yPEe75MOBgSs80woiEYIgy9Ed9L7g.WuoOO1XKm', NULL, '2019-04-10 02:44:32', '2019-04-10 02:44:32', ''),
	(22, 'comprador', 'hame', NULL, 'sarmiento101147@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$cEoCkgrwpWHS4LsMniH30e8n.S30Z0/GdQ9VIqwAWaJQ0jrN3VKze', 'O5L9SIvwdVihnQ9zbdqsUwXArZv1Adu75WyupNaFpe7ixYA52vlrHt4KFwgi', '2019-04-16 19:44:47', '2019-04-23 00:36:43', ''),
	(23, 'comprador', 'Gian', NULL, 'disenogolden1@gmail.com', NULL, '', NULL, 1, NULL, '$2y$10$teiViX7sYjWORlfFN8PIIe3oU8vEWA3fbLbIaV4BTInX58Rn6/ze.', NULL, '2019-04-16 22:13:16', '2019-04-16 22:13:16', ''),
	(25, 'comprador', 'kevin', 'sandón Pérez', 'sandon13496@gmail.com', 'dni', '75391805', NULL, 1, NULL, '$2y$10$g6kZhZi2JXxxbmdkSlamyeLoAZ/UUadBrqRnvbah0lnH.jo0A78U6', NULL, '2019-04-17 01:23:24', '2019-04-17 01:23:24', ''),
	(26, 'comprador', 'Prueba', 'Prueba', 'prueba@gmail.com', 'dni', '7895544346', NULL, 1, NULL, '$2y$10$LmQypbyl3rPb6jKXPPo5euVJVwRjqAr.L43T0cHYzpx8vlpdUlsma', NULL, '2019-04-17 05:18:03', '2019-04-17 05:18:03', ''),
	(27, 'comprador', 'Katherine', 'Valer', 'valerromerok@gmail.com', 'dni', '15487598', NULL, 1, NULL, '$2y$10$nNKa8em4BtBVX8V6vl0LSOkJYxI1Rc1fUSSQq82PqqRr5TtBu4WIm', NULL, '2019-04-17 22:08:53', '2019-04-17 22:08:53', ''),
	(28, 'comprador', 'golden', 'machupicchu', 'golden@machupicchugolden.com', 'dni', '12345678', NULL, 1, NULL, '$2y$10$4xdWnJlaplYOxgaHtj07wu3/GN5t7TlrLU06iPM2PBxQXzmKDvNT.', NULL, '2019-04-18 05:29:57', '2019-04-18 05:29:57', ''),
	(29, 'comprador', 'JORGE VALENTIN', 'OSUNA VIERA', 'jorge7valentin@hotmail.com', 'dni', '1717089881830', NULL, 1, NULL, '$2y$10$AmMegFDEgHNVIaxLFYLRn.xPzSNxQ2HQaxNMPCorRtBK2W33N6/di', NULL, '2019-04-18 18:30:56', '2019-04-18 18:30:56', ''),
	(30, 'comprador', 'Carolina', 'Carrasco', 'carolina_acv@hotmail.com', 'dni', '17205317-3', NULL, 1, NULL, '$2y$10$W0Sy3wHDM49C5J2BqW3iDOmF6s9qBzqNxSK8Ab3etg7Jj1RRDc9QG', NULL, '2019-04-22 08:04:34', '2019-04-22 08:04:34', ''),
	(32, 'comprador', 'prueba2', 'prueba2', 'prueba2@gmail.com', 'pasaporte', '12345666', 'PE', 1, NULL, '$2y$10$0sfHOnU4azrk7c9f4iDtNOPjC8EU0hJjL9wdIXCXvEbqW/PjhfKRS', NULL, '2019-04-24 20:38:37', '2019-04-24 20:38:37', ''),
	(33, 'comprador', 'pruebaa', 'pruebaa', 'pruebaa@gmail.com', 'pasaporte', '1234567899', 'PE', 1, NULL, '$2y$10$MRW4fSVjVdAufllsuH.8l.is10lwB8dOq7Pjdvo.GafyQILviH2aO', NULL, '2019-04-24 21:16:59', '2019-04-24 21:16:59', ''),
	(34, 'comprador', 'Andrea', 'Ledesma Perez', 'andy_anoy@hotmail.com', 'pasaporte', '617940056', 'MX', 1, NULL, '$2y$10$SXkLehGnFzLAxiAAwoqdrOfjuQeKG.gG2SY0Ev5c1jRbC1Vry1yEK', NULL, '2019-04-25 02:13:10', '2019-04-25 02:13:10', ''),
	(35, 'comprador', 'Teresa de jesus', 'Rangel', 'tererangel88@gmail.com', 'pasaporte', 'G09245595', 'MX', 1, NULL, '$2y$10$in5ZcTeY/EBSry3G62TzSuOG5dbbtLtAzQaw3IeyQ1myJHva8dLUS', NULL, '2019-04-25 04:13:01', '2019-04-25 04:13:01', ''),
	(36, 'comprador', 'JESUS MIGUEL', 'PINEDA IBARRA', 'akhkharu34@gmail.com', 'pasaporte', 'G33739613', 'MX', 1, NULL, '$2y$10$pt.q2hi4LZzZwunc6UrJdOsPuvqA0q3xuuwAHk9DJi2WI1jI4S7b6', NULL, '2019-04-25 08:19:06', '2019-04-25 08:19:06', ''),
	(37, 'comprador', 'Ulises', 'Sánchez gallegos', 'Ulises_sanchez_1992@hotmail.com', 'pasaporte', 'G19928157', 'MX', 1, NULL, '$2y$10$THqJjetGWCyD4/AaF5fJYOt6CI0zDBb18OkPrT8QdJzQrLrYHLega', NULL, '2019-04-26 07:13:14', '2019-04-26 07:13:14', ''),
	(38, 'comprador', 'Fabián', 'Sánchez Vega', 'fabisanchez25@hotmail.com', 'pasaporte', '303870636', 'CR', 1, NULL, '$2y$10$qo.5cfQwN.oU5SiqlFCJKeTohiSX5EF94vf/2ZNR.Pg1lm1KWETC2', NULL, '2019-04-26 10:47:10', '2019-04-26 10:47:10', ''),
	(39, 'comprador', 'Mexico', 'Suarez', 'mauusuarez24@gmail.com', 'pasaporte', 'g29234594', 'MX', 1, NULL, '$2y$10$b8IfHMx/dvM1xVEA3GLu/uobdZjSKlVR5m.SC/dYGXLePOaMjV5Ou', NULL, '2019-04-26 22:52:14', '2019-04-26 22:52:14', ''),
	(40, 'comprador', 'Jacqueline', 'Cerna', 'jacky_cerarri@hotmail.com', 'pasaporte', 'G23628023', 'MX', 1, NULL, '$2y$10$PsrvvKbDRveDTaNfiFbwcuExs5E.Kro/Pw4xIQqW.b9YTwL2s8bBG', NULL, '2019-04-28 22:19:33', '2019-04-28 22:19:33', ''),
	(41, 'comprador', 'Arny', 'Araujo', 'Astridcamila@gmail.com', 'pasaporte', '4258571565', 'ES', 1, NULL, '$2y$10$PYAI4INqMQcKAjqNda6g9.TR4kn44TrnfAMhy7cXJX63HCROUca2S', NULL, '2019-04-30 00:21:18', '2019-04-30 00:21:18', ''),
	(42, 'comprador', 'nadil', 'morales', 'nadilmorales@hotmail.com', 'pasaporte', '565590538', 'MX', 1, NULL, '$2y$10$6g5ZPs4Uw7qIo9auPazR3OrVWEdAlQhCtQDLvfizfuA3K0fAspjC6', NULL, '2019-04-30 03:52:18', '2019-04-30 03:52:18', ''),
	(43, 'comprador', 'miriam', 'zaragoza', 'miriam-05-92@hotmail.com', 'pasaporte', 'g25531035', 'MX', 1, NULL, '$2y$10$gNrk.r8gQ9IVXVGAGsYPdunfT.cU4Oq3yVJmvPRQSF5s4S36nQ8.q', NULL, '2019-04-30 06:26:58', '2019-04-30 06:26:58', ''),
	(44, 'comprador', 'Emilia', 'García Valverde', 'emiliagv6@hotmail.com', 'pasaporte', 'E794263', 'CR', 1, NULL, '$2y$10$Mpjrdy3fvEyGwWPo/ubysuVccCMoH6CWgGkG1EoY7IoF4cpSK.lqy', NULL, '2019-04-30 06:55:32', '2019-04-30 06:55:32', ''),
	(45, 'comprador', 'ALMA GABRIELA', 'MORA BECERRIL', 'leegabrielamorabec@gmail.com', 'pasaporte', 'G32037979', 'MX', 1, NULL, '$2y$10$hyg7I5fRhAMkMP/GcTMah.ec4/52KYbCIyNoEhYu.ALMEa3CIYLuW', NULL, '2019-04-30 07:31:15', '2019-04-30 07:31:15', ''),
	(46, 'comprador', 'Neto', 'Cuevas', 'neto.cuava287@gmail.com', 'pasaporte', '2365183847', 'GT', 1, NULL, '$2y$10$pDLHe0d7zfLfa.8owaznyefvddKloeqE/mreiERK2mB2T7uRwH44m', NULL, '2019-04-30 21:57:40', '2019-04-30 21:57:40', ''),
	(47, 'comprador', 'Alan Patricio', 'Castillo ornelas', 'kaztiyo93@hotmail.com', 'pasaporte', 'G31766825', 'MX', 1, NULL, '$2y$10$ItCeAERzy.HH2IRfGkka9OkHsiFZteFamrkTRlLUvRccUo/4SCYnK', NULL, '2019-05-01 01:21:36', '2019-05-01 01:21:36', ''),
	(48, 'comprador', 'Ernesto', 'Cornejo zempoalteca', 'neto_corz@hotmail.com', 'pasaporte', 'G19353030', 'ES', 1, NULL, '$2y$10$ILYV3FnVDfC2d5PUAkUnWuUu9lT3jxgDuFWa2HsOTneeOsXSramk6', NULL, '2019-05-01 03:51:01', '2019-05-01 03:51:01', ''),
	(49, 'comprador', 'Andrea', 'Lozano', 'andretaloz@gmail.com', 'pasaporte', '513144852', 'US', 1, NULL, '$2y$10$R.pEcGJRYvlpzcUCPeAnqOaC3vTv./wFzuEbVUJD8rU0KhQljcAqC', NULL, '2019-05-02 01:25:30', '2019-05-02 01:25:30', ''),
	(50, 'comprador', 'Holographicdwa', 'zwusaymelnojdrvGP', 'support@vdsina.ru', 'dni', '2970', 'NI', 1, NULL, '$2y$10$9dxEC1b1zkLLKM1vmnkJsOBV4yCodhsHYUCGYXNuHdWa2KfCSCW0K', NULL, '2019-05-04 01:15:11', '2019-05-04 01:15:11', ''),
	(51, 'comprador', 'Víctor Alejandro', 'Escamilla Gómez', 'alexescamilla25@gmail.com', 'pasaporte', 'G14453645', 'MX', 1, NULL, '$2y$10$2hxGx4Yl.w5SBz3lq8SNROIR1IzD7ctQmNGy1qRgp/ByklTVjVlN6', NULL, '2019-05-05 01:06:17', '2019-05-05 01:06:17', ''),
	(52, 'comprador', 'alejandro osvaldo', 'amador perez', 'alejandroamadorpediatra@gmail.com', 'pasaporte', 'G22165893', 'MX', 1, NULL, '$2y$10$JHCRNS3RNeqd5rox7Cv1w.jCt/OjAXaUGeyaENqzMnh51n0N7/24m', NULL, '2019-05-05 03:50:34', '2019-05-05 03:50:34', ''),
	(53, 'comprador', 'Infraredhaw', 'swusalmegtstddbGP', 'incascata@gmail.com', 'dni', '9206', 'BI', 1, NULL, '$2y$10$eRmsUd5PvRo9zbzHSL6tLeo.B8uClGoPTk8feeKK0BlCZ/Baky2t2', NULL, '2019-05-05 06:26:00', '2019-05-05 06:26:00', ''),
	(54, 'comprador', 'Andres Felipe', 'Carcamo Turra', 'acarcamo29@hotmail.com', 'dni', '13165450-2', 'CL', 1, NULL, '$2y$10$KO37rH3W4g63bjzi9EO3nOy8GqFdSOcCVBJv2Liu6ipcptj072C32', NULL, '2019-05-05 21:30:08', '2019-05-05 21:30:08', ''),
	(55, 'comprador', 'Jhon Alexander', 'Uribe', 'Jhonuribe@gmail.com', 'pasaporte', 'AP182813', 'CO', 1, NULL, '$2y$10$WlbPZntRhJnN1vcHYHKYS.tRbXqEMMtQdqnMkXnw83JwBECNc/e.y', NULL, '2019-05-06 04:36:05', '2019-05-06 04:36:05', ''),
	(56, 'comprador', 'Anabela', 'Ramos', 'ramabelle@hotmail.fr', 'pasaporte', 'CA122499', 'PT', 1, NULL, '$2y$10$qfLKA7qfJOUhE5EDHT8X..b4pQYtG3.AjBmYJ0ZXOeUd8zdFhZb3G', NULL, '2019-05-06 22:46:37', '2019-05-06 22:46:37', ''),
	(57, 'comprador', 'Cristia Nathaly', 'Erazo Rogel', 'cristia_erazo@hotmail.com', 'pasaporte', 'A04690191', 'SV', 1, NULL, '$2y$10$Shc7RNOyMHWdagYFsP8JpOxESeo8.o1WLii/Vqh3HJrR0981L7tOy', NULL, '2019-05-07 01:54:48', '2019-05-07 01:54:48', ''),
	(58, 'comprador', 'HANS DANIEL', 'HERNANDEZ HERNANDEZ', 'ha_da10@hotmail.com', 'pasaporte', 'G08423273', 'ES', 1, NULL, '$2y$10$0QIKHpoXVzomZV.hoNtG3OYT32sSSEddxv4Gn7hs1IqMRlUpDwKPu', NULL, '2019-05-07 06:11:59', '2019-05-07 06:11:59', ''),
	(59, 'comprador', 'Flexiblezxj', 'swusafmeytpgc2eGP', 'director@vdsina.ru', 'dni', '909', 'SM', 1, NULL, '$2y$10$VBztEoncYbn9Nwsl7LU9/.Z7aXWNPluNMIrgnEv7guapmKxyO0Eua', NULL, '2019-05-07 11:39:03', '2019-05-07 11:39:03', ''),
	(60, 'comprador', 'Joo Young', 'Lee', 'jooyounglh@gmail.com', 'pasaporte', 'G06329487', 'MX', 1, NULL, '$2y$10$u7R9BQH.Qgm966E37FSUbO0QUv60t37E7m63HkYdeYOwRnEaPQNFO', NULL, '2019-05-07 20:16:12', '2019-05-07 20:16:12', ''),
	(61, 'comprador', 'alfonso', 'renteria valencia', 'poncho220779@gmail.com', 'pasaporte', 'g11388136', 'MX', 1, NULL, '$2y$10$AEx2uEghpMf0Ipxz7Uk5FuWPa8pHg2z/bFNGOIoQWBm4klkKgpOU.', NULL, '2019-05-09 00:05:50', '2019-05-09 00:05:50', ''),
	(62, 'comprador', 'Irrigationwhp', 'svusalmeynumzeyGP', 'director@mchost.ru', 'dni', '7495', 'KH', 1, NULL, '$2y$10$qdbzHUqOsN7g3LHoZn2oz.28efdFQD1iAd4utdvcbQjuWqVJ7YreG', NULL, '2019-05-09 05:51:40', '2019-05-09 05:51:40', ''),
	(63, 'comprador', 'diana sofia', 'henriquez guzman', 'blanconegro359@gmail.com', 'pasaporte', '574951588', 'US', 1, NULL, '$2y$10$311cihqHelTvNy074T.iMeHRiOuRsQ4OTf3injj3gbg7wZBQBRI0W', NULL, '2019-05-09 22:11:25', '2019-05-09 22:11:25', ''),
	(64, 'comprador', 'Diana', 'Henriquez', 'dianahenriquez359@gmail.com', 'dni', '00003986501', 'US', 1, NULL, '$2y$10$jZ0cIfWah2wQfzzj8a35uuGSnKhgBgRPOmcCfPk4XojwCgYE58OWO', NULL, '2019-05-09 22:47:45', '2019-05-09 22:47:45', ''),
	(65, 'comprador', 'luis christian', 'rodriguez plascencia', 'dr_christianrodriguez@hotmail.com', 'pasaporte', 'g25586623', 'ES', 1, NULL, '$2y$10$ZdbAQbX9vdrz2nPbqlF8HO67xYciJpGqug28F3tNffulPZfz8zc9.', NULL, '2019-05-10 03:05:06', '2019-05-10 03:05:06', ''),
	(66, 'comprador', 'SHRUTI', 'VENKATA CHARI', 'shrutifrnd@gmail.com', 'pasaporte', 'H7707331', 'IN', 1, NULL, '$2y$10$PKmhaMoKTdQPcKn8GXe4KOZFEJiaB.4PyPwAVh18TFvGLCCl4agTO', NULL, '2019-05-10 04:19:01', '2019-05-10 04:19:01', ''),
	(67, 'comprador', 'Artisanzfr', 'swusaymeqtxld2bGP', 'bill@vdsina.ru', 'dni', '2992', 'AR', 1, NULL, '$2y$10$MB1Jcixcv978DMikRylDAO/04eQ/NNGlrkbFPgrdAAMg//YAwM3qS', NULL, '2019-05-11 16:52:40', '2019-05-11 16:52:40', ''),
	(68, 'comprador', 'LUCIA', 'ZAMORANO ORTA', 'lenyermt@hotmail.com', 'pasaporte', 'G32925575', 'MX', 1, NULL, '$2y$10$yVSuUw9QlnpSpZHun9NXjOHNdrGewSK0hgV4FSeJak5vNe0tHlhyO', NULL, '2019-05-12 19:59:39', '2019-05-12 19:59:39', ''),
	(69, 'comprador', 'Maria Fernanda', 'Ortega Samayoa', 'mfsamayoa@gmail.com', 'pasaporte', '114080890', 'CR', 1, NULL, '$2y$10$.Sh/emkxBFSFFrf7kALh8eLrdaQ4dAYFw9JqH.lJh3ue9fCXb.6bC', NULL, '2019-05-13 05:59:17', '2019-05-13 05:59:17', ''),
	(70, 'comprador', 'Guadalupe', 'Moctezuma', 'lmoctuzuma@gmail.com', 'pasaporte', 'G18575598', 'MX', 1, NULL, '$2y$10$E80OsfNzEC7VXI6x/tqAk.BY2MJ0bVGHcUOFfI4qGKv9PNyxju/ne', NULL, '2019-05-13 07:48:49', '2019-05-13 07:48:49', ''),
	(71, 'comprador', 'Almendra', 'Rojas', 'marojas3187@gmail.com', 'pasaporte', 'G15887058', 'MX', 1, NULL, '$2y$10$V3ccMcOHnyf3U84tAU.GhuFGDm53jTGu2VHW.aHxCHBeUfaH9CwNa', NULL, '2019-05-13 23:51:50', '2019-05-13 23:51:50', ''),
	(72, 'comprador', 'Sinuhe', 'Sosa', 'manotes212@gmail.com', 'dni', '7137199', 'MX', 1, NULL, '$2y$10$ZwqRKLxkQjnQ1aIebDw.4eZD/M4mEbpwtMwhcd.LbAjrnN22w96ee', NULL, '2019-05-15 02:04:12', '2019-05-15 02:04:12', ''),
	(73, 'comprador', 'Luz', 'Cárcamo', 'lucelcarcamo@gmail.com', 'pasaporte', '214572463', 'GT', 1, NULL, '$2y$10$sd6VvNcy0XR1K4PW5PtpVOYJa3bNrn.CMmLJoOJ6NljzBEzTKnsIy', NULL, '2019-05-15 04:57:50', '2019-05-15 04:57:50', ''),
	(74, 'comprador', 'Andrea', 'Villarroel', 'acvillarroel@gmail.com', 'pasaporte', '170124723', 'CL', 1, NULL, '$2y$10$0jEpeUNv9yHQvlAq85TpQ.0nsMdYSnAVr6oG1PjkMSY9iq9XLhgGG', NULL, '2019-05-15 09:41:37', '2019-05-15 09:41:37', ''),
	(75, 'comprador', 'EOTechtjn', 'zzusalmeknpkccuGP', 'richard@steindiamonds.com', 'dni', '2599', 'NE', 1, NULL, '$2y$10$/Mvgd454gnRkYznB/r7BLeSjKyPToja8QZ6Dvw5wdZdLsZE7jdnL.', NULL, '2019-05-16 08:49:56', '2019-05-16 08:49:56', ''),
	(76, 'comprador', 'Rigidrtx', 'xvusaymesnzizklGP', 'rgmusa@gmail.com', 'dni', '1254', 'IR', 1, NULL, '$2y$10$.CwJVbl/GAivfbB4DrQ5xOBCtW4KjIV85Z.DBZhJ7l1IQ0ekdRnpe', NULL, '2019-05-17 06:09:04', '2019-05-17 06:09:04', ''),
	(77, 'comprador', 'ARENS', 'SANCHEZ BARRAZA', 'ary1991525@gmail.com', 'dni', '0844085083484', 'MX', 1, NULL, '$2y$10$hxULQOoeDfQwdVN5eyL3KOV1u92SeWlzMCylMd7UtwyFHuOhCf5.y', NULL, '2019-05-20 02:15:00', '2019-05-20 02:15:00', ''),
	(78, 'comprador', 'alejandra', 'castellanos', 'castemosque@gmail.com', 'pasaporte', 'AU289678', 'CO', 1, NULL, '$2y$10$UXbH8.i5mcdA6gIoTqf6x.ftIxFrKQVQrPWXnVpRjHJLB02c5n2cy', 'fJHZbI0U8PCKuQZYHlneb13vcwCKVqk2fdMHUNxv7aMMmTN3J8d3csWyIQpN', '2019-05-20 09:46:06', '2019-05-30 08:33:52', ''),
	(79, 'comprador', 'Luis Enrique', 'Aguirre Galicia', 'luisagui25@hotmail.com', 'dni', '1847450322', 'MX', 1, NULL, '$2y$10$JnM/SjgUz0teT1Cjadh3neOfhAZ2KEOR6J2mEcsLmjusNE8MH4/8G', NULL, '2019-05-21 04:21:48', '2019-05-21 04:21:48', ''),
	(80, 'comprador', 'ROCIO', 'ARREGUIN NAVA', 'arreguinrocio@gmail.com', 'pasaporte', 'G07339560', 'MX', 1, NULL, '$2y$10$hqq.jSd7LbhpyhDM8vKSFul.qqW.2D7y5CCaNx7u..bwMXVx3II9O', NULL, '2019-05-21 07:38:16', '2019-05-21 07:38:16', ''),
	(81, 'comprador', 'MIGUEL ANGEL', 'ROYACELI', 'royalboy@hotmail.com', 'pasaporte', 'G24854053', 'MX', 1, NULL, '$2y$10$.kWLuQnqmd4BSud0VG/da.4ojgYS5mdSdM2E0AXtfYXVPbPdZjaRK', NULL, '2019-05-22 00:32:58', '2019-05-22 00:32:58', ''),
	(82, 'comprador', 'MINDY', 'PECHO LOPEZ', 'mindypecho_10@hotmail.com', 'dni', '71736056', 'PE', 1, NULL, '$2y$10$DGjQHCxi1HJlxMxDBbZIJeCfElklMBZMIfyZ5WI4xfMgZjMfDbakK', NULL, '2019-05-22 21:15:20', '2019-05-22 21:15:20', ''),
	(83, 'comprador', 'Eduardo', 'Castro', 'eddyprofeing@hotmail.com', 'pasaporte', '204630329', 'CR', 1, NULL, '$2y$10$p5qSHAN1PmBZwd5GSjNu/eg.0Xoena3BBTiSZHG9PwFcvob344Ngm', NULL, '2019-05-24 02:36:12', '2019-05-24 02:36:12', ''),
	(84, 'comprador', 'GABRIELA ANAID', 'GALINDO ARAGÓN', 'gabgal90@gmail.com', 'pasaporte', 'G30146649', 'PE', 1, NULL, '$2y$10$706lu4w7YjjGxYp3.1Pv9.ZZ9e8T4DTlWaBKaHkkJDl93epCKMaCG', NULL, '2019-05-24 07:58:56', '2019-05-24 07:58:56', ''),
	(85, 'comprador', 'Daniela', 'Polanco', 'Danielapolanconanape@gmail.com', 'pasaporte', 'G31563595', 'MX', 1, NULL, '$2y$10$Nmw1Bwuie/QVMA30s3xGhOMe5hw2LtWlvbdLv5efPWBYp.2lljrl6', NULL, '2019-05-24 18:40:04', '2019-05-24 18:40:04', ''),
	(86, 'comprador', 'Pouringbsp', 'szusaymepnuozfoGP', 'bbosler1@sbcglobal.net', 'dni', '6386', 'PA', 1, NULL, '$2y$10$zmbiEq7N4x4M8BGskqL0ZOKGbX4OBI62ilvJnFsRD/fVPrgiSCYLy', NULL, '2019-05-25 01:22:10', '2019-05-25 01:22:10', ''),
	(87, 'comprador', 'Independentsfp', 'zvusalmebmxhcigGP', 'breisdorf@geislerbrothers.com', 'dni', '2892', 'KW', 1, NULL, '$2y$10$Sir60WnBTaXliiEkK639kuAdSCTtCdyoeooThANFKiX8qUSOTwq5a', NULL, '2019-05-25 04:23:56', '2019-05-25 04:23:56', ''),
	(88, 'comprador', 'tania', 'mendoza', 'tanianaomim@gmail.com', 'pasaporte', 'G31492313', 'MX', 1, NULL, '$2y$10$ypGrgf.626EpPfUfBiJEDO4EnTWnCv15WVhC.K.9BZwQb4Lfelecm', NULL, '2019-05-25 07:05:02', '2019-05-25 07:05:02', ''),
	(89, 'comprador', 'ALONDRA', 'SANCHEZ', 'alosf_7954@hotmail.com', 'pasaporte', 'G30273617', 'MX', 1, NULL, '$2y$10$iNtPzgEjugjyNKttwNysveY0yuZej40efPPN3QSGKCtfIpa5PYdSO', NULL, '2019-05-25 08:16:31', '2019-05-25 08:16:31', ''),
	(90, 'comprador', 'Squiersxm', 'xvusafmelmajdqhGP', 'eadiazlr@gmail.com', 'dni', '3776', 'SG', 1, NULL, '$2y$10$AxbH1U4x4gfLdNcgkyhB/.JAtvtPB4CuPaF35XR56Hx8yX0Zt4fny', NULL, '2019-05-26 17:49:40', '2019-05-26 17:49:40', ''),
	(91, 'comprador', 'Teresa Joscelyn', 'Ramirez Medrano', 'teresaramirez0816@gmail.com', 'pasaporte', 'F580928', 'HN', 1, NULL, '$2y$10$meIWg53Cb35O1wTBXdoVze3J4lIwY2ew8OuNam4rq8vfAYMr8YG4G', NULL, '2019-05-28 18:54:07', '2019-05-28 18:54:07', ''),
	(92, 'comprador', 'Visionivm', 'xvusalme3thadpeGP', 'kristen.gardner@uky.edu', 'dni', '575', 'EC', 1, NULL, '$2y$10$q8fh47RAYZcQvw5G46unpeq3IGinz16Mq28SreZgTLk6wk.koMWrC', NULL, '2019-05-28 21:53:57', '2019-05-28 21:53:57', ''),
	(93, 'comprador', 'LUIS ANTONIO', 'RAYA DIAZ', 'lard1206@hotmail.com', 'pasaporte', 'G27721032', 'MX', 1, NULL, '$2y$10$8Y2Cf5x2w2BgLT30HkQTYe4mVTODSJAEWlgqJvRLP3858ZcmxohNu', NULL, '2019-05-28 23:18:02', '2019-05-28 23:18:02', ''),
	(94, 'comprador', 'Luz Elena', 'Carrera de la Torre', 'luuzelenac2@gmail.com', 'pasaporte', 'G25501698', 'MX', 1, NULL, '$2y$10$iEeZJJwfRU.RyobzF74ChugLDnXYaFGKjvebUO9vSPyPEZxhhPQC.', NULL, '2019-05-29 22:51:41', '2019-05-29 22:51:41', ''),
	(95, 'comprador', 'jorge luis', 'garcia salcedo', 'jorge_luis921@outlook.com', 'pasaporte', '0001', 'MX', 1, NULL, '$2y$10$8kRU/QQlfE3xu03Xhp2DO.U8Ju28eycwA4zrRes4lapmjMf4uaJSe', NULL, '2019-05-30 06:41:23', '2019-05-30 06:41:23', ''),
	(96, 'comprador', 'Zaira', 'Ramírez', 'zayramirez2@gmail.com', 'dni', '00000', 'MX', 1, NULL, '$2y$10$VP36gDD/9w6rM//2cXp/4uyjDRz2JAsmGoxkHtaKIC3hV528Fs.Zy', 'dbCs4yEqhDN596NApm1wwVT7rkykrRsAvqGOcOK5bli7PNoBNi6dDRMt2Nzw', '2019-05-31 02:14:50', '2019-06-05 04:42:31', ''),
	(97, 'comprador', 'Sofia', 'González fragoso', 'sophyangy@gmail.com', 'dni', '0809248400787', 'MX', 1, NULL, '$2y$10$9PelhoMJQENd8yc.6LKXw..kUI.alZyk137cH5lAZzAgv1DHxOg0y', NULL, '2019-05-31 02:21:26', '2019-05-31 02:21:26', ''),
	(98, 'comprador', 'Jairo Eduardo', 'Hernandez Guzmán', 'lic.jairohdz@outlook.com', 'pasaporte', 'G33028655', 'MX', 1, NULL, '$2y$10$FfdkirNDJaKjyA2hNBh2ouT2xRYBUWiYwtmMDPWhQNJUI7jn1fEd.', NULL, '2019-05-31 03:42:33', '2019-05-31 03:42:33', ''),
	(99, 'comprador', 'Epiphonegqt', 'xwusalmeymjwzwfGP', 'rokdr1@gmail.com', 'dni', '2732', 'GW', 1, NULL, '$2y$10$HLwS57htnH/QKJ8ZBJA1Ce/XP0srBLMezo.B55KI3IXyb9oLk58b6', NULL, '2019-05-31 07:59:40', '2019-05-31 07:59:40', ''),
	(100, 'comprador', 'Paula', 'CHIGUAy diaz', 'faninlu_87@hotmail.com', 'dni', '166513936', 'CL', 1, NULL, '$2y$10$a7nUOok0yJ7k3nMUmaZqwOKjY17rYY/pVjURhTD9RGxbdoxqFKfuW', NULL, '2019-05-31 22:57:21', '2019-05-31 22:57:21', ''),
	(101, 'comprador', 'Securitywds', 'zwusalmermcwcbmGP', 'senladistpenk@mail.com', 'dni', '6896', 'TZ', 1, NULL, '$2y$10$OUph.IxvyIzQfX.biucYAOr5zwpkT3W10ecwNqMHGMdsQt.TKjMKy', NULL, '2019-06-01 03:24:43', '2019-06-01 03:24:43', ''),
	(102, 'comprador', 'Anny', 'Galeano', 'anny_gale017@yahoo.es', 'pasaporte', 'F250773', 'HN', 1, NULL, '$2y$10$SGW.pgWIeaTmD5M2BGpH9eXyGAfKoCF98pvT9duEAd9ocMWLIqI76', NULL, '2019-06-01 20:15:16', '2019-06-01 20:15:16', ''),
	(103, 'comprador', 'Evelyn', 'Murillo', 'evy29@hotmail.es', 'pasaporte', '114750345', 'CR', 1, NULL, '$2y$10$X6hxuBpMggbZ85RSU9pexutSNPoOpPfF/6LJrMtaP7g3WbeAg8O.m', NULL, '2019-06-03 20:25:04', '2019-06-03 20:25:04', ''),
	(104, 'comprador', 'DANIEL', 'GALVEZ', 'dagalvezh@outlook.com', 'pasaporte', 'A03385959', 'ES', 1, NULL, '$2y$10$4RQ4EnCXFit1Avpu/yyLWuTibGdBKwApzkLFm.B0DZ3G8IQNIqB6q', NULL, '2019-06-04 05:19:36', '2019-06-04 05:19:36', ''),
	(105, 'comprador', 'Ivan', 'Castrejon', 'misael.zamarripa@hotmail.com', 'pasaporte', 'G26436148', 'MX', 1, NULL, '$2y$10$UDUHK6dRzmvr5k39HUSXNO1iB0BvH3a30p1UU0wfkmtxth4kZWwkO', NULL, '2019-06-04 18:21:27', '2019-06-04 18:21:27', ''),
	(106, 'comprador', 'Marshalleol', 'xzusafmelmpjxctGP', 'dlcpg@yahoo.com', 'dni', '9614', 'ID', 1, NULL, '$2y$10$YDF2WOFShOHstdNzKDhZVO2ePavtaLDD5Ey7E84nRgC6RsR9Sin2W', NULL, '2019-06-04 19:26:40', '2019-06-04 19:26:40', ''),
	(107, 'comprador', 'Maria', 'Palacios', 'mariu_2616@hotmail.com', 'dni', '0105251938', 'EC', 1, NULL, '$2y$10$JOSqrY36VSAkfoDDIoX/RuFmLjUwWIiuRIYY/BRH8g7O1Fc7HSZpu', NULL, '2019-06-05 00:16:18', '2019-06-05 00:16:18', ''),
	(108, 'admin', 'machupicchugolden', NULL, 'machupicchugolden@gmail.com', NULL, NULL, NULL, 1, NULL, '$2y$10$GIYl7k7RyI.f/wBzknqzzu9KO3Zk7xL6bapRx0icbv4bZVaOqWXWC', NULL, '2019-06-05 01:05:09', '2019-06-05 01:05:09', ''),
	(109, 'admin', 'machupicchugoldenIngles', NULL, 'machupicchugoldenIngles@gmail.com', NULL, NULL, NULL, 2, NULL, '$2y$10$2tXAJ.oo/AoR89r3upgG4.STm07LCzYOGx6rqy3fcOIz78KqSFgXO', NULL, '2019-06-05 01:12:14', '2019-06-05 01:12:14', ''),
	(110, 'comprador', 'Independentjqp', 'xwusalmefmalcjjGP', 'ltkurz@yahoo.com', 'dni', '9207', 'AO', 1, NULL, '$2y$10$/hpmwT9xVSETG2OWplkfRejqS84OutXtWS44.fuxOHeJLRnnhtSHC', NULL, '2019-06-05 20:24:35', '2019-06-05 20:24:35', ''),
	(111, 'comprador', 'mario rodriguez', 'RODRIGUEZ ROJAS', 'plastiksurgeon@hotmail.com', 'pasaporte', '1', 'MX', 1, NULL, '$2y$10$Fstvb1nQ2ifcEFgq7Rnh3u5nvWl6twN95EvUlt.b5/QGBKvRk42R.', NULL, '2019-06-06 02:28:31', '2019-06-06 02:28:31', ''),
	(112, 'comprador', 'Carmen Elizabeth', 'Guerrero Verá', 'carmenguerrero_17@hotmail.com', 'pasaporte', '0928411271', 'EC', 1, NULL, '$2y$10$U6JB/L/eX879UNrTtKCJD.9dZDYTF4Rgyfsv0gxkkfNWSZ/GdpYNy', NULL, '2019-06-06 11:18:02', '2019-06-06 11:18:02', ''),
	(113, 'comprador', 'Beaconkqk', 'svusalmestqxxvkGP', 'conapokis@gmail.com', 'dni', '6972', 'GH', 1, NULL, '$2y$10$Z/SF7LqDsffJLmpXCtJeVeYqBUqQPGCesRYnwj7rYeyG5IvO6Mn6u', NULL, '2019-06-06 11:28:47', '2019-06-06 11:28:47', ''),
	(114, 'comprador', 'Fernando', 'Oña', 'ferche83@gmail.com', 'dni', '1716468689', 'EC', 1, NULL, '$2y$10$roZdvd1UUWqbAcT4bsxHiOmAzC.NPWkdiz3eVKPR5T1XczkmTbZFW', NULL, '2019-06-07 00:09:54', '2019-06-07 00:09:54', ''),
	(115, 'comprador', 'Carlos', 'Archila', 'pcarlosarchila@gmail.com', 'pasaporte', '161526853', 'GT', 1, NULL, '$2y$10$lsrVn3Uzh4/bgJG7amwIcuMsAl/mUOQSFs8x85H5wQcs5thmYb.0K', NULL, '2019-06-07 03:09:06', '2019-06-07 03:09:06', ''),
	(116, 'comprador', 'Jennifer Alejandra', 'Roldan', 'alejandra.rol@outlook.com', 'pasaporte', 'G31647815', 'MX', 1, NULL, '$2y$10$MMwTsx.jYDKcbBP0yR3wOOcBD5xQQKWuFME.GqweoT045e.olmRLW', NULL, '2019-06-07 22:52:57', '2019-06-07 22:52:57', ''),
	(117, 'comprador', 'Humminbirdolr', 'szusaymennnsdeoGP', 'jessoliver2001@yahoo.com', 'dni', '6271', 'KI', 1, NULL, '$2y$10$HrzljOONMiK2c2H./Q4vS.1MQevFVY.fk7vI.cljQ6tMAB0Z7PPHu', NULL, '2019-06-08 00:28:57', '2019-06-08 00:28:57', ''),
	(118, 'comprador', 'Businessocw', 'svusafmexmkzdnvGP', 'blowresdima@mail.com', 'dni', '1955', 'TV', 1, NULL, '$2y$10$ks0vjKnrmpe/tdEkUHJAcO/4v6DlKuJ27Z3EKvuE4ROX7SIznJ/TW', NULL, '2019-06-08 02:43:47', '2019-06-08 02:43:47', ''),
	(119, 'comprador', 'JOSE GEOVANNY', 'OTERO OTERO', 'otero_geovanny@hotmail.com', 'pasaporte', 'G22727619', 'MX', 1, NULL, '$2y$10$1RxF/Ig0bP5cwGh3/3MfOecAyBN/Ck3Ry4P7VTXAGhSMs.2etrPvG', NULL, '2019-06-09 02:27:51', '2019-06-09 02:27:51', ''),
	(120, 'comprador', 'Dysonyew', 'xvusalmeeneuxavGP', 'auburnpo@gmail.com', 'dni', '1340', 'PY', 1, NULL, '$2y$10$jHr2z2pk9jWdCz26KOkuauB8v5htiMgdSGt44PkRo/NQdVjMMV7zK', NULL, '2019-06-09 13:57:57', '2019-06-09 13:57:57', ''),
	(121, 'comprador', 'Katherine', 'Opazo', 'opazok@gmail.com', 'dni', '16329597-0', 'CL', 1, NULL, '$2y$10$EvIpuBcqv3E6vDZCSoqFXetoOeeuDjiio40xLkUcPHMmazacx74tK', NULL, '2019-06-10 00:03:56', '2019-06-10 00:03:56', ''),
	(122, 'comprador', 'Delia', 'Velarde', 'sanchez.ralexis@gmail.com', 'pasaporte', 'G17149809', 'MX', 1, NULL, '$2y$10$zo3czYLmpqqCu5dLSMeZRe2QqJmZicDavmum/TTlu.wKyl8ExOWKG', NULL, '2019-06-10 00:07:48', '2019-06-10 00:07:48', ''),
	(123, 'comprador', 'Estefania', 'Sosa', 'estefaniaclavedesol@hotmail.com', 'pasaporte', 'PAE217899', 'ES', 1, NULL, '$2y$10$nwY0ckixIWG9EKAJn8O9Su.Wajx60Ye7C7r.BqpHOtdGwGJvCCHWS', NULL, '2019-06-11 04:40:54', '2019-06-11 04:40:54', ''),
	(124, 'comprador', 'Professionaluyf', 'zvusafmermqichaGP', 'linnighmoto@gmail.com', 'dni', '3708', 'HT', 1, NULL, '$2y$10$58UrHAE2ctFeHKJR7ZLvy.3O1nPZSnfUFe9GDXF1kxHDynnyK2BLa', NULL, '2019-06-12 09:47:48', '2019-06-12 09:47:48', ''),
	(125, 'comprador', 'Candyuoh', 'svusafmegtbvdcbGP', 'christina@pmnne.com', 'dni', '7937', 'GP', 1, NULL, '$2y$10$CcZWxrAXAYdzjfGBQ3Ziu.1exguiso/RJz7aYnRU0l8TKpmYqWxoy', NULL, '2019-06-13 05:10:35', '2019-06-13 05:10:35', ''),
	(126, 'comprador', 'Juicertcy', 'xvusaymebnilzpxGP', 'info@queenwestphysio.ca', 'dni', '5132', 'GY', 1, NULL, '$2y$10$cEBxEn2k4wQiG6nJLe/3jOBn0W8kZIR/ZBgpyNmJGo2/0i8GUnmqu', NULL, '2019-06-13 23:48:06', '2019-06-13 23:48:06', ''),
	(127, 'comprador', 'Dulce', 'Valle Melendez', 'valle_melendez@yahoo.com.mx', 'pasaporte', 'G16203135', 'MX', 1, NULL, '$2y$10$M4chqcbULxqJq1uCeDk..eTv0ninoKlbwJmg54U0IagFZeJukXCqu', NULL, '2019-06-16 01:34:09', '2019-06-16 01:34:09', ''),
	(128, 'comprador', 'Carlo', 'Vallejos', 'carlovallejos96@gmail.com', 'pasaporte', '116310379', 'CR', 1, NULL, '$2y$10$yS0s7e8Ve.G.GTRiq.M1IujbOEsKO1jeV9CBk3fC4cxNSKy51zaY2', NULL, '2019-06-17 01:03:52', '2019-06-17 01:03:52', ''),
	(129, 'comprador', 'Silvia Janeth', 'Delgado Garcia', 'silvia.delgado.garcia@live.com', 'pasaporte', 'G16683024', 'MX', 1, NULL, '$2y$10$vM0TdcJmW0AvJj2f0BeqZuJ8wg1iBEsZIeNj1lo0gPx5VabzCnwRi', NULL, '2019-06-18 01:23:46', '2019-06-18 01:23:46', ''),
	(130, 'admin', 'Rodrigo', NULL, 'rodrigo_11@gmail.com', NULL, NULL, NULL, 1, NULL, '$2y$10$LqKAFUW8sexhKynRwmEEpOwIEL4N146Xm3xm6J.j4Hs33Dkhq/NXq', NULL, '2019-06-19 01:37:45', '2019-06-19 01:37:45', ''),
	(131, 'comprador', 'PERLA BRISEYDA', 'MARTINEZ SEPULVEDA', 'perlabms@outlook.com', 'pasaporte', 'G26170186', 'ES', 1, NULL, '$2y$10$5aWkZz.1nd5hjSGwRtHRzefW43uIzCZuywR0nmd8nVsow3mAytohu', NULL, '2019-06-19 01:52:18', '2019-06-19 01:52:18', ''),
	(133, 'comprador', 'Gerardo Raúl', 'Correa Bustillos', 'tato_00@hotmail.com', 'pasaporte', 'G25661964', 'MX', 1, NULL, '$2y$10$eIMYavg6OqjcSGRtNg7I9OW2orLQ5/FPVo2lZeYcuV/2jLB8YtSQS', NULL, '2019-06-19 06:13:07', '2019-06-19 06:13:07', '019991298273'),
	(134, 'comprador', 'Viridiana', 'Gómez González', 'virydental@hotmail.com', 'pasaporte', 'G17227374', 'ES', 1, NULL, '$2y$10$.6Bsxu/8x85v.VUUbkkgrOuI.F0HxwyZowY2t3jn8N02FPH0qXjYm', NULL, '2019-06-19 09:20:48', '2019-06-19 09:20:48', '+524191284628'),
	(135, 'comprador', 'Marina del Socorro', 'Guevara Solis', 'Marinaguevara.s@hotmail.com', 'pasaporte', 'AP452296', 'CO', 1, NULL, '$2y$10$qrufuZgAl6n7DZG47FhCfeUxrD2aEmHSG3trQKc5rJVfKdBENfhPS', NULL, '2019-06-21 03:51:41', '2019-06-21 03:51:41', '3106106423'),
	(136, 'comprador', 'Cristian Leonel', 'Alejandrez Palacios', 'calejandrez@ucol.mx', 'pasaporte', 'G25145820', 'MX', 1, NULL, '$2y$10$alvv8nhG7kGScX5Z0TeUL.clgwN6ERHYic9dds9e7RSMvhVK5cPsG', NULL, '2019-06-21 06:07:52', '2019-06-21 06:07:52', '916196449'),
	(137, 'comprador', 'Sarahi', 'Zeron', 'sarahi_zeron@yahoo.es', 'pasaporte', 'F000769', 'HN', 1, NULL, '$2y$10$XR/hjHBHxbFaU0bxYzFfCuwrM4ALLJT8A0AoI2tnMD0EQs06X9lAG', NULL, '2019-06-23 04:21:55', '2019-06-23 04:21:55', '504- 9856-5751'),
	(138, 'comprador', 'LUZ DEL CARMEN', 'ROSALES RAYMUNDO', 'luzrraymundo@gmail.com', 'pasaporte', '196971144', 'GT', 1, NULL, '$2y$10$454ShyQC8nYZAhvEKm.LQuWhC2q0AH/UYWXrl3FKPhg95qmN9dEAy', NULL, '2019-06-25 04:49:21', '2019-06-25 04:49:21', '50242013439'),
	(139, 'comprador', 'Victor Alfonso', 'Osorto Aguilar', 'vaoa_19@yahoo.es', 'pasaporte', 'F716358', 'HN', 1, NULL, '$2y$10$7XV4KozsSKPnqvI2CUEYy.sHYH1uuGAuFe/QwCgIFhbHIgnaW0crC', NULL, '2019-06-25 09:33:37', '2019-06-25 09:33:37', '+504 96548076');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla ecomer.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `multimedia_id` int(10) unsigned NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_multimedia_id_foreign` (`multimedia_id`),
  CONSTRAINT `videos_multimedia_id_foreign` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ecomer.videos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
