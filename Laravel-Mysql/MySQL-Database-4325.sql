-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel_learning
-- ------------------------------------------------------
-- Server version	5.7.44

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
-- Table structure for table `Country`
--

DROP TABLE IF EXISTS `Country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Country` (
  `CountryID` int(11) NOT NULL,
  `CountryName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CountryID`),
  UNIQUE KEY `CountryName` (`CountryName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Country`
--

LOCK TABLES `Country` WRITE;
/*!40000 ALTER TABLE `Country` DISABLE KEYS */;
INSERT INTO `Country` VALUES (4,'Australia'),(2,'Canada'),(3,'UK'),(1,'USA');
/*!40000 ALTER TABLE `Country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Passport`
--

DROP TABLE IF EXISTS `Passport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Passport` (
  `PassportID` int(11) NOT NULL,
  `PassportNumber` varchar(20) DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `PersonID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PassportID`),
  UNIQUE KEY `PassportNumber` (`PassportNumber`),
  UNIQUE KEY `PersonID` (`PersonID`),
  CONSTRAINT `Passport_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `Person` (`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Passport`
--

LOCK TABLES `Passport` WRITE;
/*!40000 ALTER TABLE `Passport` DISABLE KEYS */;
INSERT INTO `Passport` VALUES (1,'A1234567','2020-01-15','2030-01-14',1),(2,'B2345678','2019-05-10','2029-05-09',2),(3,'C3456789','2021-07-20','2031-07-19',3),(4,'C3456790','2021-07-30','2031-07-19',4);
/*!40000 ALTER TABLE `Passport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Person`
--

DROP TABLE IF EXISTS `Person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Person` (
  `PersonID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  PRIMARY KEY (`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Person`
--

LOCK TABLES `Person` WRITE;
/*!40000 ALTER TABLE `Person` DISABLE KEYS */;
INSERT INTO `Person` VALUES (1,'John','Doe','1985-06-15'),(2,'Jane','Smith','1990-09-22'),(3,'Alice','Johnson','1978-12-05'),(4,'Nguyen','Van A','1990-01-15');
/*!40000 ALTER TABLE `Person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PersonCountry`
--

DROP TABLE IF EXISTS `PersonCountry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PersonCountry` (
  `PersonID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `VisitDate` date DEFAULT NULL,
  PRIMARY KEY (`PersonID`,`CountryID`),
  KEY `CountryID` (`CountryID`),
  CONSTRAINT `PersonCountry_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `Person` (`PersonID`),
  CONSTRAINT `PersonCountry_ibfk_2` FOREIGN KEY (`CountryID`) REFERENCES `Country` (`CountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PersonCountry`
--

LOCK TABLES `PersonCountry` WRITE;
/*!40000 ALTER TABLE `PersonCountry` DISABLE KEYS */;
INSERT INTO `PersonCountry` VALUES (1,1,'2022-03-01'),(1,2,'2023-01-10'),(2,3,'2021-08-15'),(4,4,'2020-10-05');
/*!40000 ALTER TABLE `PersonCountry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visa`
--

DROP TABLE IF EXISTS `Visa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Visa` (
  `VisaID` int(11) NOT NULL,
  `VisaNumber` varchar(20) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `IssueDate` date DEFAULT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `PersonID` int(11) DEFAULT NULL,
  PRIMARY KEY (`VisaID`),
  UNIQUE KEY `VisaNumber` (`VisaNumber`),
  KEY `PersonID` (`PersonID`),
  CONSTRAINT `Visa_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `Person` (`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visa`
--

LOCK TABLES `Visa` WRITE;
/*!40000 ALTER TABLE `Visa` DISABLE KEYS */;
INSERT INTO `Visa` VALUES (1,'V123','USA','2022-03-01','2022-09-01',1),(2,'V124','Canada','2023-01-10','2023-07-10',1),(3,'V125','UK','2021-08-15','2022-02-15',2),(4,'V126','Australia','2020-10-05','2021-04-05',3);
/*!40000 ALTER TABLE `Visa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acc_transaction`
--

DROP TABLE IF EXISTS `acc_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acc_transaction` (
  `txn_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `funds_avail_date` datetime NOT NULL,
  `txn_date` datetime NOT NULL,
  `txn_type_cd` varchar(10) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `execution_branch_id` int(11) DEFAULT NULL,
  `teller_emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`txn_id`),
  KEY `acc_transaction_account_fk` (`account_id`),
  KEY `acc_transaction_branch_fk` (`execution_branch_id`),
  KEY `acc_transaction_employee_fk` (`teller_emp_id`),
  CONSTRAINT `acc_transaction_account_fk` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`),
  CONSTRAINT `acc_transaction_branch_fk` FOREIGN KEY (`execution_branch_id`) REFERENCES `branch` (`branch_id`),
  CONSTRAINT `acc_transaction_employee_fk` FOREIGN KEY (`teller_emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_transaction`
--

LOCK TABLES `acc_transaction` WRITE;
/*!40000 ALTER TABLE `acc_transaction` DISABLE KEYS */;
INSERT INTO `acc_transaction` VALUES (1,100,'2000-01-15 00:00:00','2000-01-15 00:00:00','cdt',1,NULL,NULL),(2,100,'2000-01-15 00:00:00','2000-01-15 00:00:00','cdt',2,NULL,NULL),(3,100,'2004-06-30 00:00:00','2004-06-30 00:00:00','cdt',3,NULL,NULL),(4,100,'2001-03-12 00:00:00','2001-03-12 00:00:00','cdt',4,NULL,NULL),(5,100,'2001-03-12 00:00:00','2001-03-12 00:00:00','cdt',5,NULL,NULL),(6,100,'2002-11-23 00:00:00','2002-11-23 00:00:00','cdt',7,NULL,NULL),(7,100,'2002-12-15 00:00:00','2002-12-15 00:00:00','cdt',8,NULL,NULL),(8,100,'2003-09-12 00:00:00','2003-09-12 00:00:00','cdt',10,NULL,NULL),(9,100,'2000-01-15 00:00:00','2000-01-15 00:00:00','cdt',11,NULL,NULL),(10,100,'2004-09-30 00:00:00','2004-09-30 00:00:00','cdt',12,NULL,NULL),(11,100,'2004-01-27 00:00:00','2004-01-27 00:00:00','cdt',13,NULL,NULL),(12,100,'2002-08-24 00:00:00','2002-08-24 00:00:00','cdt',14,NULL,NULL),(13,100,'2004-12-28 00:00:00','2004-12-28 00:00:00','cdt',15,NULL,NULL),(14,100,'2004-01-12 00:00:00','2004-01-12 00:00:00','cdt',17,NULL,NULL),(15,100,'2001-05-23 00:00:00','2001-05-23 00:00:00','cdt',18,NULL,NULL),(16,100,'2001-05-23 00:00:00','2001-05-23 00:00:00','cdt',19,NULL,NULL),(17,100,'2003-07-30 00:00:00','2003-07-30 00:00:00','cdt',21,NULL,NULL),(18,100,'2004-10-28 00:00:00','2004-10-28 00:00:00','cdt',22,NULL,NULL),(19,100,'2004-06-30 00:00:00','2004-06-30 00:00:00','cdt',23,NULL,NULL),(20,100,'2002-09-30 00:00:00','2002-09-30 00:00:00','cdt',24,NULL,NULL),(21,100,'2003-07-30 00:00:00','2003-07-30 00:00:00','cdt',28,NULL,NULL);
/*!40000 ALTER TABLE `acc_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `avail_balance` float DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `last_activity_date` date DEFAULT NULL,
  `open_date` date NOT NULL,
  `pending_balance` float DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `open_branch_id` int(11) NOT NULL,
  `open_emp_id` int(11) NOT NULL,
  `product_cd` varchar(10) NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `account_customer_fk` (`cust_id`),
  KEY `account_branch_fk` (`open_branch_id`),
  KEY `account_employee_fk` (`open_emp_id`),
  KEY `account_product_fk` (`product_cd`),
  CONSTRAINT `account_branch_fk` FOREIGN KEY (`open_branch_id`) REFERENCES `branch` (`branch_id`),
  CONSTRAINT `account_customer_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  CONSTRAINT `account_employee_fk` FOREIGN KEY (`open_emp_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `account_product_fk` FOREIGN KEY (`product_cd`) REFERENCES `product` (`product_cd`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,1057.75,NULL,'2005-01-04','2000-01-15',1057.75,'active',1,2,10,'chk'),(2,500,NULL,'2004-12-19','2000-01-15',500,'active',1,2,10,'sav'),(3,3000,NULL,'2004-06-30','2004-06-30',3000,'active',1,2,10,'cd'),(4,2258.02,NULL,'2004-12-27','2001-03-12',2258.02,'active',2,2,10,'chk'),(5,200,NULL,'2004-12-11','2001-03-12',200,'active',2,2,10,'sav'),(7,1057.75,NULL,'2004-11-30','2002-11-23',1057.75,'active',3,3,13,'chk'),(8,2212.5,NULL,'2004-12-05','2002-12-15',2212.5,'active',3,3,13,'mm'),(10,534.12,NULL,'2005-01-03','2003-09-12',534.12,'active',4,1,1,'chk'),(11,767.77,NULL,'2004-10-24','2000-01-15',767.77,'active',4,1,1,'sav'),(12,5487.09,NULL,'2004-11-11','2004-09-30',5487.09,'active',4,1,1,'mm'),(13,2237.97,NULL,'2005-01-05','2004-01-27',2897.97,'active',5,4,16,'chk'),(14,122.37,NULL,'2004-11-29','2002-08-24',122.37,'active',6,1,1,'chk'),(15,10000,NULL,'2004-12-28','2004-12-28',10000,'active',6,1,1,'cd'),(17,5000,NULL,'2004-01-12','2004-01-12',5000,'active',7,2,10,'cd'),(18,3487.19,NULL,'2005-01-03','2001-05-23',3487.19,'active',8,4,16,'chk'),(19,387.99,NULL,'2004-10-12','2001-05-23',387.99,'active',8,4,16,'sav'),(21,125.67,NULL,'2004-12-15','2003-07-30',125.67,'active',9,1,1,'chk'),(22,9345.55,NULL,'2004-10-28','2004-10-28',9845.55,'active',9,1,1,'mm'),(23,1500,NULL,'2004-06-30','2004-06-30',1500,'active',9,1,1,'cd'),(24,23575.1,NULL,'2004-12-15','2002-09-30',23575.1,'active',10,4,16,'chk'),(25,0,NULL,'2004-08-28','2002-10-01',0,'active',10,4,16,'bus'),(27,9345.55,NULL,'2004-11-14','2004-03-22',9345.55,'active',11,2,10,'bus'),(28,38552.1,NULL,'2004-12-15','2003-07-30',38552.1,'active',12,4,16,'chk'),(29,50000,NULL,'2004-12-17','2004-02-22',50000,'active',13,3,13,'sbl');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `state` varchar(10) DEFAULT NULL,
  `zip_code` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'3882 main st.','waltham','headquarters','ma','02451'),(2,'422 maple st.','woburn','woburn branch','ma','01801'),(3,'125 presidential way','quincy','quincy branch','ma','02169'),(4,'378 maynard ln.','salem','so. nh branch','nh','03079');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business` (
  `incorp_date` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` varchar(10) NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  CONSTRAINT `business_employee_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES ('1995-05-01','chilton engineering','12-345-678',10),('2001-01-01','northeast cooling inc.','23-456-789',11),('2002-06-30','superior auto body','34-567-890',12),('1999-05-01','aaa insurance inc.','45-678-901',13);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `cust_type_cd` varchar(1) NOT NULL,
  `fed_id` varchar(12) NOT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'47 mockingbird ln','lynnfield','i','111-11-1111','01940','ma'),(2,'372 clearwater blvd','woburn','i','222-22-2222','01801','ma'),(3,'18 jessup rd','quincy','i','333-33-3333','02169','ma'),(4,'12 buchanan ln','waltham','i','444-44-4444','02451','ma'),(5,'2341 main st','salem','i','555-55-5555','03079','nh'),(6,'12 blaylock ln','waltham','i','666-66-6666','02451','ma'),(7,'29 admiral ln','wilmington','i','777-77-7777','01887','ma'),(8,'472 freedom rd','salem','i','888-88-8888','03079','nh'),(9,'29 maple st','newton','i','999-99-9999','02458','ma'),(10,'7 industrial way','salem','b','04-1111111','03079','nh'),(11,'287a corporate ave','wilmington','b','04-2222222','01887','ma'),(12,'789 main st','salem','b','04-3333333','03079','nh'),(13,'4772 presidential way','quincy','b','04-4444444','02169','ma');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'operations'),(2,'loans'),(3,'administration'),(4,'it');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `end_date` date DEFAULT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `assigned_branch_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `superior_emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `employee_branch_fk` (`assigned_branch_id`),
  KEY `employee_department_fk` (`dept_id`),
  KEY `employee_employee_fk` (`superior_emp_id`),
  CONSTRAINT `employee_branch_fk` FOREIGN KEY (`assigned_branch_id`) REFERENCES `branch` (`branch_id`),
  CONSTRAINT `employee_department_fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  CONSTRAINT `employee_employee_fk` FOREIGN KEY (`superior_emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,NULL,'michael','smith','2001-06-22','president',1,3,NULL),(2,NULL,'susan','barker','2002-09-12','vice president',1,3,1),(3,NULL,'robert','tyler','2000-02-09','treasurer',1,3,1),(4,NULL,'susan','hawthorne','2002-04-24','operations manager',1,1,3),(5,NULL,'john','gooding','2003-11-14','loan manager',1,2,4),(6,NULL,'helen','fleming','2004-03-17','head teller',1,1,4),(7,NULL,'chris','tucker','2004-09-15','teller',1,1,6),(8,NULL,'sarah','parker','2002-12-02','teller',1,1,6),(9,NULL,'jane','grossman','2002-05-03','teller',1,1,6),(10,NULL,'paula','roberts','2002-07-27','head teller',2,1,4),(11,NULL,'thomas','ziegler','2000-10-23','teller',2,1,10),(12,NULL,'samantha','jameson','2003-01-08','teller',2,1,10),(13,NULL,'john','blake','2000-05-11','head teller',3,1,4),(14,NULL,'cindy','mason','2002-08-09','teller',3,1,13),(15,NULL,'frank','portman','2003-04-01','teller',3,1,13),(16,NULL,'theresa','markham','2001-03-15','head teller',4,1,4),(17,NULL,'beth','fowler','2002-06-29','teller',4,1,16),(18,NULL,'rick','tulman','2002-12-12','teller',4,1,16);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `individual`
--

DROP TABLE IF EXISTS `individual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `individual` (
  `birth_date` date DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`),
  CONSTRAINT `individual_customer_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `individual`
--

LOCK TABLES `individual` WRITE;
/*!40000 ALTER TABLE `individual` DISABLE KEYS */;
INSERT INTO `individual` VALUES ('1972-04-22','james','hadley',1),('1968-08-15','susan','tingley',2),('1958-02-06','frank','tucker',3),('1966-12-22','john','hayward',4),('1971-08-25','charles','frasier',5),('1962-09-14','john','spencer',6),('1947-03-19','margaret','young',7),('1977-07-01','louis','blake',8),('1968-06-16','richard','farley',9);
/*!40000 ALTER TABLE `individual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `officer`
--

DROP TABLE IF EXISTS `officer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `officer` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `end_date` date DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `cust_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `officer_customer_fk` (`cust_id`),
  CONSTRAINT `officer_customer_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `officer`
--

LOCK TABLES `officer` WRITE;
/*!40000 ALTER TABLE `officer` DISABLE KEYS */;
INSERT INTO `officer` VALUES (1,NULL,'john','chilton','1995-05-01','president',10),(2,NULL,'paul','hardy','2001-01-01','president',11),(3,NULL,'carl','lutz','2002-06-30','president',12),(4,NULL,'stanley','cheswick','1999-05-01','president',13);
/*!40000 ALTER TABLE `officer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `product_cd` varchar(10) NOT NULL,
  `date_offered` date DEFAULT NULL,
  `date_retired` date DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `product_type_cd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_cd`),
  KEY `product_product_type_fk` (`product_type_cd`),
  CONSTRAINT `product_product_type_fk` FOREIGN KEY (`product_type_cd`) REFERENCES `product_type` (`product_type_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('aut','2000-01-01',NULL,'auto loan','loan'),('bus','2000-01-01',NULL,'business line of credit','loan'),('cd','2000-01-01',NULL,'certificate of deposit','account'),('chk','2000-01-01',NULL,'checking account','account'),('mm','2000-01-01',NULL,'money market account','account'),('mrt','2000-01-01',NULL,'home mortgage','loan'),('sav','2000-01-01',NULL,'savings account','account'),('sbl','2000-01-01',NULL,'small business loan','loan');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_type` (
  `product_type_cd` varchar(255) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`product_type_cd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type`
--

LOCK TABLES `product_type` WRITE;
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` VALUES ('account','customer accounts'),('insurance','insurance offerings'),('loan','individual and business loans');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-04 23:36:52
