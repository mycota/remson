-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2019 at 01:46 PM
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
-- Table structure for table `tbl_pcs_rft`
--

CREATE TABLE `tbl_pcs_rft` (
  `pcs_rft_id` int(11) NOT NULL,
  `PCS_RFT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pcs_rft`
--

INSERT INTO `tbl_pcs_rft` (`pcs_rft_id`, `PCS_RFT`) VALUES
(1, 'RFT'),
(2, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `SERIAL` int(11) NOT NULL,
  `PRODUCT` varchar(30) NOT NULL,
  `QTY` int(11) NOT NULL,
  `PCS_RFT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`SERIAL`, `PRODUCT`, `QTY`, `PCS_RFT`) VALUES
(1, 'BOTTOM PROFILE', 6, 1),
(2, 'HAND RAIL', 0, 2),
(3, 'CONNER', 0, 2),
(4, 'WALL CONCEAL', 0, 1),
(5, 'L PACKERS', 0, 2),
(6, 'WEDGES', 0, 2),
(7, 'WEDGE LOCK', 0, 1),
(8, 'WEDGE SCREW', 0, 1),
(9, 'FASTENER', 0, 2);

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
(44, 'HILITI', 9);

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
(17, 'CUSTOMISED', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pcs_rft`
--
ALTER TABLE `tbl_pcs_rft`
  ADD PRIMARY KEY (`pcs_rft_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pcs_rft`
--
ALTER TABLE `tbl_pcs_rft`
  MODIFY `pcs_rft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `SERIAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `pro_des_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_product_type`
--
ALTER TABLE `tbl_product_type`
  MODIFY `pro_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

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
