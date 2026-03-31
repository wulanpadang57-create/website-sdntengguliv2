-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: websitesdn1tengguli
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `achievements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int NOT NULL,
  `achievement_date` date NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `achievements_user_id_foreign` (`user_id`),
  CONSTRAINT `achievements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES (3,'Juara 3 Rebana','Juara 3 Rebana yang di raih oleh SDN 1 Tengguli.','seni','11 Anak',NULL,2025,'2025-08-09',4,'2026-03-30 09:47:00','2026-03-30 09:56:31'),(4,'Juara 1 Kaligrafi','Juara 1 Kaligrafi oleh SDN 1 Tengguli','seni','Tiara kelas 5',NULL,2025,'2025-08-09',4,'2026-03-30 09:48:18','2026-03-30 09:56:26'),(5,'Juara 2 Khipdik','Juara 2 Khipdik oleh SDN 1 Tengguli','non-akademik','Naura kls 5',NULL,2025,'2025-08-09',4,'2026-03-30 09:48:53','2026-03-30 09:56:14'),(6,'Juara 3 Silat','Juara 3 Silat yang diraih oleh siswa kelas 4 dari SDN 1 Tengguli.','akademik','Ain kls 4',NULL,2024,'2024-10-08',4,'2026-03-30 09:58:12','2026-03-30 09:58:12'),(7,'Juara I Lomba Matematika Tingkat Kabupaten',NULL,'akademik','Andi Saputra',NULL,2024,'2026-01-31',1,'2026-03-30 20:20:58','2026-03-30 20:20:58'),(8,'Juara II Lomba Olahraga Lari 100M',NULL,'olahraga','Siti Nurhaliza',NULL,2024,'2026-03-03',1,'2026-03-30 20:20:58','2026-03-30 20:20:58');
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `user_id` bigint unsigned NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_user_id_foreign` (`user_id`),
  CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,'Pengumuman Penting: Pendaftaran Siswa Baru TP 2025/2026','Dibuka pendaftaran siswa baru untuk tahun pelajaran 2025/2026. Syarat dan ketentuan dapat dilihat di halaman pendaftaran.','normal',1,'2026-02-19 00:00:00',NULL,1,'2026-02-19 15:30:42','2026-03-30 08:50:28'),(3,'Pengumuman Penting: Pendaftaran Siswa Baru TP 2024/2025','Dibuka pendaftaran siswa baru untuk tahun pelajaran 2024/2025. Syarat dan ketentuan dapat dilihat di halaman pendaftaran.','urgent',1,'2026-03-31 03:20:58',NULL,1,'2026-03-30 20:20:58','2026-03-30 20:20:58');
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'news',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Berita Umum','berita-umum',NULL,'news','2026-02-19 15:30:42','2026-02-19 15:30:42'),(2,'Pengumuman','pengumuman',NULL,'news','2026-02-19 15:30:42','2026-02-19 15:30:42'),(3,'Prestasi Akademik','prestasi-akademik',NULL,'achievement','2026-02-19 15:30:42','2026-02-19 15:30:42'),(4,'Prestasi Olahraga','prestasi-olahraga',NULL,'achievement','2026-02-19 15:30:42','2026-02-19 15:30:42');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extracurriculars`
--

