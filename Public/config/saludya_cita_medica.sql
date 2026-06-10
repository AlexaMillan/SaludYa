CREATE DATABASE  IF NOT EXISTS `saludya` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `saludya`;
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
-- Table structure for table `cita_medica`
--

DROP TABLE IF EXISTS `cita_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cita_medica` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `motivo_consulta` text DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `estado` enum('AGENDADA','CONFIRMADA','REAGENDADA','CANCELADA','FINALIZADA') DEFAULT 'AGENDADA',
  PRIMARY KEY (`idcita`),
  KEY `idpaciente` (`idpaciente`),
  KEY `idagenda` (`idagenda`),
  CONSTRAINT `cita_medica_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `cita_medica_ibfk_2` FOREIGN KEY (`idagenda`) REFERENCES `agenda_cita` (`idagenda`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita_medica`
--

LOCK TABLES `cita_medica` WRITE;
/*!40000 ALTER TABLE `cita_medica` DISABLE KEYS */;
INSERT INTO `cita_medica` VALUES (1,2,10,'dolor de cabeza y fiebre','2026-06-04 14:30:47','CANCELADA'),(2,2,49,'brote en el cuerpo','2026-06-04 14:33:24','REAGENDADA'),(3,2,55,'dolor en el pecho y dificultad para respirar','2026-06-04 14:45:54','REAGENDADA'),(4,3,24,'sugerencia medica','2026-06-04 15:54:14','REAGENDADA'),(5,2,50,'brote en la piel','2026-06-04 17:00:53','CANCELADA'),(6,2,51,'fherjvhdfjv','2026-06-05 18:38:33','REAGENDADA'),(7,2,43,'uhcfkerhferuhfetfjvh','2026-06-05 20:51:46','REAGENDADA'),(8,2,38,'dermatitis','2026-06-06 19:56:16','REAGENDADA'),(9,2,19,'dolor en el pecho','2026-06-06 21:12:35','REAGENDADA'),(10,2,28,'motivo prueba','2026-06-06 21:15:27','CANCELADA'),(11,2,21,'consulta general','2026-06-06 21:35:08','REAGENDADA'),(12,2,54,'consulta ejemplo','2026-06-06 21:50:23','REAGENDADA'),(13,2,9,'ejemplo','2026-06-06 22:12:31','REAGENDADA');
/*!40000 ALTER TABLE `cita_medica` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-10  6:49:41
