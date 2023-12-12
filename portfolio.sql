-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for portfolio
CREATE DATABASE IF NOT EXISTS `portfolio` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `portfolio`;

-- Dumping structure for table portfolio.bio
CREATE TABLE IF NOT EXISTS `bio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `last_name` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `contact_info` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `email` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `age` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `gender` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `address` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `picture` longblob,
  `introduction` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `likes` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `dislikes` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `hobbies` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table portfolio.bio: ~1 rows (approximately)
INSERT INTO `bio` (`id`, `first_name`, `last_name`, `contact_info`, `email`, `age`, `date_of_birth`, `nationality`, `gender`, `address`, `picture`, `introduction`, `likes`, `dislikes`, `hobbies`) VALUES
	(1, 'Jef', 'Lotoc', '09123456', 'jef.lotoc@gmail.com', 20, '2002-12-21', 'Filipino', 'Male', 'Guintarcan Villareal, Samar', _binary 0x70726f66696c655f70696374757265732f536267587770614f36306f47414c4d746f6358304a653459727257736e6f6a4b36396b52506d52472e6a7067, 'An aspiring web developer that relies mostly to chatGPT..I encourage myself to get used to stress so that the errors in my code will just become like a wind in my body and soul.', 'Secret talaga', 'Secret talaga', 'Watching anime');

-- Dumping structure for table portfolio.education
CREATE TABLE IF NOT EXISTS `education` (
  `id` int NOT NULL AUTO_INCREMENT,
  `elementary` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `junior_highschool` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `senior_highschool` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `college` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table portfolio.education: ~1 rows (approximately)
INSERT INTO `education` (`id`, `elementary`, `junior_highschool`, `senior_highschool`, `college`) VALUES
	(1, 'GES', 'GNHS', 'Samar Collge Inc.', 'LNU');

-- Dumping structure for table portfolio.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table portfolio.links
CREATE TABLE IF NOT EXISTS `links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facebook_link` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin DEFAULT '',
  `linkedin_link` varchar(255) COLLATE armscii8_bin DEFAULT '',
  `instagram_link` varchar(255) COLLATE armscii8_bin DEFAULT '',
  `telegram_link` varchar(255) COLLATE armscii8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table portfolio.links: ~1 rows (approximately)
INSERT INTO `links` (`id`, `facebook_link`, `linkedin_link`, `instagram_link`, `telegram_link`) VALUES
	(1, 'https://www.facebook.com/example', 'https://www.linkedin.com/in/example', 'https://www.instagram.com/example', 'https://t.me/example');

-- Dumping structure for table portfolio.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio.migrations: ~4 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Dumping structure for table portfolio.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table portfolio.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table portfolio.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `skill_level` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table portfolio.skills: ~14 rows (approximately)
INSERT INTO `skills` (`id`, `skill_name`, `skill_level`) VALUES
	(7, 'Reading', 8),
	(12, 'Sleeping', 5),
	(14, 'Cook', 6),
	(18, 'Care', 7),
	(19, 'Fire Breathing', 10),
	(20, 'coding', 1),
	(21, 'Armor', 9),
	(22, 'Jumping', 4),
	(23, 'Ambience', 7),
	(24, 'Critical', 2),
	(25, 'Sniping', 5),
	(26, 'Damage', 10),
	(27, 'Archery', 5),
	(28, 'Smithing', 3);

-- Dumping structure for table portfolio.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table portfolio.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$12$AU2c63BhEwUnzlUoBBB8OOEe02Jsrre6T4T3eROsts2Cv38F.mmPW', NULL, NULL, '2023-12-10 10:00:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
