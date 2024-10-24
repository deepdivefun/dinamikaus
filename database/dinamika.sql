-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 01:41 PM
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
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `ContactID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `ContactNameArea` text NOT NULL,
  `ContactAddress` text DEFAULT NULL,
  `ContactLinkGmaps` text DEFAULT NULL,
  `ContactEmail` text NOT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`ContactID`, `StatusID`, `ContactNameArea`, `ContactAddress`, `ContactLinkGmaps`, `ContactEmail`, `ContactNumber`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Jakarta', 'Jl. Dr. Kusuma Atmaja, S.H No.83 Menteng. Jakarta Pusat', 'https://maps.app.goo.gl/DT8LEBGE8UTdE4C97', 'jakarta@dinamikaus.com', '0213160118', 'kevinarlo', '2024-10-09 06:47:22', 'kevinarlo', '2024-10-24 07:06:58'),
(2, 1, 'Bogor', 'Jl. Dalurung Raya No. 23 Bogor Utara. Kota Bogor', 'https://maps.app.goo.gl/TZyRXAGY8RctqwDi9', 'bogor@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:33:30', 'kevinarlo', '2024-10-24 07:07:29'),
(3, 1, ' Depok', 'Jl. Swadaya Raya Beji. Kota Depok', 'https://maps.app.goo.gl/8sNfXD881drRguao7', 'depok@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:36:33', 'kevinarlo', '2024-10-24 07:07:48'),
(4, 1, 'Bekasi', 'Jl. Cipete Raya No.83 Mustika Jaya. Kota Bekasi', 'https://maps.app.goo.gl/yptFYLWjEorzU7xH6', 'bekasi@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:39:55', 'kevinarlo', '2024-10-24 07:08:12'),
(5, 1, 'Semarang', 'Jl. Tamansari 1 No. 21-22 Sekaran, Gunung Pati. Kota Semarang', 'https://maps.app.goo.gl/QoJo1QUWSuz2doWA7', 'semarang@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:45:15', 'kevinarlo', '2024-10-24 07:08:33'),
(6, 1, 'Bali', 'Jl. Pulau Galang No.50 Pemogan. Denpasar Selatan', 'https://maps.app.goo.gl/vWrcgAWSXW5Ru8PY8', 'bali@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:48:09', 'kevinarlo', '2024-10-24 07:08:52');

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
(1, '2024-10-09 10:23:05', 'kevinarlo', 'kevinarlo has logged out'),
(2, '2024-10-11 03:49:48', 'kevinarlo', 'kevinarlo is logged in'),
(3, '2024-10-11 04:12:45', 'kevinarlo', 'Create Product Category Computer'),
(4, '2024-10-11 04:14:58', 'kevinarlo', 'Create Product Category Computer'),
(5, '2024-10-11 04:38:32', 'kevinarlo', 'Update Product Category Computer'),
(6, '2024-10-12 10:37:52', 'kevinarlo', 'kevinarlo is logged in'),
(7, '2024-10-12 10:43:07', 'kevinarlo', 'kevinarlo has logged out'),
(8, '2024-10-12 11:25:51', 'kevinarlo', 'kevinarlo is logged in'),
(9, '2024-10-12 11:30:11', 'kevinarlo', 'Update Contact For Area Jakarta'),
(10, '2024-10-12 11:33:30', 'kevinarlo', 'Create Contact For Area Bogor'),
(11, '2024-10-12 11:36:33', 'kevinarlo', 'Create Contact For Area  Depok'),
(12, '2024-10-12 11:39:55', 'kevinarlo', 'Create Contact For Area Bekasi'),
(13, '2024-10-12 11:45:15', 'kevinarlo', 'Create Contact For Area Semarang'),
(14, '2024-10-12 11:48:09', 'kevinarlo', 'Create Contact For Area Bali'),
(15, '2024-10-24 06:50:45', 'kevinarlo', 'kevinarlo is logged in'),
(16, '2024-10-24 07:06:57', 'kevinarlo', 'Update Contact For Area Jakarta'),
(17, '2024-10-24 07:07:29', 'kevinarlo', 'Update Contact For Area Bogor'),
(18, '2024-10-24 07:07:48', 'kevinarlo', 'Update Contact For Area  Depok'),
(19, '2024-10-24 07:08:12', 'kevinarlo', 'Update Contact For Area Bekasi'),
(20, '2024-10-24 07:08:33', 'kevinarlo', 'Update Contact For Area Semarang'),
(21, '2024-10-24 07:08:52', 'kevinarlo', 'Update Contact For Area Bali'),
(22, '2024-10-24 08:05:08', 'kevinarlo', 'Create Product Product Computer'),
(23, '2024-10-24 08:06:24', 'kevinarlo', 'Create Product Product Computer 2'),
(24, '2024-10-24 08:53:02', 'kevinarlo', 'kevinarlo has logged out');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta`
--

