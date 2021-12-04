-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 06:53 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `adminid` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `phone` int(10) NOT NULL,
  `subjectid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`adminid`, `admin_name`, `password`, `phone`, `subjectid`) VALUES
('AD123', 'OOI ZHENG YUE', '6ffb1ab37230580ccb5db4286ddcf90c1c11439c', 1137360878, 'ICT2202'),
('AD2', 'TAN JUN WEI', '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33', 1137360878, 'SDT4202,IBM4205,MPU3253'),
('AD3', 'TEH KAI MENG', '06062e284d83527c229ecb00e9a511ce873ede60', 1137360877, 'PRG4201,CIS3201,IBM3202'),
('AD5', 'HAZEM', '0ec8868506739fbb26c28621369e25a5cdca1dc2', 1137360877, 'IBM4202,IBM3201,SDT3202'),
('AD6', 'ALI', 'b42a6d93d796915222f6ffb2ffdd6137d93c1cdb', 1137360877, 'IBM2202,IBM3101,CIS4401'),
('AD7', 'YAASHITIRAN ', 'c9048640c9ca052a6e72c01f5ed7e5b8e33f9078', 1137360877, 'SDT2202,FYP4203,FYP4204'),
('AD8', 'OOI ZHI XUAN', '6ffb1ab37230580ccb5db4286ddcf90c1c11439c', 1137360877, 'MPU3442,IBM4103,IBM4102');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendid` int(11) NOT NULL,
  `subjectid` varchar(10) NOT NULL,
  `class` varchar(30) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL,
  `attend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendid`, `subjectid`, `class`, `studentid`, `datetime`, `attend`) VALUES
(23, 'IBM4205', 'Week2', 'I18015551', '2021-11-05 13:28:41', 1),
(24, 'IBM4205', 'Week2', 'I18015554', '2021-11-05 13:28:41', 1),
(25, 'IBM4205', 'Week2', 'I18015555', '0000-00-00 00:00:00', 0),
(26, 'IBM4205', 'Week3', 'I18015551', '2021-11-05 13:29:24', 1),
(27, 'IBM4205', 'Week3', 'I18015554', '2021-11-05 13:28:41', 1),
(28, 'IBM4205', 'Week3', 'I18015555', '2021-11-05 13:28:41', 0),
(29, 'IBM4205', 'Week1', 'I18015551', '2021-11-05 13:28:41', 1),
(30, 'IBM4205', 'Week1', 'I18015554', '2021-11-05 13:28:41', 1),
(31, 'IBM4205', 'Week1', 'I18015555', '0000-00-00 00:00:00', 0),
(32, 'IBM4205', 'Week4', 'I18015551', '0000-00-00 00:00:00', 0),
(33, 'IBM4205', 'Week4', 'I18015554', '0000-00-00 00:00:00', 0),
(34, 'IBM4205', 'Week4', 'I18015555', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `classid` int(10) NOT NULL,
  `description` text NOT NULL,
  `venue` varchar(30) NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL,
  `subjectid` varchar(10) NOT NULL,
  `qrcode` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `adminid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`classid`, `description`, `venue`, `datetime_start`, `datetime_end`, `subjectid`, `qrcode`, `class`, `adminid`) VALUES
(44, 'aslkdhalkfa', 'online class', '2021-11-24 11:47:00', '2021-11-24 11:52:00', 'IBM4202', '../temp/IBM4202.Week1.png', 'Week1', 'AD2'),
(46, 'alskdlahkfasf', 'online class', '2021-11-24 13:23:00', '2021-11-24 13:23:00', 'IBM4205', '../temp/IBM4205.Week2.png', 'Week2', 'AD2'),
(47, 'fasffasf', 'online class', '2021-11-24 13:24:00', '2021-11-24 13:29:00', 'IBM4205', '../temp/IBM4205.Week3.png', 'Week3', 'AD2'),
(48, 'asdasdasd', 'online class', '2021-11-24 13:25:00', '2021-11-24 13:30:00', 'IBM4205', '../temp/IBM4205.Week1.png', 'Week1', 'AD2'),
(49, 'akdhjlakhfla', 'online class', '2021-11-24 13:48:00', '2021-11-24 13:51:00', 'IBM4205', '../temp/IBM4205.Week4.png', 'Week4', 'AD2');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `subjectid` varchar(100) NOT NULL,
  `semester` int(10) NOT NULL,
  `status` int(10) NOT NULL COMMENT '0 = normal, 1=pending,2=reject',
  `total` int(11) DEFAULT NULL,
  `totalcredit` int(11) NOT NULL,
  `payday` text DEFAULT NULL,
  `reason` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `studentid`, `subjectid`, `semester`, `status`, `total`, `totalcredit`, `payday`, `reason`) VALUES
(37, 'I18015553', 'IBM3202, MPU3253, SDT3202', 3, 0, 7000, 0, NULL, ''),
(38, 'I18015551', 'IBM4205, PRG4201, SDT4202', 1, 0, 9000, 0, NULL, ''),
(39, 'I18015554', 'IBM4205, PRG4201, SDT4202', 1, 0, NULL, 0, NULL, ''),
(40, 'I18015555', 'IBM4205, PRG4201, SDT4202', 1, 0, NULL, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester`) VALUES
(1),
(2),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(10) NOT NULL,
  `studentname` varchar(30) NOT NULL,
  `studentic` int(12) NOT NULL,
  `modeofstudy` text NOT NULL,
  `session` varchar(10) NOT NULL,
  `program` text NOT NULL,
  `school` varchar(30) NOT NULL,
  `semester` int(10) NOT NULL,
  `level` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` text NOT NULL,
  `subjectid` varchar(100) DEFAULT NULL,
  `credithours` int(10) DEFAULT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentic`, `modeofstudy`, `session`, `program`, `school`, `semester`, `level`, `address`, `phone`, `email`, `subjectid`, `credithours`, `password`) VALUES
