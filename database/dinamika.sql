-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 08:24 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinamika`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventlog`
--

CREATE TABLE `tbl_eventlog` (
  `EventLogID` int(11) NOT NULL,
  `EventLogTimeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `EventLogUser` text NOT NULL,
  `EventLogData` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_eventlog`
--

INSERT INTO `tbl_eventlog` (`EventLogID`, `EventLogTimeStamp`, `EventLogUser`, `EventLogData`) VALUES
(1, '2024-09-30 11:47:27', 'kevinarlo', 'kevinarlo is logged in'),
(2, '2024-09-30 11:47:45', 'kevinarlo', 'kevinarlo has logged out'),
(3, '2024-09-30 12:20:08', 'kevinarlo', 'kevinarlo is logged in'),
(4, '2024-09-30 12:39:07', 'kevinarlo', 'kevinarlo has logged out'),
(5, '2024-09-30 12:48:00', 'kevinarlo', 'kevinarlo is logged in'),
(6, '2024-09-30 13:21:22', 'kevinarlo', 'kevinarlo is logged in'),
(7, '2024-09-30 13:21:30', 'kevinarlo', 'Create Product Category Test Category'),
(8, '2024-09-30 13:34:21', 'kevinarlo', 'Update Product Category Test'),
(9, '2024-09-30 13:34:50', 'kevinarlo', 'Update Product Category Test'),
(10, '2024-09-30 13:37:00', 'kevinarlo', 'Create Product Category Test Category'),
(11, '2024-09-30 13:49:41', 'kevinarlo', 'Delete Product Category Test Category'),
(12, '2024-09-30 13:49:50', 'kevinarlo', 'Active Product Category Test Category'),
(13, '2024-09-30 14:20:16', 'kevinarlo', 'kevinarlo has logged out'),
(14, '2024-10-01 05:52:14', 'kevinarlo', 'kevinarlo is logged in');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `ProductID` int(11) NOT NULL,
  `ProductCategoryID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `ProductName` text NOT NULL,
  `ProductDescription` text DEFAULT NULL,
  `ProductPhoto` varchar(255) NOT NULL,
  `ProductCatalog` varchar(255) NOT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `ProductCategoryID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `ProductCategoryName` text NOT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`ProductCategoryID`, `StatusID`, `ProductCategoryName`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Test Category', 'kevinarlo', '2024-09-30 13:37:00', 'kevinarlo', '2024-09-30 13:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`RoleID`, `RoleName`) VALUES
(1, 'Staff'),
(2, 'Admin'),
(3, 'App Admin'),
(4, 'SYS Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `StatusID` int(11) NOT NULL,
  `StatusName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`StatusID`, `StatusName`) VALUES
(1, 'Active'),
(2, 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `TeamID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `FullName` varchar(25) NOT NULL,
  `Position` varchar(25) NOT NULL,
  `Linkedin` text DEFAULT NULL,
  `Instagram` text DEFAULT NULL,
  `TeamPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `TestimonialID` int(11) NOT NULL,
  `TestimonialStatusID` int(11) NOT NULL,
  `FullName` varchar(25) NOT NULL,
  `Company` text DEFAULT NULL,
  `TestimonialRating` varchar(10) NOT NULL,
  `TestimonialDescription` text NOT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial_status`
--

CREATE TABLE `tbl_testimonial_status` (
  `TestimonialStatusID` int(11) NOT NULL,
  `TestimonialStatusName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimonial_status`
--

INSERT INTO `tbl_testimonial_status` (`TestimonialStatusID`, `TestimonialStatusName`) VALUES
(1, 'Pending'),
(2, 'Approve'),
(3, 'NotApprove');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `FullName` text NOT NULL,
  `ResetTokenHash` varchar(64) DEFAULT NULL,
  `ResetTokenExpired` datetime DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserID`, `RoleID`, `StatusID`, `Username`, `Password`, `Email`, `FullName`, `ResetTokenHash`, `ResetTokenExpired`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 4, 1, 'kevinarlo', '$2y$10$bcpx4sFLRiYLouYH5DU6LeAWHEjuDm76JoA8j.a3SB57Gca5I9Y/q', 'kevinarlo29@gmail.com', 'Kevin Arlo', NULL, NULL, 'kevinarlo', '2024-03-12 17:40:23', 'kevinarlo', '2024-09-28 09:14:36'),
(2, 3, 1, 'bestian', '$2y$10$XxTEiAQLio3L9Dq3faUPQuity9alJ4vxbfMTGhKU1Q/VsuPP4ZahG', 'appadmin@gmail.com', 'Bestian', NULL, NULL, 'kevinarlo', '2024-03-14 14:57:30', 'kevinarlo', '2024-09-30 09:50:48'),
(3, 1, 1, 'staff', '$2y$10$W9sc3kX3V9VEcGC8yjGuxeyfgbMBVobHTLgbSenN25D9jS8hDnt8u', 'staff@gmail.com', 'Staff', NULL, NULL, 'kevinarlo', '2024-09-28 14:59:28', 'kevinarlo', '2024-09-28 15:02:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_eventlog`
--
ALTER TABLE `tbl_eventlog`
  ADD PRIMARY KEY (`EventLogID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ProductCategoryID` (`ProductCategoryID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`ProductCategoryID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`TestimonialID`),
  ADD KEY `TestimonialStatusID` (`TestimonialStatusID`);

--
-- Indexes for table `tbl_testimonial_status`
--
ALTER TABLE `tbl_testimonial_status`
  ADD PRIMARY KEY (`TestimonialStatusID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_eventlog`
--
ALTER TABLE `tbl_eventlog`
  MODIFY `EventLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `ProductCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `TestimonialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimonial_status`
--
ALTER TABLE `tbl_testimonial_status`
  MODIFY `TestimonialStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`ProductCategoryID`) REFERENCES `tbl_product_category` (`ProductCategoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD CONSTRAINT `tbl_product_category_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD CONSTRAINT `tbl_team_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD CONSTRAINT `tbl_testimonial_ibfk_1` FOREIGN KEY (`TestimonialStatusID`) REFERENCES `tbl_testimonial_status` (`TestimonialStatusID`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `tbl_role` (`RoleID`),
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
