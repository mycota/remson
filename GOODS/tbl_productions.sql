-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2019 at 10:59 AM
-- Server version: 5.5.59
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remson_wrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

CREATE TABLE `tbl_productions` (
  `proID` int(11) NOT NULL,
  `proDate` date NOT NULL,
  `custName` varchar(90) NOT NULL,
  `jobNumber` varchar(20) NOT NULL,
  `line` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `hr` varchar(20) NOT NULL,
  `cutting` varchar(15) NOT NULL,
  `coating` varchar(15) NOT NULL,
  `assemb` varchar(15) NOT NULL,
  `pack` varchar(15) NOT NULL,
  `disp` varchar(15) NOT NULL,
  `glassOrdered` varchar(30) NOT NULL,
  `orderDate` date NOT NULL,
  `deliDate` date NOT NULL,
  `fabricate` varchar(30) NOT NULL,
  `final_date_deli` date NOT NULL,
  `total_tower` int(11) NOT NULL,
  `total_tower_ordered` int(11) NOT NULL,
  `system_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production`
--

INSERT INTO `tbl_productions` (`proID`, `proDate`, `custName`, `jobNumber`, `line`, `type`, `hr`, `cutting`, `coating`, `assemb`, `pack`, `disp`, `glassOrdered`, `orderDate`, `deliDate`, `fabricate`, `final_date_deli`, `total_tower`, `total_tower_ordered`, `system_time`) VALUES
(5, '2019-01-08', 'Zed +', '023', 'SEA', 'B/FC', 'RECTANGLE', 'Done', 'SHREE', 'Done', 'Done', 'Pending', 'PARTY END', '2019-01-08', '2019-01-31', 'HITESH', '2019-02-20', 7, 7, '2019-01-26 11:15:18'),
(6, '2019-01-09', 'ROSCO', 'A36', 'STAR', 'B/W', 'ROUND', 'Done', 'SHREE', 'Done', 'Done', 'Pending', 'RIO', '2019-01-05', '2019-01-30', 'CHIRAG', '2019-02-10', 12, 12, '2019-01-26 11:27:59'),
(7, '2019-01-10', 'WHITE HEAVEN', 'A38', 'SPARK', 'B/FC', 'INCLINE', 'Pending', 'GANESH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-16', '2019-02-16', 'HITESH', '2019-03-10', 12, 12, '2019-01-26 11:27:59'),
(8, '2019-01-07', 'SHREE JI', 'A147', 'SPARK', 'B/FC', 'INCLINE', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'PENDING', '2019-01-31', '2019-02-15', 'CHIRAG', '2019-03-14', 10, 10, '2019-01-26 11:27:59'),
(9, '2019-01-08', 'ORYANA', 'A99', 'STAR', 'B/W', 'HALF ROUND', 'Done', 'SHREE', 'Done', 'Done', 'Pending', 'PENDING', '2019-01-31', '2019-02-22', 'CHIRAG', '2019-02-10', 12, 12, '2019-01-26 11:45:29'),
(10, '2019-01-10', 'APPLE', 'A176', 'SLIM', 'B/W', 'ROUND', 'Done', 'SHREE', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-24', '2019-02-14', 'UMESH BHAI', '2019-03-20', 24, 24, '2019-01-26 11:45:29'),
(11, '2019-01-08', 'PARK VIEW', 'A005', 'SPARK', 'B/W', 'SQUARE', 'Done', 'GANESH', 'Done', 'Done', 'Done', 'RIO', '2019-01-17', '2019-01-24', 'HITESH', '2019-01-31', 7, 7, '2019-01-26 11:45:29'),
(12, '2019-01-10', 'SANKALP GRACE', 'A171', 'SMART', 'F/P', 'SMALL', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-15', '2019-02-08', 'PARTY END', '2019-02-20', 14, 14, '2019-01-26 11:45:29'),
(13, '2019-01-08', 'AWADH COPPER', 'A020', 'SQUARE', 'B/W', 'ROUND', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-23', '2019-02-21', 'CHIRAG', '2019-04-18', 15, 15, '2019-01-26 11:45:29'),
(14, '2019-01-18', 'AWADH CAROLINA', 'A051', 'SQUARE', 'B/W', 'ROUND', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-21', '2019-01-15', 'CHIRAG', '2019-01-25', 20, 20, '2019-01-26 11:45:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_production`
--
ALTER TABLE `tbl_productions`
  ADD PRIMARY KEY (`proID`),
  ADD UNIQUE KEY `jobNumber` (`jobNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_production`
--
ALTER TABLE `tbl_productions`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
