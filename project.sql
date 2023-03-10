-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 06:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `fullname` varchar(255) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `username` varchar(255) NOT NULL COMMENT 'Username',
  `password` varchar(255) NOT NULL COMMENT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `fullname`, `username`, `password`) VALUES
(1, 'Admin', 'Devpetch', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `blueprint`
--

CREATE TABLE `blueprint` (
  `id` int(11) NOT NULL,
  `blue_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blueprint`
--

INSERT INTO `blueprint` (`id`, `blue_id`, `name`, `price`) VALUES
(1, 1, 'ประตูบานสวิง', 4500.00),
(2, 2, 'หน้าต่างบานเลื่อน', 4455.00),
(3, 3, 'หน้าต่างบานกระทุ้ง', 1200.00);

-- --------------------------------------------------------

--
-- Table structure for table `blueprint_material`
--

CREATE TABLE `blueprint_material` (
  `id` int(11) NOT NULL,
  `blue_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `M_Qty` int(11) NOT NULL,
  `M_Price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blueprint_material`
--

INSERT INTO `blueprint_material` (`id`, `blue_id`, `item_id`, `M_Qty`, `M_Price`) VALUES
(1, 2, 14, 1, 300.00),
(2, 2, 20, 1, 300.00),
(3, 2, 25, 1, 300.00),
(4, 2, 24, 1, 300.00),
(5, 2, 27, 1, 300.00),
(6, 2, 28, 1, 300.00),
(7, 2, 21, 1, 300.00),
(8, 2, 26, 1, 300.00),
(9, 2, 29, 2, 260.00),
(10, 2, 30, 4, 180.00),
(11, 2, 31, 1, 140.00),
(12, 2, 32, 1, 35.00),
(13, 2, 33, 8, 120.00),
(14, 2, 34, 8, 320.00),
(15, 2, 35, 2, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `itemqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `company_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `Date`, `company_image`) VALUES
(1, 'บริษัท.โชคชัยจำกัด', '2023-03-09 12:57:38', './assets/company.png'),
(2, 'บริษัท.นำชัยจำกัด', '2023-03-09 12:59:58', './assets/company1.png'),
(3, 'บริษัท.อัตระนิยมจำกัด', '2023-03-09 13:01:00', './assets/company2.png');

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`id`, `company_id`, `item_id`) VALUES
(1, 1, 14),
(2, 1, 15),
(3, 1, 16),
(4, 1, 17),
(5, 1, 18),
(6, 1, 19),
(7, 1, 20),
(8, 1, 21),
(9, 1, 22),
(10, 1, 23),
(11, 1, 24),
(12, 1, 25),
(13, 1, 26),
(14, 1, 27),
(15, 1, 28),
(16, 2, 14),
(17, 2, 15),
(18, 2, 16),
(19, 2, 17),
(20, 2, 18),
(21, 2, 19),
(22, 2, 20),
(23, 2, 21),
(24, 2, 22),
(25, 2, 23),
(26, 2, 24),
(27, 2, 25),
(28, 2, 24),
(29, 2, 25),
(30, 2, 26),
(31, 2, 27),
(32, 2, 28),
(33, 3, 14),
(34, 3, 15),
(35, 3, 16),
(36, 3, 17),
(37, 3, 18),
(38, 3, 19),
(39, 3, 20),
(40, 3, 21),
(41, 3, 22),
(42, 3, 23),
(43, 3, 24),
(44, 3, 25),
(45, 3, 26),
(46, 3, 27),
(47, 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `import_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `import_details`
--

CREATE TABLE `import_details` (
  `id` int(11) NOT NULL,
  `import_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `made_orders`
--

CREATE TABLE `made_orders` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `made_id` varchar(255) NOT NULL COMMENT 'รหัสการสั้งทำ',
  `blue_id` int(11) NOT NULL COMMENT 'บลูปลิ้น',
  `user_id` int(11) NOT NULL COMMENT 'รหัสUser',
  `color` varchar(255) NOT NULL COMMENT 'สี',
  `made_price` double(10,2) NOT NULL COMMENT 'ราคา',
  `datetime` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'เวลา',
  `size` varchar(255) NOT NULL COMMENT 'ขนาด',
  `details` text NOT NULL COMMENT 'รายละเอียด',
  `status` varchar(255) NOT NULL COMMENT 'สถานะ',
  `made_qty` int(11) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_orders`
--

INSERT INTO `made_orders` (`id`, `made_id`, `blue_id`, `user_id`, `color`, `made_price`, `datetime`, `size`, `details`, `status`, `made_qty`) VALUES
(1, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 1, 'สีดำ', 8910.00, '2023-02-18 15:00:00', 'มารตฐาน', '150*50 CM', 'success', 2),
(2, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 1, 'สีดำ', 4455.00, '2023-03-02 20:30:18', 'ใหญ่', '400*200', 'rejected', 1);

-- --------------------------------------------------------

--
-- Table structure for table `made_order_details`
--

CREATE TABLE `made_order_details` (
  `id` int(11) NOT NULL,
  `made_id` varchar(255) NOT NULL,
  `blue_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `MD_price` double(10,2) NOT NULL,
  `MD_Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_order_details`
--

INSERT INTO `made_order_details` (`id`, `made_id`, `blue_id`, `item_id`, `MD_price`, `MD_Qty`) VALUES
(1, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 14, 600.00, 2),
(2, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 20, 600.00, 2),
(3, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 25, 600.00, 2),
(4, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 24, 600.00, 2),
(5, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 27, 600.00, 2),
(6, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 28, 600.00, 2),
(7, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 21, 600.00, 2),
(8, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 26, 600.00, 2),
(9, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 29, 520.00, 4),
(10, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 30, 360.00, 8),
(11, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 31, 280.00, 2),
(12, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 32, 70.00, 2),
(13, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 33, 240.00, 16),
(14, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 34, 640.00, 16),
(15, 'ee1f4ba4-1b19-4004-98c7-fae2f19ed5ce', 2, 35, 2000.00, 4),
(16, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 14, 300.00, 1),
(17, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 20, 300.00, 1),
(18, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 25, 300.00, 1),
(19, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 24, 300.00, 1),
(20, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 27, 300.00, 1),
(21, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 28, 300.00, 1),
(22, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 21, 300.00, 1),
(23, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 26, 300.00, 1),
(24, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 29, 260.00, 2),
(25, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 30, 180.00, 4),
(26, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 31, 140.00, 1),
(27, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 32, 35.00, 1),
(28, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 33, 120.00, 8),
(29, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 34, 320.00, 8),
(30, '73f867de-1859-4ac6-948f-01e3fe4ca262', 2, 35, 1000.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `made_request`
--

CREATE TABLE `made_request` (
  `mr_id` int(11) NOT NULL,
  `made_id` varchar(255) NOT NULL,
  `m_status` varchar(255) NOT NULL,
  `m_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `subtotal`, `user_id`, `datetime`, `status`) VALUES
('3825f8dc-472c-4e2c-b259-81a37c624e3b', 11000.00, 2, '2023-01-15 13:23:18', 'finish'),
('630361e1-6d73-49cf-8cef-372a5539dead', 5400.00, 5, '2023-01-22 16:12:53', 'NULL'),
('7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 13000.00, 1, '2023-01-22 19:52:52', 'in process'),
('9b99b6d3-ec25-4000-b4c6-ab779258aa1d', 45500.00, 1, '2023-01-22 14:10:33', 'finish'),
('a2edd3be-bc91-484d-8768-fe3cca825d5b', 7000.00, 1, '2023-01-15 18:42:28', 'NULL'),
('ba1585b3-2191-4109-8b35-46eca1f061e1', 3500.00, 6, '2023-02-05 16:58:58', 'NULL'),
('babcce12-a7aa-4426-91bb-a665e0e2d6bc', 11000.00, 2, '2023-01-15 13:22:44', 'success'),
('becc32dd-6e77-42cd-b56e-7d0b2bd0d753', 7500.00, 1, '2023-01-15 14:02:53', 'success'),
('c5368461-8448-4730-937f-19744dc60dcc', 3000.00, 1, '2023-01-22 19:53:17', 'rejected'),
('c8b47258-866c-4a44-8fc3-7da9e582f546', 5200.00, 6, '2023-02-05 16:59:20', 'in process'),
('cb76a249-72f7-40ec-88a8-5ae0d09ef306', 3500.00, 6, '2023-02-05 16:59:49', 'in process'),
('d326fb90-1f33-4a54-82dc-56ae934caee2', 17000.00, 6, '2023-02-05 17:05:34', 'NULL'),
('e85f6230-43cb-407c-8036-9dd5ff9728c1', 5500.00, 3, '2023-01-15 19:06:34', 'finish'),
('edede0c4-2ed2-419c-9f7a-14d1c3b36a56', 10500.00, 1, '2023-01-15 14:02:37', 'rejected'),
('ffb8a80c-e93c-425a-a917-b8e09b57f68e', 17000.00, 6, '2023-02-05 16:58:24', 'in process');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `item_price`, `quantity`) VALUES
(1, 'babcce12-a7aa-4426-91bb-a665e0e2d6bc', 7, 4500.00, 1),
(2, 'babcce12-a7aa-4426-91bb-a665e0e2d6bc', 9, 4000.00, 1),
(3, 'babcce12-a7aa-4426-91bb-a665e0e2d6bc', 11, 2500.00, 1),
(4, '3825f8dc-472c-4e2c-b259-81a37c624e3b', 8, 3500.00, 1),
(5, '3825f8dc-472c-4e2c-b259-81a37c624e3b', 7, 4500.00, 1),
(6, '3825f8dc-472c-4e2c-b259-81a37c624e3b', 4, 1500.00, 2),
(7, 'edede0c4-2ed2-419c-9f7a-14d1c3b36a56', 3, 4000.00, 2),
(8, 'edede0c4-2ed2-419c-9f7a-14d1c3b36a56', 1, 2500.00, 1),
(9, 'becc32dd-6e77-42cd-b56e-7d0b2bd0d753', 8, 3500.00, 1),
(10, 'becc32dd-6e77-42cd-b56e-7d0b2bd0d753', 5, 4000.00, 1),
(11, 'a2edd3be-bc91-484d-8768-fe3cca825d5b', 8, 3500.00, 1),
(12, 'a2edd3be-bc91-484d-8768-fe3cca825d5b', 2, 3500.00, 1),
(13, 'e85f6230-43cb-407c-8036-9dd5ff9728c1', 4, 1500.00, 1),
(14, 'e85f6230-43cb-407c-8036-9dd5ff9728c1', 9, 4000.00, 1),
(15, '9b99b6d3-ec25-4000-b4c6-ab779258aa1d', 3, 4000.00, 7),
(16, '9b99b6d3-ec25-4000-b4c6-ab779258aa1d', 8, 3500.00, 5),
(17, '630361e1-6d73-49cf-8cef-372a5539dead', 6, 2700.00, 2),
(18, '7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 8, 3500.00, 3),
(19, '7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 1, 2500.00, 1),
(20, 'c5368461-8448-4730-937f-19744dc60dcc', 4, 1500.00, 2),
(21, 'ffb8a80c-e93c-425a-a917-b8e09b57f68e', 3, 4000.00, 3),
(22, 'ffb8a80c-e93c-425a-a917-b8e09b57f68e', 1, 2500.00, 2),
(23, 'ba1585b3-2191-4109-8b35-46eca1f061e1', 2, 3500.00, 1),
(24, 'c8b47258-866c-4a44-8fc3-7da9e582f546', 11, 2500.00, 1),
(25, 'c8b47258-866c-4a44-8fc3-7da9e582f546', 6, 2700.00, 1),
(26, 'cb76a249-72f7-40ec-88a8-5ae0d09ef306', 10, 3500.00, 1),
(27, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 5, 4000.00, 1),
(28, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 2, 3500.00, 1),
(29, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 8, 3500.00, 1),
(30, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 2, 3500.00, 1),
(31, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 1, 2500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_request`
--

CREATE TABLE `order_request` (
  `r_id` int(11) NOT NULL COMMENT 'ไอดีขอยกเลิก',
  `order_id` varchar(255) NOT NULL COMMENT 'ไอดีออเดอร์',
  `r_status` varchar(255) NOT NULL COMMENT 'สถานะขอยกเลิก',
  `details` text NOT NULL COMMENT 'สาเหตุการยกเลิก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_request`
--

INSERT INTO `order_request` (`r_id`, `order_id`, `r_status`, `details`) VALUES
(1, '7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 'request', 'ไม่มีเงินจ่ายครับ'),
(3, 'ffb8a80c-e93c-425a-a917-b8e09b57f68e', 'request', 'จะใช้ตังครับ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_qty`) VALUES
(1, 1, 'ประตูบานเปิด2บาน', 2700.00, './assets/products/1932121537.png', '2023-02-05 06:03:10', 995),
(2, 1, 'ประตูบานเลื่อนพร้อมมุ้ง', 3500.00, './assets/products/194093167.png', '2022-10-16 09:57:32', 996),
(3, 1, 'ประตูบานเลื่อนพร้อมกระจกอบ', 4000.00, './assets/products/1214940040.png', '2022-10-06 07:51:31', 989),
(4, 3, 'โต้ะขาพับได้', 1500.00, './assets/products/791566596.png', '2022-10-06 07:53:20', 997),
(5, 3, 'โต้ะอลูมิเนียมสี่ขา', 4000.00, './assets/products/2030549104.png', '2022-10-06 07:54:04', 998),
(6, 3, 'โต๊ะอลูมินียม1ขา', 2700.00, './assets/products/341981276.png', '2022-10-06 07:55:01', 996),
(7, 2, 'หน้าต่างบานเลื่อนกระจกอบ', 4500.00, './assets/products/1374706357.png', '2022-10-06 07:56:44', 999),
(8, 2, 'หน้าต่างบานเลื่อนกระจกเงา', 3500.00, './assets/products/1215239920.png', '2022-10-06 07:57:51', 990),
(9, 2, 'หน้าต่างบานเปิด', 4000.00, './assets/products/271663216.png', '2022-10-06 07:58:41', 999),
(10, 1, 'ประตูบานเปิดมือเดียว', 3500.00, './assets/products/404478385.png', '2022-10-07 11:38:10', 998),
(11, 3, 'โต๊ะปิกนิก', 2500.00, './assets/products/1832267164.png', '2022-10-07 11:57:01', 998),
(14, 5, 'กล่องเรียบ', 980.00, './assets/products/660721803.png', '2023-02-05 05:42:00', 999),
(15, 5, 'เสาบนสวิง', 1200.00, './assets/products/758554432.png', '2023-02-05 06:07:24', 999),
(16, 5, 'เสาล่างสวิง', 1200.00, './assets/products/1310258870.png', '2023-02-05 06:08:17', 999),
(17, 5, 'ธรณีสวิง', 1100.00, './assets/products/1173711610.png', '2023-02-06 09:33:31', 999),
(18, 5, 'เสาข้างสวิง', 1250.00, './assets/products/2190999.png', '2023-02-06 09:41:22', 999),
(19, 6, 'รีเวท', 130.00, './assets/products/1515064033.jpg', '2023-02-11 05:51:37', 500),
(20, 5, 'เฟรมบน', 630.00, './assets/products/505247154.png', '2023-02-11 05:51:50', 999),
(21, 5, 'เสากุญแจ', 620.00, './assets/products/1941792796.png', '2023-02-11 02:52:25', 999),
(22, 5, 'กรอบนอก', 700.00, './assets/products/908035116.png', '2023-02-11 02:56:22', 999),
(23, 5, 'คิ้วบานกระทุ้ง', 260.00, './assets/products/924279762.png', '2023-02-11 05:42:47', 999),
(24, 5, 'เฟรมล่าง', 640.00, './assets/products/1533786506.png', '2023-02-11 05:52:15', 999),
(25, 5, 'เฟรมข้าง', 500.00, './assets/products/210104872.png', '2023-02-11 05:48:39', 999),
(26, 5, 'เสาเกี่ยว', 650.00, './assets/products/510342548.png', '2023-02-11 05:50:08', 999),
(27, 5, 'ขวางบน', 250.00, './assets/products/131274843.png', '2023-02-12 11:35:48', 999),
(28, 5, 'ขวางล่าง', 350.00, './assets/products/316758880.png', '2023-02-12 11:35:30', 999),
(29, 7, 'มือจับล็อค', 130.00, './assets/products/112592465.png', '2023-02-12 01:35:47', 999),
(30, 6, 'ล้อบานเลื่อน', 45.00, './assets/products/1138332628.png', '2023-02-12 01:35:05', 999),
(31, 6, 'ยางหุ้ม', 140.00, './assets/products/659569350.png', '2023-02-12 12:29:46', 999),
(32, 6, 'สักหลาดบานเลื่อน', 35.00, './assets/products/323669260.png', '2023-02-12 12:39:12', 500),
(33, 6, 'น้อต 3 หุน', 15.00, './assets/products/2028419104.png', '2023-02-12 12:42:39', 999),
(34, 6, 'น้อต 1/2 นิ้ว', 40.00, './assets/products/745852921.png', '2023-02-12 12:47:14', 999),
(35, 6, 'กระจก', 800.00, './assets/products/282990825.png', '2023-02-12 01:07:43', 500);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `producttype_id` int(11) NOT NULL COMMENT 'ไอดีประเภทสินค้า',
  `productbrand` varchar(255) NOT NULL COMMENT 'ประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`producttype_id`, `productbrand`) VALUES
(1, 'ประตู'),
(2, 'หน้าต่าง'),
(3, 'โต๊ะ'),
(4, 'เก้าอี้'),
(5, 'อลูมิเนียม'),
(6, 'เบ็ดเตล็ด'),
(7, 'มือจับ');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_name`) VALUES
(1, 'รายงานสต๊อกสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `report_details`
--

CREATE TABLE `report_details` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_details`
--

INSERT INTO `report_details` (`id`, `report_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'รหัสลูกค้า',
  `fullname` varchar(255) NOT NULL COMMENT 'ชื่อพร้อมนามสกุล',
  `address` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `username` varchar(255) NOT NULL COMMENT 'ียูเซอร์เนม',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `address`, `username`, `password`) VALUES
(1, 'Suphakron Singha', 'romklao12 306/15 minburi 10510', 'zlpetlz', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Petch Singha', 'London paris ', 'RedLeafz', 'f398499fab547340e0e2bfcfa3fb1836'),
(3, 'Gowthana', 'Kasembundit University', 'Gow', '25f9e794323b453885f5181f1b624d0b'),
(5, 'Lexy neim', 'Address_1', 'Lexler', '7488e331b8b64e5794da3fa4eb10ad5d'),
(6, 'Suphakron panjaiyen', 'England', 'ART', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blueprint`
--
ALTER TABLE `blueprint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blueprint_material`
--
ALTER TABLE `blueprint_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `made_orders`
--
ALTER TABLE `made_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `made_order_details`
--
ALTER TABLE `made_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `made_request`
--
ALTER TABLE `made_request`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_request`
--
ALTER TABLE `order_request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`producttype_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blueprint`
--
ALTER TABLE `blueprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blueprint_material`
--
ALTER TABLE `blueprint_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `made_orders`
--
ALTER TABLE `made_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `made_order_details`
--
ALTER TABLE `made_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `made_request`
--
ALTER TABLE `made_request`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_request`
--
ALTER TABLE `order_request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีขอยกเลิก', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภทสินค้า', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
