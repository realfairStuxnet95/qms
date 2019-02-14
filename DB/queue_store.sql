-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2019 at 03:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `display_test`
--

CREATE TABLE `display_test` (
  `id` int(100) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_test`
--

INSERT INTO `display_test` (`id`, `start_time`, `end_time`, `status`, `regDate`) VALUES
(1, '19:21', '18:21', 'DELETED', '2019-01-30 16:16:22'),
(2, '20:18', '20:30', 'DELETED', '2019-01-30 16:17:47'),
(3, '20:7', '20:8', 'DELETED', '2019-01-30 16:17:47'),
(4, '19:24', '18:33', 'DELETED', '2019-01-30 16:17:47'),
(5, '18:34', '18:36', 'DELETED', '2019-01-30 16:17:47'),
(6, '18:37', '18:38', 'DELETED', '2019-01-30 16:17:47'),
(7, '18:39', '18:42', 'DELETED', '2019-01-30 16:17:47'),
(8, '20:22', '21:01', 'DELETED', '2019-01-30 18:31:42'),
(9, '20:32', '21:0', 'ACTIVE', '2019-01-30 18:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `system_tables`
--

CREATE TABLE `system_tables` (
  `table_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `number` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_tables`
--

INSERT INTO `system_tables` (`table_id`, `name`, `capacity`, `number`, `status`, `regDate`) VALUES
(33, 'A01', 10, '', 'TAKEN', '2019-02-09 08:16:57'),
(34, 'A02', 10, '', 'TAKEN', '2019-02-09 08:17:01'),
(35, 'A03', 10, '', 'TAKEN', '2019-02-09 08:17:04'),
(36, 'A04', 10, '', 'TAKEN', '2019-02-09 08:17:09'),
(37, 'A05', 10, '', 'TAKEN', '2019-02-09 08:18:53'),
(38, 'A06', 10, '', 'TAKEN', '2019-02-09 08:19:00'),
(39, 'A07', 10, '', 'TAKEN', '2019-02-09 08:19:43'),
(40, 'A08', 10, '', 'TAKEN', '2019-02-09 08:19:50'),
(41, 'A09', 10, '', 'TAKEN', '2019-02-09 08:20:23'),
(42, 'A10', 10, '', 'AVAILABLE', '2019-02-09 08:20:29'),
(43, 'B01', 10, '', 'AVAILABLE', '2019-02-09 08:20:34'),
(44, 'A11', 10, '', 'AVAILABLE', '2019-02-09 08:20:35'),
(45, 'B02', 10, '', 'AVAILABLE', '2019-02-09 08:20:42'),
(46, 'A12', 10, '', 'AVAILABLE', '2019-02-09 08:20:43'),
(47, 'B03', 10, '', 'AVAILABLE', '2019-02-09 08:20:52'),
(48, 'A11', 10, '', 'AVAILABLE', '2019-02-09 08:20:55'),
(49, 'B04', 10, '', 'AVAILABLE', '2019-02-09 08:20:59'),
(50, 'B05', 10, '', 'AVAILABLE', '2019-02-09 08:21:08'),
(51, 'B06', 10, '', 'AVAILABLE', '2019-02-09 08:21:26'),
(52, 'A12', 10, '', 'AVAILABLE', '2019-02-09 08:21:36'),
(53, 'B07', 10, '', 'AVAILABLE', '2019-02-09 08:21:37'),
(54, 'B08', 10, '', 'AVAILABLE', '2019-02-09 08:21:44'),
(55, 'A13', 10, '', 'AVAILABLE', '2019-02-09 08:21:46'),
(56, 'A15', 10, '', 'AVAILABLE', '2019-02-09 08:21:58'),
(57, 'B09', 10, '', 'AVAILABLE', '2019-02-09 08:22:03'),
(58, 'B10', 10, '', 'AVAILABLE', '2019-02-09 08:22:14'),
(59, 'B11', 10, '', 'AVAILABLE', '2019-02-09 08:22:19'),
(60, 'B12', 10, '', 'AVAILABLE', '2019-02-09 08:22:24'),
(61, 'B13', 10, '', 'AVAILABLE', '2019-02-09 08:22:30'),
(62, 'B14', 10, '', 'AVAILABLE', '2019-02-09 08:22:35'),
(63, 'B15', 10, '', 'AVAILABLE', '2019-02-09 08:22:40'),
(64, 'B17', 10, '', 'AVAILABLE', '2019-02-09 08:22:46'),
(65, 'A14', 10, '', 'AVAILABLE', '2019-02-09 08:22:46'),
(66, 'B18', 10, '', 'AVAILABLE', '2019-02-09 08:22:52'),
(67, 'A15', 10, '', 'AVAILABLE', '2019-02-09 08:22:56'),
(68, 'B19', 10, '', 'AVAILABLE', '2019-02-09 08:22:59'),
(69, 'B20', 10, '', 'AVAILABLE', '2019-02-09 08:23:05'),
(70, 'A16', 10, '', 'AVAILABLE', '2019-02-09 08:23:46'),
(71, 'A17', 10, '', 'AVAILABLE', '2019-02-09 08:23:57'),
(72, 'B16', 10, '', 'AVAILABLE', '2019-02-09 08:24:01'),
(73, 'A18', 10, '', 'AVAILABLE', '2019-02-09 08:24:02'),
(74, 'A19', 10, '', 'AVAILABLE', '2019-02-09 08:24:09'),
(75, 'A20', 10, '', 'AVAILABLE', '2019-02-09 08:24:18'),
(76, 'C01', 10, '', 'AVAILABLE', '2019-02-09 08:30:36'),
(77, 'C02', 10, '', 'AVAILABLE', '2019-02-09 08:30:42'),
(78, 'C03', 10, '', 'AVAILABLE', '2019-02-09 08:30:52'),
(79, 'C11', 10, '', 'AVAILABLE', '2019-02-09 08:31:09'),
(80, 'C04', 10, '', 'AVAILABLE', '2019-02-09 08:31:10'),
(81, 'C12', 10, '', 'AVAILABLE', '2019-02-09 08:31:18'),
(82, 'C05', 10, '', 'AVAILABLE', '2019-02-09 08:31:18'),
(83, 'C13', 10, '', 'AVAILABLE', '2019-02-09 08:31:24'),
(84, 'C14', 10, '', 'AVAILABLE', '2019-02-09 08:31:29'),
(85, 'C15', 10, '', 'AVAILABLE', '2019-02-09 08:31:34'),
(86, 'C16', 10, '', 'AVAILABLE', '2019-02-09 08:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `user_id` int(100) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(255) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_type` int(2) NOT NULL,
  `verified` int(2) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isOnline` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`user_id`, `email`, `password`, `names`, `phone`, `gender`, `user_type`, `verified`, `verification_code`, `status`, `isOnline`, `regDate`) VALUES
(1, 'sam@gmail.com', 'samuels', 'Jackson DUSHIMIMANA', '0987654321', 'M', 1, 1, '123456', 'ACTIVE', '0', '2018-08-26 07:13:35'),
(2, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 0, 0, '', 'ACTIVE', '', '2018-09-03 10:07:35'),
(3, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 1, 0, '', 'ACTIVE', '', '2018-09-03 10:07:56'),
(4, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 2, 0, '', 'ACTIVE', '', '2018-09-03 10:08:11'),
(5, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '333333333333333', '', 1, 0, '', 'ACTIVE', '', '2018-09-03 10:12:58'),
(6, 'elisa@gmail.com', '123456', 'elisa pro', '078898765', '', 2, 0, '', 'ACTIVE', '', '2018-09-03 11:19:00'),
(7, 'redbluejd@redbluejd.com', 'chief editor', 'Jackson REDBLUEJD', '07854213689', '', 2, 0, '', 'ACTIVE', '', '2018-11-11 08:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `slot_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `time_range` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_id`, `name`, `time_range`, `end_time`, `status`, `regDate`) VALUES
(10, 'Today TimeSlot', '1548686940', '1548690840', 'AVAILABLE', '2019-01-28 12:51:56'),
(11, 'Today TimeSlot', '1548666000', '1548673200', 'AVAILABLE', '2019-01-28 21:56:49'),
(12, 'Today TimeSlot', '1548676800', '1548684000', 'AVAILABLE', '2019-01-28 21:57:25'),
(13, 'Today TimeSlot', '1548687600', '1548694800', 'AVAILABLE', '2019-01-28 21:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `station` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE `uploaded_file` (
  `file_id` int(100) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `table_id` int(100) NOT NULL,
  `training_id` int(100) NOT NULL,
  `trainee_names` varchar(1024) NOT NULL,
  `trainee_number` varchar(50) NOT NULL,
  `reg_id` varchar(200) NOT NULL,
  `train_date` varchar(200) NOT NULL,
  `train_time` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `savedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`file_id`, `slot_id`, `table_id`, `training_id`, `trainee_names`, `trainee_number`, `reg_id`, `train_date`, `train_time`, `status`, `savedDate`) VALUES
