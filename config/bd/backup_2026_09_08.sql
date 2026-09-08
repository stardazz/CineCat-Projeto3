-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: cinecat
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `assento`
--

DROP TABLE IF EXISTS `assento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assento` (
  `idassento` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  `fila` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idassento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assento`
--

LOCK TABLES `assento` WRITE;
/*!40000 ALTER TABLE `assento` DISABLE KEYS */;
INSERT INTO `assento` VALUES (1,2,'H-13'),(2,10,'G-2');
/*!40000 ALTER TABLE `assento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme` (
  `id_filme` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `duracao` int DEFAULT NULL,
  `classificacao` varchar(45) DEFAULT NULL,
  `sinopse` text,
  PRIMARY KEY (`id_filme`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` VALUES (1,'A Odisseia','Ação/Fantasia',252,'14','Odisseu, rei de Ítaca, embarca em uma jornada para retornar para casa após a Guerra de Troia.'),(2,'Homem Aranha 3','ação',3,'16','Aranhas');
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingresso`
--

DROP TABLE IF EXISTS `ingresso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingresso` (
  `id_ingresso` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_sessao` int NOT NULL,
  `assento_idassento` int NOT NULL,
  `formapagamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ingresso`),
  KEY `fk_ingresso_usuario1_idx` (`id_usuario`),
  KEY `fk_ingresso_sessao1_idx` (`id_sessao`),
  KEY `fk_ingresso_assento1_idx` (`assento_idassento`),
  CONSTRAINT `fk_ingresso_assento1` FOREIGN KEY (`assento_idassento`) REFERENCES `assento` (`idassento`),
  CONSTRAINT `fk_ingresso_sessao1` FOREIGN KEY (`id_sessao`) REFERENCES `sessao` (`id_sessao`),
  CONSTRAINT `fk_ingresso_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingresso`
--

LOCK TABLES `ingresso` WRITE;
/*!40000 ALTER TABLE `ingresso` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sala` (
  `id_sala` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `capacidade` int DEFAULT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (1,'Sala 2',200),(2,'Sala 1',150);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala_has_assento`
--

DROP TABLE IF EXISTS `sala_has_assento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sala_has_assento` (
  `sala_id_sala` int NOT NULL,
  `assento_idassento` int NOT NULL,
  PRIMARY KEY (`sala_id_sala`,`assento_idassento`),
  KEY `fk_sala_has_assento_assento1_idx` (`assento_idassento`),
  KEY `fk_sala_has_assento_sala1_idx` (`sala_id_sala`),
  CONSTRAINT `fk_sala_has_assento_assento1` FOREIGN KEY (`assento_idassento`) REFERENCES `assento` (`idassento`),
  CONSTRAINT `fk_sala_has_assento_sala1` FOREIGN KEY (`sala_id_sala`) REFERENCES `sala` (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala_has_assento`
--

LOCK TABLES `sala_has_assento` WRITE;
/*!40000 ALTER TABLE `sala_has_assento` DISABLE KEYS */;
/*!40000 ALTER TABLE `sala_has_assento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessao`
--

DROP TABLE IF EXISTS `sessao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessao` (
  `id_sessao` int NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `preco` decimal(4,2) DEFAULT NULL,
  `id_filme` int NOT NULL,
  `id_sala` int NOT NULL,
  PRIMARY KEY (`id_sessao`),
  KEY `fk_sessao_filme_idx` (`id_filme`),
  KEY `fk_sessao_sala1_idx` (`id_sala`),
  CONSTRAINT `fk_sessao_filme` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id_filme`),
  CONSTRAINT `fk_sessao_sala1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessao`
--

LOCK TABLES `sessao` WRITE;
/*!40000 ALTER TABLE `sessao` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'João','joaofrefire@gmail.com','123'),(2,'Maria','mariaroblox@gmail.com','321');
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

-- Dump completed on 2026-09-08 11:13:32
