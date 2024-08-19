-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: discoveryportugal
-- ------------------------------------------------------
-- Server version	8.2.0

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
  `idUsuario` int NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `fotoPerfil` varchar(1024) DEFAULT NULL,
  `cargo` varchar(32) DEFAULT NULL,
  `idItems` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuário_Items1_idx` (`idItems`),
  CONSTRAINT `fk_Usuário_Items1` FOREIGN KEY (`idItems`) REFERENCES `items` (`idItems`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (7,'Satoru Gojo','gojo@hotmail.com','$2y$13$3EfliG450BtMyr063SF8lec0gTV7P5hbyEgpU9W3iMYc/NBTotyS.','31989371110','uploads/GMbD8BmXYAAZXjI.jpeg','USER',NULL),(8,'Julio Cesar Rocha','julio@hotmail.com','$2y$13$z0OZcS15KZgt.vso5cYUqewnA5NhO32zoAFxcwyzgEaTeErX/VCpW','31989371110','uploads/1707709206132_crop.jpg','USER',NULL),(9,'Hanni Pham','hanni@hotmail.com','$2y$13$DO2RIxiG9pcsLZbPI8M9ZO6YfUcjg15q6H1LJuBZe/nXFYWlF3uvO','3198937122','uploads/432287078_324316070631287_737793402077226859_n.jpg','ADMIN',NULL),(10,'Leon','leon@hotmail.com','$2y$13$SPXKN2ThSqXjILSohWH4/Ow0oml8tFjNTcqbI7uc0fqAWfMUmZgzW','3198937122','uploads/429910961_339136289127287_700369653222089486_n.jpg','USER',NULL);
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

-- Dump completed on 2024-06-09 17:51:54
