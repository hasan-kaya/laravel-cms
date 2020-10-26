# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.21)
# Database: site
# Generation Time: 2020-10-26 13:06:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activity_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`),
  KEY `subject` (`subject_id`,`subject_type`),
  KEY `causer` (`causer_id`,`causer_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table admin_password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_password_resets`;

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`),
  KEY `admin_password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin','admin@admin.com','$2y$10$PjWFIJMrKHwNkb05Em8FCuYg7HgOSdCH4AITXXOMlow7EMzK7LgAi',NULL,NULL,NULL);

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table block_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `block_translations`;

CREATE TABLE `block_translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `block_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `block_translations` WRITE;
/*!40000 ALTER TABLE `block_translations` DISABLE KEYS */;

INSERT INTO `block_translations` (`id`, `locale`, `content`, `block_id`)
VALUES
	(1,'tr','<h4 class=\"sub_title\">çalışmalar</h4>\r\n<h2 class=\"sec_title\">yaptığımız işler</h2>\r\n<p class=\"sec_desc\">\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.<br>Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir.\r\n</p>',4),
	(2,'en','<h4 class=\"sub_title\">our portfolio</h4>\r\n<h2 class=\"sec_title\">work showcase</h2>\r\n<p class=\"sec_desc\">\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\n</p>',4),
	(3,'tr','<h4 class=\"sub_title\">referanslarımız</h4>\r\n<h2 class=\"sec_title\">bizimle çalışanlar</h2>\r\n<p class=\"sec_desc\"> Çalışanlarımıza en iyi eğitimi sunarken, <br>müşterilerimize olağanüstü hizmet sunmayı taahhüt ediyoruz. </p>',5),
	(4,'en','<h4 class=\"sub_title\">our clients</h4>\r\n<h2 class=\"sec_title\">they trust us</h2>\r\n<p class=\"sec_desc\"> We are committed to providing our customers with exceptional service while<br>offering our employees the best training. </p>',5),
	(5,'en','<h4 class=\"sub_title\">our news & articles</h4>\r\n<h2 class=\"sec_title\">latest blog posts</h2>\r\n<p class=\"sec_desc\"> We are committed to providing our customers with exceptional service while<br>offering our employees the best training.</p>',6),
	(6,'tr','<h4 class=\"sub_title\">haberlerimiz ve makalelerimiz</h4>\r\n<h2 class=\"sec_title\">son blog gönderileri</h2>\r\n<p class=\"sec_desc\"> Çalışanlarımıza en iyi eğitimi sunarken, <br>müşterilerimize olağanüstü hizmet sunmayı taahhüt ediyoruz..</p>',6);

/*!40000 ALTER TABLE `block_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blocks`;

CREATE TABLE `blocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint unsigned NOT NULL DEFAULT '0',
  `rank` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;

INSERT INTO `blocks` (`id`, `model_name`, `model_id`, `type`, `content`, `status`, `rank`, `created_at`, `updated_at`)
VALUES
	(1,'Category',1,'slider',NULL,1,1,'2020-10-24 12:44:56','2020-10-24 12:54:13'),
	(2,'Category',2,'services',NULL,1,2,'2020-10-24 12:57:37','2020-10-24 12:57:43'),
	(3,'Post',9,'about-us',NULL,1,3,'2020-10-24 13:12:34','2020-10-24 13:13:55'),
	(4,'Category',3,'portfolio','<h4 class=\"sub_title\">our portfolio</h4>\r\n<h2 class=\"sec_title\">work showcase</h2>\r\n<p class=\"sec_desc\">\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\n</p>',1,4,'2020-10-24 13:23:16','2020-10-26 10:25:15'),
	(5,'Category',5,'clients','<h4 class=\"sub_title\">our clients</h4>\r\n<h2 class=\"sec_title\">they trust us</h2>\r\n<p class=\"sec_desc\"> We are committed to providing our customers with exceptional service while<br>offering our employees the best training. </p>',1,5,'2020-10-26 09:03:11','2020-10-26 10:25:55'),
	(6,'Category',4,'blog','<h4 class=\"sub_title\">our news & articles</h4>\r\n<h2 class=\"sec_title\">latest blog posts</h2>\r\n<p class=\"sec_desc\"> We are committed to providing our customers with exceptional service while<br>offering our employees the best training.</p>',1,6,'2020-10-26 09:03:21','2020-10-26 10:26:36');

/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '0',
  `rank` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_category_id_foreign` (`category_id`),
  CONSTRAINT `categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `category_id`, `status`, `rank`, `created_at`, `updated_at`)
VALUES
	(1,NULL,1,1,'2020-10-24 12:38:39','2020-10-24 12:48:05'),
	(2,NULL,1,0,'2020-10-24 12:55:24','2020-10-24 12:55:26'),
	(3,NULL,1,0,'2020-10-24 13:23:45','2020-10-24 13:23:47'),
	(4,NULL,1,0,'2020-10-26 08:54:39','2020-10-26 08:54:40'),
	(5,NULL,1,0,'2020-10-26 09:45:41','2020-10-26 09:45:43');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_post`;

CREATE TABLE `category_post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `post_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  KEY `category_post_post_id_foreign` (`post_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_post` WRITE;
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;

INSERT INTO `category_post` (`id`, `category_id`, `post_id`)
VALUES
	(1,1,2),
	(2,2,3),
	(3,2,4),
	(4,2,5),
	(5,2,6),
	(6,2,7),
	(7,2,8),
	(8,3,10),
	(9,3,11),
	(10,3,12),
	(11,3,13),
	(12,3,14),
	(13,3,15),
	(14,5,16),
	(15,5,17),
	(16,5,18),
	(17,5,19),
	(18,5,20),
	(19,4,21),
	(20,4,22),
	(21,4,23);

/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_translations`;

CREATE TABLE `category_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  UNIQUE KEY `category_translations_slug_unique` (`slug`),
  KEY `category_translations_locale_index` (`locale`),
  CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_translations` WRITE;
/*!40000 ALTER TABLE `category_translations` DISABLE KEYS */;

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `slug`, `description`)
VALUES
	(1,1,'tr','Slayt','slayt',NULL),
	(2,2,'tr','Hizmetlerimiz','hizmetlerimiz',NULL),
	(3,3,'tr','Çalışmalar','calismalar',NULL),
	(4,4,'tr','Blog','blog',NULL),
	(5,5,'tr','Referanslarımız','referanslarimiz',NULL),
	(6,3,'en','Works','works',NULL),
	(7,1,'en','Slider','slider',NULL),
	(8,2,'en','Our Services','our-services',NULL),
	(9,4,'en','Blog','blog-1',NULL),
	(10,5,'en','Clients','clients',NULL);

