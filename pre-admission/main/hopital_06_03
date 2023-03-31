-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: hopital
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chambre` (
  `IDChambre` int(11) NOT NULL,
  `Particuliere` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDChambre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chambre`
--

LOCK TABLES `chambre` WRITE;
/*!40000 ALTER TABLE `chambre` DISABLE KEYS */;
/*!40000 ALTER TABLE `chambre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `IDContact` int(11) NOT NULL,
  PRIMARY KEY (`IDContact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `couverture sociale`
--

DROP TABLE IF EXISTS `couverture sociale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `couverture sociale` (
  `NumSecu` bigint(20) NOT NULL,
  `NomSecu` varchar(100) DEFAULT NULL,
  `Assure` tinyint(1) DEFAULT NULL,
  `ALD` tinyint(1) DEFAULT NULL,
  `NomMutuelle` varchar(100) DEFAULT NULL,
  `ChambreParticuliere` tinyint(1) DEFAULT NULL,
  `MedecinTraitant` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NumSecu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `couverture sociale`
--

LOCK TABLES `couverture sociale` WRITE;
/*!40000 ALTER TABLE `couverture sociale` DISABLE KEYS */;
INSERT INTO `couverture sociale` VALUES (103115985236984,NULL,NULL,NULL,NULL,NULL,NULL),(125847536952873,NULL,NULL,NULL,NULL,NULL,NULL),(297132649785263,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `couverture sociale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `NumSecu` bigint(20) DEFAULT NULL,
  `CarteID` varchar(100) DEFAULT NULL,
  `CarteVitale` varchar(100) DEFAULT NULL,
  `Mutuelle` varchar(100) DEFAULT NULL,
  `Autorisation` varchar(100) DEFAULT NULL,
  `LivretFamille` varchar(100) DEFAULT NULL,
  `DecisionJuge` varchar(100) DEFAULT NULL,
  KEY `Documents_FK` (`NumSecu`),
  CONSTRAINT `Documents_FK` FOREIGN KEY (`NumSecu`) REFERENCES `couverture sociale` (`NumSecu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospitalisation`
--

DROP TABLE IF EXISTS `hospitalisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospitalisation` (
  `IDPatient` int(11) DEFAULT NULL,
  `IDDoc` int(11) AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Heure` datetime DEFAULT NULL,
  `PreAdmission` varchar(100) DEFAULT NULL,
  `IDChambre` int(11) DEFAULT NULL,
  KEY `IDDoc` (`IDDoc`),
  KEY `hospitalisation_FK` (`IDPatient`),
  KEY `IDChambre` (`IDChambre`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospitalisation`
--

LOCK TABLES `hospitalisation` WRITE;
/*!40000 ALTER TABLE `hospitalisation` DISABLE KEYS */;
INSERT INTO `hospitalisation` VALUES (1,1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hospitalisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `IDPatient` int(11) NOT NULL,
  `Civilite` varchar(100) DEFAULT NULL,
  `NomNaiss` varchar(100) DEFAULT NULL,
  `NomEpouse` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `Mineur` tinyint(1) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `Ville` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Tel` int(11) DEFAULT NULL,
  `NumSecu` bigint(20) DEFAULT NULL,
  `IDPrevenir` int(11) DEFAULT NULL,
  `IDConfiance` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPatient`),
  KEY `IDPrevenir` (`IDPrevenir`),
  KEY `IDConfiance` (`IDConfiance`),
  KEY `NumSecu` (`NumSecu`),
  CONSTRAINT `IDConfiance` FOREIGN KEY (`IDConfiance`) REFERENCES `contact` (`IDContact`),
  CONSTRAINT `IDPrevenir` FOREIGN KEY (`IDPrevenir`) REFERENCES `contact` (`IDContact`),
  CONSTRAINT `NumSecu` FOREIGN KEY (`NumSecu`) REFERENCES `couverture sociale` (`NumSecu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (1,'homme','bourst',NULL,'arthur',NULL,NULL,NULL,NULL,NULL,NULL,NULL,103115985236984,NULL,NULL),(2,'homme','telle',NULL,'maxens',NULL,NULL,NULL,NULL,NULL,NULL,NULL,125847536952873,NULL,NULL),(4,'femme','notrice','deneve','steph',NULL,NULL,NULL,NULL,NULL,NULL,NULL,297132649785263,NULL,NULL);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personnel` (
  `IDPersonnel` int(11) NOT NULL,
  `IDService` int(11) DEFAULT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prenom` varchar(100) DEFAULT NULL,
  `identifiant` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPersonnel`),
  KEY `personnel_FK` (`Role`),
  CONSTRAINT `personnel_FK` FOREIGN KEY (`Role`) REFERENCES `role` (`IDRole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personnel`
--

LOCK TABLES `personnel` WRITE;
/*!40000 ALTER TABLE `personnel` DISABLE KEYS */;
INSERT INTO `personnel` VALUES (1,1,'Telle','Maxens','M.telle','123',1),(2,1,'Bourst','Arthur','A.bourst','1234',2),(3,1,'Deneve','Valentin','V.deneve','azerty',3);
/*!40000 ALTER TABLE `personnel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `libele` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'secrétaire'),(2,'medecin'),(3,'administrateur');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `IDService` int(11) NOT NULL,
  `IDChef` int(11) DEFAULT NULL,
  `NomService` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDService`),
  KEY `Service_FK` (`IDChef`),
  CONSTRAINT `Service_FK` FOREIGN KEY (`IDChef`) REFERENCES `personnel` (`IDPersonnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'hopital'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-06 15:38:52
