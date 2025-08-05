-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 103.57.221.79    Database: gcmeaqcdhosting_laravel_learning
-- ------------------------------------------------------
-- Server version	5.5.5-10.6.22-MariaDB-cll-lve-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `laravelweb_categories`
--

DROP TABLE IF EXISTS `laravelweb_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_categories` (
  `category_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `laravelweb_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_categories`
--

LOCK TABLES `laravelweb_categories` WRITE;
/*!40000 ALTER TABLE `laravelweb_categories` DISABLE KEYS */;
INSERT INTO `laravelweb_categories` VALUES (1,'Technology','post','technology','Technology News','Latest updates in tech','2025-04-10 08:43:16','2025-04-10 08:43:16'),(2,'Lifestyle','post','lifestyle','Lifestyle Tips','Best lifestyle advice','2025-04-10 08:43:16','2025-04-10 08:43:16'),(3,'Health','post','health','Health Updates','Stay healthy with our tips','2025-04-10 08:43:16','2025-04-10 08:43:16'),(4,'Travel','post','travel','Travel Guides','Explore the world','2025-04-10 08:43:16','2025-04-10 08:43:16'),(5,'Food','post','food','Food Recipes','Delicious recipes for you','2025-04-10 08:43:16','2025-04-10 08:43:16'),(6,'Fashion','post','fashion','Fashion Trends','Latest fashion updates','2025-04-10 08:43:16','2025-04-10 08:43:16'),(7,'Education','post','education','Education News','Learn something new','2025-04-10 08:43:16','2025-04-10 08:43:16'),(8,'Business','post','business','Business Insights','Grow your business','2025-04-10 08:43:16','2025-04-10 08:43:16'),(9,'Entertainment','post','entertainment','Entertainment News','Fun and entertainment','2025-04-10 08:43:16','2025-04-10 08:43:16'),(10,'Sports','post','sports','Sports Updates','Stay updated with sports','2025-04-10 08:43:16','2025-04-10 08:43:16');
/*!40000 ALTER TABLE `laravelweb_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_categories_posts`
--

DROP TABLE IF EXISTS `laravelweb_categories_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_categories_posts` (
  `post_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`category_id`,`post_id`),
  KEY `laravelweb_categories_posts_post_id_index` (`post_id`),
  KEY `laravelweb_categories_posts_category_id_index` (`category_id`),
  CONSTRAINT `laravelweb_categories_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `laravelweb_categories` (`category_id`) ON DELETE CASCADE,
  CONSTRAINT `laravelweb_categories_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `laravelweb_posts` (`post_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_categories_posts`
--

LOCK TABLES `laravelweb_categories_posts` WRITE;
/*!40000 ALTER TABLE `laravelweb_categories_posts` DISABLE KEYS */;
INSERT INTO `laravelweb_categories_posts` VALUES (1,1),(10,1),(2,3),(11,3),(3,4),(12,4),(4,5),(13,5),(5,6),(14,6),(6,7),(7,8),(15,8),(8,9),(9,10);
/*!40000 ALTER TABLE `laravelweb_categories_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_media`
--

DROP TABLE IF EXISTS `laravelweb_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_media` (
  `media_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) unsigned NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) unsigned DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`),
  KEY `model_type_model_id_index` (`model_type`,`model_id`),
  KEY `laravelweb_media_model_type_index` (`model_type`),
  KEY `laravelweb_media_order_column_index` (`order_column`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_media`
--

LOCK TABLES `laravelweb_media` WRITE;
/*!40000 ALTER TABLE `laravelweb_media` DISABLE KEYS */;
INSERT INTO `laravelweb_media` VALUES (1,'App\\Models\\Product',1,'images','smartphone-x.jpg','image/jpeg','public','public',102400,'{}','{\"color\": \"black\"}','{}','{}',1,'Smartphone X Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(2,'App\\Models\\Product',2,'images','fitness-tracker.jpg','image/jpeg','public','public',51200,'{}','{\"color\": \"silver\"}','{}','{}',2,'Fitness Tracker Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(3,'App\\Models\\Product',3,'images','travel-backpack.jpg','image/jpeg','public','public',76800,'{}','{\"color\": \"blue\"}','{}','{}',3,'Travel Backpack Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(4,'App\\Models\\Product',4,'images','kitchen-mixer.jpg','image/jpeg','public','public',128000,'{}','{\"color\": \"white\"}','{}','{}',4,'Kitchen Mixer Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(5,'App\\Models\\Product',5,'images','winter-jacket.jpg','image/jpeg','public','public',89600,'{}','{\"color\": \"black\"}','{}','{}',5,'Winter Jacket Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(6,'App\\Models\\lecture13\\ModelLecture13Post',1,'images','tech-trends.jpg','image/jpeg','public','public',64000,'{}','{}','{}','{}',1,'Tech Trends Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(7,'App\\Models\\lecture13\\ModelLecture13Post',2,'images','healthy-living.jpg','image/jpeg','public','public',48000,'{}','{}','{}','{}',2,'Healthy Living Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(8,'App\\Models\\lecture13\\ModelLecture13Post',3,'images','travel-destinations.jpg','image/jpeg','public','public',72000,'{}','{}','{}','{}',3,'Travel Destinations Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(9,'App\\Models\\lecture13\\ModelLecture13Post',4,'images','dinner-recipes.jpg','image/jpeg','public','public',56000,'{}','{}','{}','{}',4,'Dinner Recipes Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(10,'App\\Models\\lecture13\\ModelLecture13Post',5,'images','fashion-trends.jpg','image/jpeg','public','public',68000,'{}','{}','{}','{}',5,'Fashion Trends Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(11,'App\\Models\\Product',6,'images','study-desk.jpg','image/jpeg','public','public',115200,'{}','{\"color\": \"brown\"}','{}','{}',6,'Study Desk Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(12,'App\\Models\\Product',7,'images','business-planner.jpg','image/jpeg','public','public',38400,'{}','{\"color\": \"black\"}','{}','{}',7,'Business Planner Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(13,'App\\Models\\Product',8,'images','movie-streaming-device.jpg','image/jpeg','public','public',57600,'{}','{\"color\": \"black\"}','{}','{}',8,'Streaming Device Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(14,'App\\Models\\Product',9,'images','sports-shoes.jpg','image/jpeg','public','public',70400,'{}','{\"color\": \"white\"}','{}','{}',9,'Sports Shoes Image','2025-04-10 08:43:56','2025-04-10 08:43:56'),(15,'App\\Models\\Product',10,'images','tablet-pro.jpg','image/jpeg','public','public',96000,'{}','{\"color\": \"silver\"}','{}','{}',10,'Tablet Pro Image','2025-04-10 08:43:56','2025-04-10 08:43:56');
/*!40000 ALTER TABLE `laravelweb_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_model_has_permissions`
--

DROP TABLE IF EXISTS `laravelweb_model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `laravelweb_model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravelweb_permissions` (`permission_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_model_has_permissions`
--

LOCK TABLES `laravelweb_model_has_permissions` WRITE;
/*!40000 ALTER TABLE `laravelweb_model_has_permissions` DISABLE KEYS */;
INSERT INTO `laravelweb_model_has_permissions` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4),(5,'App\\Models\\User',5),(6,'App\\Models\\User',6),(7,'App\\Models\\User',7),(8,'App\\Models\\User',8),(9,'App\\Models\\User',9),(10,'App\\Models\\User',10);
/*!40000 ALTER TABLE `laravelweb_model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_model_has_roles`
--

DROP TABLE IF EXISTS `laravelweb_model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `laravelweb_model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravelweb_roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_model_has_roles`
--

LOCK TABLES `laravelweb_model_has_roles` WRITE;
/*!40000 ALTER TABLE `laravelweb_model_has_roles` DISABLE KEYS */;
INSERT INTO `laravelweb_model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',4),(5,'App\\Models\\User',5),(6,'App\\Models\\User',6),(7,'App\\Models\\User',7),(8,'App\\Models\\User',8),(9,'App\\Models\\User',9),(10,'App\\Models\\User',10);
/*!40000 ALTER TABLE `laravelweb_model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_page_meta`
--

DROP TABLE IF EXISTS `laravelweb_page_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_page_meta` (
  `page_meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`page_meta_id`),
  KEY `laravelweb_page_meta_page_id_foreign` (`page_id`),
  KEY `laravelweb_page_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `laravelweb_page_meta_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `laravelweb_pages` (`page_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_page_meta`
--

LOCK TABLES `laravelweb_page_meta` WRITE;
/*!40000 ALTER TABLE `laravelweb_page_meta` DISABLE KEYS */;
INSERT INTO `laravelweb_page_meta` VALUES (1,1,'keywords','about, company','2025-04-10 08:44:12','2025-04-10 08:44:12'),(2,2,'keywords','contact, support','2025-04-10 08:44:12','2025-04-10 08:44:12'),(3,3,'keywords','services, offerings','2025-04-10 08:44:12','2025-04-10 08:44:12'),(4,4,'keywords','privacy, policy','2025-04-10 08:44:12','2025-04-10 08:44:12'),(5,5,'keywords','terms, usage','2025-04-10 08:44:12','2025-04-10 08:44:12'),(6,6,'keywords','faq, questions','2025-04-10 08:44:12','2025-04-10 08:44:12'),(7,7,'keywords','careers, jobs','2025-04-10 08:44:12','2025-04-10 08:44:12'),(8,8,'keywords','team, staff','2025-04-10 08:44:12','2025-04-10 08:44:12'),(9,9,'keywords','support, help','2025-04-10 08:44:12','2025-04-10 08:44:12'),(10,10,'keywords','blog, articles','2025-04-10 08:44:12','2025-04-10 08:44:12'),(11,11,'keywords','events, schedule','2025-04-10 08:44:12','2025-04-10 08:44:12'),(12,12,'keywords','portfolio, projects','2025-04-10 08:44:12','2025-04-10 08:44:12'),(13,13,'keywords','testimonials, reviews','2025-04-10 08:44:12','2025-04-10 08:44:12'),(14,14,'keywords','pricing, plans','2025-04-10 08:44:12','2025-04-10 08:44:12'),(15,15,'keywords','home, welcome','2025-04-10 08:44:12','2025-04-10 08:44:12');
/*!40000 ALTER TABLE `laravelweb_page_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_pages`
--

DROP TABLE IF EXISTS `laravelweb_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_pages` (
  `page_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `laravelweb_pages_slug_unique` (`slug`),
  KEY `laravelweb_pages_user_id_foreign` (`user_id`),
  CONSTRAINT `laravelweb_pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravelweb_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_pages`
--

LOCK TABLES `laravelweb_pages` WRITE;
/*!40000 ALTER TABLE `laravelweb_pages` DISABLE KEYS */;
INSERT INTO `laravelweb_pages` VALUES (1,'About Us','about-us','About Us','Learn about our company','This is the about us page...','https://example.com/about-us',1,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(2,'Contact Us','contact-us','Contact Us','Get in touch with us','This is the contact us page...','https://example.com/contact-us',2,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(3,'Our Services','our-services','Our Services','What we offer','This is the services page...','https://example.com/our-services',3,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(4,'Privacy Policy','privacy-policy','Privacy Policy','Our privacy policy','This is the privacy policy page...','https://example.com/privacy-policy',4,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(5,'Terms of Use','terms-of-use','Terms of Use','Our terms of use','This is the terms of use page...','https://example.com/terms-of-use',5,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(6,'FAQ','faq','FAQ','Frequently Asked Questions','This is the FAQ page...','https://example.com/faq',6,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(7,'Careers','careers','Careers','Join our team','This is the careers page...','https://example.com/careers',7,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(8,'Our Team','our-team','Our Team','Meet our team','This is the team page...','https://example.com/our-team',8,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(9,'Support','support','Support','Get support','This is the support page...','https://example.com/support',9,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(10,'Blog','blog','Blog','Read our blog','This is the blog page...','https://example.com/blog',10,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(11,'Events','events','Events','Upcoming events','This is the events page...','https://example.com/events',1,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(12,'Portfolio','portfolio','Portfolio','Our portfolio','This is the portfolio page...','https://example.com/portfolio',2,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(13,'Testimonials','testimonials','Testimonials','What our clients say','This is the testimonials page...','https://example.com/testimonials',3,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(14,'Pricing','pricing','Pricing','Our pricing plans','This is the pricing page...','https://example.com/pricing',4,'2025-04-10 08:43:31','2025-04-10 08:43:31'),(15,'Home','home','Home','Welcome to our site','This is the home page...','https://example.com/home',5,'2025-04-10 08:43:31','2025-04-10 08:43:31');
/*!40000 ALTER TABLE `laravelweb_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_permissions`
--

DROP TABLE IF EXISTS `laravelweb_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`),
  UNIQUE KEY `laravelweb_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_permissions`
--

LOCK TABLES `laravelweb_permissions` WRITE;
/*!40000 ALTER TABLE `laravelweb_permissions` DISABLE KEYS */;
INSERT INTO `laravelweb_permissions` VALUES (1,'create-post','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(2,'edit-post','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(3,'delete-post','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(4,'create-page','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(5,'edit-page','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(6,'delete-page','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(7,'manage-users','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(8,'manage-products','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(9,'view-reports','web','2025-04-10 08:43:23','2025-04-10 08:43:23'),(10,'manage-settings','web','2025-04-10 08:43:23','2025-04-10 08:43:23');
/*!40000 ALTER TABLE `laravelweb_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_post_meta`
--

DROP TABLE IF EXISTS `laravelweb_post_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_post_meta` (
  `post_meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_meta_id`),
  KEY `laravelweb_post_meta_post_id_foreign` (`post_id`),
  KEY `laravelweb_post_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `laravelweb_post_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `laravelweb_posts` (`post_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_post_meta`
--

LOCK TABLES `laravelweb_post_meta` WRITE;
/*!40000 ALTER TABLE `laravelweb_post_meta` DISABLE KEYS */;
INSERT INTO `laravelweb_post_meta` VALUES (1,1,'keywords','tech, trends','2025-04-10 08:44:17','2025-04-10 08:44:17'),(2,2,'keywords','health, tips','2025-04-10 08:44:17','2025-04-10 08:44:17'),(3,3,'keywords','travel, destinations','2025-04-10 08:44:17','2025-04-10 08:44:17'),(4,4,'keywords','recipes, dinner','2025-04-10 08:44:17','2025-04-10 08:44:17'),(5,5,'keywords','fashion, trends','2025-04-10 08:44:17','2025-04-10 08:44:17'),(6,6,'keywords','study, education','2025-04-10 08:44:17','2025-04-10 08:44:17'),(7,7,'keywords','business, strategies','2025-04-10 08:44:17','2025-04-10 08:44:17'),(8,8,'keywords','movies, entertainment','2025-04-10 08:44:17','2025-04-10 08:44:17'),(9,9,'keywords','sports, updates','2025-04-10 08:44:17','2025-04-10 08:44:17'),(10,10,'keywords','gadgets, reviews','2025-04-10 08:44:17','2025-04-10 08:44:17'),(11,11,'keywords','breakfast, health','2025-04-10 08:44:17','2025-04-10 08:44:17'),(12,12,'keywords','travel, beginners','2025-04-10 08:44:17','2025-04-10 08:44:17'),(13,13,'keywords','desserts, recipes','2025-04-10 08:44:17','2025-04-10 08:44:17'),(14,14,'keywords','winter, fashion','2025-04-10 08:44:17','2025-04-10 08:44:17'),(15,15,'keywords','startups, business','2025-04-10 08:44:17','2025-04-10 08:44:17');
/*!40000 ALTER TABLE `laravelweb_post_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_posts`
--

DROP TABLE IF EXISTS `laravelweb_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_posts` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `body` longtext NOT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `laravelweb_posts_slug_unique` (`slug`),
  KEY `laravelweb_posts_user_id_foreign` (`user_id`),
  CONSTRAINT `laravelweb_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravelweb_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_posts`
--

LOCK TABLES `laravelweb_posts` WRITE;
/*!40000 ALTER TABLE `laravelweb_posts` DISABLE KEYS */;
INSERT INTO `laravelweb_posts` VALUES (1,'Tech Trends 2025','tech-trends-2025','Tech Trends 2025','Future tech trends','This post is about tech trends in 2025...','https://example.com/tech-trends-2025',1,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(2,'Healthy Living Tips','healthy-living-tips','Healthy Living Tips','Tips for a healthy life','This post shares health tips...','https://example.com/healthy-living-tips',2,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(3,'Best Travel Destinations','best-travel-destinations','Best Travel Destinations','Top travel spots','This post lists travel destinations...','https://example.com/best-travel-destinations',3,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(4,'Delicious Recipes for Dinner','delicious-recipes-dinner','Delicious Recipes','Tasty dinner recipes','This post shares dinner recipes...','https://example.com/delicious-recipes-dinner',4,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(5,'Fashion Trends 2025','fashion-trends-2025','Fashion Trends 2025','Latest fashion trends','This post is about fashion trends...','https://example.com/fashion-trends-2025',5,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(6,'How to Study Effectively','how-to-study-effectively','Study Tips','Effective study tips','This post shares study tips...','https://example.com/how-to-study-effectively',6,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(7,'Business Growth Strategies','business-growth-strategies','Business Growth','Grow your business','This post is about business strategies...','https://example.com/business-growth-strategies',7,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(8,'Latest Movies to Watch','latest-movies-watch','Latest Movies','Movies to watch','This post lists new movies...','https://example.com/latest-movies-watch',8,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(9,'Sports Updates 2025','sports-updates-2025','Sports Updates','Latest sports news','This post shares sports updates...','https://example.com/sports-updates-2025',9,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(10,'Gadget Reviews 2025','gadget-reviews-2025','Gadget Reviews','Best gadgets 2025','This post reviews gadgets...','https://example.com/gadget-reviews-2025',10,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(11,'Healthy Breakfast Ideas','healthy-breakfast-ideas','Healthy Breakfast','Breakfast ideas','This post shares breakfast ideas...','https://example.com/healthy-breakfast-ideas',1,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(12,'Travel Tips for Beginners','travel-tips-beginners','Travel Tips','Tips for travelers','This post shares travel tips...','https://example.com/travel-tips-beginners',2,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(13,'Easy Dessert Recipes','easy-dessert-recipes','Dessert Recipes','Easy desserts','This post shares dessert recipes...','https://example.com/easy-dessert-recipes',3,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(14,'Fashion Tips for Winter','fashion-tips-winter','Winter Fashion','Winter fashion tips','This post shares winter fashion tips...','https://example.com/fashion-tips-winter',4,'2025-04-10 08:43:38','2025-04-10 08:43:38'),(15,'Business Tips for Startups','business-tips-startups','Business Tips','Tips for startups','This post shares startup tips...','https://example.com/business-tips-startups',5,'2025-04-10 08:43:38','2025-04-10 08:43:38');
/*!40000 ALTER TABLE `laravelweb_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_product_meta`
--

DROP TABLE IF EXISTS `laravelweb_product_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_product_meta` (
  `product_meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_meta_id`),
  KEY `laravelweb_product_meta_product_id_foreign` (`product_id`),
  KEY `laravelweb_product_meta_meta_key_index` (`meta_key`),
  CONSTRAINT `laravelweb_product_meta_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `laravelweb_products` (`product_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_product_meta`
--

LOCK TABLES `laravelweb_product_meta` WRITE;
/*!40000 ALTER TABLE `laravelweb_product_meta` DISABLE KEYS */;
INSERT INTO `laravelweb_product_meta` VALUES (1,1,'color','black','2025-04-10 08:44:21','2025-04-10 08:44:21'),(2,2,'color','silver','2025-04-10 08:44:21','2025-04-10 08:44:21'),(3,3,'color','blue','2025-04-10 08:44:21','2025-04-10 08:44:21'),(4,4,'color','white','2025-04-10 08:44:21','2025-04-10 08:44:21'),(5,5,'color','black','2025-04-10 08:44:21','2025-04-10 08:44:21'),(6,6,'color','brown','2025-04-10 08:44:21','2025-04-10 08:44:21'),(7,7,'color','black','2025-04-10 08:44:21','2025-04-10 08:44:21'),(8,8,'color','black','2025-04-10 08:44:21','2025-04-10 08:44:21'),(9,9,'color','white','2025-04-10 08:44:21','2025-04-10 08:44:21'),(10,10,'color','silver','2025-04-10 08:44:21','2025-04-10 08:44:21'),(11,11,'color','black','2025-04-10 08:44:21','2025-04-10 08:44:21'),(12,12,'color','green','2025-04-10 08:44:21','2025-04-10 08:44:21'),(13,13,'color','silver','2025-04-10 08:44:21','2025-04-10 08:44:21'),(14,14,'color','red','2025-04-10 08:44:21','2025-04-10 08:44:21');
/*!40000 ALTER TABLE `laravelweb_product_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_products`
--

DROP TABLE IF EXISTS `laravelweb_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_products` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `laravelweb_products_slug_unique` (`slug`),
  KEY `laravelweb_products_user_id_foreign` (`user_id`),
  KEY `laravelweb_products_category_id_foreign` (`category_id`),
  CONSTRAINT `laravelweb_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `laravelweb_categories` (`category_id`) ON DELETE SET NULL,
  CONSTRAINT `laravelweb_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravelweb_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_products`
--

LOCK TABLES `laravelweb_products` WRITE;
/*!40000 ALTER TABLE `laravelweb_products` DISABLE KEYS */;
INSERT INTO `laravelweb_products` VALUES (1,'Smartphone X','smartphone-x','Latest smartphone model',699.99,'smartphone-x.jpg',1,1,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(2,'Fitness Tracker','fitness-tracker','Track your fitness',49.99,'fitness-tracker.jpg',2,3,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(3,'Travel Backpack','travel-backpack','Perfect for travel',89.99,'travel-backpack.jpg',3,4,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(4,'Kitchen Mixer','kitchen-mixer','For your kitchen',129.99,'kitchen-mixer.jpg',4,5,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(5,'Winter Jacket','winter-jacket','Stay warm in winter',99.99,'winter-jacket.jpg',5,6,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(6,'Study Desk','study-desk','Perfect for studying',199.99,'study-desk.jpg',6,7,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(7,'Business Planner','business-planner','Plan your business',29.99,'business-planner.jpg',7,8,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(8,'Movie Streaming Device','movie-streaming-device','Stream movies easily',59.99,'movie-streaming-device.jpg',8,9,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(9,'Sports Shoes','sports-shoes','Best for sports',79.99,'sports-shoes.jpg',9,10,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(10,'Tablet Pro','tablet-pro','High-performance tablet',499.99,'tablet-pro.jpg',10,1,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(11,'Health Monitor','health-monitor','Monitor your health',89.99,'health-monitor.jpg',1,3,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(12,'Travel Guide Book','travel-guide-book','Guide for travelers',19.99,'travel-guide-book.jpg',2,4,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(13,'Cookware Set','cookware-set','Complete cookware set',149.99,'cookware-set.jpg',3,5,'2025-04-10 08:43:43','2025-04-10 08:43:43'),(14,'Fashion Scarf','fashion-scarf','Stylish scarf',24.99,'fashion-scarf.jpg',4,6,'2025-04-10 08:43:43','2025-04-10 08:43:43');
/*!40000 ALTER TABLE `laravelweb_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_role_has_permissions`
--

DROP TABLE IF EXISTS `laravelweb_role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `laravelweb_role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `laravelweb_role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravelweb_permissions` (`permission_id`) ON DELETE CASCADE,
  CONSTRAINT `laravelweb_role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravelweb_roles` (`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_role_has_permissions`
--

LOCK TABLES `laravelweb_role_has_permissions` WRITE;
/*!40000 ALTER TABLE `laravelweb_role_has_permissions` DISABLE KEYS */;
INSERT INTO `laravelweb_role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,2),(5,2),(6,3),(7,4),(8,5),(9,6),(10,7);
/*!40000 ALTER TABLE `laravelweb_role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_roles`
--

DROP TABLE IF EXISTS `laravelweb_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_roles` (
  `role_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `laravelweb_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_roles`
--

LOCK TABLES `laravelweb_roles` WRITE;
/*!40000 ALTER TABLE `laravelweb_roles` DISABLE KEYS */;
INSERT INTO `laravelweb_roles` VALUES (1,'admin','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(2,'editor','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(3,'writer','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(4,'moderator','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(5,'subscriber','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(6,'contributor','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(7,'manager','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(8,'support','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(9,'analyst','web','2025-04-10 08:43:20','2025-04-10 08:43:20'),(10,'guest','web','2025-04-10 08:43:20','2025-04-10 08:43:20');
/*!40000 ALTER TABLE `laravelweb_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_tags`
--

DROP TABLE IF EXISTS `laravelweb_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_tags` (
  `tag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_tags`
--

LOCK TABLES `laravelweb_tags` WRITE;
/*!40000 ALTER TABLE `laravelweb_tags` DISABLE KEYS */;
INSERT INTO `laravelweb_tags` VALUES (1,'Tech','Tech News','Latest tech news','2025-04-10 08:43:27','2025-04-10 08:43:27'),(2,'Gadgets','Gadgets Reviews','Best gadgets reviews','2025-04-10 08:43:27','2025-04-10 08:43:27'),(3,'HealthTips','Health Tips','Stay healthy','2025-04-10 08:43:27','2025-04-10 08:43:27'),(4,'TravelDestinations','Travel Destinations','Best travel spots','2025-04-10 08:43:27','2025-04-10 08:43:27'),(5,'Recipes','Recipes','Tasty recipes','2025-04-10 08:43:27','2025-04-10 08:43:27'),(6,'FashionTrends','Fashion Trends','Latest fashion trends','2025-04-10 08:43:27','2025-04-10 08:43:27'),(7,'EducationTips','Education Tips','Learn better','2025-04-10 08:43:27','2025-04-10 08:43:27'),(8,'BusinessIdeas','Business Ideas','Grow your business','2025-04-10 08:43:27','2025-04-10 08:43:27'),(9,'Movies','Movies','Latest movies','2025-04-10 08:43:27','2025-04-10 08:43:27'),(10,'SportsNews','Sports News','Sports updates','2025-04-10 08:43:27','2025-04-10 08:43:27');
/*!40000 ALTER TABLE `laravelweb_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_tags_posts`
--

DROP TABLE IF EXISTS `laravelweb_tags_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_tags_posts` (
  `tag_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `laravelweb_tags_posts_tag_id_index` (`tag_id`),
  KEY `laravelweb_tags_posts_post_id_index` (`post_id`),
  CONSTRAINT `laravelweb_tags_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `laravelweb_posts` (`post_id`) ON DELETE CASCADE,
  CONSTRAINT `laravelweb_tags_posts_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `laravelweb_tags` (`tag_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_tags_posts`
--

LOCK TABLES `laravelweb_tags_posts` WRITE;
/*!40000 ALTER TABLE `laravelweb_tags_posts` DISABLE KEYS */;
INSERT INTO `laravelweb_tags_posts` VALUES (1,1),(3,2),(4,3),(5,4),(6,5),(7,6),(8,7),(9,8),(10,9),(2,10),(3,11),(4,12),(5,13),(6,14),(8,15);
/*!40000 ALTER TABLE `laravelweb_tags_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_user_profiles`
--

DROP TABLE IF EXISTS `laravelweb_user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_user_profiles` (
  `profile_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`profile_id`),
  UNIQUE KEY `laravelweb_user_profiles_user_id_unique` (`user_id`),
  CONSTRAINT `laravelweb_user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravelweb_users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_user_profiles`
--

LOCK TABLES `laravelweb_user_profiles` WRITE;
/*!40000 ALTER TABLE `laravelweb_user_profiles` DISABLE KEYS */;
INSERT INTO `laravelweb_user_profiles` VALUES (1,1,'I am a tech enthusiast and love coding.','john_doe_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(2,2,'Passionate about writing and lifestyle blogging.','jane_smith_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(3,3,'Health and fitness coach with a love for travel.','alice_jones_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(4,4,'Business owner and entrepreneur.','bob_brown_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(5,5,'Fashion lover and content creator.','emma_wilson_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(6,6,'Educator and lifelong learner.','david_martin_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(7,7,'Manager with a focus on business growth.','sarah_moore_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(8,8,'Tech support specialist and movie buff.','mike_taylor_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(9,9,'Data analyst with a passion for sports.','lisa_white_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29'),(10,10,'Avid reader and guest contributor.','chris_green_avatar.jpg','2025-04-11 09:53:29','2025-04-11 09:53:29');
/*!40000 ALTER TABLE `laravelweb_user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laravelweb_users`
--

DROP TABLE IF EXISTS `laravelweb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laravelweb_users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `laravelweb_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravelweb_users`
--

LOCK TABLES `laravelweb_users` WRITE;
/*!40000 ALTER TABLE `laravelweb_users` DISABLE KEYS */;
INSERT INTO `laravelweb_users` VALUES (1,'john_doe','John Doe','john.doe@example.com','hashed_password_1','123 Main St','555-0101','2025-04-10 08:43:13','2025-04-10 08:43:13'),(2,'jane_smith','Jane Smith','jane.smith@example.com','hashed_password_2','456 Oak Ave','555-0102','2025-04-10 08:43:13','2025-04-10 08:43:13'),(3,'alice_jones','Alice Jones','alice.jones@example.com','hashed_password_3','789 Pine Rd','555-0103','2025-04-10 08:43:13','2025-04-10 08:43:13'),(4,'bob_brown','Bob Brown','bob.brown@example.com','hashed_password_4','101 Elm St','555-0104','2025-04-10 08:43:13','2025-04-10 08:43:13'),(5,'emma_wilson','Emma Wilson','emma.wilson@example.com','hashed_password_5','202 Birch Ln','555-0105','2025-04-10 08:43:13','2025-04-10 08:43:13'),(6,'david_martin','David Martin','david.martin@example.com','hashed_password_6','303 Cedar Dr','555-0106','2025-04-10 08:43:13','2025-04-10 08:43:13'),(7,'sarah_moore','Sarah Moore','sarah.moore@example.com','hashed_password_7','404 Maple Ave','555-0107','2025-04-10 08:43:13','2025-04-10 08:43:13'),(8,'mike_taylor','Mike Taylor','mike.taylor@example.com','hashed_password_8','505 Willow Rd','555-0108','2025-04-10 08:43:13','2025-04-10 08:43:13'),(9,'lisa_white','Lisa White','lisa.white@example.com','hashed_password_9','606 Spruce St','555-0109','2025-04-10 08:43:13','2025-04-10 08:43:13'),(10,'chris_green','Chris Green','chris.green@example.com','hashed_password_10','707 Ash Ln','555-0110','2025-04-10 08:43:13','2025-04-10 08:43:13'),(12,'Khangnguyen','khang nguyễn','phuonghoanglun@gmail.com','khang412','Lạc Long Quân','0973626955','2025-04-11 01:49:04','2025-04-11 01:49:04'),(13,'khang4122','Khang Nguyễn','phuonghoanglun412@gmail.com','$2y$10$pLNQM2/mUT6sg9gaxz/LbOWCiOWzs7E3vJhe67hIbG2swZASImtQ2','Chưa Có Thông Tin','Chưa Có Thông Tin',NULL,NULL);
/*!40000 ALTER TABLE `laravelweb_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'rework-database-235090425',1),(2,'rework-database-243090425',2),(3,'rework-database-drop-417090425',3),(4,'rework-database-drop-425090425',4),(5,'rework-database-drop-428090425',5),(6,'rework-database-drop-438090425',6),(7,'rework-database-437090425',7),(8,'rework-database-drop-501090425',8),(9,'rework-database-502090425',9),(10,'rework-database-drop-520090425',10),(11,'rework-database-drop-532090425',11),(12,'rework-database-drop-535090425',12),(13,'rework-database-536090425',13),(14,'rework-database-drop-613090425',14),(15,'rework-database-614090425',15),(16,'rework-database-drop-615090425',16),(17,'rework-database-616090425',17),(18,'rework-update-215100425',18),(19,'rework-drop-339100425',19),(20,'rework-create-340100425',20),(21,'rework-update-400110425',21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-02 15:51:54
