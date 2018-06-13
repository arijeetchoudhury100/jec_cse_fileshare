-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `asgn_solution`
--
USE project;
DROP TABLE IF EXISTS `asgn_solution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asgn_solution` (
  `asid` int(11) NOT NULL,
  `astitle` varchar(100) DEFAULT NULL,
  `aspath` varchar(100) DEFAULT NULL,
  `asdate` varchar(100) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`asid`),
  KEY `tid` (`tid`),
  CONSTRAINT `asgn_solution_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asgn_solution`
--

LOCK TABLES `asgn_solution` WRITE;
/*!40000 ALTER TABLE `asgn_solution` DISABLE KEYS */;
/*!40000 ALTER TABLE `asgn_solution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asgtemp`
--

DROP TABLE IF EXISTS `asgtemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asgtemp` (
  `tmpid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tmpid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asgtemp`
--

LOCK TABLES `asgtemp` WRITE;
/*!40000 ALTER TABLE `asgtemp` DISABLE KEYS */;
INSERT INTO `asgtemp` VALUES (13);
/*!40000 ALTER TABLE `asgtemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignments` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(100) NOT NULL,
  `adate` varchar(100) NOT NULL,
  `apath` varchar(100) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `tid` (`tid`),
  CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `nid` int(11) NOT NULL,
  `ntitle` varchar(100) DEFAULT NULL,
  `npath` varchar(100) DEFAULT NULL,
  `ndate` varchar(100) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`nid`),
  KEY `tid` (`tid`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `teacher` (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ntemp`
--

DROP TABLE IF EXISTS `ntemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ntemp` (
  `tmpid` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ntemp`
--

LOCK TABLES `ntemp` WRITE;
/*!40000 ALTER TABLE `ntemp` DISABLE KEYS */;
INSERT INTO `ntemp` VALUES (7);
/*!40000 ALTER TABLE `ntemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soltemp`
--

DROP TABLE IF EXISTS `soltemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soltemp` (
  `tempid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soltemp`
--

LOCK TABLES `soltemp` WRITE;
/*!40000 ALTER TABLE `soltemp` DISABLE KEYS */;
INSERT INTO `soltemp` VALUES (18);
/*!40000 ALTER TABLE `soltemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `roll` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  PRIMARY KEY (`roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('cs-02/15','Arijeet Choudhury','arijeetchoudhury100@gmail.com','abc123',6),('cs-40/15','Pankaj Singha','hacker@gmail.com','shivani',6);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submits`
--

DROP TABLE IF EXISTS `submits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submits` (
  `roll` varchar(10) DEFAULT NULL,
  `asid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submits`
--

LOCK TABLES `submits` WRITE;
/*!40000 ALTER TABLE `submits` DISABLE KEYS */;
/*!40000 ALTER TABLE `submits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `tname` varchar(100) DEFAULT NULL,
  `tpass` varchar(100) DEFAULT NULL,
  `tmail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1007,'Rupam Baruah','qwerty','hodcsejec@gmail.com');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp` (
  `id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp`
--

LOCK TABLES `temp` WRITE;
/*!40000 ALTER TABLE `temp` DISABLE KEYS */;
INSERT INTO `temp` VALUES (1007);
/*!40000 ALTER TABLE `temp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-13  3:55:01