/*!40000 ALTER TABLE `category_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table form_data
# ------------------------------------------------------------

DROP TABLE IF EXISTS `form_data`;

CREATE TABLE `form_data` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table language_lines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `language_lines`;

CREATE TABLE `language_lines` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `language_lines_group_index` (`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `language_lines` WRITE;
/*!40000 ALTER TABLE `language_lines` DISABLE KEYS */;

INSERT INTO `language_lines` (`id`, `group`, `key`, `text`, `created_at`, `updated_at`)
VALUES
	(1,'general','read_more','{\"tr\":\"Devam\\u0131n\\u0131 Oku\",\"en\":\"Read More\"}','2020-10-24 12:50:41','2020-10-26 09:07:27'),
	(2,'general','Page','{\"tr\":\"Sayfa\",\"en\":\"Page\"}','2020-10-24 14:20:31','2020-10-26 09:07:27'),
	(3,'general','Contact','{\"tr\":\"\\u0130leti\\u015fim\",\"en\":\"Contact\"}','2020-10-24 14:23:59','2020-10-26 09:07:27'),
	(4,'general','home','{\"tr\":\"Anasayfa\",\"en\":\"Home\"}','2020-10-26 07:15:45','2020-10-26 09:07:27'),
	(5,'general','copyright','{\"tr\":\"\\u00a9 CMS 2020. T\\u00dcM HAKLARI SAKLIDIR.\",\"en\":\"\\u00a9 CMS 2020. ALL RIGHTS RESERVED.\"}','2020-10-26 07:39:34','2020-10-26 09:07:27'),
	(6,'general','about_us','{\"tr\":\"Lorem Ipsum, dizgi ve bask\\u0131 end\\u00fcstrisinde kullan\\u0131lan m\\u0131g\\u0131r metinlerdir. Lorem Ipsum, ad\\u0131 bilinmeyen bir matbaac\\u0131n\\u0131n bir hurufat numune kitab\\u0131 olu\\u015fturmak \\u00fczere bir yaz\\u0131 galerisini alarak kar\\u0131\\u015ft\\u0131rd\\u0131\\u011f\\u0131 1500\'lerden beri end\\u00fcstri standard\\u0131 sahte metinler olarak kullan\\u0131lm\\u0131\\u015ft\\u0131r.\",\"en\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\"}','2020-10-26 07:43:18','2020-10-26 09:07:27'),
	(7,'contact','title','{\"tr\":\"\\u0130leti\\u015fim\",\"en\":\"Contact\"}','2020-10-26 07:49:27','2020-10-26 09:07:27'),
	(8,'contact','phone','{\"tr\":\"Telefon\",\"en\":\"Phone\"}','2020-10-26 07:49:41','2020-10-26 09:07:27'),
	(9,'contact','email','{\"tr\":\"E-Posta\",\"en\":\"E-Mail\"}','2020-10-26 07:49:47','2020-10-26 09:07:27'),
	(10,'contact','address','{\"tr\":\"Adres\",\"en\":\"Address\"}','2020-10-26 07:49:52','2020-10-26 09:07:27'),
	(11,'contact','form_title','{\"tr\":\"Bizimle ileti\\u015fime ge\\u00e7\",\"en\":\"Contact with us\"}','2020-10-26 07:59:29','2020-10-26 09:07:27'),
	(12,'contact','form_subtitle','{\"tr\":\"bize mesaj yaz\",\"en\":\"write us a message\"}','2020-10-26 08:00:14','2020-10-26 09:07:27'),
	(13,'contact','form_name','{\"tr\":\"Ad\\u0131n\\u0131z\",\"en\":\"Your Name\"}','2020-10-26 08:02:51','2020-10-26 09:07:27'),
	(14,'contact','form_email','{\"tr\":\"E-Posta Adresiniz\",\"en\":\"E-Mail Address\"}','2020-10-26 08:03:19','2020-10-26 09:07:27'),
	(15,'contact','form_phone','{\"tr\":\"Telefon Numaran\\u0131z\",\"en\":\"Phone Number\"}','2020-10-26 08:03:27','2020-10-26 09:07:27'),
	(16,'contact','form_subject','{\"tr\":\"Konu\",\"en\":\"Subject\"}','2020-10-26 08:03:36','2020-10-26 09:07:27'),
	(17,'contact','form_message','{\"tr\":\"Mesaj\\u0131n\\u0131z\",\"en\":\"Message\"}','2020-10-26 08:03:42','2020-10-26 09:07:27'),
	(18,'contact','form_submit','{\"tr\":\"Mesaj G\\u00f6nder\",\"en\":\"Send Message\"}','2020-10-26 08:04:33','2020-10-26 09:07:27'),
	(19,'general','sidebar_contact1','{\"tr\":\"yard\\u0131ma m\\u0131 ihtiyac\\u0131n\\u0131z var?\",\"en\":\"need help?\"}','2020-10-26 08:42:19','2020-10-26 09:07:27'),
	(20,'general','sidebar_contact2','{\"tr\":\"bir formu doldurmak yerine bir insanla konu\\u015fmay\\u0131 m\\u0131 tercih edersiniz? \\u015firket ofisini aray\\u0131n ve sizi yard\\u0131mc\\u0131 olabilecek bir ekip \\u00fcyesine ba\\u011flayal\\u0131m.\",\"en\":\"prefer speaking with a human to filling out a form? call corporate office and we will connect you with a team member who can help.\"}','2020-10-26 08:42:24','2020-10-26 09:07:27'),
	(21,'general','sidebar_contact3','{\"tr\":\"+90 123 456 78 90\",\"en\":\"+90 123 456 78 90\"}','2020-10-26 08:42:28','2020-10-26 09:07:27'),
	(22,'general','search_here','{\"tr\":\"Arama yap\\u0131n...\",\"en\":\"Search here...\"}','2020-10-26 08:51:06','2020-10-26 09:07:27'),
	(23,'general','page_not_found','{\"tr\":\"Arad\\u0131\\u011f\\u0131n\\u0131z Sayfa Bulunamad\\u0131\",\"en\":\"Page Not Found\"}','2020-10-26 08:52:00','2020-10-26 09:07:27'),
	(24,'general','Category','{\"tr\":\"Kategoriler\",\"en\":\"Categories\"}','2020-10-26 09:04:58','2020-10-26 09:07:27'),
	(25,'general','Post','{\"tr\":\"\\u0130\\u00e7erikler\",\"en\":\"Posts\"}','2020-10-26 09:05:23','2020-10-26 09:07:27'),
	(26,'general','Slider','{\"tr\":\"Kayan Resim\",\"en\":null}','2020-10-26 09:05:53','2020-10-26 09:07:27'),
	(27,'general','Services','{\"tr\":\"Hizmetler\",\"en\":null}','2020-10-26 09:05:59','2020-10-26 09:07:27'),
	(28,'general','AboutUs','{\"tr\":\"Hakk\\u0131m\\u0131zda\",\"en\":null}','2020-10-26 09:06:10','2020-10-26 09:07:27'),
	(29,'general','Portfolio','{\"tr\":\"\\u00c7al\\u0131\\u015fmalar\",\"en\":null}','2020-10-26 09:06:18','2020-10-26 09:07:27'),
	(30,'general','Clients','{\"tr\":\"Referanslar\",\"en\":null}','2020-10-26 09:06:25','2020-10-26 09:07:27'),
	(31,'general','Blog','{\"tr\":\"Blog\",\"en\":null}','2020-10-26 09:06:32','2020-10-26 09:07:27');

