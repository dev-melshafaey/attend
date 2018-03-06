/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.30-MariaDB : Database - attend_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `attends` */

DROP TABLE IF EXISTS `attends`;

CREATE TABLE `attends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attends_user_code_foreign` (`user_code`),
  CONSTRAINT `attends_user_code_foreign` FOREIGN KEY (`user_code`) REFERENCES `users` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `attends` */

insert  into `attends`(`id`,`user_code`,`state`,`comment`,`created_at`,`updated_at`) values (1,'111','IN',NULL,'2018-03-06 10:04:06','2018-03-06 10:04:06'),(2,'111','OUT',NULL,'2018-03-06 10:04:11','2018-03-06 10:04:11'),(3,'111','IN',NULL,'2018-03-06 10:04:21','2018-03-06 10:04:21'),(4,'777','IN',NULL,'2018-03-06 10:04:30','2018-03-06 10:04:30'),(5,'111','OUT',NULL,'2018-03-06 10:04:44','2018-03-06 10:04:44'),(6,'777','OUT',NULL,'2018-03-06 10:04:58','2018-03-06 10:04:58');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(6,'2018_03_05_141125_create_attends_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_code_unique` (`code`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`code`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','123','dev.melshafaey@gmail.com','$2y$10$0rTfJqTvWQDgVFPgzxl0WOt7XSSdRapv8UDmdqADnxDMFPmvIYeve','ggslqPjmZ15WxGLzTKUqUwia4RFMnesCkT9GakeDREr5igBD2kHc2T8gezWk','2018-03-05 12:52:44','2018-03-05 12:52:44'),(6,'Mahmoud','111','mm_shifo@yahoo.com',NULL,NULL,'2018-03-05 13:34:41','2018-03-05 13:34:41'),(7,'Ahmed','888','dd@dd.com',NULL,NULL,'2018-03-05 15:04:17','2018-03-05 15:04:17'),(9,'Ahmed','777','abdo@shoot.com',NULL,NULL,'2018-03-05 17:01:35','2018-03-05 17:01:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
