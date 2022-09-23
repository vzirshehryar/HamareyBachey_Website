-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2021 at 08:38 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `class_change`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `class_change` (IN `lower` TIMESTAMP, IN `higher` TIMESTAMP)  NO SQL
SELECT c.id, name, oclass, nclass, date 
FROM class_history c JOIN students USING(id) 
WHERE date>lower AND date<higher$$

DROP PROCEDURE IF EXISTS `new_parents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `new_parents` ()  NO SQL
select fname, mname, name as 'children name'
from students JOIN parents p USING(fcnic) 
where p.fcnic=
	(SELECT id FROM log 
	where action="INSERTED" AND
	name="parents" AND 
	timestampdiff(day, time, now())<2)$$

DROP PROCEDURE IF EXISTS `new_students`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `new_students` ()  NO SQL
SELECT s.id, s.name, age, timestampdiff(day, date, now()) as 'days enrolled' 
FROM log l JOIN students s USING(id) 
WHERE timestampdiff(day, date, now())<2 AND action="INSERTED"$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accompany`
--

DROP TABLE IF EXISTS `accompany`;
CREATE TABLE IF NOT EXISTS `accompany` (
  `acnic` varchar(15) NOT NULL,
  `aname` varchar(30) DEFAULT NULL,
  `apregnant` varchar(5) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`acnic`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accompany`
--

INSERT INTO `accompany` (`acnic`, `aname`, `apregnant`, `reason`, `id`) VALUES
('22222222223', 'Naheed Noor', 'No', 'Not Available', 1),
('22222222224', 'Mahnoor Khan', 'No', 'Not Available', 2),
('22222222225', 'Sibgha Khalid', 'No', 'Not Available', 3),
('22222222226', 'Rimsha Khan', 'No', 'Not Available', 4),
('22222222228', 'Salena Ahmed', 'No', 'Not Available', 5),
('22222222229', 'Sarah Ali', 'No', 'Not Available', 6),
('22222222220', 'Maham Sana', 'No', 'Not Available', 7),
('44444444443', 'Sana Khan', 'Yes', 'Not Available', 8),
('33333333334', 'Iqra Khalid', 'No', 'Not Available', 9),
('44444444445', 'Ishmel javeed', 'No', 'Not Available', 10),
('55555555554', 'Amna Ali', 'No', 'Not Available', 11),
('66666666665', 'Mehreen Nasir', 'No', 'Not Available', 12),
('66666666667', 'Neha Naveed', 'No', 'Not Available', 13),
('55555555556', 'Jia Javeed', 'No', 'Not Available', 14),
('99999999992', 'Salema Khatoon', 'Yes', 'Not Available', 15),
('99999999912', 'Hijab Khan', 'No', 'Not Available', 16),
('31111122223', 'Zohar Ali', 'No', 'Not Available', 17),
('41414141412', 'Zahra Akhtar', 'No', 'Not Available', 18),
('51515111111', 'Bint-e-Noor', 'No', 'Not Available', 19),
('54353453333', 'Fatima Akhtar', 'No', 'Not Available', 20);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Shahmeer', '1234'),
('vzirshehryar', 'wzirshehryar'),
('Umer', '7239');

-- --------------------------------------------------------

--
-- Table structure for table `class_history`
--

DROP TABLE IF EXISTS `class_history`;
CREATE TABLE IF NOT EXISTS `class_history` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `oclass` int DEFAULT NULL,
  `nclass` int DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `approvedby` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `challan` int NOT NULL AUTO_INCREMENT,
  `tfee` int DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `fee` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`challan`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`challan`, `tfee`, `discount`, `fee`, `status`) VALUES
(1, 5000, 1000, 4000, 'paid'),
(2, 5000, 1000, 4000, 'paid'),
(3, 5000, 1000, 4000, 'paid'),
(4, 5000, 1000, 4000, 'paid'),
(5, 5000, 1000, 4000, 'paid'),
(6, 5000, 0, 5000, 'unpaid'),
(7, 5000, 0, 5000, 'paid'),
(8, 5000, 0, 5000, 'paid'),
(9, 5000, 800, 4200, 'paid'),
(10, 5000, 800, 4200, 'unpaid'),
(11, 5000, 800, 4200, 'paid'),
(12, 5000, 1500, 3500, 'paid'),
(13, 5000, 1500, 3500, 'paid'),
(15, 5000, 1500, 3500, 'unpaid'),
(16, 5000, 1500, 3500, 'unpaid'),
(17, 5000, 1000, 4000, 'paid'),
(18, 5000, 2000, 3000, 'paid'),
(14, 5000, 0, 5000, 'paid'),
(19, 5000, 0, 5000, 'paid'),
(20, 5000, 0, 5000, 'paid'),
(29, 167500, 20000, 147500, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

DROP TABLE IF EXISTS `guardians`;
CREATE TABLE IF NOT EXISTS `guardians` (
  `gname` varchar(50) DEFAULT NULL,
  `gcontact` varchar(20) DEFAULT NULL,
  `gcnic` varchar(20) NOT NULL,
  `ggender` varchar(10) DEFAULT NULL,
  `relation` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`gcnic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`gname`, `gcontact`, `gcnic`, `ggender`, `relation`) VALUES
