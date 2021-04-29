-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2021 at 11:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--
CREATE DATABASE IF NOT EXISTS `srms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `srms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'admin12345', '2019-02-21 11:00:50'),
(2, '0253', '0253', '2021-04-19 15:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

DROP TABLE IF EXISTS `tblclasses`;
CREATE TABLE IF NOT EXISTS `tblclasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(11, 'JSS1', 1, 'A', '2021-02-09 12:43:15', '0000-00-00 00:00:00'),
(12, 'JSS2', 2, 'A', '2021-02-09 12:43:35', '0000-00-00 00:00:00'),
(13, 'JSS3', 3, 'A', '2021-02-09 12:43:50', '0000-00-00 00:00:00'),
(14, 'SS1', 1, 'A', '2021-02-09 12:44:05', '0000-00-00 00:00:00'),
(15, 'SS2', 2, 'A', '2021-02-09 12:44:18', '0000-00-00 00:00:00'),
(16, 'SS3', 3, 'A', '2021-02-09 12:44:31', '0000-00-00 00:00:00'),
(17, 'JSS1', 1, 'B', '2021-02-09 12:46:54', '0000-00-00 00:00:00'),
(18, 'JSS2', 2, 'B', '2021-02-09 12:47:05', '0000-00-00 00:00:00'),
(19, 'JSS3', 3, 'B', '2021-02-09 12:47:15', '0000-00-00 00:00:00'),
(20, 'SS1', 1, 'B', '2021-02-09 12:47:26', '0000-00-00 00:00:00'),
(21, 'SS2', 2, 'B', '2021-02-09 12:47:36', '0000-00-00 00:00:00'),
(22, 'SS3', 3, 'B', '2021-02-09 12:47:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

DROP TABLE IF EXISTS `tblresult`;
CREATE TABLE IF NOT EXISTS `tblresult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(22, 7, 9, 10, 100, '2019-02-21 12:38:59', NULL),
(23, 7, 9, 9, 90, '2019-02-21 12:38:59', NULL),
(24, 7, 9, 8, 99, '2019-02-21 12:38:59', NULL),
(25, 8, 10, 10, 90, '2019-02-21 12:39:15', NULL),
(26, 8, 10, 9, 90, '2019-02-21 12:39:15', NULL),
(27, 8, 10, 8, 100, '2019-02-21 12:39:15', NULL),
(28, 10, 11, 17, 90, '2021-02-09 13:13:00', NULL),
(29, 10, 11, 9, 40, '2021-02-09 13:13:00', NULL),
(30, 10, 11, 15, 20, '2021-02-09 13:13:01', NULL),
(31, 10, 11, 16, 50, '2021-02-09 13:13:01', NULL),
(32, 10, 11, 16, 60, '2021-02-09 13:13:01', NULL),
(33, 10, 11, 8, 70, '2021-02-09 13:13:01', NULL),
(34, 12, 14, 13, 50, '2021-02-10 10:50:10', NULL),
(35, 12, 14, 10, 50, '2021-02-10 10:50:10', NULL),
(36, 12, 14, 11, 60, '2021-02-10 10:50:10', NULL),
(37, 12, 14, 14, 70, '2021-02-10 10:50:10', NULL),
(38, 12, 14, 9, 80, '2021-02-10 10:50:10', NULL),
(39, 12, 14, 8, 90, '2021-02-10 10:50:10', NULL),
(40, 12, 14, 12, 100, '2021-02-10 10:50:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsession`
--

DROP TABLE IF EXISTS `tblsession`;
CREATE TABLE IF NOT EXISTS `tblsession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SectionName` varchar(30) NOT NULL,
  `CreationDate` date NOT NULL,
  `UpdationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsession`
--

INSERT INTO `tblsession` (`id`, `SectionName`, `CreationDate`, `UpdationDate`) VALUES
(1, '2020/2021', '2021-04-18', '2021-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

DROP TABLE IF EXISTS `tblstudents`;
CREATE TABLE IF NOT EXISTS `tblstudents` (
  `StudentId` int(11) NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(100) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SectionName` varchar(30) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `Occopation` varchar(30) NOT NULL,
  `Studentimage_url` text NOT NULL,
  `StateOrigin` varchar(30) NOT NULL,
  `LocalGA` varchar(30) NOT NULL,
  PRIMARY KEY (`StudentId`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `LastName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `SectionName`, `RegDate`, `UpdationDate`, `Status`, `FName`, `Address`, `PHONE`, `Occopation`, `Studentimage_url`, `StateOrigin`, `LocalGA`) VALUES
(28, 'Aliyu', 'Gambo', '002', 'gmaboaliyu00@gmail.com', 'Male', '2000-02-21', 11, '1', '2021-04-21 11:32:07', NULL, 1, 'Gambo', 'Arkilla State Low-cost Area Sokoto', '09026847322', 'civil servant', 'IMG-60800d37b30e85.64584847.jpg', '', ''),
(29, 'umar', 'tukur', '003', 'umartukur55@gmail.com', 'Male', '2000-06-12', 11, '1', '2021-04-21 14:14:22', NULL, 1, 'tukur', 'Arkilla State Low-cost Area Sokoto', '07062909727', 'civil servant', 'IMG-6080333eee1190.98854731.jpg', 'Taraba', 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

DROP TABLE IF EXISTS `tblsubjectcombination`;
CREATE TABLE IF NOT EXISTS `tblsubjectcombination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(28, 9, 8, 1, '2019-02-21 12:38:21', '2019-02-21 12:38:21'),
(29, 9, 9, 1, '2019-02-21 12:38:26', '2019-02-21 12:38:26'),
(30, 9, 10, 1, '2019-02-21 12:38:31', '2019-02-21 12:38:31'),
(31, 10, 8, 1, '2019-02-21 12:38:35', '2019-02-21 12:38:35'),
(32, 10, 9, 1, '2019-02-21 12:38:38', '2019-02-21 12:38:38'),
(33, 10, 10, 1, '2019-02-21 12:38:42', '2019-02-21 12:38:42'),
(34, 9, 8, 1, '2021-02-09 01:10:09', '2021-02-09 01:10:09'),
(35, 11, 8, 1, '2021-02-09 12:53:14', '2021-02-09 12:53:14'),
(36, 11, 9, 1, '2021-02-09 12:53:23', '2021-02-09 12:53:23'),
(37, 11, 15, 1, '2021-02-09 12:53:36', '2021-02-09 12:53:36'),
(38, 11, 16, 1, '2021-02-09 12:53:44', '2021-02-09 12:53:44'),
(39, 11, 16, 1, '2021-02-09 12:53:52', '2021-02-09 12:53:52'),
(40, 11, 17, 1, '2021-02-09 12:53:58', '2021-02-09 12:53:58'),
(41, 12, 8, 1, '2021-02-09 12:54:06', '2021-02-09 12:54:06'),
(42, 12, 9, 1, '2021-02-09 12:54:13', '2021-02-09 12:54:13'),
(43, 12, 15, 1, '2021-02-09 12:54:20', '2021-02-09 12:54:20'),
(44, 12, 16, 1, '2021-02-09 12:54:32', '2021-02-09 12:54:32'),
(45, 12, 17, 1, '2021-02-09 12:54:41', '2021-02-09 12:54:41'),
(46, 14, 8, 1, '2021-02-10 10:48:27', '2021-02-10 10:48:27'),
(47, 14, 9, 1, '2021-02-10 10:48:34', '2021-02-10 10:48:34'),
(48, 14, 10, 1, '2021-02-10 10:48:52', '2021-02-10 10:48:52'),
(49, 11, 11, 1, '2021-02-10 10:48:59', '2021-02-10 10:48:59'),
(50, 14, 11, 1, '2021-02-10 10:49:09', '2021-02-10 10:49:09'),
(51, 14, 12, 1, '2021-02-10 10:49:17', '2021-02-10 10:49:17'),
(52, 14, 13, 1, '2021-02-10 10:49:24', '2021-02-10 10:49:24'),
(53, 14, 14, 1, '2021-02-10 10:49:33', '2021-02-10 10:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

DROP TABLE IF EXISTS `tblsubjects`;
CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(8, 'Maths', 'Maths01', '2019-02-21 12:35:15', '2019-03-14 19:50:31'),
(9, 'English', 'Eng11', '2019-02-21 12:35:25', '0000-00-00 00:00:00'),
(10, 'Biology', 'Bio12', '2019-02-21 12:35:40', '0000-00-00 00:00:00'),
(11, 'Chemistry', 'CHM101', '2021-02-09 12:49:33', '0000-00-00 00:00:00'),
(12, 'Physics', 'PHY101', '2021-02-09 12:49:49', '0000-00-00 00:00:00'),
(13, 'Animal Husbandary', 'AHY101', '2021-02-09 12:50:41', '0000-00-00 00:00:00'),
(14, 'Computer', 'CMP101', '2021-02-09 12:51:01', '0000-00-00 00:00:00'),
(15, 'Interscience', 'Inter101', '2021-02-09 12:51:38', '0000-00-00 00:00:00'),
(16, 'Introtech', 'INTRO101', '2021-02-09 12:52:27', '0000-00-00 00:00:00'),
(17, 'Business Studies', 'BS101', '2021-02-09 12:52:56', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
