# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: imac.local (MySQL 5.6.26)
# Base de données: usagain
# Temps de génération: 2015-10-07 16:29:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table ad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ad`;

CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `ad_type` varchar(20) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `donnerie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_idxfk` (`category_id`),
  KEY `user_id_idxfk_1` (`user_id`),
  KEY `donnerie_id_idxfk_6` (`donnerie_id`),
  CONSTRAINT `ad_ibfk_16` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`),
  CONSTRAINT `ad_ibfk_17` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `ad_ibfk_18` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ad` WRITE;
/*!40000 ALTER TABLE `ad` DISABLE KEYS */;

INSERT INTO `ad` (`id`, `category_id`, `ad_type`, `subject`, `description`, `price`, `period`, `status`, `user_id`, `expire_at`, `created_at`, `updated_at`, `donnerie_id`)
VALUES
	(1,1,'OFFER','Ford Mustang','Belle',NULL,NULL,'PENDING',2,'2015-04-16 18:00:49','2015-04-01 09:08:00','2015-10-07 08:46:00',1),
	(2,1,'DEMAND','VW Camper','VW Camper',NULL,NULL,'PENDING',2,'2015-04-16 18:00:49','2015-04-01 09:08:00','2015-10-07 08:46:00',1),
	(5,2,'DEMAND','Tondeuse','Tondeuse sur laquelle on s\'assied. Ouf!',NULL,NULL,'ACTIVE',2,'2015-10-11 07:08:05','2015-10-04 07:08:23','2015-10-07 08:44:34',1);

/*!40000 ALTER TABLE `ad` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`id`, `name`, `position`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Auto',500,'ACTIVE','2015-03-31 09:27:17','2015-03-31 09:27:17'),
	(2,'Garden',200,'ACTIVE','2015-03-31 09:27:24','2015-03-31 09:27:24'),
	(3,'Brico',100,'ACTIVE','2015-03-31 09:27:32','2015-03-31 09:27:32'),
	(4,'Sports',900,'ACTIVE','2015-03-31 09:27:43','2015-03-31 09:27:43');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table donnerie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `donnerie`;

CREATE TABLE `donnerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `layout` varchar(40) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `donnerie` WRITE;
/*!40000 ALTER TABLE `donnerie` DISABLE KEYS */;

