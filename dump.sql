-- MySQL dump 10.16  Distrib 10.2.7-MariaDB, for osx10.12 (x86_64)
--
-- Host: localhost    Database: charity-main
-- ------------------------------------------------------
-- Server version	10.2.7-MariaDB

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
-- Table structure for table `accom_type`
--

DROP TABLE IF EXISTS `accom_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accom_type` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accom_type`
--

LOCK TABLES `accom_type` WRITE;
/*!40000 ALTER TABLE `accom_type` DISABLE KEYS */;
INSERT INTO `accom_type` VALUES (1,'ملك'),(2,'أجار'),(3,'ورثة'),(4,'مشترك'),(5,'غير ذلك');
/*!40000 ALTER TABLE `accom_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area_label`
--

DROP TABLE IF EXISTS `area_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area_label` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area_label`
--

LOCK TABLES `area_label` WRITE;
/*!40000 ALTER TABLE `area_label` DISABLE KEYS */;
INSERT INTO `area_label` VALUES (1,'الرفاع'),(2,'المعيزل'),(3,'السلطانية'),(4,'حصيمة'),(5,'الصراة القديمة'),(6,'الصراة الجديدة');
/*!40000 ALTER TABLE `area_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficiary`
--

DROP TABLE IF EXISTS `beneficiary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficiary` (
  `file_id` int(11) NOT NULL,
  `gov_id` varchar(20) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `is_permanent` tinyint(1) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `job_location` varchar(255) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `giving_amount` int(11) DEFAULT NULL,
  `rent_value` int(11) DEFAULT NULL,
  `family_members_count` int(11) DEFAULT NULL,
  `alternative_contact_name` varchar(255) DEFAULT NULL,
  `beneficiary_type_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `accom_type_id` int(11) DEFAULT NULL,
  `health_status_id` int(11) DEFAULT NULL,
  `social_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`file_id`),
  UNIQUE KEY `gov_id` (`gov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficiary`
--

LOCK TABLES `beneficiary` WRITE;
/*!40000 ALTER TABLE `beneficiary` DISABLE KEYS */;
INSERT INTO `beneficiary` VALUES (1010,'1023456789','خالد',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,5,1,2),(4697,'7987612687','ddd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `beneficiary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficiary_type`
--

DROP TABLE IF EXISTS `beneficiary_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficiary_type` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficiary_type`
--

LOCK TABLES `beneficiary_type` WRITE;
/*!40000 ALTER TABLE `beneficiary_type` DISABLE KEYS */;
INSERT INTO `beneficiary_type` VALUES (1,'ألف'),(2,'باء'),(3,'جيم');
/*!40000 ALTER TABLE `beneficiary_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`index`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependency`
--

DROP TABLE IF EXISTS `dependency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependency` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `educational_level` int(11) DEFAULT NULL,
  `relation_id` int(11) DEFAULT NULL,
  `gov_id` varchar(20) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependency`
--

LOCK TABLES `dependency` WRITE;
/*!40000 ALTER TABLE `dependency` DISABLE KEYS */;
/*!40000 ALTER TABLE `dependency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_level`
--

DROP TABLE IF EXISTS `educational_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_level` (
  `level` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_level`
--

LOCK TABLES `educational_level` WRITE;
/*!40000 ALTER TABLE `educational_level` DISABLE KEYS */;
INSERT INTO `educational_level` VALUES (1,'أول ابتدائي'),(2,'ثاني ابتدائي'),(3,'ثالث ابتدائي'),(4,'رابع ابتدائي'),(5,'خامس ابتدائي'),(6,'سادس ابتدائي'),(7,'أول متوسط'),(8,'ثاني متوسط'),(9,'ثالث متوسط'),(10,'أول ثانوي'),(11,'ثاني ثانوي'),(12,'ثالث ثانوي');
/*!40000 ALTER TABLE `educational_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_status_label`
--

DROP TABLE IF EXISTS `health_status_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_status_label` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_status_label`
--

LOCK TABLES `health_status_label` WRITE;
/*!40000 ALTER TABLE `health_status_label` DISABLE KEYS */;
INSERT INTO `health_status_label` VALUES (1,'سليم'),(2,'مريض');
/*!40000 ALTER TABLE `health_status_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `highlighted_news_post`
--

DROP TABLE IF EXISTS `highlighted_news_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `highlighted_news_post` (
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `highlighted_news_post`
--

LOCK TABLES `highlighted_news_post` WRITE;
/*!40000 ALTER TABLE `highlighted_news_post` DISABLE KEYS */;
INSERT INTO `highlighted_news_post` VALUES (1000);
/*!40000 ALTER TABLE `highlighted_news_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `file_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`file_id`,`label_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

LOCK TABLES `income` WRITE;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
/*!40000 ALTER TABLE `income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income_label`
--

DROP TABLE IF EXISTS `income_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_label` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_label`
--

LOCK TABLES `income_label` WRITE;
/*!40000 ALTER TABLE `income_label` DISABLE KEYS */;
INSERT INTO `income_label` VALUES (1,'تأمينات'),(2,'الضمان'),(3,'راتب'),(4,'تقاعد'),(5,'تأهيل معاقين'),(6,'عقار'),(7,'أخرى');
/*!40000 ALTER TABLE `income_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_post`
--

DROP TABLE IF EXISTS `news_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_post`
--

LOCK TABLES `news_post` WRITE;
/*!40000 ALTER TABLE `news_post` DISABLE KEYS */;
INSERT INTO `news_post` VALUES (1000,'حملة التبرع بالدم السابعة','2017-09-21 09:47:00','<p>دعوة للمشاركة في حملة التبرع بالدم السابعة التي تنفذ بالتعاون مع اللجنة الأهلية لأصدقاء الصحة ومستشفى <a href=\"https://twitter.com/hashtag/مدينة_العيون?src=hash\">#<strong>مدينة_العيون</strong></a> وتنطلق اليوم إن شاء الله</p>\n','https://pbs.twimg.com/media/DKOo7lRXcAA7WuV.jpg',1),(1001,'600 حقيبة مدرسية لأبناء المستفيدين','2017-09-22 03:39:00','<p>جمعية العيون الخيرية <a href=\"https://twitter.com/hashtag/العيون?src=hash\">#العيون</a> تقدم أكثر من 600 حقيبة مدرسية لأبناء المستفيدين <a href=\"https://t.co/Wkji8d1FCz\" target=\"_blank\">http://eventstimes.org/7506</a></p>\n','https://dressthemup.com/wp-content/uploads/2017/08/back-to-school.jpeg',1);
/*!40000 ALTER TABLE `news_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_ticker`
--

DROP TABLE IF EXISTS `news_ticker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_ticker` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_ticker`
--

LOCK TABLES `news_ticker` WRITE;
/*!40000 ALTER TABLE `news_ticker` DISABLE KEYS */;
INSERT INTO `news_ticker` VALUES (1,'تدعوكم جمعية العيون الخيرية للمشاركة في حملة التبرع بالدم السابعة التي تنفذ بالتعاون مع اللجنة الأهلية لأصدقاء الصحة ومستشفى #مدينة_العيون');
/*!40000 ALTER TABLE `news_ticker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone` (
  `file_id` varchar(20) NOT NULL,
  `index` int(11) NOT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`file_id`,`index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES ('1010',2,'0123456789'),('4697',2,'0564786055');
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relation_label`
--

DROP TABLE IF EXISTS `relation_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relation_label` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relation_label`
--

LOCK TABLES `relation_label` WRITE;
/*!40000 ALTER TABLE `relation_label` DISABLE KEYS */;
INSERT INTO `relation_label` VALUES (1,'ابن'),(2,'بنت'),(3,'أخ'),(4,'أخت'),(5,'أب'),(6,'أم'),(7,'جد'),(8,'جدة');
/*!40000 ALTER TABLE `relation_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'مدرسة ١',NULL),(2,'مدرسة ٢',NULL),(3,'مدرسة ٣',NULL),(4,'مدرسة ٤',NULL);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slideshow_image`
--

DROP TABLE IF EXISTS `slideshow_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slideshow_image` (
  `index` int(11) NOT NULL,
  `image_url` varchar(25) NOT NULL,
  `link` varchar(25) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slideshow_image`
--

LOCK TABLES `slideshow_image` WRITE;
/*!40000 ALTER TABLE `slideshow_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `slideshow_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_status_label`
--

DROP TABLE IF EXISTS `social_status_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_status_label` (
  `id` int(11) NOT NULL,
  `label` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_status_label`
--

LOCK TABLES `social_status_label` WRITE;
/*!40000 ALTER TABLE `social_status_label` DISABLE KEYS */;
INSERT INTO `social_status_label` VALUES (1,'متزوج'),(2,'غير متزوج');
/*!40000 ALTER TABLE `social_status_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `nickname` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'root admin',NULL,'root123','مدير الموقع'),(2,'editor',NULL,'editor123','محرر أخبار');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_app`
--

DROP TABLE IF EXISTS `user_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_app` (
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  PRIMARY KEY (`app_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_app`
--

LOCK TABLES `user_app` WRITE;
/*!40000 ALTER TABLE `user_app` DISABLE KEYS */;
INSERT INTO `user_app` VALUES (1,2),(2,2),(1,3);
/*!40000 ALTER TABLE `user_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor` (
  `post_id` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `liked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor`
--

LOCK TABLES `visitor` WRITE;
/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
INSERT INTO `visitor` VALUES (1000,'127.0.0.1','2017-09-21 22:43:53',0);
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-28  6:15:04
