CREATE DATABASE  IF NOT EXISTS `pokemondb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pokemondb`;
-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pokemondb
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_09_17_210926_create_pokemon_table',2),('2016_09_17_211315_create_pokemon_user_pivot_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokemon`
--

DROP TABLE IF EXISTS `pokemon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokemon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokemon`
--

LOCK TABLES `pokemon` WRITE;
/*!40000 ALTER TABLE `pokemon` DISABLE KEYS */;
INSERT INTO `pokemon` VALUES (5,'squirtle','2016-09-24 11:05:44','2016-09-24 11:05:44'),(6,'pikachu','2016-09-24 11:31:50','2016-09-24 11:31:50'),(8,'binacle','2016-09-25 09:38:19','2016-09-25 09:38:19'),(9,'bidoof','2016-09-25 09:38:42','2016-09-25 09:38:42'),(12,'chalizard','2016-09-26 06:08:34','2016-09-26 06:08:34'),(13,'combee','2016-09-26 06:28:05','2016-09-26 06:28:05'),(14,'evee','2016-09-26 06:28:30','2016-09-26 06:28:30'),(16,'siduck','2016-09-26 14:38:41','2016-09-26 14:38:41'),(17,'jigli','2016-09-27 03:59:42','2016-09-27 03:59:42');
/*!40000 ALTER TABLE `pokemon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokemon_user`
--

DROP TABLE IF EXISTS `pokemon_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokemon_user` (
  `pokemon_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pokemon_id`,`user_id`),
  KEY `pokemon_user_pokemon_id_index` (`pokemon_id`),
  KEY `pokemon_user_user_id_index` (`user_id`),
  CONSTRAINT `pokemon_user_pokemon_id_foreign` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pokemon_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokemon_user`
--

LOCK TABLES `pokemon_user` WRITE;
/*!40000 ALTER TABLE `pokemon_user` DISABLE KEYS */;
INSERT INTO `pokemon_user` VALUES (5,2),(5,4),(5,5),(6,2),(6,6),(8,1),(8,3),(8,4),(8,5),(9,2),(12,1),(12,2),(12,3),(12,5),(13,1),(13,2),(13,6),(14,4),(17,1);
/*!40000 ALTER TABLE `pokemon_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hometown` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sailee  Rane','saileera@usc.edu','$2y$10$tvZ4KNAAB2L1PPc0cp8mj.nLtTuI0yJPEa74usDQbDGt0b53.wcYC','Mumbai','1','d7qw3kcQVqKUqgP0Gccfg59vLEHGsgQLQnuOdkCyR5UEP1LrHjGEtUx9vrH0','2016-09-13 07:28:53','2016-09-27 04:50:40'),(2,'Jheel Somaiya','jheel@usc.edu','$2y$10$9AVoIuk.s8Xba5KEky3uV.Btv3cwGLU1h1FVat01KeQ/yXaDj/hEO','Kerela','0','fRaMfqA0YdZv2HJtQyIdw6WjwK5502PW3sZvrNFOK4Ntp9l4vxo4FaVlA5N8','2016-09-22 13:38:02','2016-09-26 13:58:39'),(3,'Rishabh Sharma','rishabh@usc.edu','$2y$10$kJgU5F3V9YGqIJog29wqLuoDSNvuAztusRpLrlSMKgeVX6qAuAJZi','Pune','1','Gp3R0SOX12uSfmwZpLxhe8lYFUzsb4g3uqryUELW9zE39AtKh7yhLxSMP7QV','2016-09-22 13:40:24','2016-09-27 01:12:24'),(4,'Saurabh Sawant','saurabh@usc.edu','$2y$10$IUfnCbApg2nz9oHFJ6ZINeCQRsckD7qBYnVV5EvwXe4kBWkHcCHkq','Banglore','0','zwZrzxxcTaVJfDsmZ0hDL5DidNQY9cc93mXCBe98g9eaPszvF2TbSWzLo6Tm','2016-09-25 07:26:18','2016-09-26 14:19:02'),(5,'Akash Joshi','akash@usc.edu','$2y$10$W7Xvnher54b8ezO8AVNy0u0hzz7TNlivbrk7d7SmX5kUwalgJPB1O','Hyderabad','0','2in66P3p7XBP2X1mY5Q8XcSHDtTSaGUGI6b7rK3HoVRPQCMFGHc0VGQ4F9hK','2016-09-26 06:57:37','2016-09-27 04:00:28'),(6,'Jancy James','jancy@usc.edu','$2y$10$Vtrx7oltPjPjowYO5BxUQuoehJhNF/3yLac0BeDNNat05vpkDKg5i','Pune','0','8hO5QVMTzqq1hqALTAUSJj7xOCs0BWVsEsZDmLkK1AsJZxaAxUdwAeFhAt7v','2016-09-27 01:14:40','2016-09-27 01:30:10'),(7,'Richa Sharma','richa@usc.edu','$2y$10$0QqFQObSwpdQSChSKKB.YuWp9lypMiSIzpo7XbDKDWWGKtwv4pV42','N/A','0',NULL,'2016-09-27 04:52:03','2016-09-27 04:52:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-26 16:19:26
