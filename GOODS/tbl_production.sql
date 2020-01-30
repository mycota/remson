-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2019 at 11:03 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goods`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

CREATE TABLE `tbl_production` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_production`
--
ALTER TABLE `tbl_production`
  ADD PRIMARY KEY (`proID`),
  ADD UNIQUE KEY `jobNumber` (`jobNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_production`
--
ALTER TABLE `tbl_production`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
