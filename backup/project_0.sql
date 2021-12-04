-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 09:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
(8, 'ICT2202', 'Class2', 'I18015553', '0000-00-00 00:00:00', 0),
(9, 'ICT2202', 'Class2', 'I18015554', '0000-00-00 00:00:00', 0);

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
(29, 'sadasda', 'online class', '2021-11-05 14:49:00', '2021-11-05 14:51:00', 'ICT2202', '../temp/ICT2202.Class2.png', 'Class2', 'AD123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(10) NOT NULL,
  `studentname` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `subjectid` varchar(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `address`, `phone`, `subjectid`, `password`) VALUES
('I1801552', 'ooi', 'a;skdjakd', 1137360878, 'ICT2202', '6ffb1ab37230580ccb5db4286ddcf90c1c11439c'),
('I18015553', 'tan', 'asdjlk', 112234455, 'ICT2202', '35ca8cf12ff7ebe96d1bd7602a1968f756f4af33'),
('I18015554', 'abc', '43, Jalan Hang Jebat 29, Taman Skudai Ba', 183941611, 'ICT2202', 'a9993e364706816aba3e25717850c26c9cd0d89d');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` varchar(10) NOT NULL,
  `subjectname` varchar(30) NOT NULL,
  `adminid` varchar(10) NOT NULL,
  `studentid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subjectname`, `adminid`, `studentid`) VALUES
('ICT2202', 'IT Management', 'AD123', ''),
('MPU', 'PRGlasklkfja', 'AD456', '');

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

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
  MODIFY `classid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
