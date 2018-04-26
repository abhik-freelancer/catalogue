/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.21 : Database - catalogue
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`catalogue` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `bannertext` varchar(255) DEFAULT NULL,
  `bannerimage` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `banner` */

insert  into `banner`(`id`,`bannertext`,`bannerimage`,`is_active`,`created_date`) values (1,'Banner One','9edbf8c870915afc2c130c46d2bfa366.jpg','Y','2018-02-11 21:10:32'),(2,'banner test','4202730e13cf1f3bf51ad697f8132d3f.jpg','N','2018-02-11 21:11:51'),(3,'Banner 3','96d71a9210d92fe73692fd713e7a7a9f.png','N','2018-02-13 14:13:18'),(4,'Banner 4','b64b7b2e77028b1ce62c8cd70443ecf2.jpg','Y','2018-02-14 20:14:16'),(5,'Nikon Banner','9179dcdec8651a8fcd03ad822192af0f.jpg','Y','2018-02-14 20:15:54');

/*Table structure for table `catalogue_contact` */

DROP TABLE IF EXISTS `catalogue_contact`;

CREATE TABLE `catalogue_contact` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email_add` varchar(255) DEFAULT NULL,
  `message` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `catalogue_contact` */

insert  into `catalogue_contact`(`id`,`name`,`email_add`,`message`,`created_date`,`is_active`) values (1,'Avik','avik@yhaoo.com','','2018-02-19 10:50:23','Y'),(2,'bunho','buno@ymail.com','','2018-02-19 13:07:16','Y'),(3,'Ts','pentasoft.programmer@gmail.com','','2018-02-19 14:00:34','Y'),(4,'Piono Ghosh','pentabits.dev@gmail.com','message  vestibulum mauris at velit placerat, ac feugiat ex volutpat. Vestibulum accumsan, est id venenatis hendrerit, dui tortor varius turpis, eget scelerisque ligula risus in risus','2018-02-19 14:02:02','Y'),(5,'Piku','Jasons88@hotmail.com','123++\n+66++6saddasdd\nsdadsad','2018-02-19 21:15:34','Y'),(6,'Armando Lrouo','babun@gmail.com','When you\'re ready to take your integration live, make sure that you replace your test publishable and secret API keys with live ones. Live payments cannot be processed if your integration is still using your test API keys. You can find your API key information in your','2018-03-07 14:21:33','Y');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` text,
  `image_thumnail` varchar(255) DEFAULT NULL,
  `image_category` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_name`,`category_desc`,`image_thumnail`,`image_category`,`is_active`) values (1,'Monitor','A computer monitor is an output device.','abc77c170cfaa9fa2496201cf9487d3b.jpg','abc77c170cfaa9fa2496201cf9487d3b.jpg','Y'),(2,'Mobile','A mobile phone is a portable telephone that can make and receive calls.','f4d32ab7c3bfc6d8341d43ea998298f5.png','f4d32ab7c3bfc6d8341d43ea998298f5.png','Y'),(3,'DSLR','A digital single-lens reflex camera                                                                                            ','1b1f79511df814e6f9fac5a9f1f5da71.png','1b1f79511df814e6f9fac5a9f1f5da71.png','Y'),(4,'Laptop','Laptop                                                                                            ','f349147cdab0c547b65ac48fdddb95b6.jpg','f349147cdab0c547b65ac48fdddb95b6.jpg','Y'),(5,'Music System',' Music System                                                                                           ','6b958358bf2d41ef429c5e0506e552b1.png','6b958358bf2d41ef429c5e0506e552b1.png','Y'),(6,'Watch','Watch                                                                                            ','7d36c65a28a0e0409a86201b6dcb6ba5.jpg','7d36c65a28a0e0409a86201b6dcb6ba5.jpg','Y'),(7,'Shoe','Shoe                                                                                            ','356c944cb5c0d7db1dbca3abff3144fb.png','356c944cb5c0d7db1dbca3abff3144fb.png','Y'),(8,'Cofee Cup','Cofee Cup                                                                                            ','7dfd18eca7c833df1086f8594a3db900.png','7dfd18eca7c833df1086f8594a3db900.png','N');

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values ('051dedc4dd710603467a429b35dc1ec1','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519795921,''),('0815df490a108edb191ef1aa9863dec7','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1520413521,'a:1:{s:9:\"user_data\";a:3:{s:6:\"userid\";s:1:\"1\";s:5:\"login\";s:5:\"admin\";s:8:\"isActive\";s:1:\"Y\";}}'),('0a5aa878b8c244320535a2a5eb65e4f0','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519658266,'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"cart_contents\";a:3:{s:32:\"eccbc87e4b5ce2fe28308fd9f2a7baf3\";a:6:{s:5:\"rowid\";s:32:\"eccbc87e4b5ce2fe28308fd9f2a7baf3\";s:2:\"id\";s:1:\"3\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:8:\"14025.00\";s:4:\"name\";s:7:\"Sony A7\";s:8:\"subtotal\";d:14025;}s:11:\"total_items\";i:1;s:10:\"cart_total\";d:14025;}}'),('19eb841a9284a3196e8f047cbcc27369','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519812147,''),('307f588a97347933ef45b11589530549','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519797864,''),('4fc8a6ab360553c146c4d5f211babe97','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519709567,'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"cart_contents\";a:4:{s:32:\"aab3238922bcc25a6f606eb525ffdc56\";a:6:{s:5:\"rowid\";s:32:\"aab3238922bcc25a6f606eb525ffdc56\";s:2:\"id\";s:2:\"14\";s:3:\"qty\";s:1:\"1\";s:5:\"price\";s:6:\"458.96\";s:4:\"name\";s:11:\"Canon 1400d\";s:8:\"subtotal\";d:458.95999999999997953636921010911464691162109375;}s:32:\"e4da3b7fbbce2345d7772b0674a318d5\";a:6:{s:5:\"rowid\";s:32:\"e4da3b7fbbce2345d7772b0674a318d5\";s:2:\"id\";s:1:\"5\";s:3:\"qty\";s:1:\"2\";s:5:\"price\";s:7:\"1523.36\";s:4:\"name\";s:7:\"Moto g4\";s:8:\"subtotal\";d:3046.71999999999979991116560995578765869140625;}s:11:\"total_items\";i:3;s:10:\"cart_total\";d:3505.67999999999983629095368087291717529296875;}}'),('60d5324b0fc1690105156a700d006460','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519820355,''),('6892e24dda388eb228a35392446468f5','::1','Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36',1521093522,''),('75204e6edf52a635fe8ce81ce0860f16','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1519742725,'a:1:{s:9:\"user_data\";a:3:{s:6:\"userid\";s:1:\"1\";s:5:\"login\";s:5:\"admin\";s:8:\"isActive\";s:1:\"Y\";}}'),('8c9d936509b51e8a308e9d46c0156cc1','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1520921509,''),('953fa18d9c381e75826a6772b40ab876','127.0.0.1','Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:58.0) Gecko/20100101 Firefox/58.0',1520424176,'');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `item_id` int(20) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_catg_id` int(20) DEFAULT NULL,
  `item_sub_catg` int(20) DEFAULT NULL,
  `item_image_1` varchar(255) DEFAULT NULL,
  `item_image_2` varchar(255) DEFAULT NULL,
  `item_image_3` varchar(255) DEFAULT NULL,
  `item_price` decimal(10,2) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `item_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `item` */

insert  into `item`(`item_id`,`item_name`,`item_catg_id`,`item_sub_catg`,`item_image_1`,`item_image_2`,`item_image_3`,`item_price`,`is_active`,`item_desc`) values (1,'eos 1300D',3,8,'29e457ebd0e7fd554ce607cea58a39ab.jpg','e26b31ca5fb1eb75cfc666b6835a20f2.jpg','','132.50','Y','The Canon EOS 1300D, known as the Rebel T6 in the Americas or as the Kiss X80 in Japan, is an 18.0 megapixels digital single-lens reflex camera made by Canon.'),(2,'Nikon 3300D',3,9,'d786544844a0b886a7fe5117ff583d55.png','c785da8250c73afa64d37f0ce56608bb.png','','458.36','Y','Nikon D3300 is a 24.2-megapixel DX format DSLR Nikon F-mount camera officially launched by Nikon on January 7, 2014.'),(3,'Sony A7',3,10,'fa31747d71fd181e71093531b05a9efb.png','5eb2efc6eace3daf93a58eae1ecc9117.jpg','ae38f2081f1799e86ac9327564376f9e.jpg','14025.00','Y','Don\'s Photo has been a driving force in photography since 1979, and is currently one of the largest independent photo retailers in Western Canada.'),(4,'Oppo F5',2,7,'da2ebffbacd43b40c137a38b44ae83cd.jpg','','','145.20','Y','OPPO, a camera phone brand enjoyed by young people around the world, specializes in designing innovative mobile photography technology.'),(5,'Moto g4',2,6,'70c527ca5d779cf04918b7157f81b79c.jpg','','','1523.36','Y','The Moto G4 is an Android smartphone developed by Motorola Mobility, a subsidiary of Lenovo.'),(6,'Samsung Axt789',1,1,'7f01710dddca1913f5c9ae4706de1d2e.jpg','65b1e16f6f19262ac6edd368d26b04cb.jpg','930732c58aad2d8bf6d53e2834e83464.jpg','4586.36','Y','Samsung offers best Monitors and Computer screens with crystal clear picture quality. Know price and specs of the complete range here.'),(7,'Red Selfie Cup',8,0,'a622fd1644247ac323599060606634a7.png','','','40.50','N','A mug is a type of cup typically used for drinking hot beverages, such as coffee, hot chocolate, soup, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup.'),(8,'Beer Coffer Mug',8,0,'abecea003b651842966025b365ceda86.png','','','458.23','N','A mug is a type of cup typically used for drinking hot beverages, such as coffee, hot chocolate, soup, or tea. Mugs usually have handles and hold a larger amount of fluid than other types of cup.'),(9,'Wall Décor, Wedding cup',8,0,'bfb6f57bcde41712c89c53b1dfec6376.png','','','12.36','N','Indigifts Valentines Day Love Quote Love Hearts Seamless Pattern Blue Coffee Mug 330 ml And 1 Heart Hanging - Gift for Boyfriend-Girlfriend-Wife-Husband-Birthday, Anniversary, Wall Décor, Wedding '),(10,'Withe Coffee Mug Design cod (Red) ',8,0,'233924c4fc5b716605db537e8c4f2596.png','','','785.36','N','Earnam Present Special Day For Valentine Gifts For Your Love Gift for Boyfriend, Girlfriend, Husband, Wife, Fiance, Spouse, Friends And Some Special Moments Birthday Gifts, Anniversery Gifts, First Valentine Day Gifts, Withe Coffee Mug Design cod (Red) '),(11,'Kinship Red Porcelain Mug, 300ml ',8,0,'a327f0eca6d2e97d70e6184fddd16ed2.png','','','15.00','N','Sky Trends Present Special Day For Valentine Gifts Coffee Mug Design Cod 107'),(12,'Presidents Mug',8,0,'6cb28afa2225237d9e2b0accc97dd960.png','','','100.00','N','Bje Hot & Cold Ceramic Beverage Mug For Coffee, Tea & Milk, 400 Ml'),(13,'EOS 5D Mark IV',3,8,'58e221fd03277401bdd61ca8515213e8.png','56cf5f685a45bd7ceaf2a65b237622c6.png','ccfcfec76bb1e117e7f6f9eaf2a24695.png','3499.00','Y','The 4th generation model of Canon’s best-selling full-frame EOS camera EOS 5D Mark IV'),(14,'Canon 1400d',3,8,'e2794eb07a5800f72e0bb3af48ea6243.png','','','458.96','Y','Canon 2000D May arrive as Canon next entry level DSLR. Earlier it was expected that Canon 1400D is coming based on the name trend followed by Canon'),(15,'Canon PowerShot SX530',3,8,'237b5970536067173cd6e869552d0832.jpg','','','1200.00','Y','Canon PowerShot SX530 HS Digital Camera with 50x Optical Zoom & Full HD Video'),(16,'Fuji Cam',3,0,'841c3b81e7db0355f4710ceeb1310d96.jpg','','','1253.50','Y','optics and the mechanisms of a single-lens reflex camera with a digital imaging sensor, as opposed to photographic film');

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `subcategory_id` int(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(20) DEFAULT NULL,
  `sub_cat_desc` varchar(255) DEFAULT NULL,
  `thumnail_image` varchar(255) DEFAULT NULL,
  `subcat_image` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `subcategory` */

insert  into `subcategory`(`subcategory_id`,`category_id`,`sub_cat_desc`,`thumnail_image`,`subcat_image`,`is_active`) values (1,1,'Samsung','208ea14e689020f1af380bf64f624312.png','208ea14e689020f1af380bf64f624312.png','Y'),(2,1,'Lenovo','c5e9d2a455bf588370d567720cb56edc.jpg','c5e9d2a455bf588370d567720cb56edc.jpg','Y'),(3,1,'Toshiba','448d48858b75f56e9c6845aef2658d9d.png','448d48858b75f56e9c6845aef2658d9d.png','Y'),(4,1,'Panasonic','72d61af523596063448a8588638690da.jpg','72d61af523596063448a8588638690da.jpg','Y'),(5,2,'Lava','35a9a6c861e1247e7311f1b6beac5447.png','35a9a6c861e1247e7311f1b6beac5447.png','Y'),(6,2,'Moto G','e6ed50951891bb714acd5a0a78c3e5a5.png','e6ed50951891bb714acd5a0a78c3e5a5.png','Y'),(7,2,'Oppo','ed4ac130210fcedc0848de7c62ebf502.png','ed4ac130210fcedc0848de7c62ebf502.png','Y'),(8,3,'Canon','d02da85e096f9d60e005c6f00b1163ad.png','d02da85e096f9d60e005c6f00b1163ad.png','Y'),(9,3,'Nikon','3e7418046ae26fde8d8ab2133c9d15ba.png','3e7418046ae26fde8d8ab2133c9d15ba.png','Y'),(10,3,'Sony','9582cf2d5190884ce7393bff2050303e.png','9582cf2d5190884ce7393bff2050303e.png','Y'),(11,4,'Acer','f4e5fca05b5e7e31bb4e8019224e7390.png','f4e5fca05b5e7e31bb4e8019224e7390.png','Y'),(12,4,'Dell','d0d89ffa642ee6f507d3c1a095341074.png','d0d89ffa642ee6f507d3c1a095341074.png','Y');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(20) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `loginip` varchar(255) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `joburl` varchar(255) DEFAULT NULL,
  `isActive` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`userid`,`login`,`password`,`loginip`,`logintime`,`joburl`,`isActive`) values (1,'admin','','127.0.0.1','2018-03-07 17:19:13','admin','Y'),(2,'demo','','127.0.0.1','2018-03-07 17:32:37',NULL,'Y');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