/*!40000 ALTER TABLE `language_lines` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint unsigned NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`)
VALUES
	(1,'App\\Models\\Post',2,'images','5f9420a46d967_1_1','5f9420a46d967_1_1.jpg','image/jpeg','public',863203,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',1,'2020-10-24 12:40:57','2020-10-24 12:40:58'),
	(2,'App\\Models\\Post',9,'images','5f9428cb58ac3_2','5f9428cb58ac3_2.jpg','image/jpeg','public',109657,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',2,'2020-10-24 13:14:57','2020-10-24 13:14:57'),
	(3,'App\\Models\\Post',9,'images','5f9428cee2a7d_1','5f9428cee2a7d_1.jpg','image/jpeg','public',100462,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',3,'2020-10-24 13:14:57','2020-10-24 13:14:57'),
	(4,'App\\Models\\Post',10,'images','5f942b20dcf90_1','5f942b20dcf90_1.jpg','image/jpeg','public',82782,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',4,'2020-10-24 13:24:50','2020-10-24 13:24:50'),
	(5,'App\\Models\\Post',11,'images','5f942c47c203e_2','5f942c47c203e_2.jpg','image/jpeg','public',56244,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',5,'2020-10-24 13:29:52','2020-10-24 13:29:52'),
	(6,'App\\Models\\Post',12,'images','5f942c618c68c_3','5f942c618c68c_3.jpg','image/jpeg','public',71654,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',6,'2020-10-24 13:30:11','2020-10-24 13:30:11'),
	(7,'App\\Models\\Post',13,'images','5f942c6e461b0_4','5f942c6e461b0_4.jpg','image/jpeg','public',241863,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',7,'2020-10-24 13:30:23','2020-10-24 13:30:23'),
	(8,'App\\Models\\Post',14,'images','5f942c78f0942_5','5f942c78f0942_5.jpg','image/jpeg','public',267996,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',8,'2020-10-24 13:30:34','2020-10-24 13:30:34'),
	(9,'App\\Models\\Post',15,'images','5f942c844cbc1_6','5f942c844cbc1_6.jpg','image/jpeg','public',76966,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',9,'2020-10-24 13:30:45','2020-10-24 13:30:45'),
	(10,'App\\Models\\Post',16,'images','5f969af170a7c_1','5f969af170a7c_1.png','image/png','public',3687,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',10,'2020-10-26 09:46:28','2020-10-26 09:46:28'),
	(11,'App\\Models\\Post',17,'images','5f969afe0add5_2','5f969afe0add5_2.png','image/png','public',5436,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',11,'2020-10-26 09:46:40','2020-10-26 09:46:40'),
	(12,'App\\Models\\Post',18,'images','5f969b0a6267b_3','5f969b0a6267b_3.png','image/png','public',3748,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',12,'2020-10-26 09:46:51','2020-10-26 09:46:51'),
	(13,'App\\Models\\Post',19,'images','5f969b151a201_4','5f969b151a201_4.png','image/png','public',3236,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',13,'2020-10-26 09:47:02','2020-10-26 09:47:02'),
	(14,'App\\Models\\Post',20,'images','5f969b1eb13f9_5','5f969b1eb13f9_5.png','image/png','public',3682,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',14,'2020-10-26 09:47:12','2020-10-26 09:47:12'),
	(15,'App\\Models\\Post',21,'images','5f969cfe3852b_1','5f969cfe3852b_1.jpg','image/jpeg','public',60373,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',15,'2020-10-26 09:55:11','2020-10-26 09:55:11'),
	(16,'App\\Models\\Post',22,'images','5f969d0c66575_2','5f969d0c66575_2.jpg','image/jpeg','public',53147,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',16,'2020-10-26 09:55:26','2020-10-26 09:55:26'),
	(17,'App\\Models\\Post',23,'images','5f969d1a72c17_3','5f969d1a72c17_3.jpg','image/jpeg','public',53375,'[]','{\"generated_conversions\": {\"thumb\": true}}','[]',17,'2020-10-26 09:55:39','2020-10-26 09:55:39');

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_item_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_item_translations`;

CREATE TABLE `menu_item_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_item_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_item_translations_menu_item_id_locale_unique` (`menu_item_id`,`locale`),
  KEY `menu_item_translations_locale_index` (`locale`),
  CONSTRAINT `menu_item_translations_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_item_translations` WRITE;
/*!40000 ALTER TABLE `menu_item_translations` DISABLE KEYS */;

