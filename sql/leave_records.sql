-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2014 at 06:34 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leave_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_record`
--

CREATE TABLE IF NOT EXISTS `leave_record` (
  `Leave_Form_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Emp_ID` int(20) NOT NULL,
  `Emp_Name` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `Days_of_Vacation` int(10) NOT NULL,
  `Leave_Attachements` varchar(100) NOT NULL,
  `Date_From` varchar(50) NOT NULL,
  `Date_To` varchar(50) NOT NULL,
  `Current_Date` varchar(50) NOT NULL,
  PRIMARY KEY (`Leave_Form_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `leave_record`
--

INSERT INTO `leave_record` (`Leave_Form_ID`, `Emp_ID`, `Emp_Name`, `Position`, `Location`, `Remarks`, `Days_of_Vacation`, `Leave_Attachements`, `Date_From`, `Date_To`, `Current_Date`) VALUES
(2, 2, 'Saleem Malikyar', 'IT Officer', 'Kabul, Afganistan', 'Personal Work', 5, '', '10-08-2014', '15-08-2014', '03-08-2014'),
(4, 1, 'Naim Faizy', 'Web Developer', 'Kabul, Afganistan', 'Some work', 2, '', '20-08-2014', '22-08-2014', '05-08-2014'),
(5, 3, 'Ali Akbar Sakhi', 'IT Specialist', 'Kabul, Afganistan', 'Some Work', 5, '', '02-08-2014', '06-08-2014', '05-08-2014'),
(6, 7, 'Ali Abullah', 'IT Assistant', 'Parwan, Afghanistan', 'Sickness', 2, '', '05-08-2014', '07-08-2014', '05-08-2014'),
(7, 878, 'Ahmad Fahim', 'IT Officer', 'Kabul, Afganistan', 'Some Private Work outside of Office', 2, '', '05-08-2014', '07-08-2014', '05-08-2014');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(12) NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_ID`, `Username`, `Password`, `Status`) VALUES
(1, 'Admin', 'admin', 'Active'),
(2, 'admin', 'admin', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
