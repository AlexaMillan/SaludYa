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
-- Table structure for table `solicitud_enfermera`
--

DROP TABLE IF EXISTS `solicitud_enfermera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_enfermera` (
  `idsolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `idpaciente` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `servicio` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT current_timestamp(),
  `estado` enum('PENDIENTE','ASIGNADA','EN_PROCESO','FINALIZADA','CANCELADA') DEFAULT 'PENDIENTE',
  PRIMARY KEY (`idsolicitud`),
  KEY `idpaciente` (`idpaciente`),
  CONSTRAINT `solicitud_enfermera_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_enfermera`
--

LOCK TABLES `solicitud_enfermera` WRITE;
/*!40000 ALTER TABLE `solicitud_enfermera` DISABLE KEYS */;
INSERT INTO `solicitud_enfermera` VALUES (1,2,'Carrera 80 F# 58 58 norte','Bogota','Cuidado básico','Paciente de 95 años de edad requiere acompañamiento diario por falta de movilidad','2026-06-04 07:02:36','PENDIENTE'),(2,2,'avenida siempre viva 123','Bogota','limpieza herida','limpieza zona columna','2026-06-04 17:04:55','PENDIENTE'),(3,2,'avenida siempre viva 123','Bogota','limpieza herida','gjgmhuhjm','2026-06-05 18:31:17','PENDIENTE'),(4,2,'avenida siempre viva 123','Bogota','limpieza herida','fchrekufhjgrt','2026-06-05 20:49:11','PENDIENTE'),(5,2,'calle 12 # 24','Bogota','inyectologia','se solicita la inyeccion del paciente','2026-06-06 19:52:05','PENDIENTE'),(6,2,'calle 12 # 24','Bogota','cuidados','Cuidado de señora de 65 años con problemas de mobilidad','2026-06-06 21:08:18','PENDIENTE'),(7,2,'avenida villavicencio 123','Bogota','cuidados','motivos de ejemplo','2026-06-06 21:31:00','PENDIENTE'),(8,2,'carrera 80 f #57','Bogota','limpieza herida','limpieza heridas ejemplo','2026-06-06 21:48:35','PENDIENTE'),(9,2,'avenida siempre viva 123','Bogota','limpieza herida','desripcion','2026-06-06 22:09:57','PENDIENTE');
/*!40000 ALTER TABLE `solicitud_enfermera` ENABLE KEYS */;
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
