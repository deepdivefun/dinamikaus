-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 11:08 AM
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
(1, 1, 1, 'ROG Zephyrus G16', 42500000.00, 'AMD Ryzen™ AI 9 HX 370 Processor 2.0GHz\r\nNVIDIA® GeForce RTX™ 4060 Laptop GPU\r\n16GB*2 LPDDR5X on board\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD\r\nNebula OLED-QHD240Hz\r\nWindows 11 Home', '673cb786c0aa0-2024-11-19-ROG Zephyrus G16 (PICT 1).png', 'kevinarlo', '2024-11-01 07:40:13', 'kevinarlo', '2024-11-19 16:31:44'),
(2, 2, 2, 'Dekstop 1', NULL, 'Dekstop 1', '6728bb94290e3-2024-11-04-Telusuri Kategori Produk 500x500.jpg', 'kevinarlo', '2024-11-01 07:41:57', 'kevinarlo', '2024-11-20 08:11:51'),
(3, 1, 1, 'ROG FLOW X13', 36500000.00, 'AMD Ryzen™ 9 7940HS Mobile Processor\r\nNVIDIA® GeForce RTX™ 4050 Laptop GPU\r\n8GB*2 LPDDR5 on board\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD\r\nWindows 11 Home', '673cbed0007fe-2024-11-19-ROG FLOW X13 (PICT 2).png', 'kevinarlo', '2024-11-04 12:18:50', 'kevinarlo', '2024-11-19 16:37:36'),
(4, 1, 1, 'ROG STRIX SCAR 16', 68500000.00, '13th Gen Intel® Core™ i9-13980HX Processor\r\nNVIDIA® GeForce RTX™ 4080 Laptop GPU\r\n16GB DDR5-4800 SO-DIMM *2\r\n2TB PCIe® 4.0 NVMe™ M.2 Performance SSD\r\nNebHDR-MiniLED-QHD240Hz\r\nWindows 11 Home', '673cbf6e42aee-2024-11-19-ROG STRIX SCAR 16 (PICT 3).png', 'kevinarlo', '2024-11-19 16:40:16', NULL, NULL),
(5, 1, 1, 'ROG STRIX SCAR 16', 73500000.00, '13th Gen Intel® Core™ i9-13980HX Processor\r\nNVIDIA® GeForce RTX™ 4090 Laptop GPU\r\n16GB DDR5-4800 SO-DIMM *2\r\n2TB PCIe® 4.0 NVMe™ M.2 Performance SSD\r\nNebHDR-MiniLED-QHD240Hz\r\nWindows 11 Home', '673cc01a0554a-2024-11-19-ROG STRIX SCAR 16 (PICT 3).png', 'kevinarlo', '2024-11-19 16:43:06', NULL, NULL),
(6, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 17500000.00, 'Intel®Core™ i5-12450H Processor NVIDIA® GeForce® RTX™ 305 16GB DDR4 on board 512GB M.2 NVMe™ PCIe® 4.0 SSD 2.8K (2880 x 1620) OLED 16:9 aspect ratio Windows 11 Home', '673d7f639bc67-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:15:52', 'kevinarlo', '2024-11-20 08:29:40'),
(7, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 19500000.00, 'Intel® Core™ i9-11900H Processor\r\nNVIDIA® GeForce® RTX™ 3050\r\n16GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home', '673d7fb9b6777-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:20:43', NULL, NULL),
(8, 1, 1, 'ASUS Vivobook Pro 15 OLED (K6502)', 20500000.00, 'Intel® Core™ i9-11900H Processor \r\nNVIDIA® GeForce® RTX™ 3050 Ti\r\n16GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home', '673d800f2de65-2024-11-20-ASUS VIVOBOOK PRO 15 OLED (PICT 1).png', 'kevinarlo', '2024-11-20 06:22:07', NULL, NULL),
(9, 1, 1, 'ASUS Zenbook Pro 14 OLED (UX6404)', 36350000.00, 'Intel® Core™ i9-13900H Processor 2.6 GHz (24MB Cache, up to 5.4 GHz, 14 cores, 20 Threads)\r\nNVIDIA® GeForce RTX™ 4070 Laptop GPU 8GB DDR6\r\n16GB DDR5 on board\r\n1TB M.2 NVMe™ PCIe® 4.0 Performance SSD\r\nWindows 11 Home', '673d80876ae0e-2024-11-20-ASUS ZENBOOK PRO 14 OLED (PICT 2).png', 'kevinarlo', '2024-11-20 06:24:07', NULL, NULL),
(10, 1, 1, 'ASUS Vivobook Pro 14 OLED (M3401, AMD Ryzen™ 5000 Series Mobile Processors)', 12500000.00, 'AMD Ryzen™ 5 5600H\r\nNVIDIA® GeForce RTX® 3050 Laptop GPU\r\n8GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n2.8k OLED\r\nWindows 11 Home', '673d830f177e1-2024-11-20-ASUS Vivobook Pro 14 OLED (PICT 3).png', 'kevinarlo', '2024-11-20 06:34:55', NULL, NULL),
(11, 1, 1, 'ASUS Vivobook Pro 14 OLED (M3401, AMD Ryzen™ 5000 Series Mobile Processors)', 15500000.00, 'AMD Ryzen™ 7 5800H\r\nNVIDIA® GeForce RTX® 3050 Laptop GPU\r\n8GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n2.8k OLED\r\nWindows 11 Home', '673d834ec09e9-2024-11-20-ASUS Vivobook Pro 14 OLED (PICT 3).png', 'kevinarlo', '2024-11-20 06:35:59', NULL, NULL),
(12, 1, 1, 'ASUS Vivobook Pro 15 OLED (M6500, AMD Ryzen™ 5000 Series Mobile Processor)', 14500000.00, 'AMD Ryzen™ 5 5600H Mobile Processor\r\nNVIDIA® GeForce® RTX™ 3050 Laptop GPU\r\n16GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home', '673d83e1b08dd-2024-11-20-ASUS Vivobook Pro 15 OLED (PICT 4).png', 'kevinarlo', '2024-11-20 06:38:26', NULL, NULL),
(13, 1, 1, 'ASUS Vivobook Pro 15 OLED (M6500, AMD Ryzen™ 5000 Series Mobile Processor)', 15500000.00, 'AMD Ryzen™ 5 5600H Mobile Processor\r\nNVIDIA® GeForce® RTX™ 3050 Ti Laptop GPU\r\n16GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\n2.8K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home\r\n', '673d84141c2e1-2024-11-20-ASUS Vivobook Pro 15 OLED (PICT 4).png', 'kevinarlo', '2024-11-20 06:39:16', NULL, NULL),
(14, 1, 1, 'ASUS Vivobook Pro 16X OLED (N7600, 11th Gen Intel)', 20500000.00, 'Intel® Core™ i7-11370H Processor 3.3 GHz\r\nNVIDIA® GeForce® RTX™ 3050 Laptop GPU 4GB GDDR6\r\n16GB DDR4 on board\r\n1TB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d84b39856e-2024-11-20-ASUS Vivobook Pro 16X OLED (PICT 5).png', 'kevinarlo', '2024-11-20 06:41:56', NULL, NULL),
(15, 1, 1, 'ASUS Vivobook S 14 OLED (M5406)', 13300000.00, 'AMD Ryzen™ 5 7535HS Mobile Processor 3.3GHz\r\nAMD Radeon™ Graphics\r\n16GB LPDDR5X on board\r\n512GB M.2 NVMe™ PCIe® 4.0 SSD\r\nWindows 11 Home', '673d8520501aa-2024-11-20-ASUS Vivobook S 14 OLED (PICT 6).png', 'kevinarlo', '2024-11-20 06:43:45', NULL, NULL),
(16, 1, 1, 'ASUS Vivobook S 14 OLED (S5406)', 18500000.00, 'Intel® Core™ Ultra 7 Processor 155H 1.4 GHz\r\nIntel® Arc™ Graphics\r\n16GB LPDDR5X on board\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD\r\nWindows 11 Home', '673d858e143f7-2024-11-20-ASUS Vivobook S 14 OLED (PICT 7).png', 'kevinarlo', '2024-11-20 06:45:36', NULL, NULL),
(17, 1, 1, 'ASUS Vivobook S 15 OLED (S5507) Copilot+ PC', 26500000.00, 'Snapdragon® X Elite X1E 78 100 Processor 3.4GHz\r\n32GB LPDDR5X on board\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD\r\n15.6-inch, 3K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home', '673d860592d8f-2024-11-20-ASUS Vivobook S 15 OLED (PICT 8).png', 'kevinarlo', '2024-11-20 06:47:34', NULL, NULL),
(18, 1, 1, 'ASUS Vivobook S 15 OLED (S5507) Copilot+ PC', 22500000.00, 'Snapdragon® X Plus X1P 42 100 Processor up to 3.4GHz\r\n16GB LPDDR5X on board\r\n1TB M.2 NVMe™ PCIe® 4.0 SSD\r\n15.6-inch, 3K (2880 x 1620) OLED 16:9 aspect ratio\r\nWindows 11 Home', '673d8644c6347-2024-11-20-ASUS Vivobook S 15 OLED (PICT 8).png', 'kevinarlo', '2024-11-20 06:48:38', NULL, NULL),
(19, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 7000000.00, 'AMD Ryzen™ 3 7320U Mobile Processor\r\n8GB DDR4 on board\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d86ae7f624-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:50:22', NULL, NULL),
(20, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 7500000.00, 'AMD Ryzen™ 3 7320U Mobile Processor\r\n8GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d86cf7d2a3-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:50:55', NULL, NULL),
(21, 1, 1, 'ASUS Vivobook Go 14 (E1404F)', 10500000.00, 'AMD Ryzen™ 5 7520U Mobile Processor\r\n16GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d86ef8c96a-2024-11-20-ASUS Vivobook Go 14 (PICT 9).png', 'kevinarlo', '2024-11-20 06:51:27', NULL, NULL),
(22, 1, 1, 'ASUS Vivobook Go 15 OLED (E1504F)', 8500000.00, 'AMD Ryzen™ 3 7320U Mobile Processor\r\n8GB DDR4 on board\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d874486100-2024-11-20-ASUS Vivobook Go 15 OLED (PICT 10).png', 'kevinarlo', '2024-11-20 06:52:52', NULL, NULL),
(23, 1, 1, 'ASUS Vivobook Go 15 OLED (E1504F)', 9350000.00, 'AMD Ryzen™ 3 7320U Mobile Processor\r\n8GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d87600e06c-2024-11-20-ASUS Vivobook Go 15 OLED (PICT 10).png', 'kevinarlo', '2024-11-20 06:53:20', NULL, NULL),
(24, 1, 1, 'ASUS Vivobook Go 14 Flip (TP1400)', 6500000.00, 'Intel® Celeron® N4500\r\n4GB DDR4 on board\r\n256GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d87dab7257-2024-11-20-ASUS Vivobook Go 14 Flip (PICT 11).png', 'kevinarlo', '2024-11-20 06:55:23', NULL, NULL),
(25, 1, 1, 'ASUS Vivobook Go 14 Flip (TP1400)', 8500000.00, 'Intel® Pentium® Silver N6000\r\n8GB DDR4 on board\r\n512GB M.2 NVMe™ PCIe® 3.0 SSD\r\nWindows 11 Home', '673d87ff462ad-2024-11-20-ASUS Vivobook Go 14 Flip (PICT 11).png', 'kevinarlo', '2024-11-20 06:55:59', NULL, NULL),
(26, 1, 1, 'ASUS TUF Gaming A15', 25000000.00, 'AMD Ryzen™ 9 8945H Processor 4GHz \r\nNVIDIA® GeForce RTX™ 4060 Laptop GPU\r\n16GB DDR5-5600 SO-DIMM\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD\r\nFHD (1920 x 1080) 16:9 144Hz\r\nWindows 11 Home', '673d8858495d6-2024-11-20-ASUS TUF Gaming A15 (PICT 12).png', 'kevinarlo', '2024-11-20 06:57:30', NULL, NULL),
(27, 1, 1, 'ASUS TUF Gaming A15', 27500000.00, 'AMD Ryzen™ 9 8945HS Processor 4GHz \r\nNVIDIA® GeForce RTX™ 4070 Laptop GPU\r\n16GB DDR5-5600 SO-DIMM\r\n1TB PCIe® 4.0 NVMe™ M.2 SSD\r\nFHD (1920 x 1080) 16:9 144Hz\r\nWindows 11 Home', '673d887e02982-2024-11-20-ASUS TUF Gaming A15 (PICT 12).png', 'kevinarlo', '2024-11-20 06:58:06', NULL, NULL),
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
(44, 3, 1, 'Monitor LG UltraWide Dual QHD', 23500000.00, '', '673d99bd8c396-2024-11-20-LG PICT 17.png', 'kevinarlo', '2024-11-20 08:11:41', NULL, NULL);

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
(9, 1, 'Address Bekasi', 'Jl. Cipete Raya No.83 Mustika Jaya. Kota Bekasi', 'kevinarlo', '2024-11-20 04:19:32', NULL, NULL);

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
(1, 2, 'Kevin Arlo', '', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'kevinarlo', '2024-11-04 12:45:21', 'kevinarlo', '2024-11-04 12:46:10'),
(2, 2, 'Bestian', 'PT. Dinamika Utama Saka', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'kevinarlo', '2024-11-04 12:46:01', 'kevinarlo', '2024-11-04 12:46:15'),
(3, 2, 'Billy Romero', '', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'kevinarlo', '2024-11-11 07:14:08', NULL, NULL),
(4, 2, 'Faisal', '', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'kevinarlo', '2024-11-11 07:14:23', NULL, NULL),
(5, 1, 'Fachrul', 'Personal', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'Fachrul', '2024-11-24 09:54:51', NULL, NULL),
(6, 1, 'Satrio', 'Personal', '5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium itaque harum temporibus', 'Satrio', '2024-11-24 09:57:10', NULL, NULL);

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
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `SettingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `TestimonialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