(456, 4567, 41, 0, 'Nkuranga Wellars', '1198580160320046', 'NYG1234567890', '14/02/2019', '11:00', 'APPROVED', '2019-02-12 08:28:32'),
(544, 0, 0, 1234, 'BIZIMANA', '1199180036390053', 'NYG12345678789P9', '2/9/2019', '11:00', 'APPROVED', '2019-02-09 08:26:38'),
(545, 0, 0, 1234, 'BYIRINGIRO', '1198880089182055', 'NYG186756567890', '2/10/2019', '12:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(546, 0, 0, 1234, 'Fred', '1199480159431116', 'GSB97675787', '2/11/2019', '13:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(547, 0, 0, 1234, 'KABALISA', '1198480049174097', '', '2/12/2019', '14:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(548, 0, 0, 1234, 'KABATESI', '1199270151875082', '', '2/13/2019', '15:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(549, 0, 0, 1234, 'KABERA', '1199280070991265', '', '2/14/2019', '16:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(550, 0, 0, 1234, 'MAJYAMBERE', '1198680141945094', '', '2/15/2019', '17:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(551, 0, 0, 1234, 'MPFIZI', '1199280104827111', '', '2/16/2019', '18:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(552, 0, 0, 1234, 'MUCYERAGABIRO', '1198870161248196', '', '2/17/2019', '19:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(553, 0, 0, 1234, 'MUKANDUTIYE', '1199170194648040', '', '2/18/2019', '20:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(554, 0, 0, 1234, 'MURENZI', '1199180131523018', '', '2/19/2019', '21:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(555, 0, 0, 1234, 'NDAYISABA', '1199280213853034', '', '2/20/2019', '22:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(556, 0, 0, 1234, 'NDINDIRIYIMANA', '1198980138843055', '', '2/21/2019', '23:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(557, 0, 0, 1234, 'NKESHIMANA', '1199380072341094', '', '2/22/2019', '0:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(558, 0, 0, 1234, 'NTABANA', '1198880167125018', '', '2/23/2019', '1:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(559, 0, 0, 1234, 'RUGAMBA', '1199480011157085', '', '2/24/2019', '2:00', 'UNAPPROVED', '2019-02-09 08:26:38'),
(560, 0, 0, 1234, 'UWARIRAYE', '1199280102895087', '', '2/25/2019', '3:00', 'UNAPPROVED', '2019-02-09 08:26:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `display_test`
--
ALTER TABLE `display_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_tables`
--
ALTER TABLE `system_tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `display_test`
--
ALTER TABLE `display_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `system_tables`
--
ALTER TABLE `system_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
