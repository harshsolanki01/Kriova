-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2022 at 10:30 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kriova`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeName` varchar(30) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Pincode` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `EmployeeName`, `DateOfBirth`, `Email`, `PhoneNumber`, `Street`, `City`, `State`, `Country`, `Pincode`) VALUES
(1, 'Sachin Garg', '2000-06-20', 'sachin@gmail.com', '+910222431851', '2, Gokul Niwas, Chhabildas Rd, Dadar(w)', 'Mumbai', 'Maharashtra', 'India', 400028),
(2, 'Deepanshu Batra', '1996-11-20', 'deepanshu@gmail.com', '+911141545454', 'I 107, Kirti Nagar', 'Delhi', 'Delhi', 'India', 110015),
(3, 'Kapil Dangi', '1998-03-20', 'kapil@gmail.com', '+912222058783', '229 Copper Bldg, Kalbadevi', 'Mumbai', 'Maharashtra', 'India', 400002),
(4, 'Vishal Basondiya', '2001-08-20', 'vishal@gmail.com', '+913322101033', '7a, 3rd Floor, Bentinck Street', 'Kolkata', 'West Bengal', 'India', 700001),
(5, 'Ajay Sharma', '1994-12-20', 'ajay@gmail.com', '+912228501213', '92, 92 Marol Co-op Indl Estate, M V Rd, J.b.nagar', 'Mumbai', 'Maharashtra', 'India', 400059),
(6, 'Ashwani Mishra', '1996-11-20', 'ashwani@gmail.com', '+917922245241', '58, Bileshwar Estate, Odhav-Kathlal Road', 'Ahmedabad', 'Gujarat', 'India', 382415),
(7, 'Anoop Singh', '1993-10-20', 'anoop@gmail.com', '+918022261821', 'G1,19, Industry House,r C Road, Kumarakripa Road', 'Bangalore', 'Karnataka', 'India', 560001),
(8, 'Ravinder Singh', '1999-06-20', 'ravinder@gmail.com', '+911125117936', 'B52, Vardhman Plaza, Rajouri Garden', 'Delhi', 'Delhi', 'India', 110027),
(9, 'Manjul Singla', '1996-12-03', 'manjul@gmail.com', '+912227464899', 'A/128, Nit, Dabua Colony, Faridabad', 'Delhi', 'Haryana', 'India', 121001),
(10, 'Hardeep Suksma', '1991-06-15', 'hardeep@gmail.com', '+912222047333', '1004, 10th Floor, Dalamal Towers, Nariman Point', 'Bangalore', 'Karnataka', 'India', 560027);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `pass`) VALUES
(1, 'Sachin Garg', 'sachin@gmail.com', '', 'password'),
(2, 'Deepanshu Batra', 'deepanshu@gmail.com', '', 'password'),
(3, 'Kapil Dangi', 'kapil@gmail.com', '', 'password'),
(4, 'Vishal Basondiya', 'vishal@gmail.com', '', 'password'),
(5, 'Ajay Sharma', 'ajay@gmail.com', '', 'password'),
(6, 'Ashwani Mishra', 'ashwani@gmail.com', '', 'password'),
(7, 'Anoop Singh', 'anoop@gmail.com', '', 'password'),
(8, 'Ravinder Singh', 'ravinder@gmail.com', '', 'password'),
(9, 'Manjul Singla', 'manjul@gmail.com', '', 'password'),
(10, 'Hardeep Suksma', 'hardeep@gmail.com', '', 'password');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
