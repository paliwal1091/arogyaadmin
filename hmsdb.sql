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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `hms_center` */

insert  into `hms_center`(`center_name`,`id`) values ('asdasdasd',5),('Colombo',1),('Colombos',6),('Gampaha',2),('Kurunagala',3),('Negombo',4),('sadasdasdew',7);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hms_cost` */

insert  into `hms_cost`(`id`,`description`,`amount`,`txn_type`,`created_date`,`created_user`) values (1,'asdasd',222.00,'Credit','2018-08-28 21:01:21',5),(2,'transport',999.99,'Debit','2018-08-30 21:09:15',3),(3,'for sample test tubes',999.99,'Debit','2018-08-30 21:19:11',5);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor` */

insert  into `hms_doctor`(`id`,`first_name`,`last_name`,`nic`,`pword`,`email`,`telephone`,`degree`,`specialist_id`,`doc_fee`,`slmc_no`,`status_code`,`category`,`created_date`,`created_user`,`user_role`) values (1,'Sampath','Perera','863512824V','*0D9E8E927901FAC59ABC85BF2F71C25B8A01C0C8','sampa@gmail.com','0715833470','MBBS',1,2500,'5566','ACTIVE',NULL,'2018-08-29 14:11:29',1,'DOCTOR'),(2,'Vijaya','Perera','889658745V','a22f3e5b9fe5e0068e69ece32a2ac31beb577489','vi@gmail.com','0785474547','MBBS',0,650,'22554','ACTIVE','OPD','2018-08-30 20:49:10',1,'DOCTOR'),(3,'asdasd','sadsad','663333','','asdsa@gss.com','255555','MBBS',1,2500,'5566','ACTIVE','OPD','2018-09-10 11:21:19',1,'DOCTOR'),(4,'sadsadsad','sadsadsad','222333','*099FE05421AA3563DACDD9A333C1C545990A9FDE','ravinathdo@gmail.com','0715833470','MBBS',2,2500,'55667','ACTIVE','','2018-09-10 11:22:57',1,'DOCTOR');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `hms_doctor_appointment` */

