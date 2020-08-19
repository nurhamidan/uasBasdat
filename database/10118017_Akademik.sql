-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: smk_komputer_milenium
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(8) DEFAULT NULL,
  `password` text,
  `nip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `nip` (`nip`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin','322282829292821');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_absensi_pegawai`
--

DROP TABLE IF EXISTS `buku_absensi_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku_absensi_pegawai` (
  `tanggal` date NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_absensi_pegawai`
--

LOCK TABLES `buku_absensi_pegawai` WRITE;
/*!40000 ALTER TABLE `buku_absensi_pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku_absensi_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_absensi_siswa`
--

DROP TABLE IF EXISTS `buku_absensi_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku_absensi_siswa` (
  `tanggal` date NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_absensi_siswa`
--

LOCK TABLES `buku_absensi_siswa` WRITE;
/*!40000 ALTER TABLE `buku_absensi_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku_absensi_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ekstrakurikuler`
--

DROP TABLE IF EXISTS `ekstrakurikuler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ekstrakurikuler` (
  `id_ekskul` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `anggaran_per_bulan` decimal(9,2) DEFAULT NULL,
  `nip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_ekskul`),
  KEY `nip` (`nip`),
  CONSTRAINT `ekstrakurikuler_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ekstrakurikuler`
--

LOCK TABLES `ekstrakurikuler` WRITE;
/*!40000 ALTER TABLE `ekstrakurikuler` DISABLE KEYS */;
INSERT INTO `ekstrakurikuler` VALUES (1,'Basket',NULL,'106060'),(3,'Voli',NULL,'1212');
/*!40000 ALTER TABLE `ekstrakurikuler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guru`
--

DROP TABLE IF EXISTS `guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT NULL,
  `kode_mata_pelajaran` int DEFAULT NULL,
  PRIMARY KEY (`id_guru`),
  KEY `nip` (`nip`),
  KEY `kode_mata_pelajaran` (`kode_mata_pelajaran`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`kode_mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guru`
--

LOCK TABLES `guru` WRITE;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` VALUES (13,'106060',NULL),(14,'0009877',1),(15,'00098771',2);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keamanan`
--

DROP TABLE IF EXISTS `keamanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keamanan` (
  `id_security` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_security`),
  KEY `nip` (`nip`),
  CONSTRAINT `keamanan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keamanan`
--

LOCK TABLES `keamanan` WRITE;
/*!40000 ALTER TABLE `keamanan` DISABLE KEYS */;
INSERT INTO `keamanan` VALUES (3,'0009'),(1,'1111912');
/*!40000 ALTER TABLE `keamanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `kode_kelas` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(10) DEFAULT NULL,
  `id_guru` int DEFAULT NULL,
  PRIMARY KEY (`kode_kelas`),
  KEY `kelas_ibfk_1` (`id_guru`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (2,'RPL2',13),(3,'RPL3',14);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran`
--

DROP TABLE IF EXISTS `mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran` (
  `kode_mata_pelajaran` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `jenis` enum('Kejuruan','Umum') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`kode_mata_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran`
--

LOCK TABLES `mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran` DISABLE KEYS */;
INSERT INTO `mata_pelajaran` VALUES (1,'AF',NULL),(2,'PKN','Umum'),(3,'SSH',NULL),(4,'sa',NULL),(5,'sa',NULL),(6,'su',NULL),(7,'sua','Kejuruan'),(8,'suas','Kejuruan'),(9,'suas',NULL),(10,'suas',NULL),(11,'aser','Kejuruan'),(12,'aser',NULL),(13,'aser','Kejuruan'),(14,'aser',NULL),(15,'aser',NULL),(16,'aser','Umum'),(17,'Masak','Kejuruan'),(18,'Haras',NULL),(19,'Doa',NULL),(20,'Basis Data','Kejuruan');
/*!40000 ALTER TABLE `mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran_tugas_harian`
--

DROP TABLE IF EXISTS `mata_pelajaran_tugas_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran_tugas_harian` (
  `kode_mata_pelajaran` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `kode_mata_pelajaran` (`kode_mata_pelajaran`),
  CONSTRAINT `mata_pelajaran_tugas_harian_ibfk_2` FOREIGN KEY (`tanggal`) REFERENCES `tugas_harian` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mata_pelajaran_tugas_harian_ibfk_3` FOREIGN KEY (`kode_mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran_tugas_harian`
--

LOCK TABLES `mata_pelajaran_tugas_harian` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran_tugas_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata_pelajaran_tugas_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran_uas`
--

DROP TABLE IF EXISTS `mata_pelajaran_uas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran_uas` (
  `kode_mata_pelajaran` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `kode_mata_pelajaran` (`kode_mata_pelajaran`),
  CONSTRAINT `mata_pelajaran_uas_ibfk_2` FOREIGN KEY (`tanggal`) REFERENCES `uas` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mata_pelajaran_uas_ibfk_3` FOREIGN KEY (`kode_mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran_uas`
--

LOCK TABLES `mata_pelajaran_uas` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran_uas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata_pelajaran_uas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mata_pelajaran_uts`
--

DROP TABLE IF EXISTS `mata_pelajaran_uts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mata_pelajaran_uts` (
  `kode_mata_pelajaran` int DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `kode_mata_pelajaran` (`kode_mata_pelajaran`),
  CONSTRAINT `mata_pelajaran_uts_ibfk_2` FOREIGN KEY (`tanggal`) REFERENCES `uts` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mata_pelajaran_uts_ibfk_3` FOREIGN KEY (`kode_mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_pelajaran_uts`
--

LOCK TABLES `mata_pelajaran_uts` WRITE;
/*!40000 ALTER TABLE `mata_pelajaran_uts` DISABLE KEYS */;
INSERT INTO `mata_pelajaran_uts` VALUES (2,'2020-08-19'),(20,'2020-08-19');
/*!40000 ALTER TABLE `mata_pelajaran_uts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `office_boy`
--

DROP TABLE IF EXISTS `office_boy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `office_boy` (
  `id_ob` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_ob`),
  KEY `nip` (`nip`),
  CONSTRAINT `office_boy_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `office_boy`
--

LOCK TABLES `office_boy` WRITE;
/*!40000 ALTER TABLE `office_boy` DISABLE KEYS */;
INSERT INTO `office_boy` VALUES (7,'00098'),(1,'000987712345678'),(2,'11119');
/*!40000 ALTER TABLE `office_boy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `olimpiade`
--

DROP TABLE IF EXISTS `olimpiade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `olimpiade` (
  `tahun_olimpiade` year NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`tahun_olimpiade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `olimpiade`
--

LOCK TABLES `olimpiade` WRITE;
/*!40000 ALTER TABLE `olimpiade` DISABLE KEYS */;
/*!40000 ALTER TABLE `olimpiade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `olimpiade_ekstrakurikuler`
--

DROP TABLE IF EXISTS `olimpiade_ekstrakurikuler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `olimpiade_ekstrakurikuler` (
  `tahun_olimpiade` year DEFAULT NULL,
  `id_ekskul` int DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tingkat` varchar(16) DEFAULT NULL,
  KEY `tahun_olimpiade` (`tahun_olimpiade`),
  KEY `id_ekskul` (`id_ekskul`),
  CONSTRAINT `olimpiade_ekstrakurikuler_ibfk_1` FOREIGN KEY (`tahun_olimpiade`) REFERENCES `olimpiade` (`tahun_olimpiade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `olimpiade_ekstrakurikuler_ibfk_2` FOREIGN KEY (`id_ekskul`) REFERENCES `ekstrakurikuler` (`id_ekskul`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `olimpiade_ekstrakurikuler`
--

LOCK TABLES `olimpiade_ekstrakurikuler` WRITE;
/*!40000 ALTER TABLE `olimpiade_ekstrakurikuler` DISABLE KEYS */;
/*!40000 ALTER TABLE `olimpiade_ekstrakurikuler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orang_tua`
--

DROP TABLE IF EXISTS `orang_tua`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orang_tua` (
  `id_orang_tua` int NOT NULL AUTO_INCREMENT,
  `nomor_telepon` varchar(12) DEFAULT NULL,
  `jumlah_anak` tinyint DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `status_orang_tua` enum('Hidup','Meninggal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_orang_tua`),
  KEY `orang_tua_ibfk_1` (`nik`),
  CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orang_tua`
--

LOCK TABLES `orang_tua` WRITE;
/*!40000 ALTER TABLE `orang_tua` DISABLE KEYS */;
INSERT INTO `orang_tua` VALUES (2,'089',3,'Bos','Hidup','33'),(3,'089',3,'IRT','Hidup','34'),(4,'089',2,'Secure','Hidup','3217012312990005'),(5,NULL,NULL,NULL,NULL,NULL),(8,'0889',5,'Guru','Hidup','6060'),(9,'0889',12,'Guru','Hidup','008'),(10,'0889',12,'Guru','Hidup','321');
/*!40000 ALTER TABLE `orang_tua` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orang_tua_siswa`
--

DROP TABLE IF EXISTS `orang_tua_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orang_tua_siswa` (
  `nis` varchar(10) DEFAULT NULL,
  `id_orang_tua` int DEFAULT NULL,
  KEY `nis` (`nis`),
  KEY `id_orang_tua` (`id_orang_tua`),
  CONSTRAINT `orang_tua_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orang_tua_siswa_ibfk_2` FOREIGN KEY (`id_orang_tua`) REFERENCES `orang_tua` (`id_orang_tua`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orang_tua_siswa`
--

LOCK TABLES `orang_tua_siswa` WRITE;
/*!40000 ALTER TABLE `orang_tua_siswa` DISABLE KEYS */;
INSERT INTO `orang_tua_siswa` VALUES ('998',2),('998',3),('9888',4),('9888',2),('9888',2),('9888',4);
/*!40000 ALTER TABLE `orang_tua_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pegawai` (
  `nip` varchar(16) NOT NULL,
  `jumlah_anak` tinyint DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `nik` (`nik`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('0009',113,'008'),('00098',12,'0088'),('0009877',12,'008877'),('00098771',12,'0088771'),('000987712',12,'00887712'),('0009877123',12,'008877123'),('00098771234',12,'0088771234'),('000987712345',12,'00887712345'),('0009877123456',12,'008877123456'),('00098771234567',12,'0088771234567'),('000987712345678',12,'00887712345678'),('106060',0,'6060'),('11119',12,'1119'),('111191',12,'11191'),('1111912',12,'111912'),('1212',5,'321'),('123123',10,'53333'),('1231234',55,'8147'),('1423479873',3,'342434'),('1515',15,'1515'),('322282829292821',3,'3217012312990005');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai_buku_absensi_pegawai`
--

DROP TABLE IF EXISTS `pegawai_buku_absensi_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pegawai_buku_absensi_pegawai` (
  `tanggal` date DEFAULT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `status` enum('Hadir','Sakit','Izin','Alpa') DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `nip` (`nip`),
  CONSTRAINT `pegawai_buku_absensi_pegawai_ibfk_1` FOREIGN KEY (`tanggal`) REFERENCES `buku_absensi_pegawai` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pegawai_buku_absensi_pegawai_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai_buku_absensi_pegawai`
--

LOCK TABLES `pegawai_buku_absensi_pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai_buku_absensi_pegawai` DISABLE KEYS */;
/*!40000 ALTER TABLE `pegawai_buku_absensi_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penduduk` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `golongan_darah` enum('-','A','B','AB','O') DEFAULT NULL,
  `alamat` text,
  `agama` enum('Islam','Protestan','Katolik','Hindu','Buddha','Khonghucu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kewarganegaraan` enum('WNI','WNA') DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penduduk`
--

LOCK TABLES `penduduk` WRITE;
/*!40000 ALTER TABLE `penduduk` DISABLE KEYS */;
INSERT INTO `penduduk` VALUES ('  000000000000','aaaaaaaaaa','aaaaaa','2020-08-18','L','A','aaaaa','Islam','WNA'),('008','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('0088','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('008877','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('0088771','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('00887712','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('008877123','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('0088771234','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('00887712345','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('008877123456','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('0088771234567','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('00887712345678','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('090909','Karce','biner','2020-08-19','P','AB','1001',NULL,'WNA'),('1119','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('11191','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('111912','nama','tempat lahir','2020-08-17','P','A','fdg','Islam','WNI'),('1515','nama','tempat lahir','2020-08-17','P','O','ff','Islam','WNI'),('3001','Sashi','tempat lahir','2020-08-18','P','A','fsdf','Islam','WNI'),('32','Agung Nurhamidan','Ciamis','2020-08-12','L','O','Jl. Tubagus Ismail Raya','Islam','WNI'),('321','Pegawai Free','tempat lahir','2020-08-18','L','AB','fsdf','Islam','WNI'),('321234','Penn Zero','Chicago','2020-08-18','L','B','Masih di Chicago','Protestan','WNA'),('3217012312990005','M Ihsan','Bandung','1999-06-18','L','O','Lembang','Islam','WNI'),('33','Samsu','Ciamis','2020-08-12','L','O','Cinyaut Girang','Islam','WNI'),('34','Surliah','Ciamis','2020-08-11','P','O','Cinyaut','Islam','WNI'),('342434','nama','tempat lahir','2020-08-17','L','AB','alamat','Khonghucu','WNI'),('53333','nama','tempat lahir','2020-08-17','L','AB','alamat kuning','Islam','WNI'),('6060','Bu Guru','Ciamis','2020-08-12','P','A','guru','Islam','WNA'),('64','nama','tempat lahir','2020-08-17','P','AB','dfsd','Islam','WNA'),('8147','nama','tempat lahir','2020-08-17','P','A','dsf','Protestan','WNI');
/*!40000 ALTER TABLE `penduduk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `nis` varchar(10) NOT NULL,
  `anak_ke` tinyint unsigned DEFAULT NULL,
  `jenis_kendaraan` enum('Jalan Kaki','Sepeda Motor Pribadi','Kendaraan Umum','Mobil Pribadi') DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `kode_kelas` int DEFAULT NULL,
  `id_ekskul` int DEFAULT NULL,
  `nilai_uts` tinyint DEFAULT NULL,
  `nilai_uas` tinyint DEFAULT NULL,
  `nilai_tugas` tinyint DEFAULT NULL,
  PRIMARY KEY (`nis`),
  KEY `nik` (`nik`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `id_ekskul` (`id_ekskul`),
  CONSTRAINT `siswa_ibfk_10` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_11` FOREIGN KEY (`id_ekskul`) REFERENCES `ekstrakurikuler` (`id_ekskul`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_5` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_ibfk_7` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES ('123334422',6,'Jalan Kaki','64',2,3,90,56,0),('32158096',NULL,NULL,NULL,NULL,NULL,0,0,0),('33223322',NULL,NULL,NULL,NULL,NULL,0,0,0),('54377777',6,NULL,'  000000000000',NULL,NULL,0,0,0),('9888',2,'Jalan Kaki','3001',2,1,0,0,0),('998',3,'Mobil Pribadi','32',NULL,NULL,0,0,0);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_buku_absensi_siswa`
--

DROP TABLE IF EXISTS `siswa_buku_absensi_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa_buku_absensi_siswa` (
  `tanggal` date DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `status` enum('Hadir','Sakit','Izin','Alpa') DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `nis` (`nis`),
  CONSTRAINT `siswa_buku_absensi_siswa_ibfk_1` FOREIGN KEY (`tanggal`) REFERENCES `buku_absensi_siswa` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_buku_absensi_siswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_buku_absensi_siswa`
--

LOCK TABLES `siswa_buku_absensi_siswa` WRITE;
/*!40000 ALTER TABLE `siswa_buku_absensi_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa_buku_absensi_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_mata_pelajaran`
--

DROP TABLE IF EXISTS `siswa_mata_pelajaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa_mata_pelajaran` (
  `nis` varchar(10) DEFAULT NULL,
  `kode_mata_pelajaran` int DEFAULT NULL,
  KEY `nis` (`nis`),
  KEY `kode_mata_pelajaran` (`kode_mata_pelajaran`),
  CONSTRAINT `siswa_mata_pelajaran_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `siswa_mata_pelajaran_ibfk_2` FOREIGN KEY (`kode_mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_mata_pelajaran`
--

LOCK TABLES `siswa_mata_pelajaran` WRITE;
/*!40000 ALTER TABLE `siswa_mata_pelajaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa_mata_pelajaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tata_usaha`
--

DROP TABLE IF EXISTS `tata_usaha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tata_usaha` (
  `id_tu` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_tu`),
  KEY `nip` (`nip`),
  CONSTRAINT `tata_usaha_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tata_usaha`
--

LOCK TABLES `tata_usaha` WRITE;
/*!40000 ALTER TABLE `tata_usaha` DISABLE KEYS */;
INSERT INTO `tata_usaha` VALUES (1,'111191'),(2,'1515');
/*!40000 ALTER TABLE `tata_usaha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tugas_harian`
--

DROP TABLE IF EXISTS `tugas_harian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tugas_harian` (
  `tanggal` date NOT NULL,
  `nilai` tinyint DEFAULT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_harian`
--

LOCK TABLES `tugas_harian` WRITE;
/*!40000 ALTER TABLE `tugas_harian` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugas_harian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tugas_harian_siswa`
--

DROP TABLE IF EXISTS `tugas_harian_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tugas_harian_siswa` (
  `tanggal` date DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `nis` (`nis`),
  CONSTRAINT `tugas_harian_siswa_ibfk_1` FOREIGN KEY (`tanggal`) REFERENCES `tugas_harian` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tugas_harian_siswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tugas_harian_siswa`
--

LOCK TABLES `tugas_harian_siswa` WRITE;
/*!40000 ALTER TABLE `tugas_harian_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tugas_harian_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uas`
--

DROP TABLE IF EXISTS `uas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uas` (
  `tanggal` date NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uas`
--

LOCK TABLES `uas` WRITE;
/*!40000 ALTER TABLE `uas` DISABLE KEYS */;
/*!40000 ALTER TABLE `uas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uas_siswa`
--

DROP TABLE IF EXISTS `uas_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uas_siswa` (
  `tanggal` date DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nilai` tinyint NOT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `nis` (`nis`),
  CONSTRAINT `uas_siswa_ibfk_1` FOREIGN KEY (`tanggal`) REFERENCES `uas` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uas_siswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uas_siswa`
--

LOCK TABLES `uas_siswa` WRITE;
/*!40000 ALTER TABLE `uas_siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `uas_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uts`
--

DROP TABLE IF EXISTS `uts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uts` (
  `tanggal` date NOT NULL,
  `nilai` tinyint NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uts`
--

LOCK TABLES `uts` WRITE;
/*!40000 ALTER TABLE `uts` DISABLE KEYS */;
INSERT INTO `uts` VALUES ('2020-08-19',90);
/*!40000 ALTER TABLE `uts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uts_siswa`
--

DROP TABLE IF EXISTS `uts_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uts_siswa` (
  `tanggal` date DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  KEY `tanggal` (`tanggal`),
  KEY `nis` (`nis`),
  CONSTRAINT `uts_siswa_ibfk_1` FOREIGN KEY (`tanggal`) REFERENCES `uts` (`tanggal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uts_siswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uts_siswa`
--

LOCK TABLES `uts_siswa` WRITE;
/*!40000 ALTER TABLE `uts_siswa` DISABLE KEYS */;
INSERT INTO `uts_siswa` VALUES ('2020-08-19','998'),('2020-08-19','998');
/*!40000 ALTER TABLE `uts_siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19 16:50:38
