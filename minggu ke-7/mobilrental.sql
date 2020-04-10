-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: rentalmobil
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `kendaraan`
--

DROP TABLE IF EXISTS `kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kendaraan` (
  `no_plat` int NOT NULL AUTO_INCREMENT,
  `id_type` int DEFAULT NULL,
  `tahun` year NOT NULL,
  `tarif_kendaraan` int NOT NULL,
  `status_kendaraan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`no_plat`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `tipe_kendaraan` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kendaraan`
--

LOCK TABLES `kendaraan` WRITE;
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `no_ktp` int NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` varchar(50) DEFAULT NULL,
  `telp_pelanggan` char(14) DEFAULT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sopir`
--

DROP TABLE IF EXISTS `sopir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sopir` (
  `id_sopir` int NOT NULL AUTO_INCREMENT,
  `nama_sopir` varchar(30) NOT NULL,
  `alamat_sopir` varchar(50) DEFAULT NULL,
  `telp_sopir` char(14) DEFAULT NULL,
  `sim` varchar(10) DEFAULT NULL,
  `tarif_sopir` int NOT NULL,
  PRIMARY KEY (`id_sopir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sopir`
--

LOCK TABLES `sopir` WRITE;
/*!40000 ALTER TABLE `sopir` DISABLE KEYS */;
/*!40000 ALTER TABLE `sopir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipe_kendaraan`
--

DROP TABLE IF EXISTS `tipe_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipe_kendaraan` (
  `id_type` int NOT NULL AUTO_INCREMENT,
  `type` varchar(25) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipe_kendaraan`
--

LOCK TABLES `tipe_kendaraan` WRITE;
/*!40000 ALTER TABLE `tipe_kendaraan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipe_kendaraan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi` (
  `no_transaksi` int NOT NULL AUTO_INCREMENT,
  `no_ktp` int DEFAULT NULL,
  `id_sopir` int DEFAULT NULL,
  `no_plat` int DEFAULT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali_rencana` date NOT NULL,
  `jam_kembali_rencana` date NOT NULL,
  `tgl_kembali_realisasi` time NOT NULL,
  `jam_kembali_realisasi` time NOT NULL,
  `denda` int NOT NULL,
  `km_pinjam` int NOT NULL,
  `km_kembali` int NOT NULL,
  `bbm_pinjam` varchar(10) NOT NULL,
  `bbm_kembali` varchar(10) NOT NULL,
  `kondisi_mobil_pinjam` varchar(30) DEFAULT NULL,
  `kondisi_mobil_kembali` varchar(30) NOT NULL,
  `kerusakan` varchar(20) DEFAULT NULL,
  `biaya_kerusakan` int DEFAULT NULL,
  `biaya_bbm` int NOT NULL,
  PRIMARY KEY (`no_transaksi`),
  KEY `no_ktp` (`no_ktp`),
  KEY `id_sopir` (`id_sopir`),
  KEY `no_plat` (`no_plat`),
  CONSTRAINT `id_sopir` FOREIGN KEY (`id_sopir`) REFERENCES `sopir` (`id_sopir`),
  CONSTRAINT `no_ktp` FOREIGN KEY (`no_ktp`) REFERENCES `pelanggan` (`no_ktp`),
  CONSTRAINT `no_plat` FOREIGN KEY (`no_plat`) REFERENCES `kendaraan` (`no_plat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-09 19:15:49
