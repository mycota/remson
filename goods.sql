-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2019 at 10:31 AM
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
-- Table structure for table `tbl_agentOrders`
--

CREATE TABLE `tbl_agentOrders` (
  `agentOrdID` int(11) NOT NULL,
  `agentOrdCode` int(11) NOT NULL,
  `agentCustid` int(11) NOT NULL,
  `agentID` int(11) NOT NULL,
  `grlassType` varchar(20) NOT NULL,
  `glasSize1` varchar(20) NOT NULL,
  `glasSize2` varchar(50) NOT NULL,
  `approxiRFT` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productType` varchar(50) NOT NULL,
  `productCover` varchar(50) NOT NULL,
  `handrail` varchar(20) NOT NULL,
  `productColor` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `ordStatus` varchar(20) NOT NULL,
  `agentOrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agentOrders`
--

INSERT INTO `tbl_agentOrders` (`agentOrdID`, `agentOrdCode`, `agentCustid`, `agentID`, `grlassType`, `glasSize1`, `glasSize2`, `approxiRFT`, `productName`, `productType`, `productCover`, `handrail`, `productColor`, `color`, `ordStatus`, `agentOrderDate`) VALUES
(1, 1554298240, 1, 4, 'LAMINATED', 'PVB', '8 MM + 1.52 PVB + 8 MM + 1.52 PVB + 8 MM', 190, 'SEA LINE BRACKET  PROFILE', 'SEA LINE BRACKET PROFILE ', 'FULL OR BRACKET WISE ', 'ROUND HAND RAIL', 'ANODISED', 'Silver ', 'Pending', '2019-04-03 13:30:40'),
(2, 1554298802, 2, 4, 'TOUGHENED', '10 MM TOUGHENED ', '', 300, 'SQUARE LINE BRACKET ', 'SQUARE LINE BRACKET PROFILE ', 'FULL OR BRACKET WISE ', 'SMALL HAND RAIL', 'WOODEN', 'Light ', 'Pending', '2019-04-03 13:40:02'),
(3, 1554299471, 3, 4, 'LAMINATED', 'SENTRY', '5 MM + 0.89 SENTRY + 5 MM', 450, 'STAR LINE BRACKET PROFILE', 'STAR LINE BRACKET PROFILE ', 'FULL OR BRACKET WISE ', 'SLIM HAND RAIL', 'ANODISED', 'RAL ', 'Pending', '2019-04-03 13:51:11'),
(5, 1554402009, 7, 4, 'TOUGHENED', '12 MM TOUGHENED ', '', 45, 'SQUARE LINE BRACKET PROFILE', 'SQUARE LINE BRACKET PROFILE ', 'FULL OR BRACKET WISE ', 'SMALL HAND RAIL', 'POWDER COATING', 'Raw ', 'Pending', '2019-04-04 18:20:09'),
(6, 1554402249, 8, 4, 'LAMINATED', 'PVB', '8 MM + 1.52 PVB + 8 MM + 1.52 PVB + 8 MM', 235, 'SLEEK LINE CONTINUE PROFILE', 'SLEEK LINE BRACKET WISE ', 'FULL OR BRACKET WISE ', 'SMALL HAND RAIL', 'POWDER COATING', 'Raw ', 'Pending', '2019-04-04 18:24:09'),
(7, 1554628131, 9, 4, 'TOUGHENED', '10 MM TOUGHENED ', '', 50, 'SQUARE LINE BRACKET PROFILE', 'SQUARE LINE BRACKET PROFILE ', 'FULL OR BRACKET WISE ', 'EDGE GUARD HAND RAIL', 'POWDER COATING', 'Raw ', 'Pending', '2019-04-07 09:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agentOrders_railing`
--

CREATE TABLE `tbl_agentOrders_railing` (
  `agentOrdIDRail` int(11) NOT NULL,
  `agentOrdCodeRail` int(11) NOT NULL,
  `shapeImage` varchar(50) NOT NULL,
  `bracket75Qty` int(11) NOT NULL,
  `bracket100Qty` int(11) NOT NULL,
  `bracket150Qty` int(11) NOT NULL,
  `bracketOther` varchar(50) NOT NULL,
  `bracketOtherQty` int(11) NOT NULL,
  `sideCover` varchar(50) NOT NULL,
  `sideCoverQty` int(11) NOT NULL,
  `accesWCQty` int(11) NOT NULL,
  `accesCornerQty` int(11) NOT NULL,
  `accesConnectorQty` int(11) NOT NULL,
  `accesEndcapQty` int(11) NOT NULL,
  `handRail` varchar(50) NOT NULL,
  `handRailQty` int(11) NOT NULL,
  `railingNo` int(11) NOT NULL,
  `glassheight` varchar(40) NOT NULL,
  `systemTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agentOrders_railing`
--

INSERT INTO `tbl_agentOrders_railing` (`agentOrdIDRail`, `agentOrdCodeRail`, `shapeImage`, `bracket75Qty`, `bracket100Qty`, `bracket150Qty`, `bracketOther`, `bracketOtherQty`, `sideCover`, `sideCoverQty`, `accesWCQty`, `accesCornerQty`, `accesConnectorQty`, `accesEndcapQty`, `handRail`, `handRailQty`, `railingNo`, `glassheight`, `systemTime`) VALUES
(1, 1554298240, 'lshape.png', 230, 230, 120, 'Anything', 100, 'FULL SIDE COVER', 343, 120, 200, 89, 340, 'SQUARE HAND RAIL', 0, 1, '', '2019-04-03 13:30:40'),
(2, 1554298802, 'lshape.png', 455, 233, 232, 'Anything or that', 345, 'BRACKET WISE', 34, 273, 547, 678, 546, 'HALF ROUND HAND RAIL', 56, 1, '', '2019-04-03 13:40:02'),
(3, 1554298802, 'ctype2.png', 0, 4848, 447, 'More of size', 365, 'BRACKET WISE', 345, 474, 788, 443, 678, 'SQUARE HAND RAIL', 567, 2, '', '2019-04-03 13:40:02'),
(4, 1554298802, 'sline2.png', 0, 647, 434, 'All', 4747, 'FULL SIDE COVER', 344, 546, 2367, 374, 67, 'SMALL HAND RAIL', 24, 3, '', '2019-04-03 13:40:02'),
(5, 1554299471, 'sline2.png', 566, 679, 67, 'lot', 67, 'FULL SIDE COVER', 700, 267, 13, 67, 89, 'EDGE GUARD HAND RAIL', 800, 1, '', '2019-04-03 13:51:11'),
(6, 1554402009, 'sline2.png', 34, 34, 34, '', 344, 'FULL SIDE COVER', 34, 3, 334, 34, 34, 'SQUARE HAND RAIL', 34, 1, '', '2019-04-04 18:20:09'),
(7, 1554402249, 'sline2.png', 34, 34, 34, 'Adee', 5, 'BRACKET WISE', 454, 34, 34, 343, 343, 'SQUARE HAND RAIL', 54, 1, '', '2019-04-04 18:24:09'),
(8, 1554402249, 'sline2.png', 34, 4534, 45, 'More', 44, 'FULL SIDE COVER', 34, 454, 45, 45, 45, 'SQUARE HAND RAIL', 34, 2, '', '2019-04-04 18:24:09'),
(9, 1554402249, 'lshape.png', 67, 2, 34, 'Too', 45, 'FULL SIDE COVER', 34, 5, 4, 45, 4, 'ROUND HAND RAIL', 34, 3, '', '2019-04-04 18:24:09'),
(11, 1554402009, 'sline2.png', 0, 0, 0, '', 0, 'BRACKET WISE', 23, 0, 0, 0, 0, 'SQUARE HAND RAIL', 45, 2, '', '2019-04-05 19:30:13'),
(12, 1554402009, 'ctype2.png', 0, 0, 0, '', 0, 'FULL SIDE COVER', 500, 0, 0, 0, 0, 'RECTANGLE HAND RAIL', 600, 3, '', '2019-04-05 19:34:27'),
(13, 1554298240, 'sline2.png', 0, 0, 0, '', 0, 'FULL SIDE COVER', 567, 0, 0, 0, 0, 'SQUARE HAND RAIL', 908, 2, '', '2019-04-07 06:39:19'),
(14, 1554298240, 'lshape.png', 4567, 3536, 64646, '', 0, 'BRACKET WISE', 43636, 3646, 646, 46746, 4646, 'EDGE GUARD HAND RAIL', 3567, 3, '', '2019-04-07 06:40:13'),
(21, 1554299471, 'lshape.png', 0, 0, 0, '', 0, 'FULL SIDE COVER', 600, 0, 0, 0, 0, 'INCLINE HAND RAIL', 660, 2, '', '2019-04-07 08:05:55'),
(23, 1554299471, 'sline2.png', 0, 0, 0, '', 0, 'FULL SIDE COVER', 5000, 0, 0, 0, 0, 'SLIM HAND RAIL', 6000, 3, '', '2019-04-07 08:47:24'),
(24, 1554628131, 'sline2.png', 23, 0, 0, '', 0, 'FULL SIDE COVER', 2536, 45, 0, 0, 0, 'SMALL HAND RAIL', 546, 1, '', '2019-04-07 09:08:51'),
(25, 1554628131, 'lshape.png', 647, 0, 0, '', 0, 'BRACKET WISE', 56, 778, 0, 0, 0, 'SLIM HAND RAIL', 758, 2, '', '2019-04-07 09:08:51'),
(26, 1554628131, 'lshape.png', 566, 0, 0, '', 0, 'FULL SIDE COVER', 546, 677, 0, 0, 0, 'SQUARE HAND RAIL', 647, 3, '', '2019-04-07 09:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent_customer`
--

CREATE TABLE `tbl_agent_customer` (
  `agentCust_ID` int(11) NOT NULL,
  `agentCode` int(11) NOT NULL,
  `partyName` varchar(50) NOT NULL,
  `billingName` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `billingAddress` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `agentCustPhone` varchar(10) NOT NULL,
  `agentCustEmail` varchar(50) NOT NULL,
  `agentLastOrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `agentCustCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_agent_customer`
--

INSERT INTO `tbl_agent_customer` (`agentCust_ID`, `agentCode`, `partyName`, `billingName`, `place`, `billingAddress`, `ref`, `agentCustPhone`, `agentCustEmail`, `agentLastOrderDate`, `agentCustCreateDate`) VALUES
(1, 4, 'Adamu Mohammed', 'New Delhi', 'Delhi', 'Main Road', '', '', '', '2019-04-04 15:19:26', '2019-04-03 13:30:40'),
(2, 4, 'Adamu Mohammed', 'New Delhi', 'Delhi', 'Main Road Top', '', '', '', '2019-04-04 15:19:33', '2019-04-03 13:40:02'),
(3, 4, 'Adamu Mohammed', 'New Delhi', 'Delhi', 'More top ', '', '', '', '2019-04-04 15:19:41', '2019-04-03 13:51:11'),
(4, 4, 'we', 'wqe', 'wew', 'wew', '', '', '', '2019-04-04 18:07:22', '2019-04-04 18:07:22'),
(5, 4, 'we', 'wqe', 'wew', 'wew', '', '', '', '2019-04-04 18:10:22', '2019-04-04 18:10:22'),
(6, 4, 'we', 'wqe', 'wew', 'wew', '', '', '', '2019-04-04 18:14:49', '2019-04-04 18:14:49'),
(7, 4, 'we', 'wqe', 'wew', 'wew', '', '', '', '2019-04-04 18:20:09', '2019-04-04 18:20:09'),
(8, 4, 'Perry', 'Fleming', 'Mim', 'Town Hall 3', '', '', '', '2019-04-07 08:08:00', '2019-04-04 18:24:09'),
(9, 5, 'Ansu Peprah', 'Ansu Ent.', 'Amasu', 'Main Building', '', '', '', '2019-04-07 12:46:57', '2019-04-07 09:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_details`
--

CREATE TABLE `tbl_customer_details` (
  `custID` int(11) NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `custName` varchar(50) NOT NULL,
  `siteName` varchar(50) NOT NULL,
  `custAddress` varchar(50) NOT NULL,
  `custPhone` varchar(10) NOT NULL,
  `custEmail` varchar(50) DEFAULT NULL,
  `custRep` varchar(45) NOT NULL,
  `currentBal` float NOT NULL,
  `lastUpdade` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `custDel` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_details`
--

INSERT INTO `tbl_customer_details` (`custID`, `customerID`, `custName`, `siteName`, `custAddress`, `custPhone`, `custEmail`, `custRep`, `currentBal`, `lastUpdade`, `dateCreated`, `custDel`) VALUES
(2, 'REM-2', 'M Tectky', 'HQ', 'Box 2234', '0998876655', 'adamu@yt.com', 'gfhfh', 0, '2019-02-09 04:27:24', '2019-02-03 19:25:31', ''),
(3, 'REM-3', 'Charlse Spurgen', 'Main Site', 'High street Rajkot', '4567890', 'spur@gmail.com', 'Ama', 0, '2019-02-04 05:54:59', '2019-02-03 19:54:31', ''),
(4, 'REM-4', 'Victoria Drumo', 'Old Site', 'Osu High Street', '54135663', 'vic.90@gmail.com', 'Ama', 0, '2019-03-10 18:42:58', '2019-03-10 18:05:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `log_action` varchar(5000) NOT NULL,
  `ipaddress` varchar(35) NOT NULL,
  `macaddress` varchar(35) NOT NULL,
  `log_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `userID`, `user_name`, `log_action`, `ipaddress`, `macaddress`, `log_datetime`) VALUES
(1, 4, '123', 'Updated (railing 2), added (railing 3) and others updated before processing on order: 1554299471', '::1 | ::1', '', '2019-04-07 08:36:24'),
(2, 4, '123', 'View pending order', '::1 | ::1', '', '2019-04-07 08:36:32'),
(3, 4, '123', 'Updated (railing 2), added (railing 3) and others updated before processing on order: 1554299471', '::1 | ::1', '', '2019-04-07 08:47:24'),
(4, 4, '123', 'View pending order', '::1 | ::1', '', '2019-04-07 08:47:33'),
(5, 4, '123', 'Updated (railing 2 and 3) before processing on order: 1554299471', '::1 | ::1', '', '2019-04-07 08:48:54'),
(6, 4, '123', 'View pending order', '::1 | ::1', '', '2019-04-07 08:49:00'),
(7, 4, '123', 'View order: 1554298240', '::1 | ::1', '', '2019-04-07 08:52:08'),
(8, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 08:52:29'),
(9, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 08:52:52'),
(10, 4, '123', 'Agent place order for processing.: 1554628131', '::1 | ::1', '', '2019-04-07 09:08:51'),
(11, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:09:01'),
(12, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:09:05'),
(13, 4, '123', 'View pending order: 1554628131', '::1 | ::1', '', '2019-04-07 09:09:07'),
(14, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 09:15:32'),
(15, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:25:19'),
(16, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:25:21'),
(17, 4, '123', 'View pending order: 1554628131', '::1 | ::1', '', '2019-04-07 09:25:23'),
(18, 4, '123', 'View pending order: 1554628131', '::1 | ::1', '', '2019-04-07 09:25:53'),
(19, 4, '123', 'Updated (railing 2 and 3) and others updated before processing on order: 1554628131', '::1 | ::1', '', '2019-04-07 09:25:53'),
(20, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:25:55'),
(21, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:39:41'),
(22, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:39:44'),
(23, 4, '123', 'Updated (railing 2 and 3) and others updated before processing on order: 1554298240', '::1 | ::1', '', '2019-04-07 09:39:44'),
(24, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:39:54'),
(25, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:40:24'),
(26, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:40:30'),
(27, 4, '123', 'Updated (railing 2 and 3) and others updated before processing on order: 1554298240', '::1 | ::1', '', '2019-04-07 09:40:30'),
(28, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:40:32'),
(29, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:51:06'),
(30, 4, '123', 'View pending order: 1554298240', '::1 | ::1', '', '2019-04-07 09:51:12'),
(31, 4, '123', 'Updated (railing 2 and 3) and others updated before processing on order: 1554298240', '::1 | ::1', '', '2019-04-07 09:51:12'),
(32, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 09:51:14'),
(33, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-07 10:03:08'),
(34, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:06:41'),
(35, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:51:46'),
(36, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:53:16'),
(37, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:53:39'),
(38, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:55:27'),
(39, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:55:43'),
(40, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 10:59:39'),
(41, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:00:30'),
(42, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:08:04'),
(43, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:08:17'),
(44, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:08:48'),
(45, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:10:51'),
(46, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:11:01'),
(47, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:11:21'),
(48, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:11:43'),
(49, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:25:53'),
(50, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:25:57'),
(51, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:28:19'),
(52, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:30:01'),
(53, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:34:02'),
(54, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:40:59'),
(55, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:45:01'),
(56, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:45:38'),
(57, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:47:00'),
(58, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:47:41'),
(59, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:48:24'),
(60, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:48:44'),
(61, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:50:12'),
(62, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:50:52'),
(63, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:51:18'),
(64, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:51:43'),
(65, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:52:17'),
(66, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:52:47'),
(67, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:53:14'),
(68, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:53:40'),
(69, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:55:04'),
(70, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:56:04'),
(71, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:56:36'),
(72, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:56:55'),
(73, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:57:05'),
(74, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:57:18'),
(75, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:57:30'),
(76, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:57:54'),
(77, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:58:03'),
(78, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:58:10'),
(79, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 11:59:14'),
(80, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:33:29'),
(81, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 12:35:11'),
(82, 4, '123', 'View users', '::1 | ::1', '', '2019-04-07 12:35:16'),
(83, 4, '123', 'View transport', '::1 | ::1', '', '2019-04-07 12:35:23'),
(84, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 12:35:36'),
(85, 4, '123', 'View aproved order list', '::1 | ::1', '', '2019-04-07 12:35:40'),
(86, 4, '123', 'View production details', '::1 | ::1', '', '2019-04-07 12:35:46'),
(87, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 12:35:53'),
(88, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 12:35:58'),
(89, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 12:36:06'),
(90, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:47:17'),
(91, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:47:30'),
(92, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:56:46'),
(93, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:57:11'),
(94, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:58:29'),
(95, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:58:47'),
(96, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 12:59:22'),
(97, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:05:00'),
(98, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:07:06'),
(99, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:08:18'),
(100, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:08:32'),
(101, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:09:30'),
(102, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:09:54'),
(103, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:10:19'),
(104, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:11:29'),
(105, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:12:55'),
(106, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:12:59'),
(107, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:13:22'),
(108, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:13:55'),
(109, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:14:04'),
(110, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:14:46'),
(111, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:17:21'),
(112, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:17:28'),
(113, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:17:38'),
(114, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:17:49'),
(115, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:20:01'),
(116, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:20:04'),
(117, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:20:25'),
(118, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:21:04'),
(119, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:21:10'),
(120, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:21:17'),
(121, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:21:45'),
(122, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:21:50'),
(123, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:30:14'),
(124, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:40:04'),
(125, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:41:17'),
(126, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:41:29'),
(127, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:41:36'),
(128, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:42:05'),
(129, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:42:26'),
(130, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:42:52'),
(131, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:43:57'),
(132, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:44:03'),
(133, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 13:44:06'),
(134, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 15:20:34'),
(135, 4, '123', 'View Site Measurement Sheet.', '::1 | ::1', '', '2019-04-07 16:02:32'),
(136, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 16:08:48'),
(137, 4, '123', 'View customer', '::1 | ::1', '', '2019-04-07 16:17:45'),
(138, 4, '123', 'Logout out', '::1 | ::1', '', '2019-04-07 16:17:50'),
(139, 0, '34', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-07 16:35:13'),
(140, 0, '34', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-07 16:35:31'),
(141, 0, 'tetyey', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-07 16:49:11'),
(142, 0, 'rwrttwty', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-09 06:33:49'),
(143, 4, '123', 'Login to system.', '::1 | ::1', '', '2019-04-10 18:05:01'),
(144, 4, '123', 'View dashboard', '::1 | ::1', '', '2019-04-10 18:05:01'),
(145, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:05:16'),
(146, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:05:28'),
(147, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:06:31'),
(148, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:10:29'),
(149, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:10:33'),
(150, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:12:44'),
(151, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:13:17'),
(152, 4, '123', 'View pending order list', '::1 | ::1', '', '2019-04-10 18:15:36'),
(153, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:20:23'),
(154, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:20:27'),
(155, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:24:10'),
(156, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:24:30'),
(157, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:24:52'),
(158, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:24:54'),
(159, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:24:57'),
(160, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:24:59'),
(161, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:19'),
(162, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:22'),
(163, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:27'),
(164, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:44'),
(165, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:53'),
(166, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:26:56'),
(167, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:28:58'),
(168, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:29:15'),
(169, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:30:30'),
(170, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:30:44'),
(171, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:30:52'),
(172, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:31:48'),
(173, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:31:50'),
(174, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:31:57'),
(175, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:32:41'),
(176, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:33:35'),
(177, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:34:29'),
(178, 4, '123', 'View site measurment', '::1 | ::1', '', '2019-04-10 18:37:37'),
(179, 4, '123', 'View users logs', '::1 | ::1', '', '2019-04-10 18:37:40'),
(180, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:46:05'),
(181, 4, '123', 'View users', '::1 | ::1', '', '2019-04-10 18:48:07'),
(182, 4, '123', 'View users', '::1 | ::1', '', '2019-04-11 03:37:53'),
(183, 0, '123', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-15 10:45:34'),
(184, 4, '123', 'Login to system.', '::1 | ::1', '', '2019-04-15 10:45:47'),
(185, 4, '123', 'View dashboard', '::1 | ::1', '', '2019-04-15 10:45:47'),
(186, 4, '123', 'View dashboard', '::1 | ::1', '', '2019-04-15 10:46:06'),
(187, 4, '123', 'View site measurment', '::1 | ::1', '', '2019-04-15 10:47:34'),
(188, 4, '123', 'View site measurment', '::1 | ::1', '', '2019-04-15 10:50:00'),
(189, 4, '123', 'View users', '::1 | ::1', '', '2019-04-15 10:50:04'),
(190, 4, '123', 'Reset a user password 234', '::1 | ::1', '', '2019-04-15 10:50:31'),
(191, 4, '123', 'View users', '::1 | ::1', '', '2019-04-15 10:50:33'),
(192, 4, '123', 'Logout out', '::1 | ::1', '', '2019-04-15 10:50:40'),
(193, 0, '234', 'Login attempt failed wrong credentials.', '::1 | ::1', '', '2019-04-15 10:50:54'),
(194, 7, '234', 'Login for 1st time or after password reset.', '::1 | ::1', '', '2019-04-15 10:51:01'),
(195, 7, '234', 'Login to system.', '::1 | ::1', '', '2019-04-15 10:51:31'),
(196, 7, '234', 'View dashboard', '::1 | ::1', '', '2019-04-15 10:51:31'),
(197, 7, '234', 'View pending order list', '::1 | ::1', '', '2019-04-15 10:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_list`
--

CREATE TABLE `tbl_packing_list` (
  `orderID` int(11) NOT NULL,
  `jobNum` varchar(20) NOT NULL,
  `customerNo` varchar(20) NOT NULL,
  `prodSerial` int(11) DEFAULT NULL,
  `product` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `pcs_rft` varchar(20) NOT NULL,
  `orderDate` date NOT NULL,
  `orderSystemdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplyDel` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packing_list`
--

INSERT INTO `tbl_packing_list` (`orderID`, `jobNum`, `customerNo`, `prodSerial`, `product`, `description`, `type`, `qty`, `pcs_rft`, `orderDate`, `orderSystemdate`, `supplyDel`) VALUES
(1, 'JOB-9', 'REM-3', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 20, 'RFT', '2019-02-08', '2019-02-08 12:37:35', ''),
(2, 'JOB-9', 'REM-3', 2, 'HAND RAIL', '0.75 MM', '100 MM', 12, 'RFT', '2019-02-08', '2019-02-08 12:37:35', ''),
(3, 'JOB-9', 'REM-3', 3, 'CONNER', '0.75 MM', '100 MM', 10, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(4, 'JOB-9', 'REM-3', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 8, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(5, 'JOB-9', 'REM-3', 5, 'L PACKERS', '0.75 MM', '100 MM', 24, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(6, 'JOB-9', 'REM-3', 6, 'WEDGES', '0.75 MM', '100 MM', 27, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(7, 'JOB-9', 'REM-3', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 60, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(8, 'JOB-9', 'REM-3', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 48, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(9, 'JOB-9', 'REM-3', 9, 'FASTENER', '0.75 MM', '100 MM', 30, 'RFT', '2019-02-08', '2019-02-08 12:37:36', ''),
(10, 'JOB-18', 'REM-2', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 233, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(11, 'JOB-18', 'REM-2', 2, 'HAND RAIL', '0.75 MM', '100 MM', 3, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(12, 'JOB-18', 'REM-2', 3, 'CONNER', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(13, 'JOB-18', 'REM-2', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 5, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(14, 'JOB-18', 'REM-2', 5, 'L PACKERS', '0.75 MM', '100 MM', 6, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(15, 'JOB-18', 'REM-2', 6, 'WEDGES', '0.75 MM', '100 MM', 7, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(16, 'JOB-18', 'REM-2', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(17, 'JOB-18', 'REM-2', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 2, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(18, 'JOB-18', 'REM-2', 9, 'FASTENER', '0.75 MM', '100 MM', 3, 'RFT', '2019-02-08', '2019-02-08 13:36:21', ''),
(19, 'JOB-26', 'REM-3', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 12, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(20, 'JOB-26', 'REM-3', 2, 'HAND RAIL', '0.75 MM', '100 MM', 98, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(21, 'JOB-26', 'REM-3', 3, 'CONNER', '0.75 MM', '100 MM', 76, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(22, 'JOB-26', 'REM-3', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 67, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(23, 'JOB-26', 'REM-3', 5, 'L PACKERS', '0.75 MM', '100 MM', 56, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(24, 'JOB-26', 'REM-3', 6, 'WEDGES', '0.75 MM', '100 MM', 34, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(25, 'JOB-26', 'REM-3', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 66, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(26, 'JOB-26', 'REM-3', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 77, 'RFT', '2019-02-09', '2019-02-09 15:08:55', ''),
(54, '234', 'REM-3', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 3, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(55, '234', 'REM-3', 2, 'HAND RAIL', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(56, '234', 'REM-3', 3, 'CONNER', '0.75 MM', '100 MM', 5, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(57, '234', 'REM-3', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 6, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(58, '234', 'REM-3', 5, 'L PACKERS', '0.75 MM', '100 MM', 7, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(59, '234', 'REM-3', 6, 'WEDGES', '0.75 MM', '100 MM', 8, 'RFT', '2019-02-13', '2019-02-13 20:49:26', ''),
(60, '234', 'REM-3', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 9, 'RFT', '2019-02-13', '2019-02-13 20:49:27', ''),
(61, '234', 'REM-3', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 10, 'RFT', '2019-02-13', '2019-02-13 20:49:27', ''),
(62, '234', 'REM-3', 9, 'FASTENER', '0.75 MM', '100 MM', 11, 'RFT', '2019-02-13', '2019-02-13 20:49:27', ''),
(63, '2334', 'REM-2', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(64, '2334', 'REM-2', 2, 'HAND RAIL', '0.75 MM', '100 MM', 56, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(65, '2334', 'REM-2', 3, 'CONNER', '0.75 MM', '100 MM', 7, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(66, '2334', 'REM-2', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 2, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(67, '2334', 'REM-2', 5, 'L PACKERS', '0.75 MM', '100 MM', 1, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(68, '2334', 'REM-2', 6, 'WEDGES', '0.75 MM', '100 MM', 7, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(69, '2334', 'REM-2', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 8, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(70, '2334', 'REM-2', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(71, '2334', 'REM-2', 9, 'FASTENER', '0.75 MM', '100 MM', 6, 'RFT', '2019-02-13', '2019-02-13 20:52:56', ''),
(72, '2344', 'REM-2', 1, 'BOTTOM PROFILE', '0.75 MM', '100 MM', 3, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(73, '2344', 'REM-2', 2, 'HAND RAIL', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(74, '2344', 'REM-2', 3, 'CONNER', '0.75 MM', '100 MM', 5, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(75, '2344', 'REM-2', 4, 'WALL CONCEAL', '0.75 MM', '100 MM', 6, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(76, '2344', 'REM-2', 5, 'L PACKERS', '0.75 MM', '100 MM', 7, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(77, '2344', 'REM-2', 6, 'WEDGES', '0.75 MM', '100 MM', 8, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(78, '2344', 'REM-2', 7, 'WEDGE LOCK', '0.75 MM', '100 MM', 23, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(79, '2344', 'REM-2', 8, 'WEDGE SCREW', '0.75 MM', '100 MM', 9, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(80, '2344', 'REM-2', 9, 'FASTENER', '0.75 MM', '100 MM', 4, 'RFT', '2019-02-13', '2019-02-13 20:56:17', ''),
(81, 'JOB-9', 'REM-3', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 2, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(82, 'JOB-9', 'REM-3', 3, 'CONNER', 'FIXED DEGREE', '300 MM', 3, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(83, 'JOB-9', 'REM-3', 5, 'L PACKERS', '0.75 MM', 'TYPE I', 4, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(84, 'JOB-9', 'REM-3', 6, 'WEDGES', 'ABS', '75 MM', 4, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(85, 'JOB-9', 'REM-3', 9, 'FASTENER', 'FISHER', '8X80', 5, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(86, 'JOB-9', 'REM-3', 13, 'Classic', 'Any', 'Typ11', 5, '', '2019-02-21', '2019-02-21 18:48:27', ''),
(87, 'JOB-9', 'REM-3', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 2, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(88, 'JOB-9', 'REM-3', 3, 'CONNER', 'FIXED DEGREE', '300 MM', 3, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(89, 'JOB-9', 'REM-3', 5, 'L PACKERS', '0.75 MM', 'TYPE I', 4, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(90, 'JOB-9', 'REM-3', 6, 'WEDGES', 'ABS', '75 MM', 5, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(91, 'JOB-9', 'REM-3', 9, 'FASTENER', 'FISHER', '8X80', 6, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(92, 'JOB-9', 'REM-3', 13, 'Classic', 'Any', 'Typ11', 7, '', '2019-02-21', '2019-02-21 18:50:04', ''),
(93, '3306', 'REM-2', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 23, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(94, '3306', 'REM-2', 3, 'CONNER', 'FIXED DEGREE', '300 MM', 4, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(95, '3306', 'REM-2', 5, 'L PACKERS', '0.75 MM', 'TYPE I', 5, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(96, '3306', 'REM-2', 6, 'WEDGES', 'ABS', '75 MM', 6, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(97, '3306', 'REM-2', 9, 'FASTENER', 'FISHER', '8X80', 23, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(98, '3306', 'REM-2', 13, 'Classic', 'Any', 'Typ11', 5, '', '2019-02-21', '2019-02-21 19:16:06', ''),
(99, '20100', 'REM-2', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 2, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(100, '20100', 'REM-2', 3, 'CONNER', 'FIXED DEGREE', '300 MM', 3, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(101, '20100', 'REM-2', 5, 'L PACKERS', '0.75 MM', 'TYPE I', 4, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(102, '20100', 'REM-2', 6, 'WEDGES', 'ABS', '75 MM', 5, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(103, '20100', 'REM-2', 9, 'FASTENER', 'FISHER', '8X80', 6, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(104, '20100', 'REM-2', 13, 'Classic', 'Any', 'Typ11', 54, '', '2019-02-21', '2019-02-21 19:53:18', ''),
(105, '9027', 'REM-2', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 23, '', '2019-02-21', '2019-02-21 19:56:23', ''),
(106, '1024', 'REM-3', 13, 'Classic', 'Any', 'Typ11', 23, '', '2019-02-21', '2019-02-21 20:00:17', ''),
(107, '1780', 'REM-3', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 2, '', '2019-02-21', '2019-02-21 20:03:35', ''),
(108, '1890', 'REM-3', 1, 'BOTTOM PROFILE', 'STAR', '75 MM', 34, '', '2019-02-21', '2019-02-21 20:06:12', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packing_list_summary`
--

CREATE TABLE `tbl_packing_list_summary` (
  `plsID` int(11) NOT NULL,
  `custID` varchar(20) NOT NULL,
  `jobnumb` varchar(20) NOT NULL,
  `glasstype` varchar(20) NOT NULL,
  `glassize1` varchar(30) NOT NULL,
  `glassize2` varchar(40) NOT NULL,
  `coating` varchar(20) NOT NULL,
  `systim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_packing_list_summary`
--

INSERT INTO `tbl_packing_list_summary` (`plsID`, `custID`, `jobnumb`, `glasstype`, `glassize1`, `glassize2`, `coating`, `systim`) VALUES
(2, 'REM-3', '234', 'TOUGHENED', ' ', '', 'ANODISED', '2019-02-13 20:49:27'),
(3, 'REM-2', '2334', 'LAMINATED', 'SENTRY', '6 MM + 0.89 SENTRY + 6 MM', 'WOODEN FINISH', '2019-02-13 20:52:56'),
(4, 'REM-2', '2344', 'TOUGHENED', '10 MM TOUGHENED ', '', 'PVDF', '2019-02-13 20:56:17'),
(5, 'REM-3', 'JOB-9', 'TOUGHENED', '12 MM TOUGHENED ', '', 'POWDER COAT', '2019-02-21 18:48:27'),
(6, 'REM-2', '3306', 'TOUGHENED', '10 MM TOUGHENED ', '', 'ANODISED', '2019-02-21 19:16:06'),
(7, 'REM-2', '20100', 'TOUGHENED', '10 MM TOUGHENED ', '', 'ANODISED', '2019-02-21 19:53:18'),
(8, 'REM-2', '9027', 'TOUGHENED', '10 MM TOUGHENED ', '', 'ANODISED', '2019-02-21 19:56:23'),
(9, 'REM-3', '1024', 'LAMINATED', 'SENTRY', '8 MM + 0.89 SENTRY + 8 MM', 'POWDER COAT', '2019-02-21 20:00:17'),
(10, 'REM-3', '1780', 'LAMINATED', 'SENTRY', '8 MM + 0.89 SENTRY + 8 MM', 'ANODISED', '2019-02-21 20:03:35'),
(11, 'REM-3', '1890', 'TOUGHENED', '10 MM TOUGHENED ', '', 'ANODISED', '2019-02-21 20:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pcs_rft`
--

CREATE TABLE `tbl_pcs_rft` (
  `pcs_rft_id` int(11) NOT NULL,
  `PCS_RFTS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pcs_rft`
--

INSERT INTO `tbl_pcs_rft` (`pcs_rft_id`, `PCS_RFTS`) VALUES
(1, 'RFT'),
(2, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

CREATE TABLE `tbl_production` (
  `proID` int(11) NOT NULL,
  `proDate` date NOT NULL,
  `CustID` varchar(20) NOT NULL,
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
  `remarks` varchar(500) NOT NULL,
  `deleted` varchar(10) NOT NULL,
  `system_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production`
--

INSERT INTO `tbl_production` (`proID`, `proDate`, `CustID`, `custName`, `jobNumber`, `line`, `type`, `hr`, `cutting`, `coating`, `assemb`, `pack`, `disp`, `glassOrdered`, `orderDate`, `deliDate`, `fabricate`, `final_date_deli`, `total_tower`, `total_tower_ordered`, `remarks`, `deleted`, `system_time`) VALUES
(5, '2019-01-08', 'REM-2', 'Zed +', '023', 'SEA', 'B/FC', 'RECTANGLE', 'Done', 'SHREE', 'Done', 'Done', 'Done', 'PARTY END', '2019-01-08', '2019-01-31', 'HITESH', '2019-02-20', 7, 7, '', 'Deleted', '2019-01-26 11:15:18'),
(6, '2019-01-09', 'REM-3', 'ROSCO', 'A36', 'STAR', 'B/W', 'ROUND', 'Done', 'SHREE', 'Done', 'Done', 'Pending', 'RIO', '2019-01-05', '2019-01-30', 'CHIRAG', '2019-02-10', 12, 12, '', '', '2019-01-26 11:27:59'),
(7, '2019-01-10', 'REM-3', 'WHITE HEAVEN', 'A38', 'SPARK', 'B/FC', 'INCLINE', 'Pending', 'GANESH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-16', '2019-02-16', 'HITESH', '2019-03-10', 12, 12, '', '', '2019-01-26 11:27:59'),
(8, '2019-01-07', 'REM-2', 'SHREE JI', 'A147', 'SPARK', 'B/FC', 'INCLINE', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'PENDING', '2019-01-31', '2019-02-15', 'CHIRAG', '2019-03-14', 10, 10, '', '', '2019-01-26 11:27:59'),
(9, '2019-01-08', 'REM-2', 'ORYANA', 'A99', 'STAR', 'B/W', 'HALF ROUND', 'Done', 'SHREE', 'Done', 'Done', 'Pending', 'PENDING', '2019-01-31', '2019-02-22', 'CHIRAG', '2019-02-10', 12, 12, '', '', '2019-01-26 11:45:29'),
(10, '2019-01-10', 'REM-3', 'APPLE', 'A176', 'SLIM', 'B/W', 'ROUND', 'Done', 'SHREE', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-24', '2019-02-14', 'UMESH BHAI', '2019-03-20', 24, 24, '', '', '2019-01-26 11:45:29'),
(11, '2019-01-08', 'REM-2', 'PARK VIEW', 'A005', 'SPARK', 'B/W', 'SQUARE', 'Done', 'GANESH', 'Done', 'Done', 'Done', 'RIO', '2019-01-17', '2019-01-24', 'HITESH', '2019-01-31', 7, 7, '', '', '2019-01-26 11:45:29'),
(12, '2019-01-10', 'REM-3', 'SANKALP GRACE', 'A171', 'SMART', 'F/P', 'SMALL', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-15', '2019-02-08', 'PARTY END', '2019-02-20', 14, 14, '', '', '2019-01-26 11:45:29'),
(13, '2019-01-08', 'REM-2', 'AWADH COPPER', 'A020', 'SQUARE', 'B/W', 'ROUND', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-23', '2019-02-21', 'CHIRAG', '2019-04-18', 15, 15, '', '', '2019-01-26 11:45:29'),
(14, '2019-01-18', 'REM-3', 'AWADH CAROLINA', 'A051', 'SQUARE', 'B/W', 'ROUND', 'Done', 'SOMNATH', 'Pending', 'Pending', 'Pending', 'RIO', '2019-01-21', '2019-01-15', 'CHIRAG', '2019-01-25', 20, 20, '', '', '2019-01-26 11:45:29'),
(16, '2019-02-01', 'REM-3', 'Adamu Mohammed', '128', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Light', '2019-01-26', '2019-01-18', 'Cert', '2019-01-18', 12, 12, '', '', '2019-01-28 13:18:14'),
(17, '2019-02-10', 'REM-2', 'Perry', '7653', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Lght', '2019-02-17', '2019-02-22', 'Nylon', '2019-02-15', 2, 2, 'e', '', '2019-02-03 16:11:28'),
(18, '2019-02-14', 'REM-2', '', 'JOB-2897', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Light', '2019-02-15', '2019-02-14', 'Nylon', '2019-02-14', 23, 45, 'S', '', '2019-02-14 10:14:33'),
(26, '2019-03-22', 'REM-3', '', '099999997162', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Ornor', '2019-03-22', '2019-03-21', 'OUER', '2019-03-15', 120, 23, 'r', '', '2019-03-22 17:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productionold`
--

CREATE TABLE `tbl_productionold` (
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
-- Dumping data for table `tbl_productionold`
--

INSERT INTO `tbl_productionold` (`proID`, `proDate`, `custName`, `jobNumber`, `line`, `type`, `hr`, `cutting`, `coating`, `assemb`, `pack`, `disp`, `glassOrdered`, `orderDate`, `deliDate`, `fabricate`, `final_date_deli`, `total_tower`, `total_tower_ordered`, `system_time`) VALUES
(4, '2019-01-26', 'Adamu', '123', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Light', '2019-01-10', '2019-01-03', 'Full', '2019-01-30', 12, 12, '2019-01-26 11:26:35'),
(6, '2019-01-26', 'Adamu', '124', 'SMART', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Light', '2019-01-27', '2019-01-26', 'Full', '2019-02-04', 20, 20, '2019-01-26 11:30:03'),
(7, '2019-01-27', 'Adamu Mohammed', '125', 'STAR', 'B/W', 'ROUND', 'Pending', 'REAL', 'Pending', 'Pending', 'Pending', 'Light', '2019-01-25', '2019-01-31', 'Full', '2019-02-03', 12, 12, '2019-01-27 09:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `SERIAL` int(11) NOT NULL,
  `PRODUCT` varchar(30) NOT NULL,
  `QTY` int(11) NOT NULL,
  `PCS_RFT` int(11) NOT NULL,
  `proDel` varchar(7) NOT NULL,
  `orderDel` varchar(7) NOT NULL,
  `sysdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`SERIAL`, `PRODUCT`, `QTY`, `PCS_RFT`, `proDel`, `orderDel`, `sysdate`) VALUES
(1, 'BOTTOM PROFILE', 6, 1, '', '', '2019-02-04 16:19:33'),
(2, 'HAND RAIL', 12, 1, '', '', '2019-02-04 16:19:33'),
(3, 'CONNER', 0, 2, '', '', '2019-02-04 16:19:33'),
(4, 'WALL CONCEAL', 0, 1, '', '', '2019-02-04 16:19:33'),
(5, 'L PACKERS', 0, 2, '', '', '2019-02-04 16:19:33'),
(6, 'WEDGES', 0, 2, '', '', '2019-02-04 16:19:33'),
(7, 'WEDGE LOCK', 0, 1, '', '', '2019-02-04 16:19:33'),
(8, 'WEDGE SCREW', 0, 1, '', '', '2019-02-04 16:19:33'),
(9, 'FASTENER', 0, 2, '', '', '2019-02-04 16:19:33'),
(11, 'Classic', 23, 1, 'Deleted', '', '2019-02-04 19:50:37'),
(12, '', 34, 1, 'Deleted', '', '2019-02-06 12:01:56'),
(13, 'Classic', 0, 2, '', '', '2019-02-17 07:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_description`
--

CREATE TABLE `tbl_product_description` (
  `pro_des_id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `product_serial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_description`
--

INSERT INTO `tbl_product_description` (`pro_des_id`, `description`, `product_serial`) VALUES
(1, 'STAR', 1),
(2, 'SMART', 1),
(3, 'SQUARE', 1),
(4, 'SLIM', 1),
(5, 'SLEEK', 1),
(6, 'SMALL', 1),
(7, 'SEA', 1),
(8, 'SUPER', 1),
(9, 'SIGNATURE', 1),
(10, 'SPARK', 1),
(11, 'SKY', 1),
(12, 'ROUND', 2),
(13, 'SQUARE', 2),
(14, 'SMALL', 2),
(15, 'SLIM', 2),
(16, 'EDGE GUARD', 2),
(17, 'HALF ROUND', 2),
(18, 'RECTANGLE', 2),
(19, 'INCLINE', 2),
(20, 'FIXED DEGREE', 3),
(21, 'VARIALBLE', 3),
(22, 'ROUND', 4),
(23, 'SQUARE', 4),
(24, 'SMALL', 4),
(25, 'SLEEK', 4),
(26, 'SLIM', 4),
(27, 'EDGE GUARD', 4),
(28, 'HALF ROUND', 4),
(29, 'RECTANGLE', 4),
(30, 'INCLINE', 4),
(31, '0.75 MM', 5),
(32, '1 MM', 5),
(33, '1.2 MM', 5),
(34, '1.5 MM', 5),
(35, '2.5 MM', 5),
(36, 'CUSTOMISED', 5),
(37, 'ABS', 6),
(38, 'NYLON', 6),
(39, 'ALUMINIUM \'L\' TYPE', 7),
(40, 'SS LOCK 30 MM', 7),
(41, 'SS ALLEN M5X10', 8),
(42, 'NONE', 8),
(43, 'FISHER', 9),
(44, 'HILITI', 9),
(45, ' ', 6),
(46, 'Any', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_type`
--

CREATE TABLE `tbl_product_type` (
  `pro_type_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `product_serials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_type`
--

INSERT INTO `tbl_product_type` (`pro_type_id`, `type`, `product_serials`) VALUES
(1, '75 MM', 1),
(2, '100 MM', 1),
(3, '150 MM', 1),
(4, '200 MM', 1),
(5, 'TYPE I', 5),
(6, 'TYPE II', 5),
(7, '75 MM', 6),
(8, '100 MM', 6),
(9, '150 MM', 6),
(10, '200 MM', 6),
(11, '8X80', 9),
(12, '10X80', 9),
(13, '10X100', 9),
(14, '10X120', 9),
(15, '10X140', 9),
(16, '10X160', 9),
(17, 'CUSTOMISED', 9),
(20, '200M x 400M', 11),
(21, '300 MM', 6),
(22, '300 MM', 3),
(23, 'Typ11', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transporter`
--

CREATE TABLE `tbl_transporter` (
  `transID` int(11) NOT NULL,
  `jobnumb` varchar(20) NOT NULL,
  `transporter` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `bill` varchar(100) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `systemtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transporter`
--

INSERT INTO `tbl_transporter` (`transID`, `jobnumb`, `transporter`, `date`, `bill`, `receipt`, `systemtime`) VALUES
(1, '1890', 'Manually', '2019-03-23', 'Visa Card Adamu_to_Fidelity.pdf', '', '2019-03-23 08:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transports`
--

CREATE TABLE `tbl_transports` (
  `trans_id` int(11) NOT NULL,
  `transport` varchar(50) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transports`
--

INSERT INTO `tbl_transports` (`trans_id`, `transport`, `comments`, `timedate`) VALUES
(1, 'Manually', 'More or none', '2019-02-10 10:54:25'),
(6, 'Continental', 'Forest and bush', '2019-02-24 13:17:29'),
(7, 'Some', '', '2019-02-25 17:03:03'),
(8, 'Same', '', '2019-03-10 05:57:37'),
(9, 'Same', '', '2019-03-10 06:15:03'),
(10, 'Same', '', '2019-03-10 07:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `first_time` int(1) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userDel` varchar(7) NOT NULL,
  `gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `user_phone`, `birth_date`, `username`, `passcode`, `role`, `status`, `first_time`, `last_login`, `image`, `datecreated`, `userDel`, `gender`) VALUES
(4, 'Mohammed', 'Issac', 'Adamu', 'adamumh@gmail.com', '123', '2019-02-23', '123', '$2y$10$iloveyouGodcositisyouuoObhqTAVdTJ.Gte.JHDQa9P3pn49pQC', 'Admin', 'Unblocked', 1, '2019-04-15 10:45:47', 'Screenshot 2019-01-20 at 03.29.44.png', '2019-02-01 17:19:11', '', 'Male'),
(5, 'Charlse', '', 'Spurgen', 'spur@gmail.com', '6355949454', '2019-02-09', '6355949454', '$2y$10$iloveyouGodcositisyouuiVbfi2xHR0VGceyklQhUQG0BA3MkKsy', 'Admin', 'Unblocked', 0, '2019-02-24 07:51:58', 'Screen Shot 2019-01-10 at 23.59.50.png', '2019-02-09 11:43:58', '', ''),
(6, 'Adiza', '', 'Adamu', 'adiza@gmail.com', '233', '2019-01-28', '233', '$2y$10$iloveyouGodcositisyouuoObhqTAVdTJ.Gte.JHDQa9P3pn49pQC', 'Accounts', 'Unblocked', 1, '2019-02-24 12:30:50', 'Screenshot 2019-01-20 at 02.11.49.png', '2019-02-09 21:18:17', '', ''),
(7, 'Perry', 'Tei', 'Fleming', 'pery@gmail.com', '234', '2018-08-27', '234', '$2y$10$iloveyouGodcositisyouuoObhqTAVdTJ.Gte.JHDQa9P3pn49pQC', 'Client', 'Unblocked', 1, '2019-04-15 10:51:31', 'climate.png', '2019-02-09 21:19:50', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agentOrders`
--
ALTER TABLE `tbl_agentOrders`
  ADD PRIMARY KEY (`agentOrdCode`),
  ADD UNIQUE KEY `agentOrdID` (`agentOrdID`),
  ADD KEY `agentCustid` (`agentCustid`),
  ADD KEY `agentID` (`agentID`);

--
-- Indexes for table `tbl_agentOrders_railing`
--
ALTER TABLE `tbl_agentOrders_railing`
  ADD PRIMARY KEY (`agentOrdIDRail`),
  ADD UNIQUE KEY `agentOrdID` (`agentOrdIDRail`),
  ADD KEY `agentOrdCodeRail` (`agentOrdCodeRail`);

--
-- Indexes for table `tbl_agent_customer`
--
ALTER TABLE `tbl_agent_customer`
  ADD PRIMARY KEY (`agentCust_ID`),
  ADD UNIQUE KEY `agentCustID` (`agentCust_ID`);

--
-- Indexes for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customerID` (`customerID`),
  ADD UNIQUE KEY `custID` (`custID`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_packing_list`
--
ALTER TABLE `tbl_packing_list`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerNo` (`customerNo`),
  ADD KEY `prodSerial` (`prodSerial`);

--
-- Indexes for table `tbl_packing_list_summary`
--
ALTER TABLE `tbl_packing_list_summary`
  ADD PRIMARY KEY (`plsID`),
  ADD KEY `custID` (`custID`);

--
-- Indexes for table `tbl_pcs_rft`
--
ALTER TABLE `tbl_pcs_rft`
  ADD PRIMARY KEY (`pcs_rft_id`);

--
-- Indexes for table `tbl_production`
--
ALTER TABLE `tbl_production`
  ADD PRIMARY KEY (`proID`),
  ADD UNIQUE KEY `jobNumber` (`jobNumber`),
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `tbl_productionold`
--
ALTER TABLE `tbl_productionold`
  ADD PRIMARY KEY (`proID`),
  ADD UNIQUE KEY `jobNumber` (`jobNumber`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`SERIAL`),
  ADD KEY `PCS_RFT` (`PCS_RFT`);

--
-- Indexes for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD PRIMARY KEY (`pro_des_id`),
  ADD KEY `product_serial` (`product_serial`);

--
-- Indexes for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD PRIMARY KEY (`pro_type_id`),
  ADD KEY `product_serial` (`product_serials`);

--
-- Indexes for table `tbl_transporter`
--
ALTER TABLE `tbl_transporter`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `tbl_transports`
--
ALTER TABLE `tbl_transports`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `userID` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agentOrders`
--
ALTER TABLE `tbl_agentOrders`
  MODIFY `agentOrdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_agentOrders_railing`
--
ALTER TABLE `tbl_agentOrders_railing`
  MODIFY `agentOrdIDRail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_agent_customer`
--
ALTER TABLE `tbl_agent_customer`
  MODIFY `agentCust_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customer_details`
--
ALTER TABLE `tbl_customer_details`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `tbl_packing_list`
--
ALTER TABLE `tbl_packing_list`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tbl_packing_list_summary`
--
ALTER TABLE `tbl_packing_list_summary`
  MODIFY `plsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pcs_rft`
--
ALTER TABLE `tbl_pcs_rft`
  MODIFY `pcs_rft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_production`
--
ALTER TABLE `tbl_production`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_productionold`
--
ALTER TABLE `tbl_productionold`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `SERIAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `pro_des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `pro_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_transporter`
--
ALTER TABLE `tbl_transporter`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transports`
--
ALTER TABLE `tbl_transports`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_agentOrders`
--
ALTER TABLE `tbl_agentOrders`
  ADD CONSTRAINT `tbl_agentorders_ibfk_1` FOREIGN KEY (`agentCustid`) REFERENCES `tbl_agent_customer` (`agentCust_ID`),
  ADD CONSTRAINT `tbl_agentorders_ibfk_2` FOREIGN KEY (`agentID`) REFERENCES `tbl_user_login` (`user_id`);

--
-- Constraints for table `tbl_agentOrders_railing`
--
ALTER TABLE `tbl_agentOrders_railing`
  ADD CONSTRAINT `tbl_agentorders_railing_ibfk_1` FOREIGN KEY (`agentOrdCodeRail`) REFERENCES `tbl_agentOrders` (`agentOrdCode`);

--
-- Constraints for table `tbl_packing_list`
--
ALTER TABLE `tbl_packing_list`
  ADD CONSTRAINT `tbl_packing_list_ibfk_1` FOREIGN KEY (`customerNo`) REFERENCES `tbl_customer_details` (`customerID`),
  ADD CONSTRAINT `tbl_packing_list_ibfk_2` FOREIGN KEY (`prodSerial`) REFERENCES `tbl_products` (`SERIAL`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_packing_list_summary`
--
ALTER TABLE `tbl_packing_list_summary`
  ADD CONSTRAINT `tbl_packing_list_summary_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `tbl_customer_details` (`customerID`);

--
-- Constraints for table `tbl_production`
--
ALTER TABLE `tbl_production`
  ADD CONSTRAINT `tbl_production_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `tbl_customer_details` (`customerID`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`PCS_RFT`) REFERENCES `tbl_pcs_rft` (`pcs_rft_id`);

--
-- Constraints for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD CONSTRAINT `tbl_product_description_ibfk_1` FOREIGN KEY (`product_serial`) REFERENCES `tbl_products` (`SERIAL`);

--
-- Constraints for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  ADD CONSTRAINT `tbl_product_type_ibfk_1` FOREIGN KEY (`product_serials`) REFERENCES `tbl_products` (`SERIAL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
