-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 03:43 PM
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
  `ContactEmailAlternative` text DEFAULT NULL,
  `ContactNumber` varchar(15) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`ContactID`, `StatusID`, `ContactNameArea`, `ContactAddress`, `ContactLinkGmaps`, `ContactEmail`, `ContactEmailAlternative`, `ContactNumber`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Jakarta', 'Jl. Dr. Kusuma Atmaja, S.H No.83 Menteng. Jakarta Pusat', 'https://maps.app.goo.gl/DT8LEBGE8UTdE4C97', 'jakarta@dinamikaus.com', 'sales@dinamikaus.com', '0213160118', 'kevinarlo', '2024-10-09 06:47:22', 'kevinarlo', '2024-11-29 03:34:58'),
(2, 1, 'Bogor', 'Jl. Dalurung Raya No. 23 Bogor Utara. Kota Bogor', 'https://maps.app.goo.gl/TZyRXAGY8RctqwDi9', 'bogor@dinamikaus.com', 'sales@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:33:30', 'kevinarlo', '2024-11-29 03:34:46'),
(3, 1, ' Depok', 'Jl. Swadaya Raya Beji. Kota Depok', 'https://maps.app.goo.gl/8sNfXD881drRguao7', 'depok@dinamikaus.com', 'sales@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:36:33', 'kevinarlo', '2024-11-29 03:34:18'),
(4, 1, 'Bekasi', 'Jl. Cipete Raya No.83 Mustika Jaya. Kota Bekasi', 'https://maps.app.goo.gl/yptFYLWjEorzU7xH6', 'bekasi@dinamikaus.com', 'sales@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:39:55', 'kevinarlo', '2024-11-29 03:34:38'),
(5, 1, 'Semarang', 'Jl. Tamansari 1 No. 21-22 Sekaran, Gunung Pati. Kota Semarang', 'https://maps.app.goo.gl/QoJo1QUWSuz2doWA7', 'semarang@dinamikaus.com', 'sales@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:45:15', 'kevinarlo', '2024-11-29 03:35:05'),
(6, 1, 'Bali', 'Jl. Pulau Galang No.50 Pemogan. Denpasar Selatan', 'https://maps.app.goo.gl/vWrcgAWSXW5Ru8PY8', 'bali@dinamikaus.com', 'sales@dinamikaus.com', '', 'kevinarlo', '2024-10-12 11:48:09', 'kevinarlo', '2024-11-29 03:34:30');

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
(1, '2024-12-02 05:01:48', 'kevinarlo', 'kevinarlo is logged in'),
(2, '2024-12-02 05:03:52', 'kevinarlo', 'Update Product Epson CO-FH01 Full HD 3LCD Projector'),
(3, '2024-12-02 05:04:29', 'kevinarlo', 'Update Product Epson CO-FH02 Smart Projector'),
(4, '2024-12-02 05:04:53', 'kevinarlo', 'Update Product Epson EpiqVision Mini EF-11'),
(5, '2024-12-02 05:05:35', 'kevinarlo', 'Update Product Epson EpiqVision Mini EF-12'),
(6, '2024-12-02 05:05:53', 'kevinarlo', 'Update Product Epson EpiqVision Mini EF-11'),
(7, '2024-12-02 05:08:00', 'kevinarlo', 'Update Product Epson Home Theatre TW750 Full HD 1080P'),
(8, '2024-12-02 05:08:22', 'kevinarlo', 'Update Product Epson Home Theatre EH-TW9400 4K PRO-UHD'),
(9, '2024-12-02 05:08:45', 'kevinarlo', 'Update Product Epson EB-2065 XGA'),
(10, '2024-12-02 05:09:07', 'kevinarlo', 'Update Product Epson EB-2155W WXGA'),
(11, '2024-12-02 05:09:31', 'kevinarlo', 'Update Product Epson EB-2265U WUXGA'),
(12, '2024-12-02 05:09:56', 'kevinarlo', 'Update Product Epson EB-972 XGA'),
(13, '2024-12-02 05:10:18', 'kevinarlo', 'Update Product Epson EB-982W WXGA'),
(14, '2024-12-02 05:10:39', 'kevinarlo', 'Update Product Epson EB-E500 XGA'),
(15, '2024-12-02 05:11:12', 'kevinarlo', 'Update Product Epson EB-FH52 Full HD'),
(16, '2024-12-02 05:11:50', 'kevinarlo', 'Update Product Epson EB-L200X 3LCD XGA'),
(17, '2024-12-02 05:12:19', 'kevinarlo', 'Update Product Epson EB-U50 WUXGA'),
(18, '2024-12-02 05:12:41', 'kevinarlo', 'Update Product Epson EB-W50 WXGA'),
(19, '2024-12-02 05:13:09', 'kevinarlo', 'Update Product Epson EB-W51 WXGA'),
(20, '2024-12-02 05:13:38', 'kevinarlo', 'Update Product Epson EB-X06 XGA'),
(21, '2024-12-02 05:13:57', 'kevinarlo', 'Update Product Epson EB-X500 XGA'),
(22, '2024-12-02 05:14:16', 'kevinarlo', 'Update Product Epson EB-X51 XGA'),
(23, '2024-12-02 05:34:17', 'kevinarlo', 'Update Product Epson EcoTank L121 A4 Ink Tank Printer'),
(24, '2024-12-02 05:34:36', 'kevinarlo', 'Update Product Epson EcoTank L1210 A4 Ink Tank Printer'),
(25, '2024-12-02 05:35:16', 'kevinarlo', 'Update Product Epson EcoTank L1250 A4 Wi-Fi Ink Tank Printer'),
(26, '2024-12-02 05:35:36', 'kevinarlo', 'Update Product Epson EcoTank L3216 A4 All-in-One Ink Tank Printer'),
(27, '2024-12-02 05:35:55', 'kevinarlo', 'Update Product Epson EcoTank L3250 A4 Wi-Fi All-in-One Ink Tank Printer'),
(28, '2024-12-02 05:36:26', 'kevinarlo', 'Update Product Epson EcoTank L3550 Ink Tank Printer'),
(29, '2024-12-02 05:36:47', 'kevinarlo', 'Update Product Epson EcoTank L4260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer'),
(30, '2024-12-02 05:37:07', 'kevinarlo', 'Update Product Epson EcoTank L5290 A4 Wi-Fi All-in-One Ink Tank Printer with ADF'),
(31, '2024-12-02 05:37:29', 'kevinarlo', 'Update Product Epson EcoTank L5590 Ink Tank Printer'),
(32, '2024-12-02 05:37:50', 'kevinarlo', 'Update Product Epson EcoTank L6260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer'),
(33, '2024-12-02 05:38:11', 'kevinarlo', 'Update Product Epson EcoTank L6270 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF'),
(34, '2024-12-02 05:38:35', 'kevinarlo', 'Update Product Epson EcoTank L6290 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF'),
(35, '2024-12-02 05:38:55', 'kevinarlo', 'Update Product Epson EcoTank L6460 A4 Ink Tank Printer'),
(36, '2024-12-02 05:39:20', 'kevinarlo', 'Update Product Epson EcoTank L6490 A4 Ink Tank Printer'),
(37, '2024-12-02 05:39:43', 'kevinarlo', 'Update Product Epson EcoTank Monochrome M1100 Ink Tank Printer'),
(38, '2024-12-02 05:39:57', 'kevinarlo', 'Update Product Epson EcoTank Monochrome M1120 Wi-Fi Ink Tank Printer'),
(39, '2024-12-02 05:40:17', 'kevinarlo', 'Update Product Epson EcoTank Monochrome M1140 Ink Tank Printer'),
(40, '2024-12-02 05:40:34', 'kevinarlo', 'Update Product Epson EcoTank Monochrome M2140 All-in-One Ink Tank Printer'),
(41, '2024-12-02 05:41:00', 'kevinarlo', 'Update Product Epson EcoTank Monochrome M3170 Wi-Fi All-in-One Ink Tank Printer'),
(42, '2024-12-02 05:41:19', 'kevinarlo', 'Update Product Epson EcoTank L18050 Ink Tank Printer'),
(43, '2024-12-02 05:41:35', 'kevinarlo', 'Update Product Epson EcoTank L8050 Ink Tank Printer'),
(44, '2024-12-02 05:41:55', 'kevinarlo', 'Update Product Epson L850 Photo All-in-One Ink Tank Printer'),
(45, '2024-12-02 05:42:16', 'kevinarlo', 'Update Product Epson EcoTank L14150 A3+ Wi-Fi Duplex Wide-Format All-in-One Ink Tank Printer'),
(46, '2024-12-02 05:42:32', 'kevinarlo', 'Update Product Epson EcoTank L15150 A3 Wi-Fi Duplex'),
(47, '2024-12-02 05:42:54', 'kevinarlo', 'Update Product Epson EcoTank L15160 A3 Wi-Fi Duplex'),
(48, '2024-12-02 05:43:16', 'kevinarlo', 'Update Product Epson EcoTank L15160 A3 Wi-Fi Duplex'),
(49, '2024-12-02 05:43:34', 'kevinarlo', 'Update Product Epson EcoTank L15180 A3 Wi-Fi Duplex'),
(50, '2024-12-02 05:44:02', 'kevinarlo', 'Update Product Epson LX-310 Dot Matrix Printer'),
(51, '2024-12-02 05:44:32', 'kevinarlo', 'Update Product Epson LQ-2190 Dot Matrix Printer'),
(52, '2024-12-02 05:44:50', 'kevinarlo', 'Update Product Epson LQ-310 Dot Matrix Printer'),
(53, '2024-12-04 12:17:20', 'kevinarlo', 'kevinarlo is logged in'),
(54, '2024-12-04 12:17:29', 'kevinarlo', 'Update Meta google-site-verification'),
(55, '2024-12-04 12:45:45', 'kevinarlo', 'Update Meta description'),
(56, '2024-12-04 12:58:17', 'kevinarlo', 'Update Meta keywords'),
(57, '2024-12-04 12:59:11', 'kevinarlo', 'Update Meta author'),
(58, '2024-12-04 12:59:18', 'kevinarlo', 'Update Meta Title Tags'),
(59, '2024-12-04 13:01:03', 'kevinarlo', 'kevinarlo has logged out'),
(60, '2024-12-04 13:41:24', 'kevinarlo', 'kevinarlo is logged in'),
(61, '2024-12-04 13:47:13', 'kevinarlo', 'kevinarlo has logged out'),
(62, '2024-12-04 13:59:40', 'kevinarlo', 'kevinarlo is logged in'),
(63, '2024-12-04 13:59:56', 'kevinarlo', 'Update Settings Logo Logo Header or Navbar'),
(64, '2024-12-04 14:00:11', 'kevinarlo', 'kevinarlo has logged out');

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
(1, 1, 'author', 'PT Dinamika Utama Saka', 'kevinarlo', '2024-10-02 11:33:09', 'kevinarlo', '2024-12-04 12:59:11'),
(2, 1, 'description', 'PT Dinamika Utama Saka berkomitmen memberikan produk berkualitas dan layanan efisien dengan harga terbaik. Solusi yang tepat sesuai kebutuhan Anda.', 'kevinarlo', '2024-10-02 11:35:48', 'kevinarlo', '2024-12-04 12:45:46'),
(3, 1, 'robots', 'index, follow', 'kevinarlo', '2024-10-02 11:36:13', NULL, NULL),
(4, 1, 'googlebot', 'index, follow', 'kevinarlo', '2024-10-02 11:36:37', NULL, NULL),
(5, 1, 'googlebot-news', 'nosnippet', 'kevinarlo', '2024-10-02 11:36:58', NULL, NULL),
(6, 1, 'google-site-verification', 'WkjS9CnHnytOJ8LDJLUNcTuwudwwW0izE8Yw1MiRQHg', 'kevinarlo', '2024-10-02 11:37:13', 'kevinarlo', '2024-12-04 12:17:29'),
(7, 1, 'keywords', 'harga lap top, laptop notebook, bagus laptop, monitor laptop, laptop kerja, printer, epson printer, canon printer, thermal printer, hp printer, proyektor, monitor pc, mouse, wireless mouse, logitech mouse, keyboard pc, pc gaming, mini pc gaming, case pc gaming, kursi gaming, harga kursi gaming, keyboard pc gaming, harga keyboard pc gaming, best keyboard pc gaming, wireless keyboard pc gaming', 'kevinarlo', '2024-10-02 11:37:25', 'kevinarlo', '2024-12-04 12:58:17'),
(8, 1, 'Title Tags', 'PT Dinamika Utama Saka', 'kevinarlo', '2024-10-02 11:37:49', 'kevinarlo', '2024-12-04 12:59:19'),
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

--
-- Dumping data for table `tbl_ourclient`
--

INSERT INTO `tbl_ourclient` (`OurClientID`, `StatusID`, `OurClientName`, `OurClientPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'PT FAJAR SURYA WISESA', '673d77d8b5e2e-2024-11-20-PT FAJAR PAPER.png', 'kevinarlo', '2024-11-04 10:52:10', 'kevinarlo', '2024-11-20 06:05:58'),
(2, 1, 'PT PATEC', '673d786e903e5-2024-11-20-PT PATEC.png', 'kevinarlo', '2024-11-04 10:54:22', 'kevinarlo', '2024-11-20 06:06:11'),
(3, 1, 'PT API PRECISION', '673d78799fb09-2024-11-20-PT API.png', 'kevinarlo', '2024-11-04 10:54:41', 'kevinarlo', '2024-11-20 06:06:43'),
(4, 1, 'PT PDF', '673d788b1a4eb-2024-11-20-PT PDF.png', 'kevinarlo', '2024-11-04 10:54:58', 'kevinarlo', '2024-11-20 05:50:03'),
(5, 1, 'PT ARTADA', '673d7b35cb32d-2024-11-20-PT ARTADA.png', 'kevinarlo', '2024-11-04 10:55:12', 'kevinarlo', '2024-11-20 06:05:37'),
(6, 1, 'PT CMM GLOBAL', '673d7b4a3253c-2024-11-20-PT CMM GLOBAL.png', 'kevinarlo', '2024-11-04 10:55:27', 'kevinarlo', '2024-11-20 06:01:46'),
(7, 1, 'PT HLN', '673d7b58ddca1-2024-11-20-PT HLN.png', 'kevinarlo', '2024-11-04 10:55:43', 'kevinarlo', '2024-11-20 06:02:01'),
(8, 1, 'PT INDOSAFE', '673d7b756778b-2024-11-20-PT INDOSAFE.png', 'kevinarlo', '2024-11-04 10:55:50', 'kevinarlo', '2024-11-20 06:02:29'),
(9, 1, 'PT FATIHA ALAM  SEMESTA', '673d7bec26e78-2024-11-20-PT FATIHA ALAM  SEMESTA.png', 'kevinarlo', '2024-11-11 07:10:34', 'kevinarlo', '2024-11-20 06:04:28'),
(10, 1, 'PT NAYMAS MAHKOTA ABADI', '673d7c202c945-2024-11-20-PT NAYMAS.png', 'kevinarlo', '2024-11-11 07:11:01', 'kevinarlo', '2024-11-20 06:05:20'),
(12, 2, 'Our Client', '6731ae2b2fb6a-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:11:39', 'kevinarlo', '2024-11-20 06:07:10'),
(13, 2, 'Our Client', '6731ae3740efb-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:11:51', 'kevinarlo', '2024-11-20 06:07:14'),
(14, 2, 'Our Client', '6731ae46a886e-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:12:07', 'kevinarlo', '2024-11-20 06:07:17'),
(15, 2, 'Our Client', '6731ae582d3e2-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:12:24', 'kevinarlo', '2024-11-20 06:07:21'),
(16, 2, 'Our Client', '6731ae64a1c02-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:12:37', 'kevinarlo', '2024-11-20 06:07:25'),
(17, 2, 'Our Client', '6731ae6e33d1b-2024-11-11-Our Client 200x200.jpg', 'kevinarlo', '2024-11-11 07:12:46', 'kevinarlo', '2024-11-20 06:07:28');

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
  `ProductPrice` decimal(15,2) DEFAULT NULL,
  `ProductDescription` text DEFAULT NULL,
  `ProductPhoto` varchar(255) DEFAULT NULL,
  `CreateBy` varchar(20) DEFAULT NULL,
  `CreateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateBy` varchar(20) DEFAULT NULL,
  `UpdateTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ProductID`, `ProductCategoryID`, `StatusID`, `ProductName`, `ProductPrice`, `ProductDescription`, `ProductPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 1, 'ROG Zephyrus G16', 42500000.00, 'AMD Ryzen™ AI 9 HX 370 Processor 2.0GHz<br>\r\nNVIDIA® GeForce RTX™ 4060 Laptop GPU<br>\r\n16GB*2 LPDDR5X on board<br>\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD<br>\r\nNebula OLED-QHD240Hz<br>\r\nWindows 11 Home', '673cb786c0aa0-2024-11-19-ROG Zephyrus G16 (PICT 1).png', 'kevinarlo', '2024-11-01 07:40:13', 'kevinarlo', '2024-11-29 04:17:25'),