CREATE TABLE `tbl_meta` (
  `MetaID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `Name` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_meta`
--

INSERT INTO `tbl_meta` (`MetaID`, `StatusID`, `Name`, `Content`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'author', 'Dinamika Utama Saka', 'kevinarlo', '2024-10-02 11:33:09', NULL, NULL),
(2, 1, 'description', '', 'kevinarlo', '2024-10-02 11:35:48', NULL, NULL),
(3, 1, 'robots', 'index, follow', 'kevinarlo', '2024-10-02 11:36:13', NULL, NULL),
(4, 1, 'googlebot', 'index, follow', 'kevinarlo', '2024-10-02 11:36:37', NULL, NULL),
(5, 1, 'googlebot-news', 'nosnippet', 'kevinarlo', '2024-10-02 11:36:58', NULL, NULL),
(6, 1, 'google-site-verification', '', 'kevinarlo', '2024-10-02 11:37:13', NULL, NULL),
(7, 1, 'keywords', '', 'kevinarlo', '2024-10-02 11:37:25', NULL, NULL),
(8, 1, 'Title Tags', 'Dinamika Utama Saka', 'kevinarlo', '2024-10-02 11:37:49', NULL, NULL),
(9, 1, 'viewport', 'width=device-width, initial-scale=1.0', 'kevinarlo', '2024-10-02 11:38:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ourclient`
--

CREATE TABLE `tbl_ourclient` (
  `OurClientID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `OurClientName` text NOT NULL,
  `OurClientPhoto` varchar(255) NOT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ourclient`
--

INSERT INTO `tbl_ourclient` (`OurClientID`, `StatusID`, `OurClientName`, `OurClientPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Test edit', '6705fb5360ecb-2024-10-09-logo.png', 'kevinarlo', '2024-10-05 14:01:01', 'kevinarlo', '2024-10-09 04:11:12');

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
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ProductID`, `ProductCategoryID`, `StatusID`, `ProductName`, `ProductDescription`, `ProductPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 1, 'Product Computer', 'Product Computer', '6719ffb3c1be1-2024-10-24-logo.png', 'kevinarlo', '2024-10-24 08:05:08', NULL, NULL),
(2, 1, 1, 'Product Computer 2', 'Product Computer 2', '671a00002bf62-2024-10-24-logo.png', 'kevinarlo', '2024-10-24 08:06:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `ProductCategoryID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `ProductCategoryName` text NOT NULL,
  `ProductCategoryCatalog` varchar(255) NOT NULL,
  `ProductCategoryPhoto` varchar(255) NOT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`ProductCategoryID`, `StatusID`, `ProductCategoryName`, `ProductCategoryCatalog`, `ProductCategoryPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Computer', '6708abc86be1e-2024-10-11-Test.pdf', '6708abc86beb8-2024-10-11-IMG_4461.PNG', 'kevinarlo', '2024-10-11 04:14:59', 'kevinarlo', '2024-10-11 04:38:34');

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
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `SettingsID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `SettingsName` text NOT NULL,
  `SettingsValue` text NOT NULL,
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`SettingsID`, `StatusID`, `SettingsName`, `SettingsValue`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'About Us', 'TEST\nTEST\nTEST', 'kevinarlo', '2024-10-09 09:31:44'),
(2, 1, 'Phone Number', '0213160118', 'kevinarlo', '2024-10-09 09:35:57'),
(3, 1, 'Whatsapp Number', '6281389055595', 'kevinarlo', '2024-10-09 09:38:25');

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
(1, 4, 1, 'kevinarlo', '$2y$10$bcpx4sFLRiYLouYH5DU6LeAWHEjuDm76JoA8j.a3SB57Gca5I9Y/q', 'kevinarlo29@gmail.com', 'Kevin Arlo', '3964e9b52707a7ad5328ccfad66906735533ad05e07457c01d06e51962ea83b0', '2024-10-23 09:56:06', 'kevinarlo', '2024-03-12 17:40:23', 'kevinarlo', '2024-09-28 09:14:36'),
(2, 3, 1, 'bestian', '$2y$10$5Wa/NTbMdqKdxirFlhbZL.sUqtPMhTKB5u8d0xpI2Ik0ZrDX/B3p2', 'bestian@dinamikaus.com', 'Bestian', NULL, NULL, 'kevinarlo', '2024-03-14 14:57:30', 'kevinarlo', '2024-10-01 11:39:01'),
(3, 1, 1, 'staff', '$2y$10$W9sc3kX3V9VEcGC8yjGuxeyfgbMBVobHTLgbSenN25D9jS8hDnt8u', 'staff@gmail.com', 'Staff', NULL, NULL, 'kevinarlo', '2024-09-28 14:59:28', 'kevinarlo', '2024-10-09 03:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_eventlog`
--
ALTER TABLE `tbl_eventlog`
  ADD PRIMARY KEY (`EventLogID`);

--
-- Indexes for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  ADD PRIMARY KEY (`MetaID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_ourclient`
--
ALTER TABLE `tbl_ourclient`
  ADD PRIMARY KEY (`OurClientID`),
  ADD KEY `StatusID` (`StatusID`);

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
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`SettingsID`),
  ADD KEY `StatusID` (`StatusID`);

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
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_eventlog`
--
ALTER TABLE `tbl_eventlog`
  MODIFY `EventLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  MODIFY `MetaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ourclient`
--
ALTER TABLE `tbl_ourclient`
  MODIFY `OurClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `SettingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD CONSTRAINT `tbl_contact_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  ADD CONSTRAINT `tbl_meta_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_ourclient`
--
ALTER TABLE `tbl_ourclient`
  ADD CONSTRAINT `tbl_ourclient_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

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
-- Constraints for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD CONSTRAINT `tbl_settings_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

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
