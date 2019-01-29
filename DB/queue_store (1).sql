-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 07:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
(1, 'Karisimbi', 20, '2089', 'DELETED', '2019-01-25 07:36:49'),
(2, 'Muhabura', 20, '1209', 'DELETED', '2019-01-25 07:37:46'),
(3, 'Kiyovu', 20, '2084', 'TAKEN', '2019-01-25 07:38:02'),
(4, 'Musanze', 20, '1900', 'TAKEN', '2019-01-25 07:38:02'),
(5, 'ssssss', 23, '', 'TAKEN', '2019-01-26 14:40:12'),
(6, '1234', 10, '', 'TAKEN', '2019-01-27 22:43:10'),
(7, '98989', 10, '', 'TAKEN', '2019-01-28 21:59:37'),
(8, '9876', 10, '', 'TAKEN', '2019-01-28 21:59:51');

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
  `train_date` varchar(200) NOT NULL,
  `train_time` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `savedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`file_id`, `slot_id`, `table_id`, `training_id`, `trainee_names`, `trainee_number`, `train_date`, `train_time`, `status`, `savedDate`) VALUES
(3, 10, 0, 1234, 'Sugira samuel', '140', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:33:30'),
(4, 11, 8, 1234, 'Sugira samuel', '123', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:34:39'),
(5, 10, 0, 1234, 'Sugira samuel', '130', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:36:49'),
(6, 10, 0, 1234, 'Sugira samuel', '124', '12/11/2019', '11:00', 'APPROVED', '2019-01-25 11:36:49'),
(7, 10, 3, 1234, 'Sugira samuel', '125', '12/12/2019', '12:00', 'APPROVED', '2019-01-25 11:36:49'),
(8, 10, 4, 1234, 'Sugira samuel', '126', '12/13/2019', '13:00', 'APPROVED', '2019-01-25 11:36:49'),
(9, 12, 5, 1234, 'Sugira samuel', '127', '12/14/2019', '14:00', 'APPROVED', '2019-01-25 11:36:49'),
(10, 12, 6, 1234, 'Sugira samuel', '128', '12/15/2019', '15:00', 'APPROVED', '2019-01-25 11:36:49'),
(11, 11, 7, 1234, 'Sugira samuel', '129', '12/16/2019', '16:00', 'APPROVED', '2019-01-25 11:36:49'),
(12, 0, 0, 1234, 'Names', 'NUmber ', 'Date', 'Time', 'UNAPPROVED', '2019-01-28 22:40:26'),
(14, 0, 0, 1234, 'Sugira samuel', '124', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(15, 0, 0, 1234, 'Sugira samuel', '125', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(16, 0, 0, 1234, 'Sugira samuel', '126', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(17, 0, 0, 1234, 'Sugira samuel', '127', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(18, 0, 0, 1234, 'Sugira samuel', '128', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(19, 0, 0, 1234, 'Sugira samuel', '129', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-28 22:40:26');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `system_tables`
--
ALTER TABLE `system_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
