-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:09 PM
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
  `OurClientPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `PaymentID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `PaymentName` varchar(50) NOT NULL,
  `PaymentPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`PaymentID`, `StatusID`, `PaymentName`, `PaymentPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Mandiri', '671fb2ba1f3fb-2024-10-28-logo-mandiri.png', 'kevinarlo', '2024-10-25 04:13:22', 'kevinarlo', '2024-10-28 15:50:18'),
(2, 1, 'BCA', '671fb24067bf8-2024-10-28-logo-bca.png', 'kevinarlo', '2024-10-25 04:35:55', 'kevinarlo', '2024-10-29 10:19:46'),
(3, 1, 'BRI', '671fb351a3fe9-2024-10-28-logo-bri.png', 'kevinarlo', '2024-10-28 15:34:48', 'kevinarlo', '2024-10-28 15:52:50'),
(4, 1, 'BNI', '671fb3eba3b5c-2024-10-28-logo-bni.png', 'kevinarlo', '2024-10-28 15:35:21', 'kevinarlo', '2024-10-28 15:55:24'),
(5, 1, 'CIMB Niaga', '671fb509c7f66-2024-10-28-logo-cimb-niaga.png', 'kevinarlo', '2024-10-28 15:57:04', 'kevinarlo', '2024-10-28 16:00:10');

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
  `ProductPhoto` varchar(255) DEFAULT NULL,
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
  `ProductCategoryCatalog` varchar(255) DEFAULT NULL,
  `ProductCategoryPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`SettingsID`, `StatusID`, `SettingsName`, `SettingsValue`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'About Us', 'Test', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-10-29 08:18:14'),
(2, 1, 'Phone Number', '0213160118', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-10-09 09:35:57'),
(3, 1, 'Whatsapp Number', '6281389055595', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-10-09 09:38:25'),
(4, 1, 'Address', 'Jl. Dr. Kusuma Atmaja, S.H No.83 Menteng. Jakarta Pusat', 'kevinarlo', '2024-10-29 08:32:44', NULL, NULL),
(5, 1, 'Email', 'sales@dinamikaus.com', 'kevinarlo', '2024-10-29 08:33:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings_logo`
--

CREATE TABLE `tbl_settings_logo` (
  `SettingsLogoID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `SettingsLogoName` varchar(255) NOT NULL,
  `SettingsLogoValue` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_settings_logo`
--

INSERT INTO `tbl_settings_logo` (`SettingsLogoID`, `StatusID`, `SettingsLogoName`, `SettingsLogoValue`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Logo Header or Navbar', '6720bb6b1c4d9-2024-10-29-logo.png', 'kevinarlo', '2024-10-29 09:16:40', 'kevinarlo', '2024-10-29 10:39:40'),
(2, 1, 'Logo Footer', '6720bb7930d63-2024-10-29-logo.png', 'kevinarlo', '2024-10-29 10:20:19', 'kevinarlo', '2024-10-29 10:39:53'),
(3, 1, 'Logo Login Page', '67222c78b36f9-2024-10-30-logo.png', 'kevinarlo', '2024-10-30 12:54:17', NULL, NULL),
(4, 1, 'Carousel Photo', NULL, 'kevinarlo', '2024-10-30 13:20:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `ShippingID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `ShippingName` varchar(50) NOT NULL,
  `ShippingPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`ShippingID`, `StatusID`, `ShippingName`, `ShippingPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'JNE Express', '672238b94bc11-2024-10-30-logo-jne-express.png', 'kevinarlo', '2024-10-30 13:46:33', NULL, NULL),
(2, 1, 'Gosend', '672239087fa0c-2024-10-30-logo-gosend.png', 'kevinarlo', '2024-10-30 13:47:54', NULL, NULL),
(3, 1, 'Grab Express', '6722396402663-2024-10-30-logo-grab-express.png', 'kevinarlo', '2024-10-30 13:48:10', 'kevinarlo', '2024-10-30 13:49:24'),
(4, 1, 'J&T Express', '672239261de0f-2024-10-30-logo-jnt-express.png', 'kevinarlo', '2024-10-30 13:48:22', NULL, NULL);

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
(1, 4, 1, 'kevinarlo', '$2y$10$IS1i7R8gUuwks9oTchmM2e97vr.1cdMrVNYYMJfdzcDpDhq1L83fy', 'kevinarlo29@gmail.com', 'Kevin Arlo', NULL, NULL, 'kevinarlo', '2024-03-12 17:40:23', 'kevinarlo', '2024-09-28 09:14:36'),
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
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`PaymentID`),
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
-- Indexes for table `tbl_settings_logo`
--
ALTER TABLE `tbl_settings_logo`
  ADD PRIMARY KEY (`SettingsLogoID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`ShippingID`),
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
  MODIFY `EventLogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  MODIFY `MetaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ourclient`
--
ALTER TABLE `tbl_ourclient`
  MODIFY `OurClientID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `ProductCategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `SettingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_settings_logo`
--
ALTER TABLE `tbl_settings_logo`
  MODIFY `SettingsLogoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `ShippingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

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
-- Constraints for table `tbl_settings_logo`
--
ALTER TABLE `tbl_settings_logo`
  ADD CONSTRAINT `tbl_settings_logo_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

--
-- Constraints for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD CONSTRAINT `tbl_shipping_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `tbl_status` (`StatusID`);

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
