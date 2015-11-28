
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 12:53 PM
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
-- Table structure for table `f_jobfunction`
--

CREATE TABLE IF NOT EXISTS `f_jobfunction` (
  `Id` int(11) NOT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `IsUsed` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `f_jobfunction`
--

INSERT INTO `f_jobfunction` (`Id`, `Description`, `IsUsed`) VALUES
(1, 'Accounting/Tax/Audit', 1),
(2, 'Finance/Insurance', 1),
(3, 'Online/Offline Marketing/Media Planning', 1),
(4, 'Sales/ Business Development', 1),
(5, 'Advertising/Public Relation/Events', 1),
(7, 'Front office staff/Computer Operator', 1),
(8, 'Administration/Operations', 1),
(9, 'Retail Services', 1),
(10, 'Entertainment/Media', 1),
(11, 'Education/Teacher/Professors/Academics', 1),
(12, 'PO/TeleCaller/Customer Care', 1),
(13, 'Logistics/Supply Chain/Procurement', 1),
(14, 'Export/Import', 1),
(15, 'Content writers/Journalists', 1),
(16, 'IT-Software', 1),
(17, 'IT-Hardware', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