INSERT INTO `menu_item_translations` (`id`, `menu_item_id`, `locale`, `label`, `link`)
VALUES
	(1,1,'tr','Anasayfa','./'),
	(2,2,'tr','Hakkımızda','./page/hakkimizda'),
	(3,3,'tr','Hizmetlerimiz','#'),
	(4,4,'tr','Çalışmalar','./category/calismalar'),
	(5,5,'tr','Blog','./category/blog'),
	(6,6,'tr','İletişim','./contact'),
	(7,7,'tr','Hizmet 1','./page/hizmet-1'),
	(8,8,'tr','Twitter','#'),
	(9,9,'tr','Youtube','#'),
	(10,10,'tr','Facebook','#'),
	(11,11,'tr','İçerik 1','#'),
	(12,12,'tr','İçerik 2','#'),
	(13,13,'tr','İçerik 3','#'),
	(14,1,'en','Home','./'),
	(15,2,'en','About Us','./page/about-us'),
	(16,3,'en','Our Services','#'),
	(17,7,'en','Service 1','./page/service-1'),
	(18,4,'en','Works','./category/works'),
	(19,5,'en','Blog','./category/blog'),
	(20,6,'en','Contact','./contact');

/*!40000 ALTER TABLE `menu_item_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `parent` bigint unsigned NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `parent`, `sort`, `icon`, `depth`, `created_at`, `updated_at`)
VALUES
	(1,1,0,0,NULL,0,'2020-10-24 13:36:40','2020-10-24 13:36:45'),
	(2,1,0,1,NULL,0,'2020-10-24 13:36:45','2020-10-24 13:37:03'),
	(3,1,0,2,NULL,0,'2020-10-24 13:37:03','2020-10-24 13:37:15'),
	(4,1,0,4,NULL,0,'2020-10-24 13:37:15','2020-10-24 13:37:35'),
	(5,1,0,5,NULL,0,'2020-10-24 13:37:17','2020-10-24 13:37:35'),
	(6,1,0,6,NULL,0,'2020-10-24 13:37:20','2020-10-24 13:37:35'),
	(7,1,3,3,NULL,1,'2020-10-24 13:37:33','2020-10-24 13:37:36'),
	(8,2,0,0,NULL,0,'2020-10-24 14:21:59','2020-10-24 14:22:03'),
	(9,2,0,1,NULL,0,'2020-10-24 14:22:03','2020-10-24 14:22:07'),
	(10,2,0,2,NULL,0,'2020-10-24 14:22:07','2020-10-24 14:22:08'),
	(11,3,0,0,NULL,0,'2020-10-26 08:46:32','2020-10-26 08:46:34'),
	(12,3,0,1,NULL,0,'2020-10-26 08:46:34','2020-10-26 08:46:36'),
	(13,3,0,2,NULL,0,'2020-10-26 08:46:36','2020-10-26 08:46:48');

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_translations`;

CREATE TABLE `menu_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_translations_menu_id_locale_unique` (`menu_id`,`locale`),
  KEY `menu_translations_locale_index` (`locale`),
  CONSTRAINT `menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_translations` WRITE;
/*!40000 ALTER TABLE `menu_translations` DISABLE KEYS */;

INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `name`)
VALUES
	(1,1,'tr','Ana Menü'),
	(2,2,'tr','Sosyal Medya'),
	(3,3,'tr','İçerik Menüsü'),
	(5,1,'en','Ana Menü');

/*!40000 ALTER TABLE `menu_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'ana-menue','2020-10-24 13:35:58','2020-10-26 08:52:57'),
	(2,'sosyal-medya','2020-10-24 14:21:35','2020-10-24 14:21:35'),
	(3,'sidebar-menu','2020-10-26 08:46:20','2020-10-26 08:46:48');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_01_14_034920_create_settings_table',1),
	(4,'2019_08_19_000000_create_failed_jobs_table',1),
	(5,'2020_01_11_124129_create_admins_table',1),
	(6,'2020_01_11_124130_create_admin_password_resets_table',1),
	(7,'2020_01_11_124444_create_activity_log_table',1),
	(8,'2020_01_12_200359_create_posts_table',1),
	(9,'2020_01_12_201444_create_categories_table',1),
	(10,'2020_01_12_204227_create_category_post_table',1),
	(11,'2020_01_12_205144_create_permission_tables',1),
	(12,'2020_01_17_165938_create_language_lines_table',1),
	(13,'2020_01_18_134637_create_media_table',1),
	(14,'2020_01_19_221037_create_menus_table',1),
	(15,'2020_01_19_224110_create_menu_items_table',1),
	(16,'2020_01_29_160646_create_blocks_table',1),
	(17,'2020_02_03_133616_create_form_data_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table model_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table model_has_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\Models\\Admin',1);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table post_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_translations`;

CREATE TABLE `post_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  UNIQUE KEY `post_translations_slug_unique` (`slug`),
  KEY `post_translations_locale_index` (`locale`),
  CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `post_translations` WRITE;
/*!40000 ALTER TABLE `post_translations` DISABLE KEYS */;

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `name`, `slug`, `description`, `tags`, `content`)
VALUES
	(1,2,'tr','HOŞGELDİNİZ','hosgeldiniz','SLOGAN GELECEK',NULL,NULL),
	(2,3,'tr','Sunduğumuz Hizmetler','sundugumuz-hizmetler','Burada slogan yer alacak',NULL,'<p>Yinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.</p>'),
	(3,4,'tr','Hizmet 1','hizmet-1','Lorem Ipsum, dizgi ve baskı endüstrisi',NULL,NULL),
	(4,5,'tr','Hizmet 2','hizmet-2','Lorem Ipsum, dizgi ve baskı endüstrisi',NULL,NULL),
	(5,6,'tr','Hizmet 3','hizmet-3','Lorem Ipsum, dizgi ve baskı endüstrisi',NULL,NULL),
	(6,7,'tr','Hizmet 4','hizmet-4','Lorem Ipsum, dizgi ve baskı endüstrisi',NULL,NULL),
	(7,8,'tr','Hizmet 5','hizmet-5','Lorem Ipsum, dizgi ve baskı endüstrisi',NULL,NULL),
	(8,9,'tr','HAKKIMIZDA','hakkimizda','HAKKIMIZDA SLOGAN BURADA YER ALACAK',NULL,'<p>&Ccedil;alışanlarımıza en iyi eğitimi sunarken m&uuml;şterilerimize olağan&uuml;st&uuml; hizmet sunmayı taahh&uuml;t ediyoruz. Lorem Ipsum, baskı ve dizgi end&uuml;strisinin kukla metnidir, 1500&#39;lerden beri end&uuml;strinin standart kukla metni olmuştur.</p>'),
	(9,10,'tr','Çalışma 1','calisma-1','Örnek 1',NULL,NULL),
	(10,11,'tr','Çalışma 2','calisma-2','Örnek 2',NULL,NULL),
	(11,12,'tr','Çalışma 3','calisma-3','Örnek 3',NULL,NULL),
	(12,13,'tr','Çalışma 4','calisma-4','Örnek 4',NULL,NULL),
	(13,14,'tr','Çalışma 5','calisma-5','Örnek 5',NULL,NULL),
	(14,15,'tr','Çalışma 6','calisma-6','Örnek 6',NULL,NULL),
	(15,16,'tr','Referans 1','referans-1',NULL,NULL,NULL),
	(16,17,'tr','Referans 2','referans-2',NULL,NULL,NULL),
	(17,18,'tr','Referans 3','referans-3',NULL,NULL,NULL),
	(18,19,'tr','Referans 4','referans-4',NULL,NULL,NULL),
	(19,20,'tr','Referans 5','referans-5',NULL,NULL,NULL),
	(20,21,'tr','Örnek Blog Yazısı 1','oernek-blog-yazisi-1',NULL,NULL,NULL),
	(21,22,'tr','Örnek Blog Yazısı 2','oernek-blog-yazisi-2',NULL,NULL,NULL),
	(22,23,'tr','Örnek Blog Yazısı 3','oernek-blog-yazisi-3',NULL,NULL,NULL),
	(23,23,'en','Example Blog Post 3','example-blog-post-3',NULL,NULL,NULL),
	(24,22,'en','Example Blog Post 2','example-blog-post-2',NULL,NULL,NULL),
	(25,21,'en','Example Blog Post 1','example-blog-post-1',NULL,NULL,NULL),
	(26,2,'en','WELCOME','welcome','HEADING HERE',NULL,NULL),
	(27,20,'en','Client 5','client-5',NULL,NULL,NULL),
	(28,19,'en','Client 4','client-4',NULL,NULL,NULL),
	(29,18,'en','Client 3','client-3',NULL,NULL,NULL),
	(30,17,'en','Client 2','client-2',NULL,NULL,NULL),
	(31,16,'en','Client 1','client-1',NULL,NULL,NULL),
	(32,15,'en','Work 6','work-6','Örnek 6',NULL,NULL),
	(33,14,'en','Work 5','work-5','Örnek 5',NULL,NULL),
	(34,13,'en','Work 4','work-4','Örnek 4',NULL,NULL),
	(35,12,'en','Work 3','work-3','Örnek 3',NULL,NULL),
	(36,11,'en','Work 2','work-2','Örnek 2',NULL,NULL),
	(37,10,'en','Work 1','work-1','Örnek 1',NULL,NULL),
	(38,9,'en','ABOUT US','about-us','ABOUT US SECTION HEADING',NULL,'<p>We are committed to providing our customers with exceptional service while offering our employees the best training. Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry&#39;s standard dummy text ever since the 1500s.</p>'),
	(39,8,'en','Service 5','service-5','Lorem Ipsum is simply dummy text',NULL,NULL),
	(40,7,'en','Service 4','service-4','Lorem Ipsum is simply dummy text',NULL,NULL),
	(41,6,'en','Service 3','service-3','Lorem Ipsum is simply dummy text',NULL,NULL),
	(42,5,'en','Service 2','service-2','Lorem Ipsum is simply dummy text',NULL,NULL),
	(43,4,'en','Service 1','service-1','Lorem Ipsum is simply dummy text',NULL,NULL),
	(44,3,'en','Our Services','our-services','Services heading here',NULL,'<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s</p>');

