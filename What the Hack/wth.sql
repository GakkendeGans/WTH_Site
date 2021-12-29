-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 29 dec 2021 om 08:54
-- Serverversie: 5.7.31
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wth`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_image` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_menu_id_foreign` (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `header_image`, `title`, `body`, `page_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '', '.What the hack', '<div style=\"color: white; text-align: center; width: 100%; height: 600px; background-size: contain; background-repeat: no-repeat; background-image: url(/images/uploads/Website_ArtWork_03.jpg);\"><div style=\"font-size: 2rem; padding-top: 20%;\">WHAT THE HACK?!<br></div><div style=\"font-size: 1rem;\">Providing young people with more opportunities in a safer cyber environment.</div></div>', 1, '2021-12-22 08:13:38', '2021-12-28 18:10:28', NULL),
(6, 'learning_hub_friesland.png', 'Learning Hub Friesland', '<p><span style=\"color: rgb(127, 127, 127); font-family: Roboto, sans-serif; font-size: 14px; text-align: center;\">Netherlands</span></p><p><span style=\"text-align: center;\"><br></span></p>\r\n<p>\r\n<a target=\"_blank\" href=\"https://learninghubfriesland.nl/\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://twitter.com/HubFriesland\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.linkedin.com/company/learning-hub-friesland/about/\"><i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i></a>\r\n</p>', 4, '2021-12-28 11:41:30', '2021-12-28 11:56:22', NULL),
(3, '', 'CONNECT 2020 EVENT', '<p>In the final month of the year 2020, What the Hack partner MKB Cybercampus organised the Connect.frl 2020 event. On Wednesday 9 December, the annual IT congress took place with the theme ‘Testing’. In a full day programme, upcoming IT talents were introduced to the Northern Netherlands IT sector. A vast number of projects running at various Frisian organisations, educational institutions and companies were presented, underlining that the North of the Netherlands is, and remains, an interesting location for young IT talents.<br>\r\nThe partners of the What the Hack consortium were invited to join the two (English language) workshops below:<br>\r\n<a href=\"https://www.youtube.com/watch?v=aCDhEKiE3vw&amp;list=PLfqCkMICEQ3PHAfv70EbaBqdbEjnJgIMS&amp;index=2\" target=\"_blank\"><br><font color=\"#000000\" style=\"\"><b>\r\nSeb Rose | An introduction to Behaviour Driven Development (BDD) – YouTube</b></font></a></p><p><br>An introduction to Behaviour Driven Development (BDD): BDD is a set of practices that enhance the outcomes of your software delivery efforts. I’ll introduce them to you from the agile perspective of individuals and interactions, rather than looking closely at any specific processes or tools. I will emphasise the value that adopting these BDD practices can deliver, while making clear how they differ from other valuable practices, such as testing and test automation.</p><p><br>\r\n<a href=\"https://www.youtube.com/watch?v=r5octGkOaqs&amp;list=PLfqCkMICEQ3PHAfv70EbaBqdbEjnJgIMS&amp;index=7\" target=\"_blank\"><font color=\"#000000\"><b>ING | End to End testing with Raptor – YouTube</b></font></a></p><p><br>\r\nShadow Dom is no more a villain in terms of end to end testing of front end flows. Raptor makes it very easy to test web components. In this talk we will see how easily we can write and maintain our end to end test scripts in Raptor.</p>', 2, '2021-12-22 09:09:22', '2021-12-28 16:35:29', NULL),
(4, 'sobre-wth-1024x683.jpg', 'About us', 'Supported by regional stakeholders Learning Hub Friesland and the Foundation for Cybersafety in Northern Netherlands, Friesland College school D’Drive has the ambition of creating joint projects of public and private stakeholders in the field of cybersafety, cybersecurity and ethical hacking to strengthen VET students in the digital era.<br>\r\nTo realize this ambition, Friesland College applied for funding under the Erasmus+ KA2 ‘Strategic Partnerships’ programme. Strategic Partnerships are trans-national projects designed to develop and share innovative practices and to promote cooperation, peer learning, and exchanges of experiences concerning education, training, and youth.', 3, '2021-12-28 09:04:02', '2021-12-28 17:40:19', NULL),
(5, 'Friesland.png', 'Friesland College', '<p><span style=\"color: rgb(127, 127, 127); font-family: Roboto, sans-serif; font-size: 14px; text-align: center;\">Netherlands</span></p><p><br></p>\r\n<p>\r\n<a target=\"_blank\" href=\"https://www.frieslandcollege.nl/\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://es-la.facebook.com/frieslandcollege/\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://twitter.com/frieslandcoll?lang=es\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.instagram.com/frieslandcollege/\"><i class=\"fa fa-instagram\" aria-hidden=\"true\"></i></a>\r\n</p>', 4, '2021-12-28 09:24:43', '2021-12-28 11:55:15', NULL),
(8, 'hitsa-300x118.png', 'Information Technology Foundation for Education', '<p><span style=\"color: rgb(127, 127, 127); font-family: Roboto, sans-serif; font-size: 14px; text-align: center;\">Estonia</span></p><p><br></p>\r\n<p>\r\n<a target=\"_blank\" href=\"https://www.hitsa.ee/\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.facebook.com/hitsa.ee/?pageid=151418901579972&amp;ftentidentifier=429758753876498&amp;padding=0\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://twitter.com/HITSAest\"><i class=\"fa fa-twitter\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.linkedin.com/company/hitsa/?originalSubdomain=es\"><i class=\"fa fa-linkedin\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.instagram.com/hitsa.ee/\"><i class=\"fa fa-instagram\" aria-hidden=\"true\"></i></a>\r\n</p>', 4, '2021-12-28 12:00:24', '2021-12-28 12:02:06', NULL),
(7, 'MKB.jpg', 'Foundation for Cybersafety Northern NL', '<p><span style=\"color: rgb(127, 127, 127); font-family: Roboto, sans-serif; font-size: 14px; text-align: center;\">Netherlands</span></p><p><span style=\"color: rgb(127, 127, 127); font-family: Roboto, sans-serif; font-size: 14px; text-align: center;\"><br></span></p>\r\n<p>\r\n<a target=\"_blank\" href=\"https://csecn.nl/\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://hacklab.frl/\"><i class=\"fa fa-globe\" aria-hidden=\"true\"></i></a>&nbsp;<a target=\"_blank\" href=\"https://www.facebook.com/pg/hacklabfrl/about/?ref=page_internal\"><i class=\"fa fa-facebook\" aria-hidden=\"true\"></i></a>\r\n</p>', 4, '2021-12-28 11:44:00', '2021-12-28 12:01:37', NULL),
(9, '', 'TKNIKA organised a Project Dissemination Day via Twitter', '<p>On 3 April 2020, TKNIKA&nbsp;<a href=\"https://tknika.eus/\"><b><font color=\"#000000\">https://tknika.eus/</font></b></a>\r\n&nbsp;organised a virtual Dissemination Day\r\non Erasmus+ KA2/KA3 projects via Twitter. As a partner, TKNIKA also\r\nintroduced from The Basque Country our What the Hack?! project. General\r\nDirector of Technology and Advance Learning of Vice Ministry of The Basque\r\nGovernment, Rikardo Lamadrid, welcomed the virtual audience and invited\r\nthem to follow and share the video of the presentation at this link.<br>\r\n<a href=\"https://twitter.com/Int_Tknika/status/1245961227043561472\" target=\"_blank\"><b><font color=\"#000000\">https://twitter.com/Int_Tknika/status/1245961227043561472</font></b></a><a href=\"https://twitter.com/Int_Tknika/status/1245961227043561472\"><b><font color=\"#000000\"></font></b></a></p><p><br>\r\nRicardo followed with the presentation and, with the support of this slideshare,\r\nintroduced What the Hack?! project as a project aiming to provide young people\r\nwith more opportunities in a safer cyber environment. So far 56 projects where\r\nVET colleges are involved have been presented. At this purpose, this booklet\r\n<a href=\"https://tknika.eus/wp%20content/uploads/2020/04/ka2_projects_booklet2019_20.pdf\"><b><font color=\"#000000\">https://tknika.eus/wp content/uploads/2020/04/ka2_projects_booklet2019_20.pd</font>f</b></a></p><p><br>provides a comprehensive summary of the Erasmus+ Innovation projects active\r\nin the VET centres of the Basque Country during the Academic Year 2019-2020.\r\n<br>\r\nCebanc took part to the online event and were very active in disseminating and\r\nsharing posts regarding the project presentation which received many likes and\r\nwere re-tweeted in turn by many other individuals and organisations\r\n<a href=\"https://www.slideshare.net/JuanLuis208/what-the-hack-project\"><b><font color=\"#000000\">https://www.slideshare.net/JuanLuis208/what-the-hack-project</font></b></a></p>', 2, '2021-12-28 16:25:54', '2021-12-28 16:45:48', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_17_085930_create_viewtypes_table', 1),
(6, '2021_12_17_090001_create_pages_table', 1),
(7, '2021_12_17_100251_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewtype_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_category_id_foreign` (`viewtype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`id`, `name`, `viewtype_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home', 3, '2021-12-21 20:52:57', '2021-12-28 15:23:18', NULL),
(2, 'News', 2, '2021-12-22 09:08:19', '2021-12-22 09:08:19', NULL),
(3, 'About Us', 3, '2021-12-28 08:58:26', '2021-12-28 17:34:51', NULL),
(4, 'Partners', 1, '2021-12-28 09:13:29', '2021-12-28 09:13:29', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jan Zuur', 'test@test.nl', '2021-12-21 19:53:57', '$2y$10$Hf05t/odX1oe.vA.MU5jP.dyCSvKJUAH7tlEAZtlZDvfWy/rtHO8G', NULL, NULL, '2021-12-21 20:02:12'),
(2, 'Aad', 'aad@fanaad.nl', NULL, '$2y$10$CypbJSh/l1TefD1rdCLaDeSyEtDXYQapFDQpnG.sH4vlwfS09y5um', NULL, '2021-12-28 17:43:04', '2021-12-28 17:43:04');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `viewtypes`
--

DROP TABLE IF EXISTS `viewtypes`;
CREATE TABLE IF NOT EXISTS `viewtypes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blade` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `viewtypes`
--

INSERT INTO `viewtypes` (`id`, `name`, `blade`, `created_at`, `updated_at`) VALUES
(1, 'Grid', 'Grid', '2021-12-21 20:50:17', '2021-12-21 20:50:17'),
(2, 'Plain', 'plain', '2021-12-22 09:19:32', '2021-12-22 09:19:32'),
(3, 'Single', 'single', '2021-12-28 17:34:29', '2021-12-28 17:34:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
