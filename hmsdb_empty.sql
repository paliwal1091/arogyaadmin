/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.2.7-MariaDB : Database - hmsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hmsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hmsdb`;

/*Table structure for table `hms_center` */

DROP TABLE IF EXISTS `hms_center`;

CREATE TABLE `hms_center` (
  `center_name` varchar(20) NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`center_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_center` */

/*Table structure for table `hms_cost` */

DROP TABLE IF EXISTS `hms_cost`;

CREATE TABLE `hms_cost` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `amount` double(5,2) DEFAULT NULL,
  `txn_type` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_cost` */

/*Table structure for table `hms_doctor` */

DROP TABLE IF EXISTS `hms_doctor`;

CREATE TABLE `hms_doctor` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `pword` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `specialist_id` int(5) DEFAULT NULL,
  `doc_fee` int(5) DEFAULT NULL,
  `slmc_no` varchar(20) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'ACTIVE',
  `category` varchar(20) DEFAULT 'OPD',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT 'DOCTOR',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor` */

/*Table structure for table `hms_doctor_appointment` */

DROP TABLE IF EXISTS `hms_doctor_appointment`;

CREATE TABLE `hms_doctor_appointment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(5) DEFAULT NULL,
  `patient_id` int(5) DEFAULT NULL,
  `appointment_date` varchar(30) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'OPEN',
  `doctor_comment` text DEFAULT NULL,
  `doctor_fee` int(5) DEFAULT NULL,
  `hospital_fee` int(5) DEFAULT NULL,
  `fee` int(5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor_appointment` */

/*Table structure for table `hms_doctor_availability` */

DROP TABLE IF EXISTS `hms_doctor_availability`;

CREATE TABLE `hms_doctor_availability` (
  `doctor_id` int(5) NOT NULL,
  `day_available` varchar(60) NOT NULL,
  `from_time` varchar(50) NOT NULL,
  `to_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`,`day_available`,`from_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor_availability` */

/*Table structure for table `hms_doctor_salary` */

DROP TABLE IF EXISTS `hms_doctor_salary`;

CREATE TABLE `hms_doctor_salary` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(5) DEFAULT NULL,
  `salary_month` varchar(20) DEFAULT NULL,
  `salary_amount` varbinary(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `flag_unique` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1ss` (`flag_unique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor_salary` */

/*Table structure for table `hms_drug` */

DROP TABLE IF EXISTS `hms_drug`;

CREATE TABLE `hms_drug` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `drug_name` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `unit` varchar(5) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `date_expiry` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_drug` */

/*Table structure for table `hms_employee_salary` */

DROP TABLE IF EXISTS `hms_employee_salary`;

CREATE TABLE `hms_employee_salary` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `salary_month` varchar(20) DEFAULT NULL,
  `salary_amount` varbinary(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`user_id`,`salary_month`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_employee_salary` */

/*Table structure for table `hms_feedback` */

DROP TABLE IF EXISTS `hms_feedback`;

CREATE TABLE `hms_feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `feedback` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_feedback` */

/*Table structure for table `hms_inventory` */

DROP TABLE IF EXISTS `hms_inventory`;

CREATE TABLE `hms_inventory` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `updated_date` varchar(30) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'PENDING',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_inventory` */

/*Table structure for table `hms_lab_test` */

DROP TABLE IF EXISTS `hms_lab_test`;

CREATE TABLE `hms_lab_test` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `lab_test` varchar(50) DEFAULT NULL,
  `center_id` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `test_cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_lab_test` */

/*Table structure for table `hms_opd_appointment` */

DROP TABLE IF EXISTS `hms_opd_appointment`;

CREATE TABLE `hms_opd_appointment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `patient_id` int(5) DEFAULT NULL,
  `doctor_id` int(5) DEFAULT NULL,
  `appointment_date` varchar(30) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `updated_user` int(5) DEFAULT NULL,
  `fee` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_opd_appointment` */

/*Table structure for table `hms_patient` */

DROP TABLE IF EXISTS `hms_patient`;

CREATE TABLE `hms_patient` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pword` text DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'ACTIVE',
  `user_role` varchar(20) DEFAULT 'PATIENT',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_patient` */

/*Table structure for table `hms_purchase` */

DROP TABLE IF EXISTS `hms_purchase`;

CREATE TABLE `hms_purchase` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `purchasing_item` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'PENDING',
  `updated_by` int(5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `amount` double(10,2) DEFAULT 0.00,
  `comment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_purchase` */

/*Table structure for table `hms_specialist` */

DROP TABLE IF EXISTS `hms_specialist`;

CREATE TABLE `hms_specialist` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `specialist` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hms_specialist` */

insert  into `hms_specialist`(`id`,`specialist`) values (1,'OPD'),(2,'VOG'),(3,'Dentist'),(4,'Chest');

/*Table structure for table `hms_user` */

DROP TABLE IF EXISTS `hms_user`;

CREATE TABLE `hms_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `pword` text DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `empno` varchar(10) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `hms_user` */

insert  into `hms_user`(`id`,`first_name`,`last_name`,`nic`,`pword`,`user_role`,`telephone`,`email`,`empno`,`status_code`,`created_date`,`created_user`) values (1,'Samaptha','Perera','863512824V','*CE34D0F47B6A991EAD458CD049011F7611A240FC','ADMIN','0715833470','sampa@gmail.com','2255','ACTIVE','2018-07-27 21:20:34',1),(43,'Kumara','Velgama','8855','*6C39DB3F16D3F0B179A84C9D34F0553143B83684','PHARMACIST','0715833470','ravinathdopp@gmail.com','5533','ACTIVE','2018-09-12 14:28:48',1),(44,'MithriPala','Sirisena','9966','*CF345199FA1C4D61CF0953078B86625DDD586B63','ACCOUNTANT','66555','as@gmail.com','9966','ACTIVE','2018-09-12 16:28:30',1),(45,'Patalee','Champika','3366','*6A8C170AE5B6812295CCA76325B88B1BF0ACED34','LAB','663366','lab@gmail.com','3366','ACTIVE','2018-09-13 14:41:45',1),(46,'Damayanthi','Darsha','886666554','*F79E9A13B91346D9F87AEC733BDAA16F4E58F875','TRANSPORT','886655','dfdsf@gm.com',NULL,'ACTIVE','2018-09-17 11:50:27',1),(47,'Chandanee','Hetiarachichi','89989','*C34FA0B641D39FC06CAD0741B9333EF5F5F0F2A5','OPD','0715833470','ravinathdossdd@gmail.com',NULL,'ACTIVE','2018-09-17 12:14:02',1),(48,'Namal','Udugama','8866559','*40B1E275AF69589DC0F1DB77A6A119E08090CFD4','WARD','0715833470','ravinathdo4455@gmail.com',NULL,'ACTIVE','2018-09-17 13:03:01',1),(49,'Priya','Sooriyaseen','sadsad','*8157D78ADCAA586045956708D113ECE8E8552BE3','ACCOUNTANT','','',NULL,'ACTIVE','2018-09-17 15:16:46',1),(50,'Sunil','Mendis','23213','*280402E85995A302818BFFBD5B14BC4796C49A90','ACCOUNTANT','','',NULL,'ACTIVE','2018-09-17 15:17:29',1),(51,'Romesh','Kaluwithana','8856321254','*DD4A71AC0B611FB0F6141B28CCD4FF9B9F9A6038','ACCOUNTANT','0715833470','ravinathdo999@gmail.com',NULL,'ACTIVE','2018-09-17 15:48:07',1);

/*Table structure for table `hms_user_role` */

DROP TABLE IF EXISTS `hms_user_role`;

CREATE TABLE `hms_user_role` (
  `user_role` varchar(20) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_user_role` */

insert  into `hms_user_role`(`user_role`,`description`) values ('ACCOUNTANT','Accountant'),('ADMIN','Administrator'),('DOCTOR','Doctor'),('LAB','LAB Inchage'),('OPD','OPD User'),('PATIENT','Patient'),('PHARMACIST','Pharmacist'),('TRANSPORT','Transport Manager'),('WARD','Ward Management');

/*Table structure for table `hms_vehicle` */

DROP TABLE IF EXISTS `hms_vehicle`;

CREATE TABLE `hms_vehicle` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(30) DEFAULT NULL,
  `status_code` varchar(50) DEFAULT 'ACTIVE',
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`vehicle_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_vehicle` */

/*Table structure for table `hms_vehicle_request` */

DROP TABLE IF EXISTS `hms_vehicle_request`;

CREATE TABLE `hms_vehicle_request` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `request_by` int(5) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'PENDING',
  `vehicle_id` int(5) DEFAULT 0,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `datetime_need` varchar(50) DEFAULT NULL,
  `driver_name` varchar(100) DEFAULT NULL,
  `flag_unique` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1_uni` (`flag_unique`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_vehicle_request` */

/*Table structure for table `hms_ward` */

DROP TABLE IF EXISTS `hms_ward`;

CREATE TABLE `hms_ward` (
  `ward_no` int(5) NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(50) DEFAULT NULL,
  `doctor_incharge` int(5) DEFAULT NULL,
  PRIMARY KEY (`ward_no`),
  UNIQUE KEY `NewIndex1` (`ward_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_ward` */

/*Table structure for table `hms_ward_patient` */

DROP TABLE IF EXISTS `hms_ward_patient`;

CREATE TABLE `hms_ward_patient` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ward_id` int(5) DEFAULT NULL,
  `patient_id` int(5) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'ADMIT',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`ward_id`,`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_ward_patient` */

/*Table structure for table `hms_ward_staff` */

DROP TABLE IF EXISTS `hms_ward_staff`;

CREATE TABLE `hms_ward_staff` (
  `ward_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `responsibility` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ward_id`,`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_ward_staff` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
