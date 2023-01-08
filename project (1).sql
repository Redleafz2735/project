-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 05:51 PM
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
(1, 'AdminPetch', 'Devpetch', 'e10adc3949ba59abbe56e057f20f883e');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `itemqty`) VALUES
(40, 1, 10, 1),
(41, 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `customer_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `made_order`
--

CREATE TABLE `made_order` (
  `made_id` int(11) NOT NULL,
  `made_price` double(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `made_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_order`
--

INSERT INTO `made_order` (`made_id`, `made_price`, `user_id`, `made_type`) VALUES
(1, 4000.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `made_order_deteils`
--

CREATE TABLE `made_order_deteils` (
  `id` int(11) NOT NULL,
  `made_id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `equidment` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_order_deteils`
--

INSERT INTO `made_order_deteils` (`id`, `made_id`, `size`, `equidment`, `color`) VALUES
(1, 1, '135*90', 'อลูมิเนียมอบ', 'ขาว');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `subtotal`, `user_id`, `datetime`) VALUES
(1, 7000.00, 1, '2023-01-04 23:46:55'),
(2, 6500.00, 2, '2023-01-04 23:46:55'),
(3, 6200.00, 1, '2023-01-04 23:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `title`, `item_price`, `quantity`) VALUES
(1, 1, 2, 'ประตูบานเลื่อนพร้อมมุ้ง', 3500.00, 1),
(2, 1, 8, 'หน้าต่างบานเลื่อนกระจกเงา', 3500.00, 1),
(3, 2, 1, 'ประตูบานเปิด2บาน', 2500.00, 1),
(4, 2, 3, 'ประตูบานเลื่อนพร้อมกระจกอบ', 4000.00, 1);

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
(1, 1, 'ประตูบานเปิด2บาน', 2500.00, './assets/products/1932121537.png', '2022-10-16 10:15:44', 3),
(2, 1, 'ประตูบานเลื่อนพร้อมมุ้ง', 3500.00, './assets/products/194093167.png', '2022-10-16 09:57:32', 2),
(3, 1, 'ประตูบานเลื่อนพร้อมกระจกอบ', 4000.00, './assets/products/1214940040.png', '2022-10-06 07:51:31', 1),
(4, 3, 'โต้ะขาพับได้', 1500.00, './assets/products/791566596.png', '2022-10-06 07:53:20', 1),
(5, 3, 'โต้ะอลูมิเนียมสี่ขา', 4000.00, './assets/products/2030549104.png', '2022-10-06 07:54:04', 1),
(6, 3, 'โต๊ะอลูมินียม1ขา', 2700.00, './assets/products/341981276.png', '2022-10-06 07:55:01', 1),
(7, 2, 'หน้าต่างบานเลื่อนกระจกอบ', 4500.00, './assets/products/1374706357.png', '2022-10-06 07:56:44', 2),
(8, 2, 'หน้าต่างบานเลื่อนกระจกเงา', 3500.00, './assets/products/1215239920.png', '2022-10-06 07:57:51', 3),
(9, 2, 'หน้าต่างบานเปิด', 4000.00, './assets/products/271663216.png', '2022-10-06 07:58:41', 2),
(10, 1, 'ประตูบานเปิดมือเดียว', 3500.00, './assets/products/404478385.png', '2022-10-07 11:38:10', 1),
(11, 3, 'โต๊ะปิกนิก', 2500.00, './assets/products/1832267164.png', '2022-10-07 11:57:01', 2);

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
(4, 'เก้าอี้');

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
(3, 'Gowthana', 'Kasembundit University', 'Gow', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `made_order`
--
ALTER TABLE `made_order`
  ADD PRIMARY KEY (`made_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภทสินค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