DROP TABLE IF EXISTS `extracurriculars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `extracurriculars` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `extracurriculars_slug_unique` (`slug`),
  KEY `extracurriculars_user_id_foreign` (`user_id`),
  CONSTRAINT `extracurriculars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extracurriculars`
--

LOCK TABLES `extracurriculars` WRITE;
/*!40000 ALTER TABLE `extracurriculars` DISABLE KEYS */;
INSERT INTO `extracurriculars` VALUES (1,'Rebana','rebana','Ekstrakulikuler Rebana di SDN 1 Tengguli','extracurriculars/cyPacjlsQLHOZxwWgBJhU8vOYTLPY3yvnjWd6Fjf.jpg',4,'published','2026-03-30 00:00:00',3,'2026-03-30 08:41:53','2026-03-30 08:45:29'),(2,'Pramuka','pramuka','Ekstrakulikuler Pramuka yang di SDN 1 Tengguli','extracurriculars/ItX7WyvlkQr52ieGxtCH23vBQk55RmTAn97nDgLs.jpg',4,'published','2026-03-30 00:00:00',0,'2026-03-30 08:47:05','2026-03-30 08:47:05'),(3,'Pantonim','pantonim','Ekstrakulikuler Pantonim di SDN 1 Tengguli','extracurriculars/Q7ZzMzw6td4ci3rH0dH2VVuTqd1cab1ucfCcxtnc.jpg',4,'published','2026-03-30 00:00:00',0,'2026-03-30 08:54:15','2026-03-30 08:54:15');
/*!40000 ALTER TABLE `extracurriculars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `galleries_slug_unique` (`slug`),
  KEY `galleries_user_id_foreign` (`user_id`),
  CONSTRAINT `galleries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Upacara Bendera','upacara-bendera','Dokumentasi kegiatan upacara bendera rutin setiap hari Senin','galleries/DOBEN8syTVjQnG9lvs7tNlfMngOsq6L1xFicFz1I.jpg',1,0,'2026-02-19 15:30:42','2026-03-30 09:42:50'),(2,'Pesantren Ramadhan','pesantren-ramadhan','Pesantren Ramadhan','galleries/Rl92TW32Gp9NTB2cDsmTNuGvLLMG901dHIKcVZku.jpg',4,0,'2026-03-30 09:27:42','2026-03-30 09:33:43');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_photos`
--

DROP TABLE IF EXISTS `gallery_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_photos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint unsigned NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_photos_gallery_id_foreign` (`gallery_id`),
  CONSTRAINT `gallery_photos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_photos`
--

