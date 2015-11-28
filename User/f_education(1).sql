
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 12:52 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u881278775_blinx`
--

-- --------------------------------------------------------

--
-- Table structure for table `f_education`
--

CREATE TABLE IF NOT EXISTS `f_education` (
  `Id` int(11) NOT NULL,
  `Description` varchar(20) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `f_education`
--

INSERT INTO `f_education` (`Id`, `Description`, `IsUsed`) VALUES
(1, 'Below SSLC', 1),
(2, 'SSLC', 1),
(3, 'Plus one', 1),
(4, 'Plus Two', 1),
(5, 'B.A', 1),
(6, 'B.Arch', 1),
(7, 'BCA', 1),
(8, 'BBA', 1),
(9, 'B.Com', 1),
(10, 'B.Ed', 1),
(11, 'BDS', 1),
(12, 'BHM', 1),
(13, 'B.Pharma', 1),
(14, 'B.Sc', 1),
(15, 'B.Tech/B.E', 1),
(16, 'LLB', 1),
(17, 'Diploma', 1),
(18, 'MBBS', 1),
(19, 'M.A', 1),
(20, 'M.Arch', 1),
(21, 'M.Com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