('Ali Abbas', '12345', '11111111111', 'Male', 'brother'),
('Shoain Malik', '12346', '11111111112', 'Male', 'brother'),
('Shoaib Akhtar', '12347', '11111111113', 'Male', 'brother'),
('Muhammad Shahmeer', '12348', '11111111114', 'Male', 'brother'),
('Ashar Farhan', '12349', '11111111115', 'Male', 'brother'),
('Furqan Khan', '12333', '11111111116', 'Male', 'brother'),
('Alishba Khan', '11111', '11111111117', 'Female', 'sister'),
('Laiba Nadeem', '22222', '11111111118', 'Female', 'sister'),
('Nadeem Naniwala', '33333', '11111111119', 'Male', 'father'),
('Jhanzaib Ahmed', '44444', '11111111121', 'Male', 'father'),
('Tayyab Gul', '55555', '11111111122', 'Male', 'father'),
('Shafay Haroon', '66666', '11111111123', 'Male', 'Grandfather'),
('Faizan Arshad', '77777', '11111111124', 'Male', 'Grandfather'),
('Muhammad Umer', '88888', '11111111125', 'Male', 'Grandfather'),
('Salman Khan', '99999', '11111111126', 'Male', 'brother'),
('Shahrukh Khan', '98764', '11111111127', 'Male', 'brother'),
('Saqlain Ali', '98765', '11111111128', 'Male', 'brother'),
('Wazir Shehryar Ali', '76543', '11111111129', 'Male', 'brother'),
('Hanzala Furqan', '87654', '11111111131', 'Male', 'father'),
('Eesha Fatime', '56432', '11111111132', 'Female', 'mother'),
('Yousaf', '7852', '0964', 'Male', 'Grandfather');

