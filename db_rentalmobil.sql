-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_rentalmobil
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0+deb10u1

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `kd_customer` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'noni ariesta','banyumas','088882222'),(2,'susi susanti','cilacap','088883456'),(3,'rina wirawan','purbalingga','088882020'),(4,'tomi saputra','banjarnegara','088889100'),(6,'Daffa randika','sokaraja lor','0812214187'),(7,'admin','_','0'),(8,'krishna','wirasana','30134098'),(9,'irfan','karangbawang','081234113'),(10,'vita aprilia','purbalingga','08133144');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mobil`
--

DROP TABLE IF EXISTS `mobil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mobil` (
  `kd_mobil` int(8) NOT NULL AUTO_INCREMENT,
  `jenis_mobil` varchar(35) NOT NULL,
  `warna` varchar(35) NOT NULL,
  `stok` int(8) NOT NULL,
  `tarif_sewa` int(15) NOT NULL,
  PRIMARY KEY (`kd_mobil`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mobil`
--

LOCK TABLES `mobil` WRITE;
/*!40000 ALTER TABLE `mobil` DISABLE KEYS */;
INSERT INTO `mobil` VALUES (1,'sedan','putih',0,150000),(2,'stasion wangon','hitam',1,250000),(3,'SUV','biru',4,300000),(4,'hatchback','silver',6,250000),(5,'telsa model x','putih',1,3000000),(7,'volvo','hitam',2,250000);
/*!40000 ALTER TABLE `mobil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sewa`
--

DROP TABLE IF EXISTS `sewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sewa` (
  `kd_sewa` int(8) NOT NULL AUTO_INCREMENT,
  `kd_mobil` int(8) NOT NULL,
  `kd_customer` int(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_sewa` int(15) NOT NULL,
  PRIMARY KEY (`kd_sewa`),
  KEY `kd_mobil` (`kd_mobil`),
  KEY `kd_customer` (`kd_customer`),
  CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`kd_mobil`) REFERENCES `mobil` (`kd_mobil`),
  CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`kd_customer`) REFERENCES `customer` (`kd_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sewa`
--

LOCK TABLES `sewa` WRITE;
/*!40000 ALTER TABLE `sewa` DISABLE KEYS */;
INSERT INTO `sewa` VALUES (1,1,4,'2022-08-10','2022-08-10',150000),(2,1,2,'2022-08-03','2022-09-03',4800000),(3,1,3,'2022-08-15','2022-09-01',2700000),(6,2,8,'2022-08-10','2022-08-11',500000),(8,3,2,'2022-07-31','2022-08-31',9600000),(9,2,3,'2022-08-01','2022-08-30',7500000),(10,5,2,'2022-08-17','2022-09-08',69000000),(11,2,9,'2022-08-19','2022-09-03',4000000),(12,2,6,'2022-08-12','2022-08-30',4750000),(14,2,10,'2022-08-01','2022-09-02',8250000);
/*!40000 ALTER TABLE `sewa` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger tr_sewa
after insert on sewa 
for each row begin
update mobil set stok = stok - 1 where mobil.kd_mobil = new.kd_mobil;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger tr_update after update on sewa  for each row begin update mobil set stok = stok - 1 where mobil.kd_mobil = new.kd_mobil; update mobil set stok = stok + 1 where mobil.kd_mobil = old.kd_mobil; end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger tr_kembali after delete on sewa  for each row begin update mobil set stok = stok + 1 where mobil.kd_mobil = old.kd_mobil; end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3'),(2,'root','63a9f0ea7bb98050796b649e85481845'),(3,'root1','e5d9dee0892c9f474a174d3bfffb7810'),(5,'susi susanti','a678833b65852729a98e0051011a4de6'),(6,'tomi saputra','a04122c479e41ad3b3213e34f3e2318d'),(7,'Daffa randika','87b2c90519859fb60e3fa28ed13fe0f5'),(8,'agil','0a68be9c12632278b4fa8f8d497ad2c1'),(9,'krishna','243bd1ce0387f18005abfc43b001646a'),(10,'irfan','24b90bc48a67ac676228385a7c71a119'),(11,'vita aprilia','41753968fd808f7131cbab4688b51a50');
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

-- Dump completed on 2022-08-11 11:11:26