INSERT INTO `donnerie` (`id`, `name`, `layout`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Etterbeek',NULL,'ACTIVE',NULL,NULL),
	(2,'Louvain-la-Neuve',NULL,'ACTIVE',NULL,NULL);

/*!40000 ALTER TABLE `donnerie` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table donnerie_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `donnerie_category`;

CREATE TABLE `donnerie_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donnerie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donnerie_id_idxfk` (`donnerie_id`),
  KEY `category_id_idxfk` (`category_id`),
  CONSTRAINT `donnerie_category_ibfk_17` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`),
  CONSTRAINT `donnerie_category_ibfk_18` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table donnerie_donnerie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `donnerie_donnerie`;

CREATE TABLE `donnerie_donnerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donnerie_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `related_type` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donnerie_id_idxfk_1` (`donnerie_id`),
  KEY `related_id_idxfk` (`related_id`),
  CONSTRAINT `donnerie_donnerie_ibfk_1` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`),
  CONSTRAINT `donnerie_donnerie_ibfk_2` FOREIGN KEY (`related_id`) REFERENCES `donnerie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table history
# ------------------------------------------------------------

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` text NOT NULL,
  `object_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  `performer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `url` varchar(2048) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `donnerie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donnerie_id_idxfk_2` (`donnerie_id`),
  KEY `parent_id_idxfk` (`parent_id`),
  CONSTRAINT `menu_ibfk_11` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`),
  CONSTRAINT `menu_ibfk_12` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;

INSERT INTO `menu` (`id`, `parent_id`, `name`, `url`, `position`, `created_at`, `updated_at`, `donnerie_id`)
VALUES
	(1,NULL,'TOP','#',0,0,0,NULL),
	(2,1,'Contact','/site/contact',995,0,0,NULL),
	(3,1,'About','/site/about',990,0,0,NULL),
	(4,1,'A page','/news/view?id=4',500,0,0,NULL);

/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donnerie_id` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `text` text NOT NULL,
  `language` varchar(20) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `sticky` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `donnerie_id_idxfk_3` (`donnerie_id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;

INSERT INTO `message` (`id`, `donnerie_id`, `type`, `subject`, `text`, `language`, `position`, `sticky`, `status`, `expire_at`, `created_at`, `updated_at`, `name`)
VALUES
	(1,NULL,'POST','First blog message','Always displayed.','fr',100,0,'ACTIVE','2015-03-25 14:00:00','2015-03-13 02:15:27','2015-03-24 18:37:12',''),
	(2,NULL,'POST','Cras rhoncus purus vitae','Proin nec felis et leo feugiat pharetra eget vel lectus. Vestibulum fermentum pulvinar augue, quis luctus dolor ultrices sed. Praesent lacinia tortor id massa molestie gravida. In sodales nulla sit amet quam tincidunt fermentum. Nunc sit amet mauris turpis, eget aliquet purus. Ut viverra urna nec eros pellentesque luctus. Cras rhoncus purus vitae felis ultrices euismod. Curabitur eu est ac justo aliquam suscipit. ','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:57:14','2015-03-15 03:57:14',''),
	(3,NULL,'POST','Nulla at mi eget leo dictum tristique. ','Sed eget purus non lorem fringilla dignissim ut pretium nisl. Fusce vulputate mollis eros, sit amet aliquam ante scelerisque lobortis. In vitae diam purus, id dictum massa. Sed ut augue dapibus neque aliquet euismod nec in sapien. Quisque a lectus sed nisl ullamcorper semper id eu nisi. Nulla at mi eget leo dictum tristique. Maecenas porttitor semper sapien, vitae vulputate leo aliquam eu. Etiam a orci sed dui adipiscing varius eget at arcu.','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:57:34','2015-03-15 03:57:34',''),
	(4,NULL,'PAGE','Suspendisse at diam mauris, eu dapibus eros. (long)','In at tellus odio, sed porttitor enim. Sed vel neque sit amet nulla ultricies tempus nec pulvinar metus. Proin elementum pellentesque purus, ac lacinia sem suscipit non. In ut turpis in magna accumsan condimentum. Vivamus id turpis feugiat velit fermentum feugiat non sed massa. Nam hendrerit enim vel nisl hendrerit commodo. Nunc ut magna sem, vehicula dapibus dui. Nam pretium ligula at nisl ultricies vel eleifend nisi fermentum.\r\n\r\nVestibulum a nisi lorem, viverra aliquet dolor. Suspendisse eu justo sed lacus consequat volutpat in eget tortor. Aenean pulvinar tortor eget magna ornare eu ultricies augue sagittis. Aenean porta massa sodales leo placerat at cursus dolor tristique. Quisque nec dolor massa, at posuere nisi. Quisque cursus elit eget odio viverra et condimentum dui lacinia. Nam nec est erat, non mattis purus.\r\n\r\nSuspendisse rhoncus quam sed ligula lobortis iaculis. In ac nunc id quam pulvinar egestas. Suspendisse vestibulum elit vitae lectus laoreet malesuada. Nullam sollicitudin hendrerit velit, eget placerat diam tristique eu. Integer sit amet felis ac nunc accumsan commodo et non tellus. Cras elementum bibendum risus, id pharetra leo aliquet vitae. Suspendisse in urna eget sem rhoncus facilisis id et sapien.\r\n\r\nNullam vitae odio purus, eget tempor magna. Nam id sem ligula, nec accumsan mauris. Praesent ac nisi nec nulla aliquet venenatis et in mauris. Nam ut ante vitae leo viverra lobortis. Suspendisse at diam mauris, eu dapibus eros. Donec fermentum diam id turpis pellentesque et sollicitudin nibh adipiscing. Etiam sagittis blandit velit, et facilisis neque condimentum ut. Mauris quis diam mauris, tristique tristique turpis.\r\n\r\nSed eu augue non eros molestie aliquam venenatis sit amet erat. Mauris vitae dui at diam imperdiet blandit. Nullam eget nisi in dolor mollis ullamcorper. Nunc sit amet nisl vel ligula venenatis sollicitudin et et risus. In rutrum fringilla erat, at iaculis tellus lacinia id. Fusce semper risus in ante accumsan lobortis. Suspendisse at diam mauris, eu dapibus eros.\r\n\r\nPraesent sodales aliquet mauris, et blandit urna tincidunt non. Vestibulum consectetur mauris blandit nibh aliquet dignissim. Sed congue purus vitae tortor lacinia pulvinar. Donec convallis lacus quis elit mollis egestas vitae et nisl. Donec tempus orci in libero posuere eget pharetra sem luctus. Nunc sit amet mauris turpis, eget aliquet purus.','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:58:08','2015-03-15 03:58:08',''),
	(5,NULL,'PAGE','Donec mollis libero vitae tortor elementum ','Etiam vitae orci non ante auctor aliquam. Maecenas non dolor tincidunt sem ultrices lobortis quis eget leo. Ut auctor tellus ac mauris ultrices convallis. Cras nec tortor ac odio viverra rhoncus. Nam molestie cursus nibh, in ultrices erat tempus et. Cras vel justo tortor, id molestie orci. Proin ut ligula ut dolor dignissim sodales. Aliquam et odio felis, sed venenatis justo.\r\n\r\nPellentesque eget tellus vel mauris vestibulum molestie ut sed diam. Donec non diam sed eros facilisis interdum. Morbi bibendum lacus commodo eros scelerisque sollicitudin pulvinar libero facilisis. Fusce sed turpis metus, eu rutrum lacus. Ut viverra urna nec eros pellentesque luctus. Morbi dictum massa sed lacus elementum consequat. Pellentesque sit amet turpis quis diam elementum semper sodales id est. Aliquam vel mi non elit posuere placerat sed vitae lorem.\r\n\r\nInteger convallis faucibus erat, et convallis massa feugiat et. Pellentesque pulvinar neque in ligula aliquet lacinia. Donec porttitor tellus at nibh accumsan quis aliquam ipsum consequat. Nam pretium ligula at nisl ultricies vel eleifend nisi fermentum. Praesent sed purus neque, a suscipit arcu. Suspendisse ac dolor et dolor aliquet consequat. Aliquam id magna urna, in elementum augue. Ut suscipit tincidunt odio, ac lobortis quam euismod non.\r\n\r\nMauris accumsan rutrum nisl, vitae porta neque pulvinar quis. Donec mollis libero vitae tortor elementum a pulvinar enim bibendum. Curabitur ut nulla non leo tristique eleifend. Donec et felis sed leo aliquam auctor quis nec massa. Praesent lacinia imperdiet turpis, ut tincidunt metus feugiat nec. Morbi fermentum faucibus erat, sit amet euismod urna consectetur ac.','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:58:37','2015-03-15 03:58:37',''),
	(6,NULL,'POST','Cras vel justo tortor','Aliquam facilisis porttitor odio, sagittis interdum elit vulputate sit amet. Donec vestibulum tortor vitae ligula pulvinar semper. Nunc in turpis quam, nec sodales turpis. Curabitur ultrices enim ac nisl dictum nec luctus eros mattis. Praesent a nibh iaculis nisi viverra laoreet a at mauris. Donec lobortis quam ac justo molestie sodales. Duis sit amet nisl quis neque commodo ullamcorper ut mattis metus.\r\n\r\nInteger consequat aliquet ipsum, sed congue metus mollis ac. Nam vel metus in lacus tincidunt euismod. Pellentesque mattis nisl sed justo suscipit ullamcorper. Sed congue ullamcorper ligula, eget dictum lectus consequat ut. Cras luctus felis non ligula rhoncus a convallis massa porta. Integer ut diam nec arcu faucibus vehicula id eu magna. Mauris dictum erat sed libero sollicitudin laoreet cursus lectus tempor. Phasellus ultrices interdum nisl, in tristique massa egestas dictum.\r\n\r\nMaecenas ac enim non arcu malesuada posuere id vitae magna. Praesent at elit ut nisi ultrices dapibus ac eget felis. Nulla imperdiet orci in metus consequat interdum. Aliquam sodales dui non velit luctus tincidunt. Aenean pulvinar tortor eget magna ornare eu ultricies augue sagittis. Cras vel justo tortor, id molestie orci. Ut fermentum elit non risus dictum laoreet. Sed non ante luctus magna malesuada interdum ut et orci.\r\n','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:58:59','2015-03-15 03:58:59',''),
	(7,NULL,'POST','Mauris at tellus in orci malesuada commodo a vitae nunc.','Ut viverra libero et arcu tincidunt posuere. Aenean pulvinar tortor eget magna ornare eu ultricies augue sagittis. Nullam id lacus libero, at interdum dui. Phasellus ultricies laoreet turpis, et consectetur nunc posuere quis. Maecenas ultrices iaculis ipsum, ut fermentum sem condimentum vitae. Sed sit amet enim in lacus pellentesque posuere id sed est. Nunc eget enim purus, eget tincidunt dui. Integer condimentum vestibulum leo, non sodales tortor posuere et.\r\n\r\nNam vestibulum sem eu libero vulputate et sollicitudin metus condimentum. Ut a nulla vel risus aliquam sagittis. Maecenas adipiscing consectetur ante, a tempor dolor congue et. Sed vitae mi eget ipsum commodo tincidunt sed nec massa. Vestibulum et quam velit, in vestibulum nisi. Vestibulum lacinia molestie massa, et tristique nibh malesuada ornare. Donec porttitor tellus at nibh accumsan quis aliquam ipsum consequat.\r\n\r\nQuisque quis sapien egestas lorem porta ultricies sed a massa. Nulla dapibus lacinia lectus, at cursus orci tincidunt vitae. Praesent vehicula euismod ipsum, sit amet molestie magna faucibus non. Nullam gravida mauris ac arcu vestibulum ultricies. Duis vel leo urna, id bibendum sapien. Aliquam et odio felis, sed venenatis justo. Aliquam vel mi non elit posuere placerat sed vitae lorem.\r\n\r\nMauris at tellus in orci malesuada commodo a vitae nunc. Praesent et dolor et dui tincidunt accumsan at quis ante. Donec eget massa sed felis egestas ornare. Nulla vitae ligula enim, fringilla aliquet lectus. Vestibulum sed est magna, vitae cursus quam. Aenean dapibus ipsum eget libero rutrum sodales. Etiam in tortor quis erat ullamcorper placerat.','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:59:24','2015-03-15 03:59:24',''),
	(8,NULL,'POST','Sed suscipit purus nec risus','Morbi tincidunt lacinia risus, sit amet varius velit imperdiet sit amet. Etiam in tortor quis erat ullamcorper placerat. Aenean elementum odio quis felis tempor pharetra et et tortor. Sed suscipit purus nec risus ullamcorper ac dapibus leo faucibus. Praesent ac nisi nec nulla aliquet venenatis et in mauris. Aenean eu massa sit amet lectus elementum placerat sed eu justo. Aenean placerat orci a purus blandit pharetra. Donec fermentum diam id turpis pellentesque et sollicitudin nibh adipiscing.','fr',100,0,'ACTIVE',NULL,'2015-03-15 03:59:48','2015-03-15 03:59:48','');

/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1427813937),
	('m140209_132017_init',1427814046),
	('m140403_174025_create_account_table',1427814046),
	('m140504_113157_update_tables',1427814047),
	('m140504_130429_create_token_table',1427814047),
	('m140830_171933_fix_ip_field',1427814048),
	('m140830_172703_change_account_table_name',1427814048),
	('m141222_110026_update_ip_field',1427814048);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table newsletter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donnerie_id` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `text` text NOT NULL,
  `name` varchar(40) NOT NULL,
  `language` varchar(20) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `sticky` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donnerie_id_idxfk_4` (`donnerie_id`),
  CONSTRAINT `newsletter_ibfk_1` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table picture
# ------------------------------------------------------------

DROP TABLE IF EXISTS `picture`;

CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(80) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL,
  `related_class` varchar(160) DEFAULT NULL,
  `related_attribute` varchar(160) DEFAULT NULL,
  `name_hash` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;

INSERT INTO `picture` (`id`, `name`, `size`, `type`, `related_id`, `related_class`, `related_attribute`, `name_hash`, `status`, `created_at`, `updated_at`)
VALUES
	(3,'Verdier-Volkswagen-Camper-Concept-Stowed1-499x310.jpg',38953,'image/jpeg',2,'common\\models\\Ad','picture','u_NQ1khMifaqQqnKroRxqmKrW5ohEJ6B.jpg',NULL,'2015-04-02 00:45:11','2015-04-02 00:45:11'),
	(4,'Verdier-Volkswagen-Camper-Concept1-499x339.jpg',35727,'image/jpeg',2,'common\\models\\Ad','picture','6i_LCsqYTZ-zea5qJwA1aZw-jsOC6rRB.jpg',NULL,'2015-04-02 00:45:11','2015-04-02 00:45:11'),
	(5,'mustang.jpg',16993,'image/jpeg',1,'common\\models\\Ad','picture','nuW8C8XACSkMWfdB1SRu-xPOppLWVn7T.jpg',NULL,'2015-10-04 06:41:03','2015-10-04 06:41:03'),
	(6,'product_7827_225.jpg',13925,'image/jpeg',5,'common\\models\\Ad','picture','jOs3VMX5G6Xh5QVqpWEObhYN0N5zEQ9-.jpg',NULL,'2015-10-04 07:10:12','2015-10-04 07:10:12');

/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`)
VALUES
	(1,NULL,NULL,'manager@reuse.local','8b142ebf6845045d6115bbc2f841e925',NULL,NULL,NULL),
	(2,NULL,NULL,'pierre@reuse.local','8c9accc0acd92cc0b93874ac6b48d0b4',NULL,NULL,NULL);

/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table social_account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_account`;

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table token
# ------------------------------------------------------------

DROP TABLE IF EXISTS `token`;

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`)
VALUES
	(2,'zCRcaz3K8q62M09DjdU6so58U3UIkHrL',1427872623,0);

/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donnerie_id` int(11) NOT NULL,
  `language` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` int(11) unsigned DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`),
  KEY `donnerie_id_idxfk_5` (`donnerie_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`donnerie_id`) REFERENCES `donnerie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `donnerie_id`, `language`, `role`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `flags`, `created_at`, `updated_at`)
VALUES
	(1,1,NULL,'admin','admin','manager@reuse.local','$2y$12$Rb9j3iW6LHSdMEqj/8D6jO.v3QkAMwR8v57.s1aYhrV/o.90wVZBK','FF0NbDaLv6D6w2C4OQ0wWv3AWYQmGtm1',1427815603,NULL,NULL,192168,0,1427815383,1427815603),
	(2,1,'fr',NULL,'pierre','pierre@reuse.local','$2y$12$9AmzzfpJ9jjEorhZVINnzujYzdsNgyls9a/evSwoyBkjwTiMwN9CS','SStmCVYh4JLWlDVkKqEyFS1liBXd3zxr',1427872648,NULL,NULL,192,0,1427872623,1427872623),
	(3,2,'fr','manager','damien','damien@reuse.local','$2y$12$9AmzzfpJ9jjEorhZVINnzujYzdsNgyls9a/evSwoyBkjwTiMwN9CS','SStmCVYh4JLWlDVkKqEyFS1liBXd3zxr',1427872648,NULL,NULL,192,0,1427872623,1427872623);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table user_ad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_ad`;

CREATE TABLE `user_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `expire_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id_idxfk` (`ad_id`),
  KEY `user_id_idxfk` (`user_id`),
  CONSTRAINT `user_ad_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`id`),
  CONSTRAINT `user_ad_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