--
-- Triggers `guardians`
--
DROP TRIGGER IF EXISTS `guardian_log`;
DELIMITER $$
CREATE TRIGGER `guardian_log` AFTER UPDATE ON `guardians` FOR EACH ROW INSERT INTO log(name, id, action, date) VALUES("guardians", new.gcnic, "UPDATED", now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `l_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `id` int DEFAULT NULL,
  `action` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`l_id`, `name`, `id`, `action`, `date`) VALUES
(1, 'parents', 871, 'INSERTED', '2021-12-21'),
(2, 'students', 21, 'INSERTED', '2021-12-21'),
(3, 'student', 21, 'UPDATE', '2021-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
CREATE TABLE IF NOT EXISTS `parents` (
  `mname` varchar(50) DEFAULT NULL,
  `mcontact` varchar(20) DEFAULT NULL,
  `mcnic` varchar(20) DEFAULT NULL,
  `memail` varchar(50) DEFAULT NULL,
  `maddress` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `fcontact` varchar(20) DEFAULT NULL,
  `fcnic` varchar(20) NOT NULL,
  `femail` varchar(50) DEFAULT NULL,
  `faddress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`fcnic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`mname`, `mcontact`, `mcnic`, `memail`, `maddress`, `fname`, `fcontact`, `fcnic`, `femail`, `faddress`) VALUES
('Ayesha', '761', '63785', 'm1@gmail.com', 'H1, Isb', 'Ali Ahmad', '1521', '312', 'f1@gmail.com', 'H1, Isb'),
('Amina', '762', '87541', 'm7@gmail.com', 'H2, Isb', 'Kashif', '1522', '456', 'f7@gmail.com', 'H2, Isb'),
('Saima', '763', '85287', 'm3@gmail.com', 'H3, Idb', 'Kamran', '1533', '789', 'f3@gmail.com', 'H3, Idb'),
('Jameela', '764', '69083', 'm9@gmail.com', 'H4, Idb', 'Rajab Ali', '1567', '654', 'f9@gmail.com', 'H4, Idb'),
('Ayesha', '765', '87653', 'm17@gmail.com', 'H5, Lh4', 'M Afzal', '9821', '809', 'f17@gmail.com', 'H5, Lh4'),
('Bano', '766', '28735', 'm6@gmail.com', 'H6, Bwp', 'Khawar', '7801', '786', 'f6@gmail.com', 'H6, Bwp'),
('Sughra', '767', '76362', 'm8@gmail.com', 'H7, Hsp', 'Naeem Ahmad', '5689', '675', 'f8@gmail.com', 'H7, Hsp'),
('Nusrat', '768', '98236', 'm11@gmail.com', 'H12, Rwp', 'Naveed', '5221', '123', 'f11@gmail.com', 'H12, Rwp'),
('Mehnza', '769', '42389', 'm20@gmail.com', 'H13. Isb', 'Fazal Elahi', '4521', '213', 'f20@gmail.com', 'H13. Isb'),
('Kalssom', '770', '27832', 'm13@gmail.com', 'H14. Lhr', 'Shahbaz', '5642', '790', 'f13@gmail.com', 'H14. Lhr'),
('Fouzia', '771', '87572', 'm12@gmail.com', 'H78, Bwp', 'Nawaz', '7531', '421', 'f12@gmail.com', 'H78, Bwp'),
('Nadia', '772', '28367', 'm15@gmail.com', 'H10, Khi', 'Imran Ahmad', '4621', '763', 'f15@gmail.com', 'H10, Khi'),
('Naila', '773', '38747', 'm16@gmail.com', 'H12, Lhr', 'Shoukat Cheema', '7239', '767', 'f16@gmail.com', 'H12, Lhr'),
('Kashfa', '774', '98683', 'm19@gmail.com', 'H34, Burewala', 'Umair Arshad', '128', '810', 'f19@gmail.com', 'H34, Burewala'),
('Kainat', '775', '54836', 'm2@gmail.com', 'H50, Gojra', 'M Umer', '7198', '791', 'f2@gmail.com', 'H50, Gojra'),
('Mehr Bano', '776', '87328', 'm4@gmail.com', 'H121, Multan', 'Aslam Ali', '3616', '751', 'f4@gmail.com', 'H121, Multan'),
('Saira', '777', '78373', 'm5@gmail.com', 'H06, Isb', 'Ilyas Ahmad', '9391', '422', 'f5@gmail.com', 'H06, Isb'),
('Samina', '778', '86477', 'm9@gmail.com', 'H39, Bwp', 'Zahoor Ali', '3275', '908', 'f9@gmail.com', 'H39, Bwp'),
('Shaheena', '779', '83737', 'm10@gmail.com', 'H33, Lhr', 'Shezad Ali', '7825', '909', 'f10@gmail.com', 'H33, Lhr'),
('Rafia', '780', '74691', 'm14@gmail.com', 'H12, Lyyah', 'Mukhtar Ahmad', '1783', '121', 'f14@gmail.com', 'H12, Lyyah'),
('Kausar', '24272', '825', 'ab2c@gmail.com', 'H90', 'Aqeel', '38727', '871', 'hga@gmail.com', 'H90');

--
-- Triggers `parents`
--
DROP TRIGGER IF EXISTS `parent_log`;
DELIMITER $$
CREATE TRIGGER `parent_log` AFTER UPDATE ON `parents` FOR EACH ROW INSERT INTO log(name, id, action, date) VALUES("parents", new.fcnic, "UPDATED", now())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `parents_insert`;
DELIMITER $$
CREATE TRIGGER `parents_insert` AFTER INSERT ON `parents` FOR EACH ROW INSERT INTO log(name,id,action,date)
VALUES("parents",new.fcnic,"INSERTED",now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `class` int NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `fcnic` varchar(20) DEFAULT NULL,
  `gcnic` varchar(20) DEFAULT NULL,
  `challan` int DEFAULT NULL,
  `course` varchar(50) NOT NULL DEFAULT 'none',
  `time` timestamp NULL DEFAULT NULL,
  `dormant` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fcnic` (`fcnic`),
  KEY `gcnic` (`gcnic`),
  KEY `challan` (`challan`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `class`, `dob`, `gender`, `fcnic`, `gcnic`, `challan`, `course`, `time`, `dormant`) VALUES
(1, 'Ahmad', 13, 4, '12/7/2008', 'Male', '312', '11111111111', 12, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(2, 'Ali', 10, 3, '12/7/2011', 'Male', '456', '11111111112', 11, 'Database Management', '2021-12-20 20:12:56', NULL),
(3, 'Akbar', 11, 5, '12/7/2010', 'Male', '789', '11111111113', 4, 'Designing of Algorithum', '2021-12-20 20:12:56', NULL),
(4, 'Rashid', 12, 6, '12/7/2009', 'Male', '312', '11111111114', 1, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(5, 'Umer', 9, 9, '12/7/2012', 'Male', '809', '11111111115', 3, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(6, 'Meerab', 4, 10, '12/7/2017', 'Female', '312', '11111111116', 2, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(7, 'Abdullah', 7, 7, '12/7/2014', 'Male', '675', '11111111117', 9, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(8, 'Hassan', 13, 11, '12/7/2008', 'Male', '456', '11111111118', 10, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(9, 'Ubaid', 11, 12, '12/7/2010', 'Male', '312', '11111111119', 20, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(10, 'Kamal Ali', 6, 6, '12/7/2015', 'Male', '789', '11111111121', 15, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(11, 'Ayesha', 15, 5, '12/7/2006', 'Female', '421', '11111111122', 13, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(12, 'Farooq', 13, 3, '12/7/2008', 'Male', '763', '11111111123', 16, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(13, 'Ahmar', 9, 2, '12/7/2012', 'Male', '675', '11111111124', 14, 'Database Management', '2021-12-20 20:12:56', NULL),
(14, 'Amina khan', 12, 6, '12/7/2009', 'Female', '809', '11111111125', 5, 'Database Management', '2021-12-20 20:12:56', NULL),
(15, 'Rasmsha', 7, 11, '12/7/2014', 'Female', '789', '11111111126', 6, 'Database Management', '2021-12-20 20:12:56', NULL),
(16, 'Sadia', 5, 10, '12/7/2016', 'Female', '763', '11111111127', 8, 'Database Management', '2021-12-20 20:12:56', NULL),
(17, 'Alina', 3, 9, '12/7/2018', 'Female', '421', '11111111128', 7, 'Database Management', '2021-12-20 20:12:56', NULL),
(18, 'Atifa', 10, 8, '12/7/2011', 'Female', '908', '11111111129', 19, 'Programming Fundamentals', '2021-12-20 20:12:56', NULL),
(19, 'Parveen', 14, 5, '12/7/2007', 'Female', '909', '11111111131', 17, 'Operating Systems', '2021-12-20 20:12:56', NULL),
(20, 'Minahil', 8, 7, '12/7/2013', 'Female', '121', '11111111132', 18, 'Database Management', '2021-12-20 20:12:56', NULL),
(21, 'Hassan Afzal', 18, 6, '2002-11-21', 'Male', '871', '0964', 29, 'Database Management', '2021-12-20 03:12:08', NULL);

--
-- Triggers `students`
--
DROP TRIGGER IF EXISTS `student_insert`;
DELIMITER $$
CREATE TRIGGER `student_insert` AFTER INSERT ON `students` FOR EACH ROW INSERT INTO log(name,id,action,date) 
VALUES("students",new.id,"INSERTED",now())
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `student_log`;
DELIMITER $$
CREATE TRIGGER `student_log` AFTER UPDATE ON `students` FOR EACH ROW INSERT INTO log(name, id, action, date) VALUES("student", new.id, "UPDATE", now())
$$
DELIMITER ;

DELIMITER $$
--
-- Events
--
DROP EVENT `course`$$
CREATE DEFINER=`root`@`localhost` EVENT `course` ON SCHEDULE EVERY 1 DAY STARTS '2021-12-21 01:27:01' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE students set course="",time=NULL,dormant=now() WHERE course!="" AND timestampdiff(minute,time,now())>5$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
