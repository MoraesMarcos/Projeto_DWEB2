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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `idItems` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(1024) DEFAULT NULL,
  `imagem` varchar(1024) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `idUsuario` int DEFAULT NULL,
  `idCidade` int DEFAULT NULL,
  PRIMARY KEY (`idItems`),
  KEY `fk_Items_Cidade1_idx` (`idCidade`) /*!80000 INVISIBLE */,
  KEY `fk_Items_Usuario1_idx` (`idUsuario`),
  CONSTRAINT `fk_Items_Cidade1` FOREIGN KEY (`idCidade`) REFERENCES `cidade` (`idCidade`),
  CONSTRAINT `fk_Items_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Bacalhau a Portuguesa','Bacalhau à portuguesa é uma receita prática preparada no forno. Prato leva bacalhau, batata cozida, cebola, tomate, pimentões, ovos cozidos e azeitonas pretas.','https://s2-receitas.glbimg.com/OWgkq-a7NB8msl91CB6fzkUlE4U=/0x0:1920x1080/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_1f540e0b94d8437dbbc39d567a1dee68/internal_photos/bs/2022/p/i/hMzGJXTXytUHLP7bXsQQ/bacalhau-a-portuguesa-como-fazer.jpg','',7,1),(2,'Pastel de Belem','Pastel de nata é uma popular especialidade da doçaria portuguesa, de inspiração conventual. Foi criado por monges no Mosteiro dos Jerónimos e possui origem certificada','https://postal.pt/wp-content/uploads/2023/12/prato-com-pasteis-de-belem-@pasteisbelem-e1702918633509.jpg','',8,3);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-09 17:51:53
