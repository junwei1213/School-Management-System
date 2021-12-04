-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 07:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `adminid` varchar(10) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `phone` int(10) NOT NULL,
  `subjectid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`adminid`, `admin_name`, `password`, `phone`, `subjectid`) VALUES
('AD123', 'ooi', '6ffb1ab37230580ccb5db4286ddcf90c1c11439c', 1137360878, 'ICT2202'),
('AD456', 'tan', '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33', 10010111, 'MPU');

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
(1, 'ICT2202', 'Class1', 'I1801552', '0000-00-00 00:00:00', 0),
(2, 'ICT2202', 'Class1', 'I1801552', '0000-00-00 00:00:00', 0),
(3, 'ICT2202', 'Class1', 'I18015553', '2021-11-03 10:12:16', 1),
(7, 'ICT2202', 'Class2', 'I1801552', '2021-11-05 07:51:21', 1),
(8, 'ICT2202', 'Class2', 'I18015553', '2021-11-08 15:11:15', 1),
(9, 'ICT2202', 'Class2', 'I18015554', '2021-11-11 17:02:16', 1);

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
(28, 'jhaksdjhsjdh', 'online class', '2021-11-03 17:09:00', '2021-11-03 19:11:00', 'ICT2202', '../temp/ICT2202.Class1.png', 'Class1', 'AD123'),
(29, 'sadasda', 'online class', '2021-11-05 14:49:00', '2021-11-05 14:51:00', 'ICT2202', '../temp/ICT2202.Class2.png', 'Class2', 'AD123'),
(30, 'helaldkasjdlkajsflaf', 'online class', '2021-11-10 15:03:00', '2021-11-10 15:06:00', 'IBM4223', '../temp/IBM4223.Class1.png', 'Class1', 'AD123'),
(31, 'akshdkafsasf', 'online class', '2021-11-10 18:02:00', '2021-11-10 18:05:00', 'ICT2202', '../temp/ICT2202.Class4.png', 'Class4', 'AD123');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `studentid` varchar(10) NOT NULL,
  `subjectid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `studentid`, `subjectid`) VALUES
(25, 'I18015553', 'ABM, IBM4222, IBM4223'),
(26, 'I18015553', 'ABM, IBM4222, IBM4223');

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

INSERT INTO `student` (`studentid`, `studentname`, `studentic`, `modeofstudy`, `session`, `program`, `level`, `address`, `phone`, `email`, `subjectid`, `credithours`, `password`) VALUES
('I1801552', 'ooi', 0, '', 'Nov2021', '', '', 'a;skdjakd', 1137360878, 'daidaiyue69@gmail.com', 'ABM', 20, '6ffb1ab37230580ccb5db4286ddcf90c1c11439c'),
('I18015553', 'tan', 13221321, 'Full Time', 'Nov2021', 'BISC', 'DIPLOMA', 'dasdsdqqqq', 11223445, 'daidaiyue69@gmail.com', 'ABM, IBM4222, IBM4223', 20, '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33'),
('I18015554', 'abc', 0, '', '', '', '', '43, Jalan Hang Jebat 29, Taman Skudai Ba', 183941611, '', NULL, NULL, 'a9993e364706816aba3e25717850c26c9cd0d89d'),
('I18015555', 'qqq', 0, '', '', '', '', '43,JALAN HANG JEBAT 29,TAMAN SKUDAI', 1137360878, 'daidaiyue69@gmail.com', NULL, NULL, 'a056c8d05ae9ac6ca180bc991b93b7ffe37563e0');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(10) NOT NULL,
  `subjectname` varchar(30) NOT NULL,
  `credithours` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `adminid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subjectname`, `credithours`, `semester`, `adminid`) VALUES
('ABM', 'IT MASS', 4, 1, ''),
('IBM4222', 'WEB PROGRAMMING WITH PHP', 4, 1, ''),
('IBM4223', 'IT', 4, 1, ''),
('ICT2202', 'IT Management', 4, 2, 'AD123'),
('ITM4209', 'MissCom', 4, 2, ''),
('MPU', 'PRGlasklkfja', 2, 2, 'AD456'),
('MPU3302', 'Tamadun Islam', 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `test_work`
--

CREATE TABLE `test_work` (
  `ename` varchar(10) NOT NULL,
  `sal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_work`
--

INSERT INTO `test_work` (`ename`, `sal`) VALUES
('bill', 100),
('bill', 259),
('bill', 400),
('James', 50),
('tom', 100),
('tom', 200);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `Subject_Name` varchar(50) NOT NULL,
  `Lecture_Day` varchar(50) NOT NULL,
  `Lecture_Start` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `Subject_Name`, `Lecture_Day`, `Lecture_Start`) VALUES
(1, 'ICT 2201', '0000-00-00', '09:00:00'),
(2, 'ICT 2201', 'Monday', '09:00:00'),
(3, 'IBM 4420', 'Wednesday', '14:15:00'),
(4, 'MPU 2204', 'Friday', '12:30:00'),
(5, 'ICT 2209', 'Tuesday', '12:30:00');

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
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `classid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admindata`
--
ALTER TABLE `admindata`
  ADD CONSTRAINT `subjectid4` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`subjectid`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `studentid` FOREIGN KEY (`studentid`) REFERENCES `student` (`studentid`),
  ADD CONSTRAINT `subjectid` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`subjectid`);

--
-- Constraints for table `class_list`
--
ALTER TABLE `class_list`
  ADD CONSTRAINT `adminid2` FOREIGN KEY (`adminid`) REFERENCES `admindata` (`adminid`),
  ADD CONSTRAINT `subjectid3` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`subjectid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
