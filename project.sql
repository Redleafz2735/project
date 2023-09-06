-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 09:39 AM
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
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"project\",\"table\":\"product_details\"},{\"db\":\"project\",\"table\":\"cart\"},{\"db\":\"project\",\"table\":\"product\"},{\"db\":\"project\",\"table\":\"product_colors\"},{\"db\":\"project\",\"table\":\"product_size\"},{\"db\":\"project\",\"table\":\"product_image\"},{\"db\":\"project\",\"table\":\"blueprint\"},{\"db\":\"project\",\"table\":\"material_caculate_type\"},{\"db\":\"project\",\"table\":\"blueprint_material\"},{\"db\":\"project\",\"table\":\"made_orders\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-04-07 03:33:02', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `admincart`
--

CREATE TABLE `admincart` (
  `A_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `A_qty` int(11) NOT NULL,
  `A_price` double(10,2) NOT NULL,
  `A_colors` int(11) NOT NULL,
  `A_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admincart`
--

INSERT INTO `admincart` (`A_id`, `admin_id`, `company_id`, `item_id`, `A_qty`, `A_price`, `A_colors`, `A_size`) VALUES
(1, 1, 1, 14, 1, 980.00, 1, 1),
(2, 1, 2, 15, 1, 1200.00, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminorders`
--

CREATE TABLE `adminorders` (
  `id` int(11) NOT NULL,
  `adminorders_id` varchar(255) NOT NULL,
  `admintotal` double(10,2) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminorders`
--

INSERT INTO `adminorders` (`id`, `adminorders_id`, `admintotal`, `admin_id`, `admin_datetime`, `admin_status`) VALUES
(1, 'f9a508b5-d548-48d6-9791-c3e992adac68', 14650.00, 1, '2023-03-15 22:55:01', 'in process'),
(2, 'e6663220-4eb2-4599-9fdf-5908bdf9b0b1', 7840.00, 1, '2023-03-21 21:55:07', 'success'),
(3, '883f1d6d-fab9-46bc-87f6-d3f254ec8975', 4900.00, 1, '2023-03-21 21:57:25', 'success'),
(4, '24bc080b-8613-48f6-9d00-7f85cc1d0031', 9700.00, 1, '2023-03-21 22:01:26', 'success'),
(5, 'c366fed2-8165-4f22-b0cd-9619f72546be', 6250.00, 1, '2023-03-21 22:04:11', 'success'),
(6, '86f151e1-3e99-4682-b9be-32227e16fa61', 5500.00, 1, '2023-03-21 22:08:43', 'success'),
(7, '77b81f36-bfc3-41a7-9bff-8d3dac778857', 3920.00, 1, '2023-03-21 22:11:20', 'success'),
(8, '2b66070b-e604-4220-ae5f-9c6b390ff597', 2480.00, 1, '2023-03-21 22:13:01', 'NULL'),
(9, '5f896bb8-7b0e-4eb7-9b44-e70b72747db5', 338060.00, 1, '2023-04-12 09:14:11', 'NULL'),
(10, '7810a67b-7210-49ed-9c91-7337d0418c53', 3920.00, 1, '2023-04-19 11:17:37', 'NULL'),
(11, 'f2612979-3f28-4608-bedd-3ad570f072e7', 195000.00, 1, '2023-04-19 11:50:29', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `adminorders_details`
--

CREATE TABLE `adminorders_details` (
  `id` int(11) NOT NULL,
  `adminorders_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `Admin_price` double(10,2) NOT NULL,
  `Admin_Qty` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `D_colors` varchar(255) NOT NULL,
  `D_size` varchar(255) NOT NULL,
  `D_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminorders_details`
--

INSERT INTO `adminorders_details` (`id`, `adminorders_id`, `item_id`, `Admin_price`, `Admin_Qty`, `company_id`, `D_colors`, `D_size`, `D_qty`) VALUES
(1, 'f9a508b5-d548-48d6-9791-c3e992adac68', 14, 5880.00, 6, 1, 'สีดำ', 'TEST', 0),
(2, 'f9a508b5-d548-48d6-9791-c3e992adac68', 18, 6250.00, 5, 1, 'สีดำ', 'TEST', 0),
(3, 'f9a508b5-d548-48d6-9791-c3e992adac68', 20, 2520.00, 4, 1, 'สีดำ', 'TEST', 0),
(4, 'e6663220-4eb2-4599-9fdf-5908bdf9b0b1', 14, 4900.00, 5, 1, 'สีดำ', 'TEST', 0),
(5, 'e6663220-4eb2-4599-9fdf-5908bdf9b0b1', 14, 2940.00, 3, 1, 'สีดำ', 'TEST', 0),
(6, '883f1d6d-fab9-46bc-87f6-d3f254ec8975', 14, 4900.00, 5, 2, 'สีดำ', 'TEST', 0),
(7, '24bc080b-8613-48f6-9d00-7f85cc1d0031', 14, 4900.00, 5, 1, 'สีดำ', 'TEST', 0),
(8, '24bc080b-8613-48f6-9d00-7f85cc1d0031', 15, 4800.00, 4, 1, 'สีดำ', 'TEST', 0),
(9, 'c366fed2-8165-4f22-b0cd-9619f72546be', 18, 6250.00, 5, 1, 'สีดำ', 'TEST', 0),
(10, '86f151e1-3e99-4682-b9be-32227e16fa61', 17, 5500.00, 5, 1, 'สีดำ', 'TEST', 0),
(11, '77b81f36-bfc3-41a7-9bff-8d3dac778857', 14, 3920.00, 4, 1, 'สีดำ', 'TEST', 0),
(12, '2b66070b-e604-4220-ae5f-9c6b390ff597', 21, 2480.00, 4, 2, 'สีดำ', 'TEST', 0),
(13, '5f896bb8-7b0e-4eb7-9b44-e70b72747db5', 14, 6860.00, 7, 1, 'สีดำ', 'TEST', 0),
(14, '5f896bb8-7b0e-4eb7-9b44-e70b72747db5', 15, 1200.00, 1, 1, 'สีดำ', 'TEST', 0),
(15, '5f896bb8-7b0e-4eb7-9b44-e70b72747db5', 14, 330000.00, 300, 1, 'สีดำ', 'TEST', 0),
(16, '7810a67b-7210-49ed-9c91-7337d0418c53', 14, 3920.00, 4, 1, 'สีดำ', '1.0 มิล', 0),
(17, 'f2612979-3f28-4608-bedd-3ad570f072e7', 14, 195000.00, 150, 1, 'สีขาว', '1.5 มิล', 99);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `A_fullname` varchar(255) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `username` varchar(255) NOT NULL COMMENT 'Username',
  `password` varchar(255) NOT NULL COMMENT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `A_fullname`, `username`, `password`) VALUES
(1, 'Admin', 'Devpetch', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `blueprint`
--

CREATE TABLE `blueprint` (
  `id` int(11) NOT NULL,
  `blue_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `b_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blueprint`
--

INSERT INTO `blueprint` (`id`, `blue_id`, `name`, `picture`, `b_status`) VALUES
(1, '1', 'ประตูบานสวิง', './assets/Door.png', 'ready'),
(2, '2', 'หน้าต่างบานเลื่อน', './assets/Door.png', 'NOT'),
(3, '3', 'หน้าต่างบานกระทุ้ง', './assets/Door.png', 'NOT'),
(4, '8e7ec622-1ed6-4f82-88f5-0a541192596c', 'ประตูบานเลื่อน', './assets/755354111.jpg', 'NOT');

-- --------------------------------------------------------

--
-- Table structure for table `blueprint_material`
--

CREATE TABLE `blueprint_material` (
  `id` int(11) NOT NULL,
  `blue_id` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `M_Qty` double(10,2) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blueprint_material`
--

INSERT INTO `blueprint_material` (`id`, `blue_id`, `item_id`, `M_Qty`, `type_id`) VALUES
(1, '2', 14, 1.00, 1),
(2, '2', 20, 1.00, 1),
(3, '2', 25, 1.00, 1),
(4, '2', 24, 1.00, 1),
(5, '2', 27, 1.00, 1),
(6, '2', 28, 1.00, 1),
(7, '2', 21, 1.00, 1),
(8, '2', 26, 1.00, 1),
(9, '2', 29, 2.00, 1),
(10, '2', 30, 4.00, 1),
(11, '2', 31, 1.00, 1),
(12, '2', 32, 1.00, 1),
(13, '2', 33, 8.00, 1),
(14, '2', 34, 8.00, 1),
(15, '2', 35, 2.00, 1),
(16, '1', 14, 1.00, 1),
(17, '1', 18, 2.00, 2),
(18, '1', 15, 1.00, 3),
(19, '1', 16, 1.00, 3),
(20, '1', 17, 1.00, 3),
(21, '1', 36, 1.00, 3),
(29, '3', 14, 1.00, 1),
(30, '3', 22, 1.00, 1),
(31, '3', 23, 1.00, 1),
(32, '3', 33, 8.00, 1),
(33, '3', 41, 1.00, 1),
(34, '3', 35, 1.00, 1),
(35, '3', 43, 1.00, 1),
(36, '3', 44, 2.00, 1),
(37, '3', 45, 2.00, 1),
(40, '8e7ec622-1ed6-4f82-88f5-0a541192596c', 14, 2.00, 1),
(41, '8e7ec622-1ed6-4f82-88f5-0a541192596c', 20, 1.00, 1),
(43, '1', 46, 1.00, 3),
(44, '1', 47, 2.00, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `itemqty` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `colors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `itemqty`, `size`, `colors`) VALUES
(1, 1, 25, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_image`) VALUES
(1, 'บริษัท.โชคชัยจำกัด', './assets/company.png'),
(2, 'บริษัท.นำชัยจำกัด', './assets/company1.png'),
(3, 'บริษัท.อัตระนิยมจำกัด', './assets/company2.png');

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
  `width` varchar(255) NOT NULL COMMENT 'กว้าง',
  `height` varchar(255) NOT NULL COMMENT 'ยาว',
  `status` varchar(255) NOT NULL COMMENT 'สถานะ',
  `made_qty` int(11) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_orders`
--

INSERT INTO `made_orders` (`id`, `made_id`, `blue_id`, `user_id`, `color`, `made_price`, `datetime`, `width`, `height`, `status`, `made_qty`) VALUES
(1, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 1, 'สีขาว', 4320.00, '2023-03-16 01:59:24', '300', '200', 'success', 1),
(2, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 1, 'สีดำ', 4007.66, '2023-03-19 17:53:14', '100', '200', 'in process', 1),
(3, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 1, 'สีขาว', 4742.83, '2023-03-19 23:46:08', '150', '200', 'NULL', 1),
(4, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 1, 'สีขาว', 5478.00, '2023-03-21 02:52:04', '200', '200', 'Acept', 1),
(5, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 15, 'สีดำ', 3507.66, '2023-03-21 21:10:00', '100', '200', 'rejected', 1),
(6, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 15, 'สีดำ', 3507.66, '2023-03-21 21:16:37', '100', '200', 'rejected', 1),
(7, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 15, 'สีดำ', 3507.66, '2023-03-21 21:20:22', '100', '200', 'rejected', 1),
(8, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 15, 'สีขาว', 3507.66, '2023-03-21 21:22:20', '100', '200', 'in process', 1);

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
  `MD_Qty` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `made_order_details`
--

INSERT INTO `made_order_details` (`id`, `made_id`, `blue_id`, `item_id`, `MD_price`, `MD_Qty`) VALUES
(1, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 14, 392.00, 1.00),
(2, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 18, 500.00, 1.00),
(3, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 15, 480.00, 1.00),
(4, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 16, 480.00, 1.00),
(5, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 17, 440.00, 1.00),
(6, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 36, 588.00, 1.00),
(7, 'c7584a1f-eb62-4c47-a392-f8d4776cb745', 1, 35, 320.00, 1.00),
(8, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 14, 653.33, 4.00),
(9, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 18, 416.67, 4.00),
(10, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 15, 200.00, 1.00),
(11, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 16, 200.00, 1.00),
(12, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 17, 183.33, 1.00),
(13, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 36, 133.33, 1.00),
(14, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 46, 245.00, 1.00),
(15, '07b3f5cc-f649-4d98-9b43-83f24a93b1b1', 1, 47, 276.00, 12.00),
(16, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 14, 653.33, 4.00),
(17, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 18, 625.00, 4.00),
(18, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 15, 300.00, 1.50),
(19, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 16, 300.00, 1.50),
(20, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 17, 275.00, 1.50),
(21, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 36, 200.00, 1.50),
(22, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 46, 367.50, 1.50),
(23, 'e77871b6-6c3b-462a-a314-e40fc54ec2af', 1, 47, 322.00, 14.00),
(24, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 14, 653.33, 4.00),
(25, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 18, 833.33, 4.00),
(26, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 15, 400.00, 2.00),
(27, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 16, 400.00, 2.00),
(28, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 17, 366.67, 2.00),
(29, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 36, 266.67, 2.00),
(30, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 46, 490.00, 2.00),
(31, '3bf8ed35-fd65-4ab0-aab4-1d74f6558020', 1, 47, 368.00, 16.00),
(32, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 14, 653.33, 4.00),
(33, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 18, 416.67, 4.00),
(34, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 15, 200.00, 1.00),
(35, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 16, 200.00, 1.00),
(36, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 17, 183.33, 1.00),
(37, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 36, 133.33, 1.00),
(38, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 46, 245.00, 1.00),
(39, '12365ab7-db51-4505-a7a5-4ef814c29ed6', 1, 47, 276.00, 12.00),
(40, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 14, 653.33, 4.00),
(41, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 18, 416.67, 4.00),
(42, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 15, 200.00, 1.00),
(43, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 16, 200.00, 1.00),
(44, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 17, 183.33, 1.00),
(45, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 36, 133.33, 1.00),
(46, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 46, 245.00, 1.00),
(47, '0f6a961d-8cf7-48b2-9379-87695639d4f6', 1, 47, 276.00, 12.00),
(48, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 14, 653.33, 4.00),
(49, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 18, 416.67, 4.00),
(50, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 15, 200.00, 1.00),
(51, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 16, 200.00, 1.00),
(52, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 17, 183.33, 1.00),
(53, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 36, 133.33, 1.00),
(54, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 46, 245.00, 1.00),
(55, '2055aa81-e392-4008-b0d1-e42621a2f3a8', 1, 47, 276.00, 12.00),
(56, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 14, 653.33, 4.00),
(57, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 18, 416.67, 4.00),
(58, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 15, 200.00, 1.00),
(59, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 16, 200.00, 1.00),
(60, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 17, 183.33, 1.00),
(61, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 36, 133.33, 1.00),
(62, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 46, 245.00, 1.00),
(63, 'c7bffeab-801a-4689-be12-64792d7eabd5', 1, 47, 276.00, 12.00);

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
-- Table structure for table `material_caculate_type`
--

CREATE TABLE `material_caculate_type` (
  `id` int(11) NOT NULL,
  `Value` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_caculate_type`
--

INSERT INTO `material_caculate_type` (`id`, `Value`) VALUES
(1, 'ยาว*2'),
(2, 'ยาว'),
(3, 'กว้าง'),
(4, '(กว้าง*ยาว)*4'),
(5, '(กว้าง*2+ยาว*2)*2'),
(7, 'กว้าง*ยาว*3');

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
('052599ee-03ea-47f0-847d-1271cea1e879', 40000.00, 1, '2023-03-22 13:30:58', 'NULL'),
('13d7c51b-f8ad-4377-ae0a-2652a739d5ab', 550000.00, 1, '2023-03-22 13:34:24', 'NULL'),
('265d78a2-815f-4439-8a4b-3956dca85769', 11500.00, 15, '2023-03-21 20:00:52', 'success'),
('3825f8dc-472c-4e2c-b259-81a37c624e3b', 11000.00, 2, '2023-01-15 13:23:18', 'finish'),
('630361e1-6d73-49cf-8cef-372a5539dead', 5400.00, 5, '2023-01-22 16:12:53', 'in process'),
('7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 13000.00, 1, '2023-01-22 19:52:52', 'in process'),
('9b99b6d3-ec25-4000-b4c6-ab779258aa1d', 45500.00, 1, '2023-01-22 14:10:33', 'finish'),
('9f39dc1a-5328-4f61-8f0d-38a407a4ae5c', 2940.00, 1, '2023-04-12 09:17:18', 'NULL'),
('a2edd3be-bc91-484d-8768-fe3cca825d5b', 7000.00, 1, '2023-01-15 18:42:28', 'NULL'),
('ba1585b3-2191-4109-8b35-46eca1f061e1', 3500.00, 6, '2023-02-05 16:58:58', 'NULL'),
('babcce12-a7aa-4426-91bb-a665e0e2d6bc', 11000.00, 2, '2023-01-15 13:22:44', 'success'),
('becc32dd-6e77-42cd-b56e-7d0b2bd0d753', 7500.00, 1, '2023-01-15 14:02:53', 'success'),
('c2a0099e-6e60-4c8d-b156-d527939b3dff', 550000.00, 1, '2023-03-22 13:33:26', 'NULL'),
('c5368461-8448-4730-937f-19744dc60dcc', 3000.00, 1, '2023-01-22 19:53:17', 'rejected'),
('c8b47258-866c-4a44-8fc3-7da9e582f546', 5200.00, 6, '2023-02-05 16:59:20', 'in process'),
('cb76a249-72f7-40ec-88a8-5ae0d09ef306', 3500.00, 6, '2023-02-05 16:59:49', 'in process'),
('d326fb90-1f33-4a54-82dc-56ae934caee2', 17000.00, 6, '2023-02-05 17:05:34', 'in process'),
('e2c59ae5-0da8-4c87-a59c-c20fda6c54ac', 4400.00, 1, '2023-03-22 13:34:43', 'NULL'),
('e2efa00b-ea77-44cb-a21d-1b2ae6a65a79', 5880.00, 1, '2023-03-13 01:03:01', 'NULL'),
('e85f6230-43cb-407c-8036-9dd5ff9728c1', 5500.00, 3, '2023-01-15 19:06:34', 'finish'),
('edede0c4-2ed2-419c-9f7a-14d1c3b36a56', 10500.00, 1, '2023-01-15 14:02:37', 'rejected'),
('fcc7f20f-6838-4464-b784-6407a7d8401a', 3220.00, 1, '2023-03-14 13:29:18', 'rejected'),
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
(31, 'd326fb90-1f33-4a54-82dc-56ae934caee2', 1, 2500.00, 1),
(32, 'e2efa00b-ea77-44cb-a21d-1b2ae6a65a79', 14, 980.00, 6),
(33, 'fcc7f20f-6838-4464-b784-6407a7d8401a', 23, 260.00, 2),
(34, 'fcc7f20f-6838-4464-b784-6407a7d8401a', 1, 2700.00, 1),
(35, '265d78a2-815f-4439-8a4b-3956dca85769', 11, 2500.00, 3),
(36, '265d78a2-815f-4439-8a4b-3956dca85769', 9, 4000.00, 1),
(37, '052599ee-03ea-47f0-847d-1271cea1e879', 9, 4000.00, 10),
(38, 'c2a0099e-6e60-4c8d-b156-d527939b3dff', 17, 1100.00, 500),
(39, '13d7c51b-f8ad-4377-ae0a-2652a739d5ab', 17, 1100.00, 500),
(40, 'e2c59ae5-0da8-4c87-a59c-c20fda6c54ac', 17, 1100.00, 4),
(41, '9f39dc1a-5328-4f61-8f0d-38a407a4ae5c', 14, 980.00, 3);

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
(3, 'ffb8a80c-e93c-425a-a917-b8e09b57f68e', 'request', 'จะใช้ตังครับ'),
(5, '7431cf0d-9441-42e9-8aec-fbec7b1e5ab0', 'request', 'ขอยกเลิก');

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
  `item_qty` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_qty`) VALUES
(1, 1, 'ประตูบานเปิด2บาน', 2700.00, './assets/products/1932121537.png', '2023-02-05 06:03:10', 994.00),
(2, 1, 'ประตูบานเลื่อนพร้อมมุ้ง', 3500.00, './assets/products/194093167.png', '2022-10-16 09:57:32', 996.00),
(3, 1, 'ประตูบานเลื่อนพร้อมกระจกอบ', 4000.00, './assets/products/1214940040.png', '2022-10-06 07:51:31', 989.00),
(4, 3, 'โต้ะขาพับได้', 1500.00, './assets/products/791566596.png', '2022-10-06 07:53:20', 997.00),
(5, 3, 'โต้ะอลูมิเนียมสี่ขา', 4000.00, './assets/products/2030549104.png', '2022-10-06 07:54:04', 998.00),
(6, 3, 'โต๊ะอลูมินียม1ขา', 2700.00, './assets/products/341981276.png', '2022-10-06 07:55:01', 996.00),
(7, 2, 'หน้าต่างบานเลื่อนกระจกอบ', 4500.00, './assets/products/1374706357.png', '2022-10-06 07:56:44', 999.00),
(8, 2, 'หน้าต่างบานเลื่อนกระจกเงา', 3500.00, './assets/products/1215239920.png', '2022-10-06 07:57:51', 990.00),
(9, 2, 'หน้าต่างบานเปิด', 4000.00, './assets/products/271663216.png', '2022-10-06 07:58:41', 988.00),
(10, 1, 'ประตูบานเปิดมือเดียว', 3500.00, './assets/products/404478385.png', '2022-10-07 11:38:10', 998.00),
(11, 3, 'โต๊ะปิกนิก', 2500.00, './assets/products/1832267164.png', '2022-10-07 11:57:01', 995.00),
(14, 5, 'กล่องเรียบ', 980.00, './assets/products/660721803.png', '2023-03-19 05:29:13', 1016.66),
(15, 5, 'เสาบนสวิง', 1200.00, './assets/products/758554432.png', '2023-02-05 06:07:24', 1002.66),
(16, 5, 'เสาล่างสวิง', 1200.00, './assets/products/1310258870.png', '2023-02-05 06:08:17', 999.66),
(17, 5, 'ธรณีสวิง', 1100.00, './assets/products/1173711610.png', '2023-02-06 09:33:31', 200.00),
(18, 5, 'เสาข้างสวิง', 1250.00, './assets/products/2190999.png', '2023-02-06 09:41:22', 1007.66),
(19, 6, 'รีเวท', 130.00, './assets/products/1367924176.png', '2023-03-10 06:22:54', 501.00),
(20, 5, 'เฟรมบน', 630.00, './assets/products/505247154.png', '2023-02-11 05:51:50', 994.00),
(21, 5, 'เสากุญแจ', 620.00, './assets/products/1941792796.png', '2023-02-11 02:52:25', 996.00),
(22, 5, 'กรอบนอก', 700.00, './assets/products/908035116.png', '2023-02-11 02:56:22', 999.00),
(23, 5, 'คิ้วบานกระทุ้ง', 260.00, './assets/products/924279762.png', '2023-02-11 05:42:47', 1012.00),
(24, 5, 'เฟรมล่าง', 640.00, './assets/products/1533786506.png', '2023-02-11 05:52:15', 995.00),
(25, 5, 'เฟรมข้าง', 500.00, './assets/products/210104872.png', '2023-02-11 05:48:39', 995.00),
(26, 5, 'เสาเกี่ยว', 650.00, './assets/products/510342548.png', '2023-02-11 05:50:08', 994.00),
(27, 5, 'ขวางบน', 250.00, './assets/products/131274843.png', '2023-02-12 11:35:48', 994.00),
(28, 5, 'ขวางล่าง', 350.00, './assets/products/316758880.png', '2023-02-12 11:35:30', 994.00),
(29, 7, 'มือจับล็อค', 130.00, './assets/products/766802905.png', '2023-03-13 05:27:26', 989.00),
(30, 6, 'ล้อบานเลื่อน', 45.00, './assets/products/1138332628.png', '2023-02-12 01:35:05', 979.00),
(31, 6, 'ยางหุ้ม', 140.00, './assets/products/1371643378.png', '2023-03-13 05:24:12', 994.00),
(32, 6, 'สักหลาดบานเลื่อน', 35.00, './assets/products/323669260.png', '2023-02-12 12:39:12', 495.00),
(33, 6, 'น้อต 3 หุน', 28.00, './assets/products/2039392069.png', '2023-03-13 05:24:59', 959.00),
(34, 6, 'น้อต 1/2 นิ้ว', 40.00, './assets/products/1100265524.png', '2023-03-13 05:33:05', 959.00),
(35, 6, 'กระจก', 800.00, './assets/products/282990825.png', '2023-02-12 01:07:43', 490.00),
(36, 5, 'ฝา jackSon', 800.00, './assets/products/1944871002.png', '2023-03-19 04:19:34', 998.66),
(37, 7, 'มือจับบานประตูสวิง', 150.00, './assets/products/1778462947.png', '2023-03-13 05:49:20', 200.00),
(38, 6, 'โช๊คบานสวิง', 1200.00, './assets/products/1913965388.png', '2023-03-13 06:02:56', 500.00),
(39, 6, 'ยางเดิน', 140.00, './assets/products/192715147.png', '2023-03-13 06:20:03', 500.00),
(40, 6, 'ยางอัดเล้ก', 140.00, './assets/products/1955758101.png', '2023-03-13 06:27:44', 500.00),
(41, 5, 'ฉากข้อต่อบานกระทุ้ง', 300.00, './assets/products/1544404974.png', '2023-03-13 07:31:34', 999.00),
(43, 7, 'มือจับกระทุ้ง', 140.00, './assets/products/523174968.png', '2023-03-13 07:42:11', 999.00),
(44, 6, 'บานพับ', 100.00, './assets/products/139978405.png', '2023-03-13 07:43:46', 999.00),
(45, 6, 'ยางลูกโป่ง', 160.00, './assets/products/2117690417.png', '2023-03-13 08:11:26', 500.00),
(46, 5, 'กล่อง jackson', 1470.00, './assets/products/158729528.png', '2023-03-19 04:20:14', 998.66),
(47, 5, 'คิ้วประตูบานสวิง', 138.00, './assets/products/1824330195.png', '2023-03-19 04:41:21', 995.00);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `producttype_id` int(11) NOT NULL COMMENT 'ไอดีประเภทสินค้า',
  `productbrand` varchar(255) NOT NULL COMMENT 'ประเภทสินค้า',
  `producttype_sell` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`producttype_id`, `productbrand`, `producttype_sell`) VALUES
(1, 'ประตู', 'all'),
(2, 'หน้าต่าง', 'all'),
(3, 'โต๊ะ', 'all'),
(5, 'อลูมิเนียม', 'half'),
(6, 'เบ็ดเตล็ด', 'all'),
(7, 'มือจับ', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL,
  `colors` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `colors`) VALUES
(1, 'สีดำ'),
(2, 'สีขาว');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `colors_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `details` text NOT NULL,
  `item_qty` int(11) NOT NULL,
  `limit_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `item_id`, `colors_id`, `size_id`, `price`, `details`, `item_qty`, `limit_qty`) VALUES
(1, 14, 1, 1, 980.00, 'กล่องเรียบ หนา 1.0 มิล', 200, 50),
(2, 14, 1, 2, 1100.00, 'กล่องเรียบ หนา 1.5 มิล', 10, 20),
(3, 14, 1, 3, 1400.00, 'กล่องเรียบ หนา 2.0 มิล', 200, 70),
(4, 14, 2, 1, 1100.00, 'กล่องเรียบ', 197, 50),
(5, 14, 2, 2, 1300.00, 'กล่องเรียบ', 195, 50),
(6, 14, 2, 3, 1600.00, 'กล่องเรียบ', 200, 50),
(7, 15, 1, 1, 1200.00, 'เสาบนสวิง', 200, 30);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `size`) VALUES
(1, '1.0 มิล'),
(2, '1.5 มิล'),
(3, '2.0 มิล');

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
(6, 'Suphakron panjaiyen', 'England', 'ART', '25f9e794323b453885f5181f1b624d0b'),
(13, 'petch', 'romklao12', 'petch', '7cb408fb29afcdf79d8cd51d2b9ad2fa'),
(15, 'test', 'กรุงเทพ', 'test', '95cf119abfe540529ddb191e93897f6d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincart`
--
ALTER TABLE `admincart`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `adminorders`
--
ALTER TABLE `adminorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminorders_details`
--
ALTER TABLE `adminorders_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `material_caculate_type`
--
ALTER TABLE `material_caculate_type`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admincart`
--
ALTER TABLE `admincart`
  MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminorders`
--
ALTER TABLE `adminorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `adminorders_details`
--
ALTER TABLE `adminorders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสพนักงาน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blueprint`
--
ALTER TABLE `blueprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blueprint_material`
--
ALTER TABLE `blueprint_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `made_order_details`
--
ALTER TABLE `made_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `made_request`
--
ALTER TABLE `made_request`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `material_caculate_type`
--
ALTER TABLE `material_caculate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_request`
--
ALTER TABLE `order_request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีขอยกเลิก', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีประเภทสินค้า', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=16;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