(2, 2, 1, 'PC DESKTOP AMD RYZEN 3 FOR OFFICE LOW', 3250000.00, 'AMD Ryzen 3 3200G 3.6Ghz Up To 4.0Ghz Cache 4MB 65W AM4<br>\r\nKLEVV SSD CRAS C715 256GB M.2 2280 NVMe (R3000MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Single Channel 8GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495e199879a-2024-11-29-PC R3 (PICT 1).png', 'kevinarlo', '2024-11-01 07:41:57', 'kevinarlo', '2024-11-29 06:24:25'),
(3, 1, 1, 'ROG FLOW X13', 36500000.00, 'AMD Ryzen™ 9 7940HS Mobile Processor<br>\r\nNVIDIA® GeForce RTX™ 4050 Laptop GPU<br>\r\n8GB*2 LPDDR5 on board<br>\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD<br>\r\nWindows 11 Home\r\n', '673cbed0007fe-2024-11-19-ROG FLOW X13 (PICT 2).png', 'kevinarlo', '2024-11-04 12:18:50', 'kevinarlo', '2024-11-29 04:15:46'),
(4, 1, 1, 'ROG STRIX SCAR 16', 68500000.00, '13th Gen Intel® Core™ i9-13980HX Processor<br>\r\nNVIDIA® GeForce RTX™ 4080 Laptop GPU<br>\r\n16GB DDR5-4800 SO-DIMM *2<br>\r\n2TB PCIe® 4.0 NVMe™ M.2 Performance SSD<br>\r\nNebHDR-MiniLED-QHD240Hz<br>\r\nWindows 11 Home', '673cbf6e42aee-2024-11-19-ROG STRIX SCAR 16 (PICT 3).png', 'kevinarlo', '2024-11-19 16:40:16', 'kevinarlo', '2024-11-29 04:16:17'),
(5, 1, 1, 'ROG STRIX SCAR 16', 73500000.00, '13th Gen Intel® Core™ i9-13980HX Processor<br>\r\nNVIDIA® GeForce RTX™ 4090 Laptop GPU<br>\r\n16GB DDR5-4800 SO-DIMM *2<br>\r\n2TB PCIe® 4.0 NVMe™ M.2 Performance SSD<br>\r\nNebHDR-MiniLED-QHD240Hz<br>\r\nWindows 11 Home', '673cc01a0554a-2024-11-19-ROG STRIX SCAR 16 (PICT 3).png', 'kevinarlo', '2024-11-19 16:43:06', 'kevinarlo', '2024-11-29 04:16:52'),
(6, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 17500000.00, 'Intel®Core™ i5-12450H Processor<br>\r\nNVIDIA® GeForce® RTX™ 3050<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d7f639bc67-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:15:52', 'kevinarlo', '2024-11-29 04:05:55'),
(7, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 19500000.00, 'Intel® Core™ i9-11900H Processor<br>\r\nNVIDIA® GeForce® RTX™ 3050<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d7fb9b6777-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:20:43', 'kevinarlo', '2024-11-29 04:06:24'),
(8, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 20500000.00, 'Intel® Core™ i9-11900H Processor<br>\r\nNVIDIA® GeForce® RTX™ 3050 Ti<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d800f2de65-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:22:07', 'kevinarlo', '2024-11-29 04:06:59'),
(9, 1, 1, 'ASUS Zenbook Pro 14 OLED (UX6404)', 36350000.00, 'Intel® Core™ i9-13900H Processor 2.6 GHz (24MB Cache, up to 5.4 GHz, 14 cores, 20 Threads)<br>\r\nNVIDIA® GeForce RTX™ 4070 Laptop GPU 8GB DDR6<br>\r\n16GB DDR5 on board<br>\r\n1TB M.2 NVMe™ PCIe® 4.0 Performance SSD<br>\r\nWindows 11 Home', '673d80876ae0e-2024-11-20-ASUS ZENBOOK PRO 14 OLED (PICT 2).png', 'kevinarlo', '2024-11-20 06:24:07', 'kevinarlo', '2024-11-29 04:14:41'),
(10, 1, 1, 'ASUS Vivobook Pro 14 OLED (M3401, AMD Ryzen™ 5000 Series Mobile Processors)', 12500000.00, 'AMD Ryzen™ 5 5600H<br>\r\nNVIDIA® GeForce RTX® 3050 Laptop GPU<br>\r\n8GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n2.8k OLED<br>\r\nWindows 11 Home', '673d830f177e1-2024-11-20-ASUS Vivobook Pro 14 OLED (PICT 3).png', 'kevinarlo', '2024-11-20 06:34:55', 'kevinarlo', '2024-11-29 04:04:18'),
(11, 1, 1, 'ASUS Vivobook Pro 14 OLED (M3401, AMD Ryzen™ 5000 Series Mobile Processors)', 15500000.00, 'AMD Ryzen™ 7 5800H<br>\r\nNVIDIA® GeForce RTX® 3050 Laptop GPU<br>\r\n8GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n2.8k OLED<br>\r\nWindows 11 Home', '673d834ec09e9-2024-11-20-ASUS Vivobook Pro 14 OLED (PICT 3).png', 'kevinarlo', '2024-11-20 06:35:59', 'kevinarlo', '2024-11-29 04:04:54'),
(12, 1, 1, 'ASUS Vivobook Pro 15 OLED (M6500, AMD Ryzen™ 5000 Series Mobile Processor)', 14500000.00, 'AMD Ryzen™ 5 5600H Mobile Processor<br>\r\nNVIDIA® GeForce® RTX™ 3050 Laptop GPU<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d83e1b08dd-2024-11-20-ASUS Vivobook Pro 15 OLED (PICT 4).png', 'kevinarlo', '2024-11-20 06:38:26', 'kevinarlo', '2024-11-29 04:07:56'),
(13, 1, 1, 'ASUS Vivobook Pro 15 OLED (M6500, AMD Ryzen™ 5000 Series Mobile Processor)', 0.00, 'AMD Ryzen™ 5 5600H Mobile Processor<br>\r\nNVIDIA® GeForce® RTX™ 3050 Ti Laptop GPU<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d84141c2e1-2024-11-20-ASUS Vivobook Pro 15 OLED (PICT 4).png', 'kevinarlo', '2024-11-20 06:39:16', 'kevinarlo', '2024-11-29 04:08:24'),
(14, 1, 1, 'ASUS Vivobook Pro 16X OLED (N7600, 11th Gen Intel)', 20500000.00, 'Intel® Core™ i7-11370H Processor 3.3 GHz<br>\r\nNVIDIA® GeForce® RTX™ 3050 Laptop GPU 4GB GDDR6<br>\r\n16GB DDR4 on board<br>\r\n1TB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d84b39856e-2024-11-20-ASUS Vivobook Pro 16X OLED (PICT 5).png', 'kevinarlo', '2024-11-20 06:41:56', 'kevinarlo', '2024-11-29 04:09:13'),
(15, 1, 1, 'ASUS Vivobook S 14 OLED (M5406)', 13300000.00, 'AMD Ryzen™ 5 7535HS Mobile Processor 3.3GHz<br>\r\nAMD Radeon™ Graphics<br>\r\n16GB LPDDR5X on board<br>\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\nWindows 11 Home', '673d8520501aa-2024-11-20-ASUS Vivobook S 14 OLED (PICT 6).png', 'kevinarlo', '2024-11-20 06:43:45', 'kevinarlo', '2024-11-29 04:10:07'),
(16, 1, 1, 'ASUS Vivobook S 14 OLED (S5406)', 18500000.00, 'Intel® Core™ Ultra 7 Processor 155H 1.4 GHz<br>\r\nIntel® Arc™ Graphics<br>\r\n16GB LPDDR5X on board<br>\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\nWindows 11 Home', '673d858e143f7-2024-11-20-ASUS Vivobook S 14 OLED (PICT 7).png', 'kevinarlo', '2024-11-20 06:45:36', 'kevinarlo', '2024-11-29 04:10:52'),
(17, 1, 1, 'ASUS Vivobook S 15 OLED (S5507) Copilot+ PC', 26500000.00, 'Snapdragon® X Elite X1E 78 100 Processor 3.4GHz<br>\r\n32GB LPDDR5X on board<br>\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\n15.6-inch, 3K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home\r\n', '673d860592d8f-2024-11-20-ASUS Vivobook S 15 OLED (PICT 8).png', 'kevinarlo', '2024-11-20 06:47:34', 'kevinarlo', '2024-11-29 04:12:29'),
(18, 1, 1, 'ASUS Vivobook S 15 OLED (S5507) Copilot+ PC', 22500000.00, 'Snapdragon® X Plus X1P 42 100 Processor up to 3.4GHz<br>\r\n16GB LPDDR5X on board<br>\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD<br>\r\n15.6-inch, 3K (2880 x 1620) OLED 16:9 aspect ratio<br>\r\nWindows 11 Home', '673d8644c6347-2024-11-20-ASUS Vivobook S 15 OLED (PICT 8).png', 'kevinarlo', '2024-11-20 06:48:38', 'kevinarlo', '2024-11-29 04:13:04'),
(19, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 7000000.00, 'AMD Ryzen™ 3 7320U Mobile Processor<br>\r\n8GB DDR4 on board<br>\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home\r\n', '673d86ae7f624-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:50:22', 'kevinarlo', '2024-11-29 04:00:10'),
(20, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 7500000.00, 'AMD Ryzen™ 3 7320U Mobile Processor<br>\r\n8GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home\r\n', '673d86cf7d2a3-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:50:55', 'kevinarlo', '2024-11-29 04:00:34'),
(21, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 10500000.00, 'AMD Ryzen™ 5 7520U Mobile Processor<br>\r\n16GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d86ef8c96a-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:51:27', 'kevinarlo', '2024-11-29 04:01:06'),
(22, 1, 1, 'ASUS Vivobook Go 15 OLED (E1504F)', 8500000.00, 'AMD Ryzen™ 3 7320U Mobile Processor<br>\r\n8GB DDR4 on board<br>\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d874486100-2024-11-20-ASUS Vivobook Go 15 OLED (PICT 10).png', 'kevinarlo', '2024-11-20 06:52:52', 'kevinarlo', '2024-11-29 04:02:51'),
(23, 1, 1, 'ASUS Vivobook Go 15 OLED (E1504F)', 9350000.00, 'AMD Ryzen™ 3 7320U Mobile Processor<br>\r\n8GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d87600e06c-2024-11-20-ASUS Vivobook Go 15 OLED (PICT 10).png', 'kevinarlo', '2024-11-20 06:53:20', 'kevinarlo', '2024-11-29 04:03:36'),
(24, 1, 1, 'ASUS Vivobook Go 14 Flip (TP1400)', 6500000.00, 'Intel® Celeron® N4500<br>\r\n4GB DDR4 on board<br>\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d87dab7257-2024-11-20-ASUS Vivobook Go 14 Flip (PICT 11).png', 'kevinarlo', '2024-11-20 06:55:23', 'kevinarlo', '2024-11-29 04:01:46'),
(25, 1, 1, 'ASUS Vivobook Go 14 Flip (TP1400)', 8500000.00, 'Intel® Pentium® Silver N6000<br>\r\n8GB DDR4 on board<br>\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD<br>\r\nWindows 11 Home', '673d87ff462ad-2024-11-20-ASUS Vivobook Go 14 Flip (PICT 11).png', 'kevinarlo', '2024-11-20 06:55:59', 'kevinarlo', '2024-11-29 04:02:16'),
(26, 1, 1, 'ASUS TUF Gaming A15', 25000000.00, 'AMD Ryzen™ 9 8945H Processor 4GHz<br>\r\nNVIDIA® GeForce RTX™ 4060 Laptop GPU<br>\r\n16GB DDR5-5600 SO-DIMM<br>\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD<br>\r\nFHD (1920 x 1080) 16:9 144Hz<br>\r\nWindows 11 Home\r\n', '673d8858495d6-2024-11-20-ASUS TUF Gaming A15 (PICT 12).png', 'kevinarlo', '2024-11-20 06:57:30', 'kevinarlo', '2024-11-29 03:58:31'),
(27, 1, 1, 'ASUS TUF Gaming A15', 27500000.00, 'AMD Ryzen™ 9 8945HS Processor 4GHz<br>\r\nNVIDIA® GeForce RTX™ 4070 Laptop GPU<br>\r\n16GB DDR5-5600 SO-DIMM<br>\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD<br>\r\nFHD (1920 x 1080) 16:9 144Hz<br>\r\nWindows 11 Home\r\n', '673d887e02982-2024-11-20-ASUS TUF Gaming A15 (PICT 12).png', 'kevinarlo', '2024-11-20 06:58:06', 'kevinarlo', '2024-11-29 03:59:01'),
(28, 3, 1, '21.45 inch Full HD monitor with AMD FreeSync™', 1450000.00, '', '673d8bd65be64-2024-11-20-LG PICT 1 & 2 & 12.png', 'kevinarlo', '2024-11-20 07:12:22', 'kevinarlo', '2024-11-20 07:37:02'),
(29, 3, 1, '23.8 inch IPS Full HD Monitor dengan AMD FreeSyncᵀᴹ', 1650000.00, '', '673d92a7df166-2024-11-20-LG PICT 1 & 2 & 12.png', 'kevinarlo', '2024-11-20 07:41:28', 'kevinarlo', '2024-11-20 08:32:00'),
(30, 3, 1, '31.5 inch Full HD Curved monitor with AMD FreeSync™', 3150000.00, '', '673d92f924b6c-2024-11-20-LG PICT 1 & 2 & 12.png', 'kevinarlo', '2024-11-20 07:42:49', NULL, NULL),
(31, 3, 1, '23.8 inch QHD IPS Monitor dengan AMD FreeSync™', 3650000.00, '', '673d93a5cee2f-2024-11-20-LG PICT 3.png', 'kevinarlo', '2024-11-20 07:45:42', NULL, NULL),
(32, 3, 1, '24 inch IPS Full HD monitor', 1650000.00, '', '673d946527ec6-2024-11-20-LG PICT 4 & 7 & 8.png', 'kevinarlo', '2024-11-20 07:48:55', NULL, NULL),
(33, 3, 1, '25 inch IPS Full HD monitor', 1700000.00, '', '673d94934376e-2024-11-20-LG PICT 4 & 7 & 8.png', 'kevinarlo', '2024-11-20 07:49:40', NULL, NULL),
(34, 3, 1, '27 inch IPS Full HD monitor', 1900000.00, '', '673d94b2cc99c-2024-11-20-LG PICT 4 & 7 & 8.png', 'kevinarlo', '2024-11-20 07:50:11', NULL, NULL),
(35, 3, 1, '24 inch UltraGear™ FHD 180Hz gaming monitor', 2150000.00, '', '673d955402cb6-2024-11-20-LG PICT 5 & 11.png', 'kevinarlo', '2024-11-20 07:52:52', NULL, NULL),
(36, 3, 1, '31.5 inch Full HD Curved monitor with AMD FreeSync™', 3150000.00, '', '673d958aed5b9-2024-11-20-LG PICT 5 & 11.png', 'kevinarlo', '2024-11-20 07:53:48', NULL, NULL),
(37, 3, 1, '24 inch UltraGear™ Full HD IPS gaming monitor', 2500000.00, '', '673d9617d005c-2024-11-20-LG PICT 6.png', 'kevinarlo', '2024-11-20 07:56:08', NULL, NULL),
(38, 3, 1, '27 inch UltraGear™ QHD IPS 180Hz (O/C 200Hz) gaming monitor', 4250000.00, '', '673d96c812f37-2024-11-20-LG PICT 9.png', 'kevinarlo', '2024-11-20 07:59:04', NULL, NULL),
(39, 3, 1, '27 inch UltraGear™ 1000R curved gaming monitor', 4000000.00, '', '673d973f38115-2024-11-20-LG PICT 10.png', 'kevinarlo', '2024-11-20 08:01:03', NULL, NULL),
(40, 3, 1, '32 inch UltraGear™ 1000R curved gaming monitor', 4500000.00, '', '673d97c48b646-2024-11-20-LG PICT 13.png', 'kevinarlo', '2024-11-20 08:03:16', NULL, NULL),
(41, 3, 1, 'QHD (3440 x 1440) UltraWide™', 8150000.00, '', '673d9833f1171-2024-11-20-LG PICT 14.png', 'kevinarlo', '2024-11-20 08:05:08', NULL, NULL),
(42, 3, 1, '34 inch 21:9 Curved UltraWide™ QHD (3440x1440) Monitor with FreeSync™', 5750000.00, '', '673d98b3b305c-2024-11-20-LG PICT 15.png', 'kevinarlo', '2024-11-20 08:07:16', NULL, NULL),
(43, 3, 1, 'Monitor IPS DisplayHDR™ 400 VESA FHD UltraWide 34 inch dengan AMD FreeSync™', 6300000.00, '', '673d992edc046-2024-11-20-LG PICT 16.png', 'kevinarlo', '2024-11-20 08:09:19', NULL, NULL),
(44, 3, 1, 'Monitor LG UltraWide Dual QHD', 23500000.00, '', '673d99bd8c396-2024-11-20-LG PICT 17.png', 'kevinarlo', '2024-11-20 08:11:41', NULL, NULL),
(45, 6, 1, 'K120 Corded Keyboard', 185000.00, 'Spesifikasi K120 Corded Keyboard<br>\r\nTinggi: 155 mm<br>\r\nLebar: 450 mm<br>\r\nTebal: 23,5 mm<br>\r\nBerat: 550 g<br>\r\nPanjang kabel: 150 cm', '674939c09c55a-2024-11-29-K120 Corded Keyboard (PICT 1).png', 'kevinarlo', '2024-11-29 03:49:21', NULL, NULL),
(46, 6, 1, 'K270 Wireless Keyboard', 450000.00, 'Spesifikasi K270 Wireless Keyboard<br>\r\nTinggi: 149 mm<br>\r\nLebar: 441,5 mm<br>\r\nTebal: 18 mm di depan, 22 mm di belakang<br>\r\nBerat: 498 g ', '67493b513f43e-2024-11-29-K270 Wireless Keyboard (PICT 2).png', 'kevinarlo', '2024-11-29 03:56:01', NULL, NULL),
(47, 6, 1, 'K400 Plus Wireless Touch Keyboard', 725000.00, 'Spesifikasi K400 Plus Wireless Touch Keyboard<br> Tinggi: 139,9 mm<br> Lebar: 354,3 mm<br> Tebal: 23,5 mm<br> Berat: 390 g (dengan baterai)<br><br> <b>Touchpad</b><br> Tinggi: 76 mm<br> Lebar: 47 mm', '6749414c2eaca-2024-11-29-K400 Plus Wireless Touch Keyboard (PICT 3).png', 'kevinarlo', '2024-11-29 04:21:32', 'kevinarlo', '2024-11-29 04:24:41'),
(48, 6, 1, 'MX Keys S', 2325000.00, 'Spesifikasi Keyboard MX Keys S<br>\r\nTinggi: 131,63 mm<br>\r\nLebar: 430,2 mm<br>\r\nTebal: 20,5 mm<br>\r\nBerat: 810 g<br><br>\r\nReceiver USB Logi Bolt<br>\r\nTinggi: 6,11 mm<br>\r\nLebar: 14,4 mm<br>\r\nTebal: 18,65 mm<br>\r\nBerat: 1,68 g', '674941dc5c73d-2024-11-29-MX Keys S (PICT 4).png', 'kevinarlo', '2024-11-29 04:23:58', 'kevinarlo', '2024-11-29 04:25:35'),
(49, 6, 1, 'Signature K650', 850000.00, 'Spesifikasi Signature K650<br>\r\nTinggi: 193,5 mm<br>\r\nLebar: 457,3 mm<br>\r\nTebal: 24 mm<br>\r\nBerat: 700,23 g tanpa receiver (1,8 g) dan dengan 2 baterai AA Alkaline (48,23 g)', '674942d160295-2024-11-29-Signature K650 (PICT 5).png', 'kevinarlo', '2024-11-29 04:28:01', NULL, NULL),
(50, 6, 1, 'B170 Wireless Mouse', 165000.00, 'Spesifikasi B170 Wireless Mouse<br>\r\nTinggi: 97,7 mm<br>\r\nLebar: 61,5 mm<br>\r\nTebal: 35,2 mm<br>\r\nBerat (dengan baterai): 70,5 g<br><br>\r\nReceiver USB<br>\r\nTinggi: 6,6 mm<br>\r\nLebar: 23,1 mm<br>\r\nTebal: 18,7 mm<br>\r\nBerat: 1,8 g', '674944fcb3049-2024-11-29-B170 Wireless Mouse (PICT 6).png', 'kevinarlo', '2024-11-29 04:37:17', NULL, NULL),
(51, 6, 1, 'M100r CORDED MOUSE', 120000.00, 'Spesifikasi M100r Corded Mouse<br>\r\nTinggi: 113 mm<br>\r\nLebar: 62 mm<br>\r\nTebal: 38 mm<br>\r\nBerat: 90 g<br><br>\r\nKabel<br>\r\nPanjang kabel: 180 cm', '67494553e7186-2024-11-29-M100r CORDED MOUSE (PICT 7).png', 'kevinarlo', '2024-11-29 04:38:44', NULL, NULL),
(52, 6, 1, 'Mouse M170/M171 Wireless', 265000.00, 'Spesifikasi Mouse M170/M171 Wireless<br>\r\nTinggi: 97,7 mm<br>\r\nLebar: 61,5 mm<br>\r\nTebal: 35,2 mm<br>\r\nBerat (dengan baterai): 69,3 g<br><br>\r\nReceiver USB<br>\r\nTinggi: 18,7 mm<br>\r\nLebar: 14,4 mm<br>\r\nTebal: 6,1 mm<br>\r\nBerat: 1,8 g', '674945c3c744e-2024-11-29-Mouse M170M171 Wireless (PICT 8).png', 'kevinarlo', '2024-11-29 04:40:36', NULL, NULL),
(53, 6, 1, 'M331 SILENT PLUS', 350000.00, 'Spesifikasi M331 Silent Plus<br>\r\nTinggi: 105,4 mm<br>\r\nLebar: 67,9 mm<br>\r\nTebal: 38,4 mm<br>\r\nBerat (dengan baterai): 78 g<br><br>\r\nReceiver USB<br>\r\nTinggi: 14,4 mm<br>\r\nLebar: 18,7 mm<br>\r\nTebal: 6,1 mm<br>\r\nBerat: 1,8 g', '67494615dcd2e-2024-11-29-M331 SILENT PLUS (PICT 9).png', 'kevinarlo', '2024-11-29 04:41:58', NULL, NULL),
(54, 6, 1, 'M720 Triathlon', 950000.00, 'Spesifikasi M720 Triathlon<br>\r\nTinggi: 115 mm<br>\r\nLebar: 74 mm<br>\r\nTebal: 45 mm<br>\r\nBerat (dengan baterai): 135 g, dengan baterai AA<br><br>\r\nLogitech Unifying Receiver<br>\r\nTinggi: 18,7 mm<br>\r\nLebar: 14,4 mm<br>\r\nTebal: 6,1 mm<br>\r\nBerat: 1,8 g', '674946734eedc-2024-11-29-M720 Triathlon (PICT 10).png', 'kevinarlo', '2024-11-29 04:43:31', NULL, NULL),
(55, 6, 1, 'Pebble Mouse 2 M350s', 550000.00, 'Spesifikasi Pebble Mouse 2 M350s<br>\r\nTinggi: 106,7 mm<br>\r\nLebar: 58,7 mm<br>\r\nTebal: 26,62 mm<br>\r\nBerat (termasuk baterai): 76 g', '674946c414fe0-2024-11-29-Pebble Mouse 2 M350s (PICT 11).png', 'kevinarlo', '2024-11-29 04:44:52', NULL, NULL),
(56, 6, 1, 'Signature M650', 650000.00, 'Spesifikasi Signature M650<br>\r\nTinggi: 108,2 mm<br>\r\nLebar: 61 mm<br>\r\nTebal: 38,8 mm<br>\r\nBerat: 101,4 g<br><br>\r\nSignature M650 L<br>\r\nTinggi: 118,7 mm<br>\r\nLebar: 66,2 mm<br>\r\nTebal: 42 mm<br>\r\nBerat: 115,4 g', '6749495f1c47e-2024-11-29-Signature M650 (PICT 12).png', 'kevinarlo', '2024-11-29 04:55:59', NULL, NULL),
(57, 6, 1, 'MX Master 3S For Mac', 1750000.00, 'Spesifikasi Mouse MX Master 3S for Mac<br>\r\nTinggi: 124,9 mm<br>\r\nLebar: 84,3 mm<br>\r\nTebal: 51 mm<br>\r\nBerat: 141 g', '674949b581c4d-2024-11-29-MX Master 3S For Mac (PICT 13).png', 'kevinarlo', '2024-11-29 04:57:25', NULL, NULL),
(58, 6, 1, 'MX Master 3S', 1750000.00, 'Spesifikasi Mouse MX Master 3S<br>\r\nTinggi: 124,9 mm<br>\r\nLebar: 84,3 mm<br>\r\nTebal: 51 mm<br>\r\nBerat: 141 g<br><br>\r\nReceiver USB Logi Bolt<br>\r\nTinggi: 6,11 mm<br>\r\nLebar: 14,4 mm<br>\r\nTebal: 18,65 mm<br>\r\nBerat: 1,68 g', '67494a0f3e8f6-2024-11-29-MX Master 3S (PICT 14).png', 'kevinarlo', '2024-11-29 04:58:55', NULL, NULL),
(59, 6, 1, 'POP Mouse', 650000.00, 'Spesifikasi POP Mouse<br>\r\nTinggi: 104,8 mm<br>\r\nLebar: 59,4 mm<br>\r\nTebal: 35,2 mm<br>\r\nBerat (dengan baterai): 82 gram', '67494a8472fa7-2024-11-29-POP Mouse (PICT 15).png', 'kevinarlo', '2024-11-29 05:00:52', NULL, NULL),
(60, 6, 1, 'MX Keys Mini', 2400000.00, 'Keyboard MX Keys Mini<br>\r\nTinggi: 131,95 mm<br>\r\nLebar: 295,99 mm<br>\r\nTebal: 20,97 mm<br>\r\nBerat: 506,4 g', '67494acf61699-2024-11-29-MX Keys Mini (PICT 16).png', 'kevinarlo', '2024-11-29 05:02:07', NULL, NULL),
(61, 6, 1, 'Wave Keys', 1300000.00, 'Spesifikasi Wave Keys<br>\r\nPanjang: 375,97 mm<br>\r\nLebar: 218,91 mm<br>\r\nTinggi: 30,53 mm<br>\r\nBerat (termasuk baterai): 750 g', '67494b2a4e842-2024-11-29-Wave Keys (PICT 17).png', 'kevinarlo', '2024-11-29 05:03:38', NULL, NULL),
(62, 6, 1, 'Keyboard Bluetooth K380', 725000.00, 'Spesifikasi Keyboard Bluetooth K380<br>\r\nTinggi: 124 mm<br>\r\nLebar: 279 mm<br>\r\nTebal: 16 mm<br>\r\nBerat: 423 g termasuk baterai', '67494b7ec5ece-2024-11-29-Keyboard Bluetooth K380 (PICT 18).png', 'kevinarlo', '2024-11-29 05:05:03', NULL, NULL),
(63, 6, 1, 'POP Icon Keys', 1250000.00, 'Spesifikasi POP Icon Keys<br>\r\nTinggi: 136,96 mm<br>\r\nLebar: 324,51 mm<br>\r\nTebal: 22 mm<br>\r\nBerat (termasuk baterai): 530 g', '67494be02249d-2024-11-29-POP Icon Keys (PICT 19).png', 'kevinarlo', '2024-11-29 05:06:40', NULL, NULL),
(64, 6, 1, 'Pebble Keys 2 K380s', 850000.00, 'Spesifikasi Pebble Keys 2 K380s<br>\r\nTinggi: 124 mm<br>\r\nLebar: 279 mm<br>\r\nTebal: 16 mm<br>\r\nBerat (dengan baterai): 415 g', '67494c7b732a3-2024-11-29-Pebble Keys 2 K380s (PICT 20).png', 'kevinarlo', '2024-11-29 05:09:15', NULL, NULL),
(65, 6, 1, 'HP 150 Wired Mouse and Keyboard', 165000.00, 'Spesifikasi HP 150 Wired Keyboard<br> Tinggi : 2.68 cm<br> Panjang : 42.59 cm<br> Lebar : 14.61<br> Berat : 0.44 kg<br><br> Spesifikasi HP 150 Wired Mouse<br> Tinggi : 3.42 cm<br> Panjang : 10.34 cm<br> Lebar : 6.11 cm<br> Berat : 0.06 kg', '67494d5bcccc9-2024-11-29-HP 150 Wired Mouse and Keyboard (PICT 21).png', 'kevinarlo', '2024-11-29 05:13:00', 'kevinarlo', '2024-11-29 05:20:34'),
(66, 6, 1, 'HyperX Alloy Core RGB - Gaming Keyboard', 750000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67494da923037-2024-11-29-HyperX Alloy Core RGB - Gaming Keyboard (PICT 22).png', 'kevinarlo', '2024-11-29 05:14:17', NULL, NULL),
(67, 6, 1, 'HyperX Alloy Origins 60 - Gaming Keyboard (Aqua Switch)', 1750000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67494e1c3e7d6-2024-11-29-HyperX Alloy Origins 60 - Gaming Keyboard (Aqua Switch) (PICT 23).png', 'kevinarlo', '2024-11-29 05:16:12', NULL, NULL),
(68, 6, 1, 'HP 225 Wired Mouse and Keyboard Combo', 450000.00, 'Spesifikasi HP 225 Wired Keyboard<br>\r\nTinggi : 2.05 cm<br>\r\nPanjang : 43.6 cm<br>\r\nLebar : 13.8<br>\r\nBerat : 0.47 kg<br><br>\r\nSpesifikasi HP 225 Wired Mouse<br>\r\nTinggi : 3.6 cm<br>\r\nPanjang : 11.2 cm<br>\r\nLebar : 6.3 cm<br>\r\nBerat : 0.08 kg', '67494eabcaacd-2024-11-29-HP 225 Wired Mouse and Keyboard Combo (PICT 24).png', 'kevinarlo', '2024-11-29 05:18:36', NULL, NULL),
(69, 6, 1, 'HyperX Pudding - Keycaps PBT Gaming Keyboard (Pink Top)', 450000.00, 'Spesifikasi Wired Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67494f052e9a0-2024-11-29-HyperX Pudding - Keycaps PBT Gaming Keyboard (Pink Top) (PICT 25).png', 'kevinarlo', '2024-11-29 05:20:05', NULL, NULL),
(70, 6, 1, 'HyperX Pudding - Keycaps PBT Gaming Keyboard (White Top)', 450000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67494f924fad8-2024-11-29-HyperX Pudding - Keycaps PBT Gaming Keyboard (White Top) (PICT 26).png', 'kevinarlo', '2024-11-29 05:22:26', NULL, NULL),
(71, 6, 1, 'HyperX Alloy MKW 100 - Gaming Keyboard', 1450000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67494feebff51-2024-11-29-HyperX Alloy MKW 100 - Gaming Keyboard (PICT 27).png', 'kevinarlo', '2024-11-29 05:23:59', NULL, NULL),
(72, 6, 1, 'HyperX Alloy Origins 65 - Gaming Keyboard (Aqua Switch)', 1550000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '6749503f64fc8-2024-11-29-HyperX Alloy Origins 65 - Gaming Keyboard (Aqua Switch) (PICT 28).png', 'kevinarlo', '2024-11-29 05:25:19', NULL, NULL),
(73, 6, 1, 'HyperX Alloy Origins Core - PBT keycaps Gaming Keyboard (Blue)', 1650000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '674950bec0ed1-2024-11-29-HyperX Alloy Origins Core - PBT keycaps Gaming Keyboard (Blue) (PICT 29).png', 'kevinarlo', '2024-11-29 05:27:27', NULL, NULL),
(74, 6, 1, 'HyperX Alloy Elite II - Gaming Keyboard', 1950000.00, 'Spesifikasi Keyboard<br>\r\nTinggi : 2.68 cm<br>\r\nPanjang : 42.59 cm<br>\r\nLebar : 14.61<br>\r\nBerat : 0.44 kg', '67495114d364d-2024-11-29-HyperX Alloy Elite II - Gaming Keyboard (PICT 30).png', 'kevinarlo', '2024-11-29 05:28:53', NULL, NULL),
(75, 6, 1, 'HP 930 Creator Wireless Mouse', 1300000.00, 'Spesifikasi HP 930 Mouse<br>\r\nTinggi : 4.67 cm<br>\r\nPanjang : 12.07 cm<br>\r\nLebar : 7.9 cm<br>\r\nBerat : 0.08 kg', '674951bd0159c-2024-11-29-HP 930 Creator Wireless Mouse (PICT 31).png', 'kevinarlo', '2024-11-29 05:31:41', NULL, NULL),
(76, 6, 1, 'HyperX Pulsefire Core - Gaming Mouse (Pink/White)', 450000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 4.67 cm<br>\r\nPanjang : 12.07 cm<br>\r\nLebar : 7.9 cm<br>\r\nBerat : 0.08 kg', '67495228c6587-2024-11-29-HyperX Pulsefire Core Gaming Mouse (PinkWhite) (PICT 32).png', 'kevinarlo', '2024-11-29 05:33:29', NULL, NULL),
(77, 6, 1, 'HyperX Pulsefire Haste - Gaming Mouse (White/Pink)', 650000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 4.67 cm<br>\r\nPanjang : 12.07 cm<br>\r\nLebar : 7.9 cm<br>\r\nBerat : 0.08 kg', '674952a639ab6-2024-11-29-HyperX Pulsefire Haste Gaming Mouse (WhitePink) (PICT 33).png', 'kevinarlo', '2024-11-29 05:35:34', NULL, NULL),
(78, 6, 1, 'HyperX Pulsefire Haste - Gaming Mouse (Black/Red)', 650000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 4.67 cm<br>\r\nPanjang : 12.07 cm<br>\r\nLebar : 7.9 cm<br>\r\nBerat : 0.08 kg', '6749532d4f3b4-2024-11-29-HyperX Pulsefire Haste Gaming Mouse (BlackRed) (PICT 34).png', 'kevinarlo', '2024-11-29 05:37:49', NULL, NULL),
(79, 6, 1, 'HP 150 Wireless Mouse', 150000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 3.4 cm<br>\r\nPanjang : 10.3 cm<br>\r\nLebar : 6.11 cm<br>\r\nBerat : 0.08 kg', '674953700e649-2024-11-29-HP 150 Wireless Mouse (PICT 35).png', 'kevinarlo', '2024-11-29 05:38:56', NULL, NULL),
(80, 6, 1, 'HP Z3700 Dual Silver Mouse', 215000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 3.4 cm<br>\r\nPanjang : 10.3 cm<br>\r\nLebar : 6.11 cm<br>\r\nBerat : 0.08 kg', '674953c33f245-2024-11-29-HP Z3700 Dual Silver Mouse (PICT 36).png', 'kevinarlo', '2024-11-29 05:40:19', NULL, NULL),
(81, 6, 1, 'HP 280 Silent Wireless Mouse', 235000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 4.01 cm<br>\r\nPanjang : 10.95 cm<br>\r\nLebar : 7.08 cm<br>\r\nBerat : 0.08 kg', '6749545bb0e51-2024-11-29-HP 280 Silent Wireless Mouse (PICT 37).png', 'kevinarlo', '2024-11-29 05:42:52', NULL, NULL),
(82, 6, 1, 'HyperX Pulsefire Haste - Wireless Gaming Mouse (Black)', 1500000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 4.01 cm<br>\r\nPanjang : 10.95 cm<br>\r\nLebar : 7.08 cm<br>\r\nBerat : 0.08 kg', '6749563c4ac94-2024-11-29-HyperX Pulsefire Haste - Wireless Gaming Mouse (Black) (PICT 38).png', 'kevinarlo', '2024-11-29 05:50:53', NULL, NULL),
(83, 6, 1, 'HP 240 Empire Red Bluetooth Mouse', 235000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 6.05 cm<br>\r\nPanjang : 10.70 cm<br>\r\nLebar : 9.3 cm<br>\r\nBerat : 0.05 kg', '674956f541597-2024-11-29-HP 240 Empire Red Bluetooth Mouse (PICT 39).png', 'kevinarlo', '2024-11-29 05:53:57', NULL, NULL),
(84, 6, 1, 'HP 240 Pike Silver Bluetooth Mouse', 235000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 6.05 cm<br>\r\nPanjang : 10.70 cm<br>\r\nLebar : 9.31 cm<br>\r\nBerat : 0.05 kg', '6749577812229-2024-11-29-HP 240 Pike Silver Bluetooth Mouse (PICT 40).png', 'kevinarlo', '2024-11-29 05:56:08', NULL, NULL),
(85, 6, 1, 'HP 240 Black Bluetooth Mouse', 235000.00, 'Spesifikasi Mouse<br>\r\nTinggi : 6.05 cm<br>\r\nPanjang : 10.70 cm<br>\r\nLebar : 9.31 cm<br>\r\nBerat : 0.05 kg', '674957d103199-2024-11-29-HP 240 Black Bluetooth Mouse (PICT 41).png', 'kevinarlo', '2024-11-29 05:57:37', NULL, NULL),
(86, 6, 1, 'HyperX Pulsefire Core - Gaming Mouse (Black)', 495000.00, '', '6749585c28ee8-2024-11-29-HyperX Pulsefire Core - Gaming Mouse (Black) (PICT 42).png', 'kevinarlo', '2024-11-29 05:59:56', NULL, NULL),
(87, 6, 1, 'HP 430 Multi-Device Wireless Mouse', 415000.00, '', '674958cccc5a2-2024-11-29-HP 430 Multi-Device Wireless Mouse (PICT 43).png', 'kevinarlo', '2024-11-29 06:01:49', NULL, NULL),
(88, 6, 1, 'HyperX Pulsefire Haste 2 - Gaming Mouse (White)', 845000.00, '', '67495921d1729-2024-11-29-HyperX Pulsefire Haste 2 Gaming Mouse (White) (PICT 44).png', 'kevinarlo', '2024-11-29 06:03:14', NULL, NULL),
(89, 6, 1, 'HyperX Pulsefire Haste 2 - Gaming Mouse (Black)', 845000.00, '', '67495975bbb0e-2024-11-29-HyperX Pulsefire Haste 2 Gaming Mouse (Black) (PICT 45).png', 'kevinarlo', '2024-11-29 06:04:38', NULL, NULL),
(90, 2, 1, 'PC DESKTOP AMD RYZEN 3 FOR OFFICE MID', 3450000.00, 'AMD Ryzen 3 3200G 3.6Ghz Up To 4.0Ghz Cache 4MB 65W AM4<br>\r\nKLEVV SSD CRAS C715 256GB M.2 2280 NVMe (R3000MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 16GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495e527b0e2-2024-11-29-PC R3 (PICT 2).png', 'kevinarlo', '2024-11-29 06:12:44', 'kevinarlo', '2024-11-29 06:25:22'),
(91, 2, 1, 'PC DESKTOP AMD RYZEN 3 FOR OFFICE HIGH', 3850000.00, 'AMD Ryzen 3 3200G 3.6Ghz Up To 4.0Ghz Cache 4MB 65W AM4<br>\r\nKLEVV SSD CRAS C715 256GB M.2 2280 NVMe (R3000MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495c92c94a0-2024-11-29-PC R3 (PICT 3).png', 'kevinarlo', '2024-11-29 06:17:55', NULL, NULL),
(92, 2, 1, 'PC DESKTOP AMD RYZEN 3 FOR OFFICE PRO', 4150000.00, 'AMD Ryzen 3 3200G 3.6Ghz Up To 4.0Ghz Cache 4MB 65W AM4<br>\r\nKLEVV SSD CRAS C715 512GB M.2 2280 NVMe (R3200MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495d4ee5d82-2024-11-29-PC R3 (PICT 4).png', 'kevinarlo', '2024-11-29 06:21:03', NULL, NULL),
(93, 2, 1, 'PC DESKTOP AMD RYZEN 3 FOR OFFICE PRO MAX', 4500000.00, 'AMD Ryzen 3 3200G 3.6Ghz Up To 4.0Ghz Cache 4MB 65W AM4<br>\r\nKLEVV SSD CRAS C925 500GB M.2 2280 NVMe (R7400MB/s W6200MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495eba80b72-2024-11-29-PC R3 (PICT 5).png', 'kevinarlo', '2024-11-29 06:27:06', NULL, NULL),
(94, 2, 1, 'PC DESKTOP I3 FOR OFFICE LOW', 4150000.00, 'Intel Core i3-12100 3.3GHz Up To 4.3GHz - Cache 12MB 60W<br>\r\nKLEVV SSD CRAS C710 256GB M.2 2280 NVMe PCle (R1950MB/s W1250MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Single Channel 8GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495f2a66c26-2024-11-29-PC I3 (PICT 6).png', 'kevinarlo', '2024-11-29 06:28:58', NULL, NULL),
(95, 2, 1, 'PC DESKTOP I3 FOR OFFICE MID', 4500000.00, 'Intel Core i3-12100 3.3GHz Up To 4.3GHz - Cache 12MB 60W<br>\r\nKLEVV SSD CRAS C715 256GB M.2 2280 NVMe (R3000MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 16GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495f92c19ab-2024-11-29-PC I3 (PICT 7).png', 'kevinarlo', '2024-11-29 06:30:43', NULL, NULL),
(96, 2, 1, 'PC DESKTOP I3 FOR OFFICE HIGH', 5100000.00, 'Intel Core i3-12100 3.3GHz Up To 4.3GHz - Cache 12MB 60W<br>\r\nKLEVV SSD CRAS C715 256GB M.2 2280 NVMe (R3000MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67495ff28f8a3-2024-11-29-PC I3 (PICT 8).png', 'kevinarlo', '2024-11-29 06:32:18', NULL, NULL),
(97, 2, 1, 'PC DESKTOP I3 FOR OFFICE PRO', 5500000.00, 'Intel Core i3-12100 3.3GHz Up To 4.3GHz - Cache 12MB 60W<br>\r\nKLEVV SSD CRAS C715 512GB M.2 2280 NVMe (R3200MB/s W2000MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674960571b3ef-2024-11-29-PC I3 (PICT 9).png', 'kevinarlo', '2024-11-29 06:33:59', NULL, NULL),
(98, 2, 1, 'PC DESKTOP I3 FOR OFFICE PRO MAX', 5850000.00, 'Intel Core i3-12100 3.3GHz Up To 4.3GHz - Cache 12MB 60W<br>\r\nKLEVV SSD CRAS C925 500GB M.2 2280 NVMe (R7400MB/s W6200MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674960aa75c77-2024-11-29-PC I3 (PICT 10).png', 'kevinarlo', '2024-11-29 06:35:22', NULL, NULL),
(99, 2, 1, 'PC DESKTOP AMD RYZEN 5 FOR OFFICE LOW', 3850000.00, 'AMD Ryzen 5 4600G 3.7Ghz Up To 4.2Ghz Cache 8MB 65W AM4<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Single Channel 8GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67496128ec141-2024-11-29-PC R5 (PICT 11).png', 'kevinarlo', '2024-11-29 06:37:29', NULL, NULL),
(100, 2, 1, 'PC DESKTOP AMD RYZEN 5 FOR OFFICE MID', 4250000.00, 'AMD Ryzen 5 4600G 3.7Ghz Up To 4.2Ghz Cache 8MB 65W AM4<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 16GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749616ee096c-2024-11-29-PC R5 (PICT 12).png', 'kevinarlo', '2024-11-29 06:38:39', NULL, NULL),
(101, 2, 1, 'PC DESKTOP AMD RYZEN 5 FOR OFFICE HIGH', 4750000.00, 'AMD Ryzen 5 4600G 3.7Ghz Up To 4.2Ghz Cache 8MB 65W AM4<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674961dae1b3e-2024-11-29-PC R5 (PICT 13).png', 'kevinarlo', '2024-11-29 06:40:27', NULL, NULL),
(102, 2, 1, 'PC DESKTOP AMD RYZEN 5 FOR OFFICE PRO', 4850000.00, 'AMD Ryzen 5 4600G 3.7Ghz Up To 4.2Ghz Cache 8MB 65W AM4<br>\r\nCUBE GAMING Phoenix SSD 512GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67496230a4d73-2024-11-29-PC R5 (PICT 14).png', 'kevinarlo', '2024-11-29 06:41:53', NULL, NULL),
(103, 2, 1, 'PC DESKTOP AMD RYZEN 5 FOR OFFICE PRO MAX', 5650000.00, 'AMD Ryzen 5 4600G 3.7Ghz Up To 4.2Ghz Cache 8MB 65W AM4<br>\r\nSAMSUNG 970 EVO M.2 500 GB (R3500MB/s W3200MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674962843dc5d-2024-11-29-PC R5 (PICT 15).png', 'kevinarlo', '2024-11-29 06:43:16', NULL, NULL),
(104, 2, 1, 'PC DESKTOP I5 FOR OFFICE LOW', 4750000.00, 'Intel Core i5-12400 2.5GHz Up To 4.4GHz Cache 18MB 65W<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Single Channel 8GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674962e1cda66-2024-11-29-PC I5 (PICT 16).png', 'kevinarlo', '2024-11-29 06:44:50', NULL, NULL),
(105, 2, 1, 'PC DESKTOP I5 FOR OFFICE MID', 4950000.00, 'Intel Core i5-12400 2.5GHz Up To 4.4GHz Cache 18MB 65W<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 16GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749633f2f4be-2024-11-29-PC I5 (PICT 17).png', 'kevinarlo', '2024-11-29 06:46:23', NULL, NULL),
(106, 2, 1, 'PC DESKTOP I5 FOR OFFICE HIGH', 5450000.00, 'Intel Core i5-12400 2.5GHz Up To 4.4GHz Cache 18MB 65W<br>\r\nCUBE GAMING Phoenix SSD 256GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67496390259c7-2024-11-29-PC I5 (PICT 18).png', 'kevinarlo', '2024-11-29 06:47:44', NULL, NULL),
(107, 2, 1, 'PC DESKTOP I5 FOR OFFICE PRO', 5750000.00, 'Intel Core i5-12400 2.5GHz Up To 4.4GHz Cache 18MB 65W<br>\r\nCUBE GAMING Phoenix SSD 512GB M.2 NVME PCIe (R2100MB/s W1700MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCASING	: CUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674963e53f48a-2024-11-29-PC I5 (PICT 19).png', 'kevinarlo', '2024-11-29 06:49:09', NULL, NULL),
(108, 2, 1, 'PC DESKTOP I5 FOR OFFICE PRO MAX', 6450000.00, 'Intel Core i5-12400 2.5GHz Up To 4.4GHz Cache 18MB 65W<br>\r\nSAMSUNG 970 EVO M.2 500 GB (R3500MB/s W3200MB/s)<br>\r\nCUBE GAMING Saber DDR4 3200MHz PC25600 Dual Channel 32GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749642e70e63-2024-11-29-PC I5 (PICT 20).png', 'kevinarlo', '2024-11-29 06:50:22', NULL, NULL),
(109, 2, 1, 'PC DESKTOP AMD RYZEN 7 FOR OFFICE LOW', 7300000.00, 'AMD Ryzen 7 8700F 4.1 Ghz Up To 5.0 Ghz Cache 16 MB 65W AM5<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 8 GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749649970465-2024-11-29-PC R7 (PICT 21).png', 'kevinarlo', '2024-11-29 06:52:09', NULL, NULL),
(110, 2, 1, 'PC DESKTOP AMD RYZEN 7 FOR OFFICE MID', 7700000.00, 'AMD Ryzen 7 8700F 4.1 Ghz Up To 5.0 Ghz Cache 16 MB 65W AM5<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 16 GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674964e29001f-2024-11-29-PC R7 (PICT 22).png', 'kevinarlo', '2024-11-29 06:53:22', NULL, NULL),
(111, 2, 1, 'PC DESKTOP AMD RYZEN 7 FOR OFFICE HIGH', 8350000.00, 'AMD Ryzen 7 8700F 4.1 Ghz Up To 5.0 Ghz Cache 16 MB 65W AM5<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749653bd7df0-2024-11-29-PC R7 (PICT 23).png', 'kevinarlo', '2024-11-29 06:54:52', NULL, NULL),
(112, 2, 1, 'PC DESKTOP AMD RYZEN 7 FOR OFFICE PRO', 8600000.00, 'AMD Ryzen 7 8700F 4.1 Ghz Up To 5.0 Ghz Cache 16 MB 65W AM5<br>\r\nSAMSUNG 970 EVO M.2 500 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749658423705-2024-11-29-PC R7 (PICT 24).png', 'kevinarlo', '2024-11-29 06:56:04', NULL, NULL),
(113, 2, 1, 'PC DESKTOP AMD RYZEN 7 FOR OFFICE PRO MAX', 9250000.00, 'AMD Ryzen 7 8700F 4.1 Ghz Up To 5.0 Ghz Cache 16 MB 65W AM5<br>\r\nSAMSUNG 970 EVO M.2 1 TB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674965d400fa1-2024-11-29-PC R7 (PICT 25).png', 'kevinarlo', '2024-11-29 06:57:24', NULL, NULL),
(114, 2, 1, 'PC DESKTOP I7 FOR OFFICE LOW', 8000000.00, 'Intel Core i7-12700KF 3.6 GHz Up To 5.0 GHz Cache 25 MB 125W<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR4 PC25600 5600MHz 8 GB (1x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674966356d71a-2024-11-29-PC I7 (PICT 26).png', 'kevinarlo', '2024-11-29 06:59:02', NULL, NULL),
(115, 2, 1, 'PC DESKTOP I7 FOR OFFICE MID', 8250000.00, 'Intel Core i7-12700KF 3.6 GHz Up To 5.0 GHz Cache 25 MB 125W<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 16 GB (2x8GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749667ebe051-2024-11-29-PC I7 (PICT 27).png', 'kevinarlo', '2024-11-29 07:00:15', NULL, NULL),
(116, 2, 1, 'PC DESKTOP I7 FOR OFFICE HIGH', 8750000.00, 'Intel Core i7-12700KF 3.6 GHz Up To 5.0 GHz Cache 25 MB 125W<br>\r\nSAMSUNG 970 EVO M.2 250 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '674966c684a26-2024-11-29-PC I7 (PICT 28).png', 'kevinarlo', '2024-11-29 07:01:26', NULL, NULL),
(117, 2, 1, 'PC DESKTOP I7 FOR OFFICE PRO', 9000000.00, 'Intel Core i7-12700KF 3.6 GHz Up To 5.0 GHz Cache 25 MB 125W<br>\r\nSAMSUNG 970 EVO M.2 500 GB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '6749670558674-2024-11-29-PC I7 (PICT 29).png', 'kevinarlo', '2024-11-29 07:02:29', NULL, NULL),
(118, 2, 1, 'PC DESKTOP I7 FOR OFFICE PRO MAX', 9650000.00, 'Intel Core i7-12700KF 3.6 GHz Up To 5.0 GHz Cache 25 MB 125W<br>\r\nSAMSUNG 970 EVO M.2 1 TB (R3500MB/s W3200MB/s)<br>\r\nV-GEN PLATINUM DDR5 PC44800 5600MHz 32 GB (2x16GB)<br>\r\nCUBE GAMING PARK with PSU (Support m-ATX Size)<br>\r\nWindows 11 Home 64Bit (Unactivated) & Office Home Student 2021 (Unactivated)', '67496757b1749-2024-11-29-PC I7 (PICT 30).png', 'kevinarlo', '2024-11-29 07:03:52', NULL, NULL),
(119, 5, 1, 'Epson CO-FH01 Full HD 3LCD Projector', 7850000.00, 'The CO-FH01 is Epson versatile lifestyle projector for both work and play. Featuring a Full HD resolution and 3,000 lumens of brightness, this all-in-one projector allows you to project a big screen experience in the home and office, at an affordable price. Even in bright rooms, this powerful yet affordable Full HD projector delivers high quality images anywhere, anytime. This is all thanks to Epson 3LCD technology, which produces an equally high white and color light output of 3,000 lumens. Supersize and immerse yourself in your favorite movies and games with this Full HD projector, thats capable of creating an impressive 391-inch display.', '67496a8dcaf3f-2024-11-29-Epson CO-FH01 Full HD 3LCD Projector (PICT 1).png', 'kevinarlo', '2024-11-29 07:17:34', 'kevinarlo', '2024-12-02 05:03:52'),
(120, 5, 1, 'Epson CO-FH02 Smart Projector', 10500000.00, 'The CO-FH02 is Epson versatile lifestyle projector for both work and play. Featuring a Full HD resolution, 3,000 lumens of brightness, and Android TV™2 function, this all-in-one projector allows you to project a big screen experience in the home and office, at an affordable price. Even in bright rooms, this powerful yet affordable Full HD projector delivers exceptionally bright yet colorful images with clear details. This is all thanks to Epson 3LCD technology, which produces an equally high white and color light output of 3,000 lumens. Supersize and immerse yourself in your favorite movies and games with this Full HD projector, that capable of creating an impressive 391-inch display.<br><br> Full HD resolution<br> Large Screen Projection up to 391 inch<br> 3000 lumens of Color and White brightness<br> Comes with Android TV™2 Dongle and Chromecast built-in™<br> 5W Speaker (with enclosure)', '67496b1196edf-2024-11-29-Epson CO-FH02 Smart Projector (PICT 2).png', 'kevinarlo', '2024-11-29 07:19:45', 'kevinarlo', '2024-12-02 05:04:29'),
(121, 5, 1, 'Epson EpiqVision Mini EF-11', 20750000.00, 'Enjoy an epic viewing experience virtually anywhere with the Epson EpiqVision Mini EF-11 Laser Projection TV. With a built-in high-quality speaker system, this all-in-one projector is the perfect way to watch all your favorite content. Simply connect your entertainment devices using the HDMI port and you are ready to project your favorite content up to an epic 150 inch - no screen required.<br> The Epson EpiqVision Mini EF-11 Laser Projection TV takes the complexity out of watching your favorite content anywhere in your home.<br><br> Full HD 1080p resolution<br> Stunning Picture Quality up to 150 inch<br> Screen Mirroring from smart devices<br> Integrated Dual-Speaker Audio System<br> Lightweight of up to 1.2kg<br> 20,000 Hours Laser Light Source Technology', '67496de396522-2024-11-29-Epson EpiqVision Mini EF-11 (PICT 3).png', 'kevinarlo', '2024-11-29 07:31:47', 'kevinarlo', '2024-12-02 05:05:53'),
(122, 5, 1, 'Epson EpiqVision Mini EF-12', 20750000.00, 'Epson has partnered with Yamaha to create a unique audio experience unlike anything in its class. Developed exclusively for the Epson EpiqVision Mini EF-12 Laser Projection TV, Yamaha leading Acoustic Engineers designed a unique sound system to deliver a true audiophile performance.<br> Designed within a custom 3D Acoustic Enclosure, two high-end Yamaha drivers are powered by a discrete amplifier and tuned, using Yamaha latest Audio Engine™ DSP technology to produce an impressive, wide sound stage that rivals dedicated higher-end audio systems and sound bars.<br><br> Full HD 1080p resolution<br> Stunning Picture Quality up to 150 inch<br> Sound by Yamaha<br> Built-In Android TV™ 1<br> Elegant Compact Design<br> Epson Laser Light Source Technology', '67496f4d49b89-2024-11-29-Epson EpiqVision Mini EF-12 (PICT 4).png', 'kevinarlo', '2024-11-29 07:37:49', 'kevinarlo', '2024-12-02 05:05:35'),
(123, 5, 1, 'Epson EpiqVision Ultra EH-LS300B', 0.00, 'Epson has partnered with Yamaha to create a unique audio experience unlike anything in its class. Developed exclusively for the Epson EpiqVision LS300 Streaming Laser Projector, Yamaha leading Acoustic Engineers designed a unique 2.1 sound system to deliver a true audiophile performance. Designed within a custom 3D Acoustic Enclosure, two high-end Yamaha drivers and a dedicated woofer, are powered by a discrete amplifier and tuned using Yamaha latest Audio Engine™ DSP technology to produce an impressive, deep and wide sound stage that rivals dedicated high-end audio systems and sound bars.<br><br>\r\nStunning Picture Quality up to 120 inch<br>\r\nSound by Yamaha<br>\r\nBuilt-In Android TV<br>\r\nUltra-Short Throw Laser Array<br>\r\nElegant Compact Design\r\n', '6749706ebe2b8-2024-11-29-Epson EpiqVision Ultra EH-LS300B (PICT 5).png', 'kevinarlo', '2024-11-29 07:42:39', NULL, NULL),
(124, 5, 1, 'Epson Home Theatre EH-TW6250', 0.00, 'Enjoy an immersive, big screen gaming experience with the EH-TW6250 Smart Gaming Projector. Featuring proprietary 4K PRO-UHD1 technology, HDR102 and smooth 1080p with input lag time of under 20 ms-the EH-TW6250 delivers a truly epic gaming experience.<br>\r\nTrue 3-chip 3LCD technology offers outstanding brightness and color accuracy without disturbing the overall contrast, ensuring deep blacks and remarkably vivid colors. And with Android TV™3 included, the EH-TW6250 Smart Gaming Projector also makes it easy to stream your favorite YouTube™ channels-or watch the latest movies and TV shows on Netflix, Amazon Prime Video, Disney+, and more.<br>\r\nAllowing for multiple audio options, the EH-TW6250 features an integrated 10 W bass-reflex speaker, plus Bluetooth wireless audio device support for connecting sound bars or headphones. And, with a sleek, compact design and vertical lens shift, you can place the projector nearly anywhere-including tables and bookshelves-for flexible setup and easy viewing.<br><br>\r\nStunning 4K PRO-UHD picture<br>\r\nSmooth, clear images<br>\r\nPowered by Android TV<br>\r\nBest-in-Class Color Brightness<br>\r\n2,800 lumens of Color and white brightness', '6749713c3b670-2024-11-29-Epson Home Theatre EH-TW6250 (PICT 6).png', 'kevinarlo', '2024-11-29 07:46:04', NULL, NULL),
(125, 5, 1, 'Epson EH-TW7000 4K PRO-UHD', 0.00, 'Level up your home entertainment experience with EH-TW7000. With equal colour and white brightness of 3,000 lumens and 4K PRO-UHD4 technology, enjoying crisp and clear images is now made possible, right in the comfort of your home.', '6749719ca0dda-2024-11-29-Epson EH-TW7000 4K PRO-UHD (PICT 7).png', 'kevinarlo', '2024-11-29 07:47:41', NULL, NULL),
(126, 5, 1, 'Epson Home Theatre TW750 Full HD 1080P', 21850000.00, 'The Epson EH-TW750 is a highly affordable home theatre projector that delivers quality entertainment and immersive gaming experience right in your living room.<br><br> White and Colour Brightness at 3,400lm<br> Full HD resolution (1080P)<br> 16,000:1 Contrast Ratio<br> Split screen function', '674971f58028a-2024-11-29-Epson Home Theatre TW750 Full HD 1080P (PICT 8).png', 'kevinarlo', '2024-11-29 07:49:09', 'kevinarlo', '2024-12-02 05:08:00'),
(127, 5, 1, 'Epson Home Theatre EH-TW9400 4K PRO-UHD', 46500000.00, 'Make your home the centre stage for all the action with Epson EH-TW9400 home projector. Capture everyone attention and bring family and friends together to experience those memorable moments.<br><br> 4K PRO-UHD Resolution<br> White and Colour Brightness at 2,600 lumens<br> Flexible Installation with Optical Lens Shift<br> Impressive 3D Image Quality<br> Wide-range Connectivity<br> Enhanced HDR Function', '674972985337e-2024-11-29-Epson Home Theatre EH-TW9400 4K PRO-UHD (PICT 9).png', 'kevinarlo', '2024-11-29 07:51:52', 'kevinarlo', '2024-12-02 05:08:22');
INSERT INTO `tbl_product` (`ProductID`, `ProductCategoryID`, `StatusID`, `ProductName`, `ProductPrice`, `ProductDescription`, `ProductPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(128, 5, 1, 'Epson EB-2065 XGA', 20750000.00, 'Leave the lights on and take control whether in the meeting room or classroom. Epson EB-2065 projector is engineered to shine outstandingly even in well-lit environments to enrich your presentation experience. This projector allows a wide variety of input methods from a wide-range of devices. Your brilliant presentations are made even better and more convenient with the new gesture-control function that allows you to navigate between your slides without the use of a peripheral device.<br><br> XGA Resolution<br> White and Colour Light Output at 5,500 lumens<br> Gesture Presenter<br> Multi-PC Projection<br> 2 x HDMI<br> Split Screen', '674973031df65-2024-11-29-Epson EB-2065 XGA (PICT 10).png', 'kevinarlo', '2024-11-29 07:53:39', 'kevinarlo', '2024-12-02 05:08:45'),
(129, 5, 1, 'Epson EB-2155W WXGA', 23500000.00, 'Leave the lights on and take control whether in the meeting room or classroom. Epson EB-2155W projector is engineered to shine outstandingly even in well-lit environments to enrich your presentation experience. This projector allows a wide variety of input methods so you can project Full HD content from a wide-range of devices. Your brilliant Full HD presentations are made even better and more convenient with the new gesture-control function that allows you to navigate between your slides without the use of a peripheral device.<br><br> WXGA Resolution<br> White and Colour Light Output at 5,000 lumens<br> Gesture Presenter<br> Multi-PC Projection<br> 2 x HDMI<br> Split Screen', '6749737c03e9b-2024-11-29-Epson EB-2155W WXGA (PICT 11).png', 'kevinarlo', '2024-11-29 07:55:40', 'kevinarlo', '2024-12-02 05:09:07'),
(130, 5, 1, 'Epson EB-2265U WUXGA', 32750000.00, 'Leave the lights on and take control whether in the meeting room or classroom. Epson EB-2265U projector is engineered to shine outstandingly even in well-lit environments to enrich your presentation experience. This projector allows a wide variety of input methods so you can project Full HD content from a wide-range of devices. Your brilliant Full HD presentations are made even better and more convenient with the new gesture-control function that allows you to navigate between your slides without the use of a peripheral device.<br><br> Beyond Full HD Resolution<br> White and Colour Light Output at 5,500 lumens<br> Gesture Presenter<br> Wireless Projection without Software<br> Multi-PC Projection<br> 2 x HDMI<br> Split Screen', '674973d971494-2024-11-29-Epson EB-2265U WUXGA (PICT 12).png', 'kevinarlo', '2024-11-29 07:57:13', 'kevinarlo', '2024-12-02 05:09:31'),
(131, 5, 1, 'Epson EB-972 XGA', 10150000.00, 'The EB-972 classroom projector features advanced connectivity and premium 16 W audio. Offering remarkable color accuracy, Epson projectors deliver high Color Brightness. Reliable and easy to use, the EB-972 features 4100 lumens of color/white brightness, plus XGA resolution. Its long-lasting lamp, which delivers up to 17,000 hours in ECO Mode, lowers maintenance costs. Optional wireless and built-in RJ-45 connectivity offer advanced network control and support the simultaneous display of multiple screen. It also features easy setup and 2x HDMI.<br><br> Projection System 3LCD, 3-chip technology<br> Native Resolution 1024 x 768 (XGA)<br> Color Brightness 4100 lumens<br> White Brightness 4100 lumens', '6749744c7a70b-2024-11-29-Epson EB-972 XGA (PICT 13).png', 'kevinarlo', '2024-11-29 07:59:08', 'kevinarlo', '2024-12-02 05:09:57'),
(132, 5, 1, 'Epson EB-982W WXGA', 17700000.00, 'Bring powerful projection to your classroom with the advanced EB-982W projector. The perfect addition to any learning environment, this ultra bright, 4,200-lumen projector enhances lesson plans and promotes collaboration with vibrant, widescreen displays. Featuring an integrated Moderator function with iProjection, the EB-982W allows up to 50 users to connect and share content from laptops or mobile devices. Designed with durability in mind, this premium projector provides a long lamp life up to 17,000 hours in ECO Mode. Plus, with a 1.6 optical zoom, a 16 W speaker, a microphone input, and dual HDMI ports, creating dynamic, high-definition displays has never been easier.<br><br> 4,200 lumens of color and white brightness<br> Native WXGA resolution and 16:10 aspect ratio<br> Long lamp life up to 17,000 hours in ECO Mode<br> 1.6x optical zoom for easy placement and installation<br> Built-in Moderator function using iProjection for easy wireless presentation', '6749749b0315d-2024-11-29-Epson EB-982W WXGA (PICT 14).png', 'kevinarlo', '2024-11-29 08:00:27', 'kevinarlo', '2024-12-02 05:10:18'),
(133, 5, 1, 'Epson EB-E500 XGA', 5650000.00, 'Engage the young minds with expressive and vivid projections in class with this 3300 lumens XGA projector', '674974e56d87d-2024-11-29-Epson EB-E500 XGA (PICT 15).png', 'kevinarlo', '2024-11-29 08:01:41', 'kevinarlo', '2024-12-02 05:10:39'),
(134, 5, 1, 'Epson EB-FH52 Full HD', 13550000.00, 'The Full HD EB-FH52 projector features 1.2x optical zoom for flexible installation in virtually any room. Offering remarkable color accuracy, Epson projectors deliver high Color Brightness. The EB-FH52 features 4,000 lumens of color/white brightness, plus Full HD resolution. Its long-lasting lamp, which delivers up to 12,000 hours in ECO Mode, lowers maintenance costs. Optional wireless connectivity offers simultaneous display of multiple screens.<br><br> Projection System 3LCD, 3-chip technology<br> Native Resolution 1920 x 1080(Full HD)<br> Color Brightness 4,000 lumens<br> White Brightness 4,000 lumens', '674975500d95e-2024-11-29-Epson EB-FH52 Full HD (PICT 16).png', 'kevinarlo', '2024-11-29 08:03:28', 'kevinarlo', '2024-12-02 05:11:12'),
(135, 5, 1, 'Epson EB-L200F Full HD', 0.00, 'Project vivid, colorful, impactful images up to 500 inch with EB-L200F Standard-Throw laser projector. This 4,500-lumen, Full HD projector delivers bright, easy-to-read images from nearly anywhere in the room, and it offers built-in split screen to create an even more immersive and engaging experience. Designed with flexibility and convenience in mind, the EB-L200F provides built-in wireless and Miracast® support and a long-lasting virtually maintenance-free 20,000-hour laser light source with no lamps to replace.<br><br>\r\n4,500 lumens of color and white brightness<br>\r\n20,000-hour laser light source with no lamps<br>\r\nFull HD resolution<br>\r\nBuilt-in Miracast<br>\r\nBuilt-in wireless LAN<br>\r\n1.6x optical zoom', '674975c8592be-2024-11-29-Epson EB-L200F Full HD (PICT 17).png', 'kevinarlo', '2024-11-29 08:05:28', NULL, NULL),
(136, 5, 1, 'Epson EB-L200W 3LCD WXGA', 0.00, 'Promote collaboration in classrooms and offices with the versatile EB-L200W standard-throw laser projector. Featuring a virtually maintenance-free 20,000-hour laser light source with no lamps to replace, the EB-L200W offers convenient, reliable performance at an exceptional value. Providing 4,200 lumens of brightness and astounding WXGA (16:10) resolution, the flexible EB-L200W delivers colorful, easy-to-read, widescreen images from nearly anywhere in the classroom. Plus, it arrives with a variety of features to maximize engagement, including a powerful 16W speaker and built-in wireless and Miracast® support for convenient content sharing from laptops and smart devices.<br><br>\r\n4,200 lumens of color and white brightness<br>\r\n20,000-hour laser light source with no lamps<br>\r\nNative WXGA (16:10) resolution<br>\r\nBuilt-in Miracast<br>\r\nBuilt-in wireless LAN<br>\r\n1.6x optical zoom', '6749765306ea0-2024-11-29-Epson EB-L200W 3LCD WXGA (PICT 18).png', 'kevinarlo', '2024-11-29 08:07:47', NULL, NULL),
(137, 5, 1, 'Epson EB-L200X 3LCD XGA', 21650000.00, 'Project bright, easy-to-read images from nearly anywhere in classrooms and offices with the versatile EB-L200X long-throw laser projector. A convenient, affordable projector for modern classrooms, the EB-L200X offers 4,200 lumens of brightness and is virtually maintenance-free with no lamps to replace for light source up to 20,000 hours. Designed with collaboration in mind, this flexible projector delivers colorful images with native XGA (4:3) resolution, and provides a variety of engaging features, including a powerful 16 W speaker and built-in wireless and Miracast® support for convenient content sharing from laptops and smart devices.<br><br> 4,200 lumens of color and white brightness<br> 20,000-hour laser light source with no lamps<br> Native XGA (4:3) resolution<br> Built-in Miracast<br> Wirelessly share from devices<br> 1.6x optical zoom', '674976c95f214-2024-11-29-Epson EB-L200X 3LCD XGA (PICT 19).png', 'kevinarlo', '2024-11-29 08:09:45', 'kevinarlo', '2024-12-02 05:11:50'),
(138, 5, 1, 'Epson EB-L610U Wireless WUXGA', 0.00, 'The compact, affordable EB-L610U laser projector delivers powerful performance for education and business applications. Get bright, vivid images with 6,000 lumens colour/white brightness. This wireless projector also offers WUXGA resolution and Full HD support. Featuring breakthrough laser technology, it delivers a laser light source of up to 20,000 hours. And, it offers virtually maintenance-free operation for the life of the optical engine. Plus, it features a Dynamic contrast ratio of up to 2,500,000:1. It also includes manual lens shift, wireless networking with enterprise-level security, and advanced installation features.<br><br>\r\n6,000 lumens colour/white brightness<br> \r\nWUXGA up to 2,500,000:1 Dynamic contrast ratio<br>\r\nLaser light source of up to 20,000 hours<br>\r\nScreen mirroring function<br>\r\nUp to ±50% vertical, ±20% horizontal lens shift', '674977700e48f-2024-11-29-Epson EB-L610U Wireless WUXGA (PICT 20).png', 'kevinarlo', '2024-11-29 08:12:32', NULL, NULL),
(139, 5, 1, 'Epson EB-U50 WUXGA', 14750000.00, 'Redefine retail digital solutions with vivid images and enhance the customer experience with Epson EB-U50 projector. With advanced network security and the ability to content share on multiple devices simultaneously, these highly affordable projectors are the best projector for retail, corporate, and educational usage.', '674977b8435a2-2024-11-29-Epson EB-U50 WUXGA (PICT 21).png', 'kevinarlo', '2024-11-29 08:13:44', 'kevinarlo', '2024-12-02 05:12:19'),
(140, 5, 1, 'Epson EB-W06 WXGA', 0.00, 'increase collaboration in the classroom with the EB-W06 projector. Designed to maximize engagement and enrich lesson plans, this powerful WXGA projector delivers eye-catching, widescreen displays with 3,700 lumens of color and white brightness. A convenient, durable addition to any learning environment, it also offers a long lamp life up to 12,000 hours in ECO Mode and includes HDMI ports for easy connectivity to a variety of high-definition AV devices.', '6749780911bf5-2024-11-29-Epson EB-W06 WXGA (PICT 22).png', 'kevinarlo', '2024-11-29 08:15:05', NULL, NULL),
(141, 5, 1, 'Epson EB-W50 WXGA', 12450000.00, 'Redefine retail digital solutions with vivid images and enhance the customer experience with Epson EB-W50 projector. With advanced network security and the ability to content share on multiple devices simultaneously, these highly affordable projectors are the best projector for retail, corporate, and educational usage.', '674978558b79d-2024-11-29-Epson EB-W50 WXGA (PICT 23).png', 'kevinarlo', '2024-11-29 08:16:21', 'kevinarlo', '2024-12-02 05:12:41'),
(142, 5, 1, 'Epson EB-W51 WXGA', 9250000.00, 'Present dynamic lessons with the affordable EB-W51 classroom projector. Offering remarkable color accuracy, Epson projectors deliver high Color Brightness. Reliable and impressive, the EB-W51 features 4,000 lumens of color/white brightness, plus widescreen WXGA resolution. Its long-lasting lamp, which delivers up to 12,000 hours in ECO Mode, lowers maintenance costs. Optional wireless connectivity offer advanced network control and support the simultaneous display of multiple screens.<br><br> Projection System 3LCD, 3-chip technology<br> Native Resolution 1280 x 800 (WXGA)<br> Color Brightness 4000 lumens<br> White Brightness 4000 lumens', '674978d5c4887-2024-11-29-Epson EB-W51 WXGA (PICT 24).png', 'kevinarlo', '2024-11-29 08:18:30', 'kevinarlo', '2024-12-02 05:13:09'),
(143, 5, 1, 'Epson EB-X06 XGA', 6550000.00, 'Get astounding classroom projection at an affordable price point with the EB-X06 projector. Featuring advanced 3LCD technology, this ultra bright, 3,600-lumen projector delivers vibrant, true-to-life images and native XGA resolution. Designed specifically for classroom environments, the EB-X06 eases engagement and enriches lesson plans with HDMI connectivity and a built-in 2 W speaker. Built to last, this durable projector provides a long lamp life of 12,000 hours in ECO Mode, plus convenient installation and positioning flexibility for easy projection from anywhere in the classroom.<br><br> 3LCD technology for true-to-life Color Brightness<br> Native XGA resolution and 4:3 performance<br> Long lamp life up to 12,000 hours in ECO Mode<br> Easy setup and positioning flexibility HDMI connectivity', '674979426f9e7-2024-11-29-Epson EB-X06 XGA (PICT 25).png', 'kevinarlo', '2024-11-29 08:20:18', 'kevinarlo', '2024-12-02 05:13:38'),
(144, 5, 1, 'Epson EB-X500 XGA', 6150000.00, 'Engage the young minds with expressive and vivid projections in class with this 3600 lumens XGA projector', '6749798599451-2024-11-29-Epson EB-X500 XGA (PICT 26).png', 'kevinarlo', '2024-11-29 08:21:25', 'kevinarlo', '2024-12-02 05:13:57'),
(145, 5, 1, 'Epson EB-X51 XGA', 7500000.00, 'Create engaging classroom displays with the dynamic EB-X51 projector. Offering advanced 3LCD technology, this ultra bright projector delivers eye-catching, 3,800-lumen displays with native XGA resolution. Designed to enhance in-class collaboration, the EB-X51 projects from smart devices and laptops, and features a built-in Moderator function that allows up to 50 users to connect to the display simultaneously 3(using iprojection). Built to last, this durable projector provides a long lamp life of up to 12,000 hours in ECO Mode, plus HDMI connectivity and convenient positioning flexibility for easy projection from anywhere in the classroom.', '674979d19ea08-2024-11-29-Epson EB-X51 XGA (PICT 27).png', 'kevinarlo', '2024-11-29 08:22:42', 'kevinarlo', '2024-12-02 05:14:16'),
(146, 4, 1, 'Epson EcoTank L121 A4 Ink Tank Printer', 1850000.00, 'Expect great efficiency when printing with the EcoTank L121. Enjoy fast print performance and low cost per page, with high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. Sleek and compact, this is the perfect fit for offices with limited space. Experience quality printing that is priced reasonably. Get this ideal printing solution for your home office today.<br><br> Print speed of up to 9.0 ipm (black) and 4.8 ipm (colour)<br> Ultra-high page yield of 4,500 pages (black) and 7,500 pages (colour)<br> 2-year warranty or 20,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '67497c56bc4a7-2024-11-29-EPSON L121 (PICT 1).png', 'kevinarlo', '2024-11-29 08:33:27', 'kevinarlo', '2024-12-02 05:34:17'),
(147, 4, 1, 'Epson EcoTank L1210 A4 Ink Tank Printer', 2350000.00, 'The EcoTank L1210 allow businesses to enjoy excellent print performance and produce photos with superb quality. Enjoy low printing cost, with high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. With reasonably priced ink bottles with designated nozzles, you can now enjoy spill-free refilling with Epson EcoTank.<br><br> Compact integrated tank design<br> High yield ink bottles<br> Ultra-high page yield of 4,500 pages (black) and 7,500 pages (colour)<br> Borderless Printing (up to 4R)<br> 2-year warranty or 30,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '67497c87d53db-2024-11-29-Epson EcoTank L1210 A4 Ink Tank Printer (PICT 2).png', 'kevinarlo', '2024-11-29 08:34:16', 'kevinarlo', '2024-12-02 05:34:36'),
(148, 4, 1, 'Epson EcoTank L1216 A4 Ink Tank Printer', 0.00, 'Now available in white, the EcoTank L1216 delivers excellent print performance, producing photos with superb quality. These reasonably priced printers offer a high print yield of up to 4,500 pages for black–and-white, and 7,500 pages for colour. With affordable ink bottles with designated nozzles, you can now enjoy spill-free refilling with Epson EcoTank.<br><br>\r\nUltra-high page yield of 4,500 pages (black) and 7,500 pages (colour)<br>\r\nBorderless printing up to 4R<br>\r\n2-year warranty or 30,000 pages, whichever comes first<br>\r\nPowered by Epson Heat-Free Technology', '67497cd36d95c-2024-11-29-Epson EcoTank L1216 A4 Ink Tank Printer (PICT 3).png', 'kevinarlo', '2024-11-29 08:35:31', NULL, NULL),
(149, 4, 1, 'Epson EcoTank L1250 A4 Wi-Fi Ink Tank Printer', 2450000.00, 'The EcoTank L1250 allow businesses to enjoy excellent print performance and produce photos with superb quality. Enjoy low printing cost, with high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. With reasonably priced ink bottles with designated nozzles, you can now enjoy spill-free refilling with Epson EcoTank. These compact printers also fit into any space and comes with wireless connectivity, enabling you to print from smart devices.<br> Download the Epson Smart Panel app to your mobile device and easily manage your printing functions and printer setup, making this especially useful for non-panel printers. This ideal and affordable print solution is what your business need. Get one today.<br><br> Ultra-high page yield of 4,500 pages (black) and 7,500 pages (colour)<br> 2-year warranty or 30,000 pages, whichever comes first<br> Wi-Fi & Wi-Fi Direct<br> Seamless setup via Epson Smart Panel<br> Borderless Printing (up to 4R)<br> Powered by Epson Heat-Free Technology', '67497d125cd3e-2024-11-29-Epson EcoTank L1250 A4 Wi-Fi Ink Tank Printer (PICT 4).png', 'kevinarlo', '2024-11-29 08:36:34', 'kevinarlo', '2024-12-02 05:35:16'),
(150, 4, 1, 'Epson EcoTank L1256 A4 Wi-Fi Ink Tank Printer', 0.00, 'Now available in white, the EcoTank L1256 delivers excellent print performance, producing photos with superb quality. These reasonably priced printers offer a high print yield of up to 4,500 pages for black–and-white, and 7,500 pages for colour. With reasonably priced ink bottles with designated nozzles, you can now enjoy spill-free refilling with Epson EcoTank. Get wireless connectivity with the EcoTank L1256, offering direct printing from smart devices. Download the Epson Smart Panel app to your mobile device and easily manage your printing functions and printer setup, making this especially useful for non-panel printers. This compact printer fits into any space, making it the ideal print solution for your business.<br><br>\r\nPrint speed of up to 10.0 ipm (black) and 5.0 ipm (colour)<br>\r\nUltra-high page yield of 4,500 pages (black) and 7,500 pages (colour)<br>\r\n2-year warranty or 30,000 pages, whichever comes first<br>\r\nWi-Fi & Wi-Fi Direct<br>\r\nSeamless setup via Epson Smart Panel<br>\r\nBorderless Printing (up to 4R)<br>\r\nPowered by Epson Heat-Free Technology', '67497d442f681-2024-11-29-Epson EcoTank L1256 A4 Wi-Fi Ink Tank Printer (PICT 5).png', 'kevinarlo', '2024-11-29 08:37:24', NULL, NULL),
(151, 4, 1, 'Epson EcoTank L3216 A4 All-in-One Ink Tank Printer', 2450000.00, 'The multifunctional printing solutions - EcoTank L3216 is now available in white. Designed to improve business cost savings and print productivity, expect a high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. You can even print borderless photos up to 4R size. The integrated ink tank enables spill-free, error-free refilling with individual bottles that have designated nozzles.<br><br> Print, scan, copy<br> Compact integrated tank design<br> High yield ink bottles<br> Spill-free, error-free refilling<br> Powered by Epson Heat-Free Technology', '67497ec6e2efe-2024-11-29-Epson EcoTank L3216 A4 All-in-One Ink Tank Printer (PICT 6).png', 'kevinarlo', '2024-11-29 08:43:51', 'kevinarlo', '2024-12-02 05:35:36'),
(152, 4, 1, 'Epson EcoTank L3250 A4 Wi-Fi All-in-One Ink Tank Printer', 2650000.00, 'The multi-functional EcoTank L3250 is designed to improve business cost savings and print productivity. Expect a high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. You can even print borderless photos up to 4R size. The integrated ink tanks and designated nozzles ensure spill-free and error-free refilling. The EcoTank L3250 delivers convenient wireless connectivity, enabling direct printing from smart devices. You can download the Epson Smart Panel app to your mobile device and easily manage your printing functions and printer setup, making this especially useful for non-panel printers. Make the smart business move with the right print solution today.<br><br> Print, scan, copy<br> Compact integrated tank design<br> High yield ink bottles<br> Spill-free, error-free refilling<br> Wi-Fi & Wi-Fi Direct<br> Seamless setup via Epson Smart Panel<br> Borderless printing up to 4R<br> Powered by Epson Heat-Free Technology', '67497efd1df1c-2024-11-29-Epson EcoTank L3250 A4 Wi-Fi All-in-One Ink Tank Printer (PICT 7).png', 'kevinarlo', '2024-11-29 08:44:45', 'kevinarlo', '2024-12-02 05:35:55'),
(153, 4, 1, 'Epson EcoTank L3256 A4 Wi-Fi All-in-One Ink Tank Printer', 0.00, 'Designed to enhance business cost savings and print productivity. Expect a high print yield of up to 4,500 pages for black-and-white, and 7,500 pages for colour. You can even print borderless photos up to 4R size. The integrated ink tanks and designated nozzles ensure spill-free and error-free refilling.<br>\r\nThe EcoTank L3256 delivers convenient wireless connectivity, enabling direct printing from smart devices. You can download the Epson Smart Panel app to your mobile device and easily manage your printing functions and printer setup, making this especially useful for non-panel printers. Make the smart business move with the right print solution today.<br><br>\r\nPrint, scan, copy<br>\r\nCompact integrated tank design<br>\r\nHigh yield ink bottles<br>\r\nSpill-free, error-free refilling<br>\r\nWi-Fi & Wi-Fi Direct<br>\r\nSeamless setup via Epson Smart Panel<br>\r\nBorderless printing up to 4R<br>\r\nPowered by Epson Heat-Free Technology', '67497f6604601-2024-11-29-Epson EcoTank L3256 A4 Wi-Fi All-in-One Ink Tank Printer (PICT 8).png', 'kevinarlo', '2024-11-29 08:46:32', NULL, NULL),
(154, 4, 1, 'Epson EcoTank L3550 Ink Tank Printer', 3550000.00, 'The Epson All-in-One EcoTank L3550 is designed to maximise your print productivity and convenience at home. The upgraded PrecisionCore Printhead enables even faster printing speeds and replaceable maintenance box reduces repair downtime, improving efficiency. The EcoTank L3550 delivers efficient and effortless premium home printing and convenient wireless connectivity, enabling direct printing from smart devices. Download Epson Smart Panel app to your mobile device and turn it into an intuitive control centre that enables you to power On/Off, set up, monitor your printer and ink level effortlessly.<br><br> Compact and Durable Ecological Design<br> Replaceable Maintenance Box<br> High yield ink bottles<br> Ultra-high page yield of 7,300 pages (colour)<br> Borderless Printing (up to 4R)<br> 2-year warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '67497facd5bf3-2024-11-29-Epson EcoTank L3550 Ink Tank Printer (PICT 9).png', 'kevinarlo', '2024-11-29 08:47:43', 'kevinarlo', '2024-12-02 05:36:26'),
(155, 4, 1, 'Epson EcoTank L4260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer', 3950000.00, 'The sleek black EcoTank L4260 is in a class of their own. These printers come with an integrated ink tank system, and compact enough to fit perfectly in any office. Enjoy spill-free refilling with individual ink bottles that have designated nozzles. Get sharp and smudge-free black-and-white documents that are printed using black pigment ink. Equipped with auto-duplex printing, you can print on both sides of paper easily, significantly reducing paper cost and wastage. Choose to print wirelessly over network or directly from connected mobile devices via Wi-Fi Direct. You can also download the Epson Smart Panel app to your mobile device, turning it into an intuitive control centre that enables you to set up, monitor and operate your printer effortlessly. Enhance your business performance with this smart print solution today.<br><br> Compact integrated tank design<br> Print speeds up to 10.5ipm for black and 5.0ipm for colour<br> Auto-duplex printing<br> Wi-Fi & Wi-Fi Direct<br> Borderless Printing up to A4 size<br> Spill-free ink refilling<br> Seamless setup via Epson Smart Panel<br> Warranty of 2 years or 30,000 pages, whichever comes first', '67497feccd3c9-2024-11-29-Epson EcoTank L4260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer (PICT 10).png', 'kevinarlo', '2024-11-29 08:48:45', 'kevinarlo', '2024-12-02 05:36:47'),
(156, 4, 1, 'Epson EcoTank L5290 A4 Wi-Fi All-in-One Ink Tank Printer with ADF', 4150000.00, 'The economical, multifunction Eco Tank L5290, lets you print, scan, copy and fax with ease. Ideal for businesses, this printer comes with a full suite of connectivity features including Wi-Fi Direct and Ethernet. Print wirelessly over network or directly from connected mobile devices. Download the Epson Smart Panel app to your mobile device to manage all your printing functions and printer setup with ease. Save more and waste less with Epson affordable ink bottles that offer spill- and error-free refilling via designated nozzles on the L5290 integrated ink tanks. Get the right connection for your business today.<br><br> Print, Scan, Copy, Fax with ADF<br> Compact integrated tank design<br> High yield ink bottles<br> Spill-free, error-free refilling<br> Wi-Fi, Wi-Fi Direct<br> Epson Connect<br> Seamless setup via Epson Smart Panel<br> Borderless printing up to 4R<br> Powered by Epson Heat-Free Technology', '674982710f7ff-2024-11-29-Epson EcoTank L5290 A4 Wi-Fi All-in-One Ink Tank Printer with ADF (PICT 11).png', 'kevinarlo', '2024-11-29 08:59:29', 'kevinarlo', '2024-12-02 05:37:07'),
(157, 4, 1, 'Epson EcoTank L5296 A4 Wi-Fi All-in-One Ink Tank Printer with ADF', 0.00, 'The Eco Tank L5296 is an economical, multifunction printer that lets you print, scan, copy and fax without hassle. This ideal printer is equipped with a full suite of connectivity features such as Wi-Fi Direct and Ethernet. Print wirelessly over network or directly from connected mobile devices. Download the Epson Smart Panel app to your mobile device to manage all your printing functions and printer setup with ease. Epson affordable ink bottles offer spill- and error-free refilling via designated nozzles on the L5296 integrated ink tanks, allowing more savings and less wastage. Take advantage of seamless connectivity for your business today.<br><br>\r\nPrint, Scan, Copy, Fax with ADF<br>\r\nCompact integrated tank design<br>\r\nHigh yield ink bottles<br>\r\nSpill-free, error-free refilling<br>\r\nWi-Fi, Wi-Fi Direct<br>\r\nEpson Connect<br>\r\nSeamless setup via Epson Smart Panel<br>\r\nBorderless printing up to 4R<br>\r\nPowered by Epson Heat-Free Technology', '674982ad71bde-2024-11-29-Epson EcoTank L5296 A4 Wi-Fi All-in-One Ink Tank Printer with ADF (PICT 12).png', 'kevinarlo', '2024-11-29 09:00:31', NULL, NULL),
(158, 4, 1, 'Epson EcoTank L5590 Ink Tank Printer', 4650000.00, 'The Epson All-in-One EcoTank L5590 is designed to maximise your print productivity and convenience at the office. The upgraded PrecisionCore Printhead enables even faster printing speeds and replaceable maintenance box reduces repair downtime, improving efficiency. Both printers come with a full suite of connectivity features, including wireless connectivity and enabling direct printing from smart devices. Download Epson Smart Panel app to your mobile device and turn it into an intuitive control centre that enables you to power On/Off, set up, monitor your printer and ink level effortlessly. Experience this high-speed all-in-one printing solution today.<br><br> Compact and Durable Ecological Design<br> Replaceable Maintenance Box<br> High yield ink bottles<br> Ultra-high page yield of 7,300 pages (colour)<br> Borderless Printing (up to 4R)<br> With fax function and ADF<br> 2-year warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '674982ed5cf7b-2024-11-29-Epson EcoTank L5590 Ink Tank Printer (PICT 13).png', 'kevinarlo', '2024-11-29 09:01:33', 'kevinarlo', '2024-12-02 05:37:29'),
(159, 4, 1, 'Epson EcoTank L6260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer', 4250000.00, 'The multifunction Epson EcoTank printers L6260 delivers fast printouts and borderless printing for up to A4 size. Equipped with integrated ink tank, these printers havesmall footprints to fit any office. The affordable ink bottles, fitted with designated nozzles, ensure spill-free refilling. Together with the auto-duplex print function, businesses will appreciate these low cost printing solutions that save more with every print. A suite of Epson Connect features enable effortless connectivity and printing over a network. You can also download the Epson Smart Panel app to your mobile device, making it an intuitive control centre to easily set up, monitor and operate the printer functions. Get these exceptional business solutions today.<br><br> Print, Scan, Copy<br> Compact integrated tank design<br> Print speeds up to 15ipm for black and 8.0ipm for colour<br> Auto-Duplex printing<br> Ethernet & Wi-Fi Direct<br> Seamless setup via Epson Smart Panel<br> Borderless Printing up to A4 size<br> Spill-free ink refilling<br> Powered by Epson Heat-Free Technology', '6749832357739-2024-11-29-Epson EcoTank L6260 A4 Wi-Fi Duplex All-in-One Ink Tank Printer (PICT 14).png', 'kevinarlo', '2024-11-29 09:02:28', 'kevinarlo', '2024-12-02 05:37:50'),
(160, 4, 1, 'Epson EcoTank L6270 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF', 5050000.00, 'The multifunction Epson Eco Tank printers L6270 delivers fast printouts and borderless printing for up to A4 size. Equipped with integrated ink tank, these printers havesmall footprints to fit any office. The affordable ink bottles, fitted with designated nozzles, ensure spill-free refilling. Together with the auto-duplex print function, businesses will appreciate these low cost printing solutions that save more with every print. A suite of Epson Connect features enable effortless connectivity and printing over a network. You can also download the Epson Smart Panel app to your mobile device, making it an intuitive control centre to easily set up, monitor and operate the printer functions. Get these exceptional business solutions today.<br><br> Print, Scan, Copy<br> Compact integrated tank design<br> Print speeds up to 15.5ipm for black and 8.5ipm for colour<br> Auto-Duplex printing<br> ADF capability<br> Ethernet & Wi-Fi Direct<br> Seamless setup with Epson Smart Panel<br> Borderless Printing up to A4 size<br> Spill-free ink refilling<br> Warranty of 2 years of 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '6749835f8f6fe-2024-11-29-Epson EcoTank L6270 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF (PICT 15).png', 'kevinarlo', '2024-11-29 09:03:28', 'kevinarlo', '2024-12-02 05:38:11'),
(161, 4, 1, 'Epson EcoTank L6290 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF', 5550000.00, 'The multifunction Epson EcoTank printers L6290 delivers fast printouts and borderless printing for up to A4 size. Equipped with integrated ink tank, these printers havesmall footprints to fit any office. The affordable ink bottles, fitted with designated nozzles, ensure spill-free refilling. Together with the auto-duplex print function, businesses will appreciate these low cost printing solutions that save more with every print. A suite of Epson Connect features enable effortless connectivity and printing over a network. You can also download the Epson Smart Panel app to your mobile device, making it an intuitive control centre to easily set up, monitor and operate the printer functions.<br> Get these exceptional business solutions today.<br><br> Print, Scan, Copy and Fax<br> Compact integrated tank design<br> Print speeds up to 15.5ipm for black and 8.5ipm for colour<br> Auto-Duplex printing<br> ADF capability<br> Ethernet & Wi-Fi Direct<br> Seamless setup with Epson Smart Panel<br> Borderless Printing up to A4 size<br> Spill-free ink refilling<br> Warranty of 2 years of 50,000 pages, whichever comes first', '674985d2b71c6-2024-11-29-Epson EcoTank L6290 A4 Wi-Fi Duplex All-in-One Ink Tank Printer with ADF (PICT 16).png', 'kevinarlo', '2024-11-29 09:13:55', 'kevinarlo', '2024-12-02 05:38:35'),
(162, 4, 1, 'Epson EcoTank L6460 A4 Ink Tank Printer', 5650000.00, 'Robust and reliable.This EcoTank L6460 is compact in size, the printers fit into any given space in your office. Enjoy hassle-free, auto-duplex printing that lowers printing cost; and face down output for better security. DURABrite ET Ink uses pigment-based ink to deliver durable, water-resistant and extra-sharp print. You can also download the Epson Smart Panel app and transform your mobile devices into an intuitive control centre to set up, monitor and operate the printers. Improve business efficiency with enhanced print performance from this stylish printing solution today.<br><br> Print, scan, copy with ADF<br> Print speeds up to 17ipm for black and 9.5ipm for colour<br> Auto-Duplex printing<br> Wi-Fi & Wi-Fi Direct<br> 2-years warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '67498608cf1e5-2024-11-29-Epson EcoTank L6460 A4 Ink Tank Printer (PICT 17).png', 'kevinarlo', '2024-11-29 09:14:49', 'kevinarlo', '2024-12-02 05:38:55'),
(163, 4, 1, 'Epson EcoTank L6490 A4 Ink Tank Printer', 5950000.00, 'Robust and reliable.This EcoTank L6490 is compact in size, the printers fit into any given space in your office. Enjoy hassle-free, auto-duplex printing that lowers printing cost and face down output for better security. DURABrite ET Ink uses pigment-based ink to deliver durable, water-resistant and extra-sharp print. You can also download the Epson Smart Panel app and transform your mobile devices into an intuitive control centre to set up, monitor and operate the printers. Improve business efficiency with enhanced print performance from this stylish printing solution today.<br><br> Print, Scan, Copy, Fax with ADF<br> Print speeds up to 17ipm for black and 9.5ipm for colour<br> Auto-Duplex printing<br> Wi-Fi & Wi-Fi Direct<br> 2-years warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '674986496b0a9-2024-11-29-Epson EcoTank L6490 A4 Ink Tank Printer (PICT 18).png', 'kevinarlo', '2024-11-29 09:15:53', 'kevinarlo', '2024-12-02 05:39:20'),
(164, 4, 1, 'Epson EcoTank Monochrome M1100 Ink Tank Printer', 2050000.00, 'Efficiency meets economy with the Eco Tank monochrome M1100 printer. Taking care of details to meet business needs, look forward to lower costs with bottles that provide an ultra-high page yield of 6,000 pages1 each. Simplify processes with integrated ink tanks that enable spill-free, error-free ink refilling, and enjoy laser-quality text that is smudge- and water-resistant with the pigment ink.<br><br> Compact integrated tank design<br> High-yield pigment ink bottle<br> Spill-free, error-free refilling<br> Print speed up to 32ppm (15ipm)<br> 4 years warranty', '674986776a8b1-2024-11-29-Epson EcoTank Monochrome M1100 Ink Tank Printer (PICT 19).png', 'kevinarlo', '2024-11-29 09:16:41', 'kevinarlo', '2024-12-02 05:39:43'),
(165, 4, 1, 'Epson EcoTank Monochrome M1120 Wi-Fi Ink Tank Printer', 2150000.00, 'Efficiency meets economy with the EcoTank monochrome M1120 printer. Taking care of details to meet business needs, look forward to lower costs with bottles that provide an ultra-high page yield of 6,000 pages each. Simplify processes with integrated ink tanks that enable spill-free, error-free ink refilling, and enjoy laser-quality text that is smudge- and water-resistant with the pigment ink. What more, the M1120 brings convenience with wireless connectivity, letting you print anytime, anywhere.<br><br> Compact integrated tank design<br> High-yield pigment ink bottle<br> Spill-free, error-free refilling<br> Wi-Fi, Wi-Fi Direct<br> Epson Connect<br> 4 years warranty', '674986abd3ef2-2024-11-29-Epson EcoTank Monochrome M1120 Wi-Fi Ink Tank Printer (PICT 20).png', 'kevinarlo', '2024-11-29 09:17:33', 'kevinarlo', '2024-12-02 05:39:57'),
(166, 4, 1, 'Epson EcoTank Monochrome M1140 Ink Tank Printer', 3550000.00, 'Efficiency meets productivity with the EcoTank monochrome M1140 printer. Powered by PrecisionCore technology, it delivers fast print speeds at 20 ipm in laser-quality text. Save 50% in paper cost with auto-duplex capabilities and bottles that provide an ultra high-page yield of up to 6,0001 pages each.<br><br> Compact integrated tank design<br> High yield ink bottles<br> Spill-free, error-free refilling<br> Auto duplex printing<br> 4 years warranty', '67498851959ad-2024-11-29-Epson EcoTank Monochrome M1140 Ink Tank Printer (PICT 21).png', 'kevinarlo', '2024-11-29 09:24:35', 'kevinarlo', '2024-12-02 05:40:17'),
(167, 4, 1, 'Epson EcoTank Monochrome M2140 All-in-One Ink Tank Printer', 3850000.00, 'Efficiency meets productivity with the EcoTank monochrome M2140 printer. Powered by PrecisionCore technology, it delivers fast print speeds at 20 ipm in laser-quality text. Save 50% in paper cost with auto-duplex capabilities and bottles that provide an ultra high-page yield of up to 6,000 pages each.<br><br> Compact integrated tank design<br> High-yield pigment ink bottle<br> Print speed up to 39ppm (20ipm)<br> Print, scan, copy<br> Auto duplex printing<br> 4 years warranty', '6749888632a76-2024-11-29-Epson EcoTank Monochrome M2140 All-in-One Ink Tank Printer (PICT 22).png', 'kevinarlo', '2024-11-29 09:25:26', 'kevinarlo', '2024-12-02 05:40:34'),
(168, 4, 1, 'Epson EcoTank Monochrome M3170 Wi-Fi All-in-One Ink Tank Printer', 5050000.00, 'Efficiency meets productivity with the EcoTank monochrome M3170 printer. Powered by PrecisionCore technology, it delivers fast print speeds at 20 ipm in laser-quality text. Save 50% in paper cost with auto-duplex capabilities and bottles that provide an ultra high-page yield of up to 6,000 pages1 each. What more, the M3170 is a 4-in-1 multi-functional printer, demonstrating how this range is rigorously built down to the last detail.<br><br> Compact integrated tank design<br> High yield ink bottles<br> Print, scan, copy, fax with ADF<br> Auto duplex printing<br> Wi-Fi, Wi-Fi Direct<br> 4 years warranty', '674988bdbe33c-2024-11-29-Epson EcoTank Monochrome M3170 Wi-Fi All-in-One Ink Tank Printer (PICT 23).png', 'kevinarlo', '2024-11-29 09:26:22', 'kevinarlo', '2024-12-02 05:41:00'),
(169, 4, 1, 'Epson EcoTank L18050 Ink Tank Printer', 8550000.00, 'Presenting cost-effective borderless A3+ photo printing solutions perfectly suited for design drawing, stunning photos, and versatile media printing such as DVD/CD and PVC/ID card printing. Now with an integrated ink tank design, the printer is compact in size and fits easily into different spaces. The Epson L18050 also come with replaceable parts and can be easily maintained. Easily set up your printer by using Epson Smart Panel app on your mobile device and turning it into an intuitive control centre that allows you to print and troubleshoot effortlessly.<br><br> Compact integrated tank design<br> Replaceable Maintenance Box<br> High yield ink bottles<br> Ultra-high page yield of 2,100 pages (colour)<br> Borderless Printing (up to A3+)<br> 2-year warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '674988fc51ba7-2024-11-29-Epson EcoTank L18050 Ink Tank Printer (PICT 24).png', 'kevinarlo', '2024-11-29 09:27:24', 'kevinarlo', '2024-12-02 05:41:19'),
(170, 4, 1, 'Epson EcoTank L8050 Ink Tank Printer', 4750000.00, 'Presenting cost-effective borderless A4 photo printing solutions perfectly suited for design drawing, stunning photos, and versatile media printing such as DVD/CD and PVC/ID card printing. Now with an integrated ink tank design, the printer is compact in size and fits easily into different spaces. The Epson L8050 also come with replaceable parts and can be easily maintained. Easily set up your printer by using Epson Smart Panel app on your mobile device and turning it into an intuitive control centre that allows you to print and troubleshoot effortlessly.<br><br> Compact integrated tank design<br> Replaceable Maintenance Box<br> High yield ink bottles<br> Ultra-high page yield of 2,100 pages (colour)<br> 2-year warranty or 50,000 pages, whichever comes first<br> Powered by Epson Heat-Free Technology', '6749892668a61-2024-11-29-Epson EcoTank L8050 Ink Tank Printer (PICT 25).png', 'kevinarlo', '2024-11-29 09:28:06', 'kevinarlo', '2024-12-02 05:41:35'),
(171, 4, 1, 'Epson L850 Photo All-in-One Ink Tank Printer', 5850000.00, 'Imaging enthusiasts and professionals can look forward to the 6-colour ink tank system, presenting vibrant borderless prints and unrivalled performance at a remarkably low cost through this 3-in-1 photo printer.<br><br> High-yield ink bottles<br> 2.7 colour LCD screen<br> Direct printing via memory card slot, USB port and PictBridge<br> CD/DVD printing<br> Warranty of 1 year or 3,000 photo prints, whichever comes first', '67498a9c81e1c-2024-11-29-Epson L850 Photo All-in-One Ink Tank Printer (PICT 26).png', 'kevinarlo', '2024-11-29 09:34:20', 'kevinarlo', '2024-12-02 05:41:55'),
(172, 4, 1, 'Epson EcoTank L14150 A3+ Wi-Fi Duplex Wide-Format All-in-One Ink Tank Printer', 7250000.00, 'Epson EcoTank L14150 gives you great variety when it comes to paper sizes. With a flatbed designed to scan and copy paper sizes that include Legal and Folio, it can also print documents up to A3+, demonstrating its versatility as a compact multifunction printer. Its auto-duplex function ensures low printing cost while increasing productivity at fast print speeds with Epson Heat-Free Technology. Its time to focus on the details for your business.<br><br> Print speed of up to 17.0 ipm<br> Prints up to A3+ (for simplex)<br> Automatic duplex printing<br> Ultra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br> Wi-Fi, Wi-Fi Direct<br> Epson Connect (Epson iPrint, Epson Email Print and Remote Print Driver, Scan to Cloud)', '67498ae0a2bb4-2024-11-29-Epson EcoTank L14150 A3+ Wi-Fi Duplex Wide-Format All-in-One Ink Tank Printer (PICT 27).png', 'kevinarlo', '2024-11-29 09:35:29', 'kevinarlo', '2024-12-02 05:42:16'),
(173, 4, 1, 'Epson EcoTank L15150 A3 Wi-Fi Duplex', 13350000.00, 'Giving you a cost-saving A3 printer that does more for your business, Epson EcoTank L15150 has an ultra-high page yield of up to 7,500 pages in black and 6,000 pages in colour. Paired with the new EcoTank pigment ink, DURABrite ET INK delivers prints that are sharp, clear and water-resistant, even in barcode mode. Enhance your productivity as Epson Heat-Free Technology enables high speed printing with lower power consumption. Get more for less, right down to the details.<br><br> Print speed of up to 25.0 ipm<br> Prints up to A3+ (for simplex)<br> Automatic duplex printing<br> Ultra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br> Wi-Fi, Wi-Fi Direct, Ethernet<br> Epson Connect (Epson iPrint, Epson Email Print and Remote Print Driver, Scan to Cloud)', '67498b0fa4ade-2024-11-29-Epson EcoTank L15150 A3 Wi-Fi Duplex (PICT 28).png', 'kevinarlo', '2024-11-29 09:36:16', 'kevinarlo', '2024-12-02 05:42:32'),
(174, 4, 1, 'Epson EcoTank L15160 A3 Wi-Fi Duplex', 17550000.00, 'With your business in mind, Epson EcoTank L15160 is built to ensure lower costs for duplex printing and scanning, up to A3 size. Using the latest pigment ink, DURABrite ET INK gives you sharp, clear and durable prints that are water-resistant. Designed to be compact, L15160 can fit into your office easily with its small footprint. When it comes to delivering quality and cost savings, we go right down to the details.<br><br> Print speed of up to 25.0 ipm<br> Prints up to A3+ (for simplex)<br> Automatic duplex printing<br> Ultra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br> Wi-Fi, Wi-Fi Direct, Ethernet<br> Epson Connect (Epson iPrint, Epson Email Print and Remote Print Driver, Scan to Cloud)', '67498b404c3f8-2024-11-29-Epson EcoTank L15160 A3 Wi-Fi Duplex (PICT 29).png', 'kevinarlo', '2024-11-29 09:37:04', 'kevinarlo', '2024-12-02 05:43:16'),
(175, 4, 1, 'Epson EcoTank L15180 A3 Wi-Fi Duplex', 17350000.00, 'Get fully flexible and customisable print solutions for your business with the Epson EcoTank L15180 colour printer. Powered by Heat-Free Technology, L15180 increases productivity with ultra-high page yield and consistent fast speed printing of up to 25 ipm (for simplex printing). Printouts are sharp, crisp and water resistant from our 4-colour pigment ink which is suitable for business printing. Secure the access of your devices through authentication and apply printing control to reduce cost of printing.<br><br> Print speed of up to 25.0 ipm (simplex)<br> Prints up to A3+ (for simplex)<br> Automatic duplex printing up to A3 size<br> Ultra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br> Epson Open Platform for integration with Epson Print Admin or third party print management solutions <br> Wi-Fi, Wi-Fi Direct, Ethernet', '67498b6e930b0-2024-11-29-Epson EcoTank L15180 A3 Wi-Fi Duplex (PICT 30).png', 'kevinarlo', '2024-11-29 09:37:51', 'kevinarlo', '2024-12-02 05:43:34'),
(176, 4, 1, 'Epson EcoTank L6550 A4 Colour Wi-Fi Duplex', 0.00, 'Save more with business EcoTank printers that are built in detail to keep your total cost of ownership down and bring up productivity. Epson EcoTank L6550 delivers print speed of up to 25 ipm with a first page-out time in 5.5 seconds for printing in black. The printer has a high page yield of up to 7,500 pages in black and 6,000 pages in colour with pigment ink that offers sharp, crisp and water-resistant prints. Using clean, hassle-free ink refilling process and Epson Heat-Free Technology, power consumption and the need to replace consumables are significantly lower, reducing your running cost.<br><br>\r\nPrint speed of up to 25 ipm (black) / 12 ipm (colour)<br>\r\nAutomatic duplex printing<br>\r\nUltra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br>\r\nWi-Fi, Wi-Fi Direct, Ethernet<br>\r\nEpson Connect (Epson iPrint, Epson Email Print and Remote Print Driver, Scan to Cloud)\r\n', '67498cc8030f5-2024-11-29-Epson EcoTank L6550 A4 Colour Wi-Fi Duplex (PICT 31).png', 'kevinarlo', '2024-11-29 09:43:37', NULL, NULL),
(177, 4, 1, 'Epson EcoTank L6580 A4 Colour Wi-Fi Duplex', 0.00, 'Save more with business EcoTank printers that are built in detail to keep your total cost of ownership down and bring up productivity. Epson EcoTank L6580 delivers fast print speeds of up to 25 ipm with a first colour page-out time in just 5.5 seconds for high performance business printing. The printer has a high page yield of up to 7,500 pages in black and 6,000 pages in colour with pigment ink that offers sharp, crisp and water-resistant prints. Using clean, hassle-free ink refilling process and Epson Heat-Free Technology, power consumption and the need to replace consumables are significantly lower, reducing your running cost.<br><br>\r\nPrint speed of up to 25 ipm (black and colour)<br>\r\nAutomatic duplex printing<br>\r\nUltra-high page yield of 7,500 pages (black) and 6,000 pages (colour)<br>\r\nWi-Fi, Wi-Fi Direct, Ethernet<br>\r\nEpson Connect (Epson iPrint, Epson Email Print and Remote Print Driver, Scan to Cloud)<br>\r\nSupports PCL and PostScript', '67498cfdc378c-2024-11-29-Epson EcoTank L6580 A4 Colour Wi-Fi Duplex (PICT 32).png', 'kevinarlo', '2024-11-29 09:44:30', NULL, NULL),
(178, 4, 1, 'Epson EcoTank Monochrome M15180 A3 Wi-Fi Duplex', 0.00, 'Get fully flexible and customisable print solutions for your business with the Epson EcoTank M15180 monochrome printer. Powered by Heat-Free Technology, M15180 increases productivity with ultra-high page yield and consistent fast speed printing of up to 25 ipm (for simplex printing). Printouts are sharp, crisp and water resistant from our pigment ink which is suitable for business printing. Secure the access of your devices through authentication and apply printing control to reduce cost of printing.<br><br>\r\nPrint speed of up to 25.0 ipm (simplex) and 21.0 ipm (duplex)<br>\r\nPrints up to A3+ (for simplex)<br>\r\nAutomatic duplex printing of up to A3 size<br>\r\nUltra-high page yield of 7,500 pages (black)<br>\r\nEpson Open Platform for integration with Epson Print Admin or third party print management solutions<br>\r\nWi-Fi, Wi-Fi Direct, Ethernet\r\n', '67498d3667a13-2024-11-29-Epson EcoTank Monochrome M15180 A3 Wi-Fi Duplex (PICT 33).png', 'kevinarlo', '2024-11-29 09:45:27', NULL, NULL);
INSERT INTO `tbl_product` (`ProductID`, `ProductCategoryID`, `StatusID`, `ProductName`, `ProductPrice`, `ProductDescription`, `ProductPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(179, 4, 1, 'WorkForce Enterprise WF-C20600 A3 Multifunction Printer', 0.00, 'Powered by Heat-Free Technology, Epson WorkForce Enterprise printer WF-C20600 provides consistent high-speed printing and consumes less power which increases productivity while minimising running costs. Designed to suit your business needs, it offers printing speeds of up to 60 pages per minute. Also, with fewer replacement parts, it is built to reduce environmental impact.<br><br>\r\n4-in-1 Network MFP: Print | Copy | Scan | Fax (Optional)<br>\r\nISO Print Speed: 60 ipm (simplex/duplex)1<br>\r\nHigh yield ink cartridges for printing of up to 100,000 pages (black)2 and 50,000 pages (colour)<br>\r\nNew finishing options for stapling, hole-punching and booklet printing\r\n', '67498d683cdf5-2024-11-29-WorkForce Enterprise WF-C20600 A3 Multifunction Printer (PICT 34).png', 'kevinarlo', '2024-11-29 09:46:16', NULL, NULL),
(180, 4, 1, 'WorkForce Enterprise WF-C20750 A3 Multifunction Printer', 0.00, 'Powered by Heat-Free Technology, Epson WorkForce Enterprise printer WF-C20750 provides consistent high-speed printing and consumes less power which increases productivity while minimising running costs. Designed to suit your business needs, it offers printing speeds of up to 75 pages per minute. Also, with fewer replacement parts, it is built to reduce environmental impact.<br><br>\r\n4-in-1 Network MFP: Print | Copy | Scan | Fax (Optional)<br>\r\nISO Print Speed: 75 ipm (simplex/duplex)1<br>\r\nHigh yield ink cartridges for printing of up to 100,000 pages (black)2 and 50,000 pages (colour)<br>\r\nNew finishing options for stapling, hole-punching and booklet printing', '67498d95bc535-2024-11-29-WorkForce Enterprise WF-C20750 A3 Multifunction Printer (PICT 35).png', 'kevinarlo', '2024-11-29 09:47:02', NULL, NULL),
(181, 4, 1, 'WorkForce Enterprise WF-C21000 A3 Multifunction Printer', 0.00, 'Powered by Heat-Free Technology, Epson WorkForce Enterprise printer WF-C21000 provides consistent high-speed printing and consumes less power which increases productivity while minimising running costs. Designed to suit your business needs, it offers printing speeds of up to 100 pages per minute. Also, with fewer replacement parts, it is built to reduce environmental impact.<br><br>\r\n4-in-1 Network MFP Print | Copy | Scan | Fax (Optional)<br>\r\nISO Print Speed 100 ipm (simplex/duplex)1<br>\r\nHigh yield ink cartridges for printing of up to 100,000 pages (black)2 and 50,000 pages (colour)<br>\r\nNew finishing options for stapling, hole-punching and booklet printing\r\n', '67498f927d33e-2024-11-29-WorkForce Enterprise WF-C21000 A3 Multifunction Printer (PICT 36).png', 'kevinarlo', '2024-11-29 09:55:31', NULL, NULL),
(182, 4, 1, 'Epson LX-310 Dot Matrix Printer', 3050000.00, 'Highly reliable printing with better performance<br> Narrow carriage 9-pin SIDM<br> High 357 CPS print speed at 12CPI<br> 10,000 power on hour MTBF<br> USB, Serial and Parallel ports', '67498fb911175-2024-11-29-Epson LX-310 Dot Matrix Printer (PICT 37).png', 'kevinarlo', '2024-11-29 09:56:09', 'kevinarlo', '2024-12-02 05:44:02'),
(183, 4, 1, 'Epson LQ-2190 Dot Matrix Printer', 8950000.00, 'The 24-pin 136 column printer is designed to offer busy offices unparalleled performance and reliability.<br> 24-pin wide carriage<br> Speed: up to 480 cps (10cpi)<br> MTBF: 20,000 Power on Hours<br> USB and Parallel ports<br> Optional network print server', '67498fe659f47-2024-11-29-Epson LQ-2190 Dot Matrix Printer (PICT 38).png', 'kevinarlo', '2024-11-29 09:56:55', 'kevinarlo', '2024-12-02 05:44:32'),
(184, 4, 1, 'Epson LQ-310 Dot Matrix Printer', 3350000.00, 'Your fast and affordable printing solution<br> Narrow carriage 24-pin SIDM<br> High 416 CPS print speed at 12CPI<br> 10,000 power on hour MTBF<br> USB, Serial and Parallel ports', '67499063ee2fe-2024-11-29-Epson LQ-310 Dot Matrix Printer (PICT 39).png', 'kevinarlo', '2024-11-29 09:59:00', 'kevinarlo', '2024-12-02 05:44:51'),
(185, 4, 1, 'Epson LQ-590II Impact Printer', 0.00, '24-pins Impact Printer<br>\r\nPrint speeds of up to 487 cps (10 cpi)<br>\r\n128 kb memory buffer<br>\r\nMTBF of 25,000 POH<br>', '6749908a89f16-2024-11-29-Epson LQ-590II Impact Printer (PICT 40).png', 'kevinarlo', '2024-11-29 09:59:39', NULL, NULL);

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

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`ProductCategoryID`, `StatusID`, `ProductCategoryName`, `ProductCategoryCatalog`, `ProductCategoryPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'Laptop / Notebook', '6742f3685ad65-2024-11-24-Test.pdf', '673caf6092052-2024-11-19-LAPTOP.png', 'kevinarlo', '2024-11-01 07:39:49', 'kevinarlo', '2024-11-24 09:35:36'),
(2, 1, 'Dekstop', '6742f3969fc9a-2024-11-24-Test.pdf', '673caf79a6ae6-2024-11-19-PC-DESKTOP.png', 'kevinarlo', '2024-11-01 07:41:42', 'kevinarlo', '2024-11-24 09:36:23'),
(3, 1, 'Monitor', '6742f3a00bd47-2024-11-24-Test.pdf', '673cafd635667-2024-11-19-MONITOR.png', 'kevinarlo', '2024-11-04 10:59:07', 'kevinarlo', '2024-11-24 09:36:32'),
(4, 1, 'Printer', '6742f3a98c645-2024-11-24-Test.pdf', '673cb2a37c533-2024-11-19-PRINTER.png', 'kevinarlo', '2024-11-04 11:22:41', 'kevinarlo', '2024-11-24 09:36:41'),
(5, 1, 'Proyektor', '6742f3b3d9fb6-2024-11-24-Test.pdf', '673cb31404122-2024-11-19-PROYEKTOR.png', 'kevinarlo', '2024-11-04 11:23:07', 'kevinarlo', '2024-11-24 09:36:52'),
(6, 1, 'Aksesoris', '6742f38cf20d3-2024-11-24-Test.pdf', '673cb373e5453-2024-11-19-ACCESORIS.png', 'kevinarlo', '2024-11-04 11:23:23', 'kevinarlo', '2024-11-24 09:36:13');

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
(1, 1, 'About Us', 'PT Dinamika Utama Saka telah lama dikenal sebagai perusahaan yang berkomitmen untuk selalu mengutamakan kepuasan pelanggan dengan menyediakan produk berkualitas tinggi, didukung oleh layanan profesional yang tidak hanya memahami, tetapi juga mampu menjawab setiap kebutuhan Anda dengan solusi yang tepat dan efisien. Kami menawarkan harga terbaik yang tetap terjaga, tanpa mengorbankan kualitas, karena kami percaya bahwa kepercayaan Anda adalah aset utama. Untuk konsultasi lebih lanjut mengenai produk dan layanan kami, jangan ragu untuk menghubungi langsung tim product specialist kami yang siap memberikan informasi serta solusi yang paling sesuai dengan kebutuhan Anda', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-11-19 10:59:13'),
(2, 1, 'Phone Number', '0213160118', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-10-09 09:35:57'),
(3, 1, 'Whatsapp Number', '6281389055595', 'kevinarlo', '2024-10-29 08:07:53', 'kevinarlo', '2024-10-09 09:38:25'),
(4, 1, 'Address Jakarta', 'Jl. DR. Kusuma Atmaja, S.H. No. 83. Menteng. Jakarta Pusat', 'kevinarlo', '2024-10-29 08:32:44', 'kevinarlo', '2024-11-11 10:07:16'),
(5, 1, 'Email 1', 'jakarta@dinamikaus.com', 'kevinarlo', '2024-10-29 08:33:44', 'kevinarlo', '2024-11-20 04:19:51'),
(6, 1, 'Email 2', 'bekasi@dinamikaus.com', 'kevinarlo', '2024-11-11 10:21:20', 'kevinarlo', '2024-11-20 04:20:09'),
(7, 1, 'Header 1', 'Jakarta (HEADQUARTER)', 'kevinarlo', '2024-11-20 04:15:17', 'kevinarlo', '2024-11-20 05:07:53'),
(8, 1, 'Header 2', 'Bekasi (REPRESENTATIVE OFFICE)', 'kevinarlo', '2024-11-20 04:17:52', 'kevinarlo', '2024-11-20 05:08:04'),
(9, 1, 'Address Bekasi', 'Jl. Cipete Raya No.83 Mustika Jaya. Kota Bekasi', 'kevinarlo', '2024-11-20 04:19:32', NULL, NULL),
(10, 1, 'Email 3', 'sales@dinamikaus.com', 'kevinarlo', '2024-11-25 07:17:36', NULL, NULL);

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
(1, 1, 'Logo Header or Navbar', '6750605c050a9-2024-12-04-logo-dinamikaus.png', 'kevinarlo', '2024-10-29 09:16:40', 'kevinarlo', '2024-12-04 13:59:56'),
(2, 1, 'Logo Footer', '673c798a3e475-2024-11-19-logo_1.png', 'kevinarlo', '2024-10-29 10:20:19', 'kevinarlo', '2024-11-19 11:42:02'),
(3, 1, 'Logo Login Page', '67222c78b36f9-2024-10-30-logo.png', 'kevinarlo', '2024-10-30 12:54:17', NULL, NULL),
(4, 1, 'Carousel Photo', '673d79ff4db9e-2024-11-20-Yours Premium Store.png', 'kevinarlo', '2024-10-30 13:20:33', 'kevinarlo', '2024-11-20 05:56:15');

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
(3, 1, 'Grab Express', '6722396402663-2024-10-30-logo-grab-express.png', 'kevinarlo', '2024-10-30 13:48:10', 'kevinarlo', '2024-11-11 08:09:09'),
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

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`TeamID`, `StatusID`, `FullName`, `Position`, `Linkedin`, `Instagram`, `TeamPhoto`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 1, 'NIKI', 'BUSINESS EXECUTIVE', '', '', '673d736282109-2024-11-20-Niki.png', 'kevinarlo', '2024-11-04 13:26:50', 'kevinarlo', '2024-11-20 05:28:02'),
(2, 1, 'MARISA', 'BUSINESS EXECUTIVE', '', '', '673d737dd0f53-2024-11-20-Marisa.png', 'kevinarlo', '2024-11-04 13:28:56', 'kevinarlo', '2024-11-20 05:28:30'),
(3, 1, 'NURUL', 'BUSINESS EXECUTIVE', '', '', '673d738c9e461-2024-11-20-Nurul.png', 'kevinarlo', '2024-11-04 13:29:05', 'kevinarlo', '2024-11-20 05:28:45'),
(4, 1, 'DHEA', 'BUSINESS EXECUTIVE', '', '', '673d739a2e52d-2024-11-20-Dhea.png', 'kevinarlo', '2024-11-04 13:29:17', 'kevinarlo', '2024-11-20 05:28:58'),
(5, 1, 'LUDHIAN', 'BUSINESS EXECUTIVE', '', '', '673d73b91f452-2024-11-20-Ludhian.png', 'kevinarlo', '2024-11-04 13:29:33', 'kevinarlo', '2024-11-20 05:29:29'),
(6, 1, 'KEVIN ARLO', 'IT', '', '', '6728cc4b3c0ee-2024-11-04-Telusuri Kategori Produk 500x500.jpg', 'kevinarlo', '2024-11-04 13:29:47', 'kevinarlo', '2024-11-20 05:29:41');

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

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`TestimonialID`, `TestimonialStatusID`, `FullName`, `Company`, `TestimonialRating`, `TestimonialDescription`, `CreateBy`, `CreateTime`, `UpdateBy`, `UpdateTime`) VALUES
(1, 2, 'Abdi Negara', 'PT Naymas Mahkota Abadi', '5', 'PT Dinamika Utama Saka telah memberikan dukungan yang luar biasa dalam setiap tahap proyek kami. Tim mereka sangat kompeten dan selalu siap memberikan solusi terbaik dengan kualitas yang sangat baik. Kami sangat merekomendasikan mereka', 'Abdi Negara', '2024-11-29 03:37:59', 'kevinarlo', '2024-11-29 03:43:07'),
(2, 2, 'Khoirul Kholis', 'PT Indosafe Jaya Perkasa', '5', 'Kami sangat menghargai komitmen dan integritas PT Dinamika Utama Saka. Proses kerja mereka sangat transparan dan profesional, dan hasilnya selalu melebihi ekspektasi kami. Kami akan terus menjalin kerja sama jangka panjang dengan mereka', 'Khoirul Kholis', '2024-11-29 03:39:34', 'kevinarlo', '2024-11-29 03:43:21'),
(3, 2, 'Hendri Lee', 'PT Fatiha Alam Semesta', '5', 'PT Dinamika Utama Saka telah menjadi mitra yang luar biasa bagi perusahaan kami. Mereka selalu memberikan hasil yang memuaskan dengan kualitas tinggi dan pelayanan yang ramah. Terima kasih atas kerja sama yang luar biasa!', 'Hendri Lee', '2024-11-29 03:40:30', 'kevinarlo', '2024-11-29 03:43:17'),
(4, 2, 'Bestian Yodia Nugraha', 'PT Dinamika Utama Saka', '5', 'Keberhasilan perusahaan ini tidak lepas dari dedikasi dan kerja keras tim yang luar biasa. Kami percaya bahwa kolaborasi adalah kekuatan kami, dan kami berkomitmen untuk terus memperkuat hubungan dengan klien dan mitra kami demi mencapai tujuan bersama yang lebih besar. Bersama-sama, kita dapat menghadirkan solusi yang lebih tepat dan memberikan hasil yang maksimal', 'Bestian Yodia Nugrah', '2024-11-29 03:41:17', 'kevinarlo', '2024-11-29 03:43:13');

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
  MODIFY `EventLogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  MODIFY `MetaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ourclient`
--
ALTER TABLE `tbl_ourclient`
  MODIFY `OurClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `ProductCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `SettingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `TestimonialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