LOCK TABLES `gallery_photos` WRITE;
/*!40000 ALTER TABLE `gallery_photos` DISABLE KEYS */;
INSERT INTO `gallery_photos` VALUES (1,2,'gallery-photos/qHgqUmzslbBv1F2slI3VKdy3iO6RF53ho57zdUlK.jpg',NULL,1,'2026-03-30 09:27:55','2026-03-30 09:27:55'),(2,2,'gallery-photos/dXVPU9AezrJlwBFE9YRTTaY8lIqrymAuY4enMYdC.jpg',NULL,2,'2026-03-30 09:33:13','2026-03-30 09:33:13'),(3,1,'gallery-photos/kH3GyrzT80hE1Ad1ecBgeHEaTMe13Tv92AYutwmU.jpg',NULL,1,'2026-03-30 09:43:02','2026-03-30 09:43:02');
/*!40000 ALTER TABLE `gallery_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_02_20_000001_create_categories_table',1),(6,'2024_02_20_000002_create_news_table',1),(7,'2024_02_20_000003_create_announcements_table',1),(8,'2024_02_20_000004_create_achievements_table',1),(9,'2024_02_20_000005_create_galleries_table',1),(10,'2024_02_20_000006_create_gallery_photos_table',1),(11,'2024_02_20_000007_create_videos_table',1),(12,'2024_02_20_000008_create_teachers_table',1),(13,'2024_02_20_000009_create_sliders_table',1),(14,'2024_02_20_000010_create_static_pages_table',1),(15,'2024_02_20_000011_create_settings_table',1),(16,'2024_02_20_000012_create_visitors_table',1),(17,'2024_02_20_000013_add_role_to_users_table',1),(18,'2026_03_30_000001_create_extracurriculars_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` datetime DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_slug_unique` (`slug`),
  KEY `news_category_id_foreign` (`category_id`),
  KEY `news_user_id_foreign` (`user_id`),
  CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Selamat Datang di Website SD Negeri 1 Tengguli','selamat-datang-di-website-sd-1-tengguli','Kami dengan bangga mempersembahkan website resmi SD Negeri 1 Tengguli. Website ini dibuat untuk memberikan informasi terkini tentang kegiatan sekolah, prestasi siswa, dan berbagai berita penting lainnya.',NULL,1,1,'published','2026-03-31 03:20:58',1,'2026-02-19 15:30:42','2026-03-30 20:20:58'),(2,'Libur Sekolah Mendekati Hari Raya Idul Fitri','libur-sekolah-mendekati-hari-raya-idul-fitri','Libur Sekolah Mendekati Hari Raya Idul Fitri',NULL,2,4,'published','2026-03-17 00:00:00',0,'2026-03-30 08:49:30','2026-03-30 08:49:30'),(3,'Eduwisata ke desa plajan','eduwisata-ke-desa-plajan','Eduwisata ke desa plajan untuk meng explore dan menunjang kurikulum merdeka, menuju indonesia emas','news/BR9cZmTxHqEb9R8ucBlJxBzcEZrpL8nmqskZ6atT.jpg',1,4,'published','2026-03-30 00:00:00',0,'2026-03-30 08:52:28','2026-03-30 08:52:28'),(4,'Pesantren Ramadhan','pesantren-ramadhan','Kegiatan Pesantren Ramadhan yang di adakan untuk menunjang pendidikan agama di SDN 1 Tengguli','news/VZ6n778xDGTnORKjMjPBGRfOZgO8QsJG2vcsYISn.jpg',1,4,'published','2026-03-30 00:00:00',0,'2026-03-30 08:55:59','2026-03-30 08:55:59');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'school_name','SD Negeri 1 Tengguli',NULL,NULL),(2,'school_address','Jl. Tengguli, Kabupaten Bangli, Bali 80513',NULL,NULL),(3,'school_phone','(0353) 23456',NULL,NULL),(4,'school_email','info@sd1tengguli.sch.id',NULL,NULL),(5,'principal_name','Ibu Dra. Soemitro, M.Si',NULL,NULL),(6,'vision','Terwujudnya pembelajaran yang berkualitas dan berorientasi pada pengembangan karakter siswa',NULL,NULL),(7,'mission','Menyelenggarakan pendidikan yang komprehensif dan mengembangkan potensi siswa secara optimal',NULL,NULL),(8,'facebook_url','https://facebook.com/sd1tengguli',NULL,NULL),(9,'instagram_url','https://instagram.com/sd1tengguli',NULL,NULL),(10,'twitter_url',NULL,NULL,NULL),(11,'youtube_url',NULL,NULL,NULL),(12,'maps_embed','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15855.364401345232!2d110.76190849100095!3d-6.541740685650935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7123aa0aa86e15%3A0x6e7f1d36d8867098!2sSD%20Negeri%201%20Tengguli!5e0!3m2!1sid!2sid!4v1772985228250!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>',NULL,NULL),(13,'school_lat','-6.54046160620856',NULL,NULL),(14,'school_lng','110.76963325283204',NULL,NULL),(15,'school_logo','logo/U8E6WYM5rndFgDWehdl6dHvYaBeMeUw2FPcN2XIH.webp',NULL,NULL),(16,'students_count','300',NULL,NULL),(17,'founded_year','1999',NULL,NULL),(18,'school_city','Kab. Jepara, Jawa Tengah',NULL,NULL),(19,'school_accreditation','A',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sliders_user_id_foreign` (`user_id`),
  CONSTRAINT `sliders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_pages`
--

DROP TABLE IF EXISTS `static_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `static_pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `static_pages_slug_unique` (`slug`),
  KEY `static_pages_user_id_foreign` (`user_id`),
  CONSTRAINT `static_pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_pages`
--

LOCK TABLES `static_pages` WRITE;
/*!40000 ALTER TABLE `static_pages` DISABLE KEYS */;
INSERT INTO `static_pages` VALUES (1,'tentang','Tentang Sekolah','SD Negeri 1 Tengguli adalah sebuah sekolah dasar yang berlokasi di Tangerang, Jawa Barat. Kami berkomitmen untuk memberikan pendidikan terbaik bagi semua siswa.',1,'2026-02-19 15:37:55','2026-02-19 15:37:55');
/*!40000 ALTER TABLE `static_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teachers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_email_unique` (`email`),
  UNIQUE KEY `teachers_nip_unique` (`nip`),
  KEY `teachers_user_id_foreign` (`user_id`),
  CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Ibu Dra. Soemitro, M.Si','kepala@sd1tengguli.sch.id',NULL,'196512311989032001','Kepala Sekolah dengan pengalaman lebih dari 20 tahun di bidang pendidikan.','teachers/IKwfYFqafCMymPPRSsgNrt7tIiqppK0xTIAFzD3o.jpg','Kepala Sekolah',NULL,NULL,'2026-02-19 15:30:42','2026-03-30 20:20:58'),(2,'Bapak Bambang Setiawan, S.Pd','bambang@sd1tengguli.sch.id',NULL,NULL,'Guru Kelas 4','teachers/KQTtsOyqGpmHoIixOZWZD6jkY3wXpF0pGpxIr7s1.jpg','Guru','Matematika, IPA',NULL,'2026-02-19 15:30:42','2026-03-30 20:20:58'),(3,'Ibu Ratni Wijaya, S.Pd','ratni@sd1tengguli.sch.id',NULL,NULL,'Guru Kelas 5','teachers/FS7tLParv60xGT7fzDLjBhRJ4ons0ZmKCfb1qSIT.jpg','Guru','Bahasa Indonesia, IPS',NULL,'2026-02-19 15:30:42','2026-03-30 20:20:58');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viewer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin SD 1 Tengguli','admin@sd1tengguli.sch.id','2026-03-30 20:20:58','$2y$12$/2bFxPGtwt79p9YY3LGBKOa/q4SMDbe6pZSZxz6yqNDYqFoISmJMK','admin',NULL,'2026-02-19 15:30:42','2026-03-30 20:20:58'),(3,'Maulana','maulanakenang24@gmail.com',NULL,'$2y$12$QLRb6KJEgPsxND37uiAOzOiqQv5tSjeYouQt89EcqO4QCqHlx36fG','viewer',NULL,'2026-02-19 15:33:29','2026-02-19 15:33:29'),(4,'Admin','admin@example.com','2026-02-22 22:14:40','$2y$12$o/C/k5PG.hbNVt3bbjmpsus0/FklpJJkuUlFhpceiIhlxmWLeA3Ze','admin','AgJZnpYmTLUg39Bxb2mrN9qTMmxtyjgkjS368WnQ81kvAVrPE7b4rEMeoI9x','2026-02-22 22:14:40','2026-02-22 22:14:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `youtube_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `videos_slug_unique` (`slug`),
  KEY `videos_user_id_foreign` (`user_id`),
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'asdadsad','asdadsad','asfsafa','tUKqEi7cZjl1fLIP','https://img.youtube.com/vi/tUKqEi7cZjl1fLIP/maxresdefault.jpg',4,0,'2026-03-30 09:38:48','2026-03-30 09:38:48');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (1,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 15:35:52','2026-02-19 15:35:52'),(2,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-19 15:38:25','2026-02-19 15:38:25'),(3,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 15:38:33','2026-02-19 15:38:33'),(4,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 15:40:48','2026-02-19 15:40:48'),(5,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-19 15:40:58','2026-02-19 15:40:58'),(6,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-02-19 15:41:03','2026-02-19 15:41:03'),(7,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-19 15:41:12','2026-02-19 15:41:12'),(8,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 15:42:15','2026-02-19 15:42:15'),(9,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-19 15:50:52','2026-02-19 15:50:52'),(10,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 16:03:30','2026-02-19 16:03:30'),(11,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 16:04:27','2026-02-19 16:04:27'),(12,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-19 16:05:19','2026-02-19 16:05:19'),(13,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-19 16:06:03','2026-02-19 16:06:03'),(14,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 16:07:52','2026-02-19 16:07:52'),(15,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-19 16:08:06','2026-02-19 16:08:06'),(16,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-19 16:10:54','2026-02-19 16:10:54'),(17,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 02:48:32','2026-02-20 02:48:32'),(18,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-20 03:07:26','2026-02-20 03:07:26'),(19,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-20 03:07:48','2026-02-20 03:07:48'),(20,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-20 03:12:09','2026-02-20 03:12:09'),(21,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 03:16:28','2026-02-20 03:16:28'),(22,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-20 03:16:37','2026-02-20 03:16:37'),(23,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 03:17:18','2026-02-20 03:17:18'),(24,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-20 03:17:37','2026-02-20 03:17:37'),(25,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 03:20:10','2026-02-20 03:20:10'),(26,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 03:20:17','2026-02-20 03:20:17'),(27,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-20 03:20:29','2026-02-20 03:20:29'),(28,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-02-20 03:21:04','2026-02-20 03:21:04'),(29,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-02-20 03:21:07','2026-02-20 03:21:07'),(30,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 03:28:51','2026-02-20 03:28:51'),(31,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 03:31:17','2026-02-20 03:31:17'),(32,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 03:31:54','2026-02-20 03:31:54'),(33,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-02-20 03:32:10','2026-02-20 03:32:10'),(34,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-02-20 03:32:39','2026-02-20 03:32:39'),(35,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-02-20 03:32:49','2026-02-20 03:32:49'),(36,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-20 03:32:55','2026-02-20 03:32:55'),(37,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 03:42:13','2026-02-20 03:42:13'),(38,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 03:42:32','2026-02-20 03:42:32'),(39,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-20 03:43:10','2026-02-20 03:43:10'),(40,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-20 05:35:09','2026-02-20 05:35:09'),(41,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-02-20 07:22:52','2026-02-20 07:22:52'),(42,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 07:26:35','2026-02-20 07:26:35'),(43,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-20 07:27:08','2026-02-20 07:27:08'),(44,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 07:33:10','2026-02-20 07:33:10'),(45,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-20 07:34:00','2026-02-20 07:34:00'),(46,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.109.4 Chrome/142.0.7444.265 Electron/39.3.0 Safari/537.36',NULL,'2026-02-20 07:38:19','2026-02-20 07:38:19'),(47,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-02-20 07:38:28','2026-02-20 07:38:28'),(48,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.2364',NULL,'2026-02-20 07:38:49','2026-02-20 07:38:49'),(49,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-20 07:39:16','2026-02-20 07:39:16'),(50,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-21 01:09:07','2026-02-21 01:09:07'),(51,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-21 01:09:28','2026-02-21 01:09:28'),(52,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 14:23:27','2026-02-22 14:23:27'),(53,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 21:56:25','2026-02-22 21:56:25'),(54,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 21:57:32','2026-02-22 21:57:32'),(55,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 21:58:24','2026-02-22 21:58:24'),(56,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 22:00:09','2026-02-22 22:00:09'),(57,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-22 22:16:13','2026-02-22 22:16:13'),(58,'127.0.0.1','/','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.19041.6456',NULL,'2026-02-22 22:20:55','2026-02-22 22:20:55'),(59,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-24 00:03:44','2026-02-24 00:03:44'),(60,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-25 07:34:26','2026-02-25 07:34:26'),(61,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-26 07:56:04','2026-02-26 07:56:04'),(62,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-26 08:43:43','2026-02-26 08:43:43'),(63,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-26 08:44:12','2026-02-26 08:44:12'),(64,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-26 08:44:21','2026-02-26 08:44:21'),(65,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-02-26 11:07:14','2026-02-26 11:07:14'),(66,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 11:07:51','2026-02-26 11:07:51'),(67,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 11:30:35','2026-02-26 11:30:35'),(68,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 12:53:04','2026-02-26 12:53:04'),(69,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 12:53:28','2026-02-26 12:53:28'),(70,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 13:21:00','2026-02-26 13:21:00'),(71,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-02-26 13:21:06','2026-02-26 13:21:06'),(72,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-02-26 13:21:10','2026-02-26 13:21:10'),(73,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-03-08 07:02:54','2026-03-08 07:02:54'),(74,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:03:19','2026-03-08 07:03:19'),(75,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:03:56','2026-03-08 07:03:56'),(76,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:04:00','2026-03-08 07:04:00'),(77,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:07:58','2026-03-08 07:07:58'),(78,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:08:04','2026-03-08 07:08:04'),(79,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/','2026-03-08 07:18:14','2026-03-08 07:18:14'),(80,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita/selamat-datang-di-website-sd-1-tengguli','2026-03-08 08:44:19','2026-03-08 08:44:19'),(81,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-03-08 08:49:50','2026-03-08 08:49:50'),(82,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-03-08 08:51:58','2026-03-08 08:51:58'),(83,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 08:54:17','2026-03-08 08:54:17'),(84,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 08:56:12','2026-03-08 08:56:12'),(85,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 08:57:24','2026-03-08 08:57:24'),(86,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:14:28','2026-03-08 09:14:28'),(87,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:17:46','2026-03-08 09:17:46'),(88,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:20:48','2026-03-08 09:20:48'),(89,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:24:44','2026-03-08 09:24:44'),(90,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:25:26','2026-03-08 09:25:26'),(91,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/admin/settings','2026-03-08 09:43:51','2026-03-08 09:43:51'),(92,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 09:44:08','2026-03-08 09:44:08'),(93,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 09:56:27','2026-03-08 09:56:27'),(94,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 09:56:38','2026-03-08 09:56:38'),(95,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 10:02:06','2026-03-08 10:02:06'),(96,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 10:07:08','2026-03-08 10:07:08'),(97,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 10:17:45','2026-03-08 10:17:45'),(98,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 10:19:43','2026-03-08 10:19:43'),(99,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-08 10:22:59','2026-03-08 10:22:59'),(100,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0',NULL,'2026-03-30 07:59:33','2026-03-30 07:59:33'),(101,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-03-30 08:02:39','2026-03-30 08:02:39'),(102,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-03-30 08:08:30','2026-03-30 08:08:30'),(103,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-03-30 08:20:14','2026-03-30 08:20:14'),(104,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/ekstrakurikuler','2026-03-30 08:20:18','2026-03-30 08:20:18'),(105,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-30 08:46:18','2026-03-30 08:46:18'),(106,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-30 08:47:08','2026-03-30 08:47:08'),(107,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita?category=pengumuman','2026-03-30 08:48:19','2026-03-30 08:48:19'),(108,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita?category=pengumuman','2026-03-30 08:49:34','2026-03-30 08:49:34'),(109,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 08:49:46','2026-03-30 08:49:46'),(110,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 08:50:32','2026-03-30 08:50:32'),(111,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 08:52:32','2026-03-30 08:52:32'),(112,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 08:56:04','2026-03-30 08:56:04'),(113,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 08:59:24','2026-03-30 08:59:24'),(114,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 09:22:45','2026-03-30 09:22:45'),(115,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 09:23:48','2026-03-30 09:23:48'),(116,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/berita','2026-03-30 09:25:12','2026-03-30 09:25:12'),(117,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-03-30 09:36:35','2026-03-30 09:36:35'),(118,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/guru','2026-03-30 09:38:51','2026-03-30 09:38:51'),(119,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/prestasi','2026-03-30 09:58:34','2026-03-30 09:58:34'),(120,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/ekstrakurikuler','2026-03-30 09:59:31','2026-03-30 09:59:31'),(121,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0','http://127.0.0.1:8000/galeri','2026-03-30 10:07:27','2026-03-30 10:07:27'),(122,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0',NULL,'2026-03-30 17:43:03','2026-03-30 17:43:03'),(123,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0','http://127.0.0.1:8000/guru','2026-03-30 17:46:34','2026-03-30 17:46:34'),(124,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0','http://127.0.0.1:8000/admin/achievements','2026-03-30 17:48:23','2026-03-30 17:48:23'),(125,'127.0.0.1','/','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36 Edg/146.0.0.0',NULL,'2026-03-30 20:02:32','2026-03-30 20:02:32');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-31 10:39:29