/*!40000 ALTER TABLE `post_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint unsigned NOT NULL DEFAULT '1',
  `status` tinyint unsigned NOT NULL DEFAULT '0',
  `rank` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `type`, `status`, `rank`, `created_at`, `updated_at`)
VALUES
	(2,1,1,1,'2020-10-24 12:40:57','2020-10-24 12:45:50'),
	(3,1,1,1,'2020-10-24 12:55:58','2020-10-24 12:58:30'),
	(4,1,1,2,'2020-10-24 13:02:29','2020-10-24 13:03:27'),
	(5,1,1,3,'2020-10-24 13:04:15','2020-10-24 13:04:20'),
	(6,1,1,4,'2020-10-24 13:04:40','2020-10-24 13:04:55'),
	(7,1,1,5,'2020-10-24 13:04:49','2020-10-24 13:04:55'),
	(8,1,1,6,'2020-10-24 13:05:10','2020-10-24 13:05:28'),
	(9,1,1,0,'2020-10-24 13:12:14','2020-10-24 13:12:18'),
	(10,1,1,1,'2020-10-24 13:24:50','2020-10-24 13:24:54'),
	(11,1,1,2,'2020-10-24 13:29:52','2020-10-24 13:29:56'),
	(12,1,1,3,'2020-10-24 13:30:10','2020-10-24 13:30:53'),
	(13,1,1,4,'2020-10-24 13:30:23','2020-10-24 13:30:52'),
	(14,1,1,5,'2020-10-24 13:30:34','2020-10-24 13:30:51'),
	(15,1,1,6,'2020-10-24 13:30:45','2020-10-24 13:30:51'),
	(16,1,1,1,'2020-10-26 09:46:28','2020-10-26 09:50:07'),
	(17,1,1,2,'2020-10-26 09:46:40','2020-10-26 09:50:07'),
	(18,1,1,3,'2020-10-26 09:46:51','2020-10-26 09:50:08'),
	(19,1,1,4,'2020-10-26 09:47:02','2020-10-26 09:50:09'),
	(20,1,1,5,'2020-10-26 09:47:12','2020-10-26 09:50:10'),
	(21,1,1,1,'2020-10-26 09:55:03','2020-10-26 09:55:45'),
	(22,1,1,2,'2020-10-26 09:55:26','2020-10-26 09:55:46'),
	(23,1,1,3,'2020-10-26 09:55:39','2020-10-26 09:55:46');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table role_has_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'Super Admin','admin',NULL,NULL);

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table setting_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setting_translations`;

CREATE TABLE `setting_translations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` bigint unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting_translations_locale_index` (`locale`),
  CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `setting_translations` WRITE;
/*!40000 ALTER TABLE `setting_translations` DISABLE KEYS */;

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `val`)
VALUES
	(1,1,'tr','İçerik Yönetim Sistemi'),
	(2,2,'tr','demo@demo.com'),
	(3,3,'tr','ssl'),
	(4,4,'tr','general/logo.png'),
	(5,5,'tr','+90 123 345 67 89'),
	(6,6,'tr','Test Mahallesi Test Sk. No:0/0 Test/Test'),
	(7,7,'tr','https://www.google.com/maps/place/New+York,+Amerika+Birle%C5%9Fik+Devletleri/@40.6971494,-74.2598655,10z/data=!3m1!4b1!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728'),
	(8,8,'tr','+90 123 345 67 89'),
	(9,1,'en','Content Management System'),
	(10,2,'en','demo@demo.com'),
	(11,5,'en','+90 123 345 67 89'),
	(12,8,'en','+90 123 345 67 89'),
	(13,6,'en','Test Mahallesi Test Sk. No:0/0 Test/Test'),
	(14,7,'en','https://www.google.com/maps/place/New+York,+Amerika+Birle%C5%9Fik+Devletleri/@40.6971494,-74.2598655,10z/data=!3m1!4b1!4m5!3m4!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!8m2!3d40.7127753!4d-74.0059728'),
	(15,3,'en','ssl');

/*!40000 ALTER TABLE `setting_translations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `name`, `type`)
VALUES
	(1,'title','string'),
	(2,'email','string'),
	(3,'mail_encryption','string'),
	(4,'logo','string'),
	(5,'phone','string'),
	(6,'address','string'),
	(7,'map','string'),
	(8,'whatsapp','string');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