insert  into `hms_doctor_appointment`(`id`,`doctor_id`,`patient_id`,`appointment_date`,`status_code`,`doctor_comment`,`doctor_fee`,`hospital_fee`,`fee`,`created_date`,`created_user`) values (1,1,1,'2018-08-31','COMPLETE',' Feever record available',2500,1000,3500,'2018-08-29 14:12:36',1),(2,1,1,'2018-08-31','COMPLETE',' this is good',2500,1000,3500,'2018-08-29 16:27:14',1),(3,1,1,'2018-09-01','COMPLETE',' sadsadsadsa',2500,1000,3500,'2018-08-29 16:30:14',1),(4,1,1,'2018-08-31','REJECT',NULL,2500,1000,3500,'2018-08-30 20:47:58',1),(5,1,1,'2018-09-01','REJECT',NULL,2500,1000,3500,'2018-08-31 08:51:36',1),(6,1,1,'2018-09-08','OPEN',NULL,2500,1000,3500,'2018-08-31 14:50:49',1),(7,1,4,'','OPEN',NULL,2500,1000,3500,'2018-09-10 16:58:21',4),(8,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:00:55',4),(9,1,4,'2018-09-04','ACCEPT','sdsdsd',2500,1000,3500,'2018-09-10 17:07:04',4),(10,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:07:30',4),(11,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:08:59',4),(12,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:09:43',4),(13,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:09:51',4),(14,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:10:18',4),(15,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:11:01',4),(16,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:11:57',4),(17,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:19:16',4),(18,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:20:59',4),(19,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:21:56',4),(20,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:22:59',4),(21,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:24:29',4),(22,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:24:42',4),(23,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:26:17',4),(24,1,4,'2018-09-04','OPEN',NULL,2500,1000,3500,'2018-09-10 17:27:51',4),(25,1,4,'2018-09-04','','status change',2500,1000,3500,'2018-09-10 17:29:21',4);

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

insert  into `hms_doctor_availability`(`doctor_id`,`day_available`,`from_time`,`to_time`) values (1,'Wednesday','10:10','12:12'),(4,'Sunday','10:12','10:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hms_drug` */

insert  into `hms_drug`(`id`,`drug_name`,`qty`,`unit`,`unit_price`,`date_expiry`) values (1,'ghghghgh',150,'g','500.00','2018-09-01'),(2,'Penisileen',250,NULL,NULL,NULL),(3,'ointment ',250,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hms_employee_salary` */

insert  into `hms_employee_salary`(`id`,`user_id`,`salary_month`,`salary_amount`,`created_date`,`created_user`) values (1,2,'2018-09','25000','2018-08-30 21:07:53',3);

/*Table structure for table `hms_feedback` */

DROP TABLE IF EXISTS `hms_feedback`;

CREATE TABLE `hms_feedback` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `feedback` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hms_feedback` */

insert  into `hms_feedback`(`id`,`feedback`,`created_date`,`created_user`) values (1,'This is my feeback','2018-08-30 20:28:45',2);

/*Table structure for table `hms_inventory` */

DROP TABLE IF EXISTS `hms_inventory`;

CREATE TABLE `hms_inventory` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  `updated_date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `hms_inventory` */

insert  into `hms_inventory`(`id`,`item_name`,`qty`,`created_date`,`created_user`,`updated_date`) values (1,'Bad sheet',15,'2018-08-28 15:14:38',5,'2018-08-28 11:06:06pm'),(2,'Sample Test tube',15,'2018-08-28 15:14:47',5,'2018-08-28 11:05:36pm'),(3,'',0,'2018-08-28 15:14:48',5,NULL),(4,'',0,'2018-08-28 15:14:48',5,NULL),(5,'',0,'2018-08-28 15:14:49',5,NULL),(6,'',0,'2018-08-28 15:15:41',5,NULL),(7,'panadol pill',250,'2018-08-30 21:10:01',5,'2018-08-30 09:10:35pm');

/*Table structure for table `hms_lab_test` */

DROP TABLE IF EXISTS `hms_lab_test`;

CREATE TABLE `hms_lab_test` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `lab_test` varchar(50) DEFAULT NULL,
  `center_name` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `test_cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hms_lab_test` */

insert  into `hms_lab_test`(`id`,`lab_test`,`center_name`,`description`,`test_cost`) values (1,'hgjghjghjghj','Colombo','gdfgdfgfdgfdgsfgs gsdg',NULL),(2,'fgfdgsgsfd gdfsgfdg ','Colombo','gfdsgfsdgfdsg fdgfdgfd gfdgdfg gfdgfdg',NULL),(3,'Urine Test','Colombo','10:15 - 2:15 am \r\nBridsfdsf dsfdsfs',NULL),(4,'sample test','Colombo','sadsadasdas','2500.00'),(5,'urine sample collect','Colombo','sdasdasdasd','1520.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hms_opd_appointment` */

insert  into `hms_opd_appointment`(`id`,`patient_id`,`doctor_id`,`appointment_date`,`status_code`,`created_date`,`created_user`,`updated_user`,`fee`) values (1,1,2,'2018-09-15','REJECT','2018-08-30 21:02:00',1,NULL,850),(2,1,2,'2018-09-01','OPEN','2018-08-30 22:06:52',1,NULL,850),(3,1,2,'2018-09-08','OPEN','2018-08-31 14:50:10',1,NULL,850);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hms_patient` */

insert  into `hms_patient`(`id`,`first_name`,`last_name`,`telephone`,`dob`,`email`,`pword`,`status_code`,`user_role`,`created_date`) values (1,'Kumarass','Gamage','0715288470','2018-08-01','ravinathdokk@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','ACTIVE','PATIENT','2018-08-29 13:56:03'),(2,'asdsad','sadsad','0715833470','2018-09-05','ravinathdosss@gmail.com','','ACTIVE','PATIENT','2018-09-10 12:33:18'),(3,'sadsad','sadsad','0715833470','2018-09-21','ravinathdossss@gmail.com','*9D981D9138904BDDA3DFF6C04939C88EADF90FE7','ACTIVE','PATIENT','2018-09-10 12:33:53'),(4,'sadsadsadsxx','sadsadsad','2342342343','2018-09-21','ravinathdodd@gmail.com','*288A7937D7A48B2C8148F1849013DBD8AA443263','ACTIVE','PATIENT','2018-09-10 13:04:15');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `hms_purchase` */

insert  into `hms_purchase`(`id`,`purchasing_item`,`qty`,`status_code`,`updated_by`,`created_date`,`created_user`,`amount`) values (1,'sdsdsdsd',33,NULL,5,'2018-08-28 20:41:20',5,NULL),(2,'jhkjhjh',4545,'REJECT',8,'2018-08-28 21:39:36',8,NULL),(3,'sample test tube ',1500,'COMPLETE',5,'2018-08-30 21:16:41',5,150.00),(4,'wsdasdsa',25,'COMPLETE',8,'2018-08-30 21:35:24',8,3578.00),(5,'dfsdfsdf',222,'PENDING',8,'2018-08-30 21:37:31',8,NULL),(6,'dsdsad',33,'PENDING',NULL,'2018-09-12 15:18:24',1,0.00),(7,'sadasdas',33,'PENDING',NULL,'2018-09-12 16:26:57',1,0.00);

/*Table structure for table `hms_specialist` */

DROP TABLE IF EXISTS `hms_specialist`;

CREATE TABLE `hms_specialist` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `specialist` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hms_specialist` */

insert  into `hms_specialist`(`id`,`specialist`) values (1,'Chest Pecision'),(2,'VOG'),(3,'Dentist');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `hms_user` */

insert  into `hms_user`(`id`,`first_name`,`last_name`,`nic`,`pword`,`user_role`,`telephone`,`email`,`empno`,`status_code`,`created_date`,`created_user`) values (1,'kumaras','pathirana','88','*CE34D0F47B6A991EAD458CD049011F7611A240FC','ADMIN','0111','admin@gmail.com','2255','ACTIVE','2018-07-27 21:20:34',1),(43,'yohan','perera','8855','*6C39DB3F16D3F0B179A84C9D34F0553143B83684','PHARMACIST','0715833470','ravinathdopp@gmail.com','5533','ACTIVE','2018-09-12 14:28:48',1),(44,'asss','dfsdfsd','9966','*CF345199FA1C4D61CF0953078B86625DDD586B63','ACCOUNTANT','66555','as@gmail.com','9966','ACTIVE','2018-09-12 16:28:30',1);

/*Table structure for table `hms_user_role` */

DROP TABLE IF EXISTS `hms_user_role`;

CREATE TABLE `hms_user_role` (
  `user_role` varchar(20) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hms_user_role` */

insert  into `hms_user_role`(`user_role`,`description`) values ('ACCOUNTANT','Accountant'),('ADMIN','Administrator'),('DOCTOR','Doctor'),('HR','HR Manager'),('LAB','LAB Inchage'),('OPD','OPD User'),('PATIENT','Patient'),('PHARMACIST','Pharmacist'),('TRANSPORT','Transport Manager'),('WARD','Ward Management');

/*Table structure for table `hms_vehicle` */

DROP TABLE IF EXISTS `hms_vehicle`;

CREATE TABLE `hms_vehicle` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`vehicle_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hms_vehicle` */

insert  into `hms_vehicle`(`id`,`vehicle_number`) values (1,'8855-AS'),(2,'CAO-2365'),(3,'CAT-8855');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `hms_vehicle_request` */

insert  into `hms_vehicle_request`(`id`,`request_by`,`comment`,`status_code`,`vehicle_id`,`created_time`,`created_user`,`datetime_need`) values (1,8,'plz get the ambulance','COMPLETE',2,'2018-08-28 23:10:14',8,NULL),(2,8,'plz get the negombo','COMPLETE',2,'2018-08-29 13:43:20',8,NULL),(3,8,'sample','REJECT',0,'2018-08-29 13:44:57',8,NULL),(4,8,NULL,'REJECT',0,'2018-08-29 13:45:47',8,NULL),(5,2,'Deaa',NULL,NULL,'2018-08-30 21:04:15',NULL,'2018-09-01T02:22'),(6,8,'to to colombo','PENDING',0,'2018-08-30 21:27:15',8,NULL);

/*Table structure for table `hms_ward` */

DROP TABLE IF EXISTS `hms_ward`;

CREATE TABLE `hms_ward` (
  `ward_no` int(5) NOT NULL AUTO_INCREMENT,
  `ward_name` varchar(50) DEFAULT NULL,
  `doctor_incharge` int(5) DEFAULT NULL,
  PRIMARY KEY (`ward_no`),
  UNIQUE KEY `NewIndex1` (`ward_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hms_ward` */

insert  into `hms_ward`(`ward_no`,`ward_name`,`doctor_incharge`) values (1,'Child',1),(2,'Chest',0),(3,'asdasdsad',1),(4,'sadsadsad',1),(5,'Pregnant',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hms_ward_patient` */

insert  into `hms_ward_patient`(`id`,`ward_id`,`patient_id`,`comment`,`created_date`,`created_user`,`status_code`) values (1,1,1,'this is serous','2018-08-29 17:08:44',1,'ACCEPT');

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