('I18015551', 'OOI ZHENG YUE', 2147483647, 'full time', 'JUN2021', 'Information Technology', 'INTI NILAI', 1, 'DIPLOMA', '43,JALAN HANG JEBAT 29,TAMAN SKUDAI', 1137360878, 'daidaiyue69@gmail.com', 'IBM4205, PRG4201, SDT4202', NULL, '6ffb1ab37230580ccb5db4286ddcf90c1c11439c'),
('I18015552', 'NG KWAN LUNG', 224015566, 'full time', 'JUN2021', 'Information Technology', 'INTI NILAI', 0, 'DIPLOMA', '43,JALAN HANG JEBAT 29,TAMAN SKUDAI', 1137360878, 'daidaiyue69@gmail.com', NULL, NULL, '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33'),
('I18015554', 'TEH KAI MENG', 706015050, 'full time', 'JUN2021', 'Information Technology', 'INTI NILAI', 1, 'DIPLOMA', '123 Jalan Sutera Pulai 2/13 Taman Sutera Utama', 2147483647, 'tkaimeng45@gmail.com', 'IBM4205, PRG4201, SDT4202', 4, '06062e284d83527c229ecb00e9a511ce873ede60'),
('I18015555', 'TAN JUN WEI', 405070055, 'full time', 'JUN2021', 'Information Technology', 'INTI NILAI', 1, 'DIPLOMA', '123 Jalan Sutera Pulai 2/13 Taman Sutera Utama', 2147483647, 'tkaimeng45@gmail.com', 'IBM4205, PRG4201, SDT4202', 4, '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(10) NOT NULL,
  `subjectname` varchar(30) NOT NULL,
  `credithours` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `adminid` varchar(10) DEFAULT NULL,
  `subjectfee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subjectname`, `credithours`, `semester`, `adminid`, `subjectfee`) VALUES
('CIS3201', 'COMPUTER COMMUNICATION AND NET', 4, 2, 'AD3', 3000),
('CIS4401', 'Network Security', 4, 6, 'AD6', 3000),
('FYP4203 ', 'PROJECT I ', 4, 5, 'AD7', 3000),
('FYP4204', 'PROJECT II', 4, 6, 'AD7', 3000),
('IBM2202', 'Information Security and Ethic', 4, 4, 'AD6', 3000),
('IBM3101', 'Backup and Disaster Recovery', 4, 5, 'AD6', 3000),
('IBM3201', 'DATA MINING AND PREDICTIVE ANA', 4, 2, 'AD5', 3000),
('IBM3202', 'DATA WAREHOUSE&MULTIDIMESIONAL', 4, 3, 'AD3', 3000),
('IBM4102', 'Cloud Security', 4, 6, 'AD8', 3000),
('IBM4103', 'Mobile Application Development', 4, 5, 'AD8', 3000),
('IBM4202', 'WEB PROGRAMMING WITH PHP', 4, 2, 'AD2', 3000),
('IBM4205', 'SOCIAL, WEB & MOBILE ANALYTICS', 4, 1, 'AD2', 3000),
('MPU3253', 'DESIGN THINKING ', 4, 3, 'AD2', 1500),
('MPU3442', 'RIK MANAGEMENT ', 4, 4, 'AD8', 1500),
('PRG4201', 'CONCURRENT & REAL-TIME SYSTEM', 4, 1, 'AD3', 3000),
('SDT2202', 'Graphic Animation', 4, 4, 'AD7', 3000),
('SDT3202', 'SYSTEMS DEVELOPMENT TOOLS AND ', 4, 3, 'AD5', 3000),
('SDT4202', 'SOFTWARE QUALITY', 4, 1, 'AD5', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `week` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`week`) VALUES
('Week1'),
('Week2'),
('Week3'),
('Week4'),
('Week5'),
('Week6'),
('Week7'),
('Week8'),
('Week9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`adminid`),
  ADD KEY `subjectid4` (`subjectid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendid`),
  ADD KEY `subjectid` (`subjectid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `subjectid3` (`subjectid`),
  ADD KEY `adminid2` (`adminid`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`),
  ADD KEY `subjectcode1` (`subjectid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`week`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `classid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`);

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `adminid2` FOREIGN KEY (`adminid`) REFERENCES `admindata` (`adminid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
