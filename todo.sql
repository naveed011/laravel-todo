-- Adminer 4.8.1 MySQL 8.0.28-0ubuntu0.21.10.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `task_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduled_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `todos` (`id`, `task_title`, `scheduled_at`, `created_at`, `updated_at`) VALUES
(1,	'Test',	'2022-03-01 03:52:00',	'2022-03-11 07:48:44',	'2022-03-11 07:48:44'),
(2,	'Buy grocery for home',	'2022-01-11 12:00:00',	'2022-03-11 07:55:51',	'2022-03-11 07:55:51'),
(3,	'Final Test',	'2022-03-11 15:10:00',	'2022-03-11 08:10:56',	'2022-03-11 08:10:56');

-- 2022-03-11 13:11:11
