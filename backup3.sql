-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bddnews
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220919153321','2022-09-19 17:34:28',3204),('DoctrineMigrations\\Version20220920123025','2022-09-20 14:30:41',1007),('DoctrineMigrations\\Version20220920124234','2022-09-20 14:42:40',208),('DoctrineMigrations\\Version20220921131455','2022-09-21 15:15:14',3274),('DoctrineMigrations\\Version20221107141230','2023-02-28 10:54:13',8),('DoctrineMigrations\\Version20221107162128','2023-02-28 10:54:13',6),('DoctrineMigrations\\Version20221107163234','2023-02-28 10:54:13',8),('DoctrineMigrations\\Version20221107184942','2023-02-28 10:54:13',5),('DoctrineMigrations\\Version20230307133504','2023-03-07 14:35:14',18),('DoctrineMigrations\\Version20230307144800','2023-03-07 15:48:16',162),('DoctrineMigrations\\Version20230307153459','2023-03-07 16:35:18',9);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `category` varchar(10) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `recap` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (52,'Open de tir de Perpète-cé-Loin','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget aliquet dolor. Nulla facilisi. Aliquam eu massa felis. Nulla nec dolor eu leo maximus luctus. Etiam mollis odio ultricies nulla interdum gravida. Cras convallis urna neque, at ultricies felis posuere vel. Nullam id ultrices nibh. Aenean sed odio nec tortor ornare vehicula. Pellentesque augue justo, facilisis luctus feugiat vel, vestibulum a magna.  Cras et ligula condimentum, finibus risus ac, sagittis orci. Praesent semper non massa quis bibendum. Praesent convallis mi quis lectus gravida, at pellentesque mi ullamcorper. Fusce semper diam a lobortis varius. Nunc interdum massa ante, sit amet pulvinar urna volutpat vel. Quisque mattis dui ac vehicula aliquet. Nulla facilisi. Vestibulum velit libero, imperdiet a risus ut, viverra malesuada dolor. Etiam auctor vel neque sit amet ullamcorper. Sed fermentum at lectus vel ultrices. In non lectus eros. Nunc ultrices tortor nec leo vulputate, vitae consectetur justo varius. Vivamus eleifend sempe','results','2018-04-08','Belle prestation du CTI à l\'open avec 2 membres classés'),(53,'Assemblée générale ordinaire','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget aliquet dolor. Nulla facilisi. Aliquam eu massa felis. Nulla nec dolor eu leo maximus luctus. Etiam mollis odio ultricies nulla interdum gravida. Cras convallis urna neque, at ultricies felis posuere vel. Nullam id ultrices nibh. Aenean sed odio nec tortor ornare vehicula. Pellentesque augue justo, facilisis luctus feugiat vel, vestibulum a magna.  Cras et ligula condimentum, finibus risus ac, sagittis orci. Praesent semper non massa quis bibendum. Praesent convallis mi quis lectus gravida, at pellentesque mi ullamcorper. Fusce semper diam a lobortis varius. Nunc interdum massa ante, sit amet pulvinar urna volutpat vel. Quisque mattis dui ac vehicula aliquet. Nulla facilisi. Vestibulum velit libero, imperdiet a risus ut, viverra malesuada dolor. Etiam auctor vel neque sit amet ullamcorper. Sed fermentum at lectus vel ultrices. In non lectus eros. Nunc ultrices tortor nec leo vulputate, vitae consectetur justo varius. Vivamus eleifend sempe','actualite','2021-08-04','l\'AG du club a eu lieu en mars'),(54,'Compétition amicale de Trifouillis','Martin 228 857. Bernard 120 573. Thomas 108 141. Petit 105 463. Robert 102 950. Richard 99 920. Durand 99 614. Dubois 98 951.','results','2022-02-02','Le club de Trifouillis nous a reçu pour un tournoi amicale. Découvrez les résultats du CTI.'),(55,'After training','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget aliquet dolor. Nulla facilisi. Aliquam eu massa felis. Nulla nec dolor eu leo maximus luctus. Etiam mollis odio ultricies nulla interdum gravida. Cras convallis urna neque, at ultricies felis posuere vel. Nullam id ultrices nibh. Aenean sed odio nec tortor ornare vehicula. Pellentesque augue justo, facilisis luctus feugiat vel, vestibulum a magna.  Cras et ligula condimentum, finibus risus ac, sagittis orci. Praesent semper non massa quis bibendum. Praesent convallis mi quis lectus gravida, at pellentesque mi ullamcorper. Fusce semper diam a lobortis varius. Nunc interdum massa ante, sit amet pulvinar urna volutpat vel. Quisque mattis dui ac vehicula aliquet. Nulla facilisi. Vestibulum velit libero, imperdiet a risus ut, viverra malesuada dolor. Etiam auctor vel neque sit amet ullamcorper. Sed fermentum at lectus vel ultrices. In non lectus eros. Nunc ultrices tortor nec leo vulputate, vitae consectetur justo varius. Vivamus eleifend sempe','actualite','2022-01-01','L\'entrainement de lundi s\'est poursuivi par un moment convivial animé ^^'),(56,'Sondage participation open d\'Australie','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget aliquet dolor. Nulla facilisi. Aliquam eu massa felis. Nulla nec dolor eu leo maximus luctus. Etiam mollis odio ultricies nulla interdum gravida. Cras convallis urna neque, at ultricies felis posuere vel. Nullam id ultrices nibh. Aenean sed odio nec tortor ornare vehicula. Pellentesque augue justo, facilisis luctus feugiat vel, vestibulum a magna.  Cras et ligula condimentum, finibus risus ac, sagittis orci. Praesent semper non massa quis bibendum. Praesent convallis mi quis lectus gravida, at pellentesque mi ullamcorper. Fusce semper diam a lobortis varius. Nunc interdum massa ante, sit amet pulvinar urna volutpat vel. Quisque mattis dui ac vehicula aliquet. Nulla facilisi. Vestibulum velit libero, imperdiet a risus ut, viverra malesuada dolor. Etiam auctor vel neque sit amet ullamcorper. Sed fermentum at lectus vel ultrices. In non lectus eros. Nunc ultrices tortor nec leo vulputate, vitae consectetur justo varius. Vivamus eleifend sempe','actualite','2019-01-05','Pensez à répondre au sondage sur la participation du club à l\'open d\'Australie de 2023');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `pic_filename` varchar(255) NOT NULL,
  `pic_asset` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_16DB4F89B5A459A0` (`news_id`),
  CONSTRAINT `FK_16DB4F89B5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (26,52,'cup-ge3cf9e2a6-1920-6409e79eb5055.jpg','/uploads/cup-ge3cf9e2a6-1920-6409e79eb5055.jpg'),(27,52,'fou-homme-age-moyen-vetu-vetements-decontractes-tenant-fusil-assaut-vise-cible-photo-studio-contre-mur-texture-sombre-6409e79eb6253.jpg','/uploads/fou-homme-age-moyen-vetu-vetements-decontractes-tenant-fusil-assaut-vise-cible-photo-studio-contre-mur-texture-sombre-6409e79eb6253.jpg'),(29,52,'surpris-jeune-homme-sportif-portant-bandeau-bracelet-tenant-coupe-du-gagnant-portant-tenant-medaille-isole-mur-blanc-6409e79eb7465.jpg','/uploads/surpris-jeune-homme-sportif-portant-bandeau-bracelet-tenant-coupe-du-gagnant-portant-tenant-medaille-isole-mur-blanc-6409e79eb7465.jpg'),(30,53,'aperitif-ge458c8139-1920-640af20c6b248.jpg','/uploads/aperitif-ge458c8139-1920-640af20c6b248.jpg'),(31,53,'conference-ga7309e1ae-1920-640af20c7c4bb.jpg','/uploads/conference-ga7309e1ae-1920-640af20c7c4bb.jpg'),(32,53,'limb-males-g9793d36bb-1920-640af20c7c8db.jpg','/uploads/limb-males-g9793d36bb-1920-640af20c7c8db.jpg'),(33,53,'petit-fours-g512bdaab2-1920-640af20c7cd49.jpg','/uploads/petit-fours-g512bdaab2-1920-640af20c7cd49.jpg'),(34,54,'shooting-g7eadb94d7-1920-640b31fd458c2.jpg','/uploads/shooting-g7eadb94d7-1920-640b31fd458c2.jpg'),(35,54,'sport-shooting-g317fec878-1920-640b31fd5294b.jpg','/uploads/sport-shooting-g317fec878-1920-640b31fd5294b.jpg'),(36,54,'weapon-g4fdc97908-1920-640b31fd52e45.jpg','/uploads/weapon-g4fdc97908-1920-640b31fd52e45.jpg'),(37,54,'weapon-gda147a290-1920-640b31fd53387.jpg','/uploads/weapon-gda147a290-1920-640b31fd53387.jpg'),(38,54,'weapon-gf3ab11edb-1920-640b31fd53742.jpg','/uploads/weapon-gf3ab11edb-1920-640b31fd53742.jpg'),(39,54,'young-man-ga01936963-1920-640b31fd53af1.jpg','/uploads/young-man-ga01936963-1920-640b31fd53af1.jpg'),(40,55,'cheese-gd808de497-1920-640b340839e56.jpg','/uploads/cheese-gd808de497-1920-640b340839e56.jpg'),(41,55,'picnic-g637bb69fd-1920-640b34083b8c9.jpg','/uploads/picnic-g637bb69fd-1920-640b34083b8c9.jpg'),(42,55,'sunglasses-g3ab7dfa82-1920-640b34083c144.jpg','/uploads/sunglasses-g3ab7dfa82-1920-640b34083c144.jpg');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (18,'jn','[\"ROLE_USER\"]','$2y$13$Xkm1VSBHGKZjXB4Lk2DgjupyjK6HDH86A.CoMbCZT0omqJBYgghj6'),(19,'lolo','[\"ROLE_ADMIN\"]','$2y$13$0ZJipCi8Qve/c6ceZqMU.OLRsQSd1nWUD5evYEqIFmuHYcLJwSon6'),(20,'gege','[\"ROLE_ADMIN\"]','123456');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-12 15:49:11
