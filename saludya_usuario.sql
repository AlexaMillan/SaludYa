-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: saludya
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `documento` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('PACIENTE','ESPECIALISTA','ADMINISTRADOR','IPS') NOT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `documento` (`documento`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1012403936,'Alexandra Millan','3024550885','alexmillan1607@gmail.com','contraseña123','ADMINISTRADOR','2026-05-21 00:00:00','ACTIVO'),(2,1146132323,'Angela Valero','3011233330','angelavalero@gmail.com','angela123','PACIENTE','2026-06-03 14:21:57','ACTIVO'),(3,1012372372,'Fabian Valero Piñeros','3106803030','fabianv@gmail.com','fabian123','PACIENTE','2026-06-03 14:34:10','ACTIVO'),(4,16857857,'Luis Carlos Monsalve','3103170808','lucam@gmail.com','lucam123','ESPECIALISTA','2026-06-03 15:50:50','ACTIVO'),(5,51978978,'Mado Nieto','3208063434','madon@gmail.com','mado123','ESPECIALISTA','2026-06-03 20:06:19','ACTIVO'),(6,1012390303,'Caterinne Lopez','3044550101','caterinne@gmail.com','caterinne123','PACIENTE','2026-06-03 20:10:40','ACTIVO'),(7,1012390404,'Johan Luna','3023021212','johan@gmail.com','johan123','ESPECIALISTA','2026-06-03 20:12:10','ACTIVO'),(8,12345678,'Ana Gómez','3001111111','ana@saludya.com','12345','ESPECIALISTA','2026-06-04 10:49:32','ACTIVO'),(10,112345678,'Carlos Medina','3001234567','carlos@saludya.com','12345','ESPECIALISTA','2026-06-04 11:05:14','ACTIVO'),(11,1012232323,'Lizet Monsalve','3023213232','lizeth@gmail.com','lizeth123','PACIENTE','2026-06-06 22:03:34','ACTIVO');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-07 15:58:07
