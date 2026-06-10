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
-- Table structure for table `enciclopedia`
--

DROP TABLE IF EXISTS `enciclopedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enciclopedia` (
  `nombre` varchar(60) NOT NULL,
  `descripcion` text NOT NULL,
  `sintomas` text NOT NULL,
  `recomendaciones` text NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enciclopedia`
--

LOCK TABLES `enciclopedia` WRITE;
/*!40000 ALTER TABLE `enciclopedia` DISABLE KEYS */;
INSERT INTO `enciclopedia` VALUES ('Anemia','Trastorno caracterizado por una disminución de glóbulos rojos o hemoglobina en la sangre, lo que reduce el transporte de oxígeno a los tejidos.','Fatiga, debilidad, mareos, palidez, dificultad para respirar y dolor de cabeza.','Mantener una alimentación rica en hierro, vitamina B12 y ácido fólico; realizar controles médicos periódicos; seguir el tratamiento indicado por el profesional de salud.'),('Artritis','Enfermedad que provoca inflamación de una o varias articulaciones, afectando la movilidad y causando dolor.','Dolor articular, rigidez, inflamación, enrojecimiento y limitación del movimiento.','Realizar ejercicio moderado, mantener un peso saludable, seguir el tratamiento médico y evitar esfuerzos excesivos en las articulaciones afectadas.'),('Asma','Enfermedad crónica de las vías respiratorias que provoca inflamación y estrechamiento de los bronquios.','Tos, dificultad para respirar, opresión en el pecho y sibilancias.','Evitar desencadenantes como humo o alérgenos, usar correctamente los medicamentos recetados y asistir a controles médicos regulares.'),('Bronquitis','Inflamación de los bronquios que puede ser aguda o crónica, afectando el flujo de aire hacia los pulmones.','Tos persistente, producción de mucosidad, fatiga, fiebre leve y dificultad respiratoria.','Mantener hidratación adecuada, evitar fumar, descansar lo suficiente y seguir las indicaciones médicas.'),('COVID-19','cuerpo.','Fiebre, tos, dolor de garganta, congestión nasal, fatiga, dolor muscular, pérdida del gusto o del olfato, dificultad para respirar y malestar general.','Mantener una buena higiene de manos, cubrirse al toser o estornudar, evitar el contacto cercano con personas enfermas, mantener una adecuada ventilación de los espacios, seguir las recomendaciones de las autoridades sanitarias y buscar atención médica si aparecen síntomas graves.'),('Diabetes Mellitus','Enfermedad metabólica caracterizada por niveles elevados de glucosa en sangre debido a problemas en la producción o utilización de insulina.','Sed excesiva, aumento de la micción, fatiga, visión borrosa y pérdida de peso inexplicable.','Controlar la alimentación, realizar actividad física regularmente, monitorear la glucosa y cumplir con el tratamiento médico.'),('Gastritis','Inflamación de la mucosa del estómago causada por infecciones, medicamentos o hábitos alimenticios inadecuados.','Dolor o ardor estomacal, náuseas, vómitos, sensación de llenura y pérdida de apetito.','Evitar alimentos irritantes, reducir el consumo de alcohol, no automedicarse y seguir las recomendaciones médicas.'),('Hipertensión Arterial','Enfermedad crónica en la que la presión arterial permanece elevada de manera constante.','Dolor de cabeza, mareos, visión borrosa, aunque en muchos casos puede no presentar síntomas.','Reducir el consumo de sal, realizar ejercicio, controlar el estrés y tomar los medicamentos prescritos.'),('Migraña','Trastorno neurológico caracterizado por episodios recurrentes de dolor de cabeza intenso.','Dolor pulsátil, sensibilidad a la luz y al sonido, náuseas y alteraciones visuales.','Identificar factores desencadenantes, mantener horarios regulares de sueño, hidratarse adecuadamente y seguir el tratamiento indicado.'),('Neumonía','Infección que inflama los sacos de aire de uno o ambos pulmones, pudiendo llenarse de líquido o pus.','Fiebre, tos con flema, dificultad para respirar, dolor torácico y escalofríos.','Buscar atención médica oportuna, completar el tratamiento prescrito, descansar y mantenerse hidratado.'),('Tuberculosis','Enfermedad infecciosa causada por una bacteria que afecta principalmente los pulmones.','Tos persistente, pérdida de peso, fiebre, sudoración nocturna y cansancio.','Cumplir estrictamente el tratamiento médico, mantener medidas de higiene respiratoria y asistir a controles periódicos.');
/*!40000 ALTER TABLE `enciclopedia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-10  6:49:42
