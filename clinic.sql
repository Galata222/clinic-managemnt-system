-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: clinic
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `tbl_admission_examination`
--

DROP TABLE IF EXISTS `tbl_admission_examination`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_admission_examination` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fk_patient_id` varchar(45) DEFAULT NULL,
  `hrs` decimal(10,0) DEFAULT NULL,
  `rr` decimal(10,1) DEFAULT NULL,
  `systolic` decimal(10,1) DEFAULT NULL,
  `diastolic` decimal(10,1) DEFAULT NULL,
  `systolic2` decimal(10,1) DEFAULT NULL,
  `diastolic2` decimal(10,1) DEFAULT NULL,
  `temp` decimal(10,2) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `muac` decimal(10,2) DEFAULT NULL,
  `heightfundus` decimal(10,2) DEFAULT NULL,
  `descent` tinyint(1) DEFAULT NULL,
  `cervix` decimal(10,2) DEFAULT NULL,
  `abdoscar` tinyint(1) DEFAULT NULL,
  `fhr` int DEFAULT NULL,
  `mraptured` tinyint(1) DEFAULT NULL,
  `timerom` time DEFAULT NULL,
  `liquor` tinyint(1) DEFAULT NULL,
  `ve_findings` varchar(455) DEFAULT NULL,
  `admited` tinyint(1) DEFAULT NULL,
  `rswab` tinyint(1) DEFAULT NULL,
  `rswabreason` varchar(20) DEFAULT NULL,
  `tswab` time DEFAULT NULL,
  `examinitials` varchar(20) DEFAULT NULL,
  `date_exam` date DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(30) DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rom_duration_days` varchar(20) DEFAULT NULL,
  `rom_duration_hrs` varchar(20) DEFAULT NULL,
  `fhr_not_done` tinyint(1) DEFAULT NULL,
  `pres` tinyint(1) DEFAULT NULL,
  `admitted_by` varchar(45) DEFAULT NULL,
  `position` tinyint(1) DEFAULT NULL COMMENT 'Left OA(LOA), Right OA(ROA)',
  `abnormalities` varchar(345) DEFAULT NULL,
  `spleen` varchar(345) DEFAULT NULL,
  `extgenitals` varchar(345) DEFAULT NULL,
  `vdischarge` varchar(345) DEFAULT NULL,
  `tpr` varchar(20) DEFAULT NULL,
  `fk_doctor` int DEFAULT NULL,
  `fw_ini` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patients_id_idx` (`fk_patient_id`),
  KEY `fk_patients_id_references_idx` (`fk_patient_id`),
  CONSTRAINT `fk_patients_id_references` FOREIGN KEY (`fk_patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admission_examination`
--

LOCK TABLES `tbl_admission_examination` WRITE;
/*!40000 ALTER TABLE `tbl_admission_examination` DISABLE KEYS */;
INSERT INTO `tbl_admission_examination` VALUES (1,'123',3,3.0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,'','2023-06-14','','2023-06-28 21:00:00','',NULL,'','',NULL,NULL,'',NULL,'','','','','',NULL,NULL,NULL),(2,'123',NULL,67.0,98.0,88.0,NULL,NULL,NULL,3.00,4.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,'','2023-06-16',NULL,NULL,'',NULL,'','',NULL,NULL,'',NULL,'','','','','',NULL,NULL,NULL),(6,'123',90,67.0,98.0,88.0,56.0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,'','2023-06-29','OlanaWaqwaya','2023-06-21 21:00:00','Olana Waqwaya',NULL,'','',NULL,NULL,'',NULL,'','','','','',NULL,NULL,NULL),(7,'123',3,3.0,98.0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,'',NULL,'',NULL,'Olana Waqwaya',NULL,'',NULL,'','',NULL,NULL,'',NULL,'','','','','',15,NULL,NULL);
/*!40000 ALTER TABLE `tbl_admission_examination` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_costs_per_service`
--

DROP TABLE IF EXISTS `tbl_costs_per_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_costs_per_service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_patient_id` varchar(45) DEFAULT NULL,
  `reason` text,
  `cost` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patients_id_referenceed_idx` (`fk_patient_id`),
  CONSTRAINT `fk_patients_id_referenceed` FOREIGN KEY (`fk_patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_costs_per_service`
--

LOCK TABLES `tbl_costs_per_service` WRITE;
/*!40000 ALTER TABLE `tbl_costs_per_service` DISABLE KEYS */;
INSERT INTO `tbl_costs_per_service` VALUES (1,'123','Doctor Consultancy fee , Lab Examination fees',34.5),(2,'123','Doctor Consultancy fee , Lab Examination fees',89),(3,'123','Doctor Consultancy fee , Lab Examination fees',33),(4,'123','Lab Examination fees , Medicine fees',89),(5,'123','Lab Examination fees , Medicine fees',89);
/*!40000 ALTER TABLE `tbl_costs_per_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_drug`
--

DROP TABLE IF EXISTS `tbl_drug`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_drug` (
  `id` int NOT NULL,
  `drug_name` varchar(45) DEFAULT NULL,
  `drug_cost` double DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_drug`
--

LOCK TABLES `tbl_drug` WRITE;
/*!40000 ALTER TABLE `tbl_drug` DISABLE KEYS */;
INSERT INTO `tbl_drug` VALUES (123,'Amoxylin',34.5,'2023-06-08 00:00:00',1),(345,'ibuprofin',45.3,'2023-06-09 00:00:00',3),(678,'Diclocytiin',556,'2023-06-22 00:00:00',2);
/*!40000 ALTER TABLE `tbl_drug` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_drug_form`
--

DROP TABLE IF EXISTS `tbl_drug_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_drug_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `form` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_drug_form`
--

LOCK TABLES `tbl_drug_form` WRITE;
/*!40000 ALTER TABLE `tbl_drug_form` DISABLE KEYS */;
INSERT INTO `tbl_drug_form` VALUES (1,'Tablets'),(2,'Capsules'),(3,'Liquids'),(4,'Injections'),(5,'Inhalers'),(6,'Topical Creams'),(7,'Suppositories'),(8,'Transdermal Patches'),(9,'Powders'),(10,'Sublingual/Buccal Tablets');
/*!40000 ALTER TABLE `tbl_drug_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_image`
--

DROP TABLE IF EXISTS `tbl_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_image` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_image`
--

LOCK TABLES `tbl_image` WRITE;
/*!40000 ALTER TABLE `tbl_image` DISABLE KEYS */;
INSERT INTO `tbl_image` VALUES (1,'doctor.jpg'),(2,'digital.jpg'),(3,'family.jpg');
/*!40000 ALTER TABLE `tbl_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_request`
--

DROP TABLE IF EXISTS `tbl_lab_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_doctor` varchar(45) DEFAULT NULL,
  `fk_lab_test_type` int DEFAULT NULL,
  `fk_test_item` varchar(45) DEFAULT NULL,
  `requests` text,
  `date_entry` date DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  `fk_patient` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_lab_tests_type_idx` (`fk_lab_test_type`),
  KEY `fk_lab_tests_types_idx` (`fk_lab_test_type`),
  KEY `fk_lab_tests_items_idx` (`fk_test_item`),
  KEY `fk_patients_id_refer_idx` (`fk_patient`),
  CONSTRAINT `fk_lab_tests_items` FOREIGN KEY (`fk_test_item`) REFERENCES `tbl_test_item` (`id`),
  CONSTRAINT `fk_lab_tests_types` FOREIGN KEY (`fk_lab_test_type`) REFERENCES `tbl_lab_test_type` (`id`),
  CONSTRAINT `fk_patients_id_refer` FOREIGN KEY (`fk_patient`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_request`
--

LOCK TABLES `tbl_lab_request` WRITE;
/*!40000 ALTER TABLE `tbl_lab_request` DISABLE KEYS */;
INSERT INTO `tbl_lab_request` VALUES (46,'321',1,NULL,'VDRL/RPR, TriglyCeride','2023-06-05','2023-06-13 18:35:25',NULL,'123');
/*!40000 ALTER TABLE `tbl_lab_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_result`
--

DROP TABLE IF EXISTS `tbl_lab_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_result` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_lab_test_type` int DEFAULT NULL,
  `fk_test_item` varchar(45) DEFAULT NULL,
  `fk_patient_id` varchar(45) DEFAULT NULL,
  `result` text,
  `date_entry` date DEFAULT NULL COMMENT 'date record created',
  `fk_lab_tech` int DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date record last updated',
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_test_type_refer_idx` (`fk_lab_test_type`),
  KEY `fk_test_item_idx` (`fk_test_item`),
  KEY `fk_test_itemm_id_idx` (`fk_test_item`),
  KEY `patient_id_references_idx` (`fk_patient_id`),
  CONSTRAINT `fk_lab_test_type` FOREIGN KEY (`fk_lab_test_type`) REFERENCES `tbl_lab_test_type` (`id`),
  CONSTRAINT `fk_test_itemm_id` FOREIGN KEY (`fk_test_item`) REFERENCES `tbl_test_item` (`id`),
  CONSTRAINT `patient_id_references` FOREIGN KEY (`fk_patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_result`
--

LOCK TABLES `tbl_lab_result` WRITE;
/*!40000 ALTER TABLE `tbl_lab_result` DISABLE KEYS */;
INSERT INTO `tbl_lab_result` VALUES (1,3,'1','123','graham negative bacteria','2023-06-15',NULL,'2023-06-14 06:47:34',NULL);
/*!40000 ALTER TABLE `tbl_lab_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_sample`
--

DROP TABLE IF EXISTS `tbl_lab_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_sample` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_specimen` int DEFAULT NULL,
  `fk_patient` varchar(45) DEFAULT NULL,
  `specimen_source` varchar(50) DEFAULT NULL,
  `adm_sample` char(1) DEFAULT NULL,
  `sample_designation` varchar(50) DEFAULT NULL,
  `originated_from` varchar(50) DEFAULT NULL,
  `vol_brought` float(10,2) DEFAULT NULL,
  `vol_brought_unit` varchar(30) DEFAULT NULL,
  `date_brought` date DEFAULT NULL,
  `time_brought` time DEFAULT NULL,
  `lab_tech_ini` varchar(20) DEFAULT NULL,
  `csf_venesector` varchar(50) DEFAULT NULL,
  `remarks` text,
  `rejected_reason` varchar(500) DEFAULT NULL,
  `reason_not_collected` varchar(500) DEFAULT NULL,
  `date_collect` date DEFAULT NULL COMMENT 'Date the sample was collected.',
  `time_collect` time DEFAULT NULL COMMENT 'Time the sample was collected',
  `creation_time` datetime DEFAULT NULL COMMENT 'Time this record was created.',
  `creation_name` varchar(50) DEFAULT NULL COMMENT 'AD username of record creator.',
  `sample_collected` enum('y','n','r') DEFAULT NULL COMMENT 'Whether or not the sample has been received or received and rejected.',
  `date_created` date DEFAULT NULL COMMENT 'date record created',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `urine_dipstick` text,
  `reject_specify` varchar(200) DEFAULT NULL,
  `time_point` varchar(30) DEFAULT NULL,
  `sample_collection_dtl` text COMMENT 'sample collection details upon collecting from site.',
  `sample_receive_status` varchar(100) DEFAULT NULL COMMENT 'status of sample at reception. this should be enumerated.',
  `gram_stain` text,
  PRIMARY KEY (`id`),
  KEY `fk_speciemen_idx` (`fk_specimen`),
  KEY `fk_pateint_id_idx` (`fk_patient`),
  CONSTRAINT `fk_pateint_id` FOREIGN KEY (`fk_patient`) REFERENCES `tbl_patient` (`patient_id`),
  CONSTRAINT `fk_speciemen` FOREIGN KEY (`fk_specimen`) REFERENCES `tbl_lab_specimen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_sample`
--

LOCK TABLES `tbl_lab_sample` WRITE;
/*!40000 ALTER TABLE `tbl_lab_sample` DISABLE KEYS */;
INSERT INTO `tbl_lab_sample` VALUES (1,2,'123','mouth','2','ldd','mouth',11.00,'m','2023-06-15','02:00:00','123','da','I donnow','not','not','2023-06-16','02:30:00',NULL,'youdo','n','2023-06-30','2023-06-14 06:32:23','feoadhg','shouf','2:30:00','djakl','daj','positive');
/*!40000 ALTER TABLE `tbl_lab_sample` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_specimen`
--

DROP TABLE IF EXISTS `tbl_lab_specimen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_specimen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pk_specimen_id` int DEFAULT NULL,
  `patient_id` varchar(45) DEFAULT NULL,
  `comment` text,
  `venesector_id` varchar(50) DEFAULT NULL,
  `weight_before` float(6,2) DEFAULT NULL,
  `weight_after` float(6,2) DEFAULT NULL,
  `weight_diff` float(6,2) DEFAULT NULL,
  `date_processed` date DEFAULT NULL,
  `time_processed` time DEFAULT NULL,
  `date_signal` date DEFAULT NULL,
  `time_signal` time DEFAULT NULL,
  `time_positivity` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sterile_site` varchar(50) DEFAULT NULL,
  `volume` float(8,2) DEFAULT NULL,
  `units` varchar(2) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL COMMENT 'date record created',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_point` varchar(20) DEFAULT NULL COMMENT 'time point for specimen to extracts',
  `end_date_processed` date DEFAULT NULL,
  `end_time_processed` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patients_key_idx` (`patient_id`),
  CONSTRAINT `fk_patients_key` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_specimen`
--

LOCK TABLES `tbl_lab_specimen` WRITE;
/*!40000 ALTER TABLE `tbl_lab_specimen` DISABLE KEYS */;
INSERT INTO `tbl_lab_specimen` VALUES (1,232,'123','some comments','342',22.00,12.00,10.00,'2023-06-21',NULL,'2023-06-22','10:00:00','no','dfa',33.00,'12','2023-06-21 00:00:00','2023-06-13 19:25:08','were','2023-06-14',NULL),(2,342,'123','some coments','342',22.00,12.00,10.00,'2023-05-31',NULL,'2023-06-29','10:00:00','no','dfa',33.00,'12','2023-06-29 00:00:00','2023-06-13 19:37:43','were','2023-06-22',NULL);
/*!40000 ALTER TABLE `tbl_lab_specimen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_test`
--

DROP TABLE IF EXISTS `tbl_lab_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pk_test_id` int DEFAULT NULL,
  `fk_test_type` int DEFAULT NULL,
  `fk_specimen` int DEFAULT NULL,
  `fk_patient` varchar(45) DEFAULT NULL,
  `fk_result` int DEFAULT NULL,
  `date_done` timestamp NULL DEFAULT NULL,
  `date_created` date DEFAULT NULL COMMENT 'date record created',
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `result_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_test_type_idx` (`fk_test_type`),
  KEY `fk_specimen_refer_idx` (`fk_specimen`),
  KEY `fk_patientt_idd_idx` (`fk_patient`),
  KEY `fk_result_id_idx` (`fk_result`),
  CONSTRAINT `fk_patientt_idd` FOREIGN KEY (`fk_patient`) REFERENCES `tbl_patient` (`patient_id`),
  CONSTRAINT `fk_result_id` FOREIGN KEY (`fk_result`) REFERENCES `tbl_lab_result` (`id`),
  CONSTRAINT `fk_specimen_refer` FOREIGN KEY (`fk_specimen`) REFERENCES `tbl_lab_specimen` (`id`),
  CONSTRAINT `fk_test_type` FOREIGN KEY (`fk_test_type`) REFERENCES `tbl_lab_test_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_test`
--

LOCK TABLES `tbl_lab_test` WRITE;
/*!40000 ALTER TABLE `tbl_lab_test` DISABLE KEYS */;
INSERT INTO `tbl_lab_test` VALUES (1,123,1,1,'123',NULL,'2023-06-21 21:00:00','2023-06-22','2023-06-14 06:39:24','2023-06-21 21:00:00');
/*!40000 ALTER TABLE `tbl_lab_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lab_test_type`
--

DROP TABLE IF EXISTS `tbl_lab_test_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lab_test_type` (
  `id` int NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `fk_item` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_test_item_idx` (`fk_item`),
  CONSTRAINT `fk_test_item` FOREIGN KEY (`fk_item`) REFERENCES `tbl_test_item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lab_test_type`
--

LOCK TABLES `tbl_lab_test_type` WRITE;
/*!40000 ALTER TABLE `tbl_lab_test_type` DISABLE KEYS */;
INSERT INTO `tbl_lab_test_type` VALUES (1,'Serology','1,2,3,4,5,6,7,8,9,10',NULL),(2,'Hematology','4,5',NULL),(3,'Urinalysis','5,6',NULL),(4,'Clinical Chemistry','11,12,13,14,15,16,17,18,19,20,21,22,23',NULL),(5,'Miscrocopy',NULL,NULL),(6,'Semen Analysis',NULL,NULL),(7,'Bacteriology',NULL,NULL),(8,'Stool Examination',NULL,NULL),(9,'Body Fluid Analysis',NULL,NULL),(10,'Hormone',NULL,NULL),(11,'covid','5,6',NULL);
/*!40000 ALTER TABLE `tbl_lab_test_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_patient`
--

DROP TABLE IF EXISTS `tbl_patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `phone_no` varchar(45) NOT NULL,
  `age` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `occupation` varchar(45) NOT NULL,
  `status` int DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `kebele` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patient_id_UNIQUE` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_patient`
--

LOCK TABLES `tbl_patient` WRITE;
/*!40000 ALTER TABLE `tbl_patient` DISABLE KEYS */;
INSERT INTO `tbl_patient` VALUES (2,'123','Kuma','Tola','+251945675432','23','M','Farmer',2,'Oromya','shewa','Ambo','01','2023-06-09 13:34:54'),(3,'342','Hayu','Kitessa','+251906129484','42','M','student',2,'SSNR','Walyita','Arba minchi','01','2023-06-09 13:34:54'),(4,'8766','Galata','Waqwaya','+251961623562','44','M','Student',2,'','Wallaga','Harar','80','2023-06-09 13:34:54'),(5,'321','Gamachu','Tola','+251961623562','56','F','student',2,'Sidama','Walyita','Arba minchi','01','2023-06-09 13:34:54'),(6,'453','Hayu','Kitessa','+251906129484','42','M','Student',2,'SSNR','Walyita','Arba minchi','01','2023-06-09 13:34:54'),(7,'778','Chala','Amanu','+251961623562','87','M','Teacher',2,'Somale','Buye','Jigjiga','098','2023-06-09 13:34:54'),(8,'0982','Fufa','Wakgari','+251939349034','23','M','Student',2,'Benshangul','Wallaga','Nedjo','09','2023-06-09 13:34:54'),(9,'564','Ayantu','Daba','+251987654321','56','F','pharmacist',2,'SSNR','wallaga','Ambo','098','2023-06-09 13:34:54'),(10,'563','Fufa','Nago','+251961623562','89','M','Student',2,'SSNR','Wallaga','Harar','09','2023-06-09 13:34:54'),(11,'443','Galata','Waqwaya','+251961623562','87','M','pharmacist',2,'Sidama','Walyita','Harar','09','2023-06-09 13:35:59'),(12,'543','Kuma','Tola','+251945675432','44','F','Student',2,'Oromya','shewa','Ambo','09','2023-06-14 10:50:40'),(13,'34','Moti','Namo','+251961623562','44','M','student',2,'Addis Ababa','Walyita','Harar','098','2023-06-14 10:53:34'),(14,'1231','Galata','Waqwaya','+251961623562','42','F','Farmer',0,'Afar','Walyita','Harar','098','2023-06-14 11:06:26'),(15,'3421','Galata','Waqwaya','+251961623562','56','M','Student',0,'Afar','Wallaga','Harar','098','2023-06-14 11:21:08');
/*!40000 ALTER TABLE `tbl_patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_price` double DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `patient_id` varchar(45) NOT NULL,
  `account_id` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  `payment_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id_refer_idx` (`patient_id`),
  CONSTRAINT `patient_id_refer` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment`
--

LOCK TABLES `tbl_payment` WRITE;
/*!40000 ALTER TABLE `tbl_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_permission`
--

DROP TABLE IF EXISTS `tbl_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_permission` (
  `id` varchar(45) NOT NULL,
  `task` varchar(45) DEFAULT NULL,
  `fk_roles` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roles_idx` (`fk_roles`),
  CONSTRAINT `fk_roles` FOREIGN KEY (`fk_roles`) REFERENCES `tbl_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_permission`
--

LOCK TABLES `tbl_permission` WRITE;
/*!40000 ALTER TABLE `tbl_permission` DISABLE KEYS */;
INSERT INTO `tbl_permission` VALUES ('1','Activate Account','1'),('10','Lab Request','3'),('11','Lab Report','5'),('12','Give Medicine','6'),('2','Deactivate Account','1'),('3','Prescribe','3'),('4','Make Appointment','3'),('5','Assign Bed','7'),('6','Create Medical History','3'),('7','Add Payment','2,3,4,5,6'),('8','Register Patient','4'),('9','Queue Patient','4');
/*!40000 ALTER TABLE `tbl_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_prescription`
--

DROP TABLE IF EXISTS `tbl_prescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_prescription` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_drug` int NOT NULL,
  `patient_id` varchar(45) NOT NULL,
  `strength` varchar(45) DEFAULT NULL,
  `dosage` varchar(45) DEFAULT NULL,
  `form` varchar(45) DEFAULT NULL,
  `frequency` double DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `how_to_use` text,
  `other_info` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `doctor_id` varchar(45) DEFAULT NULL,
  `pharmacist_id` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `patient_type` varchar(45) DEFAULT NULL,
  `prescribed_date` datetime NOT NULL,
  `fk_admissinon_exam_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_drug_refer_idx` (`fk_drug`),
  KEY `fk_patients_id_idx` (`patient_id`),
  CONSTRAINT `fk_drug_refer` FOREIGN KEY (`fk_drug`) REFERENCES `tbl_drug` (`id`),
  CONSTRAINT `fk_patients_id` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_prescription`
--

LOCK TABLES `tbl_prescription` WRITE;
/*!40000 ALTER TABLE `tbl_prescription` DISABLE KEYS */;
INSERT INTO `tbl_prescription` VALUES (1,123,'123','345','3dosage','1',2,3,2,'morning and evening','',33,NULL,NULL,NULL,'','2023-06-15 00:00:00',1),(2,345,'123','78mg/l','3dosage','3',2,3,2,'www','ss',33,NULL,NULL,1,'op','2023-06-22 00:00:00',1),(3,345,'123','78mg/l','3dosage','1',2,3,2,'dsdhKDH','overdose risk',4.5,NULL,NULL,1,'op','2023-06-15 00:00:00',1);
/*!40000 ALTER TABLE `tbl_prescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_reason_services`
--

DROP TABLE IF EXISTS `tbl_reason_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_reason_services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `services` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_reason_services`
--

LOCK TABLES `tbl_reason_services` WRITE;
/*!40000 ALTER TABLE `tbl_reason_services` DISABLE KEYS */;
INSERT INTO `tbl_reason_services` VALUES (1,'Registration Fee'),(2,'Doctor Consultancy fee'),(3,'Lab Examination fees'),(4,'Medicine fees');
/*!40000 ALTER TABLE `tbl_reason_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_roles` (
  `id` varchar(45) NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_roles`
--

LOCK TABLES `tbl_roles` WRITE;
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` VALUES ('1','Admin'),('2','Accountant'),('3','Doctor'),('4','Receptionist'),('5','Lab Technician'),('6','Pharmacist'),('7','Nurse');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_test_item`
--

DROP TABLE IF EXISTS `tbl_test_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_test_item` (
  `id` varchar(45) NOT NULL,
  `item` varchar(45) DEFAULT NULL,
  `normal_range` varchar(45) DEFAULT NULL,
  `range` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_test_item`
--

LOCK TABLES `tbl_test_item` WRITE;
/*!40000 ALTER TABLE `tbl_test_item` DISABLE KEYS */;
INSERT INTO `tbl_test_item` VALUES ('1','VDRL/RPR',NULL,NULL),('10','Urine HCG',NULL,NULL),('11','FBS/RBS','13-43 mg/dl',NULL),('12','Creatinine','13-43 U/L',NULL),('13','BUN',NULL,NULL),('14','SGOT',NULL,NULL),('15','SGPT',NULL,NULL),('16','ALP',NULL,NULL),('17','Bilirubin D',NULL,NULL),('18','Bilirubin T',NULL,NULL),('19','Total Protein',NULL,NULL),('2','PITC(VCT)',NULL,NULL),('20','Albumin',NULL,NULL),('21','Uric acid',NULL,NULL),('22','Cholestrol',NULL,NULL),('23','TriglyCeride',NULL,NULL),('3','HBsAG',NULL,NULL),('4','HCV',NULL,NULL),('5','H.Pylori(Ab)',NULL,NULL),('6','Widal O and H',NULL,NULL),('7','Wieldfilex ox19',NULL,NULL),('8','RF',NULL,NULL),('9','ASO',NULL,NULL);
/*!40000 ALTER TABLE `tbl_test_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone_no` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `fk_role` int DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `authoKey` varchar(45) DEFAULT NULL,
  `accessToken` varchar(45) DEFAULT NULL,
  `profile_pictucre` varchar(100) DEFAULT NULL,
  `oldpassword` varchar(100) DEFAULT NULL,
  `newpassword` varchar(100) DEFAULT NULL,
  `confirm_pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role_refer_idx` (`fk_role`),
  CONSTRAINT `fk_role_refer` FOREIGN KEY (`fk_role`) REFERENCES `tbl_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (12,'783','Bule','bule@gmail.com','Bule','Dejene','+251943235678','Jaldu',NULL,'$2y$13$c3uXOhiv30M37mml3gG3Q.jmfP30mqk6JvalkDCikeeS0eSWAthK.','Doctor',2,NULL,NULL,NULL,NULL,NULL,NULL),(13,'9008','ayuko','ayu@gmail.com','Ayantu','Daba','+251987654321','Bako',NULL,'$2y$13$OtfGQIx0fq1WClYNfBsgNenkLAgXA7tDCISHojTSqtDnCFcrGBAs.','Pharmacist',2,NULL,NULL,NULL,NULL,NULL,NULL),(14,'5644','hayuko','hayu@gmail.com','Hayu','Kitessa','+251906129484','Arsi',NULL,'$2y$13$B0BjUDm.NuCeyoK93.3Y2u9Y7yUJ80OeWrKhFN7Ng2GBXhhaONXsi','Pharmacist',2,NULL,NULL,NULL,NULL,NULL,NULL),(15,'321','oli','oli@gmail.com','Olana','Waqwaya','+251917669160','Kigale',NULL,'$2y$13$1p3fNMK9jB9pfhI1P9DD/e101U6g0aUZYLm.Q5LtSXQxwphNsQu3S','Doctor',2,NULL,NULL,NULL,NULL,NULL,NULL),(16,'312','galata123','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'$2y$13$7hQ5glggSZoLkcpzAJfnWe2wzY74Hj6juPObSOnaarg4DH3MoxlSC','Admin',2,NULL,NULL,NULL,NULL,NULL,NULL),(17,'456','bekalu','bekalu@gmail.com','Bekalu','Ato','+251961623562','Harar',NULL,'$2y$13$3WukM02gfsYnmEx1v89wMOM9M2w8imDrIPBItS3c59/Lt893BjICG','Receptionist',2,NULL,NULL,NULL,NULL,NULL,NULL),(18,'887','aman','aman@gmail.com','Amanuel','Nega','+251961623562','Harar',NULL,'$2y$13$XGmjsMhC7h2ciBPwlsj/xeZ17iGZJ1SALuma1gwFGM0nbVjPi29nu','Pharmacist',2,NULL,NULL,NULL,NULL,NULL,NULL),(19,'2342','fufa123','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$ObCredxQPbUSFPczMw5gDe0VnNw5DvpX9kmmyajF.sWERvz/zFjQS','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(20,'345','kat23','kat@gmail.com','Kat','Gech','+251945675432','Arba Minchi',NULL,'$2y$13$hJlnvqSiieEGg0wkDXWDI.H4Lu9BiO4GmISWxchH9VEhvmzJ6JGbq','Accountant',2,NULL,NULL,NULL,NULL,NULL,NULL),(22,'6755','galata1','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'$2y$13$SQdQ48h9w3VKMNL.PXxhQuCbXirhI5LacZ679ASag8lWNo1l.Lqqe','Doctor',2,NULL,NULL,NULL,NULL,NULL,NULL),(24,'34222','galata12','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'$2y$13$BeBoqLy0.E3LtS8lBIxgtuhol0a4DrdyfebJ5rUzk0zP9Uo3c.rRG','Doctor',2,NULL,NULL,NULL,NULL,NULL,NULL),(25,'90877','galata129','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'$2y$13$HSRKe37LhWMDPskQpvrWG.IJbAGJRsaV6kHBUQ8v3dcmCYX6mlmHC','Receptionist',2,NULL,NULL,NULL,NULL,NULL,NULL),(26,'5774','galata1290','fufa@gmail.com','Fufa','Wakgari','+251987776299','Nedjo',NULL,'$2y$13$jI3LQMvoIW6q.3afw/cdmebdJZYp5uGztcLCafMszuGJgLhN7AslC','Accountant',2,NULL,NULL,NULL,NULL,NULL,NULL),(27,'8997','galata','fufa@gmail.com','Fufa','Wakgari','+251987776299','Nedjo',NULL,'$2y$13$x6IwDh.3cLbBPAqyalc5Hua2EGdMg76c9SebNv0QHztQxBZ6n/b0K','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(28,'899788','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$XpcU7sPpOORPgfgH1ktyquALDP1QBPDWefmkJoOdWW2ZqGwTnnAjm','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(29,'88765','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$SknTIIXmYCja3VE3PJJYnuHVxmX47cEEdNc5tGLS..QEawFq1Qlf2','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(30,'887678','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$fr85jrDkUUPJaJZ.y9C6TebYOCVS.cClp6NlC7RQ/meTZe31Tjroi','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(31,'4533','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$cDLk7mzQH2YXZNSwoYqvW.HiNTDNTO.qR1gG4015MDvzfd6gOHJCC','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(32,'04533','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$LTzJpWVTy4TuVU.UEctKeehUQZvnIyQ71Ra4xnXwIx96MY3ZVqXCi','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(33,'045339','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$gcHdJvWq.QHvG034w5TdPekLb1Ve44qaIw0LCf0BH64ZFLEZolBT2','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(34,'0453394823489','galata','fufa@gmail.com','Fufa','Wakgari','+251987776212','Nedjo',NULL,'$2y$13$8sZbPIENMxC01zCGyagTEe7Vj/QkRY3oN8D7J9Ah1Zy09.DQLInrW','Lab Technician',2,NULL,NULL,NULL,NULL,NULL,NULL),(35,'78686','galata097','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'galata@12345','Doctor',2,NULL,'WUiIgrp0Y0kV8LCbkrp0dHeyA1rSAoiX',NULL,NULL,NULL,NULL),(36,'78686','galata097','galaayyoo@gmail.com','Galata','Waqwaya','+251961623562','Harar',NULL,'galata@12345','Doctor',2,NULL,'wrY5eXB__fcVME6mm_IqebiNjgI-NZG3',NULL,NULL,NULL,NULL),(37,'68655','tola232','fufa@gmail.com','Tola','Wakgari','+251987776299','Nedjo',NULL,'$2y$13$ZSE2B67opZr2BbLWFStaMu9rK9HmRpB50mgn6AwKZ8R1iikAQ4pMe','Pharmacist',2,NULL,NULL,NULL,NULL,NULL,NULL),(38,'6855','galata1290','galatawako222@gmail.com','Baroo','Wakgari','+251987776233','Nedjo',NULL,'$2y$13$d/hzCKvGKvsFBSokBM77e.it1wm.P9JKN55ewrV7HoFkD5Fgu.ewa','Nurse',2,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-22 20:31:20
